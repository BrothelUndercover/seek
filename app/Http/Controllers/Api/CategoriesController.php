<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categories = Category::where('status',true)->get();

        return $this->response->array($categories->toArray());
    }
}
