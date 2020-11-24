@extends('layouts.app')
@section('title', setting('seo_description','分享楼凤兼职，酒店会所，桑拿洗浴，全国楼凤'))

@section('styles')

@stop

@section('content')
<div class="container con_padding con_la in_top">
    <div class="con_left content_left">
        <ul class="breadcrumb dh">
            <li>当前位置： <a href="{{ route('pages.root') }}">首页</a></li>
            <li>搜索</li>
            <li class="active">{{ $request->q }}</li>
        </ul>
        <div class="con_tab">
            <!-- 下部内容1 -->
            <div class="list-container" style="display: block">
                <ul id="news-lis" class="news-lis">
                    @foreach($topices as $topice)
                    <li class="clearfix">
                        <div class="new-content">
                            <a href="{{ route('topices.show',[$topice->id])}}" class="title">{{ $topice->title }}</a>
                            <div class="flex_img">
                                <p>{!! $topice->body !!}</p>
                                @foreach($topice->tabs as $tab)
                                <a href="javascript:;"><span class="badge badge-primary">{{ $tab->tabname }}</span></a>
                                @endforeach
                            </div>
                            <div class="tool">
                                <span title="分类"><a href="" style="color: #b4b4b4;"><i class="fa fa-bars" aria-hidden="true"></i> {{ $topice->category->name }} </span></a>
                                <span title="地区"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{$topice->proviArea->name }} - {{ $topice->cityArea->name }}</span>
                                <span title="浏览数"><i class="fa fa-eye fa-lg"></i> {{ $topice->view_count }}</span>
                                {{-- <span title="评论数"><i class="fa fa-comment comment-lg"></i> {{ $topice->comment_count }}</span> --}}
                                <span title="发帖时间"><i class="fa fa-clock-o"></i> {{ $topice->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <nav class="news-lis">
                    <ul class="pagination fen_auto" data-pagecount="1" id="pager"></ul>
                </nav>
            </div>
        </div>
    </div>
    {{-- 侧边 --}}
    <div class="con_right">
        <div class="list-group list_box">
            <div class="list-group-item color_lis cont_float">
                <div class="bs-callout bs-callout-info">
                    <span>热门城市</span>
                </div>
            </div>
            <ul class="list_bot">
              @foreach($hotCities as $city)
                <li><a href="">{{ $city->name }}</a></li>
               @endforeach
            </ul>
        </div>
        <div class="list-group list_box border_con">
           {{-- 热门推荐 --}}
           @include('topices._hot',['hotTopices'=> $topice->withOrder('ishot')->take(30)->get()])
        </div>
    </div>
</div>
@endsection
