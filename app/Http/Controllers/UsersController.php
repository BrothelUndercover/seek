<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Membership;
use App\Card;
use App\Order;

class UsersController extends Controller
{

    protected $vipTime = [];

    public function __construct()
    {
        $this->middleware('auth',['only' =>['show']]);

        $this->vipTime = ['1' => 1,'2'=> 3 ,'3'=> 12, '4' => 120];
    }

    public function show(Request $request,User $user,Membership $membership)
    {
        $ships = $membership->getShips();
        $user = \Auth()->user();
        $orders = $user->orders;
        return view('users.show',['type'=>$request->stype,'ships' => $ships,'user'=> $user,'orders' => $orders]);
    }

    public function checkSecret(Request $request,Membership $membership)
    {
        $this->validate($request, [
            'secret' => 'required',
        ]);
        $secret = $request->secret;
        $arr = explode('-',$secret);
        try {
           $ship = $membership->getShips()->firstWhere('identifier',$arr[0])->first();
           $card =  Card::where(['secret' => $secret,'ship_id'=> $ship->id,'status'=> false])->first();
           if ($card) {
                 Order::firstOrCreate([
                    'order_id' => date('ymd').strtotime('now').\Auth::id(),
                    'ship_id' => $ship->id,
                    'user_id' => \Auth::id(),
                    'amount'  => $ship->price,
                    'card_id' => $card->id,
                    'status'  => 1,
                    'pay_time' => \Carbon\Carbon::now(),
                ]);
                User::find(\Auth::id())->update(['vip_type' => $ship->id,'vip_expire_at'=>\Carbon\Carbon::now()->addMonth($this->vipTime[$ship->id])]);
                $card->status = true;
                $card->save();
                return redirect()->to(route('users.show',['stype'=>'order']))->with('success','激活成功');
           }
           return redirect()->to(route('users.show',['stype'=>'self']))->with('danger','卡密不存在,请联系客服');
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
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
