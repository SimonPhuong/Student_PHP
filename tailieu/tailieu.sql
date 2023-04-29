-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2022 at 05:22 PM
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
-- Table structure for table `tailieu`
--

CREATE TABLE `tailieu` (
  `mamonhoc` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  `matailieu` int(11) NOT NULL,
  `tieude` varchar(50) collate utf8_unicode_ci default NULL,
  `noidung` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaydang` date default NULL,
  `makhoi` int(11) NOT NULL,
  `tentailieu` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`matailieu`),
  KEY `mamonhoc` (`mamonhoc`),
  KEY `magiaovien` (`magiaovien`),
  KEY `makhoi` (`makhoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tailieu`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`mamonhoc`) REFERENCES `monhoc` (`mamonhoc`),
  ADD CONSTRAINT `tailieu_ibfk_2` FOREIGN KEY (`magiaovien`) REFERENCES `giaovien` (`magiaovien`);
