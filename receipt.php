<?php
include 'db_connect.php';
$id = $_GET['id'];

$order = $conn->query("SELECT * FROM orders WHERE id=$id")->fetch_assoc();
$items = $conn->query("SELECT * FROM order_items WHERE order_id=$id");
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ใบเสร็จ</title>
  <link rel="stylesheet" href="receipt.css">
</head>
<body>

<div class="back-link-bar">
  <a href="index.php" class="back-link">กลับหน้าแรก</a>
</div>

<div class="receipt">
  <div class="receipt-header">ใบเสร็จ</div>

  <div class="customer-info">
    <p><strong>บัตรคิว:</strong> #<?= $order['id'] ?></p>
    <p><strong>ชื่อลูกค้า:</strong> <?= $order['customer_name'] ?></p>
    <p><strong>เบอร์โทร:</strong> <?= $order['phone'] ?></p>
    <p><strong>วันที่:</strong> <?= $order['created_at'] ?></p>
  </div>

  <table>
    <tr>
      <th>สินค้า</th>
      <th>ราคา</th>
      <th>จำนวน</th>
      <th>รวม</th>
    </tr>
    <?php while($row = $items->fetch_assoc()): ?>
    <tr>
      <td><?= $row['product'] ?></td>
      <td><?= number_format($row['price'], 2) ?></td>
      <td><?= $row['quantity'] ?></td>
      <td><?= number_format($row['price'] * $row['quantity'], 2) ?></td>
    </tr>
    <?php endwhile; ?>
    <tr class="total-row">
      <td colspan="3">รวมทั้งหมด</td>
      <td><?= number_format($order['total'], 2) ?></td>
    </tr>
  </table>
</div>

</body>
</html>
