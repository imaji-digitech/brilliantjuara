<?php

namespace App\Http\Livewire;

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
        $this->last=Carbon::now();
    }
    public function render()
    {
        $this->score();
        return view('livewire.livescore');
    }
}
