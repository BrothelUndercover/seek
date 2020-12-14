<div class="form-horizontal from_border">
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">用户组:</label>
        <div class="col-sm-10">
            @if(!$user->vip_type || $user->vip_expire_at < now()->toDateTimeString())
            <p class="form-control-static" style="color:#000;"> 普通用户</p>
            @else
             <p class="form-control-static" style="color:red;"> VIP用户</p>
            @endif
        </div>
    </div>
    @if($user->vip_type && $user->vip_expire_at > now()->toDateTimeString())
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">到期时间: </label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ $user->vip_expire_at }}({{ $user->vipTypeNanme($user->vip_type)}})</p>
        </div>
    </div>
    @endif
    <div class="form-group line-down">
        <label for="inputEmail3" class="col-sm-2 control-label text-align">金币余额:</label>
        <div class="col-sm-10">
            <p class="form-control-static" style="color:red;">{{ $user->credit }}</p>
        </div>
    </div>
    <div class="form-group line-down">
        <div class="col-sm-12">
            <p class="form-control-static"> 如果你VIP激活过程中遇到问题，请联系我们 <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{ setting('qq')}}&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:{{ setting('qq')}}:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
        </div>
    </div>
</div>
<div class="panel panel-default" style="margin-top:20px;">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th id="ctime">订单编号</th>
                    <th>订单时间</th>
                    <th>类型</th>
                    <th>价格</th>
                    <th>状态</th>
                    {{-- <th>操作</th> --}}
                </tr>
            </thead>
            <tbody>
                 @foreach($orders as $order)
                <tr>
                    <td class="ttime">
                        {{ $order->order_id}}
                    </td>
                    <td>
                        <span>{{ $order->created_at }}</span>
                    </td>
                    <td>
                        {{ $order->memberShip->viptype_name }}
                    </td>
                    <td>
                        {{ $order->memberShip->price }}
                    </td>
                    <td>
                        {!! $order->status == 1 ? "<font class='btn btn-success'>成功</font>" : '<font class="btn btn-danger">失败</font>' !!}
                    </td>
                    {{-- <td>
                        <a class="btn btn-success" data-value="17127">我已支付</a>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
