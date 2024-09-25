-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 10:55 AM
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
-- Database: `hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(10) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `lampiran` varchar(10) NOT NULL,
  `hal` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `text_surat` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `penanda_tangan` varchar(255) NOT NULL,
  `create_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `modify_id` int(11) NOT NULL,
  `modify_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nomor_surat`, `lampiran`, `hal`, `kepada`, `lokasi`, `text_surat`, `tanggal_surat`, `penanda_tangan`, `create_id`, `create_time`, `modify_id`, `modify_time`) VALUES
(1, '1231241', 'jnwdiuvnwi', 'eriogwioeofgi', 'vnwoindv', 'oviwoindv', 'oviwifnvownemvci', '2022-10-07', 'asep', 0, 0, 0, 0),
(3, '123123', 'adsdasd', 'zxcaxcas', 'dasdasdasd', 'gdgsdgsd', 'asdasgaegsdfasfs', '2022-10-07', 'Asep', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
