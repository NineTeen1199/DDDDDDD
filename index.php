<?php
session_start();
include 'db_connect.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอิน
$isAdmin = false;
if (isset($_SESSION['role_id'])) {
    $role_id = $_SESSION['role_id'];
    $sql_role = "SELECT role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql_role);
    $stmt->bind_param("i", $role_id);
    $stmt->execute();
    $result_role = $stmt->get_result();
    if ($row = $result_role->fetch_assoc()) {
        if ($row['role'] === 'admin') {
            $isAdmin = true;
        }
    }
    $stmt->close();
}

// query ดึงข้อมูลสินค้า
$sql = "SELECT id, name, price, image FROM products";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sugar & Smile</title>
  <link rel="stylesheet" href="index1.css">
</head>
<body>

  <!--  Start Navbar -->
<nav class="navbar">
    <div class="logo">Sugar & Smile</div>
    <ul class="nav-links">
      <li><a href="#">หน้าแรก</a></li>
      <li><a href="order.php">สินค้า</a></li>
      <li><a href="#promosion">โปรโมชั่น</a></li>
      <li><a href="cart.php">ตระกร้า</a></li>
      <li><a href="#">เกี่ยวกับเรา</a></li>
      <li><a href="#">ติดต่อเรา</a></li>

      
    </ul>
</nav>
<!-- End Navbar -->




  <!-- Start Hero Section -->
  <section class="hero">
    <div class="text-content">
      <h1>Sugar <span>& Smile</span></h1>
      <p>
        เราเชื่อว่าขนมหวานไม่ใช่แค่ของกินเล่น แต่คือ “ความสุขเล็กๆ” 
        ที่เติมเต็มทุกวัน ให้พิเศษยิ่งขึ้น กับร้าน Sugar & Smile 
        เราคัดสรรวัตถุดิบคุณภาพดี ใส่ใจในทุกขั้นตอนการทำ 
        ตั้งแต่การอบ กลิ่นหอมละมุน ไปจนถึงรสชาติที่ลงตัว 
        เพื่อให้คุณได้สัมผัสความหวานที่มาพร้อมรอยยิ้มในทุกคำ
      </p>

      <div class="buttons">
        <a href="order.php" class="btn-primary">สั่งซื้อ</a>
        <a href="login_form.html" class="btn-secondary">สมัครสมาชิก</a>
      </div>


    </div>
    <div class="image-content">
      <img src="m1/pngegg (2).png" alt="Macarons">
    </div>
  </section>

  <section class="menu-icons" >
    <div class="icon">
      <img src="m1/มาการอง.png" alt="มาการอง">
      <p>มาการอง</p>
    </div>
    <div class="icon">
      <img src="m1/เค้ก.png" alt="เค้ก">
      <p>เค้ก</p>
    </div>
    <div class="icon">
      <img src="m1/ไอติม.png" alt="ไอศกรีม">
      <p>ไอศกรีม</p>
    </div>
    <div class="icon">
      <img src="m1/โดนัทรวม.png" alt="โดนัท">
      <p>โดนัท</p>
    </div>
    <div class="icon">
      <img src="m1/น้ำปั่น.png" alt="เครื่องดื่ม">
      <p>เครื่องดื่ม</p>
    </div>
  </section>


  <!-- Best Seller -->
   <section class="menu" id="menu"></section>

  <section class="best-seller" id="menu">
    <div class="title-box">
      <h2>BEST SELLER</h2>
      <p class="subtitle">เมนูขายดีประจำร้าน</p>
    </div>

    <div class="menu-container">
      <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
              <div class="item">
                <div class="img-box">
                  <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                </div>
                <h3><?= htmlspecialchars($row['name']) ?></h3>
                <p>ราคา <?= htmlspecialchars($row['price']) ?> บาท</p>
                <form method="POST" action="cart.php">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <input type="hidden" name="product" value="<?= htmlspecialchars($row['name']) ?>">
                  <input type="hidden" name="price" value="<?= $row['price'] ?>">
                  <button type="submit" name="add">เพิ่มลงตะกร้า</button>
                </form>
              </div>
          <?php endwhile; ?>
      <?php else: ?>
          <p>ยังไม่มีสินค้า</p>
      <?php endif; ?>
    </div>
  </section>



 <section class="promosion" id="promosion"></section>
    <section class="promo-section">
    
    <!-- หัวข้อกลางบน -->
    <h1 class="promo-title">Happy Sweet Time โปรโมชั่นประจำเดือน</h1>
    
    <div class="promo-content">
      <!-- วิดีโอด้านซ้าย -->
      <div class="video-box">
        <video src="m1/111.mp4" autoplay loop muted playsinline></video>
      </div>

      <!-- เนื้อหาด้านขวา -->
      <div class="text-box">
        <ul>
          <li>โปรหวานๆ สำหรับคนพิเศษ! เฉพาะวันเสาร์-อาทิตย์ เค้กทุกชิ้นลด 15% ให้คุณได้เต็มเติมความสุขในวันหยุดกับคนที่คุณรัก</li>
          <li>ห้ามพลาด! สมัครสมาชิกวันนี้ รับคูปองส่วนลด 50 บาท สำหรับการสั่งซื้อครั้งแรก พร้อมสิทธิ์อัปเดตเมนูใหม่ๆ ก่อนใคร</li>
          <li>ความอร่อยยิ่งคุ้ม! ทุกการสั่งซื้อครบ 500 บาท รับส่วนลดทันที 10% และสิทธิ์สะสมแต้มเพื่อแลกขนมฟรีในครั้งถัดไป</li>
        </ul>
        <p>
          <strong>Sugar & Smile</strong> คือร้านขนมหวานที่ตั้งใจมอบทั้ง 
          “ความหวาน” และ “รอยยิ้ม” ให้กับทุกคนที่แวะมา 
          เราคัดสรรวัตถุดิบคุณภาพดี ใส่ใจในทุกขั้นตอนการทำ 
          ไม่ว่าจะเป็นเค้กหอมละมุน คุกกี้กรุบกรอบ หรือเบเกอรี่ร้อนๆ 
          สดใหม่ทุกวัน เราเชื่อว่าขนมหวานไม่ได้ทำให้แค่ อิ่มท้อง 
          แต่ยังทำให้หัวใจอิ่มความสุขด้วย ทุกเมนูของเรา 
          จึงอบอวลด้วยความตั้งใจ ความสดใหม่ และรสชาติที่ลงตัว 
          เพื่อเติมเต็มช่วงเวลาพิเศษให้กับคุณและคนที่คุณรัก
        </p>
      </div>
    </div>
  </section>
  
</body>
</html>