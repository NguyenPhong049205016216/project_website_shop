<?php
$title = "Car Shop";
?>

<!DOCTYPE html>
<html>

<head>
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
                        <li><a href="#">introduce</a></li>
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

        <section>
            <div class="logo_banner">
                <img class="banner" src="assets/images/cars/banner_senter_1.png" alt="logo_banner">
            </div>

        </section>

        </nav>
    </div>
</body>

</html>