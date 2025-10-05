<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class ShowtimeController extends Controller
{
    public function show($Movie_ID)
    {
        $movies = Movie::findOrFail($Movie_ID);

        // ส่งข้อมูลหนังไปหน้าเลือกรอบฉาย
        return view('showtime', compact('movies'));
    }
}
