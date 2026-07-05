<?php
require_once __DIR__ . "/../../config/database.php";

if (!isset($_GET['id'])) {
    header("Location: /car-shop/admin/brands.php");
    exit;
}

$id = (int)$_GET['id'];

$sql = "
UPDATE brands
SET status='deleted'
WHERE id=$id";

if(mysqli_query($conn,$sql)){
    header("Location: /car-shop/admin/brands.php");
    exit;
}else{
    echo mysqli_error($conn);
}