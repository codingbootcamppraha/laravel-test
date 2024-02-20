<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Person;
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

        $movie_of_the_week = Movie::query() // FROM `movies`
            ->where('id', 111161)      // WHERE `id` = 111161
            ->first();                      // SELECT *  LIMIT 1

        $another_movie = Movie::where('id', 2975590)->first();

        $person_of_the_week = Person::where('id', 209)->first();

        // same as the line above
        $person_of_the_week = Person::find(209); // SELECT * FROM `people` WHERE `id` = 209

        $query_builder = Movie::query();
        $query_builder = Movie::where('movie_type_id', 1);

        // $query_builder->where('movie_status_id', 1);
        $query_builder->where('name', '!=', '');

        $query_builder->limit(10)
            ->orderBy('name', 'asc');

        if (!empty($_GET['recent'])) {

            $query_builder
                ->where('year', '>', 2010)
                ->where('year', '<', 2020);
        }


        $all_movies = $query_builder->get();
        $first_movie = $query_builder->first();

        // $best_recent_movies = Movie::query()
        //         ->where('year', '>', 2010)
        //         ->where('year', '<', 2020)
        //         ->limit(10)
        //         ->where('name', '!=', '')
        //         ->orderBy('rating', 'desc')
        //         ->where('votes_nr', '>=', 10000)
        //         ->get();

        dd($all_movies);

        return view('index.index', compact('movie_of_the_week', 'person_of_the_week'));
    }
}
