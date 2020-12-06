<div class="navbar-fixed-top">
    <nav class="navbar navbar-inverse nav_width" style="border: 0 !important">
        <div class="container H_top">
            <div class="navbar-header2 col-sm-1 col-lg-1">
                <a class="navbar-brand" href="{{ route('pages.root') }}">
                    <div class="logo">
                        <img src="{{ asset('logo.png') }}" alt="网站Logo">
                    </div>
                </a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse xs_down" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('pages.root') }}"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
                    <li><a href="{{ route('pages.region') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> 地区</a></li>
                    <li><a href="{{ route('pages.jieshao') }}"><i class="fa fa-book" aria-hidden="true"></i> 介绍</a></li>
                </ul>
                <form method="GET" action="{{ route('topices.search') }}" class="navbar-form navbar-left">
                    <div class="form-group btn_pos">
                        <input type="text" value="{{ isset($request->q)? $request->q : '' }}" name="q" class="form-control input_line" placeholder="搜索">
                        <button type="submit" class="btn btn_sec "><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="login_logo">
                @guest
                <div class="login_logo">
                    <i class="fa fa-user-circle-o login_is" aria-hidden="true"></i>
                    <div class="log">
                        <a href="{{ route('login') }}">登录</a>
                        <p><a href="{{ route('register') }}">注册</a></p>
                    </div>
                    <ul class="login_ul">
                        <li>
                            <a href="{{ route('login') }}">登录</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">注册</a>
                        </li>
                    </ul>
                </div>
                @else
                 <div class="myshare">
                    <button class="btn btn-share" onclick="window.location='{{ route('topices.create',['provi'=> 2]) }}'">写分享</button>
                </div>
                <div class="user_img_box">
                    <img src="{{ Auth::user()->avatar }}" alt="头像">
                    <ul class="user_silder">
                        <li>
                            <a href="{{ route('users.show',['stype' => 'self'])}}">
                                <i class="fa fa-user-circle"></i>
                                个人资料
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.show',['stype' => 'vip']) }}">
                                <i class="fa fa-vimeo"></i>
                                充值VIP
                            </a>
                        </li>
                       {{--  <li>
                            <a href="{{ route('users.show',['stype' => 'order']) }}">
                                <i class="fa fa-file-text-o"></i>
                                我的订单
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('users.show',['stype' => 'share']) }}">
                                <i class="fa fa-share"></i>
                                我的分享
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.show',['stype' => 'collect']) }}">
                                <i class="fa fa-star"></i>
                                我的收藏
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.show',['stype'=>'updatePassword']) }}">
                                <i class="fa fa-unlock-alt"></i>
                                修改密码
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('users.show',['stype'=>'glod']) }}">
                                <i class="fa fa-usd"></i>
                                我的金币
                            </a> --}}
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('你确定退出吗?');">
                                 @csrf
                                <button style="border: none;background: none;color: #333;font-size: 14px;padding-left:9pt;" type="submit">
                                    <i style="color: #ff634f;margin-right:5px;width:20px;" class="fa fa-sign-out"></i>
                                    退出
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endguest
            </div>
        </div>
    </nav>
</div>
