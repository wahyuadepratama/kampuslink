-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 03:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampuslink`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE `api_access` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(191) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_access`
--

INSERT INTO `api_access` (`id`, `name`, `token`, `updated_at`) VALUES
(1, 'admin', 'a638141496e7af861c280aae3bcad454', '2019-03-15 01:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-logo.svg',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `logo`, `location`, `description`, `background_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Universitas Andalas', 'logo_universitas-andalas_1557108175.jpg', 'Limau Manis', 'Universitas Andalas (biasa disingkat dengan Unand) adalah salah satu perguruan tinggi negeri Indonesia yang terletak di Kota Padang, Sumatra Barat, Indonesia. Universitas ini merupakan universitas tertua di luar Pulau Jawa yang dibuka secara resmi pada tanggal 23 Desember 1955 oleh Wakil Presiden Mohammad Hatta.', '#24b314', '2018-09-27 00:12:34', '2019-05-05 19:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(4, 'Musik', NULL),
(5, 'Seminar', NULL),
(6, 'Expo', NULL),
(7, 'Sport', NULL),
(8, 'Pensi', NULL),
(9, 'Workshop', NULL),
(10, 'Teknologi', NULL),
(11, 'Ilmiah', NULL),
(12, 'Bursa Kerja', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `organization_id`, `approved`, `name`, `slug`, `description`, `qr_code`, `start_date`, `end_date`, `photo`, `reason`, `web_link`, `created_at`, `updated_at`) VALUES
(6, 12, 0, 'Firetech 2021', 'firetech-2021', '<p>Terdiri dari rangkaian acara&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<ul>\r\n	<li>lorem</li>\r\n	<li>ipsum</li>\r\n	<li>dolor</li>\r\n</ul>', 'big_event_firetech-2021.svg', '2020-01-08', '2020-02-19', 'big_event_firetech-2021_1557703288.jpg', '<p>Ubah foto</p>', 'firetech.neotelemetri.com', '2019-05-07 16:23:29', '2019-05-12 23:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `category_id`, `sub_event_id`) VALUES
(9, 9, 7),
(10, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `event_viewer`
--

CREATE TABLE `event_viewer` (
  `id` int(10) NOT NULL,
  `viewer_id` int(10) UNSIGNED NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL,
  `seen_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_viewer`
--

INSERT INTO `event_viewer` (`id`, `viewer_id`, `sub_event_id`, `seen_on`) VALUES
(1, 2, 5, '2019-05-07 15:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `campus_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 'Fakultas Ekonomi', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(4, 1, 'Fakultas Teknologi Informasi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(6, 1, 'Fakultas Farmasi', '2019-05-05 19:24:40', '2019-05-05 19:24:40'),
(7, 1, 'Fakultas Hukum', '2019-05-05 19:24:59', '2019-05-05 19:24:59'),
(8, 1, 'Fakultas Ilmu Budaya', '2019-05-05 19:25:10', '2019-05-05 19:25:10'),
(9, 1, 'Fakultas Ilmu Sosial dan Politik', '2019-05-05 19:25:25', '2019-05-05 19:25:25'),
(10, 1, 'Fakultas Kedokteran', '2019-05-05 19:25:35', '2019-05-05 19:25:35'),
(11, 1, 'Fakultas Kedokteran Gigi', '2019-05-05 19:25:50', '2019-05-05 19:25:50'),
(12, 1, 'Fakultas Keperawatan', '2019-05-05 19:26:01', '2019-05-05 19:26:01'),
(13, 1, 'Fakultas Kesehatan Masyarakat', '2019-05-05 19:26:17', '2019-05-05 19:26:17'),
(14, 1, 'Fakultas Matematika dan Ilmu Pengetahuan Alam', '2019-05-05 19:26:40', '2019-05-05 19:26:40'),
(15, 1, 'Fakultas Pertanian', '2019-05-05 19:26:50', '2019-05-05 19:26:50'),
(16, 1, 'Fakultas Peternakan', '2019-05-05 19:27:07', '2019-05-05 19:27:07'),
(17, 1, 'Fakultas Teknik', '2019-05-05 19:27:16', '2019-05-05 19:27:16'),
(18, 1, 'Fakultas Teknologi Pertanian', '2019-05-05 19:27:29', '2019-05-05 19:27:29'),
(19, 1, 'Fakultas Ekonomi D3', '2019-05-05 20:10:05', '2019-05-05 20:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `creator` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `photo_cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover.jpg',
  `instagram` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `campus_id`, `approved`, `creator`, `name`, `photo_profile`, `photo_cover`, `instagram`, `line`, `facebook`, `whatsapp`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(12, 1, 1, 'wahyuadepratam4', 'Neo Telemetri', 'default-image.png', 'cover.jpg', '@neotelemetri', NULL, NULL, NULL, NULL, 'Unit Kegiatan Mahasiswa (UKM) NeoTelemetri merupakan salah satu ukm yang bergerak di bidang teknologi dan informasi di tingkat universitas andalas', '2019-05-06 03:32:12', '2019-05-06 06:53:28'),
(13, 1, 1, 'wahyuadepratam4', 'Himpunan Mahasiswa Sistem Informasi (HMSI)', 'default-image.png', 'cover.jpg', '@hmsi_unand', NULL, NULL, NULL, NULL, 'HMSI berfungsi sebagai wadah untuk menyalurkan aspirasi media komunikasi dan informasi serta pembelajaran mahasiswa Sistem Informasi Universitas Andalas', '2019-05-06 06:41:50', '2019-05-07 06:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `program_study`
--

CREATE TABLE `program_study` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_study`
--

INSERT INTO `program_study` (`id`, `faculty_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 15, 'Agroekoteknologi', '2019-05-05 19:55:15', '2019-05-05 19:55:15'),
(7, 15, 'Agribisnis', '2019-05-05 19:56:07', '2019-05-05 19:56:07'),
(8, 15, 'Ilmu Tanah', '2019-05-05 19:56:21', '2019-05-05 19:56:21'),
(9, 10, 'Pendidikan Dokter Umum', '2019-05-05 19:56:41', '2019-05-05 19:56:41'),
(10, 10, 'Psikologi', '2019-05-05 19:56:55', '2019-05-05 19:56:55'),
(11, 10, 'Kebidanan', '2019-05-05 19:57:07', '2019-05-05 19:57:07'),
(12, 14, 'Kimia', '2019-05-05 19:58:56', '2019-05-05 19:58:56'),
(13, 14, 'Matematika', '2019-05-05 19:59:07', '2019-05-05 19:59:07'),
(14, 14, 'Fisika', '2019-05-05 19:59:19', '2019-05-05 19:59:19'),
(15, 14, 'Biologi', '2019-05-05 19:59:33', '2019-05-05 19:59:33'),
(16, 7, 'Ilmu Hukum', '2019-05-05 19:59:47', '2019-05-05 19:59:47'),
(17, 16, 'Ilmu Peternakan', '2019-05-05 20:00:03', '2019-05-05 20:00:03'),
(18, 16, 'Ilmu Peternakan (Kampus payakumbuh)', '2019-05-05 20:00:18', '2019-05-05 20:00:18'),
(19, 2, 'Ekonomi Pembangunan', '2019-05-05 20:00:33', '2019-05-05 20:00:33'),
(20, 2, 'Manajemen', '2019-05-05 20:00:46', '2019-05-05 20:00:46'),
(21, 2, 'Akuntansi', '2019-05-05 20:00:56', '2019-05-05 20:00:56'),
(22, 2, 'Manajemen (Kampus 2 Payakumbuh)', '2019-05-05 20:01:08', '2019-05-05 20:01:08'),
(23, 2, 'Ekonomi Pembangunan (Kampus 2 Payakumbuh)', '2019-05-05 20:01:20', '2019-05-05 20:01:20'),
(24, 8, 'Ilmu Sejarah', '2019-05-05 20:01:33', '2019-05-05 20:01:33'),
(25, 8, 'Sastra Indonesia', '2019-05-05 20:01:44', '2019-05-05 20:01:44'),
(26, 8, 'Sastra Jepang', '2019-05-05 20:01:54', '2019-05-05 20:01:54'),
(27, 8, 'Sastra Inggris', '2019-05-05 20:02:04', '2019-05-05 20:02:04'),
(28, 9, 'Ilmu Politik', '2019-05-05 20:02:16', '2019-05-05 20:02:16'),
(29, 9, 'Sosiologi', '2019-05-05 20:02:30', '2019-05-05 20:02:30'),
(30, 9, 'Antropologi Sosial', '2019-05-05 20:02:42', '2019-05-05 20:02:42'),
(31, 9, 'Ilmu Administrasi Negara', '2019-05-05 20:02:56', '2019-05-05 20:02:56'),
(32, 9, 'Ilmu Hubungan Internasional', '2019-05-05 20:03:20', '2019-05-05 20:03:20'),
(33, 9, 'Ilmu Komunikasi', '2019-05-05 20:03:32', '2019-05-05 20:03:32'),
(34, 17, 'Teknik Industri', '2019-05-05 20:03:48', '2019-05-05 20:03:48'),
(35, 17, 'Teknik Mesin', '2019-05-05 20:03:59', '2019-05-05 20:03:59'),
(36, 17, 'Teknik Lingkungan', '2019-05-05 20:04:11', '2019-05-05 20:04:11'),
(37, 17, 'Teknik Sipil', '2019-05-05 20:04:21', '2019-05-05 20:04:21'),
(38, 17, 'Teknik Elektro', '2019-05-05 20:04:33', '2019-05-05 20:04:33'),
(39, 6, 'Farmasi', '2019-05-05 20:04:45', '2019-05-05 20:04:45'),
(40, 12, 'Ilmu Keperawatan', '2019-05-05 20:06:58', '2019-05-05 20:06:58'),
(41, 18, 'Teknik Pertanian', '2019-05-05 20:07:12', '2019-05-05 20:07:12'),
(42, 18, 'Teknologi Hasil Pertanian', '2019-05-05 20:07:30', '2019-05-05 20:07:30'),
(43, 18, 'Proteksi Tanaman', '2019-05-05 20:07:42', '2019-05-05 20:07:42'),
(44, 18, 'Agroekoteknologi (Kampus 3 Dharmasraya)', '2019-05-05 20:07:53', '2019-05-05 20:07:53'),
(45, 13, 'Ilmu Kesehatan Masyarakat', '2019-05-05 20:08:05', '2019-05-05 20:08:05'),
(46, 13, 'Ilmu Gizi', '2019-05-05 20:08:31', '2019-05-05 20:08:31'),
(47, 4, 'Sistem Komputer', '2019-05-05 20:08:46', '2019-05-05 20:08:46'),
(48, 4, 'Sistem Informasi', '2019-05-05 20:08:57', '2019-05-05 20:08:57'),
(49, 11, 'Pendidikan Dokter Gigi', '2019-05-05 20:09:10', '2019-05-05 20:09:10'),
(50, 19, 'Keuangan', '2019-05-05 20:10:24', '2019-05-05 20:10:24'),
(51, 19, 'Kesekretariatan', '2019-05-05 20:10:37', '2019-05-05 20:10:37'),
(52, 19, 'Akuntansi', '2019-05-05 20:10:48', '2019-05-05 20:10:48'),
(53, 19, 'Pemasaran', '2019-05-05 20:11:00', '2019-05-05 20:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 'Admin', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_event`
--

CREATE TABLE `sub_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `organization_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default-image.png',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `approved` int(1) DEFAULT '0',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_event`
--

INSERT INTO `sub_event` (`id`, `event_id`, `organization_id`, `name`, `slug`, `description`, `location`, `whatsapp`, `line`, `qr_code`, `status`, `approved`, `start_time`, `end_time`, `date`, `photo`, `reason`, `web_link`, `created_at`, `updated_at`) VALUES
(5, NULL, 12, 'Workshop Design', 'workshop-design', '<p>Pemateri</p>\r\n\r\n<ul>\r\n	<li>Rahmat Hidayat</li>\r\n	<li>Adryan Nanda</li>\r\n</ul>', 'Lt 1 gd PKM Universitas Andalas', '0812129129', '@dkfkdjfa', 'event_workshop-design.svg', 'ongoing', 1, '08:00:00', '15:00:00', '2019-05-14', 'event_workshop-design_1557230935.jpg', NULL, 'neotelemetri.com', '2019-05-07 12:08:57', '2019-05-07 15:03:28'),
(7, NULL, 12, 'Workshop SKJ', 'workshop-skj', '<p>Materi:</p>\r\n\r\n<ol>\r\n	<li>Pengenalan Docker</li>\r\n	<li>Installasi Docker</li>\r\n	<li>Perintah Dasar Docker</li>\r\n</ol>', 'Ruang Seminar Gedung F', '081284573423', '@neotelemetrii', 'event_workshop-skj.svg', 'ongoing', 0, '08:00:00', '12:00:00', '2019-08-22', 'event_workshop-skj_1557700686.jpg', NULL, 'skj.neoteletemetri.com', '2019-05-12 22:38:08', '2019-05-12 22:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_event_ticket`
--

CREATE TABLE `sub_event_ticket` (
  `id` int(10) NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Reguler',
  `price` int(11) DEFAULT '0',
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_event_ticket`
--

INSERT INTO `sub_event_ticket` (`id`, `sub_event_id`, `type`, `price`, `stock`) VALUES
(4, 5, 'Reguler', 10000, 100),
(6, 7, 'Reguler', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `transaction_id`, `price`, `type`, `owner`, `qr_code`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 'Reguler', 'Yori', 'qr/1410260', 'link/1161207', 'active', '2019-05-07 15:05:53', '2019-05-07 15:06:09'),
(2, 1, 10000, 'Reguler', 'Budi', 'qr/1738972', 'link/1352448', 'active', '2019-05-07 15:05:53', '2019-05-07 15:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL,
  `unique_code` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Konfirmasi Tiket',
  `proof_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '1',
  `countdown` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `sub_event_id`, `unique_code`, `status`, `proof_payment`, `seen`, `countdown`, `created_at`, `updated_at`) VALUES
(1, 12, 5, 1557241553, 'Menunggu Pembayaran', NULL, 1, '2019-05-08 00:05:53', '2019-05-07 15:05:53', '2019-05-07 15:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `program_study_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `photo_ktm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `date_birth` date DEFAULT NULL,
  `gender` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apps_version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `program_study_id`, `status`, `username`, `email`, `password`, `fullname`, `nim`, `phone`, `photo_profile`, `photo_ktm`, `date_birth`, `gender`, `phone_type`, `android_type`, `apps_version`, `remember_token`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, NULL, 1, 'admin', 'admin@kampuslink.com', '$2y$12$t1VbEgCQyPLzw4GdgexUcO21krqzHU.ai93yJ3o/pZ.ksDEavoFOW', 'Administrator', '-', NULL, 'user.png', 'default-image.png', NULL, NULL, NULL, NULL, NULL, 'bHFNZ5BLuj7MHS4adZoFo1pHrbR4Yjtxz9CuJz3jywNZcAi9mEPSyd3GKTul', '2019-05-12 22:26:22', '2019-05-01 01:00:00', '2019-05-12 22:26:22', NULL),
(12, 2, 48, 1, 'wahyuadepratam4', 'wahyuadepratam4@gmail.com', '$2y$10$asJuZl5BVCCKQshSk6HLT.Ixtiyn3sq8uW.PBpj1VET4nVQ6vBj0e', 'Wahyu Ade Pratama', '1511521024', '081371321971', 'avatar_wahyu-ade-pratama_1557201318.png', 'default-image.png', '2019-05-02', 'man', NULL, NULL, NULL, 'BKTzbCexZ6ZFmQvV9H4UAFwCN44YWLlMdPQnQ945aoP3L88qcDysa94CzYZB', '2019-05-12 22:18:23', '2019-05-06 02:17:12', '2019-05-13 01:07:19', NULL),
(13, 2, 39, 0, 'badu', 'badu@badu.id', '$2y$10$JR4L/lBXb4V8FuCs7.aM4uoqakz/VFrotLOHfywxIljrcfZ2wKDra', 'badu', '1511521025', '08123213912', 'user.png', 'default-image.png', NULL, 'man', NULL, NULL, NULL, 'EwnusjXvUeA072vjIgJnSxDWyyqtK4IJyIBBe47likJUqFfEtyPFr8wsvAnS', '2019-05-07 06:00:53', '2019-05-06 08:43:25', '2019-05-07 06:45:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization` (
  `id` int(5) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'Anggota'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`id`, `user_id`, `organization_id`, `role`) VALUES
(1, 12, 12, 'Admin'),
(2, 12, 13, 'Admin'),
(4, 13, 12, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

CREATE TABLE `viewer` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `last_view` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewer`
--

INSERT INTO `viewer` (`id`, `ip_address`, `last_view`) VALUES
(2, '127.0.0.1', '2019-05-07 08:07:15'),
(3, '10.21.2.112', '2019-01-29 02:50:06'),
(4, '192.168.43.1', '2019-02-15 08:50:07'),
(5, '192.168.43.99', '2019-02-15 08:57:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_access`
--
ALTER TABLE `api_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_sub_event_id_index` (`sub_event_id`),
  ADD KEY `comment_sender_index` (`sender`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`,`organization_id`),
  ADD KEY `event_organization_id_index` (`organization_id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `sub_event_id` (`sub_event_id`);

--
-- Indexes for table `event_viewer`
--
ALTER TABLE `event_viewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viewer_id` (`viewer_id`),
  ADD KEY `sub_event_id` (`sub_event_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_campus_id_index` (`campus_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instagram` (`instagram`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `program_study`
--
ALTER TABLE `program_study`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_study_faculty_id_index` (`faculty_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_event`
--
ALTER TABLE `sub_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`,`organization_id`);

--
-- Indexes for table `sub_event_ticket`
--
ALTER TABLE `sub_event_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_event_id` (`sub_event_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_transaction_id_index` (`transaction_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_code` (`unique_code`),
  ADD KEY `transaction_user_id_index` (`user_id`),
  ADD KEY `transaction_sub_event_id_index` (`sub_event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_program_study_id_index` (`program_study_id`);

--
-- Indexes for table `user_organization`
--
ALTER TABLE `user_organization`
  ADD PRIMARY KEY (`user_id`,`organization_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `viewer`
--
ALTER TABLE `viewer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_access`
--
ALTER TABLE `api_access`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_viewer`
--
ALTER TABLE `event_viewer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_study`
--
ALTER TABLE `program_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_event`
--
ALTER TABLE `sub_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_event_ticket`
--
ALTER TABLE `sub_event_ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viewer`
--
ALTER TABLE `viewer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_sender_foreign` FOREIGN KEY (`sender`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_sub_event_id_foreign` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_category`
--
ALTER TABLE `event_category`
  ADD CONSTRAINT `event_category_ibfk_1` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_viewer`
--
ALTER TABLE `event_viewer`
  ADD CONSTRAINT `event_viewer_ibfk_1` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_viewer_ibfk_2` FOREIGN KEY (`viewer_id`) REFERENCES `viewer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_study`
--
ALTER TABLE `program_study`
  ADD CONSTRAINT `program_study_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_event`
--
ALTER TABLE `sub_event`
  ADD CONSTRAINT `sub_event_ibfk_1` FOREIGN KEY (`event_id`,`organization_id`) REFERENCES `event` (`id`, `organization_id`);

--
-- Constraints for table `sub_event_ticket`
--
ALTER TABLE `sub_event_ticket`
  ADD CONSTRAINT `sub_event_ticket_ibfk_1` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_event` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_sub_event_id_foreign` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_program_study_id_foreign` FOREIGN KEY (`program_study_id`) REFERENCES `program_study` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_organization`
--
ALTER TABLE `user_organization`
  ADD CONSTRAINT `user_organization_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_organization_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
