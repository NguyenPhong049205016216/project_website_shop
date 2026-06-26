<?php
require __DIR__ . "/../../config/database.php";
require __DIR__ . "/../../app/models/Cars.php";


if (isset($_POST['submit'])) {
    //upload ảnh
    $file_name= $_FILES['main_image']['name'];
    //biến chứa ảnh tạm thời
    $tmpName= $_FILES['main_image']['tmp_name'];
    //chỉ định thư mục lưu ảnh
    $uploadFolder= __DIR__."/../../assets/images/img-cars/";
    //di chuyển file ảnh từ bộ nhớ tạp về project
    move_uploaded_file($tmpName, $uploadFolder.$file_name); 
    $_POST['main_image'] = "assets/images/img-cars/".$file_name;
    $car = new Cars($conn);
    if($car -> create($_POST)){
        header("Location: ../cars.php");
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

<body>
    <div class="container">
        <div class="main-content">
            <div>
                <h1 class="chapter">add cars</h1>
                <div class="form-card">
                    <!-- enctype dùng để úp load ảnh trong from-->
                    <form method="POST" enctype="multipart/form-data" class="car-frcars" >
                        <div class="form-grcars">
                            <label>Thương hiệu</label>
                            <input type="number" name="brand_id" placeholder="1 Toyota, 2 Audi...">
                        </div>

                        <div class="form-grcars">
                            <label>Loại xe</label>
                            <input type="number" name="categories_id" placeholder="1 SUV, 2 Sedan...">
                        </div>

                        <div class="form-grcars">
                            <label>Tên xe</label>
                            <input type="text" name="cars_name" placeholder="Nhập tên xe">
                        </div>

                        <div class="form-grcars">
                            <label>Giá</label>
                            <input type="number" name="price" placeholder="650000000">
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
                            <input type="text" name="engine" placeholder="2.0L">
                        </div>

                        <div class="form-grcars">
                            <label>Màu</label>
                            <input type="text" name="color" placeholder="Đen">
                        </div>

                        <div class="form-grcars">
                            <label>Số lượng</label>
                            <input type="number" name="quantity" placeholder="5">
                        </div>

                        <div class="form-grcars">
                            <label>Năm</label>
                            <input type="number" name="year" placeholder="2025">
                        </div>

                        <div class="form-grcars">
                            <label>Mô tả</label>
                            <textarea name="description" placeholder="Nhập mô tả xe"></textarea>
                        </div>

                        <div class="form-grcars">
                            <label>Ảnh xe</label>
                            <input type="file" name="main_image" placeholder="assets/images/img-cars/toyota.png">
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
                            <a href="../cars.php" class="btn-cancel">Cancel</a>
                            <button type="submit" name="submit" class="btn-submit">Add Car</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>