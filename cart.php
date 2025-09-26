<?php
session_start();

// เริ่มต้นตะกร้า
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// เพิ่มลงตะกร้า
if (isset($_POST['add'])) {
    $product_id = $_POST['id'];
    $product_name = $_POST['product'];
    $price = $_POST['price'];

    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = [
            'product' => $product_name,
            'price' => $price,
            'quantity' => 1
        ];
    }
}

// อัปเดตจำนวนสินค้า
if(isset($_POST['qty'])){
    foreach($_POST['qty'] as $product_id => $qty){
        if($qty > 0){
            $_SESSION['cart'][$product_id]['quantity'] = $qty;
        } else {
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

// ลบสินค้า
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    unset($_SESSION['cart'][$remove_id]);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ตะกร้าสินค้า</title>
  <link rel="stylesheet" href="cart.css">
  <script>
    // ให้ submit form อัตโนมัติเมื่อเปลี่ยนจำนวน
    function autoUpdate() {
      document.getElementById("cart-form").submit();
    }
  </script>
</head>
<body>

<div class="back-link-bar">
  <a href="index.php" class="back-link">กลับหน้าแรก</a>
</div>

<h2>ตะกร้าสินค้า</h2>

<form method="POST" id="cart-form">
<table>
  <tr>
    <th>สินค้า</th>
    <th>ราคา</th>
    <th>จำนวน</th>
    <th>รวม</th>
    <th>ลบ</th>
  </tr>
  <?php 
  $total = 0;
  foreach ($_SESSION['cart'] as $index => $item): 
    $sum = $item['price'] * $item['quantity'];
    $total += $sum;
  ?>
  <tr>
    <td><?= htmlspecialchars($item['product']) ?></td>
    <td><?= number_format($item['price'],2) ?></td>
    <td>
      <!-- เมื่อเปลี่ยนจำนวนจะ auto submit -->
      <input type="number" name="qty[<?= $index ?>]" 
             value="<?= $item['quantity'] ?>" 
             min="0" onchange="autoUpdate()">
    </td>
    <td><?= number_format($sum,2) ?></td>
    <td>
      <a href="cart.php?remove=<?= $index ?>">ยกเลิกทั้งหมด</a>
    </td>
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="3"><strong>รวมทั้งหมด</strong></td>
    <td colspan="2"><strong><?= number_format($total,2) ?></strong></td>
  </tr>
</table>

<div class="button-container">
  <!-- ไม่ต้องมีปุ่มอัปเดตแล้วก็ได้ แต่จะเก็บไว้ก็ได้ -->
  <!-- <button type="submit">อัปเดตจำนวน</button> -->
    <a href="order.php">ดูสินค้าอื่น</a>
  <a href="checkout.php">ชำระเงิน</a>

</div>

</form>

</body>
</html>
