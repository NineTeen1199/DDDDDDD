<?php
include 'db_connect.php';

// ฟังก์ชันอัปโหลดรูป
function uploadImage($fileInput){
    if(isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] == 0){
        $targetDir = "uploads/";
        if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $fileName = time() . "_" . basename($_FILES[$fileInput]["name"]);
        $targetFile = $targetDir . $fileName;

        $check = getimagesize($_FILES[$fileInput]["tmp_name"]);
        if($check !== false){
            if(move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFile)){
                return $targetFile;
            }
        }
    }
    return null;
}

// เพิ่มสินค้า
if (isset($_POST['add'])) {
    $name  = $_POST['name'];
    $price = $_POST['price'];

    // อัปโหลดไฟล์
    $image = uploadImage("image");
    // ถ้าไม่มีไฟล์ ใช้ลิงก์แทน
    if(!$image && !empty($_POST['image_url'])){
        $image = $_POST['image_url'];
    }

    if($image){
        $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
        $conn->query($sql);
    }
}

// อัปเดตสินค้า
if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];

    $image = uploadImage("image");
    if(!$image && !empty($_POST['image_url'])){
        $image = $_POST['image_url'];
    }

    if($image){
        $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
    }
    $conn->query($sql);
}

// ลบสินค้า
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $conn->query("DELETE FROM products WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin - จัดการสินค้า</title>
    <link rel="stylesheet" href="addproduct.css">
</head>
<body>

<div class="back-link-bar">
  <a href="index.php" class="back-link">กลับหน้าแรก</a>
</div>

<div class="container">
    <h2>แอดมิน - จัดการสินค้า</h2>

    <!-- ฟอร์มเพิ่มสินค้า -->
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="ชื่อสินค้า" required>
        <input type="number" name="price" placeholder="ราคา" step="0.01" required>
        
        <p><b>เลือกรูปภาพ (อัปโหลดหรือใส่ลิงก์):</b></p>
        <input type="file" name="image" accept="image/*">
        <br><br>
        <input type="text" name="image_url" placeholder="ลิงก์รูปภาพ (เช่น https://...jpg)">
        
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
            <form method="post" enctype="multipart/form-data">
                <td><?= $row['id'] ?></td>
                <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></td>
                <td><input type="number" name="price" value="<?= $row['price'] ?>"></td>
                <td>
                    <img src="<?= $row['image'] ?>" alt="" width="60"><br>
                    <input type="file" name="image" accept="image/*"><br><br>
                    <input type="text" name="image_url" value="<?= $row['image'] ?>">
                </td>
                <td>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="update" class="btn btn-edit">อัปเดต</button>
            </form>
            <form method="post" style="display:inline;" onsubmit="return confirm('ยืนยันการลบ?')">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
            </form>
                </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
