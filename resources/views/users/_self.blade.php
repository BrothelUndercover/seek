<div class="form-horizontal from_border">
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">用户名:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->name }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        {{-- <label for="inputEmail3" class="col-sm-2 control-label text-align">推广链接:</label> --}}
        <div class="col-sm-10">
            {{-- <p> --}}
               {{--  <span >我发现一个真男人福利网站：<i id="copyVal">{{ env('APP_URL').'/share/'.Auth::user()->sharecode }}</i></span> --}}
         {{--        <button type="button" id="btncopy" data-clipboard-target="#copyVal" class="btn btn-default btn-style">复制</button> --}}
            {{-- </p> --}}
           {{--  <p class="form-control-static">通过推广<font color="red">你将获得金币</font>，有效注册用户<font color="red">你将获得10金币</font>，注册用户分享信息<font color="red">你将获得20金币</font>，注册用户购买<font color="red">你将获得20金币</font>，充值VIP<font color="red">你将获得50金币</font>。</p> --}}
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">电子邮件:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->email }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">金币:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->credit }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">用户组:</label>
        <div class="col-sm-10">
            <p class="form-control-static">
            @if(! $user->vip_type)
                普通用户
            {{--     &nbsp;&nbsp;<a href="" class="btn btn-default btn-style">充值</a> --}}
                &nbsp;&nbsp;<a href="javascript:;" onclick="activateVip()" class="btn btn-default btn-style">激活会员</a>
            @elseif($user->vip_type && $user->vip_expire_at > now()->toDateTimeString())
                <span style="color: red;font-size: 18px;margin-right:10px;">VIP会员</span>
                <span>会员到期时间: <i style="color:red;">{{ $user->vip_expire_at }}</i></span>
            @elseif($user->vip_type && $user->vip_expire_at < now()->toDateTimeString())
                <span style="font-size: 18px;margin-right:10px;">普通会员</span>
                <span>您的会员已到期,到期时间:<i style="color:red;">{{ $user->vip_expire_at }}</i></span>
                 &nbsp;&nbsp;<a href="javascript:;" onclick="activateVip()" class="btn btn-default btn-style">激活会员</a>
            @endif
            </p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">当前用户状态</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->user_status == true ? '正常': '禁用' }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">发帖数量:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ count($user->topices)}}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">评论数量:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ count($user->replies) }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">最后活跃时间:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->last_actived_at->diffForHumans() }}</p>
        </div>
    </div>
     <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">客服QQ:</label>
        <div class="col-sm-10">
            <p class="form-control-static"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{ setting('qq')}}&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:{{ setting('qq')}}:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
        </div>
    </div>
    <div id="add-main" style="display: none;">
        <div style="margin-right: 10px;margin-left: 10px;">
          <form class="form-horizontal"id="add-form"  method="POST" action="{{ route('users.authSecret') }}">
            @csrf
               <div class="form-group  has-feedback" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <input id="secret" type="secret" class="form-control input_line @error('secret') is-invalid @enderror" name="secret" value="{{ old('secret') }}" required autocomplete="secret" placeholder="输入激活秘钥" autofocus>
                        <i class="fa fa-key form-control-feedback"></i>

                        @error('secret')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
              <div class="form-group  has-feedback">
                <div class="col-sm-12">
                   <button type="submit" class="btn btn-primary btn-block">提交</button>
                  {{-- <button type="reset" class="btn btn-default btn-block" id="closeBtn">取消</button> --}}
                </div>
              </div>
          </form>
        </div>
    </div>
</div>
<script>
    function activateVip(){
        layer.open({
            type: 1,
            title:"开通会员",
            closeBtn: 1,
            anim: 2,
            area: ['35rem', '32rem'],
            shadeClose: false,
            content: $("#add-main"),
            success: function(layero, index){},
            yes:function(){

            }
        });
    }
</script>

