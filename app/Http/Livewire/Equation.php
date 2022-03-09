<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Equation extends Component
{
    public $equation;
    protected $listeners = ['refresh'];

    public function refresh($e)
    {
        $this->equation = $e;
    }

    public function render()
    {
        return view('livewire.equation');
    }
}
