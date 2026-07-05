<!DOCTYPE html>
<?php
include "../index.php";
require __DIR__ . "/../../config/database.php";
$resultCars = mysqli_query($conn, "SELECT id, cars_name FROM cars");
?>
<html>
    <head>
        <script src="/car-shop/assets/css/ad-detail.css"></script>
</body>
    </head>
    <body>
        <main class="main-content">
             <h1 class="chapter">Car Images</h1>
             <section class="dashboard">
                <div class="page-head">
                    <div>
                        <h2>Car Images Management</h2>
                        <p>Thêm nhiều ảnh phụ cho từng xe để hiển thị ở trang Car Detail.</p>
                    </div>
                </div>
                <form action="image-store.php" method="POST" enctype="multipart/form-data" class="image-form">
                    <div class="form-left">
                        <div class="form-group">
                            <label>Chọn xe</label>
                            <select name="car_id" required>
                                <option value="">-- Chọn xe --</option>
                                <?php while ($car = mysqli_fetch_assoc($resultCars)) { ?>
                                <option value="<?= $car['id']; ?>">
                                    <?= $car['cars_name']; ?>
                                </option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh phụ</label>
                            <input type="file" name="images[]"
                            id="images" multiple accept="image/*">
                        </div>
                        <button class="save-btn">Upload Images</button>
                    </div>
                    <div class="preview-box">
                        <h3>Preview</h3>
                        <div id="previewContainer" class="preview-container">
                            <div class="preview-empty">
                                Chưa có ảnh được chọn
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>