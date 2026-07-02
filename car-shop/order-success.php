<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
$title = "Đặt hàng thành công";
include "includes/header.php";
?>

<link rel="stylesheet" href="/car-shop/assets/css/checkout.css">

<main class="success-wrapper">
    <div class="success-box">
        <div class="success-icon">✓</div>
        <h2>Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ xác nhận trong thời gian sớm nhất.</p>
        <div class="success-actions">
            <a href="index.php" class="btn-home">Về trang chủ</a>
            <a href="cars.php" class="btn-continue">Tiếp tục mua xe</a>
        </div>
    </div>
</main>

<?php include "includes/footer.php"; ?>
</body>
</html>