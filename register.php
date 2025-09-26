<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ค่า Default role = user
    $role_id = 2; // 1=admin, 2=user

    // เข้ารหัสรหัสผ่าน
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // ตรวจสอบว่ามี username ซ้ำหรือไม่
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        echo "<script>alert('❌ ชื่อนี้ถูกใช้แล้ว'); window.location='register_form.html';</script>";
    } else {
        $sql = "INSERT INTO users (username, password, role_id) 
                VALUES ('$username', '$hashed', '$role_id')";
        if ($conn->query($sql)) {
            // ดึงข้อมูลผู้ใช้ใหม่เพื่อสร้าง session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';

            // ไปหน้า index.php อัตโนมัติ
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('❌ เกิดข้อผิดพลาด'); window.location='register_form.html';</script>";
        }
    }
}
?>
