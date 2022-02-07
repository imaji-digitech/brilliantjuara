<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOwnCourse;
use App\Models\UserOwnExam;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function exam(){
        $ownExam=UserOwnExam::class;
        return view('pages.access.exam',compact('ownExam'));
    }
    public function course(){
        $ownCourse=UserOwnCourse::class;
        return view('pages.access.course',compact('ownCourse'));
    }
}
