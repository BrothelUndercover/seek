<?php

namespace App\Transformers;

use App\City;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    public function transform(City $city)
    {
        return [
            'id' => (int) $city->id,
            'pid' => (int) $city->pid,
            'name' => (string) $city->name,
            'spell' => (string )$city->spell,
            'initial' => $city->initial,
            'hot'       => (bool) $city->hot,
        ];
    }
}
