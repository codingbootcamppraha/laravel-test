<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('homepage');


// "when the user comes to the path /awards with the GET request method,
// handle the request with the index method of the AwardController class"
Route::get('/awards', ['App\Http\Controllers\AwardController', 'index'])->name('awards.index');
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/awards2', [AwardController::class, 'index2']);

//          /movie/2948356
Route::get('/movie/{movie_id}', [IndexController::class, 'movieDetail'])->name('movies.detail');

//          /movies/2010/6
Route::get('/movies/{year?}/{min_rating?}', [MovieController::class, 'index'])
    ->where('year', '\d{4}')
    ->whereNumber('min_rating')
    ->name('movies.index');

Route::get('/video-games', [MovieController::class, 'games'])->name('games.index');
Route::get('/romance', [MovieController::class, 'romance'])->name('movies.genre.romance');

Route::get('/movies/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::post('/movies/edit', [MovieController::class, 'save'])->name('movies.save');

Route::get('/about-us', [AboutController::class, 'aboutUs'])->name('about-us');

// when the user comes with GET request to /welcome,
// display the view /resources/views/welcome.blade.php
Route::view('/welcome', 'welcome');