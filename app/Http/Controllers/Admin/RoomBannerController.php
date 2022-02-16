<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\PublicBanner;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomBannerController extends Controller
{
    public function index($room)
    {
        $banner = PublicBanner::class;
        $room = Room::getRoom($room);
        return view("pages.room.banner.index", compact('banner', 'room'));
    }

    public function create($room)
    {
        $room = Room::getRoom($room);
        return view("pages.room.banner.create", compact('room'));
    }

    public function edit($room, $id)
    {
        $room = Room::getRoom($room);
        return view("pages.room.banner.edit", compact('id', 'room'));
    }
}
