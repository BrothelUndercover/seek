@extends('layouts.app')
@section('title', setting('seo_title','地区-分享楼凤兼职，酒店会所，桑拿洗浴，全国楼凤'))

@section('styles')

@stop

@section('content')
<link href="{{ asset('css/limarquee.css') }}" rel="stylesheet">
<style>
.content-lamp{/*width: 960px;*/height: 200px;overflow: hidden;margin: auto;margin-bottom: 18px;}
.dowebok {width: 100%;margin: 5px auto;font-size: 0;}
.dowebok img {margin-left: 10px;vertical-align: top;height: 180px;width: 250px;}
.more {clear:both; margin: 0 auto;text-align: center;line-height: 25px;margin-bottom: 19px;}
.more-button{ width:48%;height:42px;line-height: 25px; border:none;border-radius: 18px;background: #ccc;margin: 0 auto;}
.more-button:focus,
.more-button:active:focus,
.more-button.active:focus,
.more-button.focus,
.more-button:active.focus,
.more-button.active.focus {outline: none;border-color: transparent;box-shadow:none;}
#loading img{margin: 0 auto}
.pHot a {font-weight: bold;margin: 0px 5px;color: #333;}
.pHot{word-break: keep-all;word-wrap: break-word;font-size:13px;line-height: 25px;}
.flex_img>p:first-child{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;}
</style>
<div class="container in_top index">
      @include('common._message')
    <div class="container">
        <div class="alert alert-success" role="alert" style="text-align: left;font-size: none;">
            <p class="alert-link">色管家，您的专业贴身品茶管家，专注私人夜娱定制❤</p>
        </div>
        <div class="root-search">
            <form action="{{ route('topices.search') }}" method="GET">
            <div class="input-group" style="margin:15px auto !important;">
                    <input type="text" class="form-control" onkeypress="" name="query" value="{{ isset($request->query)? $request->query: '' }}" id="search_keyword" placeholder="输入查询城市,其他关键字">
                    <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">搜索<span class="glyphicon glyphicon-search" style="margin-left:5px;"></span></button>
                    </span>
            </div>
            </form>
             <p class="pHot">
                <span class="btn btn-danger btn-sm">热门城市:</span>
                    @foreach($hotCities as $city)
                        <a href="{{ route('topices.index',['province'=> $city->upperLevel->spell,'category'=> 0,'city'=>$city->id]) }}">{{ $city->name }}</a>
                    @endforeach
            </p>
        </div>
        <div class="dowebok str_wrap" style="height: 250px;">
            <div class="str_move str_origin" style="left: 6.96px;">
                @foreach($carousels as $carousel)
                    <a href="{{ route('topices.show',$carousel->topice_id) }}"><img src="{{ $carousel->image }}" alt=""></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- 内容 -->
<div class="container con_padding con_la index">
    <div class="con_left content_left">
        <div class="con_tab">
            <!-- 下部内容1 -->
            <div class="list-container index" style="display: block">
                <ul id="news-lis" class="news-lis">
                    @foreach($topices as $topice)
                    <li class="clearfix">
                        <div class="new-content">
                            <a href="{{ route('topices.show',[$topice])}}" class="title">{{ $topice->title }}</a>
                            <div class="flex_img">
                                <p>{{ preg_replace('/简介：/','&nbsp;&nbsp;',$topice->excerpt) }}</p>
                                <p>
                                    @if($topice->pictures)
                                        @foreach($topice->pictures as $picture)
                                        <a href="{{ route('topices.show',[$topice]) }}" >
                                            <img src="{{ $picture }}" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                        </a>
                                        @endforeach
                                    @endif
                                </p>
                                @foreach($topice->tabs as $tab)
                                <a href="javascript:;"><span class="badge badge-primary">{{ $tab->tabname }}</span></a>
                                @endforeach
                                <p>分类: <a  style="color:#333;" href="{{ route('topices.index',['province'=>$topice->proviArea->spell,'category'=> $topice->category_id]) }}">{{ $topice->category->name }}</a></p>
                            </div>
                            <div class="tool">
                                <span title="地区"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{$topice->proviArea->name }} - {{ $topice->cityArea->name }}</span>
                                <span title="浏览数"><i class="fa fa-eye fa-lg"></i> {{ $topice->view_count }}</span>
                                {{-- <span title="评论数"><i class="fa fa-comment comment-lg"></i> {{ $topice->comment_count }}</span> --}}
                                <span title="发帖时间"><i class="fa fa-clock-o"></i> {{ $topice->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="more">
            <h3 id="loading"><img class="hidden" src="{{ asset('loading.gif')}}" alt="加载中..."></h3>
            <button class="more-button loadmore">加载更多</button>
        </div>
    </div>
    <!-- 侧边专区 -->
    <div class="con_right index">
        <div class="list-group list_box">
            <div class="list-group-item color_lis cont_float">
                <div class="bs-callout bs-callout-info">
                    <span>热门城市</span>
                </div>
            </div>
            <ul class="list_bot">
              @foreach($hotCities as $city)
                <li><a href="{{ route('topices.index',['province'=> $city->upperLevel->spell,'category'=> 0,'city'=>$city->id]) }}">{{ $city->name }}</a></li>
               @endforeach
            </ul>
        </div>
        <div class="list-group list_box border_con">
           {{-- 热门推荐 --}}
           @include('topices._hot',['hotTopices'=> $topice->withOrder('ishot')->take(20)->get()])
        </div>
        {{-- 友情链接 --}}
        <div class="list-group list_box border_con">
            <div class="list-group-item List_float list_likes cont_float" style="font-size: 17px;">
                <div class="bs-callout bs-callout-info">
                    <span>友情链接</span>
                </div>
            </div>
          <ul class="tj_list">
            @foreach($links as $link)
                <li>
                    <a style="height:auto;" href="{{ $link->link }}"><img width="120" src="" alt="">{{ $link->title }}</a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{ asset('js/jquery.limarquee.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.dowebok').liMarquee({ scrollamount: 80, hoverstop: true });
            moment.locale('zh-cn');
        var p = 1;
        $(".loadmore").click(function(){
            $('.more button').addClass('hidden');
            $("#loading img").removeClass('hidden').addClass('show');
            p++;
           axios.get('{{ route('pages.fatch') }}', {
               params: {
                 page: p
               }
             })
             .then(function (response) {
               var data = response.data;
               if (data.code == 1) {
                    for (let index in data.topices.data) {
                        let images = '';
                        let tabs = '';
                        let topiceUrl = '{{ route('topices.show',['topice'=> 'topiceid']) }}'.replace('topiceid',data.topices.data[index].id);
                        let categoryUrl = '{{ route('topices.index',['province'=>'province','category'=> '0'])}}'.replace('province',data.topices.data[index].provi_area.spell);
                        for (let i = 0; i < data.topices.data[index].pictures.length; i++) {
                                  images +=  `<a href="`+topiceUrl+`">
                                        <img src="`+data.topices.data[index].pictures[i]+`" class="img-thumbnail" style="max-width:28% !important;margin: 3px;">
                                    </a>`
                                }
                        for (let j = 0; j < data.topices.data[index].tabs.length; j++) {
                            tabs += `<a href="javascript:;"><span class="badge badge-primary">`+ data.topices.data[index].tabs[j].tabname +`</span></a>`
                        }
                        let html = `<li class="clearfix">
                        <div class="new-content">
                            <a href="`+topiceUrl+`" class="title">`+data.topices.data[index].title+`</a>
                            <div class="flex_img">
                                <p>`+data.topices.data[index].excerpt.replace('简介：\n','&nbsp;&nbsp;')+`</p>
                                <p>`+images+`</p>
                                `+ tabs +`
                                <p>分类: <a  style="color:#333;" href="`+ categoryUrl+`">`+data.topices.data[index].category.name+`</a></p>
                            </div>
                            <div class="tool">
                                <span title="地区"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;`+data.topices.data[index].provi_area.name+` -`+data.topices.data[index].city_area.name+`</span>
                                <span title="浏览数"><i class="fa fa-eye fa-lg"></i>&nbsp;`+data.topices.data[index].view_count+`</span>
                                <span title="发帖时间"><i class="fa fa-clock-o"></i>&nbsp;`+ moment().to(moment(data.topices.data[index].created_at))+`</span>
                            </div>
                        </div>
                    </li>`
                        $("#news-lis").append(html);
                    }
                          $("#loading img").removeClass('show').addClass('hidden');
                          $('.more button').removeClass('hidden');
               } else {
                    $(".more").append('<p style="text-align:center;font-size:16px;">请求异常</p>');
                    $(".loadmore").remove();
               }
             })
             .catch(function (error) {
               console.log(error);
             });
        });
        //小于820显示搜索框
         var visibleWidht = $(window).width();
         if (visibleWidht > 481) {
            $('.root-search').css({'display': "none"});
         } else {
            $('.root-search').css({'display': "block"});
            $('.app-page-search').addClass('hidden');
         }
    });
</script>
@endsection
{{-- @include('common._tell') --}}
@include('common._backtop')
@endsection
