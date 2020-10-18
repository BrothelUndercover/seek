<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function topices()
    {
        return $this->hasMany('App\Topice');
    }
}
