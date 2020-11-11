<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;
use App\Transformers\TopiceTransformer;
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
        $order = $request->order ?? 'default';
        $topices = $topice->withOrder($order)->paginate();

        return $this->response->paginator($topices, new TopiceTransformer());
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
