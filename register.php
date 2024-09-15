<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- ลิงก์ไปยัง Bootstrap 5 -->
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

        .register-container {
            max-width: 400px;
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .register-container h2 {
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
    <div class="register-container">
        <h2 class="text-center">ลงทะเบียน</h2>
        <form action="register_process.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">ลงทะเบียน</button>
        </form>
        <p class="mt-3 text-center"><a href="login.php">มีชื่อบัญชีอยู่แล้ว ต้องการล็อคอิน</a></p>
        
        <!-- ตรวจสอบข้อความจาก session และแสดง Toast -->
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="errorToast" class="toast bg-danger text-white" role="alert" data-bs-delay="5000" data-bs-autohide="true">
                        <div class="toast-header">
                            <strong class="me-auto">ข้อผิดพลาด</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            ' . $_SESSION['error'] . '
                        </div>
                    </div>
                </div>';
            unset($_SESSION['error']);
        }
        ?>
    </div>

    <!-- ลิงก์ไปยัง JavaScript ของ Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ทำให้ Toast แสดงอัตโนมัติ
        var toastEl = document.getElementById('errorToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>
</body>
</html>
