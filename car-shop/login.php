<?php
include "config/database.php";
session_start();
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = mysqli_query($conn, "select * from user where email = '$email'");
    if (mysqli_num_rows($sql) > 0) {
        $nguoi_dung = mysqli_fetch_assoc($sql);
        if ($password == $nguoi_dung['password']) {
            $_SESSION['id'] = $nguoi_dung['id'];
            $_SESSION['name'] = $nguoi_dung['name'];
            $_SESSION['email'] = $nguoi_dung['email'];
            $_SESSION['phonenumber'] = $nguoi_dung['phone'];
            $_SESSION['role'] = $nguoi_dung['role'];

            header("Location: index.php");
            exit();
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
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <div class="login_section">
        <div class="box">
            <div class="login_name">
                <h1>Login</h1>
            </div>
            <form action="" method="post" class="form_content" id="login_form">
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Vui lòng nhập email">
                </div>
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Vui lòng nhập password">
                </div>

                <div class="form_btn">
                    <button type="submit" class="btn_login" id="submit-btn" name="login">Login</button>
                </div>
                <div class="form_or">
                    <span>OR</span>
                </div>
                <div class="item_list">
                    <img src="../assets/imgs/google.png" alt="google">
                    <img src="../assets/imgs/facebook.png" alt="facebook">
                    <img src="../assets/imgs/twitter.png" alt="twitter">
                </div>
                <div class="form_or" style="margin-top: 40px;">
                    <span>Chưa có tài khoản? <a href="register.php">Đăng ký ngay!</a></span>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="assets/js/menu-user.js"></script>

</html>