-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 04:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifkasi_pln`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idpel` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tarif` varchar(20) NOT NULL,
  `lembar` varchar(10) NOT NULL,
  `tagihan` int(20) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `tanggal`, `idpel`, `nama`, `tarif`, `lembar`, `tagihan`, `telepon`) VALUES
(1, '2022-08-04', '112200760068', 'wanda', 'P1/10,600 VA', '2', 1231106, '085262693579'),
(2, '2022-08-04', '112200764673', 'mesti', 'P1/4,400 VA', '2', 866800, '081372151728'),
(3, '2022-08-04', '112200775738', 'yuma', 'P3/7,700 VA', '2', 1246998, '082255176944'),
(4, '2022-08-04', '112200776834', 'ilak', 'P3/7,700 VA', '2', 3087545, '081375072226'),
(5, '2022-08-04', '1234567890', 'rizqillah', 'P3/7,700 VA', '1', 100000, '082165517433'),
(6, '2022-08-04', '12345678900', 'indah', 'P3/7,700 VA', '1', 100000, '081375073460');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(5, 'admin', '$2y$10$PuvsPuJE0lqs9VBDzITG5.7bTTY2aBJce3Tt9od4NOj.ftiEunMIW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
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
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
