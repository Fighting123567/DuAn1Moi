-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2024 lúc 11:45 PM
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
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(0, 'Áo Polo'),
(1, 'Áo thun'),
(2, 'Áo hoodie'),
(3, 'BTS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Tongdh` double NOT NULL,
  `Hoten` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Sodienthoai` double NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Ngaydathang` datetime NOT NULL DEFAULT current_timestamp(),
  `trang_thai` set('gio-hang','chuan-bi','dang-giao','hoan-thanh','that-bai') NOT NULL DEFAULT 'gio-hang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `id_user`, `Tongdh`, `Hoten`, `Email`, `Sodienthoai`, `Diachi`, `Ngaydathang`, `trang_thai`) VALUES
(1, 0, 389000, 'Lộc', 'loc@gmail.com', 2567835, 'công viên p', '2024-06-12 14:03:43', 'chuan-bi'),
(2, 0, 1000000, 'Lê', 'le@gmail.com', 2567835, 'công viên p', '2024-06-12 14:05:07', 'chuan-bi'),
(3, 0, 805500, 'Bảo', 'Bao@gmail.com', 2567835, 'công viên p', '2024-06-12 14:06:00', 'chuan-bi'),
(4, 0, 1805500, 'Khoa', 'Khoa@mail.com', 2567835, 'công viên p', '2024-06-12 14:06:49', 'chuan-bi'),
(6, 0, 825500, 'loc', 'hgamming3@gmail.com', 2567835, 'công viên phần mền quang trung', '2024-06-12 15:39:11', 'chuan-bi'),
(7, 0, 805500, 'hung', 'loc@gmail.com', 123456, 'dshg', '2024-06-12 15:41:03', 'chuan-bi'),
(8, 84, 3222000, 'loc', 'loc@gmail.com', 901233, 'tphcm', '2024-06-16 14:57:20', 'chuan-bi'),
(9, 91, 3345000, 'loc', 'loc@gmail.com', 12345, '123tesst', '2024-06-16 15:22:37', 'gio-hang'),
(11, 84, 1005500, 'admin1', 'admin01@gmail.com', 12345678, 'test', '2024-06-16 23:40:35', 'chuan-bi'),
(12, 88, 0, 'admin3', 'admin3@gmail.com', 1234, '123kk', '2024-06-16 23:48:09', 'gio-hang'),
(13, 85, 1631000, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-16 23:51:34', 'chuan-bi'),
(15, 85, 845500, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 00:52:35', 'chuan-bi'),
(16, 85, 6000000, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 00:54:02', 'chuan-bi'),
(17, 85, 1805500, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 00:55:06', 'chuan-bi'),
(18, 85, 1020000, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 01:06:50', 'chuan-bi'),
(19, 85, 40000, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 01:07:41', 'chuan-bi'),
(20, 85, 825500, 'admin2', 'admin2@gmail.com', 901233, 'tphcm', '2024-06-17 01:08:55', 'chuan-bi'),
(21, 84, 900000, 'admin1', 'admin01@gmail.com', 12345678, 'test', '2024-06-17 01:13:44', 'chuan-bi'),
(23, 84, 33344, 'admin1', 'admin01@gmail.com', 12345678, 'test', '2024-06-17 01:20:13', 'chuan-bi'),
(24, 84, 1200001, 'admin1', 'admin01@gmail.com', 12345678, 'test', '2024-06-17 01:24:37', 'chuan-bi'),
(25, 84, 2128833, 'admin1', 'admin01@gmail.com', 12345678, 'test', '2024-06-17 01:25:46', 'chuan-bi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id_ctdh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_dh` int(11) DEFAULT NULL,
  `Soluong` int(11) NOT NULL DEFAULT 1,
  `Tong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`id_ctdh`, `id_sp`, `id_dh`, `Soluong`, `Tong`) VALUES
(1, 8, 1, 1, 20000),
(2, 7, 2, 1, 1000000),
(3, 3, 3, 1, 805500),
(4, 3, 4, 1, 805500),
(5, 2, 4, 1, 805500),
(6, 5, 7, 1, 20000),
(7, 6, 6, 1, 805500),
(8, 6, 9, 4, 3222000),
(9, 2, 9, 1, 123000),
(12, 6, 13, 2, 1611000),
(13, 4, 15, 1, 20000),
(14, 7, 16, 6, 6000000),
(15, 7, 17, 1, 1000000),
(16, 4, 18, 1, 20000),
(17, 4, 19, 1, 20000),
(18, 6, 20, 1, 805500),
(19, 10, 11, 1, 200000),
(20, 10, 21, 1, 200000),
(21, 5, 23, 1, 20000),
(22, 75, 23, 1, 13344),
(23, 7, 24, 1, 1000000),
(24, 14, 24, 1, 200001),
(25, 10, 25, 1, 200000),
(26, 7, 25, 1, 1000000),
(27, 12, 25, 1, 123333),
(28, 11, 25, 1, 805500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_sp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `id_category` bigint(20) NOT NULL,
  `ngayNhap` timestamp NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `Mota` varchar(255) DEFAULT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT 0,
  `AnHien` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_sp`, `name`, `price`, `id_category`, `ngayNhap`, `image`, `Mota`, `NoiBat`, `AnHien`) VALUES
(1, 'Áo Polo', 0, 0, '2023-12-04 22:10:37', 'ao_hoodie_11.webp', '01111', 1, 1),
(2, 'Áo Polo 2', 123000, 0, '2023-12-04 22:11:04', 'ao_polo_2.webp', '', 0, 1),
(3, 'Áo Polo 3', 805500, 0, '2023-12-04 22:11:37', 'ao_polo_3.webp', '', 0, 1),
(4, 'Áo Polo 4', 20000, 0, '2023-12-04 22:12:16', 'ao_polo_4.webp', '', 0, 0),
(5, 'Áo Thun 5', 20000, 1, '2023-12-04 22:12:59', 'ao_thun_5.webp', '', 1, 0),
(6, 'Áo Thun 6', 805500, 1, '2023-12-04 22:16:37', 'ao_thun_6.webp', '', 1, 0),
(7, 'Áo Thun 7', 1000000, 1, '2023-12-04 22:18:40', 'ao_thun_7.webp', '', 1, 0),
(8, 'Áo Thun 8', 20000, 1, '2023-12-04 22:19:14', 'ao_thun_8.webp', '', 1, 0),
(9, 'Áo Hoodie 9', 700000, 2, '2023-12-04 22:19:48', 'ao_hoodie_9.webp', '', 0, 0),
(10, 'Áo Hoodie 10', 200000, 2, '2023-12-04 22:20:26', 'ao_hoodie_10.webp', '', 0, 0),
(11, 'Áo Hoodie 11', 805500, 2, '2023-12-04 22:20:42', 'ao_hoodie_11.webp', '', 0, 0),
(12, 'Áo Hoodie 12', 123333, 2, '2023-12-04 22:21:00', 'ao_hoodie_12.webp', '', 0, 0),
(13, 'BTS', 200000, 3, '2023-12-04 22:22:13', 'BTS_13.webp', '', 0, 0),
(14, 'BTS', 200001, 3, '2023-12-04 22:22:41', 'BTS_14.webp', '', 0, 0),
(15, 'BTS', 23123123, 3, '2023-12-04 22:24:22', 'BTS_15.webp', '', 0, 0),
(16, 'BTS', 20000, 3, '2023-12-04 22:25:31', 'BTS_16.webp', '', 0, 0),
(75, 'www', 13344, 0, '2024-06-11 17:51:47', 'ao_hoodie_10.webp', 'rht', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `Hoten` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anh` varchar(255) DEFAULT 'public/assets/img/avatars/5166769102803e3d2df578980e76017c.png',
  `email` varchar(255) DEFAULT NULL,
  `Sodienthoai` varchar(10) NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Vaitro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `Hoten`, `username`, `password`, `anh`, `email`, `Sodienthoai`, `Diachi`, `Vaitro`) VALUES
(84, 'admin1', 'admin01', '202cb962ac59075b964b07152d234b70', 'store/avatar/5166769102803e3d2df578980e76017c.png', 'admin01@gmail.com', '12345678', 'test', 1),
(85, 'admin2', 'admin2', '202cb962ac59075b964b07152d234b70', 'store/avatar/3fa3000faff90e7f8262e44adb1a462e.png', 'admin2@gmail.com', '', '', 0),
(88, 'admin3', 'admin3', '202cb962ac59075b964b07152d234b70', 'store/avatar/c78173996f7de90a13df2c425710859a.jpeg', 'admin3@gmail.com', '1234', '123kk', 0),
(89, 'nguyen hoang phuc222', 'admin011633', '$2y$10$b4Jv56D4/fpTxzEmY1bKIOW4n5WpYJV3FX94x.cBMvvBJTTyGS8xO', 'store/avatar/e10c404760146cf2a8e85191b0258c41.jpeg', NULL, '', '', 0),
(90, '', 'admin', '202cb962ac59075b964b07152d234b70', 'public/assets/img/avatars/5166769102803e3d2df578980e76017c.png', 'hgamming3@gmail.com', '', '', 0),
(91, '', 'loc', '202cb962ac59075b964b07152d234b70', 'public/assets/img/avatars/5166769102803e3d2df578980e76017c.png', 'loc@gmail.com', '', '', 0),
(92, '', 'LocGenshin', 'f2f6dbc4f0a30dea0d5f41cbe9f3fc82', 'public/assets/img/avatars/5166769102803e3d2df578980e76017c.png', 'hgamming3@gmail.com', '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`id_ctdh`),
  ADD KEY `id_dh` (`id_dh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `category_id` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `donhangchitiet_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`),
  ADD CONSTRAINT `donhangchitiet_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `products` (`id_sp`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
