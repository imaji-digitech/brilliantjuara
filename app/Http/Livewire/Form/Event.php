<?php

namespace App\Http\Livewire\Form;

use App\Models\PublicEvent;
use Carbon\Carbon;
use Livewire\Component;

class Event extends Component
{
    public $action;
    public $data;
    public $dataId;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'created_at'=>Carbon::now()
        ];
        if ($this->dataId!=null){
            $data=PublicEvent::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'created_at'=>$data->created_at
            ];
        }
    }
    protected function getRules()
    {
        return [
            'data.title'=>'required',
        ];
    }

    public function create()
    {
        $this->validate();
        PublicEvent::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.event.index'));
    }

    public function update()
    {
        $this->validate();
        PublicEvent::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.event.index'));
    }

    public function render()
    {
        return view('livewire.form.event');
    }
}
