-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 31 Jan 2025 pada 08.13
-- Versi server: 8.3.0
-- Versi PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pavilion_restaurant`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guests`
--

DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` bigint DEFAULT NULL,
  `iduka_prodi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respons` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` text COLLATE utf8mb4_unicode_ci,
  `check_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guests_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guests`
--

INSERT INTO `guests` (`id`, `name`, `number_phone`, `iduka_prodi`, `company_name`, `respons`, `qr_code`, `check_in`, `username`, `url`, `created_at`, `updated_at`) VALUES
(18, 'Yayuk', NULL, 'SMP', 'SMPN 17', 'Belum ada respon', NULL, 'Belum Check-In', 'yayuk_smpn_17', NULL, '2025-01-31 00:59:49', '2025-01-31 00:59:49'),
(19, 'Wantoro', NULL, 'SMP', 'SMP Dharma Wanita', 'Belum ada respon', NULL, 'Belum Check-In', 'wantoro_smp_dharma_wanita', NULL, '2025-01-31 01:00:27', '2025-01-31 01:00:27'),
(20, 'Ida Ayu Laksmi Dewi', NULL, 'GURU SMKTAG', 'Kepala Sekolah', 'Belum ada respon', NULL, 'Belum Check-In', 'ida_kepala_sekolah', NULL, '2025-01-31 01:09:22', '2025-01-31 01:09:22'),
(21, 'Ida Bagus Anuraga Kartika', NULL, 'GURU SMKTAG', 'Ketua Yayasan', 'Belum ada respon', NULL, 'Belum Check-In', 'ida_ketua_yayasan', NULL, '2025-01-31 01:09:58', '2025-01-31 01:09:58'),
(22, 'Fadlur Rochman', NULL, 'GURU SMKTAG', 'Waka.Kurikulum', 'Belum ada respon', NULL, 'Belum Check-In', 'fadlur_waka_kurikulum', NULL, '2025-01-31 01:10:50', '2025-01-31 01:10:50'),
(23, 'Westi Widyanigrum', NULL, 'GURU SMKTAG', 'Waka.Kesiswaan', 'Belum ada respon', NULL, 'Belum Check-In', 'westi_waka_kesiswaan', NULL, '2025-01-31 01:11:34', '2025-01-31 01:11:34'),
(4, 'Nanda Rizky Baadilah', NULL, 'RPL', 'CV rizky Barokah', 'Belum ada respon', NULL, 'Belum Check-In', 'nanda_rpl_rizky_barokah', NULL, '2025-01-31 00:49:09', '2025-01-31 00:49:09'),
(5, 'Yosef', NULL, 'RPL', 'Quantum Leap', 'Belum ada respon', NULL, 'Belum Check-In', 'yosef_quantum_leap', NULL, '2025-01-31 00:49:54', '2025-01-31 00:49:54'),
(6, 'Darian', NULL, 'RPL', 'PT Radnet Digital Indonesia', 'Belum ada respon', NULL, 'Belum Check-In', 'darian_pt_radnet_digital_indonesia', NULL, '2025-01-31 00:50:39', '2025-01-31 00:50:39'),
(7, 'Rully Kususma Dayu', NULL, 'TB', 'Mie Burung Dara', 'Belum ada respon', NULL, 'Belum Check-In', 'rully_mie_burung_dara', NULL, '2025-01-31 00:51:18', '2025-01-31 00:51:18'),
(8, 'Brahmasto', NULL, 'TB', 'Mie Burung Dara', 'Belum ada respon', NULL, 'Belum Check-In', 'brahmasto_mie_burung_dara', NULL, '2025-01-31 00:51:56', '2025-01-31 00:51:56'),
(9, 'Anisa', NULL, 'TB', 'Wali Murid', 'Belum ada respon', NULL, 'Belum Check-In', 'anisa_wali_murid', NULL, '2025-01-31 00:52:45', '2025-01-31 00:52:45'),
(10, 'Lyna', NULL, 'PH', 'DEKA HOTEL', 'Belum ada respon', NULL, 'Belum Check-In', 'lyna_deka_hotel', NULL, '2025-01-31 00:53:15', '2025-01-31 00:53:15'),
(11, 'Okta', NULL, 'PH', 'Santika Premiere Gubeng', 'Belum ada respon', NULL, 'Belum Check-In', 'okta_santika_premiere_gubeng', NULL, '2025-01-31 00:54:22', '2025-01-31 00:54:22'),
(12, 'Lia', NULL, 'PH', 'Aston Inn Jemursari', 'Belum ada respon', NULL, 'Belum Check-In', 'lia_aston_inn_jemursari', NULL, '2025-01-31 00:55:18', '2025-01-31 00:55:18'),
(13, 'Syamsul Arief', NULL, 'ULW', 'PT. AN NAMIROH TRAVELINDO', 'Belum ada respon', NULL, 'Belum Check-In', 'syamsul_pt_an_namiroh_travelindo', NULL, '2025-01-31 00:56:31', '2025-01-31 00:56:31'),
(14, 'Michael', NULL, 'ULW', 'ATS VACATIONS', 'Belum ada respon', NULL, 'Belum Check-In', 'michael_ats_vacations', NULL, '2025-01-31 00:57:07', '2025-01-31 00:57:07'),
(15, 'Erminah Zaenah', NULL, 'ULW', 'AN-ANAHL UMROH & TOUR', 'Belum ada respon', NULL, 'Belum Check-In', 'erminah_an_anahl_umroh_tour', NULL, '2025-01-31 00:57:55', '2025-01-31 00:57:55'),
(16, 'Hamdi', NULL, 'SMP', 'SMPN 39', 'Belum ada respon', NULL, 'Belum Check-In', 'hamdi_smpn_39', NULL, '2025-01-31 00:58:41', '2025-01-31 00:58:41'),
(17, 'Nisa', NULL, 'SMP', 'SMPN 23', 'Belum ada respon', NULL, 'Belum Check-In', 'nisa_smpn_23', NULL, '2025-01-31 00:59:14', '2025-01-31 00:59:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_15_125425_create_guests_table', 1),
(6, '2025_01_28_162514_create_ratings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
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
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '1', '$2y$10$zZf3kp7zzf8.npKk2HyCjOzVYdlvpkCDg0K.c66NHo1P2rk3pU1TG', NULL, '2025-01-30 23:06:40', '2025-01-30 23:06:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
