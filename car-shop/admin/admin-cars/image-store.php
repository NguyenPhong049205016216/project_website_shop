<?php
require __DIR__ . "/../../config/database.php";

if (isset($_POST['upload'])) {
    $car_id = intval($_POST['car_id']);
    $folder = __DIR__ . "/../../assets/images/img-cars-detail/";
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp) {
        if ($_FILES['images']['error'][$key] == 0) {
            $fileName = time() . "_" . $key . "_" . basename($_FILES['images']['name'][$key]);
            $targetFile = $folder . $fileName;

            if (move_uploaded_file($tmp, $targetFile)) {
                $image_urd = "assets/images/img-cars-detail/" . $fileName;

                $sql = "INSERT INTO car_images (car_id, image_urd) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "is", $car_id, $image_urd);
                mysqli_stmt_execute($stmt);
            }
        }
    }
    header("Location: /car-shop/admin/admin-cars/add-detail.php");
    exit;
}