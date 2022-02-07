<?php

namespace App\Http\Livewire\Form;

use App\Models\ExamQuest;
use App\Models\ExamQuestChoice;
use App\Models\ExamStep;
use Livewire\Component;

class Quest extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $examStepId;
    public $exam;
    public $optionType;
    public $choice1;
    public $choice2;
    public $choice3;
    public $choice4;
    public $choice5;
    public $score1;
    public $score2;
    public $score3;
    public $score4;
    public $score5;

    public function mount()
    {
        $this->exam = ExamStep::find($this->examStepId);
        $this->data = [
            'exam_step_id' => $this->examStepId,
            'equation' => '',
            'question' => '',
            'answer' => 1,
        ];
        if ($this->dataId != null) {
            $data = ExamQuest::find($this->dataId);
            $this->data = [
                'exam_step_id' => $this->examStepId,
                'equation' => $data->equation,
                'question' => $data->question,
                'answer' => $data->answer,
            ];
        }
    }

    public function create()
    {
//        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        $quest = ExamQuest::create($this->data);
        for ($i = 1; $i <= 5; $i++) {
            if ($this->exam->exam_type==1){
                ExamQuestChoice::create([
                    'exam_quest_id'=>$quest->id,
                    'answer' => $this->{'choice'.$i},
                    'equation' => '',
                    'score' => 0,
                    'choice' => $i,
                ]);
            }else{
                ExamQuestChoice::create([
                    'exam_quest_id'=>$quest->id,
                    'answer' => $this->{'choice'.$i},
                    'equation' => '',
                    'score' => $this->{'score'.$i},
                    'choice' => $i,
                ]);
            }
        }
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.exam.show', [$this->exam->room->slug, $this->exam->slug]));
    }

    public function update()
    {
        $this->validate();
        $this->data['slug'] = generateRandomString(20);
        $quest = ExamQuest::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.exam.show', [$this->exam->room->slug, $this->exam->slug]));
    }

    public function render()
    {
        return view('livewire.form.quest');
    }

    protected function getRules()
    {
        return [
            'data.title' => 'required'
        ];
    }
}
