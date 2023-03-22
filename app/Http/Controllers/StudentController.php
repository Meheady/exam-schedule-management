<?php

namespace App\Http\Controllers;

use App\Models\Admit;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }
    public function getAdmit()
    {

        $admit = Admit::where('student_id',Auth::user()->id)->first();

        if ($admit){
            $register = Registration::where('student_id',Auth::user()->id)->first();
            $regSub = json_decode($register->subject);
            $subject = Course::whereIn('id',$regSub)->get();
            return view('student.admit.get-admit-card',compact('register','subject','admit'));
        }
        else{
            return view('student.admit.not-allow');
        }


//        return view('student.admit.get-admit-card');
    }
}
