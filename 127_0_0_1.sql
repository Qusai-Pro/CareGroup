-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2025 at 07:32 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `phone`, `email`, `doctor`, `date`, `time`, `message`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 'Qusai', '0333333333333333', 'qusaimadinawala@gmail.com', 'Dr. Qusai', '2025-05-08', '00:00:00', 'h', 'Confirmed', 1, '2025-05-30 04:32:10', '2025-06-12 08:03:55'),
(10, 'Qusai', '123', 'qusaimadinawala@gmail.com', 'Dr. Qusai', '2025-05-28', '00:00:00', 'gh', 'Confirmed', 1, '2025-05-28 08:16:21', '2025-05-28 08:17:31'),
(14, 'muzzamil', '03333333333', 'qusaimadinawala@gmail.com', 'Dr. Qusai', '2025-06-12', '12:00:00', 'I hv pain in ears', 'Completed', 1, '2025-06-12 12:36:40', '2025-06-12 14:09:11'),
(15, 'Qusai', '03333333333', 'qusai2405d@aptechgdn.net', 'Dr. Qusai', '2025-06-20', '18:00:00', 'i have pain shoulders', 'In progress', 4, '2025-06-12 12:48:45', '2025-06-12 12:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `email`, `phone`, `contact`, `city`, `district`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Dr. Qusai', 'ENT', 'qusai2405d@aptechgdn.net', '03333333333', '03333333333', 'Karachi', 'Saddar', 'uploads/doctors/1749750727.png', '2025-05-27 10:22:27', '2025-06-12 12:52:07'),
(6, 'Dr. Fatima', 'Pediatrician', 'fatima2405d@aptechgdn.net', '03111234567', '03111234567', 'Karachi', 'DHA Phase 2', 'uploads/doctors/1748361228_pngwing.com (5).png', '2025-05-27 10:53:48', '2025-05-27 10:53:48'),
(7, 'Dr. Usman', 'Dermatologist', 'usman2405d@aptechgdn.net', '03451234567', '03451234567', 'Karachi', 'Gulshan-e-Iqbal', 'uploads/doctors/1748361289_pngwing.com.png', '2025-05-27 10:54:49', '2025-05-27 10:54:49'),
(8, 'Dr. Sana', 'Gynecologist', 'sana2405d@aptechgdn.net', '03211234567', '03211234567', 'Karachi', 'Korangi', 'uploads/doctors/1748361345_pngwing.com (1).png', '2025-05-27 10:55:45', '2025-05-27 10:55:45'),
(9, 'Dr. Farhan', 'Dentist', 'farhan2405d@aptechgdn.net', '03021234567', '03021234567', 'Islamabad', 'G-9', 'uploads/doctors/1748361404_pngwing.com.png', '2025-05-27 10:56:44', '2025-05-27 10:56:44'),
(10, 'Dr. Hina', 'Psychiatrist', 'hina2405d@aptechgdn.net', '03551234567', '03551234567', 'Karachi', 'Malir', 'uploads/doctors/1748361493_pngwing.com (4).png', '2025-05-27 10:58:13', '2025-05-27 10:58:13'),
(11, 'Dr. Bilal', 'Orthopedic Surgeon', 'bilal2405d@aptechgdn.net', '03611234567', '03611234567', 'Lahore', 'Gulberg', 'uploads/doctors/1748361740_pngwing.com (7).png', '2025-05-27 11:02:20', '2025-05-27 11:02:20'),
(12, 'Dr. Adeel', 'Cardiologist', 'adeel2405d@aptechgdn.net', '03041234567', '03041234567', 'Peshawar', 'University Town', 'uploads/doctors/1748361882_pngwing.com (6).png', '2025-05-27 11:04:42', '2025-05-27 11:04:42'),
(13, 'muzzamil', 'Dermatologist', 'Admin@gmail.com', '120', '0333333333333333', 'Karachi', 'saddar', 'uploads/doctors/1748420087_team1.png', '2025-05-28 03:14:47', '2025-05-28 05:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2025_05_26_075758_create_sessions_table', 2),
(7, '2025_05_27_083905_create_doctors_table', 3),
(8, '2025_05_27_164223_create_appointments_table', 4),
(9, '2025_05_28_151210_create_patient_records_table', 5),
(10, '2025_05_30_100404_add_availability_to_doctors_table', 6),
(11, '2025_05_30_103516_add_time_to_appointments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

DROP TABLE IF EXISTS `patient_records`;
CREATE TABLE IF NOT EXISTS `patient_records` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `report_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medications` text COLLATE utf8mb4_unicode_ci,
  `past_record` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_records_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`id`, `user_id`, `report_file`, `medications`, `past_record`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/reports/1748446931_report.pdf', 'Panadol, ORS', 'Fever (Jan 2025)', '2025-05-28 10:42:11', '2025-05-28 10:42:11'),
(2, 5, 'uploads/reports/1749731046_1748446931_report.pdf', 'OCR', 'OCR', '2025-06-12 07:24:06', '2025-06-12 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rbWFQ9Yz7So9fIFtLb33BWwFlSsQ6mvLf5TlBX3X', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ1haa3Y4U2JxNXZ5ZDVPZkR6ZHlONVVqT1N2TGtsM3lNUFB2cVdZWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZGQtYXBwb2ludG1lbnQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDZZRENUTGRZTUJxM25pelVZVm41OWUvMkdlRlJSU3kwZmdmS1YyeUt0QWV6M0RuWi9oVnRTIjt9', 1749755649),
('boYmQtf42i9gaA9X6XpbwJmnFG9MtCZ9RS8vnXMa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGFEQUxES09WeVJJUVR0UEZNMnloNklmWUsyUzh3b3JEUEFPa2l2OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749755158);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '123', 'Aptech GDN Garden', '0', NULL, '$2y$10$6YDCTLdYMBq3nizUYVn59e/2GeFRRSy0fgfKV2yKtAez3DnZ/hVtS', NULL, NULL, NULL, NULL, '2025-05-26 08:58:56', '2025-05-26 08:58:56'),
(2, 'Admin', 'admin@gmail.com', '123', 'Aptech GDN Garden', '1', NULL, '$2y$10$.LE.ChnnGxeqCzTV3JU8Ou4vFTgoPfpgaxuTsKsXO0nqnGbnn/iKm', NULL, NULL, NULL, NULL, '2025-05-26 09:00:40', '2025-05-26 09:00:40'),
(3, 'Doctor', 'doctor@gmail.com', '0000000000', 'Aptech GDN', '2', NULL, '$2y$10$buc6dNq/cWMZyq3GCkF.x.KnLqE6B63PZXxrATUD4GhwuF5H.4fg.', NULL, NULL, NULL, NULL, '2025-05-30 04:17:11', '2025-05-30 04:17:11'),
(4, 'Dr. Qusai', 'qusai2405d@aptechgdn.net', '03333333333', 'Karachi Saddar', '2', NULL, '$2y$10$H86oxMOa2xiDwt3DTWPEi.f8HEO9GWcD1SzK9M02YcUMUHhjS/6dq', NULL, NULL, NULL, NULL, '2025-05-30 04:30:27', '2025-05-30 04:30:27'),
(5, 'Qusai', 'qusai@gmail.com', '0333333333333333', 'Aptech GDN Garden', '0', NULL, '$2y$10$lFMPzcPaCO9GfYqAqtvbZuJbR4i0nDit.x4jIbUmK4UVWFWEoFOWK', NULL, NULL, NULL, NULL, '2025-06-12 01:59:40', '2025-06-12 01:59:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
