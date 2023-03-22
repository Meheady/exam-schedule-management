<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admit;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmitVerifyController extends Controller
{
    public function admitVerify($sid)
    {

        $admit = Admit::where('student_id',$sid)->first();

        if ($admit){
            $register = Registration::where('student_id',$sid)->first();
            return view('teacher.admit.admit-verify',compact('register','admit'));
        }
        else{
            return view('teacher.admit.not-allow');
        }
    }
}
