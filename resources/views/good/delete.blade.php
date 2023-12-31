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
    <a href="{{ route('index') }}">HOME</a>
    <a href="{{ route('create') }}">Create</a>
    <a href="{{ route('read') }}">Read</a>
    <a href="{{ route('update') }}">Update</a>
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('delete') }}">Delete</a>
    @endif
</nav>

<form action="{{ route('delete.action') }}" method="post">
    @csrf
    <label for="productId">product ID:</label>
    <input type="number" id="productId" name="productId"><br>

    <button type="submit">Delete</button>
</form>

@if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($success))
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endif

</body>
</html>

