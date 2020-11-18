<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MemberShip;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['show']);
    }

    public function show(Request $request)
    {
        $ships = MemberShip::all();
        return view('users.show',['type'=>$request->stype,'ships'=>$ships]);
    }

    //我的关注
    public function followings()
    {

    }

    //粉丝列表
    public function followers()
    {

    }
}
