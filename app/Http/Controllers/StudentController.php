<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }
    public function getAdmit()
    {
        return view('student.admit.get-admit-card');
    }
}
