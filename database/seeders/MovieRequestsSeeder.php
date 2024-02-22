<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MovieRequest;

class MovieRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_movie_request = new MovieRequest;
        $new_movie_request->movie_type_id = 4;
        $new_movie_request->name = 'test';
        $new_movie_request->full_name = 'monika m';
        $new_movie_request->email = 'monika@data4you.cz';
        $new_movie_request->save();
    }
}
