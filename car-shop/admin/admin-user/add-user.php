<?php
require __DIR__ . "/../../config/database.php";
require __DIR__ . "/../../app/models/User.php";

if (isset($_POST['submit'])) {
    $user = new User($conn);
    $user -> create($_POST);
    header("Location: ../users.php");
    exit;
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
                <h1 class="chapter">add user</h1>
                <div class="form-card">
                    <form method="POST" class="user-form">
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text" name="name" placeholder="nhập tên người dùng">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="nhập email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>Passworđ</label>
                            <input type="text" name="password" placeholder="nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-action">
                            <a href="/car-shop/admin/users.php" class="btn-cancel">Cancel</a>
                            <button class="btn-submit" type="submit" name="submit">Thêm user</button>
                        </div>
                    </form>
                </div>
                <div class="from-card">
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>