<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>{{ $title }}</title>
    <!-- Bootstrap -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="{{url('assets/js/jquery-1.12.3.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ url('hit',$title)}}"></script>

</head>
<body>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img class="logo" src="{{asset('assets/images/bone_logo.png')}}"
                                                      alt=""></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/')}}">首页</a></li>
                    <li><a href="{{url('blog')}}">文章列表</a></li>
                    <li><a href="{{url('/')}}#web">WEB前端</a></li>
                    <li><a href="#contact">分类</a></li>
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
                           {{--aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li class="dropdown-header">Nav header</li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                            {{--<li><a href="#">One more separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../navbar/">登录</a></li>
                    <li><a href="../navbar-static-top/">注册</a></li>
                    {{--<li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>--}}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<div style="height: 50px;"></div>

@yield('content')

        <!--回到顶部按钮-->
<div class="to_top">
    <span class="glyphicon glyphicon-menu-up"></span>
</div>
<!--回到顶部按钮 end-->
<div class="footer">
    <div class="container">
        <div class="web-share center-block">
            <a href=""><img src="{{asset('assets/images/qq.png')}}" alt=""></a>
            <a href=""><img src="{{asset('assets/images/weixin.png')}}" alt=""></a>
            <a href=""><img src="{{asset('assets/images/friends.png')}}" alt=""></a>
            <a href=""><img src="{{asset('assets/images/weibo.png')}}" alt=""></a>
            <a href=""><img src="{{asset('assets/images/qqkj.png')}}" alt=""></a>
        </div>
        <div class="web-info">
            <a href="">关于我们</a>
            <a href="">联系我们</a>
            <a href="">意见反馈</a>
            <a href="">更多……</a>
        </div>
        <p class="web-by">By Jocelynzhu @2016</p>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/js/jquery-1.12.3.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
</body>
</html>
