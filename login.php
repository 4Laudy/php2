<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ล็อกอิน</title>
    <!-- ลิงก์ไปยัง Bootstrap 5 และ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            font-family: 'Kodchasan', sans-serif;
            background-color: #ffe4e1; /* สีชมพูพาสเทล */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .btn-primary {
            background-color: #ff8fa3; /* สีชมพู */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff6b81;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-text {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">เข้าสู่ระบบ</h2>
        
        <!-- แสดงข้อความแจ้งเตือน (ถ้ามี) -->
                <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                . $_SESSION['error'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['error']);
        }
        ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
        </form>
        <form action="register.php" method="GET">
            <button type="submit" class="btn btn-register w-100">ลงทะเบียนที่นี่</button>
        </form>
    </div>

    <!-- ลิงก์ไปยัง JavaScript ของ Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
