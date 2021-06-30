-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 30, 2021 at 11:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uks`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `id_dokter` (`nomor` INT) RETURNS CHAR(5) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(6);
DECLARE urut INT;
 
SET urut = IF(nomor IS NULL, 1, nomor + 1);
SET kodebaru = CONCAT("DK", LPAD(urut, 3, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `id_obat` (`nomor` INT) RETURNS CHAR(6) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(7);
DECLARE urut INT;
 
SET urut = IF(nomor IS NULL, 1, nomor + 1);
SET kodebaru = CONCAT("OB", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `diberi`
--

CREATE TABLE `diberi` (
  `id_diberi` float NOT NULL,
  `tgl_periksa` date NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_obat` varchar(6) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diberi`
--

INSERT INTO `diberi` (`id_diberi`, `tgl_periksa`, `nis`, `id_obat`, `jumlah`) VALUES
(13, '2021-04-22', '1841160052', 'OB0003', 2),
(14, '2021-05-24', '1841160001', 'OB0001', 2),
(15, '2021-05-24', '1841160001', 'OB0003', 2),
(16, '2021-06-30', '1841160055', 'OB0003', 3),
(17, '2021-06-30', '1841160055', 'OB0001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `jenis_kelamin`, `username`, `password`, `status`) VALUES
('DK001', 'Administrator', '', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('DK003', 'Vidyaa', 'Kepanjen', '2', 'vidya', '4dc13c8aa6371cbcb715d66f351ca293', 0),
('DK004', 'noorFahmi', 'malang', '1', 'fahmi', '85430d280985324e95d6e93729826cef', 0);

--
-- Triggers `dokter`
--
DELIMITER $$
CREATE TRIGGER `idd` BEFORE INSERT ON `dokter` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_dokter,3,6) AS Nomor
FROM dokter ORDER BY id_dokter DESC LIMIT 1);
 
SET s = (SELECT id_dokter(i));

IF(NEW.id_dokter IS NULL OR NEW.id_dokter = '')
 THEN SET NEW.id_dokter =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `memeriksa`
--

CREATE TABLE `memeriksa` (
  `id_periksa` float NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `tindak_lanjut` text NOT NULL,
  `id_dokter` varchar(5) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `istirahat` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memeriksa`
--

INSERT INTO `memeriksa` (`id_periksa`, `tgl_periksa`, `keluhan`, `diagnosa`, `tindak_lanjut`, `id_dokter`, `nis`, `istirahat`) VALUES
(24, '2021-04-22', 'pusing banyak tugas:(', 'stress', 'jangan nugas:)', 'DK002', '1841160052', 5),
(25, '2021-05-24', 'sakit perut', 'magg', 'istirahat', 'DK004', '1841160001', 1),
(26, '2021-06-30', 'pusing, flu', 'flu', 'istirahat', 'DK003', '1841160055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`) VALUES
('OB0001', 'Decolgen', 16),
('OB0002', 'OBH', 20),
('OB0003', 'Paracetamol', 5);

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `ido` BEFORE INSERT ON `obat` FOR EACH ROW BEGIN
DECLARE s VARCHAR(6);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_obat,3,6) AS Nomor
FROM obat ORDER BY id_obat DESC LIMIT 1);
 
SET s = (SELECT id_obat(i));

IF(NEW.id_obat IS NULL OR NEW.id_obat = '')
 THEN SET NEW.id_obat =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `kelas`, `alamat`, `jenis_kelamin`) VALUES
('1841160001', 'Febry', '3H', 'malang', '1'),
('1841160052', 'Vidyaaaaa', '3E', 'nde sini', '2'),
('1841160055', 'Fahrezi', '1E', 'malang', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diberi`
--
ALTER TABLE `diberi`
  ADD PRIMARY KEY (`id_diberi`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `memeriksa`
--
ALTER TABLE `memeriksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diberi`
--
ALTER TABLE `diberi`
  MODIFY `id_diberi` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `memeriksa`
--
ALTER TABLE `memeriksa`
  MODIFY `id_periksa` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
