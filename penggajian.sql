-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 11:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kode_sal` int(11) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rec_date` varchar(10) NOT NULL,
  `amt` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`kode_sal`, `nip`, `nama`, `rec_date`, `amt`) VALUES
(502802, 'Welldy Rosman', '1', '2650555', '20200309'),
(502803, '502802', 'Welldy Rosman C', '2650555', '20200309'),
(502804, '502802', 'Welldy Rosman C', '2650555', '20200309'),
(502805, '502802', 'Welldy Rosman C', '2020-03-', '2650555'),
(502806, '502802', 'Welldy Rosman C', '2020-03-09', '2650555'),
(502807, '502802', 'Welldy Rosman C', '2020-03-09', '2650555'),
(502808, '502802', 'Welldy Rosman C', '2020-03-09', '2650555');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jab` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `std_gaji` decimal(8,0) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jab`, `jabatan`, `std_gaji`, `ket`) VALUES
(1, 'Operator', '2500000', 'Kete'),
(3, 'Accounting', '4300000', 'Keterangan'),
(5, 'IT', '4300000', 'Keterangan'),
(6, 'General Affair', '4300000', 'Keterangan'),
(8, 'HRD', '4300000', 'Keterangan'),
(9, 'Hardware 2', '270000', 'Test'),
(11, 'General Affair', '4300000', 'Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(13) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kode_jab` int(3) NOT NULL,
  `masa_kerja` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `jk`, `tgl_lahir`, `telp`, `email`, `alamat`, `kode_jab`, `masa_kerja`) VALUES
('502802', 'Welldy Rosman C', 'L', '2020-03-06', '0812510357927', 'diezer33@gmail.com', 'Tangerang', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `kode_jab` int(5) NOT NULL,
  `masa_kerja` int(53) NOT NULL,
  `insentif` decimal(9,0) NOT NULL,
  `bonus` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`kode_jab`, `masa_kerja`, `insentif`, `bonus`) VALUES
(1, 1, '125555', '25000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kode_sal`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jab`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD KEY `kode_jab` (`kode_jab`),
  ADD KEY `masa_kerja` (`masa_kerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `kode_sal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502809;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
