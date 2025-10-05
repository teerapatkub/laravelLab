<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowtimeController;

// หน้า Home
Route::get('/home', [MovieController::class, 'home'])->name('home');

// รายชื่อภาพยนตร์
Route::get('/movies', [MovieController::class, 'index'])->name('movies');

// รอบฉาย (สาธารณะ)
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

    // Logout (เด้งไปหน้า Login ทันที)
    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // หรือ return redirect('/login');
    })->name('logout');
});
//  Login เด้งไปหน้า home)
Route::get('/home', [MovieController::class, 'home'])->name('home');


