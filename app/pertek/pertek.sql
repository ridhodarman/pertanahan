-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertek`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `waktu_entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_berkas` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_format` int(11) DEFAULT NULL,
  `nama_pemohon` varchar(200) DEFAULT NULL,
  `jenis_pertek` varchar(200) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `bertindak_atas_nama` varchar(200) DEFAULT NULL,
  `luas` float DEFAULT NULL,
  `alamat_lokasi` varchar(250) DEFAULT NULL,
  `desa_nagari` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(200) DEFAULT NULL,
  `nib` varchar(20) DEFAULT NULL,
  `kbli` varchar(250) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `kwtansi_di_206` varchar(15) DEFAULT NULL,
  `tanggal_rapat_persiapan` date DEFAULT NULL,
  `jam_rapat_persiapan` varchar(10) DEFAULT NULL,
  `no_stpl` varchar(100) DEFAULT NULL,
  `tanggal_stpl` date DEFAULT NULL,
  `tanggal_peninjauan` date DEFAULT NULL,
  `sampai_peninjauan` date DEFAULT NULL,
  `no_ba_lapang` varchar(100) DEFAULT NULL,
  `tanggal_ba_lapang` date DEFAULT NULL,
  `koordinat_lokasi` text DEFAULT NULL,
  `kawasan_rtrw` text DEFAULT NULL,
  `penggunaan_tanah` varchar(100) DEFAULT NULL,
  `utara` varchar(100) DEFAULT NULL,
  `barat` varchar(100) DEFAULT NULL,
  `timur` varchar(100) DEFAULT NULL,
  `selatan` varchar(100) DEFAULT NULL,
  `lereng` varchar(100) DEFAULT NULL,
  `tekstur` varchar(100) DEFAULT NULL,
  `kedalaman_efektif` varchar(100) DEFAULT NULL,
  `drainase` varchar(100) DEFAULT NULL,
  `erosi` varchar(100) DEFAULT NULL,
  `faktor_pembatas` varchar(100) DEFAULT NULL,
  `ketinggian` varchar(100) DEFAULT NULL,
  `mata_air` varchar(100) DEFAULT NULL,
  `keberadaan_tanah_timbul` varchar(100) DEFAULT NULL,
  `pancang_diatas_air` varchar(100) DEFAULT NULL,
  `terletak_dipulau_kecil` varchar(100) DEFAULT NULL,
  `nama_pulau` varchar(100) DEFAULT NULL,
  `luas_pulau` varchar(100) DEFAULT NULL,
  `kekerasan_tanah_timbul` varchar(100) DEFAULT NULL,
  `intrusi_air_laut` varchar(100) DEFAULT NULL,
  `jenis_tanah_timbul` varchar(100) DEFAULT NULL,
  `pola_pasang_surut` varchar(100) DEFAULT NULL,
  `arus_gel_laut` varchar(100) DEFAULT NULL,
  `keberadaan_mangrove_dll` varchar(100) DEFAULT NULL,
  `kestabilan_tanah_timbul` text DEFAULT NULL,
  `jumlah_penduduk` varchar(20) DEFAULT NULL,
  `kepadatan_penduduk` varchar(20) DEFAULT NULL,
  `rerata_kepemilikan_tanah` varchar(20) DEFAULT NULL,
  `kepadatan_agraris` varchar(100) DEFAULT NULL,
  `mayoritas_mata_pencaharian` varchar(100) DEFAULT NULL,
  `jaringan_jalan` varchar(20) DEFAULT NULL,
  `jaringan_listrik` varchar(20) DEFAULT NULL,
  `air_minum` varchar(20) DEFAULT NULL,
  `saluran_drainase` varchar(20) DEFAULT NULL,
  `pipa_minyak` varchar(20) DEFAULT NULL,
  `gas` varchar(20) DEFAULT NULL,
  `longsor` varchar(20) DEFAULT NULL,
  `banjir_rob` varchar(20) DEFAULT NULL,
  `banjir` varchar(20) DEFAULT NULL,
  `bencana_lainnya` text DEFAULT NULL,
  `keterangan_lain_lokasi` text DEFAULT NULL,
  `penggunaan_tanah_sekitar` varchar(250) DEFAULT NULL,
  `penguasaan_tanah_sekitar` text DEFAULT NULL,
  `jarak_jalan_penghubung` varchar(50) DEFAULT NULL,
  `jarak_jalan_arteri` varchar(50) DEFAULT NULL,
  `infrastruktur_berkaitan` text DEFAULT NULL,
  `jaringan_lainnya` text DEFAULT NULL,
  `keterangan_lain_sekitar` text DEFAULT NULL,
  `rencana_penggunaan_tanah` varchar(250) DEFAULT NULL,
  `no_st_pengolahan_data` varchar(50) DEFAULT NULL,
  `tanggal_st_pengolahan_data` date DEFAULT NULL,
  `ba_pengolahan_data` varchar(50) DEFAULT NULL,
  `tanggal_ba_pengolahan_data` date DEFAULT NULL,
  `penguasaan_tanah` text DEFAULT NULL,
  `indikasi_skp` varchar(250) DEFAULT NULL,
  `keserasian` varchar(250) DEFAULT NULL,
  `pencemaran_air_udara` varchar(250) DEFAULT NULL,
  `kebisingan` varchar(250) DEFAULT NULL,
  `kemacetan_lalin` varchar(250) DEFAULT NULL,
  `keamanan_tertib` varchar(250) DEFAULT NULL,
  `dampak_lainnya` varchar(250) DEFAULT NULL,
  `luas_sesuai` varchar(50) DEFAULT NULL,
  `uraian_sesuai` text DEFAULT NULL,
  `luas_bersyarat` varchar(50) DEFAULT NULL,
  `alasan_bersyarat` text DEFAULT NULL,
  `luas_tidak_sesuai` varchar(50) DEFAULT NULL,
  `alasan_tidak_sesuai` text DEFAULT NULL,
  `kesesuaian_karakteristik_tanah` text DEFAULT NULL,
  `no_ba_rapat_pembahasan` varchar(100) DEFAULT NULL,
  `tanggal_rapat_pembahasan` date DEFAULT NULL,
  `no_risalah` varchar(50) DEFAULT NULL,
  `tanggal_risalah` date DEFAULT NULL,
  `no_surat_pertek` varchar(50) DEFAULT NULL,
  `tanggal_surat_pertek` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `waktu_entri`, `no_berkas`, `tahun`, `id_format`, `nama_pemohon`, `jenis_pertek`, `nik`, `alamat`, `bertindak_atas_nama`, `luas`, `alamat_lokasi`, `desa_nagari`, `kecamatan`, `nib`, `kbli`, `tanggal_permohonan`, `kwtansi_di_206`, `tanggal_rapat_persiapan`, `jam_rapat_persiapan`, `no_stpl`, `tanggal_stpl`, `tanggal_peninjauan`, `sampai_peninjauan`, `no_ba_lapang`, `tanggal_ba_lapang`, `koordinat_lokasi`, `kawasan_rtrw`, `penggunaan_tanah`, `utara`, `barat`, `timur`, `selatan`, `lereng`, `tekstur`, `kedalaman_efektif`, `drainase`, `erosi`, `faktor_pembatas`, `ketinggian`, `mata_air`, `keberadaan_tanah_timbul`, `pancang_diatas_air`, `terletak_dipulau_kecil`, `nama_pulau`, `luas_pulau`, `kekerasan_tanah_timbul`, `intrusi_air_laut`, `jenis_tanah_timbul`, `pola_pasang_surut`, `arus_gel_laut`, `keberadaan_mangrove_dll`, `kestabilan_tanah_timbul`, `jumlah_penduduk`, `kepadatan_penduduk`, `rerata_kepemilikan_tanah`, `kepadatan_agraris`, `mayoritas_mata_pencaharian`, `jaringan_jalan`, `jaringan_listrik`, `air_minum`, `saluran_drainase`, `pipa_minyak`, `gas`, `longsor`, `banjir_rob`, `banjir`, `bencana_lainnya`, `keterangan_lain_lokasi`, `penggunaan_tanah_sekitar`, `penguasaan_tanah_sekitar`, `jarak_jalan_penghubung`, `jarak_jalan_arteri`, `infrastruktur_berkaitan`, `jaringan_lainnya`, `keterangan_lain_sekitar`, `rencana_penggunaan_tanah`, `no_st_pengolahan_data`, `tanggal_st_pengolahan_data`, `ba_pengolahan_data`, `tanggal_ba_pengolahan_data`, `penguasaan_tanah`, `indikasi_skp`, `keserasian`, `pencemaran_air_udara`, `kebisingan`, `kemacetan_lalin`, `keamanan_tertib`, `dampak_lainnya`, `luas_sesuai`, `uraian_sesuai`, `luas_bersyarat`, `alasan_bersyarat`, `luas_tidak_sesuai`, `alasan_tidak_sesuai`, `kesesuaian_karakteristik_tanah`, `no_ba_rapat_pembahasan`, `tanggal_rapat_pembahasan`, `no_risalah`, `tanggal_risalah`, `no_surat_pertek`, `tanggal_surat_pertek`) VALUES
(31, '2023-12-09 01:48:45', 1, 2, NULL, 'fulan', 'usaha', '3', '4', '-', NULL, NULL, '5', '6', NULL, NULL, NULL, NULL, '0000-00-00', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2023-12-09 15:05:45', 1, 2, NULL, 'fulan', 'kkpr', '3', '4', '-', 100, '', '5', '6', '08123456', '12345', '2023-12-09', NULL, '2023-12-09', '10', '2', '2023-12-08', '2023-12-08', NULL, '3', '0000-00-00', '100, -0                                    ', 'permukiman                                    ', 'rumah', 'hutan', 'rumah', 'kebun', 'sawah', '0-3%', 'Sedang', '>90', 'Tidak tergenang', 'Tidak ada erosi', '-', '150', 'Tidak Ada', 'Tidak Ada', '-', 'Tidak', '-', '-', '-', '-', '-', '-', '-', '-', '', '123 kk', '1000', '12', '1000', 'petani', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '-', '-', '-', '-', '                    -                                                      ', '', 'tma                  ', '500', '200', '                    -                                                      ', '                    -                                                      ', '                    -                                                      ', 'rumah', '', '0000-00-00', NULL, NULL, 'hm', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '', '0000-00-00'),
(33, '2023-12-09 03:33:59', 1234, 2023, NULL, 'fulan', 'usaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2023-12-09 03:42:02', 1234, 2023, NULL, 'fulan', 'usaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2023-12-09 03:44:24', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2023-12-09 03:44:52', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2023-12-09 03:45:04', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2023-12-09 03:45:32', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2023-12-10 13:52:08', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', 100, 'jorang ', 'sungai tenang', 'banuhampa', '213213', '123123', '2023-12-08', NULL, '2023-12-10', '10:00', '2/ST/2023', '2023-12-05', '2023-12-10', '2023-12-11', '123123', '2023-12-04', '-                                                                                                                                                                  ', '-                                                                                                                                                                  ', '', 'asd', 'ads', 'asd', 'asd', '', 'Sedang', '', 'Tidak tergenang', 'Tidak ada erosi', '-', '', 'Tidak Ada', 'Tidak Ada', '-', 'Tidak', '-', '-', '-', '-', '-', '-', '-', '-', '', '3123', '3123', '123', '1231', 'petani', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '-', '-', '-', '-', '-                                                                                                                                                                  ', '-                                                                                                                                                                  ', 'adasdad', '120', '55', 'adasdasd', 'dsada                 ', 'asdads                  ', 'rumah', '3123', '2023-12-11', NULL, NULL, '', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(40, '2023-12-09 03:46:12', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2023-12-09 03:47:13', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2023-12-09 03:47:30', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2023-12-09 03:47:42', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2023-12-09 03:47:55', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2023-12-09 03:48:34', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2023-12-09 03:50:56', 1234, 2023, NULL, 'fulan', 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) Untuk Kegiatan Non Berusaha', '123456789', 'lubuk basung', 'pt sejahtera', NULL, NULL, 'sungai tenang', 'banuhampa', NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `id` int(11) NOT NULL,
  `no_sk` varchar(50) DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `file_sk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_format` (`id_format`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_format`) REFERENCES `format` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
