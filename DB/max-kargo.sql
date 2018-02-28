-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 08:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `max-kargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 10000, NULL, '2018-02-08 06:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `commoditiables`
--

CREATE TABLE `commoditiables` (
  `commodity_id` int(11) NOT NULL,
  `commoditiable_id` int(11) NOT NULL,
  `commoditiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `code`, `name`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '0300', 'Fish(edible), Seafood', 'Fish(edible), Seafood', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(2, '0301', 'Fish(edible), Seafood(excluding Caviar)', 'Fish(edible), Seafood(excluding Caviar)', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(3, '0302', 'Seafood', 'Seafood', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(4, '0304', 'Sea Urchin / Processed', 'Sea Urchin / Processed', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(5, '0305', 'Sea Urchin', 'Sea Urchin', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(6, '0306', 'Fish, Fish products', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(7, '0307', 'Fish(processed)', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(8, '0308', 'Fish(smoked)', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(9, '0309', 'Shellfish', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(10, '0310', 'Clams, Oysters, Scallops', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(11, '0311', 'Cockies', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(12, '0314', 'Abalone', 'Fish, Fish products', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(13, '0315', 'Crabs, Crawfish, Lobsters', 'crabs', '2017-12-12 16:45:58', '2018-02-26 08:30:05'),
(14, '0316', 'Crabs', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(15, '0318', 'Tilapia', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(16, '0319', 'Mahi Mahi', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(17, '0320', 'Eel', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(18, '0323', 'Tuna(fresh)', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(19, '0324', 'Fish(edible/excluding Lobsters, Scallops)', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(20, '0326', 'Fish(edible)', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(21, '0330', 'Fish Roe', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(22, '0334', 'Fish Gut (dried)', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(23, '0335', 'Frogs', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(24, '0340', 'Salmon', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(25, '0355', 'Snapper', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(26, '0356', 'Fish, Crabs, Shrimps-edible-', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(27, '0380', 'Shrimps, Prawns', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(28, '0382', 'Shrimps and/or Prawns', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(29, '0384', 'Shrimps, Prawns, Lobsters', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(30, '0385', 'Turtle', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(31, '0386', 'Lobsters', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(32, '1091', 'Snails', 'Fish, Fish products', '2017-12-12 16:45:58', '2017-12-12 16:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_to` text COLLATE utf8_unicode_ci NOT NULL,
  `transfer_amount` double NOT NULL,
  `transfer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `transfer_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `origin_id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL,
  `commodity_id` int(10) UNSIGNED NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `base_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `origin_id`, `destination_id`, `commodity_id`, `price`, `base_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '{\"minimal\":87000,\"nominal\":8700,\"plus_45\":8400,\"plus_100\":8200}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(2, 1, 2, 1, '{\"minimal\":157000,\"nominal\":15700,\"plus_45\":15400,\"plus_100\":15200}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(3, 1, 3, 1, '{\"minimal\":214000,\"nominal\":21400,\"plus_45\":21100,\"plus_100\":20900}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(4, 1, 4, 1, '{\"minimal\":158000,\"nominal\":15800,\"plus_45\":15500,\"plus_100\":15300}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(5, 1, 5, 1, '{\"minimal\":258000,\"nominal\":25800,\"plus_45\":25500,\"plus_100\":25300}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(6, 1, 6, 1, '{\"minimal\":216000,\"nominal\":21600,\"plus_45\":21300,\"plus_100\":21100}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(7, 1, 7, 1, '{\"minimal\":171000,\"nominal\":17100,\"plus_45\":16800,\"plus_100\":16600}', 0.9, '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(8, 1, 8, 1, '{\"minimal\":157000,\"nominal\":15700,\"plus_45\":15400,\"plus_100\":15200}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(9, 1, 9, 1, '{\"minimal\":253000,\"nominal\":25300,\"plus_45\":25000,\"plus_100\":24800}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(10, 1, 10, 1, '{\"minimal\":205000,\"nominal\":20500,\"plus_45\":20200,\"plus_100\":20000}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(11, 1, 11, 1, '{\"minimal\":245000,\"nominal\":24500,\"plus_45\":24200,\"plus_100\":24000}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(12, 1, 12, 1, '{\"minimal\":246000,\"nominal\":24600,\"plus_45\":24300,\"plus_100\":24100}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(13, 1, 13, 1, '{\"minimal\":136000,\"nominal\":13600,\"plus_45\":13300,\"plus_100\":13100}', 0.9, '2017-12-12 16:45:59', '2017-12-12 16:45:59'),
(16, 1, 3, 5, '{\"minimal\":\"200000\",\"nominal\":\"20000\",\"plus_45\":\"2000\",\"plus_100\":\"2000\"}', 0.9, '2018-02-03 08:52:17', '2018-02-03 09:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estimate` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `code`, `name`, `province`, `estimate`, `created_at`, `updated_at`) VALUES
(1, 'SOQ', 'SORONG', 'PAPUA BARAT', '2 hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(2, 'SRG', 'SEMARANG', 'JAWA TENGAH', '1 hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(3, 'SQG', 'SINTANG', 'KALIMANTAN BARAT', '2 hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(4, 'SUB', 'SURABAYA', 'JAWA TIMUR', '4 hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(5, 'SWQ', 'SUMBAWA', 'NUSA TENGGARA BARAT', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(6, 'SXK', 'SAUMLAKI', 'MALUKU', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(7, 'TJQ', 'TANJUNG PANDAN', 'KEPULAUAN BANGKA BELITUNG', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(8, 'TKG', 'BANDAR LAMPUNG', 'LAMPUNG', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(9, 'TMC', 'WAIKABUBAK', 'NUSA TENGGARA TIMUR', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(10, 'TNJ', 'TANJUNG PINANG', 'KEPULAUAN RIAU', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(11, 'TRK', 'TARAKAN', 'KALIMANTAN UTARA', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(12, 'TTE', 'TERNATE', 'MALUKU UTARA', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(13, 'UPG', 'MAKASSAR', 'SULAWESI SELATAN', NULL, '2017-12-12 16:45:57', '2017-12-12 16:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2017_12_10_024248_create_commoditiables_table', 1),
(19, '2014_10_12_000000_create_users_table', 2),
(20, '2014_10_12_100000_create_password_resets_table', 2),
(21, '2017_12_08_190138_create_origins_table', 2),
(22, '2017_12_08_223352_create_destinations_table', 2),
(23, '2017_12_08_223625_create_costs_table', 2),
(24, '2017_12_09_034436_create_statuses_table', 2),
(25, '2017_12_10_023710_create_commodities_table', 2),
(36, '2017_12_10_025118_create_tasks_table', 3),
(37, '2018_01_10_090456_create_payment_methods_table', 3),
(38, '2018_01_11_144353_create_confirmations_table', 3),
(39, '2018_02_07_171305_create_refunds_table', 3),
(40, '2018_02_07_172327_create_charges_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `code`, `name`, `province`, `created_at`, `updated_at`) VALUES
(1, 'TIM', 'TIMIKA', 'PAPUA', '2017-12-12 16:45:56', '2017-12-12 16:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'cash', 'TUNAI', NULL, '2018-02-07 10:00:20', '2018-02-07 10:00:20'),
(2, 'bank-xyz', '0242221208 (Max Royzer Pakan)', '<p>XYZ Cab. TIMIKA<br />No. Rek. 08118012345<br />a/n Iska', '2018-02-07 10:00:20', '2018-02-07 10:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomor_rekening` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_refund` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`id`, `task_id`, `method`, `nomor_rekening`, `charge`, `is_refund`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'tunai', NULL, '10000', 0, '2018-02-07 11:16:50', '2018-02-07 11:16:50', NULL),
(2, 2, 'transfer', '12345566', '10000', 1, '2018-02-07 11:17:48', '2018-02-10 07:20:35', NULL),
(3, 6, 'transfer', '12345', '10000', 0, '2018-02-07 11:20:46', '2018-02-10 07:20:58', NULL),
(4, 4, 'tunai', NULL, '10000', 0, '2018-02-10 07:30:02', '2018-02-10 07:30:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'm', 'Manifest', 'Barang baru didaftarkan di kantor Max Kargo asal pengiriman.', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(2, 'op', 'On-Process', 'Barang sedang dalam proses pengiriman/perjalanan.', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(3, 'ot', 'On-Transit', 'Barang sedang transit di kota tertentu.', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(4, 'd', 'Delivered', 'Barang telah sampai di kota tujuan.', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(5, 'sc', 'Success', 'Barang Telah Diterima.', NULL, NULL),
(6, 'pe', 'Pending', 'Kurir Belum mengambil barang.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` text COLLATE utf8_unicode_ci NOT NULL,
  `to` text COLLATE utf8_unicode_ci NOT NULL,
  `cost_id` int(10) UNSIGNED NOT NULL,
  `commodity_id` int(10) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `payment` text COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `letters` text COLLATE utf8_unicode_ci NOT NULL,
  `isRefund` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `order_number`, `sender`, `to`, `cost_id`, `commodity_id`, `weight`, `payment`, `status_id`, `letters`, `isRefund`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1518026161', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":0,\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518026161\\/ro97dZf5CajtgAvJlzRvG0OINaRd5wvReWXd07aU.png\"}', 1, '2018-02-07 09:56:01', '2018-02-07 11:16:55', '2018-02-07 11:16:55'),
(2, '1518026458', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":0,\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518026458\\/i4G5OIaPG4IaNoRrxZQJYj0WHVYmX9QzPuhie1Bm.png\"}', 1, '2018-02-07 10:00:58', '2018-02-07 11:17:52', '2018-02-07 11:17:52'),
(3, '1518028346', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":\"1\",\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518028346\\/lSspFDLKuIUQC3jim6Cn2LWSqERAb0MgL48WkSg6.png\"}', 0, '2018-02-07 10:32:26', '2018-02-26 09:00:01', NULL),
(4, '1518028402', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":0,\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518028402\\/36tmvLEa5Xhh4h7wdjDJXwF0TZx8WX6rY8ZLS1mg.png\"}', 1, '2018-02-07 10:33:22', '2018-02-10 07:30:07', '2018-02-10 07:30:07'),
(5, '1518028582', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":\"1\",\"method\":\"1\",\"total\":840000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518028582\\/a7iz0yahBquBGQiejdo4esxTcGGPJIEETt6RSUQu.png\"}', 0, '2018-02-07 10:36:22', '2018-02-08 06:03:50', NULL),
(6, '1518031164', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"dsfds\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 20, '{\"status\":0,\"method\":\"1\",\"total\":174000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518031164\\/yGvkxLKpIiUdm1d717kGECJIhBGR5gcjlSMxxLoa.png\"}', 1, '2018-02-07 11:19:24', '2018-02-07 11:20:49', '2018-02-07 11:20:49'),
(7, '1518357659', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357659\\/G2xiqUpWCSfJ3y2m20KFB9yAleFgptm0boDrSd6y.png\"}', 0, '2018-02-11 06:00:59', '2018-02-26 11:18:40', NULL),
(8, '1518357676', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357676\\/cQVGAmoQTp2v0wFxCyJ4gk595RQE68rqjais5CG3.png\"}', 0, '2018-02-11 06:01:16', '2018-02-11 06:02:43', NULL),
(9, '1518357688', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357688\\/D3Oa9fhVI0Z0mwmi8p1PNnOJevoqBRhOiweKIi3y.png\"}', 0, '2018-02-11 06:01:28', '2018-02-11 06:02:41', NULL),
(10, '1518357696', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357696\\/VdriIQPyXS8KrOm5llf3oC3APMTbx3ZNXZFTXZoN.png\"}', 0, '2018-02-11 06:01:36', '2018-02-11 06:02:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$bc2fPvrijJstqiWpqhhMU.mIMQ9QTVAHRSNqOT0CEClF8.MLb5.1O', '08997139012', 'btp', 'Le4IW5RChLRK4YYWmc4LFoTNRcCFrDap6D2t3QE50oumC7k7hVbnqQXMAQbo', NULL, NULL),
(2, 'Admin 1 Max Kargo', 'admin@max-kargo.com', '$2y$10$hdVXYbpkwquKiG3l2VzDvOyxmlVSsEl52LxVCZqNNhqyoZc91Ra9O', '085223408017', 'telkomas', 'pmJSNZ6AsSGMXNYwHCKXWOAs3UvSYofJSMyqMY7U0cnRNN5kNDZ5esZPrdYT', '2018-01-23 06:11:35', '2018-01-23 06:11:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costs_origin_id_foreign` (`origin_id`),
  ADD KEY `costs_destination_id_foreign` (`destination_id`),
  ADD KEY `costs_commodity_id_foreign` (`commodity_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_task_id_foreign` (`task_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_cost_id_foreign` (`cost_id`),
  ADD KEY `tasks_commodity_id_foreign` (`commodity_id`),
  ADD KEY `tasks_status_id_foreign` (`status_id`);

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
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `costs`
--
ALTER TABLE `costs`
  ADD CONSTRAINT `costs_commodity_id_foreign` FOREIGN KEY (`commodity_id`) REFERENCES `commodities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `costs_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `costs_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_commodity_id_foreign` FOREIGN KEY (`commodity_id`) REFERENCES `commodities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `costs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
