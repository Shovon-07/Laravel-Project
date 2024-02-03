-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2024 at 05:30 AM
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
(1, 'Computer & Accessories', 1, '2024-02-02 20:26:05', '2024-02-02 21:51:27'),
(2, 'Men\'s & fashions', 1, '2024-02-02 20:26:30', '2024-02-02 22:11:32'),
(3, 'Women\'s & fashions', 1, '2024-02-02 21:30:14', '2024-02-02 21:30:14'),
(4, 'Home appliances', 1, '2024-02-02 21:31:50', '2024-02-02 21:31:50'),
(5, 'Baby\'s & toys', 1, '2024-02-02 21:32:23', '2024-02-02 21:32:23'),
(6, 'Outdoor', 1, '2024-02-02 21:33:46', '2024-02-02 21:33:46'),
(7, 'Electrical equipment', 1, '2024-02-02 21:34:45', '2024-02-02 22:10:47'),
(17, 'Electronics equipment', 1, '2024-02-02 22:11:01', '2024-02-02 22:15:03'),
(18, 'Indoor games', 1, '2024-02-02 22:15:29', '2024-02-02 22:15:29'),
(19, 'Watchs & Wallet', 1, '2024-02-02 22:16:15', '2024-02-02 22:16:30'),
(20, 'Glasses', 1, '2024-02-02 22:16:43', '2024-02-02 22:16:43'),
(21, 'Asik\'s category 1', 2, '2024-02-02 22:25:25', '2024-02-02 22:26:11'),
(22, 'Asik\'s category 2', 2, '2024-02-02 22:25:31', '2024-02-02 22:25:31'),
(23, 'Asik\'s category 3', 2, '2024-02-02 22:25:37', '2024-02-02 22:25:37'),
(24, 'Asik\'s category 4', 2, '2024-02-02 22:25:57', '2024-02-02 22:25:57'),
(25, 'Jony\'s category 1', 3, '2024-02-02 22:28:45', '2024-02-02 22:28:45'),
(26, 'Jony\'s category 2', 3, '2024-02-02 22:28:50', '2024-02-02 22:28:50');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_02_022402_create_users_table', 1),
(3, '2024_02_03_021250_create_categories_table', 2);

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
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Otp` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `Mobile`, `Img`, `Otp`, `created_at`, `updated_at`) VALUES
(1, 'shovon', 'mman35230@gmail.com', '$2y$12$4pGDs5B.aXjH8m8N2vfuhObAFnoofEL0sDYo2vZi.l3.6yZYp2pbW', '01941709431', 'images/user/f5c68376d96fdab90a140a49c7e4c946-1706929940-WipeOut50_21_2023_045020.759000.jpg', '0', '2024-02-01 20:37:30', '2024-02-02 21:12:20'),
(2, 'Asik', 'asik@gmail.com', '$2y$12$QY/dDPu6kSQ0eoYSki3ZburHnrH4kCNYPLgAgW0P/V1SyYSFMEL9y', '0', 'images/user/215af4cf69d6426b54cb0557793682d4-1706934231-Man&Doller.png', '0', '2024-02-01 20:54:08', '2024-02-02 22:23:51'),
(3, 'Jony', 'jony@gmail.com', '$2y$12$5phGC55fZtl0E3u84xXt3eCbfPBdPNZoyTpAJpr4DPlc8i7EOFC0W', '0', '/images/avater.png', '0', '2024-02-01 21:01:29', '2024-02-02 16:42:09');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
