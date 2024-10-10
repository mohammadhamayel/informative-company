<?php

namespace App\Http\Controllers\Backend;

use App\Constants\Component;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\PageComponent;
use App\Services\ComponentService;
use App\Traits\FileManageTrait;
use Arr;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Validator;

class ComponentController extends Controller
{
    use FileManageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all sections
        $sections = PageComponent::query();
        $categories = $sections->pluck('category')->unique();
        $display = ['grid' => __('Grid'), 'list' => __('List')];
        $currentDisplay = request()->get('component_display', 'grid');
        $currentCategory = request()->get('component_category', 'all');
        $filterRequest = request()->all();
        if (! empty($filterRequest['component_category']) && $filterRequest['component_category'] !== 'all') {
            $sections->where('category', $filterRequest['component_category']);
        }

        $sections = $sections->get()->sortBy('sort');

        return view('backend.page.component.index', compact('sections', 'categories', 'display', 'currentDisplay', 'currentCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('status', 1)->pluck('name', 'code');

        return view('backend.page.component.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), (['name' => 'required|unique:page_components', 'icon' => 'required|mimes:png,jpg,jpeg|max:1048', 'content' => 'required', 'status' => 'boolean']));

        if ($validated->fails()) {
            notifyEvs('error', $validated->errors()->first());

            return redirect()->back()->withInput();
        }
        $input = $validated->getData();

        $content = Purifier::clean(htmlspecialchars_decode($input['content']));

        $data['type'] = Component::DYNAMIC;
        $data['section'] = Component::DYNAMIC;
        $data['name'] = $input['name'];
        $data['icon'] = self::uploadImage($input['icon']);
        $data['content'] = json_encode([config('app.static_default_language') => $content]);
        $data['status'] = $input['status'] ?? 0;
        PageComponent::create($data);

        notifyEvs('success', __('Component Created Successfully'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $component = PageComponent::with('items')->findOrFail($id);

        $currentDisplay = $request->get('component_display', 'grid');
        $currentCategory = $request->get('component_category', 'all');
        $languages = Language::where('status', 1)->pluck('name', 'code');

        $data = $this->prepareComponentData($component, $languages);

        return view('backend.page.component.edit', compact('data', 'languages', 'currentDisplay', 'currentCategory'));
    }

    private function prepareComponentData($component, $languages)
    {
        $modifiedComponentMainData = $this->modifyComponentDataForTranslation($component, $languages);

        $filteredContentFields = null;
        $filteredComponentListContent = [];

        if ($component->content_fields !== null) {
            $filteredContentFields = $this->filterContentFields($component->content_fields);

            $filteredComponentListContent = $this->filterComponentListContent($component->items);
        }

        return [
            'id' => $component->id,
            'content_id' => $component->content_id,
            'icon' => $component->icon,
            'preview' => $component->preview,
            'type' => $component->type,
            'section' => $component->section,
            'content' => $modifiedComponentMainData,
            'name' => $component->name,
            'status' => $component->status,
            'content_fields' => $component->content_fields !== null ? json_decode($component->content_fields) : null,
            'content_items' => $component->componentContent,
            'with_modal' => $component->with_modal,
            'item_list_level' => $filteredContentFields,
            'item_list_value' => $filteredComponentListContent,
        ];
    }

    private function modifyComponentDataForTranslation($component, $languages)
    {
        $componentMainData = json_decode($component->content);
        $defaultOtherLanguageComponentMainData = $componentMainData->en;

        if ($component->type == Component::STATIC) {
            $defaultOtherLanguageComponentMainData = collect($defaultOtherLanguageComponentMainData)
                ->reject(function ($item) {
                    return isset($item->type) && $item->type === 'img' || isset($item->trans) && $item->trans === false;
                })->all();
        }

        return $languages->map(function ($name, $code) use ($defaultOtherLanguageComponentMainData, $componentMainData) {
            return $componentMainData->$code ?? $defaultOtherLanguageComponentMainData;
        });
    }

    private function filterContentFields($contentFields)
    {
        $contentFields = json_decode($contentFields, true);

        return array_filter($contentFields, function ($value) {
            return isset($value['type']) && $value['type'] === 'text';
        });
    }

    private function filterComponentListContent($items)
    {
        return $items->filter(function ($value) {
            $decodedContent = json_decode($value->content, true)[config('app.static_default_language')];

            return collect($decodedContent)->contains('type', 'text');
        })->map(function ($value) {
            $decodedContent = json_decode($value->content, true)[config('app.static_default_language')];
            $filteredContent = collect($decodedContent)->filter(function ($item) {
                return isset($item['type']) && $item['type'] === 'text';
            });

            return ['id' => $value->id, 'content' => $filteredContent];
        });
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ComponentService $componentService)
    {

        $validated = Validator::make($request->all(), [
            'name' => 'unique:page_components,name,'.$id,
            'icon' => 'mimes:png,jpg,jpeg|max:1048',
            'preview' => 'mimes:png,jpg,jpeg|max:1048',
            'status' => 'boolean']
        );

        if ($validated->fails()) {
            notifyEvs('error', $validated->errors()->first());

            return redirect()->back()->withInput();
        }
        $lang = $request->lang;
        $data = $request->except(['_token', '_method', 'status', 'name', 'lang', 'preview']);

        $component = PageComponent::find($id);
        $content = modify_trans_data($component->content);

        if ($component->type == Component::STATIC) {
            $modifyData = $componentService->updateDataModify($request, $data, $content, $lang);

        } else {

            $requestContent = Purifier::clean(htmlspecialchars_decode($data['content']));
            $modifyData = Arr::set($content, $lang, $requestContent);
            $component->icon = isset($data['icon']) ? self::uploadImage($data['icon'], $component->icon) : $component->icon;
        }

        if ($request->hasFile('preview')) {
            $component->preview = self::uploadImage($request->preview);
        }
        $component->name = $request->name ?? $component->name;
        $component->content = $modifyData;
        $component->status = ($request->filled('status') or $lang !== config('app.static_default_language')) ? Status::TRUE : Status::FALSE;
        $component->save();

        notifyEvs('success', __('Component Updated Successfully'));

        return redirect()->back();
    }

    public function componentFilter(Request $request)
    {
        $category = $request->category;
        $pageId = $request->page_id;
        $componentIds = json_decode($request->component_ids, true);

        $query = PageComponent::where('status', 1);

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $components = $query->get();

        $componentsAvailable = $components->reject(function ($component) use ($componentIds) {
            return in_array($component->id, $componentIds);
        })->sortBy('sort');

        return view('backend.page.component.partial._filter_component', compact('componentsAvailable', 'pageId'))->render();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $component = PageComponent::find($id);
        if ($component->type == Component::DYNAMIC) {
            self::deleteImage($component->icon);
            $component->delete();

            return response(['status' => 'success', 'message' => __('Component Deleted Successfully')], 200);
        }
        abort('403');
    }
}
