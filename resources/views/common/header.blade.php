<header>
    <h1>My movie website</h1>

    <nav>
        @if (!empty($current) && $current === 'home')
            <strong>Home</strong>
        @else
            <a href="{{ route('homepage') }}">Home</a>
        @endif

        @if (!empty($current) && $current === 'movies')
            <strong>List of movies</strong>
        @else
            <a href="{{ route('movies.index') }}">List of movies</a>
        @endif

        <a href="{{ action('MovieController@games') }}">List of games</a>
    </nav>
</header>