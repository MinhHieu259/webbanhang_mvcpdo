-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2021 lúc 05:04 AM
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
(2, 2);

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
(2, 'Hieu Nguyen', '0329568259', 'mhieu@gmail.com', '12345678', 'Huế');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `order_date`, `order_status`) VALUES
(12, 2, '19/12/2021 12:02:57am', 2),
(13, 2, '19/12/2021 05:50:43pm', 0),
(14, 2, '19/12/2021 05:51:42pm', 1),
(15, 1, '31/12/2021 10:01:13am', 2);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_order_address`
--

INSERT INTO `tbl_order_address` (`id_address`, `order_id`, `customer_name`, `customer_phone`, `customer_address`) VALUES
(7, 12, 'Hieu Nguyen', '0329568259', 'Huế'),
(8, 13, 'Hieu Nguyen', '0329568259', 'Huế'),
(9, 14, 'Hieu Nguyen', '0329568259', 'Huế'),
(10, 15, 'Nguyễn Minh Hiếu', '0774452227', 'Phong Điền, Thừa thiên huế');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_quantity`) VALUES
(23, 12, 5, 1),
(24, 12, 9, 1),
(25, 13, 1, 1),
(26, 14, 4, 1),
(27, 15, 5, 1);

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
(1, 'Laptop Asus X509', '20000000', 'Laptop X509 đẹp', '200', 'asusx509jp1638610885.jpg', 1, 1),
(2, 'Smart tivi Samsung 2021', '25000000', 'Tivi samsung mới nhất 2022', '150', 'samsungg1638611124.jpg', 4, 0),
(3, 'Macbook Pro 2018', '20000000', 'Macbook 2018', '100', 'macbook-pro-20181638611217.jpg', 1, 0),
(4, 'OPPO A12', '7000000', 'OPPO A12', '310', 'OPA121638611269.jpg', 2, 1),
(5, 'Iphone 12 Pro Max', '25000000', 'Iphone 12 pro max', '200', 'iphone121638611312.jpg', 2, 1),
(6, 'OPPO X3', '20000000', 'Oppo X3 điện thoại oppo xịnnn', '200', 'OPPOX31638632126.jpg', 2, 0),
(7, 'OPPO A5 2020', '7000000', 'OPPO A5 2020', '150', 'OPA520201638632185.jfif', 2, 0),
(8, 'Apple Watch Seri 5', '15000000', 'Apple watch seri 5', '30', 'applewatchsr51638636494.jpg', 3, 0),
(9, 'Apple Watch Seri 7', '20500000', 'Apple watch seri 7', '310', 'applewwatchsr71638636535.jpg', 3, 0);

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
-- Đang đổ dữ liệu cho bảng `tbl_yeuthich`
--

INSERT INTO `tbl_yeuthich` (`id_yeuthich`, `id_customer`, `id_product`) VALUES
(3, 1, 5);

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
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_deltails`
--
ALTER TABLE `tbl_cart_deltails`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_address`
--
ALTER TABLE `tbl_order_address`
  ADD PRIMARY KEY (`id_address`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  ADD PRIMARY KEY (`id_yeuthich`);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_deltails`
--
ALTER TABLE `tbl_cart_deltails`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_order_address`
--
ALTER TABLE `tbl_order_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  MODIFY `id_yeuthich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
