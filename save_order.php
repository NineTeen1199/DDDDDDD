<?php
session_start();
include 'db_connect.php';

// ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0):
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งเตือน</title>
    <link rel="stylesheet" href="save_order.css">
</head>
<body>
    <div class="alert-card">
        <h1>ไม่มีสินค้าในตะกร้า</h1>
        <p>คุณยังไม่ได้เพิ่มสินค้าใด ๆ กรุณากลับไปเลือกสินค้าก่อนทำรายการสั่งซื้อ</p>
        <a href="index.html" class="btn">กลับหน้าหลัก</a>
    </div>
</body>
</html>
<?php
exit(); // หยุดการทำงานต่อถ้าไม่มีสินค้า
endif;

// --- ถ้ามีสินค้าในตะกร้า โค้ดสั่งซื้อและบันทึกฐานข้อมูล ---
$name = $_POST['name'];
$phone = $_POST['phone'];

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$conn->query("INSERT INTO orders (customer_name, phone, total) VALUES ('$name', '$phone', '$total')");
$order_id = $conn->insert_id;

foreach ($_SESSION['cart'] as $item) {
    $product = $item['product'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $conn->query("INSERT INTO order_items (order_id, product, price, quantity) 
                  VALUES ('$order_id','$product','$price','$quantity')");
}

$_SESSION['cart'] = []; // ล้างตะกร้า

header("Location: receipt.php?id=$order_id");
exit();
?>
