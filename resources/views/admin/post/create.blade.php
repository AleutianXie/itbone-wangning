@extends('layouts.adminlayout')
@section('title')
    Admin-发布文章
@stop
@section('button')
    文章列表
@stop
@section('btn_url')
    {{url('admin/post')}}
@stop
@section('content')
    <div class="main-right-box">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">发布文章</h3>
            </div>
            <div class="panel-body">
                @include('admin.partials.errors')
                        <!--主体-->
                <form onsubmit="return cksubmit()" class="form-horizontal" role="form" method="post"
                      action="{{url('admin/post')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('admin.post._form')
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">发布文章</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- 新建分类 -->
            <div class="confirm_box">
                <div class="confirm_tit">
                    <span class="confirm_title">添加分类</span><span
                            class="confirm_close glyphicon glyphicon-remove pull-right"></span>
                </div>
                <hr>
                {{--                <form class="form-horizontal" role="form" method="post" action="{{url('admin/cate/storeajax')}}">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="catename" id="catename" placeholder="category"
                                   value="">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <span class="pull-left hint"></span>
                        <span class="pull-right">
                    <button id="addcate" type="button" class="btn btn-danger glyphicon glyphicon-ok-sign">确认</button>
                    <button type="button" class="btn btn-default confirm_close">取消</button></span>
                    </div>
                </div>
                {{--</form>--}}
            </div>
            <!-- 提示框 end-->
        </div>
    </div>

    <script>
        $(function () {
            // 添加分类
            $('#addcate').on('click', function () {
                var catename = $('#catename').val();
                $.ajax({
                    url: "{{url('admin/cate/storeajax')}}",
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: {catename: catename},
                    success: function (data) {
                        var res = eval(data);
                        if (res.status == 2) {
                            $('#catename').focus();
                            $('.hint').addClass('glyphicon glyphicon-info-sign').html('已有此分类请重新输入！');
                        }
                        if (res.status == 1) {
                            $('.hint').html('');
                            $('#category').find('span:last-child').prev('span').after("<span style='margin-left: 5px' class='category btn btn-default' cateid=" + res.data.id + "  onclick='changeBtnColor(this)'>" + res.data.catename + "</span>");
                            $('.confirm_box').fadeOut();
                            $('#catename').val('');
                        }
                    }
                });
            });
            //            $('.ch_img_item_list').animate({left: -($('.ch_img_item').width() + 20) + 'px'});

            // 动画效果 （show，slideDown，fadeIn，blind，bounce，clip，drop，fold，slide，）
            $("#published_at").datepicker("option", "showAnim", "fadeIn");

            //显示上传图片框
            $('.show_up_img_box').on('click', function () {
//                $('.upload_img_box').slideToggle();
                if ($('.upload_img_box').css('display') == 'none') {
                    $('.choose_img_box').hide();
                    $('.upload_img_box').slideDown();
                } else {
                    $('.upload_img_box').slideUp();
                }
            });

            // 显示图片选择框
            $('.show_ch_img_box').on('click', function () {
//                $('.choose_img_box').slideToggle();
                if ($('.choose_img_box').css('display') == 'none') {
                    $('.upload_img_box').hide();
                    $('.choose_img_box').slideDown();
                } else {
                    $('.choose_img_box').slideUp();
                }
            });
            // 设置图片选择区域的box宽度
            var ch_item_list_size = $('.ch_img_item').size() * ($('.ch_img_item').width() + 20);
            $('.ch_img_item_list').css('width', ch_item_list_size);
            $('.choose_img_box').css('width', $('.main-right-box').offsetWidth);
            // 设置滚动条的长度
//            $('.ch_img_box_bottom').css('width', $('.choose_img_box').width() / $('.ch_img_item').size());
            //设置滚动条滚动动作
//            $('.ch_img_box_bottom').mousedown(function (ee) {
//                var btwidth = ee.pageX - $('.main-left').width();
//                $('.ch_img_box_bottom').mousemove(function (e) {
//                    var movelength = e.pageX - $('.main-left').width() - btwidth;
//                    $(this).css({
//                        'left': movelength
//                    });
//                    if ((movelength) <= 0) {
//                        $(this).css('left', 0);
//                    }
//                    if ((movelength) >= $('.choose_img_box').width()) {
//                        $(this).css('left', $('.choose_img_box').width());
//                    }
//
//                    $('.ch_img_item_list').animate({'left': (movelength / $('.main-right-box').offsetWidth) * $('.ch_img_item_list').offsetWidth});
//                });
//            });


            //滚动鼠标图片列表跟着移动
//            $(document).scroll(function(){
//            $('.choose_img_box').scroll(function (e) {

//            $('.choose_img_box').on('mousewheel DOMMouseScroll', function (e) {
//                e.preventDefault();
//                var t = new Date().getTime();
//                //防止鼠标滚动太快
//                if (t - Const.scrollTime < 1400) {
//                    return !1;
//                }
//                Const.scrollTime = t;
//
//                //鼠标滚轮的滚动方向 >0 up;<0 down
//                var _delta = parseInt(e.originalEvent.wheelDelta || -e.originalEvent.detail);
//                if (_delta > 0) {
//                    $('.ch_img_item_list').animate({'left': -$('ch_img_item').offsetWidth});
//                } else {
//                    $('.ch_img_item_list').animate({'left': $('ch_img_item').offsetWidth});
//                }
//                console.log(_delta);
//            });
//            var scrollFunc = function (e) {
//                e = e || window.event;
//                if (e.wheelDelta) {  //判断浏览器IE，谷歌滑轮事件
//                    if (e.wheelDelta > 0) { //当滑轮向上滚动时
//                        $('.ch_img_item_list').animate({left: +($('.ch_img_item').width() + 20) + 'px'});
//                    }
//                    if (e.wheelDelta < 0) { //当滑轮向下滚动时
//                        $('.ch_img_item_list').animate({left: -($('.ch_img_item').width() + 20) + 'px'});
//                    }
//                } else if (e.detail) {  //Firefox滑轮事件
//                    if (e.detail > 0) { //当滑轮向上滚动时
//                        $('.ch_img_item_list').animate({left: +($('.ch_img_item').width() + 20) + 'px'});
//                    }
//                    if (e.detail < 0) { //当滑轮向下滚动时
//                        $('.ch_img_item_list').animate({left: -($('.ch_img_item').width() + 20) + 'px'});
//                    }
//                }
//            }
//            //给页面绑定滑轮滚动事件
//            if (document.addEventListener) {//firefox
//                document.addEventListener('DOMMouseScroll', scrollFunc, false);
//            }
//            //滚动滑轮触发scrollFunc方法  //ie 谷歌
//            window.onmousewheel = document.onmousewheel = scrollFunc;

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
                    thumbnailWidth = 700 * ratio,
                    thumbnailHeight = 300 * ratio,

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
                //文件上传请求的参数表
                formData: {
                    '_token': "{{ csrf_token() }}",
                    'folder': "Post",
                    'post_type': "post_create",
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
            uploader.on('uploadSuccess', function (file, response) {
                $('#' + file.id).addClass('upload-state-done');
                // 文件上传成功接收的数据
                $('#imgurl').val(response._raw);
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


        });

        /**
         * 选择图片并设置文本框url
         */
        function setImgUrl(url) {
            $('#imgurl').val(url);
        }


    </script>
@stop
