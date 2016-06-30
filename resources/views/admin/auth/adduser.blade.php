@extends('layouts.adminlayout')

@section('button')
    用户列表
@stop
@section('btn_url')
    {{url('admin/auth/userlist')}}
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
                <form action="{{ url('admin/auth/adduser') }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Account">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repass" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="repass" name="repass" placeholder="repass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repass" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8 radio" style="margin-left:20px;">
                            <input type="radio" name="sex" value="male" checked> 男&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="sex" value="female"> 女
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="captcha" class="col-sm-2 control-label">验证码</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 50%; display: inline-block;"
                                   id="captcha" name="captcha" placeholder="请输入验证码">
                            <img class="captcha_img" src="{{ url('admin/auth/captcha') }}" onclick='this.src="{{ url('admin/auth/captcha')}}?rand="+Math.random()' alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-danger btn_resize100 col-sm-4">创建用户</button>
                        </div>
                    </div>
                </form>
                <!--主体end-->
            </div>
        </div>
    </div>
@stop
