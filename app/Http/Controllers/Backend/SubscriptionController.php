<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Subscription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class SubscriptionController extends Controller
{
    public function subscription()
    {
        $subscriptions = Subscription::all();

        return view('backend.subscription.index', compact('subscriptions'));
    }

    public function mailSend(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
        ]);

        if ($validatedData->fails()) {
            notifyEvs('error', $validatedData->errors()->first());

            return redirect()->back();
        }

        $validatedData = $validatedData->validated();

        try {
            $id = $request->id;
            $title = $validatedData['title'];
            $message = $validatedData['message'];
            $sendMail = Subscription::findOrFail($id)->email;

            Mail::to($sendMail)->send(new SendMail($title, $message));

            notifyEvs('success', __('Mail Send Successfully'));

            return redirect()->back();

        } catch (Exception $e) {
            notifyEvs('error', __('Failed to authenticate on SMTP server'));

            return redirect()->back();
        }

    }
}
