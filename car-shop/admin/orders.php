<?php
$databasePath = __DIR__ . "/../config/database.php";
<<<<<<< HEAD
=======
require_once __DIR__ . "../includes/pagination.php";
>>>>>>> bbc667b59360976b08a513038fcddb0555019882

if (!file_exists($databasePath)) {
    die("Database configuration file not found: " . htmlspecialchars($databasePath));
}
require_once $databasePath;
<<<<<<< HEAD

if (!isset($conn)) {
    die("Database connection not initialized.");
}
$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$totalUsers = mysqli_num_rows($result);
=======
if (!isset($conn)) {
    die("Database connection not initialized.");
}
$pagination = getPagination($conn, "orders", 2);
$sql = "SELECT * FROM orders ORDER BY id DESC
        LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
$result = mysqli_query($conn, $sql);
$totalOrders = mysqli_num_rows($result);
>>>>>>> bbc667b59360976b08a513038fcddb0555019882

?>
<?php include "index.php"; ?>

<body>
    <div class="container">
        <main class="main-content">
            <h1 class="chapter">orders</h1>
            <!-- dasboard -->
            <section class="dashboard brand-dashboard">
                <div>
                    <h2>Quảng lý đơn hàng</h2>
                    <p>Here you can manage orders, view their details, and perform actions such as edit or delete.</p>
                </div>
                <button type="button" class="add-btn" id="btn-order-open">
                    Thêm đơn hàng
                </button>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search orther...">
                    </from>
                </div>
                <h2>Thống kê system</h2>
            </section>

            <!-- add order -->
            <div class="admin-modal" id="orderModal">
                <div class="admin-modal-box">
                    <div class="admin-modal-head">
                        <h2>Thêm đơn hàng mới</h2>
                        <button type="button" id="btn-order-close">
                            <img src="/car-shop/assets/images/icon/x-thoat.png" class="modal-close-img">
                        </button>
                    </div>

                    <form action="admin-order/order-store.php" method="POST">
                        <div class="form-group-modal">
                            <label>ID người dùng</label>
                            <input type="number" name="user_id" min="0" placeholder="Nhập ID người dùng..." required>
                        </div>

                        <div class="form-group-modal">
                            <label>Tên khách hàng</label>
                            <input type="text" name="customer_name" placeholder="Nhập tên khách hàng..." required>
                        </div>

                        <div class="form-group-modal">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" placeholder="Nhập số điện thoại..." required>
                        </div>

                        <div class="form-group-modal">
                            <label>Nhập địa chỉ</label>
                            <input type="text" name="address" placeholder="Nhập địa chỉ..." required>
                        </div>

                        <div class="form-group-modal">
                            <label>Tổng giá</label>
                            <input type="number" name="total_price" min="0" placeholder="Nhập tổng tiền..." required>
                        </div>

                        <div class="form-group-modal">
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="pending">Chưa giải quyết</option>
                                <option value="confirmed">Đã xác nhận</option>
                                <option value="cancelled">Đã hủy</option>
                                <option value="completed">Hoàn thành</option>
                            </select>
                        </div>

                        <div class="modal-actions">
                            <button type="button" class="cancel-btn" id="btn-order-cancel">Cancel</button>
                            <button type="submit" class="save-btn">Save Order</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- list brand -->
            <h1 class="chapter">Orders list </h1>
            <div class="dashboard">
                <div class="view_dashboard">
                    <table class="user_table" border="1" cellspacing="0">
                        <thead class="item_head">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>id</th>
                                <th>tài khoản</th>
                                <th>tên người dùng</th>
                                <th>điện thoại</th>
                                <th>địa chỉ</th>
                                <th>tổng giá</th>
                                <th>trạng thái</th>
                                <th>ngày tạo</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <!-- Example user data -->
                        <tbody>
                            <?php while ($orders = mysqli_fetch_assoc($result)) { ?>
                                <tr class="item_head">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $orders['id']; ?></td>
                                    <td><?php echo $orders['user_id']; ?></td>
                                    <td><?php echo $orders['customer_name']; ?></td>
                                    <td><?php echo $orders['phone']; ?></td>
                                    <td><?php echo $orders['address']; ?></td>
                                    <td><?php echo $orders['total_price']; ?></td>
                                    <td><?php echo $orders['status']; ?></td>
                                    <td><?php echo $orders['created_at']; ?></td>
                                    <td>
                                        <div class="crud-icon">
                                            <a href="/car-shop/admin/order-detail.php?id=<?php echo $orders['id']; ?>" class="edit-btn">
                                                <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                            </a>
                                            <a href="/car-shop/admin/delete-user.php?id=" class="delete-btn">
                                                <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
<<<<<<< HEAD
=======
                    <?php 
                    renderPagination($pagination['page'], $pagination['totalPages']);

                    ?>
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
                </div>
            </div>
        </main>
    </div>
    <script src="/car-shop/assets/js/admin.js"></script>
</body>