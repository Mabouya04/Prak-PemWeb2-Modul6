-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2022 pada 11.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(500) NOT NULL,
  `penulis` varchar(500) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `tahun_terbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(1, 'Remaja yang mencintai jarak jauh', 'AlPadil', 'PadilLangga', 1999),
(2, 'Padil Yang Mehadangi Bertahun Tahun', 'Jai Padil', 'Padilih', 2000),
(3, 'Padil Mencari Bini', 'Padil Miraniah', 'PadilMiyah', 2019),
(4, 'Bini', 'Padil', 'ZulPadil', 2011),
(13, 'Bini Mencari Padil', 'Padil Zulkarnain', 'ZulPadil', 2013),
(14, 'Cara Menjadi Web Destroyer', 'Arin Hasan', 'Harin', 2022),
(15, 'Bini Mencari Padil', 'Padil Zulkarnain', 'ZulPadil', 2011),
(16, 'Bini Mencari Padil', 'Padil Zulkarnain', 'ZulPadil', 2011),
(17, 'Cara Menjadi Web Destroyer', 'Padil Zulkarnain', 'Harin', 2013),
(18, 'Cara Menjadi Web Destroyer', 'Padil Zulkarnain', 'Harin', 2013),
(19, 'Cara Menjadi Web Destroyer', 'Padil Zulkarnain', 'IlhamGod', 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(250) NOT NULL,
  `nomor_member` varchar(15) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_mendaftar` datetime NOT NULL,
  `tgl_terakhir_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `nomor_member`, `pass`, `alamat`, `tgl_mendaftar`, `tgl_terakhir_bayar`) VALUES
(1, 'Naufal', '0857555', '$2y$10$OWxARcJMfmc3/aoKFTNJsOkDLME.qjuF/op1DH', 'Jalan  ', '2022-05-03 11:50:00', '2022-07-11'),
(2, 'Muhammad Fulan', 'P922P', '$2y$10$OWxARcJMfmc3/aoKFTNJsOkDLME.qjuF/op1DH', 'Jalan veteran km 5.5', '2022-05-11 22:07:00', '2022-07-11'),
(3, 'ilham', '085753458023', '$2y$10$OWxARcJMfmc3/aoKFTNJsOkDLME.qjuF/op1DH', 'Jl. Brigjen H. Hasan Basri, Pangeran', '2022-05-12 11:57:00', '2022-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `tgl_kembali`) VALUES
(14, '2022-05-06', '2022-07-15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
