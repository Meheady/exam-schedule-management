<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allStudent()
    {
        $student = User::where('role','student')->get();
        return view('admin.user.all-student',compact('student'));
    }

    public function createStudent()
    {
        $department = Department::all();
        $batch = Batch::all();
        return view('admin.user.create-student', compact('department','batch'));
    }

    public function getImage($image)
    {
        $imgExt = $image->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgLocation = 'upload/student-image/';
        $up = $image->move($imgLocation,$imgName);
        return $imgLocation.$imgName;
    }
    public function storeStudent(Request $request)
    {

        $student = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'shift'=>$request->shift,
            'batch'=>$request->batch,
            'password'=> Hash::make('123'),
            'department'=>$request->department,
            'photo'=> $this->getImage($request->file('photo')),
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Student create successfully');
    }

    public function statusStudent($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 'active'){
            $user->status = 'inactive';
            $user->save();
            return redirect()->back()->with('success','Status change successfully');
        }else{
            $user->status = 'active';
            $user->save();
            return redirect()->back()->with('success','Status change successfully');
        }
    }

    public function editStudent($id)
    {
        $department = Department::all();
        $batch = Batch::all();
        $user = User::where('id', $id)->first();
        return view('admin.user.edit-student', compact('user','department','batch'));

    }

    public function updateStudent(Request $request,$id)
    {

        $user = User::findOrFail($id);

        if($request->file('photo')){

            if (file_exists($user->photo)){
                unlink($user->photo);
            }

           User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'shift'=>$request->shift,
                'batch'=>$request->batch,
                'department'=>$request->department,
                'photo'=> $this->getImage($request->file('photo')),
                'address'=>$request->address,
                'status'=>$request->status,
            ]);

            return redirect()->route('all.student')->with('success','Student Update successfully');
        }
        else {
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'shift'=>$request->shift,
                'batch'=>$request->batch,
                'department'=>$request->department,
                'address'=>$request->address,
                'status'=>$request->status,
            ]);
            return redirect()->route('all.student')->with('success','Student Update successfully');
        }


    }

    public function allTeacher()
    {
        $teacher = User::where('role','teacher')->get();
        return view('admin.user.all-teacher',compact('teacher'));
    }

    public function createTeacher()
    {
        $department = Department::all();
        return view('admin.user.create-teacher', compact('department'));
    }


    public function storeTeacher(Request $request)
    {

        $student = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=> Hash::make('123'),
            'department'=>$request->department,
            'photo'=> $this->getImage($request->file('photo')),
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Teacher create successfully');
    }

    public function statusTeacher($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 'active'){
            $user->status = 'inactive';
            $user->save();
            return redirect()->back()->with('success','Status change successfully');
        }else{
            $user->status = 'active';
            $user->save();
            return redirect()->back()->with('success','Status change successfully');
        }
    }

    public function editTeacher($id)
    {
        $department = Department::all();
        $user = User::where('id', $id)->first();
        return view('admin.user.edit-teacher', compact('user','department'));

    }

    public function updateTeacher(Request $request,$id)
    {

        $user = User::findOrFail($id);

        if($request->file('photo')){

            if (file_exists($user->photo)){
                unlink($user->photo);
            }

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'department'=>$request->department,
                'photo'=> $this->getImage($request->file('photo')),
                'address'=>$request->address,
                'status'=>$request->status,
            ]);

            return redirect()->route('all.teacher')->with('success','Teacher Update successfully');
        }
        else {
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'department'=>$request->department,
                'address'=>$request->address,
                'status'=>$request->status,
            ]);
            return redirect()->route('all.student')->with('success','Teacher Update successfully');
        }


    }
}
