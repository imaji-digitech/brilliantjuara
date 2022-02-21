<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChartResult extends Component
{
    public $idComponent;
    public $right;
    public $wrong;
    public $blank;

    public function render()
    {
        return view('livewire.chart-result');
    }
}
