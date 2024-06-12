<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TrainerController extends Controller
{
    public function index()
    {
        $trainer = Trainer::all();
        return view('admin.auth.trainers.index', compact('trainer'));
    }

    public function create()
    {
        return view('admin.auth.trainers.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:25',
            'specialty' => 'required|string|max:50',
            'img' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $new_name = $data['img']->hashName();
        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/' . $new_name));

        $data['img'] = $new_name;

        Trainer::create($data);
        return redirect(route('admin.trainers'));
    }
    public function edit($id)
    {
        $data['trainer'] = Trainer::findorfail($id);
        return view('admin.auth.trainers.edit')->with($data);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:25',
            'specialty' => 'required|string|max:50',
            'img' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        $old_name = Trainer::findorfail($request->id)->img;

        if ($request->hasFile('img')) {

            Storage::disk('uploads')->delete('trainers/' . $old_name);

            $new_name = $data['img']->hashName();
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/' . $new_name));
            $data['img'] = $new_name;
        } else {

            $data['img'] = $old_name;
        }

        Trainer::findorfail($request->id)->update($data);

        return redirect(route('admin.trainers'));
    }
    public function delete(Request $request)
    {
        $old_name = Trainer::findorfail($request->id)->img;
        Storage::disk('uploads')->delete('trainers/' . $old_name);
        $trainer = Trainer::where('id', $request->id);
        $trainer->delete();

        return redirect(route('admin.trainers'));
    }
}
