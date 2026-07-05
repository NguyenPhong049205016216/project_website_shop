<?php
include "../index.php";
require __DIR__ . "/../../config/database.php";

$resultCars = mysqli_query($conn, "SELECT id,cars_name FROM cars ORDER BY cars_name");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/car-shop/assets/css/ad-detail.css">
</head>

<body>

    <main class="main-content">

        <div class="image-page">

            <h2>Car Images Management</h2>

            <p>Thêm nhiều ảnh cho từng xe.</p>

            <form action="image-store.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">

                    <label>Chọn xe</label>
                    <select name="car_id" required>
                        <option value="">-- Chọn xe --</option>
                        <?php while ($car = mysqli_fetch_assoc($resultCars)) { ?>
                            <option value="<?= $car['id'] ?>">
                                <?= $car['cars_name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh phụ</label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*" required>
                </div>
                <button type="submit" name="upload" class="save-btn"> Upload Images </button>
            </form>
            <div class="preview-box">
                <h3>Preview</h3>
                <div
                    id="previewContainer"
                    class="preview-container">
                    <div class="preview-empty">
                        Chưa có ảnh
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const images = document.getElementById("images");

        const container = document.getElementById("previewContainer");

        images.addEventListener("change", () => {

            container.innerHTML = "";

            Array.from(images.files).forEach(file => {

                let div = document.createElement("div");

                div.className = "preview-item";

                let img = document.createElement("img");

                img.src = URL.createObjectURL(file);

                div.appendChild(img);

                container.appendChild(div);

            });

        });
    </script>

</body>

</html>