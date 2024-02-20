<form action="/movies/edit" method="post">

    @csrf

    <label for="">Name</label><br>
    <input type="text" name="name" value="{{ $movie->name }}"><br>
    <br>

    <label for="">Year</label><br>
    <input type="text" name="year" value="{{ $movie->year }}"><br>
    <br>

    <button>Submit</button>

    <p>
        Genres: {{ $movie->genres->pluck('name')->join(', ') }}
    </p>

</form>