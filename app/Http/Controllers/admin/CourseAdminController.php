<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseAdminController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.auth.courses.index', compact('courses'));
    }

    public function create()
    {
        $data['category'] = Category::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        return view('admin.auth.courses.create')->with($data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $new_name = $data['img']->hashName();
        Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/courses/' . $new_name));
        $data['img'] = $new_name;
        Course::create($data);
        return redirect(route('admin.courses'));
    }
    public function edit($id)
    {
        $data['category'] = Category::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        $data['course'] = Course::findOrFail($id);
        return view('admin.auth.courses.edit')->with($data);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $course = Course::findorfail($request->id);

        $old_name = $course->img;

        if ($request->hasFile('img')) {

            Storage::disk('uploads')->delete('courses/' . $old_name);
            $new_name = $data['img']->hashName();
            Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/courses/' . $new_name));
            $data['img'] = $new_name;
        } else {

            $data['img'] = $old_name;
        }

        $course->update($data);

        return redirect(route('admin.courses'));
    }
    public function delete($id)
    {
        $course = Course::findorfail($id);
        $old_name = $course->img;
        Storage::disk('uploads')->delete('courses/' . $old_name);
        $course->delete();

        return redirect(route('admin.courses'));
    }
}
