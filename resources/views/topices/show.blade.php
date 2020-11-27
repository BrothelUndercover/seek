@extends('layouts.app')
@section('title',$topice->title)
@section('content')
<div class="container con_padding con_la in_top">
    <div class="con_left content_left">
        <ul class="breadcrumb dh">
            <li>当前位置： <a href="{{ route('pages.root') }}">首页</a></li>
            <li><a href="{{ route('pages.region') }}">{{ $topice->proviArea->name }}分享区</a></li>
            <li><a href="{{ route('pages.region') }}">{{ $topice->cityArea->name }} 分享区</a></li>
            <li><a href="{{ route('pages.region') }}">{{ $topice->countyArea->name }}分享区</a></li>
            <li class="active">{{ $topice->title }}</li>
        </ul>
        <div class="user_top xs_le">
            <h1>{{ $topice->title }}</h1>
            <div class="uer_title_tab">
                <span>阅读：{{ $topice->view_count }}</span>
                <span>日期：{{ $topice->created_at }}</span>
            </div>
        </div>
        <div class="con_tab xs_le">
            <div href="#" class="list-group-item color_lis_con cont_float">
                <div class="content-callout bs-callout-info">
                    <span>基础信息</span>
                </div>
                <ul class="content_pire_box">
                    <li>
                        <span class="con_pr_tit">城市区域：</span>
                        <span class="con_sen">
                            <a href="">{{ $topice->proviArea->name }}</a> - <a href="');">{{ $topice->cityArea->name }}</a>
                            - <a href="">{{ $topice->countyArea->name }}</a> </span>
                    </li>
                    <li>
                        <span class="con_pr_tit">信息种类：</span>
                        <span class="con_sen"><a href="">{{ $topice->category->name }}</a></span>
                    </li>
                    <li>
                        <span class="con_pr_tit">消费情况：</span>
                        <span class="con_sen">{{ $topice->consumer_price }}</span>
                    </li>
                    <li class="rating">
                        <span class="con_pr_tit title-rating">安全评估：</span><span class="my-rating" id="rating-security">{{ $topice->rating}} 星级</span>
                    </li>
                    <li>
                        <span class="con_pr_tit">服务项目：</span>
                        @foreach($topice->tabs as $tab)
                        <a href="javascript:;"><span class="badge badge-primary">{{ $tab->tabname }}</span></a>
                        @endforeach
                    </li>
                    <li>
                        <span class="con_pr_tit">联系方式：</span>
                        @if(Auth::check() && Auth::user()->vip_type)
                            <span class="con_sen">{{ $topice->contact }}</span>
                        @else
                            <blockquote class="blockdown">
                                <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['user'=>Auth::user()->id,'stype'=>'vip'])}}" class="erphpdown-vip">升级VIP</a></strong>
                            </blockquote>
                        @endif
                    </li>
                    <li>
                        <span class="con_pr_tit">详细地址：</span>
                        @if(Auth::check() && Auth::user()->vip_type)
                            <span class="con_sen">safdafafaf</span>
                        @else
                            <blockquote class="blockdown">
                                <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['user'=>Auth::user()->id,'stype'=>'vip'])}}" class="erphpdown-vip">升级VIP</a></strong>
                            </blockquote>
                        @endif
                    </li>
  {{--                   <li>
                        <span class="con_pr_tit">信息价格：</span>
                        <span class="con_sen" style="margin-top: -6px;">
                            <font color="red"> 20金币</font><button class="buy" id="BuyPost">购买</button> 没有金币? <a href="">点我>></a>
                        </span>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="con_tab xs_le">
            <div href="#" class="list-group-item color_lis_con cont_float">
                <div class="content-callout bs-callout-info">
                    <span>详情描述</span>
                </div>
                <div class="desc-content">
                    <p>{!! $topice->body !!}</p>
                </div>
            </div>
        </div>
       {{--  <div class="con_tab xs_le">
            <div href="#" class="list-group-item color_lis_con cont_float">
                <div class="content-callout bs-callout-info">
                    <span>图片信息</span>
                </div>
                <div class="content-pic">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-md-4 con-show-pic">
                            <img src="{{ asset('uploads/warp/1.jpg') }}" alt="陆地小坦克，谁开谁快乐">
                        </div>
                        <div class="col-xs-4 col-md-4 col-md-4 con-show-pic">
                            <img src="{{ asset('uploads/warp/1.jpg') }}" alt="陆地小坦克，谁开谁快乐">
                        </div>
                        <div class="col-xs-4 col-md-4 col-md-4 con-show-pic">
                            <img src="{{ asset('uploads/warp/1.jpg') }}" alt="陆地小坦克，谁开谁快乐">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
 {{--        <div class="con_tab xs_le">
            <div class="list-group-item color_lis_con cont_float" style="margin-top:0px;">
                <p>
                    <span class="zan">
                        <a id="Recommend">
                            <i class="fa fa-thumbs-up " aria-hidden="true"></i>
                        </a>
                        <a id="RecommendList"> <span>0</span>人推荐 ></a>
                    </span>
                    <span class="zan">
                        <a id="NoRecommend"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                        <a id="NoRecommendList"> <span>0</span>人不推荐 ></a>
                    </span>
                </p>
            </div>
        </div> --}}
     {{--    <div>
        </div> --}}
     {{--    <div class="con_tab xs_le">
            <div class="list-group-item color_lis_con cont_float">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 sc">
                        <a id="collection" title="收藏">
                            <i class="fa fa-star-o tu"></i>
                            <span class="yuan"></span>
                            <span class="text">收藏</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 sc">
                        <a id="reward" title="打赏狼友">
                            <i class="fa fa-jpy tu"></i>
                            <span class="yuan"></span>
                            <span class="text">打赏</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 sc">
                        <a id="report" title="举报">
                            <i class="fa fa-exclamation tu"></i>
                            <span class="yuan"></span>
                            <span class="text">举报</span>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="con_tab xs_le">
            <div href="#" class="list-group-item color_lis_con cont_float">
                <div class="content-callout bs-callout-info">
                    <span>评论</span>
                </div>
                <div class="comment">
                    <!-- 评论操作 -->
                    @includeWhen(Auth::check(),'topices._reply_box',['topice'=>$topice])
                    <!-- 查看评论区域 -->
                    @include('topices._reply_list',['replies'=> $topice->replies()->with('user')->get()])
                </div>
            </div>
        </div>
    </div>
    <!-- 侧边专区 -->
    <div class="con_right">
        <div class="list-group list_box border_con">
            <div href="#" class="list-group-item  List_float list_likes cont_float">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ $topice->user->avatar }}" alt="{{ $topice->user->name }}">
                        </a>
                    </div>
                    <div class="media-body mmedia_h">
                        <h4 class="media-heading">{{ $topice->user->name }}</h4>
                        <b>分享了{{ count($topice->user->topices) }}条信息</b>
                        @if(Auth::check() && Auth::user()->isFollowing($topice->user->id))
                        <form action="{{ route('followers.destroy', ['userid'=> $topice->user->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="zhu">取消关注</button>
                        </form>

                        @else
                        <form action="{{ route('followers.store', ['userid'=> $topice->user->id]) }}" method="post">
                                {{ csrf_field() }}
                            <button type="submit" class="zhu">关注</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group list_box border_con">
            <div href="#" class="list-group-item List_float list_likes cont_float" style="font-size: 17px;">
                <div class="bs-callout bs-callout-info">
                    <span>相关推荐</span>
                </div>
            </div>
            <ul class="tj_list">
                <li>
                    <a href="">沈阳随缘，熟女</a>
                    <p><span>浏览：283</span><span>日期：2020-02-05</span></p>
                </li>

            </ul>
        </div>
    </div>
</div>
@stop
