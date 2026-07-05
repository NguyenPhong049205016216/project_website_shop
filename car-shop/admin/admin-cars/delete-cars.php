<?php
require_once __DIR__ . "/../../config/database.php";
if (!isset($_GET['id'])) {
    header("Location: /car-shop/admin/cars.php");
    exit;
}
$id = (int) $_GET['id'];
$sql = "UPDATE cars
        SET status = 'hidden'
        WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: /car-shop/admin/cars.php");
    exit;
}
echo "Lỗi xóa xe: " . mysqli_error($conn);