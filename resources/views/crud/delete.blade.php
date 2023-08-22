<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Delete Page</title>
</head>
<body>
<header>
    <h1>CRUD Actions - Delete</h1>
</header>

<nav>
    <a href="{{ route('home') }}">HOME</a>
    <a href="{{ route('create') }}">Create</a>
    <a href="{{ route('read') }}">Read</a>
    <a href="{{ route('update') }}">Update</a>
    <a href="{{ route('delete') }}">Delete</a>
</nav>

</body>
</html>
