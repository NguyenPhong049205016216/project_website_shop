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
    <div class="main">
        <!-- Cars New -->
        <h2 class="chapter" id="cars_new">Cars New</h2>
        <main class="cars_introduce">
            <div class="item">
                <img class="item_img" src="assets/images/cars/toyota_1.png" alt="Car 1">
                <div class="item_info">
                    <h3>Toyota Vios</h3>
                    <p>Giá: 545.000.000 VNĐ</p>
                    <a href="car_details.php?id=1" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img class="item_img" src="assets/images/cars/toyota_2.png" alt="Car 1">
                <div class="item_info">
                    <h3>Toyota Vios G  </h3>
                    <p>Giá: 650.000.000 VNĐ</p>
                    <a href="car_details.php?id=1" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img class="item_img" src="assets/images/cars/toyota_3.png" alt="Car 1">
                <div class="item_info">
                    <h3>Vios 1.5G - CVT</h3>
                    <p>Giá: 545.000.000 VNĐ</p>
                    <a href="car_details.php?id=1" class="btn">Xem chi tiết</a>
                </div>
            </div>

            <div class="item">
                <img class="item_img" src="assets/images/cars/toyota_3(vang).png" alt="Car 1">
                <div class="item_info">
                    <h3>Vios 1.5G - CVT</h3>
                    <p>Giá: 550.000.000 VNĐ</p>
                    <a href="car_details.php?id=1" class="btn">Xem chi tiết</a>
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

        <footer>
            <h1 class="chapter" id="footer">Contact</h1>
            <div class="left_footer">
                <h2>Cart me</h2>
                <p>chuyên cung cấp các loại xe hơi chất lượng cao, từ hạng sang đến thể thao, với dịch vụ khách hàng tận tâm và giá cả cạnh tranh.</p>
            </div>
            <div class="center_footer">
                <h2>Connect faster</h2>
                <a href="index.php">Trang chủ</a>
                <a href="car-details.php">Chi tiết xe</a>
                <a href="wishlist.php">Wishlist</a>
                <a href="cart.php">Giỏ hàng</a>
                <a href="cars.php">Xe hơi</a>
            </div>
            <div class="right_footer">
                <h2>Contact Us</h2>
                <p>https://www.cars.me.com</p>
                <p>Email: phong@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </footer>
    </div>
</body>

</html>