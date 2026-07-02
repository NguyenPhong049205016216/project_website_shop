<?php
include __DIR__ . "/config/database.php";
session_start();
$error = "";
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
        } else {
            $error = "sai password";
        }
    } else {
        $error = "email không tồn tại";
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
            <div class="logo_area">
                <span class="logo_name">
                    <img src="/car-shop/assets/images/cars/logo_cars_2.png" alt="Logo">
                </span>
                <!-- <img src="assets/images/logo.png"> -->
            </div>

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
                    <img id="toggle-password" src="/car-shop/assets/images/icon/icon-mom.png" width="35">
                </div>

                <div class="form_btn">
                    <?php if (!empty($error)) { ?>
                        <p style="color:red; text-align:center; font-weight:bold;">
                            <?php echo $error; ?>
                        </p>
                    <?php } ?>
                    <button type="submit" class="btn_login" id="submit-btn" name="login">Login</button>
                </div>
                <div class="form_or">
                    <span>OR</span>
                </div>
                <div class="item_list">
                    <img src="assets/images/icon/google.png" alt="google">
                    <img src="assets/images/icon/facebook.png" alt="facebook">
                    <img src="assets/images/icon/twitter.png" alt="twitter">
                </div>
                <div class="form_or" style="margin-top: 40px;">
                    <span>Chưa có tài khoản? <a href="register.php">Đăng ký ngay!</a></span>
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