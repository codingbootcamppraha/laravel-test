<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- Check what text you should display depending on if movie request is edited or being created --}}
    @if ($movie_request->id)
        <h1>Edit movie request #{{$movie_request->id}}:</h1>
    @else
        <h1>Submit a movie request:</h1>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- Check what url you should use depending on if movie request is being updated or created --}}
    @if ($movie_request->id)
        <form action="{{ route('movie-requests.store', $movie_request->id) }}" method="post">
    @else
        <form action="{{ route('movie-requests.store') }}" method="post">
    @endif
        {{-- Use CSRF token to submit post data safely --}}
        @csrf
        Your full name: <br>
        {{-- For each field use a value that you can get with old(), it will allow you to flash previously made request values  --}}
        <input type="text" name="full_name" value="{{ old('full_name', $movie_request->full_name) }}"> <br>
        Your email: <br>
        <input type="email" name="email" value="{{ old('email', $movie_request->email) }}"> <br>
        Movie name: <br>
        <input type="text" name="name" value="{{ old('name', $movie_request->name) }}"> <br>
        Movie release year: <br>
        <input type="number" name="year" value="{{ old('year', $movie_request->year) }}"> <br>
        Movie type: <br>
        <select name="movie_type_id">
            @foreach ($movie_types as $type)
                <option value="{{ $type->id }}" {{ old('movie_type_id', $movie_request->movie_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
            <option value="100">100</option>
        </select>
        <br>
        <br>
        <button type="submit">Submit my request</button>
    </form>
</body>
</html>