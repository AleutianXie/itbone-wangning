@extends('layouts.weblayout')

@section('content')
<!-- main -->
<div class="container main-box">
    {{--<div class="breadbar">--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#">Home</a></li>--}}
            {{--<li><a href="#">Atricle</a></li>--}}
            {{--<li class="active">Detail</li>--}}
        {{--</ol>--}}
    {{--</div>--}}
    <div class="row main-list-box col-md-9">
        <div class="page-header">
            <h1>{{$post->title}}</h1>
            <span class="glyphicon glyphicon-dashboard text-muted"></span> <span class="text-muted">发布时间：</span><span
                    class="text-muted fred">{{$post->published_at}}</span>
        </div>
        @if($post->imgurl!='')
        <div class="jumbotron article-header">
            <img src="{{ asset('upload/Post/700300'.$post->imgurl) }}" class="article-header-img" alt="">
        </div>
        @endif
        <div class="well well-lg">
                <span class="text-danger">摘要：</span>{!! nl2br($post->abstract) !!}
        </div>
        <div class="article-content">
            <p>
                {!! nl2br($post->content) !!}
            </p>
        </div>

        <div class="bs-callout"><p class="text-muted">
            <p class="text-muted">分类： 设计模式</p>
            <p class="text-muted">标签： Laravel, PHP, Pipeline, 中间件, 管道模式, 设计模式</p>
            <p class="text-muted">分享： 0</p>
            <p class="text-muted">声明： 原创文章，未经允许，禁止转载！</p>
        </div>

        <div>
            <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-up"></span> 这篇文章对我很有用</button>
            <span class="pull-right fred"><span class="glyphicon glyphicon-fire"></span>250人觉得这篇文章很有用</span>
        </div>

        <!-- 评论 -->
        <div class="discuss">
            <div class="text-muted discuss-title">
                <a href="#"><span class="badge">42</span>条评论</a>

        <span class="pull-right"><a class="fred" href="">最新</a>
        <a href="">最早</a>
        <a href="">最热</a></span></div>
            <div class="discuss-content">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="user-img-md media-object" src="./images/md02.gif" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading fred">Username</h4>
                        <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                        <div class="discuss-bottom text-muted">
                            <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                    class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                    class="glyphicon glyphicon-send">转发</span>
                        </div>
                    </div>
                </div>

                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="user-img-md media-object" src="./images/md05.jpg" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading fred">Username</h4>
                        <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                        <div class="discuss-bottom text-muted">
                            <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                    class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                    class="glyphicon glyphicon-send">转发</span>
                        </div>
                    </div>
                </div>


                <!-- 带回复的评论 -->
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="user-img-md media-object" src="./images/md02.gif" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading fred">Username</h4>
                        <!-- 回复 -->
                        <div class="dis-callout dis-replay">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="user-img-sm media-object" src="./images/md02.gif" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading fred">Username</h4>
                                    <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                                    <div class="discuss-bottom text-muted pull-right">
                                        <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                                class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                                class="glyphicon glyphicon-send">转发</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 回复end -->
                        <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                        <div class="discuss-bottom text-muted">
                            <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                    class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                    class="glyphicon glyphicon-send">转发</span>
                        </div>
                    </div>
                </div>
                <!-- 带回复的评论end -->
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="user-img-md media-object" src="./images/md04.gif" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading fred">Username</h4>
                        <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                        <div class="discuss-bottom text-muted">
                            <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                    class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                    class="glyphicon glyphicon-send">转发</span>
                        </div>
                    </div>
                </div>


                <!-- 带回复的评论 -->
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="user-img-md media-object" src="./images/md02.gif" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading fred">Username</h4>
                        <!-- 回复 -->
                        <div class="dis-callout dis-replay">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="user-img-sm media-object" src="./images/md04.gif" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading fred">Username</h4>
                                    <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                                    <div class="discuss-bottom text-muted pull-right">
                                        <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                                class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                                class="glyphicon glyphicon-send">转发</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 回复end -->
                        <p>通俗说，Criteria就是一套查询条件对象。把模型查询条件分门别类的从Repository中剥离出来了。你可以预设不同的查询条件套餐…</p>
                        <div class="discuss-bottom text-muted">
                            <span>3月31日</span><span class="glyphicon glyphicon-share-alt">回复</span><span
                                    class="glyphicon glyphicon-thumbs-up">顶(1)</span><span
                                    class="glyphicon glyphicon-send">转发</span>
                        </div>
                    </div>
                </div>
                <!-- 带回复的评论end -->
            </div>

            <!-- 发表评论 -->
            <div class="dis-comment">
                <a href="#" class="col-lg-1 thumbnail">
                    <img src="./images/md02.gif" alt="...">
                </a>
                <div class="col-lg-11">
                    <div class="dis-comment-top">
                        <textarea class="form-control" name="" id="" placeholder="说点什么吧！"></textarea>
                    </div>
                    <div class="dis-comment-ctr">
                        <button class="look glyphicon glyphicon-piggy-bank"></button>
                        <input class="dis-submit pull-right" type="submit" value="提 交">
                    </div>
                </div>

            </div>
            <!-- 发表评论end -->
        </div>
    </div>

    <!-- right -->
    <div class="col-md-3 pull-right article-detail-right">
        <!-- <div class="article-list-right"> -->

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
        <!-- </div> -->

        <div class="article-list-right">
            <a href="#" class="thumbnail">
                <img src="./images/md1.jpg" alt="...">
            </a>
        </div>

        <!-- <div class="article-list-right"> -->
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
        <div class="tag-cloud">
            <a href="http://www.itbone.cn/" target="_blank"><img class="tag-cloud-img" border="0"
                                                                 src="{{asset('assets/images/bone_cloud_tag.jpg')}}"/></a>
        </div>
        <!-- </div> -->

    </div>
    <!-- right -->
</div>
<!-- main end -->
@stop