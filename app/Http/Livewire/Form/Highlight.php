<?php

namespace App\Http\Livewire\Form;

use App\Models\CourseHighlight;
use Livewire\Component;

class Highlight extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $courseId;
    public $course;

    public function mount()
    {
        $this->course = \App\Models\Course::getCourse($this->courseId);
        $this->data = [
            'course_id' => $this->course->id,
            'title' => '',
        ];
        if ($this->dataId != null) {
            $data = CourseHighlight::find($this->dataId);
            $this->data = [
                'title' => $data->title,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        \App\Models\CourseHighlight::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.course.show',[$this->course->room->slug,$this->course->slug]));
    }

    public function render()
    {
        return view('livewire.form.highlight');
    }

    protected function getRules()
    {
        return [
            'data.title' => 'required'
        ];
    }
}
