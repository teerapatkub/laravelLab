<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    // หน้าแรก
    public function home()
    {
        $movies = DB::table('Movie')->get(); // ชื่อตารางตรงกับ MySQL
        return view('home', ['movies' => $movies]);
    }

    // หน้าแสดงหนังทั้งหมด
    public function index()
    {
        $movies = DB::table('Movie')->get();
        return view('movies', ['movies' => $movies]);
    }

    
}
