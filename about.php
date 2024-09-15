<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับผู้จัดทำ</title>
    <!-- ลิงก์ไปยัง Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- ลิงก์ไปยัง Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Kodchasan', sans-serif;
            background-color: #ffe4e1; /* สีพาสเทลชมพูอ่อน */
            color: #333;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #ffe4e1; /* สีพาสเทลชมพูอ่อน */
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            overflow-y: auto; /* เพื่อให้แถบเมนูเลื่อนลงได้ */
        }

        .sidebar a {
            display: block;
            color: #333;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #ffd1dc; /* สีพาสเทลชมพูเข้มขึ้นเมื่อ hover */
        }

        .sidebar a.active {
            background-color: #ff85a1; /* สีชมพูเข้ม */
            color: #ffffff;
        }

        .main-content {
            margin-left: 250px; /* เว้นพื้นที่สำหรับแถบเมนู */
            padding: 20px;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-body {
            padding: 30px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 500;
            color: #ff85a1;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .social-links a {
            color: #ff85a1;
            margin-right: 15px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #ff6680;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- แถบเมนูด้านข้าง -->
    <nav class="sidebar">
        <a href="dashboard.php">แดชบอร์ด</a>
        <a href="inventory.php">รายการสินค้า</a>
        <a href="search_product.php">ค้นหาสินค้า</a>
        <a href="about.php">เกี่ยวกับผู้จัดทำ</a> <!-- เมนูนี้ถูกเลือกในหน้านี้ -->
    </nav>

    <!-- เนื้อหาหลัก -->
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body text-center">
                                                        <h2>ผู้จัดทำเว็บไซต์</h2>
                            <p>นายศุภณัฐ เพ็ชรรัตน์</p>
                            <p>นางสาวฐิติยา รุกขพันธ์<p>
                            <p>นางสาวสุรางคนา พิรุณ<p>
                                <p>สาขาเทคโนโลยีธรุกิจดิจิทัล ปวส.2 วิทยาลัยการอาชีพสมเด็จเจ้าพะโคะ<p>
                            <div class="social-links">
                                <a href="https://www.facebook.com/profile.php?id=100014146664330" target="_blank"><i class="bi bi-facebook">วิทยาลัยการอาชีพสมเด็จเจ้าพะโคะ</i></a>
                                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ลิงก์ไปยัง Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ลิงก์ไปยังไอคอน Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
