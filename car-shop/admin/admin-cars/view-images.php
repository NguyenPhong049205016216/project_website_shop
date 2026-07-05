<?php
require __DIR__ . "/../../config/database.php";
$id = $_GET['id'];
$sql = "SELECT *
FROM car_images
WHERE car_id='$id'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
        href="/car-shop/assets/css/ad-detail.css">
</head>
<body>
    <div class="gallery">
        <?php while ($img = mysqli_fetch_assoc($result)) { ?>
            <img
                src="/car-shop/<?= $img['image_urd'] ?>"
                class="gallery-img">
        <?php } ?>
    </div>
</body>

</html>