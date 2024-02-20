<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    use HasFactory;

    public function movies()
    {
        // SELECT *
        // FROM `movies`
        // WHERE `movies`.`movie_type_id` = $this->id
        return $this->hasMany(Movie::class);
    }
}
