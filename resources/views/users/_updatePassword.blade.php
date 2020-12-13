<div class="form-horizontal from_border">
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="form-group line-down">
            <label class="col-sm-2 control-label text-align">新密码:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control input_line @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="输入新的密码">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group line-down non-line">
            <label class="col-sm-2 control-label text-align">确认密码:</label>
            <div class="col-sm-4">
              <input id="password-confirm" type="password" class="form-control input_line" name="password_confirmation" placeholder="请再次输入密码" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default save-btn" id="save">保存</button>
            </div>
        </div>
    </form>
</div>
