<?php

namespace App\Transformers;

use App\Topice;
use League\Fractal\TransformerAbstract;
use App\Transformers\UserTransformer;
use App\Transformers\CategoryTransformer;
use App\Transformers\CityTransformer;

class TopiceTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user','category','provinces','cities','counties'];

    public function transform(Topice $topice)
    {
        return [
            'id' => (int) $topice->id,
            'title' => $topice->title,
            'excerpt' => $topice->excerpt,
            'user_id' => (int) $topice->user_id,
            'province' => $topice->province,
            'city'      => $topice->city,
            'county'    => $topice->county,
            'ser_project' => $topice->ser_project,
            'contact' => $topice->contact,
            'consumer_price' => $topice->consumer_price,
            'body' => $topice->body,
            'category_id' => $topice->category_id,
            'pictures' => $topice->pictures,
            'view_count' => $topice->view_count,
            'order' => $topice->order,
            'is_hot' => $topice->is_hot,
            'rating' => $topice->rating,
            'comment_count' => $topice->comment_count,
            'follower_count' => $topice->follower_count,
            'content' => $topice->content,
            'created_at' => (string) $topice->created_at,
            'updated_at' => (string) $topice->updated_at,
        ];
    }

    public function includeUser(Topice $topice)
    {
        return $this->item($topice->user,new UserTransformer());
    }

    public function includeCategory(Topice $topice)
    {
        return $this->item($topice->category,new CategoryTransformer());
    }

    public function includeProvinces(Topice $topice)
    {
        return $this->item($topice->provinces,new CityTransformer());
    }

    public function includeCities(Topice $topice)
    {
        return $this->item($topice->cities,new CityTransformer());
    }

    public function includeCounties(Topice $topice)
    {
        return $this->item($topice->counties, new CityTransformer());
    }
}
