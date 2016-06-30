@extends('layouts.adminlayout')
@section('content')
    <div class="main-right-box">
        <div class="main-right-search-box">
            <form class="col-lg-8" action="">
                <span class="col-lg-5 form-group">
                <input class="form-control" type="text" name="" id="">
                </span><input type="submit" class="btn btn-default" value="搜索">
            </form>
            <span class="pull-right"><a class="mk_dir btn btn-success">新建文件夹</a><a
                        class="btn btn-primary show_upload_box">上传图片</a></span>
        </div>
        <div class="cl"></div>
        <div style="text-align: left">
            @include('admin.partials.errors')
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">图片列表</h3>
            </div>
            <div class="panel-body">
                <!--主体-->

                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            {{--<th class="ftcenter">Id</th>--}}
                            <th>图片名</th>
                            <th>类型</th>
                            <th>预览</th>
                            <th>大小</th>
                            <th>时间</th>
                            <th style="min-width: 180px;">操作</th>
                        </tr>
                        @foreach($files as $file)
                            <tr>
                                <td>
                                    @if($file->type == 'folder')
                                        <a href="{{ url('admin/upload/folder') }}/{{ $file->title }}"><span
                                                    class="text-info glyphicon glyphicon-folder-open"></span> {{ $file->title }}
                                        </a>
                                    @else
                                        <a onclick="show_img_box(this)" alt="{{ url(asset($file->imgurl)) }}"><span
                                                    class="text-info glyphicon glyphicon-picture"></span> {{ $file->title }}
                                        </a>
                                    @endif
                                </td>
                                <td class="ftcenter">{{ $file->type }}</td>
                                <td class="ftcenter"> @if($file->is_dir == 'n') <img style="max-width: 80px"
                                            src="{{ url(asset($file->imgurl)) }}" alt=""> @endif </td>
                                <td class="ftcenter"> @if($file->is_dir == 'n') {{ round($file->size/1024,2) }}
                                    KB @endif </td>
                                <td class="ftcenter">{{ $file->created_at }}</td>
                                <td class="ftcenter handle">
                                    <a class="btn btn-success" onclick="show_img_box(this)"
                                       alt="{{ url(asset($file->imgurl)) }}"><span
                                                class="glyphicon glyphicon-eye-open"></span>
                                        <span>预览</span></a>
                                    <a class="btn btn-danger show_confirm_box" onclick="setid('{{ $file->id }}','{{ $file->title }}')"><span
                                                class="glyphicon glyphicon-trash"></span>
                                        <span>删除</span></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="page">
                    {!! $files->render() !!}
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
            <form class="" method="post" action="{{ url('admin/upload/delete') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                <input type="hidden" name="folder" value="{{ $folder }}">
                <input class="uploadid" type="hidden" name="id" value="">
                <input class="uploadtitle" type="hidden" name="title" value="">
                <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default confirm_close">取消</button></span>
                </div>
            </form>
        </div>
        <!-- 提示框 end-->

        <!-- 新建文件夹提示框 -->
        <div class="dir_box">
            <div class="dir_tit">
                <span class="dir_title">新建文件夹</span><span
                        class="dir_close glyphicon glyphicon-remove pull-right"></span>
            </div>
            <form class="" method="post" action="{{ url('admin/upload/mkdir') }}">
                <hr>
                <div class="dir_body form-group">
                    <input type="text" class="form-control" name="title" id="dir_title">
                </div>
                <hr>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="current_dir" value="">
                <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default dir_close">取消</button></span>
                </div>
            </form>
        </div>
        <!-- 提示框 end-->

        <!-- 上传框 -->
        <div class="upload_box">
            <div class="upload_tit">
                <span class="upload_title">上传图片 >> <span class="text-info">{{$folder}}</span></span><span
                        class="upload_close glyphicon glyphicon-remove pull-right"></span>
            </div>
            <hr>
            <form method="post" action="{{ url('admin/upload/store') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="folder" value="{{$folder}}">
                <div class="upload_body form-group">
                    {{--<label for="InputFile">File input</label>--}}
                    <input name="file" type="file" id="InputFile">
                    <!--用来存放item-->
                    {{--<div id="fileList" class="uploader-list"></div>--}}
                    {{--<div id="filePicker">选择图片</div>--}}

                    {{--<p class="help-block">请选择要上传的文件</p>--}}
                </div>

                <hr>
                <div><span class="pull-right">
                    <input type="submit" value="确认" class="btn btn-danger glyphicon glyphicon-ok-sign">
                    <button type="button" class="btn btn-default upload_close">取消</button></span>
                </div>
            </form>
        </div>
        <!-- 上传框 end-->
        <!-- 预览框-->
        {{--<div class="show_img_box col-lg-5" style="position: absolute; display: none;">--}}
        <div class="show_img_box" style="position: absolute; display: none;">
            <a href="#" class="thumbnail"
               style="box-shadow: 0 0 15px 5px #c0c0c0; position: relative; width: 500px ;height: 300px;">
                <img src="" alt="" style="position: absolute;">
            </a>
        </div>
        {{--上传状态提示框--}}
        <div class="status_box">
            <div class="status_title">
                <span class="status_title glyphicon glyphicon-info-sign"> </span>
            </div>
            <hr>
            <div>{{ $uploadStatus }}</div>
            <hr>
            <div class="status_bottom">
                <button type="button" class="btn btn-danger status_close pull-right">确认</button></span>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // 上传状态提示框
            var uploadStatus = "{{ $uploadStatus }}";
            if( uploadStatus != ''){
                $('.status_box').fadeIn();
                var screen_height = document.documentElement.clientHeight;
                $('.status_box').css({
                    'top': (screen_height - $('.status_box').outerHeight()) / 2 + $(document).scrollTop(),
                    'left': ($('.main-right-box').outerWidth() - $('.status_box').outerWidth()) / 2
                });
            }
            // 提示框出现
            $('.show_confirm_box').on('click', function () {
                var tagid = $(this).attr('tagid');
                var tagformurl = "{{url('/admin/tag')}}/" + tagid;
                $('.tag_confirm_form').attr('action', tagformurl);
                $('.confirm_box').fadeIn();
            });

            // 创建文件夹提示框出现
            $('.mk_dir').on('click', function () {
                $('.dir_box').fadeIn();
            });
            $('.dir_close').on('click', function () {
                $('.dir_box').fadeOut();
            });


            /**
             * 图片上传
             */
            $list = $('#fileList'),
                // 优化retina, 在retina下这个值是2
                    ratio = window.devicePixelRatio || 1,

                // 缩略图大小
                    thumbnailWidth = 100 * ratio,
                    thumbnailHeight = 100 * ratio,

                // Web Uploader实例
                    uploader;
            var token = "{{ csrf_token() }}";
            // 初始化Web Uploader
            var uploader = WebUploader.create({
                // 选完文件后，是否自动上传。
                auto: true,
                //{Object} [可选] [默认值：{}] 文件上传请求的参数表，每次发送都会发送此对象中的参数。
                formData: {_token: token},
                // swf文件路径
                swf: "{{ asset('assets/webuploader-0.1.5/Uploader.swf') }}",
                //如果支持则使用 html5, 否则则使用 flash.
                runtimeOrder: "html5,flash",
                //{Object} [可选] [默认值：'file'] 设置文件上传域的name。
                fileVal: "file",
                // 文件接收服务端。
                server: "{{ url('admin/upload/store') }}",
                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                }
            });
            // 当有文件添加进来的时候
            uploader.on('fileQueued', function (file) {
                var $li = $(
                                '<div id="' + file.id + '" class="file-item thumbnail">' +
                                '<img>' +
                                '<div class="info">' + file.name + '</div>' +
                                '</div>'
                        ),
                        $img = $li.find('img');
                // $list为容器jQuery实例
                $list.append($li);
                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function (error, src) {
                    if (error) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $img.attr('src', src);
                }, thumbnailWidth, thumbnailHeight);
            });

            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function (file, percentage) {
                var $li = $('#' + file.id),
                        $percent = $li.find('.progress span');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<p class="progress"><span></span></p>')
                            .appendTo($li)
                            .find('span');
                }
                $percent.css('width', percentage * 100 + '%');
            });
            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function (file) {
                $('#' + file.id).addClass('upload-state-done');
            });
            // 文件上传失败，显示上传出错。
            uploader.on('uploadError', function (file) {
                var $li = $('#' + file.id),
                        $error = $li.find('div.error');
                // 避免重复创建
                if (!$error.length) {
                    $error = $('<div class="error"></div>').appendTo($li);
                }
                $error.text('上传失败');
            });
            // 完成上传完了，成功或者失败，先删除进度条。
            uploader.on('uploadComplete', function (file) {
                $('#' + file.id).find('.progress').remove();
            });

            // 点击图片预览框关闭图片预览
            $('.show_img_box').on('click', function () {
                $(this).fadeOut();
            });

            // 提示框关闭
            $('.confirm_close').click(function () {
                $('.confirm_box').fadeOut();
            });

            // 上传状态提示框关闭
            $('.status_close').click(function () {
                $('.status_box').fadeOut();
            });

            // 提示框出现(需修改)
            $('.show_confirm_box').on('click', function () {
                var postid = $(this).attr('postid');
                var tagformurl = "{{url('/admin/post')}}/"+postid;
                $('.tag_confirm_form').attr('action',tagformurl);
                $('.confirm_box').fadeIn();
                var screen_height = document.documentElement.clientHeight;
                $('.confirm_box').css({
                    'top': (screen_height - $('.confirm_box').outerHeight()) / 2 + $(document).scrollTop(),
                    'left': ($('.main-right-box').outerWidth() - $('.confirm_box').outerWidth()) / 2
                });
            });

        });

        // 预览图片
        function show_img_box(obj) {
            var src = $(obj).find('img').attr('src');
            var screen_height = document.documentElement.clientHeight;
            $('.show_img_box').css({
                'top': (screen_height - $('.show_img_box').outerHeight()) / 2+$(document).scrollTop(),
                'left': ($('.main-right-box').outerWidth() - $('.show_img_box').outerWidth()) / 2
            });
            $('.show_img_box').find('img').attr('src', $(obj).attr('alt'));
            $('.show_img_box').fadeIn();

            $('.show_img_box').find('img').css({
                'top': ($('.show_img_box').height() - $('.show_img_box').find('img').height() - 20) / 2,
                'left': ($('.show_img_box').width() - $('.show_img_box').find('img').width()) / 2
            });
        }

        //setid
        function setid(id,title){
            $('.uploadid').val(id);
            $('.uploadtitle').val(title);

        }


    </script>
@stop
