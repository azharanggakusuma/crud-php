-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2023 at 10:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_teman_crud`
--

CREATE TABLE `tb_teman_crud` (
  `id_teman` int NOT NULL,
  `nama_teman` varchar(50) NOT NULL,
  `alamat_teman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teman_crud`
--

INSERT INTO `tb_teman_crud` (`id_teman`, `nama_teman`, `alamat_teman`) VALUES
(1, 'Rika Qodriah', 'Karang Mangu'),
(2, 'Aldiyansyah Kurniawan', ' Sindangjawa'),
(3, 'Arya Nuryana', 'Blender'),
(4, 'Krisna Mulyana', 'Tuk Karang Suwung'),
(5, 'M.Ikhwan Adholf Hermansyah', 'Karang Sembung'),
(6, 'Nanda Putri Sugianto', 'Wangkelang'),
(7, 'Indra Ikhsani', 'Lemahabang'),
(8, 'Gita Antar Wulan', 'Gunung Jati'),
(9, 'Ali Ikbal', 'Karang Sembung'),
(10, 'Nafisa maysa Salma', 'Beber'),
(11, 'Contoh 1', 'Contoh 1'),
(12, 'Contoh 2', 'Contoh 2'),
(13, 'Contoh 3', 'Contoh 3'),
(14, 'Contoh 4', 'Contoh 4'),
(15, 'Contoh 5', 'Contoh 5'),
(16, 'Contoh 6', 'Contoh 6'),
(17, 'Contoh 7', 'Contoh 7'),
(18, 'Contoh 8', 'Contoh 8'),
(19, 'Contoh 9', 'Contoh 9'),
(20, 'Contoh 10', 'Contoh 10'),
(21, 'Contoh 11', 'Contoh 11'),
(22, 'Contoh 12', 'Contoh 12'),
(23, 'Contoh 13', 'Contoh 13'),
(24, 'Contoh 14', 'Contoh 14'),
(25, 'Contoh 15', 'Contoh 15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_teman_crud`
--
ALTER TABLE `tb_teman_crud`
  ADD PRIMARY KEY (`id_teman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_teman_crud`
--
ALTER TABLE `tb_teman_crud`
  MODIFY `id_teman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
