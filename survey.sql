-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jun 2021 pada 08.31
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritikan`
--

CREATE TABLE IF NOT EXISTS `kritikan` (
`id_kritikan` int(100) NOT NULL,
  `groupid` int(100) NOT NULL,
  `nama_kritikan` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `kritikan`
--

INSERT INTO `kritikan` (`id_kritikan`, `groupid`, `nama_kritikan`, `keterangan`) VALUES
(27, 12, 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', ''),
(28, 13, 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', ''),
(29, 13, 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', ''),
(30, 13, 'apakah masih terdapat prakter percaloan untuk mempercepat proses ?', ''),
(31, 14, 'bagaimana pendapat saudara tentang kecepatan waktu pelayanan ?', ''),
(32, 14, 'apakah proses penyelesaian pelayanan sudah tepat waktu sesuai dengan standart pelayanan yang dijanjikan?', ''),
(33, 14, 'Apakah jam buka pelayanan sudah tepat waktu sesuai standart pelayanan yang dijanjikan ?', ''),
(34, 15, 'Bagaimana pendapat saudara tentang kewajaran tarif dalam pelayanan ?', ''),
(35, 15, 'Apakah masih ada petugas meminta imbalan uang/ barang (Pungli) ?', ''),
(36, 16, 'Bagaimana pendapat saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standart pelayanan dengan hasil yang diberikan?', ''),
(37, 17, 'Bagaimana pendapat saudara tentang kompetensi/ kemampuan petugas dalam pelayanan ?', ''),
(38, 17, 'Petugas menjawab pertanyaan/ keluhan kita dengan baik, teliti, cepat dan tepat?', ''),
(39, 18, 'Bagaimana pendapat saudara tentang perilaku petugas dalam pelayanan ?', ''),
(40, 18, 'Petugas sopan dan ramah dalam menjawab pertanyaan?', ''),
(41, 19, 'Bagaimana pendapat saudara tentang kualitas sarana dan prasarana pelayanan ?', ''),
(42, 19, 'Ruang pelayanan bersih, rapi dan nyaman?', ''),
(43, 19, 'Kamar mandi/ toilet tersedia cukup bersih ?', ''),
(44, 19, 'Pelayanan tidak memerlukan antrian yang lama dan membosankan', ''),
(45, 12, 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan standart pelayanannya/ jenis pelayanannya ?', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
`id_poli` int(10) NOT NULL,
  `nama_poli` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `keterangan`) VALUES
(12, 'Loket', ''),
(13, 'Farmasi', ''),
(14, 'Unit Gawat Darurat', ''),
(15, 'Poned', ''),
(16, 'Poli Gizi', ''),
(17, 'Poli Gigi', ''),
(18, 'Laboratorium', ''),
(19, 'KIA/KB', ''),
(20, 'MTBS', ''),
(21, 'Poli Umum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
`id_survey` int(100) NOT NULL,
  `poli` varchar(225) NOT NULL,
  `kritikan` varchar(225) NOT NULL,
  `tgroup` varchar(255) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id_survey`, `poli`, `kritikan`, `tgroup`, `tanggal_input`) VALUES
(1, '', '', '', '2021-05-31 04:11:59'),
(2, 'Unit Farmasi', '', '', '2021-05-31 04:12:10'),
(3, 'Unit Farmasi', '', '', '2021-05-31 04:14:24'),
(4, '', '', '', '2021-05-31 04:14:34'),
(5, '', '', '', '2021-05-31 04:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanswer`
--

CREATE TABLE IF NOT EXISTS `tanswer` (
`id_tanswer` int(100) NOT NULL,
  `poli` varchar(255) NOT NULL,
  `kritikan` varchar(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `jawabanA` int(11) NOT NULL,
  `jawabanB` int(11) NOT NULL,
  `jawabanC` int(11) NOT NULL,
  `jawabanD` int(11) NOT NULL,
  `jawabanE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=568 ;

--
-- Dumping data untuk tabel `tanswer`
--

INSERT INTO `tanswer` (`id_tanswer`, `poli`, `kritikan`, `groupid`, `jawaban`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`) VALUES
(532, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Persyaratan Pelayanan', 'A', 1, 0, 0, 0, 0),
(533, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Persyaratan Pelayanan', 'B', 0, 1, 0, 0, 0),
(534, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Prosedur Pelayanan', 'C', 0, 0, 1, 0, 0),
(535, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Prosedur Pelayanan', 'B', 0, 1, 0, 0, 0),
(536, 'Loket', 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', 'Prosedur Pelayanan', 'D', 0, 0, 0, 1, 0),
(537, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Waktu Pelayanan', 'E', 0, 0, 0, 0, 1),
(538, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Waktu Pelayanan', 'D', 0, 0, 0, 1, 0),
(539, 'Loket', 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', 'Waktu Pelayanan', 'C', 0, 0, 1, 0, 0),
(540, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Biaya Atau Tarif', 'D', 0, 0, 0, 1, 0),
(541, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Biaya Atau Tarif', 'C', 0, 0, 1, 0, 0),
(542, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Produk atau Jasa Spesifikasi Jenis Layanan', 'C', 0, 0, 1, 0, 0),
(543, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Kompetensi Pelaksana', 'A', 1, 0, 0, 0, 0),
(544, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Kompetensi Pelaksana', 'E', 0, 0, 0, 0, 1),
(545, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Perilaku Pelaksana', 'E', 0, 0, 0, 0, 1),
(546, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Perilaku Pelaksana', 'C', 0, 0, 1, 0, 0),
(547, 'Loket', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Sarana dan Prasarana', 'D', 0, 0, 0, 1, 0),
(548, 'Loket', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Sarana dan Prasarana', 'D', 0, 0, 0, 1, 0),
(549, 'Loket', 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', 'Sarana dan Prasarana', 'D', 0, 0, 0, 1, 0),
(550, 'Loket', 'apakah masih terdapat prakter percaloan untuk mempercepat proses ?', 'Sarana dan Prasarana', 'C', 0, 0, 1, 0, 0),
(551, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Persyaratan Pelayanan', 'A', 1, 0, 0, 0, 0),
(552, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Persyaratan Pelayanan', 'B', 0, 1, 0, 0, 0),
(553, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Prosedur Pelayanan', 'C', 0, 0, 1, 0, 0),
(554, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Prosedur Pelayanan', 'D', 0, 0, 0, 1, 0),
(555, 'Laboratorium', 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', 'Prosedur Pelayanan', 'E', 0, 0, 0, 0, 1),
(556, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Waktu Pelayanan', 'D', 0, 0, 0, 1, 0),
(557, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Waktu Pelayanan', 'C', 0, 0, 1, 0, 0),
(558, 'Laboratorium', 'apakah petugas menawarkan jasa layanan diluar prosedur untuk mempercepat proses ?', 'Waktu Pelayanan', 'C', 0, 0, 1, 0, 0),
(559, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Biaya Atau Tarif', 'C', 0, 0, 1, 0, 0),
(560, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Biaya Atau Tarif', 'C', 0, 0, 1, 0, 0),
(561, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Produk atau Jasa Spesifikasi Jenis Layanan', 'C', 0, 0, 1, 0, 0),
(562, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Kompetensi Pelaksana', 'C', 0, 0, 1, 0, 0),
(563, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Kompetensi Pelaksana', 'C', 0, 0, 1, 0, 0),
(564, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Perilaku Pelaksana', 'C', 0, 0, 1, 0, 0),
(565, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Perilaku Pelaksana', 'D', 0, 0, 0, 1, 0),
(566, 'Laboratorium', 'Apakah persyaratan pelayanan tertulis dengan jelas, detail dan lengkap (semua syarat sudah tertulis jelas, tidak ada syarat yang belum terinformasikan)', 'Sarana dan Prasarana', 'D', 0, 0, 0, 1, 0),
(567, 'Laboratorium', 'Bagaimana pendapat saudara tentang kemudahan prosedur pelayanan di unit ini ?', 'Sarana dan Prasarana', 'C', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tgroup`
--

CREATE TABLE IF NOT EXISTS `tgroup` (
`groupid` int(100) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `tgroup`
--

INSERT INTO `tgroup` (`groupid`, `groupname`, `keterangan`) VALUES
(12, 'Persyaratan Pelayanan', ''),
(13, 'Prosedur Pelayanan', ''),
(14, 'Waktu Pelayanan', ''),
(15, 'Biaya Atau Tarif', ''),
(16, 'Produk atau Jasa Spesifikasi Jenis Layanan', ''),
(17, 'Kompetensi Pelaksana', ''),
(18, 'Perilaku Pelaksana', ''),
(19, 'Sarana dan Prasarana', ''),
(20, 'Penanganan Pengaduan, Saran dan Masukan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=113 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `email`, `no_telpon`, `alamat`, `aktif`) VALUES
(110, 'dani69', '1059d7009b2a74a388341d6f0e1e3339', 'dani ardyan syah putra', 'laki-laki', 'daniardyan98@gmail.com', '085732828098', 'ds.kacangan', 'Y'),
(112, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'tugas akhir', 'laki laki', 'daniardyan40@gmail.com', '085546367877', 'ds. kacangan kec. berbek kab. nganjuk', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_aktivitas`
--

CREATE TABLE IF NOT EXISTS `users_aktivitas` (
`id_users_aktivitas` int(10) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `status` enum('siswa','guru','superuser') NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data untuk tabel `users_aktivitas`
--

INSERT INTO `users_aktivitas` (`id_users_aktivitas`, `identitas`, `ip_address`, `browser`, `os`, `status`, `jam`, `tanggal`) VALUES
(47, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '16:45:09', '2021-05-01'),
(46, 'dani69', '::1', 'Chrome 89.0.4389.90', 'Windows 7', '', '22:34:48', '2021-04-14'),
(45, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '21:16:40', '2021-04-05'),
(44, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '21:16:29', '2021-04-05'),
(43, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '21:15:39', '2021-04-05'),
(42, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '21:15:28', '2021-04-05'),
(41, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '21:15:18', '2021-04-05'),
(40, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '20:05:08', '2021-04-05'),
(39, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '20:55:20', '2021-04-03'),
(38, 'dani69', '::1', 'Chrome 89.0.4389.114', 'Windows 7', '', '20:41:25', '2021-04-03'),
(48, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '16:45:18', '2021-05-01'),
(49, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '13:38:38', '2021-05-20'),
(50, 'tugasakhir', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '14:25:00', '2021-05-21'),
(51, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '19:17:45', '2021-05-23'),
(52, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '10:18:04', '2021-05-24'),
(53, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '12:59:09', '2021-05-28'),
(54, 'dani69', '::1', 'Chrome 90.0.4430.93', 'Windows 7', '', '23:07:20', '2021-05-29'),
(55, 'dani69', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '10:37:07', '2021-05-31'),
(56, 'dani69', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '13:44:40', '2021-05-31'),
(57, 'dani69', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '16:27:56', '2021-05-31'),
(58, 'dani69', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '11:47:51', '2021-06-07'),
(59, 'dani69', '::1', 'Chrome 91.0.4472.77', 'Windows 7', '', '13:17:31', '2021-06-07'),
(60, 'dani69', '::1', 'Chrome 91.0.4472.77', 'Windows 7', '', '13:17:43', '2021-06-07'),
(61, 'dani69', '::1', 'Chrome 91.0.4472.77', 'Windows 7', '', '13:17:59', '2021-06-07'),
(62, 'dani69', '::1', 'Chrome 91.0.4472.77', 'Windows 7', '', '13:18:53', '2021-06-07'),
(63, 'dani69', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '13:19:12', '2021-06-07'),
(64, 'admin', '::1', 'Chrome 91.0.4472.77', 'Windows 7', '', '13:19:50', '2021-06-07'),
(65, 'admin', '::1', 'Chrome 90.0.4430.212', 'Windows 7', '', '13:20:26', '2021-06-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kritikan`
--
ALTER TABLE `kritikan`
 ADD PRIMARY KEY (`id_kritikan`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
 ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
 ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tanswer`
--
ALTER TABLE `tanswer`
 ADD PRIMARY KEY (`id_tanswer`);

--
-- Indexes for table `tgroup`
--
ALTER TABLE `tgroup`
 ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_aktivitas`
--
ALTER TABLE `users_aktivitas`
 ADD PRIMARY KEY (`id_users_aktivitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritikan`
--
ALTER TABLE `kritikan`
MODIFY `id_kritikan` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
MODIFY `id_poli` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
MODIFY `id_survey` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tanswer`
--
ALTER TABLE `tanswer`
MODIFY `id_tanswer` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=568;
--
-- AUTO_INCREMENT for table `tgroup`
--
ALTER TABLE `tgroup`
MODIFY `groupid` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `users_aktivitas`
--
ALTER TABLE `users_aktivitas`
MODIFY `id_users_aktivitas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
