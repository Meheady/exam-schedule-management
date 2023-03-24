<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Section;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function newRegistration()
    {
        $section = Section::all();
        $subject = Course::all();
        $semester = Semester::all();
        $student = User::where('role','student')->where('status','active')->get();
        $allData = Registration::all();

        return view('admin.registration.new-registration',
            compact('section','subject','semester','student','allData'));
    }

    public function storeRegistration(Request $request)
    {

        $register = new Registration();

        $register->student_id = $request->student;
        $register->section_id = $request->section;
        $register->semester_id = $request->student;
        $register->session = $request->sessions;
        $register->subject = json_encode($request->subject);

        $register->save();

        return redirect()->back()->with('success','Student register successfully');
    }
}
