-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2021 at 02:58 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layhospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE IF NOT EXISTS `channel` (
  `chno` int(11) NOT NULL AUTO_INCREMENT,
  `docno` int(11) NOT NULL,
  `pno` int(11) NOT NULL,
  `rno` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`chno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`chno`, `docno`, `pno`, `rno`, `date`) VALUES
(1, 1, 1, 2, '2021-01-30'),
(2, 1, 1, 2, '2021-01-30'),
(3, 2, 2, 3, '2021-01-30'),
(4, 2, 4, 2, '2021-02-24'),
(5, 3, 4, 2, '2021-02-24'),
(6, 1, 5, 3, '2021-12-12'),
(7, 1, 4, 2, '2021-02-17'),
(8, 4, 5, 2, '2021-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctorno` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`doctorno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorno`, `dname`, `special`, `qual`, `fee`, `phone`, `room`, `log_id`) VALUES
(1, 'doc1', 'asd', 'bbms', 1200, 123655, 2, 1),
(2, 'ali', 'abass', 'BBMS', 1300, 145632, 5, 8),
(3, 'allll', 'alll', 'alll', 120, 123655, 2, 9),
(4, 'ddd', 'asdf', 'asd', 156, 54456, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sellprice` int(11) NOT NULL,
  `buyprice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `itemname`, `description`, `sellprice`, `buyprice`, `qty`) VALUES
(1, 'panadol', 'sdsdfsdf', 10, 8, 1000),
(2, 'pnd', 'sdfsdfsd', 20, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patientno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`patientno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientno`, `name`, `phone`, `address`) VALUES
(4, 'huss sho', 2154698, 'ayta'),
(5, 'lalalala', 654984, 'gugb');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `cno` int(11) NOT NULL,
  `dtype` varchar(255) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`pid`, `cno`, `dtype`, `des`) VALUES
(1, 1, 'Fever', 'Panadol sdfdsdf sdfdsdf sdfdsdf sdsd '),
(7, 2, 'Fever Fever', 'asdfghjkl;p uytre fghjm ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `utype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `uname`, `password`, `utype`) VALUES
(9, 'alalal', 'doc', 'sho', 2),
(5, 'hussein', 'phar', 'sho', 1),
(6, 'ali', 'rece', 'sho', 3),
(10, 'llalala', 'doc1', 'sho', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
