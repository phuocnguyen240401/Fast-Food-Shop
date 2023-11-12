-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 12, 2023 lúc 08:09 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbclothesshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `pricetotal` int NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `carts_customer_id_foreign` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `size`, `quantity`, `pricetotal`, `active`) VALUES
(32, 1, 42, 'S', 1, 23000, 0),
(31, 1, 42, 'S', 1, 23000, 0),
(30, 1, 47, 'S', 1, 24000, 0),
(29, 1, 37, 'S', 1, 300000, 0),
(28, 1, 37, 'S', 1, 300000, 0),
(27, 1, 37, 'S', 1, 300000, 0),
(26, 1, 17, 'S', 1, 120000, 0),
(25, 1, 42, 'S', 1, 23000, 0),
(24, 1, 48, 'S', 1, 23000, 0),
(23, 1, 16, 'S', 3, 30000, 0),
(22, 1, 47, 'S', 1, 24000, 0),
(21, 1, 47, 'S', 1, 24000, 0),
(33, 1, 16, 'S', 1, 30000, 0),
(34, 1, 47, 'S', 1, 24000, 0),
(35, 1, 32, 'S', 1, 230000, 0),
(36, 1, 42, 'S', 1, 23000, 0),
(37, 1, 37, 'S', 3, 300000, 0),
(38, 1, 47, 'S', 1, 24000, 0),
(39, 1, 47, 'S', 1, 24000, 0),
(40, 1, 47, 'S', 1, 24000, 0),
(41, 1, 47, 'S', 1, 24000, 0),
(42, 1, 47, 'S', 1, 24000, 0),
(43, 1, 47, 'S', 1, 24000, 0),
(44, 1, 47, 'S', 1, 24000, 0),
(45, 1, 47, 'S', 1, 24000, 0),
(46, 1, 47, 'S', 1, 24000, 0),
(47, 1, 47, 'S', 1, 24000, 0),
(48, 1, 47, 'S', 1, 24000, 0),
(49, 1, 47, 'S', 1, 24000, 0),
(50, 1, 43, 'S', 1, 30000, 0),
(51, 1, 36, 'S', 1, 250000, 0),
(52, 1, 37, 'S', 1, 300000, 0),
(53, 1, 17, 'S', 1, 120000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phonenumber`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Người ngoài hành tinh', 'sao hỏa', '9763845454', 'sao thủy', 2, NULL, '2023-10-30 02:49:13'),
(2, 'Người ngoài hành lang', NULL, NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `thumb`, `created_at`, `updated_at`) VALUES
(49, 'Hamburger Chay', 42, 'Hamburger chay', '<p>Hamburger chay</p>', 1, '/storage/uploads/2023/10/07/hamburgerchaysalach.jpg', '2023-10-02 10:34:22', '2023-10-07 03:39:53'),
(50, 'Hamburger Truyền thống', 42, 'Hamburger Truyền thống', '<p>Hamburger &nbsp;Truyền thống</p>', 1, '/storage/uploads/2023/10/07/dddddd.jpg', '2023-10-02 10:34:58', '2023-10-07 11:14:54'),
(51, 'Nước Uống có ga', 41, 'Nước Uống có ga', '<p>Nước Uống có ga</p>', 1, '/storage/uploads/2023/10/07/s.jpg', '2023-10-02 10:35:34', '2023-10-07 11:15:33'),
(44, 'Pizza', 0, 'bánh pizza thơm ngon', '<p>bánh pizza thơm ngon</p>', 1, '/storage/uploads/2023/10/03/pizza-5107039_1280.jpg', '2023-09-26 11:43:28', '2023-10-03 01:39:36'),
(45, 'Pizza Mùa Hạ', 44, 'Pizza Mùa Hạ', '<p>Pizza Mùa Hạ</p>', 1, '/storage/uploads/2023/10/07/pixxxx.jpg', '2023-09-26 11:43:52', '2023-10-07 11:11:21'),
(46, 'Pizza Mùa Xuân', 44, 'Pizza dành cho mùa xuân', '<p>Pizza mùa xuân</p>', 1, '/storage/uploads/2023/10/07/pxiiii3.jpg', '2023-09-26 11:44:11', '2023-10-07 11:11:11'),
(53, 'Hồng Trà', 41, 'Hồng Trà', '<p>Hồng Trà</p>', 0, '', '2023-10-02 10:36:15', '2023-10-02 10:36:15'),
(54, 'Trà Sữa', 41, 'Trà Sữa', '<p>Trà Sữa</p>', 1, '/storage/uploads/2023/10/07/eeeee.jpg', '2023-10-02 10:37:05', '2023-10-07 11:12:30'),
(48, 'Pizza Mùa Đông', 44, 'Pizza Mùa Đông', '<p>Pizza Mùa Đông</p>', 1, '/storage/uploads/2023/10/07/pizza.jpg', '2023-10-02 10:31:56', '2023-10-07 11:10:47'),
(47, 'Pizza Mùa Thu', 44, 'Pizza Mùa Thu', '<p>Pizza Mùa Thu</p>', 1, '/storage/uploads/2023/10/07/pizzz.jpg', '2023-10-02 10:31:36', '2023-10-07 11:10:55'),
(43, 'Xúc Xích Nướng', 0, 'Xúc xích nướng', '<p>Xúc xích nướng</p>', 1, '/storage/uploads/2023/10/07/dddd.jpg', '2023-09-26 11:43:13', '2023-10-07 11:11:39'),
(52, 'Nước uống trái cây', 41, 'Nước uống trái cây', '<p>Nước uống trái cây</p>', 1, '/storage/uploads/2023/10/07/dddddddd.jpg', '2023-10-02 10:35:52', '2023-10-07 11:12:20'),
(41, 'Đồ uống', 0, 'Nước uống', '<p>Nước uống</p>', 1, '/storage/uploads/2023/10/03/neu-moi-ngay-uong-mot-lon-nuoc-ngot-co-the-ban-bi-huy-hoai-nhu-the-nao-4-16331122198881292950569-0-0-632-1011-crop-16331149404551048079721.jpg', '2023-09-26 11:42:49', '2023-10-03 01:41:27'),
(42, 'Hamburger', 0, 'Hamburger', '<p>Hamburger</p>', 1, '/storage/uploads/2023/10/07/pxixxxx.jpg', '2023-09-26 11:43:01', '2023-10-07 11:12:50'),
(56, 'Xúc Xích Chay', 43, 'Xúc Xích Chay', '<p>Xúc Xích Chay</p>', 1, '/storage/uploads/2023/10/07/XucXichchay.jpg', '2023-10-03 06:53:01', '2023-10-07 03:39:33'),
(57, 'Xúc Xích Truyền Thống', 43, 'Xúc Xích Truyền Thống', '<p>Xúc Xích Truyền Thống</p>', 1, '/storage/uploads/2023/10/07/ffff.jpg', '2023-10-03 06:53:18', '2023-10-07 11:14:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_04_163102_create_menus_table', 1),
(6, '2023_09_23_063833_create_products_table', 2),
(7, '2023_09_27_081242_create_sliders_table', 3),
(8, '2023_10_17_090141_create_customers_table', 4),
(9, '2023_10_17_090305_create_carts_table', 4),
(10, '2023_10_30_083852_create_jobs_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `price_sale` int DEFAULT NULL,
  `active` int NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `menu_id`, `description`, `content`, `price`, `price_sale`, `active`, `thumb`, `created_at`, `updated_at`) VALUES
(11, 'Hamburger Gà', 50, 'Hamburger Gà', '<p>Hamburger Gà</p>', 50000, 30000, 1, '/storage/uploads/2023/10/03/hamburgernhanga.jpg', '2023-10-03 02:15:38', '2023-10-03 02:15:38'),
(9, 'Hamburger chay Pho Mát', 49, 'Hamburger chay Pho Mát', '<p>Hamburger chay Pho Mát</p>', 50000, 30000, 1, '/storage/uploads/2023/10/03/hamburgerchay.jpg', '2023-10-03 02:13:22', '2023-10-03 02:13:22'),
(10, 'Hampurger Chay Rau Củ', 49, 'Hampurger Chay Rau Củ', '<p>Hampurger Chay Rau Củ</p>', 40000, 25000, 1, '/storage/uploads/2023/10/03/hamburgerchaysalach.jpg', '2023-10-03 02:14:16', '2023-10-03 02:14:16'),
(12, 'Hamburger Bò', 50, 'Hamburger Bò', '<p>Hamburger Bò</p>', 40000, NULL, 1, '/storage/uploads/2023/10/03/Hamburgerbonuong.jpg', '2023-10-03 02:16:50', '2023-10-03 02:16:50'),
(13, 'Hamburger Tứ Xuyên', 50, 'Hamburger Tứ Xuyên', '<p>Hamburger Tứ Xuyên</p>', 45000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (1).jpg', '2023-10-03 02:17:37', '2023-10-03 02:17:37'),
(14, 'Hamburger Combo A', 50, 'Hamburger Combo A', '<p>Hamburger Combo A</p>', 50000, 30000, 1, '/storage/uploads/2023/10/05/images.jpg', '2023-10-03 02:18:25', '2023-10-04 22:43:45'),
(15, 'Hamburger Hà Nội', 50, 'Hamburger Hà Nội', '<p>Hamburger Hà Nội</p>', 50000, NULL, 1, '/storage/uploads/2023/10/03/images.jpg', '2023-10-03 02:19:04', '2023-10-03 02:19:04'),
(16, 'Hamburger Trứng', 50, 'Hamburger Trứng', '<p>Hamburger Trứng</p>', 30000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (6).jpg', '2023-10-03 02:19:26', '2023-10-03 02:19:26'),
(17, 'Hamburger NiMo', 50, 'Hamburger NiMo', '<p>Hamburger NiMo</p>', 140000, 120000, 1, '/storage/uploads/2023/10/03/hamburgerchaca.jpg', '2023-10-03 02:21:18', '2023-10-03 02:21:18'),
(18, 'Hamburger MOCO', 50, 'Hamburger MOCO', '<p>Hamburger MOCO</p>', 45000, 40000, 1, '/storage/uploads/2023/10/03/tải xuống (5).jpg', '2023-10-03 02:22:03', '2023-10-03 02:22:03'),
(19, 'Hamburger XSPACE', 50, 'Hamburger XSPACE', '<p>Hamburger XSPACE</p>', 23000, NULL, 1, '/storage/uploads/2023/10/03/images (2).jpg', '2023-10-03 02:22:54', '2023-10-03 02:22:54'),
(20, 'Pizza Hoa Anh Đào', 46, 'Pizza Hoa Anh Đào', '<p>Pizza Hoa Anh Đào</p>', 100000, 80000, 1, '/storage/uploads/2023/10/03/tải xuống (13).jpg', '2023-10-03 02:39:38', '2023-10-03 02:39:38'),
(21, 'Pizza Lá Mai', 46, 'Pizza Lá Mai', '<p>Pizza Lá Mai</p>', 120000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (12).jpg', '2023-10-03 02:40:46', '2023-10-03 02:40:46'),
(22, 'Pizza Hoa Cúc', 46, 'Pizza Hoa Cúc', '<p>Pizza Hoa Cúc</p>', 140000, 130000, 1, '/storage/uploads/2023/10/03/tải xuống (10).jpg', '2023-10-03 02:41:31', '2023-10-03 02:41:31'),
(23, 'Pizza Hoa Cẩm Chướng', 46, 'Pizza Hoa Cẩm Chướng', '<p>Pizza Hoa Cẩm Chướng</p>', 300000, 250000, 1, '/storage/uploads/2023/10/03/tải xuống (9).jpg', '2023-10-03 02:42:34', '2023-10-03 02:42:34'),
(24, 'Pizza Cát Tường', 46, 'Pizza Cát Tường', '<p>Pizza Cát Tường</p>', 250000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (8).jpg', '2023-10-03 02:45:03', '2023-10-03 02:45:03'),
(25, 'Pizza Hải Sản', 45, 'Pizza Hải Sản', '<p>Pizza Hải Sản</p>', 220000, NULL, 1, '/storage/uploads/2023/10/03/images.jpg', '2023-10-03 02:47:46', '2023-10-03 02:47:46'),
(26, 'Pizza Tôm', 45, 'Pizza Tôm', '<p>Pizza Tôm</p>', 240000, NULL, 1, '/storage/uploads/2023/10/03/images (2).jpg', '2023-10-03 02:48:28', '2023-10-03 02:48:28'),
(27, 'Pizza Mực', 45, 'Pizza Mực', '<p>Pizza Mực</p>', 300000, 240000, 1, '/storage/uploads/2023/10/03/images (3).jpg', '2023-10-03 02:55:55', '2023-10-03 02:55:55'),
(28, 'Pizza KING CRAB', 45, 'Pizza KING CRAB', '<p>Pizza KING CRAB</p>', 300000, 230000, 1, '/storage/uploads/2023/10/03/images (5).jpg', '2023-10-03 02:58:18', '2023-10-03 02:58:18'),
(29, 'Pizza SEA', 45, 'Pizza SEA', '<p>Pizza SEA</p>', 480000, 400000, 1, '/storage/uploads/2023/10/03/images (7).jpg', '2023-10-03 02:58:58', '2023-10-03 02:58:58'),
(30, 'Pizza Ô mai', 47, 'Pizza Ô mai', '<p>Pizza Ô mai</p>', 340000, 320000, 1, '/storage/uploads/2023/10/03/images (11).jpg', '2023-10-03 06:41:00', '2023-10-03 06:41:00'),
(31, 'Pizza Gỗ Tùng', 47, 'Pizza Gỗ Tùng', '<p>Pizza Gỗ Tùng</p>', 245000, 230000, 1, '/storage/uploads/2023/10/03/images (10).jpg', '2023-10-03 06:42:02', '2023-10-03 06:43:29'),
(32, 'Pizza MIWALK', 47, 'Pizza MIWALK', '<p>Pizza MIWALK</p>', 350000, 230000, 1, '/storage/uploads/2023/10/03/images (9).jpg', '2023-10-03 06:43:01', '2023-10-03 06:43:01'),
(33, 'Pizza XOCNAU', 47, 'Pizza XOCNAU', '<p>Pizza XOCNAU</p>', 430000, 370000, 1, '/storage/uploads/2023/10/03/tải xuống (1).jpg', '2023-10-03 06:44:30', '2023-10-03 06:44:30'),
(34, 'Pizza MIHOT', 47, 'Pizza MIHOT', '<p>Pizza MIHOT</p>', 230000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống.jpg', '2023-10-03 06:45:00', '2023-10-03 06:45:15'),
(35, 'Pizza Chúa Tuyết', 48, 'Pizza Chúa Tuyết', '<p>Pizza Chúa Tuyết</p>', 600000, 300000, 1, '/storage/uploads/2023/10/03/images (15).jpg', '2023-10-03 06:47:22', '2023-10-03 06:47:22'),
(36, 'Pizza Tuyết Trắng', 48, 'Pizza Tuyết Trắng', '<p>Pizza Tuyết Trắng</p>', 560000, 250000, 1, '/storage/uploads/2023/10/03/images (14).jpg', '2023-10-03 06:48:04', '2023-10-03 06:48:04'),
(37, 'Pizza Hun Khói', 48, 'Pizza Hun Khói', '<p>Pizza Hun Khói</p>', 350000, 300000, 1, '/storage/uploads/2023/10/03/images (13).jpg', '2023-10-03 06:48:50', '2023-10-03 06:48:50'),
(38, 'Pizza Cao Ly', 48, 'Pizza Cao Ly', '<p>Pizza Cao Ly</p>', 600000, 340000, 1, '/storage/uploads/2023/10/03/images (12).jpg', '2023-10-03 06:49:58', '2023-10-03 06:49:58'),
(39, 'Pizza UFI', 48, 'Pizza UFI', '<p>Pizza UFI</p>', 340000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (2).jpg', '2023-10-03 06:51:58', '2023-10-03 06:51:58'),
(40, 'Xúc Xích Chay Nấm Hương', 56, 'Xúc Xích Chay Nấm Hương', '<p>Xúc Xích Chay Nấm Hương</p>', 50000, 45000, 1, '/storage/uploads/2023/10/03/Xuc xich chay.jpg', '2023-10-03 06:55:59', '2023-10-03 06:55:59'),
(41, 'Xúc Xích Chay Hòa Đức', 56, 'Xúc Xích Chay Hòa Đức', '<p>Xúc Xích Chay Hòa Đức</p>', 23000, 20000, 1, '/storage/uploads/2023/10/03/XucXichchay.jpg', '2023-10-03 06:56:39', '2023-10-03 06:56:39'),
(42, 'Xúc Xích SUSU', 57, 'Xúc Xích SUSU', '<p>Xúc Xích SUSU</p>', 23000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (3).jpg', '2023-10-03 06:58:02', '2023-10-03 06:58:02'),
(43, 'Xúc Xích MINI', 57, 'Xúc Xích MINI', '<p>Xúc Xích MINI</p>', 34000, 30000, 1, '/storage/uploads/2023/10/05/tải xuống.jpg', '2023-10-03 06:58:42', '2023-10-05 11:57:09'),
(44, 'Xúc Xích OiShi', 57, 'Xúc Xích OiShi', '<p>Xúc Xích OiShi</p>', 40000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (5).jpg', '2023-10-03 06:59:13', '2023-10-03 06:59:13'),
(45, 'CoCa', 51, 'CoCa', '<p>CoCa</p>', 20000, 15000, 1, '/storage/uploads/2023/10/03/tải xuống (14).jpg', '2023-10-03 07:01:00', '2023-10-07 11:17:28'),
(46, 'Pepsi', 51, 'Pepsi', '<p>Pepsi</p>', 20000, 15000, 1, '/storage/uploads/2023/10/03/tải xuống (15).jpg', '2023-10-03 07:01:50', '2023-10-07 11:17:18'),
(47, 'Trà Sữa Truyền thống', 54, 'Trà Sữa Truyền thống', '<p>Trà Sữa Truyền thống</p>', 24000, NULL, 1, '/storage/uploads/2023/10/03/tải xuống (19).jpg', '2023-10-03 07:02:33', '2023-10-03 07:02:33'),
(48, 'Trà Sữa Khoai Môn', 54, 'Trà Sữa Khoai Môn', '<p>Trà Sữa Khoai Môn</p>', 23000, NULL, 1, '/storage/uploads/2023/10/04/tải xuống (6).jpg', '2023-10-03 07:03:13', '2023-10-04 09:40:07'),
(49, 'Sinh Tố Thanh Long', 52, 'Sinh Tố Thanh Long', '<p>Sinh Tố Thanh Long</p>', 30000, NULL, 1, '/storage/uploads/2023/10/03/images (4).jpg', '2023-10-03 07:03:49', '2023-10-03 07:03:49'),
(50, 'Sinh Tố Bơ', 52, 'Sinh Tố Bơ', '<p>Sinh Tố Bơ</p>', 35000, 30000, 1, '/storage/uploads/2023/10/03/tải xuống (16).jpg', '2023-10-03 07:04:43', '2023-10-04 09:50:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(5, 'Pizza thập cẩm', '#', '/storage/uploads/2023/10/02/pizza-5107039_1280.jpg', 1, 1, '2023-10-02 07:28:12', '2023-10-02 07:28:12'),
(6, 'Xúc xích Nướng', '#', '/storage/uploads/2023/10/02/chế-biến-xúc-xích-1.jpg', 1, 1, '2023-10-02 07:28:36', '2023-10-02 07:28:36'),
(7, 'Hamburger bò', '#', '/storage/uploads/2023/10/02/Hamburger_(black_bg).jpg', 1, 1, '2023-10-02 07:31:04', '2023-10-02 08:01:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property` int NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `property`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost.com', NULL, '$2y$10$hW9zXbQ.mIls24LqPUFbu.SLNl5Pzvfk6QgIlY3Rr9DcDbOVUk9Ju', 1, NULL, NULL, NULL),
(2, 'Nguyễn Thanh Phước', 'phuocnguyen230401@gmail.com', NULL, '$2y$10$hW9zXbQ.mIls24LqPUFbu.SLNl5Pzvfk6QgIlY3Rr9DcDbOVUk9Ju', 2, NULL, '2023-10-16 02:13:38', '2023-10-16 02:13:38'),
(3, 'Nguyễn Thanh Phước', 'phuocnguyen240401@gmail.com', NULL, '$2y$10$o9J/E0jue3GelwUqohJBZOyW7xJn1exeoNT24gXyfVoU/WJCiTlCO', 2, NULL, '2023-10-16 02:22:33', '2023-10-16 02:22:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
