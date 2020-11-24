<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    protected $fillable = ['viptype_name','price','identifier','description','cardurl'];

    public function orders()
    {
        return $this->hasMany('App\Order','ship_id');
    }
}
