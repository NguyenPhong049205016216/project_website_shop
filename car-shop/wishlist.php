<?php
require_once __DIR__ . '/config/database.php';
// ensure $conn is available
if (!isset($conn) || !$conn) {
    die('Database connection not found.');
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['id'];
if (isset($_POST['remove_wishlist'])) {
    $car_id = $_POST['car_id'];
    mysqli_query($conn, "
        DELETE FROM wishlist
        WHERE user_id = $user
        AND car_id = $car_id
    ");
    header("Location: wishlist.php");
    exit();
}
$sql = "SELECT c.*, b.brand_name, ct.cartegory_name,
coalesce(ci.image_urd,c.main_image) as image
FROM wishlist w
JOIN cars c
ON w.car_id=c.id
JOIN brands b
ON c.brand_id=b.id
JOIN cartegories ct
ON c.categories_id=ct.id
left JOIN car_images ci
on c.id=ci.car_id
WHERE w.user_id=$user";

$result = mysqli_query($conn, $sql);
$wishlist_count = mysqli_num_rows($result);

$title = "Trang Chủ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="assets/css/wishlist1.css">
</head>
<?php include "includes/header.php"; ?>

<body>
    <div class="main">
        <section class="middle-content">
            <div class="content-layout">
                <div class="content-box">
                    <div class="box-mid">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="wishlist_item">
                                    <div class="wishlist_card">
                                        <form method="POST">
                                            <input type="hidden" name="car_id" value="<?= $row['id'] ?>">
                                            <button type="submit" name="remove_wishlist" class="remove_wishlist_btn" style="background:none;border:none;">
                                                <img src="assets/images/icon/trash.png" style="width: 50px; height: 50px; cursor: pointer;">
                                            </button>
                                        </form>
                                        <img src="<?= $row['image'] ?>" alt="<?= $row['cars_name'] ?>" class="wishlist_img">
                                        <h3><?= $row['brand_name'] ?></h3>
                                        <h3><?= $row['cars_name'] ?></h3>
                                        <p><?= $row['cartegory_name'] ?></p>
                                        <p><?= number_format($row['price']) ?> Vnđ</p>
                                        <a href="car-detail.php?id=<?= $row['id'] ?>" class="detail-btn"> xem chi tiết</a>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="box-content-else">
                                <div class="box-img-content">
                                    <img src="assets/images/cars/document.png" alt="Document" class="document-icon">
                                </div>
                                <h3>Chưa có sản phẩm nào được yêu thích</h3>
                                <p>Khi bạn yêu thích sản phẩm, sản phẩm được yêu thích sẽ nằm ở đây.</p>
                                <span onclick="navToPage('cars.php')">Khám phá ngay</span>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="assets/js/wishlist1.js"></script>
</body>
<!-- Footer -->
<?php
include "includes/footer.php";
?>

</html>