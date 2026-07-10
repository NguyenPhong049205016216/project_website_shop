<?php
require __DIR__ . "/../../config/database.php";
require __DIR__ . "/../../app/models/Cars.php";

$brandResult = mysqli_query(
    $conn,
    "SELECT id, brand_name FROM brands 
                ORDER BY brand_name ASC"
);

$categoryResult = mysqli_query(
    $conn,
    "SELECT id, cartegory_name FROM cartegories
                 ORDER BY cartegory_name ASC"
);
if (isset($_POST['submit'])) {
    $errors = [];
    $cars_name = trim($_POST['cars_name']);
    $price = (int) $_POST['price'];
    $fuel_type = trim($_POST['fuel_type']);
    $transmission = trim($_POST['transmission']);
    $engine = trim($_POST['engine']);
    $color = trim($_POST['color']);
    $quantity = (int) $_POST['quantity'];
    $year = (int) $_POST['year'];

    // Tên xe: tối thiểu 3 ký tự, chữ đầu viết hoa
    if (strlen($cars_name) < 3) {
        $errors[] = "Tên xe phải có ít nhất 3 ký tự.";
    } else {
        $_POST['cars_name'] = ucfirst($cars_name);
    }
    // Giá: từ 10 triệu đến 50 tỷ
    if ($price < 10000000 || $price > 50000000000) {
        $errors[] = "Giá xe phải từ 10.000.000 đến 50.000.000.000 VNĐ.";
    }
    $fuelAllow = ['Xăng', 'Dầu', 'Điện', 'Hybrid'];
    if (!in_array($fuel_type, $fuelAllow)) {
        $errors[] = "Nhiên liệu chỉ được nhập: Xăng, Dầu, Điện hoặc Hybrid.";
    }
    if (strlen($transmission) < 3) {
        $errors[] = "Hộp số không hợp lệ.";
    }
    // Động cơ: tối thiểu 3 ký tự
    if (strlen($engine) < 3) {
        $errors[] = "Động cơ phải có ít nhất 3 ký tự. Ví dụ: 2.0L, 100KW.";
    }
    if (strlen($color) < 2) {
        $errors[] = "Màu xe không hợp lệ.";
    }
    if ($quantity < 0 || $quantity > 1000) {
        $errors[] = "Số lượng phải từ 0 đến 1000.";
    }
    if ($year < 1990 || $year > 2030) {
        $errors[] = "Năm xe phải từ 1990 đến 2030.";
    }
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red; font-weight:bold;'>$err</p>";
        }
        exit;
    }
    //upload ảnh
    $file_name = $_FILES['main_image']['name'];
    //biến chứa ảnh tạm thời
    $tmpName = $_FILES['main_image']['tmp_name'];
    //chỉ định thư mục lưu ảnh
    $uploadFolder = __DIR__ . "/../../assets/images/img-cars/";
    //di chuyển file ảnh từ bộ nhớ tạp về project
    move_uploaded_file($tmpName, $uploadFolder . $file_name);

    $_POST['main_image'] = "assets/images/img-cars/" . $file_name;

    $car = new Cars($conn);
    if ($car->create($_POST)) {
        header("Location: /car-shop/admin/cars.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>
<?php include "../index.php" ?>

<head>
    <link rel="stylesheet" href="/car-shop/assets/css/admin.css">
</head>
<script>
    const imageInput = document.getElementById("main_image");
    const previewImg = document.getElementById("preview-car-img");

    imageInput.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            previewImg.src = URL.createObjectURL(file);
            previewImg.style.display = "block";
        }
    });
</script>

<body>
    <div class="container">
        <div class="main-content">
            <div>
                <h1 class="chapter">add cars</h1>
                <div class="form-card">
                    <!-- enctype dùng để úp load ảnh trong from-->
                    <form method="POST" enctype="multipart/form-data" class="car-frcars">
                        <div class="form-grcars">
                            <label>Thương hiệu</label>
                            <select name="brand_id" required>
                                <option value="">Chọn thương hiệu</option>
                                <?php while ($brand = mysqli_fetch_assoc($brandResult)) { ?>
                                    <option value="<?php echo $brand['id']; ?>">
                                        <?php echo $brand['brand_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-grcars">
                            <label>Loại xe</label>
                            <select name="categories_id" required>
                                <option value=""> Chọn loại xe </option>
                                <?php while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['cartegory_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-grcars">
                            <label>Tên xe</label>
                            <input type="text" name="cars_name" minlength="3" required oninvalid="this.setCustomValidity('Tên xe phải có ít nhất 3 ký tự')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-grcars">
                            <label>Giá</label>
                            <input type="number" name="price" min="10000000" max="50000000000" required oninvalid="this.setCustomValidity('Giá xe phải từ 10 triệu đến 50 tỷ đồng')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-grcars">
                            <label>Nhiên liệu</label>
                            <input type="text" name="fuel_type" placeholder="Xăng / Điện">
                        </div>

                        <div class="form-grcars">
                            <label>Hộp số</label>
                            <input type="text" name="transmission" placeholder="Tự động">
                        </div>

                        <div class="form-grcars">
                            <label>Động cơ</label>
                            <input type="text" name="engine" minlength="3" required placeholder="2.0L hoặc 100KW">
                        </div>

                        <div class="form-grcars">
                            <label>Màu</label>
                            <input type="text" name="color" placeholder="Đen">
                        </div>

                        <div class="form-grcars">
                            <label>Số lượng</label>
                            <input
                                type="number"
                                name="quantity"
                                min="1"
                                max="1000"
                                required
                                oninvalid="this.setCustomValidity('Số lượng phải từ 1 đến 1000')"
                                oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-grcars">
                            <label>Năm</label>
                            <input type="number" name="year" min="1990" max="2030" required placeholder="2025">
                        </div>

                        <div class="form-grcars">
                            <label>Mô tả</label>
                            <textarea name="description" placeholder="Nhập mô tả xe"></textarea>
                        </div>

                        <div class="form-grcars">
                            <label>Ảnh xe</label>
                            <input type="file" name="main_image" id="main_image" accept="image/*" required>
                            <img id="preview-car-img" src=""
                                style="display:none; width:180px; height:110px; object-fit:contain; margin-top:12px; border:1px solid #ddd; border-radius:12px;">
                        </div>
                        <div class="form-grcars">
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="hidden">Hidden</option>
                            </select>
                        </div>
                        <div class="form-action">
                            <a href="../cars.php" class="btn-cancel">Thoát</a>
                            <button type="submit" name="submit" class="btn-submit">Thêm xe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>