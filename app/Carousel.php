<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Carousel extends Model
{
    protected $fillable = ['image'];

    protected $carouselCacheKey = 'carouselData';

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            $model->image = '/uploads/'.$model->image;
            Cache::forget($this->carouselCacheKey);
        });
    }

    public  function  getCarousel()
    {
        if (!Cache::has($this->carouselCacheKey)) {
            $carousels = self::where('status',true)->get();
            Cache::put('carouselData',$carousels);
        }
        return Cache::get($this->carouselCacheKey);
    }
}
