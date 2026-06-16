<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/detail.css">
</head>

<?php
include "includes/header.php";
?>

<body class="car-detail-page">
    <div class="detail-wrapper">
        <!-- CỘT TRÁI -->
        <div class="gallery-section">
            <div class="main-image">
                <img src="/car-shop/assets/images/cars/toyota_1.png">
            </div>
            <div class="sub-images">
                <img src="/car-shop/assets/images/cars/toyota_2.png">
                <img src="/car-shop/assets/images/cars/toyota_3.png">
                <img src="/car-shop/assets/images/cars/toyota_3(vang).png">
                <img src="/car-shop/assets/images/cars/toyota_1.png">
            </div>
        </div>

        <!-- GIỮA -->
        <div class="info-section">
            <span class="car-brand">
                TOYOTA
            </span>
            <h1>Toyota GR Supra</h1>
            <p class="description">
                Toyota GR Supra là mẫu xe thể thao hiệu suất cao,
                thiết kế hiện đại, động cơ Turbo mạnh mẽ cùng nhiều
                công nghệ hỗ trợ lái tiên tiến.
            </p>
            <h2>Thông số kỹ thuật</h2>
            <div class="spec-grid">
                <div class="spec-box">
                    <span>Công suất</span>
                    <strong>382 HP</strong>
                </div>
                <div class="spec-box">
                    <span>Nhiên liệu</span>
                    <strong>Xăng</strong>
                </div>
                <div class="spec-box">
                    <span>Tốc độ</span>
                    <strong>250 km/h</strong>
                </div>
                <div class="spec-box">
                    <span>Hộp số</span>
                    <strong>AT 8 cấp</strong>
                </div>
                <div class="spec-box">
                    <span>Năm SX</span>
                    <strong>2024</strong>
                </div>
                <div class="spec-box">
                    <span>Loại xe</span>
                    <strong>Sport</strong>
                </div>

            </div>
            <h2>Tính năng nổi bật</h2>
            <div class="feature-grid">
                <div>✓ Cruise Control</div>
                <div>✓ Camera 360</div>
                <div>✓ Apple CarPlay</div>
                <div>✓ Android Auto</div>
                <div>✓ Cảm biến lùi</div>
                <div>✓ Màn hình 12.3"</div>

            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div class="booking-section">
            <div class="price-card">
                <h2>Giá bán</h2>
                <div class="price">
                    3.200.000.000đ
                </div>
                <p>Còn hàng</p>
                <a href="#" class="btn-cart">
                    Thêm giỏ hàng
                </a>
                <a href="#" class="btn-wishlist">
                    Thêm Wishlist
                </a>
            </div>

        </div>

    </div>

</body>
<?php 
include "includes/footer.php";
?>

</html>