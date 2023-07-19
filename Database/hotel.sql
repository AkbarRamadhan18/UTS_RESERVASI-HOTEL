-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 05:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_admin`) VALUES
('operator', '123', 'Azzammil Akbar Ramadhan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id_detail_reservasi` int(11) NOT NULL,
  `no_reservasi` varchar(12) NOT NULL,
  `no_kamar` varchar(5) NOT NULL,
  `harga_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_reservasi`
--

INSERT INTO `detail_reservasi` (`id_detail_reservasi`, `no_reservasi`, `no_kamar`, `harga_kamar`) VALUES
(15, '202307190001', 'A02', 600000),
(16, '202307190002', 'A04', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` varchar(5) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_kamar` varchar(8) NOT NULL,
  `dari` datetime NOT NULL,
  `sampai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `kelas`, `harga`, `status_kamar`, `dari`, `sampai`) VALUES
('A01', 'Superior Room', 500000, 'Kosong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('A02', 'Deluxe Room', 600000, 'Checkin', '2023-07-19 14:00:00', '2023-07-20 12:00:00'),
('A03', 'Suite Room', 400000, 'Kosong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('A04', 'Standard Room', 200000, 'Checkin', '2023-07-19 14:00:00', '2023-07-21 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `no_reservasi` varchar(12) NOT NULL,
  `tgl_reservasi` datetime NOT NULL,
  `tgl_checkin` datetime NOT NULL,
  `tgl_checkout` datetime NOT NULL,
  `id_tamu` varchar(8) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`no_reservasi`, `tgl_reservasi`, `tgl_checkin`, `tgl_checkout`, `id_tamu`, `jumlah_hari`, `jumlah_kamar`, `jumlah_bayar`, `status`) VALUES
('202307190001', '2023-07-19 10:25:21', '2023-07-19 14:00:00', '2023-07-20 12:00:00', 'T0000002', 1, 1, 600000, 'Checkin'),
('202307190002', '2023-07-19 10:25:49', '2023-07-19 14:00:00', '2023-07-21 12:00:00', 'T0000003', 2, 1, 400000, 'Checkin');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` varchar(8) NOT NULL,
  `no_identitas` varchar(16) NOT NULL,
  `nama_tamu` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(9) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomer_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `no_identitas`, `nama_tamu`, `tanggal_lahir`, `jk`, `alamat`, `nomer_hp`) VALUES
('T0000002', '3202280103950006', 'Azzammil Akbar Ramadhan', '2003-11-11', 'Laki-laki', 'Lintau, Sumatra barat', '081218365391'),
('T0000003', '250723080132', 'Dhea Safira', '2004-03-27', 'Perempuan', 'Mandailing Natal,Sumut', '082277904226');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_reservasi`
--

CREATE TABLE `tmp_reservasi` (
  `id_tmp` int(11) NOT NULL,
  `no_kamar` varchar(6) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `lama` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_reservasi`
--

INSERT INTO `tmp_reservasi` (`id_tmp`, `no_kamar`, `kelas`, `harga`, `lama`, `jumlah_harga`) VALUES
(11, 'A04', 'Standard Room', 200000, 2, 400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id_detail_reservasi`),
  ADD KEY `no_reservasi` (`no_reservasi`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`no_reservasi`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `tmp_reservasi`
--
ALTER TABLE `tmp_reservasi`
  ADD PRIMARY KEY (`id_tmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  MODIFY `id_detail_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tmp_reservasi`
--
ALTER TABLE `tmp_reservasi`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
