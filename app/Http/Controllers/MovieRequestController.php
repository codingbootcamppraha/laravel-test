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

        // $movie_requests = MovieRequest::get();

        // dd($movie_requests);

        return view('movie-requests.index', compact('movie_requests'));
    }

    public function create(Request $request, $id = null)
    {
        // get all movie types for select element in the form
        $movie_types = MovieType::get();


        // if movie request id has been passed find the movie request in the database
        if ($id) {
            $movie_request = MovieRequest::findOrFail($id);
        } else {
            // if it has not been found, create a new empty movie request object
            $movie_request = new MovieRequest;
        }

        return view('movie-requests.create', compact('movie_types', 'movie_request'));
    }
    
    public function store(Request $request, $id = null)
    {
        // validate request 

        // previously used before laravel 11:
        // $this->validate($request, [
        //     'full_name' => 'required',
        //     'email' => 'required',
        //     'name' => 'required',
        //     'year' => 'required',
        //     'movie_type_id' => 'required'
        // ]);

        // get valid movie type ids
        $movie_type_ids = MovieType::get()->pluck('id');
        
        // used now:
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'name' => 'required',
            'year' => 'required|integer|min:1950',
            'movie_type_id' => [
                'required',
                Rule::in($movie_type_ids)
            ]
        ], [
            'email.required' => 'OH NO, PLEASE GIVE US YOUR EMAIL :('
        ]);
        // if validation fails it will redirect the user back with error messages

        // if the id has been passed, use it to find the movie request
        if ($id) {
            $movie_request = MovieRequest::findOrFail($id);
        } else {
            // create new movie request object
            $movie_request = new MovieRequest;
        }

        // assign movie request values
        $movie_request->full_name = $request->input('full_name');
        $movie_request->email = $request->input('email');
        $movie_request->name = $request->input('name');
        $movie_request->year = $request->input('year');
        $movie_request->movie_type_id = $request->input('movie_type_id');

        // save data in db
        $movie_request->save();

        // flash success message
        session()->flash('success_message', 'Your movie request has been submitted!');

        // redirect the user
        return redirect()->route('movie-requests.index');
    }
}
