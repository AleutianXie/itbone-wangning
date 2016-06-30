@extends('layouts.adminlayout')
@section('title')
    Admin cate Edit
@stop
@section('button')
    分类
@stop
@section('btn_url')
    {{url('admin/cate')}}
@stop
@section('content')
    <div class="main-right-box">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">编辑分类</h3>
            </div>
            <div class="panel-body">
                @include('admin.partials.errors')
                        <!--主体-->
                <form class="form-horizontal" role="form" method="post" action="{{url('admin/cate',$data['id'])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PATCH">
                    @include('admin.category._form')
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">保存修改</button>
                        </div>
                    </div>
                </form>
                <!--主体end-->
            </div>
        </div>

    </div>
    <script>
        $(function(){
            //显示上传图片框
            $('.show_up_img_box').on('click', function () {
                if ($('.upload_img_box').css('display') == 'none') {
                    $('.choose_img_box').hide();
                    $('.upload_img_box').slideDown();
                } else {
                    $('.upload_img_box').slideUp();
                }
            });
        });
        /**
         * 图片上传
         */
        jQuery(function () {
            var $ = jQuery,
                    $list = $('#fileList'),
            // 优化retina, 在retina下这个值是2
                    ratio = window.devicePixelRatio || 1,

            // 缩略图大小
                    thumbnailWidth = 350 * ratio,
                    thumbnailHeight = 250 * ratio,

            // Web Uploader实例
                    uploader;

            // 初始化Web Uploader
            uploader = WebUploader.create({

                // 自动上传。
                auto: true,

                // swf文件路径
                swf: "{{ asset('assets/webuploader-0.1.5/Uploader.swf') }}",
                // 文件接收服务端。
                server: "{{ url('admin/upload/store') }}",

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',

                // 只允许选择文件，可选。
                accept: {
                    title: 'file',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                },
                // 文件上传请求的参数表
                formData: {
                    '_token': "{{ csrf_token() }}",
                    'folder': "Category",
                    'post_type': "cate_create",
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
                $list.append($li);
                // 创建缩略图
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
            uploader.on('uploadSuccess', function (file, data) {
                $('#' + file.id).addClass('upload-state-done');
                // 文件上传成功接收的数据
                $('#icon').val(data._raw);
            });
            // 文件上传失败，现实上传出错。
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


        });
    </script>
@stop
