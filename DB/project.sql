-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 11:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'T-Shirt', 'Mens T-shirt', '2021-01-06 14:08:39', '2021-01-07 00:45:01'),
(4, 'Shirts', 'Gents and Ledis T-shirt', '2021-01-06 14:08:57', '2021-01-07 02:17:57'),
(5, 'Tops', 'Women\'s Jens Tops', '2021-01-06 14:09:27', '2021-01-06 14:09:27'),
(6, 'Smart Phone', 'Smart phone', '2021-01-08 07:11:35', '2021-01-08 07:11:35'),
(7, 'Camera', 'Camera & accessories', '2021-01-15 14:27:51', '2021-01-15 14:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `phone_number`, `address`, `image`, `created_at`, `updated_at`) VALUES
(7, 'Nusrat Mim', 'nusrat@gmail.com', '01628132705', 'Collage Gate,Gazipur', 'ims/customer/1610723682.jpeg', '2021-01-15 09:14:42', '2021-01-15 09:14:57'),
(8, 'Riad Khan', 'riadkhan2367@gmail.com', '01628132705', 'Dhaka', 'ims/customer/1610788364.jpeg', '2021-01-16 03:12:44', '2021-01-16 03:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `nid`, `salary`, `date`, `photo`, `created_at`, `updated_at`) VALUES
(15, 'Riad Khan', 'riadkhan2367@gmail.com', '+441628132705', '5656', '56565', '2021-01-09', 'ims/employee/1609681065.jpeg', '2021-01-03 07:37:45', '2021-01-03 07:37:45'),
(16, 'Nusrat Mim', 'rdxriad236@gmail.com', '+441628132705', '34353453543453453', '20000', '2020-12-15', 'ims/employee/1609776258.jpeg', '2021-01-04 06:08:22', '2021-01-04 06:08:22'),
(17, 'rahim', 'rdxriad236@gmail.com', '+441628132705', '66', '45', '2021-01-16', 'ims/employee/1609852785.jpeg', '2021-01-05 07:19:45', '2021-01-05 07:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `expense_description`, `expense_date`, `created_at`, `updated_at`) VALUES
(5, '2250', 'Electricity Bill', '2021-01-09', '2021-01-09 05:46:59', '2021-01-09 06:39:25'),
(6, '1500', 'Internet Monthly Bill', '2021-01-09', '2021-01-09 05:47:37', '2021-01-09 06:39:41'),
(7, '3000', 'Service Charge', '2021-01-09', '2021-01-09 05:47:59', '2021-01-09 05:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_02_122056_create_employees_table', 2),
(5, '2021_01_02_124143_create_employees_table', 3),
(6, '2021_01_05_094204_create_suppliers_table', 4),
(7, '2021_01_06_141242_create_categories-table', 5),
(8, '2021_01_06_142124_create_categories_table', 6),
(9, '2021_01_07_124932_create_products_table', 7),
(10, '2021_01_08_140711_create_suppliers_table', 8),
(11, '2021_01_09_110032_create_expenses_table', 9),
(12, '2021_01_09_142743_create_salaries_table', 10),
(13, '2021_01_09_150149_create_salaries_table', 11),
(14, '2021_01_13_201922_create_customers_table', 12),
(15, '2021_01_16_132950_create_carts_table', 13),
(16, '2021_01_16_141344_add_order_status_to_carts_table', 14),
(17, '2021_01_17_124032_create_vats_table', 15),
(18, '2021_01_17_130135_create_vats_table', 16),
(19, '2021_01_18_131654_create_orders_table', 17),
(20, '2021_01_18_131711_create_orders_details_table', 17),
(21, '2021_01_18_212241_add_order_date_to_orders_table', 18),
(22, '2021_01_19_095853_add_total_to_orders_details', 19),
(23, '2021_01_19_114508_add_vat_to_orders_details', 20),
(24, '2021_01_19_153102_add_order_status_to_orders', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `qty`, `sub_total`, `vat`, `total`, `pay`, `due`, `pay_by`, `created_at`, `updated_at`, `order_date`, `order_month`, `order_year`, `order_status`) VALUES
(30, 8, 1, '300', '6', '318', '250', '68', 'Hand Cash', '2021-01-19 10:54:44', NULL, '19/01/2021', 'January', '2021', 'Delivered'),
(31, 8, 2, '2400', '10', '2640', '2640', '0', 'Hand Cash', '2021-01-19 10:58:41', NULL, '17/02/2020', 'February', '2020', 'processing'),
(32, 7, 2, '900', '5', '945', '940', '5', 'Hand Cash', '2021-01-19 11:00:02', NULL, '19/01/2021', 'March', '2021', 'shipping'),
(34, 8, 2, '1500', '10', '1650', '1650', '0', 'Hand Cash', '2021-01-19 22:45:10', NULL, '20/01/2021', 'January', '2020', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `subtotal`, `created_at`, `updated_at`, `total`, `vat`) VALUES
(31, 28, 21, '3', '750', '1500', NULL, NULL, '1650', '10'),
(32, 29, 22, '1', '300', '300', NULL, NULL, '315', '5'),
(33, 30, 22, '1', '300', '300', NULL, NULL, '318', '6'),
(34, 31, 23, '2', '1200', '2400', NULL, NULL, '2640', '10'),
(35, 32, 18, '2', '450', '900', NULL, NULL, '945', '5'),
(36, 33, 20, '1', '120000', '120000', NULL, NULL, '138000', '15'),
(37, 34, 22, '1', '300', '300', NULL, NULL, '1650', '10'),
(38, 34, 23, '1', '1200', '1200', NULL, NULL, '1650', '10');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_code`, `selling_price`, `root`, `buying_price`, `category_id`, `supplier_id`, `product_quantity`, `product_image`, `created_at`, `updated_at`) VALUES
(17, 'casual T-shirt', 'mens T-shirt', 'T01', '450', 'A', '400', 3, 6, '8', 'ims/products/1611059796.jpeg', '2021-01-19 06:36:36', '2021-01-19 06:36:36'),
(18, 'Tops', 'tops', 'TO1', '450', 'T', '320', 5, 7, '30', 'ims/products/1611059830.jpeg', '2021-01-19 06:37:10', '2021-01-19 06:37:10'),
(19, 'Canon 90D', '90', 'D-90', '76000', 'D', '74000', 7, 6, '0', 'ims/products/1611059874.jpeg', '2021-01-19 06:37:54', '2021-01-19 06:37:54'),
(20, 'Sony Alpha 7', 'dslr', 'S-7', '120000', 'S', '115000', 7, 6, '1', 'ims/products/1611059914.jpeg', '2021-01-19 06:38:35', '2021-01-19 06:38:35'),
(21, 'Shirt', 'mens shirt', 'SH-23', '750', 'S', '600', 4, 6, '0', 'ims/products/1611059946.jpeg', '2021-01-19 06:39:07', '2021-01-19 07:40:37'),
(22, 'Sleeve less T-shirt', 'shirt', 'SL-4', '300', 'S', '250', 3, 6, '7', 'ims/products/1611060023.jpeg', '2021-01-19 06:40:23', '2021-01-19 06:40:23'),
(23, 'Mens Shirt', 'shirt', 'M-56', '1200', 'S', '900', 4, 6, '28', 'ims/products/1611060075.jpeg', '2021-01-19 06:41:16', '2021-01-19 06:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `employee_name`, `employee_email`, `amount`, `month`, `year`, `created_at`, `updated_at`) VALUES
(3, 16, 'Nusrat Mim', 'rdxriad236@gmail.com', '20000', 'January', '2021', NULL, '2021-01-13 08:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sname`, `email`, `phone`, `nid`, `address`, `shop`, `photo`, `created_at`, `updated_at`) VALUES
(6, 'Riad', 'riadkhan2367@gmail.com', '01628132705', '19975624656565656', 'dhaka', 'RK Enterprise', 'ims/suppliers/1610116124.jpeg', '2021-01-08 08:28:44', '2021-01-08 08:28:44'),
(7, 'Nusrat Mim', 'mim@gmail.com', '01785654185', '19965415132165132', 'Gazipur', 'Unique Shop', 'ims/suppliers/1610116184.jpeg', '2021-01-08 08:29:44', '2021-01-08 08:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riad', 'admin@gmail.com', NULL, '$2y$10$JBGphp4WVmde.YotE89VAuFSt2AcfIvS8a05wcjv3Ap78QNI6y5IG', NULL, NULL, NULL),
(2, 'riad khan', 'admiwn@gmail.com', NULL, '$2y$10$b7af8JVvOiDfgCpFgU2oueWxbmDRt2SzXGtcbKs4IqE4K6GcTesMi', NULL, NULL, NULL),
(3, 'riad khangg', 'admiwfn@gmail.com', NULL, '$2y$10$WBUFD5lS9oBBD7c3g9mAQubn4Mo.lFIHCplXjEZjaWRPEiBaw4aaC', NULL, NULL, NULL),
(5, 'riad_khan', 'riadkhan2367@gmail.com', NULL, '$2y$10$3RJkXfA.IAghPxVG8DfE..H9ay9oMLNXowxk2SxkI4WcJwGZoOD/C', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
