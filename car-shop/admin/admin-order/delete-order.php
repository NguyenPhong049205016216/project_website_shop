<?php
require_once __DIR__ . "/../../config/database.php";
if (!isset($_GET['id'])) {
    header("Location: /car-shop/admin/orders.php");
    exit;
}
$id = (int) $_GET['id'];
$sql = "DELETE FROM orders WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: /car-shop/admin/orders.php");
    exit;
}

echo "Lỗi xóa đơn hàng: " . mysqli_error($conn);