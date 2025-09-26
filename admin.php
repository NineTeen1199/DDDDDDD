<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("คุณไม่มีสิทธิ์เข้าหน้านี้");
}
echo "ยินดีต้อนรับ Admin: " . $_SESSION['username'];
