<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/nav.css')); ?>">

    <title>ข้อมูลส่วนตัว</title>
    <style>
       
        /* Profile Card */
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 50px);
            padding: 20px;
        }
        .profile-card {
            background-color: #d4c4c8;
            border-radius: 30px;
            padding: 50px 60px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .profile-avatar {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }
        .profile-card p {
            font-size: 16px;
            margin: 8px 0;
            color: #333;
            text-align: left;
            padding-left: 20px;
        }
        .edit-button {
            background-color: #0066ff;
            color: white;
            border: none;
            padding: 12px 60px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }
        .edit-button:hover {
            background-color: #0052cc;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<!-- Navbar -->

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



<!-- Profile Content -->
<div class="profile-container">
    <div class="profile-card">
        <?php if(session('success')): ?>
            <div class="alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="profile-avatar">
            <img src="<?php echo e(asset('Icon/iconprofile.png')); ?>" alt="Profile Icon">
        </div>
        
        <h2>ข้อมูลส่วนตัว</h2>
        
        <p><strong>ชื่อผู้ใช้:</strong> <?php echo e(Auth::user()->name); ?></p>
        <p><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
        
        <a href="<?php echo e(route('myprofile.edit')); ?>" class="edit-button">แก้ไข</a>
    </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelLab\resources\views/myprofile.blade.php ENDPATH**/ ?>