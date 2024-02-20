<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $movie_of_the_week = DB::selectOne("
            SELECT *
            FROM `movies`
            WHERE `id` = ?
        ", [
            111161
        ]);

        return view('index.index', compact('movie_of_the_week'));
    }
}
