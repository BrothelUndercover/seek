<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Topice extends Model
{
    use Searchable,Handlers\Traits\HashIdHelper;

    protected $indexConfigurator = Elastic\TopicesIndexConfigurator::class;

    protected $fillable = [
        'title', 'excerpt', 'province', 'city','county','contact','consumer_price','body','user_id','category_id','picture','contact_address','pictures'
    ];

    protected $mapping = [
            'properties' => [
                'title' => [
                    'type' => 'text',
                    'analyzer' => 'ik_max_word'
                ],
                'excerpt' => [
                    'type' => 'text',
                    'analyzer' => 'ik_smart'
                ],
                'body' => [
                    'type' => 'text',
                    'analyzer' => 'ik_smart'
                ],
                'province' => [
                    'type' => 'keyword',
                ],
                'city'  => [
                    'type'  => 'keyword',
                ],
                'county' => [
                    'type' => 'keyword',
                ]
            ]
        ];

    public function toSearchableArray()
    {
        return [
            'title'=> $this->title,
            'excerpt'  => $this->excerpt,
            'body' => $this->body,
            'province' => $this->proviArea->name ?? $this->province,
            'city'  => $this->cityArea->name ?? $this->city,
            'county' => $this->countyArea->name ?? $this->county,
            'category_id' => $this->category->name,
            'created_at' => $this->created_at,
        ];
    }


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
            if ($model->pictures) {
                $model->pictures = array_map(function($item){
                   return '/uploads/'.$item;
                },$model->pictures);
            }
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
        return $query->where('is_hot',true)->where('is_check',true);
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

    public function addViewCount()
    {
        return $this->where('id',$this->id)->increment('view_count',1);
    }

    public static function scopeTopiceRelated($query,$cityid)
    {
        return $query->where('city',$cityid)->where('is_check',true)->take(25);
    }

    public function link($params = [])
    {
        return route('topices.show', array_merge([Hashids::encode($this->id),$this->title], $params));
    }
}
