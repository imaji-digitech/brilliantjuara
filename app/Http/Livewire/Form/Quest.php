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
    public $optionAnswer;
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
        $this->optionAnswer=[
            ['value'=>1,'title'=>'A'],
            ['value'=>2,'title'=>'B'],
            ['value'=>3,'title'=>'C'],
            ['value'=>4,'title'=>'D'],
            ['value'=>5,'title'=>'E'],
        ];
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
            foreach ($data->examQuestChoices as $i => $eqc) {
                if ($this->exam->exam_type == 1) {
                    $this->{'choice' . ($i + 1)} = $eqc->answer;
                } else {
                    $this->{'choice' . ($i + 1)} = $eqc->answer;
                    $this->{'score' . ($i + 1)} = $eqc->score;
                }
            }
        }
    }

    public function create()
    {
        $quest = ExamQuest::create($this->data);
        $this->choice($quest);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
        ]);

        $this->emit('redirect', route('admin.exam.show', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));
    }
    public function choice($quest){
        for ($i = 1; $i <= 5; $i++) {
            if ($this->exam->exam_type == 1) {
                ExamQuestChoice::create([
                    'exam_quest_id' => $quest->id,
                    'answer' => $this->{'choice' . $i},
                    'equation' => '',
                    'score' => 0,
                    'choice' => $i,
                ]);
            } else {
                ExamQuestChoice::create([
                    'exam_quest_id' => $quest->id,
                    'answer' => $this->{'choice' . $i},
                    'equation' => '',
                    'score' => $this->{'score' . $i},
                    'choice' => $i,
                ]);
            }
        }
    }

    public function update()
    {
        $this->validate();
        $quest = ExamQuest::find($this->dataId);
        $quest->update($this->data);
        ExamQuestChoice::where('exam_quest_id',$this->dataId)->delete();
        $this->choice($quest);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
        ]);

        $this->emit('redirect', route('admin.exam.question', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));
    }

    public function render()
    {
        return view('livewire.form.quest');
    }

    protected function getRules()
    {
        return [
            'data.question' => 'required',
            'data.answer' => 'required',
        ];
    }
}
