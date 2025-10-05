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


        
    table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    thead {
        background-color: #343a40;
        color: white;
    }

    th, td {
        padding: 16px 20px;
        text-align: center;
        font-size: 16px;
    }

    th {
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tbody tr {
        border-bottom: 1px solid #e9ecef;
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background-color: #f1f3f5;
    
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
    
<!-- ===================== ตารางรอบฉาย ===================== -->
    <h2 style="text-align:center; margin-top:40px;">รอบฉาย</h2>
    <table>
        <thead>
            <tr>
                <th>วันที่</th>
                <th>เวลา</th>
                <th>ภาษา</th>
                <th>โรงภาพยนตร์</th>
                <th>ห้องฉาย</th>
                <th>จอง</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showtimes as $show)
        <tr>
            <td>{{ \Carbon\Carbon::parse($show->show_date)->locale('th')->translatedFormat('j M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($show->show_time)->format('H:i') }}</td>
            <td>{{ $show->show_language }}</td>
            <td>{{ $show->theater->theater_name }}</td>
            <td>{{ $show->hall_number }}</td>
            <td>
                <a href="{{ route('booking.create', $show->show_id) }}" class="book-btn">จอง</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
