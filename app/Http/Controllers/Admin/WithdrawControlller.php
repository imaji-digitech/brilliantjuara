<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawControlller extends Controller
{
    public function index(){
        $withdraw=Withdraw::class;
    }
    public function edit(){

    }
}
