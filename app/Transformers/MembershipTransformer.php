<?php

namespace App\Transformers;

use App\Membership;
use League\Fractal\TransformerAbstract;

class MembershipTransformer extends TransformerAbstract
{
    public function transform(Membership $ship)
    {
        return [
            'id' => (int) $ship->id,
            'viptype_name' => $ship->viptype_name,
            'price' => $ship->price,
            'description' => $ship->description,
        ];
    }
}
