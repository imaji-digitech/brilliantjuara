<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\Room;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($room)
    {
        $course = Course::class;
        $room = Room::getRoom($room);
        return view("pages.room.course.index", compact('course', 'room'));
    }

    public function create($room)
    {
        $room = Room::getRoom($room);
        return view("pages.room.course.create", compact('room'));
    }

    public function edit($room, $id)
    {
        $room = Room::getRoom($room);
        return view("pages.room.course.edit", compact('id', 'room'));
    }

    public function show($room, $course)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);
        return view("pages.room.course.show", compact('course', 'room'));
    }

    public function highlightCreate($room, $course)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);
        return view("pages.room.course.highlight-create", compact('course', 'room'));
    }

    public function highlightEdit($room, $course, $id)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);

    }

    public function detail($room, $course,$id)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);
        $id=CourseDetail::findOrFail($id);
        return view("pages.room.course.detail", compact('course', 'room','id'));
    }

    public function detailCreate($room, $course,$id)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);
        return view("pages.room.course.detail-create", compact('course', 'room','id'));
    }

    public function detailEdit($room, $course, $id)
    {
        $room = Room::getRoom($room);
        $course = Course::getCourse($course);
    }
}
