<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    public function topices()
    {
        return $this->belongsToMany('App\Topice','topice_tab');
    }
}
