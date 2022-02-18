<?php

namespace App\Http\Livewire\Form;

use App\Models\BundleStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Bundle extends Component
{
    use WithFileUploads;

    public $data;
    public $dataId;
    public $action;
    public $thumbnail;
    public $room;
    public $optionStatus;
    public $optionCanUse;

    public function mount()
    {
        $this->optionStatus=eloquent_to_options(BundleStatus::get(),'id','title');
        $this->optionCanUse=[
            ['title'=>'Tidak dapat digunakan','value'=>1],
            ['title'=>'Dapat digunakan','value'=>2]
        ];
        $this->room = \App\Models\Room::getRoom($this->room);
        $this->data = [
            'room_id'=>$this->room->id,
            'bundle_status_id'=>2,
            'title'=>'',
            'content'=>'',
            'thumbnail'=>'',
            'referral_can_use'=>1
        ];
        if ($this->dataId != null) {
            $data = \App\Models\Bundle::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'thumbnail' => $data->thumbnail,
                'room_id'=>$data->room_id,
                'bundle_status_id'=>$data->bundle_status_id,
                'content'=>$data->content,
                'referral_can_use'=>$data->referral_can_use
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->upload();
        \App\Models\Bundle::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Banner berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.bundle.index', $this->room->slug));
    }

    private function upload()
    {
        $image = $this->thumbnail;
        $filename = Str::slug($this->data['title']) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        $this->data['thumbnail'] = 'bundles/' . $filename;
        Storage::disk('local')->put('public/bundles/' . $filename, $image, 'public');
    }

    public function update()
    {
        $this->validate();
        if ($this->thumbnail != null) {
            $this->upload();
        }
        \App\Models\Bundle::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Banner berhasil diubah',
        ]);
        $this->emit('redirect', route('admin.bundle.index', $this->room->slug));
    }

    public function render()
    {
        return view('livewire.form.bundle');
    }

    protected function getRules()
    {
        if ($this->action == "create") {
            return [
                'data.title' => 'required',
                'thumbnail' => 'required',
            ];
        } else {
            return [
                'data.title' => 'required',
            ];
        }
    }
}
