-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 10:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_jual`, `harga_beli`, `stok`, `id_kategori`, `created_at`, `updated_at`) VALUES
(11, 'Baruu', 0, 14000, 0, 1, '2021-11-24 09:40:33', '2021-11-24 09:40:52'),
(1980, 'barang', 0, 12000, 0, 1, '2021-11-24 08:21:21', '2021-11-24 08:21:49'),
(99888, 'Barang Baru', 0, 12000, 0, 1, '2021-11-24 04:06:40', '2021-11-24 04:07:25'),
(112345, 'Benih Melon Alisha', 555000, 475000, 68, 1, '2021-11-24 03:03:09', '2021-11-24 09:39:05'),
(129873, 'Benih Semangka Amara F1', 165000, 150000, 197, 1, '2021-11-24 03:03:09', '2021-11-24 03:05:41'),
(218970, 'Benih Melon Alina F1', 178000, 150000, 300, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(238765, 'ANFUSH 500 Gram Pupuk Pengendali Hayati Patogen Tanah', 32000, 27000, 699, 2, '2021-11-24 03:03:09', '2021-11-24 07:23:18'),
(387598, 'SPREADER DGW Perekat Perata Penembus 500ML', 57800, 43000, 383, 2, '2021-11-24 03:03:09', '2021-11-24 08:22:30'),
(432676, 'Benih Sawi Pahit MAJAPAHIT 25GRAM', 15000, 13000, 250, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(435897, 'Benih Cabai Rawit DEWATA 43 F1', 69000, 55000, 546, 1, '2021-11-24 03:03:09', '2021-11-24 09:39:27'),
(563752, 'Benih Kacang Panjang Parade Tavi 200 Butir', 10000, 9000, 449, 1, '2021-11-24 03:03:09', '2021-11-24 07:52:13'),
(598713, 'Benih Tomat KARUNA 10 Gram', 11000, 9500, 500, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(687596, 'Benih Selada Hijau GRAND RAPIDS', 25000, 22500, 380, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(837901, 'Benih Kangkung BANGKOK LP-1', 11000, 9500, 480, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(1456298, 'PETROGENOL 800 L Atraktan Obat Lalat Buah', 5000, 3500, 400, 3, '2021-11-24 03:03:09', '2021-11-24 03:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `barang_dijual`
--

CREATE TABLE `barang_dijual` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_dijual`
--

INSERT INTO `barang_dijual` (`id_barang`, `nama_barang`, `harga_jual`, `harga_beli`, `stok`, `id_kategori`, `created_at`, `updated_at`) VALUES
(112345, 'Benih Melon Alisha', 555000, 475000, 68, 1, '2021-11-24 03:03:09', '2021-11-24 09:39:05'),
(129873, 'Benih Semangka Amara F1', 165000, 150000, 197, 1, '2021-11-24 03:03:10', '2021-11-24 03:05:41'),
(218970, 'Benih Melon Alina F1', 178000, 150000, 300, 1, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(238765, 'ANFUSH 500 Gram Pupuk Pengendali Hayati Patogen Tanah', 32000, 27000, 699, 2, '2021-11-24 03:03:10', '2021-11-24 07:23:18'),
(387598, 'SPREADER DGW Perekat Perata Penembus 500ML', 57800, 43000, 383, 2, '2021-11-24 03:03:10', '2021-11-24 08:22:30'),
(432676, 'Benih Sawi Pahit MAJAPAHIT 25GRAM', 15000, 13000, 250, 1, '2021-11-24 03:03:10', '2021-11-24 03:03:10'),
(435897, 'Benih Cabai Rawit DEWATA 43 F1', 69000, 55000, 546, 1, '2021-11-24 03:03:10', '2021-11-24 09:39:27'),
(563752, 'Benih Kacang Panjang Parade Tavi 200 Butir', 10000, 9000, 449, 1, '2021-11-24 03:03:10', '2021-11-24 07:52:13'),
(598713, 'Benih Tomat KARUNA 10 Gram', 11000, 9500, 500, 1, '2021-11-24 03:03:10', '2021-11-24 03:03:10'),
(687596, 'Benih Selada Hijau GRAND RAPIDS', 25000, 22500, 380, 1, '2021-11-24 03:03:10', '2021-11-24 03:03:10'),
(837901, 'Benih Kangkung BANGKOK LP-1', 11000, 9500, 480, 1, '2021-11-24 03:03:10', '2021-11-24 03:03:10'),
(1456298, 'PETROGENOL 800 L Atraktan Obat Lalat Buah', 5000, 3500, 400, 3, '2021-11-24 03:03:10', '2021-11-24 03:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_barang`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 129873, 3, 495000, NULL, NULL),
(2, 2, 435897, 5, 345000, NULL, NULL),
(3, 3, 435897, 3, 207000, NULL, NULL),
(4, 4, 435897, 2, 138000, NULL, NULL),
(5, 5, 238765, 1, 32000, NULL, NULL),
(6, 6, 435897, 1, 69000, NULL, NULL),
(7, 7, 563752, 1, 10000, NULL, NULL),
(8, 8, 387598, 2, 115600, NULL, NULL),
(9, 9, 435897, 10, 690000, NULL, NULL),
(10, 10, 112345, 2, 1110000, NULL, NULL),
(11, 11, 435897, 3, 207000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forecasting`
--

CREATE TABLE `forecasting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yt` double(8,2) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `Mt` double(8,3) DEFAULT NULL,
  `M't` double(8,3) DEFAULT NULL,
  `a` double(8,3) DEFAULT NULL,
  `b` double(8,3) DEFAULT NULL,
  `Ft` double(8,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forecasting_des`
--

CREATE TABLE `forecasting_des` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` date DEFAULT NULL,
  `Xt` double(10,3) DEFAULT NULL,
  `St` double(10,3) DEFAULT NULL,
  `St2` double(10,3) DEFAULT NULL,
  `a` double(10,3) DEFAULT NULL,
  `b` double(10,3) DEFAULT NULL,
  `ft` double(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forecasting_des`
--

INSERT INTO `forecasting_des` (`id`, `waktu`, `Xt`, `St`, `St2`, `a`, `b`, `ft`, `created_at`, `updated_at`) VALUES
(1, '2021-01-31', 69.000, 69.000, 69.000, 69.000, 0.000, NULL, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(2, '2021-02-28', 71.000, 70.124, 69.632, 70.616, 0.632, 69.000, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(3, '2021-03-31', 65.000, 67.244, 68.290, 66.199, -1.342, 71.248, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(4, '2021-04-30', 69.000, 68.231, 68.257, 68.205, -0.033, 64.857, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(5, '2021-05-31', 73.000, 70.911, 69.749, 72.074, 1.492, 68.172, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(6, '2021-06-30', 75.000, 73.209, 71.693, 74.725, 1.945, 73.566, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(7, '2021-07-31', 80.000, 77.026, 74.690, 79.361, 2.997, 76.670, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(8, '2021-08-31', 74.000, 75.325, 75.047, 75.603, 0.357, 82.358, '2021-11-24 09:42:51', '2021-11-24 09:42:51'),
(9, '2021-09-30', 62.000, 67.836, 70.995, 64.678, -4.052, 75.960, '2021-11-24 09:42:52', '2021-11-24 09:42:52'),
(10, '2021-11-24', NULL, NULL, NULL, NULL, NULL, 60.626, '2021-11-24 09:42:52', '2021-11-24 09:42:52'),
(11, '2021-12-24', NULL, NULL, NULL, NULL, NULL, 56.574, '2021-11-24 09:42:52', '2021-11-24 09:42:52'),
(12, '2022-01-24', NULL, NULL, NULL, NULL, NULL, 52.521, '2021-11-24 09:42:52', '2021-11-24 09:42:52'),
(13, '2022-02-24', NULL, NULL, NULL, NULL, NULL, 48.469, '2021-11-24 09:42:52', '2021-11-24 09:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'benih bibit tanaman', '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(2, 'pupuk', '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(3, 'pest control', '2021-11-24 03:03:09', '2021-11-24 03:03:09');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_10_05_040130_create_kategori_table', 1),
(4, '2021_10_05_051000_create_barang_table', 1),
(5, '2021_10_05_053023_create_transaksi_table', 1),
(6, '2021_10_06_142210_create_penjualan_table', 1),
(7, '2021_10_06_142310_create_detail_penjualan_table', 1),
(8, '2021_10_20_105931_create_rekap_barang_table', 1),
(9, '2021_10_20_115051_create_barang_dijual_table', 1),
(10, '2021_10_30_223134_create_penjualan_barang_table', 1),
(11, '2021_10_30_230010_create_forecasting_table', 1),
(12, '2021_11_11_215507_create_forecasting_des_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_kasir` bigint(20) UNSIGNED NOT NULL,
  `grand_total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl`, `id_kasir`, `grand_total`, `pembayaran`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, '2021-11-24 03:05:41', 1, 495000, 500000, 5000, '2021-11-24 03:05:41', '2021-11-24 03:05:41'),
(2, '2021-11-24 04:07:59', 1, 345000, 350000, 5000, '2021-11-24 04:07:59', '2021-11-24 04:07:59'),
(3, '2021-11-24 04:08:22', 1, 207000, 210000, 3000, '2021-11-24 04:08:22', '2021-11-24 04:08:22'),
(4, '2021-11-24 04:10:47', 1, 138000, 138000, 0, '2021-11-24 04:10:47', '2021-11-24 04:10:47'),
(5, '2021-11-24 07:23:18', 1, 32000, 33000, 1000, '2021-11-24 07:23:18', '2021-11-24 07:23:18'),
(6, '2021-11-24 07:51:46', 1, 69000, 70000, 1000, '2021-11-24 07:51:46', '2021-11-24 07:51:46'),
(7, '2021-11-24 07:52:13', 1, 10000, 10000, 0, '2021-11-24 07:52:13', '2021-11-24 07:52:13'),
(8, '2021-11-24 08:22:30', 1, 115600, 120000, 4400, '2021-11-24 08:22:30', '2021-11-24 08:22:30'),
(9, '2021-11-24 08:22:53', 1, 690000, 700000, 10000, '2021-11-24 08:22:53', '2021-11-24 08:22:53'),
(10, '2021-11-24 09:39:05', 1, 1110000, 1200000, 90000, '2021-11-24 09:39:05', '2021-11-24 09:39:05'),
(11, '2021-11-24 09:39:27', 1, 207000, 208000, 1000, '2021-11-24 09:39:27', '2021-11-24 09:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_barang`
--

CREATE TABLE `penjualan_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` date NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_barang`
--

INSERT INTO `penjualan_barang` (`id`, `waktu`, `id_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2021-01-31', 129873, 70, NULL, NULL),
(2, '2021-02-28', 129873, 74, NULL, NULL),
(3, '2021-03-31', 129873, 69, NULL, NULL),
(4, '2021-04-30', 129873, 64, NULL, NULL),
(5, '2021-05-31', 129873, 62, NULL, NULL),
(6, '2021-06-30', 129873, 59, NULL, NULL),
(7, '2021-07-31', 129873, 56, NULL, NULL),
(8, '2021-08-31', 129873, 52, NULL, NULL),
(9, '2021-09-30', 129873, 48, NULL, NULL),
(10, '2021-10-31', 129873, 62, NULL, NULL),
(11, '2021-01-31', 432676, 70, NULL, NULL),
(12, '2021-02-28', 432676, 74, NULL, NULL),
(13, '2021-03-31', 432676, 69, NULL, NULL),
(14, '2021-04-30', 432676, 64, NULL, NULL),
(15, '2021-05-31', 432676, 62, NULL, NULL),
(16, '2021-06-30', 432676, 59, NULL, NULL),
(17, '2021-07-31', 432676, 56, NULL, NULL),
(18, '2021-08-31', 432676, 52, NULL, NULL),
(19, '2021-09-30', 432676, 48, NULL, NULL),
(20, '2021-10-31', 432676, 62, NULL, NULL),
(21, '2021-01-31', 563752, 39, NULL, NULL),
(22, '2021-02-28', 563752, 30, NULL, NULL),
(23, '2021-03-31', 563752, 35, NULL, NULL),
(24, '2021-04-30', 563752, 45, NULL, NULL),
(25, '2021-05-31', 563752, 50, NULL, NULL),
(26, '2021-06-30', 563752, 55, NULL, NULL),
(27, '2021-07-31', 563752, 60, NULL, NULL),
(28, '2021-08-31', 563752, 40, NULL, NULL),
(29, '2021-09-30', 563752, 45, NULL, NULL),
(30, '2021-10-31', 563752, 38, NULL, NULL),
(31, '2021-01-31', 837901, 69, NULL, NULL),
(32, '2021-02-28', 837901, 71, NULL, NULL),
(33, '2021-03-31', 837901, 65, NULL, NULL),
(34, '2021-04-30', 837901, 69, NULL, NULL),
(35, '2021-05-31', 837901, 73, NULL, NULL),
(36, '2021-06-30', 837901, 75, NULL, NULL),
(37, '2021-07-31', 837901, 80, NULL, NULL),
(38, '2021-08-31', 837901, 74, NULL, NULL),
(39, '2021-09-30', 837901, 62, NULL, NULL),
(40, '2021-10-31', 837901, 58, NULL, NULL),
(41, '2021-01-31', 435897, 30, NULL, NULL),
(42, '2021-02-28', 435897, 32, NULL, NULL),
(43, '2021-03-31', 435897, 30, NULL, NULL),
(44, '2021-04-30', 435897, 33, NULL, NULL),
(45, '2021-05-31', 435897, 29, NULL, NULL),
(46, '2021-06-30', 435897, 28, NULL, NULL),
(47, '2021-07-31', 435897, 31, NULL, NULL),
(48, '2021-08-31', 435897, 26, NULL, NULL),
(49, '2021-09-30', 435897, 27, NULL, NULL),
(50, '2021-10-31', 435897, 22, NULL, NULL),
(51, '2021-01-31', 598713, 62, NULL, NULL),
(52, '2021-02-28', 598713, 67, NULL, NULL),
(53, '2021-03-31', 598713, 65, NULL, NULL),
(54, '2021-04-30', 598713, 61, NULL, NULL),
(55, '2021-05-31', 598713, 58, NULL, NULL),
(56, '2021-06-30', 598713, 61, NULL, NULL),
(57, '2021-07-31', 598713, 58, NULL, NULL),
(58, '2021-08-31', 598713, 52, NULL, NULL),
(59, '2021-09-30', 598713, 50, NULL, NULL),
(60, '2021-10-31', 598713, 57, NULL, NULL),
(61, '2021-01-31', 687596, 36, NULL, NULL),
(62, '2021-02-28', 687596, 40, NULL, NULL),
(63, '2021-03-31', 687596, 45, NULL, NULL),
(64, '2021-04-30', 687596, 58, NULL, NULL),
(65, '2021-05-31', 687596, 70, NULL, NULL),
(66, '2021-06-30', 687596, 39, NULL, NULL),
(67, '2021-07-31', 687596, 43, NULL, NULL),
(68, '2021-08-31', 687596, 65, NULL, NULL),
(69, '2021-09-30', 687596, 79, NULL, NULL),
(70, '2021-10-31', 687596, 59, NULL, NULL),
(71, '2021-11-24', 129873, 3, '2021-11-24 03:05:41', '2021-11-24 03:05:41'),
(72, '2021-11-24', 435897, 24, '2021-11-24 04:07:59', '2021-11-24 09:39:27'),
(73, '2021-11-24', 563752, 1, '2021-11-24 07:52:13', '2021-11-24 07:52:13');

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
-- Table structure for table `rekap_barang`
--

CREATE TABLE `rekap_barang` (
  `id_rekap_barang` bigint(20) UNSIGNED NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `barang_masuk` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap_barang`
--

INSERT INTO `rekap_barang` (`id_rekap_barang`, `tgl`, `id_barang`, `barang_masuk`, `total_barang`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, '2021-11-24 04:06:40', 99888, 3, 3, 1, '2021-11-24 04:06:40', '2021-11-24 04:06:40'),
(2, '2021-11-24 04:07:15', 99888, 5, 8, 1, '2021-11-24 04:07:15', '2021-11-24 04:07:15'),
(3, '2021-11-24 08:21:21', 1980, 22, 22, 1, '2021-11-24 08:21:21', '2021-11-24 08:21:21'),
(4, '2021-11-24 08:37:18', 112345, 10, 10, 2, '2021-11-24 08:37:18', '2021-11-24 08:37:18'),
(5, '2021-11-24 08:45:00', 112345, 20, 20, 2, '2021-11-24 08:45:00', '2021-11-24 08:45:00'),
(6, '2021-11-24 08:46:22', 112345, 30, 30, 2, '2021-11-24 08:46:22', '2021-11-24 08:46:22'),
(7, '2021-11-24 09:40:33', 11, 55, 55, 1, '2021-11-24 09:40:33', '2021-11-24 09:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fatimah', 'Admin', '$2y$10$fN8LIoG/xPoZEcfpCWpchuySjVwbk3Bza9xnvOmy1f/ek6A7YLGxm', 'karyawan', NULL, '2021-11-24 03:03:09', '2021-11-24 03:03:09'),
(2, 'Bapak Sunardi', 'Pemilik', '$2y$10$Gxnzuo/7c4lTQ5mTV450Ke57rX078uhPq66bsR.I0XIoj0N6Vu/jC', 'pemilik', NULL, '2021-11-24 03:03:09', '2021-11-24 03:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `barang_dijual`
--
ALTER TABLE `barang_dijual`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_dijual_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penjualan_id_penjualan_foreign` (`id_penjualan`),
  ADD KEY `detail_penjualan_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `forecasting`
--
ALTER TABLE `forecasting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forecasting_des`
--
ALTER TABLE `forecasting_des`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `penjualan_id_kasir_foreign` (`id_kasir`);

--
-- Indexes for table `penjualan_barang`
--
ALTER TABLE `penjualan_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_barang_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekap_barang`
--
ALTER TABLE `rekap_barang`
  ADD PRIMARY KEY (`id_rekap_barang`),
  ADD KEY `rekap_barang_id_barang_foreign` (`id_barang`),
  ADD KEY `rekap_barang_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forecasting`
--
ALTER TABLE `forecasting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forecasting_des`
--
ALTER TABLE `forecasting_des`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan_barang`
--
ALTER TABLE `penjualan_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekap_barang`
--
ALTER TABLE `rekap_barang`
  MODIFY `id_rekap_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `barang_dijual`
--
ALTER TABLE `barang_dijual`
  ADD CONSTRAINT `barang_dijual_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_penjualan_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_id_kasir_foreign` FOREIGN KEY (`id_kasir`) REFERENCES `users` (`id`);

--
-- Constraints for table `penjualan_barang`
--
ALTER TABLE `penjualan_barang`
  ADD CONSTRAINT `penjualan_barang_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `rekap_barang`
--
ALTER TABLE `rekap_barang`
  ADD CONSTRAINT `rekap_barang_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rekap_barang_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
