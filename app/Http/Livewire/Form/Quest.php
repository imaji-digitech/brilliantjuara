<?php

namespace App\Http\Livewire\Form;

use App\Models\ExamQuest;
use App\Models\ExamQuestChoice;
use App\Models\ExamStep;
use Livewire\Component;

class Quest extends Component
{
    public $number;
    public $data;
    public $dataId;
    public $action;
    public $examType;
    public $examStepId;
    public $exam;
    public $optionType;
    public $optionAnswer;
    public $choice1;
    public $choice2;
    public $choice3;
    public $choice4;
    public $choice5;
    public $equation1;
    public $equation2;
    public $equation3;
    public $equation4;
    public $equation5;
    public $score1;
    public $score2;
    public $score3;
    public $score4;
    public $score5;


    public function mount()
    {
//        dd($this->number);
        $this->optionAnswer=[
            ['value'=>1,'title'=>'A'],
            ['value'=>2,'title'=>'B'],
            ['value'=>3,'title'=>'C'],
            ['value'=>4,'title'=>'D'],
            ['value'=>5,'title'=>'E'],
        ];
        if ($this->number==null){
            $this->exam = ExamStep::find($this->examStepId);
            $this->examType=$this->exam->type_exam;
            $this->data = [
                'exam_step_id' => $this->examStepId,
                'equation' => '',
                'question' => '',
                'answer' => 1,
                'discussion' => '',
                'discussion_equation'=>''
            ];
        }
        if ($this->dataId != null) {
            $data = ExamQuest::find($this->dataId);
            $this->data = [
                'exam_step_id' => $data->exam_step_id,
                'equation' => $data->equation,
                'question' => $data->question,
                'answer' => $data->answer,
                'discussion' => $data->discussion,
                'discussion_equation'=>$data->discussion_equation
            ];
            foreach ($data->examQuestChoices as $i => $eqc) {
                if ($data->examStep->type_exam == 1) {
                    $this->{'choice' . ($i + 1)} = $eqc->answer;
                    $this->{'equation' . ($i + 1)} = $eqc->equation;
                } else {
                    $this->{'choice' . ($i + 1)} = $eqc->answer;
                    $this->{'score' . ($i + 1)} = $eqc->score;
                    $this->{'equation' . ($i + 1)} = $eqc->equation;
                }
            }
            $this->examType=$data->examStep->type_exam;
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
//            $this->emit('redirect', route('admin.exam.show', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));
        $this->emit('redirect', route('admin.exam.question', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));

    }
    public function choice($quest){
        for ($i = 1; $i <= 5; $i++) {
            if ($this->examType == 1) {
                ExamQuestChoice::create([
                    'exam_quest_id' => $quest->id,
                    'answer' => $this->{'choice' . $i},
                    'equation' => $this->{'equation' . $i},
                    'score' => 0,
                    'choice' => $i,
                ]);
            } else {
                ExamQuestChoice::create([
                    'exam_quest_id' => $quest->id,
                    'answer' => $this->{'choice' . $i},
                    'equation' => $this->{'equation' . $i},
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


        if ($this->number==null){
            $this->emit('redirect', route('admin.exam.show', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));
//            $this->emit('redirect', route('admin.exam.question', [$this->exam->exam->room->slug, $this->exam->exam->slug, $this->examStepId]));
        }else{
            $this->emit('redirect', route('admin.exam.exam-edit', [$quest->examStep->exam->room->slug, $quest->examStep->exam->slug, $this->number]));
        }
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
