<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hai, {{ $user_name }}</h1>
    <p>ini forgot password token : <a href="{{ route('cms-reset-password-form', ['token' => $token]) }}">Klik di sini</a></p>
</body>
</html>