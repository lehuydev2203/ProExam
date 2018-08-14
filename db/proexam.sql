-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 02:41 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bai_thi`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `masanpham` varchar(20) CHARACTER SET utf8 NOT NULL,
  `STT` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `tensanpham` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giasanpham` int(11) NOT NULL,
  `xuatxu` varchar(30) CHARACTER SET utf8 NOT NULL,
  `baohanh` varchar(10) CHARACTER SET utf8 NOT NULL,
  `hinhanh` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `motasanpham` varchar(500) CHARACTER SET utf8 NOT NULL,
  `tinhtrang` varchar(10) DEFAULT 'Còn Hàng',
  `soluotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`masanpham`, `STT`, `maloai`, `tensanpham`, `giasanpham`, `xuatxu`, `baohanh`, `hinhanh`, `motasanpham`, `tinhtrang`, `soluotxem`) VALUES
('MH180709120428', 33, 6, 'Bếp Ga', 1800000, 'Việt Nam', '6 Tháng', 'upload/bep-ga-am-kangaroo-kg351-0AufFs.png', 'Bếp ga âm cho diện tích bếp nhà bạn thoáng mát hơn', 'Còn Hàng', 13),
('MH180709120652', 34, 2, 'Bộ dao 7 món', 2800000, 'Ý', '3 Tháng', 'upload/Bo-dao-Elmich-Florina-7-mon-2325067-1(2).jpg', 'Bộ sản phẩm Elmich Florina bao gồm 7 dụng cụ với các chức năng và công dụng khác nhau :\r\n+ 5 loại dao : dao chặt, dao thái, dao bổ, dao có lưỡi răng cưa, dao gọt trái cây\r\n+ 1 kéo cắt\r\n+ 1 hộp cắm dao, kéo', 'Còn Hàng', 16),
('MH180709120802', 35, 7, 'Nồi Lớn Sunhouse', 500000, 'Việt Nam', 'Không', 'upload/bo-noi-sunhouse-sh22116-org-1.jpg', 'Nồi Lớn Sunhouse cho bữa ăn của gia đình bạn dễ dàng hơn ', 'Còn Hàng', 13),
('MH180709120857', 36, 8, 'Chén Sứ x10', 200000, 'Việt Nam', 'Không', 'upload/cai-bat.jpg', 'Bộ Chén sứ 10 cái ', 'Còn Hàng', 11),
('MH180709121009', 37, 11, 'Ốn Áp Robot', 4500000, 'Việt Nam', '12 Tháng', 'upload/on-ap-robot-reno-1kva.jpg', 'Ốn Áp Robot cho thiết bị điện gia đình bạn bền lâu', 'Còn Hàng', 17),
('MH180709121051', 38, 10, 'Chóa Đèn', 15000, 'Trung Quốc', 'Không', 'upload/choa-den.png', 'Chóa Đèn 2 cái', 'Còn Hàng', 16),
('MH180709121139', 39, 9, 'Cầu dao an toàn', 150000, 'Đài Loan', 'Không', 'upload/cau-dao-an-toan-aptomat-cb-d1.png', 'Cầu dao an toàn', 'Còn Hàng', 17),
('MH180709121242', 40, 9, 'Cầu dao chống giật', 200000, 'Ý', '12 Tháng', 'upload/cau-dao-an-toan-aptomat-chong-giut-lc-63.png', 'Cầu dao chống giật nhập khẩu từ Ý ', 'Còn Hàng', 18),
('MH180709121323', 41, 4, 'Ổ điện 2 chấu loại thường ', 5000, 'Trung Quốc', 'Không', 'upload/o-cam-3-lo-s22.png', 'Ổ điện 2 chấu loại thường ', 'Còn Hàng', 20),
('MH180709121414', 42, 5, 'Ổ điện 3 chấu', 20000, 'Việt Nam', 'Không', 'upload/o-cam-dien-3-chau.jpg', 'Ổ điện 3 chấu Ổ điện 3 chấu Ổ điện 3 chấu', 'Còn Hàng', 19),
('MH180709121521', 43, 13, 'Lò Nướng Sahaki vh', 4000000, 'Đài Loan', '12 Tháng', 'upload/lo-nuong-sanaky-vh-509s-dung-tich-50l-1.jpg', 'Lò Nướng Sahaki vh nhập khẩu đài loan', 'Còn Hàng', 17),
('MH180709121559', 44, 14, 'Phới Trộn 5 Màu', 35000, 'Việt Nam', 'Không', 'upload/0005788_phoi-tron-can-silicon.jpeg', 'Phới Trộn Spatula 5 Màu', 'Còn Hàng', 10),
('MH180709121711', 45, 15, 'Giấy Lót', 10000, 'Việt Nam', 'Không', 'upload/337190.jpg', 'Giấy lót bánh ', 'Còn Hàng', 12),
('MH180709121800', 46, 16, 'Bộ đầu bắt bông kem ', 200000, 'Việt Nam', 'Không', 'upload/tong-hop-nhung-loai-dui-va-cach-su-dung-cac-dui-bat-kem-2.jpg', 'Bộ đầu bắt bông kem ', 'Còn Hàng', 15);

-- --------------------------------------------------------

--
-- Table structure for table `grouppro`
--

CREATE TABLE `grouppro` (
  `maloai` int(11) NOT NULL,
  `loaisanpham` varchar(45) CHARACTER SET utf8 NOT NULL,
  `maloaicon` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouppro`
--

INSERT INTO `grouppro` (`maloai`, `loaisanpham`, `maloaicon`) VALUES
(1, 'Dụng Cụ Bếp', 0),
(2, 'Dao', 1),
(3, 'Dụng Cụ Điện', 0),
(4, 'Ổ Điện', 3),
(5, 'Ổ Điện 2 Châu', 4),
(6, 'Bếp Ga', 1),
(7, 'Nồi', 1),
(8, 'Chén', 1),
(9, 'Cầu Dao', 3),
(10, 'Đèn', 3),
(11, 'Ổn Áp', 3),
(12, 'Dụng Cụ Làm Bánh', 0),
(13, 'Lò Nướng', 12),
(14, 'Phới Trộn Spatula', 12),
(15, 'Giấy Lót', 12),
(16, 'Đầu Bắt Kem', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(45) CHARACTER SET latin1 NOT NULL,
  `pwd` varchar(40) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `level` varchar(45) CHARACTER SET latin1 DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pwd`, `name`, `email`, `address`, `level`) VALUES
(1, 'administrator', '9e7c97801cb4cce87b6c02f98291a6420e6400ad', 'Thanh Huy', 'lehuy.mstudio@gmail.com', '31 ap 7 , Dang Thuc Vinh , xa Dong Thanh , hu', 'administrator'),
(2, 'anhduong1995', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Anh Dương', 'anhduong1995@gmail.com', 'Sài Gòn , Việt Nam', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`STT`,`masanpham`),
  ADD KEY `fk_chitietsanpham_grouppro_idx` (`maloai`);

--
-- Indexes for table `grouppro`
--
ALTER TABLE `grouppro`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `grouppro`
--
ALTER TABLE `grouppro`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
