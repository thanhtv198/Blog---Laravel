@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Item</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <br>
                    <div class="container">
                        <h1>Edit Profile</h1>
                        <hr>
                        <div class="row">
                            <!-- left column -->
                            {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'omb_loginForm', 'files' => true]) !!}
                            <div class="col-md-3">
                                <div class="text-center">
                                    @if(!isset($user->avatar))
                                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                                    @else
                                    <img src="{{ url(config('blog.user.upload')) }}/{{ $user->avatar }}"class="avatar img-circle" alt="avatar" width="120px">
                                    @endif
                                    <div class="form-group">
                                        <h6>Upload a different photo...</h6>
                                        {!! Form::file('image', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                    </div>
                                </div>
                            </div>

                            <!-- edit form column -->
                            <div class="col-md-9 personal-info">

                                <h3>Personal info</h3>

                                <div class="col-md-9">
                                    @include('message')
                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => trans('en.form.name')]) !!}
                                    </div>
                                    <span class="help-block"></span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}
                                    </div>
                                    <span class="help-block"></span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {!! Form::date('birthday', $user->birthday, ['class' => 'form-control', 'placeholder' => trans('en.form.birthday')]) !!}
                                    </div>
                                    <span class="help-block"></span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        {!! Form::input('password', 'password', $user->password, ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}
                                    </div>
                                    <span class="help-block"></span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        {!! Form::input('password', 'password_confirmation', $user->password, ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => trans('en.form.repassword')]) !!}
                                    </div>
                                    <span class="help-block"></span>
                                    <span class="help-block"></span>
                                    <br>
                                    {{ Form::submit(trans('en.button.save_change'), ['class' => 'btn btn-lg btn-primary btn-block']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <hr>
                </div>
                <hr>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop

<style>
    #facebook .hidden_elem {
        display: block !important;
    }
</style>
@section('script')
    <script src="{{ asset('source/frontend/theme/assets/frontend/js/jquery-1.9.1.js') }}" type="text/javascript"></script>
@stop



