
# project_website_shop
# 1.Quy tắc code nhóm
Dùng chung common.css<br>
Đặt tên class dễ hiểu<br>
Không sửa file người khác nếu chưa báo<br>
Mỗi người code module riêng<br>
Upload code bằng GitHub hoặc Google Drive<br>
Tất cả hình ảnh bỏ vào assets/images/<br>
Tất cả CSS bỏ vào assets/css/<br>
Tất cả JavaScript bỏ vào assets/js/<br>
# 2.Công nghệ sử dụng
Frontend:HTML5,CSS3,JavaScript,Bootstrap 5<br>
Backend:PHP<br>
Database:MySQL,phpMyAdmin.<br>
Deploy Online:InfinityFree hoặc Hostinger.<br>
# 3.structor_project.  
car-shop/<br>
│<br>
├── index.php               # Trang chủ<br>
├── cars.php                # Trang danh sách xe<br>
├── car-detail.php          # Trang chi tiết xe<br>
├── wishlist.php            # Trang xe yêu thích<br>
├── cart.php                # Giỏ hàng<br>
├── checkout.php            # Đặt mua xe<br>
├── login.php               # Đăng nhập<br>
├── register.php            # Đăng ký <br>
├── logout.php              # Đăng xuất<br>
│<br>
├── config/<br>
│   └── database.php        # all file PHP cần file database gọi file này<br>
│<br>
├── includes/               # Hàm dùng chung<br>
│   ├── header.php          # Phần đầu trang dùng chung : menu, logo, link css<br>
│   ├── footer.php          # Phần chân trang<br>
│   └── functions.php       # Hàm dung chung kiểm tra đăng nhập, định dạng tiền, phân quyền<br>
│<br>
├── admin/<br>
│   ├── index.php           # Dashboard quản trị: thống kê số xe, đơn hàng, doanh thu, user.<br>
│   ├── cars.php            # Quản lý xe: thêm, sửa, xóa, xem danh sách xe<br>
│   ├── brands.php          # Quản lý hãng xe: Toyota, Honda, BMW,...<br>
│   ├── orders.php          # Quản lý đơn hàng: xem đơn, cập nhật trạng thái.<br>
│   └── users.php           # Quản lý tài khoản: xem user, phân quyền admin/user.<br>
│<br>
├── assets/                 # Chứa giao diện CSS cho user và admin.<br>
│   ├── css/<br>
│   │   ├── common.css      # <br>
│   │   ├── home.css<br>
│   │   ├── cars.css<br>
│   │   ├── detail.css<br>
│   │   ├── wishlist.css<br>
│   │   ├── cart.css<br>
│   │   ├── auth.css<br>
│   │   └── admin.css<br>
│   │<br>
│   ├── js/                 #Chứa JavaScript: menu mobile, lọc xe, hiệu ứng, validate form.<br>
│   │   └── main.js<br>
│   │<br>
│   └── images/             # Chứa ảnh tĩnh như logo, banner, icon.<br>
│       ├── logo.png<br>
│       ├── banner.jpg<br>
│       └── cars/<br>
│<br>
├── uploads/                # Chứa ảnh xe do admin upload lên khi thêm/sửa sản phẩm.<br>
│   └── cars/<br>
│<br>
└── database/<br>
    └── car_shop.sql<br>
<img width="492" height="736" alt="structer_website_car_xe" src="https://github.com/user-attachments/assets/64376b1e-f97b-4821-b0cb-8d6f1c7dc8b8" />
