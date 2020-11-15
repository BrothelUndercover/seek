@extends('layouts.app')

@section('content')
<div class="container con_padding clearfix login_container">
    <div class="justify-content-center">
        <div class="login-warp">
                <div class="login-btn" style="text-align: center;font-size: 20px;font-weight: bold;margin-bottom: 10px; ">{{ __('Login') }}</div>

                <div class="regs-content">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf

                        <div class="form-group  has-feedback">
                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control input_line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="你的用户名" autofocus>
                                <i class="fa fa-user form-control-feedback"></i>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  has-feedback">
                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control input_line @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="你的密码">
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group  has-feedback">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
