<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <h4>Hi <strong>{{ $content['name'] }}</strong></h4>
    <p>We have sent you this email in response to your request to reset your password.To reset your password, please follow the link below:</p>
    <a href="{{ $content['url'] }}">Reset Password</a>
    <br>
    <br>
    <p>Please ignore this email if you did not request a password change.</p>
    <br>
    <h4>Thank you</h4>
    <p>NKKGS</p>
</body>
</html>