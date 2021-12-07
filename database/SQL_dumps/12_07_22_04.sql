-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresai`
--

CREATE TABLE `adresai` (
  `id` int(11) NOT NULL,
  `gatve` varchar(100) NOT NULL,
  `namo_numeris` varchar(100) NOT NULL,
  `buto_numeris` varchar(100) NOT NULL,
  `rajonas` varchar(100) NOT NULL,
  `savivaldybe` varchar(100) NOT NULL,
  `pasto_kodas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimai`
--

CREATE TABLE `apmokejimai` (
  `id` int(100) NOT NULL,
  `numeris` int(100) NOT NULL,
  `data` date NOT NULL,
  `busena` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banko_korteles`
--

CREATE TABLE `banko_korteles` (
  `id` int(100) NOT NULL,
  `numeris` varchar(50) NOT NULL,
  `galiojimo_data` date NOT NULL,
  `cvv` varchar(30) NOT NULL,
  `korteles_savininkas` varchar(100) NOT NULL,
  `naudotojo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `garantijos`
--

CREATE TABLE `garantijos` (
  `id` int(100) NOT NULL,
  `teikejas` varchar(100) NOT NULL,
  `pradzios_data` date NOT NULL,
  `pabaigos_data` date NOT NULL,
  `salygos` date NOT NULL,
  `garantijos_tipas` varchar(100) NOT NULL,
  `kaina` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `garantijos_tipai`
--

CREATE TABLE `garantijos_tipai` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `garantijos_tipai`
--

INSERT INTO `garantijos_tipai` (`id`, `reiksme`) VALUES
(1, 'Pinigų gražinimo'),
(2, 'Prekės pakeitimo'),
(3, 'Prekės taisymo');

-- --------------------------------------------------------

--
-- Table structure for table `kainos`
--

CREATE TABLE `kainos` (
  `id` int(100) NOT NULL,
  `pradzios_data` date NOT NULL,
  `pabaigos_data` date NOT NULL,
  `suma` decimal(10,0) NOT NULL,
  `prekes_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(100) NOT NULL,
  `pavadinimas` varchar(100) NOT NULL,
  `aprasas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pareigos`
--

CREATE TABLE `pareigos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pareigos`
--

INSERT INTO `pareigos` (`id`, `reiksme`) VALUES
(1, 'Praktikantas'),
(2, 'Inventoriaus prižiūrėtojas'),
(3, 'Sistemos administratorius');

-- --------------------------------------------------------

--
-- Table structure for table `paskyros_busenos`
--

CREATE TABLE `paskyros_busenos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paskyros_busenos`
--

INSERT INTO `paskyros_busenos` (`id`, `reiksme`) VALUES
(1, 'Aktyvi'),
(2, 'Nepatvirtinta'),
(3, 'Užblokuota'),
(4, 'Pašalinta');

-- --------------------------------------------------------

--
-- Table structure for table `prekes`
--

CREATE TABLE `prekes` (
  `id` int(100) NOT NULL,
  `barkodas` varchar(100) NOT NULL,
  `aprasymas` varchar(10000) NOT NULL,
  `pagaminimo_salis` varchar(100) NOT NULL,
  `nuoroda_i_foto` varchar(1000) NOT NULL,
  `pagaminimo_metai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prekes_kategorijos`
--

CREATE TABLE `prekes_kategorijos` (
  `kategorijos_id` int(10) NOT NULL,
  `prekes_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statusai`
--

CREATE TABLE `statusai` (
  `id` int(100) NOT NULL,
  `reiksme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statusai`
--

INSERT INTO `statusai` (`id`, `reiksme`) VALUES
(1, 'Darbuotojas'),
(2, 'Administratorius'),
(3, 'Klientas');

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
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wage` decimal(10,0) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `work_hours` int(11) DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `phone`, `birth_date`, `city`, `gender`, `status`, `level`, `wage`, `hire_date`, `work_hours`, `job`) VALUES
(11, 'Tomas', 'Tomaitis', 'user1@gmail.com', NULL, '$2y$10$hPSdQe0xsBeC649gFnXyN.72f2iGhvN2xBIp.xwTcYarBIwk7tEGW', NULL, '2021-12-05 09:33:15', '2021-12-05 09:33:15', 'Tomuxas', '+37069696969', '2021-12-01', 'Kaunas', 'Kita', '0', '0', NULL, NULL, NULL, NULL),
(12, 'user', NULL, 'user2@gmail.com', NULL, '$2y$10$jfszNGw8c9H2XZ2.qguY9OYFS.i0o8ps.Jpa...nnyoIUaqLa4je.', NULL, '2021-12-05 10:26:21', '2021-12-05 10:26:21', 'admin', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(13, 'user', NULL, 'admin@gmail.com', NULL, '$2y$10$vSeFYGuQ9cW3moHgtEhqPe/Wq8WsAsqMeDeTfJzMVZdiUAwD7zMZ6', NULL, '2021-12-07 08:13:56', '2021-12-07 08:13:56', 'admin', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(14, 'employee', NULL, 'worker@gmail.com', NULL, '$2y$10$gOJxQBLeQheKZG8panOXNud/fJ76o4cBdFp.o2kciTEvXuBUxyZQ.', NULL, '2021-12-07 08:23:34', '2021-12-07 08:23:34', 'worker1', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(15, 'employee', NULL, 'worker2@gmail.com', NULL, '$2y$10$FC0Cq25CvwCFLjD/lO2n3.rv3jye9Kn62RplF6EJS2gK.OQJbHV2.', NULL, '2021-12-07 08:25:34', '2021-12-07 08:25:34', 'worker2', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
(16, 'Antanas', 'Antanaitis', 'user3@gmail.com', NULL, '$2y$10$bwWngE6LGCWPHstl.Mu4TerBX5MQb8D0SxgEuYGqZ9DaryHji06fq', NULL, '2021-12-07 10:53:10', '2021-12-07 10:53:10', 'user3', '+37069696968', '2021-12-06', 'Vilnius', 'Vyras', '0', '0', NULL, NULL, NULL, NULL),
(17, 'employee', NULL, 'worker3@gmail.com', NULL, '$2y$10$LzQVgj1EGKu1taik2AfVSudx20vsq5IRKhNuwYt57pgn6pOBT69Hm', NULL, '2021-12-07 11:24:37', '2021-12-07 11:24:37', 'worker3', NULL, NULL, NULL, NULL, '0', '0', '1000', '2021-12-07', 420, 'Šlavėjas');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymai`
--

CREATE TABLE `uzsakymai` (
  `id` int(100) NOT NULL,
  `data` date NOT NULL,
  `busena` varchar(20) NOT NULL,
  `skubus` tinyint(1) NOT NULL,
  `nuolaidos_kodas` varchar(30) NOT NULL,
  `apmokejimo_id` int(10) NOT NULL,
  `patvirtinusio_naudotojo_id` int(10) NOT NULL,
  `pateikusio_naudotojo_id` int(10) NOT NULL,
  `adreso_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_busenos`
--

CREATE TABLE `uzsakymo_busenos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsakymo_busenos`
--

INSERT INTO `uzsakymo_busenos` (`id`, `reiksme`) VALUES
(1, 'Laukiantis'),
(2, 'Patvirtintas'),
(3, 'Atšauktas');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_preke`
--

CREATE TABLE `uzsakymo_preke` (
  `id` int(100) NOT NULL,
  `kiekis` int(100) NOT NULL,
  `garantija_id` int(100) NOT NULL,
  `uzsakymas_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresai`
--
ALTER TABLE `adresai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apmokejimai`
--
ALTER TABLE `apmokejimai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banko_korteles`
--
ALTER TABLE `banko_korteles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garantijos`
--
ALTER TABLE `garantijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garantijos_tipai`
--
ALTER TABLE `garantijos_tipai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kainos`
--
ALTER TABLE `kainos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pareigos`
--
ALTER TABLE `pareigos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paskyros_busenos`
--
ALTER TABLE `paskyros_busenos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prekes_kategorijos`
--
ALTER TABLE `prekes_kategorijos`
  ADD PRIMARY KEY (`kategorijos_id`,`prekes_id`);

--
-- Indexes for table `statusai`
--
ALTER TABLE `statusai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzsakymo_busenos`
--
ALTER TABLE `uzsakymo_busenos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzsakymo_preke`
--
ALTER TABLE `uzsakymo_preke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresai`
--
ALTER TABLE `adresai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apmokejimai`
--
ALTER TABLE `apmokejimai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banko_korteles`
--
ALTER TABLE `banko_korteles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garantijos`
--
ALTER TABLE `garantijos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garantijos_tipai`
--
ALTER TABLE `garantijos_tipai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kainos`
--
ALTER TABLE `kainos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pareigos`
--
ALTER TABLE `pareigos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paskyros_busenos`
--
ALTER TABLE `paskyros_busenos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prekes`
--
ALTER TABLE `prekes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusai`
--
ALTER TABLE `statusai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzsakymo_busenos`
--
ALTER TABLE `uzsakymo_busenos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uzsakymo_preke`
--
ALTER TABLE `uzsakymo_preke`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
