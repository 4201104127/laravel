-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 07, 2019 lúc 10:05 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel56`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, NULL, 1, '$2y$10$IOUzBq9Rqwr6sK7GR1spMuhWG7M9hRjXDf6I5TjZcnEgI5wkNY1Iy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` longtext COLLATE utf8mb4_unicode_ci,
  `a_active` tinyint(4) NOT NULL DEFAULT '1',
  `a_author_id` int(11) NOT NULL DEFAULT '0',
  `a_description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `a_hot` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `a_name`, `a_slug`, `a_description`, `a_content`, `a_active`, `a_author_id`, `a_description_seo`, `a_title_seo`, `a_avatar`, `a_view`, `created_at`, `updated_at`, `a_hot`) VALUES
(1, 'News zing', 'news-zing', 'zing me content dess', 'zing me', 1, 0, 'zing', 'New', '2019-06-23__1862058-constructionsite-942146.jpg', '0', '2019-06-23 13:48:23', '2019-07-31 05:47:25', 1),
(2, 'Bài viết mới', 'bai-viet-moi', 'No cmt', 'a', 1, 0, 'No cmt', 'Bài viết mới', '2019-06-23__18948.jpg', '0', '2019-06-23 14:05:16', '2019-07-31 05:56:29', 0),
(3, 'Hell', 'hell', 'a', 'a', 0, 0, 'a', 'Hell', '2019-06-23__beautiful-blur-bright-326055.jpg', '0', '2019-06-23 14:06:58', '2019-07-31 05:56:49', 1),
(4, 'No name', 'no-name', 'zz', 'a', 1, 0, 'zz', 'No name', '2019-06-23__448.jpg', '0', '2019-06-23 14:07:44', '2019-07-21 09:05:41', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_icon` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_active` tinyint(4) NOT NULL DEFAULT '1',
  `c_total_product` int(11) NOT NULL DEFAULT '0',
  `c_title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `c_home` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_slug`, `c_icon`, `c_avatar`, `c_active`, `c_total_product`, `c_title_seo`, `c_description_seo`, `c_keyword_seo`, `created_at`, `updated_at`, `c_home`) VALUES
(1, 'Samsung', 'samsung', 'fa-mobile', NULL, 1, 0, 'Title seo', 'Description', NULL, '2019-06-22 16:03:28', '2019-07-16 11:00:50', 1),
(2, 'Apple', 'apple', 'fa-mobile', NULL, 1, 0, 'Title seo', 'Description', NULL, '2019-06-22 16:03:52', '2019-07-16 11:00:56', 1),
(3, 'Sony', 'sony', 'fa-mobile', NULL, 1, 0, 'Title seo', 'Description', NULL, '2019-06-22 16:04:26', '2019-07-16 20:07:49', 1),
(4, 'LG', 'lg', 'fa-mobile', NULL, 0, 0, 'Title seo S', 'Description', NULL, '2019-06-22 16:05:09', '2019-07-16 11:05:14', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `co_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `co_name`, `co_email`, `co_title`, `co_content`, `co_phone`, `co_status`, `created_at`, `updated_at`) VALUES
(1, 'Phan Đình Quyền', 'yami@gmail.com', 'Loi', 'OK', '0964987150', 0, '2019-06-26 14:19:11', '2019-06-26 14:19:11'),
(2, 'Phan Đình Quyền', 'yami@gmail.com', 'Lỗi mua hàng', 'Không nhận', '0964987150', 0, '2019-06-26 14:20:31', '2019-06-26 14:20:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_05_26_135602_create_categories_table', 1),
(21, '2019_05_31_134743_create_products_table', 1),
(22, '2019_06_02_123912_alter_column_p_content_and_p_title_seo_in_table_products', 1),
(23, '2019_06_10_112029_create_article_table', 1),
(24, '2019_06_26_135354_create_contacts_table', 2),
(25, '2019_06_27_124600_create_transactions_table', 3),
(26, '2019_06_27_124625_create_orders_table', 3),
(27, '2019_06_28_005523_alter_column_p_pay_in_table_products', 4),
(28, '2019_07_06_081907_create_ratings_table', 5),
(29, '2019_07_06_082354_alter_column_rating_in_table_products', 5),
(30, '2019_07_10_100138_alter_column_total_pay_in_users', 6),
(31, '2019_07_15_181451_create_page_statics_table', 7),
(32, '2019_07_16_174144_alter_column_c_home_in_categories', 8),
(33, '2019_07_19_160949_create_admins_table', 9),
(34, '2019_07_21_150957_alter_column_a_hot_in_articles', 10),
(35, '2019_07_31_160615_alter_column_code_and_time_code_in_users', 11),
(36, '2019_08_02_003429_alter_column_code_active_in_users', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `or_transaction_id` int(11) NOT NULL DEFAULT '0',
  `or_product_id` int(11) NOT NULL DEFAULT '0',
  `or_qty` tinyint(4) NOT NULL DEFAULT '0',
  `or_price` int(11) NOT NULL DEFAULT '0',
  `or_sale` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `or_transaction_id`, `or_product_id`, `or_qty`, `or_price`, `or_sale`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 16000000, 1, NULL, NULL),
(2, 1, 2, 1, 20000000, 0, NULL, NULL),
(3, 2, 2, 1, 20000000, 0, NULL, NULL),
(4, 3, 4, 1, 7800000, 1, '2019-06-28 00:23:57', '2019-06-28 00:23:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_statics`
--

CREATE TABLE `page_statics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ps_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ps_type` tinyint(4) NOT NULL DEFAULT '1',
  `ps_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_statics`
--

INSERT INTO `page_statics` (`id`, `ps_name`, `ps_type`, `ps_content`, `created_at`, `updated_at`) VALUES
(1, 'Về chúng tôi', 1, '<p>Content</p>', '2019-07-16 06:04:19', '2019-07-16 06:04:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_category_id` int(11) NOT NULL DEFAULT '0',
  `p_price` int(11) NOT NULL DEFAULT '0',
  `p_author_id` int(11) NOT NULL DEFAULT '0',
  `p_sale` tinyint(4) NOT NULL DEFAULT '0',
  `p_active` tinyint(4) NOT NULL DEFAULT '1',
  `p_hot` tinyint(4) NOT NULL DEFAULT '0',
  `p_view` int(11) NOT NULL DEFAULT '0',
  `p_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `p_title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_content` longtext COLLATE utf8mb4_unicode_ci,
  `p_pay` tinyint(4) NOT NULL DEFAULT '0',
  `p_number` smallint(6) NOT NULL DEFAULT '0',
  `p_total_rating` int(11) NOT NULL DEFAULT '0',
  `p_total_number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_slug`, `p_category_id`, `p_price`, `p_author_id`, `p_sale`, `p_active`, `p_hot`, `p_view`, `p_description`, `p_avatar`, `p_description_seo`, `p_keyword_seo`, `created_at`, `updated_at`, `p_title_seo`, `p_content`, `p_pay`, `p_number`, `p_total_rating`, `p_total_number`) VALUES
(1, 'Samsung Galaxy S10+ (512GB)', 'samsung-galaxy-s10-512gb', 1, 24000000, 0, 0, 1, 1, 0, 'Samsung Galaxy S10+ (512GB) - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.', '2019-06-22__samsung-galaxy-s10-den-400x400.jpg', 'Description', NULL, '2019-06-22 16:09:47', '2019-07-30 14:08:52', 'Title', '<p>Samsung Galaxy S10+ (512GB) đi theo kiểu thiết kế m&agrave;n h&igrave;nh Infinity-O với phần camera được đặt ph&iacute;a trong m&agrave;n h&igrave;nh rất độc đ&aacute;o.</p>', 0, 3, 1, 4),
(2, 'Sony Xperia XZ2 (H8296) 64GB', 'sony-xperia-xz2-h8296-64gb', 3, 20000000, 0, 0, 1, 1, 0, 'Thiết kế đột phá', '2019-06-22__sony-xz2.jpg', 'Description', NULL, '2019-06-22 16:13:11', '2019-07-13 09:13:31', 'TitleOk', '<p>Với thiết kế mặt lưng cong, Điện Thoại Sony Xperia XZ2 (H8296) 64GB - Bản Quốc Tế - Hồng gi&uacute;p người d&ugrave;ng c&oacute; thể dễ d&agrave;ng cầm nắm chiếc điện thoại trong tay đầy chắc chắc hơn, &ocirc;m tay hơn, vừa kh&iacute;t với l&ograve;ng b&agrave;n tay của m&igrave;nh.</p>', 3, 3, 2, 5),
(3, 'Samsung Galaxy S10 (128GB/8GB)', 'samsung-galaxy-s10-128gb8gb', 1, 16000000, 0, 0, 1, 1, 0, 'Điện Thoại Samsung Galaxy S10 (128GB/8GB) - Hàng Chính Hãng', '2019-06-24__ssnote10.jpg', 'Description', NULL, '2019-06-23 21:12:28', '2019-07-30 14:08:32', 'Title', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>', 2, 0, 1, 4),
(4, 'Samsung Galaxy A70 (128GB/6GB)', 'samsung-galaxy-a70-128gb6gb', 1, 7800000, 0, 0, 1, 1, 0, 'Điện Thoại Samsung Galaxy A70 (128GB/6GB) - Hàng Chính Hãng', '2019-06-24__ssa70.jpg', 'Description', NULL, '2019-06-23 23:34:35', '2019-07-30 14:08:18', 'Title', '<p><strong>Điện Thoại Samsung Galaxy A70 (128GB/6GB) - H&agrave;ng Ch&iacute;nh H&atilde;ng</strong>&nbsp;được Samsung đồng bộ h&oacute;a thiết kế tương tự như những người anh em Samsung A50 của m&igrave;nh với ngoại h&igrave;nh &ldquo;giọt nước&rdquo; c&ugrave;ng viền mỏng ở mặt trước nhường chỗ cho kh&ocirc;ng gian hiển thị của m&agrave;n h&igrave;nh được rộng r&atilde;i nhất.</p>', 3, 5, 0, 0),
(5, 'iPhone Xs Max 512GB', 'iphone-xs-max-512gb', 2, 2900000, 0, 0, 0, 1, 0, 'Đặc điểm nổi bật của iPhone Xs Max 512GB', '2019-06-24__ipxs.jpg', 'Description', NULL, '2019-06-24 00:57:05', '2019-07-30 14:08:05', 'Title', '<h2>L&agrave; chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;cao cấp nhất của Apple với mức gi&aacute; khủng chưa từng c&oacute;, bộ nhớ trong l&ecirc;n tới 512GB,&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-xs-max-512gb\" target=\"_blank\">iPhone XS Max 512GB</a>&nbsp;- sở hữu c&aacute;i t&ecirc;n kh&aacute;c biệt so với c&aacute;c thế hệ trước, trang bị tới 6.5 inch đầu ti&ecirc;n của h&atilde;ng c&ugrave;ng c&aacute;c thiết kế cao cấp hiện đại từ chip A12 cho tới camera AI.</h2>', 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ra_product_id` int(11) NOT NULL DEFAULT '0',
  `ra_number` tinyint(4) NOT NULL DEFAULT '0',
  `ra_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ra_user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `ra_product_id`, `ra_number`, `ra_content`, `ra_user_id`, `created_at`, `updated_at`) VALUES
(11, 2, 2, 'Ổn', 1, '2019-07-13 09:11:39', '2019-07-13 09:11:39'),
(12, 2, 3, 'O', 2, '2019-07-13 09:13:31', '2019-07-13 09:13:31'),
(13, 1, 4, 'Ok', 2, '2019-07-16 09:53:41', '2019-07-16 09:53:41'),
(14, 3, 4, 'ok', 2, '2019-07-26 21:41:32', '2019-07-26 21:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tr_user_id` int(11) NOT NULL DEFAULT '0',
  `tr_total` int(11) NOT NULL DEFAULT '0',
  `tr_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `tr_user_id`, `tr_total`, `tr_note`, `tr_address`, `tr_phone`, `tr_status`, `created_at`, `updated_at`) VALUES
(2, 1, 20000000, NULL, 'oko', '0964984150', 1, '2019-06-28 00:22:49', '2019-07-10 03:41:12'),
(3, 2, 7722000, NULL, 'aaaaa', '0964984150', 1, '2019-06-28 00:23:56', '2019-07-10 03:09:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_pay` int(11) NOT NULL DEFAULT '0',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `code_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `password`, `remember_token`, `created_at`, `updated_at`, `total_pay`, `code`, `time_code`, `code_active`, `time_active`) VALUES
(1, 'Phan Đình Quyền', 'yamieternal1731997@gmail.com', '0964984150', NULL, 1, '$2y$10$oiMPPBZyMQg3STdbGC/mdu9H1sEw8v7amoOZEZLfFivKIwJu45GSK', NULL, '2019-06-24 15:34:32', '2019-08-01 17:04:07', 6, 'bd71ccb34e481eef50a1979c21e90fdb', '2019-08-01 17:02:11', NULL, NULL),
(2, 'Rykyu Yami', 'yami.eternal@yahoo.com', '0964984150', NULL, 1, '$2y$10$kFalB/DzxXSAkvQBaZNrUuzE2ulFusRBOeVmwGcIpo8BZXbPjoy1m', NULL, '2019-07-13 09:13:09', '2019-07-31 17:25:42', 0, '$2y$10$BU2PGNgvtaqEy6wY79o/F.2SApoXvYaN35Z15sQVDkT3PLvy9tM2O', '2019-07-31 17:25:42', NULL, NULL),
(3, 'Dinh Quyen', 'phandinhquyen1731997@gmail.com', '090909', NULL, 1, '$2y$10$O7eqaTrgpxUZt81RiDQUruyIAaY8KbBitDHOO2s2pmkFO92DFAPba', NULL, '2019-08-01 18:00:33', '2019-08-01 18:44:41', 0, NULL, NULL, '$2y$10$3OmnmaulTLxoHWIPH1z9cuQ3LsUExaKIMruvV1DlQRrfQv8p0i1Oi', '2019-08-01 18:00:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_active_index` (`active`);

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_a_name_unique` (`a_name`),
  ADD KEY `articles_a_slug_index` (`a_slug`),
  ADD KEY `articles_a_active_index` (`a_active`),
  ADD KEY `articles_a_author_id_index` (`a_author_id`),
  ADD KEY `articles_a_hot_index` (`a_hot`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_c_name_unique` (`c_name`),
  ADD KEY `categories_c_slug_index` (`c_slug`),
  ADD KEY `categories_c_active_index` (`c_active`),
  ADD KEY `categories_c_home_index` (`c_home`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_or_transaction_id_index` (`or_transaction_id`),
  ADD KEY `orders_or_product_id_index` (`or_product_id`);

--
-- Chỉ mục cho bảng `page_statics`
--
ALTER TABLE `page_statics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_statics_ps_type_index` (`ps_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_p_slug_index` (`p_slug`),
  ADD KEY `products_p_category_id_index` (`p_category_id`),
  ADD KEY `products_p_author_id_index` (`p_author_id`),
  ADD KEY `products_p_active_index` (`p_active`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ra_product_id_index` (`ra_product_id`),
  ADD KEY `ratings_ra_user_id_index` (`ra_user_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_tr_user_id_index` (`tr_user_id`),
  ADD KEY `transactions_tr_status_index` (`tr_status`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_active_index` (`active`),
  ADD KEY `users_code_index` (`code`),
  ADD KEY `users_code_active_index` (`code_active`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `page_statics`
--
ALTER TABLE `page_statics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
