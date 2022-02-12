<?php

namespace App\Http\Livewire;

use App\Models\PublicAnnouncement;
use App\Models\PublicBanner;
use App\Models\PublicEvent;
use Carbon\Carbon;
use Livewire\Component;

class DashboardCalendar extends Component
{
    public $eventNow;
    public $events;
    public $date;
    protected $listeners = ['setDate' => 'setDate'];

    public function mount()
    {
        $date = Carbon::now();
        $this->events=PublicEvent::get();
        $this->eventNow=PublicEvent::whereDate('created_at',$date)->get();
    }

    public function render()
    {
        return view('livewire.dashboard-calendar');
    }

}
