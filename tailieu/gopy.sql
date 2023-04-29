-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2022 at 04:26 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `congthongtin`
--

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `noidung` varchar(5000) collate utf8_unicode_ci default NULL,
  `mahocsinh` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mahocsinh` (`mahocsinh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`id`, `noidung`, `mahocsinh`) VALUES
(1, '', 19502951),
(2, 'cay vl', 19502951),
(3, 'cay vl', 19502951),
(4, 'cay vl', 19502951),
(5, 'cay vl', 19502951),
(6, 'cay vl', 19502951),
(7, '', 19502951);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy_ibfk_1` FOREIGN KEY (`mahocsinh`) REFERENCES `hocsinh` (`mahocsinh`);
