<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $data;
    public $date;

    public function mount()
    {
        $this->data['users']=User::whereRole(2)->get()->count();
        $this->data['logs']=Log::whereMonth('created_at',Carbon::now()->month)->count();
        $this->data['city_name']=DB::select(DB::raw('SELECT `city` FROM logs GROUP BY `city`'));
        $this->data['cities']=count(DB::select(DB::raw('SELECT COUNT(*) FROM logs GROUP BY `city`')));

        $month = date('n');
        $query = "
SELECT date(created_at) as dateList, COUNT(*) as total
FROM logs
WHERE month(created_at)=$month
GROUP BY date(created_at)";
        $g = DB::select(DB::raw($query));

        $now = Carbon::now();
        $start = (new DateTime($now->format('Y-m-d')))->modify('first day of this month');
        $end = (new DateTime($now->format('Y-m-d')))->modify('first day of next month');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($start, $interval, $end);
        $category = [];
        foreach ($period as $dt) {
            $this->data['visitor'][$dt->format("Y-m-d")] = 0;
            array_push($category, $dt->format("Y-m-d"));
        }
        foreach ($g as $g1) {
            $this->data['visitor'][$g1->dateList] = $g1->total;
        }
        $this->date=$category;



    }
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
