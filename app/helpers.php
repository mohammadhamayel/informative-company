<?php

use App\Models\Language;
use Illuminate\Pagination\LengthAwarePaginator;

if (! function_exists('notifyEvs')) {
    function notifyEvs($type, $message)
    {
        session()->flash('notifyevs', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}

if (! function_exists('isActive')) {
    function isActive($route, $parameter = null)
    {
        if ($parameter !== null) {
            if (request()->url() === route($route, $parameter)) {
                return 'active';
            }
        } else {
            if (is_array($route)) {
                foreach ($route as $value) {
                    if (Request::routeIs($value)) {
                        return 'show';
                    }
                }
            } elseif (Request::routeIs($route)) {
                return 'active';
            }
        }

    }
}

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\Setting;
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        $value = \App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('demoImage')) {
    function demoImage($name = null): string
    {
        if (is_null($name)) {
            return 'general/static/placeholder.png';
        }

        return 'general/static/'.$name.'.png';
    }

}

if (! function_exists('paginate')) {
    function paginate($items, $perPage = 10)
    {
        $page = request()->input('page', 1);
        $currentPath = request()->path();

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage), // Get the items for the current page
            $items->count(), // Total number of items
            $perPage, // Number of items per page
            $page,
            ['path' => '/'.$currentPath]// Current page
        );
    }
}

if (! function_exists('is_default_lang')) {
    function is_default_lang($lang, $class, $default = '')
    {
        if ($lang == config('app.static_default_language')) {
            return $class;
        }

        return $default;
    }
}
if (! function_exists('_tr')) {
    function _tr($data, $associative = true)
    {
        $defaultLanguage = config('app.static_default_language');
        $data = json_decode($data, $associative);

        $locale = app()->getLocale();

        if ($associative) {
            return $data[$locale] ?? $data[$defaultLanguage];
        } else {
            return $data->$locale ?? $data->$defaultLanguage;
        }
    }

}
if (! function_exists('modify_trans_data')) {
    function modify_trans_data($data, $associative = true)
    {
        $data = json_decode($data, $associative);

        $validLanguages = Language::languageGet()->keys();

        return $associative
            ? collect($data)->only($validLanguages)->all()
            : (object) collect($data)->only($validLanguages)->all();

    }

}

if (! function_exists('title_case')) {

    function title_case($string): string
    {
        return Str::title(str_replace('_', ' ', $string));
    }
}
