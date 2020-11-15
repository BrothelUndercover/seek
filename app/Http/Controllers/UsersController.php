<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        return view('users.show',['type'=>$request->stype]);
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
