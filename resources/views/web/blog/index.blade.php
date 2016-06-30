@extends('layouts.weblayout')
@section('content')
        <!-- main -->
<div class="container main-box">
    {{--<div class="breadbar">--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="#">Home</a></li>--}}
    {{--<li><a href="#">Library</a></li>--}}
    {{--<li class="active">Data</li>--}}
    {{--</ol>--}}
    {{--</div>--}}
    <div class="row main-list-box col-md-9">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-align-right fred"></span>&nbsp;文章列表</h1>
        </div>
        <div class="cates-nav">
            <strong class="fred pull-left col-md-1" style="padding:0; line-height: 35px;">分类：</strong>
            <div class="cates col-md-11" style="padding: 0;">
                @foreach($cates as $cate)
                    <a @if($cate->id == $cateid) style="color:#F4645F;"
                       @endif href="{{ url('blog/cate',[$cate->id]) }}">{{ $cate->catename }}</a>
                @endforeach
                <a @if($cateid == 'no') style="color:#F4645F;" @endif  href="{{ url('blog') }}">无</a>
            </div>
            <div class="cl"></div>
        </div>
        @if($posts && count($posts)>0)
            @foreach($posts as $post)
                <div class="media main-list-item">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object main-list-item-title-img"
                                 src="{{ asset('upload/Post/160125'.$post->imgurl) }}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a class="media-cate" href="javascript:void(0)">【@if($post->catename){{ $post->catename }}@else未分类@endif】</a><a
                                    href="{{url('blog/'.$post->id)}}">{{$post->title}}</a>
                            <a class="pull-right main-list-hits" href="#">点击量<span
                                        class="hit_num">{{ $post->hit }}</span></a>
                        </h4>
                        <p class="main-list-item-content">{{str_limit($post->abstract,250)}}</p>
                        {{--<p class="main-list-item-content">{{$post->content}}</p>--}}
                        <div class="article_tags_box">
                            <span class="glyphicon glyphicon-tag fred article_tag"></span>
                            @foreach($post->tags as $tag)
                                <span class="article_tags label">{{ $tag }}</span>
                            @endforeach
                            <span class="pull-right text-muted"><span
                                        class="glyphicon glyphicon-time"></span>发布时间：{{$post->published_at}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="page">
                {!! $posts->render() !!}
            </div>
        @else
            <div class="well well-lg">
                <p class="text-danger">此分类下没有文章！</p>
            </div>
        @endif
    </div>

    <div class="col-md-3 pull-right">
        <div class="article-list-right">

            <h2 class="title-h3">Artlist</h2>

            <div class="panel panel-default">
                <div class="panel-heading">Panel heading <span class="pull-right"><a class="glyphicon glyphicon-pushpin"
                                                                                     href=""></a></span></div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="">Vestibulum at eros</a></li>
                    <li class="list-group-item"><a href="">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="">Vestibulum at eros</a></li>
                </ul>
            </div>
        </div>

        <div class="article-list-right">
            <a href="#" class="thumbnail">
                <img src="./images/md1.jpg" alt="...">
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
        <div class="tag-cloud">
            <a href="http://www.itbone.cn/" target="_blank"><img class="tag-cloud-img" border="0"
                                                                 src="./images/bone_cloud_tag.jpg"/></a>
        </div>
    </div>
</div>
<!-- main end -->
@stop