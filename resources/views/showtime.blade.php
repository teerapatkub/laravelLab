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
    <nav>
  <div class="a1">
    <a href="{{ url('/home') }}">หน้าแรก</a>
    <a href="{{ url('/movies') }}">ภาพยนตร์</a>
    <a href="{{ url('/history') }}">ประวัติการเข้าชม</a>

    <div class="nav-right">
      <a href="{{ route('myprofile') }}" class="user-link" title="โปรไฟล์">
        <img src="{{ asset('Icon/circle-user.png') }}" alt="User" width="24" height="24">
      </a>

      @auth
      <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">ออกจากระบบ</button>
      </form>
      @else
      <a href="{{ route('login') }}" class="login-btn">เข้าสู่ระบบ</a>
      @endauth
    </div>
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
