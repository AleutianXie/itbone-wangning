@extends('layouts.adminlayout')
@section('title')
    Admin-文章列表
@stop
@section('content')
    <div class="main-right-box">
        <div class="main-right-search-box">
            <form class="col-lg-8" action="{{ url('admin/post') }}">
                <span class="col-lg-5 form-group">
                <input class="form-control" type="text" name="keywords" placeholder="请输入搜索内容……" id="" value="{{ $keywords }}">
                </span><input type="submit" class="btn btn-default" value="搜索">
            </form>
            <span class="pull-right"><a href="{{url('admin/post/create')}}" class="mk_dir btn btn-primary">发表文章</a><a
                        class="btn btn-danger show_upload_box">批量删除</a></span>
        </div>
        <div class="cl"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">文章列表</h3>
            </div>
            <div class="panel-body">
                <!--主体-->
                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                            <th class="ftcenter">ID</th>
                            <th>标题</th>
                            <th>分类</th>
                            <th>图片</th>
                            <th>摘要</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>发布时间</th>
                            <th style="min-width: 180px;">操作</th>
                        </tr>
                        @foreach($data as $post)
                            <tr>
                                <td class="ftcenter"><input type="checkbox" name="" id=""></td>
                                <td class="ftcenter">{{ $post->id }}</td>
                                <td style="max-width: 200px;">{!! $post->title !!}</td>
                                <td style="max-width: 150px;">{!! $post->catename !!}</td>
                                <td><a onclick="showImg(this)" href="javascript:void(0)">
                                        @if($post->imgurl)
                                            <img style="width: 140px; height: 60px;"
                                                 src="{{ asset('upload/Post/700300'.$post->imgurl) }}" alt="">
                                        @else
                                            <img style="width: 140px; height: 60px;"
                                                 src="{{ asset('upload/Post/post_default.png') }}" alt="">
                                        @endif
                                    </a></td>
                                <td>{!! $post->abstract !!}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td class="ftcenter handle" style="min-width: 250px;">
                                    @if($type && $type == 'hs')
                                        <a class="btn btn-danger show_confirm_box" postid="{{$post->id}}"><span
                                                    class="glyphicon glyphicon-trash"></span>
                                            <span>删除</span></a>
                                    @else
                                        <a class="btn btn-info" target="_blank" href="{{ url('blog',$post->id) }}"><span class="glyphicon glyphicon-eye-open"></span><span>查看</span></a> <a class="btn btn-success" href="{{url('admin/post',[$post->id,'edit'])}}"><span class="glyphicon glyphicon-edit"></span><span>编辑</span></a> <a class="btn btn-danger show_confirm_box" postid="{{$post->id}}"><span class="glyphicon glyphicon-trash"></span><span>删除</span></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="page">
                    {!! $data->render() !!}
                </div>

                <!--主体end-->
            </div>
        </div>
    </div>
    <!-- 预览框-->
    {{--<div class="show_img_box col-lg-5" style="position: absolute; display: none;">--}}
    <div class="show_img_box" style="position: absolute; display: none;">
        <a href="javascript:void(0)" class="thumbnail"
           style="box-shadow: 0 0 15px 5px #c0c0c0; position: relative; width: 500px ;height: 300px;">
            <img src="" alt="" style="position: absolute;">
        </a>
    </div>

    <!-- 提示框 -->
    <div class="confirm_box">
        <div class="confirm_tit">
            <span class="confirm_title">请确认</span><span
                    class="confirm_close glyphicon glyphicon-remove pull-right"></span>
        </div>
        <hr>
        <div class="confirm_body"><span class="glyphicon glyphicon-info-sign"></span>你确定要删除吗？</div>
        <hr>
        <form class="post_confirm_form" method="post" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if($type=='index')
                <input type="hidden" name="_method" value="DELETE">
            @endif
            {{--<input class="input_tagid" type="hidden" name="tagid" value="">--}}
            <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default confirm_close">取消</button></span>
            </div>
        </form>
    </div>
    <!-- 提示框 end-->
    <script>
        $(function () {
            // 提示框关闭
            $('.confirm_close').click(function () {
                $('.confirm_box').fadeOut();
            });
            // 提示框出现(虚修改)
            $('.show_confirm_box').on('click', function () {
                var postformurl = '';
                var postid = $(this).attr('postid');
                var type = "{{ $type }}";
                if (type == 'hs') {
                    postformurl = "{{url('/admin/post/hs')}}/" + postid;
                } else {
                    postformurl = "{{url('/admin/post')}}/" + postid;
                }
                $('.post_confirm_form').attr('action', postformurl);
                $('.confirm_box').fadeIn();
                var screen_height = document.documentElement.clientHeight;
                $('.confirm_box').css({
                    'top': (screen_height - $('.confirm_box').outerHeight()) / 2 + $(document).scrollTop(),
                    'left': ($('.main-right-box').outerWidth() - $('.confirm_box').outerWidth()) / 2
                });
            });
        });



    </script>
@stop
