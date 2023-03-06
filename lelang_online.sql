-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 03:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi_barang` varchar(255) NOT NULL,
  `status_barang` enum('belum','dilelang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar`, `tgl_daftar`, `harga_awal`, `deskripsi_barang`, `status_barang`) VALUES
(1, 'Toyota CH-R', '9qaU12JYJrWdBEkMfWtqEHG4jcjCtd4YArtoZt3H.jpg', '2023-03-03', 449000000, 'Toyota CH-R menawarkan desain modern futuristik dan sporty,  mobil SUV mewah ini menjadi salah satu koleksi mobil Toyota yang sektor interiornya mewah dan memberikan kenyamanan kepada penumpang maupun pengemudinya.', 'dilelang'),
(2, 'Toyota Corolla Cross', 'zhDPKlVTY1uCeAzPshgCpei1NG0LZqlyEl57bDPe.jpg', '2023-03-03', 485000000, 'Toyota Corolla Cross adalah salah satu mobil SUV Toyota yang baru muncul sejak 2020 lalu. Hadir dengan varian 1,8 AT dan 1,8 Hybrid AT di Indonesia.', 'dilelang'),
(3, 'Toyota GR Supra 2019', 'ZBXUAp4clPWXPm0O2sACsAHvEDbSN1XsWmdfchYn.png', '2023-03-03', 890000000, 'Toyota GR Supra memiliki dimensi panjang 4.380 mm, lebar 1.865 mm, dan tinggi 1.295 mm. Sedangkan jarak wheelbase 2.470 mm, lebih pendek 100 mm dari model Toyota 86.', 'dilelang'),
(4, 'Toyota Fortuner', 'H2k1ZV7rLNYK8wxoIq2GPj8qYncMoevD1Pcnlb44.jpg', '2023-03-03', 350000000, 'Toyota Fortuner sering dijadikan pilihan dalam masyarakat karena Fortuner dinilai sebagai kendaraan yang prestise dalam masyarakat', 'dilelang'),
(5, 'Toyota Rush', 'Mnl3xmwvcrKxo7Hj8Ys98sweotqpkFxUwgm48s8C.jpg', '2023-03-03', 230000000, 'Jenis mobil SUV ini selalu diperbaharui dari waktu ke waktu, Rush terkenal dengan desainnya yang kokoh, elegan dan gagah.', 'dilelang'),
(6, 'Toyota Alphard', 'cWfkRiduDaMOMEFO4QwxFQ35bid0GHpsP7NTTA63.jpg', '2023-03-03', 780000000, 'Mobil MPV yang tergolong mobil mewah ini sudah menjadi mobil pilihan bagi para keluarga metropolitan. MPV premium ini sudah ada sejak 2008 lalu. Mobil ini berteknologi dual VVT-i dan memiliki kapasitas 2494 cc sehingga dipastikan cukup bertenaga.', 'belum');

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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` bigint(20) UNSIGNED NOT NULL,
  `id_lelang` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `penawaran_harga` int(11) NOT NULL,
  `status_pemenang` enum('proses','menang','kalah') NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_lelang`, `id_pengguna`, `penawaran_harga`, `status_pemenang`, `id_barang`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 450000000, 'kalah', 1, '2023-03-03 03:08:31', '2023-03-03 03:08:31'),
(2, 1, 31, 500000000, 'menang', 1, '2023-03-03 03:09:42', '2023-03-03 03:09:42'),
(3, 2, 31, 250000000, 'kalah', 5, '2023-03-03 03:14:10', '2023-03-03 03:14:10'),
(4, 2, 31, 255000000, 'menang', 5, '2023-03-03 03:14:17', '2023-03-03 03:14:17'),
(5, 3, 32, 500000000, 'kalah', 2, '2023-03-03 03:23:27', '2023-03-03 03:23:27'),
(6, 3, 32, 550000000, 'menang', 2, '2023-03-03 03:23:34', '2023-03-03 03:23:34'),
(7, 3, 30, 535000000, 'kalah', 2, '2023-03-03 03:24:23', '2023-03-03 03:24:23'),
(21, 4, 30, 899000000, 'kalah', 3, '2023-03-05 08:05:13', '2023-03-05 08:05:13'),
(22, 4, 31, 900000000, 'menang', 3, '2023-03-05 08:06:15', '2023-03-05 08:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tgl_lelang` datetime NOT NULL,
  `tgl_akhir` datetime DEFAULT NULL,
  `harga_akhir` int(11) DEFAULT NULL,
  `id_pengguna` bigint(20) UNSIGNED DEFAULT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL,
  `read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `tgl_akhir`, `harga_akhir`, `id_pengguna`, `id_petugas`, `status`, `read`) VALUES
(1, 1, '2023-03-03 10:06:03', '2023-03-03 11:06:00', 500000000, 31, 29, 'ditutup', 1),
(2, 5, '2023-03-03 10:06:14', '2023-03-03 11:06:00', 255000000, 31, 29, 'ditutup', 1),
(3, 2, '2023-03-03 10:06:26', '2023-03-03 11:06:00', 550000000, 32, 29, 'ditutup', 0),
(4, 3, '2023-03-04 12:10:08', '2023-03-05 15:50:00', 900000000, 31, 28, 'ditutup', 1),
(5, 6, '2023-03-04 19:48:56', '2023-03-06 14:33:29', NULL, NULL, 29, 'dibuka', 0),
(7, 4, '2023-03-05 15:03:53', '2023-03-06 16:07:00', NULL, NULL, 28, 'dibuka', 0);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_14_094008_create_barangs_table', 1),
(6, '2021_10_15_153211_create_lelang_table', 1),
(7, '2021_10_15_153425_create_history_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','pengguna') NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `no_hp`, `username`, `password`, `role`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'Jayeng Siregar M.Ak', '089225500632', '8CL3idAR', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(5, 'Hardi Pradipta', '089237459686', 'Y2gsQqTL', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(6, 'Tira Nurdiyanti', '0812945581217', '75onlVXG', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(7, 'Zelda Puti Yuliarti S.I.Kom', '08928328626', '6C6rT1Zj', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(8, 'Emin Nugroho', '0812883039777', 'JLjYqHVG', '$2y$10$iU87Bq7i.3TXtisa.u/aUuB.jEXUEwoUNDeUIsxFKYguryO.HYJdG', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:53:17'),
(9, 'Dartono Kemal Dabukke', '0810718080764', 'Z3pKZGOF', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(10, 'Hesti Kezia Hasanah M.Kom.', '0812339957339', 'ArG0LXjW', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(11, 'Elvina Kania Nasyidah S.Kom', '0810863316659', 'WBUACyqw', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pengguna', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(12, 'Eka Puspasari', '0810337275021', 'C77lpDtc', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(13, 'Sabrina Suartini M.Kom.', '0811732996568', 'NFujmzSd', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pengguna', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(14, 'Titi Farida S.E.', '0811880573342', 'Vce4CZ7E', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pengguna', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(15, 'Syahrini Kamaria Namaga S.Kom', '0812454660495', 'ktiAoohK', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(16, 'Gatra Pranowo', '0811246812086', '56tGlBU8', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(17, 'Elvina Namaga', '0812474454031', 'QTFwm0GH', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(18, 'Eluh Among Mansur S.Kom', '0811201706506', 'vxpKW3qp', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(19, 'Rina Rahimah S.Farm', '0812279459713', 'xppsORsF', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pengguna', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(20, 'Saiful Maulana', '0810591285380', 'fRsm2ymA', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(21, 'Jaga Setiawan', '089729993465', 'TeDP3wC0', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(22, 'Darman Adika Dabukke', '0812566743513', 'Vcl8IHHq', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(23, 'Ulya Icha Widiastuti S.Pd', '0812699499865', 'lwx0Z1gS', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pengguna', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(24, 'Ihsan Zulkarnain', '0810105993497', 'bXVe0myl', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(25, 'Maida Kusmawati', '0812408183812', 'hevjqYf9', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'password', '2023-03-03 02:45:41', '2023-03-03 02:45:41'),
(26, 'Yahya Salamudin', '081233247969', 'admin', '$2y$10$oEphqsnMAe1EWAQbSZRqEugTm663DondOaGLkGnDR8wCgXL5kBSWe', 'admin', 'yahya', NULL, '2023-03-06 00:26:55'),
(27, 'Dwi Khusnul', '081345678901', 'dwikhusnul', '$2y$10$kIqRQsFxL1G1dEuZflDIn.EJazHHdDVz5ZzojmZRgFg2LJ2JyBYHe', 'admin', 'dwikhusnul', NULL, NULL),
(28, 'Petugas', '081123456789', 'petugas', '$2y$10$Gp.cSSdkc0/RqIg0UR4nIOAA/pCqzP/dXLJ9HQrpl4xzwj07srizO', 'petugas', 'petugas', NULL, NULL),
(29, 'Yahya Salamudin', '081345678901', 'yahya', '$2y$10$IMwqGOQBci62qwaQniBStO2WlUCGdk6/D8UkQ0z4DCGROx9c5Vx.K', 'petugas', 'yahya', NULL, NULL),
(30, 'Choirul Huda', '081345678901', 'choirul', '$2y$10$Z4QnV/49x200YwVSthYEqurBNOziL8QDwJvedQWpl8t/McFlkpofa', 'pengguna', 'choirul', NULL, NULL),
(31, 'Titis Ariyati', '081345678901', 'titis', '$2y$10$iYdB1SHnq9s3QhnuI.daZO694CBdvaGABEaXRlOrs.PJRN0l1cI.O', 'pengguna', 'titis', NULL, NULL),
(32, 'Sabrina', '081345678901', 'sabrina', '$2y$10$523PVD86VFVtTe9u2GId9OydkWs6tmfv6oIIFvevNitU6iGuixV02', 'pengguna', 'sabrina', NULL, '2023-03-03 03:22:35'),
(33, 'Yahya Salamudin', '081233247969', 'yahyasalamudin', '$2y$10$4OWnzldAJNRYOCj3RiYeiOH9SP5PFeVhC1790e9KnaPU41WxGaRVi', 'pengguna', 'yahya', '2023-03-05 07:31:40', '2023-03-05 07:31:40'),
(34, 'Admin 2', '081233247969', 'admin2', '$2y$10$XKJSqDG61orJmB2aSXpeoOrU0oioaCWf7iDUxdqhMDo479upAYzfi', 'admin', 'yahya', '2023-03-05 07:33:05', '2023-03-05 07:33:05'),
(35, 'Dwi Khusnul', '081212121212', 'dwii', '$2y$10$sOkpUb9vicq7xzbCkdMCW.KAEvSnq92QSE/ot46LnNwP04D7/jkBe', 'pengguna', 'yahya', '2023-03-05 07:38:44', '2023-03-05 07:38:44'),
(36, 'Fahri', '081233247969', 'fahrii', '$2y$10$MvvfaJBdwoo1Z2DxBi/dKuoC.bqOjoyM/X0G7zBiKH3NBLyt4mP4G', 'pengguna', 'yahya', '2023-03-05 07:57:28', '2023-03-05 07:57:28'),
(37, 'Ubab', '081233247969', 'ubab', '$2y$10$FoUdQntsyAHbpWcM5yrpbOn2Jm/ZjzCScjKYJPzHYSi9wYQygwn8y', 'admin', 'yahya', '2023-03-05 07:58:26', '2023-03-05 07:58:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_id_lelang_foreign` (`id_lelang`),
  ADD KEY `history_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `history_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `lelang_id_barang_foreign` (`id_barang`),
  ADD KEY `lelang_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `lelang_id_petugas_foreign` (`id_petugas`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `history_id_lelang_foreign` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`),
  ADD CONSTRAINT `history_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`);

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `lelang_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lelang_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
