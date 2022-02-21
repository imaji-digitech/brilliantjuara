<?php

namespace App\Http\Livewire\Form;

use App\Models\PublicAnnouncement;
use Livewire\Component;

class BundlePrice extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $room;
    public $bundle;

    public function mount()
    {
        $this->room = \App\Models\Room::getRoom($this->room);
        $this->data = [
            'bundle_id'=>$this->bundle,
            'price'=>0,
            'price_cut'=>0,
            'min'=>0,
        ];
        if ($this->dataId != null) {
            $data = \App\Models\BundlePrice::find($this->dataId);
            $this->data = [
                'bundle_id'=>$data->bundle_id,
                'price'=>$data->price,
                'price_cut'=>$data->price_cut,
                'min'=>$data->min,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        \App\Models\BundlePrice::create($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.bundle.price.index',[$this->room->slug,$this->bundle]));
    }

    public function update()
    {
        $this->validate();
        \App\Models\BundlePrice::find($this->dataId)->update($this->data);
        $this->emit('notify', [
            'type' => 'success',
            'title' => 'Pengumuman berhasil ditambahkan',
        ]);
        $this->emit('redirect', route('admin.bundle.price.index',[$this->room->slug,$this->bundle]));
    }

    public function render()
    {
        return view('livewire.form.bundle-price');
    }

    protected function getRules()
    {
        return [
            'data.price' => 'required',
            'data.min' => 'required',
        ];
    }
}
