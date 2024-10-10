<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ComponentContent;
use App\Models\Language;
use App\Models\PageComponent;
use App\Services\ComponentService;
use App\Traits\FileManageTrait;
use Arr;
use Illuminate\Http\Request;
use Validator;

class ItemController extends Controller
{
    use FileManageTrait;

    public function create(Request $request)
    {

        $componentId = $request->component_id;
        $component = PageComponent::find($componentId);

        $fields = json_decode($component->content_fields);

        return view('backend.page.component.item.create', compact('fields', 'componentId'));
    }

    public function store(Request $request, ComponentService $componentService)
    {

        $validatedData = Validator::make($request->all(), [
            'component_id' => 'required',
            'fields' => 'required',
        ]);

        if ($validatedData->fails()) {
            notifyEvs('error', $validatedData->errors()->first());

            return redirect()->back()->withInput();
        }

        $input = $validatedData->getData();

        $componentId = $request->component_id;

        $fieldData = (array) json_decode($input['fields'], true);
        $filteredRequestData = Arr::except($input, ['_token', 'component_id', 'fields', 'files']);
        $modifyData = $componentService->updateDataModify($request, $filteredRequestData, $fieldData, null);


        $componentContent = new ComponentContent;
        $componentContent->component_id = $componentId;
        $componentContent->content = json_encode([config('app.static_default_language') => $modifyData]);
        $componentContent->save();

        notifyEvs('success', __('Page Component Item Create Successfully'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $componentContent = ComponentContent::findOrFail($id);
        $data = json_decode($componentContent->content);

        $languages = Language::where('status', 1)->pluck('name', 'code');
        $defaultOtherLanguageComponentMainData = collect($data->en)->reject(function ($item) {
            return isset($item->type) && $item->type === 'img' || isset($item->trans) && $item->trans === false;
        })->all();

        $modifiedData = $languages->map(function ($name, $code) use ($defaultOtherLanguageComponentMainData, $data) {
            return $data->$code ?? $defaultOtherLanguageComponentMainData;
        });

        $componentId = $componentContent->component_id;

        if (request()->ajax()) {
            return view('backend.page.component.partial._edit_item', compact('modifiedData', 'id', 'languages'))->render();
        }

        return view('backend.page.component.item.edit', compact('modifiedData', 'id', 'componentId', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ComponentService $componentService)
    {
        $requestData = $request->except(['_token', '_method', 'files', 'lang']);
        $lang = $request->lang;
        $component = ComponentContent::find($id);
        $oldData = modify_trans_data($component->content);
        $modifyData = $componentService->updateDataModify($request, $requestData, $oldData, $lang);

        $component->content = $modifyData;
        $component->save();
        notifyEvs('success', __('Page Component Item Updated Successfully'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $component = ComponentContent::find($id);
        $items = json_decode($component->content, true)[config('app.static_default_language')];
        foreach ($items as $item) {
            if ($item['type'] == 'img') {
                $this->deleteImage($item['value'] ?? '');
            }
        }
        $component->delete();

        return response(['status' => 'success', 'message' => __('Page Component Item Deleted Successfully')], 200);
    }
}
