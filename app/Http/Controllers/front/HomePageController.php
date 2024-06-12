<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SiteContent;
use App\Models\Student;
use App\Models\Trainer;

class HomePageController extends Controller
{
    public function index()
    {

        $data['banner'] = SiteContent::select('content')->where('name', 'banner')->first();
        $data['feature'] = SiteContent::select('content')->where('name', 'feature')->first();
        $data['course'] = SiteContent::select('content')->where('name', 'course')->first();
        $data['better_future'] = SiteContent::select('content')->where('name', 'better future')->first();
        $data['qualified_trainers'] = SiteContent::select('content')->where('name', 'qualified trainers')->first();
        $data['job_oppurtunity'] = SiteContent::select('content')->where('name', 'job oppurtunity')->first();
        $data['courses'] = Course::select('id', 'name', 'category_id', 'trainer_id', 'small_desc', 'img', 'price')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $data['courses_count'] = Course::count();
        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();
        return view('front.index')->with($data);

    }
}
