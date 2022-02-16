<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamUser;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function index($slug)
    {
        $examUser = ExamUser::class;
        $exam = Exam::getExam($slug);
        $examUserCheck = ExamUser::whereExamId($exam->id)->whereUserId($exam->id)->get();
        return view('pages.exam.index', compact('exam', 'examUser','examUserCheck'));
    }

    public function start($slug)
    {
        $exam = Exam::getExam($slug);
        if ($exam->status_multiple_attempt != 1) {
            if (ExamUser::whereUserId(auth()->id())->whereExamId($exam->id)->first() != null) {
                return redirect(route('user.exam', $slug));
            }
        }
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
        $examUser = ExamUser::whereId($id)->whereUserId(auth()->id())->firstOrFail();
        $time = Carbon::now()->diffInSeconds($examUser->created_at->addMinutes($exam->time));
        if (Carbon::now() > $examUser->created_at->addMinutes($exam->time)) {
            return redirect(route('admin.program.index', $exam->room->slug));
        }
        return view('pages.exam.exam', compact('examUser', 'exam', 'time'));
    }

    public function discussion($slug,$id)
    {
        $exam = Exam::getExam($slug);
        $examUser = ExamUser::whereId($id)->whereUserId(auth()->id())->firstOrFail();
        return view('pages.exam.discussion', compact('examUser', 'exam'));
    }
    public function result($slug,$id)
    {
        $exam = Exam::getExam($slug);
        $examUser = ExamUser::whereId($id)->whereUserId(auth()->id())->firstOrFail();
        return view('pages.exam.result', compact('examUser', 'exam'));
    }

}
