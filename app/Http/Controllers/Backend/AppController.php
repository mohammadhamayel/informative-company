<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function app()
    {
        $data = [
            'php_version' => phpversion(),
            'laravel_version' => app()->version(),
            'server_software' => php_uname(),
            'environment' => app()->environment(),
            'server_ip' => $_SERVER['SERVER_ADDR'],
            'timezone' => config('app.timezone'),
        ];

        return view('backend.app.info', compact('data'));
    }

    public function optimize()
    {
        notifyEvs('success', __('Application Optimized Successfully'));
        Artisan::call('app:optimize');
        return redirect()->back();
    }

    public function clearCache()
    {
        notifyEvs('success', __('Cache Cleared Successfully'));
        Artisan::call('app:clear');
        return redirect()->back();
    }

    public function smtpConnectionCheck(Request $request)
    {
        try {
            Mail::raw('Testing SMTP connection successful', function ($message) use ($request) {
                $message->to($request->email)->subject('Test Email');
            });
            notifyEvs('success', __('SMTP connection test successful'));
            return back();
        } catch (\Exception $e) {
            notifyEvs('error', __('SMTP connection test failed: ').$e->getMessage());
            return redirect()->back();
        }
    }
}
