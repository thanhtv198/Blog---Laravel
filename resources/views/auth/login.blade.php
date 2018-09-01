{{--@extends('admin/layouts/head')--}}
{{--<body class="login">--}}
{{--<!-- BEGIN LOGO -->--}}
{{--<div class="logo">--}}
{{--<a>--}}
{{--<img src="{{ asset('source/admin/assets/admin/layout4/img/logo-big.png') }}" alt=""/>--}}
{{--</a>--}}
{{--</div>--}}
{{--<!-- END LOGO -->--}}
{{--<!-- BEGIN SIDEBAR TOGGLER BUTTON -->--}}
{{--<div class="menu-toggler sidebar-toggler">--}}
{{--</div>--}}
{{--<!-- END SIDEBAR TOGGLER BUTTON -->--}}
{{--<!-- BEGIN LOGIN -->--}}
{{--<div class="content">--}}
{{--<!-- BEGIN LOGIN FORM -->--}}
{{--{!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'form-login']) !!}--}}
{{--<h3 class="form-title">{{ trans('en.title_form.login') }}</h3>--}}
{{--<div class="alert alert-danger display-hide">--}}
{{--<button class="close" data-close="alert"></button>--}}
{{--<span>Enter any username and password.</span>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label class="control-label visible-ie8 visible-ie9">{{ trans('en.form.email') }}</label>--}}
{{--<div class="input-icon">--}}
{{--<i class="fa fa-user"></i>--}}
{{--{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label class="control-label visible-ie8 visible-ie9">{{ trans('en.form.password') }}</label>--}}
{{--<div class="input-icon">--}}
{{--<i class="fa fa-lock"></i>--}}
{{--{!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-actions">--}}
{{--<label class="checkbox">--}}
{{--{!! Form::checkbox('remember', old('remember') ? 'checked' : '' , ['id' => 'remember']) !!}--}}
{{--Remember me </label>--}}
{{--{{ Form::submit(trans('en.button.login'), ['class' => 'btn green-haze pull-right']) }}--}}
{{--</div>--}}
{{--<div class="login-options">--}}
{{--<h4>Or login with</h4>--}}
{{--<ul class="social-icons">--}}
{{--<li>--}}
{{--<a class="facebook" data-original-title="facebook" href="javascript:;">--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--{!! Form::close() !!}--}}
{{--</div>--}}
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('source/admin/dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('source/admin/plugins/iCheck/square/blue.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('remember', old('remember') ? 'checked' : '' , ['id' => 'remember']) !!}
                            Remember me </label>

                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
                    {{ Form::submit(trans('en.button.login'), ['class' => 'btn btn-primary btn-block btn-flat']) }}
                </div>
                <!-- /.col -->
            </div>
            {{ Form::close() }}

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('source/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('source/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('source/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        })
    })
</script>
</body>
</html>
