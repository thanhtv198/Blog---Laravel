@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="omb_login">
            <h3 class="omb_authTitle">
                <a>{{ trans('en.auth.sign_up') }}</a>
            </h3>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'omb_loginForm']) !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('en.form.name')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {!! Form::date('birthday', null, ['class' => 'form-control', 'placeholder' => trans('en.form.birthday')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => trans('en.form.repassword')]) !!}
                    </div>
                    <span class="help-block"></span>
                    <span class="help-block"></span>
                    <br>
                    {{ Form::submit(trans('en.button.sign_up'), ['class' => 'btn btn-lg btn-primary btn-block']) }}
                    {{ Form::close() }}
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
                        <span class="hidden-xs">{{ trans('en.auth.sign_up_facebook') }}</span>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-2">
                </div>
                <div class="col-xs-6 col-sm-2">
                    <a href="{{ url('login/google') }}" class="btn btn-lg btn-block omb_btn-google loginBtn loginBtn--google">
                        <i class="fa fa-google-plus visible-xs"></i>
                        <span class="hidden-xs">{{ trans('en.auth.sign_up_google') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
