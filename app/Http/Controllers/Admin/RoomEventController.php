<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicEvent;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomEventController extends Controller
{
    public function index($room)
    {
        $event = PublicEvent::class;
        $room = Room::getRoom($room);
        return view("pages.room.event.index", compact('event', 'room'));
    }

    public function create($room)
    {
        $room = Room::getRoom($room);
        return view("pages.room.event.create", compact('room'));
    }

    public function edit($room, $id)
    {
        $room = Room::getRoom($room);
        return view("pages.room.event.edit", compact('id', 'room'));
    }
}
