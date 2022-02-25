<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamUser;
use App\Models\Ranking;
use App\Models\UserHasDownload;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function index($slug)
    {
        $examUser = ExamUser::class;
        $exam = Exam::getExam($slug);
        $examUserCheck = ExamUser::whereExamId($exam->id)->whereUserId(auth()->id())->get();
        return view('pages.exam.index', compact('exam', 'examUser','examUserCheck'));
    }

    public function start($slug)
    {
        $exam = Exam::getExam($slug);
        if ($exam->status_multiple_attempt != 1) {
            if (ExamUser::whereUserId(auth()->id())->whereExamId($exam->id)->first() != null) {
                return redirect(route('admin.user.exam', $slug));
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
        if (auth()->user()->role==1) {
            $examUser = ExamUser::whereId($id)->firstOrFail();
        }else{
            $examUser = ExamUser::whereId($id)->whereUserId(auth()->id())->firstOrFail();
        }
        return view('pages.exam.discussion', compact('examUser', 'exam'));
    }
    public function result($slug,$id)
    {
        $exam = Exam::getExam($slug);
        $examUser = ExamUser::whereId($id)->whereUserId(auth()->id())->firstOrFail();
        return view('pages.exam.result', compact('examUser', 'exam'));
    }
    public function ranking($slug)
    {
        $exam=Exam::getExam($slug);
        $examQuestCount=0;
        foreach ($exam->examSteps as $e){
            $examQuestCount+=$e->examQuests->count();
        }
        $ranking=Ranking::whereExamId($exam->id)->orderBy('point','desc')->get();
//        dd($ranking);
        return view('pages.exam.ranking',compact('exam','ranking','examQuestCount'));
    }
    public function rankingRemove($id){
        $rank=Ranking::find($id);
        $rank->delete();
        return redirect()->back();
    }
    public function download($slug){

        $exam=Exam::getExam($slug);
        UserHasDownload::create(['user_id'=>auth()->id(),'exam_id'=>$exam->id]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.discussion',compact('exam'))->setPaper('A4', 'portrait');;
        return $pdf->stream("Pembahasan-".Str::slug($exam->title).".pdf");

    }

}
