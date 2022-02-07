<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Str;
use Livewire\Component;

class Course extends Component
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
            'price'=>0
        ];
        if ($this->dataId != null) {
            $data = \App\Models\Course::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'slug' => $data->slug,
                'price'=>$data->price,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        \App\Models\Course::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.course.index',$this->room->slug));
    }

    public function update()
    {
        $this->validate();
        \App\Models\Course::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.course.index',$this->room->slug));
    }

    public function render()
    {
        return view('livewire.form.course');
    }

    protected function getRules()
    {
        return ['data.title' => 'required|max:255'];
    }
}
