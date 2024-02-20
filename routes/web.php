<?php

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

Route::get('/', [IndexController::class, 'index']);


// "when the user comes to the path /awards with the GET request method,
// handle the request with the index method of the AwardController class"
Route::get('/awards', ['App\Http\Controllers\AwardController', 'index']);
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/awards2', [AwardController::class, 'index2']);

Route::get('/sample-movie', [IndexController::class, 'movieDetail']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/games', [MovieController::class, 'games']);
Route::get('/romance', [MovieController::class, 'romance']);

Route::get('/movies/edit', [MovieController::class, 'edit']);
Route::post('/movies/edit', [MovieController::class, 'save']);