-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2013 at 12:53 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE IF NOT EXISTS `tbl_obat` (
  `idobt` varchar(10) NOT NULL,
  `namaobt` varchar(50) NOT NULL,
  `jenisobt` varchar(50) NOT NULL,
  PRIMARY KEY (`idobt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`idobt`, `namaobt`, `jenisobt`) VALUES
('OBT0000001', 'paraset', 'tablet'),
('OBT0000002', 'iyiyuiuy', 'tablet'),
('OBT0000003', 'uygyug', 'cair'),
('OBT0000004', 'kjhk', 'Kapsul'),
('OBT0000005', 'yuyuyuy', 'Kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE IF NOT EXISTS `tbl_pasien` (
  `idpasien` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` varchar(14) NOT NULL,
  `namapasien` varchar(40) NOT NULL,
  `tgllhr` date NOT NULL,
  `alamat` text NOT NULL,
  `jeniskel` enum('laki-laki','perempuan') NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `namakk` varchar(40) NOT NULL,
  `tgldaftar` varchar(20) NOT NULL,
  PRIMARY KEY (`idpasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`idpasien`, `noreg`, `namapasien`, `tgllhr`, `alamat`, `jeniskel`, `pekerjaan`, `namakk`, `tgldaftar`) VALUES
(2, 'PSN0000001', 'aleksander colon', '2013-05-30', 'england', 'laki-laki', 'mancing', 'siti', '11-05-2013 10:03:42'),
(3, 'PSN0000002', 'mas ginanjar pratama', '2013-05-21', 'parung panjang', 'laki-laki', 'mahasiswa', 'abdul jalil', '11-05-2013 10:04:08'),
(4, 'PSN0000003', 'junior fernandes kokondao', '1984-05-08', 'jl. malang negah ujung aspal pondok gede jawa barat', 'laki-laki', 'tukang kebun yang naik jabatan jadi montir', 'si ahong tukang embe', '11-05-2013 11:53:57'),
(5, 'PSN0000004', 'hitut puguh', '1986-10-21', 'juan fernando kompleok', 'laki-laki', 'pjiujuu', 'uhygubynitf', '11-05-2013 11:55:49'),
(6, 'PSN0000005', 'hjgbdjhsagdjhagsdh', '2013-05-16', 'lsaldjaljsdkajslkdj', 'laki-laki', ';llk;', 'okpk', '11-05-2013 11:56:26'),
(7, 'PSN0000006', 'sfsdfsd', '2013-05-29', 'fsfs', 'laki-laki', 'fsdfsdqqq', 'hbjbh', '11-05-2013 11:56:42'),
(8, 'PSN0000007', 'grg rgeegergte', '1988-09-09', 'sdf sfsdfsd gfsfsf sfsdf', 'laki-laki', 'dgergerger', 'dfge erfer geger', '12-05-2013 17:58:42'),
(9, 'PSN0000008', 'ege gegerger er', '2013-05-08', 'r3r 34f3 t4 t354g4t5 g45 g45g 4', 'perempuan', 'sjgdhsgshg', 'jhgj', '12-05-2013 17:59:17'),
(10, 'PSN0000009', 'jhasghjagdhasjdg', '2013-05-12', 'HASDAGDJAGSHDGAJ', 'laki-laki', 'LWJHDWHEFKJWEHK', 'WHKJHRKJEHRKWHKE``', '12-05-2013 17:59:44'),
(11, 'PSN0000010', 'LAKDAJSHDAD ASKDA KSDASKA G', '2013-05-12', 'SKDHSKJHFKSHDJFHSJDF SFLLSDF LSF SLDFLSHFDLJSDJFL', 'laki-laki', ';KFHJSHDFHSDJFH ;OSJDF JSDFJSKLDJ', 'WERWERWEFWE', '12-05-2013 18:00:01'),
(12, 'PSN0000011', 'WKEJKJFD WLEKJFD KWEFJWHEKFHWKEHFKWH', '2013-05-20', 'IERFEJ FERF KEKRJF EKRJF HEKRHKEFHQ', 'perempuan', 'IIUHUJH', 'JKJ', '12-05-2013 18:00:23'),
(13, 'PSN0000012', 'aslkjdasljdalskj', '2013-05-09', 'aslkdjalsjdlaskjdal', 'laki-laki', 'kdjlkjdlk', 'jdlk', '13-05-2013 10:09:22'),
(14, 'PSN0000013', 'mas jafar febriansyah', '1992-02-07', 'kp. cikabon rt.01/06 desa.parungpanjang kec. parungpanjang - bogor', 'laki-laki', 'mahasiswa', 'soetrisno', '13-05-2013 12:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE IF NOT EXISTS `tbl_riwayat` (
  `idpasien` int(11) NOT NULL,
  `idriwayat` int(11) NOT NULL,
  `riwayat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`idpasien`, `idriwayat`, `riwayat`, `keterangan`) VALUES
(2, 3, 'test 355yyy eee', 'test 355yyy eee'),
(5, 3, 'test 355yyy eee', 'test 355yyy eee'),
(5, 3, 'test 355yyy eee', 'test 355yyy eee'),
(2, 2, 'asdyasgdauysgd eeeee', 'duaygsduaysg eeeee'),
(2, 3, 'jaksdjhkajsd asdjkakdja sdajdakjsd', 'aljsdlajnsd asljdaklsdalsdnalsknd dlaknsdlaskldna'),
(6, 2, 'test 2', 'test 2'),
(6, 3, 'test 3', 'test 3'),
(6, 4, 'test 4', 'test 4'),
(6, 5, 'test 5', 'test 5'),
(6, 6, 'test 6', 'test 6'),
(6, 7, 'test 7', 'test 7'),
(12, 2, 'ASDAS', 'AJKSDK'),
(3, 1, 'SEHAT', 'SEHAT'),
(4, 1, 'SEHAYNHUH ', 'FFGXFXD'),
(2, 4, 'test 2', 'tes 2'),
(2, 5, 'test3 ', 'test 3'),
(2, 6, 'teset 45 ', 'test23 '),
(3, 2, 'test 5464', 'etssafys s65675');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `idusr` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idusr`, `user`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'gien', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
