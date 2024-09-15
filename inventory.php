<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect.php';

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คสต็อกสินค้า</title>
    <!-- ลิงก์ไปยัง Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- ลิงก์ไปยัง Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Kodchasan', sans-serif;
            background-color: #f8f9fa;
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

        .form-group {
            margin-bottom: 15px;
        }

        /* Custom button */
        .btn-primary {
            background-color: #ff85a1; /* ปุ่มสีชมพู */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff6680; /* ปุ่มสีชมพูเข้ม */
        }


        .btn-custom {
            background-color: #b3e5fc; /* สีพาสเทลฟ้าอ่อน */
            color: white;
        }

        .btn-custom:hover {
            background-color: #81d4fa; /* สีพาสเทลฟ้าเข้มขึ้นเมื่อ hover */
        }

        .btn-danger-custom {
            background-color: #ffccbc; /* สีพาสเทลแดงอ่อน */
            color: white;
        }

        .btn-danger-custom:hover {
            background-color: #ffab91; /* สีพาสเทลแดงเข้มขึ้นเมื่อ hover */
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
        <a href="about.php">เกี่ยวกับผู้จัดทำ</a>
        
    </nav>
        
    <!-- เนื้อหาหลัก -->
    <div class="main-content">
        <section id="inventory">
            <h2 class="mb-4">รายการสินค้า</h2>

            <!-- ฟอร์มเพิ่มสินค้า -->
             <form action="add_product.php" method="POST" class="mb-4">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="product-id" class="form-label">รหัสสินค้า</label>
                            <input type="text" id="product-id" name="product_id" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="product-name" class="form-label">ชื่อสินค้า</label>
                            <input type="text" id="product-name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="product-category" class="form-label">หมวดหมู่</label>
                            <select id="product-category" name="category" class="form-select" required>
                                <option value="" disabled selected>เลือกหมวดหมู่</option>
                                <option value="ปากกา">ปากกา</option>
                                <option value="ไม้บรรทัด">ไม้บรรทัด</option>
                                <option value="ยางลบ">ยางลบ</option>
                                <option value="ดินสอ">ดินสอ</option>
                                <option value="กบเหลา">กบเหลา</option>
                                <option value="กระดาษ">กระดาษ</option>
                                <option value="เสื้อนักเรียน">เสื้อนักเรียน</option>
                                <option value="กางเกงนักเรียน">กางเกงนักเรียน</option>
                                <option value="รองเท้านักเรียน">รองเท้านักเรียน</option>
                                <option value="ถุงเท้า">ถุงเท้า</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="product-quantity" class="form-label">จำนวนคงเหลือ</label>
                            <input type="number" id="product-quantity" name="quantity" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="product-price" class="form-label">ราคาขาย</label>
                            <input type="number" id="product-price" name="price" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="submit" class="btn btn-custom w-100">เพิ่มสินค้า</button>
                    </div>
                </div>
            </form>

            <!-- ตารางสินค้า -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>หมวดหมู่</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>ราคาขาย</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
                        if ($result->num_rows > 0) {
                            // วนลูปแสดงข้อมูลแต่ละแถว
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                                echo "<td>";
                                echo "<form action='delete_product.php' method='POST' style='display:inline;'>";
                                echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row['product_id']) . "'>";
                                echo "<button type='submit' class='btn btn-danger-custom'>ลบ</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูลสินค้า</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- ลิงก์ไปยัง Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
