-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 06:39 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopigenik_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `province`, `city`, `district`, `zipcode`, `phone`, `created_at`, `updated_at`) VALUES
(1, 3, 'garde', 'adsf', 'adsf', 'adsf', '34343', '', '2017-09-29 07:40:31', '2017-09-29 09:14:30'),
(9, 2, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', '2017-09-29 09:19:37', '2017-10-08 06:27:21'),
(10, 4, 'Citra Garden Blok A3 nomor 4', 'DKI Jakarta', 'Jakarta', 'Kalideres', '14045', '08349823434', '2017-10-08 10:40:58', '2017-10-08 10:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_24_035400_create_coffees_table', 2),
(6, '2017_09_24_043053_create_transactions_table', 3),
(9, '2017_09_24_155543_add_roaster_id_to_coffees', 4),
(10, '2017_09_24_163059_create_coffee_transaction_table', 5),
(11, '2017_09_25_170552_entrust_setup_tables', 6),
(12, '2017_09_27_120409_rename_coffees_table_to_plans', 7),
(13, '2017_09_27_120712_drop_coffee_transaction_table', 8),
(14, '2017_09_27_121220_edit_plan_id_in_transactions_table', 9),
(16, '2017_09_28_145812_create_addresses_table', 10),
(17, '2017_09_29_144823_edit_user_id_in_addresses_table', 11),
(18, '2017_09_29_172101_create_shipments_table', 12),
(19, '2017_10_03_102209_add_phone_to_addresses', 13),
(20, '2017_10_03_104923_add_additional_note_to_shipments', 14),
(21, '2017_10_03_205229_add_columns_to_shipments', 15),
(22, '2017_10_03_212445_add_subscribe_duration_to_transactions', 16),
(23, '2017_10_03_231652_drop_shipment_date_in_shipments', 17),
(24, '2017_10_03_233142_edit_additional_note_in_shipments', 18),
(26, '2017_10_08_145826_add_payment_columns_to_transactions', 19),
(28, '2017_10_09_141020_add_last_delivery_date_to_shipments', 20),
(29, '2017_10_09_233407_edit_onDelete_foreign_key_on_shipments', 21),
(30, '2017_10_10_110706_edit_payment_detail_in_transactions', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('a@a.com', '$2y$10$u4W3pZ5UxaMGyXoSyG/qFeQUfTT5xMY9Z5DnI6cm93Po4eWFwv0/.', '2017-09-22 01:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `roaster_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `roaster_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 0, 'Plan A', '11111', '2017-09-24 10:20:53', '2017-09-24 10:20:53'),
(2, 0, 'Plan B', '22222', '2017-09-24 10:20:53', '2017-09-24 10:20:53'),
(3, 0, 'Plan C', '33333', '2017-09-25 03:39:43', '2017-09-25 03:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-09-27 03:20:09', '2017-09-27 03:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_shipment_left` int(11) NOT NULL,
  `additional_note` text COLLATE utf8mb4_unicode_ci,
  `last_delivery_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `transaction_id`, `address`, `province`, `city`, `district`, `zipcode`, `phone`, `total_shipment_left`, `additional_note`, `last_delivery_date`, `created_at`, `updated_at`) VALUES
(5, 30, 'baru 2', 'q', 'w', 'e', 'r', '08348984ka', 0, NULL, NULL, '2017-10-03 16:47:05', '2017-10-06 17:26:24'),
(7, 32, 'garde', 'adsf', 'adsf', 'adsf', '34343', '34344434', 1, NULL, '2017-10-09 20:12:14', '2017-10-06 02:57:42', '2017-10-09 13:12:14'),
(8, 33, 'garde', 'adsf', 'adsf', 'adsf', '34343', '55454545', 6, NULL, NULL, '2017-10-06 03:00:53', '2017-10-06 03:00:53'),
(9, 34, 'baru 2', 'q', 'w', 'e', 'r', '08348984ka', 3, NULL, NULL, '2017-10-06 03:19:43', '2017-10-08 10:52:02'),
(10, 35, 'baru 2', 'q', 'w', 'e', 'r', '08348984ka', 3, 'jangan sobek ya', '2017-10-09 20:15:48', '2017-10-06 03:23:19', '2017-10-09 13:15:48'),
(11, 36, 'baru 2', 'q', 'w', 'e', 'r', '08348984ka', 6, NULL, NULL, '2017-10-06 17:10:10', '2017-10-06 17:10:10'),
(12, 37, 'baru 2', 'q', 'w', 'e', 'r', '08348984ka', 4, NULL, NULL, '2017-10-07 17:06:25', '2017-10-07 17:06:25'),
(14, 39, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 4, NULL, NULL, '2017-10-08 07:14:17', '2017-10-08 07:14:17'),
(15, 40, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 4, NULL, NULL, '2017-10-08 07:23:29', '2017-10-08 07:23:29'),
(16, 41, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 4, NULL, NULL, '2017-10-08 08:05:51', '2017-10-08 08:05:51'),
(17, 42, 'Citra Garden Blok A3 nomor 4', 'DKI Jakarta', 'Jakarta', 'Kalideres', '14045', '08349823434', 4, NULL, NULL, '2017-10-08 10:42:02', '2017-10-08 10:42:02'),
(18, 43, 'Citra Garden Blok A3 nomor 4', 'DKI Jakarta', 'Jakarta', 'Kalideres', '14045', '08349823434', 4, NULL, NULL, '2017-10-08 11:23:42', '2017-10-08 11:23:42'),
(21, 46, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 6, NULL, NULL, '2017-10-09 17:25:34', '2017-10-09 17:25:34'),
(22, 47, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 6, NULL, NULL, '2017-10-09 17:26:04', '2017-10-09 17:26:04'),
(23, 48, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 4, NULL, NULL, '2017-10-10 04:10:16', '2017-10-10 04:10:16'),
(24, 49, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 2, NULL, NULL, '2017-10-10 04:26:03', '2017-10-10 04:26:03'),
(25, 50, 'Poris Garden Blok C2 Nomor 6', 'Banten', 'Tangerang', 'Cipondoh', '15149', '081294831113', 4, NULL, NULL, '2017-10-10 04:27:47', '2017-10-10 04:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `subscribe_duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_bought` datetime NOT NULL,
  `time_confirmed` datetime DEFAULT NULL,
  `time_approved` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `plan_id`, `subscribe_duration`, `price`, `status`, `bank_account`, `account_holder`, `account_number`, `time_bought`, `time_confirmed`, `time_approved`, `created_at`, `updated_at`) VALUES
(30, 2, 1, 3, 20111, 'approved', '', '', '', '2017-10-03 23:47:05', '2017-10-04 00:26:23', '2017-10-04 00:27:21', '2017-10-03 16:47:05', '2017-10-03 17:27:21'),
(32, 3, 3, 2, 42333, 'approved', '', '', '', '2017-10-06 09:57:41', '2017-10-06 09:57:53', '2017-10-06 09:58:31', '2017-10-06 02:57:41', '2017-10-06 02:58:31'),
(33, 3, 2, 3, 31222, 'to be approved', '', '', '', '2017-10-06 10:00:53', '2017-10-06 10:00:59', NULL, '2017-10-06 03:00:53', '2017-10-06 03:00:59'),
(34, 2, 1, 2, 20111, 'approved', '', '', '', '2017-10-06 10:19:43', '2017-10-06 10:19:45', '2017-10-06 10:20:31', '2017-10-06 03:19:43', '2017-10-06 03:20:31'),
(35, 2, 1, 3, 20111, 'approved', '', '', '', '2017-10-06 10:23:19', '2017-10-06 10:23:21', '2017-10-06 10:24:22', '2017-10-06 03:23:19', '2017-10-06 03:24:22'),
(36, 2, 2, 3, 31222, 'to be approved', '', '', '', '2017-10-07 00:10:10', '2017-10-07 00:11:51', NULL, '2017-10-06 17:10:10', '2017-10-06 17:11:51'),
(37, 2, 1, 2, 20111, 'to be approved', '', '', '', '2017-10-08 00:06:24', '2017-10-09 21:54:18', NULL, '2017-10-07 17:06:24', '2017-10-09 14:54:18'),
(39, 2, 2, 2, 31222, 'to be approved', '', '', '', '2017-10-08 14:14:17', '2017-10-09 21:54:12', NULL, '2017-10-08 07:14:17', '2017-10-09 14:54:12'),
(40, 2, 1, 2, 20111, 'to be approved', '', '', '', '2017-10-08 14:23:29', '2017-10-09 21:23:50', NULL, '2017-10-08 07:23:29', '2017-10-09 14:23:50'),
(41, 2, 2, 2, 31222, 'to be approved', 'BCA', 'Keny', '604930434', '2017-10-08 15:05:51', '2017-10-08 15:06:09', NULL, '2017-10-08 08:05:51', '2017-10-08 08:06:09'),
(42, 4, 2, 2, 31222, 'approved', 'BCA', 'Sinaga', '6059034', '2017-10-08 17:42:02', '2017-10-08 17:43:28', '2017-10-08 17:47:03', '2017-10-08 10:42:02', '2017-10-08 10:47:03'),
(43, 4, 1, 2, 20111, 'to be approved', 'BCA', 'Alvin Theodora', '124556', '2017-10-08 18:23:42', '2017-10-08 18:23:49', NULL, '2017-10-08 11:23:42', '2017-10-08 11:23:49'),
(46, 2, 2, 3, 31222, 'to be approved', 'MANDIRI', 'SELI', '94833223', '2017-10-10 00:25:34', '2017-10-10 11:18:52', NULL, '2017-10-09 17:25:34', '2017-10-10 04:18:52'),
(47, 2, 2, 3, 31222, 'to be approved', 'bca', 'kena', '34443433', '2017-10-10 00:26:04', '2017-10-10 10:55:05', NULL, '2017-10-09 17:26:04', '2017-10-10 03:55:05'),
(48, 2, 2, 2, 31222, 'to be approved', 'BCA', 'KENT', '68940511', '2017-10-10 11:10:16', '2017-10-10 11:17:05', NULL, '2017-10-10 04:10:16', '2017-10-10 04:17:05'),
(49, 2, 2, 1, 31222, 'to be approved', 'BNI', 'KENTSELI', '93484333', '2017-10-10 11:26:03', '2017-10-10 11:27:26', NULL, '2017-10-10 04:26:03', '2017-10-10 04:27:26'),
(50, 2, 3, 2, 42333, 'to be approved', 'bca', 'sina', '343443', '2017-10-10 11:27:47', '2017-10-10 11:37:33', NULL, '2017-10-10 04:27:47', '2017-10-10 04:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'a@a.com', '$2y$10$nDWXjff4.IV/OvciVBNXKenGJnTaCXrRhOjJdOEjbVO4hVeqTfj9y', 'TPV6V4pSG75zByH69acrXTwLyCmHdDf47yWdnW8WPSAYf6xw3kpZYPmATwCl', '2017-09-22 00:59:37', '2017-09-22 00:59:37'),
(2, 'beta', 'b@b.com', '$2y$10$tN2bB0zaFu9kCNx4WxFLfeThBUxlztSXySugu4C1Qn4S7ztRJa5.m', 'SZCa8rKRHq1WxMR9B7syi9uwAB2CamruozudY2CUTRbePQ7bBLOGDm6dDg1B', '2017-09-22 02:10:06', '2017-09-29 09:24:15'),
(3, 'Charlie', 'c@c.com', '$2y$10$HCGZm28f1daVWEGfqsY6HeLNKnvD9D5CjOSg/p0F7SuZVo7gmT3zC', 'lEhzkwHvluqysDPlRJ7m6VHwMQdR8KCOklP2ttMgCbL8BC9vDwnw0yoKamUa', '2017-09-24 03:09:50', '2017-09-29 10:08:43'),
(4, 'Delta', 'd@d.com', '$2y$10$fn9/BmNMTXGdUDzAo05qhecr1FdShP.S4TS3ofC3rPWUZwuKcVxRi', '4r7hm6ulrhP3LGK52L5Pzwpb9NBqRnyM0KxDoGpzhtKwFxgr4yW7FOgw90vc', '2017-10-08 10:38:58', '2017-10-08 10:38:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addresses_user_id_unique` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
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
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_plan_id_foreign` (`plan_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
