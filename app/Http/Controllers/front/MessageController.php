<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function newslettel(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        Newsletter::create($data);
        return back();
    }
    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);
        Message::create($data);
        return back();
    }
    public function enroll(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'required|string',
            'specialty' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        $old_student = Student::select('id')->where('email', $data['email'])->first();

        if ($old_student == null) {
            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'specialty' => $data['specialty'],
            ]);
            $student_id = $student->id;
        } else {
            $student_id = $old_student->id;
            if ($data['name'] !== null) {
                $old_student->update(['name' => $data['name']]);
            }
            if ($data['specialty'] !== null) {
                $old_student->update(['specialty' => $data['specialty']]);
            }
        }

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return back();
    }
}
