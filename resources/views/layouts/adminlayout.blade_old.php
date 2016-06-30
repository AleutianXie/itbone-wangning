<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>itbone-{{ $title }}</title>
    <!-- Bootstrap -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/admin_old.css')}}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap-markdown-master/css/bootstrap-markdown.min.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{url('assets/js/jquery-1.12.3.min.js')}}"></script>
    <script src="{{url('assets/Highcharts-4.2.4/js/highcharts.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/admin.js')}}"></script>
    <!--bootstrap makedown-->
    <script src="{{url('assets/bootstrap-markdown-master/js/bootstrap-markdown.js')}}"></script>
    <!--jquery ui -->
    <link rel="stylesheet" href="{{ asset('assets/jquery-ui-1.11.4/jquery-ui.css') }}">
    <script src="{{ asset('assets/jquery-ui-1.11.4/jquery-ui.js') }}"></script>
    <!--webuploader-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/webuploader-0.1.5/webuploader.css') }}">
    <script type="text/javascript" src="{{ asset('assets/webuploader-0.1.5/webuploader.js') }}"></script>
</head>
<body>
<!-- 左侧 -->
<div class="main-left col-lg-2">
    <div class="admin-logo-box">
        <a href="{{ url('admin') }}"><img src="{{asset('assets/images/bone_logo.png')}}" alt=""></a>
        <h2>Admin</h2>
    </div>
    <div class="list-group">
        <div class="list-group-items">
            <a href="{{url('admin/index')}}" class="glyphicon glyphicon-asterisk list-group-item"> 首页</a>
        </div>
        <div class="list-group-items">
            <a class="glyphicon glyphicon-cloud list-group-item"> 文章管理</a>
            <div class="list-group-item-body">
                <a href="{{url('admin/post/create')}}" class="list-group-item">发布文章</a>
                <a href="{{url('admin/post')}}" class="list-group-item">文章列表</a>
                <a href="{{url('admin/post/destoried_index')}}" class="list-group-item">回收站</a>
            </div>
        </div>
        <div class="list-group-items">
            <a class="glyphicon glyphicon-cloud list-group-item"> 标签管理</a>
            <div class="list-group-item-body">
                <a href="{{url('admin/tag/create')}}" class="list-group-item">创建标签</a>
                <a href="{{url('admin/tag')}}" class="list-group-item">标签列表</a>
                <a href="{{url('admin/tag/destoried_index')}}" class="list-group-item">回收站</a>
            </div>
        </div>
        {{--<a href="{{url('admin/post')}}" class="glyphicon glyphicon-cloud list-group-item"> 文章管理</a>--}}
        {{--<a href="{{url('admin/tag')}}" class="glyphicon glyphicon-th-list list-group-item"> Tag管理</a>--}}
        <div class="list-group-items">
            <a href="{{url('admin/weblist')}}" class="glyphicon glyphicon-th-list list-group-item"> web前端项目</a>
        </div>
        <div class="list-group-items">
            <a href="{{url('admin/upload')}}" class="glyphicon glyphicon-user list-group-item"> 上传管理</a>
        </div>
        <div class="list-group-items">
            <a class="glyphicon glyphicon-user list-group-item"> 用户管理</a>
            <div class="list-group-item-body">
                <a href="{{url('admin/auth/adduser')}}" class="list-group-item">添加用户</a>
                <a href="{{url('admin/auth/userlist')}}" class="list-group-item">用户列表</a>
            </div>
        </div>
    </div>
</div>
<!-- 左侧end-->

<!-- 后台主体 -->
<div class="col-lg-10 main-right">
    <header>
        <!-- 导航条 -->
        <nav class="navbar navbar-default">
            <!--<nav class="navbar navbar-inverse navbar-fixed-top">-->
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Brand</a>-->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!--<ul class="nav navbar-nav">-->
                    <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
                    <!--<li><a href="#">Link</a></li>-->
                    <!--<li class="dropdown">-->
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"-->
                    <!--aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
                    <!--<ul class="dropdown-menu">-->
                    <!--<li><a href="#">Action</a></li>-->
                    <!--<li><a href="#">Another action</a></li>-->
                    <!--<li><a href="#">Something else here</a></li>-->
                    <!--<li role="separator" class="divider"></li>-->
                    <!--<li><a href="#">Separated link</a></li>-->
                    <!--<li role="separator" class="divider"></li>-->
                    <!--<li><a href="#">One more separated link</a></li>-->
                    <!--</ul>-->
                    <!--</li>-->
                    <!--</ul>-->
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-danger">搜 索</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><img class="admin_user_head" src="{{url('assets/images/md02.gif')}}" alt=""></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><span
                                    class="ftred">{{ $uinfo['name'] }}</span><span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('admin/auth/logout') }}">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- 导航条end -->
        <!--路径导航-->
        @if($title != '后台主页')
        <ol class="breadcrumb">
            <li><a class="text-success" style="text-decoration: none;" href="{{ url('admin') }}">后台管理</a></li>
            <li><a style="text-decoration: none;" href="{{ url($control['url']) }}">{{ $control['tit'] }}</a></li>
            <li class="active">{{ $title }}</li>
            <li class="pull-right">
                @if($title != '文章列表' && $title != '图片列表' && $title != '标签列表' && $title != '用户列表')
                <a class="bread-btn" href="@yield('btn_url')"><span class="btn btn-primary">
                        @yield('button')
                    </span></a>
                @endif
            </li>
        </ol>
        @endif
    </header>
    @yield('content')
</div>
<!-- 后台主体end -->
</body>
</html>
