-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2026 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `car_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo`) VALUES
(1, 'Toyota', 'assets/images/cars/icon_trademark_toyota.png'),
(2, 'Audi', 'assets/images/cars/icon_Audi.png'),
(3, 'Vinfast', 'assets/images/cars/icon_vinfast.png'),
(4, 'Volkswagen', 'assets/images/cars/icon-Volkswagen.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `cars_name` varchar(50) NOT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `main_image` varchar(50) NOT NULL,
  `status` enum('available','sold','hidden') NOT NULL DEFAULT 'available',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `categories_id`, `cars_name`, `price`, `fuel_type`, `transmission`, `engine`, `color`, `quantity`, `description`, `main_image`, `status`, `created_at`, `year`) VALUES
(1, 1, 1, 'SUV-black', 650000000, 'xăng', 'tự động', '2.0L', 'black', 5, 'Xe SUV toyota màu đen, thiết kế hiện đại.', 'assets/images/img-cars/toyota_2.png', 'available', '2026-06-23 18:52:57', 2025),
(6, 1, 1, 'Toyota SUV 3', 750000000, 'Xăng', 'Tự Động', '1.5L', 'Đỏ', 0, 'Xe hạng xang, giá cả phải chăn, đồng hành cùng toyota nào, lợi xăng, ngoại hình, và bảo hành khoáng hậu.', 'assets/images/img-cars/toyota_3.png', 'available', '2026-06-25 20:31:21', 2021),
(7, 2, 2, 'Audi B25 sedan', 1500000000000, 'Xăng', 'Tự Động', '2.0L', 'Trắng', 2, 'Xe hạng xang, dành cho hội thành viên, đi đâu có audi lo nha.', 'assets/images/img-cars/Audi_mutran_white.png', 'hidden', '2026-06-26 01:00:40', 2022),
(8, 3, 3, 'Vinfast VF5', 890000000, 'Điện', 'Tự Động', '100KW', 'xanh', 7, 'Điện thả ga, cần điện có trụ lo, trụ xạc khắp mọi nễu đường, điện trên con đường của bạn.', 'assets/images/img-cars/Vinfast_Vs5.png', 'available', '2026-06-26 02:20:14', 2023),
(9, 2, 2, 'Audi Red Max', 14000000000, 'Xăng', 'Tự Động', '1.8L', 'Red', 0, 'Xe hạng xang, gia đình, và mái ấm, đồng hành ngay cùng Audi, lợi xăng, hảng uy tín, bảo hành đổi trả khỏi cần lo.', 'assets/images/img-cars/Audi_bantai_red.png', 'sold', '2026-06-26 03:38:58', 2024),
(13, 3, 3, 'Vinfast Maxbox ', 750000000, 'Điện', 'Tự động', 'IPM', 'Bạc', 1, 'Xe xạc xiêu nhanh chóng', 'assets/images/img-cars/Vinfast_Vs100_JT.png', 'available', '2026-06-26 12:53:10', 2010),
(14, 2, 3, 'Audi black', 850000000, 'Xăng', 'Tự động', '2.0L', 'Bạc ', 3, 'Xe đẹp chất lượng cao, hàng giảm dá. ', 'assets/images/img-cars/Audi_mutran.png', 'available', '2026-06-30 10:51:49', 2019);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartegories`
--

CREATE TABLE `cartegories` (
  `id` int(11) NOT NULL,
  `cartegory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cartegories`
--

INSERT INTO `cartegories` (`id`, `cartegory_name`) VALUES
(1, 'SUV '),
(2, 'Sedan'),
(3, 'Sport'),
(4, 'Electric SUV'),
(5, 'Truck'),
(6, 'Luxury'),
(7, 'Convertible');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_details`
--

CREATE TABLE `car_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` double(10,0) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `image_urd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `phone`, `address`, `total_price`, `status`, `created_at`) VALUES
(1, 1, 'Phông nguyễn', '0293452349', 'Hồ chí minh, Quận 12, 25/4 ', 650000000, 'confirmed', '2026-06-28 00:57:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','blocket') NOT NULL DEFAULT 'active',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `status`, `updated_at`) VALUES
(1, 'Nguyễn Phông', 'Phong@gmail.com', 'abc123456', '0293452349', 'Hồ Chí Minh', 'admin', '2026-06-21 14:25:23', 'active', NULL),
(2, 'Nguyễn Đông', 'dongnd@gmail.com', 'bcd2345', '0458345721', 'Hồ Chí Minh', 'user', '2026-06-23 21:15:19', 'blocket', NULL),
(4, 'Trần Thị Thu', 'Thu@gmail.com', 'Thu12345', '0966746251', 'Hồ Chí Minh', 'user', '2026-06-25 15:42:25', 'active', NULL),
(5, 'Nguyễn Côn Nam', 'connam@gmail.com', 'ncn123', '0975434920', 'Bến Tre', 'user', '2026-06-26 03:40:40', 'blocket', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `cteated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `car_id`, `cteated_at`) VALUES
(1, 2, 1, '2026-06-29 15:25:04'),
(2, 2, 8, '2026-06-29 16:45:35'),
(3, 2, 14, '2026-06-30 21:00:56'),
(4, 2, 6, '2026-07-01 11:08:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_category_id` (`categories_id`),
  ADD KEY `Fk_brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cartegories`
--
ALTER TABLE `cartegories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_order_id` (`order_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Chỉ mục cho bảng `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `car_id_2` (`car_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_user_id` (`user_id`),
  ADD KEY `Fk_car_id` (`car_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cartegories`
--
ALTER TABLE `cartegories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `Fk_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `Fk_category_id` FOREIGN KEY (`categories_id`) REFERENCES `cartegories` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `car_details`
--
ALTER TABLE `car_details`
  ADD CONSTRAINT `Fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `fk_carimages_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `Fk_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `Fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
