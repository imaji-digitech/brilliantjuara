<?php

namespace App\Http\Livewire\Form;

use App\Models\PublicBanner;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FrontpageBanner extends Component
{
    use WithFileUploads;

    public $data;
    public $thumbnail;

    public function mount()
    {
        $this->data = [
            'thumbnail' => '',
        ];
    }

    public function create()
    {
        $image = $this->thumbnail;
        $filename = Str::slug(auth()->user()->name) . rand() . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        $this->data['thumbnail'] = 'frontpage-banners/' . $filename;
        Storage::disk('local')->put('public/frontpage-banners/' . $filename, $image, 'public');
        \App\Models\FrontpageBanner::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Banner berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.frontpage-banner.index'));
    }

    public function render()
    {
        return view('livewire.form.frontpage-banner');
    }

    protected function getRules()
    {

        return [
            'thumbnail' => 'required',
        ];
    }
}
