@extends('layouts.adminlayout')
@section('title')
    Admin Tag Edit
@stop
@section('button')
    标签列表
@stop
@section('btn_url')
    {{url('admin/tag')}}
@stop
@section('content')
    <div class="main-right-box">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">编辑标签</h3>
            </div>
            <div class="panel-body">
                @include('admin.partials.errors')
                        <!--主体-->
                <form class="form-horizontal" role="form" method="post" action="{{url('admin/tag',$data['id'])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PATCH">
                    @include('admin.tag._form')
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

@stop
