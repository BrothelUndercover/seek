<div class="list-group-item List_float list_likes cont_float" style="font-size: 17px;">
    <div class="bs-callout bs-callout-info">
        <span>热门信息</span>
    </div>
</div>
<ul class="tj_list">
    @foreach($hotTopices as $hot)
    <li>
        <a href="{{ route('topices.show',['topice'=>$hot->id]) }}">{{ $hot->title}}</a>
        <p><span>浏览：{{ $hot->view_count }}</span><span>日期：{{ $hot->created_at }}</span></p>
    </li>
    @endforeach
</ul>
