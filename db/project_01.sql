-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 02:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID` int(11) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID`, `id_dokter`, `nama`, `spesialis`) VALUES
(2, 'DKS453', 'Ahmad Yuda Setiawan', 'Jantung'),
(5, 'DKS476', 'Johan Aldi Saputro', 'Mata'),
(6, 'DKS332', 'Surya Adi Laksono', 'Kulit');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID` int(11) NOT NULL,
  `id_dokter` varchar(25) NOT NULL,
  `poliklinik` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `jam_praktek_awal` time NOT NULL DEFAULT current_timestamp(),
  `jam_praktek_akhir` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID`, `id_dokter`, `poliklinik`, `dokter`, `spesialis`, `hari`, `jam_praktek_awal`, `jam_praktek_akhir`) VALUES
(1, 'dks332', 'poli mata', 'surya adi laksono', 'Mata', 'Selasa', '08:20:00', '22:22:55'),
(4, 'DKS453', 'poli jantung', 'ahmad yuda', 'Jantung', 'Kamis', '13:15:00', '15:30:00'),
(5, 'DKS473', 'poli anak', 'putri antika raya', 'anak', 'Sabtu', '09:15:00', '11:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID` int(11) NOT NULL,
  `id_daftar` varchar(50) NOT NULL,
  `no_rm` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_periksa` date NOT NULL DEFAULT current_timestamp(),
  `poliklinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID`, `id_daftar`, `no_rm`, `nama`, `tgl_periksa`, `poliklinik`) VALUES
(3, 'DF34219', 'RM08', 'Bani Saputra', '2022-02-28', 'Poli Mata'),
(4, 'DF58260', 'RM03', 'Wulan Putri', '2022-02-23', 'Poli Mata'),
(5, 'DF97218', 'RM02', 'Johan Aldi', '2022-02-24', 'poli jantung'),
(6, 'DF07618', 'RM05', 'Agung', '2022-02-26', 'Poli Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `ID` int(11) NOT NULL,
  `id_poliklinik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`ID`, `id_poliklinik`, `nama`) VALUES
(5, 'PL01', 'Poli Gigi'),
(6, 'PL02', 'Poli Jantung'),
(7, 'PL03', 'Poli Anak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT current_timestamp(),
  `agama` varchar(25) NOT NULL,
  `usia` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `id_user`, `nama`, `tgl_lahir`, `agama`, `usia`, `alamat`, `email`, `level`, `password`) VALUES
(1, 'EUO985174302', 'bani saputra', '2022-02-02', 'Islam', 18, 'Surabaya', 'bani.s26shafa@gmail.com', 'staff', '123'),
(5, 'JGO479218056', 'Putri Aulia', '2000-10-12', 'Katholik', 21, 'Boyolali', 'putri@gmail.com', 'Pasien', '1234'),
(6, 'XRL103954726', 'Bambang Aji', '1999-11-01', 'Islam', 22, 'Klaten', 'bambang@gmail.com', 'Pasien', '1234'),
(7, 'WUR609831257', 'Surya Adi Laksono', '1999-01-12', 'Kristen', 23, 'Surakarta', 'surya@gmail.com', 'Pasien', '1234'),
(8, 'TLD625304871', 'Johan Aldi Saputro', '2000-12-22', 'Islam', 21, 'Boyolali', 'Johan@gmail.com', 'Pasien', '1234'),
(9, 'ZPQ680257493', 'Andika Muhammad', '2000-05-14', 'Islam', 21, 'Kartasura', 'andika@gmail.com', 'Pasien', '1234'),
(10, 'ABS726518043', 'Linda Ayu', '1999-01-11', 'Kristen', 22, 'Wonogiri', 'linda@gmail.com', 'Pasien', '1234'),
(12, 'GBQ174206938', 'Joko Susilo', '2001-02-18', 'Kristen', 21, 'Karanganyar', 'joko@gmail.com', 'Pasien', '123joko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_pendaftaran` (`no_rm`),
  ADD UNIQUE KEY `no_rm` (`no_rm`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
