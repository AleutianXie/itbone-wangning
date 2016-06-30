<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>大电商整站</title>
    <link href="{{ asset('assets/images/images_dianshang/100du.ico')}}" rel="shortcut icon"/>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
    <style>
        /*清除设定*/
        * {padding: 0;margin: 0;}
        /*body, ul, li, a, h1, { padding: 0;margin: 0; }*/
        img { border:none; vertical-align:top; }
        li { list-style:none; }
        a { text-decoration:none; }
        body { font-size:12px; font-family:"微软雅黑"; }

        /*publi*/

        .clear { zoom:1;}
        .clear:after {content:"."; display:block; height:0; visibility:hidden; clear:both;}
        .fl { float: left; }
        .fr { float: right; }
        em {font-style: normal;}
        .gradient {
            background:-moz-linear-gradient(top, #FFFFFF, #f8f8f8);     /*ff*/
            background:-webkit-linear-gradient(top, #FFFFFF, #f8f8f8);   /*Chrome*/
            background:-ms-linear-gradient(top, #FFFFFF, #f8f8f8);      /* IE10*/
            background: -o-linear-gradient(top,  #FFFFFF, #f8f8f8 100%);  /*Opera*/
            background:linear-gradient(top, #FFFFFF, #f8f8f8);           /*W3C*/
            -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFFFFF, endColorstr=#f8f8f8)";  /*ie89*/
        +background:#f9f9f9; /*不支持渐变ie67情况下*/
        }

        #header, #nav, .content {width: 960px;margin: 0 auto;}
        #search, .option, .main_ad {border:1px solid #dbdbdb;border-radius: 6px;}

        /*公用标题部分*/
        body .main-title {height: 40px;line-height: 40px;position: relative;}
        .main-title .name1 {font-size: 14px;color:red;padding-right: 5px;}
        .main-title .name2 {font-size: 14px;color: #000;font-weight: bold;}
        .main-title .more {position: absolute;top:15px;right: 0px;}

        /*公用选项卡部分*/

        body .tab {border-bottom: 1px solid #dadada;}
        .tab ul {padding: 0 10px;border-bottom: none;position: relative;}
        .tab li{ float: left;border:1px solid #dadada;border-bottom:none;border-radius: 4px 4px 0 0;margin-right: -1px; cursor: pointer;line-height: 24px;text-align: center;color: #666;}
        .tab .active{border-bottom: 1px solid #FFFFFF; background: #FFFFFF;color: #454545;font-weight: bold;border-bottom: none;}



        /*layout*/

        #header {height: 30px;border-radius: 6px;position: relative;}
        #nav {height: 100px;position: relative;}
        #search {width: 958px;height: 114px;margin:0 auto;margin-bottom: 10px;position: relative;}
        .main {width: 710px;}
        .main_wrap {padding-bottom: 10px;}
        .option {width: 320px;padding:0 15px;position: relative;}
        .section {width: 350px;}
        .section .title {width: 350px;height: 30px;}
        .section .title1 {width: 170px;height: 30px;border:1px solid #dbdbdb;border-radius: 6px 6px 0 0;margin-bottom: 0;border-bottom: none;text-indent:15px;line-height: 30px;}
        .section .sec_con{width: 318px;border:1px solid #dbdbdb;border-radius: 0 0 6px 6px;position: relative;}
        .side{width: 240px; height:600px;}
        .side_con{width: 238px;border:1px solid #dbdbdb;border-radius: 6px;margin-bottom: 10px;position:relative;}
        .side_ad {width: 240px; border-radius: 5px;overflow: hidden;margin-bottom: 10px;}
        .main_ad {width: 710px; height: 90px;overflow:hidden;margin-bottom: 10px;}


        /*head部分*/

        .city{position: absolute;left: 15px;top: 8px;}
        .city a{display:inline-block; color: #666666;border:1px solid #dbdbdb;border-radius: 6px;width:40px;text-align: center;box-shadow:1px 1px 0 #ededed;}
        .city .active {color: #EA1C1C;font-weight: bold;}
        .link {position: absolute;right: 15px;top: 8px;}
        .link a {display:inline-block; color:#000000;width:70px;text-indent: 20px;}
        .join {background: url(../img/header_link_bg.gif) no-repeat 0 3px;}
        .arrange {background: url(../img/header_link_bg.gif) no-repeat 0 -28px;}


        /*nav部分*/

        #nav ul { position:absolute;top:10px; }
        #nav li { float:left; }
        #nav .nav1 { left:11px; }
        #nav .nav2 { right:11px; }
        #nav li a { display:block; width:66px; padding-top:50px; text-align:center; background:url(../img/nav_bg.png) no-repeat; color:#333; }
        #nav .bg1 { background-position:0 0; }
        #nav .bg2 { background-position:-66px 0; }
        #nav .bg3 { background-position:-132px 0; }
        #nav .bg4 { background-position:-198px 0; }
        #nav .bg5 { background-position:-264px 0; }
        #nav .bg6 { background-position:-330px 0; }
        #nav .bg7 { background-position:-396px 0; }
        #nav .bg8 { background-position:-462px 0; }
        #nav .bg9 { background-position:-528px 0; }
        #nav .bg10 { background-position:-594px 0; }
        #nav h1 { width:223px; height:62px; margin:0 auto; position:relative; top:10px; }

        #nav .bg1:hover { background-position:0 -70px; }
        #nav .bg2:hover { background-position:-66px -70px; }
        #nav .bg3:hover { background-position:-132px -70px; }
        #nav .bg4:hover { background-position:-198px -70px; }
        #nav .bg5:hover { background-position:-264px -70px; }
        #nav .bg6:hover { background-position:-330px -70px; }
        #nav .bg7:hover { background-position:-396px -70px; }
        #nav .bg8:hover { background-position:-462px -70px; }
        #nav .bg9:hover { background-position:-528px -70px; }
        #nav .bg10:hover { background-position:-594px -70px; }


        /*searc部分*/

        #search .bar {width:958px;height:60px; background:#e21c01;border:1px solid #EA1C1C;position: absolute;top: 20px;left: -1px; border-radius: 5px;}
        #search .bar ul {position:absolute; left:226px; top:-26px;}
        #search .bar li {display: inline-block;float: left;width: 78px;height: 25px;border:1px solid #f8d0bf; background:#ffffff;border-bottom:none; text-align:center; line-height:25px; font-size:14px; cursor:pointer; border-radius:5px 5px 0 0;}
        #search .bar .active {background:#e21c01;color: #fff;font-weight: bold;}
        #search .con{position: relative;width:500px;height:50px;position: absolute;left:200px;top:20px; }
        #search .pic {background: url(../img/search_img.png) ;z-index: 2;position: absolute;left: 0;top:-20px;height: 114px;width:160px;}
        .search_input {display: inline-block;width:400px;height: 30px;border:1px solid #dbdbdb;border-radius: 6px;text-indent: 12px;color:#ED8A8A;font-weight: bold;}
        .search_img {background: url(../img/search_img.png) no-repeat -158px 0px;width: 68px;height:40px;border-radius: 6px;border: none;position:relative;top:4px;}
        #search .menu {position: absolute;right: 15px;top:10px;width:200px;font-size: 14px;text-decoration: none; }
        #search .menu a {font-size: 15px;color:#fff;text-decoration: none;}
        #search .wrap {width:800px;height: 30px;position: relative;top:86px;left:300px;overflow: hidden;}
        #search .message {width:400px;height:30px;line-height: 20px;position: absolute;left:0;top:0;}
        #search .message li {background: url(../img/search_img.png) no-repeat -225px 4px;float: left;padding-right: 20px;height: 30px;}
        #search .message li a {color: #000000;}
        #search .message strong {color:#e21c01;padding-left: 60px;}
        #search .message span{color: #666;padding:0 5px;}
        #search .upDown {width:15px;position: absolute;left:400px;top:-4px;}
        .upDown img {width:15px;height:15px;cursor: pointer;}



        /*main部分*/
        .main .option .hot {width:310px;height:30px;color:#DF2A2A;font-size:16px;background: url("{{ asset('assets/images/images_dianshang/video_bg.gif') }}") 120px 0 no-repeat;}
        .main .option .video {width:310px;height:285px;background: url("{{ asset('assets/images/images_dianshang/play_bg.gif') }}")}
        .main .option .video_hot {width:310px;height: 64px;background: url("{{ asset('assets/images/images_dianshang/video_bg.gif') }}") 0 -48px no-repeat;}
        .main .option .video_hot li{padding: 3px 0 0 100px;}
        .main .option .video_hot a{color: #000;font-size: 12px;}
        .main .section .sec_con {padding:0 15px;position: relative;}
        .main .section .title{height: 30px;cursor: pointer;line-height: 70px;}
        .main .section .title1 strong {color: #DF2A2A;padding-right: 5px;}
        .title img {width:15px;height: 15px;position: relative;top:8px;left:10px;}
        .main .section .inf {width:320px;height: 98px;margin-bottom: 10px;background: url("{{ asset('assets/images/images_dianshang/hot_list_li_bg.gif') }}") no-repeat;position: relative;}
        .main .section .hotel {position:absolute;right:80px;top:10px;}
        .main .section .sec_con .hotel_img {width:100px;height:80px;padding-top: 8px;}
        .main .section .sec_con .hotel_img a img {border:1px solid #ECE6E6;}
        .main .section .sec_con .hotel_img a img:hover {border:1px solid #DF2A2A;}
        .main .hotel_name {margin-bottom: 5px;}
        .main .hotel_name a {color:#e21c01;font-size: 16px;}
        .main .section .more {width:100px;height:15px;margin-top:20px;}
        .section .more img{padding:0 0 0 280px;}
        .option .tab {height:24px;}
        .option .tab ul {height: 24px;}
        .option .tab  li{height:24px;width:98px; }

        .main .active {background: #FFFFFF;}

        /*每日活动*/
        .main .calander, .main .recommend {width:350px;height:70px;padding:0;position: absolute;left: 0;top:0;}
        .main .calander strong, .recommend strong {color: #e21c01;font-size: 14px;position: absolute;top:20px;left:25px;}
        .main .calander em, .recommend em{position: absolute;top:40px;left:25px;font-size: 16px;}
        .main .calander span{color: #e21c01;position: absolute;top:30px;left:140px;font-size: 24px;}
        .main .calander {background: url("{{ asset('assets/images/images_dianshang/new_title_bg.gif') }}") no-repeat 120px 0px;}
        .main .recommend {background: url("{{ asset('assets/images/images_dianshang/new_title_bg.gif') }}") no-repeat 130px -70px;border-radius: 6px;}
        .main .today {width:310px;height:90px;border-top: 2px solid #dadada;margin-top:70px;}
        .main .today .img{width:84px;height: 84px;margin-top: 12px;}
        .main .today img{width:80px;height: 80px;border: 2px solid #e21c01;}
        .main .today .text{margin:14px 12px 0 0;width:204px;height:90px;}
        .main .today .text .day{display:inline-block;width:23px;height:23px;border: 1px solid #999999;border-radius: 3px;line-height: 23px;text-align: center;color: #e21c01;background: #fcfcfb;font-weight: bold;}
        .main .today .do {font-size: 14px;font-weight: bold;}
        .main .today .text p{color: #cccccc;margin-top: 6px;}
        .main .calist {width:300px;height:284px;margin: 50px 20px;}
        .main .calist h3 span{display: inline-block;height: 40px;width:40px;float:left;line-height: 40px;text-align: center;margin-right: 2px;}
        .main .calist ol {width:300px;}
        .main .calist li{float: left;width:40px;height: 40px;background: #ededed;margin: 0 2px 3px 0;line-height: 40px;text-align: center;cursor: pointer;position: relative;}
        .main .calist li img {width:40px;height:40px;position: absolute;left: 0;top:0;}
        .main .calist .normal{background: #f8f8f8;}
        .main .extra {width:300px;height:80px;border:1px solid #dadada;background:#FFFFFF;position: relative;left:50px;top:-50px;z-index: 2;box-shadow: 4px 4px 1px #999;}
        /*.main .extra .active*/
        .main li .extra img {width:60px;height: 60px;position: absolute;left:10px;top:10px;border:2px solid #dadada;}
        .main li .extra span {display: inline-block;width:60px;height: 20px;position: absolute;left:80px;top:10px;line-height: 20px;font-size: 16px;color:#666666;font-weight: bold;text-align: left;}
        .main li .extra em {height:20px;position: absolute;left:140px;top:10px;line-height: 20px;font-weight: bold;text-align: left;font-size: 16px;}
        .main li .extra p {position: absolute;left:80px;top:40px;height:30px;line-height: 15px;text-align: left;font-size: 12px;}





        .main .calist .change {
            background:-moz-linear-gradient(top, #f5f5f5, #FFFFFF);     /*ff*/
            background:-webkit-linear-gradient(top,#f5f5f5, #FFFFFF);   /*Chrome*/
            background:-ms-linear-gradient(top, #f5f5f5, #FFFFFF);      /* IE10*/
            background: -o-linear-gradient(top,  #f5f5f5, #FFFFFF 100%);  /*Opera*/
            background:linear-gradient(top,#f5f5f5, #FFFFFF);           /*W3C*/
            -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#f5f5f5, endColorstr=#FFFFFF)";  /*ie89*/
        +background:#f9f9f9; /*不支持渐变ie67情况下*/
        }


        /*精彩推荐*/
        .main .show {width:300px;height:158px;background: #f8f8f8;border-radius: 6px;padding:10px 10px 20px 10px; margin-top:70px;}
        .main .show .show-now{width:233px;height:133px;float: left;position: relative;}
        .show-now li {position: absolute;left:0;top:0;}
        .main .show .show-now img{width:233px;height:133px; }
        .main .show .shows{width:60px;height:133px;float: right; margin-top:10px;}
        .shows li {margin-bottom: 10px;}
        .main .show .shows img {width:55px;height:30px;border:2px solid #f8f8f8;}
        .main .shows .active img{border:2px solid #d6191d; }
        /*.main .shows img:hover{border:2px solid #d6191d;}*/
        .main .snow {margin: 23px 0;}
        .main .snow li {height:30px; line-height:30px; width:300px;background: url("{{ asset('assets/images/images_dianshang/content/recommend_list_ico1.gif') }}") no-repeat 0 8px;}
        .snow a {color: #000000;padding-left: 20px;}
        .snow span {display:inline-block;color: #cccccc;margin-left: 45px;}


        /*地铁*/

        .submap{margin-bottom:17px;}

        /*bbs论坛*/
        .main .talk{margin-bottom: 20px;}
        .main .talk li{height:30px;border-radius: 4px;background: #f1f1f1;margin-bottom:5px;line-height: 30px;position: relative; }
        .main .talk img, .talk em, .talk p{display: none;}
        .talk a {color:#000000;}
        .talk .list{color: #d80000;font-weight: bold;}
        .talk .leibie{color: #999;position:absolute;right:15px;}
        .main .talk .active {height:70px;background: #d80000;}
        .main .talk .active .list, .talk .active .leibie{display: none;}
        .talk .active img, .talk .active em, .talk .active p {display: block;}
        .talk .active p {color: #ffffff;font-size:20px;position: absolute;right:10px;bottom: -4px;}
        .talk .active img{position: absolute;top:10px;left:10px;width:50px;height: 50px;}
        .talk .active .title{position: absolute;left:80px;top:10px;color: #ffffff;font-size: 16px;font-weight: bold;}
        .talk .active em{position: absolute;left:80px;top:32px;color: #ffffff;}



        /*知道分子*/
        .main .ask li {border-bottom: 1px dotted #dadada;line-height: 30px;}
        .main .ask .title {display:inline-block;color: #999999;width:250px;height:30px;text-align: center;}
        .main .ask .state {display:inline-block;color: #999999;width:35px;height:30px;text-align: center;}
        .main .ask .askmenu em{display:inline-block;width:250px;height:30px;}
        .main .ask .askmenu span {display: inline-block;color: #DF2A2A;padding: 0 1px;}
        .main .ask .askmenu  a{color: #000000;}
        .main .ask .askmenu img{position: relative;top:10px;left:8px;}
        .main .soso {width:310px;height:50px;}
        .main .soso em{color: #000000;font-weight: bold;line-height: 50px;}
        .main .soso input{width:180px;height:22px;border:1px solid #dadada;text-indent: 6px;}
        .main .soso img{position: relative;top:12px;left:10px;}



        /*红人烧客*/
        .main .famous {width:316px;height:250px;margin:20px 0 20px 0;}
        .famous li{float: left;width:77px;height:77px;margin:0px 2px 4px 0;position: relative;cursor: pointer;}
        .famous li img {width:77px;height:77px;}
        .famous .famous_one{width:156px;height:77px;}
        .famous .famous_one img{width:156px;height:77px;}

        .famous .shadow {width:100%;height: 100%;background: #000000;position: absolute;left:0;top:0;opacity: 0.5;}
        .shadow p {padding: 14px 0 0 12px;color: #FFFFFF;font-size: 10px;}


        /*在线帮助*/
        .main .help{height: 40px;margin: 10px 0;font-size: 14px;text-indent: 28px;}
        .tel, .email {height: 46px;line-height: 46px;padding-left: 30px;}
        .tel {background: url("{{ asset('assets/images/images_dianshang/help.gif') }}") no-repeat 6px 0;}
        .email {background: url("{{ asset('assets/images/images_dianshang/help.gif') }}") no-repeat 6px -44px;margin-left: 30px;}
        .online {height: 117px;border-top: 1px  solid #dadada;}
        .main .helpbig {width:120px;font-size: 16px;font-weight: bold;margin:20px 0 10px 0;}


        /*媒体声音*/

        .media {width: 310px;height:40px;position: relative;margin-bottom: 16px;}
        .media .news_img{width:88px;height:36px;}
        .media .news_title{height:36px;width:210px;position: absolute;right:0;}
        .media .news_title a {color: #000000;font-size: 14px;}
        .media img {width:88px;height:32px;}

        /*side部分login */

        .side .title{width:238px;height:30px;border-radius: 6px 6px 0 0;border-bottom: 1px solid #dbdbdb;padding: 0; }
        .side .title1 {color: #DF2A2A;padding:0 12px;text-indent: 12px;text-align: center;line-height: 30px;}
        .side .setin {width:214px;height:70px;padding: 0 12px;}
        .side .self {width:214px;height:140px;}
        .loginbox td.text{width: 100px; height: 30px; line-height: 30px;}
        .loginbox td.text input{ width: 80px; height: 20px; line-height: 20px; padding: 0 5px; background: #f7f7f7; border: none; border: 1px solid #999999;}
        .loginbox td.text input:focus{ border: 1px solid #f86d4f; box-shadow: 0 0  5px 1px #f86d4f ;}
        .loginbox td input.submit{width: 60px; height: 30px; text-align: center; background: red; border: none; border-radius: 15px; color: #ffffff; box-shadow: 1px 2px 1px #f86d4f; }
        .loginbox td input.submit:hover{ background: #DF2A2A;}
        .side .new {width:214px;height:35px;border-top: 1px solid #dbdbdb;margin: 8px 12px 0 12px;}
        .new .newcoming{display:inline-block;width:70px;height:15px;line-height: 15px;text-align:center;margin:12px 10px 12px 18px;}
        .new .forget {display:inline-block;width:70px;height:15px;line-height: 15px;text-align:center;margin:12px 18px 12px 10px;}



        .side .side_con .tab {height: 20px;margin:0 12px;width:214px;}
        .side .side_con .tab ul {height: 20px;}
        .side .side_con .tab li {height: 20px;width: 62px;}
        .side_con .main-title{margin:0 12px;}


        /*公用*/
        body .special{padding: 0 12px;}
        .special li{height:28px;width:214px;border-bottom:1px solid #dadada;line-height: 28px;}
        .special a{width:146px; float: left;color: #000000;}
        .special span{width:30px;}
        .special .gary{color: #666666;text-align: center;}
        .special span.red{color: #DF2A2A;}
        .special em{width:35px; float: right;text-align: center;}
        .side .special{margin-bottom: 5px;}
        .special .bottom{border-bottom: none;}

        /*side今日推荐*/
        .side .best{height: 92px;width: 214px;border-bottom: 1px dotted #dadada;margin: 10px 12px 10px 12px;}
        .side .best .best_img{width:94px;height:82px;border:2px solid #dadada;}
        .side .best .best_img img {width:84px;height:72px;padding:4px;}
        .side .no-bottom{border-bottom: none;}
        .best .best_shop {margin-top:10px;}
        .best .best_shop .name{margin-bottom: 8px;}
        .best .best_shop .name a {color: #DF2A2A;font-size: 14px;}

        /*side360看店*/
        .side_con .img_360 {padding: 0 12px;}
        .side_con .soup {padding: 10px 12px 10px 12px;}

        /*side折扣店*/
        .sale{padding:0 12px;}
        .sale li{width:214px;height:28px;border-top:1px dotted #dadada; line-height: 28px;}
        .sale li span{width:30px;color: #DF2A2A;padding: 0 1px}
        .sale li a{color:#000000;margin-left: 6px;}


        /*side新店*/
        .newShop{height:140px;}
        .newShop .newsale {width:90px;height:74px;border: 1px solid #dadada;margin: 0 12px;}
        .newShop .newsale img{width:84px;height:68px;padding: 3px;}
        .newShop .name{margin-top: 10px;}
        .newShop .name a{color: #DF2A2A;}

        /*footer*/
        #footer {width:958px;height: 78px;border: 1px solid #dadada;border-radius: 6px;margin:0 auto 100px auto;background: #f9f9f9;}
        #footer .about {width:600px;height:30px;margin: 10px auto 0 auto;}
        #footer .about li{float: left;width:74px;height:30px;line-height: 30px;text-align: center;}
        #footer p {margin:0 auto;width:420px;height:30px;text-align: center;line-height: 30px;}
    </style>
</head>
<div id="header" class="gradient">
    <p class="city fl">
        切换城市:
        <a class="active" href="#">北京</a>
        <a href="#">上海</a>
        <a href="#">成都</a>
        <a href="#">重庆</a>
    </p>

    <p class="link fr">
        <a class="join" href="#">加盟100</a> |
        <a class="arrange" href="#">店铺管理</a>
    </p>
</div>
<div id="nav">
    <ul class="nav1 ">
        <li><a class="bg1" href="#">美食</a></li>
        <li><a class="bg2" href="#">夜店</a></li>
        <li><a class="bg3" href="#">购物</a></li>
        <li><a class="bg4" href="#">文化</a></li>
        <li><a class="bg5" href="#">休闲</a></li>
    </ul>
    <h1 title="带你去最HOT的地方"><a href="#"><img src="{{ asset('assets/images/images_dianshang/logo.png') }}" alt="100度享乐网"/></a></h1>
    <ul class="nav2">
        <li><a class="bg6" href="#">四个字的</a></li>
        <li><a class="bg7" href="#">四个字的</a></li>
        <li><a class="bg8" href="#">四个字的</a></li>
        <li><a class="bg9" href="#">四个字的</a></li>
        <li><a class="bg10" href="#">四个字的</a></li>
    </ul>

</div>
<div id="search">
    <div class="bar">
        <ul>
            <li class="active">搜店</li>
            <li>地址</li>
            <li>优惠券</li>
            <li>全文</li>
            <li>视频</li>
        </ul>
        <div class="pic"></div>
        <div class="con clear">
            <input class="search_input fl" type="text" id="excem" value="例如：银土，你中有我，我中有你，风格不同，却又相通，联系千丝万缕">
            <button class="search_img fr"></button>
        </div>
        <p class="menu fr">
            <a href="#">金钱豹、</a>
            <a href="#">大江南、</a>
            <a href="#">金钱豹、</a>
            <a href="#">金钱豹大江南、</a>
        </p>
    </div>
    <div class="wrap">
        <ul class="message">
            <!--<li>-->
            <!--<strong class="name">萱萱</strong><span class="time">5分钟前</span>发表了一篇文章：那些曾经的瞬间……-->
            <!--</li>-->
        </ul>
        <div class="upDown">
            <img class="gary" src="{{ asset('assets/images/images_dianshang/gray.png') }}">
            <img  class="red" src="{{ asset('assets/images/images_dianshang/red.png') }}">
        </div>
    </div>
</div>
<div class="content clear">
    <div class="main fl">
        <div class="clear main_wrap">
            <div class="option fl">
                <h2 class="hot">WHAT'S HOT</h2>

                <div class="video"></div>
                <ul class="video_hot">
                    <li><a href="#">网友实拍</a></li>
                    <li><a href="#">碰瓷实拍</a></li>
                    <li><a href="#">网友实拍</a></li>
                </ul>
            </div>
            <div class="section fr">
                <ul class="title  shopSwitch1">
                    <li class="active title1 fl switch1"><strong>HOT SHOP</strong>红店铺<img src="{{ asset('assets/images/images_dianshang/red.png') }}"></li>
                    <li class="title1 fr switch1 gradient"><strong>NEW SHOP</strong>新店铺<img src="{{ asset('assets/images/images_dianshang/gray.png') }}"></li>
                </ul>


                <div class="sec_con bigdiv">

                    <div class="doSwitch1">
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">花果山大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">火焰山大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">高老庄大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                    </div>
                    <div class="doSwitch1">
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic2.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">花果山大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic2.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">火焰山大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                        <div class="inf">
                            <div class="hotel_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic2.gif') }}"></a></div>
                            <ul class="hotel fr">
                                <li class="hotel_name"><a href="#">高老庄大酒店</a></li>
                                <li>区域：</li>
                                <li>人均：</li>
                                <li>折扣</li>
                            </ul>
                        </div>
                    </div>
                    <span class="more"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
                </div>
            </div>
        </div>
        <div class="main_ad"><a href="#"><img src="{{ asset('assets/images/images_dianshang/ad/ad1.jpg') }}"></a></div>

        <div class="clear main_wrap">
            <div class="option fl">
                <div class="calander">
                    <strong>LUCKY TODAY</strong>
                    <em>今日活动</em>
                    <span>2015.11</span>
                </div>
                <div class="today">
                    <div class="img fl"><img src="{{ asset('assets/images/images_dianshang/content/today1.gif') }}"></div>
                    <div class="text fr">
                        <span class="day">22</span>
                        <span class="day">11</span>
                        <span class="do">今日天气好晴朗啊啊啊啊</span>

                        <p>今天今日天气好晴朗今日天气好晴朗今日天气好晴朗今日天气好晴朗今日天气好晴朗今日天气好晴朗</p>
                    </div>
                </div>
                <div class="calist">
                    <h3>
                        <span class="e-day change">MON</span>
                        <span class="e-day change">TUE</span>
                        <span class="e-day change">WED</span>
                        <span class="e-day change">THU</span>
                        <span class="e-day change">FRI</span>
                        <span class="e-day change">SAT</span>
                        <span class="e-day change">SUN</span>
                    </h3>
                    <ul>

                        <li class="normal">29</li>
                        <li class="normal">30</li>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10<img src="{{ asset('assets/images/images_dianshang/content/today1.gif') }}" alt="丑丑鞋子" info="不喜欢这个鞋子啊啊啊啊啊啊啊 啊又能怎样啊 啊啊啊啊啊"></li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                        <li>16</li>
                        <li>17</li>
                        <li>18</li>
                        <li>19</li>
                        <li>20</li>
                        <li>21<img src="{{ asset('assets/images/images_dianshang/content/hot8.gif') }}" alt="美女妹纸" info="美女快到我的碗里来你让我来我就来啊啊啊我就是不去啊啊啊啊"></li>
                        <li>22</li>
                        <li>23</li>
                        <li>24</li>
                        <li>25<img src="{{ asset('assets/images/images_dianshang/content/today2.gif') }}"  alt="好吃的" info="好吃的快到我的碗里来你又不饿召唤我干嘛啊啊啊啊啊真是烦人啊啊啊啊啊啊">

                            <!--<div class="extra">-->
                            <!--<img src="{{ asset('assets/images/images_dianshang/content/hot2.gif') }}">-->
                            <!--<span>呵呵哒</span>-->
                            <!--<em>今日主题</em>-->
                            <!--<p>哈哈哈呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒</p>-->
                            <!--</div>-->


                        </li>
                        <li>26</li>
                        <li>27</li>
                        <li>28</li>
                        <li>29</li>
                        <li>30</li>
                        <li>31</li>
                        <li class="normal">1</li>
                        <li class="normal">2</li>
                        <li class="normal">3</li>
                        <li class="normal">4</li>
                        <li class="normal">5
                            <img src="{{ asset('assets/images/images_dianshang/content/hot2.gif') }}" alt="美女妹纸" info="美女快到我的碗里来1">
                            <!--<div class="extra">-->
                            <!--<img src="{{ asset('assets/images/images_dianshang/content/hot2.gif') }}">-->
                            <!--<span>呵呵哒</span>-->
                            <!--<em>今日主题</em>-->
                            <!--<p>哈哈哈呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒呵呵哒</p>-->
                            <!--</div>-->

                        </li>
                        <li class="normal">6</li>
                        <li class="normal">7</li>
                        <li class="normal">8</li>
                    </ul>
                </div>
            </div>

            <div class="option fr">
                <div class="recommend">
                    <strong>RECOMMMEND</strong>
                    <em>精彩推荐</em>
                </div>
                <div class="show">
                    <div class="show-now">
                        <ul>
                            <li class="active"><a  href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img0.gif') }}"> </a></li>
                            <li><a href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img1.gif') }}"> </a></li>
                            <li><a href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img2.gif') }}"> </a></li>
                        </ul>

                    </div>
                    <div class="shows">
                        <ol>
                            <li class="active"><a  href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img0.gif') }}"> </a></li>
                            <li><a href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img1.gif') }}"> </a></li>
                            <li><a href="javascript:;"><img src="{{ asset('assets/images/images_dianshang/content/img2.gif') }}"> </a></li>
                        </ol>
                    </div>
                    <p>爸爸去哪儿~~~</p>
                </div>
                <div class="snow">
                    <ul>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                        <li><a href="#">|&nbsp;&nbsp;哈哈哈哈哈哈哈哈哈哈哈哈哈</a><span>2015/11/22</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clear main_wrap">
            <div  class="section fl">
                <ul class="title gradient shopSwitch2">
                    <li class="active title1 fl"><strong>SUB WAY</strong>地铁交通<img src="{{ asset('assets/images/images_dianshang/red.png') }}"></li>
                    <li class="title1 fr"><strong>WAP</strong>生活圈<img src="{{ asset('assets/images/images_dianshang/gray.png') }}"></li>
                </ul>
                <div class="sec_con doSwitch2">
                    <img class="submap" src="{{ asset('assets/images/images_dianshang/content/123.gif') }}">
                </div>
                <div class="sec_con doSwitch2">
                    <img class="submap" src="{{ asset('assets/images/images_dianshang/content/456.jpg') }}">
                </div>
            </div>
            <div class="option fr">
                <div class="main-title">
                    <strong class="name1">BBS</strong><span class="name2">论坛</span>
                    <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
                </div>
                <ol class="talk">
                    <li class="active">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">01</span>
                            <span class="title">画皮——日剧中的手机</span>
                            <em>阿瑞斯</em>
                            <p>ONE</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>

                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">02</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>

                            <p>TWO</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">03</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>

                            <p>THREE</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">04</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>

                            <p>FOUR</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">05</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>

                            <p>FIVE</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">06</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>

                            <p>SIX</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                    <li class="normal">
                        <a href="#">
                            <img src="{{ asset('assets/images/images_dianshang/content/bbs_img1.gif') }}">
                            <span class="list">07</span>
                            <span class="title">保证你没见过的古怪餐厅</span>
                            <em>阿瑞斯</em>
                            <p>SEVEN</p>
                            <span class="leibie">世说新语</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="main_ad"><a href="#"><img src="{{ asset('assets/images/images_dianshang/ad/ad1.jpg') }}"></a></div>
        <div class="clear main_wrap">
            <div class="option fl">
                <div class="main-title">
                    <strong class="name1">QWERHUI UIO</strong><span class="name2">知道分子</span>
                    <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
                </div>
                <div class="tab">
                    <ul class="shopSwitch3">
                        <li class="active">有人在问</li>
                        <li>有人知道</li>
                        <li>热门问题</li>
                    </ul>
                </div>
                <div class="ask">
                    <ul class="doSwitch3">
                        <li><span class="title">标题</span><span class="state">状态</span></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是问问题的</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                    </ul>
                    <ul class="doSwitch3">
                        <li><span class="title">标题</span><span class="state">状态</span></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是回答问题</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                    </ul>
                    <ul class="doSwitch3">
                        <li><span class="title">标题</span><span class="state">状态</span></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}">
                        </li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico2.gif') }}"></li>
                        <li class="askmenu"><em>[<span>休闲</span>]<a href="#">我是热门热门热门</a></em> <img
                                    src="{{ asset('assets/images/images_dianshang/ico1.gif') }}"></li>
                    </ul>
                </div>
                <div class="soso">
                    <em>搜搜谁知道：</em><input type="text"><img src="{{ asset('assets/images/images_dianshang/btn.gif') }}">
                </div>

            </div>
            <div class="option fr">
                <div class="main-title">
                    <strong class="name1">HOT</strong><span class="name2">红人烧客</span>
                    <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
                </div>

                <ul class="famous">
                    <li>
                        <img src="{{ asset('assets/images/images_dianshang/content/hot1.gif') }}" alt=""/>

                    </li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot2.gif') }}" alt=""/></li>
                    <li class="famous_one"><img src="{{ asset('assets/images/images_dianshang/content/hot3.gif') }}" alt=""/>
                        <div class="shadow">
                            <p>12334</p>
                        </div>
                    </li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot4.gif') }}" alt=""/></li>

                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot5.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot6.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot7.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot8.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot9.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot10.gif') }}" alt=""/></li>
                    <li><img src="{{ asset('assets/images/images_dianshang/content/hot11.gif') }}" alt=""/></li>
                </ul>
            </div>
        </div>
        <div class="clear main_wrap">
            <div class="option fl">
                <div class="main-title">
                    <strong class="name1">HELP</strong><span class="name2">在线帮助</span>
                </div>
                <p class="help">您有任何问题都可以通过在线客服或者MSN或者打电话来找我们求助。</p>
                <span class="tel">400-4800-6500</span>
                <span class="email">100du.com@163.com</span>

                <div class="online">
                    <div class="user fl">
                        <p class="helpbig">用户帮助</p>

                        <p>金币在哪里</p>

                        <p>等级在哪里</p>

                        <p>其他问题</p>
                    </div>
                    <div class="saler fr">
                        <p class="helpbig">商户帮助</p>

                        <p>金币在哪里</p>

                        <p>等级在哪里</p>

                        <p>其他问题</p>
                    </div>
                </div>
            </div>
            <div class="option fr">
                <div class="main-title">
                    <strong class="name1">100DU IN THE MEDIA</strong><span class="name2">媒体声音</span>
                    <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
                </div>
                <div class="media">
                    <div class="news_img fl"><img src="{{ asset('assets/images/images_dianshang/content/media1.gif') }}"></div>
                    <div class="news_title fr"><a href="#">日本最大的财经哒</a></div>
                </div>
                <div class="media">
                    <div class="news_img fl"><img src="{{ asset('assets/images/images_dianshang/content/media1.gif') }}"></div>
                    <div class="news_title fr"><a href="#">日本最大的财经报纸对100du的评价棒棒棒棒日本最大的财哒</a></div>
                </div>
                <div class="media">
                    <div class="news_img fl"><img src="{{ asset('assets/images/images_dianshang/content/media1.gif') }}"></div>
                    <div class="news_title fr"><a href="#">日本最大的财经报纸对100du的评价棒棒棒棒日本最大的财哒</a></div>
                </div>
                <div class="media">
                    <div class="news_img fl"><img src="{{ asset('assets/images/images_dianshang/content/media1.gif') }}"></div>
                    <div class="news_title fr"><a href="#">日本最大的财经报纸对100du的评价棒棒棒棒日本最大的财哒</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="side fr">
        <div class="side_con">
            <div class="title gradient">
                <strong class="title1">LOAD</strong><span class="name2">登陆</span>
            </div>

            <div class="setin">
                <form action="">
                    <table>
                        <tr class="loginbox">
                            <td style="width: 50px;">用户名：</td>
                            <td class="text"><input type="text" name="username" id=""/></td>
                            <td><input type="checkbox" name="remberMe" id=""/>&nbsp;记住我</td>
                        </tr>
                        <tr class="loginbox">
                            <td>密&nbsp;&nbsp;&nbsp;码：</td>
                            <td class="text"><input type="password" name="password" id=""/></td>
                            <td><input class="submit" type="submit" value="登录"/></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="new">
                <span class="newcoming">新用户注册</span> <span class="forget">忘记密码了</span>
            </div>
        </div>

        <div class="side_ad"><a href="#"><img src="{{ asset('assets/images/images_dianshang/ad/ad2.jpg') }}"></a></div>
        <div class="side_ad"><a href="#"><img src="{{ asset('assets/images/images_dianshang/ad/ad3.jpg') }}"></a></div>

        <div class="side_con">
            <div class="main-title">
                <strong class="name1">COUPONS</strong><span class="name2">抢卷儿</span>
                <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
            </div>
            <div class="tab">
                <ul class="shopSwitch4">
                    <li class="active">人气</li>
                    <li>推荐</li>
                    <li>最新</li>
                </ul>
            </div>
            <div class="special">
                <ul class="doSwitch4">
                    <li class="shop"><a href="#" class="gary">商店名</a><span class="gary">省</span><em class="gary">打印</em>
                    </li>
                    <li class="shop"><a href="#">北京哪里可以吃大猩猩</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃大猩猩</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃大猩猩</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃大猩猩</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop bottom"><a href="#">北京哪里可以吃大猩猩</a><span class="red">12%</span><em>345</em></li>
                </ul>

                <ul class="doSwitch4">
                    <li class="shop"><a href="#" class="gary">商店名</a><span class="gary">省</span><em class="gary">打印</em>
                    </li>
                    <li class="shop"><a href="#">北京哪里可以吃抢银行</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃抢银行</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃抢银行</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北京哪里可以吃抢银行</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop bottom"><a href="#">北京哪里可以吃抢银行</a><span class="red">12%</span><em>345</em></li>
                </ul>

                <ul class="doSwitch4">
                    <li class="shop"><a href="#" class="gary">商店名</a><span class="gary">省</span><em class="gary">打印</em>
                    </li>
                    <li class="shop"><a href="#">北风吹雪花飘抢不到票</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北风吹雪花飘抢不到票</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北风吹雪花飘抢不到票</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop"><a href="#">北风吹雪花飘抢不到票</a><span class="red">12%</span><em>345</em></li>
                    <li class="shop bottom"><a href="#">北风吹雪花飘抢不到票</a><span class="red">12%</span><em>345</em></li>
                </ul>
            </div>
        </div>
        <div class="side_con">
            <div class="main-title">
                <strong class="name1">SHOP</strong><span class="name2">今日推荐</span>
                <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
            </div>
            <div class="best">
                <div class="best_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                <div class="best_shop fr">
                    <p class="name"><a href="#">花果山大酒店</a></p>

                    <p class="teste">口味：</p>

                    <p class="teste">区域：</p>
                </div>
            </div>
            <div class="best">
                <div class="best_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                <div class="best_shop fr">
                    <p class="name"><a href="#">花果山大酒店</a></p>

                    <p class="teste">口味：</p>

                    <p class="teste">区域：</p>
                </div>
            </div>
            <div class="best">
                <div class="best_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                <div class="best_shop fr">
                    <p class="name"><a href="#">花果山大酒店</a></p>

                    <p class="teste">口味：</p>

                    <p class="teste">区域：</p>
                </div>
            </div>

            <div class="best no-bottom">
                <div class="best_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                <div class="best_shop fr">
                    <p class="name"><a href="#">花果山大酒店</a></p>

                    <p class="teste">口味：</p>

                    <p class="teste">区域：</p>
                </div>
            </div>
        </div>
        <div class="side_con">
            <div class="main-title">
                <strong class="name1">360<sup>.</sup>SHOP</strong><span class="name2">全景看店</span>
                <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
            </div>

            <div class="img_360">
                <a href="#"><img src="{{ asset('assets/images/images_dianshang/content/360.gif') }}"> </a>
            </div>
            <p class="soup">苹果雪梨排骨汤</p>
        </div>

        <div class="side_con">
            <div class="main-title">
                <strong class="name1">SHOP</strong><span class="name2">折扣店</span>
                <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
            </div>
            <div class="best no-bottom">
                <div class="best_img fl"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a></div>
                <div class="best_shop fr">
                    <p class="name"><a href="#">花果山大酒店</a></p>

                    <p class="teste">口味：</p>

                    <p class="teste">区域：</p>
                </div>
            </div>
            <div class="sale">
                <ul>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘花果山</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘哈哈</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘呵呵大大大大</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘娃娃远远源于啊啊</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘丫丫</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘哼</a></li>
                </ul>
            </div>
        </div>
        <div class="side_con">
            <div class="main-title">
                <strong class="name1">COUPONES</strong><span class="name2">最新加盟</span>
                <span class="more fr"><a href="#"><img src="{{ asset('assets/images/images_dianshang/more.gif') }}"></a></span>
            </div>
            <div class="newShop">
                <div class="newsale fl">
                    <div class="best_img"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a>

                        <p class="name"><a href="#">花果山大酒店</a></p>

                        <p class="teste">口味：</p>

                        <p class="teste">区域：</p>
                    </div>
                </div>
                <div class="newsale fr">
                    <div class="best_img"><a href="#"><img src="{{ asset('assets/images/images_dianshang/content/hot_list_pic1.gif') }}"></a>

                        <p class="name"><a href="#">花果山大酒店</a></p>

                        <p class="teste">口味：</p>

                        <p class="teste">区域：</p>
                    </div>
                </div>
            </div>
            <div class="sale">
                <ul>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘花果山</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘哈哈</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘呵呵大大大大</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘娃娃远远源于啊啊</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘</a></li>
                    <li class="saleShop">[<span>休闲</span>]<a href="#">瀚茶缘丫丫</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div id="footer">
    <ul class="about">
        <li>关于我们  &nbsp;|</li>
        <li>联系我们  &nbsp;|</li>
        <li>版权声明  &nbsp;|</li>
        <li>网站地图  &nbsp;|</li>
        <li>加入我们  &nbsp;|</li>
        <li>问题反馈  &nbsp;|</li>
        <li>友情链接  &nbsp;|</li>
        <li>问题索引  &nbsp;</li>
    </ul>
    <p>100du版权所有轻言轻语企图请与我们联系</p>
</div>

</body>
</html>
<script>
    $(function () {

        // 搜索切换
        (function () {

            var aLi = $('#search .bar li');
            var oText = $('#excem');
            var attrText = [
                '例如：银土，你中有我，我中有你，风格不同，却又相通，联系千丝万缕',
                '例如：这是洞爷湖和斩月',
                '例如：红豆饭、生鸡蛋拌饭，最喜欢吃醋昆布',
                '例如：喜欢自称为“歌舞伎町女王”、“厂长”。也被桂尊称为“队长”',
                '例如：宇宙最强的怪物猎人，宇宙鼎鼎大名的“异形猎人”。'
            ];

            var iNow = 0;

            aLi.each(function (index) {
                $(this).click(function () {
                    aLi.attr('class', 'gradient');
                    $(this).attr('class', 'active');

                    iNow = index;
                    oText.val(attrText[iNow]);
                });
            });

            oText.focus(function () {
                if ($(this).val() == attrText[iNow]) {
                    $(this).val('');
                }
            });

            oText.blur(function () {
                if ($(this).val() == '') {
                    oText.val(attrText[iNow]);

                }
            });

        })();


        //文字上下滑动
        (function () {

            var oDiv = $('#search .wrap');
            var oUl = $('.message');
            var oUp = $('#search .gary');
            var oDown = $('#search .red');
            var arrText = [
                {'name': '第一个', 'time': 4, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/'},
                {'name': '畅畅', 'time': 5, 'title': '广东3天抓获涉黄疑犯', 'url': 'http://www.miaov.com/2013/#curriculum'},
                {'name': '萱萱', 'time': 6, 'title': '国台办回应王郁琦', 'url': 'http://www.miaov.com/2013/#about'},
                {'name': '畅畅', 'time': 7, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/#message'},
                {'name': '萱萱', 'time': 8, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/'},
                {'name': '畅畅', 'time': 9, 'title': '广东3天抓获涉黄疑犯', 'url': 'http://www.miaov.com/2013/#curriculum'},
                {'name': '萱萱', 'time': 10, 'title': '国台办回应王郁琦', 'url': 'http://www.miaov.com/2013/#about'},
                {'name': '嗯嗯', 'time': 20, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/#message'},
                {'name': '哼哼', 'time': 21, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/#message'},
                {'name': '嘿嘿', 'time': 25, 'title': '那些灿烂华美的瞬间', 'url': 'http://www.miaov.com/2013/#message'}
            ];


            var str = '';
            var iNow = 0;
            var timer = null;

            for (var i = 0; i < arrText.length; i++) {
                str += '<li><a href ="' + arrText[i].url + '"><strong>' + arrText[i].name + '</strong><span>' + arrText[i].time + '分钟前</span>写了一篇新文章：' + arrText[i].title + '…</a></li>'
            }
            oUl.html(str);

            oUp.click(function () {
                doMove(-1);
            });
            oDown.click(function () {
                doMove(1);
            });

            //向上向下函数
            function doMove(num) {
                var oH = oUl.find('li').height();
                iNow += num;
                if (Math.abs(iNow) > arrText.length - 1) {
                    iNow = 0;
                }
                if (iNow > 0) {
                    iNow = -(arrText.length - 1);
                }
                oUl.animate({'top': iNow * oH}, 1000)
            };

            //自动往上定时器
            function autoPlay() {
                timer = setInterval(function () {
                    doMove(-1);
                }, 1000)
            };
            autoPlay();

            //    关掉定时器

            oDiv.hover(function () {

                clearInterval(timer);
            }, autoPlay);


        })();


//    选项卡切换
        (function () {

            //var bDiv = $('.bigdiv');
            //var spart = bDiv.children('div');
            //var oUL = $('.shopSwitch');
            //var aLi = oUL.find('li');

// oNav为点击选项卡的父级 aCon 为随选项卡显示的部分
            Fntab($('.shopSwitch1'), $('.doSwitch1'), 'click');
            Fntab($('.shopSwitch2'), $('.doSwitch2'), 'click');
            Fntab($('.shopSwitch3'), $('.doSwitch3'), 'mouseover');
            Fntab($('.shopSwitch4'), $('.doSwitch4'), 'mouseover');


            function Fntab(oNav, aCon, sEvevt) {
                var aElem = oNav.children();
                aCon.hide().eq(0).show();

                aElem.each(function (index) {
                    $(this).on(sEvevt, function () {
                        aElem.removeClass('active').addClass('gradient');
                        $(this).removeClass('gradient').addClass('active');
                        aElem.find('img').attr('src', 'img/gray.png');
                        $(this).find('img').attr('src', 'img/red.png');
                        aCon.hide().eq(index).show();

                    });
                });

            };
            //aLi.each(function(index){
            //     spart.hide().eq(0).show();
            //
            //     $(this).click(function(){
            //         aLi.removeClass('active').addClass('gradient');
            //         $(this).removeClass('gradient').addClass('active');
            //
            //         aLi.find('img').attr('src','img/gray.png');
            //         $(this).find('img').attr('src','img/red.png');
            //
            //         spart.hide().eq(index).show();
            //
            //     });
            //
            // });
        })();


//    焦点图轮播
        (function () {

            var oDiv = $('.show');
            var oUl = oDiv.find('ul');
            var aLi = oUl.find('li');
            var bLi = $('.show ol li');
            var sImg = $('.show-now img');
            var arrText = ['爸爸去哪儿', '妈妈去哪儿', '你们都去哪儿'];
            var oP = $('.show p');
            var iNow = 0;

            var timer = null;

            FnFade();

            bLi.click(function () {
                iNow = $(this).index();
                FnFade();
            });

            function autoPlay(){
                timer = setInterval(function(){
                    iNow++;
                    iNow%=aLi.length;
                    FnFade();

                },1000)
            };

            oDiv.hover(function(){
                clearInterval(timer);
            },autoPlay);

            autoPlay();


            function FnFade(){
                aLi.each(function(i){
                    if(i!=iNow){
                        aLi.eq(i).fadeOut().css('zIndex',1);
                        bLi.eq(i).removeClass('active');
                    }else{
                        aLi.eq(i).fadeIn().css('zIndex',2);
                        bLi.eq(i).addClass('active');

                    }
                });
                oP.html(arrText[iNow]);
            };

            //function autoImg() {
            //    bLi.each(function (index) {
            //
            //        $(this).click(function () {
            //            bLi.removeClass('active');
            //            $(this).addClass('active');
            //            iNow = $(this).index();
            //
            //            //var aImg = $(this).find('img').src;
            //            //alert(aImg);
            //
            //            sImg.attr('src', 'img/content/img' + index + '.gif');
            //
            //            oP.text(arrText[iNow]);
            //        })
            //    });
            //
            //};
            //
            //
            //function autoPlay() {
            //    iNow = $(this).index();
            //    timer = setInterval(function () {
            //        iNow++;
            //        if (iNow == 3) {
            //            iNow = 0
            //        }
            //        ;
            //        //alert(iNow);
            //        autoImg();
            //    }, 2000);
            //};
            //
            //autoPlay();


        })();


//    日记部分
        (function(){

            var aSpan = $('.calist h3 span');
            var aLi = $('.calist li');
            var aImg = aLi.children('img');
            var anow = 0;
            aImg.each(function(index){

                $(this).mouseover(function(){

                    if($(this).next('div').length>0){

                    }else{
                        var oldsrc = $(this).attr('src');
                        var oldinfo = $(this).attr('info');
                        var oldalt = $(this).attr('alt');

                        anow = ($(this).parent().index())%7;
                        var bbb= aSpan.eq(anow).html();
                        $(this).parent().append('<div class="extra"><img src='+oldsrc+'><span>'+bbb+'</span><em>'+oldalt+'</em><p>'+oldinfo+'</p></div>');
                    };

                    aImg.next('div').hide();
                    $(this).next('div').show();


                });

                $(this).mouseout(function(){
                    aImg.next('div').hide();

                });



            });










        })();






//bbs部分
        (function(){
            var oUl = $('.talk');
            var aLi = $('.talk li');
            aLi.each(function(){

                $(this).mouseover(function(){
                    aLi.removeClass('active');
                    $(this).addClass('active');

                });

            });




        })();

//    红人烧客

        (function(){
            var oUl = $('.famous');
            var aLi = $('.famous li');
            var iNow = 0;
            var arr = [
                '用户名：我是美女<br />人气1',
                '用户名：性感宝贝<br />区域：朝阳CBD<br />人气：124987',
                '用户名：我是美女<br />人气3',
                '用户名：我是美女<br />人气4',
                '用户名：我是美女<br />人气5',
                '用户名：我是美女<br />人气6',
                '用户名：我是美女<br />人气7',
                '用户名：我是美女<br />人气8',
                '用户名：我是美女<br />人气9',
                '用户名：我是美女<br />人气10'
            ];
            aLi.each(function(index){


                $(this).mouseover(function(){

                    iNow = $(this).index();
                    if(iNow>0){
                        aLi.find('div').remove();
                        $(this).append('<div class="shadow"><p></p> </div>');
                        $(this).find('p').html(arr[iNow-1]);
                    }


                });


            });

        })();


    });
</script>
