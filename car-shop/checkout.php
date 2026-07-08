<?php
session_start();
require_once __DIR__ . "/config/database.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int)$_SESSION['id'];

$sqlCart = "SELECT cart.*, cars.cars_name, cars.price, cars.main_image, cars.status, cars.quantity AS stock_quantity, brands.brand_name
            FROM cart
            JOIN cars ON cart.car_id = cars.id
            JOIN brands ON cars.brand_id = brands.id
            WHERE cart.user_id = $user_id";
$resultCart = mysqli_query($conn, $sqlCart);

$cartItems = [];
$totalPrice = 0;
$error = "";

while ($row = mysqli_fetch_assoc($resultCart)) {
    $cartItems[] = $row;
    $totalPrice += $row['price'] * $row['quantity'];
}

if (empty($cartItems)) {
    header("Location: cart.php");
    exit();
}
// trạng thái không thể check out kiểm tra
foreach ($cartItems as $item) {
    if ($item['status'] != 'available' || (int)$item['stock_quantity'] <= 0) {
        $error = "Trong giỏ hàng có xe đã bán hoặc hết hàng. Vui lòng quay lại giỏ hàng kiểm tra.";
        break;
    }
    if ((int)$item['quantity'] > (int)$item['stock_quantity']) {
        $error = "Số lượng xe trong giỏ lớn hơn số lượng còn lại trong kho.";
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (empty($customer_name) || empty($phone) || empty($address)) {
        $error = "Vui lòng điền đầy đủ thông tin!";
    }

    if (empty($error)) {
        foreach ($cartItems as $item) {
            $car_id = (int)$item['car_id'];
            $buy_quantity = (int)$item['quantity'];
            $price = $item['price'] * $buy_quantity;

            $checkStockSql = "SELECT quantity, status FROM cars WHERE id = $car_id";

            $checkStockResult = mysqli_query($conn, $checkStockSql);
            $stock = mysqli_fetch_assoc($checkStockResult);

            if (!$stock || $stock['status'] != 'available' || (int)$stock['quantity'] < $buy_quantity) {
                $error = "Xe " . $item['cars_name'] . " đã bán hoặc không đủ số lượng.";
                break;
            }
            $customer_name_sql = mysqli_real_escape_string($conn, $customer_name);
            $phone_sql = mysqli_real_escape_string($conn, $phone);
            $address_sql = mysqli_real_escape_string($conn, $address);

            $sqlInsert = "INSERT INTO orders (user_id, car_id, customer_name, phone, address, total_price, status) VALUES 
            ($user_id, $car_id, '$customer_name_sql', '$phone_sql', '$address_sql', $price, 'pending')";

            mysqli_query($conn, $sqlInsert);

            mysqli_query($conn, "UPDATE cars SET quantity = quantity - $buy_quantity WHERE id = $car_id
                AND quantity >= $buy_quantity");

            mysqli_query($conn, " UPDATE cars SET status = 'sold' WHERE id = $car_id AND quantity <= 0 ");
        }
        if (empty($error)) {
            mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");
            header("Location: order-success.php");
            exit();
        }
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
                            <p class="summary-qty">Số lượng đặt: <?php echo $item['quantity']; ?></p>
                            <p class="summary-qty">Còn trong kho: <?php echo $item['stock_quantity']; ?></p>

                            <?php if ($item['status'] == 'available' && $item['stock_quantity'] > 0): ?>
                                <p style="color:green;font-weight:bold;">Có sẵn</p>
                            <?php else: ?>
                                <p style="color:red;font-weight:bold;">Đã bán / hết hàng</p>
                            <?php endif; ?>
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

            <?php if (empty($error)): ?>
                <button type="submit" class="btn-confirm">Xác nhận đặt hàng</button>
            <?php else: ?>
                <button type="button" class="btn-confirm" disabled>Không thể đặt hàng</button>
            <?php endif; ?>

            <a href="cart.php" class="btn-back">Quay lại giỏ hàng</a>
        </form>
    </div>
</main>

<?php include "includes/footer.php"; ?>
</body>
</html>