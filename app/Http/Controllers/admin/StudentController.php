<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.auth.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.auth.students.create');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:40|unique:students',
            'specialty' => 'nullable|string|max:50',
        ]);

        Student::create($data);
        return redirect(route('admin.students'));
    }
    public function edit($id)
    {
        $data['category'] = Category::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        $data['student'] = Student::findOrFail($id);
        return view('admin.auth.students.edit')->with($data);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|max:40|unique:students',
            'specialty' => 'nullable|string|max:50',
        ]);

        $student = Student::findorfail($request->id);
        $student->update($data);

        return redirect(route('admin.students'));

    }
    public function delete($id)
    {

        
        $student = Student::findorfail($id);
        $student->delete();

        return redirect(route('admin.students'));
    }
    public function showcourses($id)
    {
        $data['courses'] = Student::findorFail($id)->courses;
        $data['student_id'] = $id;
        return view('admin.auth.students.showcourses')->with($data);
    }
    public function approve($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)
            ->update(['status' => 'approve']);
        return back();
    }
    public function reject($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)
            ->update(['status' => 'reject']);
        return back();
    }
    public function register($id)
    {

        $data['courses'] = Course::select('id', 'name')->get();
        $data['student_id'] = $id;

        return view('admin.auth.students.addcourse')->with($data);
    }

    public function addcourse($id, Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        DB::table('course_student')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id'],
        ]);
        return redirect(route('admin.students.courses', $id));
    }
}
