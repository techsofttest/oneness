<!DOCTYPE html>
<html>
<head>
    <title>Account Activated</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Your course account has been <strong>activated</strong>.</p>
    <p>You can now log in using the details below:</p>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <p>Login URL: <a href="{{ url('/login') }}">{{ url('/login') }}</a></p>

      <p>Thank you for registering!</p>

    <br>
    <p>Thank you!</p>
</body>
</html>
