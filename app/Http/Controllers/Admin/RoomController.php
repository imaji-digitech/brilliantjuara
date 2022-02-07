<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $feature = 'room';

    public function index()
    {


        $room = Room::class;
        return view("pages.$this->feature.index", compact('room'));
    }

    public function create()
    {
        return view("pages.$this->feature.create");
    }

    public function edit($id)
    {
        return view("pages.$this->feature.edit", compact('id'));
    }

    public function show($id)
    {
        return view("pages.$this->feature.show", compact('id'));
    }
}
