-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2022 at 03:32 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datai`
--

-- --------------------------------------------------------

--
-- Table structure for table `congno`
--

CREATE TABLE `congno` (
  `macongno` int(11) NOT NULL,
  `noidungthu` varchar(50) collate utf8_unicode_ci default NULL,
  `sotien` int(11) default NULL,
  `miengiam` int(11) default NULL,
  `khautru` int(11) default NULL,
  `congno` int(11) default NULL,
  `trangthai` varchar(50) collate utf8_unicode_ci default NULL,
  `mahocsinh` int(11) default NULL,
  PRIMARY KEY  (`macongno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `congno`
--

INSERT INTO `congno` (`macongno`, `noidungthu`, `sotien`, `miengiam`, `khautru`, `congno`, `trangthai`, `mahocsinh`) VALUES
(1, 'Thu tiền học phí', 25000000, 0, 2000000, 23000000, 'Chưa đóng', 19502951),
(2, 'Thu tiền bảo hiểm', 500000, 0, 0, 500000, 'Chưa đóng', 19502951);

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `diemmieng` int(11) default NULL,
  `diem15phut` int(11) default NULL,
  `diem1tiet` int(11) default NULL,
  `diemgk` int(11) default NULL,
  `diemck` int(11) default NULL,
  `diemtbmon` int(11) default NULL,
  `diemtbcaki` int(11) default NULL,
  `hocluc` varchar(50) collate utf8_unicode_ci default NULL,
  `hanhkiem` varchar(50) collate utf8_unicode_ci default NULL,
  `mahocsinh` int(11) default NULL,
  `mamonhoc` int(11) default NULL,
  `hocki` int(11) default NULL,
  `hoten` varchar(50) collate utf8_unicode_ci default NULL,
  `mon` varchar(50) collate utf8_unicode_ci default NULL,
  `namhoc` varchar(50) collate utf8_unicode_ci default NULL,
  `lop` varchar(50) collate utf8_unicode_ci default NULL,
  KEY `mahocsinh` (`mahocsinh`),
  KEY `mamonhoc` (`mamonhoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`diemmieng`, `diem15phut`, `diem1tiet`, `diemgk`, `diemck`, `diemtbmon`, `diemtbcaki`, `hocluc`, `hanhkiem`, `mahocsinh`, `mamonhoc`, `hocki`, `hoten`, `mon`, `namhoc`, `lop`) VALUES
(10, 8, 9, 10, 10, NULL, NULL, NULL, NULL, 19502951, 1, 1, 'Trần Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 5, 6, 1, 9, 0, NULL, NULL, NULL, 19502951, 1, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 7, 7, 9, 4, 0, NULL, NULL, NULL, 19502951, 2, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 8, 9, NULL, NULL, NULL, NULL, 19502951, 2, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 9, 5, 6, NULL, NULL, NULL, NULL, 19502951, 3, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 9, 8, 9, 4, NULL, NULL, NULL, NULL, 19502951, 3, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 9, 4, 1, NULL, NULL, NULL, NULL, 19502951, 4, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 5, 9, 7, 8, NULL, NULL, NULL, NULL, 19502951, 4, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 4, 8, 4, 6, 5, 0, NULL, NULL, 19502951, 5, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 4, 6, NULL, NULL, NULL, NULL, 19502951, 5, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 6, 5, 7, NULL, NULL, NULL, NULL, 19502951, 6, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 5, 9, NULL, NULL, NULL, NULL, 19502951, 6, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 9, 9, 5, 6, NULL, NULL, NULL, NULL, 19502951, 7, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 5, 9, 5, 4, 0, NULL, NULL, NULL, 19502951, 7, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 8, 5, 6, NULL, NULL, NULL, NULL, 19502951, 8, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 4, 4, NULL, NULL, NULL, NULL, 19502951, 8, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 9, 8, 4, 9, NULL, NULL, NULL, NULL, 19502951, 9, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 9, 8, NULL, NULL, NULL, NULL, 19502951, 9, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 9, 9, 4, 4, NULL, NULL, NULL, NULL, 19502951, 10, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 9, 4, 8, NULL, NULL, NULL, NULL, 19502951, 10, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 8, 4, 6, NULL, NULL, NULL, NULL, 19502951, 11, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 9, 8, 4, 9, NULL, NULL, NULL, NULL, 19502951, 12, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 4, 8, NULL, NULL, NULL, NULL, 19502951, 12, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(5, 8, 8, 5, 9, NULL, NULL, NULL, NULL, 19502951, 13, 1, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 8, 8, 4, 9, NULL, NULL, NULL, NULL, 19502951, 13, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1'),
(4, 9, 9, 4, 9, NULL, NULL, NULL, NULL, 19502951, 11, 2, 'Trân Minh Thịnh', NULL, '2022-2023', '10A1');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `malichday` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  `hoten` varchar(50) collate utf8_unicode_ci default NULL,
  `gioitinh` varchar(50) collate utf8_unicode_ci default NULL,
  `diachi` varchar(50) collate utf8_unicode_ci default NULL,
  `sdt` int(11) default NULL,
  `kinhnghiem` varchar(50) collate utf8_unicode_ci default NULL,
  `bomon` varchar(50) collate utf8_unicode_ci default NULL,
  `chucvu` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaysinh` date default NULL,
  `socmnd` int(11) default NULL,
  `dantoc` varchar(50) collate utf8_unicode_ci default NULL,
  `tongiao` varchar(50) collate utf8_unicode_ci default NULL,
  `noisinh` varchar(50) collate utf8_unicode_ci default NULL,
  `hinh` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`magiaovien`),
  KEY `malichday` (`malichday`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`malichday`, `magiaovien`, `hoten`, `gioitinh`, `diachi`, `sdt`, `kinhnghiem`, `bomon`, `chucvu`, `ngaysinh`, `socmnd`, `dantoc`, `tongiao`, `noisinh`, `hinh`) VALUES
(1, 123456, 'Nguyễn Văn Lâm', 'Nam', 'Quận 3, thành phố Hồ Chí Minh', 396686379, '10 năm', 'Toán', 'Giáo viên bộ môn', '1997-12-02', 2147483647, 'Kinh', 'Không', 'Hà Tĩnh', 'gv1.jpg'),
(1, 123457, 'Lê Thị Mai', 'Nữ', 'Gò Vấp, Thành phố Hồ Chí Minh', 395408408, '2 năm', 'Toán', 'Giáo viên bộ môn', '1997-12-11', 2147483647, 'Kinh', 'Không', 'Gia Lai', 'gv2.jpg'),
(1, 123458, 'Trần Văn Toàn', 'Nam', 'Thủ Đức, Thành phố Hồ Chí Minh', 2147483647, '15 năm', 'Ngữ Văn', 'Giáo viên bộ môn', '1997-04-17', 2147483647, 'Kinh', 'Không', 'Bình Phước', 'gv3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `giaovienedit`
--

CREATE TABLE `giaovienedit` (
  `magiaovien` int(11) NOT NULL,
  `hoten` varchar(50) collate utf8_unicode_ci default NULL,
  `gioitinh` varchar(50) collate utf8_unicode_ci default NULL,
  `diachi` varchar(50) collate utf8_unicode_ci default NULL,
  `sdt` int(11) default NULL,
  `kinhnghiem` varchar(50) collate utf8_unicode_ci default NULL,
  `bomon` varchar(50) collate utf8_unicode_ci default NULL,
  `chucvu` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaysinh` date default NULL,
  `socmnd` int(11) default NULL,
  `dantoc` varchar(50) collate utf8_unicode_ci default NULL,
  `tongiao` varchar(50) collate utf8_unicode_ci default NULL,
  `noisinh` varchar(50) collate utf8_unicode_ci default NULL,
  `hinh` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovienedit`
--

INSERT INTO `giaovienedit` (`magiaovien`, `hoten`, `gioitinh`, `diachi`, `sdt`, `kinhnghiem`, `bomon`, `chucvu`, `ngaysinh`, `socmnd`, `dantoc`, `tongiao`, `noisinh`, `hinh`) VALUES
(123456, 'tịnh', '', '', 0, '', '', '', '0000-00-00', 0, '', '', 'Xã Đại Hải, Huyện Kế Sách, Tỉnh Sóc Trăng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giaovienlophoc`
--

CREATE TABLE `giaovienlophoc` (
  `malop` int(11) NOT NULL,
  `magiaovien` int(11) default NULL,
  `tenlop` varchar(50) collate utf8_unicode_ci default NULL,
  KEY `malop` (`malop`),
  KEY `magiaovien` (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovienlophoc`
--

INSERT INTO `giaovienlophoc` (`malop`, `magiaovien`, `tenlop`) VALUES
(1, 123456, '10A1'),
(2, 123456, '10A2'),
(2, 123457, '10A2'),
(3, 123457, '10A3'),
(5, 123456, '11A1'),
(6, 123456, '11A2'),
(4, 123458, '10A4'),
(7, 123458, '11A3');

-- --------------------------------------------------------

--
-- Table structure for table `giaovienmonhoc`
--

CREATE TABLE `giaovienmonhoc` (
  `mamonhoc` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  `tenmon` varchar(50) collate utf8_unicode_ci default NULL,
  KEY `mamonhoc` (`mamonhoc`),
  KEY `magiaovien` (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovienmonhoc`
--

INSERT INTO `giaovienmonhoc` (`mamonhoc`, `magiaovien`, `tenmon`) VALUES
(1, 123456, 'Toán'),
(2, 123458, 'Ngữ Văn'),
(2, 123457, 'Ngữ Văn');

-- --------------------------------------------------------

--
-- Table structure for table `guigopy`
--

CREATE TABLE `guigopy` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `noidung` varchar(5000) collate utf8_unicode_ci default NULL,
  `mahocsinh` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `guigopy`
--

INSERT INTO `guigopy` (`id`, `noidung`, `mahocsinh`, `magiaovien`) VALUES
(1, 'he he', 19502951, 0),
(2, 'he he', 0, 123456),
(3, 'he he hehehe', 19502951, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `malichhoc` int(11) NOT NULL,
  `macongno` int(11) NOT NULL,
  `malop` int(11) NOT NULL,
  `makhoilop` int(11) NOT NULL,
  `mahocsinh` int(11) NOT NULL,
  `hoten` varchar(50) collate utf8_unicode_ci default NULL,
  `gioitinh` varchar(50) collate utf8_unicode_ci default NULL,
  `trangthai` varchar(50) collate utf8_unicode_ci default NULL,
  `ngayvaotruong` date default NULL,
  `diachi` varchar(50) collate utf8_unicode_ci default NULL,
  `sdt` int(11) default NULL,
  `khoahoc` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaysinh` date default NULL,
  `socmnd` int(11) default NULL,
  `dantoc` varchar(50) collate utf8_unicode_ci default NULL,
  `tongiao` varchar(50) collate utf8_unicode_ci default NULL,
  `noisinh` varchar(50) collate utf8_unicode_ci default NULL,
  `lop` varchar(50) collate utf8_unicode_ci default NULL,
  `hinh` varchar(50) collate utf8_unicode_ci default NULL,
  `khoi` varchar(50) collate utf8_unicode_ci default NULL,
  `email` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`mahocsinh`),
  KEY `malichhoc` (`malichhoc`),
  KEY `macongno` (`macongno`),
  KEY `malop` (`malop`),
  KEY `makhoilop` (`makhoilop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`malichhoc`, `macongno`, `malop`, `makhoilop`, `mahocsinh`, `hoten`, `gioitinh`, `trangthai`, `ngayvaotruong`, `diachi`, `sdt`, `khoahoc`, `ngaysinh`, `socmnd`, `dantoc`, `tongiao`, `noisinh`, `lop`, `hinh`, `khoi`, `email`) VALUES
(1, 1, 1, 1, 19498271, 'Lâm Hùng Phương', 'Nam', 'Đang học', '2022-12-02', 'Thủ Đức, Thành phố Hồ Chí Minh', 395408907, '2022-2025', '2001-12-19', 2147483647, 'Kinh', 'Không', 'Bình Phước', '10A1', 'hs2.jpg', '10', 'phuong@gmail.com'),
(1, 1, 2, 1, 19498691, 'Nguyễn Thị Hoa', 'Nữ', 'Đang học', '2022-12-02', 'Thủ Đức, Thành phố Hồ Chí Minh', 983685573, '2022-2025', '2001-12-13', 2147483647, 'Kinh', 'Không', 'Đồng Tháp', '10A2', 'hs4.jpg', '10', 'hoa@gmail.com'),
(1, 1, 1, 1, 19502951, 'Trần Minh Thịnh', 'Nam', 'Đang học', '2022-12-02', 'Gò Vấp, Thành phố Hồ Chí Minh', 395888927, '2022-2025', '2001-09-20', 2147483647, 'Kinh', 'Không', 'Bến Tre', '10A1', 'hs1.jpg', '10', 'thinhzed209@gmail.com'),
(1, 1, 2, 1, 19502981, 'Trần Văn Ngoan', 'Nam', 'Đang học', '2022-12-02', 'Gò Vấp, Thành phố Hồ Chí Minh', 396689567, '2022-2025', '2001-12-11', 2147483647, 'Kinh', 'Không', 'An Giang', '10A2', 'hs3.jpg', '10', 'ngoa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinhedit`
--

CREATE TABLE `hocsinhedit` (
  `mahocsinh` int(11) NOT NULL,
  `hoten` varchar(50) collate utf8_unicode_ci default NULL,
  `gioitinh` varchar(50) collate utf8_unicode_ci default NULL,
  `trangthai` varchar(50) collate utf8_unicode_ci default NULL,
  `ngayvaotruong` date default NULL,
  `diachi` varchar(50) collate utf8_unicode_ci default NULL,
  `sdt` int(11) default NULL,
  `khoahoc` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaysinh` date default NULL,
  `socmnd` int(11) default NULL,
  `dantoc` varchar(50) collate utf8_unicode_ci default NULL,
  `tongiao` varchar(50) collate utf8_unicode_ci default NULL,
  `noisinh` varchar(50) collate utf8_unicode_ci default NULL,
  `lop` varchar(50) collate utf8_unicode_ci default NULL,
  `hinh` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`mahocsinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocsinhedit`
--

INSERT INTO `hocsinhedit` (`mahocsinh`, `hoten`, `gioitinh`, `trangthai`, `ngayvaotruong`, `diachi`, `sdt`, `khoahoc`, `ngaysinh`, `socmnd`, `dantoc`, `tongiao`, `noisinh`, `lop`, `hinh`) VALUES
(19502951, 'Tran', 'Nam', 'Đang học', '2022-12-02', '', 395887931, '2022-2025', '0000-00-00', 0, '', '', 'Xã Vĩnh Quới, Thị xã Ngã Năm, Tỉnh Sóc Trăng', '10A1', '');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinhtailieu`
--

CREATE TABLE `hocsinhtailieu` (
  `mahocsinh` int(11) NOT NULL,
  `matailieu` int(11) NOT NULL,
  KEY `mahocsinh` (`mahocsinh`),
  KEY `matailieu` (`matailieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocsinhtailieu`
--


-- --------------------------------------------------------

--
-- Table structure for table `khoilop`
--

CREATE TABLE `khoilop` (
  `makhoilop` int(11) NOT NULL,
  `tenkhoi` varchar(50) collate utf8_unicode_ci default NULL,
  `soluonghs` int(11) default NULL,
  `nienkhoa` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`makhoilop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoilop`
--

INSERT INTO `khoilop` (`makhoilop`, `tenkhoi`, `soluonghs`, `nienkhoa`) VALUES
(1, '10', 300, '2022-2023'),
(2, '11', 300, '2022-2023'),
(3, '12', 300, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `lichday`
--

CREATE TABLE `lichday` (
  `maqtv` int(11) NOT NULL,
  `malichday` int(11) NOT NULL,
  `ngaydang` date default NULL,
  `hieuluc` date default NULL,
  `mon` varchar(50) collate utf8_unicode_ci default NULL,
  `tiethoc` int(11) default NULL,
  `buoihoc` varchar(50) collate utf8_unicode_ci default NULL,
  `lopday` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`malichday`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichday`
--

INSERT INTO `lichday` (`maqtv`, `malichday`, `ngaydang`, `hieuluc`, `mon`, `tiethoc`, `buoihoc`, `lopday`) VALUES
(1, 1, '2022-12-02', '2022-12-23', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lichhoc`
--

CREATE TABLE `lichhoc` (
  `maqtv` int(11) NOT NULL,
  `malichhoc` int(11) NOT NULL,
  `ngaydang` date default NULL,
  `hieuluc` date default NULL,
  `mon` varchar(50) collate utf8_unicode_ci default NULL,
  `tiethoc` int(11) default NULL,
  `buoihoc` varchar(50) collate utf8_unicode_ci default NULL,
  `gvday` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`malichhoc`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichhoc`
--

INSERT INTO `lichhoc` (`maqtv`, `malichhoc`, `ngaydang`, `hieuluc`, `mon`, `tiethoc`, `buoihoc`, `gvday`) VALUES
(1, 1, '2022-12-02', '2022-12-16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `makhoilop` int(11) NOT NULL,
  `malop` int(11) NOT NULL,
  `tenlop` varchar(50) collate utf8_unicode_ci default NULL,
  `siso` int(11) default NULL,
  `nienkhoa` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`malop`),
  KEY `makhoilop` (`makhoilop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`makhoilop`, `malop`, `tenlop`, `siso`, `nienkhoa`) VALUES
(1, 1, '10A1', 40, '2022-2023'),
(1, 2, '10A2', 40, '2022-2023'),
(1, 3, '10A3', 40, '2022-2023'),
(1, 4, '10A4', 40, '2022-2023'),
(2, 5, '11A1', 40, '2022-2023'),
(2, 6, '11A2', 40, '2022-2023'),
(2, 7, '11A3', 40, '2022-2023'),
(2, 8, '11A4', 40, '2022-2023'),
(3, 9, '12A1', 40, '2022-2023'),
(3, 10, '12A2', 40, '2022-2023'),
(3, 11, '12A3', 40, '2022-2023'),
(3, 12, '12A4', 40, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamonhoc` int(11) NOT NULL,
  `tenmon` varchar(50) collate utf8_unicode_ci default NULL,
  `bomon` varchar(50) collate utf8_unicode_ci default NULL,
  `hocki` int(11) default NULL,
  `nienkhoa` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`mamonhoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mamonhoc`, `tenmon`, `bomon`, `hocki`, `nienkhoa`) VALUES
(1, 'Toán', 'Tự nhiên', 1, '2022-2023'),
(2, 'Ngữ văn', 'Xã hội', 1, '2022-2023'),
(3, 'Hóa học', NULL, 1, '2022-2023'),
(4, 'Vật lý', NULL, 1, '2022-2023'),
(5, 'Sinh học', NULL, 1, '2022-2023'),
(6, 'Tin học', NULL, 1, '2022-2023'),
(7, 'Lịch sử', NULL, 1, '2022-2023'),
(8, 'Địa lí', NULL, 1, '2022-2023'),
(9, 'Ngoại ngữ', NULL, 1, '2022-2023'),
(10, 'GDCD', NULL, 1, '2022-2023'),
(11, 'Công nghệ', NULL, 1, '2022-2023'),
(12, 'Thể dục', NULL, 1, '2022-2023'),
(13, 'GDQP', NULL, 1, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `quantrivien`
--

CREATE TABLE `quantrivien` (
  `maqtv` int(11) NOT NULL,
  `tenqtv` varchar(50) collate utf8_unicode_ci default NULL,
  `diachi` varchar(50) collate utf8_unicode_ci default NULL,
  `sdt` int(11) default NULL,
  `chucvu` varchar(50) collate utf8_unicode_ci default NULL,
  `quyenhan` varchar(50) collate utf8_unicode_ci default NULL,
  `gioitinh` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaysinh` date default NULL,
  PRIMARY KEY  (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantrivien`
--

INSERT INTO `quantrivien` (`maqtv`, `tenqtv`, `diachi`, `sdt`, `chucvu`, `quyenhan`, `gioitinh`, `ngaysinh`) VALUES
(1, 'Trần Minh Thịnh', 'Bến Tre', 395887319, 'Quản trị viên', 'ADMIN', 'NAM', '2001-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoangv`
--

CREATE TABLE `taikhoangv` (
  `id` int(11) NOT NULL,
  `maqtv` int(11) NOT NULL,
  `magiaovien` int(11) NOT NULL,
  `pass` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  KEY `maqtv` (`maqtv`),
  KEY `magiaovien` (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoangv`
--

INSERT INTO `taikhoangv` (`id`, `maqtv`, `magiaovien`, `pass`) VALUES
(1, 1, 123456, 'e10adc3949ba59abbe56e057f20f883e'),
(2, 1, 123457, 'f1887d3f9e6ee7a32fe5e76f4ab80d63'),
(3, 1, 123458, '93897cc117a734be93733779051c9926');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanhs`
--

CREATE TABLE `taikhoanhs` (
  `id` int(11) NOT NULL,
  `maqtv` int(11) NOT NULL,
  `mahocsinh` int(11) NOT NULL,
  `pass` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`mahocsinh`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoanhs`
--

INSERT INTO `taikhoanhs` (`id`, `maqtv`, `mahocsinh`, `pass`) VALUES
(2, 1, 19498271, '82a9f50f1af787acceb28ffb4c5219c6'),
(4, 1, 19498691, 'af01f3905141eb63ece88654c11e5cc8'),
(1, 1, 19502951, '71fc70cef02c797229bc2e0f57382a1e'),
(3, 1, 19502981, 'de6b7cce07af45ca43ab5742fabb4309');

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

CREATE TABLE `tailieu` (
  `mamonhoc` int(11) default NULL,
  `magiaovien` int(11) default NULL,
  `matailieu` int(11) NOT NULL default '0',
  `tieude` varchar(50) collate utf8_unicode_ci default NULL,
  `noidung` varchar(50) collate utf8_unicode_ci default NULL,
  `ngaydang` date default NULL,
  `khoi` int(11) default NULL,
  `tentailieu` varchar(50) collate utf8_unicode_ci default NULL,
  `tenmon` varchar(50) collate utf8_unicode_ci default NULL,
  `link` text collate utf8_unicode_ci,
  PRIMARY KEY  (`matailieu`),
  KEY `mamonhoc` (`mamonhoc`),
  KEY `magiaovien` (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`mamonhoc`, `magiaovien`, `matailieu`, `tieude`, `noidung`, `ngaydang`, `khoi`, `tentailieu`, `tenmon`, `link`) VALUES
(NULL, 123456, 1, NULL, NULL, NULL, 0, 'tailieu.sql', 'Toán', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 2, NULL, NULL, NULL, 10, 'hocsinh.sql', 'Ngữ Văn', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 3, NULL, NULL, NULL, 10, 'QLDA_DHHTTT15.docx', 'Hóa học', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 4, NULL, NULL, NULL, 10, 'Dreamweaver CS6 Crack .DLL Files.rar', 'Sinh học', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 5, NULL, NULL, NULL, 11, 'SQL Injection.docx', 'Địa lí', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 6, NULL, NULL, NULL, 11, 'BaoCao_CNMoi_Tuan2.docx', 'Hóa học', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS'),
(NULL, 123456, 7, NULL, NULL, NULL, 12, 'BaoCao_CNMoi_Tuan2.docx', 'Toán', 'https://drive.google.com/drive/u/0/folders/1WTWu01I_860Br2J0Q151h2gWtGWN38HS');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `maqtv` int(11) NOT NULL,
  `matintuc` int(11) NOT NULL,
  `tieude` text collate utf8_unicode_ci,
  `noidung` text collate utf8_unicode_ci,
  `nienkhoa` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`matintuc`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`maqtv`, `matintuc`, `tieude`, `noidung`, `nienkhoa`) VALUES
(1, 1, 'Gửi những bố mẹ có con “không đáng tự hào”: Nói mong con hạnh phúc, sao cứ thèm thuồng nhìn vào điểm số?', 'Những ngày này, mạng xã hội sôi sùng sục như cái nắng gắt gỏng giữa trưa hè Hà Nội. Điểm thi các trường cấp 3 đã được công bố và cập nhật từng giờ, và một mùa thi đại học với biết bao kì vọng của cả con và cha mẹ lại đến…\r\n\r\nNhững gia đình có con thi đỗ nguyện vọng 1 thì hồ hởi ăn mừng, post lên facebook tấm hình con từ bé đến lớn với xiết bao tự hào. Những gia đình có con thiếu điểm thì cả đêm không ngủ, đắn đo giữa các nguyện vọng, không khí căng như dây đàn, bữa cơm có lẽ chưa lúc nào khó nuốt đến thế.\r\n\r\nKhông nằm ngoài “xu thế” đó, fanpage của các trường thi nhau đăng bài. Trường quốc tế, trường dân lập chất lượng cao, trường công chuẩn quốc gia… Trường nào cũng hiện lên bài đăng mới nhất với format “trăm trường như một”: Dòng chữ in hoa, to đậm “NIỀM TỰ HÀO CỦA TRƯỜNG TA” và nội dung bài là mười mấy tấm ảnh có gương mặt các học sinh đỗ vào chuyên nọ, chọn kia với số điểm cao ngất.\r\nĐương nhiên trường học thì phải ngợi khen học sinh giỏi, như doanh nghiệp phải vinh danh cá nhân xuất sắc. Sự ngợi khen và động lực thúc đẩy các con cố gắng hơn. Thế nhưng, phải chăng cụm từ “Niềm tự hào” dùng riêng cho các bạn học sinh có điểm số xuất sắc nghe có vẻ thiếu công bằng với những bạn thành tích học tập bình thường (vốn chiếm số đông trong trường?). Các con nhìn thấy bài đăng ấy chắc chưa đến mức tủi thân, chạnh lòng. Thế nhưng từ đó, cái suy nghĩ “Bản thân mình hình như không có gì đáng để tự hào?” dần dần ăn sâu vào tiềm thức. Khiến con nghĩ rằng “cày ngày, cày đêm” là con đường duy nhất để được công nhận.\r\n\r\nĐó là chưa kể những gia đình thiếu tâm lý, bố mẹ chụp màn hình ngay lập tức, rồi inbox vào “group gia đình” nói mát mẻ: “Đúng là nhà mình chỉ đóng học phí cho con người ta đi học!!” thì khoảng sâu ngăn cách giữa bố mẹ và con cái lại rộng ra thêm nhiều chút.\r\n\r\n“Nếu như vào thời điểm tuyển sinh, trường nào cũng nói rất hay về 7 loại hình thông minh, về giảm áp lực đi, hạnh phúc hơn và trân trọng từng khả năng vốn có của mỗi học sinh. Thì cuối năm, chẳng hiểu sao lại chỉ tổng kết “niềm tự hào” bằng điểm số. Thế những học sinh bình thường, sống tử tế, chân thành không đáng nói đến ư?”', '2022-2023'),
(1, 2, 'Có một ngôi trường cấp 3 “lọt thỏm” giữa lòng ĐHQG Hà Nội: Khuôn viên nhỏ xíu nhưng thành tích thì nhiều không đếm xuể', 'Nhiều người thường hay ví von rằng trường THPT Chuyên Ngoại ngữ (Đại học Ngoại ngữ, Đại học Quốc gia Hà Nội) là “ngôi trường của những thủ khoa”. Lý do là bởi sẽ chẳng khó để bắt gặp những học sinh có thành tích học tập xuất sắc, từng đạt nhiều giải thưởng trong và ngoài nước theo học tại đây.\r\n\r\nChẳng cần nói đâu xa, trong kỳ thi tốt nghiệp THPT 2022, Chuyên Ngữ đã “đóng góp” tới 2 học sinh trong bản đồ thủ khoa toàn quốc, đó chính là nam sinh Lò Hải Long (học sinh lớp 12A1) – thủ khoa khối A1 với tổng điểm 29,8 và Nguyễn Đăng Khải, bạn cùng lớp Long – thủ khoa khối B với tổng 29,35 điểm.\r\n\r\nVậy ngôi trường này “đỉnh” cỡ nào mà biết bao thế hệ học sinh thủ đô ao ước theo học, hãy cũng tìm hiểu nhé!\r\nLịch sử hình thành lâu lời, chất lượng đào tạo uy tín\r\n\r\nĐược thành lập từ năm 1969 theo quyết định của Bộ trưởng Bộ Giáo dục và Đào tạo, trường THPT Chuyên Ngoại ngữ (Đại học Ngoại ngữ – Đại học Quốc gia Hà Nội) là một trong những trường THPT có chất lượng đào tạo hàng đầu thủ đô nói riêng và Việt Nam nói chung.\r\n\r\nKhởi đầu là các lớp Phổ thông chuyên Ngoại ngữ thuộc trường Đại học Sư phạm Ngoại ngữ Hà Nội, đến ngày 20/4/2009, trường THPT Chuyên Ngoại ngữ được chính thức thành lập theo quyết định số 1844/QĐ-UBND của UBND thành phố Hà Nội.\r\nCác lớp chuyên tiếng Anh, tiếng Nga, tiếng Pháp, tiếng Trung của trường có từ ngay những ngày đầu thành lập (năm 1969). Đến năm học 2005 – 2006, trường bắt đầu đào tạo học sinh chuyên tiếng Đức và tiếng Nhật. Và đến năm học 2017-2018, những lớp chuyên Hàn đầu tiên ra đời. Hàng năm, trường đào tạo khoảng 1400-1500 học sinh được tuyển chọn từ khắp mọi miền của đất nước.', '2022-2023'),
(1, 3, 'Trường THPT Chuyên Hà Tĩnh thành tích đỉnh cỡ nào?', 'Mấy ngày vừa qua, mạng xã hội đang bàn tán xôn xao về buổi tổng ôn đêm cuối trước ngày thi cho 4.000 thí sinh khóa VIP của một thầy Phó Hiệu trưởng, đề ôn tập giống đến 80% đề thi thật do Bộ GD-ĐT công bố.\r\n\r\nĐược biết, thầy giáo Phan Khắc Nghệ là Phó hiệu trưởng trường THPT Chuyên Hà Tĩnh, thầy đã tổ chức buổi live tổng ôn ngay sát ngày thi chính thức cho môn Sinh (bao gồm 1 video củng cố kiến thức trọng tâm phát ngày 5/7 và 1 video chữa đề khóa luyện thi VIP ngày 7/7). Tuy nhiên, đại diện Bộ GD-ĐT cũng cho biết: Thầy Nghệ năm nay không nằm trong Ban ra đề thi.\r\nKhi nhắc tới mảnh đất miền Trung là nhắc đến vùng đất học với những con người kiệt xuất đi lên từ một nơi phải chịu nhiều bão tố, thiên tai nhất Việt Nam. Góp mặt trong số nhiều ngôi trường cấp 3 nổi tiếng, luôn đứng top đầu của cả nước, THPT Chuyên Hà Tĩnh đã chứng tỏ thành tích vô cùng xứng đáng dành cho sự nỗ lực của thầy và trò.\r\n\r\nTrường THPT Chuyên Hà Tĩnh được thành lập từ năm 1991, đây là trường chuyên duy nhất tại tỉnh Hà Tĩnh. Trường luôn luôn nằm trong top 10 toàn quốc về kết quả thi Đại học. Số lượng lớp đỗ Đại học với tỷ lệ 100% hay tất cả đều trên 27 điểm của trường nhiều không đếm xuể.\r\nNhững học trò gắn liền với tên tuổi Chuyên Hà Tĩnh\r\n\r\nVõ Anh Đức từng là nam sinh có tiếng học siêu đỉnh tại trường Chuyên Hà Tĩnh. Năm học lớp 5, Võ Anh Đức tham dự cuộc thi Toán tuổi thơ toàn quốc và đoạt huy chương Bạc. Hơn 8 năm sau, cậu học trò quê Hà Tĩnh giành huy chương Vàng cuộc thi Olympic Toán quốc tế.\r\n\r\nNgoài ra, bảng thành tích dài dằng dặc của Đức còn khiến nhiều người khâm phục như: giải Nhất Toán tỉnh Hà Tĩnh, giải Nhì quốc gia giải toán trên máy tính cầm tay năm 2010 (lớp 9); giải Nhì Toán quốc gia lớp 12 năm học 2011-2012 (lúc còn học lớp 11).\r\n\r\nNgười thứ 2 ghi dấu ấn trong lòng cựu học sinh Chuyên Hà Tĩnh là anh chàng Phan Mạnh Tân, vô địch Đường L.ên Đ.ỉnh Olympia lần thứ 2, năm 2001. Anh không chỉ giỏi mà còn sở hữu gương mặt rất điển trai. Sau 12 năm học tập và làm việc tại Úc, hiện tại, anh Phan Mạnh Tân đã lập gia đình và ổn định cuộc sống. Anh cũng đã hoàn thành chương trình nghiên cứu sinh tiến sĩ và đã đi làm ở công ty IBM, Melbourne, Australia.', '2022-2023');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`mahocsinh`) REFERENCES `hocsinh` (`mahocsinh`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`mamonhoc`) REFERENCES `monhoc` (`mamonhoc`);

--
-- Constraints for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`malichday`) REFERENCES `lichday` (`malichday`);

--
-- Constraints for table `giaovienlophoc`
--
ALTER TABLE `giaovienlophoc`
  ADD CONSTRAINT `giaovienlophoc_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lophoc` (`malop`),
  ADD CONSTRAINT `giaovienlophoc_ibfk_2` FOREIGN KEY (`magiaovien`) REFERENCES `giaovien` (`magiaovien`);

--
-- Constraints for table `giaovienmonhoc`
--
ALTER TABLE `giaovienmonhoc`
  ADD CONSTRAINT `giaovienmonhoc_ibfk_1` FOREIGN KEY (`mamonhoc`) REFERENCES `monhoc` (`mamonhoc`),
  ADD CONSTRAINT `giaovienmonhoc_ibfk_2` FOREIGN KEY (`magiaovien`) REFERENCES `giaovien` (`magiaovien`);

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`malichhoc`) REFERENCES `lichhoc` (`malichhoc`),
  ADD CONSTRAINT `hocsinh_ibfk_2` FOREIGN KEY (`macongno`) REFERENCES `congno` (`macongno`),
  ADD CONSTRAINT `hocsinh_ibfk_3` FOREIGN KEY (`malop`) REFERENCES `lophoc` (`malop`),
  ADD CONSTRAINT `hocsinh_ibfk_4` FOREIGN KEY (`makhoilop`) REFERENCES `khoilop` (`makhoilop`);

--
-- Constraints for table `hocsinhtailieu`
--
ALTER TABLE `hocsinhtailieu`
  ADD CONSTRAINT `hocsinhtailieu_ibfk_1` FOREIGN KEY (`mahocsinh`) REFERENCES `hocsinh` (`mahocsinh`),
  ADD CONSTRAINT `hocsinhtailieu_ibfk_2` FOREIGN KEY (`matailieu`) REFERENCES `tailieu` (`matailieu`);

--
-- Constraints for table `lichday`
--
ALTER TABLE `lichday`
  ADD CONSTRAINT `lichday_ibfk_1` FOREIGN KEY (`maqtv`) REFERENCES `quantrivien` (`maqtv`);

--
-- Constraints for table `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD CONSTRAINT `lichhoc_ibfk_1` FOREIGN KEY (`maqtv`) REFERENCES `quantrivien` (`maqtv`);

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`makhoilop`) REFERENCES `khoilop` (`makhoilop`);

--
-- Constraints for table `taikhoangv`
--
ALTER TABLE `taikhoangv`
  ADD CONSTRAINT `taikhoangv_ibfk_1` FOREIGN KEY (`maqtv`) REFERENCES `quantrivien` (`maqtv`),
  ADD CONSTRAINT `taikhoangv_ibfk_2` FOREIGN KEY (`magiaovien`) REFERENCES `giaovien` (`magiaovien`);

--
-- Constraints for table `taikhoanhs`
--
ALTER TABLE `taikhoanhs`
  ADD CONSTRAINT `taikhoanhs_ibfk_1` FOREIGN KEY (`maqtv`) REFERENCES `quantrivien` (`maqtv`),
  ADD CONSTRAINT `taikhoanhs_ibfk_2` FOREIGN KEY (`mahocsinh`) REFERENCES `hocsinh` (`mahocsinh`);

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`mamonhoc`) REFERENCES `monhoc` (`mamonhoc`),
  ADD CONSTRAINT `tailieu_ibfk_2` FOREIGN KEY (`magiaovien`) REFERENCES `giaovien` (`magiaovien`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`maqtv`) REFERENCES `quantrivien` (`maqtv`);
