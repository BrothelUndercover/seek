<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topice extends Model
{
    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
             $this->attributes['pictures'] = json_encode($pictures);
        }
    }

    public function getPicturesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            $model->pictures = array_map(function($item){
                   return  env('APP_URL').'/uploads/'.$item;
            },$model->pictures);
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function province()
    {
        return $this->belongsTo('App\City','province','id');
    }

    public function city()
    {
        return $this->belongsTo('App\City','city','id');
    }

    public function county()
    {
        return $this->belongsTo('App\City','county','id');
    }

    public function scopeWithOrder($query,$order)
    {
        switch ($order) {
            case 'ishot':
                $query->hot();
                break;

            case 'rating':
                $query->rating();
                break;

            default:
                $query->new();
                break;
        }
    }

    public function scopeHot($query)
    {
        return $query->where('is_hot',true);
    }

    public function scopeRating($query)
    {
        return $query->orderBy('rating','desc');
    }

    public function scopeNew($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function search($query,$keyword)
    {

    }
}
