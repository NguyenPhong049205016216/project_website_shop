<?php
// Dữ liệu mẫu xe (thay bằng truy vấn CSDL khi có DB)
$cars = [
    ["id"=>1,"brand"=>"Toyota","model"=>"Camry","year"=>2024,"price"=>1050000000,"fuel"=>"Xăng","seats"=>5,"transmission"=>"Tự động","color"=>"Trắng ngọc","img"=>"https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=600&q=80","km"=>0,"type"=>"Sedan"],
    ["id"=>2,"brand"=>"Honda","model"=>"CR-V","year"=>2024,"price"=>1150000000,"fuel"=>"Xăng","seats"=>7,"transmission"=>"Tự động","color"=>"Đen","img"=>"https://images.unsplash.com/photo-1617788138017-80ad40651399?w=600&q=80","km"=>0,"type"=>"SUV"],
    ["id"=>3,"brand"=>"Hyundai","model"=>"Tucson","year"=>2023,"price"=>825000000,"fuel"=>"Xăng","seats"=>5,"transmission"=>"Tự động","color"=>"Bạc","img"=>"https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=600&q=80","km"=>12000,"type"=>"SUV"],
    ["id"=>4,"brand"=>"Mazda","model"=>"CX-5","year"=>2024,"price"=>899000000,"fuel"=>"Xăng","seats"=>5,"transmission"=>"Tự động","color"=>"Đỏ","img"=>"https://images.unsplash.com/photo-1551501398-3dbf7cade49c?w=600&q=80","km"=>0,"type"=>"SUV"],
    ["id"=>5,"brand"=>"Ford","model"=>"Ranger","year"=>2023,"price"=>750000000,"fuel"=>"Dầu","seats"=>5,"transmission"=>"Tự động","color"=>"Xanh dương","img"=>"https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80","km"=>25000,"type"=>"Pickup"],
    ["id"=>6,"brand"=>"Kia","model"=>"Sorento","year"=>2024,"price"=>1199000000,"fuel"=>"Hybrid","seats"=>7,"transmission"=>"Tự động","color"=>"Xanh rêu","img"=>"https://images.unsplash.com/photo-1625231338786-22a4e80e05f6?w=600&q=80","km"=>0,"type"=>"SUV"],
    ["id"=>7,"brand"=>"VinFast","model"=>"VF 8","year"=>2024,"price"=>1090000000,"fuel"=>"Điện","seats"=>5,"transmission"=>"Tự động","color"=>"Trắng","img"=>"https://images.unsplash.com/photo-1593941707882-a5bba14938c7?w=600&q=80","km"=>0,"type"=>"SUV"],
    ["id"=>8,"brand"=>"Mercedes","model"=>"C 200","year"=>2023,"price"=>1750000000,"fuel"=>"Xăng","seats"=>5,"transmission"=>"Tự động","color"=>"Đen","img"=>"https://images.unsplash.com/photo-1553440569-bcc63803a83d?w=600&q=80","km"=>8000,"type"=>"Sedan"],
    ["id"=>9,"brand"=>"Toyota","model"=>"Fortuner","year"=>2024,"price"=>1200000000,"fuel"=>"Dầu","seats"=>7,"transmission"=>"Tự động","color"=>"Xám","img"=>"https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=600&q=80","km"=>0,"type"=>"SUV"],
];

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
    <div class="pill active" onclick="setType(event, '')">Tất cả</div>
    <div class="pill" onclick="setType(event, 'SUV')">SUV</div>
    <div class="pill" onclick="setType(event, 'Sedan')">Sedan</div>
    <div class="pill" onclick="setType(event, 'Pickup')">Pickup</div>
    <div class="pill" onclick="setType(event, 'Hatchback')">Hatchback</div>
    <div class="pill" onclick="setType(event, 'MPV')">MPV</div>
    <div class="pill" onclick="setFuel('Điện')">⚡ Xe điện</div>
    <div class="pill" onclick="setFuel('Hybrid')">🌿 Hybrid</div>
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
          $brands = array_unique(array_column($cars, 'brand'));
          foreach($brands as $b):
            $cnt = count(array_filter($cars, fn($c)=>$c['brand']==$b));
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
        <?php foreach(['Xăng','Dầu','Điện','Hybrid'] as $f): ?>
        <label class="filter-option">
          <input type="checkbox" name="fuel" value="<?= $f ?>" onchange="filterCars()">
          <span class="checkbox-box"></span>
          <?= $f ?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Số ghế -->
    <div class="filter-card">
      <div class="filter-header">Số chỗ ngồi</div>
      <div class="filter-body">
        <?php foreach([5,7] as $s): ?>
        <label class="filter-option">
          <input type="checkbox" name="seats" value="<?= $s ?>" onchange="filterCars()">
          <span class="checkbox-box"></span>
          <?= $s ?> chỗ
        </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Tình trạng -->
    <div class="filter-card">
      <div class="filter-header">Tình trạng</div>
      <div class="filter-body">
        <label class="filter-option">
          <input type="checkbox" name="condition" value="new" onchange="filterCars()">
          <span class="checkbox-box"></span>
          Xe mới
        </label>
        <label class="filter-option">
          <input type="checkbox" name="condition" value="used" onchange="filterCars()">
          <span class="checkbox-box"></span>
          Xe đã qua sử dụng
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
      <?php foreach($cars as $car): ?>
      <div class="car-card"
           data-brand="<?= $car['brand'] ?>"
           data-type="<?= $car['type'] ?>"
           data-fuel="<?= $car['fuel'] ?>"
           data-seats="<?= $car['seats'] ?>"
           data-price="<?= $car['price'] / 1000000 ?>"
           data-km="<?= $car['km'] ?>"
           data-year="<?= $car['year'] ?>">
        <div class="car-img-wrap">
          <img src="<?= $car['img'] ?>" alt="<?= $car['brand'].' '.$car['model'] ?>" loading="lazy">
          <?php if($car['km'] === 0): ?>
            <span class="badge-new">Xe mới</span>
          <?php else: ?>
            <span class="badge-used">Đã dùng</span>
          <?php endif; ?>
          <button class="wishlist-btn" title="Lưu yêu thích">♡</button>
        </div>
        <div class="car-info">
          <div class="car-brand"><?= $car['brand'] ?></div>
          <div class="car-name"><?= $car['year'].' '.$car['model'] ?></div>
          <div class="car-specs">
            <div class="spec-item"><span class="spec-icon">⛽</span><?= $car['fuel'] ?></div>
            <div class="spec-item"><span class="spec-icon">🪑</span><?= $car['seats'] ?> chỗ</div>
            <div class="spec-item"><span class="spec-icon">⚙️</span><?= $car['transmission'] ?></div>
            <div class="spec-item"><span class="spec-icon">🎨</span><?= $car['color'] ?></div>
            <?php if($car['km'] > 0): ?>
            <div class="spec-item" style="grid-column:span 2"><span class="spec-icon">📍</span><?= number_format($car['km']) ?> km</div>
            <?php endif; ?>
          </div>
          <div class="car-footer">
            <div>
              <div class="car-price"><?= number_format($car['price'] / 1000000) ?> triệu</div>
              <div class="car-price-sub">đã bao gồm thuế</div>
            </div>
            <button class="btn-detail">Xem chi tiết →</button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- COMPARE BAR -->
<div class="compare-bar" id="compareBar">
  <div class="compare-slots">
    <div class="compare-slot" id="slot1">＋ Thêm xe so sánh</div>
    <div class="compare-slot" id="slot2">＋ Thêm xe so sánh</div>
    <div class="compare-slot" id="slot3">＋ Thêm xe so sánh</div>
  </div>
  <button class="compare-btn">So sánh ngay</button>
  <button onclick="closeCompare()" style="background:none;border:none;color:rgba(255,255,255,.5);font-size:1.2rem;cursor:pointer">✕</button>
</div>

<!-- JS riêng cho trang xe -->
<script src="assets/js/cars.js"></script>

<?php include 'includes/footer.php'; ?>