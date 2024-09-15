<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการสต็อกสินค้า</title>
    <!-- ลิงก์ไปยัง Google Fonts และ Bootstrap 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Kodchasan', sans-serif;
            background-color: #ffe4e1; /* สีชมพูพาสเทล */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #ffccd5;
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }

        .hero-section {
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffdae0; /* สีชมพูพาสเทลอ่อน */
            color: #333;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        .btn-custom {
            background-color: #ff8fa3; /* สีชมพูเข้ม */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #ff6b81;
        }

        .footer {
            background-color: #ffccd5;
            padding: 20px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ระบบจัดการสต็อกสินค้า</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="text-center">
            <h1>ยินดีต้อนรับสู่ระบบจัดการสต็อกสินค้า</h1>
            <p>ระบบช่วยจัดการสินค้าและสต็อกได้อย่างง่ายดาย</p>
            <a href="login.php" class="btn btn-custom">เข้าสู่ระบบ</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© 2024 ระบบจัดการสต็อกสินค้า | ติดต่อเรา</p>
    </div>

    <!-- ลิงก์ไปยัง Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
