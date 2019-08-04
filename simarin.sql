-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2019 at 04:55 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `batal_siswa` (IN `in_nis` VARCHAR(50), IN `in_keterangan` VARCHAR(255))  NO SQL
BEGIN
DELETE FROM wali WHERE wali.nis = in_nis;
DELETE FROM prakerin WHERE prakerin.nis = in_nis;
DELETE FROM tanggal WHERE tanggal.nis = in_nis;
INSERT INTO tanggal(tanggal.nis) VALUES (in_nis);
INSERT INTO batal_siswa(batal_siswa.nis,batal_siswa.keterangan) VALUES
(in_nis,in_keterangan);
UPDATE siswa SET siswa.no_telp = null WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_dashboard_admin` ()  NO SQL
BEGIN
SELECT COUNT(industri.id_industri) AS jumlah_industri FROM industri;
SELECT COUNT(siswa.nis) AS jumlah_siswa_konfirmasi FROM siswa WHERE siswa.status = 1;
SELECT COUNT(siswa.nis) AS jumlah_siswa_belum_konfirmasi FROM siswa WHERE siswa.status = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_industri` ()  NO SQL
BEGIN
select industri.id_industri,industri.industri, ifnull(industri.no_telp,'-') AS no_telp, jurusan.jurusan,COUNT(prakerin.nis) AS siswa_mendaftar,industri.alamat
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_admin` ()  NO SQL
BEGIN
SELECT siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) AS nama, jurusan.jurusan, siswa.jenis_kelamin AS kelamin, siswa.alamat, siswa.tempat_lahir,siswa.tanggal_lahir, siswa.tahun_ajaran,  ifnull(tanggal.tanggal_deadline,'kosong') AS tanggal_deadline, siswa.nama_depan, siswa.nama_belakang
FROM siswa
INNER JOIN
jurusan
ON siswa.id_jurusan = jurusan.id_jurusan
LEFT JOIN
tanggal
ON tanggal.nis = siswa.nis
WHERE tanggal.tanggal_selesai IS null
ORDER BY siswa.nis + 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_batal_prakerin` ()  NO SQL
BEGIN
select batal_siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, siswa.jenis_kelamin as kelamin, batal_siswa.keterangan
FROM batal_siswa
INNER JOIN siswa
ON batal_siswa.nis = siswa.nis
INNER JOIN jurusan
ON jurusan.id_jurusan = siswa.id_jurusan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data_siswa_prakerin` ()  NO SQL
BEGIN
select siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, prakerin.keterangan,ifnull(industri.industri,'Lainnya') AS industri, prakerin.is_validasi as validasi,prakerin.is_aktif as aktif, wali.nama AS nama_wali, siswa.no_telp, wali.status, siswa.jenis_kelamin as kelamin, DATE_FORMAT(tanggal.tanggal_deadline, '%d-%m-%Y') AS tanggal_deadline, ifnull(DATE_FORMAT(tanggal.tanggal_aktif, '%d-%m-%Y'),'-') AS tanggal_aktif,
DATE_FORMAT(tanggal.tanggal_pendaftaran, '%d-%m-%Y') AS tanggal_pendaftaran,
ifnull(DATE_FORMAT(tanggal.tanggal_selesai, '%d-%m-%Y'),'-') AS tanggal_selesai, prakerin.alamat_industri
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
ON prakerin.nis = tanggal.nis
WHERE tanggal.tanggal_pendaftaran IS NOT null;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jurusan` (IN `in_id` INT)  NO SQL
BEGIN
SELECT jurusan FROM jurusan WHERE jurusan.id_jurusan = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_industri` (IN `in_id_industri` INT)  NO SQL
BEGIN
DELETE FROM industri WHERE industri.id_industri = in_id_industri;
ALTER TABLE industri AUTO_INCREMENT = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_siswa` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DECLARE cek_1 varchar(10);
DECLARE cek_2 varchar(10);
SET cek_1 = (SELECT CASE WHEN tanggal.nis IS NULL THEN 1 ELSE 0 END AS kosong FROM siswa INNER JOIN tanggal ON siswa.nis = tanggal.nis WHERE siswa.nis = in_nis);
SET cek_2 = (SELECT CASE WHEN prakerin.nis IS NULL THEN 1 ELSE 0 END AS kosong FROM siswa INNER JOIN prakerin ON siswa.nis = prakerin.nis WHERE siswa.nis = in_nis);
IF (cek_1 = 0)
THEN
DELETE FROM tanggal WHERE tanggal.nis = in_nis;
DELETE FROM batal_siswa WHERE batal_siswa.nis = in_nis;
DELETE FROM siswa WHERE siswa.nis = in_nis;
ELSEIF(cek_2 = 0)
THEN
DELETE FROM wali WHERE wali.nis = in_nis;
DELETE FROM prakerin WHERE prakerin.nis = in_nis;
DELETE FROM tanggal WHERE tanggal.nis = in_nis;
DELETE FROM batal_siswa WHERE batal_siswa.nis = in_nis;
DELETE FROM siswa WHERE siswa.nis = in_nis;
ELSE
DELETE FROM batal_siswa WHERE batal_siswa.nis = in_nis;
DELETE FROM siswa WHERE siswa.nis = in_nis;
END IF;
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
select siswa.nis, CONCAT(siswa.nama_depan," ",siswa.nama_belakang) as nama, jurusan.jurusan, siswa.tahun_ajaran, prakerin.keterangan,ifnull(industri.industri,'Lainnya') AS industri, prakerin.is_validasi as validasi,prakerin.is_aktif as aktif, wali.nama AS nama_wali, siswa.no_telp, wali.status, siswa.jenis_kelamin as kelamin, siswa.alamat as domisili
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_data_prakerin` (IN `in_nis` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_keterangan` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(50), IN `in_status` VARCHAR(50), IN `in_id_industri` INT, IN `in_alamat` VARCHAR(50))  NO SQL
BEGIN
DECLARE alamat varchar(255);
INSERT INTO prakerin (nis,id_industri,id_jurusan,keterangan,prakerin.alamat_industri) VALUES (in_nis,in_id_industri,in_id_jurusan,in_keterangan,in_alamat);
INSERT INTO wali(nis,nama,status)
VALUES(in_nis,in_nama,in_status);
IF (in_keterangan = 'Industri MOU')
THEN
SET alamat = (SELECT industri.alamat FROM industri WHERE industri.id_industri = in_id_industri);
UPDATE prakerin SET prakerin.alamat_industri = alamat WHERE prakerin.nis = in_nis;
END IF;
UPDATE tanggal SET tanggal.tanggal_pendaftaran = CURRENT_DATE WHERE tanggal.nis = in_nis;
UPDATE prakerin SET prakerin.is_aktif = NULL WHERE prakerin.nis = in_nis;
UPDATE `siswa` SET `no_telp` = in_telp WHERE `siswa`.`nis` = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_industri` (IN `in_id_jurusan` INT(10), IN `in_industri` VARCHAR(255), IN `in_alamat` VARCHAR(255), IN `in_telp` VARCHAR(255))  NO SQL
BEGIN

IF  in_telp = '' THEN SET in_telp = null;
    END IF;

INSERT INTO industri(industri.id_jurusan,industri.industri,industri.alamat,industri.no_telp) VALUES (in_id_jurusan,in_industri,in_alamat, in_telp);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_siswa` (IN `in_nis` VARCHAR(50), IN `in_nama_depan` VARCHAR(50), IN `in_nama_belakang` VARCHAR(50), IN `in_id_jurusan` INT, IN `in_tempat_lahir` VARCHAR(10), IN `in_tanggal_lahir` DATE, IN `in_alamat` VARCHAR(100), IN `in_kelamin` BOOLEAN, IN `in_tahun_ajaran` INT)  NO SQL
BEGIN
INSERT INTO siswa
(siswa.nis,siswa.id_jurusan,siswa.nama_depan,
 siswa.nama_belakang, siswa.password, siswa.jenis_kelamin,
 siswa.alamat, siswa.tempat_lahir, siswa.tanggal_lahir,
 siswa.tahun_ajaran)
 VALUES
(in_nis,in_id_jurusan,in_nama_depan,
 in_nama_belakang, md5(in_nis), in_kelamin,
in_alamat, in_tempat_lahir, in_tanggal_lahir,
 in_tahun_ajaran);
 INSERT INTO tanggal(tanggal.nis) VALUES (in_nis);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tanggal_over_deadline` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DECLARE cek varchar(20);
DECLARE pesan varchar(10);

SET cek = (SELECT DATEDIFF(tanggal.tanggal_deadline+1, CURRENT_DATE) AS tanggal_batas FROM tanggal WHERE tanggal.nis = in_nis);

IF (cek > 31) THEN
SET pesan = 'over';
ELSEIF (cek < 0) THEN
SET pesan = 'salah';
ELSE
SET pesan = 'ok';
END IF;
SELECT pesan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tanggal_over_lahir` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DECLARE cek varchar(20);
DECLARE pesan varchar(10);

SET cek = (SELECT DATEDIFF(siswa.tanggal_lahir, CURRENT_DATE) AS tanggal_batas FROM siswa WHERE siswa.nis = in_nis);

IF (cek > -4569 AND cek < 0) THEN
SET pesan = 'muda';
ELSEIF (cek < -6395) THEN
SET pesan = 'tua';
ELSEIF (cek > 0) THEN
SET pesan = 'over';
ELSE
SET pesan = 'ok';
END IF;
SELECT pesan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tanggal_over_selesai` (IN `in_nis` VARCHAR(50))  NO SQL
BEGIN
DECLARE cek varchar(20);
DECLARE pesan varchar(10);

SET cek = (SELECT DATEDIFF(tanggal.tanggal_selesai+1, CURRENT_DATE) AS tanggal_batas FROM tanggal WHERE tanggal.nis = in_nis);

IF (cek > 91) THEN
SET pesan = 'over';
ELSEIF (cek < 0) THEN
SET pesan = 'salah';
ELSE
SET pesan = 'ok';
END IF;
SELECT pesan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_industri` (IN `in_id_industri` INT, IN `in_industri` VARCHAR(255), IN `in_alamat` VARCHAR(255), IN `in_telp` VARCHAR(255))  NO SQL
BEGIN
UPDATE industri SET industri.industri = in_industri, industri.alamat = in_alamat, industri.no_telp = in_telp WHERE industri.id_industri = in_id_industri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_data_siswa` (IN `in_nis` VARCHAR(50), IN `in_nama_depan` VARCHAR(50), IN `in_nama_belakang` VARCHAR(50), IN `in_tempat_lahir` VARCHAR(10), IN `in_tanggal_lahir` DATE, IN `in_kelamin` BOOLEAN, IN `in_alamat` VARCHAR(100), IN `in_tahun_ajaran` INT)  NO SQL
BEGIN
UPDATE siswa
SET siswa.nama_depan = in_nama_depan,
	siswa.nama_belakang = in_nama_belakang,
    siswa.tempat_lahir = in_tempat_lahir,
    siswa.tanggal_lahir = in_tanggal_lahir,
    siswa.jenis_kelamin = in_kelamin,
    siswa.alamat = in_alamat,
    siswa.tahun_ajaran = in_tahun_ajaran
    WHERE siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubah_password_admin` (IN `in_id` INT, IN `in_password` VARCHAR(50))  NO SQL
BEGIN
UPDATE admin SET admin.password = in_password WHERE admin.id_admin = in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_alamat_prakerin` (IN `in_nis` VARCHAR(50), IN `in_alamat` VARCHAR(50))  NO SQL
BEGIN
UPDATE prakerin SET prakerin.alamat_industri = in_alamat WHERE prakerin.nis = in_nis;
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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `batal_siswa`
--

CREATE TABLE `batal_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE `industri` (
  `id_industri` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `industri` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id_industri`, `id_jurusan`, `industri`, `alamat`, `no_telp`) VALUES
(1, 1, 'Pemerintah Kabupaten Malang', 'Jl. Merdeka Timur No. 03 Malang', '357649'),
(2, 1, 'UIN Maulana Malik Ibrahim', 'Jl. Gajayana No 50 Malang', '551354'),
(3, 1, 'Dinas Pendidikan dan Kebudayaan Kota Malang', 'Jl. Veteran No 19 Malang', '55133'),
(4, 1, 'Bedak Delapan Electronic, CV', 'Jl. Welirang No. 40 Malang', NULL),
(5, 1, 'School of Business Indo Cakti Malang', 'Jl. Besar Ijen 90-92 Malang', '362763'),
(6, 1, 'Raffa Computer Service and Retail', 'Jl. Gajayana No 576 Malang', '7720467'),
(7, 1, 'Berkah Sarana Utama (Edutech)', 'Jl. Perusahaan No. 4 Karangploso', NULL);

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
  `alamat_industri` varchar(255) DEFAULT NULL,
  `is_validasi` tinyint(1) NOT NULL DEFAULT '0',
  `is_aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prakerin`
--

INSERT INTO `prakerin` (`nis`, `id_industri`, `id_jurusan`, `keterangan`, `alamat_industri`, `is_validasi`, `is_aktif`) VALUES
('156150607111011', 4, 1, 'Industri MOU', 'Jl. Welirang No. 40 Malang', 1, 0);

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
  `jenis_kelamin` tinyint(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `no_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_jurusan`, `nama_depan`, `nama_belakang`, `password`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tahun_ajaran`, `no_telp`) VALUES
('156150601111010', 1, 'Abdul', 'Algoniu', '48768d0c2d8b7084f9366e50e75a53ad', 1, 'Malang', 'Banyuwangi', '2019-03-13', 2019, NULL),
('156150607111011', 1, 'Fahmi', 'Aquinas', 'fe02c86da4eeacb1eea7b0b7b3a9ea03', 1, 'Malang', 'Jombang', '1999-07-08', 2019, '082228687278');

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
('156150601111010', NULL, NULL, NULL, NULL),
('156150607111011', '2019-07-17', '2019-06-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`nis`, `nama`, `status`) VALUES
('156150607111011', 'Dewi Sri', 'Ibu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `batal_siswa`
--
ALTER TABLE `batal_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id_industri`),
  ADD UNIQUE KEY `no_telp` (`no_telp`),
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
  ADD UNIQUE KEY `no_telp` (`no_telp`),
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
-- AUTO_INCREMENT for table `batal_siswa`
--
ALTER TABLE `batal_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industri`
--
ALTER TABLE `industri`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `prakerin_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `prakerin_ibfk_5` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD CONSTRAINT `nis_waktu` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
