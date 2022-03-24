<?php

namespace App\Http\Livewire\Form;

use App\Models\CourseType;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseDetail extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $courseId;
    public $course;
    public $optionHighlight;
    public $optionDetail;
    public $type;
    public $file;
    public $optionExam;
    use WithFileUploads;

    public function mount()
    {

        $this->course = \App\Models\Course::getCourse($this->courseId);
        $highlight = $this->course->courseHighlights[0]->id;
        $this->optionHighlight = eloquent_to_options($this->course->courseHighlights, 'id', 'title');
//        dd($this->course->room->exams);
        $this->optionExam = eloquent_to_options($this->course->room->exams,'slug','title');
//        dd($this->optionExam);
        $this->optionDetail = eloquent_to_options(CourseType::get(), 'id', 'title');
        $this->data = [
            'course_highlight_id' => $highlight,
            'course_type_id' => $this->type,
            'title' => '',
            'content' => '',
        ];
        if ($this->dataId != null) {
            $data = \App\Models\CourseDetail::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'course_highlight_id' => $data->course_highlight_id,
                'course_type_id' => $data->course_type_id,
                'content' => $data->content,
            ];
        }
    }

    public function create()
    {
        $this->validate();

        if ($this->type == 3) {
            $filename = Str::slug($this->data['title']) . '.' . $this->file->getClientOriginalExtension();
            $this->data['content'] = 'course-files/' . $filename;
            $this->file->storeAs('public/course-files', $filename);
        }
        \App\Models\CourseDetail::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.course.show', [$this->course->room->slug, $this->course->slug]));
    }

    public function update()
    {
        $this->validate();
        if ($this->type == 3) {
            $filename = Str::slug($this->data['title']) . '.' . $this->file->getClientOriginalExtension();
            $this->data['content'] = 'course-files/' . $filename;
            $this->file->storeAs('public/course-files', $filename);
        }
        \App\Models\CourseDetail::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.course.show', [$this->course->room->slug, $this->course->slug]));
    }

    public function render()
    {
        return view('livewire.form.course-detail');
    }

    protected function getRules()
    {
        if ($this->type == 3) {
            return [
                'data.title' => 'required',
                'file' => 'required'
            ];
        }else {
            return [
                'data.title' => 'required'
            ];
        }
    }
}
