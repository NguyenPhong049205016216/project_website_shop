<?php
$title = "Trang Chủ";
include "includes/header.php";
?>
<!DOCTYPE html>
<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>
    <div class="main">
        <section class="middle-content">
            <div class="content-layout">
                <div class="content-box">
                    <div class="box-header">
                        <h2>Danh sách xe yêu thích</h2> <p>0/100</p>
                    </div>

                    <div class="box-mid">
                        <div class="box-img-content">
                            <img src="assets/images/cars/document.png" alt="saved car" class="document-icon">
                        </div>
                        <h3>Chưa có xe nào được yêu thích</h3>
                        <p>Khi bạn yêu thích xe, xe được yêu thích sẽ nằm ở đây.</p>
                        <span onclick="navToPage('index.php')">Khám phá ngay</span>
                    </div>

                    <div class="box-footer"></div>
                </div>
            </div>
        </section>
    </div>
</body>
<!-- Footer -->
<?php
include "includes/footer.php";
?>
</html>