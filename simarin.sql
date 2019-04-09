-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2019 at 08:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

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
UPDATE tanggal SET tanggal.tanggal_aktif = CURRENT_DATE WHERE tanggal.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM wali WHERE wali.nis = in_nis;
DELETE FROM tanggal WHERE tanggal.nis = in_nis;
DELETE FROM siswa WHERE siswa.nis = in_nis;
DELETE FROM prakerin WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_dashboard_admin` ()  NO SQL
BEGIN
SELECT COUNT(industri.id_industri) AS jumlah_industri FROM industri;
SELECT COUNT(siswa.nis) AS jumlah_siswa_konfirmasi FROM siswa WHERE siswa.status = 1;
SELECT COUNT(siswa.nis) AS jumlah_siswa_belum_konfirmasi FROM siswa WHERE siswa.status = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_industri` ()  NO SQL
BEGIN
select industri.id_industri,industri.industri, jurusan.jurusan,COUNT(prakerin.nis) AS siswa_mendaftar
from industri
INNER JOIN jurusan
ON industri.id_jurusan = jurusan.id_jurusan
LEFT JOIN prakerin
ON industri.id_industri = prakerin.id_industri
GROUP BY industri.id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_industri_jurusan` (IN `in_id_jurusan` INT)  NO SQL
BEGIN
SELECT * FROM industri WHERE industri.id_jurusan = in_id_jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_jurusan` ()  NO SQL
BEGIN

select * FROM jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_pengurus` ()  NO SQL
BEGIN
SELECT pengurus.nip, pengurus.nama, pengurus.status,
ifnull(jurusan.jurusan,'-') AS jurusan
FROM pengurus
LEFT JOIN jurusan
ON pengurus.id_jurusan = jurusan.id_jurusan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_admin` ()  NO SQL
BEGIN
SELECT siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) AS nama, jurusan.jurusan, siswa.kelamin, siswa.alamat, siswa.tempat_lahir,siswa.tanggal_lahir, siswa.tahun_ajaran,  ifnull(tanggal.tanggal_deadline,'kosong') AS tanggal_deadline, siswa.nama_depan, siswa.nama_belakang
FROM siswa
INNER JOIN
jurusan
ON siswa.id_jurusan = jurusan.id_jurusan
LEFT JOIN
tanggal
ON tanggal.nis = siswa.nis
GROUP BY siswa.nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_prakerin` ()  NO SQL
BEGIN
select siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, prakerin.keterangan,ifnull(industri.industri,'Lainnya') AS industri, prakerin.is_validasi as validasi,prakerin.is_aktif as aktif, wali.nama AS nama_wali, wali.no_telp, wali.status, siswa.kelamin, DATE_FORMAT(tanggal.tanggal_deadline, '%Y-%m-%d') AS tanggal_deadline, DATE_FORMAT(tanggal.tanggal_aktif, '%Y-%m-%d') AS tanggal_aktif,
DATE_FORMAT(tanggal.tanggal_pendaftaran, '%Y-%m-%d') AS tanggal_pendaftaran, 
ifnull(DATE_FORMAT(tanggal.tanggal_selesai, '%Y-%m-%d'),'-') AS tanggal_selesai
FROM prakerin
INNER JOIN siswa
ON siswa.nis = prakerin.nis
INNER JOIN jurusan
ON jurusan.id_jurusan = prakerin.id_jurusan
LEFT JOIN industri
ON prakerin.id_industri = industri.id_industri
INNER JOIN wali
ON wali.nis = prakerin.nis
INNER JOIN tanggal
ON prakerin.nis = tanggal.nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jurusan` (IN `in_id` INT)  NO SQL
BEGIN
SELECT jurusan FROM jurusan WHERE jurusan.id_jurusan = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_industri` (IN `in_id_industri` INT)  NO SQL
BEGIN
DELETE FROM industri WHERE industri.id_industri = in_id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_pengurus` (IN `in_nip` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM pengurus WHERE pengurus.nip = in_nip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM tanggal WHERE tanggal.nis = in_nis;
DELETE FROM siswa WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `konfirmasi_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE prakerin SET prakerin.is_validasi = 1 WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `penjajakan_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE prakerin SET prakerin.is_aktif = 0 WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `print_penjajakan` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
SELECT siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) AS nama_lengkap, jurusan.jurusan, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.alamat AS domisili, siswa.tahun_ajaran
FROM siswa
INNER JOIN jurusan
ON siswa.id_jurusan = jurusan.id_jurusan
WHERE siswa.nis = in_nis;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `set_tgl_deadline` (IN `in_tgl_deadline` DATE, IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE tanggal SET tanggal.tanggal_deadline = in_tgl_deadline WHERE tanggal.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `set_tgl_selesai` (IN `in_tgl_selesai` DATE, IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
UPDATE tanggal SET tanggal.tanggal_selesai = in_tgl_selesai WHERE tanggal.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_prakerin` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
select siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, prakerin.keterangan,ifnull(industri.industri,'Lainnya') AS industri, prakerin.is_validasi as validasi,prakerin.is_aktif as aktif, wali.nama AS nama_wali, wali.no_telp, wali.status, siswa.kelamin, siswa.alamat as domisili
FROM prakerin
INNER JOIN siswa
ON siswa.nis = prakerin.nis
INNER JOIN jurusan
ON jurusan.id_jurusan = prakerin.id_jurusan
LEFT JOIN industri
ON prakerin.id_industri = industri.id_industri
INNER JOIN wali
ON wali.nis = prakerin.nis
WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_data_prakerin` (IN `in_nis` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_keterangan` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(50), IN `in_status` VARCHAR(50), IN `in_id_industri` INT)  NO SQL
BEGIN
INSERT INTO prakerin (nis,id_industri,id_jurusan,keterangan) VALUES (in_nis,in_id_industri,in_id_jurusan,in_keterangan);
INSERT INTO wali(nis,nama,no_telp,status) 
VALUES(in_nis,in_nama,in_telp,in_status);
UPDATE tanggal SET tanggal.tanggal_pendaftaran = CURRENT_DATE WHERE tanggal.nis = in_nis;
UPDATE prakerin SET prakerin.is_aktif = NULL WHERE prakerin.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_industri` (IN `in_id_jurusan` INT(10), IN `in_industri` VARCHAR(50))  NO SQL
BEGIN

INSERT INTO industri(id_jurusan,industri) VALUES (in_id_jurusan,in_industri);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_pengurus` (IN `in_nip` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_status` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO pengurus(nip,nama,id_jurusan,status) VALUES (in_nip, in_nama, in_id_jurusan, in_status);
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
 INSERT INTO tanggal(tanggal.nis,tanggal.tanggal_deadline) VALUES (in_nis,NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_industri` (IN `in_id_industri` INT, IN `in_industri` VARCHAR(10), IN `in_jumlah` INT)  NO SQL
BEGIN
UPDATE industri SET industri.industri = in_industri, industri.jumlah_siswa = in_jumlah WHERE industri.id_industri = in_id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_pengurus` (IN `in_nip` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_status` VARCHAR(50))  NO SQL
BEGIN
UPDATE pengurus SET pengurus.nama = in_nama, pengurus.status = in_status WHERE pengurus.nip = in_nip;
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
(5, 1, 'Telkom', '');

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
  `is_validasi` tinyint(1) NOT NULL,
  `is_aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prakerin`
--

INSERT INTO `prakerin` (`nis`, `id_industri`, `id_jurusan`, `keterangan`, `alamat_industri`, `is_validasi`, `is_aktif`) VALUES
('123', 5, 1, 'Industri MOU', '', 1, 1),
('321', NULL, 2, 'Kiloan45', '', 1, 1);

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
('123', 1, 'Fahmi', 'Aquinas', '202cb962ac59075b964b07152d234b70', 1, '', 'Malang', 'Jombang', '1996-09-06', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `nis` varchar(50) NOT NULL,
  `tanggal_deadline` date DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `tanggal_aktif` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`nis`, `tanggal_deadline`, `tanggal_pendaftaran`, `tanggal_aktif`, `tanggal_selesai`) VALUES
('123', '2019-04-17', '2019-04-09', '2019-04-09', '2019-04-11');

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
('123', 'Dewi Sri', '081330499953', 'Ibu'),
('321', 'Dewi Sri', '098731232131', 'Ayah');

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
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`nis`);

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
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `prakerin_ibfk_3` FOREIGN KEY (`id_industri`) REFERENCES `industri` (`id_industri`),
  ADD CONSTRAINT `prakerin_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_id_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD CONSTRAINT `nis_waktu` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `prakerin` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
