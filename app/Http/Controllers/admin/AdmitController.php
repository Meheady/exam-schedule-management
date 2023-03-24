<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admit;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class AdmitController extends Controller
{
    public function admitGenerate()
    {
        $regStudent = Registration::select('student_id')->get();
        $student = User::whereIn('id',$regStudent)->get();
       $allData = Admit::all();

        return view('admin.admit.generate-admit',
            compact('student','allData'));
    }

    public function storeAdmit(Request $request)
    {
        $admit = new Admit();
        $admit->student_id = $request->student;
        $admit->exam_type = $request->exam_name;
        $admit->save();

        return redirect()->back()->with('success','Admit create successfully');
    }

    public function deleteAdmit($id)
    {
        $admitDelete = Admit::find($id)->delete();
        return redirect()->back()->with('success','Admit delete successfully');
    }
}
