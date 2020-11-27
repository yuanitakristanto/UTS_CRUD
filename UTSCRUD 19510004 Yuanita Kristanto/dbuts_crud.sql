-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2020 pada 04.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuts_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpenyewa`
--

CREATE TABLE `tpenyewa` (
  `nomor_kamar` varchar(5) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `lama_sewa` varchar(20) NOT NULL,
  `id_penyewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tpenyewa`
--

INSERT INTO `tpenyewa` (`nomor_kamar`, `nama_lengkap`, `nomor_ponsel`, `asal`, `lama_sewa`, `id_penyewa`) VALUES
('R001', 'Yuanita Kristanto', '0821xxxx', 'Biak - Papua', '3 Bulan', 1),
('R002', 'Yuyun Febilia Tangku\'a', '0851xxxxx', 'Palu - Sulawesi Tengah', '18 Bulan', 2),
('R003', 'ika natalia', '0886xxxx', 'Palu - Sulawesi Tengah', '18 Bulan', 3),
('R004', 'evi kumala', '087xxxx', 'Bojonggede - Jawa Barat', '24 Bulan', 4),
('R009', 'Liliyun Ajeng', '089xxxx', 'Malang - Jawa Timur', '18 Bulan', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tpenyewa`
--
ALTER TABLE `tpenyewa`
  ADD PRIMARY KEY (`id_penyewa`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tpenyewa`
--
ALTER TABLE `tpenyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
