<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestChoice;
use Livewire\Component;

class Discussion extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;
    public $rightAnswer = 0;
    public $wrongAnswer = 0;
    public $blankAnswer = 0;
    public $totalPoint = 0;
    public $totalHighValue = 0;
    public $graduate;

    public $sekdinPoint;
    public $sekdinWrong;
    public $sekdinRight;
    public $sekdinBlank;

    public function mount()
    {
        if ($this->examUser->exam->exam_type_id == 1) {
            $this->ukom();
        } elseif ($this->examUser->exam->exam_type_id == 2) {
            $this->sekdin();
        }

        $this->wrongAnswer = $this->wrongAnswer - $this->blankAnswer;
//        $this->totalPoint=$this->rightAnswer*
        $this->countQuest = $this->examUser->examAnswers->count();
        $this->changeActive(0);
    }

    public function ukom()
    {
        foreach ($this->examUser->examAnswers as $i => $eu) {
            if ($eu->answer == 0) {
                $this->blankAnswer += 1;
            }
            $answer = $eu->examQuest->answer == $eu->answer;
            $this->totalHighValue += $eu->examQuest->examStep->score_right;
            if ($answer) {
                $this->rightAnswer += 1;
                $this->totalPoint += $eu->examQuest->examStep->score_right;
            } else {
                $this->wrongAnswer += 1;
            }
        }
        if ($this->totalHighValue * 0.8 < $this->totalPoint) {
            $this->graduate = "Lulus";
        } else {
            $this->graduate = "Tidak lulus";
        }
    }

    public function sekdin()
    {
        foreach ($this->examUser->examAnswers as $i => $eu) {
            $answer = $eu->examQuest->answer == $eu->answer;
            if ($eu->answer == 0) {
//                $this->blankAnswer += 1;
                if (isset($this->sekdinBlank[$eu->examQuest->exam_step_id])) {
                    $this->sekdinBlank[$eu->examQuest->exam_step_id] += 1;
                }else{
                    $this->sekdinBlank[$eu->examQuest->exam_step_id] = 1;
                }
            } else if ($eu->examQuest->examStep->type_exam == 2) {
                if (isset($this->sekdinPoint[$eu->examQuest->exam_step_id])) {
                    $this->sekdinPoint[$eu->examQuest->exam_step_id] += ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first()->score;
                } else {
                    $this->sekdinPoint[$eu->examQuest->exam_step_id] = ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first()->score;
                }
            } else {
                if ($answer) {
                    if (isset($this->sekdinPoint[$eu->examQuest->exam_step_id])) {
                        $this->sekdinPoint[$eu->examQuest->exam_step_id] += $eu->examQuest->examStep->score_right;
                    } else {
                        $this->sekdinPoint[$eu->examQuest->exam_step_id] = $eu->examQuest->examStep->score_right;
                    }
                }
            }
            if ($answer) {
                if (isset($this->sekdinRight[$eu->examQuest->exam_step_id])) {
                    $this->sekdinRight[$eu->examQuest->exam_step_id] += 1;
                }else{
                    $this->sekdinRight[$eu->examQuest->exam_step_id] = 1;
                }
            } else {
//                $this->wrongAnswer += 1;
                if (isset($this->sekdinWrong[$eu->examQuest->exam_step_id])) {
                    $this->sekdinWrong[$eu->examQuest->exam_step_id] += 1;
                }else{
                    $this->sekdinWrong[$eu->examQuest->exam_step_id] = 1;
                }
            }
        }
//        if ($this->totalHighValue * 0.8 < $this->totalPoint) {
//            $this->graduate = "Lulus";
//        } else {
//            $this->graduate = "Tidak lulus";
//        }
//        dd($this->sekdinPoint);
    }

    public function changeActive($number)
    {
        $this->questActive = $this->examUser->examAnswers[$number];
        $this->active = $this->questActive->id;
        $this->number = $number;
    }

//    public function setDone()
//    {
//        ExamUser::setDone($this->examUser->id);
//        $this->emit('notify', [
//            'type' => 'success',
//            'title' => 'Ujian telah diselsaikan',
//        ]);
//        $this->emit('redirect', route('admin.program.index', $this->exam->slug));
//    }

//    public function changeAnswer($choice)
//    {
//        if (Carbon::now() > $this->examUser->created_at->addMinutes($this->exam->time)) {
//            ExamUser::setDone($this->examUser->id);
//            $this->emit('notify', [
//                'type' => 'success',
//                'title' => 'Waktu pengerjaan telah selesai',
//            ]);
//            $this->emit('redirect', route('admin.program.index', $this->exam->slug));
//        }
//        $this->examUser->examAnswers->find($this->active)->update(['answer' => $choice]);
//        $this->questActive = $this->examUser->examAnswers->find($this->active);
//    }

    public function render()
    {
        return view('livewire.discussion');
    }
}
