<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function child()
    {
        return $this->hasMany(self::class,'pid');
    }

    //递归
    public function childRecursive()
    {
        return $this->child()->with('childRecursive');
    }

    public function provTopices()
    {
        return $this->hasMany('App\Topice','province','id');
    }

    public function cityTopices()
    {
        return $this->hasMany('App\Topice','city','id');
    }

    public function countyTopices()
    {
        return $this->hasMany('App\Topice','county','id');
    }
}
