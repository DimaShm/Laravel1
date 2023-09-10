<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>CRUD</title>
</head>
<body>
<header>
    <h1>CRUD Actions</h1>
</header>
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

</body>

</html>

