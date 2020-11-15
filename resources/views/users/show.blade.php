@extends('layouts.app')

@section('title', ' 的个人中心')

@section('content')
<div class="container in_top">
    <div class="contact_left">
        <ul class="list-group co_ul">
            <li class="list-group-item dis_cona {{ $type == 'self' ? "conac_on" : ''}}">
                <span><i class="fa fa-user-circle"></i></span>
                <a href="{{ route('users.show',['stype' => 'self' ]) }}">个人资料</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'vip' ? "conac_on" : ''}}">
                <span><i class="fa fa-vimeo"></i></span>
                <a href="{{ route('users.show',['stype' => 'vip' ]) }}">充值VIP</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'order' ? "conac_on" : ''}}">
                <span><i class="fa fa-file-text-o"></i></span>
                <a href="{{ route('users.show',['stype' => 'order' ]) }}">我的订单</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'share' ? "conac_on" : ''}} ">
                <span><i class="fa fa-share"></i></span>
                <a href="{{ route('users.show',['stype' => 'share' ]) }}">我的分享</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'collect' ? "conac_on" : ''}}">
                <span><i class="fa fa-star"></i></span>
                <a href="{{ route('users.show',['stype' => 'collect' ]) }}">我的收藏</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'updatePassword' ? "conac_on" : ''}}">
                <span><i class="fa fa-unlock-alt"></i></span>
                <a href="{{ route('users.show',['stype' => 'updatePassword' ]) }}">修改密码</a>
            </li>
            <li class="list-group-item dis_cona {{ $type == 'gold' ? "conac_on" : ''}}">
                <span><i class="fa fa-usd"></i></span>
                <a href="{{ route('users.show',['stype' => 'gold' ]) }}">我的金币</a>
            </li>
        </ul>
    </div>
    <div class="contact_right">
        @include("users._".$type)
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function(){
        if ($(window).width() > 760 ) {
            $('.footer').css({position:'fixed',bottom:'0',width:'100%'});
        }
    });
</script>
@endsection
