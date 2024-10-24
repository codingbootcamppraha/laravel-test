<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        // $genres = Genre::get();
        $genres = DB::select('SELECT * FROM `genres`');

        return view('genres.index', compact('genres'));
    }
}
