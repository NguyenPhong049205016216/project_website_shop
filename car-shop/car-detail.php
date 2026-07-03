<?php
require_once __DIR__ . "/config/database.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_cart'])) {
    $user_id = (int) $_SESSION['id'];
    $car_id = (int) $_POST['car_id'];

    $checkCart = mysqli_query($conn, "SELECT id, quantity FROM cart WHERE user_id = $user_id AND car_id = $car_id");

    if (mysqli_num_rows($checkCart) > 0) {
        $cartRow = mysqli_fetch_assoc($checkCart);
        $newQuantity = (int) $cartRow['quantity'] + 1;
        mysqli_query($conn, "UPDATE cart SET quantity = $newQuantity WHERE id = " . (int) $cartRow['id']);
    } else {
        mysqli_query($conn, "INSERT INTO cart (user_id, car_id, quantity) VALUES ($user_id, $car_id, 1)");
    }

    header("Location: car-detail.php?id=$car_id");
    exit();
}

if (!isset($_GET['id'])) {
    die("Không tìm thấy xe");
}

$id = $_GET['id'];

$sql = "SELECT cars.*, 
               brands.brand_name, 
               brands.logo,
               cartegories.cartegory_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        JOIN cartegories ON cars.categories_id = cartegories.id
        WHERE cars.id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Xe không tồn tại");
}

$car = mysqli_fetch_assoc($result);
?>

<head>
    <link rel="stylesheet" href="assets/css/detail.css">
</head>

<body class="car-detail-page">

    <?php include "includes/header.php"; ?>

    <main class="detail-wrapper">

        <!-- CỘT TRÁI -->
        <section class="gallery-section">
            <div class="gallery-top">
                <img class="badge-img" src="/car-shop/assets/images/cars/icon-new.png">
                <button class="heart-btn">
                    <img class="heart-img" src="/car-shop/assets/images/cars/wishlist.png">
                </button>
            </div>

            <div class="main-image">
                <!-- mũi tên qua trái -->
                <button class="arrow arrow-left">
                    <img src="/car-shop/assets/images/icon/mui_ten-left.png" class="btn-fr">
                </button>
                <!-- ảnh xe -->
                <img id="mainCarImage" src="/car-shop/<?php echo $car['main_image'] ?>" alt="<?php echo $car['cars_name'] ?>">
                <!-- mũi tên qua phải -->
                <button class="arrow arrow-right">
                    <img src="/car-shop/assets/images/icon/mui_ten.png">
                </button>
                <span class="image-count">1/4</span>
            </div>

            <div class="sub-images">
                <img class="thumb active" src="/car-shop/assets/images/cars/toyota_1.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_2.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_3.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_3(vang).png">
            </div>

            <div class="service-row">
                <div>
                    <span class="svc-icon">
                    </span>
                    <p>Bảo hành</p>
                    <strong>3 năm</strong>
                </div>
                <div>
                    <span class="svc-icon">
                    </span>
                    <p>Bảo dưỡng</p><strong>Miễn phí</strong>
                </div>
                <div>
                    <span class="svc-icon">

                    </span>
                    <p>Hỗ trợ</p><strong>24/7</strong>
                </div>
            </div>
        </section>

        <!-- CỘT GIỮA -->
        <section class="info-section">
            <div class="brand-row">
                <span class="brand-logo"> <img class="br=logo" src="/car-shop/<?php echo $car['logo']; ?>"></span> 
                <span class="car-brand"><?php echo $car['brand_name']; ?></span>
            </div>

            <h1><?php echo $car['cars_name'] ?> <span class="verify">●</span></h1>

            <div class="rating">
                <span>(0 đánh giá)</span>
            </div>

            <p class="description">
                <?php echo $car['description'] ?>
            </p>
            <!-- dữ nguyên -->
            <h2>
                <span class="section-icon">
                    <!-- icon thông số -->
                    <img src="/car-shop/assets/images/icon/thong-so-ky-thuat.png">
                </span>
                Thông số kỹ thuật
            </h2>
            <div class="spec-grid">
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon công suất -->
                        <img src="/car-shop/assets/images/icon/cong-xuat.png">
                    </span>
                    <p>Công suất</p>
                    <strong><?php echo $car['engine'] ?></strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon Nhiên liệu -->
                        <img src="/car-shop/assets/images/icon/nhien-lieu.png">
                    </span>
                    <p>Nhiên liệu</p>
                    <strong><?php echo $car['fuel_type'] ?></strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon tốc độ tối đa -->
                        <img src="/car-shop/assets/images/icon/toc-do.png">
                    </span>
                    <p>Trạng thái</p>
                    <strong><?php echo $car['status'] == 'available' ? 'Còn hàng' : 'Không còn hàng'; ?></strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon hộp số -->
                        <img src="/car-shop/assets/images/icon/hop-so.png">
                    </span>
                    <p>Hộp số</p>
                    <strong><?php echo $car['transmission'] ?></strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon năm sản xuất -->
                        <img src="/car-shop/assets/images/icon/nam-sx.png">
                    </span>
                    <p>Năm sản xuất</p><strong><?php echo $car['year'] ?></strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/loai-xe.png">
                        <!-- icon loại xe -->
                    </span>
                    <p>Loại xe</p>
                    <strong><?php echo $car['cartegory_name'] ?></strong>
                </div>
            </div>

            <h2>
                <span class="section-icon">
                    <!-- icon tính năng nỗi bật -->
                    <img src="/car-shop/assets/images/icon/tinh-nb.png">
                </span> Tính năng nổi bật
            </h2>

            <div class="feature-grid">
                <div>Cruise Control</div>
                <div>Camera 360</div>
                <div>Apple CarPlay</div>
                <div>Android Auto</div>
                <div>Cảm biến lùi</div>
                <div>Màn hình 12.3"</div>
            </div>
        </section>

        <!-- CỘT PHẢI -->
        <aside class="booking-section">
            <div class="price-card">
                <div class="price-title">
                    <h2>Giá bán</h2>
                    <span class="info-icon">i</span>
                </div>

                <div class="price"><?php echo number_format($car['price'], 0, ',', '.'); ?>đ</div>
                <p class="vat">(Đã gồm VAT)</p>

                <span class="stock"> <?php echo $car['status'] == 'available' ? 'Còn hàng' : 'Không còn hàng'; ?></span>

                <form method="POST" style="margin: 0;">
                    <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
                    <button type="submit" name="add_cart" class="btn-cart" style="width: 100%; border: none;">
                        <span class="icon">
                            <!-- icon Giỏ hàng -->
                            <img class="heart-img" src="/car-shop/assets/images/icon/gio-hang.png">
                        </span>
                        Thêm giỏ hàng
                    </button>
                </form>

                <form method="POST"class="btn-wishlist">
                    <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                    <button class="icon" name="wishlist" type="submit">
                        <img class="heart-img" src="/car-shop/assets/images/icon/wishlist.png" alt="wishlist">
                    </button>
                </form>
            </div>

            <div class="benefit-card">
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Cam kết chính hãng</strong>
                    <br>100% chính hãng Toyota</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Ưu đãi hấp dẫn</strong>
                    <br>Hỗ trợ trả góp đến 80%</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Đổi trả dễ dàng</strong>
                    <br>Đổi xe trong 7 ngày</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Giao xe tận nơi</strong>
                    <br>Miễn phí trong bán kính 50km</p>
                </div>
            </div>
        </aside>

    </main>

    <?php include "includes/footer.php"; ?>

    <script src="assets/js/detail.js"></script>
</body>