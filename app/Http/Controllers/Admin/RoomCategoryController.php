<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{

    public function index()
    {
        $room = RoomCategory::class;
        return view("pages.room-category.index", compact('room'));
    }

    public function create()
    {
        return view("pages.room-category.create");
    }

    public function edit($id)
    {
        return view("pages.room-category.edit", compact('id'));
    }

    public function show($id)
    {
        return view("pages.room-category.show", compact('id'));
    }
}
