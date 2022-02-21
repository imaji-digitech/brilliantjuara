<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontpageBanner;
use App\Models\PublicBanner;
use App\Models\Room;
use Illuminate\Http\Request;

class PublicBannerController extends Controller
{
    private $feature = 'public-banner';

    public function index()
    {
        $banner = PublicBanner::class;
        return view("pages.$this->feature.index", compact('banner'));
    }

    public function create()
    {
        return view("pages.$this->feature.create");
    }

    public function edit($id)
    {
        return view("pages.$this->feature.edit", compact('id'));
    }
    public function frontpage(){
        $banner = FrontpageBanner::class;
        return view("pages.frontpage.index", compact('banner'));
    }
    public function frontpageCreate(){
        return view("pages.frontpage.create");
    }
}
