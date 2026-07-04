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
<<<<<<< HEAD
            header("Location: index.php");
=======
            if ($nguoi_dung['role'] == 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: index.php");
            }
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
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
<<<<<<< HEAD
<html lang="vi">
=======
<html lang="en">
>>>>>>> bbc667b59360976b08a513038fcddb0555019882

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Đăng nhập hệ thống</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #311042 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1050px;
            height: 620px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px -12px rgba(236, 72, 153, 0.15), 0 20px 40px -15px rgba(0, 0, 0, 0.7);
        }

        .sidebar_left {
            flex: 1.1;
            background: linear-gradient(135deg, rgba(49, 16, 66, 0.85), rgba(15, 23, 42, 0.9)), 
                        url('https://images.unsplash.com/photo-1617814076367-b759c7d7e738?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: #ffffff;
            text-align: center;
            position: relative;
        }

        .sidebar_left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent, rgba(236, 72, 153, 0.2));
            z-index: 1;
        }

        .logo_large {
            position: relative;
            z-index: 2;
            max-width: 280px;
            margin-bottom: 24px;
            filter: drop-shadow(0 0 25px rgba(236, 72, 153, 0.6));
        }

        .logo_large img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .sidebar_text {
            position: relative;
            z-index: 2;
        }

        .sidebar_text h2 {
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
            background: linear-gradient(to right, #ffffff, #f472b6, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar_text p {
            font-size: 15px;
            color: #cbd5e1;
            line-height: 1.6;
        }

        .form_right {
            flex: 0.9;
            padding: 45px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .login_name {
            margin-bottom: 28px;
        }

        .login_name h1 {
            font-size: 34px;
            background: linear-gradient(135deg, #4f46e5, #x06b21, #d946ef);
            background: linear-gradient(to right, #311042, #701a75, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .error-alert {
            background-color: #fff5f5;
            color: #e11d48;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #ffe4e6;
            font-weight: 500;
            text-align: center;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.08);
        }

        .form_content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form_group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            position: relative;
        }

        .form_group label {
            font-size: 13px;
            font-weight: 600;
            color: #6b21a8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form_group input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 15px;
            color: #0f172a;
            background-color: #fdf8ff;
            transition: all 0.2s ease;
            outline: none;
        }

        .form_group input:focus {
            border-color: #d946ef;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(217, 70, 239, 0.15);
        }

        .form_group_pass {
            position: relative;
        }
        
        .form_group_pass input {
            padding-right: 46px;
        }

        #toggle-password {
            position: absolute;
            right: 14px;
            bottom: 10px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        #toggle-password:hover {
            opacity: 1;
        }

        .form_btn {
            margin-top: 5px;
        }

        .btn_login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #4f46e5 0%, #701a75 50%, #d946ef 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(112, 26, 117, 0.4);
        }

        .btn_login:hover {
            background: linear-gradient(135deg, #4338ca 0%, #611567 50%, #c026d3 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(217, 70, 239, 0.4);
        }

        .form_or {
            text-align: center;
            font-size: 12px;
            color: #a21caf;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 4px 0;
        }

        .item_list {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        .item_list img {
            width: 44px;
            height: 44px;
            padding: 9px;
            border: 1.5px solid #f3e8ff;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s;
            object-fit: contain;
            background-color: #fdf8ff;
        }

        .item_list img:hover {
            background-color: #fae8ff;
            border-color: #d946ef;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 4px 12px rgba(217, 70, 239, 0.2);
        }

        .register_link {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            margin-top: 15px;
        }

        .register_link a {
            color: #d946ef;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .register_link a:hover {
            color: #701a75;
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                height: auto;
                max-width: 450px;
            }
            .sidebar_left {
                padding: 50px 30px;
            }
            .form_right {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="sidebar_left">
            <div class="logo_large">
                <img src="/car-shop/assets/images/cars/logo_cars_2.png" alt="Logo">
            </div>
            <div class="sidebar_text">
                <h2>Chào mừng quay trở lại</h2>
                <p>Đăng nhập để tiếp tục quản lý, khám phá những dòng xe đẳng cấp và nhận các dịch vụ đặc quyền riêng cho bạn.</p>
            </div>
        </div>

        <div class="form_right">
            <div class="login_name">
                <h1>Đăng nhập</h1>
            </div>

            <?php if (!empty($error)) { ?>
                <div class="error-alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>

=======
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
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
            <form action="" method="post" class="form_content" id="login_form">
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Vui lòng nhập email">
                </div>
<<<<<<< HEAD
                
                <div class="form_group form_group_pass">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Vui lòng nhập password">
                    <img id="toggle-password" src="/car-shop/assets/images/icon/icon-mom.png" width="26">
                </div>

                <div class="form_btn">
                    <button type="submit" class="btn_login" id="submit-btn" name="login">Đăng nhập</button>
                </div>
                
                <div class="form_or">
                    <span>HOẶC ĐĂNG NHẬP BẰNG</span>
                </div>
                
=======
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
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
                <div class="item_list">
                    <img src="assets/images/icon/google.png" alt="google">
                    <img src="assets/images/icon/facebook.png" alt="facebook">
                    <img src="assets/images/icon/twitter.png" alt="twitter">
                </div>
<<<<<<< HEAD
                
                <div class="register_link">
=======
                <div class="form_or" style="margin-top: 40px;">
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
                    <span>Chưa có tài khoản? <a href="register.php">Đăng ký ngay!</a></span>
                </div>
            </form>
        </div>
    </div>
<<<<<<< HEAD

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

=======
</body>
<script src="assets/js/user-login.js"></script>
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
</html>