<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowtimeController;

// หน้า Home (เรียก Controller)
Route::get('/home', [MovieController::class, 'home'])->name('home');

// แสดงหน้ารายชื่อภาพยนตร์
Route::get('/movies', [MovieController::class, 'index'])->name('movies');

// แสดงรอบฉายของหนัง
Route::get('/showtime/{Movie_ID}', [ShowtimeController::class, 'show'])->name('showtime');

// ต้องล็อกอินก่อนถึงจะเข้าได้
Route::middleware('auth')->group(function () {

    // โปรไฟล์ผู้ใช้
    Route::get('/myprofile', function () {
        return view('myprofile');  
    })->name('myprofile');
    
    // แสดงหน้าแก้ไขโปรไฟล์
    Route::get('/myprofile/edit', [ProfileController::class, 'edit'])->name('myprofile.edit');
    
    // อัพเดทข้อมูลโปรไฟล์
    Route::put('/myprofile/update', [ProfileController::class, 'update'])->name('myprofile.update');
});
