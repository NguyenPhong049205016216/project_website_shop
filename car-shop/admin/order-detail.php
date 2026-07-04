<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "../includes/pagination.php";
include "index.php";
if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit();
}

$id = (int)$_GET['id'];

$sql = "SELECT orders.*, cars.cars_name, cars.main_image, cars.price AS car_price,
               brands.brand_name, user.name AS user_name, user.email AS user_email
        FROM orders
        JOIN cars ON orders.car_id = cars.id
        JOIN brands ON cars.brand_id = brands.id
        JOIN user ON orders.user_id = user.id
        WHERE orders.id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: orders.php");
    exit();
}

$order = mysqli_fetch_assoc($result);

// Lấy ảnh xe
$sqlImgs = "SELECT image_urd FROM car_images WHERE car_id = " . $order['car_id'] . " LIMIT 4";
$resImgs = mysqli_query($conn, $sqlImgs);
$images = [];
while ($img = mysqli_fetch_assoc($resImgs)) {
    $images[] = $img['image_urd'];
}
?>

<link rel="stylesheet" href="/car-shop/assets/css/order-detail.css">

<body>
<div class="container">
    <main class="main-content">
        <h1 class="chapter">Chi tiết đơn hàng #<?php echo $order['id']; ?></h1>

        <div class="dashboard">
            <div class="order-detail-grid">

                <!-- Thông tin xe -->
                <div class="od-card">
                    <h3 class="od-card-title">Thông tin xe</h3>
                    <div class="od-car-info">
                        <img src="/car-shop/<?php echo $order['main_image']; ?>"
                             alt="<?php echo $order['cars_name']; ?>"
                             class="od-car-img">
                        <div>
                            <p class="od-car-name"><?php echo $order['cars_name']; ?></p>
                            <p class="od-car-brand"><?php echo $order['brand_name']; ?></p>
                            <p class="od-car-price">
                                <?php echo number_format($order['car_price'], 0, ',', '.'); ?>đ
                            </p>
                        </div>
                    </div>
                    <?php if (!empty($images)): ?>
                    <div class="od-car-imgs">
                        <?php foreach ($images as $img): ?>
                        <img src="/car-shop/<?php echo $img; ?>" alt="car image">
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Thông tin khách hàng -->
                <div class="od-card">
                    <h3 class="od-card-title">Thông tin khách hàng</h3>
                    <div class="od-info-list">
                        <div class="od-info-row">
                            <span class="od-label">Tài khoản</span>
                            <span><?php echo $order['user_name']; ?> (<?php echo $order['user_email']; ?>)</span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-label">Người nhận</span>
                            <span><?php echo $order['customer_name']; ?></span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-label">Điện thoại</span>
                            <span><?php echo $order['phone']; ?></span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-label">Địa chỉ</span>
                            <span><?php echo $order['address']; ?></span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-label">Ngày đặt</span>
                            <span><?php echo $order['created_at']; ?></span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-label">Tổng tiền</span>
                            <span class="od-total">
                                <?php echo number_format($order['total_price'], 0, ',', '.'); ?>đ
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Cập nhật trạng thái -->
                <div class="od-card od-status-card">
                    <h3 class="od-card-title">Trạng thái đơn hàng</h3>

                    <div class="od-status-current">
                        <span class="status-badge status-<?php echo $order['status']; ?>">
                            <?php
                                $statusLabel = [
                                    'pending'   => 'Chờ xác nhận',
                                    'confirmed' => 'Đã xác nhận',
                                    'cancelled' => 'Đã hủy',
                                    'completed' => 'Hoàn thành'
                                ];
                                echo $statusLabel[$order['status']] ?? $order['status'];
                            ?>
                        </span>
                    </div>

                    <form action="admin-order/order-update.php" method="POST" class="od-status-form">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <div class="form-group-modal">
                            <label>Cập nhật trạng thái</label>
                            <select name="status">
                                <option value="pending"   <?php echo $order['status'] === 'pending'   ? 'selected' : ''; ?>>Chờ xác nhận</option>
                                <option value="confirmed" <?php echo $order['status'] === 'confirmed' ? 'selected' : ''; ?>>Đã xác nhận</option>
                                <option value="cancelled" <?php echo $order['status'] === 'cancelled' ? 'selected' : ''; ?>>Đã hủy</option>
                                <option value="completed" <?php echo $order['status'] === 'completed' ? 'selected' : ''; ?>>Hoàn thành</option>
                            </select>
                        </div>
                        <div class="od-form-actions">
                            <button type="submit" class="save-btn">Cập nhật</button>
                            <a href="orders.php" class="cancel-btn">Quay lại</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
</div>
</body>
</html>