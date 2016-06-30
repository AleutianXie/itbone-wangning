<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        #wrap {
            width: 1089px;
            height: 429px;
            margin: 40px auto;
        }

        #wrap li {
            width: 789px;
            height: 429px;
            width: 100px;
            float: left;
            cursor: pointer;
        }

        #wrap .text {
            width: 100px;
            height: 429px;
            background: rgba(0, 0, 0, 0.5);
            filter: alpha(opacity=50);
            position: relative;
        }

        #wrap .text .p1 {
            font-size: 12px;
            width: 12px;
            position: absolute;
            top: 4px;
            left: 10px;
        }

        #wrap .text .p2 {
            font-size: 14px;
            width: 14px;
            float: left;
            position: absolute;
            top: 4px;
            left: 30px;
        }

        #wrap .l1 {
            background: url("{{ asset('assets/images/images_shoufengqin/1.jpg') }}");
        }

        #wrap .l2 {
            background: url("{{ asset('assets/images/images_shoufengqin/2.jpg') }}");
        }

        #wrap .l3 {
            background: url("{{ asset('assets/images/images_shoufengqin/3.jpg') }}");
        }

        #wrap .l4 {
            background: url("{{ asset('assets/images/images_shoufengqin/4.jpg') }}");
            width: 789px;
        }
    </style>
</head>
<body>
<div id="wrap">
    <ul>
        <li class="l1">
            <div class="text">
                <p class="p1">作者 ：天外来客思密达</p>
                <p class="p2">这是一篇来自缺觉脑袋疼的人的怨念</p>
            </div>
        </li>
        <li class="l2">
            <div class="text">
                <p class="p1">作者 ：天外来客思密达</p>
                <p class="p2">这是一篇来自缺觉脑袋疼的人的怨念</p>
            </div>
        </li>
        <li class="l3">
            <div class="text">
                <p class="p1">作者 ：天外来客思密达</p>
                <p class="p2">这是一篇来自缺觉脑袋疼的人的怨念</p>
            </div>
        </li>
        <li class="l4">
            <div class="text">
                <p class="p1">作者 ：天外来客思密达</p>
                <p class="p2">这是一篇来自缺觉脑袋疼的人的怨念</p>
            </div>
        </li>
    </ul>
</div>
<script type="text/javascript" src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $("#wrap li").on("click", function () {
//            $(this).width("789").siblings().css("width","100");
            $(this).stop().animate({width: "789px"}, 500).siblings().stop().animate({width: "100px"}, 500);
        })
    })
</script>
</body>
</html>