-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 05:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `cek_in` varchar(50) NOT NULL,
  `cek_out` varchar(50) NOT NULL,
  `jumlah_kamar` enum('1 KAMAR','2 KAMAR','','') NOT NULL,
  `tipe_kamar` enum('DELUX','SINGLE ROOM','DOUBLE ROOM','KINGS ROOM','FAMILY ROOM') NOT NULL,
  `kode_booking` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `nama_pemesan`, `nomor_hp`, `email`, `nama_tamu`, `cek_in`, `cek_out`, `jumlah_kamar`, `tipe_kamar`, `kode_booking`) VALUES
(2, 5, 'gura', '0294052724', 'gura@gmail.com', 'gura', '15 February, 2023', '28 February, 2023', '1 KAMAR', 'DELUX', 504214);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fas`, `nama_fasilitas`, `deskripsi`) VALUES
(2, 'Travel Planing', 'Menyediakan Rekomendasi Perjalanan untuk anda yang belum memiliki rencana perjalanan.'),
(3, 'Servis Makanan', 'Menyajikan beragam jenis makanan, dari Western, Asian Food, Seafood, sampai makanan lokal yang autentik.'),
(4, 'Laundry', 'Terdapat Laundry untuk anda yang memiliki Pakaian Kotor.'),
(5, 'Hire Driver', 'Anda dapat menyewa Driver Pribadi yang siap sedia mengantarkan anda ke tempat yang ingin anda tuju.'),
(6, 'Bar Drink', 'Bar area untuk anda melepas lelah setelah bepergian.'),
(7, 'Kid\'s Play Ground', 'Ada Area untuk anak - anak bermain yang luas, yang bisa anda gunakan untuk bermain dengan anak anda di waktu luang.');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id_kamar` int(11) NOT NULL,
  `nomor_kamar` varchar(50) NOT NULL,
  `tipe_kamar` enum('Delux','Single Room','Kings Room','') NOT NULL,
  `tipe_ranjang` enum('double bed','single bed','king bed','') NOT NULL,
  `harga` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `status` enum('ISI','TIDAKISI','','') NOT NULL DEFAULT 'TIDAKISI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_kamar`, `nomor_kamar`, `tipe_kamar`, `tipe_ranjang`, `harga`, `fasilitas`, `gambar1`, `gambar2`, `status`) VALUES
(43, '76', 'Delux', 'king bed', 'Rp. 399.999', 'tv, free wifi, bathtub, shower, kitchen', 'room-1.jpg', 'room-details.jpg', 'TIDAKISI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomortlp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` enum('admin','resepsionis','user','') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nomortlp`, `email`, `pass`, `level`) VALUES
(1, 'user1', '090909090', 'user1@gmail.com', '123', 'user'),
(2, 'david', '', 'david@admin.com', '123', 'admin'),
(3, 'david', '', 'david@resepsionis.com', '123', 'resepsionis'),
(4, 'ari', '09898245', 'ari@gmail.com', '123', 'user'),
(5, 'gura', '0294052724', 'gura@gmail.com', '123', 'user'),
(6, 'adit', '081255678890', 'adit@gmail.com', '12345', 'user'),
(7, 'liham', '081255678890', 'liham@gmail.com', 'asdasd', 'user'),
(8, 'aril', '089655875975', 'aril@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `kode_booking_2` (`kode_booking`),
  ADD KEY `kode_booking` (`kode_booking`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fas`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
