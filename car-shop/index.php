<?php
require_once __DIR__ . "/config/database.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sql = "SELECT cars.*, brands.brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        -- chỉ hiện xe có status là available
        WHERE cars.status = 'available'
        ORDER BY cars.id DESC
        -- chỉ hiệt tối đa là 10 chiếc
        LIMIT 10";
$resultCarsNew = mysqli_query($conn, $sql);
$sqlBrands = "SELECT * FROM brands ORDER BY id DESC";
$resultBrands = mysqli_query($conn, $sqlBrands);
?>

<?php
$title = "Trang Chủ";
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car-shop</title>
    <link rel="stylesheet" href="/car-shop/assets/css/home.css">
</head>
<script>
let totalSeconds = 12 * 60 * 60 + 30 * 60 + 45;
setInterval(function(){
    let h = Math.floor(totalSeconds / 3600);
    let m = Math.floor((totalSeconds % 3600) / 60);
    let s = totalSeconds % 60;
    document.getElementById("hours").innerText = h;
    document.getElementById("minutes").innerText = m;
    document.getElementById("seconds").innerText = s;
    if(totalSeconds > 0){
        totalSeconds--;
    }
}, 1000);
</script>

<body>
    <section class="index-section">
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
            <?php while ($car = mysqli_fetch_assoc($resultCarsNew)) { ?>
                <div class="item">
                    <img src="/car-shop/assets/images/cars/icon-new.png" class="cars_itdnew">
                    <img class="item_img" src="/car-shop/<?php echo $car['main_image']; ?>"
                        alt="<?php echo $car['cars_name']; ?>">
                    <div class="item_info">
                        <h3><?php echo $car['cars_name'] ?></h3>
                        <p>Giá: <?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="#" class="btn">Mua ngay</a>
                        <a href="car-detail.php?id=<?php echo $car['id']; ?>" class="btn">Xem chi tiết</a>
                    </div>
                </div>
            <?php } ?>
        </main>

        <!-- thương hiệu -->
        <h1 class="chapter" id="Brands">Card Brands</h1>
        <main class="cars_brands">
            <?php while ($brand = mysqli_fetch_assoc($resultBrands)) { ?>
                <div class="item_brands">
                    <img class="img_brands" src="/car-shop/<?php echo $brand['logo']; ?>" alt="<?php echo $brand['brand_name']; ?>">
                </div>
            <?php } ?>
        </main>

        <h1 class="chapter" id="best_sellers">Best Sellers</h1>
        <div class="cars_introduce">
            <section class="best-seller-section">
                <!-- thẻ giờ  -->
                <div class="deal-timer">
                    <span>FLASH SALE</span>
                    <h2>Ưu đãi xe bán chạy</h2>
                    <p>Thời gian giảm giá còn lại</p>
                    <div class="countdown">
                        <div>
                            <h3 id="hours">12</h3>
                            <small>Giờ</small>
                        </div>
                        <div>
                            <h3 id="minutes">30</h3>
                            <small>Phút</small>
                        </div>
                        <div>
                            <h3 id="seconds">45</h3>
                            <small>Giây</small>
                        </div>
                    </div>
                </div>
                <!-- thẻ item best seller -->
                <div class="best-cars-list">
                    <div class="best-car-card">
                        <img src="/car-shop/assets/images/img-cars/Audi_bantai.png">
                        <h3>Audi SUV White</h3>
                        <p class="old-price">2.500.000.000 VNĐ</p>
                        <p class="sale-price">2.250.000.000 VNĐ</p>
                        <a href="car-detail.php">Xem chi tiết</a>
                    </div>
                    <div class="best-car-card">
                        <img src="/car-shop/assets/images/img-cars/toyota_3.png">
                        <h3>Toyota SUV Red</h3>
                        <p class="old-price">850.000.000 VNĐ</p>
                        <p class="sale-price">799.000.000 VNĐ</p>
                        <a href="car-detail.php">Xem chi tiết</a>
                    </div>

                    <div class="best-car-card">
                        <img src="/car-shop/assets/images/img-cars/Vinfast_Vs5.png">
                        <h3>VinFast VF5</h3>
                        <p class="old-price">600.000.000 VNĐ</p>
                        <p class="sale-price">550.000.000 VNĐ</p>
                        <a href="car-detail.php">Xem chi tiết</a>
                    </div>
                </div>
            </section>
        </div>
        <h1 class="chapter" id="promotion">Promotions</h1>


    </div>
</body>

<!-- Footer -->
<?php
include "includes/footer.php";
?>

</html>