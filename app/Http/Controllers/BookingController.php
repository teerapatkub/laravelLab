<?php

namespace App\Http\Controllers; // ต้องมี namespace ด้วย

use Illuminate\Http\Request;
use App\Models\Showw;
use App\Models\Booking;

// เพิ่มบรรทัดนี้เพื่อให้รู้จัก Controller ของ Laravel
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
