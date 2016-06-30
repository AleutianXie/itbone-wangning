@extends('layouts.adminlayout')
@section('content')
        <!--主体-->
<div class="main-right-box">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">一键直达</h3>
        </div>
        <div class="panel-body">
            <div class="row direct_access">
                <div class="col-lg-2">
                    <a href="{{ url('admin/post/create') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md04.gif')}}"
                             class="img-circle">
                        <h4>发布文章</h4></a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ url('admin/post') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md01.jpg')}}"
                             class="img-circle">
                        <h4>文章列表</h4></a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ url('admin/upload') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md02.gif')}}"
                             class="img-circle">
                        <h4>上传管理</h4></a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ url('admin/cate') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md03.jpg')}}"
                             class="img-circle">
                        <h4>分类管理</h4></a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ url('admin/tag') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md05.jpg')}}"
                             class="img-circle">
                        <h4>标签管理</h4></a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ url('admin/auth/userlist') }}">
                        <img width="80" height="80" alt="Generic placeholder image"
                             src="{{url('assets/images/md06.gif')}}"
                             class="img-circle">
                        <h4>用户管理</h4></a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">统计信息</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-border-none count-table">
                <tr>
                    <th></th>
                    <th>文章总数</th>
                    <th>文章分类</th>
                    <th>访问量</th>
                    <th>访客量</th>
                </tr>
                <tr>
                    <td class="count-table-left">累计</td>
                    <td class="count-table-left-top text-danger">{{ $statistics['post_num_total'] }}</td>
                    <td class="count-table-left-top text-danger">{{ $statistics['cate_num_total'] }}</td>
                    <td class="count-table-left-top text-danger">{{ $statistics['pv_total'] }}</td>
                    <td class="count-table-left-top text-danger">{{ $statistics['uv_total'] }}</td>
                </tr>
                <tr>
                    <td class="count-table-left">今天</td>
                    <td class="count-table-left-mid text-primary">{{ $statistics['post_num_t'] }}</td>
                    <td class="count-table-left-mid text-primary">{{ $statistics['cate_num_t'] }}</td>
                    <td class="count-table-left-mid text-primary">{{ $statistics['pv_t'] }}</td>
                    <td class="count-table-left-mid text-primary">{{ $statistics['uv_t'] }}</td>
                </tr>
                <tr>
                    <td class="count-table-left">昨天</td>
                    <td class="text-success">{{ $statistics['post_num_y'] }}</td>
                    <td class="text-success">{{ $statistics['cate_num_y'] }}</td>
                    <td class="text-success">{{ $statistics['pv_y'] }}</td>
                    <td class="text-success">{{ $statistics['uv_y'] }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="main-right-box">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">趋势图</h3>
        </div>
        <div class="panel-body">
            <!--主体-->
            <div id="container"></div>
            <!--主体end-->
        </div>
    </div>
</div>
<!--主体end-->
@stop
