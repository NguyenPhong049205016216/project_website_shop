<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/config/database.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int) $_SESSION['id'];

if (isset($_POST['remove_cart'])) {
    $cart_id = (int) $_POST['cart_id'];
    mysqli_query($conn, "DELETE FROM cart WHERE id = $cart_id AND user_id = $user_id");
    header("Location: cart.php");
    exit();
}

$sql = "SELECT
            ct.id AS cart_id,
            ct.quantity,
            ct.created_at,
            c.id AS car_id,
            c.cars_name,
            c.price,
            c.main_image AS image,
            c.status,
            c.quantity AS stock_quantity,
            b.brand_name,
            cg.cartegory_name
        FROM cart ct
        JOIN cars c ON ct.car_id = c.id
        JOIN brands b ON c.brand_id = b.id
        JOIN cartegories cg ON c.categories_id = cg.id
        WHERE ct.user_id = $user_id
        ORDER BY ct.created_at DESC";
$result = mysqli_query($conn, $sql);
$cart_count = mysqli_num_rows($result);
$title = "Giỏ hàng";
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>
    <div class="main">
        <section class="middle-content">
            <div class="content-layout">
                <div class="content-box">
                    <div class="box-mid">
                        <div class="box-header">
                            <h2>Giỏ hàng</h2> <p><?= $cart_count ?>/100</p>
                        </div>
                        <?php 
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                            
                            <div class="cart_item">
                                
                                <div class="cart_card">
                                    <form method="POST">
                                        <input type="hidden" name="cart_id" value="<?= $row['cart_id'] ?>">
                                        <button type="submit" name="remove_cart" class="remove_cart_btn" style="background:none;border:none;">
                                            <img src="assets/images/icon/trash.png" style="width: 50px; height: 50px; cursor: pointer;">
                                        </button>
                                    </form>
                                    <img src="/car-shop/<?php echo $row['image']; ?>" class="cart_img">
                                    <h3><?= $row['brand_name'] ?> <?= $row['cars_name'] ?></h3>
                                    <p>Giá: <?= number_format($row['price']); ?> Vnđ</p>
                                    <p>Số lượng: <?= $row['quantity'] ?> </p>
                                    <p style="color:green;">Thành tiền: <?= number_format($row['price'] * $row['quantity']); ?> Vnđ</p>
                                </div>
                            </div>
                        <?php
                                }
                            } else {
                                ?>
                                    <div class="" style="display: flex;flex-direction: column; align-items: center; justify-content: center; gap: 10px; margin-top: 50px;">
                                        <div class="box-img-content">
                                            <img src="assets/images/cars/document.png" alt="Document" class="document-icon">
                                        </div>
                                        <h3>Chưa có sản phẩm nào được thêm vào giỏ hàng</h3>
                                        <p>Khi bạn thêm sản phẩm vào giỏ hàng, sản phẩm sẽ nằm ở đây.</p>
                                        <span onclick="navToPage('cars.php')">Khám phá ngay</span>
                                    </div>
                                <?php
                            }
                            ?>
                    </div>

                    <?php if ($cart_count > 0) { ?>
                    <div class="box-footer" style="margin-top: 30px;">
                        <div class="" style="display:flex; flex-direction:column; justify-content:flex-end;width: 300px;">
                            <button class="buy_button" onclick="navToPage('checkout.php')">Đặt hàng</button>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <div class="">
            <img src="assets/images/arrow.png" alt="arrow" class="back_to_top" id="backToTop">
        </div>
    </div>
</body>
<script src="assets/js/menu-user.js"></script>
</html>