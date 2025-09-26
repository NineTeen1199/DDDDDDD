<?php
include 'db_connect.php';
?>



<link rel="stylesheet" href="order.css">
 <!--  Start Navbar -->
<nav class="navbar">
    <div class="logo">Sugar & Smile</div>
    <ul class="nav-links">
      <li><a href="index.php">หน้าแรก</a></li>
      <li><a href="#menu">สินค้า</a></li>
      <li><a href="#promosion">โปรโมชั่น</a></li>
      <li><a href="cart.php">ตระกร้า</a></li>
      <li><a href="#">เกี่ยวกับเรา</a></li>
      <li><a href="#">ติดต่อเรา</a></li>

      
    </ul>
</nav>
<!-- End Navbar -->
<section class="best-seller">
  <div class="menu-container">
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="item">';
            echo '  <div class="img-box"><img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '"></div>';
            echo '  <h3>' . htmlspecialchars($row['name']) . '</h3>';
            echo '  <p>ราคา ' . number_format($row['price'],2) . ' บาท</p>';
            echo '  <form method="POST" action="cart.php">';
            echo '      <input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '      <input type="hidden" name="product" value="' . htmlspecialchars($row['name']) . '">';
            echo '      <input type="hidden" name="price" value="' . $row['price'] . '">';
            echo '      <button type="submit" name="add">เพิ่มลงตะกร้า</button>';
            echo '  </form>';
            echo '</div>';
        }
    } else {
        echo "<p>ยังไม่มีสินค้าในร้าน</p>";
    }
    ?>
  </div>
</section>