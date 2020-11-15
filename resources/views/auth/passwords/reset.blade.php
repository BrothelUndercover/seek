@extends('layouts.app')

@section('content')
<div class="container con_padding clearfix login_container">
    <div class="justify-content-center">
        <div class="login-warp">
            <div class="login-btn" style="text-align: center;font-size: 20px;font-weight: bold;margin-bottom: 10px; ">{{ __('Reset Password') }}</div>

            <div class="regs-content">
                <form method="POST" action="{{ route('password.update') }}" class="form-horizontal">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input id="email" type="email" class="form-control input_line @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="你的邮箱" required autocomplete="email" autofocus>
                            <i class="fa fa-envelope form-control-feedback"></i>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <div class="col-sm-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="你的新密码">
                            <i class="fa fa-unlock-alt form-control-feedback "></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <div class="col-sm-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="确认新密码">
                        </div>
                        <i class="fa fa-unlock-alt form-control-feedback "></i>
                    </div>

                    <div class="form-group has-feedback">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
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
