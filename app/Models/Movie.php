<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // this table does not have created_at or updated_at
    public $timestamps = false;

    public function movieType()
    {
        // `movie_types`
        // n:1
        // `movie_types`.`id`
        // `movies`.`movie_type_id`
        // SELECT *
        // FROM `movie_types`
        // WHERE `movie_types`.`id` = 1
        // $this->movie_type_id
        return $this->belongsTo(MovieType::class);
    }

    public function genres()
    {
        // `movies`
        // `movies`.`id`
        // `genres`
        // `genres`.`id`
        // `genre_movie`
        // `genre_movie`.`movie_id`
        // `genre_movie`.`genre_id`
        // SELECT `genres`.*
        // FROM `genre_movie`
        // INNER JOIN `genres`
        //     ON `genre_movie`.`genre_id` = `genres`.`id`
        // WHERE `genre_movie`.`movie_id` = ?
        //                              $this->id
        return $this->belongsToMany(Genre::class);
    }
}
