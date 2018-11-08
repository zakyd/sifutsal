-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 01:22 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kodejabatan` varchar(5) NOT NULL,
  `namajabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kodejabatan`, `namajabatan`) VALUES
('J0001', 'pemilik'),
('J0002', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalfutsal`
--

CREATE TABLE `jadwalfutsal` (
  `kodebooking` varchar(25) NOT NULL,
  `atasnama` varchar(30) NOT NULL,
  `kodelapangan` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `durasi` float NOT NULL,
  `dp` int(11) NOT NULL,
  `totalbiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalfutsal`
--

INSERT INTO `jadwalfutsal` (`kodebooking`, `atasnama`, `kodelapangan`, `waktu`, `durasi`, `dp`, `totalbiaya`) VALUES
('201807030710091', 'rifki', 2, '2018-07-03 10:30:00', 3, 60000, 450000),
('201807042333491', 'ais', 1, '2018-07-04 13:30:00', 1.5, 50000, 300000),
('201807042337321', 'ansori', 1, '2018-07-02 07:30:00', 1, 50000, 200000),
('201807050557471', 'bangsa Indonesia', 2, '2018-07-02 07:00:00', 2, 50000, 300000),
('201807051022091', 'ronaldo', 1, '2018-07-07 07:00:00', 1, 100000, 200000),
('201807051023431', 'maradona', 3, '2018-07-06 07:30:00', 1.5, 70000, 225000),
('201807051024401', 'kaka', 1, '2018-07-05 08:00:00', 3, 150000, 600000),
('201807051025501', 'neymar', 2, '2018-07-05 07:00:00', 10, 500000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `kodelapangan` int(11) NOT NULL,
  `namalapangan` varchar(15) NOT NULL,
  `hargasewa` int(11) NOT NULL,
  `dpminimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`kodelapangan`, `namalapangan`, `hargasewa`, `dpminimal`) VALUES
(1, 'Lapangan 1', 200000, 20000),
(2, 'Lapangan 2', 150000, 15000),
(3, 'Lapangan 3', 150000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(30) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `email`, `saldo`) VALUES
('ilhamzaky11', '12345678', 'Ilham Zaky Dhiya Ulhaq', 'zyplack7@gmail.com', 0),
('sembarang', 'sembarang', 'M. Sembarang', 'sembarang@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kodejabatan` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `nama`, `kodejabatan`, `email`) VALUES
('ais', 'ais', 'Aisyiyah Tri Ratna', 'J0002', 'aisyiyah.trd@gmail.com'),
('ansori', 'ansori', 'Rahmat Ansori', 'J0002', 'rahmat_ansori@gmail.com'),
('rifki', 'rifki', 'M. Rifki Maulana', 'J0002', 'mrifkimaulana199@gmail.com'),
('toni', 'toni', 'Achmad Fatoni', 'J0002', 'fatoni@gmail.com'),
('zaky', 'zaky', 'Ilham Zaky', 'J0002', 'zyplack7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kodetransaksi` varchar(27) NOT NULL,
  `kodebooking` varchar(25) NOT NULL,
  `atasnama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kodejabatan`);

--
-- Indexes for table `jadwalfutsal`
--
ALTER TABLE `jadwalfutsal`
  ADD PRIMARY KEY (`kodebooking`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`kodelapangan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kodetransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
