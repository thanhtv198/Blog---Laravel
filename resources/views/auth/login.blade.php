@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="omb_login">
            <h3 class="omb_authTitle">{{ trans('en.auth.login_or') }}<a href="{{ route('register') }}">{{ trans('en.auth.sign_up') }}</a></h3>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'omb_loginForm']) !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}
                    </div>
                    <span class="help-block"></span><br>
                    {{ Form::submit(trans('en.button.login'), ['class' => 'btn btn-lg btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-3">
                    <label class="checkbox">
                        <input type="checkbox" value="remember">
                        {{ trans('en.auth.rememberme') }}
                    </label>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <p class="omb_forgotPwd">
                        <a href="#">{{ trans('en.auth.forgot_password') }}</a>
                    </p>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-6">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">or</span>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                <div class="col-xs-4 col-sm-2">
                    <a href="{{ url('login/facebook') }}" class="btn btn-lg btn-block omb_btn-facebook loginBtn loginBtn--facebook">
                        <i class="fa fa-facebook visible-xs"></i>
                        <span class="hidden-xs">{{ trans('en.auth.login_use_facebook') }}</span>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-2">
                </div>
                <div class="col-xs-6 col-sm-2">
                    <a href="{{ url('login/google') }}" class="btn btn-lg btn-block omb_btn-google loginBtn loginBtn--google">
                        <i class="fa fa-google-plus visible-xs"></i>
                        <span class="hidden-xs">{{ trans('en.auth.login_use_goole+') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
