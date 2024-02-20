<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        // resources\views\awards\index.blade.php
        return
        view(
            // identifier of the view:
            'awards.index',

            // data for the view:
            [
                'title' => 'Movie awards',
                'awards' => [
                    'Oscars',
                    'Golden Globes',
                    'Bafta',
                    'Emmy'
                ],
                'current_time' => date('G:i:s')
            ]
        );
    }

    public function index2()
    {
        $awards = [
            'Oscars',
            'Golden Globes',
            'Bafta',
            'Emmy'
        ];

        $title = 'Movie awards';

        $current_time = date('G:i:s');

        return view('awards.index', [
                'title' => $title,
                'awards' => $awards,
                'current_time' => $current_time
            ]
        );

        // equivalent to the code above:
        return view('awards.index', compact('title', 'awards', 'current_time'));
    }
}
