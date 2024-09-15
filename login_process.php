<?php
// เชื่อมต่อฐานข้อมูล
include 'db_connect2.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบชื่อผู้ใช้ในฐานข้อมูล
    $check_query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // ถ้ารหัสผ่านถูกต้อง ให้เข้าสู่ระบบ
            session_start();
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            // ถ้ารหัสผ่านไม่ถูกต้อง ให้แจ้งเตือน
            session_start();
            $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
            header('Location: login.php');
            exit();
        }
    } else {
        // ถ้าชื่อผู้ใช้ไม่ถูกต้อง ให้แจ้งเตือน
        session_start();
        $_SESSION['error'] = 'ชื่อผู้ใช้ไม่ถูกต้อง';
        header('Location: login.php');
        exit();
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
}
?>
