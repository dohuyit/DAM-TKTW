-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 02:51 AM
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
(9, 'Trang sức đá màu', 'Common/assets/img/cate-damau.jpg'),
(10, 'Đồng hồ thời trang', 'Common/assets/img/dongho-t7-24-1200_X_450__CTA_.jpg');

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
(31, 34, 4, 'Quá đẹp tuyệt vời hihi', '2024-08-06 09:09:07'),
(34, 29, 4, 'Tao đẹp zai', '2024-08-08 03:37:08'),
(38, 34, 7, 'Quá tuyệt vời', '2024-08-09 16:19:34'),
(39, 29, 9, 'Sản phẩm đẹp', '2024-08-11 15:10:20'),
(41, 65, 4, 'Quá đẹp\r\n', '2024-08-13 03:27:47'),
(43, 84, 4, 'Thật đẹp quá đi ', '2024-08-13 04:18:13'),
(44, 73, 4, 'Rất đẹp và lộng lẫy', '2024-08-13 16:08:35'),
(45, 76, 4, 'Rất đẹp tuyệt vời', '2024-08-13 16:08:52'),
(46, 77, 4, 'Quá đẹp', '2024-08-13 16:13:14'),
(47, 77, 4, 'Quá lộng lẫy', '2024-08-13 16:13:27'),
(48, 39, 4, 'Quá sang trọng luôn', '2024-08-13 16:14:18'),
(49, 75, 7, 'Sản phẩm rất đẹp', '2024-08-14 07:44:21'),
(50, 35, 7, 'rất đẹp \r\n', '2024-08-14 07:45:28'),
(51, 39, 7, 'Rất đẹp', '2024-08-14 08:05:38'),
(52, 42, 7, 'thật đẹp quá', '2024-08-14 08:38:21'),
(53, 74, 7, 'Rất đẹp\r\n', '2024-08-14 09:11:27'),
(54, 71, 7, 'rất quý phái', '2024-08-14 09:11:39'),
(55, 82, 9, 'Thật đẹp', '2024-08-15 04:00:18'),
(56, 78, 9, 'Đẹp quá', '2024-08-15 16:54:29'),
(57, 78, 9, 'Quá đẹp', '2024-08-15 16:55:30'),
(58, 78, 9, 'đẹp', '2024-08-15 16:56:14'),
(59, 83, 9, 'Thật phong cách', '2024-08-15 17:03:36'),
(60, 61, 9, 'Thật đẹp', '2024-08-15 17:08:17'),
(61, 64, 9, 'Thật quý phái', '2024-08-15 17:08:30'),
(62, 36, 4, 'Rất lộng lẫy', '2024-08-15 17:13:13'),
(64, 84, 4, 'Quá đẹp', '2024-08-16 09:26:08'),
(65, 87, 4, 'Thật sang trọng', '2024-08-16 09:30:45'),
(66, 75, 9, 'Khá đẹp', '2024-08-16 16:19:10'),
(67, 71, 9, 'Đẹp', '2024-08-16 16:19:25'),
(68, 41, 4, 'đẹp', '2024-08-17 02:48:38'),
(69, 89, 4, 'ffffff', '2024-08-17 14:08:37');

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
(16, 'Nhẫn Vàng trắng 14K đính đá ECZ Disney|PNJ The Little Mermaid D100 XMXMW004618', 4.869, 15, 4.13865, 1, 'Common/assets/img/sp-gnxmxmw004618-nhan-vang-14k-dinh-da-ecz-disney-pnj-the-little-mermaid-d100-1.png', 2, 1, 'Trọng lượng tham khảo:\r\n5.14681phân\r\n \r\nLoại đá chính:\r\nXoàn mỹ\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nBộ sưu tập:\r\nShare the wonder\r\n \r\nThương hiệu:\r\nDisney|PNJ'),
(22, 'Nhẫn Vàng Trắng 14K đính Ngọc trai Freshwater PNJ PFXMW000273', 5.242, 5, 4.9799, 0, 'Common/assets/img/sp-gnpfxmw000273-nhan-vang-trang-14k-dinh-ngoc-trai-freshwater-pnj-1.png', 3, 0, 'Trọng lượng tham khảo:\r\n4.84725phân\r\n \r\nHàm lượng chất liệu:\r\n5850\r\n \r\nLoại đá chính:\r\nFreshwater Pearl\r\n \r\nLoại đá phụ:\r\nXoàn mỹ\r\n \r\nThương hiệu:\r\nPNJ\r\n \r\nGiới tính:\r\nNữ'),
(28, 'Nhẫn Vàng 14K đính đá CZ PNJ XMXMY004691', 7.196, 10, 6.4764, 1, 'Common/assets/img/gnxmxmy004691-nhan-vang-14k-dinh-da-cz-pnj.png', 2, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 8.64558\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá phụ : 60\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(29, 'Nhẫn Vàng 18K đính đá CZ PNJ XMXMY007521', 12.858, 14, 11.0579, 1, 'Common/assets/img/sp-gnxmxmy007521-nhan-vang-18k-dinh-da-cz-pnj-1.png', 2, 17, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 14.94656\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 61\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(31, 'Nhẫn Vàng 18K đính Ngọc trai Southsea PNJ PSDDC000032', 24.669, 8, 22.695, 1, 'Common/assets/img/gnpsddc000032-nhan-kim-cuong-vang-18k-dinh-ngoc-trai-southsea-pnj-01.png', 3, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Southsea Pearl\r\nLoại đá phụ : Kim cương\r\nSố thứ tự của Đá gắn kèm :\r\nPhong cách : Cảm xúc\r\nTrọng lượng tham khảo : 14.4882\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 47\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(32, 'Vòng tay Vàng 18K đính ngọc trai Southsea PNJ PSDDC000013', 55.184, 10, 49.6656, 0, 'Common/assets/img/gvpsddc000013-vong-tay-vang-18k-dinh-ngoc-trai-southsea-pnj-01.png', 3, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Southsea Pearl\r\nLoại đá phụ : Kim cương\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm :\r\nTrọng lượng tham khảo : 42.9477\r\nMàu đá chính : Vàng\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nLoại ngọc trai : South Sea\r\nĐộ dày vỏ máy :\r\nSố viên đá phụ : 91\r\nKích thước mặt :\r\nKích thước dây :\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 7500'),
(34, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DD00W000124', 7.141, 9, 6.49831, 0, 'Common/assets/img/gmdd00w000124-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-01.png', 1, 13, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Không gắn đá\r\nKích thước đá chính (tham khảo) : 3.2\r\nSố thứ tự của Đá gắn kèm : A0\r\nTrọng lượng tham khảo : 1.57961\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(35, 'Nhẫn Vàng 18K đính đá ECZ PNJ XMXMY010888', 8.239, 5, 7.82705, 0, 'Common/assets/img/sp-gnxmxmy010888-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 6, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nTrọng lượng tham khảo : 8.38134\r\nMàu đá chính : Trắng\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(36, 'Nhẫn Vàng 18K đính đá ECZ PNJ XMXMY010580', 9.907, 0, 9.907, 0, 'Common/assets/img/sp-gnxmxmy010580-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 5, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 9.92716\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(39, 'Bông tai Vàng Trắng 14K đính Ngọc trai Freshwater PNJ PFXMW000415', 6.396, 14, 5.50056, 0, 'Common/assets/img/sp-GBPFXMW000415-bong-tai-vang-trang-14k-dinh-ngoc-trai-freshwater-pnj-001.png', 3, 77, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Freshwater Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 6.2015\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(40, 'Mặt dây chuyền Vàng trắng 14K đính ngọc trai Akoya PNJ PAXMW000113', 9.522, 8, 8.76024, 0, 'Common/assets/img/sp-gmpaxmw000113-mat-day-chuyen-vang-trang-14k-dinh-ngoc-trai-akoya-pnj.png', 3, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 10.158\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(41, 'Dây cổ Vàng Trắng 14K đính Ngọc trai Tahiti PNJ PTMXW060000', 99.549, 12, 87.603, 1, 'Common/assets/img/sp-gcptmxw060000-day-co-vang-trang-14k-dinh-ngoc-trai-tahiti-pnj-1.png', 3, 7, 'Thương hiệu : PNJ\r\nLoại đá chính : Tahiti Pearl\r\nLoại đá phụ : Mix đá\r\nTrọng lượng tham khảo : 9.769\r\nLoại ngọc trai : Tahiti\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(42, 'Bộ trang sức Vàng 14K đính ngọc trai Akoya PNJ 00054-000043', 28.334, 16, 23.8006, 0, 'Common/assets/img/sp-bo-trang-suc-vang-14k-dinh-ngoc-trai-akoya-pnj-00054-000043-1.png', 3, 8, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nTrọng lượng tham khảo : phân\r\nLoại ngọc trai : Akoya'),
(43, 'Nhẫn Vàng trắng 14K đính Ngọc trai Akoya PNJ PAXMW000147', 11.786, 9, 10.7253, 0, 'Common/assets/img/sp-gnpaxmw000147-nhan-vang-trang-14k-dinh-ngoc-trai-akoya-pnj-1.png', 3, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Akoya Pearl\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 7.50986\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nLoại ngọc trai : Akoya\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 29\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(58, 'Lắc tay Vàng trắng Ý 18K đính đá CZ PNJ XMXMW000064', 21.066, 15, 17.9061, 0, 'Common/assets/img/sp-glxmxmw000064-lac-tay-vang-trang-y-18k-dinh-da-cz-pnj-1.png', 2, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nSố thứ tự của Đá gắn kèm : 02\r\nTrọng lượng tham khảo : 24.75236'),
(59, 'Mặt dây chuyền Vàng 18K Đính đá ECZ PNJ XMXMY007543', 6.997, 5, 6.64715, 0, 'Common/assets/img/sp-gmxmxmy007543-mat-day-chuyen-vang-18k-dinh-da-ecz-pnj.png', 2, 83, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 6.4734\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(60, 'Bông tai Kim cương Vàng trắng 14K PNJ DD00W001828', 14.654, 20, 11.7232, 0, 'Common/assets/img/sp-dd00w001828-bong-tai-kim-cuong-vang-trang-14k-pnj-1.png', 1, 5, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nTrọng lượng tham khảo : 4.09471\r\nMàu đá chính : 2'),
(61, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DDDDW000355', 15.759, 14, 13.5527, 1, 'Common/assets/img/gmddddw000355-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-001.png', 1, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Kim cương\r\nMàu đá phụ : Trắng\r\nColor (Màu sắc/ Nước kim cương) : F\r\nKích thước đá chính (tham khảo) : 3.9\r\nClarity (Độ tinh khiết) : SI1\r\nTrọng lượng tham khảo : 2.97733\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nSố viên đá phụ : 3\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(62, 'Nhẫn Kim cương Vàng 14K Disney|PNJ Cinderella DDDDH000344', 28.748, 6, 27.0231, 0, 'Common/assets/img/gnddddh000344-nhan-kim-cuong-vang-14k-disneypnj-cinderella-01.png', 1, 4, 'Thương hiệu : Disney|PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Kim cương\r\nMàu đá phụ : Trắng\r\nColor (Màu sắc/ Nước kim cương) : E\r\nKích thước đá chính (tham khảo) : 3.5\r\nClarity (Độ tinh khiết) : SI1\r\nTrọng lượng tham khảo : 6.33926\r\nMàu đá chính : Trắng\r\nCut (Giác cắt/ Hình dạng kim cương) : Facet\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 26\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(63, 'Bông tai Kim cương Vàng trắng 18K PNJ DDDDW060375', 54.372, 0, 54.372, 0, 'Common/assets/img/sp-gbddddw060375-bong-tai-kim-cuong-vang-trang-18k-pnj-1.png', 1, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nLoại đá phụ : Kim cương\r\nTrọng lượng tham khảo : 8.89633\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(64, 'Vòng tay Kim cương Vàng Trắng 18K PNJ DDDDW060087', 83.922, 15, 71.3337, 0, 'Common/assets/img/sp-gvddddw060087-vong-tay-kim-cuong-vang-trang-18k-pnj--.png', 1, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nLoại đá phụ : Kim cương\r\nTrọng lượng tham khảo : 24.61649\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(65, 'Nhẫn nam Kim cương Vàng trắng 14K PNJ DDDDW013362', 72.657, 17, 60.3053, 0, 'Common/assets/img/sp-gnddddw013362-nhan-kim-cuong-vang-trang-14k-pnj-1.png', 1, 11, 'Thương hiệu : PNJ\r\nGiới tính : Nam\r\nLoại đá chính : Kim cương\r\nLoại đá phụ : Kim cương\r\nColor (Màu sắc/ Nước kim cương) : F\r\nClarity (Độ tinh khiết) : SI1\r\nTrọng lượng tham khảo : 33.83933\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 48\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(66, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DDDDW002699', 16.254, 25, 12.1905, 0, 'Common/assets/img/sp-ddddw002699-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-1.png', 1, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nLoại đá phụ : Kim cương\r\nTrọng lượng tham khảo : 1.8374\r\nSố viên đá phụ : 10\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(67, 'Mặt dây chuyền Kim cương Vàng trắng 14K PNJ DDDDW002704', 8.515, 16, 7.1526, 1, 'Common/assets/img/sp-ddddw002704-mat-day-chuyen-kim-cuong-vang-trang-14k-pnj-1.png', 1, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Kim cương\r\nLoại đá phụ : Kim cương\r\nTrọng lượng tham khảo : 5.33886\r\nSố viên đá chính : 10\r\nHàm lượng chất liệu : 5850'),
(68, 'Mặt dây chuyền Vàng trắng 14K đính đá Topaz PNJ TPXMW000417', 6.572, 22, 5.12616, 0, 'Common/assets/img/sp-gmtpxmw000417-mat-day-chuyen-vang-trang-14k-dinh-da-topaz-pnj-1.png', 9, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Topaz\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 4.4464\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(69, 'Bông tai Vàng 18K đính đá Citrine PNJ CTXMY000199', 9.159, 19, 7.41879, 0, 'Common/assets/img/sp-gbctxmy000199-bong-tai-vang-18k-dinh-da-citrine-pnj.png', 9, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Citrine\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 7.85632\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 40\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 2\r\nHàm lượng chất liệu : 7500'),
(70, 'Mặt dây chuyền Vàng trắng 14K đính đá Sapphire PNJ SPXMW000214', 5.213, 12, 4.58744, 0, 'Common/assets/img/sp-gmspxmw000214-mat-day-chuyen-vang-14k-dinh-da-sapphire-disney-pnj-peter-pan-1.png', 9, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Sapphire\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 3.0203\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(71, 'Lắc tay cưới Vàng 18K đính đá Ruby PNJ Trầu Cau RBMXY000023', 32.944, 15, 28.0024, 0, 'Common/assets/img/sp-glrbmxy000023-lac-tay-cuoi-vang-18k-dinh-da-ruby-pnj-trau-cau-01.png', 9, 6, 'Thương hiệu : PNJ\r\nLoại đá chính : Ruby\r\nHình dạng đá : Trái tim\r\nLoại đá phụ : Mix đá\r\nKích thước đá chính (tham khảo) : 7 x 7\r\nTrọng lượng tham khảo : 30.87624\r\nMàu đá chính : Đỏ\r\nKích thước đá (tham khảo) : 7 x 7 ly\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 129\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1'),
(72, 'Mặt dây chuyền Vàng 14K đính đá Đá Moon PNJ MOXMX000023', 5.265, 15, 4.47525, 0, 'Common/assets/img/gmmoxmx000023-mat-day-chuyen-vang-14k-dinh-da-da-moon-pnj-01.png', 9, 1, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Moon\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nMàu đá phụ : Trắng\r\nTrọng lượng tham khảo : 5.43863\r\nMàu đá chính : Hồng\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 2\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(73, 'Nhẫn Vàng 14K đính đá bản to cho nam Sapphire PNJ SP00X000003', 15.539, 14, 13.3635, 0, 'Common/assets/img/sp-gnsp00x000003-nhan-vang-14k-dinh-da-sapphire-disney-pnj-peter-pan-1.png', 9, 6, 'Thương hiệu : PNJ\r\nLoại đá chính : Sapphire\r\nLoại đá phụ : Không gắn đá\r\nTrọng lượng tham khảo : 15.034\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(74, 'Nhẫn Vàng trắng 14K đính đá Topaz PNJ TPXMW000657', 10.469, 26, 7.74706, 0, 'Common/assets/img/sp-gntpxmw000657-nhan-vang-trang-14k-dinh-da-topaz-pnj-01.png', 9, 2, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Topaz\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 10.33824\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 5850'),
(75, 'Nhẫn Vàng 14K đính đá Sapphire PNJ Niềm tin SPMXH000003', 39.135, 7, 36.3955, 1, 'Common/assets/img/sp-gnspmxh000003-nhan-vang-14k-dinh-da-sapphire-pnj-niem-tin-1.png', 9, 9, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Sapphire\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Mix đá\r\nKích thước đá chính (tham khảo) : 4x4\r\nPhong cách : Fashion\r\nTrọng lượng tham khảo : 11.8025\r\nSố viên đá phụ : 22\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(76, 'Bông tai Vàng 14K đính đá Ruby PNJ Audax Rosa RBXMH000002', 17.909, 0, 17.909, 0, 'Common/assets/img/sp-gbrbxmh000002-bong-tai-vang-14k-dinh-da-ruby-pnj-audax-rosa-1.png', 9, 3, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Ruby\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 16.5866\r\nMàu đá chính : Đỏ'),
(77, 'Dây cổ Vàng 14K đính đá Moon PNJ MOMXH000003', 56.094, 13, 48.8018, 0, 'Common/assets/img/gcmomxh000003-day-co-vang-14k-dinh-da-moon-pnj-1.png', 9, 3, 'Thương hiệu : PNJ\r\nLoại đá chính : Moon\r\nHình dạng đá : Giọt\r\nLoại đá phụ : Mix đá\r\nTrọng lượng tham khảo : 76.6345\r\nCut (Giác cắt/ Hình dạng kim cương) : Cabochon\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 255\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(78, 'Lắc tay Vàng Ý 14K đính đá CZ PNJ XM00Y060270', 12.418, 13, 10.8037, 1, 'Common/assets/img/sp-glxm00y060270-lac-tay-vang-14k-pnj-1.png', 2, 8, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Không gắn đá\r\nTrọng lượng tham khảo : 14.75999\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(79, 'Hạt charm Vàng 18K đính đá CZ PNJ XMXMY000161', 6.795, 14, 5.8437, 0, 'Common/assets/img/sp-gixmxmy000161-hat-charm-vang-18k-dinh-da-cz-pnj-1.png', 2, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 6.98779\r\nĐộ dày vỏ máy : mm\r\nLoại charm : Charm xỏ\r\nSố viên đá phụ : 22\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 26\r\nHàm lượng chất liệu : 7500'),
(80, 'Mặt dây chuyền Vàng Trắng 14K đính Ngọc trai Freshwater PNJ PFXMW000285', 5.359, 11, 4.76951, 0, 'Common/assets/img/sp-gmpfxmw000285-mat-day-chuyen-vang-trang-14k-dinh-ngoc-trai-freshwater-pnj-1.png', 3, 1, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Freshwater Pearl\r\nHình dạng đá : Tròn\r\nLoại đá phụ : Xoàn mỹ\r\nKích thước đá chính (tham khảo) : 8.5*8.5\r\nPhong cách : Fashion\r\nTrọng lượng tham khảo : 5.25296\r\nMàu đá chính : Trắng\r\nLoại ngọc trai : Freshwater\r\nĐộ dày vỏ máy : mm\r\nSố viên đá phụ : 24\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nSố viên đá chính : 1\r\nHàm lượng chất liệu : 5850'),
(81, 'Đồng hồ Disney & Marvel Nam M-6071B Dây Cao Su 42 mm', 3.556, 12, 3.12928, 0, 'Common/assets/img/sp-wmdiaf00p42.0046-dong-ho-disney-marvel-nam-m-6071b-day-cao-su-42-mm-1.png', 10, 0, 'Thương hiệu : Disney Watch\r\nGiới tính : Nam\r\nMàu sắc mặt : Đen\r\nPhong cách : Fashion: Thời trang\r\nMàu sắc dây : Đen\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Đồng hồ nhượng quyền Disney\r\nLoại máy đồng hồ : Automatic (cơ tự động)\r\nChất liệu vỏ : Alloy (hợp kim xi)\r\nChất liệu dây : Dây cao su Caoutchouc caocấp\r\nĐộ chịu nước : 3\r\nKích thước mặt : 42\r\nKích thước dây : 20\r\nLoại mặt kính : kính khoáng\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Không gắn đá\r\nChức năng chính : Lịch'),
(82, 'Đồng hồ Disney & Marvel Nam M-6072B1 Dây Cao Su 50 mm', 4.765, 17, 3.95495, 0, 'Common/assets/img/sp-wmdiaf00p50.0058-dong-ho-disney-marvel-nam-m-6072b1-day-cao-su-50-mm-1.png', 10, 3, 'Thương hiệu : Disney Watch\r\nGiới tính : Nam\r\nMàu sắc mặt : Đen\r\nPhong cách : Fashion: Thời trang\r\nMàu sắc dây : Đen\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Đồng hồ nhượng quyền Disney\r\nLoại máy đồng hồ : Automatic (cơ tự động)\r\nChất liệu vỏ : Nhựa\r\nChất liệu dây : Dây cao su Caoutchouc caocấp\r\nĐộ chịu nước : 3\r\nKích thước mặt : 50\r\nKích thước dây : 28\r\nLoại mặt kính : kính khoáng\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Oval\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Không gắn đá'),
(83, 'Đồng hồ Disney Watch Nữ SF-51301W Dây Da 40', 4.378, 5, 4.1591, 1, 'Common/assets/img/sp-wfdiqfw0l40.0026-dong-ho-disney-watch-nu-sf-51301w-day-da-40-mm-1.png', 10, 3, 'Thương hiệu : Disney Watch\r\nGiới tính : Nữ\r\nMàu sắc mặt : Hồng\r\nPhong cách : Fashion: Thời trang\r\nMàu sắc dây : Bạc\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Đồng hồ nhượng quyền Disney\r\nLoại máy đồng hồ : Quartz (Pin)\r\nChất liệu vỏ : Đồng thau\r\nChất liệu dây : Genuine Leather (Dây Da)\r\nĐộ chịu nước : 3\r\nKích thước mặt : 40\r\nKích thước dây : 18\r\nLoại mặt kính : kính khoáng\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Đá tổng hợp, pha lê'),
(84, 'Đồng hồ Disney Watch Nữ MK-11626RG Dây Kim Loại 25 mm', 2.057, 14, 1.76902, 0, 'Common/assets/img/sp-wfdiqfw0m25.0018-dong-ho-disney-watch-nu-mk-11626rg-day-kim-loai-25-mm-1.png', 10, 4, 'Thương hiệu : Disney Watch\r\nGiới tính : Nữ\r\nMàu sắc mặt : Trắng\r\nPhong cách : Fashion: Thời trang\r\nMàu sắc dây : Vàng Hồng\r\nĐộ dày vỏ máy : mm\r\nXuất Xứ Thương Hiệu : Đồng hồ nhượng quyền Disney\r\nLoại máy đồng hồ : Quartz (Pin)\r\nChất liệu vỏ : Alloy (hợp kim xi)\r\nChất liệu dây : Khác\r\nĐộ chịu nước : 3\r\nKích thước mặt : 25\r\nKích thước dây : 12\r\nLoại mặt kính : kính khoáng\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Đá tổng hợp, pha lê'),
(85, 'Đồng hồ Longines Master Nam L2.409.4.97.6 Dây Kim Loại 34 mm', 80.568, 0, 80.568, 0, 'Common/assets/img/sp-wmloawdds34.1059-dong-ho-longines-master-nam-l2.409.4.97.6-day-kim-loai-34-mm-1.png', 10, 5, 'Phong cách: Swiss made\r\nThương hiệu: Longines\r\nXuất Xứ Thương Hiệu: Thụy Sỹ\r\nXuất xứ bộ máy: Thụy Sỹ\r\nLắp ráp tại: Thụy Sỹ\r\nLoại máy đồng hồ: Automatic (cơ tự động)\r\nLoại mặt kính: Kính Sapphire\r\nChất liệu dây: Dây thép cc không gỉ 316L\r\nChất liệu vỏ: Thép không gỉ\r\nHình dạng mặt: Tròn\r\nMàu sắc mặt: Xanh dương\r\nKích thước dây: 18mm\r\nKích thước mặt: 34mm\r\nĐộ chịu nước: 3atm\r\nĐộ dày vỏ máy: 11mm\r\nSố Kim: 4\r\nĐá Gắn Kèm Đồng Hồ: Kim cương.\r\nGiới tính: Nam'),
(86, 'Đồng hồ Rado Centrix Nữ R30029902 Dây Kim Loại 35 mm', 97.122, 15, 82.5537, 0, 'Common/assets/img/sp-wfraawdds35.0206-dong-ho-rado-centrix-nu-r30029902-day-kim-loai-35-mm-1.png', 10, 12, 'Phong cách:Classic: cổ điển, thông dụng\r\nThương hiệu:Rado\r\nXuất Xứ Thương Hiệu:Thụy Sỹ\r\nXuất xứ bộ máy:Thụy Sỹ\r\nLắp ráp tại:Thụy Sỹ\r\nLoại máy đồng hồ:Automatic (cơ tự động)\r\nLoại mặt kính:Kính Sapphire Chống Chói\r\nChất liệu dây:Dây thép cc ko gỉ 316L+Ceramic\r\nChất liệu vỏ:Thép không gỉ\r\nHình dạng mặt:Tròn\r\nMàu sắc mặt:Nâu\r\nKích thước mặt:35mm\r\nĐộ dày vỏ máy:11mm\r\nSố Kim:3\r\nĐá Gắn Kèm Đồng Hồ:Kim cương.\r\nGiới tính: Nữ'),
(87, 'Đồng hồ Rado True Round Unisex R27113152 Dây Ceramic 40 mm', 83.29, 9, 75.7939, 0, 'Common/assets/img/sp-wuraaw00c40.0199-dong-ho-rado-true-round-unisex-r27113152-day-ceramic-40-mm-1.png', 10, 9, 'Phong cách: Classic: cổ điển, thông dụng\r\nThương hiệu: Rado\r\nXuất Xứ Thương Hiệu: Thụy Sỹ\r\nXuất xứ bộ máy: Thụy Sỹ\r\nLắp ráp tại: Thụy Sỹ\r\nLoại máy đồng hồ: Automatic (cơ tự động)\r\nLoại mặt kính: Kính Sapphire Chống Chói\r\nChất liệu dây: Dây Ceramic.\r\nChất liệu vỏ: Ceramic\r\nHình dạng mặt: Tròn\r\nMàu sắc mặt: Đen\r\nKích thước mặt: 40mm\r\nGiới tính: Unisex'),
(88, 'Đồng hồ Rado Diastar Original Nam R12413193 Dây Kim Loại 35 mm', 43.781, 4, 42.0298, 0, 'Common/assets/img/sp-wmraawm0s35.0173-dong-ho-rado-diastar-original-nam-r12413193-day-kim-loai-35-mm-1.png', 10, 1, 'Phong cách:Classic: cổ điển, thông dụng\r\nThương hiệu:Rado\r\nXuất Xứ Thương Hiệu:Thụy Sỹ\r\nXuất xứ bộ máy:Thụy Sỹ\r\nLắp ráp tại:Thụy Sỹ\r\nLoại máy đồng hồ:Automatic (cơ tự động)\r\nLoại mặt kính:Kính Sapphire Chống Chói\r\nChất liệu dây:Dây thép cc không gỉ 316L\r\nChất liệu vỏ:Thép không gỉ\r\nHình dạng mặt:Tròn\r\nMàu sắc mặt:Vàng\r\nKích thước mặt:35mm\r\nĐộ dày vỏ máy:11mm\r\nSố Kim:3\r\nĐá Gắn Kèm Đồng Hồ:Đá quý/bán quý (rb, sp, …).\r\nChức năng chính:Lịch\r\nGiới tính:Nam'),
(89, 'Đồng Hồ Cặp Longines L2.628.4.92.6 và L2.128.4.97.6 38.5 mm - 25.5 mm', 120.789, 4, 115.957, 0, 'Common/assets/img/sp-dong-ho-cap-longines-l2-628-4-92-6-va-l2-128-4-97-6-38-5-mm-25-5-mm-1.png', 10, 4, 'Thương hiệu : Longines\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm'),
(90, 'Nhẫn Vàng 18K đính đá bản mới nhất ECZ PNJ XMXMY011806', 10.507, 9, 9.56137, 0, 'Common/assets/img/sp-gnxmxmy011806-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 0, 'Thương hiệu : PNJ\r\nGiới tính : Nữ\r\nLoại đá chính : Xoàn mỹ\r\nLoại đá phụ : Xoàn mỹ\r\nTrọng lượng tham khảo : 9.29599\r\nĐộ dày vỏ máy : mm\r\nKích thước mặt : mm\r\nKích thước dây : mm\r\nHàm lượng chất liệu : 7500'),
(92, 'Đồng Hồ Olivia Burton Nữ OB16GB10 Dây Da 34mm', 2.013, 12, 1.77144, 0, 'Common/assets/img/WOB00000135-OB16GB10_Desktop_1.jpg', 10, 1, 'Thương hiệu : Olivia Burton\r\nGiới tính : Nữ\r\nMàu sắc mặt : Xà cừ\r\nPhong cách : Fashion: Thời trang\r\nMàu sắc dây : Hồng\r\nĐộ dày vỏ máy : 8\r\nXuất Xứ Thương Hiệu : Anh\r\nLoại máy đồng hồ : Quartz (Pin)\r\nChất liệu vỏ : Thép không gỉ mạ vàng hồng PVD\r\nChất liệu dây : Genuine Leather (Dây Da)\r\nĐộ chịu nước : 1\r\nKích thước mặt : 34.00 mm\r\nKích thước dây : 12\r\nLoại mặt kính : kính khoáng\r\nXuất xứ bộ máy : Trung Quốc\r\nLắp ráp tại : Trung Quốc\r\nHình dạng mặt : Tròn\r\nSố Kim : 3\r\nĐá Gắn Kèm Đồng Hồ : Swarovski\r\nChứng nhận Chronometer : Không\r\nChức năng chính : Dual time'),
(93, 'Nhẫn Kim cương Vàng trắng 14K PNJ DDDDW003910', 12.456, 12, 10.9613, 1, 'Common/assets/img/sp-gnxmxmy011806-nhan-vang-18k-dinh-da-ecz-pnj-1.png', 2, 0, 'hhhhhhhh');

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
(4, 'Common/assets/img/download.jpg', 'Đỗ Huy', 'Đỗ Quốc Huy', 'huydonganh2005@gmail.com', 0, '2005', 'Đông Anh - Hà Nội - Việt Nam', 2, 0),
(5, 'Common/assets/img/download.jpg', 'Trần Dần', '', 'trandan@gmail.com', 0, 'dan123', 'Đông anh', 2, 1),
(6, '', 'admin3', 'admin3', 'admin3@gmail.com', 0, 'admin3', '', 1, 1),
(7, '', 'Trần Văn H', '', 'tvH@gmail.com', 1, '222', 'huydonganh', 2, 0),
(9, '', 'Nguyễn Thị Lụa ', 'Lụa', 'lua_nt@gmail.com', 1, '12345', '', 2, 0),
(10, '', 'Phạm Thành Công', '', 'thanhcong22@gmail.com', 1, '12345', '', 2, 0);

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
  ADD KEY `comments_ibfk_2` (`id`);

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
  MODIFY `id_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT COMMENT 'id người dùng', AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
