@extends('layouts.app')
@section('title',substr($topice->title,0,6))
@section('content')
<style>
.desc-content img { max-width:99% !important;}
</style>
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
                        @guest
                            <blockquote class="blockdown">
                                    <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">请先登录</a></strong>
                            </blockquote>
                        @else
                            @if(!Auth::user()->vip_type)
                                <blockquote class="blockdown">
                                    <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">升级VIP</a></strong>
                                </blockquote>
                            @elseif(Auth::user()->vip_expire_at < now()->toDateTimeString())
                                <blockquote class="blockdown">
                                    <strong>您的VIP已到期,为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">续费VIP</a></strong>
                                </blockquote>
                            @else
                                <span class="con_sen">{{ $topice->contact }}</span>
                            @endif
                        @endguest
                    </li>
                    <li>
                        <span class="con_pr_tit">详细地址：</span>
                        @guest
                            <blockquote class="blockdown">
                                    <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">请先登录</a></strong>
                            </blockquote>

                        @else
                            @if(!Auth::user()->vip_type)
                               <blockquote class="blockdown">
                                   <strong>为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">升级VIP</a></strong>
                               </blockquote>
                            @elseif(Auth::user()->vip_expire_at < now()->toDateTimeString())
                                <blockquote class="blockdown">
                                    <strong>您的VIP已到期,为了保证信息的高品质,此信息仅限VIP查看<a href="{{ route('users.show',['stype'=>'vip'])}}" class="erphpdown-vip">续费VIP</a></strong>
                                </blockquote>
                            @else
                                <span class="con_sen">{{ $topice->contact_address }}</span>
                            @endif
                        @endguest
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
                @foreach($topices as $topice)
                <li>
                    <a href="{{ route('topices.show',[$topice]) }}">{{ $topice->title }}</a>
                    <p><span>浏览：{{ $topice->view_count }}</span><span>日期：{{ $topice->created_at->diffForHumans() }}</span></p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
