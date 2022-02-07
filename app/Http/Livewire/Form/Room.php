<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Str;
use Livewire\Component;

class Room extends Component
{
    public $action;
    public $data;
    public $dataId;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'slug' => ''
        ];
        if ($this->dataId != null) {
            $data = \App\Models\Room::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'slug' => $data->slug
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->data['slug'] = Str::slug($this->data['title']);
        \App\Models\Room::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.room.index'));
    }

    public function update()
    {
        $this->validate();
        $this->data['slug'] = Str::slug($this->data['title']);
        \App\Models\Room::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.room.index'));
    }

    public function render()
    {
        return view('livewire.form.room');
    }

    protected function getRules()
    {
        return ['data.title' => 'required|max:255'];
    }
}
