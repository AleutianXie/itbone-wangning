@extends('layouts.adminlayout')

@section('content')
    <div class="main-right-box">
        <div class="main-right-search-box">
            <form class="col-lg-8" action="{{ url('admin/tag') }}">
                <span class="col-lg-5 form-group">
                <input class="form-control" type="text" name="keywords" placeholder="请输入搜索内容……" id="" value="{{ $keywords }}">
                </span><input type="submit" class="btn btn-default" value="搜索">
            </form>
            <span class="pull-right"><a href="{{url('admin/tag/create')}}" class="mk_dir btn btn-primary">创建标签</a><a
                        class="btn btn-danger show_upload_box">批量删除</a></span>
        </div>
        <div class="cl"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">发布文章</h3>
            </div>
            <div class="panel-body">
                <!--主体-->

                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                            <th class="ftcenter">ID</th>
                            <th>Tag</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Page Image</th>
                            <th>Meta Description</th>
                            <th>Layout</th>
                            <th>Direction</th>
                            <th style="min-width: 180px;">Actions</th>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                                <td class="ftcenter">{{$tag->id}}</td>
                                <td>{!! $tag->tag !!}</td>
                                <td>{!! $tag->title !!}</td>
                                <td>{!! $tag->subtitle !!}</td>
                                <td>{{$tag->page_image}}</td>
                                <td>{{$tag->meta_description}}</td>
                                <td>{{$tag->layout}}</td>
                                <td>
                                    @if ($tag->reverse_direction)
                                        Reverse
                                    @else
                                        Normal
                                    @endif
                                </td>
                                <td class="ftcenter handle"><a class="btn btn-success"
                                                               href="{{url('admin/tag',[$tag->id,'edit'])}}"><span
                                                class="glyphicon glyphicon-edit"></span> <span>编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            class="btn btn-danger show_confirm_box" tagid="{{$tag->id}}"><span
                                                class="glyphicon glyphicon-trash"></span>
                                        <span>删除</span></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="page">
                    {!! $tags->render() !!}
                </div>

                <!--主体end-->
            </div>
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
            <form class="tag_confirm_form" method="post" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                {{--<input class="input_tagid" type="hidden" name="tagid" value="">--}}
                <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default confirm_close">取消</button></span>
                </div>
            </form>
        </div>
        <!-- 提示框 end-->
    </div>

    <script>
        $(function(){
            // 提示框关闭
            $('.confirm_close').click(function () {
                $('.confirm_box').fadeOut();
            });
            // 提示框出现
            $('.show_confirm_box').on('click', function () {
                var tagid = $(this).attr('tagid');
                var tagformurl = "{{url('/admin/tag')}}/"+tagid;
                $('.tag_confirm_form').attr('action',tagformurl);
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