-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 09:15 AM
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
  `shop_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`id`, `mobile_number`, `first_name`, `last_name`, `dob`, `profession`, `location`, `shop_id`, `created_at`, `updated_at`) VALUES
(2, '017234021', 'SaM', 'Hossain', '0507', 'Student', 'Gulshan', 30, '2018-06-27 07:02:57', '2018-07-10 05:22:19'),
(11, '01752303178', 'Sam', 'Hoss', '0794', 'Student', 'Gulshan 1', 2, '2018-06-28 06:52:31', '2018-07-10 05:24:35'),
(16, '01752303147', 'SAMY', 'HOSS', '0794', 'Student', 'Gulshan 2', 3, '2018-06-28 10:03:08', '2018-07-09 11:33:49'),
(18, '01683836911', 'Rick', 'Ban', '0509', 'Student', 'Mirpur', 30, '2018-07-02 08:18:53', '2018-07-09 11:33:49'),
(19, '01683836999', 'Rick', 'Ban', '0509', 'Student', 'Mirpur', 6, '2018-07-03 08:41:23', '2018-07-09 11:33:49'),
(21, '01683836929', 'Sam', 'Yaoi', '0507', 'Student', 'Banani', 6, '2018-07-03 08:51:50', '2018-07-09 11:33:49'),
(30, '01752303145', 'Samina', 'Hossain', '0507', 'Student', 'Gulshan 2', 30, '2018-07-04 06:51:33', '2018-07-09 11:33:49'),
(31, '01752303146', 'SAM', 'Hoss', '0507', 'Officer', 'Gulshan 2', 3, '2018-07-04 07:18:12', '2018-07-09 11:33:49'),
(32, '01752303155', 'SAM', 'Hossain', '0794', 'Student', 'Gulshan 2', 2, '2018-07-04 07:20:26', '2018-07-09 11:33:49'),
(40, '01942340534', 'Waris', 'Parvez', '0193', 'Student', 'Uttara', 29, '2018-07-10 12:01:52', '2018-07-10 12:01:52'),
(41, '01823423145', 'Riya', 'Ray', '0693', 'Student', 'Gulshan', 29, '2018-07-11 05:18:25', '2018-07-11 05:18:25');

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
(3, 50),
(10, 5),
(10, 5);

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
(7, 28),
(10, 2),
(10, 3);

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
(1, 'Loyal Pow', 'Point Season All You Can eat Buffet', 300, 16, '2018-07-10 04:34:18', '2019-03-31 18:00:00', 10, '2018-06-27 07:43:06', '2018-07-03 00:47:40'),
(3, 'Buffet Fiesta', 'abc', 100, 1, '2018-07-04 09:45:15', '2018-07-23 18:00:00', 1, '2018-06-27 09:28:44', '2018-06-27 09:28:44'),
(6, 'Umai', 'Unlimited Sushi', 700, 20, '2018-07-10 04:34:18', '2018-08-08 18:00:00', 10, '2018-07-04 06:32:18', '2018-07-04 06:32:18'),
(7, 'Pizza Guy', 'Unlimited Pizza', 700, 20, '2018-07-10 04:34:18', '2018-09-08 18:00:00', 10, '2018-07-05 06:26:55', '2018-07-05 06:26:55'),
(8, 'April 14th', 'Pohela Boishak offer', 400, 20, '2018-07-10 04:34:18', '2018-04-16 18:00:00', 10, '2018-07-05 08:15:06', '2018-07-05 08:15:06'),
(9, 'Pizza Buy 1 Get 2', 'Pizza Guy Pizza Galore', 400, 20, '2018-07-06 18:00:00', '2018-08-07 18:00:00', 5, '2018-07-10 04:35:27', '2018-07-10 04:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `point_rule_redeem`
--

CREATE TABLE `point_rule_redeem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `min_point` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `offer_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `merchant_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point_rule_redeem`
--

INSERT INTO `point_rule_redeem` (`id`, `name`, `description`, `min_point`, `amount`, `offer_start`, `offer_end`, `merchant_id`, `created_at`, `updated_at`) VALUES
(1, 'Loyal Pow', 'sdasd', 16, 300, '2018-07-04 09:45:23', '2019-03-31 18:00:00', 5, '2018-07-09 08:57:16', '2018-07-09 08:57:16');

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

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 4),
(5, 3);

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
(2, 'Pizza Hut', 'PH', 'Mofazzol', '01874535456', 'wwww', 1, 1, 0, '2017-04-25 04:30:30', '2018-07-09 04:46:33'),
(3, 'Sushi Samurai', 'SS', 'Laitul', '222222', 'Banani', 1, 1, 0, '2017-04-25 04:41:26', '2018-07-10 11:27:42'),
(6, 'Tokyo Diner', 'TD', 'Salehn', '01723312024', 'Dhanmondhi', 1, 1, 0, '2017-04-25 04:43:55', '2018-07-04 08:14:00'),
(7, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 04:45:20', '2017-04-25 04:45:20'),
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
(22, 'Cream and Fudge', 'CF', 'Moinul', '8801752331345', 'Banani', 1, 10, 10, '2017-04-25 06:12:06', '2018-07-10 10:23:40'),
(23, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:13:20', '2017-04-25 06:13:20'),
(24, 'ww', 'ww', 'ww', 'www', 'wwww', 0, 0, 0, '2017-04-25 06:14:18', '2017-04-25 06:14:18'),
(25, '2', '2', '2', '2', '2', 0, 0, 0, '2017-04-26 01:58:20', '2017-04-26 01:58:20'),
(26, 'www', 'ww', 'ww', 'ww', 'ww', 0, 0, 0, '2017-04-26 02:30:12', '2017-04-26 02:30:12'),
(27, 'Barcode', 'BC', 'Abdul', '01743405321', 'Gulshan', 1, 10, 10, '2017-04-26 02:31:30', '2018-07-10 10:24:36'),
(28, 'KFC Dhanmodi ', '01', 'Shanto', '01756433611', '93 B New Eskat', 0, 0, 0, '2017-04-29 22:51:22', '2017-04-29 22:51:22'),
(29, 'Tokeyo Express', 'TE', 'Lily', '8801811419556', 'Gulshan', 1, 1, 2, '2018-07-09 04:51:31', '2018-07-09 04:51:31'),
(30, 'Yum Cha District', 'YC', 'Lara Jade', '8801752393456', 'Banani 11', 1, 5, 5, '2018-07-09 11:00:38', '2018-07-09 11:00:38'),
(31, 'Kiyoshi', 'KI', 'Nagasaki', '8801732345432', 'Gulshan 1', 1, 5, 5, '2018-07-10 11:30:37', '2018-07-10 11:30:37');

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

--
-- Dumping data for table `shop_redeemed`
--

INSERT INTO `shop_redeemed` (`id`, `point_rule_id`, `shop_id`, `customerinfo_id`, `total_amount`, `point`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 22, 11, 2590.00000000, 136.00000000, 5, '2018-06-28 11:20:17', '2018-06-28 11:20:17'),
(4, 1, 22, 2, 1000.00000000, 20.00000000, 5, '2018-07-01 09:00:17', '2018-07-01 09:00:17'),
(5, 1, 22, 2, 1000.00000000, 20.00000000, 5, '2018-07-01 09:00:50', '2018-07-01 09:00:50'),
(6, 1, 22, 2, 1000.00000000, 20.00000000, 5, '2018-07-01 09:23:56', '2018-07-01 09:23:56'),
(7, 1, 22, 11, 1222.00000000, 21.00000000, 5, '2018-07-03 06:58:59', '2018-07-03 06:58:59'),
(8, 1, 22, 11, 2500.00000000, 25.00000000, 5, '2018-07-03 07:00:23', '2018-07-03 07:00:23'),
(9, 1, 22, 11, 2500.00000000, 25.00000000, 5, '2018-07-03 07:05:18', '2018-07-03 07:05:18'),
(10, 1, 22, 11, 2500.00000000, 25.00000000, 5, '2018-07-03 07:08:59', '2018-07-03 07:08:59'),
(11, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:09:13', '2018-07-03 07:09:13'),
(12, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:10:58', '2018-07-03 07:10:58'),
(13, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:11:16', '2018-07-03 07:11:16'),
(14, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:12:14', '2018-07-03 07:12:14'),
(15, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:12:26', '2018-07-03 07:12:26'),
(16, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:13:03', '2018-07-03 07:13:03'),
(17, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:13:22', '2018-07-03 07:13:22'),
(18, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:14:55', '2018-07-03 07:14:55'),
(19, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:15:35', '2018-07-03 07:15:35'),
(20, 1, 22, 11, 9000.00000000, 46.00000000, 5, '2018-07-03 07:15:56', '2018-07-03 07:15:56'),
(21, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:16:23', '2018-07-03 07:16:23'),
(22, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:16:49', '2018-07-03 07:16:49'),
(23, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:17:24', '2018-07-03 07:17:24'),
(24, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:17:50', '2018-07-03 07:17:50'),
(25, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:17:58', '2018-07-03 07:17:58'),
(26, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:18:59', '2018-07-03 07:18:59'),
(27, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:19:10', '2018-07-03 07:19:10'),
(28, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:26:39', '2018-07-03 07:26:39'),
(29, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:34:03', '2018-07-03 07:34:03'),
(30, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:35:11', '2018-07-03 07:35:11'),
(31, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-03 07:36:57', '2018-07-03 07:36:57'),
(32, 1, 22, 11, 8000.00000000, 43.00000000, 5, '2018-07-03 07:46:11', '2018-07-03 07:46:11'),
(33, 1, 22, 11, 8000.00000000, 43.00000000, 5, '2018-07-03 07:47:27', '2018-07-03 07:47:27'),
(34, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:47:36', '2018-07-03 07:47:36'),
(35, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:48:11', '2018-07-03 07:48:11'),
(36, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:49:53', '2018-07-03 07:49:53'),
(37, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:50:28', '2018-07-03 07:50:28'),
(38, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:52:16', '2018-07-03 07:52:16'),
(39, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:52:29', '2018-07-03 07:52:29'),
(40, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:52:50', '2018-07-03 07:52:50'),
(41, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:53:23', '2018-07-03 07:53:23'),
(42, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:53:36', '2018-07-03 07:53:36'),
(43, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:54:12', '2018-07-03 07:54:12'),
(44, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:56:32', '2018-07-03 07:56:32'),
(45, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 07:56:38', '2018-07-03 07:56:38'),
(46, 1, 22, 11, 1111.00000000, 20.00000000, 5, '2018-07-03 08:15:15', '2018-07-03 08:15:15'),
(47, 1, 22, 11, 2000.00000000, 23.00000000, 5, '2018-07-04 06:31:23', '2018-07-04 06:31:23'),
(48, 1, 22, 30, 9000.00000000, 46.00000000, 5, '2018-07-04 06:51:44', '2018-07-04 06:51:44'),
(49, 1, 22, 30, 9000.00000000, 46.00000000, 5, '2018-07-04 09:39:04', '2018-07-04 09:39:04'),
(50, 1, 22, 30, 5666.00000000, 35.00000000, 5, '2018-07-04 09:47:28', '2018-07-04 09:47:28'),
(51, 6, 22, 30, 899.00000000, 22.00000000, 5, '2018-07-04 09:57:01', '2018-07-04 09:57:01'),
(52, 1, 22, 30, 9000.00000000, 46.00000000, 5, '2018-07-05 06:04:50', '2018-07-05 06:04:50'),
(53, 1, 27, 11, 2444.00000000, 25.00000000, 5, '2018-07-05 06:22:36', '2018-07-05 06:22:36'),
(55, 1, 27, 30, 2974.00000000, 26.00000000, 5, '2018-07-08 05:19:59', '2018-07-08 05:19:59'),
(56, 1, 27, 30, 2974.00000000, 26.00000000, 5, '2018-07-08 05:49:56', '2018-07-08 05:49:56'),
(57, 7, 27, 30, 1981.00000000, 23.00000000, 5, '2018-07-08 09:51:03', '2018-07-08 09:51:03'),
(58, 1, 27, 30, 2974.00000000, 26.00000000, 5, '2018-07-08 10:59:25', '2018-07-08 10:59:25'),
(62, 1, 27, 30, 3467.00000000, 192.00000000, 5, '2018-07-09 09:02:20', '2018-07-09 09:02:20'),
(63, 1, 27, 11, 6976.00000000, 384.00000000, 5, '2018-07-09 09:03:32', '2018-07-09 09:03:32'),
(64, 1, 27, 11, 0.00000000, 384.00000000, 5, '2018-07-09 09:04:24', '2018-07-09 09:04:24'),
(66, 1, 27, 32, 3500.00000000, 192.00000000, 5, '2018-07-09 09:28:58', '2018-07-09 09:28:58'),
(67, 1, 27, 32, 0.00000000, 192.00000000, 5, '2018-07-09 09:29:21', '2018-07-09 09:29:21'),
(68, 7, 27, 30, 0.00000000, 180.00000000, 5, '2018-07-10 06:42:55', '2018-07-10 06:42:55'),
(69, 1, 27, 40, 9000.00000000, 480.00000000, 5, '2018-07-10 12:03:43', '2018-07-10 12:03:43'),
(70, 7, 27, 40, 0.00000000, 200.00000000, 5, '2018-07-10 12:04:08', '2018-07-10 12:04:08'),
(71, 6, 22, 40, 0.00000000, 260.00000000, 5, '2018-07-11 03:46:52', '2018-07-11 03:46:52'),
(72, 6, 22, 30, 0.00000000, 260.00000000, 5, '2018-07-11 05:16:07', '2018-07-11 05:16:07'),
(73, 6, 22, 41, 0.00000000, 0.00000000, 5, '2018-07-11 05:26:38', '2018-07-11 05:26:38'),
(74, 1, 22, 30, 0.00000000, 224.00000000, 5, '2018-07-11 05:30:55', '2018-07-11 05:30:55'),
(75, 1, 22, 30, 0.00000000, 0.00000000, 5, '2018-07-11 05:56:29', '2018-07-11 05:56:29'),
(76, 1, 22, 30, 2556.00000000, 1312.00000000, 5, '2018-07-11 06:12:56', '2018-07-11 06:12:56'),
(77, 6, 29, 30, 0.00000000, 40.00000000, 5, '2018-07-11 06:19:25', '2018-07-11 06:19:25'),
(78, 6, 29, 30, 0.00000000, 80.00000000, 5, '2018-07-11 06:49:26', '2018-07-11 06:49:26'),
(79, 6, 30, 30, 0.00000000, 80.00000000, 5, '2018-07-11 06:49:43', '2018-07-11 06:49:43'),
(80, 7, 31, 41, 7000.00000000, 200.00000000, 5, '2018-07-11 11:27:38', '2018-07-11 11:27:38'),
(81, 7, 31, 41, 7000.00000000, 200.00000000, 5, '2018-07-11 11:28:29', '2018-07-11 11:28:29');

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
(28, 47),
(29, 5),
(27, 5),
(28, 5),
(2, 5),
(30, 5),
(22, 5),
(31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `smslog`
--

CREATE TABLE `smslog` (
  `id` int(10) NOT NULL,
  `hotkey` varchar(100) NOT NULL,
  `subhotkey` varchar(100) NOT NULL,
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

INSERT INTO `smslog` (`id`, `hotkey`, `subhotkey`, `msisdn`, `sms_body`, `status`, `reply_body`, `created_at`, `updated_at`) VALUES
(13, 'RST', '', '12356353', 'RST LOL Sam Hossain 0507 Student Gulshan', '0', 'Restaurant doesn\'t exist, please type the right Restaurant Code', '2018-06-27 07:31:13', '2018-06-27 07:31:13'),
(14, 'RST', '', '12356353', 'RST LOL Sam Hossain 0507 Student Gulshan', '0', 'Restaurant doesn\'t exist, please type the right Restaurant Code', '2018-06-27 07:31:27', '2018-06-27 07:31:27'),
(15, 'RST', '', '12356353', 'RST UM Sam Hossain 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-06-27 07:32:16', '2018-06-27 07:32:16'),
(21, 'RST', 'PH', '01683836999', 'RST PH Rick Ban 0509 Student Mirpur', '0', 'This number is already registered', '2018-07-03 08:44:22', '2018-07-03 08:44:22'),
(23, 'RST', 'PH', '01683836999', 'RST PH Rick Ban 0509 Student Mirpur', '0', 'This number is already registered', '2018-07-03 08:47:03', '2018-07-03 08:47:03'),
(24, 'RST', 'UM', '01683836999', 'RST UM Sam Yao 0507 Student Banani', '0', 'This number is already registered', '2018-07-03 08:47:38', '2018-07-03 08:47:38'),
(26, 'RST', 'PH', '01683836929', 'RST PH Sam Yao 0507 Student Banani', '1', 'Thank you for registering, you got 100 points!', '2018-07-03 08:51:50', '2018-07-03 08:51:50'),
(27, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-07-10 09:04:35', '2018-07-10 09:04:35'),
(28, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '0', 'This number is already registered', '2018-07-10 09:05:04', '2018-07-10 09:05:04'),
(39, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-07-10 09:17:11', '2018-07-10 09:17:11'),
(40, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-07-10 09:17:11', '2018-07-10 09:17:11'),
(41, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-07-10 09:18:42', '2018-07-10 09:18:42'),
(42, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '0', 'This number is already registered', '2018-07-10 09:18:43', '2018-07-10 09:18:43'),
(43, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '1', 'Thank you for registering, you got 100 points!', '2018-07-10 09:19:16', '2018-07-10 09:19:16'),
(44, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '0', 'This number is already registered', '2018-07-10 09:19:17', '2018-07-10 09:19:17'),
(45, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '0', 'This number is already registered', '2018-07-10 09:39:14', '2018-07-10 09:39:14'),
(46, 'RST', 'PH', '01742939134', 'RST PH TAR ROW 0507 Student Gulshan', '0', 'This number is already registered', '2018-07-10 10:21:50', '2018-07-10 10:21:50');

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
(5, 'Admin', 'admin1@email.com', '$2y$10$8eD96oFcuFc.nHLmCm3sheDNpvcGp27e.xX/yOelNajoW2.7dgdXO', 'QwsrEgasjh124F', 1, NULL, NULL, 'oSI2bbrxfFdiEbd3CVIWtLnUl5ZV9kZhubm0jwwJbaqEK5ueSHc4a7MQKV0o', '2018-06-27 02:01:20', '2018-06-27 02:01:20');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_info`
--
ALTER TABLE `shop_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shop_redeemed`
--
ALTER TABLE `shop_redeemed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `smslog`
--
ALTER TABLE `smslog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
