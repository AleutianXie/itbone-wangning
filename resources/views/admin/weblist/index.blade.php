@extends('layouts.adminlayout')
@section('title')
    Admin-webeglist
@stop
@section('button')
    添加web项目
@stop
@section('btn_url')
    {{url('admin/weblist/create')}}
@stop
@section('content')
    <div class="main-right-box">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">发布web项目</h3>
            </div>
            <div class="panel-body">
                <!--主体-->

                <div class="table-responsive">
                    <table class="table table-hover admin_list_table table-bordered">
                        <tr>
                            <th class="ftcenter">Id</th>
                            <th>标题</th>
                            <th>描述</th>
                            <th>图片</th>
                            <th>分类</th>
                            <th>链接</th>
                            <th style="min-width: 180px;">操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td class="ftcenter">{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->describe }}</td>
                                <td>{{ $item->imgurl }}</td>
                                <td>{{ $item->classify }}</td>
                                <td>{{ $item->direction }}</td>
                                <td class="ftcenter handle"><a class="btn btn-success"
                                                               href="{{ url('admin/weblist') }}/{{ $item->id }}/edit"><span
                                                class="glyphicon glyphicon-edit"></span> <span>编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            class="btn btn-danger show_confirm_box"  tagid=""><span
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
            // 提示框出现
            $('.show_confirm_box').on('click',function(){
                var tagid = $(this).attr('tagid');
                var tagformurl = "{{url('/admin/tag')}}/"+tagid;
                $('.tag_confirm_form').attr('action',tagformurl);
                $('.confirm_box').fadeIn();
            });
        });
    </script>
@stop