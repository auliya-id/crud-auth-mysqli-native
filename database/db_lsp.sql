-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 09:09 AM
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
-- Database: `db_lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Artikel'),
(2, 'Lipsus');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `alamat`, `foto`) VALUES
(20, 'Maiores quasi porro ', '100', 'Dignissimos enim ea ', '493678656_Kaldik Genap 2022-2023.png'),
(21, 'Dolor dolor numquam ', '1', 'Amet blanditiis omn', '90269154_imantaqwa3.png');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id`, `user_id`, `kategori_id`, `judul`, `isi`, `tanggal`) VALUES
(1, 8, 1, 'Judul Artikel 1', 'Isinya apa yaaaa', '2023-02-07'),
(5, 8, 1, 'sadadsa', 'asdsad', '2007-02-23'),
(12, 9, 2, 'Facilis minima quia ', 'Duis vel illo dolore', '2023-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, '', 'firman', 'firman.agus777@gmail.com', '$2y$10$w.NzTEJ8s2raz3irGzgUZ.RmBsme5NEU6JmlY2NpoUYMap/8jNVaO'),
(2, '', 'firman', 'nugget@foodmedia.us', '$2y$10$TsPr./XpQfRq74X/OVKyCuvS45yVjCuz0UIuqov9QeGP2d8wvZkzK'),
(3, '', 'firman-195410261', 'nugget@foodmedia.us', '$2y$10$DoErh00B/Ux2JvH3z.TnDO6qHr93CytJVK4Zv5x3wuU47XPo3D2r.'),
(4, '', 'firman', 'firman.agus777@gmail.com', '$2y$10$wiin1cTUS9sBMVTQ4NygTeWxcBIQOnHKvmijSRO.vfB4.hj.815m6'),
(5, '', 'firman-195410261', 'firman.agus777@gmail.com', '$2y$10$oxwy//4CTmkrHq8nb.ypce3Hv3gacIxMtSKujdzn1b1m4zYwWkMnm'),
(6, '', 'firman-195410261', 'firman.agus777@gmail.com', '$2y$10$sESp7RS8C690ZlF2hIlT3.ASvAu2K2Yhks9pSfTl.hmN.EeDU8VNq'),
(7, '', 'firman', 'nugget@foodmedia.us', '$2y$10$DyrDfup6y4/WY92SSXgPWekTXQZkOEB3CkLSjlAJOGMHXD1hxPGU.'),
(8, 'Pedomytixxx', 'pedomyt', 'mapun@mailinator.com', '$2y$10$/2XLL7xr8VwvmqKRImhF6uCdcx5sdE52Ip778oWJguKehaNVTkz9O'),
(9, 'NiguXXYY', 'niguxymajy', 'dedix@mailinator.com', '$2y$10$oXLcD6NmQ61P.RfrbqlAAOiVNuKNNLVXn51JE1q2moFgH9fSjHWMi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
