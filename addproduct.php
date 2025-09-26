<?php
include 'db_connect.php';

// เพิ่มสินค้า
if (isset($_POST['add'])) {
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    $conn->query($sql);
}

// อัปเดตสินค้า
if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";
    $conn->query($sql);
}

// ลบสินค้า
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin - จัดการสินค้า</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; }
        .container { width: 900px; margin: 30px auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: center; }
        input[type="text"], input[type="number"] { width: 90%; padding: 5px; }
        .btn { padding: 5px 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-danger { background: #dc3545; text-decoration:none; }
        .btn-edit { background: #28a745; text-decoration:none; }
    </style>
</head>
<body>
<div class="container">
    <h2>แอดมิน - จัดการสินค้า</h2>

    <!-- ฟอร์มเพิ่มสินค้า -->
    <form method="post">
        <input type="text" name="name" placeholder="ชื่อสินค้า" required>
        <input type="number" name="price" placeholder="ราคา" step="0.01" required>
        <input type="text" name="image" placeholder="ลิงก์รูปภาพ" required>
        <button type="submit" name="add" class="btn">เพิ่มสินค้า</button>
    </form>

    <!-- ตารางแสดงสินค้า -->
    <table>
        <tr>
            <th>ID</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>รูปภาพ</th>
            <th>จัดการ</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <form method="post">
                <td><?= $row['id'] ?></td>
                <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></td>
                <td><input type="number" name="price" value="<?= $row['price'] ?>"></td>
                <td>
                    <input type="text" name="image" value="<?= $row['image'] ?>">
                    <br>
                    <img src="<?= $row['image'] ?>" alt="" width="60">
                </td>
                <td>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="update" class="btn btn-edit">อัปเดต</button>
                    <a href="admin.php?delete=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
                </td>
            </form>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
