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
    public $optionStatus;
    public $optionExamType;

    public function mount()
    {
        $this->optionStatus = [
            ['title' => 'Aktif', 'value' => 1],
            ['title' => 'Tidak aktif', 'value' => 2],
        ];
        $this->optionExamType = [
            ['title' => 'UKOM', 'value' => 1],
            ['title' => 'SEKDIN', 'value' => 2],
            ['title' => 'CPNS', 'value' => 3],
        ];
        $this->room = \App\Models\Room::getRoom($this->roomId);
        $this->data = [
            'room_id' => $this->room->id,
            'title' => '',
            'slug' => '',
            'price' => 0,
            'time' => 0,
            'status_discussion' => 2,
            'status_multiple_attempt' => 2,
            'status_view_score' => 2,
            'exam_type_id' => 1
        ];
        if ($this->dataId != null) {
            $data = \App\Models\Exam::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'slug' => $data->slug,
                'price' => $data->price,
                'time' => $data->time,
                'status_discussion' => $data->status_discussion,
                'status_multiple_attempt' => $data->status_multiple_attempt,
                'status_view_score' => $data->status_view_score,
                'exam_type_id' => $data->exam_type_id
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
        $this->emit('redirect', route('admin.exam.index', $this->room->slug));
    }

    public function update()
    {
        $this->validate();
        \App\Models\Exam::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.exam.index', $this->room->slug));
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
