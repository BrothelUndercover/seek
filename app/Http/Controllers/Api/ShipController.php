<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Membership;

class ShipController extends BaseController
{
    public function index()
    {
        return $this->response->array(Membership::all()->toArray());
    }
}
