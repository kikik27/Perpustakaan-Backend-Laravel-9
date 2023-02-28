-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 12:31 AM
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
-- Database: `perpus_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(20) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `nama_pengarang`) VALUES
(1, 'codeigniter1', 'github'),
(2, 'java script', 'github'),
(3, 'next js', 'kikik'),
(4, 'vue js', 'vue js'),
(6, 'Samuel', 'tiktok'),
(12, 'Buku Sehat', 'p');

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(9, 'XI RPL 2'),
(11, 'XI RPL 3'),
(12, 'XI RPL 4'),
(13, 'XI RPL 5'),
(100, 'XI RPL 1'),
(101, 'XI RPL 6'),
(102, 'XI RPL 7'),
(103, 'XI RPL 8'),
(104, 'XI TKJ 1'),
(105, 'XI TKJ 2'),
(106, 'XI TKJ 3');

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
(5, '2023_01_27_062922_create_kelas_table', 1),
(6, '2023_01_31_045754_create_siswa_table', 1),
(7, '2023_01_31_050823_create_buku_table', 1),
(8, '2023_02_03_181919_create_peminjaman_table', 2),
(9, '2023_02_04_082700_create_detail_peminjaman_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('123@123.123', '$2y$10$m9dWFcJXhSAW.zNgAxfmM.px4AdqB7Kqq00Okk/lmx6ugIsdlKGgS', '2023-02-06 21:43:22'),
('m_arisandhi_30rpl@stundent.smktelkom-mlg.sch.id', '$2y$10$g8YjKXKuWEPdbVwrWP8ySunuLQADpB9704Athq6GiY6efZOaC7r1m', '2023-02-07 23:30:52'),
('m_arisandhi_30rpl@stundents.smktelkom-mlg.sch.id', '$2y$10$G0mjsqaxpZ0DkY3NmjBEGOlqu3U7az.I2gjo6P0vcpKVZyqJl.56u', '2023-02-07 23:30:05'),
('mkikik27@gmail.com', '$2y$10$wXbVkXbCLC8JA0YNWnrTjuxgeDw8q8QUNSaBxs3PTsy4fkKUq.76y', '2023-02-07 22:59:08'),
('p@p.p', '$2y$10$Q3PdNP0TCQ1JFZCMiAUC.eewERtx1flG2ZxRfsXrOVMR2yn.Nqtli', '2023-02-07 23:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(20) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('belum_kembali','denda','lunas','tidak_didenda') NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_siswa`, `id_buku`, `tanggal_peminjaman`, `tanggal_kembali`, `status`, `denda`) VALUES
(34, 63, 1, '2023-02-23', '2023-02-28', 'lunas', 10000),
(35, 61, 1, '2023-02-23', '2023-02-28', 'tidak_didenda', 0),
(36, 61, 2, '2023-02-08', '2023-02-28', 'lunas', 85000),
(37, 61, 1, '2023-02-19', '2023-02-28', 'lunas', 45000),
(38, 63, 4, '2023-02-20', '2023-02-28', 'lunas', 5000),
(41, 61, 6, '2023-02-23', '2023-02-28', 'lunas', 10000),
(42, 77, 12, '2023-02-28', '2023-02-28', 'tidak_didenda', 0);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(20) NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `tanggal_lahir`, `gender`, `alamat`) VALUES
(61, 9, 'kikik', '2006-04-14', 'Laki-Laki', 'kikik'),
(62, 102, 'dev', '275760-03-12', 'Perempuan', 'Kediri'),
(63, 9, 'Akmal Zaida', '123123-12-23', 'Laki-Laki', 'Blimbing'),
(68, 9, 'hapis maulana', '0111-11-11', 'Laki-Laki', 'Tulungagung'),
(70, 102, 'dep2', '2023-02-24', 'Perempuan', 'Kediri'),
(77, 11, 'samuel', '123123-03-12', 'Laki-Laki', '123123123');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123', '123@123.123', NULL, '$2y$10$ZKHTojZjzfm.c5UQQP18D.up3gsfgk/MKC0Lz1m6BR7M/YIbKV.zm', 'AjtPe4dl1EGakaYOAoIcZoj0kOZXB194dWkIxqYPHvsn9NebzMVKYEOXPyxy', '2023-02-06 21:23:44', '2023-02-06 21:23:44'),
(2, 'kikik', 'mkikik27@gmail.com', NULL, '$2y$10$JGXDC5BkrRhotzAQfMJDOe96/QdvULCLDeFa92WaEiZaCLneWTbkO', 'lgUMJvIXxDcCb4qa7TrHvKxTEYtRvNgdhHdIJNFsecXsoaz7H8qd7kdoe3l3', '2023-02-06 21:43:50', '2023-02-06 22:54:20'),
(3, 'kkk', 'kkk@gmail.com', NULL, '$2y$10$RVLXrDZVFznjxFcIH8zI..EinsVs3viLbMAPDqOf/EOwGouC/uH.W', NULL, '2023-02-07 00:10:34', '2023-02-07 00:10:34'),
(4, 'ppp', 'k@gmail.com', NULL, '$2y$10$iy7.fAMKTNcDtQiv4a2/FOhgUsWa6qqFwGS40U7TyQRzwCzxVTRfq', NULL, '2023-02-07 21:15:43', '2023-02-07 21:15:43'),
(5, 'p', 'p@p.p', NULL, '$2y$10$mxpro5.booskLZkWTLmJI.OeQsufZL3gCma5OLVMjQ5GN/fYGS0e6', NULL, '2023-02-07 23:01:03', '2023-02-07 23:01:03'),
(6, 'kikik', 'm_arisandhi_30rpl@stundent.smktelkom-mlg.sch.id', NULL, '$2y$10$GjSPnc/eOYJjur/D7OuareJliMbdUXiyHKJGu6pgebHb0e3vBR376', NULL, '2023-02-07 23:29:57', '2023-02-07 23:29:57'),
(7, 'ppp123', 'k123@gmail.com', NULL, '$2y$10$wo0Wvu0/iyJQoy4338TeKeyoBbrJ1KmQSBGIXSeHHfpsJjOxRsPQK', NULL, '2023-02-08 22:16:30', '2023-02-08 22:16:30'),
(8, 'k1234', 'k1234@gmail.com', NULL, '$2y$10$tZKa.bduJnW2LMMB/Kc//uOkzmwqemR2qnGGTlJ7qvXH6gD6/1dbC', NULL, '2023-02-15 00:08:19', '2023-02-15 00:08:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_siswa` (`id_siswa`,`id_buku`),
  ADD KEY `peminjaman_ibfk_2` (`id_buku`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id` (`id_kelas`);

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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
