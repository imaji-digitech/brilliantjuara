<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index($room)
    {
        $room = Room::getRoom($room);
        return view('pages.program.index',compact('room'));
    }
}
