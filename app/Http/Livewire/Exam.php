<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Exam extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;

    public function mount(){
        $this->countQuest=$this->examUser->examAnswers->count();
        $this->changeActive(0);
    }
    public function changeActive($number){
        $this->questActive=$this->examUser->examAnswers[$number];
        $this->active=$this->questActive->id;
        $this->number=$number;
    }
    public function changeAnswer($choice){
        $this->examUser->examAnswers->find($this->active)->update(['answer'=>$choice]);
        $this->questActive=$this->examUser->examAnswers->find($this->active);

    }
    public function render()
    {
        return view('livewire.exam');
    }
}
