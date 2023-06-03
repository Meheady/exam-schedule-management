<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admit;
use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmitVerifyController extends Controller
{


    public function admitVerify()
    {
        return view('teacher.admit.verify');
    }

    public function admitVerification(Request $request)
    {

        $user = User::where('student_id',$request->sId)->first();
        if($user) {
            $admit = Admit::where('student_id', $user->id)->first();

            if ($admit) {
                $register = Registration::where('student_id', $user->id)->first();
                return view('teacher.admit.admit-verify', compact('register', 'admit'));
            } else {
                return view('teacher.admit.not-allow',compact('user'));
            }
        }
        else{
                return  redirect()->back();
            }
    }
    public function admitVerificationUrl($sid)
    {

        $user = User::where('student_id',$sid)->first();
        if($user){
            $admit = Admit::where('student_id',$user->id)->first();

            if ($admit){
                $register = Registration::where('student_id',$user->id)->first();
                return view('teacher.admit.admit-verify',compact('register','admit'));
            }
            else{
                return view('teacher.admit.not-allow',compact('user'));
            }
        }
        else{
            return  redirect()->back()->with('success','Student not found');
        }

    }
}
