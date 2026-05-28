<?php
$title = "Car Shop";
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
        <header>
            <div class="logo">
                <img src="assets/images/cars/logo_cars_2.png" alt="Logo">
            </div>
            <div class="search">
                <form>
                    <input type="text" id="search" placeholder="Tìm kiếm xe bạn muốn">
                </form>
            </div>
            <div class="User">
                <button>Login</button>
            </div>
        </header>

        <nav>
            <ul class="menu">
                <li><a href="index.php">Trang Chủ</a>
                    <ul class="top_menu">
                        <li><a href="index.php">introduce</a></li>
                        <li><a href="#">cars new</a></li>
                        <li><a href="#">best sell</a></li>
                        <li><a href="#">promotion</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </li>
                <li><a href="cars.php">Xe Hơi</a>
                    <ul class="sub_menu">
                        <li><a href="#">Hảng xe</a></li>
                        <li><a href="#">Loại xe</a></li>
                        <li><a href="#">Giá xe</a></li>
                        <li><a href="#">Tình trạng</a></li>
                    </ul>
                </li>
                <li><a href="wishlist.php">Wishlist</a>
                    <ul class="bex_menu">
                        <li><a href="#">save cars</a></li>
                        <li><a href="#">liked recently</a></li>
                        <li><a href="#">See list later</a></li>
                        <li><a href="#">undersell</a></li>
                    </ul>
                </li>
                <li><a href="cart.php">Giỏ Hàng</a>
                    <ul>

                    </ul>
                </li>
            </ul>
        </nav>

        <section class="herro_carstitle">
            <div class="content">
                <h1 class="title_name">GR Supra</h1>
                <h1 class="title_anime">DRIVE YOUR DREAM CARS</h1><br>
                <p class="title_anime">khám phá cửa hàng xe, từ hạng sang, thể thao, đến gia đình bạn khám phá ngay</p><br>
                <button>Khám phá ngay</button>
                <img class="logo_xe" src="assets/images/cars/logo_banner.png"></img>
            </div>

            <div class="logo_banner">
                <img class="banner" src="assets/images/cars/backrout_banner.png" alt="logo_banner">
            </div>
        </section>

        <section class="hero_carsnew">
            <div class="cars_new">
                <h1> Cars New </h1><br>
                <div class="car_list">
                    <div class="car_card">
                        <img class="cars_img" src="assets/images/cars/toyota_1.png">
                        <h2> name xe </h2>
                        <p> giá xe </p>
                        <a href="cart_detail.php"> Xem chi tiết </a>
                    </div>

                    <div class="car_card">
                        <img class="cars_img" src="assets/images/cars/toyota_2.png">
                        <h2> name xe </h2>
                        <p> giá xe </p>
                        <a href="cart_detail.php"> Xem chi tiết </a>
                    </div>

                    <div class="car_card">
                        <img class="cars_img" src="assets/images/cars/toyota_3.png">
                        <h2> name xe </h2>
                        <p> giá xe </p>
                        <a href="cart_detail.php"> Xem chi tiết </a>
                    </div>
                    <div class="car_table"></div>

                </div>
                </dip>
        </section>

    </div>
</body>

</html>