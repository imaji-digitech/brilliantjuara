<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Livewire\Component;

class ReferralCanUse extends Component
{
    public $optionUsers;
    public $canUse ;
    public $dataId;

    public function mount()
    {
        $this->canUse=[];
        $this->optionUsers = eloquent_to_options(User::get(), 'id', 'name');
    }
    public function add(){
        foreach ($this->canUse as $can){
            \App\Models\ReferralCode::create([
                'base_referral_id'=>$this->dataId, 'user_id'=>$can
            ]);
        }
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Referral berhasil ditambahkan orangnya',
        ]);
        $this->emit('redirect', route('admin.referral.can.use',$this->dataId));
    }

    public function render()
    {
        return view('livewire.form.referral-can-use');
    }
}
