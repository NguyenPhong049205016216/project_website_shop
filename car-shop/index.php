<?php
$title = "Trang Chủ";
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <section>
        <div class="content">
            <h1 class="title_name">GR Supra</h1>
            <h1 class="title_name">DRIVE YOUR DREAM CARS</h1><br>
            <p class="title_name">khám phá cửa hàng xe, từ hạng sang, thể thao, đến gia đình bạn khám phá ngay</p><br>
            <a href="#" class="title-btn">Xem ngay</a>
            <img class="logo_xe" src="/car-shop/assets/images/cars/logo_banner.png" alt="Banner"></img>
        </div>
    </section>
    <div class="main">
        <!-- Cars New -->
        <h2 class="chapter" id="cars_new">Cars New</h2>
        <main class="cars_introduce">
            <div class="item">
                <img src="/car-shop/assets/images/cars/icon-new.png" class="cars_itdnew">
                <img class="item_img" src="assets/images/cars/toyota_1.png" alt="Car 1">
                <div class="item_info">
                    <h3>Toyota Vios</h3>
                    <p>Giá: 545.000.000 VNĐ</p>
                    <a href="car-detail.php" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img src="/car-shop/assets/images/cars/icon-new.png" class="cars_itdnew">
                <img class="item_img" src="assets/images/cars/toyota_2.png" alt="Car 1">
                <div class="item_info">
                    <h3>Toyota Vios G </h3>
                    <p>Giá: 650.000.000 VNĐ</p>
                    <a href="car-detail.php" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img src="/car-shop/assets/images/cars/icon-new.png" class="cars_itdnew">
                <img class="item_img" src="assets/images/cars/toyota_3.png" alt="Car 1">
                <div class="item_info">
                    <h3>Vios 1.5G - CVT</h3>
                    <p>Giá: 545.000.000 VNĐ</p>
                    <a href="car-detail.php" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img src="/car-shop/assets/images/cars/icon-new.png" class="cars_itdnew">
                <img class="item_img" src="assets/images/cars/toyota_3(vang).png" alt="Car 1">
                <div class="item_info">
                    <h3>Vios 1.5G - CVT</h3>
                    <p>Giá: 550.000.000 VNĐ</p>
                    <a href="car-detail.php" class="btn">Xem chi tiết</a>
                </div>
            </div>

        </main>

        <!-- thương hiệu -->
        <h1 class="chapter" id="Brands">Card Brands</h1>
        <main class="cars_brands">
            <div class="item_brands">
                <img class="img_brands" src="assets/images/cars/icon_trademark_toyota.png" alt="trademark 1">
            </div>
            <div class="item_brands">
                <img class="img_brands" src="assets/images/cars/icon_Audi.png" alt="trademark 1">
            </div>
            <div class="item_brands">
                <img class="img_brands" src="assets/images/cars/icon_vinfast.png" alt="trademark 1">
            </div>
        </main>
        <h1 class="chapter" id="best_sellers">Best Sellers</h1>

        <h1 class="chapter" id="promotion">Promotions</h1>
    </div>
</body>

<!-- Footer -->
<?php
include "includes/footer.php";
?>

</html>