-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 07:30 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `delibox`
--
CREATE DATABASE IF NOT EXISTS `delibox` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `delibox`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL,
  `id_transac` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `id_transac`, `id_menu`, `qty`, `price`) VALUES
(2, 4, 3, 0, 0),
(3, 5, 3, 0, 0),
(6, 8, 3, 3, 16500),
(14, 15, 3, 2, 11000),
(23, 18, 5, 2, 30000),
(27, 19, 3, 6, 33000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_service`, `name`, `price`) VALUES
(3, 1, 'jus mangga', 5500),
(4, 1, 'seblak pedas sekali', 6000),
(5, 3, 'Ayam Keremez', 15000),
(6, 4, 'a4 BW', 200),
(7, 4, 'a4 Color', 500),
(8, 5, 'paket hemat/kilo', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` double NOT NULL,
  `type` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `name`, `address`, `phone`, `type`, `id_user`) VALUES
(1, 'kamsol', 'jalan', 515312, '1', 7),
(3, 'Ponbam', 'jalan surya sumantri', 5725935154, '1', 7),
(4, 'maxiPrint', 'surya sumantri', 1354651, '3', 7),
(5, 'Clean and Go', 'surya sumantri', 6849864132, '2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transac`
--

DROP TABLE IF EXISTS `transac`;
CREATE TABLE IF NOT EXISTS `transac` (
  `id_transac` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `total` double DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transac`
--

INSERT INTO `transac` (`id_transac`, `id_user`, `id_driver`, `address`, `total`, `status`, `date`) VALUES
(1, 6, 6, 'jalan ciawitali', 1000000, 2, '2015-11-25 19:24:42'),
(2, 7, 6, 'jalan kejaksaan', 899999, 2, '2015-11-25 19:24:42'),
(3, 5, 6, 'gadsgadsg', 523423, 2, '2015-11-29 22:15:17'),
(4, 5, 6, 'jalan permata', 0, 2, '2015-12-01 10:56:03'),
(5, 5, 6, 'jalan jalan', 0, 2, '2015-12-01 10:57:47'),
(6, 5, NULL, 'last', 0, 0, '2015-12-01 11:48:46'),
(7, 5, NULL, 'ini jadi ', 0, 0, '2015-12-01 11:51:21'),
(8, 5, 6, 'poiuytr', 0, 2, '2015-12-01 11:54:00'),
(9, 5, NULL, 'TKI', 0, 0, '2015-12-01 13:21:00'),
(10, 5, NULL, 'asdasd', 0, 0, '2015-12-01 14:53:57'),
(11, 5, NULL, 'asdasd', 0, 0, '2015-12-01 14:55:29'),
(12, 5, NULL, 'asdasd', 0, 0, '2015-12-01 14:56:23'),
(13, 5, NULL, 'asdas', 0, 0, '2015-12-01 15:00:33'),
(14, 5, NULL, 'asdas', 0, 0, '2015-12-01 15:04:50'),
(15, 5, NULL, 'jalan asdasdas', 0, 0, '2015-12-01 15:05:03'),
(16, 5, NULL, 'sfasfas', 0, 0, '2015-12-01 15:15:45'),
(17, 5, NULL, 'jalan bumi prima 4', 0, 0, '2015-12-01 15:18:46'),
(18, 5, NULL, 'cimahi', 0, 0, '2015-12-01 22:19:18'),
(19, 5, NULL, 'jalan', 0, 0, '2015-12-01 23:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` double NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2' COMMENT '1= admin,2 = user,3=driver,4=owner',
  `date_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `email`, `phone`, `role`, `date_join`) VALUES
(1, 'faqih', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'faqih.salban@gmail.com', 6285720552995, 1, '2015-11-19 23:49:40'),
(5, 'udin', 'udin', '6bec9c852847242e384a4d5ac0962ba0', 'udin@gmail.com', 6285765552995, 2, '2015-11-19 23:52:54'),
(6, 'james', 'james', 'b4cc344d25a2efe540adbf2678e2304c', 'james@gmail.com', 6285765559855, 3, '2015-11-19 23:52:54'),
(7, 'neni', 'neni', '7a57a80314a2af4e4fc836700d291429', 'neni@gmail.com', 6285765263575, 4, '2015-11-19 23:53:47'),
(8, 'adminsama', 'adminn', '9c1ad00a16a7c67e2727b471ac969e96', 'sdf@ASD.CON', 675675, 1, '2015-11-25 08:49:38'),
(9, 'Eta', 'eta', 'eba021d91b44a97dec2588bbea58a447', 'eta@gmail.com', 3455869456, 2, '2015-12-01 14:06:55'),
(10, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, 2, '2015-12-01 14:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`), ADD KEY `id_transac` (`id_transac`), ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`), ADD KEY `id_service` (`id_service`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transac`
--
ALTER TABLE `transac`
  ADD PRIMARY KEY (`id_transac`), ADD KEY `id_user` (`id_user`), ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `id_transac` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_transac` FOREIGN KEY (`id_transac`) REFERENCES `transac` (`id_transac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `fk_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
ADD CONSTRAINT `fk_pemilik` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transac`
--
ALTER TABLE `transac`
ADD CONSTRAINT `fk_driver` FOREIGN KEY (`id_driver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
