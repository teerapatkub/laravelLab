<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เลือกรอบฉาย - {{ $movies->Movie_NAME }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
    <style>
        /* ------- พื้นที่จัดเรียงการ์ดหนัง (Grid) ------- */
        .movie-grid {
            display: flex;; /* ใช้ระบบกริด */
            background-color: #fff; /* พื้นหลังสีขาว */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* เงาใต้การ์ด */
            width: 1200px; /* ความกว้างของการ์ด */
            margin: 30px auto 30px auto; /*บน ขวา ล่าง ซ้าย*/

        }

        /* ------- รูปภาพของหนัง ------- */
        .movie-grid img {
            padding: 10px;
            width: 250px; /* ให้รูปเต็มการ์ด */
            height: 300px; /* ความสูงเท่ากันทุกใบ */
        }

        .movie-card h1, p {
            margin: 20px 0 0 20px ;
        }

    </style>
</head>
<body>
    <!-- ===================== Navbar ===================== -->
    <nav>
        <div class="a1">
            <!-- ลิงก์เมนูหลัก -->
            <a href="">หน้าแรก</a>
            <a href="">ภาพยนตร์</a>
            <a href="">ประวัติการเข้าชม</a>

            <!-- ไอคอนผู้ใช้ด้านขวา -->
            <a href="" class="user-icon">
                <img src="{{ asset('Icon/circle-user.png') }}" alt="User Icon" width="24" height="24">
            </a>    
        </div>
    </nav>
    
    <div class="movie-grid">
        <img src="{{ asset($movies->Movie_img) }}" alt="{{ $movies->Movie_NAME }}">
        <div class="movie-card">
            <h1>{{ $movies->Movie_NAME }}</h1>
            <p>นักแสดง: {{ $movies->Movie_ACTORS }}</p>
            <p>ผู้กำกับ: {{ $movies->Movie_DIRECTOR }}</p>
            <p>เวลา: {{ $movies->Movie_TIME }}</p>
        </div>
    </div>

<!-- <video controls>
    <source src="{{ asset($movies->Movie_video) }}" type="video/mp4">
</video> -->

</body>
</html>
