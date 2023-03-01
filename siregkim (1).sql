-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2023 pada 19.23
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siregkim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_kelengkapan`
--

CREATE TABLE `berkas_kelengkapan` (
  `id_berkas_kelengkapan` int(10) UNSIGNED NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `isi_berkas` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas_kelengkapan`
--

INSERT INTO `berkas_kelengkapan` (`id_berkas_kelengkapan`, `nama_berkas`, `isi_berkas`, `created_at`, `updated_at`) VALUES
(1, 'Berkas Kelengkapan PKL', 'berkas_kelengkapan_pkl.pdf', '2023-02-09 14:08:06', '2023-03-01 04:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_template_seminar`
--

CREATE TABLE `berkas_template_seminar` (
  `id_berkas_template_seminar` int(10) UNSIGNED NOT NULL,
  `nama_seminar` varchar(255) NOT NULL,
  `file_template` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas_template_seminar`
--

INSERT INTO `berkas_template_seminar` (`id_berkas_template_seminar`, `nama_seminar`, `file_template`, `created_at`, `updated_at`) VALUES
(1, 'PKL', 'template_pkl.docx', '2023-03-01 11:16:49', '2023-03-01 06:42:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_seminar_pkl`
--

CREATE TABLE `bukti_seminar_pkl` (
  `id_bukti_seminar_pkl` int(10) UNSIGNED NOT NULL,
  `id_pkl` int(10) UNSIGNED NOT NULL,
  `bukti_seminar` varchar(255) NOT NULL,
  `laporan_pkl` varchar(255) NOT NULL,
  `tanggal_seminar` date NOT NULL,
  `nilai_pkl_angka` int(10) NOT NULL,
  `nilai_pkl_huruf` varchar(10) NOT NULL,
  `nilai_seminar_angka` int(10) NOT NULL,
  `nilai_seminar_huruf` varchar(10) NOT NULL,
  `status_bukti_seminar` enum('Valid','Invalid','Diproses') NOT NULL,
  `pesan_admin` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bukti_seminar_pkl`
--

INSERT INTO `bukti_seminar_pkl` (`id_bukti_seminar_pkl`, `id_pkl`, `bukti_seminar`, `laporan_pkl`, `tanggal_seminar`, `nilai_pkl_angka`, `nilai_pkl_huruf`, `nilai_seminar_angka`, `nilai_seminar_huruf`, `status_bukti_seminar`, `pesan_admin`, `created_at`, `updated_at`) VALUES
(5, 2, 'bukti_seminar_1001_Cemplunk Maryati1676220158_75ab48125de74c32179d.pdf', 'laporan_pkl_1001_Cemplunk Maryati1676220158_85b7a18597b1de4f7432.pdf', '2023-02-02', 1, 'A', 1, 'A', 'Valid', 'lengkap', '2023-02-12 10:42:38', '2023-02-25 23:46:14'),
(6, 1, 'bukti_seminar_1000_Taufik Yolanda1676806580_9d02acbbeac41c7bce64.pdf', 'laporan_pkl_1000_Taufik Yolanda1676806580_97449ebabd61062d3340.pdf', '2023-02-02', 100, 'A', 100, 'A', 'Invalid', 'Dokumen Salah', '2023-02-19 05:36:20', '2023-02-25 23:46:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_seminar_pkl`
--

CREATE TABLE `jadwal_seminar_pkl` (
  `id_jadwal_seminar_pkl` int(10) UNSIGNED NOT NULL,
  `id_lokasi_seminar` int(10) UNSIGNED NOT NULL,
  `id_pkl` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `berkas_seminar` varchar(255) NOT NULL,
  `pesan_koor` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal_seminar_pkl`
--

INSERT INTO `jadwal_seminar_pkl` (`id_jadwal_seminar_pkl`, `id_lokasi_seminar`, `id_pkl`, `tanggal`, `jam_mulai`, `jam_selesai`, `berkas_seminar`, `pesan_koor`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2023-03-10', '13:37:00', '12:37:00', 'berkas_seminar_1000_Taufik Yolanda.docx', '', '2023-02-28 22:09:46', '2023-03-01 01:18:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_seminar`
--

CREATE TABLE `lokasi_seminar` (
  `id_lokasi_seminar` int(10) UNSIGNED NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lokasi_seminar`
--

INSERT INTO `lokasi_seminar` (`id_lokasi_seminar`, `nama_gedung`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'KIMIA 1', 'R4', '2023-02-26 01:07:38', '2023-02-26 01:11:37'),
(2, 'MIPA T', 'R3', '2023-02-26 01:12:02', '2023-02-26 01:19:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl_mahasiswa`
--

CREATE TABLE `pkl_mahasiswa` (
  `id_pkl` int(255) UNSIGNED NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL,
  `judul_pkl` varchar(255) NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `nama_mitra_pkl` varchar(255) NOT NULL,
  `domisili_pkl` enum('Universitas Lampung','Dalam Lampung','Luar Lampung') NOT NULL,
  `periode_seminar_pkl` varchar(255) NOT NULL,
  `dosen_pembimbing_pkl` int(255) UNSIGNED NOT NULL,
  `pembimbing_lapangan` varchar(150) NOT NULL,
  `no_pembimbing_lapangan` bigint(19) NOT NULL,
  `toefl` int(4) DEFAULT NULL,
  `sks` int(2) NOT NULL,
  `ipk` float(4,2) NOT NULL,
  `berkas_kelengkapan` varchar(255) NOT NULL,
  `persetujuan_seminar_pkl` enum('Setuju') NOT NULL,
  `pesan_admin` varchar(255) NOT NULL,
  `status_pkl` enum('Valid','Invalid','Diproses') NOT NULL DEFAULT 'Diproses',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pkl_mahasiswa`
--

INSERT INTO `pkl_mahasiswa` (`id_pkl`, `id_user`, `judul_pkl`, `tahun_akademik`, `semester`, `prodi`, `nama_mitra_pkl`, `domisili_pkl`, `periode_seminar_pkl`, `dosen_pembimbing_pkl`, `pembimbing_lapangan`, `no_pembimbing_lapangan`, `toefl`, `sks`, `ipk`, `berkas_kelengkapan`, `persetujuan_seminar_pkl`, `pesan_admin`, `status_pkl`, `created_at`, `updated_at`) VALUES
(1, 51, 'Dampak Positif Pemakaian Sianida Pada NACL ', '2023 / 2024', 'Ganjil', 'S1 - Kimia', 'Jurusan Kimia', 'Universitas Lampung', '2023-03', 4, 'yogi lapangan', 123000, 300, 100, 3.00, 'berkas_kelengkapan_1000_Taufik Yolanda1676806401_6ebb1305990d95b15a6f.pdf', 'Setuju', 'https://chat.whatsapp.com/EjU594SjpLcCtEw2ejZcWh silahkan join', 'Valid', '2023-02-06 14:26:57', '2023-02-22 07:00:23'),
(2, 52, 'Dampak Negatif Pada Pemakaian Sianida A  ', '2019 / 2020', 'Ganjil', 'S1 - Kimia', 'Bukit Asin', 'Universitas Lampung', '2023-08', 28, 'udin surudin', 1234567788, 402, 100, 3.00, 'berkas_kelengkapan_1001_Cemplunk Maryati1675917472_3608a5957b0784992102.pdf', 'Setuju', 'belum ada', 'Valid', '2023-02-08 20:56:48', '2023-03-01 11:57:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_mahasiswa`
--

CREATE TABLE `profile_mahasiswa` (
  `id_profile_mahasiswa` int(255) UNSIGNED NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `dosen_pembimbing_akademik` int(255) UNSIGNED NOT NULL,
  `angkatan` int(4) NOT NULL,
  `semester` int(2) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status_mahasiswa` enum('Aktif','Tidak Aktif','Lulus','Cuti','Keluar') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `profile_mahasiswa`
--

INSERT INTO `profile_mahasiswa` (`id_profile_mahasiswa`, `id_user`, `tanggal_lahir`, `tanggal_masuk`, `dosen_pembimbing_akademik`, `angkatan`, `semester`, `jenis_kelamin`, `alamat`, `email`, `no_telepon`, `status_mahasiswa`, `created_at`, `updated_at`) VALUES
(2, 52, '1989-09-15', '2003-04-26', 2, 2003, 1, 'Perempuan', 'Dk. Sutan Syahrir No. 564, Gorontalo 54315, DKI', 'sari.wibisono@gmail.com', '0864439074', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(3, 53, '1992-01-13', '1979-07-06', 3, 1979, 3, 'Perempuan', 'Dk. Banda No. 386, Pariaman 87691, Sumsel', 'salimah54@yahoo.com', '08174462061', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(4, 54, '1990-11-27', '1989-08-26', 4, 1989, 1, 'Perempuan', 'Ds. Lembong No. 481, Samarinda 74288, Sulbar', 'gdongoran@najmudin.sch.id', '08946922977', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(5, 55, '2018-02-27', '1977-04-03', 5, 1977, 2, 'Laki-Laki', 'Gg. Tubagus Ismail No. 723, Pasuruan 31476, Kaltim', 'mtamba@hidayat.go.id', '08496343791', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(6, 56, '2007-06-11', '1999-06-04', 6, 1999, 7, 'Perempuan', 'Kpg. Jakarta No. 930, Bukittinggi 16699, NTT', 'tania41@gmail.co.id', '08548804496', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(7, 57, '2013-06-17', '2008-01-24', 7, 2008, 3, 'Perempuan', 'Dk. K.H. Wahid Hasyim (Kopo) No. 731, Padang 31309, Kaltim', 'rama43@yahoo.co.id', '08933155901', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(8, 58, '2018-11-02', '1977-05-22', 8, 1977, 3, 'Laki-Laki', 'Ds. Abdul. Muis No. 786, Metro 73241, Babel', 'tania.prasetya@yahoo.co.id', '08818998143', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(9, 59, '2010-07-27', '1975-05-03', 9, 1975, 6, 'Laki-Laki', 'Ki. Gambang No. 975, Batam 11360, Gorontalo', 'inamaga@gmail.com', '08316639023', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(10, 60, '1985-02-16', '2009-07-23', 10, 2009, 5, 'Laki-Laki', 'Dk. Baing No. 29, Bekasi 86539, Babel', 'lestari.bancar@hidayanto.biz', '08508282315', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(11, 61, '2000-04-10', '2022-09-28', 11, 2022, 5, 'Laki-Laki', 'Kpg. Babadan No. 606, Palu 78440, DKI', 'wsuryatmi@yahoo.com', '08960399716', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(12, 62, '1977-06-04', '1994-02-19', 12, 1994, 6, 'Perempuan', 'Gg. Rumah Sakit No. 97, Tebing Tinggi 25914, Sumsel', 'bajragin48@widodo.biz.id', '08441723130', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(13, 63, '1974-02-14', '2018-04-16', 13, 2018, 6, 'Laki-Laki', 'Gg. Bass No. 792, Payakumbuh 20715, Maluku', 'thamrin.yani@wibowo.co.id', '08962912366', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(14, 64, '1996-07-16', '2015-08-31', 14, 2015, 8, 'Laki-Laki', 'Jr. Salam No. 109, Tegal 43519, Papua', 'epurwanti@usada.co.id', '08698107650', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(15, 65, '1986-03-19', '2005-09-30', 15, 2005, 4, 'Perempuan', 'Jr. Kalimantan No. 131, Lhokseumawe 44665, Sumsel', 'indah08@gmail.co.id', '08786987987', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(16, 66, '1976-11-23', '2010-04-28', 16, 2010, 3, 'Perempuan', 'Psr. Madrasah No. 56, Jambi 81731, Lampung', 'farida.latika@setiawan.com', '08858117457', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(17, 67, '1981-05-31', '1991-04-08', 17, 1991, 1, 'Laki-Laki', 'Psr. Otto No. 629, Pariaman 65056, Sumut', 'ratna.wacana@gmail.com', '08786354928', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(18, 68, '1987-06-14', '2010-08-09', 18, 2010, 5, 'Perempuan', 'Jr. Banal No. 945, Batam 16324, Jabar', 'andriani.winda@gmail.co.id', '0811056022', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(19, 69, '1975-12-17', '1996-01-25', 19, 1996, 6, 'Laki-Laki', 'Psr. Padang No. 333, Tual 65527, Jabar', 'cakrajiya.sitompul@yahoo.com', '0846050156', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(20, 70, '1999-09-23', '1988-11-04', 20, 1988, 8, 'Laki-Laki', 'Dk. Tambun No. 620, Kupang 36711, Malut', 'lukman40@maheswara.ac.id', '08935567502', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(21, 71, '2001-12-14', '1984-10-05', 21, 1984, 6, 'Laki-Laki', 'Kpg. Kiaracondong No. 519, Administrasi Jakarta Barat 96178, Babel', 'nsitorus@gmail.com', '08136120826', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(22, 72, '2004-09-29', '2009-04-20', 22, 2009, 2, 'Laki-Laki', 'Ds. Bakhita No. 629, Tidore Kepulauan 11474, Jatim', 'halim.eluh@zulaika.name', '08533208250', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(23, 73, '1972-06-27', '2019-06-21', 23, 2019, 5, 'Laki-Laki', 'Jr. Bagas Pati No. 259, Surabaya 68633, Sumbar', 'aprasetyo@gmail.com', '0817478331', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(24, 74, '1985-12-20', '2010-05-22', 24, 2010, 4, 'Perempuan', 'Ds. Cut Nyak Dien No. 488, Bengkulu 74571, Kaltim', 'siti.uyainah@gmail.co.id', '08844829613', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(25, 75, '2014-04-17', '1993-03-14', 25, 1993, 4, 'Perempuan', 'Ds. Cikutra Timur No. 182, Tangerang 39514, Bali', 'ellis.kuswandari@namaga.or.id', '08214161796', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(26, 76, '2008-08-22', '1993-01-25', 26, 1993, 8, 'Perempuan', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 532, Lubuklinggau 52217, Babel', 'ellis48@yahoo.co.id', '08528907956', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(27, 77, '2012-04-21', '1993-10-02', 27, 1993, 4, 'Laki-Laki', 'Jr. Perintis Kemerdekaan No. 803, Kediri 29100, Gorontalo', 'awasita@aryani.com', '08390751277', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(28, 78, '1973-06-26', '1985-04-29', 28, 1985, 3, 'Perempuan', 'Gg. Kyai Gede No. 816, Blitar 75832, Sulbar', 'januar.oni@yahoo.co.id', '08265627696', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(29, 79, '1990-04-08', '2018-07-12', 29, 2018, 1, 'Perempuan', 'Ds. Sugiyopranoto No. 67, Padangpanjang 87398, NTT', 'jabal98@nasyiah.tv', '08653106558', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(30, 80, '1992-08-26', '2021-10-18', 30, 2021, 7, 'Perempuan', 'Jln. Bakin No. 117, Tanjungbalai 12106, Sulbar', 'apranowo@yahoo.co.id', '08270826280', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(31, 81, '2014-05-17', '1970-09-03', 31, 1970, 5, 'Laki-Laki', 'Psr. Kalimantan No. 658, Padangsidempuan 23125, Banten', 'ira66@natsir.com', '08711118985', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(32, 82, '1991-07-22', '2013-11-29', 32, 2013, 7, 'Perempuan', 'Jln. Wahid Hasyim No. 143, Sorong 93392, Pabar', 'daryani.pradipta@lailasari.com', '0857980655', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(33, 83, '2010-09-30', '1988-12-25', 33, 1988, 4, 'Perempuan', 'Kpg. Jakarta No. 242, Palu 97214, NTT', 'lintang76@kurniawan.or.id', '08463013061', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(34, 84, '1994-10-14', '1976-09-03', 34, 1976, 5, 'Laki-Laki', 'Psr. Pacuan Kuda No. 748, Manado 37737, DIY', 'gandewa.mandasari@astuti.or.id', '08474469731', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(35, 85, '1970-02-08', '1999-03-12', 35, 1999, 1, 'Perempuan', 'Kpg. Sukabumi No. 795, Ternate 93493, Bali', 'dnasyiah@wibisono.co.id', '08866294480', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(36, 86, '2000-08-08', '1994-11-13', 36, 1994, 6, 'Perempuan', 'Jln. Sutoyo No. 792, Sawahlunto 16932, Babel', 'titin65@yahoo.co.id', '08977737622', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(37, 87, '2011-10-26', '2020-07-14', 37, 2020, 5, 'Perempuan', 'Psr. Bhayangkara No. 374, Blitar 14394, Sulsel', 'igunawan@siregar.ac.id', '08813511921', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(38, 88, '2016-07-02', '2003-10-18', 38, 2003, 2, 'Laki-Laki', 'Jln. Gajah No. 861, Cirebon 95133, Sumbar', 'darmana.saefullah@gmail.co.id', '0880497401', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(39, 89, '1990-10-26', '1972-04-18', 39, 1972, 1, 'Perempuan', 'Psr. Pasirkoja No. 748, Bitung 41103, Aceh', 'dmarpaung@gmail.co.id', '08155269143', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(40, 90, '1982-08-12', '2012-11-30', 40, 2012, 7, 'Perempuan', 'Jln. Aceh No. 887, Binjai 55431, Sulut', 'gangsa.siregar@yahoo.com', '08902809885', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(41, 91, '1992-09-27', '1975-10-01', 41, 1975, 5, 'Perempuan', 'Ds. B.Agam 1 No. 609, Denpasar 53944, Sulut', 'winarno.ajimat@gmail.com', '08522022574', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(42, 92, '1991-05-11', '2016-09-11', 42, 2016, 8, 'Perempuan', 'Jln. Rajawali Barat No. 267, Jambi 13459, Sumsel', 'shakila42@gmail.co.id', '08462893163', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(43, 93, '1971-07-02', '2003-08-08', 43, 2003, 3, 'Laki-Laki', 'Psr. B.Agam Dlm No. 263, Palembang 96921, Sulsel', 'wulandari.rahmi@yahoo.com', '08375650738', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(44, 94, '1974-01-20', '2005-11-22', 44, 2005, 4, 'Laki-Laki', 'Kpg. Industri No. 594, Jayapura 33625, Jatim', 'dadi.fujiati@yahoo.co.id', '08774150936', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(45, 95, '1998-07-25', '2020-03-31', 45, 2020, 8, 'Perempuan', 'Jr. Pintu Besar Selatan No. 35, Tomohon 22148, Jabar', 'natsir.pranawa@putra.tv', '08866770155', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(46, 96, '1983-07-15', '2000-11-19', 46, 2000, 2, 'Laki-Laki', 'Jln. Jagakarsa No. 816, Sukabumi 64215, Jabar', 'hartana12@sitorus.tv', '08871192259', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(47, 97, '1979-05-22', '1983-10-31', 47, 1983, 7, 'Laki-Laki', 'Ds. Fajar No. 865, Samarinda 95727, Sumbar', 'zulaika.radika@yahoo.co.id', '08190610748', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(48, 98, '1972-10-19', '2018-05-18', 48, 2018, 6, 'Perempuan', 'Psr. Aceh No. 76, Administrasi Jakarta Selatan 71113, Riau', 'bagya67@hasanah.biz', '08793069149', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(49, 99, '1992-09-23', '1993-06-27', 49, 1993, 4, 'Perempuan', 'Ds. Bank Dagang Negara No. 484, Solok 63618, Sumut', 'jpratiwi@yahoo.com', '08668730942', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(50, 100, '1980-05-29', '2007-01-28', 50, 2007, 6, 'Laki-Laki', 'Jr. Lumban Tobing No. 651, Surabaya 96193, Kalsel', 'caturangga.irawan@mulyani.co', '08769219342', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(52, 102, '2016-01-10', '1972-10-05', 2, 1972, 4, 'Perempuan', 'Psr. Bahagia  No. 513, Depok 48182, Banten', 'winarsih.radika@mansur.asia', '08231545536', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(53, 103, '2012-11-09', '1970-03-17', 3, 1970, 7, 'Laki-Laki', 'Jln. Setia Budi No. 497, Bima 36804, Kalteng', 'leo.narpati@gmail.co.id', '08663738799', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(54, 104, '1997-09-19', '1988-06-01', 4, 1988, 5, 'Perempuan', 'Kpg. Bayam No. 884, Prabumulih 48705, Jateng', 'siregar.asirwada@agustina.biz', '08243246612', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(55, 105, '2018-02-27', '1977-04-03', 5, 1977, 2, 'Laki-Laki', 'Gg. Tubagus Ismail No. 723, Pasuruan 31476, Kaltim', 'mtamba@hidayat.go.id', '08496343791', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:27:26'),
(56, 106, '1970-01-12', '2002-03-21', 6, 2002, 7, 'Perempuan', 'Ds. Soekarno Hatta No. 40, Tangerang Selatan 60844, Kepri', 'gsusanti@simbolon.info', '08235474758', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(57, 107, '2013-07-30', '2016-11-16', 7, 2016, 3, 'Laki-Laki', 'Kpg. Casablanca No. 988, Banjarbaru 57692, Bengkulu', 'ysiregar@laksmiwati.web.id', '08239250010', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(58, 108, '1972-02-17', '2004-11-07', 8, 2004, 3, 'Laki-Laki', 'Dk. Basmol Raya No. 800, Serang 16058, Sumbar', 'fmaryati@kusumo.go.id', '08399477399', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(59, 109, '2002-09-07', '1971-06-03', 9, 1971, 7, 'Perempuan', 'Jln. Labu No. 244, Padang 83965, Bengkulu', 'hariyah.mursita@novitasari.inf', '08335214106', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(60, 110, '1979-05-30', '1991-06-18', 10, 1991, 5, 'Perempuan', 'Dk. Lumban Tobing No. 798, Medan 79107, DKI', 'makara.pratama@gmail.co.id', '08680609803', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(61, 111, '1978-08-31', '2016-11-01', 11, 2016, 6, 'Perempuan', 'Ki. Bagis Utama No. 356, Dumai 13745, Kalsel', 'yuni62@yahoo.co.id', '08578184551', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(62, 112, '2005-09-04', '1986-01-20', 12, 1986, 1, 'Perempuan', 'Kpg. Basuki No. 438, Tegal 72681, Sumut', 'marpaung.rudi@najmudin.co', '08566003061', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(63, 113, '2013-11-30', '1997-12-24', 13, 1997, 1, 'Perempuan', 'Jr. Basuki No. 418, Tegal 91084, Kalteng', 'ifa55@novitasari.org', '08611674992', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(64, 114, '1975-01-01', '2007-03-08', 14, 2007, 6, 'Laki-Laki', 'Jln. Kyai Mojo No. 82, Subulussalam 98509, Malut', 'vicky92@wijayanti.tv', '08762292895', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(65, 115, '1997-09-15', '2017-01-23', 15, 2017, 6, 'Perempuan', 'Psr. Bakit  No. 93, Palembang 43467, Lampung', 'cutami@gmail.com', '08587742782', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(66, 116, '1997-11-13', '1997-03-16', 16, 1997, 8, 'Laki-Laki', 'Jr. Tentara Pelajar No. 571, Palopo 74311, Babel', 'epermadi@yahoo.co.id', '08368481373', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(67, 117, '1992-05-11', '1998-12-08', 17, 1998, 3, 'Laki-Laki', 'Psr. Untung Suropati No. 607, Administrasi Jakarta Barat 11353, Jabar', 'hidayanto.kenari@yahoo.com', '08288485271', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(68, 118, '2020-01-17', '1987-08-27', 18, 1987, 1, 'Perempuan', 'Ki. Madiun No. 827, Bengkulu 90451, Sulteng', 'prastuti.azalea@budiman.mil.id', '08276590793', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(69, 119, '1981-08-15', '2006-03-05', 19, 2006, 6, 'Laki-Laki', 'Psr. Basket No. 430, Cirebon 55897, Pabar', 'fujiati.melinda@suryatmi.sch.i', '08156374786', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(70, 120, '1980-02-21', '2019-04-05', 20, 2019, 3, 'Perempuan', 'Ki. Bawal No. 254, Bau-Bau 28667, Sumsel', 'rwidiastuti@yahoo.com', '08537171995', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(71, 121, '1985-10-24', '1972-02-08', 21, 1972, 5, 'Laki-Laki', 'Ds. Aceh No. 583, Bitung 71071, Sumut', 'zuyainah@novitasari.net', '08827879958', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(72, 122, '2019-08-08', '1995-01-11', 22, 1995, 1, 'Laki-Laki', 'Ki. Supomo No. 877, Palembang 99374, Malut', 'eva85@hakim.id', '08732394392', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(73, 123, '2000-11-05', '2022-05-06', 23, 2022, 8, 'Perempuan', 'Ds. Dipatiukur No. 148, Depok 27976, Sulut', 'uhandayani@yahoo.com', '08742728083', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(74, 124, '1984-11-27', '1997-05-22', 24, 1997, 4, 'Perempuan', 'Psr. Bakau No. 370, Kendari 14415, Jabar', 'makuta.puspita@yuniar.go.id', '08936076157', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(75, 125, '1973-10-31', '2009-08-03', 25, 2009, 7, 'Perempuan', 'Kpg. Sudirman No. 636, Ternate 69596, Sulsel', 'apertiwi@riyanti.in', '08753147123', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(76, 126, '1984-07-27', '1991-03-01', 26, 1991, 6, 'Perempuan', 'Ds. Supono No. 541, Sibolga 50476, Sulteng', 'zulkarnain.jail@gmail.co.id', '08161452407', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(77, 127, '1983-03-27', '1994-03-25', 27, 1994, 6, 'Laki-Laki', 'Kpg. Ters. Pasir Koja No. 363, Bandung 61094, Pabar', 'rafid23@gmail.com', '08383186082', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(78, 128, '1978-07-23', '1977-11-19', 28, 1977, 3, 'Laki-Laki', 'Jr. Samanhudi No. 732, Prabumulih 50981, Kalteng', 'uda62@halimah.asia', '08413625140', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(79, 129, '2009-07-22', '2021-01-18', 29, 2021, 3, 'Laki-Laki', 'Jr. Yos No. 363, Pekanbaru 89309, DKI', 'puji.tarihoran@yahoo.com', '08346422899', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(80, 130, '1974-07-14', '2013-08-11', 30, 2013, 2, 'Laki-Laki', 'Jln. Sutami No. 515, Bitung 29159, Malut', 'padmasari.sakti@yahoo.com', '08588541745', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(81, 131, '2010-05-24', '2020-10-21', 31, 2020, 7, 'Laki-Laki', 'Psr. Bata Putih No. 957, Payakumbuh 47154, Maluku', 'wijayanti.yessi@mangunsong.web', '081851052', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(82, 132, '1970-04-14', '2014-11-13', 32, 2014, 2, 'Laki-Laki', 'Psr. Gading No. 351, Semarang 53757, Kalsel', 'nadia94@yahoo.com', '08541139191', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(83, 133, '1982-07-02', '1985-06-30', 33, 1985, 7, 'Perempuan', 'Jln. Jakarta No. 627, Pagar Alam 30706, Malut', 'genta.nasyidah@marpaung.desa.i', '08390435810', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(84, 134, '1991-02-22', '1991-01-13', 34, 1991, 1, 'Perempuan', 'Jr. Supomo No. 999, Mojokerto 78207, Jateng', 'dirja40@yahoo.com', '08499834470', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(85, 135, '1982-11-06', '1997-02-11', 35, 1997, 3, 'Perempuan', 'Dk. Diponegoro No. 265, Banda Aceh 15027, Malut', 'uwidodo@gmail.com', '08125643369', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(86, 136, '1980-02-26', '1974-03-31', 36, 1974, 5, 'Perempuan', 'Jr. Wora Wari No. 273, Denpasar 69864, Pabar', 'yolanda.violet@yahoo.com', '08167456290', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(87, 137, '2009-01-24', '2007-12-28', 37, 2007, 2, 'Laki-Laki', 'Gg. Sentot Alibasa No. 695, Lubuklinggau 38396, Maluku', 'icha.handayani@gmail.com', '08209103221', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(88, 138, '1995-03-30', '2020-02-29', 38, 2020, 3, 'Perempuan', 'Ki. Umalas No. 160, Pontianak 92598, DKI', 'wastuti.kania@pangestu.desa.id', '08682173156', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(89, 139, '1989-09-02', '2017-11-24', 39, 2017, 2, 'Laki-Laki', 'Jr. Mulyadi No. 921, Metro 65312, NTB', 'ibrani.purwanti@yahoo.co.id', '08284560739', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(90, 140, '2008-05-22', '1984-02-14', 40, 1984, 3, 'Perempuan', 'Dk. Pasirkoja No. 552, Lubuklinggau 32731, Maluku', 'cici11@gmail.co.id', '08691593083', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(91, 141, '2009-08-04', '2006-11-25', 41, 2006, 2, 'Perempuan', 'Ds. Taman No. 644, Sorong 28066, Kaltim', 'aris.sudiati@susanti.web.id', '08741785464', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(92, 142, '2018-11-28', '1999-05-09', 42, 1999, 4, 'Laki-Laki', 'Dk. Industri No. 126, Administrasi Jakarta Selatan 63540, Kalteng', 'uli01@hartati.biz', '08935935996', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(93, 143, '1979-12-17', '1989-01-22', 43, 1989, 1, 'Laki-Laki', 'Jln. Wahid No. 673, Cirebon 10969, Gorontalo', 'tnamaga@hutapea.mil.id', '0814658837', 'Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(94, 144, '1974-06-17', '1979-09-21', 44, 1979, 3, 'Perempuan', 'Jr. Cokroaminoto No. 167, Subulussalam 64707, Sulsel', 'mansur.danu@gmail.com', '08582639331', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(95, 145, '1992-08-08', '2007-07-22', 45, 2007, 8, 'Laki-Laki', 'Ds. Dipenogoro No. 527, Bekasi 28080, Sulteng', 'daliono63@yulianti.tv', '08982889998', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(96, 146, '1987-09-20', '1988-06-14', 46, 1988, 6, 'Laki-Laki', 'Jln. Rajawali Timur No. 745, Ternate 15117, Jateng', 'aslijan.nasyiah@yahoo.co.id', '08875683187', 'Cuti', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(97, 147, '1981-07-13', '2014-08-16', 47, 2014, 6, 'Laki-Laki', 'Jln. Baja No. 87, Tanjung Pinang 80107, Papua', 'opangestu@suartini.my.id', '08128006109', 'Lulus', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(98, 148, '2016-10-21', '2001-03-09', 48, 2001, 5, 'Perempuan', 'Ds. Kyai Gede No. 907, Tegal 82786, Papua', 'hastuti.asmianto@gmail.co.id', '0817814265', 'Keluar', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(99, 149, '1978-12-18', '1978-02-27', 49, 1978, 6, 'Laki-Laki', 'Dk. Moch. Toha No. 38, Probolinggo 96293, Kaltim', 'lamar.pranowo@yahoo.co.id', '08605505181', 'Tidak Aktif', '2023-02-03 05:26:38', '2023-02-03 05:26:38'),
(100, 151, '2002-06-20', '2020-05-25', 45, 2020, 6, 'Laki-Laki', 'Bandar Lampungs', 'testngm1@senin.com', '08121415989351', 'Aktif', '2023-02-03 07:00:32', '2023-02-03 08:41:51'),
(101, 51, '2023-03-16', '2023-03-23', 45, 2023, 6, 'Laki-Laki', 'Metroi', 'yogiandaru1@gmail.com', '0089578567', 'Aktif', '2023-03-01 10:23:33', '2023-03-01 10:23:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(255) UNSIGNED NOT NULL,
  `username` bigint(19) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `is_mahasiswa` int(1) NOT NULL DEFAULT 0,
  `is_dosen` int(1) NOT NULL DEFAULT 0,
  `is_koor` int(1) NOT NULL DEFAULT 0,
  `is_tandik` int(1) NOT NULL DEFAULT 0,
  `is_superadmin` int(1) NOT NULL DEFAULT 0,
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `is_alumni` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `is_mahasiswa`, `is_dosen`, `is_koor`, `is_tandik`, `is_superadmin`, `is_admin`, `is_alumni`, `created_at`, `updated_at`) VALUES
(2, 2001, '$argon2i$v=19$m=65536,t=4,p=1$R3A2S3hPS0tSWjNIZUhCNA$DLwOEd7qDwpaHb0AsUu2+MZ8B/VBzy9UcvQk7mNLWXA', 'Hasta Tarihoran S.Gz', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:14', '2023-02-03 04:44:14'),
(3, 2002, '$argon2i$v=19$m=65536,t=4,p=1$TXhSUmdQTmFVaXJDelhEUQ$Gv7t2dWLIm9SUUXZCnS4biJ1rROj0WCaErTwWdEbHy8', 'Farah Hariyah S.T.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:14', '2023-02-03 04:44:14'),
(4, 2003, '$argon2i$v=19$m=65536,t=4,p=1$MWczUnguUnQzbUZORzBwRg$snmN/OjfkwPirghN9kIt4P+qvlIawG7StwVwcvZFg/U', 'Jindra Sihombing S.H.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:14', '2023-02-03 04:44:14'),
(5, 2004, '$argon2i$v=19$m=65536,t=4,p=1$SkJhTVhLcDlidHlXVnFwUA$iPYK+aPN/nTEzlQo9yNwbprygV2XBV+Y/o+mdAry5o4', 'Lega Hasanah M.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:15', '2023-02-03 04:44:15'),
(6, 2005, '$argon2i$v=19$m=65536,t=4,p=1$OUVqU0dvT3piQy4vY2pBeQ$Vqo/2uj4KsQ1gbgIF7PDR7LIsXIy0RfUT8GkIvSJRGs', 'Among Usamah S.Kom', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:15', '2023-02-03 04:44:15'),
(7, 2006, '$argon2i$v=19$m=65536,t=4,p=1$ZVVWS2VrTkxlbk5aWmMvaQ$8XNnkbfOdYZ8lSaQWJ5nrdRDbBhJUuaShtiOTARVeDg', 'Mahesa Suryatmi S.Farm', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:15', '2023-02-03 04:44:15'),
(8, 2007, '$argon2i$v=19$m=65536,t=4,p=1$bTNONFFFeEtWd1A4VVhieg$sFlI3IfC7q7T3dwa1/I7+SFInxGtVFzTK84YH96yCKw', 'Karma Latupono M.M.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:15', '2023-02-03 04:44:15'),
(9, 2008, '$argon2i$v=19$m=65536,t=4,p=1$V2NjNS9IcXNjSExQdVRaaw$moVytdXk8FakYgQ7EpvH7p+Gn/OVDp96PnK8JjFvsNc', 'Unjani Maryadi S.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:16', '2023-02-03 04:44:16'),
(10, 2009, '$argon2i$v=19$m=65536,t=4,p=1$blh4ek5iSGRMYlNPdDY3Mw$z3S2PerSKT6j7YXwrSaUTl2/7rZ0Vmb/JQYl3xLoDkg', 'Kunthara Rahmawati S.IP', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:16', '2023-02-03 04:44:16'),
(11, 2010, '$argon2i$v=19$m=65536,t=4,p=1$RnRXRUc5QkJ1WlRsNnVlNA$OS48Hdb2eIsUqiz4w80K42/EGV+6ANBkminyc4Cu9Y0', 'Umi Utami S.Farm', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:16', '2023-02-03 04:44:16'),
(12, 2011, '$argon2i$v=19$m=65536,t=4,p=1$ejVDUmlReTU5TlFmMXNabQ$lX/l3ejhixQUrELG6zpVuoyHRrdwzOUdONXO5/N2M5A', 'Umi Sirait M.Farm', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:17', '2023-02-03 04:44:17'),
(13, 2012, '$argon2i$v=19$m=65536,t=4,p=1$SmFhUFouMldnOVhxTkU5Rg$tgo0qovH2u9q7drCvIj/zi0w/ufqtWWXfiVVHavX1GA', 'Latika Sihombing M.TI.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:17', '2023-02-03 04:44:17'),
(14, 2013, '$argon2i$v=19$m=65536,t=4,p=1$bXJjMXVDNE00T20uUVNLRA$aIWwYAI+8pVTR2GjvPeDacpkh+mBtVunORF07baLdpU', 'Tira Nurdiyanti S.Farm', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:17', '2023-02-03 04:44:17'),
(15, 2014, '$argon2i$v=19$m=65536,t=4,p=1$MUJGZlRGZUFQUlVJMnFVUw$IZERAjsB1YcSQhSZ9NrOt29Ods3Ua0wQ6Yj2+vOTlbc', 'Irwan Firmansyah S.T.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:17', '2023-02-03 04:44:17'),
(16, 2015, '$argon2i$v=19$m=65536,t=4,p=1$OGNpQkFrOTN6WjNyN2JBcA$lqonaO3d9/u2rbPw0tMuTsbD3jNtOknV0stzKlnGP+s', 'Laras Andriani S.T.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:18', '2023-02-03 04:44:18'),
(17, 2016, '$argon2i$v=19$m=65536,t=4,p=1$NjFDUFBuOUlOcklVb0dzYw$kQH/rdiOUbToZgyRvVxVV3wbGh4e+0jBuQonmaNFIb4', 'Rahman Firmansyah S.IP', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:18', '2023-02-03 04:44:18'),
(18, 2017, '$argon2i$v=19$m=65536,t=4,p=1$T2xzZUIxd1BicW82aEdXag$zJ309+cFuAguiEUr6ebs+DIlMHa8u+7cRcUQ0j0WRhk', 'Azalea Usada S.H.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:18', '2023-02-03 04:44:18'),
(19, 2018, '$argon2i$v=19$m=65536,t=4,p=1$SVNJY3VVLlhnRnNGMVdMVQ$QZfTkjYhd08BfNVcVpygZUTwJ+88AO4yFlJ4ZtmRTUw', 'Wardi Tampubolon S.Psi', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:18', '2023-02-03 04:44:18'),
(20, 2019, '$argon2i$v=19$m=65536,t=4,p=1$RnZHTS5RR1ByOEN4cUlEQg$3YfVDtYqbyS7iBBlPI/WVVGNcu816ADpYCQp9DHUlrc', 'Clara Maheswara S.Sos', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:19', '2023-02-03 04:44:19'),
(21, 2020, '$argon2i$v=19$m=65536,t=4,p=1$dHpPSWpyV25PZFR0c3BXYg$fZlUX5kU2WrWR2PIYPICjCMe5rm01G/bcIh44Tv0JRA', 'Humaira Yolanda M.Kom.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:19', '2023-02-03 04:44:19'),
(22, 2021, '$argon2i$v=19$m=65536,t=4,p=1$NmNIR2FpZk5EQnJVWXJWVg$dVnVGx+CbYR9o23/efFB5JVbCABWoxWGazZcBLo7z/M', 'Garda Anggraini S.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:19', '2023-02-03 04:44:19'),
(23, 2022, '$argon2i$v=19$m=65536,t=4,p=1$cDNVTldKVnpDaXNpZUU2Rw$og6N+/TpT9Ru1bVmfo3XbIu1NEHtrVqzRcDSalhA3jk', 'Eman Wahyudin S.Sos', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:19', '2023-02-03 04:44:19'),
(24, 2023, '$argon2i$v=19$m=65536,t=4,p=1$WXpBVWpZcks4MWFSRTB5Vg$VZxKCA+LxytLR+QsN9ReJubjLq/VMJcRK9uzHR1hUW0', 'Sari Gunarto S.Psi', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:20', '2023-02-03 04:44:20'),
(25, 2024, '$argon2i$v=19$m=65536,t=4,p=1$Uy4xMWlpM3lMblVZRzJaUg$i4/+fTb6Ik1DqbfB1Ypreriekuws8ZbaJbzN8NQh76A', 'Putri Sirait M.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:20', '2023-02-03 04:44:20'),
(26, 2025, '$argon2i$v=19$m=65536,t=4,p=1$RkZzYWJMLmJtand4bUJlTw$AY36J3c+TdzDaFgXzZcVc2wRoLICWn6kaBlCOM1GN+Q', 'Hamima Fujiati M.Ak', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:20', '2023-02-03 04:44:20'),
(27, 2026, '$argon2i$v=19$m=65536,t=4,p=1$c3J2Y2V2N2c0eHZXYVJSYw$90hpYTW8wUHML0NOX7Ley/D+8+9WW0dQfwfQd+anUq8', 'Anom Setiawan S.E.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:20', '2023-02-03 04:44:20'),
(28, 2027, '$argon2i$v=19$m=65536,t=4,p=1$UXo3OWRNYnNUZXNtQllOSw$AmTIWrub0CsFlCnpmYqfy/yXmteTB+z4UGXUeQAOfnk', 'Bakiono Mulyani S.E.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:21', '2023-02-03 04:44:21'),
(29, 2028, '$argon2i$v=19$m=65536,t=4,p=1$ZEo2c2kyVzBYa080aDY3SQ$du5wIIZ3z3rtRrDaM1OMObIivHtekM4s7kTh7UHNrfs', 'Amalia Hassanah S.Kom', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:21', '2023-02-03 04:44:21'),
(30, 2029, '$argon2i$v=19$m=65536,t=4,p=1$NVVyZjRDamNKZDlHNUtrTw$NcSfTI70dQvWrKTJSC/DRLHbKb00K1HCiRWFMrBDOeI', 'Lega Wibisono M.TI.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:21', '2023-02-03 04:44:21'),
(31, 2030, '$argon2i$v=19$m=65536,t=4,p=1$VFZsM1Vha3hFWjZzNWkzNA$QPQQaVC1AACoJgiV+dXR1Nc5DZfqMU9ygjpexrslTKQ', 'Ghaliyati Irawan S.Gz', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:21', '2023-02-03 04:44:21'),
(32, 2031, '$argon2i$v=19$m=65536,t=4,p=1$TW5NbDRTenE2M3FLWENFMA$N+o0X+jtibmdEiuIXjEmwuMl8tdMsUyq0MUDeFDA5J8', 'Umi Usada S.Pt', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:22', '2023-02-03 04:44:22'),
(33, 2032, '$argon2i$v=19$m=65536,t=4,p=1$Z0FFWmhUc0gwTFZIOXhuVw$5r4v00J8t93+6CQSC0d8Cr1oGSea1BbAoVmDcUqdwhQ', 'Kayla Maryati S.Gz', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:22', '2023-02-03 04:44:22'),
(34, 2033, '$argon2i$v=19$m=65536,t=4,p=1$VERjb2Y4TldGaHBoN1puQw$b19IBHFs/PJMs7VGZiiAElhaYv7eoE8W616nXou7+wM', 'Carub Hidayanto S.Sos', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:22', '2023-02-03 04:44:22'),
(35, 2034, '$argon2i$v=19$m=65536,t=4,p=1$dlRLdWpwWnJXY0RWZ3VGaw$+qlapE/hUVXAyJac8Ut8ytxAAQCbo0BuIufkzhFq/8o', 'Maimunah Kuswoyo M.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:22', '2023-02-03 04:44:22'),
(36, 2035, '$argon2i$v=19$m=65536,t=4,p=1$UFQxNVBDeWoxeGxmOGZTMw$9PzlCHicpA9UMoiD+Kx/H1KA9bEAtgDcKlhWZgQeS0Q', 'Cahyono Wibowo S.Pt', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:23', '2023-02-03 04:44:23'),
(37, 2036, '$argon2i$v=19$m=65536,t=4,p=1$TGxEN2t5NnBPVGtPUkZxWg$oAZAowtnwoREXxIUZBqHuNlQAUFp0H+xfjD6fB2BBPU', 'Rahmi Suwarno M.Kom.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:23', '2023-02-03 04:44:23'),
(38, 2037, '$argon2i$v=19$m=65536,t=4,p=1$US4uTXpSWGM5YVJUQkZyMA$j+f7b22p/LK36/wJvKvtoNGippaFPpx30A3iduFX0TM', 'Dwi Novitasari S.Kom', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:23', '2023-02-03 04:44:23'),
(39, 2038, '$argon2i$v=19$m=65536,t=4,p=1$N1FPWHhqcVVHT2NGT2JZbg$xfx+MB0OsZlmTFNiiSU/Ph2Ml//QS74Rw693jvtyeBs', 'Ade Zulaika M.M.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:23', '2023-02-03 04:44:23'),
(40, 2039, '$argon2i$v=19$m=65536,t=4,p=1$VlkvbkVYeHRHRFhTTnNpUQ$sRa3C/elXu2BKB38vz0nQScMA4ul1x7eS4Uq22ESnMc', 'Nadia Rajasa S.E.I', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:23', '2023-02-03 04:44:23'),
(41, 2040, '$argon2i$v=19$m=65536,t=4,p=1$amVVZXk0bHNlVTFwNVo3eA$53vgc5ikBRSBdZure4xDOyKJgvCRfhpVV46soktz4zM', 'Gilang Wibisono S.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:24', '2023-02-03 04:44:24'),
(42, 2041, '$argon2i$v=19$m=65536,t=4,p=1$blUvQXMxZmM0elRCZDlLUg$/aICgesU5L3oW+jjIhFUXqdnynHikfgnwJrHEbdKveY', 'Leo Purnawati S.I.Kom', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:24', '2023-02-03 04:44:24'),
(43, 2042, '$argon2i$v=19$m=65536,t=4,p=1$aEdTMzA1S3ZGazc1NDdUcg$J/lDywX10Yk0LyQeq5uoZvNQGoUtCBK1F4wFAKiDJpI', 'Yani Haryanti M.TI.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:24', '2023-02-03 04:44:24'),
(44, 2043, '$argon2i$v=19$m=65536,t=4,p=1$YTVRM1dSVWsuYzJZN3hlQw$VZrZ0XlFwB7s0b49VcMd7LNh4dvKdyPYqt6VN8ybZsA', 'Tirta Manullang S.E.I', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:24', '2023-02-03 04:44:24'),
(45, 2044, '$argon2i$v=19$m=65536,t=4,p=1$cHZhVTY1cm5ETDFuN1IxWQ$bwoOUyN5Zk3ZHHekYLiAeaeZR6CocyR6/JFatRVZnxs', 'Almira Purwanti S.Kom', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:25', '2023-02-03 04:44:25'),
(46, 2045, '$argon2i$v=19$m=65536,t=4,p=1$c0IyV2pYbmpvV09OYWlSZw$tZAtK5ENwfr9Xhz7ZlhsUHAkd1KPSStKbpI0RCeNi2I', 'Lintang Susanti S.H.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:25', '2023-02-03 04:44:25'),
(47, 2046, '$argon2i$v=19$m=65536,t=4,p=1$eHNSS2lSWlBkVFY2bVAzTg$nJkJw/mEw4AH1S0YYh32K1DDHWAeDzpMox0MQXRctvc', 'Tina Saefullah S.Sos', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:25', '2023-02-03 04:44:25'),
(48, 2047, '$argon2i$v=19$m=65536,t=4,p=1$YUROTXpmcE9tV2V3YW40cg$6zBDj4rATHwK7btSbCMSIMJ/bLzCbF1J6RMi8NS6n6I', 'Zizi Fujiati S.H.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:25', '2023-02-03 04:44:25'),
(49, 2048, '$argon2i$v=19$m=65536,t=4,p=1$cW0wQXRQcnVzcGRuV2Q1MA$MoMFVETq+wv9Kwi39cqaokuw3/MMbo3a4Q3E5V6MN9E', 'Nasrullah Yuliarti S.E.', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:26', '2023-02-03 04:44:26'),
(50, 2049, '$argon2i$v=19$m=65536,t=4,p=1$eE1JYWFDVHB4dW95Rk9FWA$YNYzu0RHiaimLeibrzzmP3zqKJntjyf9hHqUcBqj3g8', 'Gangsar Wahyuni S.Pd', 0, 1, 0, 0, 0, 0, 0, '2023-02-03 04:44:26', '2023-02-03 04:44:26'),
(51, 1000, '$argon2i$v=19$m=65536,t=4,p=1$OUhZaHFOTVlPWWdMVkx1WQ$nJNNhJsEzonnuEi0/1Hr88d5LfKn4n4WsbTGY+0CUus', 'Taufik Yolanda', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:13', '2023-02-19 05:28:44'),
(52, 1001, '$argon2i$v=19$m=65536,t=4,p=1$c2dqakVkdlRhYWJIMUhpSg$9AuJC2jcOXg7xhZugnlwlIAItQ2Vn/aYpOc5uXzOPxw', 'Cemplunk Maryati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:13', '2023-02-12 08:45:28'),
(53, 1002, '$argon2i$v=19$m=65536,t=4,p=1$LkxRLzFoL3lldkxKWEZLTw$FdIPkzC3HObcRTk1C5naAIOHd/0mdiQdKsr2SKAgtKs', 'Banara Yuniar', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:13', '2023-02-03 04:45:13'),
(54, 1003, '$argon2i$v=19$m=65536,t=4,p=1$dmxpYmd2M0MublVUazB4QQ$PgC2WF3MrEmSQUldxRbzIg4QQOCBBO7SxkxTCprOpII', 'Uchita Nasyiah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:13', '2023-02-03 04:45:13'),
(55, 1004, '$argon2i$v=19$m=65536,t=4,p=1$RXlVRy5PMXNQelZLbm5pNw$hINmziVt4bklbeAcybxRCwANBk6DTSD7SwWMMaQvs3A', 'Digdaya Aryan0', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:14', '2023-02-03 05:27:26'),
(56, 1005, '$argon2i$v=19$m=65536,t=4,p=1$b2gwemFOUnh3d2EyTmk2eg$voMFYkzKsk3nASbE1wT4+m5I5yBU0u4QMi02Sp+lxuU', 'Oman Laksita', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:14', '2023-02-03 04:45:14'),
(57, 1006, '$argon2i$v=19$m=65536,t=4,p=1$MW40Qmk4dXFCUTljWEdsYw$ViDiqS58qcFCps+sIJt6wRxTcl2Emyu7+lKHD+FTtng', 'Rahmi Hardiansyah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:14', '2023-02-03 04:45:14'),
(58, 1007, '$argon2i$v=19$m=65536,t=4,p=1$VFMyZkhxUEZ0WWN3TG85NA$C9xQK+RyWbZQtiPp1j3WUuGQLKPgB9duyy4A/QPOpiw', 'Hafshah Thamrin', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:14', '2023-02-03 04:45:14'),
(59, 1008, '$argon2i$v=19$m=65536,t=4,p=1$TE9aQlZWTFVJVGtxZE9JcQ$HBXCfCvcYGnbUXRj8Prga/bs5OssAXEmyFG/I/JJMk0', 'Legawa Rahimah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:15', '2023-02-03 04:45:15'),
(60, 1009, '$argon2i$v=19$m=65536,t=4,p=1$cnlhRzVTS3NqeWpTOWNVWQ$6n8o6Mch/9xsn98mBRn+1OR0282MNHZ/DZjwM/MgESQ', 'Cakrawala Marbun', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:15', '2023-02-03 04:45:15'),
(61, 1010, '$argon2i$v=19$m=65536,t=4,p=1$MkNkUGZ2N2hpWDN3enhkMA$qSgn/3mG/IG1lRZ/3wxCBtJFd2kL84MB5Kk+qbPa+do', 'Siska Ardianto', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:15', '2023-02-03 04:45:15'),
(62, 1011, '$argon2i$v=19$m=65536,t=4,p=1$dmEyd1BuYWMwWVpBay9pbQ$jgO/WBZ8U3Nk3+45y3UhzcdpfbC4ERxl9CgvAh0DbMM', 'Rama Yulianti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:15', '2023-02-03 04:45:15'),
(63, 1012, '$argon2i$v=19$m=65536,t=4,p=1$S0M2UnBiLnFIMTFlLlY0eg$yudH6m2Ya9zLbvqGeliyGuw5JVxIWh/Au9Wp8FNtaTk', 'Belinda Zulkarnain', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:16', '2023-02-03 04:45:16'),
(64, 1013, '$argon2i$v=19$m=65536,t=4,p=1$Q2phY090cjNJU0k4RFlHeg$ALoV6S2Ek8dVfn6JXN6Kq+fhuOUVB4kkgiQAtJ50qlw', 'Tira Hasanah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:16', '2023-02-03 04:45:16'),
(65, 1014, '$argon2i$v=19$m=65536,t=4,p=1$UDUwME5LamRvMlhKLk5WeA$2C6aBdu8jbdFG8Udn4N96R5f45kiJ8fCRC1bpcS4apA', 'Asmianto Pranowo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:16', '2023-02-03 04:45:16'),
(66, 1015, '$argon2i$v=19$m=65536,t=4,p=1$dC9mYTEyblZqWHljaU4wLw$WOS1gOLAY/tkSq8u0e8GBZVErtoJjjdTj05ZZyuHxIg', 'Michelle Permadi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:16', '2023-02-03 04:45:16'),
(67, 1016, '$argon2i$v=19$m=65536,t=4,p=1$djBlb0F5S2dNZjZJc3JCaQ$zetXFEMo6gpaG+UX7oIMkXEkP8qZyk36WZbE+6NUsBY', 'Opung Yolanda', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:17', '2023-02-03 04:45:17'),
(68, 1017, '$argon2i$v=19$m=65536,t=4,p=1$dE1QeW85Mm5NeWJobEdPcA$Z/TtroJERQaKQe8KLQDrY0cuALEpqYucE4ebcCAeKF4', 'Zamira Pradana', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:17', '2023-02-03 04:45:17'),
(69, 1018, '$argon2i$v=19$m=65536,t=4,p=1$WXo5VG9qeUlyV2lLWU9FRQ$WzJE0WfEVm/sZ60LA37eswFj/+cWgLWM40IHOjBErbM', 'Dimas Lailasari', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:17', '2023-02-03 04:45:17'),
(70, 1019, '$argon2i$v=19$m=65536,t=4,p=1$bndQSnNjb3BGRXVXRDBwbA$qq4s+GpJRBtRH3pxIg37PdNC7JbSXUMR5j0n/5Xv+Fs', 'Umaya Pertiwi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:17', '2023-02-03 04:45:17'),
(71, 1020, '$argon2i$v=19$m=65536,t=4,p=1$Z2trdDFmNlpwZThmSGJHdw$ptdJB7Oqd2S4b9SnOmQC8UgjBnBnYFK8C6TvW1HQX6Q', 'Hilda Andriani', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:18', '2023-02-03 04:45:18'),
(72, 1021, '$argon2i$v=19$m=65536,t=4,p=1$VTVZNDBSM2hEVVAwTWEubQ$cJYKZhjN3ww9N44izwmDKwOLmaAI+ScV4HDgSDocikY', 'Niyaga Widodo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:18', '2023-02-03 04:45:18'),
(73, 1022, '$argon2i$v=19$m=65536,t=4,p=1$YWtjOUovNGFqMERUVUJOcA$pHBEs85X2e2yr3zGN7ZfJvQErlsQI3aGtTIX2PXCucs', 'Putri Halimah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:18', '2023-02-03 04:45:18'),
(74, 1023, '$argon2i$v=19$m=65536,t=4,p=1$N1pKZ29kS3gybTRMazF5TA$KWH+yalBtd2XfzALVvjHYHhz40D3W4cjMz/xhYwL5bc', 'Ikhsan Fujiati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:18', '2023-02-03 04:45:18'),
(75, 1024, '$argon2i$v=19$m=65536,t=4,p=1$dnQ3ZVNDdzE4Z3JSbEdTNw$u6E5eYIhiGNt+VvoOVUv598wgWgnRSxkyWRGvT3v7QU', 'Ghani Samosir', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:19', '2023-02-03 04:45:19'),
(76, 1025, '$argon2i$v=19$m=65536,t=4,p=1$ZXNtYmEyLldiTDVPOFBFNg$kvw08NoIsWrZ2sE7LeNX9mPGIqI2AHVHINhQuSshe4c', 'Agnes Rahmawati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:19', '2023-02-03 04:45:19'),
(77, 1026, '$argon2i$v=19$m=65536,t=4,p=1$RGVudlNKTGNwbTlKTGwyNA$I3FI2Q4xU1vSuEnQYS2N4CRfqeic9YnLwoYMM/iJskE', 'Arta Rahayu', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:19', '2023-02-03 04:45:19'),
(78, 1027, '$argon2i$v=19$m=65536,t=4,p=1$eUducTVMSDVSZEh4LkRIag$qUF4qvKdwPR1oadTVQI4H/ulWqBsBA9EwNKERvF2Uek', 'Ajimin Permadi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:19', '2023-02-03 04:45:19'),
(79, 1028, '$argon2i$v=19$m=65536,t=4,p=1$aDVORlQzZVRNN0dBZ2JneA$vYezMCO8fQiygepW0OqtFyfQq7Am4SPfMSC/gRKIByM', 'Dalimin Puspita', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:20', '2023-02-03 04:45:20'),
(80, 1029, '$argon2i$v=19$m=65536,t=4,p=1$NXBlelJaSDZRQVRYM25rcA$NoHOtEQE7nAQSiVadq5LcdWN505exCB9uNQUtNFanl4', 'Ade Wahyudin', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:20', '2023-02-03 04:45:20'),
(81, 1030, '$argon2i$v=19$m=65536,t=4,p=1$NTBQMzB4ckFzRGF5akdXVw$0PWtQm9BtaNbCm0dlxWJfWin+UU+rRVhUObI+JF8lKk', 'Tina Nasyiah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:20', '2023-02-03 04:45:20'),
(82, 1031, '$argon2i$v=19$m=65536,t=4,p=1$NVVtTHNnMWpqR2NReE5tSw$x4p6QF2i2eAyPDk2x6FszmTy688ePDNlRULgfV6LPqE', 'Digdaya Hartati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:20', '2023-02-03 04:45:20'),
(83, 1032, '$argon2i$v=19$m=65536,t=4,p=1$T0ZuSm00ajRqd2tvMGRyOA$N70EZj+j08xcYvN4HgSczx6rRtDV8OVyUHICxNZdA+k', 'Kani Nurdiyanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:21', '2023-02-03 04:45:21'),
(84, 1033, '$argon2i$v=19$m=65536,t=4,p=1$ZGJuaUUzekRobU1ubUJCbQ$0edNmafB3kR/AIbdQPbDjVbGXme4VIIb5bjzixUYq70', 'Ajimin Farida', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:21', '2023-02-03 04:45:21'),
(85, 1034, '$argon2i$v=19$m=65536,t=4,p=1$RHV2dDR4L1BPWlpsTDczeQ$PTn+pYElQYZxWEjnDfezZ/K0F0HadatnL9QKkQ5d/2I', 'Margana Yuniar', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:21', '2023-02-03 04:45:21'),
(86, 1035, '$argon2i$v=19$m=65536,t=4,p=1$anlUaFJUeW4xMTRCMTk2UQ$2FxElBpQJHGv+6CtNEhG2sWXaqj1XscbvII7HZNlNx8', 'Maryadi Dabukke', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:21', '2023-02-03 04:45:21'),
(87, 1036, '$argon2i$v=19$m=65536,t=4,p=1$NjBuTXNTV3hXNk9NbzRaSg$LWz+LPWMD+l7dmkg06/Oz0PAxXjMzrxokT/MzD3p6TQ', 'Maras Rahayu', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:22', '2023-02-03 04:45:22'),
(88, 1037, '$argon2i$v=19$m=65536,t=4,p=1$U014cEpHMW1jM0g3SzUucw$RAOpjdf2/4fdX6mNesu12FHyQpCuA5dVLppDFMYp7ts', 'Endah Usamah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:22', '2023-02-03 04:45:22'),
(89, 1038, '$argon2i$v=19$m=65536,t=4,p=1$Lms0SnpqM3I5NDFnRHg4Rw$IQW6btalhO7CSCsnOblPxi9WCcV8daWtFyX1zy+luxc', 'Artawan Wasita', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:22', '2023-02-03 04:45:22'),
(90, 1039, '$argon2i$v=19$m=65536,t=4,p=1$OFRmUlZLdkZoLm1GSHRzVg$ts3pIxteJxLYTvdW2qNa5pl4tdMTytv9jjgB49qC+mc', 'Tomi Saptono', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:22', '2023-02-03 04:45:22'),
(91, 1040, '$argon2i$v=19$m=65536,t=4,p=1$WjFyNVg4ams4RTN4TWQ4cA$sT39BxIDgJqqxVblDSWyzMYjSiO7BWPlo+GoPZclyGg', 'Caket Halimah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:22', '2023-02-03 04:45:22'),
(92, 1041, '$argon2i$v=19$m=65536,t=4,p=1$Y0NGYjNNZVJrV0tYVFFjQg$vwfQTTJDWxHR1xbd0T7b3EhkMh8W+VJU0JB1eTfljVs', 'Tasnim Irawan', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:23', '2023-02-03 04:45:23'),
(93, 1042, '$argon2i$v=19$m=65536,t=4,p=1$Y1cyek9FVWNrQTZSWXZMSw$SPYuXhWma2sM1Gk/x2V8dsREdj2+Eh39DQCtv4tCnlg', 'Hadi Habibi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:23', '2023-02-03 04:45:23'),
(94, 1043, '$argon2i$v=19$m=65536,t=4,p=1$SnFUazNSWmp3Ulp6c210Qg$jO/B5BqWltEoVSPTOocTeBYqdQUQrZbgkLKcTIS/eII', 'Ayu Prakasa', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:23', '2023-02-03 04:45:23'),
(95, 1044, '$argon2i$v=19$m=65536,t=4,p=1$SGRWei9HdlJxMGpidHJKag$+fTkH/t9nWxCKQYzC0jtIZSW1ZMR6EMb3OoZw4TH7K8', 'Zalindra Susanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:23', '2023-02-03 04:45:23'),
(96, 1045, '$argon2i$v=19$m=65536,t=4,p=1$OGc5b3FTVmRxYlRpUWpPWA$rNHK2TyyjJjgyRSSb3/k23T0C+eFJ6W/dWUYCg+PdTU', 'Ade Pratiwi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:24', '2023-02-03 04:45:24'),
(97, 1046, '$argon2i$v=19$m=65536,t=4,p=1$Lm1KMjRucmZEQ29GLzFhbg$sYFnypJsXiYCT+QQEEV9UQhlZf8EgwtNDp2SSWuWJ0A', 'Wirda Nurdiyanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:24', '2023-02-03 04:45:24'),
(98, 1047, '$argon2i$v=19$m=65536,t=4,p=1$Y3k4NXVRUGNCWUxDWkwwNw$A3cwgtSdd+qQP8YUFiRuIac8wbEQ6F7QuepFAJYIq9A', 'Salimah Yulianti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:24', '2023-02-03 04:45:24'),
(99, 1048, '$argon2i$v=19$m=65536,t=4,p=1$LlFTMERqLnA2L25RWFRDNw$lhzasC8LnkG1y6ME3YPlATCIRU6cv/HKtcFHmiM+p38', 'Ratih Gunarto', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:24', '2023-02-03 04:45:24'),
(100, 1049, '$argon2i$v=19$m=65536,t=4,p=1$Y2JjckxTNnJpZ2N1QjZHcQ$4d271vLkV4msbDWFGRDd1lWLULdCAO0YifGASEpGq24', 'Simon Pertiwi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:25', '2023-02-03 04:45:25'),
(101, 1050, '$argon2i$v=19$m=65536,t=4,p=1$UGRCdTNOZkdZemRGNkFndA$B8OBQGlmBPBLFtmJ0I3C9ASQPl2QwvwFxPZEiXdhFW8', 'Niyaga Sihombing', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:25', '2023-02-03 04:45:25'),
(102, 1051, '$argon2i$v=19$m=65536,t=4,p=1$VGVkMS9mU2lldlNSbTFrUg$LpTjJmBzqaSiFcJR+ITVNyTpv1czZFWfxt4NByJqRws', 'Eli Pradana', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:25', '2023-02-03 04:45:25'),
(103, 1052, '$argon2i$v=19$m=65536,t=4,p=1$YjVzSkZMQnRtWjBTY1RQTg$T60XmjVx3E95jLH4Kdv0v4nX2JY1wUA9AzhPaM53lDI', 'Baktianto Anggraini', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:25', '2023-02-03 04:45:25'),
(104, 1053, '$argon2i$v=19$m=65536,t=4,p=1$REY1ekpVQzdOcTgvTXY0bg$yLn+pvta1tftyJgYtkFu3D5AqFG72UBKAlNTmIwTXc0', 'Nabila Sihombing', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:26', '2023-02-03 04:45:26'),
(105, 1054, '$argon2i$v=19$m=65536,t=4,p=1$bEgwQ3Rib09XVFJnWXdaWA$4JLU7ivtxBbPHqttgXk/u9GnGpu2eb7h8fxUQJd68N4', 'Utama Setiawan', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:26', '2023-02-03 04:45:26'),
(106, 1055, '$argon2i$v=19$m=65536,t=4,p=1$NC9pQXNvbHNpNFVrTzFaMw$S22kbphuhnrQruWWVY+8F3vpWkFS5k3dUOJlqKFVZis', 'Pia Saragih', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:26', '2023-02-03 04:45:26'),
(107, 1056, '$argon2i$v=19$m=65536,t=4,p=1$T0UybFhOUUpnMUR4R3Fzag$yW3z0NDOCmB8/ttKtYYThC1ztSVd+0DAJu/r0+FXyIQ', 'Aisyah Utami', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:26', '2023-02-03 04:45:26'),
(108, 1057, '$argon2i$v=19$m=65536,t=4,p=1$M2hhMDhqVHlqREFNWkhIZw$Xp6Xv6n0K+yajwSlbjlxrF38Nds3aFJsO84g5Wyc6lA', 'Ajeng Prabowo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:27', '2023-02-03 04:45:27'),
(109, 1058, '$argon2i$v=19$m=65536,t=4,p=1$bDZ5T3RlWEI0WFFFRlkzRQ$wfNDp1tozm+Ql0lfm78FyrZRPpxZJ8bAbxudDUW2KeQ', 'Ellis Farida', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:27', '2023-02-03 04:45:27'),
(110, 1059, '$argon2i$v=19$m=65536,t=4,p=1$WVpmT2J2WTN1Q0V6eU1pbg$LbV/8ikxUjmYeteW6l5fbMyKIp/epuPoeagLCoJVYy0', 'Mila Puspasari', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:27', '2023-02-03 04:45:27'),
(111, 1060, '$argon2i$v=19$m=65536,t=4,p=1$L0EwU3U5b08wZzVkUDlFQQ$p13AtuSqCy1fWMV9PXj52wfoNVyoJvJAk/HkmAVi1Hk', 'Ella Wijayanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:27', '2023-02-03 04:45:27'),
(112, 1061, '$argon2i$v=19$m=65536,t=4,p=1$T21STC5pd3NHRVBuVFZpcg$CGYfxjtqQyeLw6eLjz+QcZVv48D6LuLPs8vCR9K0PQE', 'Dian Purwanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:27', '2023-02-03 04:45:27'),
(113, 1062, '$argon2i$v=19$m=65536,t=4,p=1$cTNUSFFUYk1PWW5KN09RcQ$V7SUxykP+rqqA78rW/VJD7ObCf3WHY21UIPg5kjv5TQ', 'Padma Sudiati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:28', '2023-02-03 04:45:28'),
(114, 1063, '$argon2i$v=19$m=65536,t=4,p=1$R1hhZ1c3dTFxdzdUcFRZbA$hR1oHnWSMJDIuWkoTszw6JCTPhAkqJA/4922kbUP5Uk', 'Lega Hasanah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:28', '2023-02-03 04:45:28'),
(115, 1064, '$argon2i$v=19$m=65536,t=4,p=1$cnFjdEFDdDd4c2toMWw2dA$fiOMixLnRsgCfce5Tmerx9qqI8keOTpsEJ6TpgualhA', 'Kurnia Agustina', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:28', '2023-02-03 04:45:28'),
(116, 1065, '$argon2i$v=19$m=65536,t=4,p=1$V2taeEpManVxc3dnbDVkYQ$VFFAMoDBCiICNUfhvHr0oAASNhI6iLEdm+e6Bphs+ok', 'Rahayu Usada', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:28', '2023-02-03 04:45:28'),
(117, 1066, '$argon2i$v=19$m=65536,t=4,p=1$T0V2YnJRQ08xcm1tL0taSQ$k1gXRvT6mkLnXnmBfjADBPUXhEYooyNUuMMREAjuQpg', 'Yahya Saptono', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:29', '2023-02-03 04:45:29'),
(118, 1067, '$argon2i$v=19$m=65536,t=4,p=1$YW1QL24yLlNFSG9JcDlpSg$TGFFsZgxwQ73EBpEUTOdkn+T0/ACIrXSzXYc0JPjoFM', 'Aisyah Suryatmi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:29', '2023-02-03 04:45:29'),
(119, 1068, '$argon2i$v=19$m=65536,t=4,p=1$L3JRSGE4dEVnL3hDczJrLg$6wGpo0/shAUg3MPeb3yy7w4QLvzV7jajqgYpUlG0LE0', 'Asmianto Anggraini', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:29', '2023-02-03 04:45:29'),
(120, 1069, '$argon2i$v=19$m=65536,t=4,p=1$aXpUd29ra3duTm9EOUhHUw$03m+2/qqWI+3pKQH9TIFrTmArD1z+BWU70xs+8nqe/I', 'Asmuni Usada', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:29', '2023-02-03 04:45:29'),
(121, 1070, '$argon2i$v=19$m=65536,t=4,p=1$M3lnYWxGMXFrRDFWV3RFZQ$PbfNV8d4FEMwObVNmx35MWHZfjqvI6VM7O5xm+K6HBI', 'Ilsa Simbolon', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:30', '2023-02-03 04:45:30'),
(122, 1071, '$argon2i$v=19$m=65536,t=4,p=1$azBGZEI3a3VxaU40cnR3cg$j5UVAO14FKXmujBfdwCRa/4xrGDCOsXkId2iTsFkef0', 'Natalia Mangunsong', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:30', '2023-02-03 04:45:30'),
(123, 1072, '$argon2i$v=19$m=65536,t=4,p=1$cllhUEJoWUpna1RHOGpvbQ$Q38ZSwOQ2fqWGxo+6LLt5k+X33R3s0zOdT80sMXXspo', 'Upik Habibi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:30', '2023-02-03 04:45:30'),
(124, 1073, '$argon2i$v=19$m=65536,t=4,p=1$YXZWa2VicGV1N0JZZDZlOA$ww6TqpuQBWzlX6WwzhJD6gOagoJC47SXXJwAGJdwJ+E', 'Hari Nainggolan', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:30', '2023-02-03 04:45:30'),
(125, 1074, '$argon2i$v=19$m=65536,t=4,p=1$ZXNPaEg4NTUvSlpiOXY4QQ$Zm+Sm7BwriDaIeSBbDUAvjMpIkq7rdUW+Uya0Ucv42c', 'Xanana Waluyo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:31', '2023-02-03 04:45:31'),
(126, 1075, '$argon2i$v=19$m=65536,t=4,p=1$QkdlVDZ5dUdWN0dncGl1Yg$bM33dhdlt0aq4wNFEVncqa3KhIc8+lbvDXSW9Rikvzg', 'Ina Waluyo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:31', '2023-02-03 04:45:31'),
(127, 1076, '$argon2i$v=19$m=65536,t=4,p=1$blNCTWU1cHBQQzVpSGdOMA$X9XE/DMUrONAGLbENyjutxGWNYz140Vt3G3vRt28Kuc', 'Hesti Firgantoro', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:31', '2023-02-03 04:45:31'),
(128, 1077, '$argon2i$v=19$m=65536,t=4,p=1$aThzVW9MTTZZQkkuVVRxMg$dyAeP+hnFII59DpqNqZWgedVKNBoaqtwf7KOVnIUhM4', 'Salsabila Rahayu', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:31', '2023-02-03 04:45:31'),
(129, 1078, '$argon2i$v=19$m=65536,t=4,p=1$MFR0Z2NULjNEY1RwQkpkag$8aIgcQTsVQRIao0fkJyXk33r14iaqy22+4aXb+oQSdM', 'Ikhsan Megantara', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:32', '2023-02-03 04:45:32'),
(130, 1079, '$argon2i$v=19$m=65536,t=4,p=1$SW1wVXV6ZXRwRmp5Z0ZsdQ$fQrUE37AcmW2v5a1+1NVR7mi6ZsKCAN3bk3rz5FAySY', 'Adika Usamah', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:32', '2023-02-03 04:45:32'),
(131, 1080, '$argon2i$v=19$m=65536,t=4,p=1$S3NJQmRIS1NpbS9pZnQudg$hYHhyKAGh8Kt6FgtmW4D+E7Ffa/FxYwAv66vDU9oYhM', 'Anastasia Permata', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:32', '2023-02-03 04:45:32'),
(132, 1081, '$argon2i$v=19$m=65536,t=4,p=1$UGxjV0FyTUpZTmRCdDh0aw$xQuwERHgyR3AEcKzZ9Yc+NjYrF0FgfsNyFXkLfibM0c', 'Amelia Wijayanti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:32', '2023-02-03 04:45:32'),
(133, 1082, '$argon2i$v=19$m=65536,t=4,p=1$TVFKT3pJT0w4U3MwV0RRLg$B7Z1XaTf8brTbQ0tdMWRvQiGw+GkPeJ2nps3Eyi+GKo', 'Lembah Mansur', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:33', '2023-02-03 04:45:33'),
(134, 1083, '$argon2i$v=19$m=65536,t=4,p=1$ZGl6YnFqMU9xZ2xOR3ZUZQ$8dPiS6gMWyDm6CI64Jn6FGXhOMkwR2RX6PnrF81Y3iQ', 'Salimah Pranowo', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:33', '2023-02-03 04:45:33'),
(135, 1084, '$argon2i$v=19$m=65536,t=4,p=1$OVI1SnRzQ29qZzl3Vi45Tg$IYHAlv2BQOcEoGi3FqFMxZfCWhkJfdHU/CYdJC087LY', 'Raisa Irawan', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:33', '2023-02-03 04:45:33'),
(136, 1085, '$argon2i$v=19$m=65536,t=4,p=1$WDM1bVh6Mmt2VnYyUkZ0MA$T1JgAHyOYgN2tOgv6+W9aCQV9kKJwb2m1n3R6K9BAIo', 'Mulya Permadi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:33', '2023-02-03 04:45:33'),
(137, 1086, '$argon2i$v=19$m=65536,t=4,p=1$am5IN0dpcjJ3aTdlaFB0TA$E+IVKDDCk8925gXAldBSumKn7gZjsYVHdk4Gg5cBCh0', 'Puput Nuraini', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:33', '2023-02-03 04:45:33'),
(138, 1087, '$argon2i$v=19$m=65536,t=4,p=1$aElxWGs5UkxtTTRxYno5NQ$35yRXJHOYazcTtlFIONxBFWqEse0l3erY1EaV0pnogU', 'Gantar Astuti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:34', '2023-02-03 04:45:34'),
(139, 1088, '$argon2i$v=19$m=65536,t=4,p=1$ODBsUm52Vi95SUtyd2ZhRw$KlJciiLFSo7Gesl20HJqCdbedQbjoTVPH8JnFnxOjJE', 'Zahra Puspita', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:34', '2023-02-03 04:45:34'),
(140, 1089, '$argon2i$v=19$m=65536,t=4,p=1$Q04zY1JhVkRJUXBMWlhXMA$xSg8QSSN5ULcgka9d0owvOVA2/gQ7SxlGdl+71/7U3I', 'Ciaobella Lazuardi', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:34', '2023-02-03 04:45:34'),
(141, 1090, '$argon2i$v=19$m=65536,t=4,p=1$Z2ZGR1ltVmtsWEtYMzBXRw$bTVn/BWT7Skhagh71sU4WJzXbgqCtnznpFx54KcOGws', 'Jamalia Ramadan', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:34', '2023-02-03 04:45:34'),
(142, 1091, '$argon2i$v=19$m=65536,t=4,p=1$Zy9NNnFXNklYOHBENW9YMg$GIAvRr+emLs9ebPVisOx8qkWMmjUGvKZsERKUjbbxhk', 'Gilang Yuliarti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:35', '2023-02-03 04:45:35'),
(143, 1092, '$argon2i$v=19$m=65536,t=4,p=1$cFJEeW1lWjZGWW9sbWszSg$+sJ9J3OiLXOyVfAWZCXLDBGh02ivA0GLGhDdBbw57Mo', 'Paulin Yulianti', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:35', '2023-02-03 04:45:35'),
(144, 1093, '$argon2i$v=19$m=65536,t=4,p=1$VUJuM3p6eTBtajB6bnhNNg$lm0/qtajIJbM2ZIJJ1x2wA4R5MFBJhn7rK9Y+NZzRmM', 'Vera Maryati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:35', '2023-02-03 04:45:35'),
(145, 1094, '$argon2i$v=19$m=65536,t=4,p=1$MFRiOW1GLkJHRmJYUHZJbQ$J93a4Zs59SrE1J7sAj8I2Zu1ugH6ttokbxK8CkKgIHc', 'Utama Suwarno', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:35', '2023-02-03 04:45:35'),
(146, 1095, '$argon2i$v=19$m=65536,t=4,p=1$Nkp0MzhpeVZ0QnhxUElGLw$kYIOWH1GNw6CO2msZTp1xIojFMHP1aFXvOMYTARCv7k', 'Muhammad Namaga', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:36', '2023-02-03 04:45:36'),
(147, 1096, '$argon2i$v=19$m=65536,t=4,p=1$ejBRMTBlcS5pSHliTEJoOQ$/BvtHDVMidukcQ+Uy/i00FE2MCvVsQ4inUHcaW8bpDE', 'Juli Usada', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:36', '2023-02-03 04:45:36'),
(148, 1097, '$argon2i$v=19$m=65536,t=4,p=1$Vi44bkxSZncuSlFkN0ZQYg$Rdy3yGwwJKpkrpRSk4IqGfzGyXDx9X3/FKF8M4To3Kg', 'Prayitna Sudiati', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:36', '2023-02-03 04:45:36'),
(149, 1098, '$argon2i$v=19$m=65536,t=4,p=1$dTRsbkUyNVlKbUVZdlB6OQ$eFCBzJrEbt8/0fHMpWok/ANNCyd/Cp5kzdyp5pEdkiY', 'Galur Rajasa', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:36', '2023-02-03 04:45:36'),
(150, 1099, '$argon2i$v=19$m=65536,t=4,p=1$WnVJMklEdWh3U1Vxc0VnQw$G4q+5wPxZetq37PCeilNw50WSkfE55fJD+CXFU7uwMU', 'Restu Mustofa', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 04:45:37', '2023-02-03 04:45:37'),
(151, 1, '$argon2i$v=19$m=65536,t=4,p=1$NWliSjM5QW5tZmZ0Mk1VbQ$FoDE7Q+KC0D9OLR+FOKn9fjmhdZwRSQLZ0NBzq3qJw8', 'Yogi M6', 1, 0, 0, 0, 0, 0, 0, '2023-02-03 05:39:26', '2023-02-03 08:41:51'),
(152, 26, '$argon2i$v=19$m=65536,t=4,p=1$RzVWcGZWLnFyR2Z0N0ZSVg$YLqLmgagVXmfg3445tZMvyf9n3Ywn7ujD9xk7xDxrro', 'Yogi Testing 1', 1, 0, 0, 0, 0, 0, 0, '2023-03-01 09:04:47', '2023-03-01 09:04:47'),
(153, 2017051062, '$argon2i$v=19$m=65536,t=4,p=1$WVBKd0V3Q3dLYXJvcWg5Tw$XfO8Rllc620+Gis6Q7Xw5BzB3h9WWughd8t90x575Yc', 'Yogi Mahasiswa 1', 1, 0, 0, 0, 0, 0, 0, '2023-03-01 09:55:42', '2023-03-01 09:55:42'),
(154, 3000, '$argon2i$v=19$m=65536,t=4,p=1$ZzRBUC9iV05GdXNBczlEZw$x7GyVt1xCwL3z/De0ckr39jWbA9pk9fbn4dz40goOXE', 'Yogi Dosen Koor 1', 0, 1, 1, 0, 0, 0, 0, '2023-03-01 10:11:14', '2023-03-01 10:11:14'),
(155, 4000, '$argon2i$v=19$m=65536,t=4,p=1$akUuaWdEdW1jUU5JYVo3Qg$2iqmwJj41Ha5gkPK6f6n6YOvXt0pCFHASz4YvTnq+vQ', 'Yogi Admin 1', 0, 0, 0, 0, 0, 1, 0, '2023-03-01 10:17:14', '2023-03-01 10:17:14'),
(156, 5000, '$argon2i$v=19$m=65536,t=4,p=1$ODNNOWFGaHdiUlVEa3NINA$o+I0RfeqwKy9MALDFLPdInCLjlNhe5cqxYSykzRXVoE', 'Yogi Superadmin 1', 0, 0, 0, 0, 1, 0, 0, '2023-03-01 10:17:51', '2023-03-01 10:17:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas_kelengkapan`
--
ALTER TABLE `berkas_kelengkapan`
  ADD PRIMARY KEY (`id_berkas_kelengkapan`);

--
-- Indeks untuk tabel `berkas_template_seminar`
--
ALTER TABLE `berkas_template_seminar`
  ADD PRIMARY KEY (`id_berkas_template_seminar`);

--
-- Indeks untuk tabel `bukti_seminar_pkl`
--
ALTER TABLE `bukti_seminar_pkl`
  ADD PRIMARY KEY (`id_bukti_seminar_pkl`),
  ADD KEY `bukti_seminar_pkl_id_pkl_foreign` (`id_pkl`);

--
-- Indeks untuk tabel `jadwal_seminar_pkl`
--
ALTER TABLE `jadwal_seminar_pkl`
  ADD PRIMARY KEY (`id_jadwal_seminar_pkl`),
  ADD KEY `jadwal_seminar_pkl_id_lokasi_seminar_foreign` (`id_lokasi_seminar`),
  ADD KEY `jadwal_seminar_pkl_id_pkl_foreign` (`id_pkl`);

--
-- Indeks untuk tabel `lokasi_seminar`
--
ALTER TABLE `lokasi_seminar`
  ADD PRIMARY KEY (`id_lokasi_seminar`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pkl_mahasiswa`
--
ALTER TABLE `pkl_mahasiswa`
  ADD PRIMARY KEY (`id_pkl`),
  ADD KEY `pkl_mahasiswa_id_user_foreign` (`id_user`),
  ADD KEY `pkl_mahasiswa_dosen_pembimbing_pkl_foreign` (`dosen_pembimbing_pkl`);

--
-- Indeks untuk tabel `profile_mahasiswa`
--
ALTER TABLE `profile_mahasiswa`
  ADD PRIMARY KEY (`id_profile_mahasiswa`),
  ADD KEY `profile_mahasiswa_id_user_foreign` (`id_user`),
  ADD KEY `profile_mahasiswa_dosen_pembimbing_akademik_foreign` (`dosen_pembimbing_akademik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas_kelengkapan`
--
ALTER TABLE `berkas_kelengkapan`
  MODIFY `id_berkas_kelengkapan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berkas_template_seminar`
--
ALTER TABLE `berkas_template_seminar`
  MODIFY `id_berkas_template_seminar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bukti_seminar_pkl`
--
ALTER TABLE `bukti_seminar_pkl`
  MODIFY `id_bukti_seminar_pkl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal_seminar_pkl`
--
ALTER TABLE `jadwal_seminar_pkl`
  MODIFY `id_jadwal_seminar_pkl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi_seminar`
--
ALTER TABLE `lokasi_seminar`
  MODIFY `id_lokasi_seminar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pkl_mahasiswa`
--
ALTER TABLE `pkl_mahasiswa`
  MODIFY `id_pkl` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `profile_mahasiswa`
--
ALTER TABLE `profile_mahasiswa`
  MODIFY `id_profile_mahasiswa` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti_seminar_pkl`
--
ALTER TABLE `bukti_seminar_pkl`
  ADD CONSTRAINT `bukti_seminar_pkl_id_pkl_foreign` FOREIGN KEY (`id_pkl`) REFERENCES `pkl_mahasiswa` (`id_pkl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_seminar_pkl`
--
ALTER TABLE `jadwal_seminar_pkl`
  ADD CONSTRAINT `jadwal_seminar_pkl_id_lokasi_seminar_foreign` FOREIGN KEY (`id_lokasi_seminar`) REFERENCES `lokasi_seminar` (`id_lokasi_seminar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_seminar_pkl_id_pkl_foreign` FOREIGN KEY (`id_pkl`) REFERENCES `pkl_mahasiswa` (`id_pkl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pkl_mahasiswa`
--
ALTER TABLE `pkl_mahasiswa`
  ADD CONSTRAINT `pkl_mahasiswa_dosen_pembimbing_pkl_foreign` FOREIGN KEY (`dosen_pembimbing_pkl`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pkl_mahasiswa_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile_mahasiswa`
--
ALTER TABLE `profile_mahasiswa`
  ADD CONSTRAINT `profile_mahasiswa_dosen_pembimbing_akademik_foreign` FOREIGN KEY (`dosen_pembimbing_akademik`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_mahasiswa_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
