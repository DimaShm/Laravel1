<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Create Page</title>
</head>
<body>
<header>
    <h1>CRUD Actions - Create</h1>
</header>
<nav>
    <a href="{{ route('home') }}">HOME</a>
    <a href="{{ route('create') }}">Create</a>
    <a href="{{ route('read') }}">Read</a>
    <a href="{{ route('update') }}">Update</a>
    <a href="{{ route('delete') }}">Delete</a>
</nav>

<form action="{{ route('create.action') }}" method="post">
    @csrf
    @method('POST')

    <label for="productId">product ID:</label>
    <input type="number" id="productId" name="productId" required><br>

    <label for="categoryId">category ID:</label>
    <input type="number" id="categoryId" name="categoryId" required><br>

    <label for="productName">product name:</label>
    <input type="text" id="productName" name="productName" required><br>

    <label for="description">description:</label>
    <input type="text" id="description" name="description" required><br>

    <label for="price">price:</label>
    <input type="number" id="price" name="price" required><br>

    <label for="oldPrice">old price:</label>
    <input type="number" id="oldPrice" name="oldPrice" required><br>

    <div>
        <label for="stock" class="radio">in stock:</label>
        <input class="radio" type="radio" id="stock" name="stock" checked value="1"><br>
    </div>

    <div>
        <label for="notStock" class="radio">out stock:</label>
        <input class="radio" type="radio" id="notStock" name="stock" value="0"><br>
    </div>
    <br>

    <br>

    <button type="submit">Create</button>
</form>

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
