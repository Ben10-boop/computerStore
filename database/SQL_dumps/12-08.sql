-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 01:08 PM
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
-- Table structure for table `adresas`
--

CREATE TABLE `adresas` (
  `id` int(11) NOT NULL,
  `gatve` varchar(100) NOT NULL,
  `namo_numeris` varchar(100) NOT NULL,
  `buto_numeris` varchar(100) NOT NULL,
  `rajonas` varchar(100) NOT NULL,
  `savivaldybe` varchar(100) NOT NULL,
  `pasto_kodas` varchar(100) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresas`
--

INSERT INTO `adresas` (`id`, `gatve`, `namo_numeris`, `buto_numeris`, `rajonas`, `savivaldybe`, `pasto_kodas`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'lol', 'lol', 'lol', 'lol', 'lol', 'lol', 17, '2021-12-08 09:57:39', '2021-12-08 09:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimas`
--

CREATE TABLE `apmokejimas` (
  `id` int(100) NOT NULL,
  `numeris` int(100) NOT NULL,
  `data` date NOT NULL,
  `busena` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `naudotojo_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `kaina` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `garantijos_tipas`
--

CREATE TABLE `garantijos_tipas` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `garantijos_tipas`
--

INSERT INTO `garantijos_tipas` (`id`, `reiksme`, `created_at`, `updated_at`) VALUES
(1, 'Pinigų gražinimo', NULL, NULL),
(2, 'Prekės pakeitimo', NULL, NULL),
(3, 'Prekės taisymo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kainos`
--

CREATE TABLE `kainos` (
  `id` int(100) NOT NULL,
  `pradzios_data` date NOT NULL,
  `pabaigos_data` date NOT NULL,
  `suma` decimal(10,0) NOT NULL,
  `prekes_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(100) NOT NULL,
  `pavadinimas` varchar(100) NOT NULL,
  `aprasas` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_29_143709_add_username_to_users_table', 2),
(6, '2021_11_29_144235_add_username_to_users_table_again', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pareigos`
--

CREATE TABLE `pareigos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pareigos`
--

INSERT INTO `pareigos` (`id`, `reiksme`, `created_at`, `updated_at`) VALUES
(1, 'Praktikantas', NULL, NULL),
(2, 'Inventoriaus prižiūrėtojas', NULL, NULL),
(3, 'Sistemos administratorius', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paskyros_busenos`
--

CREATE TABLE `paskyros_busenos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paskyros_busenos`
--

INSERT INTO `paskyros_busenos` (`id`, `reiksme`, `created_at`, `updated_at`) VALUES
(1, 'Aktyvi', NULL, NULL),
(2, 'Nepatvirtinta', NULL, NULL),
(3, 'Užblokuota', NULL, NULL),
(4, 'Pašalinta', NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `pagaminimo_metai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prekes_kategorijos`
--

CREATE TABLE `prekes_kategorijos` (
  `kategorijos_id` int(10) NOT NULL,
  `prekes_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statusas`
--

CREATE TABLE `statusas` (
  `id` int(100) NOT NULL,
  `reiksme` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statusas`
--

INSERT INTO `statusas` (`id`, `reiksme`, `created_at`, `updated_at`) VALUES
(1, 'Darbuotojas', NULL, NULL),
(2, 'Administratorius', NULL, NULL),
(3, 'Klientas', NULL, NULL);

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
(11, 'Tomas', 'Tomaitis', 'user1@gmail.com', '2021-12-08 09:23:21', '$2y$10$hPSdQe0xsBeC649gFnXyN.72f2iGhvN2xBIp.xwTcYarBIwk7tEGW', NULL, '2021-12-05 09:33:15', '2021-12-08 09:23:21', 'Tomuxas', '+37069696969', '2021-12-01', 'Kaunas', 'Kita', 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(12, 'user', NULL, 'user2@gmail.com', NULL, '$2y$10$jfszNGw8c9H2XZ2.qguY9OYFS.i0o8ps.Jpa...nnyoIUaqLa4je.', NULL, '2021-12-05 10:26:21', '2021-12-05 10:26:21', 'admin', NULL, NULL, NULL, NULL, 'ištrintas', 'administratorius', NULL, NULL, NULL, NULL),
(13, 'user', NULL, 'admin@gmail.com', '2021-12-08 09:23:57', '$2y$10$vSeFYGuQ9cW3moHgtEhqPe/Wq8WsAsqMeDeTfJzMVZdiUAwD7zMZ6', NULL, '2021-12-07 08:13:56', '2021-12-08 09:23:57', 'admin', NULL, NULL, NULL, NULL, 'aktyvus', 'administratorius', NULL, NULL, NULL, NULL),
(14, 'employee', NULL, 'worker@gmail.com', '2021-12-08 09:24:58', '$2y$10$gOJxQBLeQheKZG8panOXNud/fJ76o4cBdFp.o2kciTEvXuBUxyZQ.', NULL, '2021-12-07 08:23:34', '2021-12-08 09:24:58', 'worker1', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', NULL, NULL, NULL, NULL),
(15, 'employee', NULL, 'worker2@gmail.com', NULL, '$2y$10$FC0Cq25CvwCFLjD/lO2n3.rv3jye9Kn62RplF6EJS2gK.OQJbHV2.', NULL, '2021-12-07 08:25:34', '2021-12-07 08:25:34', 'worker2', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', NULL, NULL, NULL, NULL),
(16, 'Antanas', 'Antanaitis', 'user3@gmail.com', NULL, '$2y$10$bwWngE6LGCWPHstl.Mu4TerBX5MQb8D0SxgEuYGqZ9DaryHji06fq', NULL, '2021-12-07 10:53:10', '2021-12-07 10:53:10', 'user3', '+37069696968', '2021-12-06', 'Vilnius', 'Vyras', 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(17, 'employee', NULL, 'worker3@gmail.com', '2021-12-08 09:25:31', '$2y$10$LzQVgj1EGKu1taik2AfVSudx20vsq5IRKhNuwYt57pgn6pOBT69Hm', NULL, '2021-12-07 11:24:37', '2021-12-08 09:25:31', 'worker3', NULL, NULL, NULL, NULL, 'aktyvus', 'darbuotojas', '1000', '2021-12-07', 420, 'Šlavėjas'),
(18, 'user', NULL, 'user100@gmail.com', NULL, '$2y$10$ax3dLmHTRhVmGbiL.LLQ4ed5PnH/hYdimY9Rmply07mg.zzFs5moy', NULL, '2021-12-07 11:27:11', '2021-12-07 11:27:11', 'user100', NULL, NULL, NULL, NULL, 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(19, 'user', NULL, 'user10@gmail.com', NULL, '$2y$10$N/fALFvKAZISUUP88iINBOyiL0LLr.lE6lxF0HbQ98GKttdawntcu', NULL, '2021-12-08 07:07:30', '2021-12-08 07:07:30', 'User10', NULL, NULL, NULL, NULL, 'aktyvus', 'klientas', NULL, NULL, NULL, NULL),
(24, 'user', NULL, 'petriux00@gmail.com', '2021-12-08 08:31:24', '$2y$10$sjlAsZMNkCA00dBYFKna..0sooJBNKNleXcQlvSyvhM2o2GIZ68u.', NULL, '2021-12-08 08:31:07', '2021-12-08 08:31:24', 'PetrasTikras', NULL, NULL, NULL, NULL, 'aktyvus', 'klientas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymas`
--

CREATE TABLE `uzsakymas` (
  `id` int(100) NOT NULL,
  `data` date NOT NULL,
  `busena` varchar(20) NOT NULL,
  `skubus` tinyint(1) NOT NULL,
  `nuolaidos_kodas` varchar(30) NOT NULL,
  `apmokejimo_id` int(10) NOT NULL,
  `patvirtinusio_naudotojo_id` int(10) NOT NULL,
  `pateikusio_naudotojo_id` int(10) NOT NULL,
  `adreso_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_busenos`
--

CREATE TABLE `uzsakymo_busenos` (
  `id` int(10) NOT NULL,
  `reiksme` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsakymo_busenos`
--

INSERT INTO `uzsakymo_busenos` (`id`, `reiksme`, `created_at`, `updated_at`) VALUES
(1, 'Laukiantis', NULL, NULL),
(2, 'Patvirtintas', NULL, NULL),
(3, 'Atšauktas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_preke_s`
--

CREATE TABLE `uzsakymo_preke_s` (
  `id` int(100) NOT NULL,
  `kiekis` int(100) NOT NULL,
  `garantija_id` int(100) NOT NULL,
  `uzsakymas_id` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresas`
--
ALTER TABLE `adresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banko_korteles`
--
ALTER TABLE `banko_korteles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `garantijos`
--
ALTER TABLE `garantijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garantijos_tipas`
--
ALTER TABLE `garantijos_tipas`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `statusas`
--
ALTER TABLE `statusas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzsakymo_busenos`
--
ALTER TABLE `uzsakymo_busenos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzsakymo_preke_s`
--
ALTER TABLE `uzsakymo_preke_s`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresas`
--
ALTER TABLE `adresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banko_korteles`
--
ALTER TABLE `banko_korteles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garantijos`
--
ALTER TABLE `garantijos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garantijos_tipas`
--
ALTER TABLE `garantijos_tipas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kainos`
--
ALTER TABLE `kainos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
