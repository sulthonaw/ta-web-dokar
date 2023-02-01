-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2023 pada 04.42
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dokar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `dp` int(10) NOT NULL DEFAULT 0,
  `alamat` varchar(100) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `status_pajak` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status_jual` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `gambar`, `nama_produk`, `harga`, `dp`, `alamat`, `warna`, `status_pajak`, `deskripsi`, `status_jual`, `tanggal`) VALUES
(18, 'download (3).jpeg|download (2).jpeg|', 'Scoopy', 10000000, 500000, 'Jalan Bandulan baru', 'Hitam', 'mati', 'Honda Scoopy adalah salah satu merek pedagang sepeda motor Honda di Indonesia skuter matik ini yang di produksi oleh PT Astra Honda Motor. Sepeda motor ini diluncurkan pada tanggal 20 Mei 2010 yang dimaksudkan untuk mengantisipasi makin populernya untuk sepeda motor skuter matik otomatis di pasar sepeda motor Honda di Indonesia. Honda Scoopy akan bersaing langsung dengan Suzuki Lets dan Yamaha Fino.', 'terjual', '2022-12-25'),
(19, 'deluxe-silverr-14072021-053427.webp|', 'Beat', 20000000, 400000, 'Jalan Tanimbar', 'Putih', 'mati', 'Ini motor beat', 'dijual', '2022-12-25'),
(20, 'download (3).jpeg|download (2).jpeg|', 'Beat baru', 100000000, 50000, 'Jalan koll', 'Putih', 'mati', 'Ini beat baru', 'terjual', '2022-12-25'),
(21, 'download (5).jpeg|download (4).jpeg|', 'Kawasaki Ninja ZX-25', 20000000, 100000, 'Jalan absurd', 'Hijau', 'mati', 'Kawasaki Ninja ZX-25R adalah sebuah sepeda motor sport bermesin 249 cc dengan konfigurasi 4 silinder segaris yang diproduksi oleh Kawasaki di Indonesia dan Thailand sebagai penerus dari Ninja ZX-2R/ZXR250 yang diproduksi antara tahun 1988 dan 1997', 'dijual', '2022-12-25'),
(22, 'download (6).jpeg|', 'Scoopy', 8000000, 100000, 'Jalan Tanimbar', 'Putih', 'mati', 'Honda Scoopy adalah salah satu merek pedagang sepeda motor Honda di Indonesia skuter matik ini yang di produksi oleh PT Astra Honda Motor.', 'dijual', '2022-12-25'),
(23, 'download.png|', 'Fazzio', 7000000, 200000, 'Jalan Tanimbar', 'Putih', 'hidup', 'Motor ini adalah skuter matic dengan gaya retro dan jadi sepeda motor hybrid pertama kelas 125cc di Indonesia. Fazzio tersedia dalam dua varian, yaitu Fazzio Neo dan Fazzio Lux dengan pilihan warna yang berbeda.', 'dijual', '2022-12-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_produk`, `id_user`, `tanggal_transaksi`, `waktu`) VALUES
(2, 18, 254, '2022-11-27', '20:39:14'),
(3, 19, 253, '2022-11-27', '21:02:23'),
(5, 21, 256, '2022-11-28', '23:46:43'),
(6, 19, 256, '2022-12-01', '09:55:31'),
(7, 20, 256, '2022-12-03', '23:51:21'),
(8, 20, 253, '2023-02-01', '09:44:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'admin', '73973ebac785dc50b9fd18bc7f10b438', 'admin'),
(253, 'user@gmail.com', 'user', '73973ebac785dc50b9fd18bc7f10b438', 'user'),
(256, 'sulthon@gmail.com', 'sulthon', '73973ebac785dc50b9fd18bc7f10b438', 'user'),
(258, '', '', 'd65d40cd74d659ea724bcdcf3daad90b', NULL),
(259, '', '', 'd65d40cd74d659ea724bcdcf3daad90b', NULL),
(261, 'ucup@gmail.com', 'ucup', '73973ebac785dc50b9fd18bc7f10b438', NULL),
(262, 'sutek@gmail.com', 'sutek', '73973ebac785dc50b9fd18bc7f10b438', NULL),
(263, 'test@gmail.com', 'test', '73973ebac785dc50b9fd18bc7f10b438', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
