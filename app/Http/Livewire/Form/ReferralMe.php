<?php

namespace App\Http\Livewire\Form;

use App\Models\ReferralCode;
use Livewire\Component;

class ReferralMe extends Component
{
    public $data;
    public $dataId;
    public $me;


    public function mount()
    {
        $this->me = ReferralCode::findOrFail($this->dataId);
        $this->data['code'] = $this->me->code;
    }

    public function edit()
    {
        $this->validate();
        $code = ReferralCode::whereCode($this->data['code'])->get();
        if ($this->data['code'] == $this->me->code) {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'anda tidak merubah referral anda',
            ]);

        } elseif ($code->count() > 0) {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'code ini telah dipakai orang lain coba yang lain',
            ]);
        } else {
            $this->me->update($this->data);
            $this->emit('notify', [
                'type' => 'success',
                'title' => 'Berhasil merubah code',
            ]);
            $this->emit('redirect', route('admin.referral.me.use', $this->dataId));
        }

    }

    public function render()
    {
        return view('livewire.form.referral-me');
    }

    protected function getRules()
    {
        return [
            'data.code' => 'max:15|min:6|required|regex:/^[a-zA-Z]+$/u'
        ];
    }
    protected $messages = [
        'data.code.max' => 'Maksimal kode adalah 15.',
        'data.code.min' => 'Minimal kode adalah 6.',
        'data.code.regex' => 'Hanya menerima huruf.',
    ];
}
