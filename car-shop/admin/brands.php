<?php
$databasePath = __DIR__ . "/../config/database.php";
require_once __DIR__ . "../includes/pagination.php";

if (!file_exists($databasePath)) {
    die("Database configuration file not found: ". htmlspecialchars($databasePath));
}
require_once $databasePath;
if (!isset($conn)) {
    die("Database connection not initialized.");
}
$pagination = getPagination($conn, "brands", 5);
$sql = "SELECT *
        FROM brands
        WHERE status='active'
        ORDER BY id DESC
        LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
$result = mysqli_query($conn, $sql);
$totalUsers = mysqli_num_rows($result);
$sqlTotalBrands = "SELECT COUNT(*) AS total_brands FROM brands
                WHERE status='active'";
$resultTotalBrands = mysqli_query($conn, $sqlTotalBrands);
$rowTotalBrands = mysqli_fetch_assoc($resultTotalBrands);
$totalBrands = $rowTotalBrands['total_brands'] ?? 0;

$sqlDeletedBrands = "SELECT COUNT(*) AS total_deleted FROM brands WHERE status = 'deleted'";
$resultDeletedBrands = mysqli_query($conn, $sqlDeletedBrands);
$rowDeletedBrands = mysqli_fetch_assoc($resultDeletedBrands);
$totalDeletedBrands = $rowDeletedBrands['total_deleted'] ?? 0;


?>

<?php include "index.php"; ?>

<body>
    <div div class="container">
        <main class="main-content">
            <h1 class="chapter">brands</h1>
            <!-- dasboard -->
            <section class="dashboard brand-dashboard">
                <div>
                    <h2>Brands Management</h2>
                    <p>Here you can manage brand, view their details, and perform actions such as edit or delete.</p>
                </div>
                <button type="button" class="add-btn" id="btnbr-opmodel">
                    add new brands
                </button>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search brands...">
                    </from>
                </div>
                <h2>Thống kê system</h2>
                <div class="dhb-toof">
                    <div class="stats">
                        <div class="stat-box blue">
                            <span>
                                <img src="/car-shop/assets/images/icon/icon-danhmuc.png" class="icon-stats">
                            </span>
                            <div>
                                <p>Tổng thương hiệu</p>
                                <h3><?php echo $totalBrands; ?></h3>
                                <small>tất cả hãng xe</small>
                            </div>
                        </div>
                    </div>

                    <div class="stats">
                        <div class="stat-box yellow">
                            <span>
                                <img src="/car-shop/assets/images/icon/thung-rac.png" class="icon-stats">
                            </span>
                            <div>
                                <p>Thương hiệu đã xóa</p>
                                <h3><?php echo $totalDeletedBrands; ?></h3>
                                <small>status deleted</small>
                            </div>
                        </div>
                    </div>
                </div>
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
            <h1 class="chapter">Brands list </h1>
            <div class="dashboard">
                <div class="view_dashboard">
                    <table class="user_table" border="1" cellspacing="0">
                        <thead class="item_head">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <!-- Example user data -->
                        <tbody>
                            <?php while ($brand = mysqli_fetch_assoc($result)) { ?>
                                <tr class="item_head">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $brand['id']; ?></td>
                                    <td><?php echo $brand['brand_name']; ?></td>
                                    <td><img src="/car-shop/<?php echo $brand['logo']; ?>" width="90"></td>
                                    <td>
                                        <div class="crud-icon">
                                            <a href="/car-shop/admin/admin-brand/delete-brand.php?id=<?php echo $brand['id']; ?>"
                                                class="delete-btn"
                                                onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này không?')">
                                                <img src="/car-shop/assets/images/icon/thung-rac.png" alt="delete" class="btn-imgcru">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php renderPagination($pagination['page'], $pagination['totalPages']); ?>
                </div>
            </div>
        </main>
    </div>
    <script src="/car-shop/assets/js/admin.js"></script>
</body>