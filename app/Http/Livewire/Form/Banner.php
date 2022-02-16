<?php

namespace App\Http\Livewire\Form;

use App\Models\PublicBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Banner extends Component
{
    use WithFileUploads;
    public $data;
    public $dataId;
    public $action;
    public $thumbnail;
    public $roomId;

    public function mount()
    {

        $this->data = [
            'title' => '',
            'thumbnail' => '',
            'link' => '',
            'room_id'=>$this->roomId
        ];
        if ($this->dataId != null) {
            $data = PublicBanner::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'thumbnail' => $data->thumbnail,
                'link' => $data->link,
                'room_id'=>$this->roomId
            ];
        }
    }

    public function create()
    {
        $this->upload();
        PublicBanner::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Banner berhasil ditambahkan',
        ]);
        if ($this->roomId==null){
            $this->emit('redirect', route('admin.banner.index'));
        }else{
            $this->emit('redirect', route('admin.room.banner.index',\App\Models\Room::find($this->roomId)->slug));
        }

    }

    private function upload()
    {
        $image = $this->thumbnail;
        $filename = Str::slug($this->data['title']) . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        $this->data['thumbnail'] = 'banners/' . $filename;
        Storage::disk('local')->put('public/banners/' . $filename, $image, 'public');
    }

    public function update()
    {
        if ($this->thumbnail != null) {
            $this->upload();
        }
        PublicBanner::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Banner berhasil diubah',
        ]);
        if ($this->roomId==null){
            $this->emit('redirect', route('admin.banner.index'));
        }else{
            $this->emit('redirect', route('admin.room.banner.index',$this->roomId));
        }
    }

    public function render()
    {
        return view('livewire.form.banner');
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
