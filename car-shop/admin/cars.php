<?php
$databasePath = __DIR__ . "/../config/database.php";
if (!file_exists($databasePath)) {
    die("Database configuration file not found: " . htmlspecialchars($databasePath));
}
require_once $databasePath;

if (!isset($conn)) {
    die("Database connection not initialized.");
}

$sql = "SELECT cars.*, brands.brand_name AS brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        ORDER BY cars.id DESC";

$result = mysqli_query($conn, $sql);
$totalCars = mysqli_num_rows($result);

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
                        <a href="admin-cars/add-cars.php" class="add-btn">add new cars</a>
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
                                    <p>tổng xe</p>
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
                                    <h3>0</h3>
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
                                    <h3>0</h3>
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
                                    <p>danh mục</p>
                                    <h3>0</h3>
                                    <small>loại danh mục</small>
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
                        <thead>
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
                                <td><img src="/car-shop/assets/images/img-cars/<?php echo $car['main_image']; ?>" width="90"></td>
                                <td><?php echo $car['cars_name']; ?></td>
                                <td><?php echo number_format($car['price'],0,',',','); ?> VNĐ</td>
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
                                        <a href="edit-user.php?id=<?php echo $car['id']; ?>" class="edit-btn">
                                            <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                        </a>
                                        <a href="delete-user.php?id=<?php echo $car['id']; ?>" class="delete-btn">
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

</body>

</html>