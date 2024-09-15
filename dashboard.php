<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect.php';

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// ดึงข้อมูลสถิติ
$total_products = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ด</title>
    <!-- ลิงก์ไปยัง Bootstrap 5 และ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            font-family: 'Kodchasan', sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar */
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

        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ff85a1; /* สีชมพูเข้ม */
            color: #ffffff;
            border-radius: 15px 15px 0 0;
            font-weight: 600;
        }

        .card-body {
            background-color: #ffffff;
        }

        .card-body h5 {
            font-weight: 700;
            color: #333;
        }

        /* Custom button */
        .btn-primary {
            background-color: #ff85a1; /* ปุ่มสีชมพู */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff6680; /* ปุ่มสีชมพูเข้ม */
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
    <!-- Sidebar -->
    <div class="sidebar">
    <a href="dashboard.php">แดชบอร์ด</a>
        <a href="inventory.php">รายการสินค้า</a>
        <a href="search_product.php">ค้นหาสินค้า</a>
        <a href="about.php">เกี่ยวกับผู้จัดทำ</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Dashboard</h1>
        <div class="row">
            <!-- Cards -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        รายการสินค้าทั้งหมด
                    </div>
                    <div class="card-body">
                        <h5><?php echo $total_products; ?> รายการ</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ลิงก์ไปยัง Bootstrap 5 และ JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
