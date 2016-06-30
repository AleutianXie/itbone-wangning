@extends('layouts.adminlayout')

@section('content')
    <div class="main-right-box">
        <div class="main-right-search-box">
            <form class="col-lg-8" action="{{ url('admin/cate') }}">
                <span class="col-lg-5 form-group">
                <input class="form-control" type="text" name="keywords" placeholder="请输入搜索内容……" id="" value="{{ $keywords }}">
                </span><input type="submit" class="btn btn-default" value="搜索">
            </form>
            <span class="pull-right"><a href="{{url('admin/cate/create')}}" class="mk_dir btn btn-primary">创建分类</a><a
                        class="btn btn-danger show_upload_box">批量删除</a></span>
        </div>
        <div class="cl"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">分类列表</h3>
            </div>
            <div class="panel-body">
                <!--主体-->

                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                            <th class="ftcenter">ID</th>
                            <th>catename</th>
                            <th>describe</th>
                            <th>icon</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th style="min-width: 180px;">Actions</th>
                        </tr>
                        @foreach($cates as $cate)
                            <tr>
                                <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                                <td class="ftcenter">{{$cate->id}}</td>
                                <td>{!! $cate->catename !!}</td>
                                <td>{!! $cate->describe !!}</td>
                                <td>
                                    <a onclick="showImg(this)" href="javascript:void(0)">
                                        @if($cate->icon)
                                            <img style="width: 140px; height: 60px;"
                                                 src="{{ asset('upload/Category/350250'.$cate->icon) }}" alt="">
                                        @else
                                            <img style="width: 140px; height: 60px;"
                                                 src="{{ asset('upload/Post/post_default.png') }}" alt="">
                                        @endif
                                    </a>
                                </td>
                                <td>{{$cate->created_at}}</td>
                                <td>{{$cate->updated_at}}</td>
                                <td class="ftcenter handle"><a class="btn btn-success"
                                                               href="{{url('admin/cate',[$cate->id,'edit'])}}"><span
                                                class="glyphicon glyphicon-edit"></span> <span>编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            class="btn btn-danger show_confirm_box" cateid="{{$cate->id}}"><span
                                                class="glyphicon glyphicon-trash"></span>
                                        <span>删除</span></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="page">
                    {!! $cates->render() !!}
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
            <form class="cate_confirm_form" method="post" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                {{--<input class="input_cateid" type="hidden" name="cateid" value="">--}}
                <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default confirm_close">取消</button></span>
                </div>
            </form>
        </div>
        <!-- 提示框 end-->

        <!-- 预览框 -->
        <div class="show_img_box" style="position: absolute; display: none;">
            <a href="javascript:void(0)" class="thumbnail"
               style="box-shadow: 0 0 15px 5px #c0c0c0; position: relative; width: 500px ;height: 300px;">
                <img src="" alt="" style="position: absolute;">
            </a>
        </div>
        <!-- 预览框 -->
    </div>

    <script>
        $(function(){
            // 提示框关闭
            $('.confirm_close').click(function () {
                $('.confirm_box').fadeOut();
            });
            // 提示框出现
            $('.show_confirm_box').on('click', function () {
                var cateid = $(this).attr('cateid');
                var cateformurl = "{{url('/admin/cate')}}/"+cateid;
                $('.cate_confirm_form').attr('action',cateformurl);
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
