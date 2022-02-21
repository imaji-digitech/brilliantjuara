<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PublicBanner;
use App\Models\Room;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index($room)
    {
        $room = Room::getRoom($room);
        $Pbanners=PublicBanner::whereRoomId($room->id)->get();
        return view('pages.program.index',compact('room','Pbanners'));
    }
}
