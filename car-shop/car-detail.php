<head>
    <link rel="stylesheet" href="assets/css/detail.css">
</head>

<body class="car-detail-page">

    <?php include "includes/header.php"; ?>

    <main class="detail-wrapper">

        <!-- CỘT TRÁI -->
        <section class="gallery-section">
            <div class="gallery-top">
                <img class="badge-img" src="/car-shop/assets/images/cars/icon-new.png">
                <button class="heart-btn">
                    <img class="heart-img" src="/car-shop/assets/images/cars/wishlist.png">
                </button>
            </div>

            <div class="main-image">
                <button class="arrow arrow-left">
                    <img src="/car-shop/assets/images/icon/mui_ten-left.png" class="btn-fr">
                </button>
                <img id="mainCarImage" src="/car-shop/assets/images/cars/toyota_1.png" alt="Car">
                <button class="arrow arrow-right">
                    <img src="/car-shop/assets/images/icon/mui_ten.png">
                </button>
                <span class="image-count">1/4</span>
            </div>

            <div class="sub-images">
                <img class="thumb active" src="/car-shop/assets/images/cars/toyota_1.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_2.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_3.png">
                <img class="thumb" src="/car-shop/assets/images/cars/toyota_3(vang).png">
            </div>

            <div class="service-row">
                <div>
                    <span class="svc-icon">
                    </span>
                    <p>Bảo hành</p>
                    <strong>3 năm</strong>
                </div>
                <div>
                    <span class="svc-icon">
                    </span>
                    <p>Bảo dưỡng</p><strong>Miễn phí</strong>
                </div>
                <div>
                    <span class="svc-icon">

                    </span>
                    <p>Hỗ trợ</p><strong>24/7</strong>
                </div>
            </div>
        </section>

        <!-- CỘT GIỮA -->
        <section class="info-section">
            <div class="brand-row">
                <span class="brand-logo"></span>
                <span class="car-brand">Hảng xe</span>
            </div>

            <h1>Tên xe <span class="verify">●</span></h1>

            <div class="rating">
                <span>(0 đánh giá)</span>
            </div>

            <p class="description">
                Toyota GR Supra là mẫu xe thể thao hiệu suất cao, thiết kế hiện đại,
                động cơ Turbo mạnh mẽ cùng nhiều công nghệ hỗ trợ lái tiên tiến.
            </p>
            <!-- dữ nguyên -->
            <h2>
                <span class="section-icon">
                    <!-- icon thông số -->
                    <img src="/car-shop/assets/images/icon/thong-so-ky-thuat.png">
                </span>
                Thông số kỹ thuật
            </h2>
            <div class="spec-grid">
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon công suất -->
                        <img src="/car-shop/assets/images/icon/cong-xuat.png">
                    </span>
                    <p>Công suất</p>
                    <strong>382 HP</strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon Nhiên liệu -->
                        <img src="/car-shop/assets/images/icon/nhien-lieu.png">
                    </span>
                    <p>Nhiên liệu</p>
                    <strong>Xăng</strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon tốc độ tối đa -->
                        <img src="/car-shop/assets/images/icon/toc-do.png">
                    </span>
                    <p>Tốc độ tối đa</p>
                    <strong>250 km/h</strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon hộp số -->
                        <img src="/car-shop/assets/images/icon/hop-so.png">
                    </span>
                    <p>Hộp số</p>
                    <strong>AT 8 cấp</strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <!-- icon năm sản xuất -->
                        <img src="/car-shop/assets/images/icon/nam-sx.png">
                    </span>
                    <p>Năm sản xuất</p><strong>2024</strong>
                </div>
                <div class="spec-box">
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/loai-xe.png">
                        <!-- icon loại xe -->
                    </span>
                    <p>Loại xe</p>
                    <strong>Sport</strong>
                </div>
            </div>

            <h2>
                <span class="section-icon">
                    <!-- icon tính năng nỗi bật -->
                    <img src="/car-shop/assets/images/icon/tinh-nb.png">
                </span> Tính năng nổi bật
            </h2>

            <div class="feature-grid">
                <div>Cruise Control</div>
                <div>Camera 360</div>
                <div>Apple CarPlay</div>
                <div>Android Auto</div>
                <div>Cảm biến lùi</div>
                <div>Màn hình 12.3"</div>
            </div>
        </section>

        <!-- CỘT PHẢI -->
        <aside class="booking-section">
            <div class="price-card">
                <div class="price-title">
                    <h2>Giá bán</h2>
                    <span class="info-icon">i</span>
                </div>

                <div class="price">3.200.000.000đ</div>
                <p class="vat">(Đã gồm VAT)</p>

                <span class="stock"> Còn hàng</span>

                <a href="#" class="btn-cart">
                    <span class="icon">
                        <!-- icon Giỏ hàng -->
                        <img class="heart-img" src="/car-shop/assets/images/icon/gio-hang.png">
                    </span>
                    Thêm giỏ hàng
                </a>

                <a href="#" class="btn-wishlist">
                    <span class="icon">
                        <!-- icon wisslist -->
                        <img class="heart-img" src="/car-shop/assets/images/cars/wishlist.png">
                    </span>
                    Thêm Wishlist
                </a>
            </div>

            <div class="benefit-card">
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Cam kết chính hãng</strong>
                    <br>100% chính hãng Toyota</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Ưu đãi hấp dẫn</strong>
                    <br>Hỗ trợ trả góp đến 80%</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Đổi trả dễ dàng</strong>
                    <br>Đổi xe trong 7 ngày</p>
                </div>
                <div>
                    <span class="icon">
                        <img src="/car-shop/assets/images/icon/nut-xanh.png" class="bnf-icon">
                    </span>
                    <p><strong>Giao xe tận nơi</strong>
                    <br>Miễn phí trong bán kính 50km</p>
                </div>
            </div>
        </aside>

    </main>

    <?php include "includes/footer.php"; ?>

    <script src="assets/js/detail.js"></script>
</body>