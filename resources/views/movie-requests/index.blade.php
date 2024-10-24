<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movie requests list:</h1>
    @if (session()->has('success_message'))                     
        {{-- Session::has() --}}
        <p>
            {{ session()->get('success_message') }}
        </p>
    @endif
    <table>
        <thead>
            <th>#</th>
            <th>Full name</th>
            <th>Email</th>
            <th>Movie name</th>
            <th>Movie type</th>
            <th>Movie year</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($movie_requests as $movie_request)
                <tr>
                    <td>{{ $movie_request->id }}</td>
                    <td>{{ $movie_request->full_name }}</td>
                    <td>{{ $movie_request->email }}</td>
                    <td>{{ $movie_request->name }}</td>
                    <td>{{ $movie_request->movieType->name }}</td>
                    <td>{{ $movie_request->year }}</td>
                    {{-- <td><a href="{{ route('movie-requests.edit', $movie_request->id) }}">Edit</a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>