<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicEvent;

class PublicEventController extends Controller
{
    private $feature = 'public-event';

    public function index()
    {
        $event = PublicEvent::class;
        return view("pages.$this->feature.index", compact('event'));
    }

    public function create()
    {
        return view("pages.$this->feature.create");
    }

    public function edit($id)
    {
        return view("pages.$this->feature.edit", compact('id'));
    }
}
