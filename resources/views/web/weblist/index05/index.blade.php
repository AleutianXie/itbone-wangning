<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
    <script type="text/javascript" src="js/waterfall.js"></script>

    <title></title>
    <style type="text/css">
        *{padding: 0;margin:0;}
        #main{
            position: relative;
        }
        .pin{
            padding: 15px 0 0 15px;
            float:left;
        }
        .box{
            padding: 10px;
            border:1px solid #ccc;
            box-shadow: 0 0 6px #ccc;
            border-radius: 5px;
        }
        .box img{
            width:162px;
            height:auto;
        }
        /* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        body,html {
            width: 100%;
            height: 100%;
            background: #eee;

        }

        #box {
            width: 1000px;
            margin: 0 auto;
            margin-top: 5px;
            border-radius: 5px;
            border: 2px solid #ccc;
            background: #ccc;
            box-shadow: 5px 5px 5px #ccc;
            position: relative;
            padding-top: 30px;
        }

        #box div {
            box-shadow: 2px 2px 5px #333;
            display: inline-block;
            margin: 5px 8px;
            border-radius: 8px;
            position: absolute;
            background: rgb(207, 203, 102);
        }

        #box div img {
            border-radius: 8px;
        }

        #box div p {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            color: rgb(64, 19, 177);
            height: 20px;
            line-height: 20px;
        }

        #box div p span {
            color: rgb(141, 12, 110);
        }

        #dark {
            width: 100%;
            height: 100%;
            background: black;
            position: fixed;
            opacity: 0.8;
            top: 0;
            z-index: 1;
            display: none;
        }

        #content {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            z-index: 2;
            display: none;
        }

        #tops {
            width: 100%;
            height: 567px;
        }

        #tops p.x {
            width: 47px;
            height: 47px;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 4;
            opacity: 0.6;
            background: url(../images/layerclose.hover.png);
        }

        #tops .LR {
            width: 100%;
            height: 550px;
        }

        #tops .LR div.bigarea {
            width: 1205px;
            height: 550px;
            float: left;
            position: relative;
        }

        #tops .LR p {
            width: 80px;
            height: 550px;
            float: left;
            opacity: 0;
        }

        #tops .LR p.left {
            background: url(../images/left_hover.png ) no-repeat -10px center;
        }

        #tops .LR p.right {
            float: right;
            background: url(../images/right_hover.png ) no-repeat left center;
        }

        #tops .LR .bigarea img {
            display: none;
            margin: 0 auto;
            width: 876px;
            height: 400px;
            position: absolute;
        }

        #tops .LR .bigarea img:first-child {
            display: block;
        }

        #bots {
            width: 100%;
            height: 100px;
            position: relative;
            background: #0F1016;
        }

        #bots .kuang {
            position: absolute;
            left: 646px;
            top: 15px;
        }

        #bots .langImg {
            width: 1174px;
            height: 70px;
            margin-left: 100px;
            padding-top: 15px;
            overflow: hidden;
            position: relative;
        }

        #bots .langImg .areaImg {
            height: 70px;
            position: absolute;
            left: 0px;
            margin-left: 546px;
        }

        #bots .langImg .areaImg img {
            width: 64px;
            height: 64px;
            padding: 3px;
            display: block;
            float: left;
        }

        #bots .LeftSmallImg {
            width: 10px;
            height: 70px;
            float: left;
            margin-left: 66px;
            margin-top: 15px;
            background: url(../images/SmallImgLeft.png) no-repeat;
        }

        #bots .RightSmallImg {
            width: 10px;
            height: 70px;
            float: right;
            margin-top: 15px;
            margin-right: 66px;
            background: url(../images/smallImgRight.png) no-repeat;
        }
    </style>
</head>
<body>
<div id="main">
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/1.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/2.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/3.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/4.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/5.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/6.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/7.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/8.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/9.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/10.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/11.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/12.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/13.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/14.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/15.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/16.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/17.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/18.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/19.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/20.jpg')}}"/>
        </div>
    </div>
    <div class="pin">
        <div class="box">
            <img src="{{ asset('assets/images/images_waterfall/21.jpg')}}"/>
        </div>
    </div>
</div>
</body>
</html>

<script>
    $( window ).on( "load", function(){
        var imgsrc = "{{ asset('assets/images/images_waterfall') }}";
        waterfall('main','pin');
        var dataInt={'data':[{'src':'1.jpg'},{'src':'2.jpg'},{'src':'3.jpg'},{'src':'4.jpg'}]};
        window.onscroll=function(){
            if(checkscrollside()){
                $.each( dataInt.data, function( index, value ){
                    var $oPin = $('<div>').addClass('pin').appendTo( $( "#main" ) );
                    var $oBox = $('<div>').addClass('box').appendTo( $oPin );
                    $('<img>').attr('src',imgsrc+ '/' + $( value).attr( 'src') ).appendTo($oBox);
                });
                waterfall();
            };
        }
    });

    /*
     parend 父级id
     pin 元素id
     */
    function waterfall(parent,pin){
        var $aPin = $( "#main>div" );
        var iPinW = $aPin.eq( 0 ).width();// 一个块框pin的宽
        var num = Math.floor( $( window ).width() / iPinW );//每行中能容纳的pin个数【窗口宽度除以一个块框宽度】
        //oParent.style.cssText='width:'+iPinW*num+'px;ma rgin:0 auto;';//设置父级居中样式：定宽+自动水平外边距
        $( "#main" ).css({
            'width:' : iPinW * num,
            'margin': '0 auto'
        });

        var pinHArr=[];//用于存储 每列中的所有块框相加的高度。

        $aPin.each( function( index, value ){
            var pinH = $aPin.eq( index ).height();
            if( index < num ){
                pinHArr[ index ] = pinH; //第一行中的num个块框pin 先添加进数组pinHArr
            }else{
                var minH = Math.min.apply( null, pinHArr );//数组pinHArr中的最小值minH
                var minHIndex = $.inArray( minH, pinHArr );
                $( value ).css({
                    'position': 'absolute',
                    'top': minH + 15,
                    'left': $aPin.eq( minHIndex ).position().left
                });
                //数组 最小高元素的高 + 添加上的aPin[i]块框高
                pinHArr[ minHIndex ] += $aPin.eq( index ).height() + 15;//更新添加了块框后的列高
            }
        });
    }

    function checkscrollside(){
        var $aPin = $( "#main>div" );
        var lastPinH = $aPin.last().get(0).offsetTop + Math.floor($aPin.last().height()/2);//创建【触发添加块框函数waterfall()】的高度：最后一个块框的距离网页顶部+自身高的一半(实现未滚到底就开始加载)
        var scrollTop = $( window ).scrollTop()//注意解决兼容性
        var documentH = $( document ).width();//页面高度
        return (lastPinH < scrollTop + documentH ) ? true : false;//到达指定高度后 返回true，触发waterfall()函数
    }
</script>