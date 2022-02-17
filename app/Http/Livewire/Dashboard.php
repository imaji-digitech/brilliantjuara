<?php

namespace App\Http\Livewire;

use App\Models\PublicAnnouncement;
use App\Models\PublicBanner;
use App\Models\PublicEvent;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $banners;
    public $announcements;
//    protected $listeners= ['setDate'=>'setDate'];
    public function mount(){
        $this->announcements=PublicAnnouncement::orderBy('id','desc')->limit(3)->get();
        $this->banners=PublicBanner::orderBy('id','desc')->whereRoomId(null)->limit(6)->get();
        $date=Carbon::now();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
