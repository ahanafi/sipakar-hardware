-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 03:21 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perangkat_keras`
--

CREATE TABLE `jenis_perangkat_keras` (
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama_perangkat_keras` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text COLLATE utf8mb4_bin NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `jenis_perangkat_keras`
--

INSERT INTO `jenis_perangkat_keras` (`id_perangkat_keras`, `nama_perangkat_keras`, `deskripsi`, `foto`) VALUES
('HW-0001', 'Motherboard', '', NULL),
('HW-0002', 'Processor', '', NULL),
('HW-0003', 'Memory', '', NULL),
('HW-0004', 'Kipas (FAN)', '', NULL),
('HW-0005', 'Monitor', '', NULL),
('HW-0006', 'Hardisk', '', NULL),
('HW-0007', 'CD / DVD', '', NULL),
('HW-0008', 'VGA', '', NULL),
('HW-0009', 'Keyboard', '', NULL),
('HW-0010', 'Mouse', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama_kerusakan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `solusi` mediumtext COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `nama_kerusakan`, `id_perangkat_keras`, `solusi`) VALUES
('KR-0001', 'Lampu mouse mati', 'HW-0010', '<ol><li>Periksa sambungan kabel mouse                                                                                                                                                                                  </li><li><br></li></ol>'),
('KR-0002', 'Pointer tidak bisa  digerakan', 'HW-0010', '<p>periksa setiingan mouse di control <span xss=removed>panel</span></p>'),
('KR-0003', 'Led menyala tetapi  pointer tidak bergerak', 'HW-0010', '<p>pastikan tidak terbalik antara <span xss=removed>port keyboard atau mouse</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `tipe` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_kerusakan` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_perangkat_keras`, `nama`, `merk`, `tipe`, `id_kerusakan`, `waktu`) VALUES
('KL-0001', 'HW-0010', 'Ahmad Hanafi', 'Logitech', 'M185', 'KR-0003', '2021-01-28 14:01:40'),
('KL-0002', 'HW-0010', 'Hendra', 'Logitech', 'M331', 'KR-0001', '2021-01-28 14:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_lengkap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level` enum('ADMINISTRATOR','OPERATOR') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(37, 'Ahmad Hanafi', 'ahanafi', '$2y$10$q9nJE3z2e28eF9zViGu7b.82M4oLoBnH0mm5O3SwGGg0L9Y50t336', 'ADMINISTRATOR'),
(38, 'Saroni', 'saroni', '$2y$10$SGBNIsNk8Qd0nYcMUri3VOd/GkGIxU/zqF4gDSdPIwRs/kDQoQLxe', 'ADMINISTRATOR'),
(39, 'M Iqbal Tawakal Prakoso', 'iqbals', '$2y$10$Ba2BHHc7ut5ZPSHgidxwHuHmB57RkX0irD8d8gJT/BelPNEWMkXpq', 'ADMINISTRATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_perangkat_keras`
--
ALTER TABLE `jenis_perangkat_keras`
  ADD PRIMARY KEY (`id_perangkat_keras`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
