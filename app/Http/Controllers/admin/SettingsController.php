<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {

        $data['settings'] = Setting::first();
        return view('admin.auth.settings.index')->with($data);

    }

   
    public function edit($id)
    {
        $data['settings'] = Setting::findorfail($id);
        return view('admin.auth.settings.edit')->with($data);

    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:25',
            'email' => 'required|string|max:50',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $old_name = Setting::findorfail($request->id)->logo;

        if ($request->hasFile('logo')) {

            Storage::disk('uploads')->delete('settings/' . $old_name);

            $new_name = $data['logo']->hashName();
            Image::make($data['logo'])->save(public_path('uploads/settings/' . $new_name));
            $data['logo'] = $new_name;
        } else {

            $data['logo'] = $old_name;
        }

        Setting::findorfail($request->id)->update($data);

        return redirect(route('admin.settings'));
    }
}
