<?php session_start(); ?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลลูกค้า</title>
  <link rel="stylesheet" href="chekout.css">
  <!-- ใช้ Font Awesome สำหรับไอคอน -->
  <script src="https://kit.fontawesome.com/6dcf02c8a0.js" crossorigin="anonymous"></script>
</head>
<body>
 <div class="back-link-bar">
  <a href="cart.php" class="back-link">กลับหน้าแรก</a>
</div>
  <div class="form-container">
    <h2>ข้อมูลลูกค้า</h2>
    <div class="underline"></div>
    <form method="POST" action="save_order.php">
      <div class="input-group">
        <input type="text" name="name" placeholder="ชื่อ - นามสกุล" required>
        <i class="fas fa-user"></i>
      </div>
      <div class="input-group">
        <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required pattern="[0-9]{10}">
        <i class="fas fa-phone"></i>
      </div>
      <button type="submit">ยืนยันคำสั่งซื้อ</button>
    </form>
  </div>
</body>
</html>