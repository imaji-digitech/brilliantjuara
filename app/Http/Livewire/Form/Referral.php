<?php

namespace App\Http\Livewire\Form;

use App\Models\BaseReferral;
use Livewire\Component;

class Referral extends Component
{
    public $action;
    public $data;
    public $dataId;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'discount' => 0
        ];
        if ($this->dataId!=null){
            $data=BaseReferral::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'discount'=>$data->content
            ];
        }
    }
    protected function getRules()
    {
        return [
            'data.title'=>'required',
            'data.discount'=>'required',
        ];
    }

    public function create()
    {
        $this->validate();
        BaseReferral::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Referral berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.referral.index'));
    }

    public function update()
    {
        $this->validate();
        BaseReferral::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Referral berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.referral.index'));
    }
    public function render()
    {
        return view('livewire.form.referral');
    }
}
