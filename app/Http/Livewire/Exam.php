<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestChoice;
use App\Models\ExamUser;
use App\Models\ReportQuest;
use Carbon\Carbon;
use Livewire\Component;

class Exam extends Component
{
    public $exam;
    public $countQuest;
    public $active;
    public $questActive;
    public $examUser;
    public $number;

    public function mount()
    {
        $this->countQuest = $this->examUser->examAnswers->count();
        $this->changeActive(0);
    }

    public function changeActive($number)
    {
        $this->questActive = $this->examUser->examAnswers[$number];
        $this->active = $this->questActive->id;
        $this->number = $number;
        if ($this->questActive->examQuest->equation!=null){
            $this->emit('mathQuill', $this->questActive->examQuest->equation);
        }
        foreach (ExamQuestChoice::whereExamQuestId($this->questActive->examQuest->id)->get() as $eqc){
//            dd($eqc->equation);
            if($eqc->equation!=null) {
//                dd("asdasd");
                $this->emit('mathQuill'. $eqc->choice, $eqc->equation);
            }
        }
    }
    public function report($id){
        ReportQuest::create([
            'user_id'=>auth()->id(), 'exam_quest_id'=>$id
        ]);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Terima kasih telah melapor admin akan segera melihat permasalahan soal',
        ]);
    }

    public function setDone()
    {
        ExamUser::setDone($this->examUser->id);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Ujian telah diselsaikan',
        ]);
        $this->emit('redirect', route('admin.program.index', $this->exam->room->slug));
    }

    public function changeAnswer($choice)
    {
        if (Carbon::now() > $this->examUser->created_at->addMinutes($this->exam->time)) {
            ExamUser::setDone($this->examUser->id);
            $this->emit('notify', [
                'type' => 'success',
                'title' => 'Waktu pengerjaan telah selesai',
            ]);
            $this->emit('redirect', route('admin.program.index', $this->exam->room->slug));
        }
        $this->examUser->examAnswers->find($this->active)->update(['answer' => $choice]);
        $this->questActive = $this->examUser->examAnswers->find($this->active);
    }

    public function render()
    {
        return view('livewire.exam');
    }
}
