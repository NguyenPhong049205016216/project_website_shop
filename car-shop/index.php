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
                        <li><a href="#">Thông tin </a></li>
                        <li><a href="#">Thông tin </a></li>
                        <li><a href="#">Thông tin </a></li>
                        <li><a href="#">Thông tin</a></li>
                    </ul>
                </li>
                <li><a href="cars.php">Xe Hơi</a>
                    <ul class="sub_menu">

                    </ul>
                </li>
                <li><a href="wishlist.php">Wishlist</a>
                    <ul class="">

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
                <img class="banner" src="assets/images/cars/banner_senter.png" alt="logo_banner">
            </div>

        </section>

        </nav>
    </div>
</body>

</html>