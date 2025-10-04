<!-- resources/views/movies/index.blade.php -->
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ภาพยนตร์ | เว็บจองตั๋วหนัง</title>
  <!-- ถ้าโปรเจกต์ใช้ Vite + Tailwind อยู่แล้ว ให้ลบบรรทัด CSS ชั่วคราวนี้ออก และใช้ @vite('resources/css/app.css') แทน -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* โทนสีจากสกรีนช็อต */
    :root{
      --bg: #f0cfc3;       /* ชมพูพีชอ่อน */
      --panel: #efcdbb;    /* พื้นด้านใน */
      --nav: #c77185;      /* บาร์หัวข้อ */
      --nav-text: #f7e8ee; /* ข้อความบน nav */
      --card: #efcdbb;     /* สีการ์ด */
      --border: #e7bdb0;   /* สีเส้นคั่น */
      --text: #1f2937;     /* สีกลางสำหรับตัวอักษร */
    }
    .shadow-soft{ box-shadow: 0 8px 20px rgba(0,0,0,.08); }
    .shadow-card{ box-shadow: 0 10px 30px rgba(0,0,0,.12); }
  </style>
</head>
<body class="min-h-screen bg-[var(--panel)] text-[var(--text)]">
  <!-- Top Nav -->
  <header class="sticky top-0 z-40 bg-[var(--nav)]/95 backdrop-blur border-b border-[var(--border)]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <nav class="flex items-center space-x-6 text-[var(--nav-text)] font-semibold">
          <a href="/" class="hover:opacity-90">หน้าแรก</a>
          <a href="/movies" class="opacity-90 underline underline-offset-8 decoration-[3px]">ภาพยนตร์</a>
          <a href="/bookings" class="hover:opacity-90">ประวัติการเข้าชม</a>
        </nav>
        <div class="flex items-center gap-3">
          @auth
            <span class="text-[var(--nav-text)] text-sm hidden sm:inline">{{ Auth::user()->name }}</span>
            <a href="/user" class="w-10 h-10 rounded-full bg-[var(--nav-text)]/90 grid place-items-center text-[var(--nav)] font-bold">{{ strtoupper(substr(Auth::user()->name,0,1)) }}</a>
          @else
            <a href="/login" class="px-3 py-1.5 rounded-lg bg-[var(--nav-text)] text-[var(--nav)] font-semibold">เข้าสู่ระบบ</a>
          @endauth
        </div>
      </div>
    </div>
  </header>

  <!-- Content -->
  <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-2xl sm:text-3xl font-bold">ภาพยนตร์</h1>

    <!-- Filters Row -->
    <form method="GET" action="{{ url('/movies') }}" class="mt-4">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
        <!-- โรงภาพยนตร์ -->
        <div class="md:col-span-4">
          <label class="sr-only" for="cinema_id">โรงภาพยนตร์</label>
          <div class="relative">
            <select id="cinema_id" name="cinema_id" class="w-full appearance-none rounded-xl border border-[var(--border)] bg-white/90 px-4 py-3 pr-10 shadow-soft focus:outline-none focus:ring-2 focus:ring-[var(--nav)]">
              <option value="">โรงภาพยนตร์ทั้งหมด</option>
              @isset($cinemas)
                @foreach($cinemas as $c)
                  <option value="{{ $c->id }}" @selected(request('cinema_id')==$c->id)>{{ $c->name }}</option>
                @endforeach
              @endisset
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </div>
        </div>

        <!-- ช่องค้นหา -->
        <div class="md:col-span-6">
          <label class="sr-only" for="q">ค้นหา</label>
          <div class="relative">
            <input id="q" name="q" value="{{ request('q') }}" placeholder="ค้นหาชื่อภาพยนตร์…" class="w-full rounded-xl border border-[var(--border)] bg-white/90 px-4 py-3 pr-12 shadow-soft focus:outline-none focus:ring-2 focus:ring-[var(--nav)]" />
            <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 inline-flex items-center justify-center p-2 rounded-lg hover:bg-gray-100 active:scale-95 transition">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6 text-gray-700"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            </button>
          </div>
        </div>

        <!-- ปุ่มดูรอบฉายรวม -->
        <div class="md:col-span-2 flex md:justify-end">
          <a href="{{ url('/schedules') }}" class="w-full md:w-auto inline-flex items-center justify-center rounded-xl border border-[var(--border)] bg-white/90 px-5 py-3 font-semibold shadow-soft hover:shadow active:scale-95 transition">รอบฉาย</a>
        </div>
      </div>
    </form>

    <hr class="my-5 border-[var(--border)]" />

    <!-- Movies Grid -->
    @php
      // ตัวอย่างข้อมูลชั่วคราว (ถ้าไม่มี $movies ให้ใช้ array นี้)
      $fallbackMovies = [
        [ 'id'=>1, 'title'=>'ดาบพิฆาตอสูร ภาคปราสาทไม่จบเขต', 'release'=>'2 ก.ย. 2025', 'poster'=>'https://image.tmdb.org/t/p/w342/8f4jv3rJ9rS3oZxk0iYhW0oZp4Y.jpg' ],
        [ 'id'=>2, 'title'=>'ดาบพิฆาตอสูร ภาคปราสาทไม่จบเขต', 'release'=>'2 ก.ย. 2025', 'poster'=>'https://image.tmdb.org/t/p/w342/8f4jv3rJ9rS3oZxk0iYhW0oZp4Y.jpg' ],
        [ 'id'=>3, 'title'=>'ดาบพิฆาตอสูร ภาคปราสาทไม่จบเขต', 'release'=>'2 ก.ย. 2025', 'poster'=>'https://image.tmdb.org/t/p/w342/8f4jv3rJ9rS3oZxk0iYhW0oZp4Y.jpg' ],
        [ 'id'=>4, 'title'=>'ดาบพิฆาตอสูร ภาคปราสาทไม่จบเขต', 'release'=>'2 ก.ย. 2025', 'poster'=>'https://image.tmdb.org/t/p/w342/8f4jv3rJ9rS3oZxk0iYhW0oZp4Y.jpg' ],
      ];
      $list = isset($movies) && count($movies) ? $movies : $fallbackMovies;
    @endphp

    @if(!count($list))
      <div class="py-20 text-center text-gray-600">ไม่พบภาพยนตร์ที่ตรงกับเงื่อนไข</div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($list as $movie)
          <article class="rounded-2xl bg-[var(--card)] shadow-card overflow-hidden border border-[var(--border)] hover:-translate-y-0.5 transition">
            <a href="{{ url('/movies/'.($movie['id'] ?? $movie->id)) }}" class="block">
              <div class="aspect-[3/4] bg-gray-200">
                <img src="{{ $movie['poster'] ?? ($movie->poster_path ?? '') }}" alt="{{ $movie['title'] ?? $movie->title }}" class="w-full h-full object-cover" />
              </div>
              <div class="p-4">
                <p class="text-sm text-gray-700">วันที่เข้าฉาย: <span class="font-semibold">{{ $movie['release'] ?? (optional($movie->release_at)->format('j M Y')) }}</span></p>
                <h3 class="mt-1 font-extrabold leading-snug">{{ $movie['title'] ?? $movie->title }}</h3>
              </div>
            </a>
          </article>
        @endforeach
      </div>
    @endif

    <!-- Spacer bottom ให้โทนเหมือนภาพตัวอย่าง -->
    <div class="h-12"></div>
  </main>
</body>
</html>
