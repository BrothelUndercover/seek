<div class="comment-do-warp clearfix">
    <div class="comment-img">
        <img src="{{ Auth::user()->avatar }}" alt="{{  Auth::user()->name }}">
    </div>
    <div class="comment-do">
        <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="topice_id" value="{{ $topice->id }}">
            @csrf
            <textarea name="content" id="reply" cols="30" rows="10" placeholder="发表你精彩的言论..."></textarea>
            <div class="comment-do-btn clearfix">
                <button class="on" id="btnReply">提交</button>
                <strong  class="comment-error" style="color: red;"></strong>
            </div>

        </form>
    </div>
</div>
<script>
    window.onload = function(){
        $("#btnReply").click(function(){
            if($.trim($("#reply").val()).length === 0){
                $('.comment-error').text('请提交不少于2个字符的言论');
                return false;
            }
        })
    }

</script>
