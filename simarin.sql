-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2019 at 07:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarin`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `aktifasi_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE prakerin SET prakerin.is_aktif = 1 WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_konfirmasi` (IN `in_nis` INT)  NO SQL
BEGIN
UPDATE siswa SET siswa.status = 0 WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM wali WHERE wali.nis = in_nis;
DELETE FROM penjajakan WHERE penjajakan.nis = in_nis;
DELETE FROM prakerin WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_dashboard_admin` ()  NO SQL
BEGIN
SELECT COUNT(industri.id_industri) AS jumlah_industri FROM industri;
SELECT COUNT(siswa.nis) AS jumlah_siswa_konfirmasi FROM siswa WHERE siswa.status = 1;
SELECT COUNT(siswa.nis) AS jumlah_siswa_belum_konfirmasi FROM siswa WHERE siswa.status = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_industri_jurusan` (IN `in_id_jurusan` INT)  NO SQL
BEGIN
SELECT * FROM industri WHERE industri.id_jurusan = in_id_jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_penjajakan_admin` ()  NO SQL
BEGIN
SELECT * FROM penjajakan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_admin` ()  NO SQL
BEGIN
SELECT siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) AS nama, jurusan.jurusan, siswa.kelamin, siswa.alamat, CONCAT (siswa.tempat_lahir," ",siswa.tanggal_lahir) as ttl, siswa.tahun_ajaran, siswa.agama,siswa.nama_depan,siswa.nama_belakang, siswa.id_jurusan, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.password
FROM siswa
INNER JOIN
jurusan
ON siswa.id_jurusan = jurusan.id_jurusan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_prakerin` ()  NO SQL
BEGIN
select siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, prakerin.keterangan,ifnull(industri.industri,'-') AS industri, prakerin.waktu_pendaftaran, prakerin.is_validasi as validasi,prakerin.is_aktif as aktif,ifnull(prakerin.waktu_prakerin,'-') AS waktu_prakerin, wali.nama AS nama_wali, wali.no_telp, wali.status, siswa.kelamin
FROM prakerin
INNER JOIN siswa
ON siswa.nis = prakerin.nis
INNER JOIN jurusan
ON jurusan.id_jurusan = prakerin.id_jurusan
LEFT JOIN industri
ON prakerin.id_industri = industri.id_industri
INNER JOIN wali
ON wali.nis = prakerin.nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jurusan` (IN `in_id` INT)  NO SQL
BEGIN
SELECT jurusan FROM jurusan WHERE jurusan.id_jurusan = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_industri` (IN `in_id_industri` INT)  NO SQL
BEGIN
DELETE FROM industri WHERE industri.id_industri = in_id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM siswa WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_backup_industri` ()  NO SQL
BEGIN
SELECT * FROM backup_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_industri` ()  NO SQL
BEGIN
select industri.id_industri,industri.industri, jurusan.jurusan,COUNT(prakerin.nis) AS siswa_mendaftar
from industri
INNER JOIN jurusan
ON industri.id_jurusan = jurusan.id_jurusan
LEFT JOIN prakerin
ON industri.id_industri = prakerin.id_industri
GROUP BY industri.id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_jurusan` ()  NO SQL
BEGIN

select * FROM jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_data_prakerin` (IN `in_nis` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_keterangan` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(50), IN `in_status` VARCHAR(50), IN `in_id_industri` INT)  NO SQL
BEGIN
INSERT INTO prakerin (nis,id_industri,id_jurusan,keterangan) VALUES (in_nis,in_id_industri,in_id_jurusan,in_keterangan);
INSERT INTO wali(nis,nama,no_telp,status) 
VALUES(in_nis,in_nama,in_telp,in_status);
INSERT INTO penjajakan (penjajakan.nis,penjajakan.administrasi,penjajakan.nilai,penjajakan.peminjaman_buku) VALUES (in_nis,0,0,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_data_prakerin_null` (IN `in_nis` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_keterangan` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(50), IN `in_status` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO prakerin (nis,id_jurusan,keterangan) VALUES (in_nis,in_id_jurusan,in_keterangan);
INSERT INTO wali(nis,nama,no_telp,status) 
VALUES(in_nis,in_nama,in_telp,in_status);
INSERT INTO penjajakan (penjajakan.nis,penjajakan.administrasi,penjajakan.nilai,penjajakan.peminjaman_buku) VALUES (in_nis,0,0,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_industri` (IN `in_id_jurusan` INT(10), IN `in_industri` VARCHAR(50), IN `in_jumlah` INT(10))  NO SQL
BEGIN

INSERT INTO industri(id_jurusan,industri,jumlah_siswa,status) VALUES (in_id_jurusan,in_industri,in_jumlah,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_siswa` (IN `in_nis` VARCHAR(50), IN `in_nama_depan` VARCHAR(50), IN `in_nama_belakang` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_tempat_lahir` VARCHAR(10), IN `in_tanggal_lahir` DATE, IN `in_alamat` VARCHAR(100), IN `in_agama` VARCHAR(10), IN `in_kelamin` BOOLEAN, IN `in_tahun_ajaran` INT)  NO SQL
BEGIN
INSERT INTO siswa
(siswa.nis,siswa.id_jurusan,siswa.nama_depan,
 siswa.nama_belakang, siswa.password, siswa.kelamin,
 siswa.agama, siswa.alamat, siswa.tempat_lahir, siswa.tanggal_lahir,
 siswa.tahun_ajaran) 
 VALUES 
(in_nis,in_id_jurusan,in_nama_depan,
 in_nama_belakang, md5(in_nis), in_kelamin,
 in_agama, in_alamat, in_tempat_lahir, in_tanggal_lahir,
 in_tahun_ajaran);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_industri` (IN `in_id_industri` INT, IN `in_industri` VARCHAR(10), IN `in_jumlah` INT)  NO SQL
BEGIN
UPDATE industri SET industri.industri = in_industri, industri.jumlah_siswa = in_jumlah WHERE industri.id_industri = in_id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_siswa` (IN `in_nis` VARCHAR(50), IN `in_nama_depan` VARCHAR(50), IN `in_nama_belakang` VARCHAR(50), IN `in_tempat_lahir` VARCHAR(10), IN `in_tanggal_lahir` DATE, IN `in_kelamin` BOOLEAN, IN `in_alamat` VARCHAR(100), IN `in_agama` VARCHAR(50), IN `in_tahun_ajaran` INT)  NO SQL
BEGIN
UPDATE siswa 
SET siswa.nama_depan = in_nama_depan,
	siswa.nama_belakang = in_nama_belakang,
    siswa.tempat_lahir = in_tempat_lahir,
    siswa.tanggal_lahir = in_tanggal_lahir,
    siswa.kelamin = in_kelamin,
    siswa.alamat = in_alamat,
    siswa.tahun_ajaran = in_tahun_ajaran,
    siswa.agama = in_agama
    WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_password_admin` (IN `in_id` INT, IN `in_password` VARCHAR(50))  NO SQL
BEGIN
UPDATE admin SET admin.password = in_password WHERE admin.id_admin = in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_password_siswa` (IN `in_nis` VARCHAR(50), IN `in_password` VARCHAR(50))  NO SQL
BEGIN
UPDATE siswa SET siswa.password = in_password WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validasi_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE prakerin SET prakerin.is_validasi = 1, prakerin.is_aktif  =0 WHERE prakerin.nis = in_nis;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tipe_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `tipe_admin`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE `industri` (
  `id_industri` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `industri` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id_industri`, `id_jurusan`, `industri`, `alamat`) VALUES
(1, 6, 'Honda', ''),
(2, 6, 'Yamaha', ''),
(3, 7, 'Honda', ''),
(4, 7, 'Yamaha', ''),
(11, 1, 'Telkom', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Jaringan Komputer'),
(2, 'Teknik Kendaraan Ringan'),
(3, 'Keperawatan'),
(4, 'Teknik Audio Video'),
(5, 'Teknik Instalasi Tenaga Listrik'),
(6, 'Teknik Sepeda Motor'),
(7, 'Teknik Permesinan');

-- --------------------------------------------------------

--
-- Table structure for table `prakerin`
--

CREATE TABLE `prakerin` (
  `nis` varchar(50) NOT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `alamat_industri` varchar(50) NOT NULL,
  `waktu_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_prakerin` date DEFAULT NULL,
  `is_validasi` tinyint(1) NOT NULL,
  `is_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prakerin`
--

INSERT INTO `prakerin` (`nis`, `id_industri`, `id_jurusan`, `keterangan`, `alamat_industri`, `waktu_pendaftaran`, `waktu_prakerin`, `is_validasi`, `is_aktif`) VALUES
('123', 1, 6, 'Industri MOU', '', '2019-03-13 03:31:05', NULL, 1, 1),
('321', 2, 6, 'Industri MOU', '', '2019-03-20 10:14:14', NULL, 1, 0),
('405', NULL, 6, 'pabrik', '', '2019-04-02 16:21:23', NULL, 0, 0),
('3456', 2, 6, 'Industri MOU', '', '2019-04-04 03:40:18', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_jurusan`, `nama_depan`, `nama_belakang`, `password`, `kelamin`, `agama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tahun_ajaran`) VALUES
('123', 6, 'Fahmi', 'Aquinas', 'f11d50d63d3891a44c332e46d6d7d561', 1, 'Islam', 'Suhat', 'jombang', '1996-09-05', 2018),
('1234', 6, 'Ilham', 'Ahmad', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'atheis', 'malang', 'jombang', '2019-03-15', 2019),
('321', 6, 'Wita', 'Saraswati', '9757bb3cf28a5797e08ff7247bcc5ff0', 0, 'Islam', 'Perum Jati Negoro', 'malang', '1997-10-05', 2018),
('3456', 6, 'Basuki', 'Rahmat', 'def7924e3199be5e18060bb3e1d547a7', 1, 'Islam', 'Kepanjen Malang', 'Malang', '2019-01-14', 2019),
('405', 6, 'Yusuf', 'Kautsar', 'bbcbff5c1f1ded46c25d28119a85c6c2', 1, 'Islam', 'kepanjen 06', 'jombang', '2019-03-15', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`nis`, `nama`, `no_telp`, `status`) VALUES
('3456', 'Prabowo', '032145678', 'ayah'),
('123', 'Dewi Sri', '081330499953', 'ibu'),
('321', 'Dewi Sri', '098731232131', 'ibu'),
('405', 'Ilham Maulana ', '1', 'ayah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id_industri`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `prakerin`
--
ALTER TABLE `prakerin`
  ADD KEY `nis` (`nis`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_id_jurusan` (`id_jurusan`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD UNIQUE KEY `no_telp` (`no_telp`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industri`
--
ALTER TABLE `industri`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `industri`
--
ALTER TABLE `industri`
  ADD CONSTRAINT `industri_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `prakerin`
--
ALTER TABLE `prakerin`
  ADD CONSTRAINT `prakerin_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `prakerin_ibfk_3` FOREIGN KEY (`id_industri`) REFERENCES `industri` (`id_industri`),
  ADD CONSTRAINT `prakerin_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_id_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
