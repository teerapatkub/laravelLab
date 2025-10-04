<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/movies', [MovieController::class, 'index']);

// ต้องล็อกอินก่อน
Route::middleware('auth')->group(function () {
    Route::get('/myprofile', function () {
        return view('myprofile');  
    })->name('myprofile');
    
   
    // แสดงหน้าแก้ไขโปรไฟล์
    Route::get('/myprofile/edit', [ProfileController::class, 'edit'])->name('myprofile.edit');
    
    // อัพเดทข้อมูลโปรไฟล์
    Route::put('/myprofile/update', [ProfileController::class, 'update'])->name('myprofile.update');
});