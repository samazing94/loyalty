-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 08:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loyaltydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `id` int(10) NOT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`id`, `mobile_number`, `first_name`, `last_name`, `dob`, `profession`, `location`, `created_at`, `updated_at`) VALUES
(2, '017234021', 'Sam', 'Hossain', '0507', 'Student', 'Gulshan', '2018-06-27 07:02:57', '2018-06-27 07:02:57'),
(3, '01234234', 'Sam', 'Hossain', '0507', 'Student', 'Gulshan', '2018-06-27 07:06:18', '2018-06-27 07:06:18'),
(4, '7374123', 'Sam', 'Hossain', '0507', 'Student', 'Gulshan', '2018-06-27 07:10:06', '2018-06-27 07:10:06'),
(5, '12356353', 'Sam', 'Hossain', '0507', 'Student', 'Gulshan', '2018-06-27 07:32:16', '2018-06-27 07:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `id` int(10) NOT NULL,
  `customer_group` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `customer_group`, `created_at`, `updated`) VALUES
(1, 'Platinum', '2017-04-25 08:30:32', '2017-04-25 08:31:30'),
(2, 'Silver', '2017-04-25 08:30:32', '2017-04-25 08:31:32'),
(3, 'Gold', '2017-04-25 08:31:47', '2017-04-25 08:31:47'),
(4, 'Bronze', '2017-04-25 08:31:59', '2017-04-25 08:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `merchants_user`
--

CREATE TABLE `merchants_user` (
  `merchantsId` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants_user`
--

INSERT INTO `merchants_user` (`merchantsId`, `userId`) VALUES
(2, 18),
(2, 19),
(2, 46),
(7, 50),
(5, 50),
(3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_info`
--

CREATE TABLE `merchant_info` (
  `id` int(10) NOT NULL,
  `merchant_name` varchar(255) DEFAULT NULL,
  `merchant_phone` varchar(255) DEFAULT NULL,
  `merchant_email` varchar(255) DEFAULT NULL,
  `merchant_status` int(10) DEFAULT '1',
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_info`
--

INSERT INTO `merchant_info` (`id`, `merchant_name`, `merchant_phone`, `merchant_email`, `merchant_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'www', NULL, NULL, 1, 3, 3, '2017-04-24 04:31:39', '2017-04-24 04:31:39'),
(2, 'wwww', NULL, NULL, 1, 3, 3, '2017-04-24 05:10:20', '2017-04-24 05:10:20'),
(3, 'wwww3333wwwwwd', '', '', 1, 3, 3, '2017-04-24 05:11:20', '2017-05-24 10:33:38'),
(4, 'EDDDDDDDDDDDDDDD', NULL, NULL, 1, 3, 3, '2017-04-24 21:52:58', '2017-04-24 21:52:58'),
(5, '3333333333', '', '', 1, 3, 3, '2017-04-24 21:54:36', '2017-05-24 10:33:28'),
(6, 'wwww', NULL, NULL, 1, 3, 3, '2017-04-24 21:55:43', '2017-04-24 21:55:43'),
(7, 'KFC', NULL, NULL, 1, 3, 3, '2017-04-29 22:45:59', '2017-04-29 22:45:59'),
(8, 'wwwwss', '111', '111', 1, 3, 3, '2017-05-11 05:42:30', '2017-05-11 05:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_shop`
--

CREATE TABLE `merchant_shop` (
  `merchant_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_shop`
--

INSERT INTO `merchant_shop` (`merchant_id`, `shop_id`) VALUES
(5, 22),
(5, 23),
(5, 24),
(3, 25),
(4, 27),
(4, 1),
(7, 28);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_01_083544_create_user_types_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_28_091119_create_countries_table', 1),
('2016_06_28_091248_create_states_table', 1),
('2016_06_28_091433_create_cities_table', 1),
('2016_06_28_091517_create_zones_table', 1),
('2016_06_28_091518_create_users_table', 1),
('2016_07_10_082005_create_settings_table', 1),
('2016_07_10_100026_create_vehicle_types_table', 1),
('2016_07_10_100252_create_vehicles_table', 1),
('2016_07_10_101645_create_drivers_table', 1),
('2016_07_10_102216_create_driver_vehicle_table', 1),
('2016_07_10_103902_create_merchants_table', 1),
('2016_07_10_104641_create_store_types_table', 1),
('2016_07_10_104906_create_stores_table', 1),
('2016_07_10_105329_create_pickup_locations_table', 1),
('2016_07_10_112440_create_hubs_table', 1),
('2016_07_10_113032_create_package_types_table', 1),
('2016_07_10_113217_create_picking_time_slots', 1),
('2016_07_10_114152_create_product_categories_table', 1),
('2016_07_11_042631_create_suborders_table', 1),
('2016_07_11_050316_product_histories_table', 1),
('2016_07_11_073032_create_invoices_table', 1),
('2016_07_11_081359_create_trips_table', 1),
('2016_07_11_082039_create_suborder_trip_table', 1),
('2016_07_25_060934_add_column_to_merchants_table', 2),
('2016_07_25_063124_add_column_to_cities_table', 2),
('2016_07_25_064119_add_column_to_orders_table', 2),
('2016_07_25_065222_create_city_genres_table', 2),
('2016_07_25_090030_create_charge_models_table', 2),
('2016_07_25_090342_create_charges_table', 2),
('2016_07_26_113104_create_zone_genres_table', 3),
('2016_07_26_113342_add_column_to_zones_table', 4),
('2016_07_26_115343_change_column_name_of_charges_table', 5),
('2016_07_26_115702_drop_column_on_cities_table', 5),
('2016_08_17_054622_entrust_setup_tables', 6),
('2016_07_10_114415_create_orders_table', 7),
('2016_07_11_043814_create_order_product_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('superadmin@logistics.com', 'f1b9dd9919939e9fad64b132d942cd45fc16cb7c86a1f76c997d669a001f3809', '2016-12-26 03:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-merchant', 'Create Merchant', NULL, NULL, NULL),
(2, 'edit-merchant', 'Edit Merchant', NULL, NULL, NULL),
(3, 'view-merchant', 'View Merchant', NULL, NULL, NULL),
(4, 'create-store', 'Create Store', NULL, NULL, NULL),
(5, 'edit-store', 'Edit Store', NULL, NULL, NULL),
(6, 'view-store', 'View Store', NULL, NULL, NULL),
(7, 'vehicle', 'Vehicle', NULL, NULL, NULL),
(8, 'vehicle-type', 'Vehicle Type', NULL, NULL, NULL),
(9, 'driver', 'Driver', NULL, NULL, NULL),
(10, 'create-user', 'Create User', NULL, NULL, NULL),
(11, 'edit-user', 'Edit User', NULL, NULL, NULL),
(12, 'view-user', 'View User', NULL, NULL, NULL),
(13, 'location', 'Location', NULL, NULL, NULL),
(14, 'create-charge', 'Create Charge', NULL, NULL, NULL),
(15, 'edit-charge', 'Edit Charge', NULL, NULL, NULL),
(16, 'view-charge', 'View Charge', NULL, NULL, NULL),
(17, 'company', 'Company', NULL, NULL, NULL),
(19, 'create-permission', 'Create Permission', NULL, '2016-08-18 02:37:06', '2016-08-18 02:37:06'),
(20, 'view-permission', 'View Permission', NULL, '2016-08-18 02:37:54', '2016-08-18 02:37:54'),
(21, 'edit-permission', 'Edit Permission', NULL, '2016-08-18 02:38:26', '2016-08-18 02:38:26'),
(22, 'create-role', 'Create Role', NULL, '2016-08-18 02:38:59', '2016-08-18 02:38:59'),
(23, 'view-role', 'View Role', NULL, '2016-08-18 02:39:30', '2016-08-18 02:39:30'),
(24, 'edit-role', 'Edit Role', NULL, '2016-08-18 02:39:51', '2016-08-18 02:39:51'),
(25, 'create-warehouse', 'Create Warehouse', NULL, '2016-08-21 03:07:35', '2016-08-21 03:07:35'),
(26, 'view-warehouse', 'View Warehouse', NULL, '2016-08-21 03:16:08', '2016-08-21 03:16:08'),
(27, 'edit-warehouse', 'Edit Warehouse', NULL, '2016-08-21 03:16:36', '2016-08-21 03:16:36'),
(28, 'create-hub', 'Create Hub', NULL, '2016-08-30 23:49:11', '2016-08-30 23:49:11'),
(29, 'view-hub', 'View Hub', NULL, '2016-08-30 23:49:38', '2016-08-30 23:49:38'),
(30, 'edit-hub', 'Edit Hub', NULL, '2016-08-30 23:49:59', '2016-08-30 23:49:59'),
(31, 'user-list', 'User List', NULL, '2016-09-24 22:39:34', '2016-09-24 22:39:34'),
(32, 'store-list', 'Store List', NULL, '2016-09-24 22:40:16', '2016-09-24 22:40:16'),
(33, 'create-product-category', 'Create Product Category', NULL, '2016-10-16 05:57:23', '2016-10-16 05:57:23'),
(34, 'edit-product-category', 'Edit Product Category', NULL, '2016-10-16 05:58:04', '2016-10-16 05:58:04'),
(35, 'view-product-category', 'View Product Category', NULL, '2016-10-16 05:58:28', '2016-10-16 05:58:28'),
(36, 'view-shelf', 'View Shelf', NULL, '2016-11-01 21:03:23', '2016-11-01 21:03:23'),
(37, 'create-shelf', 'Create Shelf', NULL, '2016-11-01 21:09:56', '2016-11-01 21:09:56'),
(38, 'edit-shelf', 'Edit Shelf', NULL, '2016-11-01 21:13:36', '2016-11-01 21:13:36'),
(39, 'view-rack', 'View Rack', NULL, '2016-11-01 22:24:42', '2016-11-01 22:24:42'),
(40, 'create-rack', 'Create Rack', NULL, '2016-11-01 22:33:54', '2016-11-01 22:33:54'),
(41, 'edit-rack', 'Edit Rack', NULL, '2016-11-01 22:55:19', '2016-11-01 22:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `point_rule`
--

CREATE TABLE `point_rule` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `min_amount` int(10) DEFAULT NULL,
  `point` int(10) DEFAULT NULL,
  `offer_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `merchant_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point_rule`
--

INSERT INTO `point_rule` (`id`, `name`, `description`, `min_amount`, `point`, `offer_start`, `offer_end`, `merchant_id`, `created_at`, `updated_at`) VALUES
(1, 'LoyalPow', 'Point Season All You Can eat Buffet', 300, 5, '2018-06-27 12:36:01', '2018-07-04 18:00:00', 1, '2018-06-27 07:43:06', '2018-06-27 07:43:06'),
(3, 'Buffet Fiesta', 'abc', 100, 1, '2018-06-27 10:14:46', '2018-07-18 18:00:00', 1, '2018-06-27 09:28:44', '2018-06-27 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Super Administrator', NULL, NULL, NULL),
(2, 'administrator', 'Administrator', NULL, NULL, NULL),
(3, 'Merchantsdministrator', 'Merchants Administrator', NULL, NULL, NULL),
(4, 'shopmanager', 'Shop Manager', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_info`
--

CREATE TABLE `shop_info` (
  `id` int(10) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_code` varchar(100) NOT NULL,
  `shop_manager_name` varchar(255) NOT NULL,
  `shop_contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `status` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_info`
--

INSERT INTO `shop_info` (`id`, `shop_name`, `shop_code`, `shop_manager_name`, `shop_contact`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Umai', 'UM', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:30:15', '2018-06-27 07:07:32'),
(2, 'Pizza Hut', 'PH', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:30:30', '2018-06-27 07:07:47'),
(3, 'Sushi Samurai', 'SS', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:41:26', '2018-06-27 07:08:05'),
(4, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:42:09', '2017-04-25 04:42:09'),
(5, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:43:42', '2017-04-25 04:43:42'),
(6, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:43:55', '2017-04-25 04:43:55'),
(7, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:45:20', '2017-04-25 04:45:20'),
(8, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:48:13', '2017-04-25 04:48:13'),
(9, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:49:00', '2017-04-25 04:49:00'),
(10, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:49:38', '2017-04-25 04:49:38'),
(11, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:50:03', '2017-04-25 04:50:03'),
(12, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:50:29', '2017-04-25 04:50:29'),
(13, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:51:28', '2017-04-25 04:51:28'),
(14, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:52:37', '2017-04-25 04:52:37'),
(15, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 05:42:51', '2017-04-25 05:42:51'),
(16, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 05:45:56', '2017-04-25 05:45:56'),
(17, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 05:53:17', '2017-04-25 05:53:17'),
(18, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 05:55:14', '2017-04-25 05:55:14'),
(19, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:08:33', '2017-04-25 06:08:33'),
(20, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:09:16', '2017-04-25 06:09:16'),
(21, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:10:04', '2017-04-25 06:10:04'),
(22, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:12:06', '2017-04-25 06:12:06'),
(23, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:13:20', '2017-04-25 06:13:20'),
(24, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:14:18', '2017-04-25 06:14:18'),
(25, '2', '2', '2', '2', '2', 0, 0, 0, '2017-04-26 01:58:20', '2017-04-26 01:58:20'),
(26, 'www', 'ww', 'ww', 'ww', 'ww', 0, 0, 0, '2017-04-26 02:30:12', '2017-04-26 02:30:12'),
(27, '22', '22', '22', '22', '22', 0, 0, 0, '2017-04-26 02:31:30', '2017-04-26 02:31:30'),
(28, 'KFC Dhanmodi ', '01', 'Shanto', '01756433611', '93 B New Eskat', 0, 0, 0, '2017-04-29 22:51:22', '2017-04-29 22:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `shop_redeemed`
--

CREATE TABLE `shop_redeemed` (
  `id` int(11) NOT NULL,
  `point_rule_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `customerinfo_id` int(10) DEFAULT NULL,
  `total_amount` double(15,8) DEFAULT '0.00000000',
  `point` double(15,8) DEFAULT '0.00000000',
  `updated_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_user`
--

CREATE TABLE `shop_user` (
  `shop_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_user`
--

INSERT INTO `shop_user` (`shop_id`, `user_id`) VALUES
(23, 47),
(24, 47),
(25, 47),
(27, 47),
(1, 47),
(28, 47);

-- --------------------------------------------------------

--
-- Table structure for table `smslog`
--

CREATE TABLE `smslog` (
  `id` int(10) NOT NULL,
  `hotkey` varchar(100) NOT NULL,
  `msisdn` varchar(50) NOT NULL,
  `sms_body` varchar(250) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reply_body` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smslog`
--

INSERT INTO `smslog` (`id`, `hotkey`, `msisdn`, `sms_body`, `status`, `reply_body`, `created_at`, `updated_at`) VALUES
(4, 'RST', '017234021', 'Array', '1', 'Thank you for registering, you got 100 points!', '2018-06-27 07:02:57', '2018-06-27 07:02:57'),
(5, 'RST', '017234021', 'Array', '0', 'This number is already registered', '2018-06-27 07:04:51', '2018-06-27 07:04:51'),
(6, 'RST', '01234234', 'Array', '0', 'Subhotkey is incorrect, please try again', '2018-06-27 07:06:07', '2018-06-27 07:06:07'),
(7, 'RST', '01234234', 'Array', '1', 'Thank you for registering, you got 100 points!', '2018-06-27 07:06:18', '2018-06-27 07:06:18'),
(8, 'RST', '01234234', 'Array', '0', 'This number is already registered', '2018-06-27 07:09:51', '2018-06-27 07:09:51'),
(9, 'RST', '01234234', 'Array', '0', 'This number is already registered', '2018-06-27 07:09:59', '2018-06-27 07:09:59'),
(10, 'RST', '01234234', 'Array', '0', 'This number is already registered', '2018-06-27 07:10:00', '2018-06-27 07:10:00'),
(11, 'RST', '7374123', 'Array', '1', 'Thank you for registering, you got 100 points!', '2018-06-27 07:10:06', '2018-06-27 07:10:06'),
(12, 'RST', '12356353', 'Array', '0', 'Subhotkey is incorrect, please try again', '2018-06-27 07:10:18', '2018-06-27 07:10:18'),
(13, 'RST', '12356353', 'RST LOL Sam Hossain 0507 Student Gulshan', '0', 'Restaurant doesn\'t exist, please type the right Restaurant Code', '2018-06-27 07:31:13', '2018-06-27 07:31:13'),
(14, 'RST', '12356353', 'RST LOL Sam Hossain 0507 Student Gulshan', '0', 'Restaurant doesn\'t exist, please type the right Restaurant Code', '2018-06-27 07:31:27', '2018-06-27 07:31:27'),
(15, 'RST', '12356353', 'RST UM Sam Hossain 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-06-27 07:32:16', '2018-06-27 07:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_token`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '123456', 'eioruwe#@Jidaj', 1, 0, 3, NULL, NULL, NULL),
(3, 'Suman', 'admin@gmail.com', '$2y$10$zA5CfuODjUGXJs3sd2zdNO6iqlYNOqDx1e.9rG5iMbFFU794YO7/6', '7d4a38c1e2fa6a1f3b8d59656d64f26a6e07d030b51eab3f94565b01c347', 1, NULL, NULL, 'N8nc0M3cv4ZVH8arGGfy6rchI12i71lPhXag9rqi7SvQ7YcZCXteyFuN1FOo', NULL, '2017-06-04 06:52:14'),
(5, 'Admin', 'admin1@email.com', '$2y$10$8eD96oFcuFc.nHLmCm3sheDNpvcGp27e.xX/yOelNajoW2.7dgdXO', 'QwsrEgasjh124F', 1, NULL, NULL, 'Rf4gNzBntUPuHCqR0906YUr55o3AwgXcxi5JCf5rHVfoo0JKTtOlPVSKL4cp', '2018-06-27 02:01:20', '2018-06-27 02:01:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_info`
--
ALTER TABLE `merchant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `point_rule`
--
ALTER TABLE `point_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shop_info`
--
ALTER TABLE `shop_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_redeemed`
--
ALTER TABLE `shop_redeemed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smslog`
--
ALTER TABLE `smslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_index` (`created_by`),
  ADD KEY `users_updated_by_index` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merchant_info`
--
ALTER TABLE `merchant_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `point_rule`
--
ALTER TABLE `point_rule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_info`
--
ALTER TABLE `shop_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shop_redeemed`
--
ALTER TABLE `shop_redeemed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smslog`
--
ALTER TABLE `smslog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
