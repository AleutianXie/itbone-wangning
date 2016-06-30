@extends('layouts.adminlayout')

@section('content')
    <div class="main-right-box">
        <div class="main-right-search-box">
            <form class="col-lg-8" action="{{ url('admin/auth/userlist') }}">
                <span class="col-lg-5 form-group">
                <input class="form-control" type="text" name="keywords" placeholder="请输入搜索内容……" id="" value="{{ $keywords }}">
                </span><input type="submit" class="btn btn-default" value="搜索">
            </form>
            <span class="pull-right"><a href="{{url('admin/auth/adduser')}}" class="mk_dir btn btn-primary">添加管理员</a><a
                        class="btn btn-danger show_upload_box">批量删除</a></span>
        </div>
        <div class="cl"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">管理员列表</h3>
            </div>
            <div class="panel-body">
                <!--主体-->
                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                            <th class="ftcenter">ID</th>
                            <th>name</th>
                            <th>email</th>
                            {{--<th>头像</th>--}}
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th style="min-width: 180px;">操作</th>
                        </tr>
                        @foreach($data as $user)
                            <tr>
                                <th class="ftcenter"><input type="checkbox" name="" id=""></th>
                                <td class="ftcenter">{{ $user->id }}</td>
                                <td style="max-width: 200px;">{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                {{--<td><a onclick="showImg(this)" href="javascript:void(0)">--}}
                                {{--@if($user->imgurl)--}}
                                {{--<img style="width: 140px; height: 60px;"--}}
                                {{--src="{{ asset('upload/Post/700300'.$user->imgurl) }}" alt="">--}}
                                {{--@else--}}
                                {{--<img style="width: 140px; height: 60px;"--}}
                                {{--src="{{ asset('upload/Post/post_default.png') }}" alt="">--}}
                                {{--@endif--}}
                                {{--</a></td>--}}
                                <td class="ftcenter">{{ $user->created_at }}</td>
                                <td class="ftcenter">{{ $user->updated_at }}</td>
                                <td class="ftcenter handle"><a class="btn btn-success"
                                                               href="{{url('admin/post',[$user->id,'edit'])}}"><span
                                                class="glyphicon glyphicon-edit"></span> <span>编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            class="btn btn-danger show_confirm_box" postid="{{$user->id}}"><span
                                                class="glyphicon glyphicon-trash"></span>
                                        <span>删除</span></a></td>
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
    <script>
        /*
         * 显示大图
         */
        //        function showImg(obj) {
        //            var src = $(obj).find('img').attr('src');
        ////            var screen_height = document.body.clientHeight;
        //            var screen_height = document.documentElement.clientHeight;
        //            $('.show_img_box').css({
        //                'top': (screen_height - $('.show_img_box').outerHeight()) / 2 + $(document).scrollTop(),
        //                'left': ($('.main-right-box').outerWidth() - $('.show_img_box').outerWidth()) / 2
        //            });
        //            $('.show_img_box').find('img').attr('src', src);
        //            $('.show_img_box').fadeIn();
        //
        //            $('.show_img_box').find('img').css({
        //                'top': ($('.show_img_box').height() - $('.show_img_box').find('img').height() - 20) / 2,
        //                'left': ($('.show_img_box').width() - $('.show_img_box').find('img').width()) / 2
        //            });
        //        }
    </script>
@stop
