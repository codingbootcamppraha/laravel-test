<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Submit a movie request:</h1>
    <form action="">
        Your full name: <br>
        <input type="text" name="full_name"> <br>
        Your email: <br>
        <input type="email" name="email"> <br>
        Movie name: <br>
        <input type="text" name="name"> <br>
        Movie release year: <br>
        <input type="number" name="year"> <br>
        Movie type: <br>
        <select name="movie_type_id">
            @foreach ($movie_types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <button type="submit">Submit my request</button>
    </form>
</body>
</html>