<?php
session_start();
include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT u.id, u.username, u.password, r.role_name 
        FROM users u
        JOIN roles r ON u.role_id = r.id
        WHERE u.username='$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role_name'];

        if ($user['role_name'] == 'admin') {
            header("Location: addproduct.php");
        } else {
            header("Location: index.php");
        }
    } else {
        echo "❌ รหัสผ่านไม่ถูกต้อง";
    }
} else {
    echo "❌ ไม่พบชื่อผู้ใช้นี้";
}
?>