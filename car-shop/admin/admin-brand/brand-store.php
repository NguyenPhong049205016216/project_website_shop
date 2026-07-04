<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../app/models/Brands.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST["brand_name"];
    $file_name = $_FILES["logo"]["name"];
    $tmp_name = $_FILES["logo"]["tmp_name"];
    $uploadFolder = __DIR__ . "/../../assets/images/cars/";
    move_uploaded_file($tmp_name, $uploadFolder . $file_name);
    $data = ["brand_name" => $brand_name, "logo" => "assets/images/cars/". $file_name];
    $brand = new Brands($conn);
    if ($brand->create($data)) {
        header("Location: ../brands.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>