-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2019 at 11:27 AM
-- Server version: 10.0.36-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-2+ubuntu16.04.1+deb.sury.org+1

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `logo`, `location`, `description`, `background_color`, `created_at`, `updated_at`) VALUES
(1, 'Andalas University', 'default-logo.svg', 'Limau Manih', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 'Indonesia University', 'default-logo.svg', 'jakarta', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 'Bung Hatta University', 'default-logo.svg', 'yogyakarta', 'bla bla bla bla bla', '#ffffff', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(4, 'YPTK UPI', 'default-logo.svg', 'Limau Manih', 'bla bla bla bla bla', '#ffffff', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(5, 'Riau University', 'default-logo.svg', 'jakarta', 'bla bla bla bla bla', '#ffffff', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
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
(1, 'Teknologi', 'Deskripsi teknologi'),
(2, 'Desain', 'Deskripsi desain disini'),
(3, 'Ekonomi', 'bla balba lab lab lala');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `created_at`, `updated_at`, `sub_event_id`, `sender`) VALUES
(1, 'tes comment 1', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 1, 2),
(2, 'tes comment 2', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 2, 3),
(3, 'tes comment 3', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-event.svg',
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `organization_id`, `name`, `description`, `qr_code`, `status`, `start_date`, `end_date`, `photo`, `web_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Firetech', 'Firetech adalah bla bla bla bla bla', 'kajd8afd87', 'pending', '2018-09-27 00:12:34', '2018-09-27 00:12:34', '1.jpeg', 'firetech.neotelemetri.com', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 2, 'ISCE', 'ISCE adalah bla bla bla bla bla', 'kajd8afdfd87', 'pending', '2018-09-27 00:12:34', '2018-09-27 00:12:34', '2.jpeg', 'isce.hmsiunand.com', '2018-09-27 00:12:34', '2018-09-27 00:12:34');

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
(8, 1, 3);

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
(51, 2, 3, '2019-01-31 02:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `campus_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fakultas Teknologi Informasi', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 1, 'Fakultas Ekonomi', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 1, 'Fakultas Teknik', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(4, 1, 'Fakultas Teknologi Informasi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(5, 1, 'Fakultas Ekonomi', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(6, 1, 'Fakultas Teknik', '2019-01-25 02:00:16', '2019-01-25 02:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_20_072616_create_roles_table', 1),
(4, '2018_05_22_121518_add_foreign_key_role_user', 1),
(5, '2018_09_26_154723_create_table_program_study', 1),
(6, '2018_09_26_154752_create_table_faculty', 1),
(7, '2018_09_26_154807_create_table_campus', 1),
(8, '2018_09_26_155420_add_foreign_key', 1),
(9, '2018_09_26_160728_create_table_organization', 1),
(10, '2018_09_26_160755_create_table_suggestion', 1),
(11, '2018_09_26_161015_create_table_event', 1),
(12, '2018_09_26_161156_create_table_sub_event', 1),
(13, '2018_09_26_161220_create_table_event_category', 1),
(14, '2018_09_26_162606_create_table_comment', 1),
(15, '2018_09_26_163955_create_table_transaction', 1),
(16, '2018_09_26_164001_create_table_ticket', 1),
(17, '2018_09_26_170034_add_foreign_key_sub_event', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.svg',
  `photo_cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-cover.svg',
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `user_id`, `campus_id`, `name`, `photo_profile`, `photo_cover`, `instagram`, `line`, `facebook`, `whatsapp`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Neo Telemetri', 'default-avatar.svg', 'default-cover.svg', '@neotelemetri', NULL, NULL, '081219281982', '081219281982', 'Neo Telemetri adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 3, 2, 'Pica', 'default-avatar.svg', 'default-cover.svg', '@pica', NULL, NULL, '081219281982', '081219281982', 'Pica adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 3, 1, 'PHP', 'default-avatar.svg', 'default-cover.svg', '@php', NULL, NULL, '081219281782', '081219281983', 'PHP adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa', '2018-09-27 00:12:34', '2018-09-27 00:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_study`
--

CREATE TABLE `program_study` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_study`
--

INSERT INTO `program_study` (`id`, `faculty_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sistem Informasi', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 3, 'Manajemen', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(2, 'User', '2018-09-27 00:12:34', '2018-09-27 00:12:34'),
(3, 'Admin', '2019-01-25 02:00:16', '2019-01-25 02:00:16'),
(4, 'User', '2019-01-25 02:00:16', '2019-01-25 02:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_event`
--

CREATE TABLE `sub_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_stock` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-event.svg',
  `web_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_event`
--

INSERT INTO `sub_event` (`id`, `event_id`, `approved`, `name`, `slug`, `description`, `location`, `whatsapp`, `line`, `qr_code`, `ticket_stock`, `price`, `status`, `start_time`, `end_time`, `date`, `photo`, `web_link`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Lomba TIK', 'lomba-tik-832938', 'Lomba TIK adalah bla bla bla bla bla', 'PKM, Unand', '0813713219871', 'id_line_h', 'kajd8afd87d', 50, '30000.00', 'ongoing', '2019-02-01 01:00:00', '2019-02-01 05:00:00', '2019-02-02', '6.jpeg', 'firetech.neotelemetri.com', '2018-09-27 00:12:35', '2019-01-28 16:56:37'),
(2, 1, 1, 'Hackathon', 'hackathon-91238291', 'Hackathon adalah bla bla bla bla bla', 'DilLo Padang', '0813713219889', 'id_line_eu', 'kajd8afd87d9', 100, '300000.00', 'ongoing', '2018-09-27 00:12:35', '2018-09-27 00:12:35', '2019-02-16', '6.jpeg', 'firetech.neotelemetri.com', '2018-09-27 00:12:35', '2019-01-28 16:59:10'),
(3, 2, 1, 'Expo dan Bazar', 'expo-dan-bazar-328391823', 'Expo dan bazar adalah bla bla bla bla bla', 'Fakultas Teknologi Informasi, Universitas Andalas', '08137321239', 'id_line_eur', 'kajd8afd87d49', 110, '500000.00', 'past', '2018-09-27 00:12:35', '2018-09-27 00:12:35', '2018-09-27', '6.jpeg', 'isce.hmsiunand.com', '2018-09-27 00:12:35', '2019-01-28 17:02:53'),
(4, 1, 1, 'Lomba Desain', 'lomba-desain-934384', 'bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain bal bla bla bal ini deskripsi lomba desain', 'Padang Selatan', '92389283', 'djfkdjf', 'blabla.jpg', 21, '20000.00', 'ongoing', NULL, NULL, '2019-01-31', '1.jpeg', '', '2019-01-29 01:00:00', '2019-01-28 23:50:15'),
(5, 1, 1, 'Lomba MLBB', 'lomba-mlbb-8384934', 'bal bal balb alb albal alb alb al balbab', 'Padang', NULL, NULL, 'babababa', 21, '321212.00', 'ongoing', NULL, NULL, '2019-02-08', 'default-event.svg', 'bla.com', '2019-01-29 03:00:00', NULL),
(6, 1, 1, 'Lomba PUBG', 'lomba-pubg-3434134', 'adfafda adaf d ffdfdf dfdf d f', 'Pekanbaru', NULL, NULL, 'adfafafdaf', 4, '323232.00', 'ongoing', NULL, NULL, '2019-03-28', 'default-event.svg', 'dfdf', '2019-01-29 05:00:00', NULL),
(7, 2, 1, 'Lomba Mikrotik', 'lomba-mikrotik-343847', 'adfafdadf dfdf df dfd f dfdf', 'Padang, Unand', NULL, NULL, '23123dafaf', 21, '323123.00', 'ongoing', NULL, NULL, '2019-03-14', 'default-event.svg', 'erererer', '2019-01-29 08:00:00', NULL),
(8, 1, 1, 'Lomba Lari 200km Padang - Payakumbuh', 'tes-9348934', 'adfadfafdafafd', 'adfaf', NULL, NULL, 'dafafd', 343, '34324.00', 'ongoing', NULL, NULL, '2019-01-31', 'default-event.svg', 'dfdf', '2019-01-29 09:00:00', '2019-01-29 03:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `content`, `created_at`, `updated_at`, `user_id`, `organization_id`) VALUES
(1, 'Ini saran dan kritik 1', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 2, 1),
(2, 'Ini saran dan kritik 2', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 3, 1),
(3, 'Ini saran dan kritik 3', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `qr_code`, `status`, `created_at`, `updated_at`, `transaction_id`) VALUES
(1, 'kadjdf9', 'pending', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 1),
(2, 'kad343', 'pending', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_total` int(11) NOT NULL,
  `admin_cost` decimal(8,2) NOT NULL,
  `unique_code` int(11) NOT NULL,
  `cost_total` decimal(8,2) NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-proof.svg',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sub_event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `ticket_total`, `admin_cost`, `unique_code`, `cost_total`, `sender`, `proof_payment`, `status`, `created_at`, `updated_at`, `user_id`, `sub_event_id`) VALUES
(1, 4, '300.00', 12131, '120000.00', 'Hapis Firman', 'blalba.jpg', 'pending', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 2, 1),
(2, 1, '300.00', 12131, '20000.00', 'Aqli Mulia', 'bla.jpg', 'pending', '2018-09-27 00:12:35', '2018-09-27 00:12:35', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `program_study_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.svg',
  `photo_ktm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.svg',
  `date_birth` timestamp NULL DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `token_fcm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apps_version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `program_study_id`, `username`, `email`, `password`, `fullname`, `nim`, `phone`, `photo_profile`, `photo_ktm`, `date_birth`, `gender`, `last_login`, `token_fcm`, `phone_type`, `android_type`, `apps_version`, `banned`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'admin', 'admin@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Administrator', '1511521021', '081371321919', 'default-avatar.svg', 'default-avatar.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JBizD6aEiryN868Ypt1wNRWxBzl1nJkfInZBir0rEFjKB1j2uZcxRoBJ3xnY', '2018-09-27 00:12:34', '2019-01-25 02:03:29', NULL),
(2, 2, 2, 'badusaputra', 'badu@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Badu Saputra', '1511521022', '081371321919', 'default-avatar.svg', 'default-avatar.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hgUdAtpT11Kk8Vl1poiqM9yCKGK1JD6X24gVRp49', '2018-09-27 00:12:34', '2018-09-27 00:12:34', NULL),
(3, 2, 3, 'budiperkasa', 'budi@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Budi Perkasa', '1511521023', '081371421919', 'default-avatar.svg', 'default-avatar.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'k2p4cAkCLpN5gCB56sKV7RcAONnq0yxj0hfwAVKv', '2018-09-27 00:12:34', '2018-09-27 00:12:34', NULL),
(4, 2, 3, 'sitisarah', 'siti@gmail.com', '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa', 'Siti Sarah', '1511521020', '08137141919', 'default-avatar.svg', 'default-avatar.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4DQxm4uG1idjbEFn4Gl6KxXJeUqgqmnF6vxI5MQl', '2018-09-27 00:12:34', '2018-09-27 00:12:34', NULL),
(5, 2, 2, 'wahyu ade pratama', 'wahyuadepratama@gmail.com', '$2y$10$7rYORf/qK2wY.3/qm4g2eetiO28cA95d0TDlVTMXva23kSTThfdkq', NULL, '1511521024', '081371321971', 'default-avatar.svg', 'default-avatar.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-01 03:32:24', '2018-10-01 03:32:24', NULL);

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
(2, '127.0.0.1', '2019-01-31 02:07:07'),
(3, '10.21.2.112', '2019-01-29 02:50:06'),
(4, '192.168.43.1', '2019-01-29 11:06:58'),
(5, '192.168.43.99', '2019-01-29 11:07:43');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_user_id_index` (`user_id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `sub_event_event_id_index` (`event_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestion_user_id_index` (`user_id`),
  ADD KEY `suggestion_organization_id_index` (`organization_id`);

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
-- Indexes for table `viewer`
--
ALTER TABLE `viewer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `event_viewer`
--
ALTER TABLE `event_viewer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `program_study`
--
ALTER TABLE `program_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_event`
--
ALTER TABLE `sub_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organization_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_study`
--
ALTER TABLE `program_study`
  ADD CONSTRAINT `program_study_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_event`
--
ALTER TABLE `sub_event`
  ADD CONSTRAINT `sub_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggestion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
