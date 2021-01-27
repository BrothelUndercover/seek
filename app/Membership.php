<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Membership extends Model
{

    protected $fillable = ['viptype_name','price','identifier','description','cardurl'];

    protected $shipCacheKey = 'shipData';

    public function orders()
    {
        return $this->hasMany('App\Order','ship_id');
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            Cache::forget($model->shipCacheKey);
        });
    }

    public  function getShips()
    {
        if (!Cache::has($this->shipCacheKey)) {
            $ships = self::get();
            Cache::put($this->shipCacheKey,$ships);
        }
        return Cache::get($this->shipCacheKey);
    }
}
