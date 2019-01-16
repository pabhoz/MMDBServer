-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2019 at 06:08 PM
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
-- Database: `mmdb`
--
CREATE DATABASE IF NOT EXISTS `mmdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mmdb`;

-- --------------------------------------------------------

--
-- Table structure for table `Imagen`
--

CREATE TABLE `Imagen` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `size` float NOT NULL COMMENT 'En MB',
  `file` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Imagen`
--

INSERT INTO `Imagen` (`id`, `name`, `type`, `size`, `file`) VALUES
(1, 'Prueba', 'imagen/png', 0.23, 'asdasd'),
(2, 'Otra PRueba', 'imagen/jpeg', 0.24, 'ssdfdsf'),
(3, 'Puerto8080', 'image/png', 4.23, 'asdsadsad'),
(4, 'pille', 'image/png', 2.34, 'foo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Imagen`
--
ALTER TABLE `Imagen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Imagen`
--
ALTER TABLE `Imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
