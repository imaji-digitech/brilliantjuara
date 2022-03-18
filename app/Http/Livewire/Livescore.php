<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestChoice;
use App\Models\RankingSekdin;
use Carbon\Carbon;
use Livewire\Component;

class Livescore extends Component
{
    public $rankings;
    public $exam;
    public $last;

    public function mount(){
        $this->exam=\App\Models\Exam::getExam($this->exam);
    }
    public function score(){
        $this->rankings=RankingSekdin::whereHas('examUser',function ($q){
            $q->whereExamId($this->exam->id);
        })->get();
        foreach ($this->rankings as $r){
            $sekdinPoint=[];
            foreach ($r->examUser->examAnswers as $i => $eu) {
                $answer = $eu->examQuest->answer == $eu->answer;
                if (!isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                    $sekdinPoint[$eu->examQuest->exam_step_id] = 0;
                }
                if ($eu->examQuest->examStep->type_exam == 2) {
                    if (isset($sekdinPoint[$eu->examQuest->exam_step_id]) and $eu->answer!=0) {
                        $sekdinPoint[$eu->examQuest->exam_step_id] += ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first()->score;
                    }
                } else {
                    if ($answer) {
                        if (isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                            $sekdinPoint[$eu->examQuest->exam_step_id] += $eu->examQuest->examStep->score_right;
                        }
                    }
                }
            }
            $r->point=$sekdinPoint;
            $r->total=array_sum($sekdinPoint);
        }
        $this->rankings->sortByDesc('total');
//        usort($this->rankings, function($a, $b) {
//            strcmp($a->total, $b->total);
//        } );


        $this->last=Carbon::now();
    }

    public function render()
    {
        $this->score();
        return view('livewire.livescore');
    }
}
