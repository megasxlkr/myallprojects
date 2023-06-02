-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql207.byetcluster.com
-- Generation Time: May 18, 2022 at 10:00 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31583199_berberim`
--

-- --------------------------------------------------------

--
-- Table structure for table `footer_name`
--

CREATE TABLE `footer_name` (
  `id` int(11) NOT NULL,
  `berber_ismi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `footer_name`
--

INSERT INTO `footer_name` (`id`, `berber_ismi`) VALUES
(2, 'Berber');

-- --------------------------------------------------------

--
-- Table structure for table `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `hakkimizda_yazi` longtext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `hakkimizda_yazi`) VALUES
(1, 'Bu site Kuaför Randevu Sistemi oluşturmak ve satmak amacı ile inşa edilmiştir');

-- --------------------------------------------------------

--
-- Table structure for table `kayitol`
--

CREATE TABLE `kayitol` (
  `kayit_id` int(11) NOT NULL,
  `adi` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` int(12) NOT NULL,
  `mail` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `k_adi` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(256) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kayitol`
--

INSERT INTO `kayitol` (`kayit_id`, `adi`, `soyadi`, `tel_no`, `mail`, `k_adi`, `sifre`) VALUES
(24, 'nuri', 'alev', 2343242, 'emre-aykal47@hotmail.com ', 'emre', '12345'),
(25, 'deniz', 'alev', 2343242, 'emre-aykal47@hotmail.com ', 'Emre', '123456'),
(27, 'Emre', 'Aykal', 2147483647, 'e', 'emre', '1234'),
(28, 'doğan', 'kel', 23456789, 'emre-aykal47@hotmail.com ', 'Emree', '123456'),
(29, 'ömer', 'turhan', 26262618, 'omerfaruk@gmail.com', 'omer', '123'),
(32, '', '', 0, '', 'dsdqwe', '12312'),
(33, '', '', 0, '', 'turhan', '123'),
(34, '', '', 0, '', 'eray', '1907'),
(35, '', '', 0, '', 'eseftali', '9094559');

-- --------------------------------------------------------

--
-- Table structure for table `kisi`
--

CREATE TABLE `kisi` (
  `id` int(11) NOT NULL,
  `ad` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `saat` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` int(11) NOT NULL,
  `islem` varchar(256) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kisi`
--

INSERT INTO `kisi` (`id`, `ad`, `saat`, `tel_no`, `islem`) VALUES
(48, 'ömerfaruk', '20:00', 152521, 'bakım'),
(50, 'eray', '15.00', 2147483647, 'Saç sakal'),
(52, 'Engin', '16:00', 2147483647, 'Saç');

-- --------------------------------------------------------

--
-- Table structure for table `resim`
--

CREATE TABLE `resim` (
  `resim_id` int(11) NOT NULL,
  `resim_ad` varchar(254) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer_name`
--
ALTER TABLE `footer_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayitol`
--
ALTER TABLE `kayitol`
  ADD PRIMARY KEY (`kayit_id`);

--
-- Indexes for table `kisi`
--
ALTER TABLE `kisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`resim_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer_name`
--
ALTER TABLE `footer_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kayitol`
--
ALTER TABLE `kayitol`
  MODIFY `kayit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kisi`
--
ALTER TABLE `kisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `resim`
--
ALTER TABLE `resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
