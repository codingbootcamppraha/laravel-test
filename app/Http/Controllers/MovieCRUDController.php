<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieCRUDController extends Controller
{
    public function create()
    {
        $movie = new Movie();

        return view('movies.form', compact('movie'));
    }

    public function store(MovieRequest $request)
    {
        $movie = new Movie();
        $movie->name = $request->input('name');
        $movie->year = $request->input('year');
        $movie->save();

        return redirect()->route('movies.edit', $movie->id);
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.form', compact('movie'));
    }

    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->name = $request->input('name');
        $movie->year = $request->input('year');
        $movie->save();

        session()->flash('success_message', 'The movie was updated');

        return redirect()->route('movies.edit', $movie->id);
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        session()->flash('success_message', 'The movie was deleted');

        return redirect()->route('movies.create');
    }
}
