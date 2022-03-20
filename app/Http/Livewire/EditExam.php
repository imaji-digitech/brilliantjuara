<?php

namespace App\Http\Livewire;

use App\Models\ExamUser;
use App\Models\ReportQuest;
use Carbon\Carbon;
use Livewire\Component;

class EditExam extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;
    public $start;
    public $quest;
    protected $listeners = ['changeActive'];

    public function mount()
    {
        $this->quest = [];
        foreach ($this->exam->examSteps as $es) {
            foreach ($es->examQuests as $eq) {
                array_push($this->quest, $eq);
            }
        }
        $this->countQuest = count($this->quest);
        $this->changeActive($this->start);
    }

    public function changeActive($number)
    {
        $this->questActive = $this->quest[$number];
        $this->active = $this->questActive['id'];
        $this->number = $number;
        if ($this->questActive['equation']!=null){
            $this->emit('mathQuill', 'question');
        }
        if ($this->questActive['discussion_equation']!=null) {
            $this->emit('mathQuill', 'discussion');
        }
        foreach (\App\Models\ExamQuestChoice::whereExamQuestId($this->questActive['id'])->get() as $eqc){
            if($eqc->equation!=null) {
                $this->emit('mathQuill', 'eq'.$eqc->choice);
            }
        }
    }
//    public function report($id){
//        ReportQuest::create([
//            'user_id'=>auth()->id(), 'exam_quest_id'=>$id
//        ]);
//        $this->emit('notify', [
//            'type' => 'success',
//            'title' => 'Terima kasih telah melapor admin akan segera melihat permasalahan soal',
//        ]);
//    }

    public function setDone()
    {
//        ExamUser::setDone($this->examUser->id);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Edit diselsaikan',
        ]);
        $this->emit('redirect', route('admin.exam.show', [$this->exam->room->slug, $this->exam->slug]));
    }


    public function render()
    {
        return view('livewire.edit-exam');
    }
}
