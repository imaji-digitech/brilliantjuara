<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Result extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;
    public $rightAnswer;
    public $rightWrongAnswer;

    public function mount()
    {
        foreach ($this->examUser->examAnswers as $i => $eu) {
            $answer = $eu->examQuest->answer == $eu->answer;
        }
    }

    public function render()
    {
        return view('livewire.result');
    }
}
