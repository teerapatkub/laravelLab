<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <style>
      
        
        .edit-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 50px);
            padding: 20px;
        }

        .edit-card {
            background-color: #d4c4c8;
            border-radius: 30px;
            padding: 50px 60px;
            max-width: 400px;
            width: 100%;
            text-align: center;
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

        .edit-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .current-info {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            line-height: 2;
            text-align: left;
        }

        .current-info p {
            margin: 10px 0;
        }

        .edit-title {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0 15px 0;
            color: #333;
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
            font-weight: normal;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            box-sizing: border-box;
            background-color: #fff;
        }

        .submit-button {
            background-color: #0066ff;
            color: white;
            border: none;
            padding: 12px 60px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        .submit-button:hover {
            background-color: #0052cc;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-error ul {
            margin: 5px 0 0 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<nav>
        <div class="a1">
            <a href="/">หน้าแรก</a>
            <a href="/movies">ภาพยนตร์</a>
            <a href="/history">ประวัติการเข้าชม</a>

            <!-- ไอคอนผู้ใช้ด้านขวา -->
            <a href="" class="user-icon">
                <img src="{{ asset('Icon/circle-user.png') }}" alt="User Icon" width="24" height="24">
            </a> 
        </div>
    </nav>

<div class="edit-container">
    <div class="edit-card">
        <div class="profile-avatar">
            <img src="{{ asset('Icon/iconprofile.png') }}" alt="Profile Icon">
        </div>

        <h2>ข้อมูลส่วนตัว</h2>
        
        <div class="current-info">
            <p><strong>ชื่อผู้ใช้:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="edit-title">แก้ไขข้อมูลส่วนตัว</div>

        <form action="{{ route('myprofile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">ชื่อ:</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
            </div>

            <button type="submit" class="submit-button">ยืนยัน</button>
        </form>
    </div>
</div>

</body>
</html>