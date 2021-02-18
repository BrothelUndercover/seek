<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Link extends Model
{
    protected $fillable = ['title','img', 'link'];

    public $cache_key = 'seek_links';
    protected $cache_expire_in_seconds = 3600 * 24*30;

    public function getLinksCached()
    {
        return Cache::remember($this->cache_key, $this->cache_expire_in_seconds, function(){
            return $this->all();
        });
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model){
            Cache::forget($model->cache_key);
        });
    }
}
