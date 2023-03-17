<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function CreateDepartment()
    {
        $allData = Department::all();
        return view('admin.department.create', compact('allData'));
    }


    public function storeDepartment(Request $request)
    {
        $batch = new Department();
        $batch->department_short_name = $request->dep_short_name;
        $batch->department_full_name = $request->dep_full_name;
        $batch->update_by = Auth::user()->id;
        $batch->save();

        return redirect()->back()->with('success','Department save successfully');
    }

    public function deleteDepartment($id)
    {
        Department::find($id)->delete();
        return redirect()->back()->with('success','Department delete successfully');
    }
}
