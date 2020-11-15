<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topice;
use App\User;

class Reply extends Model
{
    protected $fillable = ['content'];

    public function topice()
    {
         return $this->belongsTo(Topice::class);
    }

    public function user()
    {
         return $this->belongsTo(User::class);
    }
}
