<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseReferral;
use App\Models\ReferralCanUse;
use App\Models\ReferralCode;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(){
        $referral=BaseReferral::class;
        return view('pages.referral.index',compact('referral'));
    }
    public function create(){
        return view('pages.referral.create');
    }
    public function edit($id){
        return view('pages.referral.edit',compact('id'));
    }
    public function canUse($id){
        $referral=ReferralCode::class;
        return view('pages.referral.can-use',compact('id','referral'));
    }
    public function canUseAdd($id){
        return view('pages.referral.can-use-add',compact('id'));
    }

}
