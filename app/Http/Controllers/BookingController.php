<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showw;
use App\Models\Booking;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function create($show_id)
    {
        $show = Showw::findOrFail($show_id);
        return view('create', compact('show'));
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('movies')->with('success', 'จองเรียบร้อยแล้ว!');
    }
}
