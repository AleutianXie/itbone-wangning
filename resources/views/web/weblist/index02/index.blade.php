<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>3d旋转</title>
</head>
<style type="text/css" class="cellcss">
    *{margin:0;padding: 0;}
    li{list-style: none;}
    .three {width:800px;height:360px;margin:200px auto;perspective: 800px;position: relative;}
    .cell {height:360px;clear: both;}
    .indexL {z-index: -1;}
    .cell li {width:100px;height: 360px;float: left;position: relative;;
        transform-style:preserve-3d;-webkit-transform-style: preserve-3d;transition:2s;transform: translateZ(-180px);}
    .cell li  span{display:block;width:100px;height:360px;position: absolute;}
    .cell li  span:nth-child(1){top:-360px;transform-origin:bottom;transform:translateZ(180px) rotateX(90deg);background: url("{{ asset('assets/images/images_3d/1.jpg') }}")}
    .cell li  span:nth-child(2){top:360px;transform-origin:top;transform:translateZ(180px) rotateX(-90deg);background: url("{{ asset('assets/images/images_3d/2.jpg') }}") no-repeat;}
    .cell li  span:nth-child(3){transform:translateZ(180px);background: url("{{ asset('assets/images/images_3d/3.jpg') }}") no-repeat ;}
    .cell li  span:nth-child(4){transform:translateZ(-180px) rotateX(180deg);background: url("{{ asset('assets/images/images_3d/4.jpg') }}") no-repeat;}
    .btn{position: absolute;bottom: 10px;right:20px;}
    .btn li{width:20px;height:20px;background: #000000;color:#ffffff;text-align: center;line-height: 20px;border-radius: 10px;float: left;cursor: pointer;margin-left: 5px;box-shadow: 1px 1px 2px    #fafafa;}

</style>
<div class="three">
    <ul class="cell">
    </ul>
    <ul class="btn">
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
    </ul>
</div>
<script src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
<script>
    function paly(x) {
        var lWidth = 800 / x;
        var cHtml = "", dHtml = "", zHtml = "", tHtml = "";
        var z = 0;
        for (var i = 0; i < x; i++) {
            cHtml += "<li><span></span><span></span><span></span><span></span></li>";
            dHtml += ".cell li:nth-child(" + (i + 1) + ") span{background-position:" + (-i * lWidth) + "px;}";
            tHtml += ".cell li:nth-child(" + (i + 1) + ") {transition: 2s " + i * 0.5/x + "s;}";
            if (i > x / 2) {
                z--;
                zHtml += ".cell li:nth-child(" + (i + 1) + "){z-index:" + z + ";}"
            }
        }
        $(".cell").append(cHtml);
        $(".cellcss").append(dHtml + zHtml + tHtml);
        $(".cell li").css("width", lWidth);
        $(".cell li span").css("width", lWidth);
    };
    paly(20);
    $('.btn li').click(function(){
        $(this).siblings().css({background:'black',color:'white'});
        $(this).css({background:'white',color:'black'});
        var a = $(this).index();
        var b = a*90+'deg';
        $('.cell li').css("transform","translateZ(-180px) rotateX("+b+")");
    });

    var i = 0;
    var timer = setInterval(function(){
        if(i>=$('.btn li').size()){
            i=0;
        }
        $('.btn li').css({background:'black',color:'white'});
        $('.btn li').eq(i).css({background:'white',color:'black'});
        var b = i*90+'deg';
        $('.cell li').css("transform","translateZ(-180px) rotateX("+b+")");
        i++;
    },3000);

    $('.three').mouseover(function(){
        clearInterval(timer);
    });
    $('.three').mouseout(function(){
        timer = setInterval(function(){
            if(i>=$('.btn li').size()){
                i=0;
            }
            $('.btn li').css({background:'black',color:'white'});
            $('.btn li').eq(i).css({background:'white',color:'black'});
            var b = i*90+'deg';
            $('.cell li').css("transform","translateZ(-180px) rotateX("+b+")");
            i++;
        },3000);
    });


</script>
</body>
</html>