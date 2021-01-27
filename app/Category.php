<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    public function topices()
    {
        return $this->hasMany('App\Topice');
    }
    protected $categoryCacheKey = 'categoryData';

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            Cache::forget($model->categoryCacheKey);
        });
    }

    public function getCategory()
    {
        if (!Cache::has($this->categoryCacheKey)) {
            $categories = self::where('status',true)->get();
            Cache::put($this->categoryCacheKey,$categories);
        }
        return Cache::get($this->categoryCacheKey);
    }
}
