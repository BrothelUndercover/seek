@extends('layouts.app')

@section('title',$area->name . '楼凤信息')

@section('content')
<style>
.flex_img>p:first-child{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;}
</style>
<div class="container con_padding con_la in_top">
    <div class="con_left content_left">
        <ul class="breadcrumb dh">
            <li>当前位置： <a href="{{ route('pages.root') }}">首页</a></li>
            <li class="active">{{ $area->name }}分享区</li>
        </ul>
        <div class="user_top">
            <div class="main-top">
                <div class="show-pic">
                    <div class="svg-container">
                        <svg version="1.1" viewbox="0 0 500 500" preserveaspectratio="xMinYMin meet" class="svg-content">
                            <circle cx="250" cy="250" r="244" class="cr"></circle>
                            <text font-family="'Helvetica Neue','PingFang SC','microsoft yahei'" font-size="280" x="0" y="1em">
                                <tspan x="110" dy="70" style="fill: #FFFFFF">{{ mb_substr($area->name,0,1)}}</tspan>
                            </text>
                        </svg>
                    </div>
                </div>
                <h1 class="title">{{ $area->name }} 性息分享</h1>
                <div class="info clearfix">
                    <div class="info-content">
                        <p class="num">{{ $area->cached_province_topices_count }}</p>
                        <span class="unit">信息分享 <i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="info-content">
                        <a href="{{ route('topices.create',['provi'=>$area->id]) }}" class="btn btn-success">发布</a>
                    </div>
                </div>
                <div class="desc">
                    <p>
                        欢迎来到{{ $area->name }}专区,我们提供了{{ $area->name }}楼凤,{{ $area->name }}兼职,{{ $area->name }}良家,{{ $area->name }}桑拿,{{ $area->name }}洗浴,{{ $area->name }}按摩,{{ $area->name }}会所等信息分享,在这里你可以看到大家分享的信息,你也可以发布信息.
                    </p>
                </div>
            </div>
        </div>
        <div class="con_tab">
            <!-- 下部内容 -->
            <ul class="trigger-menu clearfix">
                <li class="nav-list cur">
                    <i class="fa fa-file"></i>信息列表<span class="P_line dis_on"></span>
                </li>
                <li class="nav-list tow">
                    分类选择<i class="fa fa-angle-double-down" aria-hidden="true"></i>
                    <span class="P_line"></span>
                    <div class="child tddr type">
                        <div class="child-con">
                            <a class="{{ $request->category == 0 ? 'on': 'off'}}" href="{{ route('topices.index',['province'=>$area->spell,'category'=> 0 ]) }}">全部分类</a>
                            @foreach($categories as $category)
                            <a class="{{ $request->category == $category->id ? 'on': 'off'}}" href="{{ route('topices.index',['province'=>$area->spell,'category'=>$category->id]) }}">{{ $area->name }}{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-list tow">
                    城市选择<i class="fa fa-angle-double-down" aria-hidden="true"></i>
                    <span class="P_line"></span>
                    <div class="child tddr city">
                        <div class="child-con">
                            <a class="{{ $request->city == 0 ? 'on' : 'off' }}" href="{{ route('topices.index',['province'=>$area->spell,'category'=>$request->category == null ? '0': $request->category,'city'=> 0 ]) }}">全部城市</a>
                            @foreach($area->childRecursive as $city)
                                <a class="{{ $request->city == $city->id ? 'on' :'off' }}" href="{{ route('topices.index',['province'=>$area->spell,'category'=>$request->category == null ? '0': $request->category,'city'=> $city->id]) }}">{{ $city->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-list tow">
                    地区选择<i class="fa fa-angle-double-down" aria-hidden="true"></i>
                    <span class="P_line"></span>
                    <div class="child tddr area">
                        <div class="child-con">
                            <a class="{{ $request->city == 0 ? 'on' : 'off'}}" href="{{ route('topices.index',['province'=>$area->spell,'category'=>$request->category == null ? '0': $request->category,'city'=> $request->city == null ? '0' : $request->city,'county'=> 0 ]) }}">全部地区</a>
                            @foreach($area->childRecursive as $city)
                                @foreach($city->childRecursive as $county)
                                    <a class="{{ $request->county == $county->id ? 'on' :'off' }}" href="{{ route('topices.index',['province'=>$area->spell,'category'=>$request->category == null ? '0': $request->category,'city'=> $city->id,'county'=> $county->id ]) }}">{{ $county->name }}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <!-- 下部内容1 -->
            <div class="list-container" style="display: block">
                <ul id="news-lis" class="news-lis">
                    @if($request->province == 'guangdong' && $request->city == 76 || $request->city == 77)
                    <li class="clearfix">
                        <div class="new-content">
                            <a href="{{ route('topices.show',['topice'=>63356])}}" class="title"> <span class="glyphicon glyphicon-pushpin" style="margin-right:10px;"></span> 广州深圳佛山实力第一经纪人靠谱鸡头</a>
                             <div class="flex_img">
                                <p>经纪推荐，信息靠谱，约会安全，微信:yql2198343719,星级酒店或者高端公寓开课，安全有保障,有高颜值的模特、空姐、大学生、欧美洋酒、国产普通的美少女、少妇 双胞胎;按档次标价，各种类型都有、高挑模特、清纯萝莉等等</p>
                                <p>
                                    <a href="{{ route('topices.show',['topice'=>63356]) }}" >
                                       <img src="https://seguanjia.cc/uploads/upload/images/2021-01-19-10-26-04.jpg" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                    </a>
                                    <a href="{{ route('topices.show',['topice'=>63356]) }}" >
                                       <img src="https://seguanjia.cc/uploads/upload/images/2021-01-19-10-26-13.jpg" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                    </a>
                                    <a href="{{ route('topices.show',['topice'=>63356]) }}" >
                                       <img src="https://seguanjia.cc/uploads/upload/images/2021-01-19-10-26-21.jpg" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                    </a>
                                    <a href="{{ route('topices.show',['topice'=>63356]) }}" >
                                       <img src="https://seguanjia.cc/uploads/upload/images/2021-01-19-10-26-27.jpg" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                    </a>
                                </p>
                                <a href="javascript:;"><span class="badge badge-primary">莞式服务一条龙</span></a>
                                <a href="javascript:;"><span class="badge badge-primary">全套</span></a>
                                <a href="javascript:;"><span class="badge badge-primary">kb</span></a>
                                <a href="javascript:;"><span class="badge badge-primary">舌吻</span></a>
                                <a href="javascript:;"><span class="badge badge-primary">69互舔</span></a>
                                <a href="javascript:;"><span class="badge badge-primary">毒龙</span></a>
                                <p>分类: <a  style="color:#333;" href="">高端外围</a></p>
                            </div>
                            <div class="tool">
                                <span title="地区"><i class="fa fa-paper-plane" aria-hidden="true"></i>广东 - 广州(深圳)</span>
                                {{-- <span title="浏览数"><i class="fa fa-eye fa-lg"></i></span> --}}
                                {{-- <span title="推荐数"><i class="fa fa-thumbs-up"></i> 0</span> --}}
                                <span title="信息日期"><i class="fa fa-clock-o"></i>2021-01-19</span>
                            </div>
                        </div>
                    </li>
                    @endif
                    @foreach($topices as $topice)
                    <li class="clearfix">
                        <div class="new-content">
                            <a href="{{ route('topices.show',[$topice])}}" class="title">{{ $topice->title }}</a>
                             <div class="flex_img">
                                <p>{{ preg_replace('/简介：/','&nbsp;&nbsp;',$topice->excerpt) }}</p>
                                <p>
                                    @if($topice->pictures)
                                        @foreach($topice->pictures as $picture)
                                        <a href="{{ route('topices.show',[$topice]) }}" >
                                           <img src="{{ $picture }}" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                        </a>
                                        @endforeach
                                    @endif
                                </p>
                                @foreach($topice->tabs as $tab)
                                <a href="javascript:;"><span class="badge badge-primary">{{ $tab->tabname }}</span></a>
                                @endforeach
                                <p>分类: <a  style="color:#333;" href="{{ route('topices.index',['province'=>$topice->proviArea->spell,'category'=> $topice->category_id ]) }}">{{ $topice->category->name }}</a></p>
                            </div>
                            <div class="tool">
                                <span title="地区"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ $topice->cityArea->name }} - {{ $topice->countyArea->name }}</span>
                                <span title="浏览数"><i class="fa fa-eye fa-lg"></i> {{ $topice->view_count }}</span>
                               {{--  <span title="评论数"><i class="fa fa-comment comment-lg"></i> {{ count($topice->replies) }}</span> --}}
                                {{-- <span title="推荐数"><i class="fa fa-thumbs-up"></i> 0</span> --}}
                                <span title="信息日期"><i class="fa fa-clock-o"></i> {{ $topice->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <nav class="news-lis">
                    {{ $topices->links() }}
                </nav>
            </div>
        </div>
    </div>
    <!-- 侧边专区 -->
    <div class="con_right">
        <div class="list-group list_box border_con">
            @include('topices._hot',['hotTopices'=> $topices->where('is_hot',true)->take(20)])
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
