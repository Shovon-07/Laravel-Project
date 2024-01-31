-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 04:44 PM
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
-- Database: `Laravel_E_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BrandName` varchar(50) NOT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `CategoryId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `BrandName`, `UserId`, `CategoryId`, `created_at`, `updated_at`) VALUES
(5, 'Samsung', 1, 78, '2024-01-30 06:45:32', '2024-01-30 06:45:32'),
(6, 'Apple', 1, 78, '2024-01-30 06:45:50', '2024-01-30 06:45:50'),
(7, 'Electric heater', 1, 81, '2024-01-30 07:07:03', '2024-01-30 07:07:03'),
(9, 'HP', 1, 78, '2024-01-30 07:10:15', '2024-01-30 07:10:15'),
(11, 'Asus', 1, 78, '2024-01-30 07:32:43', '2024-01-30 07:55:23'),
(14, 'Rice cooker', 1, 81, '2024-01-30 07:34:01', '2024-01-30 07:34:01'),
(15, 'Men style', 1, 79, '2024-01-30 07:59:33', '2024-01-31 06:11:10'),
(16, 'Linovo', 1, 78, '2024-01-30 08:01:07', '2024-01-31 07:46:24'),
(18, 'Brand 1 (Asik->Category 1)', 4, 97, '2024-01-30 08:20:22', '2024-01-30 08:25:31'),
(19, 'Brand 2 (Asik->Category 1)', 4, 97, '2024-01-30 08:20:29', '2024-01-30 08:25:46'),
(20, 'Brand 3 (Asik->Category 1)', 4, 97, '2024-01-30 08:20:35', '2024-01-30 08:25:53'),
(22, 'Brand 1 (Asik->Category 2)', 4, 98, '2024-01-30 08:21:17', '2024-01-30 08:21:17'),
(23, 'Brand 2 (Asik->Category 2)', 4, 98, '2024-01-30 08:21:29', '2024-01-30 08:21:29'),
(24, 'Brand 1 (Jony->Category 1)', 5, 101, '2024-01-30 08:24:06', '2024-01-30 08:24:06'),
(25, 'Brand 2 (Jony->Category 1)', 5, 101, '2024-01-30 08:24:13', '2024-01-30 08:24:13'),
(34, 'Pampers', 1, 82, '2024-01-31 09:40:56', '2024-01-31 09:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_userid_foreign` (`UserId`),
  ADD KEY `brands_categoryid_foreign` (`CategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_categoryid_foreign` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `brands_userid_foreign` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
