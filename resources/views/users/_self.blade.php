<div class="form-horizontal from_border">
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">用户名:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">推广链接:</label>
        <div class="col-sm-10">
            <p>
                <span >我发现一个真男人福利网站：<i id="copyVal">{{ env('APP_URL').'/share/'.Auth::user()->sharecode }}</i></span>
                <button type="button" id="btncopy" data-clipboard-target="#copyVal" class="btn btn-default btn-style">复制</button>
            </p>
            <p class="form-control-static">通过推广<font color="red">你将获得金币</font>，有效注册用户<font color="red">你将获得10金币</font>，注册用户分享信息<font color="red">你将获得20金币</font>，注册用户购买<font color="red">你将获得20金币</font>，充值VIP<font color="red">你将获得50金币</font>。</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">电子邮件:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">金币:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->credit }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">用户组:</label>
        <div class="col-sm-10">
            <p class="form-control-static">
            @if(!Auth::user()->vip_type)
                普通用户
            {{--     &nbsp;&nbsp;<a href="" class="btn btn-default btn-style">充值</a> --}}
                &nbsp;&nbsp;<a href="" class="btn btn-default btn-style">激活</a>
            @elseif(Auth::user()->vip_type)
                <span style="color: red;font-size: 18px;margin-right:10px;">VIP会员</span>
                <span>会员到期时间: <i style="color:red;">{{Auth::user()->vip_expire_at }}</i></span>
            @endif
            </p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">当前用户状态</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->user_status == true ? '正常': '禁用' }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">发帖数量:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ count(Auth::user()->topices)}}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <label class="col-sm-2 control-label text-align">评论数量:</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ count(Auth::user()->replies) }}</p>
        </div>
    </div>
</div>

