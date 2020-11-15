@extends('layouts.app')
@section('title', '2020全国免费凤楼信息 - 分享楼凤兼职，酒店会所，桑拿洗浴，全国楼凤')

@section('styles')

@stop

@section('content')
<style>
    .content-lamp{
        /*width: 960px;*/
        height: 200px;
        overflow: hidden;
        margin: auto;
        margin-bottom: 18px;
    }
    .content-lamp ul {
        margin: 0;
        padding: 0;
        width: 200%;  /* 不一定非要200%，只要比100%多出一个li盒子宽度即可，但由于最极端的宽度也就是显示一个li，再多出一个li，一共两个li，所以最合适的值是200% */
        height:100%;
    }
    .content-lamp ul li{
      list-style: none;
      float: left;
      width: 275px;
      height: 180px;
      /*border: #ccc solid 1px;*/
      display: block;
      margin: 10px;
    }
</style>
<div class="container in_top index">
    <div class="jumbotron content-lamp" >
            <ul>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/2.jpg')}}"></li>
                <li><img src="{{ asset('uploads/warp/1.jpg')}}"></li>
            </ul>
    </div>
</div>
<!-- 内容 -->
<div class="container con_padding con_la index">
    <div class="con_left content_left">
        <div class="con_tab">
            <!-- 下部内容1 -->
            <div class="list-container index" style="display: block">
                <ul id="news-lis" class="news-lis">
                    @foreach($topices as $topice)
                    <li class="clearfix">
                        <div class="new-content">
                            <a href="{{ route('topices.show',[$topice->id])}}" class="title">{{ $topice->title }}</a>
                            <div class="newspic">
                                <a href="Share/128052.html">
                                    <img src="{{ asset("uploads/warp/1.jpg") }}">
                                </a>
                            </div>
                            <div class="flex_img">
                                <p>{{ $topice->body }}</p>
                                <a href=""><span class="badge badge-primary">按摩</span></a>
                                <span class="label-danger badge">鸳鸯浴</span>
                                <span class="badge badge-pill badge-success">情趣</span>
                                <span class="badge badge-danger">莞式</span>
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
            </div>
        </div>
    </div>
    <!-- 侧边专区 -->
    <div class="con_right index">
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
@section('scripts')
<script>
    $(document).ready(function(){
        function lamp() {
            $(".content-lamp ul").animate({"margin-left":"-256px"}, function() {
                $(".content-lamp ul li:eq(0)").appendTo($(".content-lamp ul"));
                $(".content-lamp ul").css({"margin-left": 0});
            });
        }

        var scrolling = setInterval(lamp, 2000);

        $('.content-lamp').hover(function() {
            clearInterval(scrolling);
        }, function() {
            scrolling = setInterval(lamp, 2000);
        });
    });
</script>
@endsection
@include('common._tell')
@include('common._backtop')
@stop
