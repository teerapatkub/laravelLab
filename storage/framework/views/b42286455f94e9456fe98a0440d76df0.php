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
                <img src="<?php echo e(asset('Icon/circle-user.png')); ?>" alt="User Icon" width="24" height="24">
            </a>    
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

<!-- <video controls>
    <source src="<?php echo e(asset($movies->Movie_video)); ?>" type="video/mp4">
</video> -->

</body>
</html>
<?php /**PATH C:\Users\WINDOWS\OneDrive\เอกสาร\GitHub\laravelLab\resources\views/showtime.blade.php ENDPATH**/ ?>