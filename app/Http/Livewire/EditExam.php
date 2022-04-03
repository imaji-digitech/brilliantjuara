<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestChoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditExam extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;
    public $start;
    public $quest;
    public $wrongAnalytic;
    public $rightAnalytic;
    public $totalAnalytic;
    public $answerAnalytic;
    protected $listeners = ['changeActive'];

    public function mount()
    {
        $this->quest = [];
        foreach ($this->exam->examSteps as $es) {
            foreach ($es->examQuests as $eq) {
                array_push($this->quest, $eq);
            }
        }
        $this->countQuest = count($this->quest);
        $this->changeActive($this->start);
    }

    public function changeActive($number)
    {
        $this->questActive = $this->quest[$number];
        $this->active = $this->questActive['id'];
        $this->number = $number;
        if ($this->questActive['equation'] != null) {
            $this->emit('mathQuill', 'question');
        }
        if ($this->questActive['discussion_equation'] != null) {
            $this->emit('mathQuill', 'discussion');
        }
        foreach (ExamQuestChoice::whereExamQuestId($this->questActive['id'])->get() as $eqc) {
            if ($eqc->equation != null) {
                $this->emit('mathQuill', 'eq' . $eqc->choice);
            }
        }
        $id = $this->questActive['id'];
        $this->wrongAnalytic = DB::select(DB::raw("
SELECT COUNT(*) as answer FROM `exam_answers`
    JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
WHERE exam_quest_id = $id AND exam_answers.answer!=exam_quests.answer"));
        $this->rightAnalytic = DB::select(DB::raw("
SELECT COUNT(*) as answer FROM `exam_answers`
    JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
WHERE exam_quest_id = $id AND exam_answers.answer=exam_quests.answer"));
        $this->totalAnalytic = DB::select(DB::raw("
SELECT COUNT(*) as answer FROM `exam_answers`
    JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
WHERE exam_quest_id = $id"));

        $this->answerAnalytic = DB::select(DB::raw("
SELECT COUNT(*) as c,exam_answers.answer as answera  FROM `exam_answers`
    JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
WHERE exam_quest_id = $id
GROUP BY answera"));
        $a = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        foreach ($this->answerAnalytic as $aa) {
            $a[$aa->answera] = $aa->c;
        }
//        dd($this->answerAnalytic);
        $this->answerAnalytic = $a;

        if ($this->wrongAnalytic != null) {
            $this->wrongAnalytic = $this->wrongAnalytic[0]->answer;
        }
        if ($this->rightAnalytic != null) {
            $this->rightAnalytic = $this->rightAnalytic[0]->answer;
        }
        if ($this->totalAnalytic != null) {
            $this->totalAnalytic = $this->totalAnalytic[0]->answer;
        }
    }

    public function setDone()
    {
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Edit diselsaikan',
        ]);
        $this->emit('redirect', route('admin.exam.show', [$this->exam->room->slug, $this->exam->slug]));
    }


    public function render()
    {
        return view('livewire.edit-exam');
    }
}
