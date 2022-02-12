<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Token;
use App\Models\UserOwnCourse;
use App\Models\UserOwnExam;
use Livewire\Component;

class Program extends Component
{
    public $room;
    public $myClass;
    public $program;
    public $token;

    public function mount()
    {
        $this->room = Room::getRoom($this->room);
        $ownExam = auth()->user()->userOwnExams;
        $ownCourse = auth()->user()->userOwnCourses;
        $myClass = [];
        foreach ($ownExam as $oe) {
            if ($oe->exam->room_id==$this->room->id) {
                $myClass[$oe->exam->room->title]['exam'][$oe->exam_id] = $oe->toArray();
            }
        }
        foreach ($ownCourse as $oe) {
            if ($oe->course->room_id==$this->room->id) {
                $myClass[$oe->course->room->title]['course'][$oe->exam_id] = $oe->toArray();
            }
        }
        $this->myClass = $myClass;
//        dd($myClass);
    }


    public function activateToken($id)
    {
        $this->program = $id;
        $token = Token::where('bundle_id', $this->program)->where('token', $this->token)->whereNull('user_id')->first();
        if ($token != null) {
            $token->update(['user_id' => auth()->id()]);
            foreach ($token->bundle->bundleDetails as $item) {
                if ($item->exam_id != null) {
                    $uoe = UserOwnExam::where('user_id', auth()->id())->where('exam_id', $item->exam_id)->get();
                    if ($uoe->count()==0){
                        UserOwnExam::create(['user_id'=>auth()->id(),'exam_id'=>$item->exam_id]);
                    }
                }
                if ($item->course_id != null) {
                    $uoe = UserOwnCourse::where('user_id', auth()->id())->where('course_id', $item->course_id)->get();
                    if ($uoe->count()==0){
                        UserOwnCourse::create(['user_id'=>auth()->id(),'course_id'=>$item->course_id]);
                    }
                }
            }
            $this->emit('notify', [
                'type' => 'success',
                'title' => 'Selamat belajar brilli',
            ]);
        } else {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'Token anda tidak valid atau telah terpakai',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.program');
    }
}
