<?php
$databasePath = __DIR__ . "/../config/database.php";
require_once __DIR__ . "../includes/pagination.php";
if (!file_exists($databasePath)) {
    die("Database configuration file not found: " . htmlspecialchars($databasePath));
}
require_once $databasePath;
if (!isset($conn)) {
    die("Database connection not initialized.");
}

//đếm tổng số xe còn hàng trong kho 
//cộng tất cả cột slx quantity
$sqlHetHang = "SELECT COUNT(*) 
                --    đổi kết quả cộng thành
                   AS total_out_stosk FROM cars 
                --    chỉ lấy xe có trạng thái stats (avalible, sodl)
                   WHERE status = 'sold' OR quantity = 0";
//chậy câu lệnh trên
$reusultHetHang = mysqli_query($conn, $sqlHetHang);
//lấy dữ liệu kết quả trả về
$rowHetHang = mysqli_fetch_assoc($reusultHetHang);
//gán vào biến để dùng
$totalHetHang = $rowHetHang['total_out_stosk'] ?? 0;

//Hàng có sẳn
$sqlTongxe = "SELECT SUM(quantity) 
            AS tong_so_xe FROM cars
            WHERE status IN ('available', 'hidden')";
$reusultTongxe = mysqli_query($conn, $sqlTongxe);
$rowTongxe = mysqli_fetch_assoc($reusultTongxe);
$totalxekho = $rowTongxe['tong_so_xe'] ?? 0;
// tổng số xe
$countSql = "SELECT COUNT(*) AS total FROM cars";
$countResult = mysqli_query($conn, $countSql);
$countRow = mysqli_fetch_assoc($countResult);
$totalCars = $countRow['total'];
// phân trang
$pagination = getPagination($conn, "cars", 5);
// lấy xe theo từng trang
$sql = "SELECT cars.*, brands.brand_name AS brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        ORDER BY cars.id DESC
        -- query lấy dữ liệu  dùng limit
        LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
$result = mysqli_query($conn, $sql);

// xe đã xóa 
$sqlHiddenCars = "SELECT COUNT(*) AS total_hidden FROM cars WHERE status = 'hidden'";
$resultHiddenCars = mysqli_query($conn, $sqlHiddenCars);
$rowHiddenCars = mysqli_fetch_assoc($resultHiddenCars);
$totalHiddenCars = $rowHiddenCars['total_hidden'] ?? 0;

?>
<?php
include "index.php";
?>

<body>
    <div class="container">
        <main class="main-content">
            <div>
                <!-- Cars -->
                <h1 class="chapter">Cars</h1>
                <section class="dashboard">
                    <div class="dhb-dead">
                        <h2>Cars Management</h2>
                        <p>Here you can manage cars, view their details, and perform actions such as edit or delete.</p>
                        <a href="/car-shop/admin/admin-cars/add-cars.php" class="add-btn">Thêm xe mới</a>
                    </div>
                    <div class="toolbar">
                        <input type="text" placeholder="search cars...">

                        <select>
                            <option>catagory: all</option>
                            <option> Sedan </option>
                            <option> Suv </option>
                            <option> Pickup </option>
                        </select>

                        <select>
                            <option> status: all</option>
                            <option> Active </option>
                            <option> Out of stock</option>
                        </select>
                    </div>

                    <div class="dhb-toof">
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/loai-xe.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>tổng loại xe</p>
                                    <h3>
                                        <?php
                                        echo $totalCars;
                                        ?>
                                    </h3>
                                    <small>tất cả xe trong hệ thống</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box yellow">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-tickxanh.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>xe có sẳn</p>
                                    <h3><?php echo $totalxekho; ?></h3>
                                    <small>có sẳn để bán</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-hethang.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>hết hàng</p>
                                    <h3><?php echo $totalHetHang; ?> </h3>
                                    <small>không còn sẳn</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box purple">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-danhmuc.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>xe đã xóa</p>
                                    <h3><?php echo $totalHiddenCars; ?></h3>
                                    <small>status hidden</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <h1 class="chapter">Cars list </h1>
            <div class="dashboard">
                <div class="table-title">
                </div>
                <div class="view_dashboard">
                    <table class="user_table" border="2" cellspacing="8">
                        <thead class="item_head">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID</th>
                                <th>ảnh xe</th>
                                <th>name</th>
                                <th>giá</th>
                                <th>hản xe</th>
                                <th>loại xe</th>
                                <th>số lượng</th>
                                <th>nhiên liệu</th>
                                <th>số sàng</th>
                                <th>động cơ</th>
                                <th>trạng thái</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <!-- Example user data -->
                        <tbody>
                            <?php while ($car = mysqli_fetch_assoc($result)) { ?>
                                <tr class="item_head" id="stitle-cars">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $car['id']; ?></td>
                                    <td><img src="/car-shop/<?php echo $car['main_image']; ?>" width="90"></td>
                                    <td><?php echo $car['cars_name']; ?></td>
                                    <td><?php echo number_format($car['price'], 0, ',', ','); ?> VNĐ</td>
                                    <td><?php echo $car['brand_name']; ?></td>
                                    <td><?php echo $car['categories_id']; ?></td>
                                    <td><?php echo $car['quantity']; ?></td>
                                    <td><?php echo $car['fuel_type']; ?></td>
                                    <td><?php echo $car['transmission']; ?></td>
                                    <td><?php echo $car['engine']; ?></td>
                                    <td>
                                        <span class="stt-cars">
                                            <?php echo $car['status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="crud-icon">
                                            <a href="/car-shop/admin/admin-cars/edit-cars.php?id=<?php echo $car['id']; ?>" class="edit-btn">
                                                <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                            </a>
                                            <a href="/car-shop/admin/admin-cars/delete-cars.php?id=<?php echo $car['id']; ?>" class="delete-btn">
                                                <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                            </a>
                                            <a href="/car-shop/admin/admin-cars/delete-cars.php?id=<?php echo $car['id']; ?>"
                                                class="delete-btn"
                                                onclick="return confirm('Bạn có chắc muốn xóa/ẩn xe này không?')">
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

</body>

</html>