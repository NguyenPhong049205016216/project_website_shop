<?php
require_once __DIR__ . "/../../config/database.php";
if (!isset($_GET['id'])) {
    header("Location: /car-shop/admin/users.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "UPDATE user 
        SET status = 'blocket',
            updated_at = NOW()
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: /car-shop/admin/users.php");
    exit;
}

echo "Lỗi vô hiệu hóa user: " . mysqli_error($conn);