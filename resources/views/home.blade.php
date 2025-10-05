<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Local Icon</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <style>
        /* ------- หัวข้อส่วนภาพยนตร์ ------- */
        h3 {
            color: #e72f79ff; /* สีชมพูเข้ม */
            font-size: 28px;
            margin-top: 40px;
            margin-bottom: 30px;
        }

        /* ------- พื้นที่จัดเรียงการ์ดหนัง (Grid) ------- */
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* แถวละ 4 เรื่อง */
            gap: 30px;
            justify-items: center;
        }

        .movie-grid a {
            text-decoration: none;
        }

        /* ------- การ์ดหนังแต่ละใบ ------- */
        .movie-card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 320px;
            overflow: hidden;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
        }

        /* ------- รูปภาพของหนัง ------- */
        .movie-card img {
            width: 200px;
            height: 320px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        /* ------- ส่วนข้อมูลหนัง (ชื่อหนัง) ------- */
        .movie-info {
            padding: 10px 0 15px 0;
        }

        .movie-info h2 {
            color: #333;
            font-size: 18px;
            margin: 0;
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

    <!-- ===================== ส่วนแสดงภาพยนตร์ ===================== -->
    <h3>ภาพยนตร์</h3>

    <div class="movie-grid">
        @foreach ($movies as $movie)
            <a href="{{ url('/showtime/' . $movie->Movie_ID) }}" class="movie-card">
                <img src="{{ asset($movie->Movie_img) }}" alt="{{ $movie->Movie_NAME }}">
                <div class="movie-info">
                    <h2>{{ $movie->Movie_NAME }}</h2>
                </div>
            </a>
        @endforeach
    </div>

</body>
</html>
