<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Exception;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        return view('backend.footer.index');
    }

    public function update(Request $request, SettingService $settingService)
    {
        try {
            $settingService->update($request);
            notifyEvs('success', __('Footer Updated Successfully'));

            return redirect()->back();

        } catch (Exception $e) {
            notifyEvs('error', $e->getMessage());

            return redirect()->back();

        }

    }
}
