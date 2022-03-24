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
//    public $ra;

    public function mount()
    {
        $this->exam = \App\Models\Exam::getExam($this->exam);

    }


    public function render()
    {
        $this->score();
        return view('livewire.livescore');
    }

    public function score()
    {
        $this->rankings = RankingSekdin::whereHas('examUser', function ($q) {
            $q->whereExamId($this->exam->id);
        })->get();

//        $ra = [];
        foreach ($this->rankings as $r) {
            $sekdinPoint = [];
            foreach ($r->examUser->examAnswers as $i => $eu) {
                $answer = $eu->examQuest->answer == $eu->answer;
                $step = $eu->examQuest->exam_step_id;
                if (!isset($sekdinPoint[$step])) {
                    $sekdinPoint[$step] = 0;
                }
                if ($eu->examQuest->examStep->type_exam == 2) {
                    if (isset($sekdinPoint[$step]) and $eu->answer != 0) {
                        $sekdinPoint[$step] += ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first()->score;
                    }
                } else {
                    if ($answer) {
                        if (isset($sekdinPoint[$step])) {
                            $sekdinPoint[$step] += $eu->examQuest->examStep->score_right;
                        }
                    }
                }
            }


            $r->point = $sekdinPoint;
            $r->total = array_sum($sekdinPoint);
//            array_push($ra, $r);
        }
        $this->rankings= $this->rankings->sortByDesc('total');

        $this->last = Carbon::now();
    }
}
