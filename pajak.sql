-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 09:10 PM
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
  `bukti_pembayaran` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `pemilik`, `jenis`, `nopol`, `tenggat`, `status_pajak`, `status_bayar`, `bukti_pembayaran`) VALUES
(1, 'Rep', 'Avanza', 'BL 1233 BC', '2031-07-03', 'Aman', 'Terverifikasi', 'buktibayar.PNG'),
(2, 'Rep', 'Triton', 'BL 1234 BB\r\n', '2026-02-14', 'Aman', 'Terverifikasi', NULL),
(3, 'Pegawai 1', 'Isuzu D-Max', '', '2020-06-12', 'Aman', 'Sudah', NULL);

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
(15, 'admin', 'Belum', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:53:18'),
(16, 'admin', 'Belum', 'Rep telah mengupload bukti pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC', 1, '2020-06-12 20:57:38'),
(17, 'Rep', 'Sudah', 'Pembayaran untuk kendaraan Avanza dengan nomor polisi BL 1233 BC telah diverifikasi!', 1, '2020-06-12 21:00:31');

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
  `jumlah_kendaraan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `nip`, `jumlah_kendaraan`) VALUES
(1, 'Admin', 'admin', '$2y$12$FC4kN9uoJvt33jo6OWFWyeIzZwbZLPNqEsnKSRvt6kl252jvh/kqO', '112233', 0),
(2, 'Rep', 'rep123', '$2y$12$tvIBeGm1hRi/CEzGiOvrve4OIDwKnu/1mv841SuVZv6OvjyravbYa', '12345', 2),
(3, 'Pegawai 1', 'pegawai1', '$2y$10$iElLsAuXH5CEvedhkOB6Y.pJHX0ev70L7nF2D4HAbVbOyIxhVdDIi', '112233', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
