<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    die("คุณไม่มีสิทธิ์เข้าหน้านี้");
}
echo "สวัสดีคุณ " . $_SESSION['username'];