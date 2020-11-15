<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Membership;
use App\Transformers/MembershipTransformer;

class ShipController extends BaseController
{
    public function index(MembershipTransformer $tranformer)
    {
        return $this->response->item(Membership::all(),$tranformer);
    }
}
