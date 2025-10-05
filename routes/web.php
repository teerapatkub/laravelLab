<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\BookingController;

// หน้า Home
Route::get('/home', [MovieController::class, 'home'])->name('home');

// แสดงรายชื่อภาพยนตร์
Route::get('/movies', [MovieController::class, 'index'])->name('movies');

// แสดงรอบฉายของหนัง
Route::get('/showtime/{Movie_ID}', [ShowtimeController::class, 'show'])->name('showtime');

// ฟอร์มจองและบันทึกการจอง
Route::get('/booking/create/{show}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// ต้องล็อกอินก่อนถึงเข้าได้
Route::middleware('auth')->group(function () {

    // โปรไฟล์ผู้ใช้
    Route::get('/myprofile', function () {
        return view('myprofile');  
    })->name('myprofile');
    
    // แก้ไขโปรไฟล์
    Route::get('/myprofile/edit', [ProfileController::class, 'edit'])->name('myprofile.edit');
    
    // อัพเดทโปรไฟล์
    Route::put('/myprofile/update', [ProfileController::class, 'update'])->name('myprofile.update');
});
