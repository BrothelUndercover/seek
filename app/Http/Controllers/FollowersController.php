<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,User $user)
    {
        if (! Auth::user()->isFollowing($request->userid)) {
            Auth::user()->follow($request->userid);
        }
        return redirect()->back();
    }

    public function destroy(Request $request,User $user)
    {

        if (Auth::user()->isFollowing($request->userid)) {
            Auth::user()->unfollow($request->userid);
        }
        return redirect()->back();
    }
}
