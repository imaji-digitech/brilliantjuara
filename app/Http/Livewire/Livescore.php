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
    public $ra;

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

        $ra = [];
        foreach ($this->rankings as $r) {
            $sekdinPoint = [];
            foreach ($r->examUser->examAnswers as $i => $eu) {
                $answer = $eu->examQuest->answer == $eu->answer;
                $step=$eu->examQuest->exam_step_id;
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
            array_push($ra,$r);
        }
                                dd($this->rankings);
//        for ($i=0;$i<count($ra)-1;$i++){
//            for ($i=0;$i<count($ra)-1;$i++) {
//                if ($ra[$i]->total < $ra[$i + 1]->total) {
//
//                }
//            }
//        }

//        $n = sizeof($arr);

        // Traverse through all array elements
        for($i = 0; $i < count($ra); $i++)
        {
            // Last i elements are already in place
            for ($j = 0; $j < count($ra) - $i - 1; $j++)
            {
                // traverse the array from 0 to n-i-1
                // Swap if the element found is greater
                // than the next element
                if ($ra[$j]->total < $ra[$j+1]->total)
                {
                    $t = $ra[$j];
                    $ra[$j] = $ra[$j+1];
                    $ra[$j+1] = $t;
                }
            }
        }
        $this->ra=$ra;

        $this->last = Carbon::now();
    }
}
