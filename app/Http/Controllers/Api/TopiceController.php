<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;
use App\Topice;

class TopiceController extends BaseController
{
    public function __construct()
    {
        $this->middleware('jwt.auth',['only'=> ['store','update','destroy']]);
    }
    //帖子列表
    public function index(Request $request,Topice $topice)
    {
        $topices = QueryBuilder::for(Topice::class)
            ->allowedIncludes('user','category','city')
            ->allowedFilters([
                'province',
                'city',
                'county',
                'province',
                'city',
                'county',
                AllowedFilter::exact('category_id'),
                AllowedFilter::exact('user_id'),
                AllowedFilter::scope('withOrder')->default('new'),
            ])
            ->paginate();

        return $this->response->array($topices->toArray());
    }

    //帖子发布
    public function store(Request $request)
    {
        return 'store';
    }

    //帖子更新
    public function update(Request $request)
    {

    }

    //帖子详情
    public function show(Request $request)
    {

    }

    //帖子删除
    public function destroy()
    {

    }

    //帖子检索
    public function search(Request $request)
    {
        if ($request->q) {

        }
    }
}
