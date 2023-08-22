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
        <a href="{{ route('delete') }}">Delete</a>
    </nav>
    <div class='register_button_box'>
        <h2>For more actions please register</h2>
        <a href="{{ route('register') }}">
            <button>
                Register
            </button>
        </a>
   </div>
</body>

</html>
