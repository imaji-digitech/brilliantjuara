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

    public function mount()
    {
        $this->quest=[];
        foreach ($this->exam->examSteps as $es) {
            foreach ($es->examQuests as $eq) {
                array_push($this->quest,$eq);
            }
        }
//        dd($this->quest);
        $this->countQuest = count($this->quest);
        if ($this->start==null) {
            $this->changeActive(0);
        }else{
            $this->changeActive($this->start);
        }
    }

    public function changeActive($number)
    {
        $this->questActive = $this->quest[$number];

        $this->active = $this->questActive['id'];
//        dd($this->questActive);
        $this->number = $number;
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
        $this->emit('redirect', route('admin.exam.show', [$this->exam->room->slug,$this->exam->slug]));
    }



    public function render()
    {
        return view('livewire.edit-exam');
    }
}
