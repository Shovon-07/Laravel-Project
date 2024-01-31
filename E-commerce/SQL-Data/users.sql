-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 04:43 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Otp` varchar(10) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `Otp`, `Img`, `created_at`, `updated_at`) VALUES
(1, 'shovon', 'mman35230@gmail.com', '$2y$12$gFqMIzGhgxDAWSKPqdW7N.1oBSz.vm3F1j2uGMABVzYdJfYPhYCzG', '0', '1706452131_1a92634d570da79d1bf767594150b9d4_web-page.jpg_2651adcefafae16afe99def8c1236246.jpg', '2024-01-28 08:24:32', '2024-01-31 05:39:50'),
(2, 'zakia', 'zakiasurovi896@gmail.com', '$2y$12$M4TnPJ0kvTKTWrrdtdw/qumS4qS4a5JanltUts/5n934f.W2vNPMy', '0', 'avater.png', '2024-01-28 11:49:44', '2024-01-28 11:49:44'),
(4, 'Asik', 'asik@gmail.com', '$2y$12$rs2exR5.DYCKK39joI4Tw.5nhigb3/d.WW0rxLVqHIQqXjQyN65Z6', '0', 'avater.png', '2024-01-30 08:15:27', '2024-01-30 08:18:14'),
(5, 'Jony', 'jony@gmail.com', '$2y$12$pCJYbVB8KClnhWoMjAVBouFnyWu/XjIx7W.fiiHK9eim/AKljxKUK', '0', 'avater.png', '2024-01-30 08:22:30', '2024-01-30 08:22:30');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
