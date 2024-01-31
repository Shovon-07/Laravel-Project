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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `CategoryName`, `UserId`, `created_at`, `updated_at`) VALUES
(78, 'Computer & laptops', 1, '2024-01-30 05:14:50', '2024-01-30 05:14:50'),
(79, 'Men\'s & fashions', 1, '2024-01-30 05:15:12', '2024-01-30 05:15:12'),
(80, 'Women\'s & fashions', 1, '2024-01-30 05:15:16', '2024-01-30 05:15:16'),
(81, 'Home appliences', 1, '2024-01-30 05:15:26', '2024-01-30 05:15:26'),
(82, 'Baby\'s fashions', 1, '2024-01-30 05:15:42', '2024-01-30 08:55:13'),
(85, 'Outdoor', 1, '2024-01-30 05:20:38', '2024-01-30 06:36:17'),
(97, 'Category 1 (Asik)', 4, '2024-01-30 08:19:23', '2024-01-30 08:19:23'),
(98, 'Category 2 (Asik)', 4, '2024-01-30 08:19:30', '2024-01-30 08:19:49'),
(99, 'Category 3 (Asik)', 4, '2024-01-30 08:19:37', '2024-01-30 08:19:37'),
(101, 'Category 1 (Jony)', 5, '2024-01-30 08:23:05', '2024-01-30 08:23:05'),
(102, 'Category 2 (Jony)', 5, '2024-01-30 08:23:11', '2024-01-30 08:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_userid_foreign` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_userid_foreign` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
