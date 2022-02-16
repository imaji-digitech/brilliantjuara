<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Exam extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $roomId;
    public $room;

    public function mount()
    {
        $this->room=\App\Models\Room::getRoom($this->roomId);
        $this->data = [
            'room_id'=>$this->room->id,
            'title' => '',
            'slug' => '',
            'price'=>0,
            'time'=>0,
            'status_discussion',
            'status_multiple_attempt',
            'status_view_score'=>1
        ];
        if ($this->dataId != null) {
            $data = \App\Models\Exam::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'slug' => $data->slug,
                'price'=>$data->price,
                'time'=>$data->time
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        \App\Models\Exam::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.exam.index',$this->room->slug));
    }

    public function update()
    {
        $this->validate();
        \App\Models\Exam::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.exam.index',$this->room->slug));
    }

    public function render()
    {
        return view('livewire.form.exam');
    }

    protected function getRules()
    {
        return ['data.title' => 'required|max:255'];
    }
}
