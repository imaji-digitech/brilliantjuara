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
    public $roomId;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'created_at'=>Carbon::now(),
            'room_id'=>$this->roomId
        ];
        if ($this->dataId!=null){
            $data=PublicEvent::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'created_at'=>$data->created_at,
                'room_id'=>$this->roomId
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
        if ($this->roomId==null){
            $this->emit('redirect', route('admin.event.index'));
        }else{
            $this->emit('redirect', route('admin.room.event.index',\App\Models\Room::find($this->roomId)->slug));
        }
    }

    public function update()
    {
        $this->validate();
        PublicEvent::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        if ($this->roomId==null){
            $this->emit('redirect', route('admin.event.index'));
        }else{
            $this->emit('redirect', route('admin.room.event.index',$this->roomId));
        }
    }

    public function render()
    {
        return view('livewire.form.event');
    }
}
