<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    // หน้าแรก
    public function home(Request $request)
    {
        // เริ่มต้น query
        $query = DB::table('movie');
        
        // ไม่มีการกรอง เพราะไม่มีตาราง cinema และ genre
        // ดึงหนังทั้งหมด
        
        // ดึงข้อมูลหนัง
        $movies = $query->get();
        
        // สร้างค่าว่างสำหรับ cinemas (เพราะไม่มีตาราง cinema)
        $cinemas = collect([]);
        
        // สร้างค่าว่างสำหรับ genres (เพราะไม่มีคอลัมน์แนวหนังในตาราง movie)
        $genres = collect([]);
        
        return view('home', [
            'movies' => $movies,
            'cinemas' => $cinemas,
            'genres' => $genres
        ]);
    }

    // หน้าแสดงหนังทั้งหมด
    public function index()
    {
        $movies = DB::table('movie')->get();
         return view('showtime', ['movies' => $movies]);
    }
}