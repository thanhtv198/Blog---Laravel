@include('admin/layouts/head')
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
                    {{ Form::submit(trans('en.button.login'), ['class' => 'btn btn-primary btn-block btn-flat']) }}
                </div>
                <!-- /.col -->
            </div>
            {{ Form::close() }}

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{ url('auth/login/facebook') }}" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="{{ url('auth/login/google') }}" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@include('admin/layouts/head')
</body>
