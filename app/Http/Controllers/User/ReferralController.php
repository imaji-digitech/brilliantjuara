<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReferralCode;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(){
        $referral=ReferralCode::class;
        $withdraw=Withdraw::class;
        $codeCount=ReferralCode::whereUserId(auth()->id())->get();
        $c=0;
        foreach ($codeCount as $cc){
            foreach ($cc->payments as $p){
                if ($p->status==2){
                    $c++;
                }
            }
        }
        return view('pages.referral.me',compact('referral','withdraw','c'));
    }
    public function edit($id){
        return view('pages.referral.me-edit',compact('id'));
    }
    public function withdraw(){
        return view('pages.referral.withdraw');
    }
}
