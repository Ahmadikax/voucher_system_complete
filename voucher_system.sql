-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 02:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voucher_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `code_logs`
--

CREATE TABLE `code_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `logged_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `code_logs`
--

INSERT INTO `code_logs` (`id`, `product_code_id`, `action`, `note`, `logged_at`) VALUES
(1, 1, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(2, 2, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(3, 3, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(4, 4, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(5, 5, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(6, 6, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(7, 7, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(8, 8, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(9, 9, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(10, 10, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(11, 11, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(12, 12, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(13, 13, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(14, 14, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(15, 15, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(16, 16, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(17, 17, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(18, 18, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(19, 19, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(20, 20, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(21, 21, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(22, 22, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(23, 23, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(24, 24, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(25, 25, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(26, 26, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(27, 27, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(28, 28, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(29, 29, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(30, 30, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(31, 31, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(32, 32, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(33, 33, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(34, 34, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(35, 35, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(36, 36, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(37, 37, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(38, 38, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(39, 39, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(40, 40, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(41, 41, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(42, 42, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(43, 43, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(44, 44, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(45, 45, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(46, 46, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(47, 47, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(48, 48, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(49, 49, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(50, 50, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(51, 51, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(52, 52, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(53, 53, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(54, 54, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(55, 55, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(56, 56, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(57, 57, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(58, 58, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(59, 59, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(60, 60, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(61, 61, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(62, 62, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(63, 63, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(64, 64, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(65, 65, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(66, 66, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(67, 67, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(68, 68, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(69, 69, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(70, 70, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(71, 71, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(72, 72, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(73, 73, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(74, 74, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(75, 75, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(76, 76, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(77, 77, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(78, 78, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(79, 79, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(80, 80, 'imported', 'Code imported from file', '2025-07-10 22:13:22'),
(81, 81, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(82, 82, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(83, 83, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(84, 84, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(85, 85, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(86, 86, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(87, 87, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(88, 88, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(89, 89, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(90, 90, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(91, 91, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(92, 92, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(93, 93, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(94, 94, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(95, 95, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(96, 96, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(97, 97, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(98, 98, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(99, 99, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(100, 100, 'imported', 'Code imported from file', '2025-07-10 22:13:23'),
(101, 82, 'email_sent', 'Code sent to: h2f2coma@gmail.com', '2025-07-10 22:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image_url`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 'Test', 23.00, 'بيشسب', NULL, 0, '2025-07-10 22:08:01', '2025-07-10 22:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_codes`
--

CREATE TABLE `product_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `code` text NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('available','sold','reserved') NOT NULL DEFAULT 'available',
  `expires_at` date DEFAULT NULL,
  `sold_at` timestamp NULL DEFAULT NULL,
  `last_modified_at` timestamp NULL DEFAULT NULL,
  `assigned_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code_image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_codes`
--

INSERT INTO `product_codes` (`id`, `product_id`, `code`, `description`, `status`, `expires_at`, `sold_at`, `last_modified_at`, `assigned_user_id`, `code_image_path`, `created_at`, `updated_at`) VALUES
(1, 1, '971776', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(2, 1, '271837', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(3, 1, '645066', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(4, 1, '786951', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(5, 1, '485111', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(6, 1, '273711', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(7, 1, '271058', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(8, 1, '925727', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(9, 1, '356253', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(10, 1, '123648', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(11, 1, '458756', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(12, 1, '717219', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(13, 1, '714128', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(14, 1, '495283', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(15, 1, '627757', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(16, 1, '738942', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(17, 1, '393487', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(18, 1, '882944', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(19, 1, '440386', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(20, 1, '558735', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(21, 1, '154475', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(22, 1, '638396', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(23, 1, '243630', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(24, 1, '163420', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(25, 1, '719863', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(26, 1, '673684', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(27, 1, '814633', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(28, 1, '946763', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(29, 1, '120175', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(30, 1, '941581', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(31, 1, '624163', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(32, 1, '202687', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(33, 1, '857178', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(34, 1, '125391', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(35, 1, '301745', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(36, 1, '852068', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(37, 1, '272336', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(38, 1, '843323', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(39, 1, '140223', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(40, 1, '227958', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(41, 1, '555753', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(42, 1, '974105', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(43, 1, '397707', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(44, 1, '122244', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(45, 1, '754348', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(46, 1, '432159', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(47, 1, '277711', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(48, 1, '274464', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(49, 1, '611565', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(50, 1, '694195', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(51, 1, '217627', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(52, 1, '285068', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(53, 1, '966158', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(54, 1, '450072', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(55, 1, '754972', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(56, 1, '537386', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(57, 1, '161787', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(58, 1, '410829', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(59, 1, '418648', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(60, 1, '304162', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(61, 1, '430521', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(62, 1, '500296', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(63, 1, '963679', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(64, 1, '484901', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(65, 1, '132475', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(66, 1, '383387', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(67, 1, '123452', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(68, 1, '450092', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(69, 1, '802397', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(70, 1, '836330', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(71, 1, '193133', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(72, 1, '843667', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(73, 1, '375933', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(74, 1, '366894', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(75, 1, '753976', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(76, 1, '614758', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(77, 1, '529505', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(78, 1, '779780', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(79, 1, '167145', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(80, 1, '173431', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(81, 1, '200965', NULL, 'available', NULL, NULL, '2025-07-10 22:13:22', NULL, NULL, '2025-07-10 22:13:22', '2025-07-10 22:13:22'),
(82, 1, '410174', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(83, 1, '828788', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(84, 1, '543700', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(85, 1, '886072', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(86, 1, '503948', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(87, 1, '629069', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(88, 1, '780162', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(89, 1, '920757', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(90, 1, '663032', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(91, 1, '312024', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(92, 1, '915045', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(93, 1, '310935', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(94, 1, '538151', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(95, 1, '504356', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(96, 1, '817111', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(97, 1, '322849', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(98, 1, '141111', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(99, 1, '541657', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23'),
(100, 1, '292039', NULL, 'available', NULL, NULL, '2025-07-10 22:13:23', NULL, NULL, '2025-07-10 22:13:23', '2025-07-10 22:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JoQA8ivs1ty4LhRDZplwchLtmr5s3RzwNqZe1mna', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmZNMlozNnBJb3pQNERWQVp3dHV1R2RjWHFNeUxOYjlSWFJHMW96TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy8xL2NvZGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752193064),
('uNNpcQgiEywb9edzBiQ1Pb2CNIDGpeSh3YiqfYUp', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3VNTGJLbFhPOXVPNXZERHNmdWtETXd5amk3OU96RWV2TGJFSER3ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Qvdm91Y2hlcl9zeXN0ZW1fY29tcGxldGUvcHVibGljL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752192420),
('xL51Wuv6pGe6jQrc2piSmA6s2s3SkuTWOBKYowj7', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDU2bUtKUUg0eFY1MWw3WE53VTZ4c1JsTGhsV1VEbHA4ZEF0Tm9UdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Qvdm91Y2hlcl9zeXN0ZW1fY29tcGxldGUvcHVibGljL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752193558);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'low_stock_threshold', '5', '2025-07-10 23:59:59', '2025-07-10 23:59:59'),
(2, 'allowed_file_types', 'csv,txt', '2025-07-10 23:59:59', '2025-07-10 23:59:59'),
(3, 'code_masking', 'true', '2025-07-10 23:59:59', '2025-07-10 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `code_logs`
--
ALTER TABLE `code_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_logs_product_code_id_foreign` (`product_code_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_codes`
--
ALTER TABLE `product_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_codes_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

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
-- AUTO_INCREMENT for table `code_logs`
--
ALTER TABLE `code_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_codes`
--
ALTER TABLE `product_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `code_logs`
--
ALTER TABLE `code_logs`
  ADD CONSTRAINT `code_logs_product_code_id_foreign` FOREIGN KEY (`product_code_id`) REFERENCES `product_codes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_codes`
--
ALTER TABLE `product_codes`
  ADD CONSTRAINT `product_codes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
