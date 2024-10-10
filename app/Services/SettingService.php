<?php

namespace App\Services;

use App\Models\Setting;
use App\Traits\FileManageTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SettingService
{
    use FileManageTrait;
    use ValidatesRequests;

    public function update($request): void
    {
        $section = $request->section;
        $rules = Setting::getValidationRules($section);
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {

                if ($request->hasFile($key)) {
                    $oldImage = Setting::get($key, $section);
                    $val = self::uploadImage($val, $oldImage);
                }

                Setting::add($key, $val, Setting::getDataType($key, $section));
            }
        }

    }
}
