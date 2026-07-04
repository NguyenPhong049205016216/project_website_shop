<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "../includes/pagination.php";
// truy vấn doanh thu theo tháng trong 6 tháng gần đây
$sqlMonthly = "SELECT
            DATE_FORMAT(created_at, '%m/%Y') AS thang,
            COUNT(*) AS so_don,
            SUM(total_price) AS doanh_thu
            FROM orders
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY MIN(created_at) ASC";
$resMonthly = mysqli_query($conn, $sqlMonthly);
$labels = [];
$revenue = [];
$orders_count = [];
while ($row = mysqli_fetch_assoc($resMonthly)) {
    $labels[]       = $row['thang'];
    $revenue[]      = (float)$row['doanh_thu'];
    $orders_count[] = (int)$row['so_don'];
}
// truy vấn doanh thu theo hãng xe
$sqlBrand = "SELECT b.brand_name,
            COUNT(od.id) AS so_don,
            SUM(od.price * od.quantity) AS doanh_thu
             FROM orders o
             JOIN car_details od ON o.id = od.order_id
             JOIN cars c ON od.car_id = c.id
             JOIN brands b ON c.brand_id = b.id
             GROUP BY b.brand_name
             ORDER BY doanh_thu DESC
             LIMIT 6";
$resBrand = mysqli_query($conn, $sqlBrand);
$brandLabels  = [];
$brandRevenue = [];
if ($resBrand) {
    while ($row = mysqli_fetch_assoc($resBrand)) {
        $brandLabels[]  = $row['brand_name'];
        $brandRevenue[] = (float)$row['doanh_thu'];
    }
}
// truy vấn tổng số đơn hàng, tổng doanh thu, tổng đơn chờ xử lý, tổng xe
$rowTotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS tong_don, SUM(total_price) AS tong_dt FROM orders"));
$tongDon  = $rowTotal['tong_don'] ?? 0;
$tongDT   = $rowTotal['tong_dt']  ?? 0;
// truy vấn tổng số đơn chờ xử lý
$rowPend  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS tong FROM orders WHERE status='pending'"));
$tongPend = $rowPend['tong'] ?? 0;
// truy vấn tổng số xe
$rowCars  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS tong FROM cars"));
$tongCars = $rowCars['tong'] ?? 0;
$pagination = getPagination($conn, "brands", 2);
$sql = "SELECT * FROM orders ORDER BY id DESC
        LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
$result = mysqli_query($conn, $sql);
?>
<?php
include "index.php";
?>

<body>
    <div class="container">
        <main class="main-content">
            <div>
                <h1 class="chapter">Dashboard</h1>
                <section class="dashboard">
                    <div class="dhb-head">
                        <h2>Users Management</h2>
                    </div>

                    <div class="toolbar">
                        <input type="text" placeholder="Search dasboard...">
                        <select>
                            <option> dasboard: all</option>
                            <option> total user</option>
                            <option> total cars</option>
                            <option> catagories</option>
                            <option> orther</option>
                        </select>
                    </div>

                    <div class="dhb-toof">
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box yellow">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box purple">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div>
                    <h1 class="chapter">Orther news </h1>
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
                            <?php renderPagination($pagination['page'], $pagination['totalPages']); ?>
                        </div>
                    </div>
                </div>

                <!-- ===== BIỂU ĐỒ THỐNG KÊ DOANH SỐ ===== -->
                <h1 class="chapter">
                    Thống kê doanh số</h1>
                <div class="dashboard">

                    <div class="dhb-head">
                        <div>
                            <img src="/car-shop/assets/images/icon/doanhthutong.png" class="icon-doanhthu">
                            <h2>Doanh thu &amp; đơn hàng</h2>
                        </div>

                        <div style="display:flex;gap:8px;">
                            <button onclick="switchChart('bar')" id="btn-bar"
                                style="padding:8px 18px;border-radius:10px;border:1px solid #d1d5db;background:#2563eb;color:#fff;cursor:pointer;font-size:13px;font-weight:bold;">
                                Cột
                            </button>
                            <button onclick="switchChart('line')" id="btn-line"
                                style="padding:8px 18px;border-radius:10px;border:1px solid #d1d5db;background:#fff;color:#111827;cursor:pointer;font-size:13px;font-weight:bold;">
                                Đường
                            </button>
                        </div>
                    </div>

                    <div class="dhb-toof" style="margin-bottom:24px;">
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-tien.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>Tổng doanh thu</p>
                                    <h3><?php echo number_format($tongDT, 0, ',', '.'); ?>VND</h3>
                                    <small>tất cả đơn hàng</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-tongdon.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>Tổng đơn hàng</p>
                                    <h3><?php echo $tongDon; ?></h3>
                                    <small>đã đặt</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box yellow">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-doncxl.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>Đơn chờ xử lý</p>
                                    <h3><?php echo $tongPend; ?></h3>
                                    <small>pending</small>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="stat-box purple">
                                <span>
                                    <img src="/car-shop/assets/images/icon/ô-tô-3d.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>Tổng xe</p>
                                    <h3><?php echo $tongCars; ?></h3>
                                    <small>trong kho</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display:flex;gap:20px;margin-bottom:10px;font-size:13px;color:#52514e;">
                        <span style="display:flex;align-items:center;gap:5px;">
                            <span style="width:10px;height:10px;border-radius:2px;background:#2a78d6;display:inline-block;"></span>
                            Doanh thu (VNĐ)
                        </span>
                        <span style="display:flex;align-items:center;gap:5px;">
                            <span style="width:10px;height:10px;border-radius:2px;background:#1baf7a;display:inline-block;"></span>
                            Số đơn hàng
                        </span>
                    </div>

                    <div style="position:relative;width:100%;height:300px;">
                        <canvas id="chartDoanhThu"></canvas>
                    </div>

                    <?php if (!empty($brandLabels)): ?>
                        <h3 style="margin:28px 0 12px;font-size:15px;color:#111827;font-weight:600;">Doanh thu theo hãng xe</h3>
                        <div style="position:relative;width:100%;height:<?php echo max(200, count($brandLabels) * 50); ?>px;">
                            <canvas id="chartHangXe"></canvas>
                        </div>
                    <?php endif; ?>

                </div>
                <!-- Truyền data PHP -> JS -->
                <div id="chartData"
                    data-labels='<?php echo json_encode($labels); ?>'
                    data-revenue='<?php echo json_encode($revenue); ?>'
                    data-orders='<?php echo json_encode($orders_count); ?>'
                    data-brandlabels='<?php echo json_encode($brandLabels); ?>'
                    data-brandrevenue='<?php echo json_encode($brandRevenue); ?>'
                    style="display:none;">
                </div>
            </div>
        </main>
    </div>
    <!-- bar chart scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
    <script src="/car-shop/assets/js/dashboard.js"></script>

</body>

</html>