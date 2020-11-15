<svg id="backTop" style="fill: rgba(147, 42, 98, 0.9);background-color: rgba(147, 42, 98, 0.2);border-radius: 6px;opacity: 1;height: 50px;width: 50px;font-size: 25px;line-height: 50px;position:fixed;right: 20px;bottom: 25px;cursor: pointer;font-family: sans-serif;display: none;" viewBox="0 0 256 256" version="1.1">
    <path d="M83.5244052,130.453237 L129.059785,84.9178576 L174.595164,130.453237 L144.213452,130.453237 L144.213452,186.792818 L113.896389,186.792818 L113.896389,130.453237 L83.5244052,130.453237 Z M64.431707,68.715835 L64.431707,75.0983746 L193.678134,75.0983746 L193.678134,68.715835 L64.431707,68.715835 Z"></path>
</svg>
<script>
    window.onload = function(){
        $(window).scroll(function() {
           var top = $(this).scrollTop();     //获取相对滚动条顶部的偏移
           if (top > 200) {      //当偏移大于200px时让图标淡入（css设置为隐藏）
            $("#backTop").stop().fadeIn();
           }else{//当偏移小于200px时让图标淡出
            $("#backTop").stop().fadeOut();
           }
        });
        $("#backTop").click(function(){
            $("body , html").animate({scrollTop:0},300);   //300是所用时间
        });
    }
</script>
