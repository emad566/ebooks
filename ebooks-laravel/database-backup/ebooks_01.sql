-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2021 at 03:33 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebooks`
--

DELIMITER $$
--
-- Functions
--
DROP FUNCTION IF EXISTS `netPrice`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `netPrice` (`Buy_Price` DECIMAL(12,2), `Public_Price` DECIMAL(12,2)) RETURNS DECIMAL(12,2) BEGIN
    DECLARE price DECIMAL(12, 2);
    SET price = ((100 - Buy_Price)/100)*Public_Price;
	RETURN (price);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `dep_id` int(1) NOT NULL,
  `term_id` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_books_dep_id` (`dep_id`),
  KEY `FK_books_term_id` (`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deps`
--

DROP TABLE IF EXISTS `deps`;
CREATE TABLE IF NOT EXISTS `deps` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_id` int(3) NOT NULL,
  `level_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_deps_level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deps`
--

INSERT INTO `deps` (`id`, `dep_name`, `fac_id`, `level_id`) VALUES
(2, 'عام', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facs`
--

DROP TABLE IF EXISTS `facs`;
CREATE TABLE IF NOT EXISTS `facs` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(1) DEFAULT '0',
  `level_num` int(1) DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facs`
--

INSERT INTO `facs` (`id`, `fac_name`, `is_active`, `level_num`) VALUES
(1, 'كلية الحاسبات والمعلومات', 1, 4),
(2, 'كلية العلوم', 1, 4),
(3, 'كلية الهندسة', 1, 4),
(4, 'كلية الطب', 1, 4),
(5, 'كلية الصيدلة', 1, 4),
(6, 'كلية الطب البيطرى', 1, 4),
(7, 'كلية التمريض', 1, 4),
(8, 'كلية التعليم الصناعى', 1, 4),
(9, 'كلية التربية', 1, 4),
(10, 'كلية التجارة', 1, 4),
(11, 'كلية الزراعة', 1, 4),
(12, 'كلية الحقوق', 1, 4),
(13, 'كلية الاثار', 1, 4),
(14, 'كلية الآداب', 1, 4),
(15, 'كلية الألسن', 1, 4),
(16, 'كلية التربية الرياضية', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_name`) VALUES
(1, 'الأولي'),
(2, 'الثانية'),
(3, 'الثالثة'),
(4, 'الرابعة'),
(5, 'الخامسة'),
(6, 'السادسة'),
(7, 'السابعة');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 AVG_ROW_LENGTH=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(32, '2021_01_14_035921_create_categories_table', 1),
(33, '2021_01_14_045312_create_category_translations_table', 1),
(34, '2021_01_15_085008_create_brands_table', 1),
(35, '2021_01_15_085550_create_brand_translations_table', 1),
(36, '2021_01_17_101723_create_sessions_table', 1),
(37, '2021_01_17_170357_create_admins_table', 1),
(38, '2021_01_18_050150_create_admin_translations_table', 1),
(39, '2021_01_18_122139_create_user_translations_table', 1),
(41, '2021_01_19_051524_create_coupons_table', 2),
(42, '2021_01_19_125117_create_newsletters_table', 3),
(55, '2021_01_19_151959_create_products_table', 4),
(56, '2021_01_21_170703_create_product_translations_table', 4),
(61, '2021_01_22_132206_create_posts_table', 5),
(62, '2021_01_22_132226_create_post_translations_table', 5),
(63, '2021_01_23_132400_create_categoryables_table', 6),
(64, '2021_01_27_053642_create_permission_tables', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 21),
(6, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB AVG_ROW_LENGTH=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hagre09@gmail.com', '$2y$10$CeUVslrjIWTTAjLVt7RcueJGKyl4DFYxt9HMJBjn/YPZ6MQtpG.uS', '2021-01-20 06:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SupperAdmin', 'sanctum', '2021-05-14 04:35:01', '2021-05-14 04:36:23'),
(2, 'manageusers', 'sanctum', '2021-05-14 09:34:05', '2021-05-14 09:34:05'),
(35, 'manage_books', 'sanctum', '2021-07-07 12:02:34', '2021-07-07 12:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 AVG_ROW_LENGTH=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'مدير عام', 'sanctum', '2021-05-14 04:27:25', '2021-05-14 04:27:25'),
(6, 'محرر', 'sanctum', '2021-07-07 12:03:14', '2021-07-07 12:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(2, 5),
(35, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB AVG_ROW_LENGTH=816 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XMXwJXs1atjgUeFU5baRqhr5O5kAHGPTZB2ZapQh', 22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Edg/91.0.864.64', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQ3BWbmZsZWRzMk5rQjBxOHY2b2dQUXlkT2xNbmNpb0Rxc3pldlFxNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9lYm9va3MuY29tL2Rhc2hib2FyZC9kZXBzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRxMkc3bkI1SENYWjJwUUFTZHNOdzVlUTV6Mkx1aGx2empSMVJMbDJCNEk1Ukd4NGpHV1NCeSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkcTJHN25CNUhDWFoycFFBU2RzTnc1ZVE1ejJMdWhsdnpqUjFSTGwyQjRJNVJHeDRqR1dTQnkiO30=', 1625671292);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `term_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term_name`) VALUES
(1, 'الأول'),
(2, 'الثاني');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fName` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_id` int(3) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_fac_id` (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 AVG_ROW_LENGTH=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `fName`, `lName`, `fac_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SupperAdmin', '1689241949203794.png', 'SupperAdmin9@marvel.com', 'Emad', 'Abdallah', 1, '2021-01-14 18:36:03', '$2y$10$BTgQyndnPwumJGz1/okt9uvwsYDIMGu19vLIgW9WcCsdf2BCjQ3Oy', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-01-18 13:50:13', '2021-05-14 09:23:37'),
(2, 'admin', NULL, 'admin@marvel.com', 'User', 'Manger', 1, '2021-01-14 18:36:03', '$2y$10$ojQLWEzXKBjlq5q5zLDjr.nyi90IyzkTscln.1WvTv6ivliuMgboK', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-01-20 07:23:09', '2021-07-07 09:47:38'),
(5, 'accountant', NULL, 'accountant@marvel.com', 'Accountant', 'user', 1, '2021-01-14 18:36:03', '$2y$10$YQTfOaLxz2rDQH0fLUgf0uUs9WO.Yi.e2/XOG3Ng0t3JyuN1xTuCi', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-01-27 16:19:57', '2021-07-07 09:47:38'),
(10, 'delegateAssuate', NULL, 'delegateassuate@marvel.com', 'delegate', 'user', 1, '2021-01-14 18:36:03', '$2y$10$7rQUdl7WNBDdAkGzpsE2puPoCJxz/n6/jaND6XNZAFdiHT.w0G77q', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-02-01 17:46:01', '2021-07-07 09:47:38'),
(11, 'keeperAssuate', NULL, 'keeperassuate@marvel.com', 'keeper', 'user', 1, '2021-01-14 18:36:03', '$2y$10$pP.sCpccq6YNb.zZEiKPDOleblNaAukHE0xLfbWYrRXsYVeiVed7C', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-02-01 18:20:09', '2021-07-07 09:47:38'),
(12, 'delegateQena', NULL, 'delegateqena@marvel.com', 'qena', 'Delegate', 1, '2021-01-14 18:36:03', '$2y$10$kEfuglTlRBJOk/Og0I1AUOeim04Ji3NORgI4ZNvYizO.8LnXEFpVO', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 02:13:31', '2021-07-07 09:47:38'),
(13, 'keeperqena', NULL, 'keeperQena@marvel.com', 'keeper', 'Qena', 1, '2021-01-14 18:36:03', '$2y$10$ivki4HZhpV0NsrcR54QVTuhZbtPtm1ClJP/Y7I7dfwjHk2DjDKAz2', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 02:16:36', '2021-07-07 09:47:38'),
(14, 'delegateacceptAssuate', NULL, 'delegateacceptassuate@marvel.com', 'delegateaccept', 'Assuate', 1, '2021-01-14 18:36:03', '$2y$10$.oapmpmRGLDs7hVrcEX26.6QWqQZbgCv0VwX5roqM1Hikk5CXRXJa', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 02:53:11', '2021-07-07 09:47:38'),
(15, 'delegatewaitassuate', NULL, 'delegatewaitassuate@marvel.com', 'delegate', 'wait Assuate', 1, '2021-01-14 18:36:03', '$2y$10$yWz3vFaLoc.1bq04gh2M8eufAbBptmfF8CAws48lbe30/I/qgbtt.', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 02:57:41', '2021-07-07 09:47:38'),
(16, 'delegateAcceptqena', NULL, 'delegateAcceptqena@marvel.com', 'delegateAccept', 'qena', 1, '2021-01-14 18:36:03', '$2y$10$Ei6PeLXPvdXTjMj7iMgB8.CpxuePaliqHcHvbITCRXiNjS9GvO4ay', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 02:59:38', '2021-07-07 09:47:38'),
(17, 'delegatewaitqena', NULL, 'delegatewaitqena@marvel.com', 'delegatewait', 'qena', 1, '2021-01-14 18:36:03', '$2y$10$Bn2csg65Pg3D4oBFlrMDDeBDKsGv1hKIquO0stETw3ZFtRd6JTN62', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 03:00:32', '2021-07-07 09:47:38'),
(18, 'delegatetestvoucher', NULL, 'delegatetestvoucher@marvel.com', 'delegatetest', 'voucher', 1, '2021-01-14 18:36:03', '$2y$10$0lpqjQHS28aDPVvP0sfUm.q/tJlxsLWObDCE.ZrsB8GnGL7eBUXR.', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 09:47:38', '2021-05-16 11:54:44', '2021-07-07 09:47:38'),
(21, 'edu222', NULL, 'edu@test.com', 'edu', 'edu2', 2, NULL, '$2y$10$0nM..teYTmYiDg54l73PYeSWCG7q.yUDcNl6JfMnAczvLuRx2Rcvi', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-07-07 09:51:56', '2021-07-07 09:51:56'),
(22, 'Fci', NULL, 'fci@gmail.com', 'fci', 'fci', 1, NULL, '$2y$10$q2G7nB5HCXZ2pQASdsNw5eQ5z2LuhlvzjR1RLl2B4I5RGx4jGWSBy', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-07-07 11:50:50', '2021-07-07 11:50:50');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_books`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_books`;
CREATE TABLE IF NOT EXISTS `view_books` (
`id` int(11)
,`book_title` varchar(191)
,`teacher_name` varchar(191)
,`book_path` varchar(191)
,`download_count` varchar(191)
,`dep_id` int(1)
,`term_id` int(1)
,`fac_id` int(3)
,`level_id` int(1)
);

-- --------------------------------------------------------

--
-- Structure for view `view_books`
--
DROP TABLE IF EXISTS `view_books`;

DROP VIEW IF EXISTS `view_books`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_books`  AS  select `books`.`id` AS `id`,`books`.`book_title` AS `book_title`,`books`.`teacher_name` AS `teacher_name`,`books`.`book_path` AS `book_path`,`books`.`download_count` AS `download_count`,`books`.`dep_id` AS `dep_id`,`books`.`term_id` AS `term_id`,`deps`.`fac_id` AS `fac_id`,`deps`.`level_id` AS `level_id` from (`books` join `deps` on((`deps`.`id` = `books`.`dep_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_books_dep_id` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_books_term_id` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deps`
--
ALTER TABLE `deps`
  ADD CONSTRAINT `FK_deps_id` FOREIGN KEY (`id`) REFERENCES `facs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_deps_level_id` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_fac_id` FOREIGN KEY (`fac_id`) REFERENCES `facs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
