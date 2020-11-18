<style>
.product-info {
width: 320px;
list-style: none;
padding: 0;
}
.product-info li {
list-style: none;
overflow: auto;
border-bottom: 1px solid #eee;
padding: 10px 0;
}
.product-info li .product-left {
float: left;
}
.product-info li .product-left h3 {
font-size: 19px;
padding-top: 3px;
margin-top: 0px;
margin-bottom: 0px;
color: red;
}
.product-info li .product-left p {
font-size: 14px;
margin-top: 0px;
margin-bottom: 0px;
margin-top: 5px;
}
.product-info li .product-right {
float: right;
margin-right: 10px;
padding-top: 3px;
}
.product-info input[type="radio"] {
width: 25px;
height: 25px;
}
</style>
<div class="bs-docs-section">
    <h1 class="page-header">VIP 充值</h1>
    <p style="margin-top:20px;font-size:18px;">
        如果你已经支付成功，点击&nbsp;&nbsp;<a style="color:red;" href="">查看我的订单>></a>
    </p>
    <ul class="product-info">
        @foreach($ships as $ship)
        <li>
            <div class="product-left">
                <h3>{{ $ship->viptype_name }}</h3>
                <p>{{ $ship->description }}</p>
            </div>
            <div class="product-right">
                <input name="products" cardurl="{{ $ship->cardurl }}" type="radio" data-id="{{ $ship->id }}">
            </div>
        </li>
        @endforeach
    </ul>
    <p class="lead" style="margin-top:10px;">
        <button style="width:180px;" class="btn btn-info" id="btnpay">点击购买</button>
    </p>
    <p style="margin-top:20px;font-size:17px; color:red">
        有问题请找客服，恶意投诉钱款不退，并封号! 客服邮箱：<a href=""></a>
    </p>
</div>
