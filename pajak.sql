-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 08:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

-- --------------------------------------------------------

--
-- Table structure for table `historybayar`
--

CREATE TABLE `historybayar` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `nominal_pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historybayar`
--

INSERT INTO `historybayar` (`id`, `pemilik`, `kendaraan`, `nopol`, `nominal_pajak`) VALUES
(1, 'Rep', 'Avanza', 'BL 1233 BR', 1500000),
(2, 'Rep', 'Avanza', 'BL 1233 BR', 1500000),
(3, 'Pegawai 1', 'Isuzu D-Max', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `tenggat` date NOT NULL,
  `status_pajak` varchar(100) NOT NULL DEFAULT 'Aman',
  `status_bayar` varchar(100) NOT NULL DEFAULT 'Sudah',
  `bukti_pembayaran` varchar(1000) DEFAULT NULL,
  `nominal_pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `pemilik`, `jenis`, `nopol`, `tenggat`, `status_pajak`, `status_bayar`, `bukti_pembayaran`, `nominal_pajak`) VALUES
(1, 'Rep', 'Avanza', 'BL 1233 BR', '2024-06-03', 'Menunggu verifikasi', 'Menunggu verifikasi', 'mess.jpg', 1500000),
(2, 'Rep', 'Triton', 'BL 1234 BB\r\n', '2026-02-14', 'Aman', 'Terverifikasi', NULL, 0),
(3, 'Pegawai 1', 'Isuzu D-Max', '', '2020-06-12', 'Menunggu verifikasi', 'Menunggu verifikasi', 'dontbestupid.jpg', 0),
(5, 'Pegawai 1', 'Daihatsu Terios', 'BL 1234 AB', '2020-06-30', 'Aman', 'Sudah', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `marked` varchar(100) NOT NULL DEFAULT 'Belum',
  `isi` varchar(1000) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `pemilik`, `marked`, `isi`, `id_kendaraan`, `waktu`) VALUES
(1, 'Pegawai 1', 'Belum', 'Segera lakukan pembayaran pajak untuk kendaraan Innova BL 123 REP', 0, '2020-06-10 23:00:00'),
(2, 'Pegawai 1', 'Belum', 'Segera lakukan pembayaran untuk Honda Beat BL 4506 ABC', 0, '2020-06-12 00:47:06'),
(3, 'Rep', 'Sudah', 'Segera lakukan pembayaran untuk kendaraan Avanza anda dengan nomor polisiBL 1233 BC', 1, '2020-06-11 00:47:21'),
(4, 'Rep', 'Sudah', 'Segera lakukan pembayaran untuk kendaraan Triton anda dengan nomor polisi BL 1234 BB\r\n', 2, '2020-06-11 10:47:30'),
(11, 'Rep', 'Sudah', 'Pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC telah diverifikasi!', 1, '2020-06-12 13:47:45'),
(12, 'Rep', 'Sudah', 'Pembayaran untuk kendaraan Triton dengan nomor polisi BL 1234 BB\r\n telah diverifikasi!', 2, '2020-06-12 20:00:15'),
(13, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:46:16'),
(14, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:46:42'),
(15, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:53:18'),
(16, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:57:38'),
(17, 'Rep', 'Sudah', 'Pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC telah diverifikasi!', 1, '2020-06-12 21:00:31'),
(18, 'Pegawai 1', 'Belum', 'Segera lakukan pembayaran untuk kendaraan Isuzu D-Max anda dengan nomor polisi ', 3, '2020-06-13 07:01:05'),
(19, 'Rep', 'Sudah', 'Segera lakukan pembayaran untuk kendaraan Avanza anda dengan nomor polisi BL 1233 BC', 1, '2020-06-13 07:01:33'),
(20, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-13 07:01:51'),
(21, 'Rep', 'Sudah', 'Pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC telah diverifikasi!', 1, '2020-06-13 07:03:06'),
(22, 'Rep', 'Sudah', 'Segera lakukan pembayaran untuk kendaraan Avanza anda dengan nomor polisi BL 1233 BR', 1, '2020-06-13 07:46:18'),
(23, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BR', 1, '2020-06-13 07:54:44'),
(24, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BR', 1, '2020-06-13 07:55:00'),
(25, 'admin', 'Sudah', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BR', 1, '2020-06-13 08:10:42'),
(26, 'admin', 'Sudah', 'Pegawai 1 telah mengupload bukti pembayaran untuk kendaraan Isuzu D-Max dengan nomor polisi ', 3, '2020-06-13 08:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jumlah_kendaraan` int(11) NOT NULL DEFAULT 0,
  `foto` varchar(1000) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `nip`, `jumlah_kendaraan`, `foto`, `unit`, `jabatan`, `alamat`, `tanggal_lahir`, `agama`, `pendidikan`, `telp`) VALUES
(1, 'Admin', 'admin', '$2y$12$FC4kN9uoJvt33jo6OWFWyeIzZwbZLPNqEsnKSRvt6kl252jvh/kqO', '112233', 0, '', 'IT', 'Admin', '', '0000-00-00', 'Islam', 'S3 IT', ''),
(2, 'Rep', 'rep123', '$2y$12$tvIBeGm1hRi/CEzGiOvrve4OIDwKnu/1mv841SuVZv6OvjyravbYa', '12345', 2, '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Pegawai 1', 'pegawai1', '$2y$10$iElLsAuXH5CEvedhkOB6Y.pJHX0ev70L7nF2D4HAbVbOyIxhVdDIi', '112233', 2, '', '', '', '', '0000-00-00', '', '', ''),
(8, 'Afdil', 'afdil', '$2y$10$O0uN.a7yqPnFFen1pqGMKuZIdxT5QbNHgMld9uOnPt33h3eiGDF7O', '12345', 0, 'foto_user.PNG', 'Orsenbud', 'Kadiv', '', '2020-06-23', 'Islam', 'D3 Telko', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historybayar`
--
ALTER TABLE `historybayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historybayar`
--
ALTER TABLE `historybayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
