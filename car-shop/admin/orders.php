<?php
$databasePath = __DIR__ . "/../config/database.php";
if (!file_exists($databasePath)) {
    die("Database configuration file not found: " . htmlspecialchars($databasePath));
}
require_once $databasePath;

if (!isset($conn)) {
    die("Database connection not initialized.");
}
$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$totalUsers = mysqli_num_rows($result);


?>

<?php include "index.php"; ?>

<body>
    <div div class="container">
        <main class="main-content">
            <h1 class="chapter">orders</h1>
            <!-- dasboard -->
            <section class="dashboard brand-dashboard">
                <div>
                    <h2>Orders Management</h2>
                    <p>Here you can manage orders, view their details, and perform actions such as edit or delete.</p>
                </div>
                <button type="button" class="add-btn" id="btnbr-opmodel">
                    add new orders
                </button>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search brands...">
                    </from>
                </div>
                <h2>Thống kê system</h2>
            </section>

            <!-- add brand -->
            <div class="brand-modal" id="brandModal">
                <div class="brand-modal-box">
                    <div class="brand-modal-head">
                        <h2>Add New Brand</h2>
                        <button type="button" id="btnbr-clmodel">
                            <img src="/car-shop/assets/images/icon/x-thoat.png" class="clmodel-img">
                        </button>
                    </div>
                    <form action="admin-brand/brand-store.php" method="POST" enctype="multipart/form-data">
                        <div class="form-grbr">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" placeholder="Nhập tên hãng xe..." required>
                        </div>
                        <div class="form-grbr">
                            <label>Brand Logo</label>
                            <input type="file" name="logo" accept="image/*" required>
                        </div>
                        <div class="modal-actions">
                            <button type="button" class="cancel-btn" id="btnbr-cslmodel">Cancel</button>
                            <button type="submit" class="save-btn">Save Brand</button>
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
                                <th>ID</th>
                                <th>name user</th>
                                <th>name customer</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>total price</th>
                                <th>status</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <!-- Example user data -->
                        <tbody>
                            <?php while ($brand = mysqli_fetch_assoc($result)) { ?>
                                <tr class="item_head">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $brand['id']; ?></td>
                                    <td><?php echo $brand['user_id']; ?></td>
                                    <td><?php echo $brand['customer_name']; ?></td>
                                    <td><?php echo $brand['phone']; ?></td>
                                    <td><?php echo $brand['address']; ?></td>
                                    <td><?php echo $brand['total_price']; ?></td>
                                    <td><?php echo $brand['status']; ?></td>
                                    <td>
                                        <div class="crud-icon">
                                            <a href="/car-shop/admin/edit-user.php?id=" class="edit-btn">
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
                </div>
            </div>
        </main>
    </div>
    <script src="/car-shop/assets/js/admin.js"></script>
</body>
