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
                <button> Logint</button>
            </div>
        </header>

        <nav>
            <ul class="menu">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="cars.php">Xe Hơi</a></li>
                <li><a href="wishlist.php">Wishlist</a></li>
                <li><a href="cart.php">Giỏ Hàng</a></li>
            </ul>
        </nav>

        <section>
            <div class="section">
                <h1>
                    xin chào bạn đến với cữa hàng bán xe! 
                </h1>
                <p> Future cars </p>
            </div>
        </section>

        </nav>
    </div>
</body>

</html>