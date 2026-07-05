<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link rel="stylesheet" href="/car-shop/assets/css/admin.css">
</head>

<body>
    <header>
        <img src="/car-shop/assets/images/cars/logo_cars_2.png" alt="Logo" class="logo-admin">
        <h1>Admin</h1>
        <div class="search">
            <from>
                <input type="text" id="search" placeholder="tìm kiếm chức năng">
            </from>
        </div>
        </search>
    </header>
    <div class="container">
        <left class="sidebar">
            <a href="/car-shop/admin/dashboard.php">
                <img src="/car-shop/assets/images/icon/icon-doanhthutong.png" class="sidebar-icon">
                <span>Dashboard</span>
            </a>

            <a href="/car-shop/admin/cars.php">
                <img src="/car-shop/assets/images/icon/ô-tô-3d.png" class="sidebar-icon">
                <span>Cars</span>
            </a>

            <a href="/car-shop/admin/users.php">
                <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="sidebar-icon">
                <span>Users</span>
            </a>

            <a href="/car-shop/admin/brands.php">
                <img src="/car-shop/assets/images/icon/icon-danhmuc.png" class="sidebar-icon">
                <span>brands</span>
            </a>

            <a href="/car-shop/admin/orders.php">
                <img src="/car-shop/assets/images/icon/icon-order.png" class="sidebar-icon">
                <span>Orders</span>
            </a>
            <button class="btn" href="/car-shop/index.php">Logout</button>
        </left>
    </div>
</body>

</html>