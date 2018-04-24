-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2018 at 12:05 PM
-- Server version: 10.0.34-MariaDB
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
-- Database: `kirw5729_cargo`
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
(1, 0, NULL, '2018-02-11 07:59:53');

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
(1, '0300', 'Fish(edible), Seafood', 'Yang termasuk dalam kategori ini adalah semua jenis ikan yang dapat dikonsumsi dan semua jenis seafood', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(2, '0301', 'Fish(edible), Seafood(excluding Caviar)', 'Yang termasuk dalam kategori ini adalah semua jenis ikan yang dapat dikonsumsi dan semua jenis seafood keculai kaviar', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(3, '0302', 'Seafood', 'Yang termasuk dalam kategori ini adalah semua jenis seafood', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(4, '0304', 'Sea Urchin / Processed', 'Yang termasuk dalam kategori ini adalah bulu babi atau bulu babi yang sudah di proses', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(6, '0306', 'Fish, Fish products', 'Yang termasuk dalam kategori ini adalah semua jenis ikan dan produk olahan dari ikan', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(8, '0308', 'Fish(smoked)', 'Yang termasuk dalam kategori ini adalah ikan yang sudah diolah dengan cara diasapi', '2017-12-12 16:45:57', '2017-12-12 16:45:57'),
(13, '0315', 'Crabs, Crawfish, Lobsters', 'Yang termasuk dalam kategori ini adalah semua jenis kepiting, lobster air tawar dan lobster', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(20, '0326', 'Fish(edible)', 'Yang termasuk dalam kategori ini adalah Semua jenis ikan yang dapat di konsumsi', '2017-12-12 16:45:58', '2018-03-02 07:53:12'),
(26, '0356', 'Fish, Crabs, Shrimps-edible-', 'Yang termasuk dalam kategori ini adalah semua jenis ikan, kepiting dan udang yang dapat dikonsumsi', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(28, '0382', 'Shrimps and/or Prawns', 'Yang termasuk dalam kategori ini adalah semua jenis udang baik yang besar maupun yang kecil', '2017-12-12 16:45:58', '2017-12-12 16:45:58'),
(34, '1026', 'Benih/Bibit Ikan, Udang dll', 'Yang termasuk dalam kategori ini adalah benih/bibit ikan dan udang, dll', '2018-02-18 08:25:42', '2018-03-02 07:51:31');

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

--
-- Dumping data for table `confirmations`
--

INSERT INTO `confirmations` (`id`, `order_number`, `transfer_date`, `transfer_to`, `transfer_amount`, `transfer_name`, `transfer_photo`, `isVerified`, `created_at`, `updated_at`) VALUES
(1, '1519010460', '2018-02-19', 'BANK XYZ a/n Iska - 08118012345', 2685000, 'Maldy', 'confirmations/1519010460/KpPEOLG9rMKXlrBGmruOTBE98l0A8TFqdTCUeFI6.jpeg', 1, '2018-02-18 20:23:17', '2018-03-02 08:59:38'),
(2, '1519998636', '2018-03-02', 'BANK XYZ a/n Iska - 08118012345', 2161500, 'Maldy', 'confirmations/1519998636/n9lNaI2hv3AtZJoyIUNoQScKcB5rTX0ayRouiAVu.jpeg', 1, '2018-03-02 08:22:37', '2018-03-02 08:51:19');

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
(29, 1, 13, 2, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-17 10:34:05', '2018-02-17 10:34:05'),
(30, 1, 12, 2, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-17 10:35:00', '2018-02-17 10:35:00'),
(31, 1, 11, 2, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-17 10:36:27', '2018-02-17 10:36:27'),
(32, 1, 10, 2, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-17 10:37:32', '2018-02-17 10:37:32'),
(33, 1, 9, 2, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-17 10:38:22', '2018-02-17 10:38:22'),
(34, 1, 8, 2, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 10:43:00', '2018-02-17 10:43:00'),
(35, 1, 7, 2, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-17 10:44:20', '2018-02-17 10:44:20'),
(36, 1, 6, 2, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-17 10:46:58', '2018-02-17 10:46:58'),
(37, 1, 5, 2, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25300\"}', 0.9, '2018-02-17 10:47:56', '2018-02-17 10:47:56'),
(38, 1, 4, 2, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-17 10:48:45', '2018-02-17 10:48:45'),
(39, 1, 3, 2, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-17 10:49:44', '2018-02-17 10:49:44'),
(40, 1, 2, 2, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 10:50:29', '2018-02-17 10:50:29'),
(41, 1, 1, 2, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-17 10:51:06', '2018-02-17 10:51:06'),
(42, 1, 13, 3, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-17 11:11:47', '2018-02-17 11:11:47'),
(43, 1, 12, 3, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-17 11:12:57', '2018-02-17 11:12:57'),
(44, 1, 11, 3, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-17 11:13:51', '2018-02-17 11:13:51'),
(45, 1, 10, 3, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-17 11:18:38', '2018-02-17 11:18:38'),
(46, 1, 9, 3, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24700\"}', 0.9, '2018-02-17 11:22:26', '2018-02-17 11:22:26'),
(47, 1, 8, 3, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 11:23:39', '2018-02-17 11:23:39'),
(48, 1, 7, 3, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16599\"}', 0.9, '2018-02-17 11:24:27', '2018-02-17 11:24:27'),
(49, 1, 6, 3, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-17 11:26:06', '2018-02-17 11:26:06'),
(50, 1, 5, 3, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25300\"}', 0.9, '2018-02-17 11:27:04', '2018-02-17 11:27:04'),
(51, 1, 4, 3, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-17 11:27:37', '2018-02-17 11:27:37'),
(52, 1, 3, 3, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-17 11:28:21', '2018-02-17 11:28:21'),
(53, 1, 2, 3, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 11:29:16', '2018-02-17 11:29:16'),
(54, 1, 1, 3, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-17 11:29:58', '2018-02-17 11:29:58'),
(55, 1, 13, 4, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-17 20:17:45', '2018-02-17 20:17:45'),
(56, 1, 12, 4, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-17 20:18:38', '2018-02-17 20:18:38'),
(57, 1, 11, 4, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-17 20:19:33', '2018-02-17 20:19:33'),
(58, 1, 10, 4, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-17 20:21:17', '2018-02-17 20:21:17'),
(59, 1, 9, 4, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25100\",\"plus_100\":\"24900\"}', 0.9, '2018-02-17 20:22:04', '2018-02-17 20:22:04'),
(60, 1, 8, 4, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 20:23:01', '2018-02-17 20:23:01'),
(61, 1, 7, 4, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-17 20:29:08', '2018-02-17 20:29:08'),
(62, 1, 6, 4, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-17 20:30:03', '2018-02-17 20:30:03'),
(63, 1, 5, 4, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25297\"}', 0.9, '2018-02-17 20:30:50', '2018-02-17 20:30:50'),
(64, 1, 4, 4, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-17 20:31:26', '2018-02-17 20:31:26'),
(65, 1, 3, 4, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-17 20:32:23', '2018-02-17 20:32:23'),
(66, 1, 2, 4, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 20:32:59', '2018-02-17 20:32:59'),
(67, 1, 1, 4, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8300\"}', 0.9, '2018-02-17 20:34:34', '2018-02-17 20:34:34'),
(68, 1, 13, 6, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-17 20:36:15', '2018-02-17 20:36:15'),
(69, 1, 12, 6, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24200\"}', 0.9, '2018-02-17 20:37:11', '2018-02-17 20:37:11'),
(70, 1, 11, 6, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-17 20:37:57', '2018-02-17 20:37:57'),
(71, 1, 10, 6, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-17 20:39:04', '2018-02-17 20:39:04'),
(72, 1, 9, 6, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-17 20:40:31', '2018-02-17 20:40:31'),
(73, 1, 8, 6, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 20:41:48', '2018-02-17 20:41:48'),
(74, 1, 7, 6, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-17 23:33:01', '2018-02-17 23:33:01'),
(75, 1, 6, 6, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-17 23:35:57', '2018-02-17 23:35:57'),
(76, 1, 5, 6, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25300\"}', 0.9, '2018-02-17 23:38:02', '2018-02-17 23:38:02'),
(77, 1, 4, 6, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-17 23:39:21', '2018-02-17 23:39:21'),
(78, 1, 3, 6, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-17 23:40:01', '2018-02-17 23:40:01'),
(79, 1, 2, 6, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-17 23:52:44', '2018-02-17 23:52:44'),
(80, 1, 1, 6, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-17 23:53:41', '2018-02-17 23:53:41'),
(81, 1, 13, 8, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-17 23:55:02', '2018-02-17 23:57:27'),
(82, 1, 12, 8, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-17 23:58:15', '2018-02-17 23:58:15'),
(83, 1, 11, 8, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-17 23:59:06', '2018-02-17 23:59:06'),
(85, 1, 9, 8, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-18 00:01:25', '2018-02-18 00:01:25'),
(86, 1, 8, 8, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15100\"}', 0.9, '2018-02-18 00:02:10', '2018-02-18 00:02:10'),
(87, 1, 7, 8, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-18 00:03:00', '2018-02-18 00:03:00'),
(88, 1, 6, 8, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-18 00:03:51', '2018-02-18 00:03:51'),
(89, 1, 5, 8, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25200\"}', 0.9, '2018-02-18 00:05:57', '2018-02-18 00:05:57'),
(90, 1, 4, 8, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-18 02:50:01', '2018-02-18 02:50:01'),
(91, 1, 3, 8, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-18 03:06:14', '2018-02-18 03:06:35'),
(92, 1, 2, 8, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15100\"}', 0.9, '2018-02-18 03:12:32', '2018-02-18 03:12:32'),
(93, 1, 1, 8, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8100\"}', 0.9, '2018-02-18 03:13:18', '2018-02-18 03:13:18'),
(94, 1, 13, 13, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-18 03:45:47', '2018-02-18 03:45:47'),
(95, 1, 12, 13, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-18 03:46:55', '2018-02-18 03:46:55'),
(96, 1, 11, 13, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-18 04:45:38', '2018-02-18 04:45:38'),
(97, 1, 10, 13, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-18 04:48:47', '2018-02-18 04:48:47'),
(98, 1, 9, 13, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-18 05:06:28', '2018-02-18 05:06:28'),
(99, 1, 8, 13, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-18 05:08:12', '2018-02-18 05:08:12'),
(100, 1, 7, 13, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-18 05:11:57', '2018-02-18 05:11:57'),
(101, 1, 6, 13, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-18 05:18:06', '2018-02-18 05:18:06'),
(102, 1, 5, 13, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-18 05:18:43', '2018-02-18 05:18:43'),
(103, 1, 4, 13, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-18 05:22:28', '2018-02-18 05:22:28'),
(104, 1, 3, 13, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-18 05:23:21', '2018-02-18 05:23:21'),
(105, 1, 2, 13, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-18 05:28:03', '2018-02-18 05:28:03'),
(106, 1, 1, 13, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-18 05:29:33', '2018-02-18 05:29:33'),
(107, 1, 13, 28, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-18 05:42:21', '2018-02-18 05:42:21'),
(108, 1, 12, 28, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-18 05:45:25', '2018-02-18 05:45:25'),
(109, 1, 11, 28, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-18 05:46:22', '2018-02-18 05:46:22'),
(110, 1, 10, 28, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-18 05:47:21', '2018-02-18 05:47:21'),
(111, 1, 9, 28, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-18 05:48:14', '2018-02-18 05:48:14'),
(112, 1, 8, 28, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15199\"}', 0.9, '2018-02-18 05:49:13', '2018-02-18 05:49:13'),
(113, 1, 7, 28, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-18 05:54:54', '2018-02-18 05:54:54'),
(114, 1, 6, 28, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-18 05:57:34', '2018-02-18 05:57:34'),
(115, 1, 5, 28, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25300\"}', 0.9, '2018-02-18 05:59:35', '2018-02-18 05:59:35'),
(116, 1, 4, 28, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-18 06:00:11', '2018-02-18 06:00:11'),
(117, 1, 3, 28, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-18 06:00:50', '2018-02-18 06:00:50'),
(118, 1, 2, 28, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-18 06:01:22', '2018-02-18 06:01:22'),
(119, 1, 1, 28, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-18 06:01:59', '2018-02-18 06:01:59'),
(120, 1, 13, 26, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-18 06:17:17', '2018-02-18 06:17:17'),
(121, 1, 12, 26, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-18 06:19:41', '2018-02-18 06:19:41'),
(122, 1, 11, 26, '{\"minimal\":\"245000\",\"nominal\":\"24500\",\"plus_45\":\"24200\",\"plus_100\":\"24000\"}', 0.9, '2018-02-18 06:22:29', '2018-02-18 06:22:29'),
(123, 1, 10, 26, '{\"minimal\":\"205000\",\"nominal\":\"20500\",\"plus_45\":\"20200\",\"plus_100\":\"20000\"}', 0.9, '2018-02-18 06:25:00', '2018-02-18 06:25:00'),
(124, 1, 9, 26, '{\"minimal\":\"253000\",\"nominal\":\"25300\",\"plus_45\":\"25000\",\"plus_100\":\"24800\"}', 0.9, '2018-02-18 06:27:26', '2018-02-18 06:27:26'),
(125, 1, 8, 26, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-18 06:28:33', '2018-02-18 06:28:33'),
(126, 1, 7, 26, '{\"minimal\":\"171000\",\"nominal\":\"17100\",\"plus_45\":\"16800\",\"plus_100\":\"16600\"}', 0.9, '2018-02-18 06:29:31', '2018-02-18 06:29:31'),
(127, 1, 6, 26, '{\"minimal\":\"216000\",\"nominal\":\"21600\",\"plus_45\":\"21300\",\"plus_100\":\"21100\"}', 0.9, '2018-02-18 06:30:12', '2018-02-18 06:30:12'),
(128, 1, 5, 26, '{\"minimal\":\"258000\",\"nominal\":\"25800\",\"plus_45\":\"25500\",\"plus_100\":\"25300\"}', 0.9, '2018-02-18 06:31:19', '2018-02-18 06:31:19'),
(129, 1, 4, 26, '{\"minimal\":\"158000\",\"nominal\":\"15800\",\"plus_45\":\"15500\",\"plus_100\":\"15300\"}', 0.9, '2018-02-18 06:33:09', '2018-02-18 06:33:09'),
(130, 1, 3, 26, '{\"minimal\":\"214000\",\"nominal\":\"21400\",\"plus_45\":\"21100\",\"plus_100\":\"20900\"}', 0.9, '2018-02-18 06:33:43', '2018-02-18 06:33:43'),
(131, 1, 2, 26, '{\"minimal\":\"157000\",\"nominal\":\"15700\",\"plus_45\":\"15400\",\"plus_100\":\"15200\"}', 0.9, '2018-02-18 06:34:53', '2018-02-18 06:34:53'),
(132, 1, 1, 26, '{\"minimal\":\"87000\",\"nominal\":\"8700\",\"plus_45\":\"8400\",\"plus_100\":\"8200\"}', 0.9, '2018-02-18 06:35:40', '2018-02-18 06:35:40'),
(133, 1, 13, 34, '{\"minimal\":\"196000\",\"nominal\":\"19600\",\"plus_45\":\"19300\",\"plus_100\":\"19100\"}', 0.9, '2018-02-18 08:27:11', '2018-02-18 08:27:11'),
(134, 1, 12, 34, '{\"minimal\":\"355000\",\"nominal\":\"35500\",\"plus_45\":\"35200\",\"plus_100\":\"35000\"}', 0.9, '2018-02-18 08:29:18', '2018-02-18 08:29:18'),
(135, 1, 11, 34, '{\"minimal\":\"354000\",\"nominal\":\"35400\",\"plus_45\":\"35100\",\"plus_100\":\"34900\"}', 0.9, '2018-02-18 08:29:54', '2018-02-18 08:29:54'),
(136, 1, 10, 34, '{\"minimal\":\"296000\",\"nominal\":\"29600\",\"plus_45\":\"29300\",\"plus_100\":\"29100\"}', 0.9, '2018-02-18 08:32:46', '2018-02-18 08:32:46'),
(137, 1, 9, 34, '{\"minimal\":\"365000\",\"nominal\":\"36500\",\"plus_45\":\"36200\",\"plus_100\":\"36000\"}', 0.9, '2018-02-18 08:36:17', '2018-02-18 08:36:17'),
(138, 1, 8, 34, '{\"minimal\":\"227000\",\"nominal\":\"22700\",\"plus_45\":\"22400\",\"plus_100\":\"22200\"}', 0.9, '2018-02-18 08:38:24', '2018-02-18 08:38:24'),
(139, 1, 7, 34, '{\"minimal\":\"247000\",\"nominal\":\"24700\",\"plus_45\":\"24400\",\"plus_100\":\"22200\"}', 0.9, '2018-02-18 08:39:23', '2018-02-18 08:39:23'),
(140, 1, 6, 34, '{\"minimal\":\"312000\",\"nominal\":\"31200\",\"plus_45\":\"30900\",\"plus_100\":\"30700\"}', 0.9, '2018-02-18 08:40:06', '2018-02-18 08:40:06'),
(141, 1, 5, 34, '{\"minimal\":\"372000\",\"nominal\":\"37200\",\"plus_45\":\"36900\",\"plus_100\":\"36700\"}', 0.9, '2018-02-18 08:41:16', '2018-02-18 08:41:16'),
(142, 1, 4, 34, '{\"minimal\":\"228000\",\"nominal\":\"22800\",\"plus_45\":\"22500\",\"plus_100\":\"22300\"}', 0.9, '2018-02-18 08:42:06', '2018-02-18 08:42:06'),
(143, 1, 3, 34, '{\"minimal\":\"309000\",\"nominal\":\"30900\",\"plus_45\":\"30600\",\"plus_100\":\"30400\"}', 0.9, '2018-02-18 08:45:04', '2018-02-18 08:45:04'),
(144, 1, 2, 34, '{\"minimal\":\"227000\",\"nominal\":\"22700\",\"plus_45\":\"22400\",\"plus_100\":\"22200\"}', 0.9, '2018-02-18 08:45:32', '2018-02-18 08:45:32'),
(145, 1, 1, 34, '{\"minimal\":\"126000\",\"nominal\":\"12600\",\"plus_45\":\"12300\",\"plus_100\":\"12100\"}', 0.9, '2018-02-18 08:46:17', '2018-02-18 08:46:17'),
(146, 1, 13, 20, '{\"minimal\":\"136000\",\"nominal\":\"13600\",\"plus_45\":\"13300\",\"plus_100\":\"13100\"}', 0.9, '2018-02-22 17:43:39', '2018-02-22 17:43:39'),
(147, 1, 12, 20, '{\"minimal\":\"246000\",\"nominal\":\"24600\",\"plus_45\":\"24300\",\"plus_100\":\"24100\"}', 0.9, '2018-02-22 17:44:46', '2018-02-22 17:44:46'),
(148, 1, 11, 20, '{\"minimal\":\"236000\",\"nominal\":\"23600\",\"plus_45\":\"23300\",\"plus_100\":\"23100\"}', 0.9, '2018-02-23 12:22:27', '2018-02-23 12:22:27'),
(149, 1, 10, 20, '{\"minimal\":\"197000\",\"nominal\":\"19700\",\"plus_45\":\"19400\",\"plus_100\":\"19200\"}', 0.9, '2018-02-23 12:26:37', '2018-02-23 12:32:52'),
(150, 1, 9, 20, '{\"minimal\":\"243000\",\"nominal\":\"24300\",\"plus_45\":\"24000\",\"plus_100\":\"23800\"}', 0.9, '2018-02-23 12:27:51', '2018-02-23 12:27:51'),
(151, 1, 8, 20, '{\"minimal\":\"151000\",\"nominal\":\"15100\",\"plus_45\":\"14800\",\"plus_100\":\"14600\"}', 0.9, '2018-02-23 12:29:12', '2018-02-23 12:29:12'),
(152, 1, 7, 20, '{\"minimal\":\"165000\",\"nominal\":\"16500\",\"plus_45\":\"16200\",\"plus_100\":\"16000\"}', 0.9, '2018-02-23 12:29:56', '2018-02-23 12:38:08'),
(153, 1, 6, 20, '{\"minimal\":\"208000\",\"nominal\":\"20800\",\"plus_45\":\"20500\",\"plus_100\":\"20300\"}', 0.9, '2018-02-23 12:31:08', '2018-02-23 12:38:32'),
(154, 1, 5, 20, '{\"minimal\":\"248000\",\"nominal\":\"24800\",\"plus_45\":\"24500\",\"plus_100\":\"24300\"}', 0.9, '2018-02-23 12:39:20', '2018-02-23 12:39:20'),
(155, 1, 4, 20, '{\"minimal\":\"152000\",\"nominal\":\"15200\",\"plus_45\":\"14900\",\"plus_100\":\"14700\"}', 0.9, '2018-02-23 12:40:52', '2018-02-23 12:40:52'),
(156, 1, 3, 20, '{\"minimal\":\"206000\",\"nominal\":\"20600\",\"plus_45\":\"20300\",\"plus_100\":\"20100\"}', 0.9, '2018-02-23 12:41:50', '2018-02-23 12:41:50'),
(157, 1, 2, 20, '{\"minimal\":\"151000\",\"nominal\":\"15100\",\"plus_45\":\"14800\",\"plus_100\":\"14600\"}', 0.9, '2018-02-23 12:42:30', '2018-02-23 12:42:30'),
(158, 1, 1, 20, '{\"minimal\":\"84000\",\"nominal\":\"8400\",\"plus_45\":\"8100\",\"plus_100\":\"7900\"}', 0.9, '2018-02-23 12:43:23', '2018-02-23 12:43:23');

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
(1, 'SOQ', 'SORONG', 'PAPUA BARAT', '1 Hari', '2017-12-12 16:45:56', '2018-03-02 07:37:57'),
(2, 'SRG', 'SEMARANG', 'JAWA TENGAH', '1 Hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(3, 'SQG', 'SINTANG', 'KALIMANTAN BARAT', '2 hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(4, 'SUB', 'SURABAYA', 'JAWA TIMUR', '1 Hari', '2017-12-12 16:45:56', '2017-12-12 16:45:56'),
(5, 'SWQ', 'SUMBAWA', 'NUSA TENGGARA BARAT', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:19:47'),
(6, 'SXK', 'SAUMLAKI', 'MALUKU', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:20:19'),
(7, 'TJQ', 'TANJUNG PANDAN', 'KEPULAUAN BANGKA BELITUNG', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:21:29'),
(8, 'TKG', 'BANDAR LAMPUNG', 'LAMPUNG', '1 Hari', '2017-12-12 16:45:57', '2018-03-02 07:22:35'),
(9, 'TMC', 'WAIKABUBAK', 'NUSA TENGGARA TIMUR', '1 Hari', '2017-12-12 16:45:57', '2018-03-02 07:23:23'),
(10, 'TNJ', 'TANJUNG PINANG', 'KEPULAUAN RIAU', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:28:18'),
(11, 'TRK', 'TARAKAN', 'KALIMANTAN UTARA', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:30:27'),
(12, 'TTE', 'TERNATE', 'MALUKU UTARA', '2 Hari', '2017-12-12 16:45:57', '2018-03-02 07:37:04'),
(13, 'UPG', 'MAKASSAR', 'SULAWESI SELATAN', '1 Hari', '2017-12-12 16:45:57', '2018-03-02 07:37:21');

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
(2, 'BANK-BNI', 'BAnk BNI 0242221208 (Max Royzer Pakan)', '<p>XYZ Cab. TIMIKA<br />No. Rek. 08118012345<br />a/n Iska', '2018-02-07 10:00:20', '2018-02-07 10:00:20');

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
(4, 4, 'tunai', NULL, '10000', 0, '2018-02-10 07:30:02', '2018-02-10 07:30:02', NULL),
(5, 3, 'tunai', NULL, '0', 1, '2018-02-11 08:00:11', '2018-02-11 08:02:07', NULL),
(6, 13, 'tunai', NULL, '0', 1, '2018-02-12 18:49:45', '2018-02-12 18:49:59', NULL),
(7, 22, 'transfer', '09876578 Bank BRI', '0', 1, '2018-03-02 08:29:10', '2018-03-02 08:34:30', NULL);

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
(3, '1518028346', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":\"1\",\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518028346\\/lSspFDLKuIUQC3jim6Cn2LWSqERAb0MgL48WkSg6.png\"}', 1, '2018-02-07 10:32:26', '2018-02-11 08:00:16', '2018-02-11 08:00:16'),
(4, '1518028402', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":0,\"method\":\"1\",\"total\":840000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518028402\\/36tmvLEa5Xhh4h7wdjDJXwF0TZx8WX6rY8ZLS1mg.png\"}', 1, '2018-02-07 10:33:22', '2018-02-10 07:30:07', '2018-02-10 07:30:07'),
(5, '1518028582', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"testing\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 100, '{\"status\":\"1\",\"method\":\"1\",\"total\":840000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518028582\\/a7iz0yahBquBGQiejdo4esxTcGGPJIEETt6RSUQu.png\"}', 0, '2018-02-07 10:36:22', '2018-02-08 06:03:50', NULL),
(6, '1518031164', '{\"name\":\"maldy\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"dsfds\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 1, 1, 20, '{\"status\":0,\"method\":\"1\",\"total\":174000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518031164\\/yGvkxLKpIiUdm1d717kGECJIhBGR5gcjlSMxxLoa.png\"}', 1, '2018-02-07 11:19:24', '2018-02-07 11:20:49', '2018-02-07 11:20:49'),
(7, '1518357659', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357659\\/G2xiqUpWCSfJ3y2m20KFB9yAleFgptm0boDrSd6y.png\"}', 0, '2018-02-11 06:00:59', '2018-02-11 06:02:46', NULL),
(8, '1518357676', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357676\\/cQVGAmoQTp2v0wFxCyJ4gk595RQE68rqjais5CG3.png\"}', 0, '2018-02-11 06:01:16', '2018-02-11 06:02:43', NULL),
(9, '1518357688', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357688\\/D3Oa9fhVI0Z0mwmi8p1PNnOJevoqBRhOiweKIi3y.png\"}', 0, '2018-02-11 06:01:28', '2018-02-11 06:02:41', NULL),
(10, '1518357696', '{\"name\":\"Sule\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', '{\"name\":\"Ahmad\",\"phone\":\"+628997139012\",\"email\":\"ahmadhidayatullah95@gmail.com\",\"address\":\"Jl. Wolter Monginsidi No.59, Maricaya Baru, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141\"}', 9, 1, 10, '{\"status\":\"1\",\"method\":\"1\",\"total\":253000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518357696\\/VdriIQPyXS8KrOm5llf3oC3APMTbx3ZNXZFTXZoN.png\"}', 0, '2018-02-11 06:01:36', '2018-02-11 06:02:39', NULL),
(11, '1518421294', '{\"name\":\"Maldy\",\"phone\":\"+6208525004100\",\"email\":\"maldymanguma@gmail.com\",\"address\":\"timika\"}', '{\"name\":\"ahmad\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"makassar\"}', 13, 1, 500, '{\"status\":\"1\",\"method\":\"1\",\"total\":6550000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518421294\\/OYQebg82bh1Df1LwGcHkRthohNwJ0owDVKplenwZ.pdf\"}', 0, '2018-02-11 23:41:34', '2018-02-11 23:42:30', NULL),
(12, '1518487986', '{\"name\":\"maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"Manguma\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"makassar\"}', 13, 1, 90, '{\"status\":\"1\",\"method\":\"1\",\"total\":1197000,\"date\":null}', 4, '{\"letter1\":\"letters\\/1518487986\\/SBxOgBCfESGW9QLJCSWhzp29YgOVkk6w7ladlP1i.pdf\"}', 0, '2018-02-12 18:13:06', '2018-02-12 18:53:30', NULL),
(13, '1518488004', '{\"name\":\"maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"Manguma\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"makassar\"}', 13, 1, 90, '{\"status\":\"1\",\"method\":\"1\",\"total\":1197000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518488004\\/LuedhzDsxVgvG6ozGmjjeWtDjhlQQ4rk1iW46wgz.pdf\"}', 1, '2018-02-12 18:13:24', '2018-02-12 18:49:49', '2018-02-12 18:49:49'),
(14, '1518541943', '{\"name\":\"Maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"Reonaldo\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"Makassar\"}', 13, 1, 100, '{\"status\":0,\"method\":\"1\",\"total\":1330000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518541943\\/WlcwWoOcu3nlGseQ2n4hjHSxRslBQYAkLXKEhuQP.pdf\"}', 0, '2018-02-13 09:12:23', '2018-02-13 09:12:23', NULL),
(16, '1518542928', '{\"name\":\"Maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"Yosa\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"Makassar\"}', 13, 1, 95, '{\"status\":\"1\",\"method\":\"1\",\"total\":1263500,\"date\":null}', 2, '{\"letter1\":\"letters\\/1518542928\\/u9cmzDNqD8jx48WcFINgsIEgc6pEZUX67ej9gw4b.pdf\"}', 0, '2018-02-13 09:28:48', '2018-02-13 09:30:46', NULL),
(18, '1518966903', '{\"name\":\"alden\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"timika\"}', '{\"name\":\"obed\",\"phone\":\"+62081250041000\",\"email\":\"maldy@yahoo.com\",\"address\":\"Makassar\"}', 120, 26, 150, '{\"status\":\"1\",\"method\":\"2\",\"total\":1965000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1518966903\\/NE4ulyhtfsDLVcKYzZhbOSWIL3tMTG35qeygAYVW.pdf\"}', 0, '2018-02-18 08:15:04', '2018-02-18 08:23:21', NULL),
(19, '1519010437', '{\"name\":\"Maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"iska\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"makassar\"}', 13, 1, 205, '{\"status\":\"1\",\"method\":\"1\",\"total\":2685500,\"date\":null}', 1, '{\"letter1\":\"letters\\/1519010437\\/oQqp02cOq551Qvo4pX0IUaZtgL35lv7gbhbI53m2.pdf\"}', 0, '2018-02-18 20:20:38', '2018-02-18 21:50:16', NULL),
(20, '1519010460', '{\"name\":\"Maldy\",\"phone\":\"+6208525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"iska\",\"phone\":\"+62081250041000\",\"email\":\"manguma108@gmail.com\",\"address\":\"makassar\"}', 13, 1, 205, '{\"status\":\"1\",\"method\":\"2\",\"total\":2685500,\"date\":null}', 4, '{\"letter1\":\"letters\\/1519010460\\/eJgxOOQvO19beq0KMaMN9zydBitLnC6jgL8KdE10.pdf\"}', 0, '2018-02-18 20:21:00', '2018-02-18 20:25:35', NULL),
(21, '1519014589', '{\"name\":\"Maldy\",\"phone\":\"+628525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"iska\",\"phone\":\"+6285223408017\",\"email\":\"manguma108@gmail.com\",\"address\":\"Makassar\"}', 42, 3, 200, '{\"status\":\"1\",\"method\":\"1\",\"total\":2620000,\"date\":null}', 5, '{\"letter1\":\"letters\\/1519014589\\/fzkOF2kJUnt8M9gOg7uLFLNEvkJOAoySSsdw5suc.pdf\"}', 0, '2018-02-18 21:29:49', '2018-03-02 08:30:15', NULL),
(22, '1519998636', '{\"name\":\"Maldy\",\"phone\":\"+6285223408017\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"Manguma\",\"phone\":\"+6281242770047\",\"email\":\"maldymanguma@gmail.com\",\"address\":\"Makassar\"}', 146, 20, 165, '{\"status\":\"1\",\"method\":\"2\",\"total\":2161500,\"date\":null}', 1, '{\"letter1\":\"letters\\/1519998636\\/RBQFiNGUE4JFXqfpUQB2yhzf3uu7Cb7UZNBGgZnb.pdf\"}', 1, '2018-03-02 06:50:36', '2018-03-02 08:29:14', '2018-03-02 08:29:14'),
(23, '1520005123', '{\"name\":\"Manguma\",\"phone\":\"+628525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"alden\",\"phone\":\"+6281250041000\",\"email\":\"alden@yahoo.com\",\"address\":\"Makassar\"}', 146, 20, 150, '{\"status\":\"1\",\"method\":\"1\",\"total\":1965000,\"date\":null}', 5, '{\"letter1\":\"letters\\/1520005123\\/uHQROif42GoRmiT917bOnvo3E4V09JMl4CuFHlYG.pdf\"}', 0, '2018-03-02 08:38:43', '2018-03-03 01:14:56', NULL),
(24, '1520063592', '{\"name\":\"alden\",\"phone\":\"+628525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"maldy\",\"phone\":\"+6281242770047\",\"email\":\"manguma@gmail.com\",\"address\":\"Makassar\"}', 146, 20, 200, '{\"status\":\"1\",\"method\":\"1\",\"total\":2620000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1520063592\\/CiIoSwVIbKV2ODyOuUtQ2NZfV0M2azURZZ4r60Iu.pdf\"}', 0, '2018-03-03 00:53:12', '2018-03-03 00:54:51', NULL),
(25, '1520065086', '{\"name\":\"Maldy\",\"phone\":\"+628525004100\",\"email\":\"manguma108@gmail.com\",\"address\":\"Timika\"}', '{\"name\":\"alden\",\"phone\":\"+6281250041000\",\"email\":\"alden@yahoo.com\",\"address\":\"Ternate\"}', 121, 26, 100, '{\"status\":0,\"method\":\"1\",\"total\":2430000,\"date\":null}', 1, '{\"letter1\":\"letters\\/1520065086\\/El7dQ5adBE4VOtsrFRzlIGOv1NIVHdr7qPF3jTBj.pdf\"}', 0, '2018-03-03 01:18:06', '2018-03-03 01:19:44', NULL);

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
  `level` enum('master','kurir') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'kurir',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$bc2fPvrijJstqiWpqhhMU.mIMQ9QTVAHRSNqOT0CEClF8.MLb5.1O', '08997139012', 'btp', 'master', 'Le4IW5RChLRK4YYWmc4LFoTNRcCFrDap6D2t3QE50oumC7k7hVbnqQXMAQbo', NULL, NULL),
(2, 'Admin 1 Max Kargo', 'admin@max-kargo.com', '$2y$10$hdVXYbpkwquKiG3l2VzDvOyxmlVSsEl52LxVCZqNNhqyoZc91Ra9O', '085223408017', 'telkomas', 'master', 'QvpLJzmNrGsnit3WdsFLcDs1JeqF2RtHMF0Bfnwy0ncGCkb1z1jNbdrDC6Ix', '2018-01-23 06:11:35', '2018-01-23 06:11:35'),
(3, 'Maldy', 'maldy@gmail.com', '$2y$10$iRqpZ1dyX61hPH0Nt8.r0.oi3WnLEH88FhjqxGn27.3TH9yusa3ii', '1234', 'Telkomas', 'kurir', 'DWGsURJJqlJwbbNTPOdkMsIY3FC2pjgAQqzzeQOxVl9ikoepT3X7NacBnj65', '2018-02-28 12:20:06', '2018-02-28 12:20:06'),
(4, 'Budi', 'budi@gmail.com', '$2y$10$xXSszda4AEpiZT1Y/ioTP.wqbVFJK.lqQJ6RG1aXN3bCZEe1rD5Ke', '085250041000', 'Timika', 'kurir', 'DAlkKQcfTZ4ZejVrBLtXyfAyQJZp5QHqtm6DWCl5U1CZQ4ykHdEZc3h0BoeM', '2018-03-02 07:00:21', '2018-03-02 07:00:21');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
