@extends('layouts.adminlayout')
@section('title')
    Admin-weblist-edit
@stop
@section('button')
    WEB项目列表
@stop
@section('btn_url')
    {{url('admin/weblist')}}
@stop
@section('content')
    <div class="main-right-box">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改web项目&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-primary">《{{ $data->title }}》</span></h3>
            </div>
            <div class="panel-body">
                @include('admin.partials.errors')
                        <!--主体-->
                    <form class="form-horizontal" role="form" method="post" action="{{url('admin/weblist',$data->id)}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PATCH">
                        @include('admin.weblist._form')
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">创建web项目</button>
                        </div>
                    </div>
                </form>
                <!--主体end-->
            </div>
        </div>
    </div>

@stop
