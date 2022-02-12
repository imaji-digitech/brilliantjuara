<?php

namespace App\Http\Livewire\Form;

use App\Models\PublicAnnouncement;
use Livewire\Component;

class Announcement extends Component
{
    public $action;
    public $data;
    public $dataId;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'content' => ''
        ];
        if ($this->dataId!=null){
            $data=PublicAnnouncement::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'content'=>$data->content
            ];
        }
    }
    protected function getRules()
    {
        return [
            'data.title'=>'required',
            'data.content'=>'required',
        ];
    }

    public function create()
    {
        $this->validate();
        PublicAnnouncement::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.announcement.index'));
    }

    public function update()
    {
        $this->validate();
        PublicAnnouncement::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.announcement.index'));
    }

    public function render()
    {
        return view('livewire.form.announcement');
    }
}
