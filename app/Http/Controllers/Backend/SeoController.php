<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Exception;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        return view('backend.settings.seo');
    }

    public function update(Request $request, SettingService $settingService)
    {
        try {
            $settingService->update($request);
            notifyEvs('success', __('SEO Settings Updated Successfully'));

            return redirect()->back();

        } catch (Exception $e) {
            notifyEvs('error', $e->getMessage());
            return redirect()->back();

        }

    }
}
