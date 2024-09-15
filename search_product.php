<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect.php';

// รับค่าการค้นหาจากฟอร์ม
$search_term = '';
if (isset($_GET['search'])) {
    $search_term = htmlspecialchars($_GET['search']);
}

// คำสั่ง SQL ค้นหาสินค้า
$sql = "SELECT * FROM products WHERE name LIKE ? OR category LIKE ?";
$stmt = $conn->prepare($sql);
$like_search_term = "%$search_term%";
$stmt->bind_param("ss", $like_search_term, $like_search_term);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาสินค้า</title>
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
            overflow-y: auto;
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

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: #ff66b2; /* สีพาสเทลชมพู */
            color: white;
        }

        .btn-custom:hover {
            background-color: #ff4d94; /* สีชมพูเข้มขึ้นเมื่อ hover */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #ffe4e1; /* สีพาสเทลชมพูอ่อน */
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ffffff; /* สีพื้นหลังของแถวคู่ */
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
        <section id="search-product">
            <h2 class="mb-4">ค้นหาสินค้า</h2>

            <!-- ฟอร์มค้นหา -->
            <form action="search_product.php" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="search" class="form-label">ค้นหาสินค้า (ชื่อหรือหมวดหมู่)</label>
                            <input type="text" id="search" name="search" class="form-control" placeholder="กรอกชื่อหรือหมวดหมู่สินค้า" value="<?php echo $search_term; ?>">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-custom w-100">ค้นหา</button>
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
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>ไม่พบสินค้า</td></tr>";
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
