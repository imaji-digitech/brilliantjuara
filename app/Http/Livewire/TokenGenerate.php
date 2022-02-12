<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TokenGenerate extends Component
{
    public $room;
    public $dataId;
    public $number;
    public function generate(){
        if ($this->number==null){
            $this->emit('notify', [
                'type' => 'error',
                'title' => 'tidak boleh kosong',
            ]);
        }else{
            $this->emit('redirect', route('admin.bundle.token.create',[$this->room,$this->dataId,$this->number]));
        }
    }
    public function render()
    {
        return view('livewire.token-generate');
    }
}
