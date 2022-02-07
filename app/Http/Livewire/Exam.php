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

    public function mount(){
        $this->countQuest=$this->examUser->examAnswers->count();
    }
    public function changeActive($id){
        $this->active=$id;
        $this->questActive=$this->examUser->examAnswers->find($id);
//        dd($this->examUser->examAnswers);
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
