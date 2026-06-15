<?php
$title = "Car Shop";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/wishlist1.css">
</head>
<body>
    <div class="main">
        <div class="sticky_header">
            <header>
                <div class="logo">
                    <img src="../assets/images/cars/logo_cars_2.png" alt="Logo">
                </div>
                <div class="search">
                    <form>
                        <input type="text" id="search" placeholder="Tìm kiếm xe bạn muốn">
                    </form>
                </div>
                <div class="user">
                    <span id="account_btn" onclick="toggleDropdown()">Account</span>

                    <div class="acc_dropdown">
                        <div class="acc_top">
                            <div class="acc_title_box">
                                    <div class="acc_title">
                                        <div class="acc_title_1">
                                            <h2>Khám phá cửa hàng xe ngay</h2>
                                            <p>Đăng nhập cái đã!</p>
                                        </div>
                                        
                                        <div class="acc_title_img">
                                            <img class="title_icon" src="assets/images/cars/toyota_1.png" alt="user">
                                        </div>
                                    
                                    </div>
                            </div>
                           

                            <button class="login-btn">Đăng nhập</button>
                            <button class="regis-btn">Đăng ký</button>
                        </div>

                        <div class="acc_mid">
                            <span id="sub_title">Tiện ích</span>
                            <div class="acc_menu1">
                                <div class="acc_item1" onclick="navToPage('wishlist-logged.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/wishlist.png" alt="wishlist" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="wishlist-logged.php">Wishlist</a>
                                        <p>Danh sách xe yêu thích</p>
                                    </div>
                                </div>
                                <div class="acc_item2" onclick="navToPage('savedcar.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/archive.png" alt="archive" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="savedcar.php">Lưu trữ</a>
                                        <p>Các xe đã lưu</p>
                                    </div>
                                </div>
                            </div>

                            <div class="acc_menu2">
                                <div class="acc_item3" onclick="navToPage('recent.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/recent.png" alt="recent" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="recent.php">Xem gần đây</a>
                                        <p>Các xe bạn đã xem gần đây</p>
                                    </div>
        
                                </div>
                                <div class="acc_item4" onclick="navToPage('later.php')">
                                    <div class="acc_img">
                                        <img src="assets/images/cars/xemsau.png" alt="xemsau" class="acc_icon">
                                    </div>
                                    <div class="item_content_text">
                                        <a href="later.php">Xem sau</a>
                                        <p>Các xe bạn muốn xem sau</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </header>

            <nav>
                <ul class="menu">
                    <li><a href="index.php">Trang Chủ</a>
                        <ul class="top_menu">
                                <li><a href="index.php">introduce</a></li>
                                <li><a href="#cars_new">cars new</a></li>
                                <li><a href="#Brands">cars brands</a></li>
                                <li><a href="#best_sell">best sell</a></li>
                                <li><a href="#promotion">promotion</a></li>
                                <li><a href="#footer">footer</a></li>
                        </ul>
                    </li>
                    <li><a href="cars.php">Xe Hơi</a>
                        <ul class="sub_menu">
                                <li><a href="#Hang_xe">Hảng xe</a></li>
                                <li><a href="#Loai_xe">Loại xe</a></li>
                                <li><a href="#Gia_xe">Giá xe</a></li>
                                <li><a href="#Tinh_trang">Tình trạng</a></li>
                        </ul>
                    </li>
                    <li><a href="wishlist.php">Wishlist</a>
                        <ul class="bex_menu">
                                <li><a href="#save_cars">save cars</a></li>
                                <li><a href="#liked_recently">liked recently</a></li>
                                <li><a href="#see_list_later">See list later</a></li>
                                <li><a href="#undersell">undersell</a></li>
                        </ul>
                    </li>
                    <li><a href="cart.php">Giỏ Hàng</a>
                        <ul class="footer_menu">
                                <li><a href="#cart_items">Cart items</a></li>
                                <li><a href="#checkout">Checkout</a></li>
                                <li><a href="#payment">Payment</a></li>
                                <li><a href="#order_history">Order history</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <section class="middle-title">
            <div class="wish-title">
                <h1>Wishlist</h1>
            </div>
        </section>

        <section class="middle-content">
            <div class="content-layout">
                <div class="content-box">
                    <div class="box-header">
                        <h2>Danh sách xe đã thích</h2>
                    </div>

                    <div class="box-mid">
                        <div class="box-img-content">
                            <img src="assets/images/cars/document.png" alt="saved car" class="document-icon">
                        </div>
                        <h3>Chưa có xe nào được yêu thích</h3>
                        <p>Khi bạn yêu thích xe, xe được yêu thích sẽ nằm ở đây.</p>
                        <span onclick="navToPage('index.php')">Khám phá ngay</span>
                    </div>

                    <div class="box-footer"></div>
                </div>
            </div>
        </section>

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
            <div class="">
                <img src="assets/images/cars/arrow.png" alt="arrow" class="back_to_top" id="backToTop">
            </div>
        </footer>

    </div>
    <script src="assets/js/wishlist1.js"></script>
</body>
</html>