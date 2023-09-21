<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <header>
        <h1>CRUD Actions</h1>
    </header>

    @if (Auth::user())
        <nav>
            <a href="{{ route('create') }}">Create</a>
            <a href="{{ route('read') }}">Read</a>
            <a href="{{ route('update') }}">Update</a>
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('delete') }}">Delete</a>
            @endif
        </nav>
        <h2>Hi, {{ Auth::user()->name }}</h2>
        <br><br>
        <a href="{{ route('logout') }}">Log out</a>
    @elseif (Auth::guest())
        <div class='register_button_box'>
            <h2>For more actions please register or login</h2>
            <div>
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    @endif
    </body>
</html>
