<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieRequest;
use App\Models\MovieType;

class MovieRequestController extends Controller
{
    public function index()
    {
        $movie_requests = MovieRequest::with('movieType')
            ->get();

        // $movie_requests = MovieRequest::get();

        // dd($movie_requests);

        return view('movie-requests.index', compact('movie_requests'));
    }


    // new function called create()
    public function create()
    {
        $movie_types = MovieType::get();

        return view('movie-requests.create', compact('movie_types'));
    }
    // return view with the form (new view to be created in /views/movie-requests/create.blade.php)
    // view should have a form with all fields (except id) that are defined in our migartion file
    // create get route for it (/movie-requests/create)
}
