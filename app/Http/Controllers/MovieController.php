<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieType;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index($year = null, $min_rating = null)
    {
        // SELECT *
        // FROM `movies`
        // ORDER BY `name` ASC
        // LIMIT 20

        if ($year && !preg_match('#^\d{4}$#', $year)) {
            // custom treatment of invalid year format
        }

        $query_builder = Movie::orderBy('name', 'asc')
            ->where('name', '!=', '')
            ->where('votes_nr', '>=', 10000)
            ->limit(20);

        if ($year) {
            $query_builder->where('year', $year);
        }

        if ($min_rating) {
            $query_builder->where('rating', '>=', $min_rating);
        }

        $movies = $query_builder->get();

        return view('movie.index', compact('movies'));
    }

    public function games()
    {
        $game_type = MovieType::where('name', 'game')
            ->first();

        dd( $game_type->movies->pluck('name') );
    }

    public function romance()
    {
        $genre = Genre::where('name', 'romance')->first();

        $romance_movies =
            $genre->movies()
                ->where('year', 2010)
                ->limit(20)
                ->orderBy('name', 'asc')
                ->get();

        dd($romance_movies);
    }

    /**
     * displays an edit form for a movie
     */
    public function edit()
    {
        $movie_id = 111161;

        $movie = Movie::findOrFail($movie_id);

        // display the form
        return view('movie.edit', compact('movie'));
    }

    public function save()
    {
        // handle the form's submission

        $movie_id = 111161;

        $movie = Movie::findOrFail($movie_id);

        $movie->name = $_POST['name'] ?? $movie->name;
        $movie->year = $_POST['year'] ?? $movie->year;

        $movie->genres()->sync([37, 43]);

        $movie->save();

        return redirect('/movies/edit');
    }
}
