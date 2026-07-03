<?php
if (!isset($title)) {
    $title = "Footer";
}
?>

<!DoCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/car-shop/assets/css/home.css">

    <footer id="footer">
        <h1 class="chapter" id="footer">Contact</h1>
        <div class="chapter_footer">
            <div class="left_footer">
                <h2> <img src="assets/images/icon/icon-shop.png" class="footer-logo-h2">
                Cửa hàng Cart me</h2>
                <p>chuyên cung cấp các loại xe hơi chất lượng cao, từ hạng sang đến thể thao, với dịch vụ khách hàng tận tâm và giá cả cạnh tranh.</p>
            </div>
            <div class="center_footer">
                <h2><img src="assets/images/icon/icon-dasboar.png" class="footer-logo-h2">
                    Connect faster</h2>
                <a href="index.php">
                    <img src="assets/images/icon/icon-trangchu.png" class="footer-logo">
                    Trang chủ
                </a>
                <a href="wishlist.php">
                    <img src="assets/images/icon/wishlist.png" class="footer-logo">
                    Wishlist
                </a>
                <a href="cart.php">
                    <img src="assets/images/icon/gio-hang.png" class="footer-logo">
                    Giỏ hàng
                </a>
                <a href="cars.php">
                    <img src="assets/images/icon/loai-xe.png" class="footer-logo">
                    Xe hơi
                </a>
            </div>
            <div class="right_footer">
                <h2><img src="assets/images/icon/icon-thoaiban.png" class="footer-logo-h2">
                    Contact Us</h2>
                <p>https://www.cars.me.com</p>
                <p>Email: phong@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
            <div class="">
                <img src="assets/images/cars/arrow.png" alt="arrow" class="back_to_top" id="backToTop">
            </div>
        </div>

    </footer>
    <script src="/car-shop/assets/js/menu-user.js"></script>
</html>