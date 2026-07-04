<?php
session_start();
require_once __DIR__ . "/config/database.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Lấy giỏ hàng của user
$sqlCart = "SELECT cart.*, cars.cars_name, cars.price, cars.main_image, brands.brand_name
            FROM cart
            JOIN cars ON cart.car_id = cars.id
            JOIN brands ON cars.brand_id = brands.id
            WHERE cart.user_id = $user_id";
$resultCart = mysqli_query($conn, $sqlCart);
$cartItems = [];
$totalPrice = 0;
while ($row = mysqli_fetch_assoc($resultCart)) {
    $cartItems[] = $row;
    $totalPrice += $row['price'] * $row['quantity'];
}

if (empty($cartItems)) {
    header("Location: cart.php");
    exit();
}

// Xử lý submit
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name']);
    $phone         = trim($_POST['phone']);
    $address       = trim($_POST['address']);

    if (empty($customer_name) || empty($phone) || empty($address)) {
        $error = "Vui lòng điền đầy đủ thông tin!";
    } else {
        foreach ($cartItems as $item) {
            $car_id     = $item['car_id'];
            $price      = $item['price'] * $item['quantity'];
            $sqlInsert  = "INSERT INTO orders (user_id, car_id, customer_name, phone, address, total_price, status)
                           VALUES ('$user_id', '$car_id', '$customer_name', '$phone', '$address', '$price', 'pending')";
            mysqli_query($conn, $sqlInsert);
        }
        // Xóa giỏ hàng sau khi đặt
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");
        header("Location: order-success.php");
        exit();
    }
}
$title = "Xác nhận đặt hàng";
include "includes/header.php";
?>

<link rel="stylesheet" href="/car-shop/assets/css/checkout.css">

<main class="checkout-wrapper">

    <div class="checkout-left">
        <h2 class="checkout-title">Thông tin đặt hàng</h2>

        <?php if (!empty($error)): ?>
            <p class="checkout-error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" class="checkout-form">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="customer_name"
                    value="<?php echo $_SESSION['name'] ?? ''; ?>"
                    placeholder="Nhập họ và tên..." required>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone"
                    value="<?php echo $_SESSION['phonenumber'] ?? ''; ?>"
                    placeholder="Nhập số điện thoại..." required>
            </div>
            <div class="form-group">
                <label>Địa chỉ giao xe</label>
                <input type="text" name="address"
                    placeholder="Nhập địa chỉ..." required>
            </div>

            <div class="checkout-summary">
                <h3>Tóm tắt đơn hàng</h3>
                <?php foreach ($cartItems as $item): ?>
                <div class="summary-item">
                    <img src="/car-shop/<?php echo $item['main_image']; ?>"
                         alt="<?php echo $item['cars_name']; ?>">
                    <div class="summary-info">
                        <p class="summary-name"><?php echo $item['cars_name']; ?></p>
                        <p class="summary-brand"><?php echo $item['brand_name']; ?></p>
                        <p class="summary-qty">Số lượng: <?php echo $item['quantity']; ?></p>
                    </div>
                    <p class="summary-price">
                        <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>đ
                    </p>
                </div>
                <?php endforeach; ?>

                <div class="summary-total">
                    <span>Tổng cộng</span>
                    <span class="total-price">
                        <?php echo number_format($totalPrice, 0, ',', '.'); ?>đ
                    </span>
                </div>
            </div>

            <button type="submit" class="btn-confirm">Xác nhận đặt hàng</button>
            <a href="cart.php" class="btn-back">Quay lại giỏ hàng</a>
        </form>
    </div>

</main>

<?php include "includes/footer.php"; ?>
</body>
</html>