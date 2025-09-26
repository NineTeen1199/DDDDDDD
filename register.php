<?php
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
        echo "❌ ชื่อนี้ถูกใช้แล้ว";
    } else {
        $sql = "INSERT INTO users (username, password, role_id) 
                VALUES ('$username', '$hashed', '$role_id')";
        if ($conn->query($sql)) {
            echo "✅ สมัครสมาชิกสำเร็จ <a href='login_form.html'>เข้าสู่ระบบ</a>";
        } else {
            echo "❌ เกิดข้อผิดพลาด: " . $conn->error;
        }
    }
}
?>
