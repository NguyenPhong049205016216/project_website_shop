<?php
require_once __DIR__ . '/config/database.php';
if (isset($_POST['register'])) {
    $ho_ten = trim($_POST['username']);
    $mat_khau = $_POST['password'];
    $phonenumber = trim($_POST['phonenumber']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $check = mysqli_query($conn, "select * from user where email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "email đã tồn tại";
    } else {
        $sql = "insert into user(name, email, password, phone, address, role) 
                values('$ho_ten', '$email', '$mat_khau', '$phonenumber', '$address', 'user')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="login_section">
        <div class="box">
            <div class="logo_area">
                <span class="logo_name">
                    <img src="/car-shop/assets/images/cars/logo_cars_2.png" alt="Logo">
                </span>
                <!-- <img src="assets/images/logo.png"> -->
            </div>
            <div class="login_name">
                <h1>Register</h1>
            </div>
            <form action="" method="POST" class="form_content" id="login_form">
                <div class="form_group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Vui lòng nhập username" required>
                </div>
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Vui lòng nhập password">
                    <img id="toggle-password" src="/car-shop/assets/images/icon/icon-mom.png" width="35">
                </div>
                <div class="form_group">
                    <label for="phonenumber">SĐT</label>
                    <input type="tel" id="phonenumber" name="phonenumber" placeholder="Vui lòng nhập số điện thoại" required>
                </div>
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Vui lòng nhập email" required>
                </div>
                <div class="form_group">
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option  class="form-control" value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form_btn">
                    <button type="submit" class="btn_register" id="submit-btn" name="register">Register</button>
                </div>
                <div class ="form_or" style="margin-top: 40px;">
                    <span>Đã có tài khoản? <a href="login.php">Đăng nhập ngay!</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const password = document.getElementById("password");
    const eye = document.getElementById("toggle-password");
    eye.addEventListener("click", function () {
        if (password.type === "password") {
            password.type = "text";
            eye.src = "/car-shop/assets/images/icon/icon-camm.png";
        } else {
            password.type = "password";
            eye.src = "/car-shop/assets/images/icon/icon-mom.png";
        }
    });
</script>
</html>