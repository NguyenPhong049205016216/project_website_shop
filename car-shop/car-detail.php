<?php
$title = "Chi tiết xe";
include "includes/header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/car-shop/assets/css/detail.css">
</head>

<body class="body-car-detail">
    <h1 class="chapter-cardetail">Cars details</h1>
    <main class="detail-container">

        <div class="detail-image-box">
            <img src="/car-shop/assets/images/cars/toyota_1.png" alt="Toyota GR Supra">
        </div>

        <div class="detail-content-box">

            <span class="detail-status">CÒN HÀNG</span>

            <h1>Toyota GR Supra</h1>

            <p class="detail-price">3.200.000.000 VNĐ</p>

            <p class="detail-description">
                Toyota GR Supra là mẫu xe thể thao có thiết kế mạnh mẽ,
                động cơ Turbo hiện đại, phù hợp với khách hàng yêu thích tốc độ,
                phong cách và trải nghiệm lái cao cấp.
            </p>

            <div class="detail-specs">

                <div class="spec-item">
                    <span>Hãng xe</span>
                    <strong>Toyota</strong>
                </div>

                <div class="spec-item">
                    <span>Loại xe</span>
                    <strong>Sport Car</strong>
                </div>

                <div class="spec-item">
                    <span>Năm sản xuất</span>
                    <strong>2024</strong>
                </div>

                <div class="spec-item">
                    <span>Nhiên liệu</span>
                    <strong>Xăng</strong>
                </div>

                <div class="spec-item">
                    <span>Hộp số</span>
                    <strong>Tự động</strong>
                </div>

                <div class="spec-item">
                    <span>Màu sắc</span>
                    <strong>Đỏ</strong>
                </div>

            </div>

            <div class="detail-buttons">
                <a href="cart.php" class="btn-cart">Thêm giỏ hàng</a>
                <a href="wishlist.php" class="btn-wishlist">Thêm wishlist</a>
            </div>

        </div>

</main>

    <div class="detail-gallery">
        <img src="/car-shop/assets/images/cars/toyota_1.png" alt="">
        <img src="/car-shop/assets/images/cars/toyota_2.png" alt="">
        <img src="/car-shop/assets/images/cars/toyota_3.png" alt="">
    </div>



</body>

<?php include "includes/footer.php"; ?>

</html>