<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    public function CreateSemester()
    {
        $allData = Semester::all();
        return view('admin.semester.create', compact('allData'));
    }


    public function storeSemester(Request $request)
    {
        $batch = new Semester();
        $batch->semester_name = $request->semester_name;
        $batch->update_by = Auth::user()->id;
        $batch->save();

        return redirect()->back()->with('success','Semester save successfully');
    }

    public function deleteSemester($id)
    {
        Semester::find($id)->delete();
        return redirect()->back()->with('success','Semester delete successfully');
    }
}
