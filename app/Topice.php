<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topice extends Model
{
    protected $fillable = [
        'title', 'excerpt', 'province', 'city','county','contact','consumer_price','body','user_id','category_id','picture','contact_address'
    ];

    // public function setPicturesAttribute($pictures)
    // {
    //     if (is_array($pictures)) {
    //          $this->attributes['pictures'] = json_encode($pictures);
    //     }
    // }

    // public function getPicturesAttribute($pictures)
    // {
    //     return json_decode($pictures, true);
    // }

    // public static function boot()
    // {
    //     parent::boot();
    //     static::saving(function($model){
    //         $model->pictures = array_map(function($item){
    //                return  env('APP_URL').'/uploads/'.$item;
    //         },$model->pictures);
    //     });
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
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

    public function proviArea($foreign_key = null,$other_key = null)
    {
        return $this->belongsTo('App\City','province',$other_key);
    }

    public function cityArea()
    {
        return $this->belongsTo('App\City','city');
    }

    public function countyArea()
    {
        return $this->belongsTo('App\City','county');
    }

    public function scopeSearch($query,$keyword)
    {
        return $query->where('title','like',"%$keyword%")
                ->orWhere('excerpt','like',"%$keyword%")
                ->orWhere('body','like',"%$keyword%")
                ->orWhere('ser_project','like','%$keyword%')
                ->latest();
    }

    public function tabs()
    {
        return $this->belongsToMany('App\Tab','topice_tab');
    }

    public function provinces($foreign_key = null,$other_key = null)
    {
        return $this->belongsTo('App\City','province',$other_key);
    }

    public function cities()
    {
        return $this->belongsTo('App\City','city');
    }

    public function counties()
    {
        return $this->belongsTo('App\City','county');
    }

}
