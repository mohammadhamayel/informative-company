<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plugins = Plugin::all();

        return view('backend.plugin.index', compact('plugins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plugin = Plugin::find($id);
        $credentials = json_decode($plugin->credentials, true);
        $status = $plugin->status;

        return view('backend.plugin.partial._edit_append', compact('credentials', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'credentials' => 'required',
        ]);

        $inputs = $request->all();
        $credentials = json_encode($inputs['credentials']);
        $plugin = Plugin::find($id);
        $plugin->update(
            [
                'credentials' => $credentials,
                'status' => $inputs['status'] ?? 0,
            ]
        );

        notifyEvs('success', __('Plugin Updated Successfully'));

        return redirect()->route('admin.plugin.index');
    }
}
