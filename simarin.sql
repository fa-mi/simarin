-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2019 at 11:18 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_konfirmasi` (IN `in_nis` INT)  NO SQL
BEGIN
UPDATE siswa SET siswa.status = 0 WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM wali WHERE wali.nis = in_nis;
DELETE FROM prakerin WHERE prakerin.nis = in_nis;
UPDATE siswa SET is_validasi = 0 WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_dashboard_admin` ()  NO SQL
BEGIN
SELECT COUNT(industri.id_industri) AS jumlah_industri FROM industri;
SELECT COUNT(siswa.nis) AS jumlah_siswa_konfirmasi FROM siswa WHERE siswa.status = 1;
SELECT COUNT(siswa.nis) AS jumlah_siswa_belum_konfirmasi FROM siswa WHERE siswa.status = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_industri_jurusan` ()  NO SQL
BEGIN
SELECT jurusan.jurusan, COUNT(industri.id_industri) as jumlah FROM jurusan LEFT JOIN industri
ON jurusan.id_jurusan = industri.id_jurusan
GROUP BY jurusan.jurusan ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_guru` (IN `in_nip` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
SELECT siswa.nis,CONCAT(siswa.nama_depan," ",siswa.nama_belakang) AS nama,jurusan.jurusan,industri.industri,siswa.is_validasi as validasi,siswa.is_aktif as aktif
FROM siswa
LEFT JOIN prakerin
ON siswa.nis = prakerin.nis
LEFT JOIN jurusan
ON jurusan.id_jurusan = prakerin.id_jurusan
LEFT JOIN industri
ON industri.id_industri = prakerin.id_industri
WHERE prakerin.nip = in_nip AND siswa.nama_depan LIKE in_nama AND siswa.nis LIKE in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_industri` (IN `in_id_industri` INT)  NO SQL
BEGIN
UPDATE siswa SET siswa.id_industri = null WHERE siswa.id_industri = id;
DELETE FROM industri WHERE industri.id_industri = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_industri_jurusan` (IN `in_id_jurusan` INT)  NO SQL
BEGIN
SELECT industri.id_industri,jurusan.jurusan,industri.industri
FROM industri
INNER JOIN jurusan
ON jurusan.id_jurusan = industri.id_jurusan
WHERE jurusan.id_jurusan = in_id_jurusan
GROUP BY industri.id_industri,industri.industri,jurusan.jurusan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_jurusan` ()  NO SQL
BEGIN

select * FROM jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_semua_industri` ()  NO SQL
BEGIN
SELECT industri.id_industri,jurusan.jurusan,industri.industri
FROM industri
INNER JOIN jurusan
ON jurusan.id_jurusan = industri.id_jurusan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_siswa_belum_konfirmasi` ()  NO SQL
BEGIN
SELECT siswa.nis,jurusan.jurusan,siswa.nama,siswa.email,siswa.kelas,industri.industri,siswa.is_validasi
FROM siswa
INNER JOIN jurusan
ON siswa.id_jurusan = jurusan.id_jurusan
INNER JOIN industri
ON siswa.id_industri = industri.id_industri
WHERE siswa.is_validasi = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_siswa_sudah_konfirmasi` ()  NO SQL
BEGIN
SELECT siswa.nis,jurusan.jurusan,siswa.nama,siswa.email,siswa.kelas,industri.industri,siswa.is_validasi
FROM siswa
INNER JOIN jurusan
ON siswa.id_jurusan = jurusan.id_jurusan
INNER JOIN industri
ON siswa.id_industri = industri.id_industri
WHERE siswa.is_validasi = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_data_prakerin` (IN `in_nis` VARCHAR(50), IN `in_nip` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_keterangan` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(50), IN `in_status` VARCHAR(50), IN `in_id_industri` INT)  NO SQL
BEGIN
INSERT INTO prakerin (nis,nip,id_industri,id_jurusan,keterangan) VALUES (in_nis,in_nip,in_id_industri,in_id_jurusan,in_keterangan);
INSERT INTO wali(nis,nama,no_telp,status) 
VALUES(in_nis,in_nama,in_telp,in_status);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_industri` (IN `in_id_jurusan` INT(10), IN `in_industri` VARCHAR(50), IN `in_jumlah` INT(10))  NO SQL
BEGIN

INSERT INTO industri(id_jurusan,industri,jumlah_siswa,status) VALUES (in_id_jurusan,in_industri,jumlah_siswa,'0');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tes` ()  NO SQL
BEGIN
UPDATE siswa SET siswa.status = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_password_admin` (IN `in_id` INT, IN `in_password` VARCHAR(50))  NO SQL
BEGIN
UPDATE admin SET admin.password = in_password WHERE admin.id_admin = in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_password_siswa` (IN `in_nis` VARCHAR(50), IN `in_password` VARCHAR(50))  NO SQL
BEGIN
UPDATE siswa SET siswa.password = in_password WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validasi_siswa` (IN `in_nis` INT)  NO SQL
BEGIN
UPDATE siswa SET siswa.is_validasi = 1 WHERE siswa.nis = in_nis;
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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `id_jurusan`, `nama`, `password`, `kelamin`, `status`) VALUES
('555', 6, 'Hadi', '76671d4b83f6e6f953ea2dfb75ded921', 1, 'Guru Pembimbing');

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE `industri` (
  `id_industri` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `industri` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id_industri`, `id_jurusan`, `industri`, `status`, `jumlah_siswa`) VALUES
(1, 6, 'Honda', 1, 5),
(2, 6, 'Yamaha', 1, 5),
(3, 7, 'Honda', 1, 3),
(4, 7, 'Yamaha', 1, 3);

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
  `nip` varchar(50) NOT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `waktu_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `is_aktif` tinyint(1) NOT NULL,
  `is_validasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_jurusan`, `nama_depan`, `nama_belakang`, `password`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `is_aktif`, `is_validasi`) VALUES
('123', 6, 'Fahmi', 'Aquinas', 'f11d50d63d3891a44c332e46d6d7d561', 1, 'jombang', '1996-09-06', 0, 0),
('321', 6, 'Wita', 'Saraswati', '9757bb3cf28a5797e08ff7247bcc5ff0', 0, 'malang', '1997-10-05', 0, 0);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jurusan` (`id_jurusan`);

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
  ADD KEY `nip` (`nip`),
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
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

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
  ADD CONSTRAINT `prakerin_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
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
