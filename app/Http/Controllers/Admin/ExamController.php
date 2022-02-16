<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Form\Step;
use App\Models\Exam;
use App\Models\ExamQuest;
use App\Models\ExamStep;
use App\Models\Room;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index($room)
    {
        $exam = Exam::class;
        $room = Room::getRoom($room);
        return view("pages.room.exam.index", compact('exam', 'room'));
    }

    public function create($room)
    {
        $room = Room::getRoom($room);
        return view("pages.room.exam.create", compact('room'));
    }

    public function edit($room, $id)
    {
        $room = Room::getRoom($room);
        return view("pages.room.exam.edit", compact('id', 'room'));
    }

    public function show($room, $exam)
    {
        $room = Room::getRoom($room);
        $exam = Exam::getExam($exam);
        $step = ExamStep::class;
        return view("pages.room.exam.show", compact('exam', 'room', 'step'));
    }

    public function stepCreate($room, $exam)
    {
        $room = Room::getRoom($room);
        $exam = Exam::getExam($exam);
        return view("pages.room.exam.step-create", compact('exam', 'room'));
    }

    public function stepEdit($room, $exam, $id)
    {
        $room = Room::getRoom($room);$exam = Exam::getExam($exam);
        return view("pages.room.exam.step-edit", compact('exam', 'room', 'id'));
    }

    public function question($room, $exam, $step)
    {
        $room = Room::getRoom($room);
        $exam = Exam::getExam($exam);
        $step = ExamStep::findOrFail($step);
        $quest=ExamQuest::class;
        return view("pages.room.exam.question", compact('exam', 'room','step','quest'));
    }

    public function questionCreate($room, $exam, $step)
    {
        $room = Room::getRoom($room);
        $exam = Exam::getExam($exam);
        $step = ExamStep::findOrFail($step);
        return view("pages.room.exam.question-create", compact('exam', 'room','step'));
    }

    public function questionEdit($room, $exam, $step,$id)
    {
        $room = Room::getRoom($room);
        $exam = Exam::getExam($exam);
        $step = ExamStep::findOrFail($step);
        return view("pages.room.exam.question-edit", compact('exam', 'room','step','id'));
    }

}
