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
                <h2>Cart me</h2>
                <p>chuyên cung cấp các loại xe hơi chất lượng cao, từ hạng sang đến thể thao, với dịch vụ khách hàng tận tâm và giá cả cạnh tranh.</p>
            </div>
            <div class="center_footer">
                <h2>Connect faster</h2>
                <a href="index.php">Trang chủ</a>
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
        </div>

    </footer>
    <script src="/car-shop/assets/js/menu-user.js"></script>
</html>