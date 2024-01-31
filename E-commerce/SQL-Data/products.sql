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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductTitle` varchar(50) NOT NULL,
  `ProductDescription` longtext NOT NULL,
  `ProductPrice` varchar(20) NOT NULL,
  `ProductStock` varchar(20) NOT NULL,
  `ProductImg` varchar(255) DEFAULT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `CategoryId` bigint(20) UNSIGNED NOT NULL,
  `BrandId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProductName`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductStock`, `ProductImg`, `UserId`, `CategoryId`, `BrandId`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Core i5 11 gen HP laptop', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis libero doloremque doloribus qui temporibus quam eaque voluptate at quaerat. Tenetur voluptatem earum molestiae dolore beatae dolor ut unde iste provident nulla deleniti rem cupiditate, maxime nesciunt officiis debitis officia magnam vitae quae. Voluptatem, atque temporibus in doloremque voluptates aliquam alias?', '110000', '40', NULL, 1, 78, 9, '2024-01-31 06:53:45', '2024-01-31 06:53:45'),
(2, 'Laptop', 'Rayzen HP laptop', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis libero doloremque doloribus qui temporibus quam eaque voluptate at quaerat. Tenetur voluptatem earum molestiae dolore beatae dolor ut unde iste provident nulla deleniti rem cupiditate, maxime nesciunt officiis debitis officia magnam vitae quae. Voluptatem, atque temporibus in doloremque voluptates aliquam alias?', '130000', '50', NULL, 1, 78, 9, '2024-01-31 06:54:41', '2024-01-31 06:54:41'),
(3, 'Pangabi', 'Full cotton Pangabi', 'Lorem ipsum dolor. Maxime nesciunt officiis debitis officia magnam vitae quae. Voluptatem, atque temporibus in doloremque voluptates aliquam alias?', '1200', '20', NULL, 1, 79, 15, '2024-01-31 06:58:27', '2024-01-31 06:58:27'),
(4, 'Desktop', 'Rayzen amd with gpu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dicta eius ea maxime ut eligendi accusantium in repellendus voluptatem temporibus?', '130000', '20', NULL, 1, 78, 5, '2024-01-31 09:31:29', '2024-01-31 09:31:29'),
(5, 'Desktop', 'Mac book', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dicta eius ea maxime ut eligendi', '350000', '30', NULL, 1, 78, 6, '2024-01-31 09:32:31', '2024-01-31 09:32:31'),
(6, 'Desktop', 'Elite mac book pro', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '460000', '10', NULL, 1, 78, 6, '2024-01-31 09:33:07', '2024-01-31 09:33:07'),
(7, 'Diaper', '30 pics Diaper', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Volu.', '350', '120', NULL, 1, 82, 34, '2024-01-31 09:41:43', '2024-01-31 09:41:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_userid_foreign` (`UserId`),
  ADD KEY `products_categoryid_foreign` (`CategoryId`),
  ADD KEY `products_brandid_foreign` (`BrandId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brandid_foreign` FOREIGN KEY (`BrandId`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_userid_foreign` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
