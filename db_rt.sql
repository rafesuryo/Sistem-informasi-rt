-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 09:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` varchar(15) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `judul`, `deskripsi`, `gambar`, `id_pengguna`, `kategori`, `jenis`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('INF2307002', 'Pelantikan Karang Taruna', 'Telah dilaksanakan pelantikan karang taruna di taman kolaborasi, pelantikan ini dihadiri oleh ketua rt, ketua rw, lmk, lurah, ketua karang kota jakarta timur dan dprd DKI Jakarta. Pelantikan ini dilaksanakan pada tanggal 9 april 2023', 'pelatihan.jpg', 'PGN04', 'Karang Taruna', 'Non-Donasi', '2023-07-19', '12:34:57', 'Aktif', ''),
('INF2307003', 'Acara 17 Agustus 2022', 'Acara 17 agusutus ini dilaksanakan di lapangan serba guna komplek kimia farma II duren sawit, jakarta timur. Acara ini dihadiri warga rt 09 komplek kimia farma II dan acara ini dilaksanakan pada tanggal 17 agustus 2022', 'fun futsal.jpg', 'PGN04', 'Karang Taruna', 'Donasi', '2023-07-19', '12:42:12', 'Aktif', ''),
('INF2307004', 'Festival Anak', 'Festival anak adalah acara lomba kesenian untuk anak tk yang berada di lingkungan komplek kimia farma II. Acara ini dilaksanakan pada tanggal 10 juni 2023 yang dilaksankan di lapangan serba guna komplek kimia farma II Duren Sawit, Jakarta Timur', 'festival anak.jpg', 'PGN04', 'Umum', 'Non-Donasi', '2023-07-19', '12:49:05', 'Aktif', ''),
('INF2307005', 'Kerja Bakti 2023', 'Kerja bakti ini dilaksanakan di lingkungan komplek kimia farma II dan dilaksanakan pada tanggal 5 maret 2023', 'kerja bakti.jpg', 'PGN04', 'Umum', 'Non-Donasi', '2023-07-19', '12:53:46', 'Aktif', ''),
('INF2307006', 'Senam Sehat', 'Senam sehat adalah acara olaharga bersama warga rt 09 yang dilaksanakan di lapangan serba guna komplek kimia farma II acara ini dilaksankan pada tanggal 28 oktober 2022', 'senam.jpg', 'PGN04', 'Umum', 'Non-Donasi', '2023-07-19', '12:57:44', 'Aktif', ''),
('INF2307007', 'Iuran Kebersihan', 'Iuran Kebersihan DIbayarkan Setiap Tanggal 4 perbulannya', 'ww.jpg', 'PGN04', 'Umum', 'Donasi', '2023-07-22', '16:44:50', 'Aktif', ''),
('INF2307008', 'Iuran Kemanan', 'Pembayaran Iuran Dilakukan Pada Tanggal 5 perbulannya', 'ww.jpg', 'PGN04', 'Umum', 'Donasi', '2023-07-22', '16:45:36', 'Aktif', ''),
('INF2307009', 'Festival buruh', 'Pembayaran Iuran Dilakukan Pada Tanggal 5 perbulannya', 'pelatihan mencret.jpg', 'PGN01', 'Umum', 'Donasi', '2023-07-22', '17:11:30', 'Aktif', ''),
('INF2307010', 'mini soccer', 'Iuran Kebersihan DIbayarkan Setiap Tanggal 4 perbulannya', 'fun futsal.jpg', 'PGN04', 'Umum', 'Donasi', '2023-07-22', '17:19:35', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_iuran`
--

CREATE TABLE `tb_iuran` (
  `id_iuran` varchar(15) NOT NULL,
  `id_informasi` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nominal` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `bukti_struk` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_iuran`
--

INSERT INTO `tb_iuran` (`id_iuran`, `id_informasi`, `pesan`, `nik`, `nominal`, `tanggal`, `jam`, `bukti_struk`, `status`, `keterangan`) VALUES
('IRN2307002', 'INF2307003', 'Nominal yang ditransfer kurang dari jumlah yang ditentukan', '317507300800007', 50000, '2023-07-23', '00:33:08', 'bca_1.jpg', 'InValid', 'tidak diterima'),
('IRN2307004', 'INF2307003', 'Sudah ditransfer menggunakan Mbanking', '317507300800000', 50000, '2023-07-30', '14:44:36', 'bca_3.jpg', 'Valid', 'diterima'),
('IRN2307005', 'INF2307003', 'Sudah ditransfer menggunakan Mbanking', '317507300800007', 50000, '2023-07-23', '00:30:25', 'bca_2.jpg', 'Proses', 'Sedang dalam pengamatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` varchar(15) NOT NULL,
  `nama_kegiatan` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `gambar`, `id_pengguna`, `kategori`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('KGT2307002', '17 agusuts', 'Lomba 17 agustus', 'fun futsal.jpg', 'PGN04', 'Umum', '2023-07-23', '00:37:03', 'Aktif', ''),
('KGT2307004', 'Kerja Bakti', 'Bersih-bersih lingkungan di rt 09 komplek kimia farma II', 'kerja bakti.jpg', 'PGN01', 'Umum', '2023-07-23', '00:38:51', 'Tidak Aktif', ''),
('KGT2307005', 'santunan', 'Acara Bakti Sosial Pemuda Karang Taruna', 'pelatihan.jpg', 'PGN04', 'Karang Taruna', '2023-07-22', '17:21:39', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(15) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Aktif',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `level`, `telepon`, `email`, `username`, `password`, `status`, `keterangan`) VALUES
('PGN01', 'Erna Arvianty', 'Ketua RT', '081315509220', 'ernarvianty@gmail.com', 'rt', 'rt', 'Aktif', ''),
('PGN02', 'Sri Asmayani', 'Sekertaris', '0866678912121', 'sriasmayani@gmail.com', 's', 's', 'Aktif', ''),
('PGN03', 'Any Darwani', 'Bendahara', '086663232333', 'any@gmail.com', 'b', 'b', 'Aktif', ''),
('PGN04', 'Percy Williams Bridgman', 'Karang Taruna', '085757575767', 'azhardyan@gmail.com', 'k', 'k', 'Aktif', ''),
('PGN05', 'Nikolai Gennadiyevich Basov', 'Warga', '021545454', 'arii1999@gmail.com', 'ari', 'ari', 'Tidak Aktif', '-'),
('PGN06', 'Felix Bloch', 'Warga', '08512365478', 'sutriono@gmail.com', 'mono', 'mono', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` varchar(15) NOT NULL,
  `id_kegiatan` varchar(15) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `alasan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_kegiatan`, `nik`, `alasan`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('PST2307004', 'KGT2307002', '3175073008000001', 'Mau ikut jalan - jalan , mencari teman, pengalaman dan persatuan warga....', '2023-07-22', '17:07:43', 'Disetujui', ''),
('PST2307005', 'KGT2307002', '31765060420600051', 'Mau ikut jalan - jalan , mencari teman, pengalaman dan persatuan warga....', '2023-07-22', '17:17:08', 'Ditolak', 'Sudah Uzur'),
('PST2307007', 'KGT2307005', '3175073008000001', 'Mau ikut jalan - jalan , mencari teman, pengalaman dan persatuan warga....', '2023-07-22', '17:25:15', 'Disetujui', ''),
('PST2307008', 'KGT2307002', '317507300800007', 'Mau ikut jalan - jalan , mencari teman, pengalaman dan persatuan warga....', '2023-07-29', '23:05:48', 'Disetujui', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proposal`
--

CREATE TABLE `tb_proposal` (
  `id_proposal` varchar(15) NOT NULL,
  `nama_proposal` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `file_proposal` varchar(100) NOT NULL,
  `file_jawaban` varchar(100) NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proposal`
--

INSERT INTO `tb_proposal` (`id_proposal`, `nama_proposal`, `deskripsi`, `nik`, `id_pengguna`, `file_proposal`, `file_jawaban`, `jawaban`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('PRO2307001', 'Proposal Acara 17 agustus 2023', 'Dalam rangka memriahkan kegiatan 17 Agustus 2023 di Tingkat Desa', '3175073008000005', 'PGN01', 'ww.jpg', 'ww.jpg', 'terimakasih sudah ikut berpartisipasi.Hanya untuk saat ini belum cocok dengn visi misi Kami...terimakasih...', '2023-07-30', '00:28:41', 'Ditolak', 'Sudah ada di proposal sebelumnya'),
('PRO2307002', 'Lomba Futsal 17 Agustus Tingkat Desa', 'Dalam rangka memriahkan kegiatan 17 Agustus 2023 di Tingkat Desa', '3175073008000005', 'PGN01', 'PROPOSAL 17an KF2_merged.pdf', 'PROPOSAL 17an KF2_merged.pdf', 'terimakasih sudah ikut berpartisipasi..Kamis sangat mendukung .Tolong dijaga amanah ini...', '2023-07-30', '00:28:16', 'Disetujui', 'Sponsor yang ememiliki ketertarikan dengan Gree Lingkungan Bersih');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` varchar(15) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `file_jawaban` varchar(100) NOT NULL,
  `jawaban` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_surat`, `nama_surat`, `deskripsi`, `nik`, `id_pengguna`, `file_surat`, `file_jawaban`, `jawaban`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('SRT2307003', '\n01/KTR/VII/2023', 'Surat Pengantar Nikah An Pak Budi', 'persiapan walimatul ursy /nikahan putra / putri warga di RT 09 Komplek Kima Farma Dua', '317507300800007', 'PGN01', 'ww.jpg', '', 'Diteirma', '2023-07-23', '00:07:34', 'Proses', ''),
('SRT2307004', '02/KTR/VII/2023', 'Surat Pengantar Nikah An Pak Iman', 'persiapan walimatul ursy /nikahan putra / putri warga di RT 09 Komplek Kima Farma Dua', '31765060420600051', 'PGN05', 'ww.jpg', '', 'Diterima', '2023-07-23', '00:10:00', 'Proses', ''),
('SRT2307005', '03/KTR/VII/2023', 'Surat Pengantar Nikah An Pak Mawardi', 'persiapan walimatul ursy /nikahan putra / putri warga di RT 09 Komplek Kima Farma Dua', '31765060820600044', 'PGN05', 'ww.jpg', '', 'Ditolak', '2023-07-23', '00:09:47', 'Disetujui', ''),
('SRT2307006', '04/KTR/VII/2023', 'Surat Pengantar Nikah An Pak Zul', 'persiapan walimatul ursy /nikahan putra / putri warga di RT 09 Komplek Kima Farma Dua', '3175073008000005', 'PGN06', 'pelatihan.jpg', '', 'Diterima', '2023-07-23', '00:09:21', 'Ditolak', ''),
('SRT2307007', '05/KTR/VII/2023', 'Surat Pengantar Nikah An Pak Satria', 'persiapan walimatul ursy /nikahan putra / putri warga di RT 09 Komplek Kima Farma Dua', '317507300800000', 'PGN06', 'template surat pengantar.docx', '', 'Diterima', '2023-07-23', '00:09:10', 'Disetujui', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_template`
--

CREATE TABLE `tb_template` (
  `id_template` varchar(15) NOT NULL,
  `template_pengantar` varchar(100) NOT NULL,
  `template_undangan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_template`
--

INSERT INTO `tb_template` (`id_template`, `template_pengantar`, `template_undangan`, `keterangan`) VALUES
('TMP01', 'template surat pengantar.docx', 'template surat pengantar.docx', 'Surat Model Pengantar dan Undangan Resmi acara kenegaraan'),
('TMP02', 'proposal117.pdf', 'proposal117.pdf', 'Format bentuk Proposal kegiatan Keagamaan dan COntoh Bentuk Undangan ke warga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warga`
--

CREATE TABLE `tb_warga` (
  `nik` varchar(20) NOT NULL,
  `nama_warga` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warga`
--

INSERT INTO `tb_warga` (`nik`, `nama_warga`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `telepon`, `agama`, `status_perkawinan`, `status`, `keterangan`) VALUES
('3175073008000001', 'Sutriono Sanusi', 'Laki-Laki', '1978-11-15', 'Komplek Kimia Farma II Ag.12/11', '086663232333', 'Islam', 'Nikah', 'Aktif', ''),
('3175073008000005', 'Prapti Nur Pratiwi', 'Perempuan', '1984-06-05', 'Komplek Kimia Farma II Ag.12/11', '085174748321', 'Islam', 'Nikah', 'Aktif', ''),
('317507300800007', 'Abu Thoyyib', 'Laki-Laki', '1999-06-15', 'Komplek Kimia Farma II Ag.12/9', '087851469521', 'Islam', 'Belum Nikah', 'Aktif', ''),
('31765060420600051', 'Irvan Al Hakim', 'Laki-Laki', '2000-08-15', 'komplek kimia farma II Ag.12/8', '085123658974', 'Islam', 'Belum Nikah', 'AKtif', ''),
('31765060820600044', 'Mulyadi Makmur', 'Laki-Laki', '1979-03-01', 'Komplek Kimia Farma II Ag.12/7 Jakarta Timur', '0878432156', 'Kristen', 'Nikah', 'Tidak Aktif', 'Sudah KK Mandiri di Kota XYZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `tb_iuran`
--
ALTER TABLE `tb_iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_template`
--
ALTER TABLE `tb_template`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
