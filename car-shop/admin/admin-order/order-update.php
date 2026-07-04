<?php
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../orders.php");
    exit();
}

$order_id = (int)$_POST['order_id'];
$status   = $_POST['status'];

$allowed = ['pending', 'confirmed', 'cancelled', 'completed'];
if (!in_array($status, $allowed)) {
    header("Location: ../orders.php");
    exit();
}

mysqli_query($conn, "UPDATE orders SET status = '$status' WHERE id = $order_id");

header("Location: ../order-detail.php?id=$order_id&updated=1");
exit();