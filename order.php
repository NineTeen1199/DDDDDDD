<?php
include 'db_connect.php';
?>

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