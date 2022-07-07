-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 10.02
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `republ23_santrimart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `timesend` date NOT NULL,
  `status` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `msg`, `photo`, `timesend`, `status`) VALUES
(110, 10, 1, '', '626caff6823e1.png', '2022-04-30', 'sudah'),
(111, 10, 1, '', '626cb0221407f.png', '2022-04-30', 'sudah'),
(112, 10, 1, '', '626cb095433c3.png', '2022-04-30', 'sudah'),
(113, 10, 1, '', '626cbbfb60d8e.png', '2022-04-30', 'sudah'),
(114, 10, 1, '', '626cbfbc30542.png', '2022-04-30', 'sudah'),
(115, 10, 7, '', '626cbfef6e422.png', '2022-04-30', 'sudah'),
(116, 10, 7, 's', '', '2022-04-30', 'sudah'),
(117, 10, 1, '', '626cc01a9f1e1.png', '2022-04-30', 'sudah'),
(118, 10, 8, '', '626cc034354c7.png', '2022-04-30', 'sudah'),
(119, 10, 7, 'sa', '', '2022-04-30', 'sudah'),
(120, 10, 6, 'sa', '', '2022-04-30', 'sudah'),
(121, 10, 7, '', '626cc102012a4.png', '2022-04-30', 'sudah'),
(122, 10, 7, '', '626cc1e0249a5.png', '2022-04-30', 'sudah'),
(123, 10, 9, 'Terimakasih ', '', '2022-05-25', 'sudah'),
(124, 10, 1, 'hai', '', '2022-05-27', 'sudah'),
(125, 10, 1, '', '6290fef1d6d3b.png', '2022-05-27', 'sudah'),
(126, 10, 7, 'Tes', '', '2022-06-01', 'sudah'),
(127, 12, 8, 'halo', '', '2022-06-02', 'sudah'),
(128, 14, 13, '', '629b4fab74ee1.png', '2022-06-04', 'sudah'),
(129, 12, 8, 'haloo', '', '2022-06-10', 'sudah'),
(130, 12, 8, 'haloo', '', '2022-06-10', 'sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(12) NOT NULL,
  `id_member` int(12) NOT NULL,
  `kd_barang` varchar(22) NOT NULL,
  `kd_toko` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_member`, `kd_barang`, `kd_toko`, `status`) VALUES
(90, 0, '', '', 'keranjang'),
(91, 9, '347634', '123 ', 'keranjang'),
(92, 9, '347634', '123 ', 'keranjang'),
(93, 9, '347634', '123 ', 'keranjang'),
(94, 9, '347634', '123 ', 'keranjang'),
(95, 9, '347634', '123 ', 'keranjang'),
(96, 9, '347634', '123 ', 'keranjang'),
(97, 9, '347634', '123 ', 'keranjang'),
(98, 9, '347634', '123 ', 'keranjang'),
(99, 9, '347634', '123 ', 'keranjang'),
(100, 9, '347634', '123 ', 'keranjang'),
(101, 9, '347634', '123 ', 'keranjang'),
(149, 10, 'H-0001', '123 ', 'keranjang'),
(150, 10, 'P-0001', '123 ', 'keranjang'),
(151, 10, 'H-0001', '123', 'keranjang'),
(152, 10, 'H-0001', '123 ', 'keranjang'),
(160, 10, 'H-0001', '123', 'keranjang'),
(161, 10, 'H-0001', '123', 'keranjang'),
(162, 10, 'H-0001', '123', 'keranjang'),
(170, 14, 'H-0001', '123 ', 'keranjang'),
(180, 12, 'H-0001', '123', 'keranjang'),
(181, 12, 'H-0001', '123 ', 'keranjang'),
(182, 12, 'H-0001', '123 ', 'keranjang'),
(184, 12, 'H-0001', '123 ', 'keranjang'),
(185, 12, 'H-0001', '123', 'keranjang'),
(186, 12, 'H-0001', '123', 'keranjang'),
(187, 12, 'P-0001', '123', 'keranjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `kd_barang` varchar(500) NOT NULL,
  `nm_barang` varchar(1000) NOT NULL,
  `kd_satuan` varchar(100) NOT NULL,
  `kd_kategori` varchar(100) NOT NULL,
  `kd_merchant` varchar(12) NOT NULL,
  `kd_toko` varchar(10) DEFAULT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `panjang` varchar(100) DEFAULT NULL,
  `lebar` varchar(100) DEFAULT NULL,
  `tinggi` varchar(100) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `hrg_beli` varchar(255) NOT NULL,
  `hrg_grosir` varchar(255) NOT NULL,
  `hrg_jual` varchar(255) NOT NULL,
  `diskon` varchar(255) DEFAULT NULL,
  `hrg_jual_disk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`kd_barang`, `nm_barang`, `kd_satuan`, `kd_kategori`, `kd_merchant`, `kd_toko`, `deskripsi`, `panjang`, `lebar`, `tinggi`, `warna`, `tipe`, `merek`, `hrg_beli`, `hrg_grosir`, `hrg_jual`, `diskon`, `hrg_jual_disk`) VALUES
('H-0001', 'Topi santri', '3', '1', '7', '123', 'Topi santri', '', '2300', '2300', '', '', '11', '10000', '13000', '15000', '', ''),
('J-0001', 'Jaket Sport Santri', '3', '27', '8', '123', 'Jaket Sport Santri', '', '', '', '', '', '11', '115000', '145000', '155000', '10', ''),
('K-0001', 'Kaos Oblong Santri', '3', '24', '7', '123', 'Kaos Oblong Santri', '', '2480', '2480', 'Merah', 'Oblong', '11', '60000', '65000', '67500', '', ''),
('P-0001', 'Kaos Polo Santri', '3', '24', '8', '123', 'Kaos Polo Santri', '', '3500', '2412', 'Merah', 'Polo', '11', '70000', '76000', '78000', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang_gambar`
--

CREATE TABLE `tabel_barang_gambar` (
  `id_gmbr` int(255) NOT NULL,
  `id_brg` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `ket` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_barang_gambar`
--

INSERT INTO `tabel_barang_gambar` (`id_gmbr`, `id_brg`, `gambar`, `ket`) VALUES
(241, 'J-0001', '62952d02a70e6.jpg,kosong,kosong', ''),
(240, 'K-0001', '62952cbfdac58.jpg,kosong,kosong', ''),
(239, 'P-0001', '62952c4fa5d47.jpg,kosong,kosong', ''),
(238, 'H-0001', '62952ad78b08d.jpg,kosong,kosong', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_bukti_pembayaran`
--

CREATE TABLE `tabel_bukti_pembayaran` (
  `id_bukti` varchar(50) NOT NULL,
  `gmb_bukti` varchar(1000) NOT NULL,
  `ket_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_bukti_pembayaran`
--

INSERT INTO `tabel_bukti_pembayaran` (`id_bukti`, `gmb_bukti`, `ket_bukti`) VALUES
('10', '6290fbb0369b9.jpeg', 'belum diverifikasi'),
('10', '62918c5958401.jpg', 'belum diverifikasi'),
('10', '62931cc9ae12b.jpg', 'belum diverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_comment`
--

CREATE TABLE `tabel_comment` (
  `id` int(21) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `photo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `story` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_comment`
--

INSERT INTO `tabel_comment` (`id`, `nama`, `no_telepon`, `photo`, `story`, `date`) VALUES
(1, 'Viky', 'Aplikasi ini s', '2.jpg', 'Aplikasi ini sangat membantu saya berbelanja dengan cepat dan  mudah serta banyak promo yang dapat saya gunakandsa', '2022-04-04'),
(11, 'viky', '08129', '2.jpg', 'das                                                 ', '2022-04-05'),
(12, 'vik', '0819234', '2.jpg', 'dsa                                                 ', '2022-04-05'),
(13, 'df', 'dsa', '1.jpg', '                                               dsa  ', '2022-04-07'),
(14, 'admin', 'das', '', 'sad                        ', '2022-05-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_comment_barang`
--

CREATE TABLE `tabel_comment_barang` (
  `id` int(10) NOT NULL,
  `id_brg` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `comment` tinyblob NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_comment_barang`
--

INSERT INTO `tabel_comment_barang` (`id`, `id_brg`, `nama`, `comment`, `date`) VALUES
(1, 0, 'koko', 0x746573, '2022-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_info`
--

CREATE TABLE `tabel_info` (
  `id_info` int(255) NOT NULL,
  `kd_kategori_info` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `subjudul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `informasi` varchar(1000) NOT NULL,
  `suka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_info`
--

INSERT INTO `tabel_info` (`id_info`, `kd_kategori_info`, `judul`, `subjudul`, `penulis`, `tanggal`, `informasi`, `suka`) VALUES
(1, 0, 'Bulan promosi', 'Beli apa aja potong harga', 'admin', '', 'Potong harga dari 5%-50% untuk pembelian dengan kartu member', ''),
(2, 0, 'Bayar besok', 'Beli sekarang bayar besok', '', '', 'Beli sekarang bayar besok', ''),
(11, 1, 'ekrhfker', 'ijof efje', 'admin', '2022-02-20 11:00:32', 'Isi disini eheuy', ''),
(12, 1, 'qwerty', 'zxcvbn', 'admin', '', '...', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_info_gambar`
--

CREATE TABLE `tabel_info_gambar` (
  `id_gmbr` int(255) NOT NULL,
  `id_info` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `ket` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_info_gambar`
--

INSERT INTO `tabel_info_gambar` (`id_gmbr`, `id_info`, `gambar`, `ket`) VALUES
(1, '1', 'info.jpg', ''),
(2, '2', 'info.jpg', ''),
(8, '11', '6211bd64cc749.jpg', ''),
(9, '12', '6211bd64cc749.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_info_pembayaran`
--

CREATE TABLE `tabel_info_pembayaran` (
  `id_info_pembayaran` int(11) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori_barang`
--

CREATE TABLE `tabel_kategori_barang` (
  `kd_kategori` int(255) NOT NULL,
  `nm_kategori` varchar(500) NOT NULL,
  `form` varchar(25) NOT NULL,
  `ikon_kategori` varchar(500) NOT NULL DEFAULT 'default_kategori.png',
  `varian` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_kategori_barang`
--

INSERT INTO `tabel_kategori_barang` (`kd_kategori`, `nm_kategori`, `form`, `ikon_kategori`, `varian`) VALUES
(1, 'Topi', 'sf', 'topi.png', ''),
(24, 'Kaos', 'sf', 'kaos.png', 'warna,type'),
(27, 'Jaket', 'sf', 'jaket.png', 'panjang,lebar,tinggi,warna,type');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori_info`
--

CREATE TABLE `tabel_kategori_info` (
  `kd_kategori_info` int(255) NOT NULL,
  `nm_kategori_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_kategori_info`
--

INSERT INTO `tabel_kategori_info` (`kd_kategori_info`, `nm_kategori_info`) VALUES
(1, 'kaos'),
(2, 'hhjb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_medsos_toko`
--

CREATE TABLE `tabel_medsos_toko` (
  `id` int(11) NOT NULL,
  `id_toko` varchar(225) NOT NULL,
  `twitter` varchar(225) DEFAULT NULL,
  `facebook` varchar(225) DEFAULT NULL,
  `google` varchar(225) DEFAULT NULL,
  `tiktok` varchar(225) DEFAULT NULL,
  `instagram` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_medsos_toko`
--

INSERT INTO `tabel_medsos_toko` (`id`, `id_toko`, `twitter`, `facebook`, `google`, `tiktok`, `instagram`) VALUES
(3, '123', 'rfkw', 'jfnjk', ',ngfj', 'dkfg', 'ekrh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_member`
--

CREATE TABLE `tabel_member` (
  `id_user` int(255) NOT NULL,
  `kode_user` varchar(16) NOT NULL,
  `kd_toko` varchar(15) DEFAULT NULL,
  `nm_user` varchar(25) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `alamat_user` varchar(500) NOT NULL,
  `password` varchar(35) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `stt_user` varchar(500) NOT NULL,
  `on` int(100) NOT NULL,
  `log` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_member`
--

INSERT INTO `tabel_member` (`id_user`, `kode_user`, `kd_toko`, `nm_user`, `email_user`, `alamat_user`, `password`, `pass_user`, `foto`, `hp`, `akses`, `stt_user`, `on`, `log`) VALUES
(1, '1277869792', '123', 'admin', 'admin_ovent@gmail.com', '', 'e9af23dd5a45126ff689eba7bb2146bb', '123', 'admin.jpg', '', 'admin', '0', 0, '2022-07-06 13:17:56'),
(6, '683077238', '', 'koko', 'admin@republicvisual.com', '', 'e9af23dd5a45126ff689eba7bb2146bb', '123', 'user.jpg', '085959188887', 'member', '0', 0, '2022-07-07 11:40:46'),
(7, '222662633', '123', 'jatmiko', 'rock_id@ymail.com', 'malang', 'e9af23dd5a45126ff689eba7bb2146bb', '123', '', '', 'merchant', '0', 0, '2022-07-06 11:27:05'),
(8, '1406561427', '123', 'republic', 'sablenkcoco@gmail.com', '', 'e9af23dd5a45126ff689eba7bb2146bb', '123', '', '', 'merchant', '0', 0, ''),
(9, '1930579037', NULL, 'vikylorent', 'viky2311@gmail.com', 'pondok delta b.72', '3c2c33f3e8f2ecfcd6132a545583fa67', 'viky2311', '', '081393597900', 'member', '0', 0, ''),
(10, '262550057', NULL, 'vik', 'vik@mail.com', 'pondok delta b.72', 'e9af23dd5a45126ff689eba7bb2146bb', '123', 'user.jpg', '082', 'member', '0', 0, '2022-06-20 08:44:56'),
(12, '1953619785', NULL, 'yuda', 'tes1@yahoo.com', 'jalan jalan', 'e9af23dd5a45126ff689eba7bb2146bb', '123', '', '08987818123', 'member', '0', 0, '2022-06-16 22:54:53'),
(13, '735556440', NULL, 'Danduk Sugiantoro', 'embuhraeruh6@gmail.com', 'Jln Veteran no 44 rt 1 rw 9 Dsn Selomamen Ds Purwokerto Kec Ngadiluwih Kab Kediri ', '45e5904c2755dbb09e76d5ea044eb0da', 'foliocolbus', '', '085867998171', 'merchant', 'PENDING', 0, '2022-07-06 10:56:22'),
(14, '1969560250', NULL, 'fiky', 'fiky@gmail', 'malang', 'c011dc399156da70196b06d23d1d91a7', '12345678', '', '0987654321', 'member', '0', 0, '2022-06-04 19:22:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_merk_barang`
--

CREATE TABLE `tabel_merk_barang` (
  `id_merk` int(255) NOT NULL,
  `merk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_merk_barang`
--

INSERT INTO `tabel_merk_barang` (`id_merk`, `merk`) VALUES
(11, 'NON MERK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_metode_bayar`
--

CREATE TABLE `tabel_metode_bayar` (
  `id_metode` int(11) NOT NULL,
  `id_bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `id` int(11) NOT NULL,
  `no_faktur_pembelian` varchar(16) NOT NULL,
  `kd_supplier` varchar(100) DEFAULT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `total_pembelian` varchar(100) NOT NULL,
  `biaya_pengiriman` varchar(100) NOT NULL,
  `total_biaya` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pembelian`
--

INSERT INTO `tabel_pembelian` (`id`, `no_faktur_pembelian`, `kd_supplier`, `tgl_pembelian`, `id_user`, `total_pembelian`, `biaya_pengiriman`, `total_biaya`, `ket`, `status`) VALUES
(5, 'BELIOVE00001', '', '2022-03-12', '1', '243328', '10000', '253328', 'Cash', ''),
(6, 'BELIOVE00002', '', '2022-03-12', '1', '68864', '', '68864', 'Cash', ''),
(7, 'BELIOVE00003', '', '2022-03-22', '1', '150000', '10000', '160000', 'Cash', ''),
(8, 'BELIKOK00001', '', '2022-04-06', '6', '4829', '20000', '24829', 'saldo', 'proses'),
(9, 'BELIKOK00001', '', '2022-04-06', '6', '4829', '20000', '24829', 'saldo', 'proses'),
(34, 'BELIVIK00001', '', '2022-04-08', '10', '9658', '20000', '29658', 'saldo', 'proses'),
(35, 'BELIVIK00002', '', '2022-04-08', '10', '4829', '20000', '24829', 'saldo', 'proses'),
(36, 'BELIVIK00003', '', '2022-04-13', '9', '9658', '20000', '29658', 'saldo', 'proses'),
(37, 'BELIVIK00004', '', '2022-04-13', '10', '9658', '20000', '29658', 'saldo', 'proses'),
(38, 'BELIVIK00005', '', '2022-04-24', '10', '180000', '20000', '200000', 'saldo', 'proses'),
(39, 'BELIVIK00006', '', '2022-05-28', '10', '4829', '20000', '24829', 'Saldo', 'Proses'),
(40, 'BELIVIK00007', '', '2022-05-29', '10', '74829', '20000', '94829', 'Transfer', 'Proses'),
(41, 'BELIKOK00002', '', '2022-05-29', '6', '134829', '20000', '154829', 'Transfer', 'Proses'),
(42, 'BELIVIK00008', '', '2022-05-30', '10', '130000', '20000', '150000', 'Transfer', 'Proses'),
(43, 'BELIYUD00001', '', '2022-06-02', '12', '0', '20000', '20000', 'Transfer', 'Proses'),
(44, 'BELIYUD00001', '', '2022-06-02', '12', '0', '20000', '20000', 'Transfer', 'Proses'),
(45, 'BELIYUD00002', '', '2022-06-02', '12', '155000', '20000', '175000', 'Transfer', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id` int(11) NOT NULL,
  `no_faktur_penjualan` varchar(16) NOT NULL,
  `kd_supplier` varchar(100) DEFAULT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `total_penjualan` varchar(100) NOT NULL,
  `biaya_pengiriman` varchar(100) NOT NULL,
  `total_biaya` varchar(100) NOT NULL,
  `dp` varchar(100) NOT NULL,
  `sisa` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nama_penerima` varchar(225) DEFAULT NULL,
  `kontak` varchar(225) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id`, `no_faktur_penjualan`, `kd_supplier`, `tgl_penjualan`, `id_user`, `total_penjualan`, `biaya_pengiriman`, `total_biaya`, `dp`, `sisa`, `ket`, `status`, `nama_penerima`, `kontak`, `alamat`) VALUES
(54, 'OFFOVE00001', '', '2022-03-09', '1', '150000', '10000', '160000', '', '', '', '', 'Riswan', '0857', 'jombang'),
(55, 'OFFOVE00002', '', '2022-03-09', '1', '836000', '', '836000', '', '', '', '', NULL, NULL, NULL),
(56, 'OFFOVE00003', '', '2022-03-09', '1', '2079000', '', '2079000', '', '', '', '', NULL, NULL, NULL),
(57, 'OFFOVE00004', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(58, 'OFFOVE00005', '', '2022-03-09', '1', '42000', '10000', '52000', '', '', '', '', NULL, NULL, NULL),
(59, 'OFFOVE00006', '', '2022-03-09', '1', '50000', '10000', '60000', '', '', '', '', NULL, NULL, NULL),
(60, 'OFFOVE00007', '', '2022-03-09', '1', '50000', '10000', '60000', '', '', '', '', NULL, NULL, NULL),
(61, 'OFFOVE00008', '', '2022-03-09', '1', '42000', '', '42000', '', '', '', '', NULL, NULL, NULL),
(63, 'OFFOVE00010', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(64, 'OFFOVE00011', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(65, 'OFFOVE00012', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(66, 'OFFOVE00013', '', '2022-03-09', '1', '92000', '', '92000', '', '', '', '', NULL, NULL, NULL),
(67, 'OFFOVE00014', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(68, 'OFFOVE00015', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(69, 'OFFOVE00016', '', '2022-03-09', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(70, 'OFFOVE00017', '', '2022-03-10', '1', '92000', '', '92000', '', '', '', '', NULL, NULL, NULL),
(71, 'OFFOVE00018', '', '2022-03-10', '1', '50000', '', '50000', '', '', '', '', NULL, NULL, NULL),
(72, 'OFFOVE00019', '', '2022-03-10', '1', '50000', '', '50000', '', '', 'Tranfer', '', NULL, NULL, NULL),
(73, 'OFFOVE00020', '', '2022-03-10', '1', '14481', '', '14481', '', '', 'Tranfer', '', NULL, NULL, NULL),
(74, 'OFFOVE00021', '', '2022-03-10', '1', '70000', '', '70000', '', '', 'Cash', '', NULL, NULL, NULL),
(75, 'OFFOVE00022', '', '2022-03-10', '1', '4829', '10000', '14829', '', '', 'Cash', '', '', '', 'jombang'),
(76, 'OFFOVE00023', '', '2022-03-10', '1', '74829', '10000', '84829', '', '', 'Tranfer', '', '', '', ''),
(77, 'OFFOVE00024', '', '2022-03-10', '1', '79481', '', '79481', '', '', 'Cash', '', NULL, NULL, NULL),
(78, 'OFFOVE00025', '', '2022-03-10', '1', '4829', '', '4829', '', '', 'Tranfer', '', NULL, NULL, NULL),
(79, 'OFFOVE00026', '', '2022-03-10', '1', '4829', '10000', '14829', '', '', 'Cash', '', '', '', ''),
(80, 'OFFOVE00027', '', '2022-03-10', '1', '70000', '10000', '80000', '', '', 'Tranfer', '', '', '', ''),
(81, 'OFFOVE00028', '', '2022-03-24', '1', '70000', '', '70000', '', '', 'Cash', '', NULL, NULL, NULL),
(82, 'OFFOVE00029', '', '2022-03-29', '1', '140000', 'blitar', 'NaN', '', '', 'Cash', '', 'viky', '081934309330', 'blitar'),
(83, 'OFFOVE00030', '', '2022-04-06', '1', '70000', '', '70000', '', '', 'Cash', '', NULL, NULL, NULL),
(87, 'ONNKOK00001', '', '2022-04-06', '6', '9658', '20000', '29658', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(88, '', '', '2022-04-06', '6', '14487', '20000', '34487', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(89, '', '', '2022-04-06', '6', '14487', '20000', '34487', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(90, '', '', '2022-04-06', '6', '14487', '20000', '34487', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(91, '', '', '2022-04-06', '6', '14487', '20000', '34487', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(92, '', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(93, 'ONNKOK00002', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(94, 'ONNKOK00002', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, NULL, NULL),
(95, 'ONNKOK00003 ', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, '085959188887', ''),
(96, 'ONNKOK00003 ', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, '085959188887', ''),
(97, 'ONNKOK00004 ', '', '2022-04-06', '6', '4829', '20000', '24829', '', '', 'saldo', 'proses', NULL, '085959188887', ''),
(129, 'OFFOVE00031', '', '2022-05-09', '1', '70000', '', '70000', '', '', 'Cash', '', NULL, NULL, NULL),
(130, 'OFFOVE00032', '', '2022-05-09', '1', '120000', '', '120000', '', '', 'Tranfer', '', NULL, NULL, NULL),
(131, 'ONNOVE00033 ', '', '2022-05-10', '10', '64829', '20000', '84829', '', '', 'Saldo', '', 'vik', '082', 'pondok delta b.72'),
(132, 'ONNSAN00001 ', '', '2022-05-27', '10', '134829', '20000', '154829', '', '', 'Transfer', '', 'vik', '082', 'pondok delta b.72'),
(133, 'ONNSAN00002 ', '', '2022-05-28', '10', '4829', '20000', '24829', '', '', 'Transfer', '', 'vik', '082', 'pondok delta b.72'),
(134, 'ONNSAN00003 ', '', '2022-05-28', '10', '4829', '20000', '24829', '', '', 'Saldo', '', 'vik', '082', 'pondok delta b.72'),
(135, 'ONNSAN00004 ', '', '2022-05-28', '10', '4829', '20000', '24829', '', '', 'Saldo', '', 'vik', '082', 'pondok delta b.72'),
(136, 'ONNSAN00005 ', '', '2022-05-28', '10', '4829', '20000', '24829', '', '', 'Saldo', '', 'vik', '082', 'pondok delta b.72'),
(137, 'ONNSAN00006 ', '', '2022-05-28', '10', '4829', '20000', '24829', '', '', 'Saldo', 'Proses', 'vik', '082', 'pondok delta b.72'),
(138, 'ONNSAN00007 ', '', '2022-05-29', '10', '74829', '20000', '94829', '', '', 'Transfer', 'Proses', 'vik', '082', 'pondok delta b.72'),
(139, 'ONNSAN00008 ', '', '2022-05-29', '6', '134829', '20000', '154829', '', '', 'Transfer', 'Proses', 'koko', '085959188887', ''),
(140, 'ONNSAN00009 ', '', '2022-05-30', '10', '130000', '20000', '150000', '', '', 'Transfer', 'Proses', 'vik', '082', 'pondok delta b.72'),
(141, 'ONNSAN00010 ', '', '2022-06-02', '12', '0', '20000', '20000', '', '', 'Transfer', 'Proses', 'yuda', '08987818123', 'jalan jalan'),
(142, 'ONNSAN00010 ', '', '2022-06-02', '12', '0', '20000', '20000', '', '', 'Transfer', 'Proses', 'yuda', '08987818123', 'jalan jalan'),
(143, 'ONNSAN00011 ', '', '2022-06-02', '12', '155000', '20000', '175000', '', '', 'Transfer', 'Proses', 'yuda', '08987818123', 'jalan jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_retur`
--

CREATE TABLE `tabel_retur` (
  `id` int(11) NOT NULL,
  `no_faktur_retur` varchar(16) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `tgl_retur` varchar(100) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `total_retur` varchar(100) NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_retur`
--

INSERT INTO `tabel_retur` (`id`, `no_faktur_retur`, `kd_barang`, `tgl_retur`, `id_user`, `total_retur`, `ket`, `status`) VALUES
(1, 'OFFOVE00001', 'ALF 140C-11 G', '2022-03-09 15:26:32', '1', '1', 'Isi disini fjhkwe djf', NULL),
(3, 'OFFOVE00001', 'ALF 140C-11 G', '2022-03-10 10:39:34', '1', '2', 'Isi disini', NULL),
(4, 'OFFOVE00027', '36747mbfh', '2022-03-10 10:43:57', '1', '1', 'Isi disini', NULL),
(5, 'OFFOVE00001', 'ALF 140C-11 G', '2022-03-27 05:59:36', '7', '1', 'Isi disini', NULL),
(6, 'OFFOVE00002', 'AMB 4M T', '2022-03-27 06:00:01', '7', '1', 'Isi disini', NULL),
(7, 'OFFOVE00003', 'AMT 6M G', '2022-03-27 06:01:37', '7', '1', 'Isi disini', NULL),
(8, 'OFFOVE00002', 'AMB 4M T', '2022-03-27 06:02:39', '7', '1', 'Isi disini', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rinci_pembelian`
--

CREATE TABLE `tabel_rinci_pembelian` (
  `id` int(11) NOT NULL,
  `no_faktur_pembelian` varchar(16) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_rinci_pembelian`
--

INSERT INTO `tabel_rinci_pembelian` (`id`, `no_faktur_pembelian`, `kd_barang`, `jumlah`, `harga`, `sub_total_beli`) VALUES
(7, 'BELIOVE00001', '36747mbfh', '2', 62000, 124000),
(8, 'BELIOVE00001', 'wefewj', '4', 29832, 119328),
(9, 'BELIOVE00002', 'efmiw', '1', 9200, 9200),
(10, 'BELIOVE00002', 'wefewj', '2', 29832, 59664),
(11, 'BELIOVE00003', 'kaos123', '3', 30000, 90000),
(12, 'BELIOVE00003', 'hoodie123', '1', 60000, 60000),
(42, 'BELIVIK00001', '347634', '2', 4829, 29658),
(43, 'BELIVIK00002', '347634', '1', 4829, 24829),
(44, 'BELIVIK00003', '347634', '2', 4829, 29658),
(45, 'BELIVIK00004', '347634', '2', 4829, 29658),
(46, 'BELIVIK00005', 'hnfe', '3', 60000, 200000),
(47, 'BELIVIK00006', '347634', '1', 4829, 4829),
(48, 'BELIVIK00007', '347634', '1', 4829, 4829),
(49, 'BELIVIK00007', '36747mbfh', '1', 70000, 70000),
(50, 'BELIKOK00002', '347634', '1', 4829, 4829),
(51, 'BELIKOK00002', '36747mbfh', '1', 70000, 70000),
(52, 'BELIKOK00002', 'hnfe', '1', 60000, 60000),
(53, 'BELIVIK00008', '36747mbfh', '1', 70000, 70000),
(54, 'BELIVIK00008', 'hnfe', '1', 60000, 60000),
(55, 'BELIYUD00001', 'H-0001', '1', 15000, 15000),
(56, 'BELIYUD00001', 'P-0001', '1', 78000, 78000),
(57, 'BELIYUD00001', 'H-0001', '1', 15000, 15000),
(58, 'BELIYUD00001', 'P-0001', '1', 78000, 78000),
(59, 'BELIYUD00002', 'J-0001', '1', 155000, 155000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rinci_penjualan`
--

CREATE TABLE `tabel_rinci_penjualan` (
  `id` int(11) NOT NULL,
  `no_faktur_penjualan` varchar(16) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total_jual` int(11) NOT NULL,
  `diskon` varchar(25) DEFAULT NULL,
  `a_n` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `stts` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `alamat_akhir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_rinci_penjualan`
--

INSERT INTO `tabel_rinci_penjualan` (`id`, `no_faktur_penjualan`, `kd_barang`, `nm_barang`, `no_hp`, `ukuran`, `jumlah`, `stok_awal`, `harga`, `sub_total_jual`, `diskon`, `a_n`, `keterangan`, `stts`, `alamat`, `alamat_akhir`) VALUES
(76, 'OFFOVE00001', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '2', 10, 50000, 100000, '', '', '', 'FINISH', '', ''),
(77, 'OFFOVE00001', 'ALF 20002 G', 'ALFAFON 20002 G', '', '', '1', 89, 50000, 50000, '', '', '', 'FINISH', '', ''),
(78, 'OFFOVE00002', 'AMB 4M T', 'AMARI BIRU 4M T', '', '', '2', 2, 418000, 836000, '', '', '', 'FINISH', '', ''),
(79, 'OFFOVE00003', 'AMT 6M G', 'AMARI TRANSPARAN 6M G', '', '', '3', 4, 693000, 2079000, '', '', '', 'FINISH', '', ''),
(80, 'OFFOVE00004', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 8, 50000, 50000, '', '', '', 'FINISH', '', ''),
(81, 'OFFOVE00005', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(82, 'OFFOVE00006', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 7, 50000, 50000, '', '', '', 'FINISH', '', ''),
(83, 'OFFOVE00007', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(84, 'OFFOVE00008', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(85, 'OFFOVE00009', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(86, 'OFFOVE00010', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(87, 'OFFOVE00011', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(88, 'OFFOVE00012', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(89, 'OFFOVE00013', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 6, 50000, 50000, '', '', '', 'FINISH', '', ''),
(90, 'OFFOVE00013', 'ALF 20002 G', 'ALFAFON 20002 G', '', '', '1', 88, 42000, 42000, '', '', '', 'FINISH', '', ''),
(91, 'OFFOVE00014', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(92, 'OFFOVE00015', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(93, 'OFFOVE00016', '', '', '', '', '', 0, 0, 0, '', '', '', 'FINISH', '', ''),
(94, 'OFFOVE00017', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 5, 50000, 50000, '', '', '', 'FINISH', '', ''),
(95, 'OFFOVE00017', 'ALF 20002 G', 'ALFAFON 20002 G', '', '', '1', 87, 42000, 42000, '', '', '', 'FINISH', '', ''),
(96, 'OFFOVE00018', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 4, 50000, 50000, '', '', '', 'FINISH', '', ''),
(97, 'OFFOVE00019', 'ALF 140C-11 G', 'ALFAFON 140C-11 G', '', '', '1', 3, 50000, 50000, '', '', '', 'FINISH', '', ''),
(98, 'OFFOVE00020', '347634', 'Buku', '', '', '1', 0, 4829, 4829, '', '', '', 'FINISH', '', ''),
(99, 'OFFOVE00021', '36747mbfh', 'Buku', '', '', '1', 0, 70000, 70000, '', '', '', 'FINISH', '', ''),
(100, 'OFFOVE00022', '347634', 'Buku', '', '', '1', -1, 4829, 4829, '', '', '', 'FINISH', '', ''),
(101, 'OFFOVE00023', '347634', 'Buku', '', '', '1', -2, 4829, 4829, '', '', '', 'FINISH', '', ''),
(102, 'OFFOVE00023', '36747mbfh', 'Buku', '', '', '1', -1, 70000, 70000, '', '', '', 'FINISH', '', ''),
(103, 'OFFOVE00024', '347634', 'Buku', '', '', '3', -3, 4829, 14487, '', '', '', 'FINISH', '', ''),
(104, 'OFFOVE00024', '36747mbfh', 'Buku', '', '', '1', -2, 70000, 70000, '', '', '', 'FINISH', '', ''),
(105, 'OFFOVE00025', '347634', 'Buku', '', '', '1', -6, 4829, 4829, '', '', '', 'FINISH', '', ''),
(106, 'OFFOVE00026', '347634', 'Buku', '', '', '1', -7, 4829, 4829, '', '', '', 'FINISH', '', ''),
(107, 'OFFOVE00027', '36747mbfh', 'Buku', '', '', '1', -3, 70000, 70000, '', '', '', 'FINISH', '', ''),
(108, 'OFFOVE00028', '36747mbfh', 'Buku', '', '', '1', -4, 70000, 70000, '', '', '', 'FINISH', '', ''),
(109, 'OFFOVE00029', '36747mbfh', 'Buku', '', '', '1', -5, 70000, 70000, '', '', '', 'FINISH', '', ''),
(110, 'OFFOVE00030', '36747mbfh', 'Topi bulat', '', '', '1', -6, 70000, 70000, '', '', '', 'FINISH', '', ''),
(124, 'OFFOVE00031', '36747mbfh', 'Topi bulat', '', '', '1', -7, 70000, 70000, '', '', '', 'FINISH', '', ''),
(125, 'OFFOVE00032', '36747mbfh', 'Topi bulat', '', '', '1', -8, 70000, 70000, '', '', '', 'FINISH', '', ''),
(126, 'OFFOVE00033', '36747mbfh', 'Topi bulat', '', '', '1', -9, 70000, 70000, '', '', '', 'FINISH', '', ''),
(129, 'OFFOVE00034', 'hnfe', 'Topi Koboi', '', '', '1', 10, 60000, 60000, '', '', '', 'FINISH', '', ''),
(130, 'OFFOVE00034', '36747mbfh', 'Topi bulat', '', '', '1', 10, 70000, 70000, '', '', '', 'FINISH', '', ''),
(131, 'OFFOVE00035', 'hnfe', 'Topi Koboi', '', '', '1', 9, 60000, 60000, '', '', '', 'FINISH', '', ''),
(132, 'OFFOVE00035', '36747mbfh', 'Topi bulat', '', '', '1', 9, 70000, 70000, '', '', '', 'FINISH', '', ''),
(133, 'ONNOVE00031 ', '347634', 'Topi Snapback', '082', '', '1', 10, 4829, 0, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(134, 'ONNOVE00031 ', '36747mbfh', 'Topi bulat', '082', '', '1', 8, 70000, 0, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(135, 'ONNOVE00031 ', 'hnfe', 'Topi Koboi', '082', '', '1', 8, 60000, 0, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(136, 'ONNOVE00031 ', '347634', 'Topi Snapback', '082', '', '1', 10, 4829, 4829, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(137, 'ONNOVE00031 ', '36747mbfh', 'Topi bulat', '082', '', '1', 8, 70000, 70000, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(138, 'ONNOVE00031 ', 'hnfe', 'Topi Koboi', '082', '', '1', 8, 60000, 60000, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(139, 'ONNOVE00031 ', '347634', 'Topi Snapback', '082', '', '1', 10, 4829, 4829, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(140, 'ONNOVE00031 ', '36747mbfh', 'Topi bulat', '082', '', '1', 8, 70000, 70000, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(141, 'ONNOVE00031 ', 'hnfe', 'Topi Koboi', '082', '', '1', 8, 60000, 60000, '', '', '', 'FINISH', 'pondok delta b.72', ''),
(142, 'OFFOVE00031', '36747mbfh', 'Topi bulat', '', '', '1', 8, 70000, 70000, '', '', '', 'FINISH', '', ''),
(143, 'OFFOVE00032', 'hnfe', 'Topi Koboi', '', '', '2', 8, 60000, 120000, '', '', '', 'FINISH', '', ''),
(168, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 2, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(169, 'ONNOVE00033 ', '36747mbfh', 'Topi bulat', '082', '', '1', -1, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(170, 'ONNOVE00033 ', 'hnfe', 'Topi Koboi', '082', '', '1', -2, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(171, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 1, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(172, 'ONNOVE00033 ', '36747mbfh', 'Topi bulat', '082', '', '1', -2, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(173, 'ONNOVE00033 ', 'hnfe', 'Topi Koboi', '082', '', '1', -3, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(174, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 10, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(175, 'ONNOVE00033 ', '36747mbfh', 'Topi bulat', '082', '', '1', 10, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(176, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 9, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(177, 'ONNOVE00033 ', '36747mbfh', 'Topi bulat', '082', '', '1', 9, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(178, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 8, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(179, 'ONNOVE00033 ', 'hnfe', 'Topi Koboi', '082', '', '1', 10, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(180, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 7, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(181, 'ONNOVE00033 ', 'hnfe', 'Topi Koboi', '082', '', '1', 9, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(182, 'ONNOVE00033 ', '347634', 'Topi Snapback', '082', '', '1', 6, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(183, 'ONNOVE00033 ', 'hnfe', 'Topi Koboi', '082', '', '1', 8, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', ''),
(184, 'ONNSAN00006 ', '347634', 'Topi Snapback', '082', '', '1', 5, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', 'pondok delta b.72'),
(185, 'ONNSAN00007 ', '347634', 'Topi Snapback', '082', '', '1', 4, 4829, 4829, '', 'vik', '', 'PROSES', 'pondok delta b.72', 'pondok delta b.72'),
(186, 'ONNSAN00007 ', '36747mbfh', 'Topi bulat', '082', '', '1', 8, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', 'pondok delta b.72'),
(187, 'ONNSAN00008 ', '347634', 'Topi Snapback', '085959188887', '', '1', 3, 4829, 4829, '', 'koko', '', 'PROSES', '', ''),
(188, 'ONNSAN00008 ', '36747mbfh', 'Topi bulat', '085959188887', '', '1', 7, 70000, 70000, '', 'koko', '', 'PROSES', '', ''),
(189, 'ONNSAN00008 ', 'hnfe', 'Topi Koboi', '085959188887', '', '1', 7, 60000, 60000, '', 'koko', '', 'PROSES', '', ''),
(190, 'ONNSAN00009 ', '36747mbfh', 'Topi bulat', '082', '', '1', 6, 70000, 70000, '', 'vik', '', 'PROSES', 'pondok delta b.72', 'pondok delta b.72'),
(191, 'ONNSAN00009 ', 'hnfe', 'Topi Koboi', '082', '', '1', 6, 60000, 60000, '', 'vik', '', 'PROSES', 'pondok delta b.72', 'pondok delta b.72'),
(192, 'ONNSAN00010 ', 'P-0001', 'Kaos Polo Santri', '08987818123', '', '1', 200, 78000, 78000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan'),
(193, 'ONNSAN00010 ', 'H-0001', 'Topi santri', '08987818123', '', '1', 150, 15000, 15000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan'),
(194, 'ONNSAN00010 ', 'P-0001', 'Kaos Polo Santri', '08987818123', '', '1', 200, 78000, 78000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan'),
(195, 'ONNSAN00010 ', 'H-0001', 'Topi santri', '08987818123', '', '1', 149, 15000, 15000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan'),
(196, 'ONNSAN00010 ', 'P-0001', 'Kaos Polo Santri', '08987818123', '', '1', 199, 78000, 78000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan'),
(197, 'ONNSAN00011 ', 'J-0001', 'Jaket Sport Santri', '08987818123', '', '1', 25, 155000, 155000, '', 'yuda', '', 'PROSES', 'jalan jalan', 'jalan jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rinci_penjualan_hitung`
--

CREATE TABLE `tabel_rinci_penjualan_hitung` (
  `id_hitung` int(25) NOT NULL,
  `no_faktur_penjualan` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `kd_barang` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `jumlah` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tabel_rinci_penjualan_hitung`
--

INSERT INTO `tabel_rinci_penjualan_hitung` (`id_hitung`, `no_faktur_penjualan`, `kd_barang`, `jumlah`, `harga`) VALUES
(1, '8705520042500001', 'TEL231000KG', '1', '22000'),
(2, '8705520042500001', 'TEL231000KG', '0', '22000'),
(3, '8705520042500001', 'TEL231000KG', '1', '22000'),
(4, '8705520042500001', 'BAK0010420FR', '1', '15000'),
(5, '8705520042500001', 'BAK0010420FR', '12', '15000'),
(6, '8705520042500001', 'BAK0010420FR', '10', '15000'),
(7, '8705520042600002', '8999999027247', '1', '23750'),
(11, '8705520042600003', '23031000BP', '0,5', '27000'),
(10, '8705520042600003', '23031000BP', '0.5', '27000'),
(12, '8705520042600003', '23031000BP', '0.5', '27000'),
(13, '8705520042600004', 'TCK0029070420', '1', '85000'),
(14, '8936720042700001', '089686010947', '0', '2400'),
(15, '8936720042700001', '089686010947', '01010100', '2400'),
(16, '8705520042700005', 'TEL231000KG', '2', '22000'),
(17, '8705520042700005', '8994064110404', '1', '6000'),
(18, '8705520042700005', '8999999049393', '1', '15000'),
(19, '8936720042700003', '089686010947', '010', '2400'),
(20, '8936720042700004', 'VN009010420', '03', '1000'),
(21, '8936720042700004', '8992933324112', '20', '2000'),
(22, '8936720042700004', '8992933324112', '02', '2000'),
(39, '8705520082000006', '', '2', '2500'),
(26, '8705520081200006', '8999999706180', '1', '9800'),
(44, '8705520082000006', '8998866200325', '2', '2500'),
(42, '8705520082000006', '', '2', '2500'),
(43, '8705520082000006', 'pulsa10000', '0895621098430', ''),
(45, '8705520082000006', '8999999502409', '2', '500'),
(46, '8705520082000007', 'TEL231000KG', '2', '22000'),
(47, '8705520082000007', 'TEL231000KG', '3', '22000'),
(48, '8705520082000007', 'TEL231000KG', '5', '22000'),
(49, '8705520082000007', '8998866200301', '3', '2500'),
(54, 'MM00120082000025', 'BRS003040420', '3', '55000'),
(53, 'MM00120082000025', 'AR0006010420', '3', '2000'),
(55, '8705520082500009', 'VN009010420', '2', '1000'),
(56, '8705520082500009', 'TPMZ003020420', '3', '4000'),
(70, 'MM00120082700028', '23031000BP', '2', '27000'),
(69, 'MM00120082500027', '8992733327113', '3', '2000'),
(64, '8705520082500010', '8999999706180', '3', '9800'),
(65, '8705520082500010', '8999999706180', '2', '9800'),
(74, '4161921012600011', 'MK001240121CLK', '1', '10000'),
(76, '7550121070600001', '8992933321111', '1', '2000'),
(77, '7550121070600001', '8998866200301', '21', '2500'),
(78, '7550121070600001', '8998866200301', '11', '2500'),
(79, '7550121070600001', '8992933321111', '1', '2000'),
(80, '7550121070600001', '8998866200301', '', '2500'),
(81, '7550121070600001', '8998866200301', '1', '2500'),
(82, '8073921071100001', '8992753102204', '2', '11500'),
(83, '8073921071100001', '8992753101207', '2', '12500'),
(84, '8073921071100001', 'TCK002906', '12', '15000'),
(85, '2116321071100001', '8999999034153', '2', '7500'),
(86, '4243921071500001', 'TCK0029020420', '33333313', '15000'),
(87, '4243921071500001', 'TCK0029020420', '33333313', '15000'),
(88, '4243921071500001', 'TCK0029020420', '33333313', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rinci_retur`
--

CREATE TABLE `tabel_rinci_retur` (
  `no_faktur_retur` varchar(16) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `sub_total_retur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_saldo`
--

CREATE TABLE `tabel_saldo` (
  `id_saldo` int(255) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `pengeluaran` int(100) NOT NULL,
  `ket_saldo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_saldo`
--

INSERT INTO `tabel_saldo` (`id_saldo`, `id_user`, `tanggal`, `jumlah`, `pengeluaran`, `ket_saldo`) VALUES
(1, '6', '2022-02-02', 200000, 0, 'Transfer'),
(2, '9', '2022-03-29', 2000, 0, 'Isi disini'),
(3, '9', '2022-03-29', 2000, 0, 'Isi disini'),
(4, '9', '2022-03-29', 2000, 0, 'Isi disini'),
(5, '9', '2022-03-29', 2000, 0, 'Isi disini'),
(6, '9', '2022-03-29', 2000, 0, 'Isi disini'),
(8, '9', '2022-03-31', 20000, 0, 'Isi disini'),
(9, '9', '2022-03-24', 20000, 0, 'Isi disini'),
(10, '9', '2022-03-30', 2000, 0, 'Isi disini'),
(11, '9', '2022-03-24', 2000, 0, 'Isi disini'),
(12, '9', '2022-03-23', 20, 0, 'Isi disini'),
(13, '6', '2022-03-24', 2000, 0, 'tf'),
(14, '6', '2022-03-24', 2000, 0, 'tf'),
(15, '6', '2022-03-24', 2000, 0, 'tf'),
(16, '6', '2022-03-23', 200, 0, 'Isi disini'),
(17, '8', '2022-03-25', 200, 0, 'Isi disini'),
(18, '7', '2022-03-23', 200000, 0, 'Isi disini'),
(19, '6', '2022-03-31', 20, 0, 'Isi disini'),
(20, '8', '2022-03-24', 20, 0, 'Isi disini'),
(21, '8', '2022-04-21', 2000, 0, 'Isi disini'),
(22, '8', '2022-04-07', 2000, 0, 'Isi disini'),
(23, '7', '2022-04-14', 20000, 0, 'Isi disini'),
(24, '10', '2022-04-13', 2000000, 0, 'Isi disini'),
(33, '10', '2022-05-10 08:18:02', 0, 94829, ''),
(34, '10', '2022-05-10 08:31:44', 0, 84829, ''),
(35, '10', '2022-05-10 08:31:58', 0, 84829, ''),
(36, '10', '2022-05-10 08:32:05', 0, 84829, ''),
(37, '10', '2022-05-19', 20000, 0, 'Isi disini'),
(38, '10', '2022-05-19', 20100, 0, 'Isi disini'),
(39, '10', '2022-05-19', 200000, 0, 'Isi disini'),
(40, '10', '2022-05-28 15:23:16', 0, 24829, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_satuan_barang`
--

CREATE TABLE `tabel_satuan_barang` (
  `id_satuan` int(255) NOT NULL,
  `nm_satuan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_satuan_barang`
--

INSERT INTO `tabel_satuan_barang` (`id_satuan`, `nm_satuan`) VALUES
(1, 'PACK'),
(3, 'PCS'),
(7, 'DUS'),
(8, 'KARTON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_slide`
--

CREATE TABLE `tabel_slide` (
  `id_slide` int(255) NOT NULL,
  `kat_slide` varchar(150) NOT NULL,
  `gbr_slide` varchar(500) NOT NULL,
  `judul_slide` varchar(100) NOT NULL,
  `ket_slide` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_slide`
--

INSERT INTO `tabel_slide` (`id_slide`, `kat_slide`, `gbr_slide`, `judul_slide`, `ket_slide`) VALUES
(1, '1', 'slide-2.jpg', 'header', 'header'),
(2, '1', 'slide-3.jpg', 'header', 'header'),
(3, '2', 'slide-2.jpg', '', ''),
(4, '2', 'slide-3.jpg', '', ''),
(5, '3', 'slide-index-1.png', '', ''),
(6, '4', 'slide-index-2.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_stok_toko`
--

CREATE TABLE `tabel_stok_toko` (
  `id` int(255) NOT NULL,
  `kd_toko` varchar(15) NOT NULL,
  `kd_barang` varchar(100) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_stok_toko`
--

INSERT INTO `tabel_stok_toko` (`id`, `kd_toko`, `kd_barang`, `stok`) VALUES
(1, '', 'fk', 100),
(2, '', 'GY', 100),
(3, '', 'CS', 82),
(4, '', 'KM', 221),
(5, '', 'SPA 0.25 4M G', 1),
(6, '', 'SPA 0.30 3M G', 23),
(7, '', 'SPA 0.30 3M T', 3),
(8, '', 'SPA 0.30 3M TB', 6),
(9, '', 'SPA 0.30 4M T', 72),
(10, '', 'SPA 0.30 5M T', 98),
(11, '', 'SPA 0.30 6M G', 110),
(12, '', 'SPA 0.30 7M G', 20),
(13, '', 'SPA T', 50),
(14, '', 'SPB G', 61),
(15, '', 'SPB T', 455),
(16, '', 'SPB GL', 11),
(17, '', 'SPB TL', 17),
(22, '', 'SPK 0.25 3M G', 41),
(23, '', 'SPK 0.25 4M T', -9),
(24, '', 'SPK 0.25 5M T', 34),
(25, '', 'SPK 0.25 6M T', -18),
(26, '', 'SPK 0.30 3M T', 48),
(27, '', 'SPK 0.30 4M T', 34),
(28, '', 'SPK 0.30 5M T', 46),
(29, '', 'SPK 0.30 6M T', 29),
(30, '', 'SPK 0.30 7M T', 26),
(31, '', 'SPPH 0.30 6M G', -18),
(32, '', 'SPPM 0.25 4M G', 14),
(35, '', 'SPPM 0.25 5M G', 6),
(36, '', 'SPPM 0.25 6M G', 26),
(37, '', 'SPPM 0.30 4M G', 36),
(38, '', 'SPPM 0.30 5M G', 28),
(39, '', 'SPPM 0.30 6M G', 81),
(42, '', 'SPPM G', 1),
(44, '', 'RF 4M T', 52),
(49, '', 'RF 5M T', 50),
(50, '', 'RF 3M T', 1),
(51, '', 'RF 6M T', 60),
(52, '', 'SPZ 0.25 5M T', 1),
(53, '', 'ST', 2),
(54, '', 'TLK 0.25 60CM T', 428),
(55, '', 'TLG 0.30 30CM T', 114),
(56, '', 'RE 0.40 G', 1876),
(57, '', 'RE 0.40 T', 2218),
(58, '', 'RE 0.40 TL', 1),
(59, '', 'RK 0.45 G', -162),
(60, '', 'SKT', 1),
(61, '', 'WA T', 4451),
(62, '', 'WD T', 520),
(65, '', 'AMB 4M T', 0),
(66, '', 'AMB 5M G', 1),
(67, '', 'AMP 3M G', 1),
(68, '', 'AMT 6M G', 1),
(69, '', 'WAB T', 21),
(70, '', 'WAP T', 3),
(71, '', 'RF 1.5M T', 1),
(72, '', 'KS 4MM G', 187),
(73, '', 'CNPK 75;60 RLT', 7),
(74, '', 'CNPG 80;70 T', 60),
(75, '', 'CNPK 75;75 TL', 1),
(76, '', 'CNPK 75;60 T', 875),
(77, '', 'CNPK 75;75 T', -160),
(78, '', 'CNPK 80;60 T', 641),
(79, '', 'CNPK 80;75 TL', 2),
(80, '', 'BBJ T', 474),
(81, '', 'BK T', 189),
(82, '', 'BK T (1)', -400),
(83, '', 'BT T', 26500),
(85, '', 'BR T', 27),
(86, '', 'BR T(1)', 12300),
(87, '', 'BSP T', 99),
(88, '', 'BSP T(1)', -350),
(89, '', 'BTT T', 3),
(90, '', 'BTT T(1)', 400),
(101, '', 'BDY 10X77 T', 5),
(102, '', 'BDY 10X65 T', 21),
(103, '', 'BDY 10X65 T(1)', 377),
(104, '', 'BDY 8X65 T(1)', 433),
(105, '', 'BDY 8X65 T', 37),
(106, '', 'GK 2X2 1A T', 9),
(107, '', 'GK 2X2 1A TB', 10),
(108, '', 'GK 2X4 0.8A T', 20),
(109, '', 'GK 2X4 0.9A T', 36),
(110, '', 'GK 2X4 1A T', 10),
(111, '', 'GK 2X4 1A TB', 30),
(112, '', 'GK 3X3 1A T', 17),
(113, '', 'GK 4X4 0.9A T', 32),
(114, '', 'GK 4x4 1.2 T', 12),
(115, '', 'GK 4x4 1A T', 22),
(116, '', 'GK 4x6 0.9A T', 19),
(117, '', 'GK 4x6 1.2A T', 20),
(118, '', 'GK 5X5 1A T', 15),
(119, '', 'GMPH G', 241),
(120, '', 'GMPH T', 18),
(121, '', 'GMPM G', 3162),
(122, '', 'GMPC G', 267),
(123, '', 'GYP G', 9),
(124, '', 'HLP 2X4 G', 32),
(125, '', 'HLP 2X4 T', 2),
(126, '', 'HLG 2X4 G', 4725),
(127, '', 'HLG 4X4 GL', 515),
(128, '', 'HLG 4X4 GB', 1835),
(131, '', 'MTS T', 10),
(132, '', 'MTK T', 3),
(133, '', 'NPC GB', 184),
(134, '', 'NPC GL', 43),
(135, '', 'NPH G', 107),
(136, '', 'NPHM GB', 167),
(137, '', 'NPHM TL', 59),
(138, '', 'NPM GB', 375),
(139, '', 'NPM TB', 8),
(140, '', 'PK 1.5 T', 70),
(141, '', 'PR T', 1853),
(142, '', 'PLG 1.2A T', 5),
(143, '', 'PLM 3M G', 369),
(144, '', 'PLM 4M G', 126),
(145, '', 'PLP 3M G', 111),
(146, '', 'ALF 140C-11 G', 2),
(147, '', 'ALF 20002 G', 86),
(148, '', 'ALF 20059 G', 2),
(149, '', 'ALF 20108C G', 1),
(150, '', 'LD T', 1),
(151, '', 'LD G', 2),
(152, '', 'LF 6CM G', 10),
(153, '', 'LF 8CM G', 2),
(154, '', 'LFS 6CM G', 1),
(155, '', 'LHC G', 89),
(156, '', 'LHP G', 68),
(157, '', 'LJC G', 2),
(158, '', 'LJC GB', 10),
(159, '', 'LJP G', 43),
(160, '', 'LKF G', 10),
(161, '', 'LKC G', 10),
(162, '', 'LKP G', 16),
(163, '', 'LSF GB G', 2),
(164, '', 'LSF SB G', 4),
(165, '', 'LSE G', 3),
(166, '', 'LSM G', 117),
(167, '', 'LSMK G', 6),
(168, '', 'LSMS G', 22),
(169, '', 'LSSP G', 1),
(170, '', 'M 8005 G', 4),
(171, '', 'M 8016 G', 5),
(172, '', 'M 8020 G', 15),
(173, '', 'M 8029 G', 3),
(176, '', 'M 8051 G', 15),
(177, '', 'M 8053 G', 2),
(178, '', 'M 8061 G', 50),
(179, '', 'MAB UGE G', 2),
(180, '', 'OR 70X90 E G', 3),
(181, '', 'ULT 02 G', 5),
(182, '', 'ULT 05 G', 3),
(183, '', 'ULT 06 G', 1),
(184, '', 'ULT 09 G', 4),
(185, '', 'ULT 10 G', 1),
(186, '', 'ULT 11 G', 1),
(187, '', 'ULT 12 G', 1),
(188, '', 'ULT 13 G', 7),
(189, '', 'ULT 15 G', 4),
(190, '', 'ULT 17 G', 1),
(191, '', 'ULT 18 G', 1),
(192, '', 'ULT 24 G', 1),
(193, '', 'ULT 25 G', 1),
(194, '', 'ULT 28 G', 1),
(195, '', 'ULT 30 G', 4),
(196, '', 'ULT 31 G', 4),
(197, '', 'ULT 32 G', 2),
(198, '', 'ULT 34 G', 1),
(199, '', 'ULT 36 G', 1),
(200, '', 'ULT 38 G', 6),
(201, '', 'ULT 39 G', 2),
(202, '', 'ULT 39 IG', 4),
(203, '', 'ULT 40 G', 17),
(204, '', 'ULT 42 G', 1),
(205, '123', 'ugiyg', 10),
(209, '123', 'imfdie32', 10),
(225, '123', '12456', 100),
(226, '123', '234567', 50),
(227, '123', '345678', 150),
(228, '123', 'H-0001', 148),
(229, '123', 'P-0001', 198),
(230, '123', 'K-0001', 100),
(231, '123', 'J-0001', 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_streaming`
--

CREATE TABLE `tabel_streaming` (
  `id_streaming` int(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_streaming`
--

INSERT INTO `tabel_streaming` (`id_streaming`, `link`, `status`) VALUES
(1, 'https://youtube.com', 'y'),
(2, 'https://youtube', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_supplier`
--

CREATE TABLE `tabel_supplier` (
  `kd_supplier` varchar(15) NOT NULL,
  `nm_supplier` varchar(25) NOT NULL,
  `almt_supplier` varchar(150) NOT NULL,
  `tlp_supplier` varchar(15) NOT NULL,
  `fax_supplier` varchar(15) NOT NULL,
  `atas_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_toko`
--

CREATE TABLE `tabel_toko` (
  `kd_toko` varchar(15) NOT NULL,
  `nm_toko` varchar(30) NOT NULL,
  `almt_toko` varchar(150) NOT NULL,
  `kota_toko` varchar(50) NOT NULL,
  `kecamatan_toko` varchar(50) NOT NULL,
  `ket_toko` text NOT NULL,
  `jargon_toko` varchar(255) NOT NULL,
  `tlp_toko` varchar(15) NOT NULL,
  `fax_toko` varchar(255) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tipe` varchar(500) NOT NULL,
  `headerfooter` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `tombol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tabel_toko`
--

INSERT INTO `tabel_toko` (`kd_toko`, `nm_toko`, `almt_toko`, `kota_toko`, `kecamatan_toko`, `ket_toko`, `jargon_toko`, `tlp_toko`, `fax_toko`, `logo`, `password`, `pass`, `status`, `tipe`, `headerfooter`, `background`, `tombol`) VALUES
('123', 'SANTRIMART', 'Bandung', 'Bandung', 'Bandung', 'Belanja di santrimart banyak untungnya, dapatkan promo besar-besaran download sekarang juga aplikasi', 'Santri kekinian, Santri berwirausaha', '6281234567890', '', 'logo.png', '757f9d5b09cfd69699c86364746ad68e', '123456', '', '', '#37E8FC', '#E6E6E6', '#FF9F43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`kd_barang`) USING BTREE;

--
-- Indeks untuk tabel `tabel_barang_gambar`
--
ALTER TABLE `tabel_barang_gambar`
  ADD PRIMARY KEY (`id_gmbr`) USING BTREE;

--
-- Indeks untuk tabel `tabel_comment`
--
ALTER TABLE `tabel_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_comment_barang`
--
ALTER TABLE `tabel_comment_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_info`
--
ALTER TABLE `tabel_info`
  ADD PRIMARY KEY (`id_info`) USING BTREE;

--
-- Indeks untuk tabel `tabel_info_gambar`
--
ALTER TABLE `tabel_info_gambar`
  ADD PRIMARY KEY (`id_gmbr`) USING BTREE;

--
-- Indeks untuk tabel `tabel_info_pembayaran`
--
ALTER TABLE `tabel_info_pembayaran`
  ADD PRIMARY KEY (`id_info_pembayaran`);

--
-- Indeks untuk tabel `tabel_kategori_barang`
--
ALTER TABLE `tabel_kategori_barang`
  ADD PRIMARY KEY (`kd_kategori`) USING BTREE;

--
-- Indeks untuk tabel `tabel_kategori_info`
--
ALTER TABLE `tabel_kategori_info`
  ADD PRIMARY KEY (`kd_kategori_info`) USING BTREE;

--
-- Indeks untuk tabel `tabel_medsos_toko`
--
ALTER TABLE `tabel_medsos_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_member`
--
ALTER TABLE `tabel_member`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `tabel_merk_barang`
--
ALTER TABLE `tabel_merk_barang`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `tabel_metode_bayar`
--
ALTER TABLE `tabel_metode_bayar`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_retur`
--
ALTER TABLE `tabel_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_rinci_pembelian`
--
ALTER TABLE `tabel_rinci_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_rinci_penjualan`
--
ALTER TABLE `tabel_rinci_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_rinci_penjualan_hitung`
--
ALTER TABLE `tabel_rinci_penjualan_hitung`
  ADD PRIMARY KEY (`id_hitung`);

--
-- Indeks untuk tabel `tabel_saldo`
--
ALTER TABLE `tabel_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indeks untuk tabel `tabel_satuan_barang`
--
ALTER TABLE `tabel_satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tabel_slide`
--
ALTER TABLE `tabel_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `tabel_stok_toko`
--
ALTER TABLE `tabel_stok_toko`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tabel_streaming`
--
ALTER TABLE `tabel_streaming`
  ADD PRIMARY KEY (`id_streaming`);

--
-- Indeks untuk tabel `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  ADD PRIMARY KEY (`kd_supplier`) USING BTREE;

--
-- Indeks untuk tabel `tabel_toko`
--
ALTER TABLE `tabel_toko`
  ADD PRIMARY KEY (`kd_toko`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `tabel_barang_gambar`
--
ALTER TABLE `tabel_barang_gambar`
  MODIFY `id_gmbr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT untuk tabel `tabel_comment`
--
ALTER TABLE `tabel_comment`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tabel_comment_barang`
--
ALTER TABLE `tabel_comment_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_info`
--
ALTER TABLE `tabel_info`
  MODIFY `id_info` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tabel_info_gambar`
--
ALTER TABLE `tabel_info_gambar`
  MODIFY `id_gmbr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tabel_info_pembayaran`
--
ALTER TABLE `tabel_info_pembayaran`
  MODIFY `id_info_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_kategori_barang`
--
ALTER TABLE `tabel_kategori_barang`
  MODIFY `kd_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tabel_kategori_info`
--
ALTER TABLE `tabel_kategori_info`
  MODIFY `kd_kategori_info` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_medsos_toko`
--
ALTER TABLE `tabel_medsos_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_member`
--
ALTER TABLE `tabel_member`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tabel_merk_barang`
--
ALTER TABLE `tabel_merk_barang`
  MODIFY `id_merk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tabel_metode_bayar`
--
ALTER TABLE `tabel_metode_bayar`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `tabel_retur`
--
ALTER TABLE `tabel_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_rinci_pembelian`
--
ALTER TABLE `tabel_rinci_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tabel_rinci_penjualan`
--
ALTER TABLE `tabel_rinci_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT untuk tabel `tabel_rinci_penjualan_hitung`
--
ALTER TABLE `tabel_rinci_penjualan_hitung`
  MODIFY `id_hitung` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `tabel_saldo`
--
ALTER TABLE `tabel_saldo`
  MODIFY `id_saldo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tabel_satuan_barang`
--
ALTER TABLE `tabel_satuan_barang`
  MODIFY `id_satuan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_slide`
--
ALTER TABLE `tabel_slide`
  MODIFY `id_slide` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_stok_toko`
--
ALTER TABLE `tabel_stok_toko`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT untuk tabel `tabel_streaming`
--
ALTER TABLE `tabel_streaming`
  MODIFY `id_streaming` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
