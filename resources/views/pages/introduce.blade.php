@extends('layouts.app')

@section('content')
<div class="container in_top">
    <div class="row">
        <div class="col-md-9" role="main">
            <div class="bs-docs-section">
                <h1 id="js-overview" class="page-header"><a class="anchorjs-link icon-link" href="#js-overview" data-anchorjs-icon=""></a>概览</h1>
                <h2 id="js-about"><a class="anchorjs-link  icon-link" href="#js-about" data-anchorjs-icon=""></a>关于我们网站</h2>
                <div class="bs-callout bs-callout-danger">
                    <p>1、本站致力于为LY打造一个真实自由分享的交流平台。</p>
                    <p>2、本站信息均来自网络，会员提交，保存着海量信息，鉴别工作难度大，经常也有失效信息JS更换号码等情况，真伪请自行辨别。</p>
                </div>
                <h2 id="js-push"><a class="anchorjs-link  icon-link" href="#js-push" data-anchorjs-icon=""></a>发布信息</h2>
                <div class="bs-callout bs-callout-danger">
                    <p>1、当有ly购买查看你的信息，你将获得标注金额的60%作为回报。</p>
                    <p>2、本站禁止发布商业贴，广告贴，一经发现，封号处理。</p>
                </div>
                <h2 id="js-gold"><a class="anchorjs-link  icon-link" href="#js-gold" data-anchorjs-icon=""></a>金币来源</h2>
                <div class="bs-callout bs-callout-danger">
                    <p>1、发布真实信息后，管理审核后会根据贴子的质量给予一定的发贴奖励，<a href="#js-push">查看发布信息</a></p>
                    <p>2、推广本站，本站会分配给你一个专属的分享链接，复制分享链接给你的朋友或者群，当有人通过分享的链接注册你将获得10金币，当注册用户分享或购买信息你分别将获得20金币，当注册用户充值你将获得50金币。<a href="Account.html">点击查看我的专属链接</a></p>
                    <p>3、对于没有时间发贴的ly，我们提供vip服务，详情参考个人页面充值vip选项。</p>
                </div>
                <h2 id="js-buy"><a class="anchorjs-link icon-link" href="#js-buy" data-anchorjs-icon=""></a>购买信息</h2>
                <div class="bs-callout bs-callout-danger">
                    <p>1、本站提供免费的信息共享，高质量的信息需要金币购买。</p>
                    <p>2、用户购买这条信息后，将永久享有该信息，可在我的购买中查看。</p>
                    <p>3、购买信息后，如发现被js骗钱 黑店等情况，你可以在该条信息中进行举报，一经核实退回购买金币，该贴列入黑名单。</p>
                </div>
            </div>
        </div>
        <div class="col-md-3" role="complementary">
            <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
                <ul class="nav bs-docs-sidenav">
                    <li><a href="#js-overview">概览</a></li>
                    <li><a href="#js-about">关于我们</a></li>
                    <li><a href="#js-push">发布信息</a></li>
                    <li><a href="#js-gold">金币来源</a></li>
                    <li><a href="#js-buy">购买信息</a></li>
                </ul>
                <a class="back-to-top" href="#top">
                    返回顶部
                </a>
            </nav>
        </div>
    </div>
</div>
@stop
@section('styles')
<link rel="stylesheet" href="{{ asset('css/docs.min.css') }}">
@stop
