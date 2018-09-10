<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
    <h3>Thank you for registerd my website </h3>
    <h3>Your email use to login is {{ $user['email'] }}</h3>
    <div class="message">
        Your Registration was successful {{ $user['name']}}. Please login below
        <br/>
        <a href="{{ route('login') }}">Log in</a></div>
<br/>
<br/>

</body>
 
</html>