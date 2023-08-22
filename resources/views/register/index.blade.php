<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Registration</title>
</head>
<body>
<header>
    <h1>Registration</h1>
</header>
<br>
<span>Are you registered?</span>
<a href="{{ route('login') }}">
    <button>
        Login
    </button>
</a>

</body>
