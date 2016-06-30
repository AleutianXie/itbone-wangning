<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博 首页</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
    <style>
        /****************************************** 通用 *************************************************/
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            font-family: 微软雅黑;
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: #424242;
        }

        /*a:hover{ color: #123E85;}*/
        h2 {
            font-size: 18px;
            color: #2F2F2F;
            border-bottom: 3px solid #C32525;
            height: 40px;
            line-height: 40px;
        }

        .button {
            padding: 5px 20px;
            background: #123E85;
            border: none;
            color: #fff;
        }

        .button:hover {
            color: #fff;
        }

        .light_button {
            border: 1px solid #ccc;
            padding: 5px 20px;
        }

        .x_button {
            padding: 5px 10px;
            background: #123E85;
            border: none;
            color: #fff;
            float: right;
        }

        .x_button:hover {
            color: #fff;
        }

        .float_right {
            float: right;
        }

        .float_left {
            float: left;
        }

        .clear_both {
            clear: both;
        }

        .red {
            color: red;
        }

        .blue {
            color: #278DBC;
        }

        .hui {
            color: #666;
        }

        .face {
            width: 60px;
            height: 60px;
        }

        .small_face {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .big_face {
            width: 150px;
            height: 150px;
        }

        input[type=text]:focus, input[type=password]:focus {
            border: 1px solid #00A5FF;
        }

        .div_border {
            border-top: 1px dashed #ccc;
            width: 100%;
            margin-top: 50px;
        }

        /****************************************** header *************************************************/
        header {
            width: 100%;
            height: 50px;
            background: #000000;
            border-bottom: 3px solid #C32525;
        }

        nav {
            width: 960px;
            height: 50px;
            line-height: 50px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav .logo {
            height: 50px;
            float: left;
        }

        nav ul.nav_left {
            float: left;
            margin: 0 10px;
        }

        nav ul.nav_left li {
            float: left;
        }

        nav ul.nav_left li a {
            padding: 0 20px;
            display: block;
            height: 50px;
            line-height: 50px;
            color: #fff;
        }

        nav ul.nav_left li a:hover {
            background: #303030;
        }

        .nav_active {
            background: #303030;
        }

        #search_form {
            float: right;
            margin-right: 30px;
        }

        nav ul.nav_right {
            float: right;
        }

        nav ul.nav_right li {
            float: left;
        }

        nav ul.nav_right li.sys .sys_box {
            display: none;
            border: 1px solid #ccc;
            background: #fff;
            position: absolute;
            text-align: center;
        }

        .nav_right .sys_box a {
            padding: 0 20px;
            display: block;
            height: 40px;
            line-height: 40px;
            color: #505050;
        }

        .nav_right .sys_box a:last-child {
            border-top: 1px solid #ccc;
        }

        .nav_right .sys_box a:hover {
            background: #F6F6F6;
        }

        nav ul.nav_right li a {
            padding: 0 10px;
            display: block;
            height: 50px;
            line-height: 50px;
            color: #fff;
        }

        nav ul.nav_right li a:hover {
            background: #303030;
        }

        .search_input {
            width: 200px;
            height: 28px;
            border-radius: 10px;
            border: 1px solid #fff;
            padding-right: 40px;
            padding-left: 10px;
            margin-top: 10px;
            float: left;
        }

        .search_submit {
            margin: 0 0 0 -40px;
            border: none;
            width: 24px;
            height: 24px;
            background: url(images/search_ico.png);
        }

        .search_submit:focus {
            box-shadow: none;
        }

        /****************************************** box *************************************************/

        /****************************************** left *************************************************/
        #box {
            width: 1000px;
            height: auto;
            margin: 10px auto;
        }

        #box .left {
            width: 160px;
            height: auto;
            float: left;
            padding: 20px;
            background: #F8F8F8;
            margin-bottom: 300px;
        }

        .left_top ul li a {
            display: block;
            padding: 5px;
            font-size: 14px;
        }

        /*.left_top ul li a:hover{ background: #F1F1F1;}*/

        .left_bottom ul li a {
            display: block;
            padding: 5px;
            font-size: 12px;
            text-indent: 12px;
            background: url('../images/doc.png') 0 6px no-repeat;
        }

        .left_bottom .friend_back {
            background: url('../images/friends.png') 0 6px no-repeat;
        }

        .left_bottom .qunblog_back {
            background: url('../images/qunweibo.png') 0 6px no-repeat;
        }

        .left_bottom .attion_back {
            background: url('../images/heart.png') 0 6px no-repeat;
        }

        /*.left_bottom ul li a:hover{ background: #F1F1F1;}*/

        .fenzu {
            padding: 5px;
            margin: 20px 0;
        }

        .fenzu h3 {
            font-size: 16px;
            color: #424242;
            font-weight: normal;
            border-bottom: 1px dashed #ccc;
            padding: 10px 0;
        }

        .create_fenzu {
            display: block;
            padding: 5px;
        }

        /****************************************** main *************************************************/
        #box .main {
            width: 490px;
            height: auto;
            float: left;
            padding: 20px;
            margin: 0 10px;
            background: #F8F8F8;
        }

        .release_weibo .button {
            margin-top: 10px;
        }

        .release_weibo p {
            margin-bottom: 10px;
        }

        .weibo h3 {
            font-size: 18px;
            color: #424242;
            line-height: 30px;
            font-weight: normal;
            border-bottom: 1px dashed #BDBDBD;
            margin: 20px 0;
        }

        .weibo_list {
            padding: 30px 0;
            border-bottom: 1px dashed #BDBDBD;
        }

        .weibo_list:last-child {
            border: none;
        }

        .weibo_list .weibo_list_main {
            width: 420px;
            height: auto;
        }

        .weibo_list .weibo_list_main h4 {
            font-size: 16px;
        }

        .weibo_list .weibo_list_main p {
            margin: 10px 0;
        }

        .weibo_list .weibo_list_main .weibo_list_img {
            width: 120px;
            height: 120px;
        }

        .zhuanfa_area {
            width: 100%;
            height: 100px;
        }

        .zhuanfa_area form textarea {
            width: 470px;
            height: 100px;
            margin: 5px 0;
            padding: 10px;
        }

        .comment_div {
            width: 420px;
            height: auto;
            display: none;
        }

        .comment_div textarea {
            width: 100%;
            height: 50px;
            margin: 5px 0;
        }

        /*** 评论列表 ***/
        .comment_list {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 10px;
        }

        .comment_list li {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .comment_con {
            width: 370px;
            display: block;
            float: right;
        }

        .comment_time {
            color: #808080;
            font-size: 10px;
        }

        /****************************************** right *************************************************/
        #box .right {
            width: 210px;
            height: auto;
            float: right;
            padding: 20px;
            background: #F8F8F8;
        }

        .right_user_info {
            text-align: center;
        }

        .right_user_info .right_user_info_top img {
            width: 60px;
            height: 60px;
            border-radius: 60px;
        }

        .user_info_username {
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
        }

        .right_user_info_bottom {
            padding: 20px;
        }

        .right_user_info_bottom li {
            float: left;
            padding: 0 10px;
        }

        .right_user_info_bottom li p {
            font-weight: bold;
        }

        .right_user_info_bottom li.lr_border {
            border-left: 1px solid #676767;
            border-right: 1px solid #676767;
        }

        .friend_list ul li {
            padding: 10px 0;
        }

        .friend_list img {
            width: 40px;
            height: 40px;
            float: left;
        }

        .friend_list span {
            float: left;
            width: 100px;
            padding-left: 10px;
        }

        .friend_list span h5 {
            font-size: 14px;
        }

        .friend_list span p {
            font-size: 12px;
        }

        .friend_list .guanzhu {
            padding: 3px 5px;
            background: #123E85;
            color: #fff;
            font-size: 12px;
            line-height: 40px;
        }

        .gonggao ul li {
            padding: 5px 10px;
        }

        /****************************************** 弹出层div *************************************************/
        #popupdiv {
            width: 490px;
            padding: 10px;
            height: auto;
            top: 200px;
            position: absolute;
            z-index: 1000;
            background: #ffffff;
        }

        /****************************************** 关注列表页 *************************************************/
        /****************************************** main_right *************************************************/
        .main_right {
            width: 740px;
            height: auto;
            float: right;
            padding: 20px;
            margin: 0 10px;
            background: #F8F8F8;
        }

        .main_right ul {
            padding: 20px 0;
        }

        .main_right ul li {
            padding: 20px 0;
            border-bottom: 1px dashed #ccc;
        }

        .main_right ul li:last-child {
            border: none;
        }

        .main_right ul li img {
            float: left;
        }

        .main_right .guanzhu_con {
            width: 670px;
            height: 50px;
            float: right;
        }

        .guanzhu_con .guanzhu_con_top {
            float: left
        }

        .guanzhu_con .guanzhu_con_right {
            float: right
        }

        .guanzhu_con .guanzhu_con_bottom {
            width: 100%;
            display: block;
            margin-top: 20px;
        }

        .userinfo_nickname {
            font-size: 16px;
        }

        .guanzhu_con .userinfo_address {
            margin-left: 50px;
        }

        /****************************************** 搜索列表页 *************************************************/
        .main_right .search_box_ul li {
            list-style: none;
            float: left;
            border: 0;
            padding: 0;
        }

        .main_right .search_box_ul li a {
            padding: 0 10px;
            height: 30px;
            line-height: 30px;
            display: block;
        }

        .main_right .search_box_ul li a:hover {
            color: blue;
            border-bottom: 2px solid #1059A1;
        }

        .main_right .search_box_ul li .search_box_li_active {
            border-bottom: 2px solid #1059A1;
            color: blue;
        }

        .main_right .search_box_form, .search_box_ul {
            width: 500px;
            margin: 0 auto;
        }

        .main_right .search_box_form input.text {
            border: 1px solid #ccc;
            height: 40px;
            width: 400px;
            border-radius: 5px 0 0 5px;
            text-indent: 10px;
            color: #ccc;
            float: left;
        }

        .main_right .search_box_sub_button {
            padding: 9px 25px;
            font-size: 18px;
            background: #123E85;
            border: none;
            color: #fff;
        }

        .main_right .search_box_form input.text:focus {
            border: 1px solid #3777C1;
            box-shadow: 0 0 2px 1px #3777C1;
            color: #666
        }

        .main_right .search_box_div {
            display: none;
        }

        .main_right .search_box_active {
            display: block;
        }

        .weibo_list .search_weibo_list_main {
            width: 670px;
            height: auto;
        }

        .weibo_list .search_weibo_list_main h4 {
            font-size: 16px;
        }

        .weibo_list .search_weibo_list_main p {
            margin: 10px 0;
        }

        .weibo_list .search_weibo_list_main .weibo_list_img {
            width: 120px;
            height: 120px;
        }

        .search_comment_div {
            width: 670px;
            height: auto;
            display: none;
        }

        .search_comment_div textarea {
            width: 100%;
            height: 50px;
            margin: 5px 0;
        }

        .main_right .main_comment .search_comment_con {
            width: 670px;
            height: 60px;
            float: right;
        }

        /****************************************** end *************************************************/
        /****************************************** 评论列表页 *************************************************/
        /****************************************** main_comment *************************************************/
        .main_comment ul {
            padding: 20px 0;
        }

        .main_comment ul li {
            width: 490px;
            padding: 20px 0;
            border-bottom: 1px dashed #ccc;
        }

        .main_comment ul li:last-child {
            border: none;
        }

        .main_comment .comment_con {
            width: 420px;
            height: 60px;
            float: right;
        }

        /****************************************** 个人信息页 *************************************************/
        /****************************************** Tabs *************************************************/
        .userinfo_box {
            width: 740px;
            height: auto;
            float: right;
            padding: 20px;
            margin: 0 10px;
            background: #F8F8F8;
        }

        /*.userinfo_box h2{ font-size: 18px; color: #123E85; border-bottom: 3px solid #C32525; height: 40px; line-height: 40px;}*/
        #tabs {
            width: 738px;
            height: auto;
            margin-top: 30px;
        }

        #tabs ul {
            background: #F8F8F8;
            height: 40px;
        }

        #tabs ul li:first-child {
            border-radius: 5px 0 0 0;
        }

        #tabs ul li:last-child {
            border-radius: 0 5px 0 0;
        }

        #tabs ul li {
            float: left;
            border: 1px solid #ccc;
            background: #F1F1F1;
            border-bottom: none;
        }

        #tabs ul .tabs_active {
            background: #ffffff;
        }

        #tabs ul li a {
            padding: 10px 20px;
            display: block;
        }

        #tabs div {
            border: 1px solid #ccc;
            padding: 10px;
            display: none;
            background: #ffffff;
        }

        #tabs .tabs_active_div {
            display: block;
        }

        #tabs .userinfo_submit_button {
            margin: 10px 0 0 320px;
        }

        #tabs tr {
            height: 50px;
            line-height: 50px;
        }

        #tabs input.text {
            width: 250px;
            height: 30px;
            text-indent: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #tabs input.text:focus {
            border: 1px solid #2062CB;
        }

        #tabs textarea {
            border: 1px solid #ccc;
            padding: 5px;
        }

        #tabs textarea:focus {
            border: 1px solid #2062CB;
        }

        #tabs .text_align_right {
            text-align: right;
        }

        #tabs #tabs-2 {
            text-align: center;
            padding-top: 50px;
        }

        #tabs .up_load_file {
            margin-left: 130px;
            margin-bottom: 50px;
        }

        /****************************************** footer *************************************************/
        footer {
            width: 100%;
            height: 100px;
            background: #000;
            margin-top: 10px;
        }

        footer p {
            text-align: center;
            color: #fff;
            padding: 20px;
        }
    </style>
</head>
<body>
<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('assets/ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('assets/ueditor/ueditor.all.js') }}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container', {
        toolbars: [
            [
                // 'anchor', //锚点
                // 'undo', //撤销
                'redo', //重做
                // 'bold', //加粗
                // 'indent', //首行缩进
                'snapscreen', //截图
                // 'italic', //斜体
                // 'underline', //下划线
                // 'strikethrough', //删除线
                // 'subscript', //下标
                // 'fontborder', //字符边框
                // 'superscript', //上标
                // 'formatmatch', //格式刷
                // 'source', //源代码
                // 'blockquote', //引用
                // 'pasteplain', //纯文本粘贴模式
                // 'selectall', //全选
                // 'print', //打印
                // 'preview', //预览
                'horizontal', //分隔线
                // 'removeformat', //清除格式
                // 'time', //时间
                // 'date', //日期
                // 'unlink', //取消链接
                // 'insertrow', //前插入行
                // 'insertcol', //前插入列
                // 'mergeright', //右合并单元格
                // 'mergedown', //下合并单元格
                // 'deleterow', //删除行
                // 'deletecol', //删除列
                // 'splittorows', //拆分成行
                // 'splittocols', //拆分成列
                // 'splittocells', //完全拆分单元格
                // 'deletecaption', //删除表格标题
                'inserttitle', //插入标题
                // 'mergecells', //合并多个单元格
                // 'deletetable', //删除表格
                // 'cleardoc', //清空文档
                // 'insertparagraphbeforetable', //"表格前插入行"
                'insertcode', //代码语言
                'fontfamily', //字体
                'fontsize', //字号
                'paragraph', //段落格式
                'simpleupload', //单图上传
                // 'insertimage', //多图上传
                // 'edittable', //表格属性
                // 'edittd', //单元格属性
                // 'link', //超链接
                // 'emotion', //表情
                // 'spechars', //特殊字符
                // 'searchreplace', //查询替换
                // 'map', //Baidu地图
                // 'gmap', //Google地图
                // 'insertvideo', //视频
                // 'help', //帮助
                // 'justifyleft', //居左对齐
                // 'justifyright', //居右对齐
                // 'justifycenter', //居中对齐
                // 'justifyjustify', //两端对齐
                'forecolor', //字体颜色
                // 'backcolor', //背景色
                // 'insertorderedlist', //有序列表
                // 'insertunorderedlist', //无序列表
                // 'fullscreen', //全屏
                // 'directionalityltr', //从左向右输入
                // 'directionalityrtl', //从右向左输入
                // 'rowspacingtop', //段前距
                // 'rowspacingbottom', //段后距
                // 'pagebreak', //分页
                // 'insertframe', //插入Iframe
                // 'imagenone', //默认
                // 'imageleft', //左浮动
                // 'imageright', //右浮动
                // 'attachment', //附件
                // 'imagecenter', //居中
                // 'wordimage', //图片转存
                // 'lineheight', //行间距
                // 'edittip ', //编辑提示
                // 'customstyle', //自定义标题
                // 'autotypeset', //自动排版
                // 'webapp', //百度应用
                // 'touppercase', //字母大写
                // 'tolowercase', //字母小写
                // 'background', //背景
                // 'template', //模板
                // 'scrawl', //涂鸦
                // 'music', //音乐
                // 'inserttable', //插入表格
                // 'drafts', // 从草稿箱加载
                // 'charts', // 图表
            ]
        ],
        'elementPathEnabled': false,
        'wordCountMsg': '当前已输入 {#count} 个字符'
    });
</script>
<header>
    <nav>
        <img class="logo" src="{{ asset('assets/images/images_blog/logo.png') }}">
        <ul class="nav_left">
            <li><a class="nav_active" href="./index.html">首页</a></li>
            <li><a href="./list.html">列表</a></li>
            <li><a href="javascript:void(0)">评论</a></li>
            <li><a href="javascript:void(0)">@我</a></li>
        </ul>

        <ul class="nav_right">
            <li><a href=""><img src="{{ asset('assets/images/images_blog/1_03.gif') }}"></a></li>
            <li><a href=""><img src="{{ asset('assets/images/images_blog/1_01.gif') }}"></a></li>
            <li class="sys"><a href="javascript:void(0)"><img src="{{ asset('assets/images/images_blog/1_02.png') }}"></a>
                <div class="sys_box">
                    <a href="./userinfo.html">账号设置</a>
                    <a href="">账号安全</a>
                    <a href="">消息设置</a>
                    <a href="">帮助中心</a>
                    <a href="">退出</a>
                </div>
            </li>
            <li><a href="">新消息</a></li>
        </ul>

        <form id="search_form" action="">
            <input type="text" name="" class="search_input">
            <input type="submit" class="search_submit" value=" ">
        </form>
    </nav>
</header>
<div id="box">
    <!-- left begin -->
    <aside class="left">
        <div class="left_top">
            <ul>
                <li><a href="">首页</a></li>
                <li><a href="">提到我的</a></li>
                <li><a href="">评论</a></li>
                <li><a href="">私信</a></li>
                <li><a href="">收藏</a></li>
            </ul>
        </div>
        <div class="fenzu"><h3>好友分组</h3></div>
        <div class="left_bottom">
            <ul>
                <li><a class="friend_back" href="">好友圈</a></li>
                <li><a class="qunblog_back" href="">群微博</a></li>
                <li><a class="attion_back" href="">特别关注</a></li>
                <li><a href="">好友</a></li>
                <li><a href="">同学</a></li>
                <li><a href="">同事</a></li>
                <li><a href="">明星</a></li>
            </ul>
        </div>
        <a class="create_fenzu blue" href="">+创建新分组</a>
    </aside>
    <!-- left end -->

    <!-- mian begin -->
    <div class="main">
        <div class="release_weibo">
            <p class="float_right">你还可以输入<a class="red">0</a>个字</p>
            <!-- 加载编辑器的容器 -->
            <div class="clear_both"></div>
            <form action="">
                <script id="container" name="content" type="text/plain"></script>
                <input class='button float_right' type="submit" value="发 布">
            </form>
        </div>
        <div class="clear_both"></div>
        <div class="weibo">
            <h3>微博</h3>
            <ul>
                <!-- 微博列表 begin -->
                <li class="weibo_list">
                    <img class="face float_left" src="" alt="">
                    <div class="weibo_list_main float_right">
                        <h4>微博标题</h4>
                        <p>这是内容啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
                        <img class="weibo_list_img" src="" alt="">
                        <div>
                            <span class="release_time float_left blue">2015-07-30</span>
                            <span class="float_right"><a href="javascript:void(0)" onclick="show('popupdiv')"
                                                         class="blue">转发</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="blue"
                                                                                                        href="">收藏</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                        class="blue comment" href="javascript:void(0)">评论(10)</a></span>
                            <div style="display: block" class="comment_div float_right">
                                <form action="">
                                    <textarea name="comment"></textarea>
                                    <input class="button float_right" type="submit" value="评论">
                                </form>
                                <div class="clear_both"></div>
                                <!-- 评论列表 begin -->
                                <ul class="comment_list">
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="{{ asset('assets/images/images_blog/zan.png') }}" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="{{ asset('assets/images/images_blog/zan.png') }}" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="{{ asset('assets/images/images_blog/zan.png') }}" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                </ul>
                                <!-- 评论列表 end -->
                            </div>
                        </div>
                        <div id="popupdiv" style="display:none;">
                            转发
                            <a class="x_button" href="javascript:void(0)" onclick="closeDiv('popupdiv')"> X </a>
                            <div class="clear_both"></div>
                            <div class="zhuanfa_area">
                                <form action="">
                                    <textarea name="zhuanfa_area"></textarea>
                                    <input class="button float_right" type="submit" value="转发">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clear_both"></div>
                </li>
                <!-- 微博列表 end -->

                <!-- 微博列表 begin -->
                <li class="weibo_list">
                    <img class="face float_left" src="" alt="">
                    <div class="weibo_list_main float_right">
                        <h4>微博标题</h4>
                        <p>这是内容啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
                        <img class="weibo_list_img" src="" alt="">
                        <div>
                            <span class="release_time float_left blue">2015-07-30</span>
                            <span class="float_right"><a href="javascript:void(0)" onclick="show('popupdiv')"
                                                         class="blue">转发</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="blue"
                                                                                                        href="">收藏</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                        class="blue comment" href="javascript:void(0)">评论(10)</a></span>
                            <div class="comment_div float_right">
                                <form action="">
                                    <textarea name="comment"></textarea>
                                    <input class="button float_right" type="submit" value="评论">
                                </form>
                                <div class="clear_both"></div>
                                <!-- 评论列表 begin -->
                                <ul class="comment_list">
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                </ul>
                                <!-- 评论列表 end -->
                            </div>
                        </div>
                        <div id="popupdiv" style="display:none;">
                            转发
                            <a class="x_button" href="javascript:void(0)" onclick="closeDiv('popupdiv')"> X </a>
                            <div class="clear_both"></div>
                            <div class="zhuanfa_area">
                                <form action="">
                                    <textarea name="zhuanfa_area"></textarea>
                                    <input class="button float_right" type="submit" value="转发">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clear_both"></div>
                </li>
                <!-- 微博列表 end -->

                <!-- 微博列表 begin -->
                <li class="weibo_list">
                    <img class="face float_left" src="" alt="">
                    <div class="weibo_list_main float_right">
                        <h4>微博标题</h4>
                        <p>这是内容啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
                        <img class="weibo_list_img" src="" alt="">
                        <div>
                            <span class="release_time float_left blue">2015-07-30</span>
                            <span class="float_right"><a href="javascript:void(0)" onclick="show('popupdiv')"
                                                         class="blue">转发</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="blue"
                                                                                                        href="">收藏</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                        class="blue comment" href="javascript:void(0)">评论(10)</a></span>
                            <div class="comment_div float_right">
                                <form action="">
                                    <textarea name="comment"></textarea>
                                    <input class="button float_right" type="submit" value="评论">
                                </form>
                                <div class="clear_both"></div>
                                <!-- 评论列表 begin -->
                                <ul class="comment_list">
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                    <li>
                                        <img class="small_face float_left" src="" alt="">
                                        <span class='comment_con'><a class="red" href="">Jocelynzhu </a>：评论内容评论内容</span>
                                        <span class='comment_time'>2015-07-30 15:48</span>
                                        <span class="float_right"><a href="javascript:void(0)" class="blue">举报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue comment" href="javascript:void(0)">回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    class="blue" href=""><img src="images/zan.png" alt="">213</a></span>
                                        <div class="comment_div float_right">
                                            <form action="">
                                                <textarea name="huifu"></textarea>
                                                <input class="button float_right" type="submit" value="回复">
                                            </form>
                                        </div>
                                        <div class="clear_both"></div>
                                    </li>
                                </ul>
                                <!-- 评论列表 end -->
                            </div>
                        </div>
                        <div id="popupdiv" style="display:none;">
                            转发
                            <a class="x_button" href="javascript:void(0)" onclick="closeDiv('popupdiv')"> X </a>
                            <div class="clear_both"></div>
                            <div class="zhuanfa_area">
                                <form action="">
                                    <textarea name="zhuanfa_area"></textarea>
                                    <input class="button float_right" type="submit" value="转发">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clear_both"></div>
                </li>
                <!-- 微博列表 end -->

            </ul>
        </div>

    </div>

    <!-- mian end -->

    <!-- right begin -->
    <aside class="right">

        <div class="right_user_info">
            <div class="right_user_info_top">
                <a href=""><img src="{{ asset('assets/images/images_blog/face.png') }}" alt=""></a><br>
                <a class="user_info_username" href="">Jocelynzhu </a>
            </div>
            <div class="clear_both"></div>
            <ul class="right_user_info_bottom">
                <li>
                    <p>212</p>
                    <a href="">关注</a>
                </li>
                <li class="lr_border">
                    <p>2112</p>
                    <a href="">粉丝</a>
                </li>
                <li>
                    <p>4212</p>
                    <a href="">微博</a>
                </li>
            </ul>
        </div>

        <div class="clear_both"></div>
        <div class="fenzu"><h3>可能感兴趣的人</h3></div>

        <div class="friend_list">
            <ul>
                <li>
                    <img src="">
                    <span>
                        <h5>我的好友</h5>
                        <p class="blue">共10个共同好友</p>
                    </span>
                    <a class="guanzhu" href="">+关注</a>
                    <div class="clear_both"></div>
                </li>

                <li>
                    <img src="">
                    <span>
                        <h5>我的好友</h5>
                        <p class="blue">共10个共同好友</p>
                    </span>
                    <a class="guanzhu" href="">+关注</a>
                    <div class="clear_both"></div>
                </li>

                <li>
                    <img src="">
                    <span>
                        <h5>我的好友</h5>
                        <p class="blue">共10个共同好友</p>
                    </span>
                    <a class="guanzhu" href="">+关注</a>
                    <div class="clear_both"></div>
                </li>

                <li>
                    <img src="">
                    <span>
                        <h5>我的好友</h5>
                        <p class="blue">共10个共同好友</p>
                    </span>
                    <a class="guanzhu" href="">+关注</a>
                    <div class="clear_both"></div>
                </li>
            </ul>
        </div>

        <div class="fenzu"><h3>公告栏</h3></div>

        <div class="gonggao">
            <ul>
                <li><a class="blue" href="">测测你的视力有多强</a></li>
                <li><a class="blue" href="">测测你的视力有多强</a></li>
                <li><a class="blue" href="">测测你的视力有多强</a></li>
                <li><a class="blue" href="">测测你的视力有多强</a></li>
                <li><a class="blue" href="">测测你的视力有多强</a></li>
            </ul>
        </div>


    </aside>
    <!-- right end -->
</div>
<div class="clear_both"></div>
<footer>
    <p>@CopyRight Jocelynzhu </p>
</footer>
</body>
</html>
<script>
    /**
     * 点出弹出div
     */
    function show(popupdiv) {
        var Idiv = document.getElementById(popupdiv);
        Idiv.style.display = "block";
        //以下部分要将弹出层居中显示
        Idiv.style.left = (document.documentElement.clientWidth - Idiv.clientWidth) / 2 + document.documentElement.scrollLeft + "px";
        Idiv.style.top = (document.documentElement.clientHeight - Idiv.clientHeight) / 2 + document.documentElement.scrollTop + 200 + "px";
        //以下部分使整个页面至灰不可点击
        var procbg = document.createElement("div"); //首先创建一个div
        procbg.setAttribute("id", "mybg"); //定义该div的id
        procbg.style.background = "#000000";
        procbg.style.width = "100%";
        procbg.style.height = "100%";
        procbg.style.position = "fixed";
        procbg.style.top = "0";
        procbg.style.left = "0";
        procbg.style.zIndex = "500";
        procbg.style.opacity = "0.6";
        procbg.style.filter = "Alpha(opacity=70)";
        //以上部分也可以用csstext代替
        // procbg.style.cssText="background:#000000;width:100%;height:100%;position:fixed;top:0;left:0;zIndex:500;opacity:0.6;filter:Alpha(opacity=70);";
        //背景层加入页面
        document.body.appendChild(procbg);
        document.body.style.overflow = "hidden"; //取消滚动条
        //以下部分实现弹出层的拖拽效果
        var posX;
        var posY;
        Idiv.onmousedown = function (e) {
            if (!e) e = window.event; //IE
            posX = e.clientX - parseInt(Idiv.style.left);
            posY = e.clientY - parseInt(Idiv.style.top);
            document.onmousemove = mousemove;
        }
        document.onmouseup = function () {
            document.onmousemove = null;
        }
        function mousemove(ev) {
            if (ev == null) ev = window.event;//IE
            Idiv.style.left = (ev.clientX - posX) + "px";
            Idiv.style.top = (ev.clientY - posY) + "px";
        }
    }
    //关闭弹出层
    function closeDiv(popupdiv) {
        var Idiv = document.getElementById(popupdiv);
        Idiv.style.display = "none";
        document.body.style.overflow = "auto"; //恢复页面滚动条
        var body = document.getElementsByTagName("body");
        var mybg = document.getElementById("mybg");
        body[0].removeChild(mybg);
    }

    /*********************************** 省市二级联动所需函数数据 begin ********************************************/
    var where = new Array(35);
    function comefrom(loca, locacity) {
        this.loca = loca;
        this.locacity = locacity;
    }
    where[0] = new comefrom("请选择", "请选择");
    where[1] = new comefrom("北京", "东城|西城|崇文|宣武|朝阳|丰台|石景山|海淀|门头沟|房山|通州|顺义|昌平|大兴|平谷|怀柔|密云|延庆");
    where[2] = new comefrom("上海", "黄浦|卢湾|徐汇|长宁|静安|普陀|闸北|虹口|杨浦|闵行|宝山|嘉定|浦东|金山|松江|青浦|南汇|奉贤|崇明");
    where[3] = new comefrom("天津", "和平|东丽|河东|西青|河西|津南|南开|北辰|河北|武清|红挢|塘沽|汉沽|大港|宁河|静海|宝坻|蓟县");
    where[4] = new comefrom("重庆", "万州|涪陵|渝中|大渡口|江北|沙坪坝|九龙坡|南岸|北碚|万盛|双挢|渝北|巴南|黔江|长寿|綦江|潼南|铜梁|大足|荣昌|壁山|梁平|城口|丰都|垫江|武隆|忠县|开县|云阳|奉节|巫山|巫溪|石柱|秀山|酉阳|彭水|江津|合川|永川|南川");
    where[5] = new comefrom("河北", "石家庄|邯郸|邢台|保定|张家口|承德|廊坊|唐山|秦皇岛|沧州|衡水");
    where[6] = new comefrom("山西", "太原|大同|阳泉|长治|晋城|朔州|吕梁|忻州|晋中|临汾|运城");
    where[7] = new comefrom("内蒙古", "呼和浩特|包头|乌海|赤峰|呼伦贝尔盟|阿拉善盟|哲里木盟|兴安盟|乌兰察布盟|锡林郭勒盟|巴彦淖尔盟|伊克昭盟");
    where[8] = new comefrom("辽宁", "沈阳|大连|鞍山|抚顺|本溪|丹东|锦州|营口|阜新|辽阳|盘锦|铁岭|朝阳|葫芦岛");
    where[9] = new comefrom("吉林", "长春|吉林|四平|辽源|通化|白山|松原|白城|延边");
    where[10] = new comefrom("黑龙江", "哈尔滨|齐齐哈尔|牡丹江|佳木斯|大庆|绥化|鹤岗|鸡西|黑河|双鸭山|伊春|七台河|大兴安岭");
    where[11] = new comefrom("江苏", "南京|镇江|苏州|南通|扬州|盐城|徐州|连云港|常州|无锡|宿迁|泰州|淮安");
    where[12] = new comefrom("浙江", "杭州|宁波|温州|嘉兴|湖州|绍兴|金华|衢州|舟山|台州|丽水");
    where[13] = new comefrom("安徽", "合肥|芜湖|蚌埠|马鞍山|淮北|铜陵|安庆|黄山|滁州|宿州|池州|淮南|巢湖|阜阳|六安|宣城|亳州");
    where[14] = new comefrom("福建", "福州|厦门|莆田|三明|泉州|漳州|南平|龙岩|宁德");
    where[15] = new comefrom("江西", "南昌市|景德镇|九江|鹰潭|萍乡|新馀|赣州|吉安|宜春|抚州|上饶");
    where[16] = new comefrom("山东", "济南|青岛|淄博|枣庄|东营|烟台|潍坊|济宁|泰安|威海|日照|莱芜|临沂|德州|聊城|滨州|菏泽");
    where[17] = new comefrom("河南", "郑州|开封|洛阳|平顶山|安阳|鹤壁|新乡|焦作|濮阳|许昌|漯河|三门峡|南阳|商丘|信阳|周口|驻马店|济源");
    where[18] = new comefrom("湖北", "武汉|宜昌|荆州|襄樊|黄石|荆门|黄冈|十堰|恩施|潜江|天门|仙桃|随州|咸宁|孝感|鄂州");
    where[19] = new comefrom("湖南", "长沙|常德|株洲|湘潭|衡阳|岳阳|邵阳|益阳|娄底|怀化|郴州|永州|湘西|张家界");
    where[20] = new comefrom("广东", "广州|深圳|珠海|汕头|东莞|中山|佛山|韶关|江门|湛江|茂名|肇庆|惠州|梅州|汕尾|河源|阳江|清远|潮州|揭阳|云浮");
    where[21] = new comefrom("广西", "南宁|柳州|桂林|梧州|北海|防城港|钦州|贵港|玉林|南宁地区|柳州地区|贺州|百色|河池");
    where[22] = new comefrom("海南", "海口|三亚");
    where[23] = new comefrom("四川", "成都|绵阳|德阳|自贡|攀枝花|广元|内江|乐山|南充|宜宾|广安|达川|雅安|眉山|甘孜|凉山|泸州");
    where[24] = new comefrom("贵州", "贵阳|六盘水|遵义|安顺|铜仁|黔西南|毕节|黔东南|黔南");
    where[25] = new comefrom("云南", "昆明|大理|曲靖|玉溪|昭通|楚雄|红河|文山|思茅|西双版纳|保山|德宏|丽江|怒江|迪庆|临沧");
    where[26] = new comefrom("西藏", "拉萨|日喀则|山南|林芝|昌都|阿里|那曲");
    where[27] = new comefrom("陕西", "西安|宝鸡|咸阳|铜川|渭南|延安|榆林|汉中|安康|商洛");
    where[28] = new comefrom("甘肃", "兰州|嘉峪关|金昌|白银|天水|酒泉|张掖|武威|定西|陇南|平凉|庆阳|临夏|甘南");
    where[29] = new comefrom("宁夏", "银川|石嘴山|吴忠|固原");
    where[30] = new comefrom("青海", "西宁|海东|海南|海北|黄南|玉树|果洛|海西");
    where[31] = new comefrom("新疆", "乌鲁木齐|石河子|克拉玛依|伊犁|巴音郭勒|昌吉|克孜勒苏柯尔克孜|博尔塔拉|吐鲁番|哈密|喀什|和田|阿克苏");
    where[32] = new comefrom("香港", "中西区|湾仔区|东区南区|油尖旺区|深水埗区|九龙城区|黄大仙区|观塘区|北区|大埔区|沙田区|西贡区|荃湾区|屯门区|元朗区|葵青区|离岛区");
    where[33] = new comefrom("澳门", "");
    where[34] = new comefrom("台湾", "台北|高雄|台中|台南|屏东|南投|云林|新竹|彰化|苗栗|嘉义|花莲|桃园|宜兰|基隆|台东|金门|马祖|澎湖");
    where[35] = new comefrom("其它", "北美洲|南美洲|亚洲|非洲|欧洲|大洋洲");
    function select() {
        with (document.userinfo.province) {
            var loca2 = options[selectedIndex].value;
        }
        for (i = 0; i < where.length; i++) {
            if (where[i].loca == loca2) {
                loca3 = (where[i].locacity).split("|");
                for (j = 0; j < loca3.length; j++) {
                    with (document.userinfo.city) {
                        length = loca3.length;
                        options[j].text = loca3[j];
                        options[j].value = loca3[j];
                        var loca4 = options[selectedIndex].value;
                    }
                }
                break;
            }
        }
        document.userinfo.newlocation.value = loca2 + loca4;
    }
    function init() {
// with(document.userinfo.province) {
// length = where.length;
// for(k=0;k<where.length;k++) { options[k].text = where[k].loca; options[k].value = where[k].loca; }
// options[selectedIndex].text = where[0].loca; options[selectedIndex].value = where[0].loca;
// }
// with(document.userinfo.city) {
// loca3 = (where[0].locacity).split("|");
// length = loca3.length;
// for(l=0;l<length;l++) { options[l].text = loca3[l]; options[l].value = loca3[l]; }
// options[selectedIndex].text = loca3[0]; options[selectedIndex].value = loca3[0];
// }
    }
    /*********************************** 省市二级联动所需函数数据 end ********************************************/


    $(document).ready(function () {
        /**
         * 导航条切换样式
         */
        $('.nav_left').children('li').click(function () {
            $(this).siblings('li').children().removeClass('nav_active');
            $(this).children('a').addClass('nav_active');
        });

        /**
         * 导航条设置按钮
         */
        $('.sys').mouseover(function () {
            $(this).children('.sys_box').show();
        });
        $('.sys').mouseout(function () {
            $(this).children('.sys_box').hide();
        });
        /**
         * 发表评论
         */
        $('.comment').click(function () {
            $(this).parent().siblings("div").fadeToggle(500);
        });

        /**
         * Tabs切换
         */
        $("#tabs").children("ul").children("li").click(function () {
            $(this).addClass('tabs_active').siblings('li').removeClass('tabs_active');
            var index = $(this).index();
            $("#tabs").children("div").eq(index).show().siblings("div").hide();
        });

        /**
         * 搜索页Tabs切换
         */
        $("#search_box").children("ul").children("li").click(function () {
            $(this).children('a').addClass('search_box_li_active');
            $(this).siblings('li').children('a').removeClass('search_box_li_active');
            var index = $(this).index();
            $("#search_box").children("div").eq(index).fadeIn().siblings("div").hide();
        });

        /**
         * 用户注册点击验证码刷新
         */
        var src = $('#verify').attr('src');
        $('#verify').click(function () {
            $(this).attr('src', src + '/' + Math.random());
        });

        /**
         * 省市二级联动
         * 初始化init
         */
        init();
        /** 省市二级联动 end **/


    });
</script>
