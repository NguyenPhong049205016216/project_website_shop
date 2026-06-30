<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "car_shop";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database,$port);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>