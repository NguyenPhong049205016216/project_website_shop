<?php
require_once __DIR__ . '/config/database.php';
<<<<<<< HEAD

=======
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
if (isset($_POST['register'])) {
    $ho_ten = trim($_POST['username']);
    $mat_khau = $_POST['password'];
    $phonenumber = trim($_POST['phonenumber']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
<<<<<<< HEAD

    $check = mysqli_query($conn, "select * from user where email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $error_msg = "Email đã tồn tại trên hệ thống!";
=======
    $check = mysqli_query($conn, "select * from user where email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "email đã tồn tại";
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
    } else {
        $sql = "insert into user(name, email, password, phone, address, role) 
                values('$ho_ten', '$email', '$mat_khau', '$phonenumber', '$address', 'user')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
<<<<<<< HEAD
            $error_msg = "Lỗi: " . mysqli_error($conn);
=======
            echo "Lỗi: " . mysqli_error($conn);
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
        }
    }
}
?>

<!DOCTYPE html>
<<<<<<< HEAD
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #0f172a;
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
            height: 680px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .sidebar_left {
            flex: 1.1;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(30, 41, 59, 0.95)), 
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
            background: radial-gradient(circle at center, transparent 20%, rgba(15, 23, 42, 0.6));
        }

        .logo_large {
            position: relative;
            z-index: 2;
            max-width: 280px;
            margin-bottom: 24px;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
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
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
            background: linear-gradient(to right, #ffffff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar_text p {
            font-size: 15px;
            color: #94a3b8;
            line-height: 1.6;
        }

        .form_right {
            flex: 0.9;
            padding: 45px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
            overflow-y: auto;
        }

        .login_name {
            margin-bottom: 24px;
        }

        .login_name h1 {
            font-size: 32px;
            color: #0f172a;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .error-alert {
            background-color: #fef2f2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #fee2e2;
            font-weight: 500;
        }

        .form_content {
            display: flex;
            flex-direction: column;
            gap: 16px;
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
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form_group input {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 15px;
            color: #0f172a;
            background-color: #f8fafc;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        .form_group input:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
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
            bottom: 8px;
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.2s;
        }

        #toggle-password:hover {
            opacity: 1;
        }

        .form_btn {
            margin-top: 8px;
        }

        .btn_register {
            width: 100%;
            padding: 13px;
            background-color: #1e40af;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(30, 64, 175, 0.2);
        }

        .btn_register:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(30, 64, 175, 0.3);
        }

        .btn_register:active {
            transform: translateY(0);
        }

        .form_or {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            margin-top: 8px;
        }

        .form_or a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }

        .form_or a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                height: auto;
                max-width: 480px;
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
                <h2>Hành trình mới chờ đón bạn</h2>
                <p>Đăng ký ngay hôm nay để nhận được những ưu đãi đặc quyền và trải nghiệm dịch vụ chăm sóc xe hàng đầu của chúng tôi.</p>
            </div>
        </div>

        <div class="form_right">
            <div class="login_name">
                <h1>Đăng ký</h1>
            </div>

            <?php if (isset($error_msg)): ?>
                <div class="error-alert">
                    <?php echo $error_msg; ?>
                </div>
            <?php endif; ?>

=======
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
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
            <form action="" method="POST" class="form_content" id="login_form">
                <div class="form_group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Vui lòng nhập username" required>
                </div>
<<<<<<< HEAD
                
                <div class="form_group form_group_pass">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Vui lòng nhập password">
                    <img id="toggle-password" src="/car-shop/assets/images/icon/icon-mom.png" width="26">
                </div>
                
                <div class="form_group">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="tel" id="phonenumber" name="phonenumber" placeholder="Vui lòng nhập số điện thoại" required>
                </div>
                
=======
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Vui lòng nhập password">
                    <img id="toggle-password" src="/car-shop/assets/images/icon/icon-mom.png" width="35">
                </div>
                <div class="form_group">
                    <label for="phonenumber">SĐT</label>
                    <input type="tel" id="phonenumber" name="phonenumber" placeholder="Vui lòng nhập số điện thoại" required>
                </div>
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Vui lòng nhập email" required>
                </div>
<<<<<<< HEAD
                
                <div class="form_group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" placeholder="Vui lòng nhập địa chỉ" required>
                </div>

                <div class="form_btn">
                    <button type="submit" class="btn_register" id="submit-btn" name="register">Đăng ký</button>
                </div>
                
                <div class="form_or">
=======
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
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
                    <span>Đã có tài khoản? <a href="login.php">Đăng nhập ngay!</a></span>
                </div>
            </form>
        </div>
    </div>
<<<<<<< HEAD
    
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
</body>
=======
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
>>>>>>> bbc667b59360976b08a513038fcddb0555019882
</html>