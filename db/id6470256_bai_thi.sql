-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 14, 2018 lúc 06:02 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id6470256_bai_thi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `masanpham` varchar(20) CHARACTER SET utf8 NOT NULL,
  `STT` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `tensanpham` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giasanpham` int(11) NOT NULL,
  `xuatxu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `baohanh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `motasanpham` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Còn Hàng',
  `soluotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`masanpham`, `STT`, `maloai`, `tensanpham`, `giasanpham`, `xuatxu`, `baohanh`, `hinhanh`, `motasanpham`, `tinhtrang`, `soluotxem`) VALUES
('MH180709120428', 33, 6, 'Bếp Ga', 1800000, 'Việt Nam', '6 Tháng', 'upload/bep-ga-am-kangaroo-kg351-0AufFs.png', 'Bếp ga âm cho diện tích bếp nhà bạn thoáng mát hơn', 'Còn Hàng', 14),
('MH180709120652', 34, 2, 'Bộ dao 7 món', 2800000, 'Ý', '3 Tháng', 'upload/Bo-dao-Elmich-Florina-7-mon-2325067-1(2).jpg', 'Bộ sản phẩm Elmich Florina bao gồm 7 dụng cụ với các chức năng và công dụng khác nhau :\r\n+ 5 loại dao : dao chặt, dao thái, dao bổ, dao có lưỡi răng cưa, dao gọt trái cây\r\n+ 1 kéo cắt\r\n+ 1 hộp cắm dao, kéo', 'Còn Hàng', 18),
('MH180709120802', 35, 7, 'Nồi Lớn Sunhouse', 500000, 'Việt Nam', 'Không', 'upload/bo-noi-sunhouse-sh22116-org-1.jpg', 'Nồi Lớn Sunhouse cho bữa ăn của gia đình bạn dễ dàng hơn ', 'Còn Hàng', 13),
('MH180709120857', 36, 8, 'Chén Sứ x10', 200000, 'Việt Nam', 'Không', 'upload/cai-bat.jpg', 'Bộ Chén sứ 10 cái ', 'Còn Hàng', 11),
('MH180709121009', 37, 11, 'Ốn Áp Robot', 4500000, 'Việt Nam', '12 Tháng', 'upload/on-ap-robot-reno-1kva.jpg', 'Ốn Áp Robot cho thiết bị điện gia đình bạn bền lâu', 'Còn Hàng', 17),
('MH180709121051', 38, 10, 'Chóa Đèn', 15000, 'Trung Quốc', 'Không', 'upload/choa-den.png', 'Chóa Đèn 2 cái', 'Còn Hàng', 16),
('MH180709121139', 39, 9, 'Cầu dao an toàn', 150000, 'Đài Loan', 'Không', 'upload/cau-dao-an-toan-aptomat-cb-d1.png', 'Cầu dao an toàn', 'Còn Hàng', 17),
('MH180709121242', 40, 9, 'Cầu dao chống giật', 200000, 'Ý', '12 Tháng', 'upload/cau-dao-an-toan-aptomat-chong-giut-lc-63.png', 'Cầu dao chống giật nhập khẩu từ Ý ', 'Còn Hàng', 19),
('MH180709121323', 41, 4, 'Ổ điện 2 chấu loại thường ', 5000, 'Trung Quốc', 'Không', 'upload/o-cam-3-lo-s22.png', 'Ổ điện 2 chấu loại thường ', 'Còn Hàng', 21),
('MH180709121414', 42, 5, 'Ổ điện 3 chấu', 20000, 'Việt Nam', 'Không', 'upload/o-cam-dien-3-chau.jpg', 'Ổ điện 3 chấu Ổ điện 3 chấu Ổ điện 3 chấu', 'Còn Hàng', 19),
('MH180709121521', 43, 13, 'Lò Nướng Sahaki vh', 4000000, 'Đài Loan', '12 Tháng', 'upload/lo-nuong-sanaky-vh-509s-dung-tich-50l-1.jpg', 'Lò Nướng Sahaki vh nhập khẩu đài loan', 'Còn Hàng', 17),
('MH180709121559', 44, 14, 'Phới Trộn 5 Màu', 35000, 'Việt Nam', 'Không', 'upload/0005788_phoi-tron-can-silicon.jpeg', 'Phới Trộn Spatula 5 Màu', 'Còn Hàng', 10),
('MH180709121711', 45, 15, 'Giấy Lót', 10000, 'Việt Nam', 'Không', 'upload/337190.jpg', 'Giấy lót bánh ', 'Còn Hàng', 13),
('MH180709121800', 46, 16, 'Bộ đầu bắt bông kem ', 200000, 'Việt Nam', 'Không', 'upload/tong-hop-nhung-loai-dui-va-cach-su-dung-cac-dui-bat-kem-2.jpg', 'Bộ đầu bắt bông kem ', 'Còn Hàng', 15),
('MH180712054312', 47, 6, 'Bếp Gas Dương Rinnai RV-3615GL(BC) - Đen', 1200000, 'Việt Nam', '6 Tháng', 'upload/1.u5387.d20171002.t103233.218919.jpg', 'Thiết kế hiện đại\r\nBếp Gas Dương Rinnai RV-3615GL(BC) - Đen nổi bật ở bề mặt bếp làm bằng kính chịu nhiệt, bền bỉ, bóng loáng, chống vỡ, không bám dầu mỡ, dễ dàng lau chùi. Các họa tiết trang trí bếp thật nổi bật, tăng thêm sự sang trọng, hiện đại khi lắp đặt trong gian bếp gia đình.\r\n\r\nKiềng bếp vững chãi\r\nKiềng bếp àm bằng kim loại phủ men, chịu được sức nặng của nồi, chảo cỡ lớn, có thể tháo rời để lau chùi khi cần.\r\n\r\nHệ thống đánh lửa cơ học\r\nBếp gas sử dụng hệ thống đánh lửa Magneto cực bề', 'Còn Hàng', NULL),
('MH180712054423', 48, 6, 'Bếp Gas Dương Đôi Rinnai RV-367(G)N – Đen', 669000, 'Việt Nam', '1 Tháng', 'upload/rv-367(g)n_2.u579.d20160508.t142655.jpg', 'Bếp Gas Dương Đôi Rinnai RV-367(G)N – Đen\r\n\r\nBếp Gas Dương Đôi Rinnai RV-367(G)N – Đen được lắp đặt với đầu đốt bằng đồng có tính bền bỉ cao cùng công nghệ tạo lửa xoắn giúp tiết kiệm năng lượng và nhiên liệu. Bếp với 2 núm xoay điều chỉnh nhiệt độ bằng hệ thống đánh lửa Magneto thân thiện với người dùng sẽ là sự lựa chọn lý tưởng dành cho bạn. Bếp có kiểu dáng tiện dụng, phù hợp với mọi không gian bếp khác nhau.\r\n\r\nhttps://tikicdn.com/media/catalog/product/r/v/rv-367(g)n_2.u579.d20160508.t14271', 'Còn Hàng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grouppro`
--

CREATE TABLE `grouppro` (
  `maloai` int(11) NOT NULL,
  `loaisanpham` varchar(45) CHARACTER SET utf8 NOT NULL,
  `maloaicon` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `grouppro`
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
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user`, `pwd`, `name`, `email`, `address`, `level`) VALUES
(1, 'administrator', '9e7c97801cb4cce87b6c02f98291a6420e6400ad', 'Thanh Huy', 'lehuy.mstudio@gmail.com', '31 ap 7 , Dang Thuc Vinh , xa Dong Thanh , hu', 'administrator'),
(2, 'anhduong1995', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Anh Dương', 'anhduong1995@gmail.com', 'Sài Gòn , Việt Nam', 'member'),
(3, 'roxy', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Lê Huy', 'lehuy@gmail.com', 'sài gòn', 'off');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`STT`,`masanpham`),
  ADD KEY `fk_chitietsanpham_grouppro_idx` (`maloai`);

--
-- Chỉ mục cho bảng `grouppro`
--
ALTER TABLE `grouppro`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `grouppro`
--
ALTER TABLE `grouppro`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
