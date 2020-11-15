@extends('layouts.app')

@section('content')
<div class="container con_padding clearfix login_container">
    <div class="justify-content-center">
        <div class="login-warp">
            <div class="login-btn" style="text-align: center;font-size: 20px;font-weight: bold;margin-bottom: 10px; ">重置密码</div>

            <div class="regs-content">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                发送邮件
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
