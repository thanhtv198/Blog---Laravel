@include('admin/layouts/head')
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ asset('source/admin/index2.html') }}"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            {!! Form::open(['route' => 'register', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('en.form.name')]) !!}
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('en.form.email')]) !!}
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('en.form.address')]) !!}
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::date('birthday', null, ['class' => 'form-control', 'placeholder' => trans('en.form.birthday')]) !!}
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => trans('en.form.password')]) !!}
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('repassword', null, ['class' => 'form-control', 'placeholder' => trans('en.form.repassword')]) !!}
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-8">
                    <div>
                        <label>
                            <p> Click button to Register</p>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ url('admin/login/facebook') }}" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i> Sign up using Facebook
                </a>
                <a href="{{ url('admin/login/google') }}" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign up using Google+
                </a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
@include('admin/layouts/foot')

</body>

