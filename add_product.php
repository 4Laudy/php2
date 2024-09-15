<?php
include 'db_connect.php';

$success = false; // ตัวแปรเก็บสถานะการเพิ่มสินค้า

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มสินค้า
    $sql = "INSERT INTO products (product_id, name, category, quantity, price) 
            VALUES ('$product_id', '$name', '$category', '$quantity', '$price')";

    // ตรวจสอบว่าการเพิ่มสินค้าสำเร็จหรือไม่
    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <!-- ลิงก์ไปยัง Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if ($success): ?>
    <!-- แสดง Modal เมื่อเพิ่มสินค้าสำเร็จ -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    เพิ่มสินค้าสำเร็จ
                </div>
            </div>
        </div>
    </div>

    <script>
        // เมื่อเอกสารโหลดเสร็จ ให้แสดง modal
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // หลังจาก 2 วินาที รีไดเรกไปยังหน้า inventory.php
            setTimeout(function() {
                window.location.href = 'inventory.php';
            }, 2000);
        });
    </script>

<?php else: ?>
    <!-- แสดง error ถ้ามีปัญหา -->
    <div class="container mt-5">
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
        <a href="inventory.php" class="btn btn-primary">กลับไปที่รายการสินค้า</a>
    </div>
<?php endif; ?>

<!-- ลิงก์ไปยัง Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
