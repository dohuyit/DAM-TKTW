-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2024 at 04:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dam-tktw`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cate` int NOT NULL,
  `name_cate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_cate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cate`, `name_cate`, `img_cate`) VALUES
(1, 'Trang sức kim cương', 'Common/assets/img/cate-kimcuong.png'),
(2, 'Trang sức vàng kim', 'Common/assets/img/cate-vangA.jpg'),
(3, 'Trang sức ngọc trai', 'Common/assets/img/cate-ngoctrai.jpg'),
(4, 'Trang sức đá màu', 'Common/assets/img/cate-damau.jpg'),
(5, 'Đồng hồ thời trang', 'Common/assets/img/dongho-t7-24-1200_X_450__CTA_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comments` int NOT NULL,
  `id` int NOT NULL COMMENT 'sản phẩm id',
  `id_user` int NOT NULL COMMENT 'tài khoản id',
  `content_comments` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nội dung comment',
  `day_comments` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ngày comment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comments`, `id`, `id_user`, `content_comments`, `day_comments`) VALUES
(23, 46, 5, 'Thật đẹp', '2024-07-30 16:03:29'),
(24, 44, 5, 'Thật hay', '2024-07-30 16:03:50'),
(25, 55, 5, 'Thật sang trọng', '2024-07-30 16:04:19'),
(26, 54, 5, 'Quá đẹp', '2024-07-30 16:04:40'),
(27, 41, 4, 'Quá sang trọng', '2024-07-31 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `original_price` float NOT NULL COMMENT 'Giá gốc',
  `discount_number` int DEFAULT NULL COMMENT 'Số phần trăm khuyến mãi',
  `discount_price` float DEFAULT NULL COMMENT 'Giá khuyến mãi',
  `flash_sale` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 là flash-sale, 0 là mặc đinh',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh',
  `id_cate` int NOT NULL COMMENT 'id category',
  `view` int NOT NULL DEFAULT '0' COMMENT 'số lượt xem',
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'mô tả sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `original_price`, `discount_number`, `discount_price`, `flash_sale`, `image`, `id_cate`, `view`, `desc`) VALUES
(9, 'Dây chuyền Vàng trắng Ý 18K PNJ 0000W001071', 12.224, 10, 11.0016, 1, 'Common/assets/img/gold1.png', 1, 0, 'Trọng lượng tham khảo:\r\n17.55486phân\r\n \r\nHàm lượng chất liệu:\r\n7500\r\n \r\nLoại đá chính:\r\nKhông gắn đá\r\n \r\nLoại đá phụ:\r\nKhông gắn đá\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(10, 'Lắc tay nam Vàng 14K PNJ 0000Y003277', 25.415, 9, 23.1276, 1, 'Common/assets/img/sp-gl0000y003277-lac-tay-nam-vang-14k-pnj-1.png', 2, 0, 'Trọng lượng tham khảo:\r\n45.03032phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nKhông gắn đá\r\n \r\nLoại đá phụ:\r\nKhông gắn đá\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNam'),
(11, 'Bông tai vàng 18K đính đá Ruby PNJ RBXMY000301', 11.161, 5, 10.603, 0, 'Common/assets/img/sp-gbrbxmy000301-bong-tai-vang-18k-dinh-da-ruby-pnj-1.png', 4, 10, 'Trọng lượng tham khảo:\r\n8.77673phân\r\n \r\nHàm lượng chất liệu:\r\n7500\r\n \r\nLoại đá chính:\r\nRuby\r\n \r\nHình dạng đá:\r\nTròn\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nSố viên đá chính:\r\n2viên\r\n \r\nSố viên đá phụ:\r\n70viên\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nCut (Giác cắt/ Hình dạng kim cương):\r\nFacet\r\n \r\nKích thước đá (tham khảo):\r\n6.0 ly\r\n \r\nGiới tính:\r\nNữ'),
(12, 'Nhẫn Vàng trắng 14K đính đá Sapphire PNJ SPXMW000050', 12.768, 12, 11.2358, 1, 'Common/assets/img/sp-gnspxmw000050-nhan-vang-trang-14k-dinh-da-sapphire-pnj-1.png', 4, 0, 'Trọng lượng tham khảo:\r\n6.60936phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nSapphire\r\n \r\nMàu đá chính:\r\nXanh đen\r\n \r\nHình dạng đá:\r\nOval\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nMàu đá phụ:\r\nTrắng\r\n \r\nSố viên đá chính:\r\n1viên\r\n \r\nSố viên đá phụ:\r\n20viên\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nCut (Giác cắt/ Hình dạng kim cương):\r\nFacet\r\n \r\nKích thước đá (tham khảo):\r\n6 x 8 ly\r\n \r\nGiới tính:\r\nNữ'),
(14, 'Nhẫn nam Vàng trắng 10K đính đá ECZ PNJ XMXMW000200', 9.468, 10, 8.5212, 1, 'Common/assets/img/gnxmxmw000200-nhan-nam-vang-trang-10k-dinh-da-ecz-swarovski-pnj-01.png', 1, 6, 'Trọng lượng tham khảo:\r\n17.57206phân\r\n \r\nHàm lượng chất liệu:\r\n4160\r\n \r\nLoại đá chính:\r\nXoàn mỹ\r\n \r\nHình dạng đá:\r\nTròn\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nSố viên đá chính:\r\n1viên\r\n \r\nSố viên đá phụ:\r\n24viên\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nCut (Giác cắt/ Hình dạng kim cương):\r\nFacet\r\n \r\nGiới tính:\r\nNam'),
(15, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DDDDW000923', 21.072, 8, 19.3862, 1, 'Common/assets/img/sp-gmddddw000923-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-1.png', 1, 1, 'Trọng lượng tham khảo:\r\n3.93974phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nKim cương\r\n \r\nKích thước đá chính (tham khảo):\r\n3.5ly\r\n \r\nHình dạng đá:\r\nTròn\r\n \r\nLoại đá phụ:\r\nKim cương\r\n \r\nSố viên đá chính:\r\n1viên\r\n \r\nSố viên đá phụ:\r\n16viên\r\n \r\nPhong cách:\r\nFashion\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nCut (Giác cắt/ Hình dạng kim cương):\r\nFacet\r\n \r\nGiới tính:\r\nNữ'),
(16, 'Nhẫn Vàng trắng 14K đính đá ECZ Disney|PNJ The Little Mermaid D100 XMXMW004618', 4.869, 15, 4.13865, 1, 'Common/assets/img/sp-gnxmxmw004618-nhan-vang-14k-dinh-da-ecz-disney-pnj-the-little-mermaid-d100-1.png', 2, 0, 'Trọng lượng tham khảo:\r\n5.14681phân\r\n \r\nLoại đá chính:\r\nXoàn mỹ\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nBộ sưu tập:\r\nShare the wonder\r\n \r\nThương hiệu:\r\nDisney|PNJ'),
(17, 'Nhẫn cưới Kim cương Vàng Trắng 14K PNJ DDDDW010150', 29.925, 10, 26.9325, 0, 'Common/assets/img/sp-gnddddw010150-nhan-kim-cuong-vang-trang-14k-pnj-1.png', 1, 0, 'Trọng lượng tham khảo:\r\n5.82076phân\r\n \r\nLoại đá chính:\r\nKim cương\r\n \r\nMàu đá chính:\r\nTrắng\r\n \r\nLoại đá phụ:\r\nKim cương\r\n \r\nMàu đá phụ:\r\nTrắng\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(18, 'Mặt dây chuyền Kim cương Vàng Trắng 14K PNJ DDDDW002550', 13.654, 12, 12.0155, 0, 'Common/assets/img/sp-gmddddw002550-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-1.png', 1, 21, 'Trọng lượng tham khảo:\r\n1.78925phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nKim cương\r\n \r\nLoại đá phụ:\r\nKim cương\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(19, 'Vòng tay Kim cương Vàng trắng 14k PNJ DD00W000351', 161.555, 0, 161.555, 0, 'Common/assets/img/sp-gvdd00w000351-vong-tay-kim-cuong-vang-trang-14k-pnj-1.png', 1, 1, 'Trọng lượng tham khảo:\r\n19.916phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nDiamond\r\n \r\nLoại đá phụ:\r\nKhông gắn đá\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(20, 'Bông tai Kim cương Vàng trắng 14K PNJ DDDDW003826', 27.267, 5, 25.904, 0, 'Common/assets/img/sp-gbddddw003826-bong-tai-kim-cuong-vang-trang-14k-pnj-1.png', 1, 0, 'Trọng lượng tham khảo:\r\n5.63917phân\r\n \r\nLoại đá chính:\r\nKim cương\r\n \r\nMàu đá chính:\r\nTrắng\r\n \r\nLoại đá phụ:\r\nKim cương\r\n \r\nMàu đá phụ:\r\nTrắng\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(21, 'Lắc tay Vàng 18K đính đá ECZ PNJ XMXMY001012', 16.133, 10, 14.5197, 0, 'Common/assets/img/sp-glxmxmy001012-lac-tay-vang-18k-dinh-da-ecz-pnj-1.png', 2, 0, 'Trọng lượng tham khảo:\r\n16.93996phân\r\n \r\nLoại đá chính:\r\nXoàn mỹ\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nSố viên đá chính:\r\n4viên\r\n \r\nSố viên đá phụ:\r\n33viên\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(22, 'Nhẫn Vàng Trắng 14K đính Ngọc trai Freshwater PNJ PFXMW000273', 5.242, 5, 4.9799, 0, 'Common/assets/img/sp-gnpfxmw000273-nhan-vang-trang-14k-dinh-ngoc-trai-freshwater-pnj-1.png', 3, 0, 'Trọng lượng tham khảo:\r\n4.84725phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nFreshwater Pearl\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(23, 'Đồng Hồ Just Cavalli Nữ JC1L238M0095 Dây Kim Loại 32mm', 1.955, 0, 1.955, 0, 'Common/assets/img/JC1L238M0095_Desktop_1.jpg', 5, 0, 'Phong cách:\r\nFashion: Thời trang\r\n \r\nThương hiệu:\r\nJust Cavalli\r\n \r\nXuất Xứ Thương Hiệu:\r\nÝ\r\n \r\nXuất xứ bộ máy:\r\nNhật Bản\r\n \r\nLắp ráp tại:\r\nTrung Quốc\r\n \r\nLoại máy đồng hồ:\r\nQuartz (Pin)\r\n \r\nLoại mặt kính:\r\nkính khoáng\r\n \r\nChất liệu dây:\r\nDây thép cao cấp không gỉ 316L\r\n \r\nChất liệu vỏ:\r\nThép không gỉ\r\n \r\nHình dạng mặt:\r\nTròn\r\n \r\nMàu sắc mặt:\r\nBạc\r\n \r\nKích thước dây:\r\n16mm\r\n \r\nKích thước mặt:\r\n32.00 mmmm\r\n \r\nĐộ chịu nước:\r\n5atm\r\n \r\nĐộ dày vỏ máy:\r\n7.2mm\r\n \r\nSố Kim:\r\n3\r\n \r\nĐá Gắn Kèm Đồng Hồ:\r\nĐá tổng hợp, pha lê\r\n \r\nChứng nhận Chronometer:\r\nKhông\r\n \r\nChức năng chính:\r\nDual time\r\n \r\nGiới tính:\r\nNữ'),
(24, 'Đồng Hồ Just Cavalli Nữ JC1L239M0045 Dây Kim Loại 30mm', 1.385, 10, 1.2465, 0, 'Common/assets/img/JC1L239M0045_Desktop_1.jpg', 5, 0, 'Phong cách:\r\nFashion: Thời trang\r\n \r\nThương hiệu:\r\nJust Cavalli\r\n \r\nXuất Xứ Thương Hiệu:\r\nÝ\r\n \r\nXuất xứ bộ máy:\r\nNhật Bản\r\n \r\nLắp ráp tại:\r\nTrung Quốc\r\n \r\nLoại máy đồng hồ:\r\nQuartz (Pin)\r\n \r\nLoại mặt kính:\r\nkính khoáng\r\n \r\nChất liệu dây:\r\nDây thép cao cấp không gỉ 316L\r\n \r\nChất liệu vỏ:\r\nThép không gỉ\r\n \r\nHình dạng mặt:\r\nTròn\r\n \r\nMàu sắc mặt:\r\nBạc\r\n \r\nKích thước dây:\r\n16mm\r\n \r\nKích thước mặt:\r\n30.00 mmmm\r\n \r\nĐộ chịu nước:\r\n5atm\r\n \r\nĐộ dày vỏ máy:\r\n7.4mm\r\n \r\nSố Kim:\r\n3\r\n \r\nĐá Gắn Kèm Đồng Hồ:\r\nĐá tổng hợp, pha lê\r\n \r\nChứng nhận Chronometer:\r\nKhông\r\n \r\nChức năng chính:\r\nDual time\r\n \r\nGiới tính:\r\nNữ'),
(25, 'Hạt charm Vàng 18K đính đá CZ PNJ XMXMY000161', 6.523, 0, 6.523, 0, 'Common/assets/img/sp-gixmxmy000161-hat-charm-vang-18k-dinh-da-cz-pnj-1.png', 2, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 7.00892\r\nĐộ dày vỏ máy :\r\nLoại charm : Charm xỏ\r\nSố viên đá phụ : 22\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 26\r\nHàm lượng chất liệu : 7500'),
(26, 'Nhẫn Vàng 18K đính đá CZ PNJ XMXMY001727', 6.314, 5, 5.9983, 0, 'Common/assets/img/gnxmxmy001727-nhan-vang-18k-dinh-da-cz-pnj-1.png', 2, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : CZ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : CZ\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm : 02\r\nTrọng lượng tham khảo : 8.27076\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá phụ : 24\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(27, 'Mặt dây chuyền Vàng 18K đính đá CZ PNJ XMXMY000392', 4.148, 0, 4.148, 0, 'Common/assets/img/gmxmxmy000392-mat-day-chuyen-vang-18k-dinh-da-cz-pnj-01.png', 2, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : CZ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : CZ\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm : 00\r\nTrọng lượng tham khảo : 4.38745\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 7\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(28, 'Nhẫn Vàng 14K đính đá CZ PNJ XMXMY004691', 7.196, 10, 6.4764, 0, 'Common/assets/img/gnxmxmy004691-nhan-vang-14k-dinh-da-cz-pnj.png', 2, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 8.64558\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá phụ : 60\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(29, 'Nhẫn Vàng 18K đính đá CZ PNJ XMXMY007521', 12.858, 14, 11.0579, 1, 'Common/assets/img/sp-gnxmxmy007521-nhan-vang-18k-dinh-da-cz-pnj-1.png', 2, 8, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 14.94656\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 61\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(30, 'Mặt dây chuyền Vàng trắng 14K đính đá Topaz PNJ TPXMW000417', 6.356, 0, 6.356, 0, 'Common/assets/img/sp-gmtpxmw000417-mat-day-chuyen-vang-trang-14k-dinh-da-topaz-pnj-1.png', 4, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Topaz\r\nLoại đá phụ : Xoàn mỹ\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 4.4601\r\nĐộ dày vỏ máy :\r\nKích thước mặt :\r\nKích thước dây :\r\nHàm lượng chất liệu : 5850'),
(31, 'Nhẫn Vàng 18K đính Ngọc trai Southsea PNJ PSDDC000032', 24.669, 0, 24.669, 0, 'Common/assets/img/gnpsddc000032-nhan-kim-cuong-vang-18k-dinh-ngoc-trai-southsea-pnj-01.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Southsea Pearl\r\nLoại đá phụ : Kim cương\r\nSố thứ tự của Đá gắn kèm :\r\nPhong cách : Cảm xúc\r\nTrọng lượng tham khảo : 14.4882\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 47\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(32, 'Vòng tay Vàng 18K đính ngọc trai Southsea PNJ PSDDC000013', 55.184, 10, 49.6656, 0, 'Common/assets/img/gvpsddc000013-vong-tay-vang-18k-dinh-ngoc-trai-southsea-pnj-01.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Southsea Pearl\r\nLoại đá phụ : Kim cương\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 42.9477\r\nMàu đá chính : Vàng\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nLoại ngọc trai : South Sea\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 91\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(33, 'Nhẫn Kim cương Vàng 14K Disney|PNJ Cinderella DDDDH000344', 28.777, 2, 28.2015, 0, 'Common/assets/img/gnddddh000344-nhan-kim-cuong-vang-14k-disneypnj-cinderella-01.png', 1, 4, 'Thương hiệu : Disney|PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Kim cương\r\nMàu đá phụ : Trắng\r\nColor (Màu sắc/ Nước kim cương) : E\r\nKích thước đá chính (tham khảo) : 3.5\r\nClarity (Độ tinh khiết) : SI1\r\nTrọng lượng tham khảo : 6.35824\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 26\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(34, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DD00W000124', 7.141, 9, 6.49831, 0, 'Common/assets/img/gmdd00w000124-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-01.png', 1, 6, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Không gắn đá\r\nKích thước đá chính (tham khảo) : 3.2\r\nSố thứ tự của Đá gắn kèm : A0\r\nTrọng lượng tham khảo : 1.57961\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(35, 'Nhẫn Vàng 18K đính đá ECZ PNJ XMXMY010888', 8.239, 5, 7.82705, 0, 'Common/assets/img/sp-gnxmxmy010888-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 4, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nTrọng lượng tham khảo : 8.38134\r\nMàu đá chính : Trắng\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(36, 'Nhẫn Vàng 18K đính đá ECZ PNJ XMXMY010580', 9.907, 0, 9.907, 0, 'Common/assets/img/sp-gnxmxmy010580-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 1, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 9.92716\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(37, 'Nhẫn Vàng 18K Trơn Bóng PNJ 0000Y002883', 5.824, 6, 5.47456, 1, 'Common/assets/img/sp-gn0000y002883-nhan-vang-18k-pnj-1.png', 2, 5, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Không gắn đá\r\nLoại đá phụ : Không gắn đá\r\nTrọng lượng tham khảo : 7.16613\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(38, 'Mặt dây chuyền Vàng trắng 14K đính Ngọc trai Akoya PNJ PAXMW060003', 10.566, 12, 9.29808, 0, 'Common/assets/img/sp-gmpaxmw060003-mat-day-chuyen-vang-trang-14k-dinh-ngoc-trai-akoya-pnj-1.png', 3, 1, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 3.10292\r\nLoại ngọc trai : Akoya\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(39, 'Bông tai Vàng Trắng 14K đính Ngọc trai Freshwater PNJ PFXMW000415', 6.396, 14, 5.50056, 0, 'Common/assets/img/sp-GBPFXMW000415-bong-tai-vang-trang-14k-dinh-ngoc-trai-freshwater-pnj-001.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Freshwater Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 6.2015\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(40, 'Mặt dây chuyền Vàng trắng 14K đính ngọc trai Akoya PNJ PAXMW000113', 9.522, 8, 8.76024, 0, 'Common/assets/img/sp-gmpaxmw000113-mat-day-chuyen-vang-trang-14k-dinh-ngoc-trai-akoya-pnj.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 10.158\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(41, 'Dây cổ Vàng Trắng 14K đính Ngọc trai Tahiti PNJ PTMXW060000', 99.549, 12, 87.603, 1, 'Common/assets/img/sp-gcptmxw060000-day-co-vang-trang-14k-dinh-ngoc-trai-tahiti-pnj-1.png', 3, 3, 'Thương hiệu : PNJ\r\nLoại đá chính : Tahiti Pearl\r\nLoại đá phụ : Mix đá\r\nTrọng lượng tham khảo : 9.769\r\nLoại ngọc trai : Tahiti\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(42, 'Bộ trang sức Vàng 14K đính ngọc trai Akoya PNJ 00054-000043', 28.334, 16, 23.8006, 0, 'Common/assets/img/sp-bo-trang-suc-vang-14k-dinh-ngoc-trai-akoya-pnj-00054-000043-1.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nTrọng lượng tham khảo : phân\r\nLoại ngọc trai : Akoya'),
(43, 'Nhẫn Vàng trắng 14K đính Ngọc trai Akoya PNJ PAXMW000147', 11.786, 9, 10.7253, 0, 'Common/assets/img/sp-gnpaxmw000147-nhan-vang-trang-14k-dinh-ngoc-trai-akoya-pnj-1.png', 3, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 7.50986\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nLoại ngọc trai : Akoya\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 29\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(44, 'Nhẫn Vàng trắng 14K đính đá Topaz PNJ TPXMW000657', 10.335, 7, 9.61155, 0, 'Common/assets/img/sp-gntpxmw000657-nhan-vang-trang-14k-dinh-da-topaz-pnj-01.png', 4, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Topaz\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 10.0692\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(45, 'Nhẫn Vàng 18K đính đá Citrine PNJ CTXMY000641', 8.455, 7, 7.86315, 0, 'Common/assets/img/sp-gnctxmy000641-nhan-vang-18k-dinh-da-citrine-pnj-1.png', 4, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Citrine\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 6.89225\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(46, 'Bông tai Vàng 18K đính đá Citrine PNJ CTXMY000199', 8.615, 6, 8.0981, 0, 'Common/assets/img/sp-gbctxmy000199-bong-tai-vang-18k-dinh-da-citrine-pnj.png', 4, 5, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Citrine\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 7.00275\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 40\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 2\r\nHàm lượng chất liệu : 7500'),
(47, 'Bông tai Vàng trắng 14K Đính đá Sapphire PNJ SPXMW000222', 8.195, 18, 6.7199, 0, 'Common/assets/img/sp-gbspxmw000222-bong-tai-vang-14k-dinh-da-sapphire-disney-pnj-peter-pan-1.png', 4, 1, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Sapphire\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 5.531\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(48, 'Nhẫn Vàng 14K đính đá Tourmalineta PNJ TMXMX000001', 14.736, 4, 14.1466, 0, 'Common/assets/img/sp-gntmxmx000001-nhan-vang-14k-dinh-da-tourmaline-pnj-1.png', 4, 0, 'Thương hiệu : PNJ\r\nLoại đá chính : Tourmaline\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 11.50113\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(49, 'Nhẫn nam Vàng 18K đính đá Citrine PNJ CT00Y000078', 31.052, 12, 27.3258, 0, 'Common/assets/img/sp-gnct00y000078-nhan-nam-vang-18k-dinh-da-citrine-pnj-1.png', 4, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nam\r\nLoại đá chính : Citrine\r\nLoại đá phụ : Không gắn đá\r\nTrọng lượng tham khảo : 28.364\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(50, 'Nhẫn Vàng 18K đính đá Ruby PNJ RBXMY001255', 13.144, 12, 11.5667, 0, 'Common/assets/img/sp-gnrbxmy001255-nhan-vang-18k-dinh-da-ruby-pnj-1.png', 4, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Ruby\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 8.71679\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(51, 'Đồng hồ Seiko 5 Sports Nam SRPG39K Dây Kim Loại 39 mm', 8.764, 5, 8.3258, 0, 'Common/assets/img/sp-wse00000188-dong-ho-seiko-5-sports-nam-srpg39k-day-kim-loai-39-mm-1.png', 5, 0, 'Thương hiệu : Seiko\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Nhật Bản'),
(52, 'Đồng hồ Seiko 5 Sports Nam SRPD53K Dây Kim Loại 42 mm', 9.346, 10, 8.4114, 0, 'Common/assets/img/sp-wse00000175-dong-ho-seiko-5-sports-nam-srpd53k-day-kim-loai-42-mm-1.png', 5, 0, 'Thương hiệu : Seiko\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Nhật Bản'),
(53, 'Đồng hồ Citizen Nữ EM1073-8598461YBNZ Dây Kim Loại 30 mm', 13.485, 3, 13.0805, 0, 'Common/assets/img/sp-wci00000844-dong-ho-citizen-nu-em1073-85y-day-kim1.png', 5, 0, 'Thương hiệu : Citizen\r\nGiới tính : Nữ\r\nMàu sắc mặt : Vàng\r\nPhong cách : Classic: cổ điển, thông dụng\r\nMàu sắc dây : Vàng\r\nĐộ dày vỏ máy : 8\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nLoại máy đồng hồ : Eco-drive (năng lượng AS mặt t\r\nChất liệu vỏ : Thép không gỉ\r\nChất liệu dây : Dây thép cao cấp không gỉ 316L\r\nĐộ chịu nước : 5\r\nKích thước mặt : 30\r\nKích thước dây : 15\r\nLoại mặt kính : Kính Sapphire\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Nhật Bản/Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Kim cương\r\nChứng nhận Chronometer : Không'),
(54, 'Đồng Hồ Citizen Nữ EW2690-81Y Dây Kim Loại 28 mm', 6.985, 13, 6.07695, 0, 'Common/assets/img/sp-wci00000827-dong-ho-citizen-nu-ew2690-81y-day-kim-loai-28-mm-1.png', 5, 2, 'Thương hiệu : Citizen\r\nGiới tính : Nữ\r\nMàu sắc mặt : Đa màu\r\nPhong cách : Fashion: Thời trang\r\nTrọng lượng tham khảo : phân\r\nMàu sắc dây : Bạc\r\nĐộ dày vỏ máy : 9\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nLoại máy đồng hồ : Eco-drive (năng lượng AS mặt t\r\nChất liệu vỏ : Thép không gỉ\r\nChất liệu dây : Dây thép cao cấp không gỉ 316L\r\nĐộ chịu nước : 5\r\nKích thước mặt : 28.00 mm\r\nKích thước dây : mm\r\nLoại mặt kính : Kính Sapphire\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Đá tổng hợp, pha lê\r\nChứng nhận Chronometer : Không'),
(55, 'Đồng hồ Orient Nam RE-AV0120L00B Dây Kim Loại 41 mm', 28.444, 12, 25.0307, 0, 'Common/assets/img/sp-wor00000320-dong-ho-orient-nam-re-av0120l00b-day-kim-loai-41-mm-1.png', 5, 2, 'Thương hiệu : Orient\r\nGiới tính : Nam\r\nMàu sắc mặt : Xanh dương\r\nPhong cách : Classic: cổ điển, thông dụng\r\nMàu sắc dây : Bạc\r\nĐộ dày vỏ máy : 12\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nLoại máy đồng hồ : Automatic (cơ tự động)\r\nChất liệu vỏ : Thép không gỉ\r\nChất liệu dây : Dây thép cao cấp không gỉ 316L\r\nĐộ chịu nước : 5\r\nKích thước mặt : 41.00 mm\r\nKích thước dây : mm\r\nLoại mặt kính : Kính Sapphire\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 4\r\nĐá Gắn Kèm Đồng Hồ : Không gắn đá\r\nChứng nhận Chronometer : Không'),
(56, 'Đồng hồ Orient Nam RE-AU0401S00B Dây Kim Loại 42 mm', 20.029, 16, 16.8244, 0, 'Common/assets/img/wor00000294-dong-ho-orient-nam-re-au0401s00b-day-kim-loai-42-mm-1.png', 5, 0, 'Thương hiệu : Orient\r\nGiới tính : Nam\r\nMàu sắc mặt : Trắng\r\nPhong cách : Classic: cổ điển, thông dụng\r\nMàu sắc dây : Bạc\r\nĐộ dày vỏ máy : 11.5\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nLoại máy đồng hồ : Automatic (cơ tự động)\r\nChất liệu vỏ : Thép không gỉ\r\nChất liệu dây : Dây thép cao cấp không gỉ 316L\r\nĐộ chịu nước : 5\r\nKích thước mặt : 42\r\nKích thước dây : 21\r\nLoại mặt kính : Kính Sapphire Chống Chói\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Không gắn đá\r\nChứng nhận Chronometer : Không\r\nChức năng chính : Lịch'),
(57, 'Đồng hồ Orient Nam RA-AS0009S1118900SGCB Dây Da 42 mm', 18.057, 24, 13.7233, 0, 'Common/assets/img/sp-wor00000323-dong-ho-orient-nam-ra-as0009s10b-d1.png', 5, 0, 'Thương hiệu : Orient\r\nGiới tính : Nam\r\nMàu sắc mặt : Trắng\r\nPhong cách : Classic: cổ điển, thông dụng\r\nMàu sắc dây : Nâu\r\nĐộ dày vỏ máy : 14\r\nXuất Xứ Thương Hiệu : Nhật Bản\r\nLoại máy đồng hồ : Automatic (cơ tự động)\r\nChất liệu vỏ : Thép không gỉ\r\nChất liệu dây : Dây da tổng hợp\r\nĐộ chịu nước : 5\r\nKích thước mặt : 42\r\nKích thước dây : 22\r\nLoại mặt kính : Kính Sapphire Chống Chói\r\nXuất xứ bộ máy : Nhật Bản\r\nLắp ráp tại : Nhật Bản/Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Không gắn đá\r\nChứng nhận Chronometer : Không\r\nChức năng chính : Moon Phase/ Sun Phase');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `name_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL COMMENT 'id người dùng',
  `image_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh người dùng',
  `name_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên tài khoản',
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Họ tên người dùng',
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `gender_user` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'giới tính',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `address_user` text COLLATE utf8mb4_unicode_ci COMMENT 'địa chỉ',
  `id_role` int NOT NULL COMMENT 'vai trò',
  `option_user` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `image_user`, `name_account`, `name_user`, `email_user`, `gender_user`, `password`, `address_user`, `id_role`, `option_user`) VALUES
(1, '', 'adminPNJ', 'Đỗ Huy5', 'admin@gmail.com', 0, '123', '', 1, 0),
(3, 'Common/assets/img/tim-bogdanov-4uojMEdcwI8-unsplash.jpg', 'admin3', 'Trần Văn B', 'tranvanB@gmail.com', 0, '2005', '', 1, 0),
(4, 'Common/assets/img/tim-bogdanov-4uojMEdcwI8-unsplash.jpg', 'Đỗ Huy', 'Đỗ Quốc Huy', 'huydonganh2005@gmail.com', 0, '2005', '', 2, 0),
(5, 'Common/assets/img/download.jpg', 'Trần Dần', '', 'trandan@gmail.com', 0, 'dan123', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT COMMENT 'id người dùng', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
