@extends('layouts.weblayout')

@section('content')
<!-- Banner -->
{{--<div class="banner">--}}
    {{--<div class="banner_list">--}}
        {{--<div class="item">--}}
            {{--<a href=""><img src="{{asset('assets/images/1.jpg')}}" alt=""></a>--}}
            {{--<!--<a href=""><img class="img-responsive" src="{{asset('assets/images/1.jpg')}}" alt=""></a>-->--}}
        {{--</div>--}}
        {{--<div class="item">--}}
            {{--<a href=""><img src="{{asset('assets/images/2.jpg')}}" alt=""></a>--}}
        {{--</div>--}}
        {{--<div class="item">--}}
            {{--<a href=""><img src="{{asset('assets/images/3.jpg')}}" alt=""></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="banner_ctr">--}}
        {{--<span class="banner_ctr_pre glyphicon glyphicon-chevron-left pull-left"></span>--}}
        {{--<span class="banner_ctr_next glyphicon glyphicon-chevron-right pull-right"></span>--}}
    {{--</div>--}}
    {{--<div class="banner_status">--}}
        {{--<span class="banner_active"></span><span></span><span></span>--}}
    {{--</div>--}}
{{--</div>--}}

<div id="ad-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#ad-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#ad-carousel" data-slide-to="1"></li>
        <li data-target="#ad-carousel" data-slide-to="2"></li>
        <li data-target="#ad-carousel" data-slide-to="3"></li>
        <li data-target="#ad-carousel" data-slide-to="4"></li>
    </ol>

    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('upload/Banner/19206004f3b322d4083510d4982066f6fd07d8a.jpg') }}" alt="1 slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>第一张图</h1>
                    <p>这是第一张图片</p>
                    <p><a class="btn btn-lg btn-primary" role="button" target="_blank">点我点我</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('upload/Banner/1920600fdf565a058193263efc7393ba7ea6d30.jpg') }}" alt="2 slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>这是第二张图</h1>
                    <p>这是第二张图思密达</p>
                    <p>
                        <a class="btn btn-lg btn-primary" target="_blank" role="button">点我点我</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('upload/Banner/1920600b5530f668bc7b5541420651147cb1af3.jpg') }}" alt="3 slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>第三</h1>
                    <p>这是第三张图</p>
                    <p><a class="btn btn-lg btn-primary" target="_blank" role="button">点我也没用</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('upload/Banner/1920600b9d03ca12159fbc8cdc694cb2e0b9a02.jpg') }}" alt="4 slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>第四张</h1>

                    <p>这是第四张图</p>

                    <p><a class="btn btn-lg btn-primary" target="_blank" role="button">点我试试</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('upload/Banner/1920600ad6101001a49ac2af1faccdf6e9e3e0d.jpg') }}" alt="5 slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>第五</h1>
                    <p>这是最后一个</p>
                    <p><a class="btn btn-lg btn-primary" target="_blank" role="button">还点</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#ad-carousel" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#ad-carousel" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- banner end -->

<!-- main -->
<div class="container marketing">
    <div class="row">
        <div class="col-lg-4">
            <img width="140" height="140" alt="Generic placeholder image"
                 src="{{asset('assets/images/md04.gif')}}"
                 class="img-circle index-user-head">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
                cursus magna.</p>
            <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img width="140" height="140" alt="Generic placeholder image"
                 src="{{asset('assets/images/md05.jpg')}}"
                 class="img-circle index-user-head">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh.</p>
            <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img width="140" height="140" alt="Generic placeholder image"
                 src="{{asset('assets/images/md02.gif')}}"
                 class="img-circle index-user-head">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                fermentum massa justo sit amet risus.</p>
            <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
        </div><!-- /.col-lg-4 -->
    </div>
    <hr class="featurette-divider">
    <div class="row featurette stopcontextmenu">
        <div class="col-md-7">
            <h2 class="featurette-heading">You're going to be an excellent web engineer!</h2>
            <p class="lead">There you will learn PHP JS MYSQL Nginx Linux Laravel Node.js Angular HTML5 CSS3, all you can think is here! </p>
            <span class="pull-right">╭∩╮(︶︿︶)╭∩╮<br>&nbsp;&nbsp;&nbsp;&nbsp;Happy Hacking !</span>
        </div>
        <div class="col-md-4 featurette-img pull-right">
            <img src="{{asset('assets/images/demo-5424fd270fc16cb3a3fb5868a0e431bd.gif')}}" alt="..." class="img-rounded">
        </div>
    </div>

    <hr class="featurette-divider">
    {{--<div class="row featurette">--}}
        {{--<div class="col-md-4 panel panel-default">--}}
            {{--<div class="panel-body">--}}
                {{--Happy Hacking !--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-7 pull-right">--}}
            {{--<h2 class="featurette-heading">PHP is the best programming language</h2>--}}
            {{--<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod--}}
                {{--semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus--}}
                {{--commodo.</p>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<hr class="featurette-divider">--}}

    <h2 id="web" class="title-h2">WEB前端项目 <small style="font-size: 12px; color: red">（图片仅作展示,与内容无关）</small>
        <span class="pull-right"><button class="btn btn-primary" type="button">MORE <span class="badge">4</span>
            </button></span></h2>
    <div class="row main-list-box">
    @foreach($weblist as $webitem)
        <div class="col-sm-6 col-md-4 main-art-list">
            <div class="thumbnail">
                <div class="main-art-list-img-box">
                    <a href="{{ $webitem->direction }}"><img class="main-art-list-img" src="{{ $webitem->imgurl }}" alt="..."></a></div>
                <div class="caption">
                    <a href="{{ $webitem->direction }}"><h3>{{ $webitem->title }}</h3></a>
                    <p class="main-art-list-des"><a href="{{ $webitem->direction }}">{{ $webitem->describe }}</a></p>
                    <hr>
                    <!--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
                    <div class="main-art-list-bottom"><span class="label label-info"><span
                                    class="glyphicon glyphicon-folder-open fwhite"></span>&nbsp;&nbsp;{{ $webitem->classify }}</span>
                        <!-- 分类标签 -->
                        <span class="pull-right">
                        <span class="glyphicon glyphicon-eye-open fgrey"></span><span class="fgrey">250</span><span
                                    class="glyphicon glyphicon-dashboard fgrey"></span><span
                                    class="fgrey">{{ $webitem->time_show }}</span></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr class="featurette-divider">
    <div class="row main-list-box col-md-9">
        <h2 class="title-h3">热门文章
        <a href="{{ url('blog') }}" class="pull-right"><button class="btn btn-primary" type="button">MORE &gt;&gt;</button></a></h2>
        @foreach($posts as $post)
        <div class="media main-list-item">
            <div class="media-left media-middle">
                <a href="{{url('blog/'.$post->id)}}">
                    <img class="media-object main-list-item-title-img" src="@if($post->imgurl) {{ asset('upload/Post/160125'.$post->imgurl) }} @else {{ asset('upload/Post/post_default_title.png') }} @endif" alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <a class="media-cate" href="javascript:void(0)">【@if($post->catename){{ $post->catename }}@else未分类@endif】</a><a href="{{url('blog/'.$post->id)}}">{{$post->title}}</a>
                    <a class="pull-right main-list-hits" href="#">点击量<span class="hit_num">{{ $post->hit }}</span></a>
                </h4>
                <p class="main-list-item-content"><a href="{{url('blog/'.$post->id)}}">{{str_limit($post->abstract,250)}}</a></p>
                <div class="article_tags_box">
                    <span class="glyphicon glyphicon-tag fred article_tag"></span>
                    @foreach($post->tags as $tag)
                        <span class="article_tags label">{{ $tag }}</span>
                    @endforeach
                    <span class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>发布时间：{{$post->published_at}}</span>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="col-md-3 pull-right">
        <div class="article-list-right">

            {{--<h2 class="title-h3">Artlist</h2>--}}

            <div class="panel panel-default">
                <div class="panel-heading">热门新闻<span class="pull-right"><a class="glyphicon glyphicon-pushpin"
                                                                                     href=""></a></span></div>
                <ul class="list-group">
                    @foreach($news as $new)
                    <li class="list-group-item"><a href="{{url('blog/'.$new->id)}}">{{ str_limit($new->title,28) }}</a></li>
                    @endforeach
                    {{--<li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Morbi leo risus</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Vestibulum at eros</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Cras justo odio</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Morbi leo risus</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>--}}
                    {{--<li class="list-group-item"><a href="">Vestibulum at eros</a></li>--}}
                </ul>
            </div>
        </div>

        <div class="article-list-right stopcontextmenu">
            <a href="#" class="thumbnail">
                <img src="{{asset('assets/images/under-the-hood-f201a3edb6ec5fd91203f2a310a60a6e.gif')}}" alt="...">
            </a>
        </div>

        <div class="article-list-right">
            <div class="panel panel-default">
                <div class="panel-heading">Panel heading <span class="pull-right"><a class="glyphicon glyphicon-pushpin"
                                                                                     href=""></a></span></div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="">Vestibulum at eros</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- main end -->

<div class="container index-show-img">
    <img class="center-block" src="{{asset('assets/images/mainbg.gif')}}" alt="">
</div>
@stop
