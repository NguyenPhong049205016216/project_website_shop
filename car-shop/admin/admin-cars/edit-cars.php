<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../app/models/Cars.php";

$carModel = new Cars($conn);

$id = intval($_GET['id']);
$car = $carModel->getById($id);

$brandResult = mysqli_query($conn, "SELECT * FROM brands ORDER BY brand_name ASC");
$categoryResult = mysqli_query($conn, "SELECT * FROM cartegories ORDER BY cartegory_name ASC");

if (isset($_POST['update_car'])) {
    $_POST['main_image'] = $car['main_image'];

    if (!empty($_FILES['main_image']['name'])) {
        $file_name = $_FILES['main_image']['name'];
        $tmp_name = $_FILES['main_image']['tmp_name'];
        $uploadFolder = __DIR__ . "/../../assets/images/img-cars/";
        move_uploaded_file($tmp_name, $uploadFolder . $file_name);
        $_POST['main_image'] = "assets/images/img-cars/" . $file_name;
    }

    if ($carModel->update($id, $_POST)) {
        header("Location: /car-shop/admin/cars.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>

<?php include "../index.php"; ?>
<head>
    <script src="assets/js/ad-edit-cars.js"></script>
    <link rel="stylesheet" href="/car-shop/assets/css/ad-edit-cars.css">
</head>

<div class="container">
    <main class="main-content">
        <h1 class="chapter">Edit Car</h1>
        <form class="form-card" method="POST" enctype="multipart/form-data">
            <h2>Update Car Information</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label>Đổi tên xe</label>
                    <input type="text" name="cars_name" value="<?= $car['cars_name'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi thương hiệu</label>
                    <select name="brand_id">
                        <?php while ($brand = mysqli_fetch_assoc($brandResult)) { ?>
                            <option value="<?= $brand['id'] ?>"
                                <?= $brand['id'] == $car['brand_id'] ? 'selected' : '' ?>>
                                <?= $brand['brand_name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Đổi loại xe</label>
                    <select name="categories_id">
                        <?php while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                            <option value="<?= $category['id'] ?>"
                                <?= $category['id'] == $car['categories_id'] ? 'selected' : '' ?>>
                                <?= $category['cartegory_name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Đổi giá</label>
                    <input type="number" name="price" value="<?= $car['price'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi nhiên liệu</label>
                    <input type="text" name="fuel_type" value="<?= $car['fuel_type'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi hộp số</label>
                    <input type="text" name="transmission" value="<?= $car['transmission'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi động cơ</label>
                    <input type="text" name="engine" value="<?= $car['engine'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi màu sắc</label>
                    <input type="text" name="color" value="<?= $car['color'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi năm sản xuất</label>
                    <input type="number" name="year" value="<?= $car['year'] ?>">
                </div>
                <div class="form-group">
                    <label>Đổi trạng thái</label>
                    <select name="status">
                        <option value="available" <?= $car['status'] == "available" ? "selected" : "" ?>>Available</option>
                        <option value="sold" <?= $car['status'] == "sold" ? "selected" : "" ?>>Sold</option>
                        <option value="hidden" <?= $car['status'] == "hidden" ? "selected" : "" ?>>Hidden</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Đổi hình ảnh chính</label>
                    <input type="file" name="main_image">
                    <?php
                    $imagePath = "/car-shop/". $car['main_image'];
                    ?>
                    <img
                        src="/car-shop/<?= $car['main_image'] ?>"
                        class="preview-img"
                        alt="car image">
                </div>
            </div>
            <div class="form-group full">
                <label>Đổi mô tả</label>
                <textarea name="description"><?= $car['description'] ?></textarea>
            </div>
            <div class="form-actions">
                <a href="../cars.php" class="back-btn">Thoát</a>
                <button type="submit" name="update_car" class="save-btn">Cập nhập xe</button>
            </div>
        </form>
    </main>
</div>