<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/home', [MovieController::class, 'home']);
Route::get('/movies', [MovieController::class, 'index']);

use App\Http\Controllers\ShowtimeController;
Route::get('/showtime/{Movie_ID}', [ShowtimeController::class, 'show'])->name('showtime');
