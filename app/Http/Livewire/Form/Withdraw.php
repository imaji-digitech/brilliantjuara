<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Livewire\Component;

class Withdraw extends Component
{
    public $data;
    public $option;
    protected $messages = [
        'data.money.min' => 'minimal pengambilan 100.000.'
    ];

    public function mount()
    {
        $this->data['money'] = auth()->user()->withdraw;
        $this->data['user_id'] = auth()->user()->id;
        $this->option=eloquent_to_options(User::where('commission','!=',0)->get(),'id','key');
//        dd($this->data);
    }

    public function withdraw()
    {
        $this->validate();
        if (auth()->user()->commission < $this->data['money']) {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'Komisi anda tidak mencukupi untuk pengambilan ini',
            ]);
        }
        \App\Models\Withdraw::create(
            $this->data
        );
        auth()->user()->update([
            'commission' => auth()->user()->commission - $this->data['money']
        ]);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Berhasil melakukan pengambilan tunggu admin untuk melakukan verifikasi',
        ]);
        $this->emit('redirect', route('admin.referral.me.use'));
    }

    public function render()
    {
        return view('livewire.form.withdraw');
    }

    protected function getRules()
    {
        if (auth()->user()->role==1){
            return [
                'data.money' => 'required|numeric',
                'data.bank_name' => 'required|max:255',
                'data.no_rek' => 'required|max:255',
            ];
        }else {
            return [
                'data.money' => 'required|numeric|min:100000',
                'data.bank_name' => 'required|max:255',
                'data.no_rek' => 'required|max:255',
            ];
        }
    }
}
