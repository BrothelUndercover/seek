<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = ['order_id','ship_id','user_id','amount','card_id','mark','pay_time'];

     public function user()
     {
        return $this->belongsTo('App\User');
     }

     public function memberShip()
     {
        return $this->belongsTo('App\Membership','ship_id');
     }

     public function card()
     {
        return $this->belongsTo('App\Card','card_id');
     }

}
