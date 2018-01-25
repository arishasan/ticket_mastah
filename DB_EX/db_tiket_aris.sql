-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 12:25 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tiket_aris`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(100) NOT NULL,
  `identity_card_no` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `identity_card_no`, `name`, `address`, `phone`, `gender`) VALUES
('CUST0001', '130500', 'ARIS', 'CILAKU', '08381712289123', 'Male'),
('CUST0002', '1238', 'UDI', 'KKOPL', '0838012312', 'Male'),
('CUST0003', '00990900', 'LUTHFI WINATA', 'CIPANAS', '08123123123', 'Male'),
('CUST0004', '778899778899', 'Kaka Ramlan', 'CILAKU', '08951238237231', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` varchar(100) NOT NULL,
  `reservation_code` varchar(100) DEFAULT NULL,
  `reservation_date` datetime DEFAULT NULL,
  `customerid` varchar(100) DEFAULT NULL,
  `depart_date` date DEFAULT NULL,
  `seat_code` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `ruteid` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `reservation_date`, `customerid`, `depart_date`, `seat_code`, `price`, `ruteid`, `userid`) VALUES
('REV201801250001', 'RESXB3E5G404', '2018-01-25 17:01:54', 'CUST0001', '2018-01-24', 'AI0002_1A', 700000, 'RUTE20180002', 'US0001'),
('REV201801250002', 'RESM02DTY404', '2018-01-25 17:01:04', 'CUST0001', '2018-01-28', 'AI0002_1B', 700000, 'RUTE20180002', 'US0001');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE IF NOT EXISTS `rute` (
  `id` varchar(100) NOT NULL,
  `rute_from` varchar(100) DEFAULT NULL,
  `rute_to` varchar(100) DEFAULT NULL,
  `depart` time DEFAULT NULL,
  `arrive` time DEFAULT NULL,
  `price` double DEFAULT NULL,
  `transportationid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `rute_from`, `rute_to`, `depart`, `arrive`, `price`, `transportationid`) VALUES
('RUTE20180001', 'AMBON', 'PAPUA', '10:00:00', '12:00:00', 900000, 'TR20180001'),
('RUTE20180002', 'JAKARTA', 'PADANG', '22:00:00', '00:00:00', 700000, 'TR20180002'),
('RUTE20180003', 'NUSA TENGGARA TIMUR', 'SUMATERA BARAT', '10:00:00', '16:00:00', 2000000, 'TR20180002'),
('RUTE20180004', 'JAKARTA, INDONESIA', 'SAPORO, JAPAN', '10:00:00', '22:00:00', 5000000, 'TR20180003'),
('RUTE20180005', 'JAKARTA', 'BUSAN, KOREA', '10:00:00', '23:00:00', 4500000, 'TR20180004'),
('RUTE20180006', 'Jakarta', 'Jogjakarta', '10:00:00', '00:30:00', 300000, 'TR20180004');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
  `id` varchar(100) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `seat_qty` int(11) DEFAULT NULL,
  `transportation_typeid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `code`, `description`, `seat_qty`, `transportation_typeid`) VALUES
('TR20180001', 'F728DPF33AE7', 'AIRPLANE OF THE YEAR - TITANIUM ULTIMATUM', 100, 'TTP0001'),
('TR20180002', '3KSC2MCVBZPA', 'AIRPLANE - JAYA MANDALA', 20, 'TTP0001'),
('TR20180003', 'OHM5EOX70HCR', 'AIRPLANE - VIP SRILANGKA', 8, 'TTP0003'),
('TR20180004', '7EZGS4826F23', 'TRAIN TO BUSAN', 40, 'TTP0002');

-- --------------------------------------------------------

--
-- Table structure for table `transportation_type`
--

CREATE TABLE IF NOT EXISTS `transportation_type` (
  `id` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation_type`
--

INSERT INTO `transportation_type` (`id`, `description`) VALUES
('TTP0001', 'AIRPLANE - REGULAR'),
('TTP0002', 'TRAIN - REGULAR'),
('TTP0003', 'AIRPLANE - VIP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `remember_token` varchar(400) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user`, `username`, `password`, `fullname`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'US0001', 'arishasan4', '$2y$10$QkV2e3D2XRqud90B0p.wrOUhXTuXJ1wP9HHiZmU0EHM/cCCxyYPlu', 'ARIS HASAN UBAIDILLAH', 'SUPER ADMIN', 'J4rxxDox6Gi4ms9Tn5WYHiR4goHgNnuNRClcHUSHyPjHmeyiCaUqN7hNwgdx', '2018-01-15', '2018-01-19'),
(5, 'US0002', 'operator', '$2y$10$Ch6BZyjJVeEyiiOggt.UyONQb5CGyYYSFD5qbIcwrM53VLkPY48gW', 'OPERATOR', 'Operator', 'lvYLztRze43SPLmXrYinbEC3mVrVqmBPypFs7Vr0RpCUOGkNqOsNJ6CRbBZ2', '2018-01-19', '2018-01-19'),
(7, 'US0003', 'admin', '$2y$10$DbRB5JlKOvJxYZ0MtmXDHOL2/YlAIFpjkiAuucjxA/lxozcQYqY8K', 'ADMIN', 'Admin', 'jhEPYYRZTvEJRCfaQ74ZRgmwMSYy8KtyxpAaw28ZFy9u9kynJpsorCF8teaI', '2018-01-19', '2018-01-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation_type`
--
ALTER TABLE `transportation_type`
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
