<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Exception;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $settings = config('setting_fields');
        $settings['header']['elements'][0]['value'] = ['style_1', 'style_2'];
        config()->set('setting_fields', $settings);

        return view('backend.header.index');
    }

    public function update(Request $request, SettingService $settingService)
    {
        try {
            $settingService->update($request);
            notifyEvs('success', __('Header Updated Successfully'));

            return redirect()->back();

        } catch (Exception $e) {
            notifyEvs('error', $e->getMessage());

            return redirect()->back();

        }

    }
}
