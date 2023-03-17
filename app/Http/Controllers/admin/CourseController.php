<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function CreateCourse()
    {
        $allData = Course::all();
        $department = Department::all();
        return view('admin.course.create', compact('allData','department'));
    }


    public function storeCourse(Request $request)
    {
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->credit = $request->credit;
        $course->department_id = $request->department;
        $course->update_by = Auth::user()->id;
        $course->save();

        return redirect()->back()->with('success','Course save successfully');
    }
    public function updateCourse(Request $request,$id)
    {
        $course = Course::find($id);
        $course->course_name = $request->course_name;
        $course->credit = $request->credit;
        $course->department_id = $request->department;
        $course->update_by = Auth::user()->id;
        $course->save();

        return redirect()->route('manage.course')->with('success','Course update successfully');
    }

    public function deleteCourse($id)
    {
        Course::find($id)->delete();
        return redirect()->back()->with('success','Course delete successfully');
    }

    public function editCourse($id)
    {
        $editData = Course::find($id);
        $department = Department::all();
        return view('admin.course.edit-course', compact('editData','department'));
    }
}
