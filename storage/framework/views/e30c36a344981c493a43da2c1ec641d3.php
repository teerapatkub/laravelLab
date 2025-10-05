<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เลือกรอบฉาย - <?php echo e($movies->Movie_NAME); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/nav.css')); ?>">
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
    <a href="<?php echo e(url('/home')); ?>">หน้าแรก</a>
    <a href="<?php echo e(url('/movies')); ?>">ภาพยนตร์</a>
    <a href="<?php echo e(url('/history')); ?>">ประวัติการเข้าชม</a>

    <div class="nav-right">
      <a href="<?php echo e(route('myprofile')); ?>" class="user-link" title="โปรไฟล์">
        <img src="<?php echo e(asset('Icon/circle-user.png')); ?>" alt="User" width="24" height="24">
      </a>

      <?php if(auth()->guard()->check()): ?>
      <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
        <?php echo csrf_field(); ?>
        <button type="submit" class="logout-btn">ออกจากระบบ</button>
      </form>
      <?php else: ?>
      <a href="<?php echo e(route('login')); ?>" class="login-btn">เข้าสู่ระบบ</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
    
    <div class="movie-grid">
        <img src="<?php echo e(asset($movies->Movie_img)); ?>" alt="<?php echo e($movies->Movie_NAME); ?>">
        <div class="movie-card">
            <h1><?php echo e($movies->Movie_NAME); ?></h1>
            <p>นักแสดง: <?php echo e($movies->Movie_ACTORS); ?></p>
            <p>ผู้กำกับ: <?php echo e($movies->Movie_DIRECTOR); ?></p>
            <p>เวลา: <?php echo e($movies->Movie_TIME); ?></p>
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
            <?php $__currentLoopData = $showtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(\Carbon\Carbon::parse($show->show_date)->locale('th')->translatedFormat('j M Y')); ?></td>
            <td><?php echo e(\Carbon\Carbon::parse($show->show_time)->format('H:i')); ?></td>
            <td><?php echo e($show->show_language); ?></td>
            <td><?php echo e($show->theater->theater_name); ?></td>
            <td><?php echo e($show->hall_number); ?></td>
            <td>
                <a href="<?php echo e(route('booking.create', $show->show_id)); ?>" class="book-btn">จอง</a>
            </td>
        </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravelLab\resources\views/showtime.blade.php ENDPATH**/ ?>