<?php
require_once __DIR__ . "/../../config/database.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "UPDATE `user`
            SET status = 'inactive'
            WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: users.php");
    exit();
}
?>