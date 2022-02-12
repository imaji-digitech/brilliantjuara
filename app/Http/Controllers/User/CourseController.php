<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($slug){
        $course=Course::getCourse($slug);
        $room=$course->room;
        return view('pages.course.show',compact('course','room'));
    }
}
