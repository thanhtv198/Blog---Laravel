<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('en.mail.welcome_title') }}</title>
</head>
 
<body>
    <h3>{{ trans('en.mail.welcome_thank') }}</h3>
    <h3>{{ trans('en.mail.welcome_your_email') }} {{ $user['email'] }}</h3>
    <div class="message">
        {{ trans('en.mail.welcome_register_success') }} {{ $user['name']}}.
        {{ trans('en.mail.welcome_please_login') }}
        <br/>
        <a href="{{ route('login') }}">{{ trans('en.mail.welcome_login') }}</a></div>
<br/>
<br/>

</body>
 
</html>