<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\SettingService;
use App\Traits\FileManageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{
    use FileManageTrait;

    //View Setting Page
    public function settings()
    {
        // Cache settings indefinitely
        $settings = Cache::rememberForever('dynamic_settings', function () {
            $settings = Config::get('setting_fields');

            // Array of settings to update
            $settingsData = [
                'general' => [
                    6 => Page::getSlugs(),
                    7 => ['basic', 'parallax', 'none'],
                    8 => ['dark_mode', 'light_mode'],
                ],
                'maintenance_mode' => [
                    4 => ['local', 'production'],
                ],
                'mail' => [
                    6 => ['ssl', 'tls'],
                ],
                'cookie' => [
                    2 => Page::getSlugs(),
                ],
                'header' => [
                    0 => ['style_1', 'style_2'],
                ],
            ];

            // Update settings based on the settingsData array
            foreach ($settingsData as $section => $elements) {
                foreach ($elements as $index => $value) {
                    $settings[$section]['elements'][$index]['value'] = $value;
                }
            }

            return $settings;
        });
        Config::set('setting_fields', $settings);
        return view('backend.settings.index');
    }

    public function update(Request $request, SettingService $settingService)
    {

        try {
            $settingService->update($request);
            $message = $request->has('info_message') ? $request->info_message : __('Settings Updated Successfully');
            notifyEvs('success', $message);

            return redirect()->back();

        } catch (Exception $e) {
            notifyEvs('error', $e->getMessage());

            return redirect()->back();

        }

    }
}
