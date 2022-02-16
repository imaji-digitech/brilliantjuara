<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToStart extends Component
{
    public $exam;
    public $examUserCheck;
    protected $listeners = ["exam" => "exam"];
    public function render()
    {
        return view('livewire.to-start');
    }
    public function start(){
        $total=0;
        foreach ($this->exam->examSteps as $es) {
            $total+=$es->examQuests->count();
        }
        $this->emit('swal:confirm', [
            'title' => $this->exam->title,
            'icon' => 'warning',
            'confirmText' => 'Confirm',
//            'cancelText' => 'Batal',
            'text' => 'banyak soal : '.$total.'<br>'
            .'waktu pengerjaan : '.$this->exam->time,
            'method' => 'exam']);
    }
    public function exam(){
        $this->emit('redirect', route('admin.user.exam.start',$this->exam->slug));
    }
}
