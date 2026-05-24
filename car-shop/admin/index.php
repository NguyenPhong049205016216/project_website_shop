<?php
$title = "Car Shop";
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>

<body>
    <div class="main">
        <header>
            <div class="logo">
                <img src="../assets/images/cars/logo_cars_1.png" alt="Logo">
            </div>
            <div class="search">
                <form>
                    <input type="text" id="search" placeholder="Tìm kiếm thông tin">
                </form>
            </div>
            <div class="User">
                <button >Đăng Ký</button>
                <button >Đăng Nhập</button>
            </div>
        </header>

        <nav>
            <ul class="menu">
                <li><a href="../index.php">Trang Chủ</a></li>
                <li><a href="../cars.php">Xe Hơi</a></li>
                <li><a href="../wishlist.php">Wishlist</a></li>
                <li><a href="../cart.php">Giỏ Hàng</a></li>
            </ul>
        </nav>

        </nav>
    </div>
</body>

</html>