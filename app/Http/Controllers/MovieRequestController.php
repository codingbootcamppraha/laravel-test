<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieRequest;
use App\Models\MovieType;
use Illuminate\Validation\Rule;

class MovieRequestController extends Controller
{
    public function index()
    {
        $movie_requests = MovieRequest::with('movieType')
            ->get();

        return view('movie-requests.index', compact('movie_requests'));
    }
}
