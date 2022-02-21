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
        $banners=PublicBanner::whereRoomId($room->id)->get();
//        dd($banners);
        return view('pages.program.index',compact('room','banners'));
    }
}
