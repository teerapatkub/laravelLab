<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::query()
            ->when($request->cinema_id, fn($q) => $q->where('cinema_id', $request->cinema_id))
            ->when($request->q, fn($q) => $q->where('title', 'like', '%'.$request->q.'%'))
            ->get();

        $cinemas = Cinema::all();

        return view('movies.index', compact('movies','cinemas'));
    }
}