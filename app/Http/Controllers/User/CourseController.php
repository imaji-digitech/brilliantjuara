<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($slug){
        $course=Course::getCourse($slug);
        return view('pages.course.show',compact('course'));
    }
}
