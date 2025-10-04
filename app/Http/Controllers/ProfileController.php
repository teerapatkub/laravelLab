<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // แสดงหน้าโปรไฟล์
    public function show()
    {
        return view('myprofile');
    }

    // แสดงหน้าแก้ไขโปรไฟล์
    public function edit()
    {
        return view('editmyprofile');
    }

    // อัพเดทข้อมูลโปรไฟล์
    public function update(Request $request)
    {
        $user = Auth::user();

        // ตรวจสอบข้อมูล
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
        ], [
            'name.required' => 'กรุณากรอกชื่อ',
            'name.max' => 'ชื่อต้องไม่เกิน 255 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',
        ]);

        // อัพเดทข้อมูล
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        // ส่งกลับไปหน้าโปรไฟล์พร้อมข้อความสำเร็จ
        return redirect()->route('myprofile')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
    }
}
