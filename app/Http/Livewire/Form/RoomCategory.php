<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class RoomCategory extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $optionNumber;
    public $before;

    public function mount()
    {
        $this->optionNumber = [];
        $number = \App\Models\RoomCategory::get()->count();
        for ($i = 1; $i <= $number; $i++) {
            array_push($this->optionNumber, ['title' => $i, 'value' => $i]);
        }
        $this->data = [
            'title' => '',
            'order' => $number + 1
        ];
        if ($this->dataId != null) {
            $data = \App\Models\RoomCategory::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'order' => $data->order
            ];
            $this->before = $data->order;
        }
    }

    public function create()
    {
        $this->validate();
        \App\Models\RoomCategory::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.room-category.index'));
    }

    public function update()
    {
        $this->validate();
        if ($this->before==$this->data['order']){
            \App\Models\RoomCategory::find($this->dataId)->update($this->data);
        }else{
            \App\Models\RoomCategory::whereOrder($this->data['order'])
                ->first()
                ->update(['order'=>$this->before]);
            \App\Models\RoomCategory::find($this->dataId)->update($this->data);
        }

        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.room-category.index'));
    }

    public function render()
    {
        return view('livewire.form.room-category');
    }

    protected function getRules()
    {
        return [
            'data.title' => 'required'
        ];
    }
}
