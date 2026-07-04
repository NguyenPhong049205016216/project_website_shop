<?php

if (isset($_SESSION['id'])) {
    $tkid="A" . str_pad($_SESSION['id'], 8, "0", STR_PAD_LEFT); 
}

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
    <div class="main-header">
        <header>
            <div class="logo">
                <img src="assets/images/cars/logo_cars_2.png" alt="Logo">
            </div>
            <div class="search">
                <form class="search-icon">
                    <input type="text" id="search" placeholder="Tìm kiếm xe bạn muốn">
                </form>
            </div>
            <div class="user">
                    <div class="right_header" style="display:flex; flex-direction: row; gap: 10px; align-items: center;">
                        <div class="cart_btn" style="padding: 5px;" >
                            <img class="icon cart" src="/car-shop/assets/images/icon/gio-hang.png" alt="Cart" style="width: 45px; height: 45px; cursor: pointer; margin-top: 5px;" onclick="navToPage('cart.php')">
                        </div>
                        <div id="account_btn">
                            <img class="icon_user" src="/car-shop/assets/images/icon/user1.png" alt="User">
                            <img class="icon_dropdown" src="/car-shop/assets/images/icon/dropdown.png" alt="User">
                        </div>
                    </div>
                    
                    <div class="acc_dropdown">
                        <div class="acc_top">
                            <div class="avatar_box">
                                <div class="avatar_frame">
                                    <div class="border_avatar">
                                        <img class="avatar_user" src="/car-shop/assets/images/icon/user1.png" alt="avatar">
                                    </div>
                                    <img class="avatar_edit" src="/car-shop/assets/images/icon/edit1.png" alt="edit">
                                </div>
                                <?php
                                    if(isset($_SESSION['id'])) :?>
                                    <span><?=$_SESSION['name']?></span>
                                    <?php else: ?>
                                        <span>Guest</span>
                                    <?php endif;
                                ?>
                            </div>
                            <?php if (isset($_SESSION['id'])): ?>

                                <div class="acc_title_box">
                                    <div class="acc_title">
                                        <div class="acc_detail_1">
                                            <span>TK ID:</span>
                                            <span><?= $tkid ?></span>
                                        </div>

                                        <div class="acc_detail_2">
                                            <span>Email:</span>
                                            <span><?= $_SESSION['email'] ?></span>
                                        </div>
                                    </div>
                                </div>
                             <?php else: ?>

                                <button class="login-btn" onclick="navToPage('login.php')" style="color: black;">
                                    Đăng nhập
                                </button>

                                <button class="regis-btn" onclick="navToPage('register.php')">
                                    Đăng ký
                                </button>

                            <?php endif; ?>
                        </div>

                        <div class="acc_mid">
                            <span id="sub_title">Tiện ích</span>
                            <div class="acc_menu1">
                                <div class="acc_item1" onclick="navToPage('wishlist.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/wishlist.png" alt="wishlist" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="wishlist.php">Wishlist</a>
                                        <p>Danh sách xe yêu thích</p>
                                    </div>
                                </div>

                                <div class="acc_item2" onclick="navToPage('cart.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/archive.png" alt="archive" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="cart.php">Giỏ hàng</a>
                                        <p>Xem giỏ hàng</p>
                                    </div>
                                </div>
                            </div>

                            <div class="acc_menu2">
                                <div class="acc_item3" onclick="navToPage('recent.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/recent.png" alt="recent" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="recent.php">Lịch sử thanh toán</a>
                                        <p>Thanh toán gần đây</p>
                                    </div>
        
                                </div>
                                <div class="acc_item4" onclick="navToPage('Caidat.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/icon/setting.png" alt="cài đặt" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="Caidat.php">Cài đặt</a>
                                        <p>Cài đặt tài khoản</p>
                                    </div>
                                </div>
                            </div>

                            <div class="acc_menu3">
                                <div class="acc_item5" onclick="navToPage('login.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/icon/logout.png" alt="đăng xuất" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="logout.php">Đăng xuất</a>
                                        <p>Đăng xuất khỏi tài khoản</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </header>
        <nav>
            <img src="/car-shop/assets/images/cars/icon_index_soc.png" id="icon-index">
            <ul class="menu">
                <li>
                    <a href="index.php">Trang Chủ</a>
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