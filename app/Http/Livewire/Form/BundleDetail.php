<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class BundleDetail extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $room;
    public $bundle;
    public $optionExam;
    public $optionCourse;
    public $optionType;
    public $type;

    public function mount()
    {
        $this->room = \App\Models\Room::getRoom($this->room);
        $this->optionCourse=eloquent_to_options($this->room->courses,'id','title');
        $this->optionExam=eloquent_to_options($this->room->exams,'id','title');
        $this->optionType=[
            ['value'=>'1','title'=>'TO'],
            ['value'=>'2','title'=>'Bimbel'],
        ];
        $this->type=1;
        $this->data = [
            'bundle_id'=>$this->bundle,
            'exam_id' => 0,
            'course_id' => 0,
        ];
        if ($this->optionCourse!=null){
            $this->data['course_id']=$this->optionCourse[0]['value'];
        }
        if ($this->optionExam!=null){
            $this->data['exam_id']=$this->optionExam[0]['value'];
        }
    }

    public function create()
    {
        if ($this->type==1){
            $this->data['course_id']=null;
        }else{
            $this->data['exam_id']=null;
        }
        \App\Models\BundleDetail::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.bundle.detail.index', [$this->room->slug, $this->bundle]));
    }

    public function render()
    {
        return view('livewire.form.bundle-detail');
    }
}
