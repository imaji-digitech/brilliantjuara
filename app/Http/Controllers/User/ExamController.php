<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamUser;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index($slug)
    {
        $examUser = ExamUser::class;
        $exam = Exam::getExam($slug);
        return view('pages.exam.index', compact('exam', 'examUser'));
    }

    public function start($slug)
    {
        $exam = Exam::getExam($slug);
        $examUser = ExamUser::create(['user_id' => auth()->id(), 'exam_id' => $exam->id]);
        foreach ($exam->examSteps as $es) {
            foreach ($es->examQuests as $eq) {
                ExamAnswer::create([
                    'exam_user_id' => $examUser->id,
                    'exam_quest_id' => $eq->id,
                    'answer' => 0
                ]);
            }
        }
        return redirect(route('admin.user.exam.exam', [$slug, $examUser->id]));
    }

    public function exam($slug, $id)
    {
        $exam = Exam::getExam($slug);
        $examUser = ExamUser::find($id);
        return view('pages.exam.exam', compact('examUser', 'exam'));
    }
}
