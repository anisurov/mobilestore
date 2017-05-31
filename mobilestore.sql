-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2017 at 12:20 PM
-- Server version: 5.7.18
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brandname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brandname`) VALUES
(1, 'xaiomi'),
(2, 'samsung'),
(3, 'htc');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `mobile` int(15) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `model_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `brand_id`, `model_no`) VALUES
(1, 1, 'Redmi 4x');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `shop_name` text NOT NULL,
  `shop_logo` blob NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `present_condition`
--

CREATE TABLE `present_condition` (
  `brand_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `buyprice` int(20) NOT NULL,
  `sellprice` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_entry`
--

CREATE TABLE `product_entry` (
  `SL_no` int(10) NOT NULL,
  `brand_id` int(30) NOT NULL,
  `model_id` int(30) NOT NULL,
  `buyprice` int(20) NOT NULL,
  `sellprice` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_entry`
--

INSERT INTO `product_entry` (`SL_no`, `brand_id`, `model_id`, `buyprice`, `sellprice`, `amount`, `date`) VALUES
(1, 1, 1, 12500, 12990, 2, '2017-05-26 16:20:03'),
(2, 1, 1, 12500, 12990, 2, '2017-05-26 16:20:53'),
(3, 1, 1, 12500, 12990, 2, '2017-05-26 17:04:55'),
(4, 1, 1, 12000, 12990, 12, '2017-05-26 17:06:03'),
(5, 1, 1, 12500, 12990, 2, '2017-05-26 17:14:24'),
(6, 1, 1, 12500, 12990, 3, '2017-05-26 17:33:03'),
(7, 1, 1, 12500, 12990, 3, '2017-05-26 17:36:34'),
(8, 1, 1, 12500, 12990, 3, '2017-05-26 17:37:46'),
(9, 1, 1, 12500, 12990, 3, '2017-05-26 17:46:15'),
(10, 1, 1, 12500, 12990, 5, '2017-05-26 17:46:48'),
(11, 1, 1, 12000, 12990, 11, '2017-05-26 17:48:17'),
(12, 1, 1, 12500, 12990, 12, '2017-05-26 17:50:41'),
(13, 1, 1, 12500, 12990, 12, '2017-05-26 17:56:55'),
(14, 1, 1, 12500, 12900, 12, '2017-05-27 15:10:37'),
(15, 1, 1, 12500, 12300, 12, '2017-05-29 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_sell`
--

CREATE TABLE `product_sell` (
  `SL_no` int(10) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `model_id` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `buyprice` int(20) DEFAULT NULL,
  `sellprice` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `brand_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `camera` text NOT NULL,
  `gps` text NOT NULL,
  `wifi` text NOT NULL,
  `sensors` text NOT NULL,
  `blutooth` text NOT NULL,
  `weight` text NOT NULL,
  `os` text NOT NULL,
  `battery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ovi', 'ovi@domain.com', '$2y$10$KhsLUR60wcmiLQilCf/Pa.27xGYVBYvuhAU6JKnjgi1wZvjqxNC/W', 'zHs7xTMdRLamD9F3wt9PmHFdSMMzZ001s0Kq5bbnTuTDTwcrll03Cxbjlhd7', '2017-05-07 23:42:00', '2017-05-07 23:42:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_entry`
--
ALTER TABLE `product_entry`
  ADD PRIMARY KEY (`SL_no`);

--
-- Indexes for table `product_sell`
--
ALTER TABLE `product_sell`
  ADD PRIMARY KEY (`SL_no`);

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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_entry`
--
ALTER TABLE `product_entry`
  MODIFY `SL_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_sell`
--
ALTER TABLE `product_sell`
  MODIFY `SL_no` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
