<?php

namespace App\Http\Livewire\Form;

use App\Models\ExamStep;
use Livewire\Component;

class Step extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $examId;
    public $exam;
    public $optionType;

    public function mount()
    {
        $this->exam = \App\Models\Exam::getExam($this->examId);
        $this->optionType=[
            ['title'=>'static','value'=>1],
            ['title'=>'dynamic','value'=>2],
        ];
        $this->data = [
            'exam_id' => $this->exam->id,
            'title' => '',
            'type_exam'=>1,
            'score_right'=>0,
            'score_wrong'=>0,
        ];
        if ($this->dataId != null) {
            $data = ExamStep::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'exam_id' => $data->exam_id,
                'type_exam'=>$data->type_exam,
                'score_right'=>$data->score_right,
                'score_wrong'=>$data->score_wrong,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        ExamStep::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.exam.show',[$this->exam->room->slug,$this->exam->slug]));
    }
    public function update()
    {
        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        ExamStep::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.exam.show',[$this->exam->room->slug,$this->exam->slug]));
    }
    public function render()
    {
        return view('livewire.form.step');
    }

    protected function getRules()
    {
        return [
            'data.title' => 'required'
        ];
    }
}
