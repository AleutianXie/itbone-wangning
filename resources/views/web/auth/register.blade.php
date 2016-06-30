@extends('layouts.webauth')
@section('content')
    <script>
        var formUrl = "{{ url('auth/register') }}";
    </script>
        <!--<div class="login_body col-lg-7 container">-->
<div class="login_box">
    <h2><img class="logo" src="{{ asset('assets/images/bone_logo.png')}}" alt="">itbone Register</h2>
    <div>
        @foreach($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    <form action="{{ url('auth/register') }}" method="post" class="register_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">用户名</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Account"><span class="error">用户名不能为空</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder=" Email">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password">确认密码</label>
            <input type="password" class="form-control" id="repass" name="repass" placeholder="Password">
        </div>
        <div class="radio">
            <label><input type="radio" name="sex" value="male" checked> 男</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="sex" value="female"> 女</label>
        </div>
        <div class="form-group">
            <label for="birthday">生日</label>
            <input type="birthday" class="form-control" id="birthday" name="birthday" placeholder="Birthday">
        </div>
        <div class="captcha">
            <div class="form-group">
                <label style="display: block;" for="captcha">验证码</label>
                <input type="text" class="form-control" style="width: 50%; display: inline-block;" name="captcha"
                       id="captcha"
                       placeholder="请输入验证码">
                <img class="captcha pull-right" src="{{ url('admin/auth/captcha') }}"
                     onclick='this.src="{{ url('admin/auth/captcha')}}?rand="+Math.random()' alt="">
            </div>
        </div>
        <button type="button" id="submit" class="btn btn-danger btn_resize100" data-toggle="modal"
                data-target=".bs-register-modal-lg">创建用户
        </button>
    </form>
</div>

<!-- Large modal -->
{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-register-modal-lg">Large modal</button>--}}
{{--<div class="modal fade bs-register-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">--}}
{{--<div class="modal-dialog modal-lg">--}}
{{--<div class="modal-content">--}}
{{--123 <br>--}}
{{--123 <br>--}}
{{--123 <br>--}}
{{--123 <br>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<script>
    $(function () {
        /**
         * ajax 提交注册
         */
        $('#submit').on('click', function () {
            checkInput('name','==','','不能为空！');
return false;
            $.ajax({
                'url': formUrl,
                'type': 'post',
                'data': {
                    name: $('#name').val(),
                    password: $('#password').val(),
                    repass: $('#repass').val(),
                    email: $('#email').val(),
                    sex: $('input[name=sex]:checked').val(),
                    birthday: $('#birthday').val(),
                    captcha: $('#captcha').val()
                },
                'dataType': 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                success: function (response) {
                    response = eval(response);
                    if(response.status == 1){
                        console.log(response.data);
                    }
                }

            });


        });
    });

    // 报错方法
    function checkInput(id,symbol,value,report){
        if($('#'+id).val() +symbol+ value){
            $('#'+id).attr('title',$('#'+id).siblings('label').text()+report);
            $('#'+id).attr('data-toggle','tooltip');
            $('#'+id).focus();
            $('#'+id).tooltip();

        }
    }
</script>
@stop

