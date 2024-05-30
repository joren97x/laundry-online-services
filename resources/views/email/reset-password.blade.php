<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
     <p> hello, {{ $formData['user']->name }}</p>
    <h1>you have requested to change password:</h1>

     <h2>please click the link given below to reset password</h2>

     <a href="{{ route ('user.resetPassword',$formData['token'])}}">CLICK HERE</a>

     <p>thanks</p>
</body>
</html>