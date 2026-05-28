Car Shop Project Structure
PHP + MySQL project structure for web programming.
Frontend, backend, admin, assets, uploads, and database folders included.
# project_website_shop
Thông tin thành viên phải nắm<br>
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
# 3.structor_project.  <br>
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

* Thành viên 1 – Trang chủ & giao diện tổng thể
Thiết kế giao diện trang chủ, navbar, banner, footer.
Làm responsive cho giao diện chính trên điện thoại/tablet.
Code phần hiển thị xe nổi bật, xe mới nhất, hãng xe nổi bật.
Chịu trách nhiệm giao diện tổng thể để các trang còn lại dùng chung style.

* Thành viên 2 – Trang danh sách xe & tìm kiếm/lọc
Thiết kế giao diện trang danh sách xe.
Code hiển thị danh sách xe từ database online.
Làm chức năng tìm kiếm/lọc theo hãng xe, giá, loại xe, năm sản xuất.
Làm phân trang sản phẩm nếu có nhiều xe.

* Thành viên 3 – Trang chi tiết xe & wishlist
Thiết kế giao diện trang chi tiết xe.
Hiển thị hình ảnh, mô tả, thông số kỹ thuật, giá bán của xe.
Code chức năng thêm/xóa xe yêu thích.
Làm trang danh sách wishlist để người dùng xem lại xe đã lưu.

* Thành viên 4 – Tài khoản người dùng & giỏ hàng
Thiết kế giao diện đăng ký, đăng nhập, thông tin tài khoản.
Code đăng ký, đăng nhập, đăng xuất bằng PHP session.
Code giỏ hàng: thêm xe, xóa xe, cập nhật số lượng.
Xử lý đặt hàng cơ bản từ giỏ hàng.

* Thành viên 5 – Admin quản lý xe & database
Thiết kế database MySQL online.
Tạo các bảng: users, cars, brands, categories, orders, order_details, wishlist.
Thiết kế giao diện admin quản lý xe.
Code CRUD xe: thêm, sửa, xóa, xem danh sách xe.
Xử lý upload ảnh xe lên server.

* Thành viên 6 – Admin đơn hàng, người dùng & thống kê
Thiết kế giao diện dashboard admin.
Code quản lý đơn hàng: xem đơn, cập nhật trạng thái đơn hàng.
Code quản lý người dùng: xem danh sách, phân quyền user/admin.
Làm thống kê cơ bản: tổng số xe, tổng đơn hàng, doanh thu, số tài khoản.
Kiểm thử tổng hợp, hỗ trợ ghép code và deploy website online.

