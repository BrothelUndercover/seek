<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class City extends Model
{
    protected $hotCityCacheKey = 'hotcity';


    public function child()
    {
        return $this->hasMany(self::class,'pid');
    }

    public function upperLevel()
    {
        return $this->belongsTo(self::class,'pid');
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

    public function getHotCitys()
    {
        if (!Cache::has($this->hotCityCacheKey)) {
            return self::with('upperLevel')->where('hot',true)->get();
        }
        return Cache::get($this->hotCityCacheKey);
    }

    public function getCachedProvinceTopicesCountAttribute()
    {
        return Cache::remember('topices_province_counts:'.$this->spell, 60*60*24, function () {
            return $this->provTopices->count();
        });
    }
}
