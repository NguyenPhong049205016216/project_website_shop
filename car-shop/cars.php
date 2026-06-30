<?php
include __DIR__.'/config/database.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_POST['wishlist'])) {
  if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
  }
  $user_id = $_SESSION['id'];
  $car_id = $_POST['car_id'];
  // kiểm tra đã thích chưa
  $check = mysqli_query($conn,"
        SELECT *
        FROM wishlist
        WHERE user_id=$user_id
        AND car_id=$car_id
    ");
  if (mysqli_num_rows($check) == 0) { 
    mysqli_query
    ($conn, "NSERT INTO wishlist (user_id,car_id) VALUES ($user_id,$car_id)");
  }
  header("Location: cars.php");
  exit();
}
$sql = "SELECT
    c.*,
    b.brand_name,
    ct.cartegory_name,
    COALESCE(ci.image_urd, c.main_image) AS image
    FROM cars c
    LEFT JOIN brands b
    ON c.brand_id = b.id
    LEFT JOIN cartegories ct
    ON c.categories_id = ct.id
    LEFT JOIN car_images ci
    ON c.id = ci.car_id
    WHERE c.status='available'
    GROUP BY c.id";
$result = mysqli_query($conn, $sql);
$cars = [];
while ($row = mysqli_fetch_assoc($result)) {
  $cars[] = $row;
}
$title = "AutoViet — Tìm Xe Của Bạn";
include 'includes/header.php';
?>
<!-- CSS riêng cho trang xe (header.php giữ nguyên nên thêm trực tiếp ở đây) -->
<link rel="stylesheet" href="assets/css/cars.css">
<!-- HERO / SEARCH -->
<div class="hero">
  <div class="hero-title">Tìm xe phù hợp với bạn</div>
  <div class="hero-sub">Hơn 10.000 mẫu xe đang chờ — nhập từ khóa hoặc chọn bộ lọc bên dưới</div>
  <div class="search-bar">
    <input type="text" placeholder="Nhập hãng xe, dòng xe (vd: Toyota, CX-5, SUV…)" id="searchInput">
    <button onclick="filterCars()">🔍 Tìm ngay</button>
  </div>
  <div class="quick-filters">
    <div class="pill active" onclick="setType(event,'')">Tất cả</div>
    <div class="pill" onclick="setType(event,'SUV')">SUV</div>
    <div class="pill" onclick="setType(event,'Sedan')">Sedan</div>
    <div class="pill" onclick="setType(event,'Sport')">Sport</div>
    <div class="pill" onclick="setType(event,'Electric SUV')">Electric SUV</div>
    <div class="pill" onclick="setType(event,'Truck')">Truck</div>
    <div class="pill" onclick="setType(event,'Luxury')">Luxury</div>
    <div class="pill" onclick="setType(event,'Convertible')">Convertible</div>
  </div>
</div>
<!-- MAIN LAYOUT -->
<div class="page-body">
  <!-- SIDEBAR -->
  <aside>
    <!-- Hãng xe -->
    <div class="filter-card">
      <div class="filter-header">
        Hãng xe
        <span class="filter-reset" onclick="clearFilter('brand')">Xóa</span>
      </div>
      <div class="filter-body">
        <?php
        $brands = array_unique(array_column($cars, 'brand_name'));
        foreach ($brands as $b):
          $cnt = count(array_filter($cars, fn($c) => $c['brand_name'] == $b));
        ?>
          <label class="filter-option">
            <input type="checkbox" name="brand" value="<?= $b ?>" onchange="filterCars()">
            <span class="checkbox-box"></span>
            <?= $b ?>
            <span class="filter-count"><?= $cnt ?></span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Giá -->
    <div class="filter-card">
      <div class="filter-header">Khoảng giá</div>
      <div class="filter-body">
        <div class="price-range">
          <input type="range" min="0" max="3000" step="50" value="3000" id="priceRange" oninput="updatePrice(this.value)">
          <div class="price-labels">
            <span>0 triệu</span>
            <span id="priceLabel">≤ 3 tỷ</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Nhiên liệu -->
    <div class="filter-card">
      <div class="filter-header">Nhiên liệu</div>
      <div class="filter-body">
        <?php foreach (['Xăng', 'Dầu', 'Điện', 'Hybrid'] as $f): ?>
          <label class="filter-option">
            <input type="checkbox" name="fuel" value="<?= $f ?>" onchange="filterCars()">
            <span class="checkbox-box"></span>
            <?= $f ?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Tình trạng -->
    <div class="filter-card">
      <div class="filter-header">Tình trạng</div>
      <div class="filter-body">
        <label class="filter-option">
          <input type="checkbox" name="condition" value="available" onchange="filterCars()">
          <span class="checkbox-box"></span>
          Có sẵn
        </label>
        <label class="filter-option">
          <input type="checkbox" name="condition" value="sold" onchange="filterCars()">
          <span class="checkbox-box"></span>
          Đã bán
        </label>
      </div>
    </div>
  </aside>
  <!-- CAR LIST -->
  <div class="main-content">
    <div class="results-bar">
      <div class="results-count">Tìm thấy <strong id="resultCount"><?= count($cars) ?></strong> mẫu xe</div>
      <select class="sort-select" onchange="sortCars(this.value)">
        <option value="default">Sắp xếp: Mặc định</option>
        <option value="price_asc">Giá: Thấp → Cao</option>
        <option value="price_desc">Giá: Cao → Thấp</option>
        <option value="year_desc">Mới nhất</option>
      </select>
    </div>
    <div class="car-grid" id="carGrid">
      <?php foreach ($cars as $car): ?>
        <div class="car-card"
          data-brand="<?= $car['brand_name'] ?>"
          data-type="<?= $car['cartegory_name'] ?>"
          data-fuel="<?= $car['fuel_type'] ?>"
          data-price="<?= $car['price'] / 1000000 ?>"
          data-year="<?= $car['year'] ?>">
          <div class="car-img-wrap">
            <img src="<?= $car['image'] ?>" alt="<?= $car['brand_name'] . ' ' . $car['cars_name'] ?>">
            <?php if ($car['status'] == "available"): ?>
              <span class="badge-new">Có sẵn</span>
            <?php else: ?>
              <span class="badge-used">Đã bán</span>
            <?php endif; ?>
            <form method="POST">
              <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
              <button class="wishlist-btn" name="wishlist" type="submit">♡</button>
            </form>
          </div>
          <div class="car-info">
            <div class="car-brand"><?= $car['brand_name'] ?></div>
            <div class="car-name"><?= $car['year'] . ' ' . $car['cars_name'] ?></div>
            <div class="car-specs">
              <div class="spec-item"><span class="spec-icon">⛽</span><?= $car['fuel_type'] ?></div>
              <div class="spec-item"><span class="spec-icon">⚙️</span><?= $car['transmission'] ?></div>
              <div class="spec-item"><span class="spec-icon"><img class="specion" src="/car-shop/assets/images/icon/ô-tô-3d.png"></span><?= $car['engine'] ?></div>
              <div class="spec-item"><span class="spec-icon">🎨</span><?= $car['color'] ?></div>
            </div>
            <div class="car-footer">  
              <div>
                <div class="car-price"><?= number_format($car['price']) ?> VNĐ</div>
                <div class="car-price-sub">đã bao gồm thuế</div>
              </div>
              <a class="btn-detail" href="car-detail.php?id=<?= $car['id'] ?>">
                Xem chi tiết  
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- COMPARE BAR -->
<!-- <div class="compare-bar" id="compareBar">
  <div class="compare-slots">
    <div class="compare-slot" id="slot1">＋ Thêm xe so sánh</div>
    <div class="compare-slot" id="slot2">＋ Thêm xe so sánh</div>
    <div class="compare-slot" id="slot3">＋ Thêm xe so sánh</div>
  </div>
  <button class="compare-btn">So sánh ngay</button>
  <button onclick="closeCompare()" style="background:none;border:none;color:rgba(255,255,255,.5);font-size:1.2rem;cursor:pointer">✕</button>
</div> -->
<!-- JS riêng cho trang xe -->
<script src="assets/js/cars.js"></script>
<?php include 'includes/footer.php'; ?>