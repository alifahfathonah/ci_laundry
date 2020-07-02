-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2020 at 10:06 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'alinda lo', 'Pacet', '081554318322'),
(2, 'muflihun', 'Mojokerto', '0832221334'),
(3, 'yoko', 'Kamal', '081333224');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailTransaksi`
--

CREATE TABLE `tbl_detailTransaksi` (
  `id_detailTransaksi` int(11) NOT NULL,
  `no_invoice` varchar(10) NOT NULL,
  `status_order` varchar(10) NOT NULL,
  `status_pembayaran` varchar(10) NOT NULL,
  `beratCucian` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailTransaksi`
--

INSERT INTO `tbl_detailTransaksi` (`id_detailTransaksi`, `no_invoice`, `status_order`, `status_pembayaran`, `beratCucian`, `total`) VALUES
(1, 'TRS-0005', 'Diambil', 'Sudah', 20, 80000),
(2, 'TRS-0006', 'Baru', 'Sudah', 3, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paketLaundry`
--

CREATE TABLE `tbl_paketLaundry` (
  `id_paket` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paketLaundry`
--

INSERT INTO `tbl_paketLaundry` (`id_paket`, `jenis`, `harga`) VALUES
(1, 'Cuci kering', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `id_customer` varchar(30) NOT NULL,
  `id_paket` varchar(30) NOT NULL,
  `tanggal_order` date NOT NULL,
  `tanggal_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `no_invoice`, `id_customer`, `id_paket`, `tanggal_order`, `tanggal_ambil`) VALUES
(1, 'TRS-0002', '1', '1', '2020-06-23', '2020-06-26'),
(2, 'TRS-0003', '1', '1', '2020-06-23', '2020-06-26'),
(3, 'TRS-0004', '2', '1', '2020-06-24', '2020-06-26'),
(4, 'TRS-0005', '2', '1', '2020-06-24', '2020-06-26'),
(5, 'TRS-0006', '3', '1', '2020-07-02', '2020-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(16) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `alamat`, `notelp`, `role`) VALUES
(1, 'firmansyah', 'firman', '$2y$10$iP3nb3nKwX.JjJ/uRRi4Zu5wNt/w.pbqNafojqEOW0CLH/bMi8/p6', 'pacet', '081554318322', 'admin'),
(2, 'muflihun', 'muflihun', '$2y$10$RTbKdSOHaHNTvrNoOdh3fuYNH1R2ztzAk/NpuLbsLRWJdpivmMI1u', 'pacet', '190411100019', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detailTransaksi`
--
ALTER TABLE `tbl_detailTransaksi`
  ADD PRIMARY KEY (`id_detailTransaksi`);

--
-- Indexes for table `tbl_paketLaundry`
--
ALTER TABLE `tbl_paketLaundry`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_detailTransaksi`
--
ALTER TABLE `tbl_detailTransaksi`
  MODIFY `id_detailTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_paketLaundry`
--
ALTER TABLE `tbl_paketLaundry`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
