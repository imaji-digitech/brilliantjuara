<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProgramBanner extends Component
{
    public $banners;
    public function render()
    {
//        dd($this->banners);
        return view('livewire.program-banner');
    }
}
