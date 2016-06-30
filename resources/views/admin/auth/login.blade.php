@extends('layouts.adminauth')
@section('title')
    Admin-Login
    @stop
    @section('content')
            <!--<div class="login_body col-lg-7 container">-->
    <div class="login_box">
        <h2><img class="logo" src="{{ asset('assets/images/bone_logo.png')}}" alt="">Admin Login</h2>
        @include('admin.partials.errors')
        <form action="{{ url('admin/auth/login') }}" class="login_form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Account/Email</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Account or Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-danger btn_resize100">登 录</button>
        </form>
        <div class="login_box_bottom">
            <p><a class="forgot_pwd" href="">忘记密码？</a></p>
        </div>
    </div>
@stop