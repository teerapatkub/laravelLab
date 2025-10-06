<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก - Movie Theater</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/nav.css')); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #f8f0f7 0%, #e8dce8 100%);
            min-height: 100vh;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Filter Section */
        .filter-section {
            background: linear-gradient(135deg, #e72f79 0%, #9b59b6 50%, #3498db 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .filter-row {
            display: flex;
            gap: 20px;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
        }

        .showtime-filter-btn {
            flex: 0 0 auto;
            padding: 12px 40px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: flex-end;
        }

        .showtime-filter-btn:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f6391 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }

        .filter-label {
            display: block;
            color: white;
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .filter-dropdown {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-dropdown:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background-color: white;
            border-radius: 20px;
            max-width: 1200px;
            width: 100%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            position: sticky;
            top: 0;
            background-color: white;
            border-bottom: 2px solid #f0f0f0;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .modal-header h3 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #666;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background-color: #f0f0f0;
            color: #333;
        }

        .modal-body {
            padding: 30px;
        }

        /* Movie Grid in Modal */
        .movie-grid-modal {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .movie-item-modal {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .movie-item-modal:hover {
            transform: translateY(-5px);
        }

        .movie-card-modal {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .movie-card-modal:hover {
            box-shadow: 0 8px 20px rgba(231, 47, 121, 0.3);
        }

        .movie-card-modal img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .movie-info-modal {
            padding: 12px;
            background: linear-gradient(to bottom, #ffffff, #f8f8f8);
        }

        .movie-info-modal h4 {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin: 0 0 5px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        /* Main Movie Display */
        h3.page-title {
            color: #e72f79;
            font-size: 32px;
            margin-top: 20px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .result-count {
            color: #666;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .movie-card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            flex-direction: column;
        }

        .movie-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(231, 47, 121, 0.3);
        }

        .movie-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .movie-info {
            padding: 15px;
            background: linear-gradient(to bottom, #ffffff, #f8f8f8);
        }

        .movie-info h2 {
            color: #333;
            font-size: 18px;
            margin: 0 0 12px 0;
            font-weight: 600;
        }

        .showtime-btn {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .showtime-btn:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f6391 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.4);
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #666;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .filter-row {
                flex-direction: column;
                align-items: stretch;
            }

            .movie-grid-modal {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
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

<div class="main-container">
    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-row">
            <div class="filter-group">
                <label class="filter-label">โรงภาพยนตร์</label>
                <button id="cinemaBtn" class="filter-dropdown">
                    <span id="cinemaText">ทั้งหมด</span>
                </button>
            </div>

            <div class="filter-group">
                <label class="filter-label">ภาพยนตร์</label>
                <button id="genreBtn" class="filter-dropdown">
                    <span id="genreText">ทั้งหมด</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Genre Modal with Movie Grid -->
    <div id="genreModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>เลือกหนัง</h3>
                <button class="close-btn" onclick="closeGenreModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="movie-grid-modal" id="movieGridModal">
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="movie-item-modal" onclick="selectMovie('<?php echo e($movie->Movie_ID); ?>', '<?php echo e($movie->Movie_NAME); ?>')">
                        <div class="movie-card-modal">
                            <img src="<?php echo e(asset($movie->Movie_img)); ?>" alt="<?php echo e($movie->Movie_NAME); ?>">
                            <div class="movie-info-modal">
                                <h4><?php echo e($movie->Movie_NAME); ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Cinema Modal -->
    <div id="cinemaModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>เลือกโรงภาพยนตร์</h3>
                <button class="close-btn" onclick="closeCinemaModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="movie-grid-modal">
                    <div class="movie-item-modal" onclick="selectCinema('ทั้งหมด')">
                        <div class="movie-card-modal" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; min-height: 150px;">
                            <h4 style="color: white; font-size: 24px; margin: 0;">ทั้งหมด</h4>
                        </div>
                    </div>
                    <!-- เพิ่มโรงภาพยนตร์ที่นี่ -->
                </div>
            </div>
        </div>
    </div>

    <!-- Movies Display -->
    <h3 class="page-title">ภาพยนตร์</h3>
    
    <?php if(count($movies) > 0): ?>
    <div class="movie-grid">
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="movie-card">
            <img src="<?php echo e(asset($movie->Movie_img)); ?>" alt="<?php echo e($movie->Movie_NAME); ?>">
            <div class="movie-info">
                <h2><?php echo e($movie->Movie_NAME); ?></h2>
                <a href="<?php echo e(url('/showtime/' . $movie->Movie_ID)); ?>">
                    <button class="showtime-btn">รอบฉาย</button>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="no-results">
        <p>ไม่พบภาพยนตร์</p>
    </div>
    <?php endif; ?>
</div>

<script>
    // Open/Close Modals
    document.getElementById('genreBtn').addEventListener('click', function() {
        document.getElementById('genreModal').classList.add('active');
    });

    document.getElementById('cinemaBtn').addEventListener('click', function() {
        document.getElementById('cinemaModal').classList.add('active');
    });

    function closeGenreModal() {
        document.getElementById('genreModal').classList.remove('active');
    }

    function closeCinemaModal() {
        document.getElementById('cinemaModal').classList.remove('active');
    }

    function selectMovie(movieId, movieName) {
        // แสดงชื่อหนังในช่อง dropdown
        document.getElementById('genreText').textContent = movieName;
        closeGenreModal();
        // ไปยังหน้ารายละเอียดหนัง
        window.location.href = '/showtime/' + movieId;
    }

    function selectCinema(cinema) {
        document.getElementById('cinemaText').textContent = cinema;
        closeCinemaModal();
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const genreModal = document.getElementById('genreModal');
        const cinemaModal = document.getElementById('cinemaModal');
        
        if (event.target === genreModal) {
            closeGenreModal();
        }
        if (event.target === cinemaModal) {
            closeCinemaModal();
        }
    });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravelLab\resources\views/home.blade.php ENDPATH**/ ?>