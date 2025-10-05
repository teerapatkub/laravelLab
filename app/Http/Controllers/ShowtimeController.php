<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class ShowtimeController extends Controller
{
    public function show($Movie_ID)
    {
        // ดึงหนังพร้อมรอบฉาย + โรงหนัง
        $movie = Movie::with('showtimes.theater')->findOrFail($Movie_ID);

        return view('showtime', [
            'movies' => $movie,
            'showtimes' => $movie->showtimes
        ]);
    }
}
