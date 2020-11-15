@extends('layouts.app')

@section('content')
<div class="container con_padding clearfix login_container">
    <div class="justify-content-center">
        <div class="login-warp">
            <div class="login-btn" style="text-align: center;font-size: 20px;font-weight: bold;margin-bottom: 10px; ">{{ __('Register') }}</div>

            <div class="regs-content">
                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                    @csrf

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input_line  @error('name') is-invalid @enderror" id="username" name="name" value="{{ old('name') }}" placeholder="用户名" equired autocomplete="name" autofocus>
                            <i class="fa fa-user form-control-feedback"></i>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input id="email" type="email" class="form-control input_line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="邮箱地址" >
                            <i class="fa fa-envelope form-control-feedback"></i>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input type="password" class="form-control input_line @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="你的密码">
                            <i class="fa fa-unlock-alt form-control-feedback "></i>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input id="password-confirm" type="password" class="form-control input_line" name="password_confirmation" placeholder="确认密码" required autocomplete="new-password">
                            <i class="fa fa-unlock-alt form-control-feedback "></i>
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                      <div class="col-sm-12">
                        <input id="captcha" class="form-control input_line {{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" placeholder="验证码" required>

                        <img class="verify" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                        @if ($errors->has('captcha'))
                          <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $errors->first('captcha') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
