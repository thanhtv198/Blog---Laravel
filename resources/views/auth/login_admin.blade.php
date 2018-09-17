@include('admin/layouts/head')
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ trans('en.auth.sign_in_to_start_session') }}</p>
            {!! Form::open(['route' => 'admin.login', 'method' => 'post']) !!}
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
                            {{ trans('en.auth.rememberme') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    {{ Form::submit(trans('en.button.login'), ['class' => 'btn btn-primary btn-block btn-flat']) }}
                </div>
                <!-- /.col -->
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@include('admin/layouts/head')
</body>
