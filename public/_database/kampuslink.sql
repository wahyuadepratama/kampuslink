-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2019 at 10:39 AM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `logo`, `location`, `description`, `background_color`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Andalas', 'default-logo.svg', 'Limau Manih', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 'Universitas Indonesia', 'default-logo.svg', 'jakarta', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 'Universitas Bung Hatta', 'default-logo.svg', 'yogyakarta', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(4, 'YPTK UPI', 'default-logo.svg', 'Limau Manih', 'bla bla bla bla bla', '#ffffff', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(5, 'Universitas Riau', 'default-logo.svg', 'jakarta', 'bla bla bla bla bla', '#ffffff', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(6, 'Institut Teknologi Padang', 'default-logo.svg', 'yogyakarta', 'bla bla bla bla bla', '#ffffff', '2019-01-25 02:00:16', '2019-01-25 02:00:16');

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
(1, 'Teknologi', 'Event yang berkaitan dengan teknologi'),
(2, 'Desain', 'Deskripsi desain disini'),
(3, 'Ekonomi', 'bla balba lab lab lala');

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `sub_event_id`, `sender`, `created_at`, `updated_at`) VALUES
(1, 'tes comment 1', 1, 2, '2018-09-27 00:12:35', '2018-09-27 00:12:35'),
(2, 'tes comment 2', 2, 3, '2018-09-27 00:12:35', '2018-09-27 00:12:35'),
(3, 'tes comment 3', 1, 2, '2018-09-27 00:12:35', '2018-09-27 00:12:35');

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
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `organization_id`, `approved`, `name`, `slug`, `description`, `qr_code`, `start_date`, `end_date`, `photo`, `web_link`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Firetech', 'vdfadafda', 'Firetech adalah bla bla bla bla bla', 'default-image.png', '2018-09-27', '2018-09-27', '1.jpeg', 'firetech.neotelemetri.com', '2018-09-27 00:12:34', '2019-03-12 06:44:30'),
(2, 2, 1, 'ISCE', 'dafafafda', 'ISCE adalah bla bla bla bla bla', 'default-image.png', '2018-09-27', '2018-09-27', '2.jpeg', 'isce.hmsiunand.com', '2018-09-27 00:12:34', '2019-03-12 06:44:27'),
(3, 1, 1, 'dafaafa', 'dfaafadfa', '<p>adfadfafd</p>', 'default-image.png', '2019-02-25', '2019-02-25', 'dafaafa_1551068875.jpg', 'dafadfaf', '2019-02-25 04:27:55', '2019-03-12 06:44:25'),
(4, 1, 0, 'Firetech 2019', 'firetech-2019', '<p>ini deskripsi</p>', 'firetech-2019.svg', '2019-03-12', '2019-03-16', 'big_event_firetech-2019_1552292712.jpg', 'tes.com', '2019-03-11 08:25:12', '2019-03-12 06:26:29');

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
(4, 1, 2),
(5, 2, 3),
(6, 3, 3),
(7, 1, 1),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 2, 6),
(12, 2, 7),
(13, 3, 8),
(14, 1, 9),
(15, 2, 10),
(16, 1, 10);

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
(1, 2, 2, '2019-01-29 02:37:52'),
(2, 3, 4, '2019-01-29 02:37:52'),
(3, 2, 4, '2019-01-29 02:37:52'),
(4, 2, 4, '2019-01-29 02:37:52'),
(5, 2, 2, '2019-01-29 02:37:52'),
(6, 2, 1, '2019-01-29 02:37:52'),
(7, 2, 8, '2019-01-29 02:37:52'),
(8, 2, 4, '2019-01-29 02:37:52'),
(9, 2, 1, '2019-01-29 02:37:52'),
(10, 2, 8, '2019-01-29 02:37:52'),
(11, 2, 8, '2019-01-29 02:37:52'),
(12, 2, 2, '2019-01-29 02:37:52'),
(13, 2, 2, '2019-01-29 04:01:20'),
(14, 2, 4, '2019-01-29 04:01:24'),
(15, 2, 2, '2019-01-29 04:01:28'),
(16, 2, 2, '2019-01-29 04:01:30'),
(17, 2, 2, '2019-01-29 04:01:30'),
(18, 2, 2, '2019-01-29 04:01:31'),
(19, 2, 2, '2019-01-29 04:01:53'),
(20, 2, 8, '2019-01-29 04:40:15'),
(21, 2, 5, '2019-01-29 04:57:38'),
(22, 2, 5, '2019-01-29 04:57:40'),
(23, 2, 5, '2019-01-29 04:57:41'),
(24, 2, 5, '2019-01-29 04:57:41'),
(25, 2, 5, '2019-01-29 04:57:42'),
(26, 2, 5, '2019-01-29 04:57:42'),
(27, 2, 5, '2019-01-29 04:57:43'),
(28, 2, 5, '2019-01-29 04:57:43'),
(29, 2, 5, '2019-01-29 04:57:44'),
(30, 2, 5, '2019-01-29 04:57:45'),
(31, 2, 7, '2019-01-29 05:49:19'),
(32, 2, 6, '2019-01-29 06:18:59'),
(33, 2, 4, '2019-01-29 06:39:27'),
(34, 2, 4, '2019-01-29 06:39:29'),
(35, 2, 4, '2019-01-29 06:39:31'),
(36, 2, 4, '2019-01-29 06:40:25'),
(37, 2, 4, '2019-01-29 06:40:27'),
(38, 2, 4, '2019-01-29 06:40:28'),
(39, 2, 4, '2019-01-29 06:41:50'),
(40, 2, 4, '2019-01-29 06:41:55'),
(41, 2, 4, '2019-01-29 06:43:21'),
(42, 2, 4, '2019-01-29 06:43:22'),
(43, 2, 4, '2019-01-29 06:43:23'),
(44, 2, 4, '2019-01-29 06:43:34'),
(45, 2, 4, '2019-01-29 06:44:50'),
(46, 5, 8, '2019-01-29 11:09:18'),
(47, 4, 5, '2019-01-29 11:09:24'),
(48, 4, 6, '2019-01-29 11:42:41'),
(49, 5, 7, '2019-01-29 12:17:52'),
(50, 2, 8, '2019-01-30 01:36:44'),
(51, 2, 3, '2019-01-31 02:07:07'),
(52, 2, 5, '2019-02-05 00:39:42'),
(53, 2, 4, '2019-02-06 10:28:59'),
(54, 2, 8, '2019-02-11 19:05:54'),
(55, 2, 8, '2019-02-13 02:21:11'),
(56, 2, 4, '2019-02-14 07:05:32'),
(57, 2, 10, '2019-02-14 09:39:16'),
(58, 2, 6, '2019-02-15 03:44:35'),
(59, 4, 4, '2019-02-15 08:50:07'),
(60, 5, 2, '2019-02-15 08:57:14'),
(61, 2, 7, '2019-02-18 01:23:43'),
(62, 2, 1, '2019-02-19 01:12:34'),
(63, 2, 10, '2019-02-20 12:05:58'),
(64, 2, 7, '2019-02-21 02:49:45'),
(65, 2, 5, '2019-03-04 03:45:53'),
(66, 2, 7, '2019-03-07 02:38:52'),
(67, 2, 6, '2019-03-08 03:01:22'),
(68, 2, 14, '2019-03-08 08:17:37'),
(69, 2, 3, '2019-03-09 02:04:21'),
(70, 2, 14, '2019-03-10 06:32:25'),
(71, 2, 6, '2019-03-11 06:49:01'),
(72, 2, 14, '2019-03-12 06:00:27'),
(73, 2, 15, '2019-03-12 06:11:50');

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
(1, 3, 'Fakultas Teknologi Informasi', '2018-09-27 00:12:34', '2019-02-14 01:52:30'),
(2, 1, 'Fakultas Ekonomi', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 3, 'Fakultas Teknik', '2018-09-27 00:12:34', '2019-03-07 21:00:19'),
(4, 1, 'Fakultas Teknologi Informasi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(5, 1, 'Fakultas Ekonomi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(6, 1, 'Fakultas Teknik', '2019-01-25 02:00:16', '2019-01-25 02:00:16');

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
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.svg',
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
(1, 1, 1, 'wahyuadepratama', 'Neo Telemetri', 'default-avatar.svg', 'cover_neo-telemetri_1552199107.jpeg', '@neotelemetri', NULL, NULL, NULL, '08776327326', '<p><strong>teststaa</strong> teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa tesstaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa teststaa</p>', '2018-09-27 00:12:34', '2019-03-10 00:59:41'),
(2, 4, 1, 'wahyuadepratama', 'Pica', 'default-avatar.svg', 'cover.jpg', '@pica', NULL, NULL, '081219281982', '081219281982', 'Pica adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa', '2018-09-27 00:12:34', '2019-03-09 08:39:40'),
(3, 1, 1, 'john', 'PHP', 'default-avatar.svg', 'cover.jpg', '@php', NULL, NULL, '081219281782', '081219281983', 'PHP adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa', '2018-09-27 00:12:34', '2019-03-09 08:39:42'),
(4, 1, 1, 'wahyuadepratama', 'Organisasi 1', 'default-avatar.svg', 'cover.jpg', '@organisasi1', NULL, NULL, NULL, NULL, 'tes tes tes tes', '2019-03-07 03:19:24', '2019-03-09 08:39:44'),
(5, 1, 1, 'john', 'Organisasi 1', 'default-avatar.svg', 'cover.jpg', '@organisasi1_lagi', NULL, NULL, NULL, NULL, 'tes tes tes tes', '2019-03-07 03:19:36', '2019-03-09 08:39:47'),
(6, 1, 1, 'john', 'Organisasi 1', 'default-avatar.svg', 'cover.jpg', '@organisasi1_lagi_lagi', NULL, NULL, NULL, NULL, 'tes tes tes tes', '2019-03-07 10:21:45', '2019-03-09 08:39:49'),
(8, 1, 1, 'wahyuadepratama', 'Pica 2', 'default-avatar.svg', 'cover.jpg', '@pica2', NULL, NULL, NULL, NULL, 'afafdaf', '2019-03-07 12:03:48', '2019-03-09 08:39:52'),
(9, 1, 0, 'wahyuadepratama', 'testss', 'default-avatar.svg', 'cover.jpg', '@lagi', '@dffadfadfa', 'halolaa', NULL, '08776327325', 'teststaa', '2019-03-08 08:12:30', '2019-03-09 08:39:55');

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
(1, 3, 'Sistem Informasi', '2018-09-27 00:12:34', '2019-02-14 01:52:30'),
(2, 1, 'Manajemen', '2018-09-27 00:12:34', '2019-02-11 11:43:43'),
(3, 3, 'Teknik Sipil', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(4, 1, 'Sistem Informasi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(5, 2, 'Manajemen', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(6, 3, 'Teknik Sipil', '2019-01-25 02:00:16', '2019-01-25 02:00:16');

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
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_event`
--

INSERT INTO `sub_event` (`id`, `event_id`, `organization_id`, `name`, `slug`, `description`, `location`, `whatsapp`, `line`, `qr_code`, `status`, `approved`, `start_time`, `end_time`, `date`, `photo`, `web_link`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Lomba TIK', 'lomba-tik-832938', 'Lomba TIK adalah bla bla bla bla bla Lomba TIK adalah bla bla bla bla bla', 'PKM, Universitas Andalas, Limau Manis, Pauh', '0813713219871', 'id_line_h', 'default-image.png', 'ongoing', 2, '08:00:00', '12:00:00', '2019-06-11', '1.jpeg', 'firetech.neotelemetri.com', '2019-02-12 00:12:35', '2019-03-11 10:07:26'),
(2, 1, 1, 'Hackathon Hackathon Hackathon Hackathon Hackathon Hackathon', 'hackathon-91238291', 'Hackathon adalah bla bla bla bla bla', 'DilLo Padang', '0813713219889', 'id_line_eu', 'default-image.png', 'past', 0, '07:12:35', '07:12:35', '2019-02-04', '2.jpeg', 'firetech.neotelemetri.com', '2018-09-27 00:12:35', '2019-03-11 10:07:24'),
(3, 2, 2, 'Expo dan Bazar', 'expo-dan-bazar-328391823', 'Expo dan bazar adalah bla bla bla bla bla', 'Fakultas Teknologi Informasi, Universitas Andalas', '08137321239', 'id_line_eur', 'default-image.png', 'ongoing', 1, '07:12:35', '07:12:35', '2019-05-16', '3.jpeg', 'isce.hmsiunand.com', '2018-09-27 00:12:35', '2019-03-11 10:07:22'),
(4, 2, 2, 'Lomba Desain', 'lomba-desain-934384', 'bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain', 'Padang Selatan', '92389283', 'djfkdjf', 'default-image.png', 'ongoing', 1, '08:00:00', '12:00:00', '2019-06-12', '4.jpeg', '', '2019-01-29 01:00:00', '2019-03-11 10:07:20'),
(5, 1, 1, 'Lomba MLBB', 'lomba-mlbb-8384934', 'bal bal balb alb albal alb alb al balbab', 'Padang', NULL, NULL, 'default-image.png', 'ongoing', 2, '10:00:00', '20:00:00', '2019-03-30', '1.jpeg', 'bla.com', '2019-01-29 03:00:00', '2019-03-11 10:07:17'),
(6, 2, 2, 'Lomba PUBG', 'lomba-pubg-3434134', 'adfafda adaf d ffdfdf dfdf d f', 'Pekanbaru', NULL, NULL, 'default-image.png', 'ongoing', 1, '10:00:00', '18:00:00', '2019-03-28', '5.jpeg', 'dfdf', '2019-01-29 05:00:00', '2019-03-11 10:07:15'),
(7, 2, 2, 'Lomba Mikrotik', 'lomba-mikrotik-343847', 'adfafdadf dfdf df dfd f dfdf', 'Padang, Unand', NULL, NULL, 'default-image.png', 'past', 1, '09:00:00', '16:00:00', '2019-03-14', '7.jpeg', 'erererer', '2019-01-29 08:00:00', '2019-03-14 18:32:32'),
(8, 2, 2, 'Lomba Lari 200km Padang - Payakumbuh', 'tes-9348934', 'adfadfafdafafd', 'adfaf', NULL, NULL, 'default-image.png', 'ongoing', 1, '08:00:00', '18:00:00', '2019-06-14', '8.jpeg', 'dfdf', '2019-01-29 09:00:00', '2019-03-11 10:07:11'),
(9, 2, 2, 'Lomba lorem ipsum', 'lomba-lorem-ipsum-293829', 'Lorem ipsum dolor sit amet, ipsum consulatu molestiae ut vis, et vix omnes praesent. Eirmod mediocritatem mei in, ei ipsum assum recteque ius. Zril efficiendi his ei. Meliore torquatos nec ea, eu viderer percipit pri. Iuvaret luptatum petentium mea id, eu probatus abhorreant eos.', 'Lorem ipsum dolor sit amet, ipsum consulatu', '23123213', '2131212', 'default-image.png', 'ongoing', 1, '07:00:00', '15:00:00', '2019-06-13', 'default-image.png', 'Lorem ipsum dolor sit amet, ipsum consulatu', '2019-02-03 17:00:00', '2019-03-11 10:07:09'),
(10, 2, 2, 'Lorem ipsum dolor sit', 'lorem-ipsum-92384923', 'Lorem ipsum dolor sit amet, ipsum consulatu Lorem ipsum dolor sit amet, ipsum consulatu Lorem ipsum dolor sit amet, ipsum consulatu Lorem ipsum dolor sit amet, ipsum consulatu Lorem ipsum dolor sit amet, ipsum consulatu Lorem ipsum dolor sit amet, ipsum consulatu', 'Lorem ipsum dolor sit amet, ipsum consulatu', '2313123', '12312313', 'default-image.png', 'ongoing', 1, '06:00:00', '15:00:00', '2019-06-05', 'default-image.png', 'Lorem ipsum dolor sit amet, ipsum consulatu', '2019-02-17 17:00:00', '2019-03-11 10:07:07'),
(14, NULL, 1, 'Lomba Makan Kerupuk', 'lomba-makan-kerupuk', '<p>adfafafafaf</p>', 'adafafafafafadf', '08412382', 'fgfgfg', 'default-image.png', 'ongoing', 1, '01:03:00', '14:04:00', '2019-07-25', 'event_lomba-makan-kerupuk_1551691220.jpg', 'firetech.neotelemetri.com', '2019-03-04 09:20:20', '2019-03-10 14:42:03'),
(15, NULL, 1, 'Seminar International', 'seminar-international', '<p>adfafafdaf<strong>adfafafafaf<em>adfafafadfad</em></strong><em>adfaf<s>adfadfadf</s></em></p>', 'akdfjkafjdkajfkdajfafafdaf', '0812312313', '@dffadfadfa', 'event_seminar-international.svg', 'ongoing', 1, '14:00:00', '18:00:00', '2019-05-04', 'event_seminar-international_1552295856.jpg', '-', '2019-03-11 09:17:36', '2019-03-12 06:26:47');

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
(1, 2, 'Reguler', 20000, 1),
(2, 1, 'Reguler', 20000, 16),
(3, 2, 'VIP', 30000, 5),
(4, 3, 'Reguler', 20000, 11),
(5, 3, 'VIP', 30000, 22),
(6, 4, 'Reguler', 50000, 33),
(7, 5, 'Reguler', 100000, 55),
(8, 6, 'Reguler', 10000, 12),
(9, 7, 'Reguler', 20000, 13),
(10, 8, 'Reguler', 12000, 14),
(11, 9, 'Reguler', 23000, 15),
(12, 10, 'Reguler', 40000, 17),
(13, 14, 'Reguler', 5000, 4),
(14, 14, 'VIP', 5000, 4),
(15, 15, 'Reguler', 20000, 100);

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
(3, 1, 50000, '', 'adfafa', 'adfafdafaf', 'adfafadfafaf', 'active', '2019-02-11 20:00:00', '2019-03-10 14:02:38'),
(4, 1, 20000, '', 'Badu', 'adfaf', 'adfadfafaf', 'non active', '2019-02-11 07:00:00', '2019-03-10 14:02:46'),
(5, 2, 22000, '', 'Badu b', 'adfafafd', 'adafafafa', 'active', '2019-02-09 17:00:00', '2019-03-10 14:02:49'),
(6, 3, 30000, '', 'Badu ff', 'ljllklklk', 'hjhjh', 'active', '2019-02-08 17:00:00', '2019-03-10 14:02:59'),
(7, 4, 10000, '', 'Badu ffd', 'ssdsdsd', 'sdsdsdsdsds', 'active', '2019-02-07 17:00:00', '2019-03-10 14:03:03'),
(8, 5, 30000, '', 'Badug', 'sdsdsdsds', 'dsdsdsdsd', 'active', '2019-02-06 17:00:00', '2019-03-10 14:02:53'),
(9, 6, 20000, '', 'Badu re', 'dafafa', 'adfafadfafda', 'active', '2019-02-05 17:00:00', '2019-03-10 14:03:09'),
(10, 7, 100000, '', 'Badu fdf', 'adfafa', 'fafdafafda', 'active', '2019-02-04 17:00:00', '2019-03-10 14:03:06'),
(11, 9, 60000, '', 'Badu w', 'qr/3916192520', 'link/4698477283', 'active', '2019-02-13 09:17:53', '2019-03-10 14:03:13'),
(12, 9, 30000, '', 'Baduq', 'qr/4611511078', 'link/6744353533', 'active', '2019-02-13 09:17:53', '2019-03-10 14:03:17'),
(13, 10, 20000, '', 'Badu fdfdf', 'qr/8246809375', 'link/7123086818', 'active', '2019-02-15 09:19:52', '2019-03-10 14:03:20'),
(14, 10, 60000, '', 'Baduu', 'qr/6133249283', 'link/3169149711', 'active', '2019-02-15 09:19:52', '2019-03-10 14:03:24'),
(15, 11, 20000, '', 'Badubbb', 'qr/6682525523', 'link/5550588276', 'active', '2019-02-19 01:17:51', '2019-03-10 14:03:29'),
(16, 11, 60000, '', 'vBadu', 'qr/6173203103', 'link/3455439601', 'active', '2019-02-19 01:17:51', '2019-03-10 14:03:32'),
(28, 19, 5000, 'Reguler', 'Baduvvvv', 'qr/1211355210', 'link/3458401185', 'active', '2019-03-08 09:31:05', '2019-03-10 14:03:35'),
(29, 19, 5000, 'VIP', 'Baduewewe', 'qr/4662246482', 'link/6276660678', 'active', '2019-03-08 09:31:05', '2019-03-10 14:03:38'),
(34, 23, 5000, 'Reguler', 'Baduqwqw', 'qr/3890979332', 'link/6416024726', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:41'),
(35, 23, 5000, 'Reguler', 'Badudsdsda', 'qr/4016869263', 'link/5151108528', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:45'),
(36, 23, 5000, 'Reguler', 'BaduBadu', 'qr/5380393098', 'link/5129046523', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:47'),
(37, 23, 5000, 'Reguler', 'BaduBaduBaduBaduBadu', 'qr/4582217912', 'link/5960558491', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:51'),
(38, 23, 5000, 'VIP', 'Badu Badu Badu', 'qr/2080325648', 'link/4925805644', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:54'),
(39, 23, 5000, 'VIP', 'BadubBadu', 'qr/6638525213', 'link/3530702501', 'active', '2019-03-08 12:02:13', '2019-03-10 14:03:58'),
(40, 23, 5000, 'VIP', 'Badu Badub', 'qr/3473778448', 'link/6394739163', 'active', '2019-03-08 12:02:13', '2019-03-10 14:04:02'),
(41, 23, 5000, 'VIP', 'Badu Badu Badu n', 'qr/3449055921', 'link/6580574759', 'active', '2019-03-08 12:02:13', '2019-03-10 14:04:06'),
(42, 24, 5000, 'Reguler', 'a', 'qr/868489591057', 'link/868129821057', 'active', '2019-03-08 12:49:46', '2019-03-08 06:16:34'),
(43, 24, 5000, 'Reguler', 's', 'qr/827202318638', 'link/528053908697', 'active', '2019-03-08 12:49:46', '2019-03-08 06:16:34'),
(44, 24, 5000, 'VIP', 'd', 'qr/4313691544', 'link/4631995507', 'active', '2019-03-08 12:49:46', '2019-03-08 06:16:34'),
(45, 24, 5000, 'VIP', 'e', 'qr/1543175336', 'link/1621038604', 'active', '2019-03-08 12:49:46', '2019-03-08 06:16:34'),
(52, 28, 100000, 'Reguler', 'John', 'qr/846650572931', 'link/830927809846', 'active', '2019-03-08 12:56:27', '2019-03-08 07:37:26'),
(53, 29, 20000, 'Reguler', 'Wahyu Ade Pratama', 'qr/665174236898', 'link/203732266983', 'active', '2019-03-08 13:22:17', '2019-03-08 06:22:30'),
(60, 33, 10000, 'Reguler', 'eee', 'qr/734450277112', 'link/760139708074', 'active', '2019-03-08 23:57:19', '2019-03-10 14:05:56'),
(61, 33, 10000, 'Reguler', 'eeee', 'qr/288824984198', 'link/689082339675', 'active', '2019-03-08 23:57:19', '2019-03-10 14:05:58'),
(62, 34, 20000, 'Reguler', 'Boon', 'qr/853746922391', 'link/226494219620', 'active', '2019-03-09 02:13:11', '2019-03-08 19:13:28'),
(63, 35, 5000, 'Reguler', 'John Doe', 'qr/764235409092', 'link/645595224213', 'active', '2019-03-09 02:47:27', '2019-03-08 19:47:41'),
(64, 35, 5000, 'Reguler', 'Brian', 'qr/830157064096', 'link/503579808501', 'active', '2019-03-09 02:47:27', '2019-03-08 19:47:41'),
(65, 35, 5000, 'VIP', 'Toni', 'qr/7885657848', 'link/3401700905', 'active', '2019-03-09 02:47:27', '2019-03-08 19:47:41'),
(66, 36, 5000, 'Reguler', 'Ade Fitra', 'default-image.png', 'link/113595070035', 'active', '2019-03-09 02:50:10', '2019-03-10 14:41:23'),
(67, 36, 5000, 'Reguler', 'Lionel Messi', 'qr/582723950726', 'link/414592988228', 'active', '2019-03-09 02:50:10', '2019-03-10 14:07:23'),
(68, 36, 5000, 'VIP', 'Bambang Pamungkas', 'qr/4808202366', 'link/1756139441', 'active', '2019-03-09 02:50:10', '2019-03-10 14:07:29'),
(69, 36, 5000, 'VIP', 'Johny English', 'qr/6613661714', 'link/1845612663', 'active', '2019-03-09 02:50:11', '2019-03-10 14:07:37'),
(70, 36, 5000, 'VIP', 'Horasindura Kolakiptano', 'qr/3550594421', 'link/8857220503', 'active', '2019-03-09 02:50:11', '2019-03-10 14:07:50');

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
(1, 2, 1, 12131, 'Pembayaran Dibatalkan', NULL, 1, '2019-03-09 06:41:51', '2018-09-28 00:12:35', '2019-02-19 03:53:28'),
(2, 3, 2, 12138, 'Pembayaran Berhasil', NULL, 1, '2019-03-09 06:41:51', '2018-09-27 00:12:35', '2019-03-08 12:45:16'),
(3, 2, 4, 123, 'Menunggu Pembayaran', NULL, 1, '2019-03-09 06:41:51', '2019-02-12 03:31:23', '2019-03-04 01:51:12'),
(4, 2, 5, 234, 'Pembayaran Dibatalkan', NULL, 1, '2019-03-09 06:41:51', '2019-02-03 01:00:00', '2019-02-15 02:39:24'),
(5, 2, 4, 345, 'Diproses', NULL, 1, '2019-03-09 06:41:51', '2019-02-01 17:00:00', '2019-02-12 03:34:10'),
(6, 2, 8, 456, 'Ditolak', NULL, 1, '2019-03-09 06:41:51', '2019-01-02 08:00:00', '2019-02-12 03:34:10'),
(7, 2, 7, 567, 'Pembayaran Berhasil', NULL, 1, '2019-03-09 06:41:51', '2019-01-23 13:00:00', '2019-02-12 03:34:46'),
(9, 2, 1, 333, 'Menunggu Pembayaran', NULL, 1, '2019-03-09 06:41:51', '2019-02-13 09:17:53', '2019-02-14 02:48:57'),
(10, 2, 1, 216, 'Pembayaran Berhasil', NULL, 1, '2019-03-09 06:41:51', '2019-02-15 09:19:52', '2019-03-07 07:16:47'),
(11, 5, 3, 547, 'Menunggu Pembayaran', NULL, 1, '2019-03-09 06:41:51', '2019-02-19 01:17:51', '2019-03-08 19:24:25'),
(19, 5, 14, 817, 'Konfirmasi Tiket', NULL, 1, '2019-03-09 06:41:51', '2019-03-08 09:31:05', '2019-03-08 04:03:55'),
(23, 5, 14, 408, 'Konfirmasi Tiket', NULL, 1, '2019-03-09 06:41:51', '2019-03-08 12:02:13', '2019-03-08 19:24:17'),
(24, 5, 14, 1552049386, 'Menunggu Pembayaran', NULL, 1, '2019-03-09 06:41:51', '2019-03-08 12:49:46', '2019-03-08 06:21:37'),
(28, 5, 5, 1552049787, 'Menunggu Pembayaran', NULL, 1, '2019-03-09 06:41:51', '2019-03-08 12:56:27', '2019-03-08 18:41:31'),
(29, 5, 7, 1552051336, 'Pembayaran Berhasil', 'payment1552051336_1552055348.png', 1, '2019-03-09 06:41:51', '2019-03-08 13:22:16', '2019-03-08 19:46:56'),
(33, 5, 6, 1552089439, 'Pembayaran Dibatalkan', NULL, 1, '2019-03-09 08:54:19', '2019-03-08 23:57:19', '2019-03-08 19:24:44'),
(34, 5, 1, 1552097591, 'Diproses', NULL, 1, '2019-03-09 11:13:11', '2019-03-09 02:13:11', '2019-03-08 19:42:22'),
(35, 5, 14, 1552099646, 'Pembayaran Dibatalkan', NULL, 1, '2019-03-09 09:49:00', '2019-03-09 02:47:26', '2019-03-09 19:51:49'),
(36, 5, 14, 1552099810, 'Pembayaran Berhasil', NULL, 1, '2019-03-09 11:50:10', '2019-03-09 02:50:10', '2019-03-10 07:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `program_study_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `photo_ktm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
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
(1, 1, 1, 1, 'admin', 'admin@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Administrator', '1511521021', '081371321919', 'user.png', 'default-avatar.svg', NULL, 'man', NULL, NULL, NULL, NULL, NULL, '2018-09-27 00:12:34', '2019-02-14 04:56:21', NULL),
(2, 3, 1, 1, 'badusaputra', 'badu@gmail.com', '$2y$10$4zCFV55pzomQcNirljybIeNx8C.q8ijGis9M2sFHFq534aI/dz8RC', 'Badu Saputra', '1511521022', '081371321914', 'user.png', 'default-avatar.svg', '2019-01-09', 'man', NULL, NULL, NULL, NULL, '2019-03-15 02:28:39', '2018-09-27 00:12:34', '2019-03-14 19:28:39', NULL),
(3, 3, 3, 0, 'budiperkasa', 'budi@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Budi Perkasa', '1511521023', '081371421919', 'user.png', 'default-avatar.svg', NULL, 'man', NULL, NULL, NULL, NULL, NULL, '2018-09-27 00:12:34', '2019-02-14 04:58:21', NULL),
(4, 2, 3, 0, 'sitisarah', 'siti@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Siti Sarah', '1511521020', '08137141919', 'user.png', 'default-avatar.svg', NULL, 'woman', NULL, NULL, NULL, 'Kfh7kghZZ0pD2TWHjcDIX6OKqQFLfTzzAtMIxKQxNVYReCbGgsg75ciFaRsC', '2019-03-15 03:18:37', '2018-09-27 00:12:34', '2019-03-15 03:27:41', NULL),
(5, 2, 5, 0, 'wahyuadepratama', 'wahyuadepratama@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Wahyu Ade Pratama', '1511521024', '0813713219712', 'avatar_wahyu-ade-pratama_1552120981.jpg', 'default-avatar.svg', '1998-03-14', 'man', NULL, NULL, NULL, 'dwnY63XAj12UheirGJdy95psN4x29CWuHMlREDWSaCMTN44qfHiHE6zD8fhj', '2019-03-15 03:29:11', '2018-10-01 03:32:24', '2019-03-14 20:29:11', NULL),
(9, 3, 5, 0, 'john', 'john@gamil.com', '$2y$10$fTuHYTwmz2BVAQpsT51Nt.dI5jzA43xmkurlH1niNcOVOjONkrqXm', 'John', '1511521000', NULL, 'user.png', 'user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-07 20:31:13', '2019-03-08 03:56:54', NULL),
(10, 3, 3, 0, 'adik.badu', 'adik.badu@gmail.com', '$2y$10$yF2ChQLFEyd61GwBFU65o.ky1LH0hrJD3cQXXRt7uLIJGpc6MCe0S', 'Adik Badu', '1611521022', '0877632732', 'user.png', 'user.png', '1997-03-08', 'man', NULL, NULL, NULL, NULL, NULL, '2019-03-07 20:32:11', '2019-03-08 04:08:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'Anggota'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`user_id`, `organization_id`, `role`) VALUES
(4, 1, 'Anggota'),
(5, 1, 'Admin'),
(5, 6, 'Anggota'),
(5, 9, 'Admin');

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
(2, '127.0.0.1', '2019-03-12 06:00:27'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `event_viewer`
--
ALTER TABLE `event_viewer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `program_study`
--
ALTER TABLE `program_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_event`
--
ALTER TABLE `sub_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sub_event_ticket`
--
ALTER TABLE `sub_event_ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
