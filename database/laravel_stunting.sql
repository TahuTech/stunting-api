-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 03:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_stunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `balitas`
--

CREATE TABLE `balitas` (
  `idb` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balitas`
--

INSERT INTO `balitas` (`idb`, `nama`) VALUES
(0, 'Khansa Adelia N'),
(35783049080001, 'Shintia Rahma'),
(357830280370002, 'A. Isham Malabi'),
(3578300002740002, 'Alfarezel Maulid A'),
(3578300211210001, 'M.tengku maulana I'),
(3578300407170001, 'M. Abiyan Aska P'),
(3578300408180001, 'Usama Bin Agus'),
(3578300505200003, 'A. Aji Putra Bayu'),
(3578300610190001, 'M. Gibran'),
(3578300705170002, 'M. Rizki Pamungkas'),
(3578300810200001, 'Arfan'),
(3578301006190002, 'M. Alfan'),
(3578301104200001, 'M. Rifki Afriansyah'),
(3578301104202001, 'Tarendra Putra S'),
(3578301106180001, 'Khaled'),
(3578301310780001, 'Hamza'),
(3578301312210001, 'Areta Zaiba'),
(3578301402160001, 'Azmi Abi Manaf A'),
(3578301410190001, 'Zavier Akhtar'),
(3578301801480002, 'Devano Fabyan A'),
(3578301803190002, 'M. Jafar Shodiq'),
(3578301903200001, 'Daviandra'),
(3578302000100003, 'Abdullah Farich'),
(3578302006160001, 'Moch Dzaki Banu'),
(3578302011170002, 'M. Ridho'),
(3578302012180002, 'Moch Rafi Alana'),
(3578302012210001, 'M.Randika maulana'),
(3578302203190002, 'Moch Hanif Haidar'),
(3578302305210001, 'A. Ibnu Athaillah'),
(3578302403170002, 'Devan Farelia Elzafi'),
(3578302704170001, 'A. Shaka Arkan N'),
(3578302706210001, 'Ardana Abi Putra'),
(3578302812190001, 'Arsya Evano F'),
(3578304106170001, 'Adzqiara Yumna Q'),
(3578304210170005, 'Mikayla Salsabila P'),
(3578304311200001, 'Nadia alysha'),
(3578304409190001, 'Diva Permata Safina'),
(3578304707190001, 'Mikayla Inara S'),
(3578304711180001, 'Ghania Inayah'),
(3578305004180002, 'Kyara Sachio N'),
(3578305205190000, 'Nabila Putri S'),
(3578305205190004, 'M. Jefri Pratama'),
(3578305602870001, 'Dhea Ameera'),
(3578305704200005, 'Avrilia Jasmine'),
(3578305809170002, 'Nahla Dwi Azzahra'),
(3578305910190002, 'Feliciya Adinda D'),
(3578306411170002, 'Kayla Nadifa Almaira'),
(3578306504170000, 'Aprilia Putri Yasmin'),
(3578306803180001, 'Earlita Arsyifa S'),
(3578306812190001, 'Dianita Lestari P');

-- --------------------------------------------------------

--
-- Table structure for table `datasets`
--

CREATE TABLE `datasets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `du` double NOT NULL,
  `dbb` double NOT NULL,
  `dtb` double NOT NULL,
  `jarak` double DEFAULT NULL,
  `dgizi` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dberat` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtinggi` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dstunting` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datasets`
--

INSERT INTO `datasets` (`id`, `du`, `dbb`, `dtb`, `jarak`, `dgizi`, `dberat`, `dtinggi`, `dstunting`) VALUES
(1, 6, 15, 65, 64.039050586341, '1', '1', '2', '2'),
(2, 14, 10, 78, 77.006493232714, '2', '2', '2', '2'),
(3, 24, 13, 85, 84.005952170069, '2', '2', '2', '2'),
(4, 10, 7, 60, 59.008473967728, '3', '3', '2', '1'),
(5, 18, 6.5, 58, 57.043842787807, '4', '4', '4', '1'),
(6, 12, 10, 75, 74.006756448314, '2', '2', '2', '2'),
(7, 5, 5.5, 50, 49.020403915105, '2', '3', '4', '1'),
(8, 4, 6, 50, 49.010203019371, '2', '2', '4', '2'),
(9, 16, 12, 65, 64.015623093117, '2', '1', '4', '1'),
(10, 26, 17, 75, 74.033776075518, '1', '1', '4', '1'),
(11, 30, 16, 85, 84.011903918433, '2', '1', '2', '2'),
(12, 0, 3.5, 47, 46.010868281309, '2', '2', '2', '2'),
(13, 8, 6, 60, 59.008473967728, '3', '3', '4', '1'),
(14, 10, 6.5, 75, 74.013512279853, '4', '3', '2', '1'),
(15, 6, 10, 70, 69.036222376373, '1', '1', '2', '2'),
(16, 13, 15, 70, 69.036222376373, '1', '1', '2', '2'),
(17, 25, 9, 80, 79.012657213892, '4', '3', '2', '1'),
(18, 23, 7, 60, 59.033888572582, '3', '4', '4', '1'),
(19, 30, 6, 50, 49.050993873723, '4', '4', '4', '1'),
(20, 4, 4, 45, 44.056781543821, '4', '4', '4', '1'),
(21, 10, 8.5, 80, 79.006328860415, '2', '2', '1', '2'),
(22, 6, 7, 65, 64.007812023221, '2', '2', '2', '2'),
(23, 6, 5, 65, 64, '3', '2', '2', '2'),
(24, 18, 10, 75, 74.006756448314, '2', '2', '2', '2'),
(25, 14, 8, 68, 67, '3', '2', '4', '1'),
(26, 21, 8.8, 76, 75, '3', '2', '1', '2'),
(27, 43, 13.2, 94, 93, '3', '2', '1', '2'),
(28, 39, 12.6, 88, 87, '3', '2', '1', '2'),
(29, 20, 10.6, 73, 72.006944109579, '3', '1', '1', '2'),
(30, 19, 10.4, 76, 75.006666370397, '3', '1', '1', '2'),
(31, 54, 13.5, 95, 94, '3', '2', '1', '2'),
(32, 37, 12.4, 84, 83.006023877789, '3', '1', '1', '2'),
(33, 22, 10.2, 78, 77, '3', '2', '1', '2'),
(34, 44, 14.1, 94, 93, '3', '2', '1', '2'),
(35, 43, 13.3, 97, 96, '3', '2', '1', '2'),
(36, 1, 3, 49, 48, '3', '2', '1', '2'),
(37, 30, 12, 85, 84.005952170069, '2', '2', '2', '2'),
(38, 58, 18, 106, 105, '3', '2', '1', '2'),
(39, 28, 16, 99, 98.005101908013, '2', '2', '2', '2'),
(40, 9, 8, 66, 65.00769185258, '2', '2', '2', '2'),
(41, 32, 16, 79, 78.012819459368, '2', '1', '2', '2'),
(42, 48, 13, 94, 93, '3', '2', '1', '2'),
(43, 53, 12, 100, 99, '3', '2', '1', '2'),
(44, 16, 10, 72, 71.014083110324, '2', '1', '2', '2'),
(45, 33, 13, 85, 84.005952170069, '2', '2', '2', '2'),
(46, 23, 13, 85, 84, '3', '2', '2', '2'),
(47, 3, 6, 51, 50.0099990002, '2', '2', '4', '1'),
(48, 59, 20, 108, 107, '3', '2', '1', '2'),
(49, 58, 31, 116, 115, '3', '2', '1', '2'),
(50, 43, 16, 104, 103, '3', '2', '1', '2'),
(51, 43, 16, 104, 103, '3', '2', '1', '2'),
(52, 24, 11, 85, 84, '3', '2', '2', '2'),
(53, 51, 15, 92, 91, '3', '2', '1', '2'),
(54, 52, 14, 99, 98, '3', '2', '1', '2'),
(55, 35, 12, 95, 94, '3', '2', '1', '2'),
(56, 29, 11, 88, 87, '3', '2', '1', '2'),
(57, 55, 17, 107, 106, '3', '2', '1', '2'),
(58, 55, 17, 107, 106, '3', '2', '1', '2'),
(59, 55, 14, 101, 100, '3', '2', '1', '2'),
(60, 22, 10, 79, 78, '3', '2', '1', '2'),
(61, 9, 7, 66, 65, '3', '2', '2', '2'),
(62, 22, 11, 78, 77, '3', '2', '1', '2'),
(63, 29, 11, 85, 84, '3', '2', '2', '2'),
(64, 34, 16, 80, 79.012657213892, '2', '1', '2', '2'),
(65, 29, 11, 85, 84, '3', '2', '2', '2'),
(66, 36, 10, 67, 66.007575322837, '3', '3', '4', '1'),
(67, 41, 12, 70, 69, '3', '2', '4', '1'),
(68, 9, 5, 60, 59.042357676502, '4', '4', '4', '1'),
(69, 37, 12, 99, 98.005101908013, '2', '2', '2', '2'),
(70, 9, 9, 79, 78.006409993026, '2', '2', '1', '2'),
(71, 50, 12, 80, 79.006328860415, '3', '3', '4', '1'),
(72, 12, 10, 69, 68.007352543677, '2', '2', '2', '2'),
(73, 48, 12, 88, 87.005746936625, '3', '3', '4', '1'),
(74, 18, 8, 69, 68.007352543677, '3', '3', '4', '1'),
(75, 48, 13, 92, 91.005494339628, '2', '2', '3', '2'),
(76, 20, 3, 77, 76.006578662639, '2', '2', '2', '2'),
(77, 48, 11, 92, 91.021975368589, '3', '4', '3', '1'),
(78, 21, 8, 70, 69.007245996344, '3', '3', '4', '1'),
(79, 4, 10, 90, 89.022469073824, '3', '4', '4', '1'),
(80, 21, 7, 68, 67.037303048377, '4', '4', '4', '1'),
(81, 18, 13, 79, 78.032044699598, '1', '1', '2', '2'),
(82, 19, 8, 68, 67.007462271004, '3', '3', '4', '1'),
(83, 19, 8, 78, 77.012985917961, '2', '3', '2', '2'),
(84, 50, 12, 93, 92.005434622092, '3', '3', '3', '1'),
(85, 54, 12, 93, 92.005434622092, '3', '3', '4', '1'),
(86, 23, 8, 78, 77.006493232714, '3', '3', '3', '1'),
(87, 21, 8, 68, 67.037303048377, '4', '4', '4', '1'),
(88, 54, 12, 93, 92.005434622092, '3', '3', '4', '1'),
(89, 23, 8, 78, 77.006493232714, '3', '3', '3', '1'),
(90, 21, 8, 68, 67.037303048377, '4', '4', '4', '1');

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
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jmlbb` double NOT NULL,
  `norm` double NOT NULL,
  `stun` double NOT NULL,
  `gizle` double NOT NULL,
  `gizba` double NOT NULL,
  `gizku` double NOT NULL,
  `gizbu` double NOT NULL,
  `tintin` double NOT NULL,
  `tinnor` double NOT NULL,
  `tinpen` double NOT NULL,
  `tinspen` double NOT NULL,
  `berle` double NOT NULL,
  `berba` double NOT NULL,
  `berku` double NOT NULL,
  `bersku` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `jmlbb`, `norm`, `stun`, `gizle`, `gizba`, `gizku`, `gizbu`, `tintin`, `tinnor`, `tinpen`, `tinspen`, `berle`, `berba`, `berku`, `bersku`) VALUES
(1, 50, 32, 18, 1, 11, 35, 3, 17, 14, 5, 14, 3, 30, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `knns`
--

CREATE TABLE `knns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `u` double NOT NULL,
  `bb` double NOT NULL,
  `tb` double NOT NULL,
  `bulan` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gizi` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stunting` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knns`
--

INSERT INTO `knns` (`id`, `id_balita`, `u`, `bb`, `tb`, `bulan`, `gizi`, `berat`, `tinggi`, `stunting`) VALUES
(1, 3578300705170002, 58, 18, 106, '3', '3', '2', '1', '2'),
(2, 3578301410190001, 49, 16, 99, '3', '3', '2', '1', '2'),
(3, 0, 9, 8, 66, '3', '2', '2', '2', '2'),
(4, 35783049080001, 53, 12, 100, '3', '3', '2', '1', '2'),
(5, 357830280370002, 16, 10, 72, '3', '2', '1', '2', '2'),
(6, 3578300002740002, 33, 13, 85, '3', '2', '2', '2', '2'),
(7, 3578300211210001, 23, 13, 85, '3', '3', '2', '2', '2'),
(8, 3578300407170001, 3, 6, 51, '3', '2', '2', '4', '1'),
(9, 3578300408180001, 59, 20, 108, '3', '3', '2', '1', '2'),
(10, 3578300505200003, 58, 31, 116, '3', '3', '2', '1', '2'),
(11, 3578300610190001, 43, 16, 104, '3', '3', '2', '1', '2'),
(12, 3578300810200001, 43, 16, 104, '3', '3', '2', '1', '2'),
(13, 3578301006190002, 24, 11, 85, '3', '3', '2', '2', '2'),
(14, 3578301104200001, 51, 15, 92, '3', '3', '2', '1', '2'),
(15, 3578301104202001, 52, 14, 99, '3', '3', '2', '1', '2'),
(16, 3578301106180001, 35, 12, 95, '3', '3', '2', '1', '2'),
(17, 3578301310780001, 29, 11, 88, '3', '3', '2', '1', '2'),
(18, 3578301312210001, 55, 17, 107, '3', '3', '2', '1', '2'),
(19, 3578301402160001, 55, 17, 107, '3', '3', '2', '1', '2'),
(20, 3578301801480002, 55, 14, 101, '3', '3', '2', '1', '2'),
(21, 3578301803190002, 22, 10, 79, '3', '3', '2', '1', '2'),
(22, 3578301903200001, 9, 7, 66, '3', '3', '2', '2', '2'),
(23, 3578302000100003, 22, 11, 78, '3', '3', '2', '1', '2'),
(24, 3578302006160001, 29, 11, 85, '3', '3', '2', '2', '2'),
(25, 3578302011170002, 34, 16, 80, '3', '2', '1', '2', '2'),
(26, 3578302012180002, 29, 11, 85, '3', '3', '2', '2', '2'),
(27, 3578302012210001, 36, 10, 67, '3', '3', '3', '4', '1'),
(28, 3578302203190002, 41, 12, 70, '3', '3', '2', '4', '1'),
(29, 3578302305210001, 9, 5, 60, '3', '4', '4', '4', '1'),
(30, 3578302403170002, 37, 12, 99, '3', '2', '2', '2', '2'),
(31, 3578302704170001, 9, 9, 79, '3', '2', '2', '1', '2'),
(32, 3578302706210001, 50, 12, 80, '3', '3', '3', '4', '1'),
(33, 3578302812190001, 12, 10, 69, '3', '2', '2', '2', '2'),
(34, 3578304106170001, 48, 12, 88, '3', '3', '3', '4', '1'),
(35, 3578304210170005, 18, 8, 69, '3', '3', '3', '4', '1'),
(36, 3578304311200001, 48, 13, 92, '3', '2', '2', '3', '2'),
(37, 3578304409190001, 20, 3, 77, '3', '2', '2', '2', '2'),
(38, 3578304707190001, 48, 11, 92, '3', '3', '4', '3', '1'),
(39, 3578304711180001, 21, 8, 70, '3', '3', '3', '4', '1'),
(40, 3578305004180002, 4, 10, 90, '3', '3', '4', '4', '1'),
(41, 3578305205190000, 21, 7, 68, '3', '4', '4', '4', '1'),
(42, 3578305205190004, 18, 13, 79, '3', '1', '1', '2', '2'),
(43, 3578305602870001, 19, 8, 68, '3', '3', '3', '4', '1'),
(44, 3578305704200005, 19, 8, 78, '3', '2', '3', '2', '2'),
(45, 3578305809170002, 50, 12, 93, '3', '3', '3', '3', '1'),
(46, 3578305910190002, 54, 12, 93, '3', '3', '3', '4', '1'),
(47, 3578306411170002, 23, 8, 78, '3', '3', '3', '3', '1'),
(48, 3578306504170000, 21, 8, 68, '3', '4', '4', '4', '1'),
(49, 3578306803180001, 54, 12, 93, '3', '3', '3', '4', '1'),
(50, 3578306812190001, 23, 8, 78, '3', '3', '3', '3', '1');

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
(5, '2022_06_15_042853_create_balitas_table', 1),
(6, '2022_06_22_024757_create_knns_table', 1),
(7, '2022_06_27_003136_create_sarans_table', 1),
(8, '2022_06_30_081751_create_datasets_table', 1),
(9, '2022_08_26_034142_create_infos_table', 2);

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
-- Table structure for table `sarans`
--

CREATE TABLE `sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sarans`
--

INSERT INTO `sarans` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'fitur untuk klasfikasi per kelas dengan parameter gizi, berat, tinggi serta stunting.', '2022-08-18 04:51:39', '2022-08-18 04:51:39'),
(2, 'ditambahkan total jumlah atau statistik balita keseluruhan degan gizi baik, buruk, kurang, serta lebih', '2022-08-18 04:52:14', '2022-08-18 04:52:14'),
(3, 'perlu ditambahkannya saran untuk makanan tambahan penunjang tumbuh balita yang sesuai dengan hasil klasifikasi', '2022-08-18 04:53:42', '2022-08-18 04:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balitas`
--
ALTER TABLE `balitas`
  ADD PRIMARY KEY (`idb`);

--
-- Indexes for table `datasets`
--
ALTER TABLE `datasets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knns`
--
ALTER TABLE `knns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knns_id_balita_foreign` (`id_balita`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `datasets`
--
ALTER TABLE `datasets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `knns`
--
ALTER TABLE `knns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sarans`
--
ALTER TABLE `sarans`
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
-- Constraints for table `knns`
--
ALTER TABLE `knns`
  ADD CONSTRAINT `knns_id_balita_foreign` FOREIGN KEY (`id_balita`) REFERENCES `balitas` (`idb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
