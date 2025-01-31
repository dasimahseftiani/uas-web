-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 01:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `nim_mahasiswa` VARCHAR(10) NOT NULL,
  `nama_mata_kuliah` VARCHAR(100) NOT NULL,
  `semester` INT NOT NULL,
  `tahun_ajaran` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `nim_mahasiswa`, `nama_mata_kuliah`, `semester`, `tahun_ajaran`) VALUES
(1, 'D212111001', 'Pemrograman Web', 7, '2024/2025'),
(2, 'D212111002', 'Basis Data', 7, '2024/2025'),
(3, 'D212111003', 'Akuntansi Dasar', 7, '2024/2025'),
(4, 'D212111004', 'Algoritma', 7, '2024/2025'),
(5, 'D212111005', 'Visual Lanjutan', 7, '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'dasimah@gmail.com', '1234'),
(2, 'seftiani@gmail.com', '5678'),
(3, 'Tia@gmail.com', '91011'),
(4, 'harisz@gmail.com', '1213'),
(5, 'Tina@gmail.com', '1415');

-- --------------------------------------------------------

-- Indexes for table `krs`
-- (No additional indexes needed as the primary key is already set)

-- Indexes for table `users`
-- (No additional indexes needed as the primary key is already set)

-- AUTO_INCREMENT for table `krs`
ALTER TABLE `krs`
  MODIFY `id` INT AUTO_INCREMENT NOT NULL, AUTO_INCREMENT=1;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` INT AUTO_INCREMENT NOT NULL, AUTO_INCREMENT=1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;