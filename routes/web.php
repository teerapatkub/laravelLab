<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/movies', [MovieController::class, 'index']);
