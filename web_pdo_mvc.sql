-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2022 lúc 06:02 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_pdo_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'hieuadmin', '12345678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_deltails`
--

CREATE TABLE `tbl_cart_deltails` (
  `id_cart_detail` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity_product_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id_category_product` int(11) NOT NULL,
  `title_category_product` varchar(255) NOT NULL,
  `desc_category_product` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `title_category_product`, `desc_category_product`) VALUES
(1, 'Máy tính', 'Máy tính các loại đẹp'),
(2, 'Điện thoại', 'Điện thoại các loại đẹp'),
(3, 'Đồng hồ', 'Đồng hồ tốt bậc nhất Việt Nam'),
(4, 'Tivi', 'Tivi các loại tốt nhất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `id_customer`, `id_product`, `content`, `rating`) VALUES
(12, 1, 11, 'Tivi tuyệt vời quá <3', 5),
(13, 1, 19, 'Quá tệ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`) VALUES
(1, 'Nguyễn Minh Hiếu', '0774452227', 'mhieu7252@gmail.com', '12345678', 'Phong Điền, Thừa thiên huế'),
(2, 'Hieu Nguyen', '0329568259', 'mhieu@gmail.com', '12345678', 'Huế'),
(3, 'Hiếu Nguyễn', '12444444', 'minhhieu.it.ute@gmail.com', '12345678', 'Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_image_desc`
--

CREATE TABLE `tbl_image_desc` (
  `id_image` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_image_desc`
--

INSERT INTO `tbl_image_desc` (`id_image`, `id_sanpham`, `image`) VALUES
(1, 10, 'ip11641182041.jpg'),
(2, 10, 'ip21641182041.jpg'),
(3, 10, 'ip31641182041.jpg'),
(4, 10, 'ip41641182041.jpg'),
(5, 10, 'ip51641182041.jpg'),
(6, 10, 'ip61641182042.jpg'),
(7, 11, 'ss11641182510.png'),
(8, 11, 'ss21641182510.png'),
(9, 11, 'ss31641182510.jpg'),
(10, 11, 'ss41641182510.jpg'),
(11, 11, 'ss51641182510.jpg'),
(12, 11, 'ss61641182510.jpg'),
(13, 12, 'a21641182737.jpg'),
(14, 12, 'a31641182737.jpg'),
(15, 12, 'a41641182737.jpg'),
(16, 12, 'a51641182737.jpg'),
(17, 12, 'a61641182737.jpg'),
(18, 12, 'a71641182737.jpg'),
(19, 13, 'b21641183035.png'),
(20, 13, 'b31641183035.jpg'),
(21, 13, 'b41641183035.jpg'),
(22, 13, 'b51641183035.jpg'),
(23, 13, 'b61641183035.jpg'),
(24, 13, 'b71641183035.jpg'),
(25, 14, 't21641183826.jpg'),
(26, 14, 't31641183826.jpg'),
(27, 14, 't41641183826.jpg'),
(28, 14, 't51641183826.jpg'),
(29, 14, 't61641183826.jpg'),
(30, 14, 't71641183826.jpg'),
(31, 15, 'q21641184085.jpg'),
(32, 15, 'q31641184085.jpg'),
(33, 15, 'q41641184085.jpg'),
(34, 15, 'q51641184085.jpeg'),
(35, 15, 'q61641184085.jpg'),
(36, 15, 'q71641184085.jpg'),
(37, 16, 'c21641184514.jpg'),
(38, 16, 'c31641184514.jpg'),
(39, 16, 'c41641184514.jpg'),
(40, 16, 'c51641184514.jpg'),
(41, 16, 'c61641184514.jpg'),
(42, 16, 'c71641184514.jpg'),
(43, 17, 'e21641185086.jpg'),
(44, 17, 'e31641185086.jpg'),
(45, 17, 'e41641185086.jpg'),
(46, 17, 'e51641185086.png'),
(47, 17, 'e61641185086.jpg'),
(48, 17, 'e71641185086.jpg'),
(49, 18, 'n21641185247.jpg'),
(50, 18, 'n31641185247.png'),
(51, 18, 'n41641185247.jpg'),
(52, 18, 'n51641185247.jpg'),
(53, 18, 'n61641185247.jpg'),
(54, 18, 'n71641185247.jpg'),
(55, 19, 'd21641185466.jpg'),
(56, 19, 'd31641185466.jpeg'),
(57, 19, 'd41641185466.jpg'),
(58, 19, 'd51641185466.jpg'),
(59, 19, 'd61641185466.jpg'),
(60, 19, 'd71641185466.jpg'),
(61, 20, 't21641185807.jpg'),
(62, 20, 't31641185807.jpg'),
(63, 20, 't41641185807.jpeg'),
(64, 20, 't51641185807.jpg'),
(65, 20, 't61641185807.jpg'),
(66, 20, 't71641185807.jpg'),
(67, 21, 's21641186003.jpg'),
(68, 21, 's31641186003.jpg'),
(69, 21, 's41641186003.jpg'),
(70, 21, 's51641186003.jpg'),
(71, 21, 's61641186003.jpg'),
(72, 21, 's71641186003.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_address`
--

CREATE TABLE `tbl_order_address` (
  `id_address` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `title_product` varchar(100) NOT NULL,
  `price_product` varchar(200) NOT NULL,
  `desc_product` varchar(255) NOT NULL,
  `quantity_product` varchar(100) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `id_category_product` int(11) NOT NULL,
  `noibat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `image_product`, `id_category_product`, `noibat`) VALUES
(10, 'Iphone 12 Pro Max', '20000000', 'iPhone 12 Pro Max 256GB cũ là chiếc điện thoại cao cấp nhất', '200', 'iphone121641182041.jpg', 2, 1),
(11, 'Smart tivi Samsung 2021', '15000000', 'Ở vị trí đầu tiên chiếc Smart tivi samsung 4K UA50AU8000KXXV 50 inch', '1000', 'ss71641182510.jpg', 4, 1),
(12, 'Laptop Asus X509', '15000000', 'Một trong những chiếc Laptop 15\" nhỏ nhất thế giới', '250', 'a11641182737.jpg', 1, 0),
(13, 'OPPO A12', '7000000', 'Màn hình của máy có kích thước 6.22 inch độ phân giải HD+', '300', 'b11641183035.jpg', 2, 1),
(14, 'Tivi 4K Sony Bravia X9000F', '27890000', 'Ưu thế của X9000F là được trang bị con chip X1 Extreme cao cấp nhất', '500', 't11641183826.jpg', 4, 0),
(15, 'Android Tivi TCL 40 inch L40S6500', '7990000', 'Hệ điều hành Android 8.0', '200', 'q11641184085.jpg', 4, 0),
(16, 'iPhone 13 Pro Max', '34990000', 'Bộ vi xử lý Apple A15 Bionic hàng đầu', '120', 'c11641184514.jpg', 2, 0),
(17, 'Laptop Acer Gaming Nitro 5', '26490000', 'i7-11800H/8GB RAM/512GB SSD/15.6\"FHD', '50', 'e11641185086.jpg', 1, 0),
(18, 'Laptop ASUS ROG Strix', '27490000', '15.6\" Full HD/ 144Hz/AMD Ryzen 7 4800H/8GB/512GB', '300', 'n11641185247.png', 1, 0),
(19, 'TIMEX® IRONMAN® R300', '3500000', 'GPS 41mm Silicone Strap Watch', '110', 'd11641185466.jpg', 3, 0),
(20, 'Apple Watch Series 7', '12590000', '41mm – Nhôm – Loại dùng được E Sim', '30', 't11641185807.jpg', 3, 0),
(21, 'Apple Watch Series 6 GPS', '7990000', '40mm Aluminum Case with Sport Band', '60', 's11641186003.png', 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_yeuthich`
--

CREATE TABLE `tbl_yeuthich` (
  `id_yeuthich` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `foreign_key_cus_id_cart` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_cart_deltails`
--
ALTER TABLE `tbl_cart_deltails`
  ADD PRIMARY KEY (`id_cart_detail`),
  ADD KEY `foreign_key_id_cart_detail` (`id_cart`),
  ADD KEY `foreign_key_id_product_cart` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `foreign_key_id_cus_comment` (`id_customer`),
  ADD KEY `foreign_key_id_product_comment` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_image_desc`
--
ALTER TABLE `tbl_image_desc`
  ADD PRIMARY KEY (`id_image`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `foreign_key_id_cus_order` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_order_address`
--
ALTER TABLE `tbl_order_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `foreign_key_id_order_address` (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `foreign_key_id_order_detail` (`order_id`),
  ADD KEY `foreign_key_id_product_odetail` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `foreign_key_idcate_pro` (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  ADD PRIMARY KEY (`id_yeuthich`),
  ADD KEY `foreign_key_id_cus_yeuthich` (`id_customer`),
  ADD KEY `foreign_key_id_product_yt` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_deltails`
--
ALTER TABLE `tbl_cart_deltails`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_image_desc`
--
ALTER TABLE `tbl_image_desc`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_order_address`
--
ALTER TABLE `tbl_order_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  MODIFY `id_yeuthich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `foreign_key_cus_id_cart` FOREIGN KEY (`user_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_cart_deltails`
--
ALTER TABLE `tbl_cart_deltails`
  ADD CONSTRAINT `foreign_key_id_cart_detail` FOREIGN KEY (`id_cart`) REFERENCES `tbl_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_id_product_cart` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `foreign_key_id_cus_comment` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_id_product_comment` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `foreign_key_id_cus_order` FOREIGN KEY (`user_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_address`
--
ALTER TABLE `tbl_order_address`
  ADD CONSTRAINT `foreign_key_id_order_address` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `foreign_key_id_order_detail` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_id_product_odetail` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `foreign_key_idcate_pro` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id_category_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  ADD CONSTRAINT `foreign_key_id_cus_yeuthich` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_id_product_yt` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
