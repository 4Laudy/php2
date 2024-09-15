<?php
// เริ่ม session
session_start();

// เชื่อมต่อฐานข้อมูล
include 'db_connect2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // เข้ารหัสรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ตรวจสอบว่ามีชื่อผู้ใช้อยู่ในฐานข้อมูลหรือไม่
    $check_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ถ้ามีชื่อผู้ใช้อยู่แล้ว แสดงข้อความแจ้งเตือน
        $_SESSION['error'] = 'มีชื่อผู้ใช้นี้แล้ว';
        header("Location: register.php");
    } else {
        // ถ้าไม่มีชื่อผู้ใช้ในฐานข้อมูล ให้เพิ่มข้อมูลใหม่
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'ลงทะเบียนสำเร็จ!';
            header("Location: login.php");
        } else {
            $_SESSION['error'] = 'เกิดข้อผิดพลาดในการลงทะเบียน';
            header("Location: register.php");
        }
    }
}

$conn->close();
?>
