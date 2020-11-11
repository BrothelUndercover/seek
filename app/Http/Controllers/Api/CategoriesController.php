<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Category;
use App\Transformers/CategoryTransformer;

class CategoriesController extends BaseController
{
    public function index(CategoryTransformer $transformer)
    {
        return $this->response->item(Category::where('status',true)->all(),$transformer);
    }
}
