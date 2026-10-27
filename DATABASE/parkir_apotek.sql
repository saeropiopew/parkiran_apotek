-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260130.4d5432a85e
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2026 at 07:07 AM
-- Server version: 8.4.3
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_parkir`
--

CREATE TABLE `tb_area_parkir` (
  `id_area` int NOT NULL,
  `nama_area` varchar(50) NOT NULL,
  `kapasitas` int NOT NULL,
  `terisi` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_area_parkir`
--

INSERT INTO `tb_area_parkir` (`id_area`, `nama_area`, `kapasitas`, `terisi`) VALUES
(1, 'Area Depan Apotek', 20, 0),
(2, 'Area Samping Apotek', 10, 0),
(4, 'Area Belakang Apotek', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `plat_nomor`, `jenis_kendaraan`, `warna`, `pemilik`, `id_user`) VALUES
(1, 'D 1234 BC', 'motor', NULL, NULL, NULL),
(2, 'D 4321 CB', 'motor', 'hitam', 'udin', 7),
(3, 'D 1121 AB', 'motor', '-', 'Umum', NULL),
(4, 'B 1234 BC', 'motor', 'hitam', 'BUdi', 8),
(5, 'B 1234 KL', 'mobil', 'Hitam', 'BAGAS', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_aktivitas`
--

CREATE TABLE `tb_log_aktivitas` (
  `id_log` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `waktu_aktivitas` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_log_aktivitas`
--

INSERT INTO `tb_log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu_aktivitas`) VALUES
(1, 7, 'Berhasil Login', '2026-10-27 00:12:06'),
(2, 7, 'Menambah Area Parkir: Area Belakang Apotek', '2026-10-27 00:12:56'),
(3, 7, 'Menghapus Area Parkir ID: 3', '2026-10-27 00:13:03'),
(4, 7, 'Menambah Tarif Baru: lainnya', '2026-10-27 00:13:31'),
(5, 7, 'Menghapus Tarif ID: 3', '2026-10-27 00:13:36'),
(6, 7, 'Logout dari sistem', '2026-10-27 00:14:05'),
(7, 8, 'Berhasil Login', '2026-10-27 00:14:14'),
(8, 8, 'Mencatat Parkir Masuk: D 1234 BC', '2026-10-27 00:14:53'),
(9, 8, 'Menyelesaikan Parkir Keluar: D 1234 BC', '2026-10-27 00:15:00'),
(10, 8, 'Logout dari sistem', '2026-10-27 00:15:20'),
(11, 9, 'Berhasil Login', '2026-10-27 00:15:29'),
(12, 9, 'Logout dari sistem', '2026-10-27 00:15:43'),
(13, 7, 'Berhasil Login', '2026-10-27 00:15:50'),
(14, 7, 'Menambah User Baru: TEST 1', '2026-10-27 00:22:56'),
(15, 7, 'Menambah User Baru: TEST 2', '2026-10-27 00:23:24'),
(16, 7, 'Menambah User Baru: TEST 3', '2026-10-27 00:23:58'),
(17, 7, 'Mendaftarkan Kendaraan Baru: d 4321 CB', '2026-10-27 00:24:43'),
(18, 7, 'Logout dari sistem', '2026-10-27 00:25:23'),
(19, 8, 'Berhasil Login', '2026-10-27 00:25:34'),
(20, 7, 'Berhasil Login', '2026-10-27 13:29:56'),
(21, 7, 'Logout dari sistem', '2026-10-27 13:30:42'),
(22, 8, 'Berhasil Login', '2026-10-27 13:30:48'),
(23, 8, 'Mencatat Parkir Masuk: D 1121 AB', '2026-10-27 13:31:20'),
(24, 8, 'Logout dari sistem', '2026-10-27 13:31:30'),
(25, 7, 'Berhasil Login', '2026-10-27 13:31:37'),
(26, 7, 'Logout dari sistem', '2026-10-27 13:32:09'),
(27, 8, 'Berhasil Login', '2026-10-27 13:32:14'),
(28, 8, 'Menyelesaikan Parkir Keluar: D 1121 AB', '2026-10-27 13:36:41'),
(29, 8, 'Mencatat Parkir Masuk: B 1234 BC', '2026-10-27 13:39:12'),
(30, 8, 'Menyelesaikan Parkir Keluar: B 1234 BC', '2026-10-27 13:39:18'),
(31, 8, 'Mencatat Parkir Masuk: B 1234 KL', '2026-10-27 13:41:04'),
(32, 8, 'Menyelesaikan Parkir Keluar: B 1234 KL', '2026-10-27 13:41:08'),
(33, 8, 'Logout dari sistem', '2026-10-27 13:41:24'),
(34, 7, 'Berhasil Login', '2026-10-27 13:42:46'),
(35, 7, 'Logout dari sistem', '2026-10-27 13:43:15'),
(36, 7, 'Berhasil Login', '2026-10-27 13:43:20'),
(37, 7, 'Logout dari sistem', '2026-10-27 13:44:00'),
(38, 7, 'Berhasil Login', '2026-10-27 13:44:08'),
(39, 7, 'Menambah Area Parkir: Area Belakang Apotek', '2026-10-27 13:45:29'),
(40, 7, 'Menambah Tarif Baru: motor', '2026-10-27 13:46:15'),
(41, 7, 'Menambah User Baru: opew', '2026-10-27 13:50:06'),
(42, 7, 'Logout dari sistem', '2026-10-27 13:51:11'),
(43, 9, 'Berhasil Login', '2026-10-27 13:51:21'),
(44, 9, 'Logout dari sistem', '2026-10-27 13:52:21'),
(45, 7, 'Berhasil Login', '2026-10-27 13:52:49'),
(46, 7, 'Menghapus Tarif ID: 4', '2026-10-27 13:52:59'),
(47, 7, 'Mengubah Tarif ID: 1', '2026-10-27 13:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int NOT NULL,
  `jenis_kendaraan` enum('motor','mobil','lainnya') NOT NULL,
  `tarif_per_jam` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `jenis_kendaraan`, `tarif_per_jam`) VALUES
(1, 'motor', 3000),
(2, 'mobil', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_parkir` int NOT NULL,
  `id_kendaraan` int DEFAULT NULL,
  `waktu_masuk` datetime DEFAULT CURRENT_TIMESTAMP,
  `waktu_keluar` datetime DEFAULT NULL,
  `id_tarif` int DEFAULT NULL,
  `durasi_jam` int DEFAULT NULL,
  `biaya_total` decimal(10,0) DEFAULT NULL,
  `status` enum('masuk','keluar','') NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_area` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_parkir`, `id_kendaraan`, `waktu_masuk`, `waktu_keluar`, `id_tarif`, `durasi_jam`, `biaya_total`, `status`, `id_user`, `id_area`) VALUES
(1, 1, '2026-10-27 00:14:53', '2026-10-27 00:15:00', 1, 1, 2000, 'keluar', 8, 2),
(2, 3, '2026-10-27 13:31:20', '2026-10-27 13:36:41', 1, 1, 2000, 'keluar', 8, 1),
(3, 4, '2026-10-27 13:39:12', '2026-10-27 13:39:18', 1, 1, 2000, 'keluar', 8, 2),
(4, 5, '2026-10-27 13:41:04', '2026-10-27 13:41:08', 2, 1, 5000, 'keluar', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','petugas','owner') NOT NULL,
  `status_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`, `status_aktif`) VALUES
(7, 'Administrator Utama', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 1),
(8, 'Petugas Jaga 1', 'petugas', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'petugas', 1),
(9, 'Pemilik Apotek', 'owner', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'owner', 1),
(10, 'TEST 1', 'TEST 1', '$2y$12$T/PO.6468A.Zgre4chmDHOojJEBbhVsfruL0EaeqD4lEESnRdfKMK', 'admin', 1),
(11, 'TEST 2', 'TEST 2', '$2y$12$WIHBpp1yAuFNg2NGHxUNmO3tjZUZ2DkLvKucROiEKjenc06S2FZlS', 'petugas', 1),
(12, 'TEST 3', 'TEST 3', '$2y$12$oRYmN6D0TIqjGih4.e0ihuYsmATMx4piZ00Ir6KGK/lbzqvfs.FEC', 'owner', 1),
(13, 'M Saeropi', 'opew', '$2y$12$CC1JdANqLl5wS471wYq5Cu4xPgUTVFGQJf.wRPN/zHPlgTMPaty9y', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_tarif` (`id_tarif`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  MODIFY `id_area` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_parkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD CONSTRAINT `tb_kendaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL;

--
-- Constraints for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD CONSTRAINT `tb_log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `tb_kendaraan` (`id_kendaraan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tb_tarif` (`id_tarif`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_area`) REFERENCES `tb_area_parkir` (`id_area`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
