<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicAnnouncement;
use App\Models\Room;
use Illuminate\Http\Request;

class PublicAnnouncementController extends Controller
{
    private $feature = 'public-announcement';

    public function index()
    {
        $announcement = PublicAnnouncement::class;
        return view("pages.$this->feature.index", compact('announcement'));
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
