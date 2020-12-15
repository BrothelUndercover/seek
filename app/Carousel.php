<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = ['image'];


    // public static function boot()
    // {
    //     parent::boot();
    //     static::saving(function($model){
    //         $model->image = '/'.$model->image;
    //     });
    // }
}
