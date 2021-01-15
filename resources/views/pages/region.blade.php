@extends('layouts.app')
@section('title', setting('seo_title','地区-分享楼凤兼职，酒店会所，桑拿洗浴，全国楼凤'))

@section('styles')

@stop

@section('content')
<div class="container con_padding con_padd">
    <div class="row row-offcanvas row-offcanvas-right in_top in_left">
        <!-- 专区 -->
        <div class="col-xs-12 col-sm-12 col-lg-12 padding_none con_width">
           @foreach($provinces as $province)
            <div class="list-group lis">
                <div class="list-group-item color_lis">
                    <div class="c_logo">
                        <div class="svg-container">
                            <svg version="1.1" viewbox="0 0 500 500" preserveaspectratio="xMinYMin meet" class="svg-content">
                                <circle cx="250" cy="250" r="244" class="cr"></circle>
                                <text font-family="'Helvetica Neue','PingFang SC','microsoft yahei'" font-size="280" x="0" y="1em">
                                    <tspan x="110" dy="70" style="fill: #FFFFFF">{{ mb_substr($province->name,0,1) }}</tspan>
                                </text>
                            </svg>
                        </div>
                    </div>
                    <h2>{{ $province->name }}专区</h2>
                </div>
                <div class="lo">
                    <div class=" lo_row">
                            <div class="flex_box">
                                <div class="C-word">
                                    <a href="{{ route('topices.index',['province'=> $province->spell])  }}"> <h4><i class="fa fa-share-alt" aria-hidden="true"></i>分享区</h4></a>
                                     共有<b style="color: #f30">{{ count($province->provTopices) }}</b>条信息<br>
                                </div>
                            </div>
                       {{--      <div class="flex_box">
                                <div class="C-word">
                                    <a href="javascript:myalert();"> <h4><i class="fa fa-jpy" aria-hidden="true"></i>悬赏区</h4></a>
                                     共有<b style="color: #f30">N+1</b>条信息<br>
                                </div>
                            </div>
                            <div class="flex_box">
                                <div class="C-word">
                                    <a href="javascript:myalert();"> <h4><i class="fa fa-credit-card" aria-hidden="true"></i>商家区</h4></a>
                                     共有<b style="color: #f30">N+1</b>条信息<br>
                                </div>
                            </div>
                            <div class="flex_box">
                                <div class="C-word">
                                    <a href="javascript:myalert();"> <h4><i class="fa fa-thumbs-down" aria-hidden="true"></i>曝光区</h4></a>
                                     共有<b style="color: #f30">N+1</b>条信息<br>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- 侧边导航 -->
    <div class="sider_left">
        <p>导航</p>
        <ul class="silder_ul">
            @foreach($provinces as $province)
            <li>
                <a href="{{ route('topices.index',['province'=> $province->spell])  }}">{{ $province->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<script>
    function myalert() {
        layer.msg("暂未开放,开放时间另行通知.");
    }
</script>
{{-- @include('common._tell') --}}
@include('common._backtop')
@stop
