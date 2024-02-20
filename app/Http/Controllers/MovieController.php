<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieType;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // SELECT *
        // FROM `movies`
        // ORDER BY `name` ASC
        // LIMIT 20

        $movies = Movie::orderBy('name', 'asc')
            ->where('name', '!=', '')
            ->where('votes_nr', '>=', 10000)
            ->limit(20)
            ->get();

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
}
