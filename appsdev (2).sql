-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 10:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appsdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$74PbL6.4n0tVIIFflyitv..lB0s8fBauYqunRrNxF4M4n0NjDUfjW', '2023-12-10 05:13:33', '2023-12-10 05:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `detergents`
--

CREATE TABLE `detergents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detergent_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detergents`
--

INSERT INTO `detergents` (`id`, `detergent_name`, `image`, `created_at`, `updated_at`) VALUES
(6, 'surf', '1702255277.webp', '2023-12-10 16:41:17', '2023-12-10 16:41:17'),
(7, 'Surf', '1702257369.jpg', '2023-12-10 17:16:09', '2023-12-10 17:16:09'),
(8, 'Tide', '1702258507.jpg', '2023-12-10 17:35:07', '2023-12-10 17:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`id`, `fabric_name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Tide', '1702270088.jpg', '2023-12-04 07:55:55', '2023-12-10 20:48:08'),
(7, 'Downy', '1702258575.jpg', '2023-12-10 16:25:57', '2023-12-10 17:36:15'),
(9, 'surf', '1702270028.jpg', '2023-12-10 20:47:08', '2023-12-10 20:47:08'),
(10, 'Surf11', '1702272945.webp', '2023-12-10 21:35:45', '2023-12-10 21:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_03_150529_create_fabrics_table', 1),
(6, '2023_12_04_151947_create_detergents_table', 1),
(7, '2023_12_04_153213_create_fabrics_table', 2),
(8, '2023_12_07_025915_create_orders_table', 3),
(9, '2023_12_07_044932_create_admins_table', 4),
(10, '2023_12_07_050045_add_role_to_admins_table', 5),
(11, '2023_12_07_050332_alter_admins_table', 6),
(12, '2023_12_07_070950_create_admins_table', 7),
(13, '2023_12_10_115210_create_admins_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fabric_id` bigint(20) UNSIGNED NOT NULL,
  `detergent_id` bigint(20) UNSIGNED NOT NULL,
  `weight` varchar(255) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fabric_id`, `detergent_id`, `weight`, `payment_option`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, '2', 'gcash', '550', 'complete', '2023-12-06 19:04:55', '2023-12-06 19:55:57'),
(2, 1, 5, 3, '2', 'gcash', '550', 'pending', '2023-12-06 19:45:21', '2023-12-06 19:45:21'),
(4, 4, 7, 6, '3', 'cash on delivery', '800', 'pending', '2023-12-10 17:40:18', '2023-12-10 17:40:18'),
(5, 4, 7, 7, '3', 'cash on delivery', '800', 'pending', '2023-12-10 17:45:12', '2023-12-10 17:45:12'),
(6, 4, 7, 6, '2', 'cash on delivery', '550', 'complete', '2023-12-10 17:55:38', '2023-12-10 18:15:25'),
(7, 4, 7, 7, '2', 'cash on delivery', '550', 'pending', '2023-12-10 17:59:52', '2023-12-10 17:59:52'),
(8, 4, 2, 6, '3', 'cash on delivery', '800', 'pending', '2023-12-10 18:00:56', '2023-12-10 18:00:56'),
(9, 4, 2, 7, '3', 'cash on delivery', '800', 'pending', '2023-12-10 18:07:46', '2023-12-10 20:45:31'),
(10, 4, 7, 7, '1', 'gcash', '300', 'pending', '2023-12-10 20:49:46', '2023-12-10 20:49:46'),
(11, 5, 7, 6, '2', 'cash on delivery', '550', 'pending', '2023-12-10 21:24:28', '2023-12-10 21:24:28'),
(12, 5, 9, 8, '0.7', 'cash on delivery', '225', 'delivered', '2023-12-10 21:25:15', '2023-12-10 21:34:01'),
(13, 5, 7, 7, '2', 'cash on delivery', '550', 'pending', '2023-12-10 21:47:01', '2023-12-10 21:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kessiah', 'kessiah@yahoo.com', 1, NULL, '$2y$12$CjHiYi9s7owsNnxa3a/OWepIkUjvVIji/PFBKPG.gRMrcyUQCyl9O', NULL, '2023-12-05 01:26:34', '2023-12-05 01:26:34'),
(2, 'Lysa', 'lysapacaldo@gmail.com', 1, NULL, '$2y$12$XxrSwHN4cl5TI3nf.1gJ6uVpPnvCSjLiFuPPEHa.aBVdoEaFbmdjG', NULL, '2023-12-07 03:05:43', '2023-12-07 03:05:43'),
(4, 'Kessiah', 'kessiah1@gmail.com', 1, NULL, '$2y$12$sI4KTzbnErlgL/ROu/GITenJhju37qrDgWLeLC4c2ZucxL.xDFlH6', NULL, '2023-12-10 07:36:31', '2023-12-10 07:36:31'),
(5, 'Yiell', 'yiell@gmail.com', 1, NULL, '$2y$12$/r7P/XDIL8VtxmsGo.FvD.VmWp2Gc1Y1lCpSjaKg3rbRX8p5DS79K', NULL, '2023-12-10 21:23:00', '2023-12-10 21:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `detergents`
--
ALTER TABLE `detergents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detergents`
--
ALTER TABLE `detergents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
