-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 19 Septembre 2022 à 14:57
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `hocsinh`
--

-- --------------------------------------------------------

--
-- Structure de la table `congno`
--

CREATE TABLE `congno` (
  `macongno` int(10) unsigned NOT NULL auto_increment,
  `noidungthu` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sotien` int(11) NOT NULL,
  `miengiam` int(11) NOT NULL,
  `khautru` int(11) NOT NULL,
  `congno` int(11) NOT NULL,
  `trangthai` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`macongno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `congno`
--


-- --------------------------------------------------------

--
-- Structure de la table `diem`
--

CREATE TABLE `diem` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `diemmieng` int(11) NOT NULL,
  `diem15phut` int(11) NOT NULL,
  `diem1tiet` int(11) NOT NULL,
  `diemgk` int(11) NOT NULL,
  `diemck` int(11) NOT NULL,
  `diemtbmon` int(11) NOT NULL,
  `diemtbcaki` int(11) NOT NULL,
  `hocluc` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hanhkiem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `mamh` int(11) NOT NULL,
  `mahs` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mamh` (`mamh`,`mahs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `diem`
--


-- --------------------------------------------------------

--
-- Structure de la table `giaovien`
--

CREATE TABLE `giaovien` (
  `magv` int(10) unsigned NOT NULL auto_increment,
  `madangnhap` int(11) NOT NULL,
  `malichday` int(11) NOT NULL,
  `hoten` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `kinhnghiem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `bomon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `chucvu` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `socmnd` int(11) NOT NULL,
  `dantoc` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tongiao` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `noisinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`magv`),
  KEY `madangnhap` (`madangnhap`,`malichday`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `giaovien`
--


-- --------------------------------------------------------

--
-- Structure de la table `giaovien-lop`
--

CREATE TABLE `giaovien-lop` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `malop` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `malop` (`malop`,`magv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `giaovien-lop`
--


-- --------------------------------------------------------

--
-- Structure de la table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `mahs` int(10) unsigned NOT NULL auto_increment,
  `hoten` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioi tinh` varchar(50) character set utf8 collate utf8_turkish_ci NOT NULL,
  `sdt` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `noisinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `khoahoc` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `lop` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hinh` varchar(20) default NULL,
  `trangthai` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `ngayvaotruong` date default NULL,
  `coso` varchar(50) default NULL,
  `dantoc` varchar(50) default NULL,
  `tongiao` varchar(50) default NULL,
  `cmnd` varchar(50) default NULL,
  `tennganhang` varchar(50) default NULL,
  `stk` varchar(50) default NULL,
  `tenchutk` varchar(50) default NULL,
  `tenchinhanh` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `macongno` varchar(50) default NULL,
  `malop` varchar(50) default NULL,
  `madangnhap` varchar(50) default NULL,
  `makl` varchar(50) default NULL,
  `malichday` varchar(50) default NULL,
  PRIMARY KEY  (`mahs`),
  UNIQUE KEY `macongno` (`macongno`),
  UNIQUE KEY `malop` (`malop`),
  UNIQUE KEY `madangnhap` (`madangnhap`),
  UNIQUE KEY `makl` (`makl`),
  UNIQUE KEY `malichday` (`malichday`),
  KEY `macongno_2` (`macongno`),
  KEY `malop_2` (`malop`),
  KEY `madangnhap_2` (`madangnhap`),
  KEY `makl_2` (`makl`),
  KEY `malichday_2` (`malichday`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19502952 ;

--
-- Contenu de la table `hocsinh`
--

INSERT INTO `hocsinh` (`mahs`, `hoten`, `ngaysinh`, `gioi tinh`, `sdt`, `noisinh`, `khoahoc`, `lop`, `hinh`, `trangthai`, `ngayvaotruong`, `coso`, `dantoc`, `tongiao`, `cmnd`, `tennganhang`, `stk`, `tenchutk`, `tenchinhanh`, `email`, `macongno`, `malop`, `madangnhap`, `makl`, `malichday`) VALUES
(19498271, 'Lâm Hùng Phương', '2022-09-15', 'Nam', '02556465165165', 'Bình Phước', '2022-2023', '10A5', 'image2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19502951, 'Trần Minh Thịnh', '2022-09-20', 'Nam', '0395887319', 'Bến Tre', '2022-2023', '12A1', 'image1.jpg', 'Đang học', '2022-09-14', 'Trung h?c ph? thông L?c Ninh', 'Kinh', 'Không', '0616151122', 'Ngân hàng Agribank', '12360322', 'Tr?n Minh Th?nh', 'Chi nhánh Th?nh Phú - B?n Tre', 'thinhzed209@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `hocsinh-tailieu`
--

CREATE TABLE `hocsinh-tailieu` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mahs` int(11) NOT NULL,
  `matalieu` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mahs` (`mahs`,`matalieu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hocsinh-tailieu`
--


-- --------------------------------------------------------

--
-- Structure de la table `khoilop`
--

CREATE TABLE `khoilop` (
  `makl` int(10) unsigned NOT NULL auto_increment,
  `soluonghs` int(11) NOT NULL,
  `nienkhoa` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tenkhoi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`makl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `khoilop`
--


-- --------------------------------------------------------

--
-- Structure de la table `lichday`
--

CREATE TABLE `lichday` (
  `malichday` int(10) unsigned NOT NULL auto_increment,
  `maqtv` int(11) NOT NULL,
  `ngaydang` date NOT NULL,
  `hieuluc` date NOT NULL,
  `lopday` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `mon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tietday` int(11) NOT NULL,
  `buoiday` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`malichday`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `lichday`
--


-- --------------------------------------------------------

--
-- Structure de la table `lichhoc`
--

CREATE TABLE `lichhoc` (
  `malichhoc` int(10) unsigned NOT NULL auto_increment,
  `maqtv` int(11) NOT NULL,
  `ngaydang` date NOT NULL,
  `hieuluc` date NOT NULL,
  `mon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tiethoc` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `buoihoc` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gvday` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`malichhoc`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `lichhoc`
--


-- --------------------------------------------------------

--
-- Structure de la table `lop`
--

CREATE TABLE `lop` (
  `malop` int(10) unsigned NOT NULL auto_increment,
  `makl` int(11) NOT NULL,
  `tenlop` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `siso` int(11) NOT NULL,
  `nienkhoa` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`malop`),
  KEY `makl` (`makl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `lop`
--


-- --------------------------------------------------------

--
-- Structure de la table `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` int(10) unsigned NOT NULL auto_increment,
  `tenmon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `bomon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hocki` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `nienkhoa` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`mamh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `monhoc`
--


-- --------------------------------------------------------

--
-- Structure de la table `monhoc-giaovien`
--

CREATE TABLE `monhoc-giaovien` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `magv` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `magv` (`magv`,`mamh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `monhoc-giaovien`
--


-- --------------------------------------------------------

--
-- Structure de la table `quantrivien`
--

CREATE TABLE `quantrivien` (
  `maqtv` int(10) unsigned NOT NULL auto_increment,
  `tenqtv` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `chucvu` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `quyenhan` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  PRIMARY KEY  (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `quantrivien`
--


-- --------------------------------------------------------

--
-- Structure de la table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `madangnhap` int(10) unsigned NOT NULL auto_increment,
  `matkhau` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `maqtv` int(11) NOT NULL,
  PRIMARY KEY  (`madangnhap`),
  UNIQUE KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19502952 ;

--
-- Contenu de la table `taikhoan`
--

INSERT INTO `taikhoan` (`madangnhap`, `matkhau`, `maqtv`) VALUES
(19498271, '123456', 19498271),
(19502951, '123456', 19502951);

-- --------------------------------------------------------

--
-- Structure de la table `tailieu`
--

CREATE TABLE `tailieu` (
  `matailieu` int(10) unsigned NOT NULL auto_increment,
  `mamh` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `noidung` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `tieude` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`matailieu`),
  KEY `mamh` (`mamh`,`magv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tailieu`
--


-- --------------------------------------------------------

--
-- Structure de la table `tintuc`
--

CREATE TABLE `tintuc` (
  `matituc` int(10) unsigned NOT NULL auto_increment,
  `maqtv` int(11) NOT NULL,
  `tieude` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `noidung` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  PRIMARY KEY  (`matituc`),
  KEY `maqtv` (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tintuc`
--

