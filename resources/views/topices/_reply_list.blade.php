<div class="comment-look" id="Comment">
    <div class="comment-look-content">
        <ul id="listReply" page-count="1" page-index="1">
            @foreach($replies as $index => $reply)
            <li>
                <div class="comment-look-img">
                    <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}">
                </div>
                <div class="comment-look-name">
                    <a href="#">{{ $reply->user->name }}</a>
                </div>
                <div class="comment-look-descr">
                    <span class="floor">{{ $reply->created_at->diffForHumans()}}</span>
                </div>
                <div class="comment-look-context">
                    {{ $reply->content }}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
<!-- 分页 -->
    @if( count($replies))
        <div class="comment-page">
            <a data-page="2" class="loadmore" id="loadmore">加载更多评论</a>
        </div>
    @else
         <div class="empty-block" style="text-align: center;">暂无评论 ~_~ </div>
    @endif
</div>
