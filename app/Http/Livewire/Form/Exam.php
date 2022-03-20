<?php

namespace App\Http\Livewire\Form;

use Carbon\Carbon;
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
    public $examStart;

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
            'exam_type_id' => 1,
            'exam_start' => Carbon::now()->format('Y-m-d h:i'),
        ];
        $this->examStart = [
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('h:i'),
        ];
//        dd($this->data);
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
                'exam_type_id' => $data->exam_type_id,
                'exam_start' => $data->exam_start
            ];
            $this->examStart = [
                'date' => Carbon::parse($data->exam_start)->format('Y-m-d'),
                'time' => Carbon::parse($data->exam_start)->format('h:i'),
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->data['exam_start'] = $this->examStart['date'] . ' ' . $this->examStart['time'];
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
        $this->data['exam_start'] = $this->examStart['date'] . ' ' . $this->examStart['time'];
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
