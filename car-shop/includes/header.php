    <?php
// Kiểm tra nếu biến $title đã được đặt, nếu chưa thì gán giá trị mặc định
if (!isset($title)) {
    $title = "Header";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/car-shop/assets/css/home.css">
</head>

<body>
    <div class="main">
        <header>
            <div class="logo">
                <img src="/car-shop/assets/images/cars/logo_cars_2.png" alt="Logo">
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
                        <li><a href="index.php#cars_new">cars new</a></li>
                        <li><a href="index.php#Brands">cars brands</a></li>
                        <li><a href="index.php#best_sell">best sell</a></li>
                        <li><a href="index.php#promotion">promotion</a></li>
                        <li><a href="index.php#footer">footer</a></li>
                    </ul>
                </li>
                <li><a href="cars.php">Xe Hơi</a>
                    <ul class="sub_menu">
                        <li><a href="cars.php#Hang_xe">Hãng xe</a>
                        <ul class="sub_menu_level3">
                            <li><a href="cars.php?brand=vinfast">VINFAST</a></li>
                            <li><a href="cars.php?brand=Audi">AUDI</a></li>
                            <li><a href="cars.php?brand=toyota">TOYOTA</a></li>
                            <li><a href="cars.php?brand=other">KHÁC</a></li>
                        </ul>
                    </li>
                        <li><a href="cars.php#Loai_xe">Loại xe</a></li>
                        <li><a href="cars.php#Gia_xe">Giá xe</a></li>
                        <li><a href="cars.php#Tinh_trang">Tình trạng</a></li>
                    </ul>
                </li>
                <li><a href="wishlist.php">Wishlist</a>
                    <ul class="bex_menu">
                        <li><a href="wishlist.php#save_cars">save cars</a></li>
                        <li><a href="wishlist.php#liked_recently">liked recently</a></li>
                        <li><a href="wishlist.php#see_list_later">See list later</a></li>
                        <li><a href="wishlist.php#undersell">undersell</a></li>
                    </ul>
                </li>
                <li><a href="cart.php">Giỏ Hàng</a>
                    <ul class="footer_menu">
                        <li><a href="cart.php#cart_items">Cart items</a></li>
                        <li><a href="cart.php#checkout">Checkout</a></li>
                        <li><a href="cart.php#payment">Payment</a></li>
                        <li><a href="cart.php#order_history">Order history</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    
</body>

</html>