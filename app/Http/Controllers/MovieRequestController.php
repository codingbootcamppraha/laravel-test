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
        $movie_types = MovieType::get();

        if ($id) {
            $movie_request = MovieRequest::findOrFail($id);
        } else {
            $movie_request = new MovieRequest;
        }

        return view('movie-requests.create', compact('movie_types', 'movie_request', 'id'));
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

        if ($id) {
            $movie_request = MovieRequest::findOrFail($id);
        } else {
            // create new movie request object
            $movie_request = new MovieRequest;
        }

        $movie_request->full_name = $request->input('full_name');
        $movie_request->email = $request->input('email');
        $movie_request->name = $request->input('name');
        $movie_request->year = $request->input('year');
        $movie_request->movie_type_id = $request->input('movie_type_id');

        // save data in db
        $movie_request->save();

        session()->flash('success_message', 'Your movie request has been submitted!');

        // redirect the user
        return redirect()->route('movie-requests.index');
    }
}
