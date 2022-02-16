<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReferralCode;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(){
        $referral=ReferralCode::class;
        return view('pages.referral.me',compact('referral'));
    }
    public function edit($id){
        return view('pages.referral.me-edit',compact('id'));
    }
}
