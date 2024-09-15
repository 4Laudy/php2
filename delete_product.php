<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect.php';

$success = false; // ตัวแปรเก็บสถานะการลบสินค้า

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่ารหัสสินค้าที่ส่งมาจากฟอร์ม
    $product_id = $_POST['product_id'];

    // ตรวจสอบว่ามีรหัสสินค้าที่ส่งมา
    if (!empty($product_id)) {
        // ลบสินค้าจากฐานข้อมูล
        $sql = "DELETE FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_id); // ใช้ bind_param เพื่อป้องกัน SQL Injection

        if ($stmt->execute()) {
            // ลบสำเร็จ
            $success = true;
        } else {
            $error_message = "เกิดข้อผิดพลาดในการลบสินค้า: " . $conn->error;
        }

        $stmt->close();
    } else {
        $error_message = "ไม่พบรหัสสินค้า";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบสินค้า</title>
    <!-- ลิงก์ไปยัง Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if ($success): ?>
    <!-- แสดง Modal เมื่อการลบสำเร็จ -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                                <div class="modal-body">
                <h5 class="modal-title" id="successModalLabel">ลบสินค้าสำเร็จ</h5>
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
