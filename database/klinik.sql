-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2016 at 09:59 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

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
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.1', '2013-05-13', 76, '1368455965'),
('127.0.0.1', '2013-05-14', 127, '1368542784'),
('127.0.0.1', '2013-05-15', 117, '1368629734'),
('127.0.0.1', '2013-05-16', 118, '1368713996'),
('127.0.0.1', '2013-05-17', 5, '1368766283'),
('127.0.0.1', '2013-05-18', 19, '1368854311'),
('127.0.0.1', '2013-05-20', 4, '1369023835'),
('127.0.0.1', '2013-05-21', 3, '1369113384'),
('127.0.0.1', '2013-05-22', 5, '1369189225'),
('127.0.0.1', '2013-05-23', 6, '1369281049'),
('127.0.0.1', '2013-05-25', 1, '1369497668'),
('127.0.0.1', '2013-05-13', 76, '1368455965'),
('127.0.0.1', '2013-05-14', 127, '1368542784'),
('127.0.0.1', '2013-05-15', 117, '1368629734'),
('127.0.0.1', '2013-05-16', 118, '1368713996'),
('127.0.0.1', '2013-05-17', 5, '1368766283'),
('127.0.0.1', '2013-05-18', 19, '1368854311'),
('127.0.0.1', '2013-05-20', 4, '1369023835'),
('127.0.0.1', '2013-05-21', 3, '1369113384'),
('127.0.0.1', '2013-05-22', 5, '1369189225'),
('127.0.0.1', '2013-05-23', 6, '1369281049'),
('127.0.0.1', '2013-05-25', 1, '1369497668'),
('::1', '2016-02-06', 11, '1454749821'),
('::1', '2016-02-07', 4, '1454830095'),
('::1', '2016-02-08', 17, '1454936060'),
('::1', '2016-02-10', 7, '1455077847'),
('::1', '2016-02-11', 4, '1455206891'),
('::1', '2016-02-13', 1, '1455318600'),
('::1', '2016-02-14', 27, '1455447827'),
('::1', '2016-02-15', 12, '1455546323'),
('::1', '2016-02-16', 1, '1455618027'),
('::1', '2016-02-17', 1, '1455720701'),
('::1', '2016-02-21', 2, '1456027022');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `pasien_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `umur` int(2) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `masuk` date NOT NULL,
  `keluar` date NOT NULL,
  `tipe_pasien` varchar(10) NOT NULL,
  `diagnosa` text NOT NULL,
  `inap_masuk` date NOT NULL,
  PRIMARY KEY (`pasien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `rekam_id` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `jam` varchar(5) NOT NULL,
  `tindakan` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tarif` int(10) NOT NULL,
  PRIMARY KEY (`rekam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('OBT0000005', 'yuyuyuy', 'Kapsul'),
('OBT0000006', 'jhkh', 'Kapsul'),
('OBT0000007', 'jhkh', 'Kapsul'),
('OBT0000009', 'paracetamol', 'puyer'),
('OBT0000010', 'lanadexon', 'Tablet');

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
  `telpon` varchar(20) NOT NULL,
  `jeniskel` enum('laki-laki','perempuan') NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `namakk` varchar(40) NOT NULL,
  `berat` varchar(3) NOT NULL,
  `tinggi` varchar(3) NOT NULL,
  `tgldaftar` varchar(20) NOT NULL,
  PRIMARY KEY (`idpasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`idpasien`, `noreg`, `namapasien`, `tgllhr`, `alamat`, `telpon`, `jeniskel`, `pekerjaan`, `namakk`, `berat`, `tinggi`, `tgldaftar`) VALUES
(2, 'KDN0000002', 'zcx', '2016-02-01', 'zxczxc ', '', '', '', 'zxczxc', 'zcx', 'cz', '08-02-2016 07:53:30'),
(3, 'KDN0000003', 'sd', '2016-02-08', 'dsf', '', 'perempuan', 'Karyawan', 'sfd', '', '', '08-02-2016 13:12:02'),
(4, 'KDN0000004', 'Agung', '2016-02-09', 'bekasi ', '086777707070700', 'laki-laki', 'Wiraswasta', 'gak ada', '100', '180', '08-02-2016 13:15:25'),
(6, 'KDN0000006', 'budi', '2016-02-03', 'bekasi timur regency blok q 1 no 1  ', '085711626899', 'laki-laki', 'Karyawan', 'Syafruddin', '50', '166', '10-02-2016 04:10:03'),
(7, 'KDN0000007', 'Heri', '2016-02-02', 'bogor', '0987654', 'laki-laki', 'Karyawan', 'heri', '50', '160', '14-02-2016 11:51:51'),
(8, 'KDN0000008', 'reza', '1995-05-16', 'cibitung', '085711626899', 'laki-laki', 'Wiraswasta', 'Syafruddin', '50', '160', '15-02-2016 15:28:03'),
(9, 'KDN0000009', 'rizki', '1979-05-07', 'pekayon', '0877900002020', 'laki-laki', 'Karyawan', 'ape', '200', '180', '21-02-2016 04:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE IF NOT EXISTS `tbl_riwayat` (
  `idpasien` int(11) NOT NULL,
  `idriwayat` int(11) NOT NULL,
  `dokter` varchar(20) NOT NULL,
  `riwayat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`idpasien`, `idriwayat`, `dokter`, `riwayat`, `keterangan`) VALUES
(6, 1, '', 'asdasd', 'asd'),
(7, 1, '', 'pilek', 'paracetamol'),
(8, 1, '', 'dia itu sakit hati dan gak bisa move on\r\ntrus pala nya pusing mikirin orang gak jelas disana sini', 'obat nya macem - macem yaitu dengan sabar dan tawakal'),
(8, 2, '', 'fdfd', 'dfdf'),
(8, 3, '', '', ''),
(8, 4, '', 'dfdf', 'dfd'),
(8, 5, '', '', ''),
(8, 6, '', '', ''),
(9, 1, '', 'sds', 'sds');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `idusr` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`idusr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idusr`, `user`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'gien', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'reza', '202cb962ac59075b964b07152d234b70'),
(5, 'test', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'dokter', 'sha256:1000:RadSbBDrpjpGode9cE4xT5AGSbFlKlmB:s4/FfjF1hSoUuQErD62R20pFn8FZdHs5', 'DR Dr Heru Rahmat SPFM', 'dokter'),
(2, 'perawat', 'sha256:1000:TFelJpg/ABsDAcu4ptGUo+VW0GnNky7g:9Gz5B+yFRppvlEzE/SoPQfnoEsySAcMc', 'Ners Estu ningsih, S.Kep', 'perawat'),
(3, 'admin', 'sha256:1000:mTM6S6Wj+3b5k0yg1g6+UW45NPeB6w50:nqZdXc3Q/KL+XTcM09gOKojvpYFsKB12', 'Administrator', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
