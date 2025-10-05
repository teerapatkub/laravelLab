<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="th">
=======
<html lang="en">
>>>>>>> Stashed changes
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Local Icon</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" type="text/css" href="css/nav.css">
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
            display: grid; /* ใช้ระบบกริด */
            grid-template-columns: repeat(4, 1fr); /* แถวละ 3 เรื่อง */
            gap: 30px; /* ช่องว่างระหว่างการ์ด */
            justify-items: center; /* จัดให้อยู่กลางในแต่ละช่อง */
        }

        .movie-grid a{
            text-decoration: none;
        }

        /* ------- การ์ดหนังแต่ละใบ ------- */
        .movie-card {
            background-color: #fff; /* พื้นหลังสีขาว */
            border-radius: 16px; /* มุมโค้งมน */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* เงาใต้การ์ด */
            text-align: center; /* ข้อความอยู่กึ่งกลาง */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* เพิ่มเอฟเฟกต์ตอน hover */
            width: 320px; /* ความกว้างของการ์ด */
            overflow: hidden; /* ซ่อนส่วนเกินของรูป */
        }

        /* ------- รูปภาพของหนัง ------- */
        .movie-card img {
            width: 200px; /* ให้รูปเต็มการ์ด */
            height: 320px; /* ความสูงเท่ากันทุกใบ */
            object-fit: cover; /* ครอบรูปให้พอดีโดยไม่บิดเบี้ยว */
            display: block;
            margin: 0 auto;
        }

        /* ------- ส่วนข้อมูลหนัง (ชื่อหนัง) ------- */
        .movie-info {
            padding: 10px 0 15px 0;
        }

        .movie-info h2 {
            color: #333; /* สีตัวอักษรเทาเข้ม */
            font-size: 18px;
            margin: 0;
        }
=======
    <link rel="stylesheet" href="fonts/fontisto/fontisto.min.css">
    <style>
        body {
        margin: 0;
        padding: 0;
        background-color: #f5e3e7;
        }

        .a1 {
            background-color: #cc5555ff;
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 5px;
        }

        .a1 a {
            color: #fff;
            margin-right: 50px;
            text-decoration: none;
            font-weight: bold;
        }

        .user-icon {
            margin-left: auto;
        }

>>>>>>> Stashed changes
    </style>
</head>
<body>

<<<<<<< Updated upstream
    <!-- ===================== Navbar ===================== -->
    <nav>
        <div class="a1">
            <!-- ลิงก์เมนูหลัก -->
            <a href="">หน้าแรก</a>
            <a href="">ภาพยนตร์</a>
            <a href="">ประวัติการเข้าชม</a>

            <!-- ไอคอนผู้ใช้ด้านขวา -->
            <a href="" class="user-icon">
                <img src="Icon/circle-user.png" alt="User Icon" width="24" height="24">
            </a>    
        </div>
    </nav>

    <!-- ===================== ส่วนแสดงภาพยนตร์ ===================== -->
    <h3>ภาพยนตร์</h3>

<div class="movie-grid">
    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(url('/showtime/' . $movie->Movie_ID)); ?>" class="movie-card">
        <img src="<?php echo e(asset($movie->Movie_img)); ?>" alt="<?php echo e($movie->Movie_NAME); ?>">
        <div class="movie-info">
            <h2><?php echo e($movie->Movie_NAME); ?></h2>
        </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
=======
<nav>
    <div class="a1">
        <a href=""></i> หน้าแรก</a>
        <a href=""></i> ภาพยนตร์</a>
        <a href=""></i> ประวัติการเข้าชม</a>

        <a href="" class="user-icon">
            <img src="Icon/circle-user.png" alt="User Icon" width="24" height="24" >
        </a>    
    </div>
</nav>
>>>>>>> Stashed changes

</body>
</html>
<?php /**PATH C:\Users\WINDOWS\OneDrive\เอกสาร\GitHub\laravelLab\resources\views/home.blade.php ENDPATH**/ ?>