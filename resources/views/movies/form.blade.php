@include('html-start')

    <br />
@if ($movie->id)
    <form action="{{ route('movies.update', $movie->id) }}" method="post">
        @method('put')
@else
    <form action="{{ route('movies.store') }}" method="post">
@endif
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $movie->name) }}" />

        <br />

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="{{ old('year', $movie->year) }}" />

        <br />

        <button>Submit</button>
    </form>
    <br />

@if ($movie->id)
    <form action="{{ route('movies.delete', $movie->id) }}" method="post">
        @csrf
        @method('delete')
        <button>Delete</button>
    </form>
@endif
@include('html-end')
