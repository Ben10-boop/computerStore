-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 02:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wage` decimal(10,0) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `work_hours` int(11) DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `phone`, `birth_date`, `city`, `gender`, `status`, `level`, `wage`, `hire_date`, `work_hours`, `job`) VALUES
(11, 'Tomas', 'Tomaitis', 'user1@gmail.com', NULL, '$2y$10$hPSdQe0xsBeC649gFnXyN.72f2iGhvN2xBIp.xwTcYarBIwk7tEGW', NULL, '2021-12-05 09:33:15', '2021-12-05 09:33:15', 'Tomuxas', '+37069696969', '2021-12-01', 'Kaunas', 'Kita', 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(12, 'user', NULL, 'user2@gmail.com', NULL, '$2y$10$jfszNGw8c9H2XZ2.qguY9OYFS.i0o8ps.Jpa...nnyoIUaqLa4je.', NULL, '2021-12-05 10:26:21', '2021-12-05 10:26:21', 'admin', NULL, NULL, NULL, NULL, 'ištrintas', 'administratorius', NULL, NULL, NULL, NULL),
(13, 'user', NULL, 'admin@gmail.com', NULL, '$2y$10$vSeFYGuQ9cW3moHgtEhqPe/Wq8WsAsqMeDeTfJzMVZdiUAwD7zMZ6', NULL, '2021-12-07 08:13:56', '2021-12-07 08:13:56', 'admin', NULL, NULL, NULL, NULL, 'aktyvus', 'administratorius', NULL, NULL, NULL, NULL),
(14, 'employee', NULL, 'worker@gmail.com', NULL, '$2y$10$gOJxQBLeQheKZG8panOXNud/fJ76o4cBdFp.o2kciTEvXuBUxyZQ.', NULL, '2021-12-07 08:23:34', '2021-12-07 08:23:34', 'worker1', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', NULL, NULL, NULL, NULL),
(15, 'employee', NULL, 'worker2@gmail.com', NULL, '$2y$10$FC0Cq25CvwCFLjD/lO2n3.rv3jye9Kn62RplF6EJS2gK.OQJbHV2.', NULL, '2021-12-07 08:25:34', '2021-12-07 08:25:34', 'worker2', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', NULL, NULL, NULL, NULL),
(16, 'Antanas', 'Antanaitis', 'user3@gmail.com', NULL, '$2y$10$bwWngE6LGCWPHstl.Mu4TerBX5MQb8D0SxgEuYGqZ9DaryHji06fq', NULL, '2021-12-07 10:53:10', '2021-12-07 10:53:10', 'user3', '+37069696968', '2021-12-06', 'Vilnius', 'Vyras', 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(17, 'employee', NULL, 'worker3@gmail.com', NULL, '$2y$10$LzQVgj1EGKu1taik2AfVSudx20vsq5IRKhNuwYt57pgn6pOBT69Hm', NULL, '2021-12-07 11:24:37', '2021-12-07 11:24:37', 'worker3', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', '1000', '2021-12-07', 420, 'Šlavėjas');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
