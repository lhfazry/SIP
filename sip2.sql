-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 11:21 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Fashion Wanita', 'active', '2018-05-23 23:25:26', '2018-05-23 23:25:26'),
(10, 'Fashion Pria', 'active', '2018-05-23 23:25:38', '2018-05-23 23:25:38'),
(11, 'Baju Anak', 'active', '2018-05-23 23:25:49', '2018-05-23 23:25:49'),
(12, 'Handphone', 'active', '2018-05-23 23:26:12', '2018-05-23 23:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_05_22_061724_create_categories_table', 1),
(2, '2018_05_23_072220_create_products_table', 2),
(3, '2018_05_25_021619_create_transactions_table', 3),
(4, '2018_05_25_070443_create_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `sku`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 9, 'Baju Kebaya', 'sfgsdfg', 1000000, 'A001', 'products/CIW6MwaW5o5Ifz8SdT3zxUQOzx8efrOFwZw4pjKT.png', 'active', '2018-05-23 23:28:02', '2018-05-23 23:28:02'),
(4, 9, 'Kerudung', 'sdfds', 123123, 'A002', 'products/hnBDvxO5saT9lYxqCYMl2RniLbbPpJk5rH8OawCc.png', 'active', '2018-05-23 23:31:20', '2018-05-23 23:31:20'),
(5, 10, 'Celana Panjang', 'sfdsf', 123123, 'B001', 'products/knKyXknehGycfiEgpwiBDIHxENSYvwqq6USWf6Yw.png', 'active', '2018-05-23 23:31:55', '2018-05-23 23:31:55'),
(6, 10, 'Celana Pendek', 'fdgdfg', 234234, 'B002', 'products/8p6XbpoIjdenwL59IZY21OCbhTymQl6AKNfrfD7m.png', 'active', '2018-05-23 23:32:22', '2018-05-23 23:34:06'),
(7, 11, 'Kaos Teletubies', 'sdf', 234234, 'C001', 'products/OKeoJXijGNNadtIdlpzVdg5UmfvGzKcspgEBA1Yx.png', 'active', '2018-05-23 23:33:11', '2018-05-23 23:34:19'),
(8, 11, 'Baju Doraemon', 'sdfdsf', 234234, 'C002', 'products/26ed48gcDojfWUAO8GXsJyJZdXekv8W6eNaFv1uA.png', 'active', '2018-05-23 23:33:49', '2018-05-23 23:33:49'),
(9, 12, 'Samsung 123', 'sdfdsf', 234234, 'D001', 'products/EgZXxlKIXZxouAmzOVQeAFUqcraehAQcW37bGQS7.png', 'active', '2018-05-23 23:34:57', '2018-05-23 23:34:57'),
(10, 12, 'Nokia 234', 'sdfsdf', 123123213, 'D002', 'products/QvKO32b7dDLGiJebDTaj65gU1sxSoqebCAWvkMCy.png', 'active', '2018-05-23 23:35:35', '2018-05-23 23:35:35'),
(11, 9, 'Rok Mini', 'sfsdf', 200000, 'A003', 'products/bYQtsWzjH1TbDuGd3uKEKdroMYouJ2BcT02N0hnw.png', 'active', '2018-05-24 00:41:41', '2018-05-24 00:41:41'),
(12, 9, 'Daster', 'sdfds', 45645654, 'A004', 'products/zP3SXcj8yKCJIV8lPQ2DM6HoTbPRfkc6VsMsuTLE.png', 'active', '2018-05-24 00:42:17', '2018-05-24 00:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `trx_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `trx_date`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, '2018-02-02 17:00:00', 10000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(2, 3, '2018-02-03 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(3, 4, '2018-02-04 17:00:00', 30000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(4, 5, '2018-03-02 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(5, 4, '2018-03-02 17:00:00', 40000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(6, 5, '2018-03-04 17:00:00', 100000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(7, 6, '2018-04-02 17:00:00', 80000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(8, 7, '2018-05-02 17:00:00', 25000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(9, 8, '2018-05-05 17:00:00', 80000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(10, 9, '2018-05-05 17:00:00', 80000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(11, 4, '2018-05-08 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(12, 4, '2018-06-02 17:00:00', 30000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(13, 5, '2018-07-02 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(14, 5, '2018-08-02 17:00:00', 30000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(15, 5, '2018-09-02 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(16, 5, '2018-10-02 17:00:00', 20000, '2018-05-24 21:17:35', '2018-05-24 21:17:35'),
(17, 3, '2018-02-02 17:00:00', 10000, '2018-05-24 21:19:56', '2018-05-24 21:19:56'),
(18, 3, '2018-02-03 17:00:00', 20000, '2018-05-24 21:19:56', '2018-05-24 21:19:56'),
(19, 4, '2018-02-04 17:00:00', 30000, '2018-05-24 21:19:56', '2018-05-24 21:19:56'),
(20, 5, '2018-03-02 17:00:00', 20000, '2018-05-24 21:19:56', '2018-05-24 21:19:56'),
(21, 4, '2018-03-02 17:00:00', 40000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(22, 5, '2018-03-04 17:00:00', 100000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(23, 6, '2018-04-02 17:00:00', 80000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(24, 7, '2018-05-02 17:00:00', 25000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(25, 8, '2018-05-05 17:00:00', 80000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(26, 9, '2018-05-05 17:00:00', 80000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(27, 4, '2018-05-08 17:00:00', 20000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(28, 4, '2018-06-02 17:00:00', 30000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(29, 5, '2018-07-02 17:00:00', 20000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(30, 5, '2018-08-02 17:00:00', 30000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(31, 5, '2018-09-02 17:00:00', 20000, '2018-05-24 21:19:57', '2018-05-24 21:19:57'),
(32, 5, '2018-10-02 17:00:00', 20000, '2018-05-24 21:19:57', '2018-05-24 21:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fazri@rumahcoding.co.id', '$2y$10$h91j4S.F.xIv1h4sEHJNduufpCR/ROwisO1U5apJzCFbCet51tfZe', NULL, '2018-05-25 00:19:10', '2018-05-25 00:19:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
