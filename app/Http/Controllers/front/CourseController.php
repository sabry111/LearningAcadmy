<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function show($id)
    {
        $data['category'] = Category::findOrFail($id);
        $data['courses'] = Course::where('category_id', $id)->get();
        return view('front.courses.category')->with($data);
    }

    public function showcourse($id,$c_id)
    {
        $data['course'] = Course::findOrFail($c_id);
        return view('front.courses.course')->with($data);
    }
}
