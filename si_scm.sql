-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Jun 2020 pada 04.46
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_scm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_bahan_baku`
--

CREATE TABLE `dta_bahan_baku` (
  `id_bahan_baku` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_bahan_baku`
--

INSERT INTO `dta_bahan_baku` (`id_bahan_baku`, `nama`, `jumlah`, `harga`, `satuan`) VALUES
('BHN-0001', 'Apel', 10, 10000, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_barang`
--

CREATE TABLE `dta_barang` (
  `kd_barang` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `stock_terjual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_barang`
--

INSERT INTO `dta_barang` (`kd_barang`, `nama`, `jumlah`, `harga`, `satuan`, `kondisi`, `stock_terjual`) VALUES
('KDR-0001', 'Cuka Apel', 124090, 4000000, 'Dus', 'Ready Stock', 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_distributor`
--

CREATE TABLE `dta_distributor` (
  `id_distributor` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_distributor`
--

INSERT INTO `dta_distributor` (`id_distributor`, `nama`, `nomor`, `fax`, `email`, `alamat`) VALUES
('IDDIS-0001', 'PT Distributor Resmi Cuka Apel', '082349002190', '-', 'cukaapelbragg188@gmail.com', 'Bandung\r\n'),
('IDDIS-0002', 'PT Distributor Kemasan Kosmetik', '087779077775', '-', 'ciptaindahpackaging75@gmail.com', 'Jl. Raya Taman Narogong Indah Blok A8 No.7, Bekasi Timur, Kota Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_pembayaran`
--

CREATE TABLE `dta_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `sisah_pembayaran` int(11) NOT NULL,
  `bukti1` varchar(50) DEFAULT NULL,
  `bukti2` varchar(50) DEFAULT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_pembayaran`
--

INSERT INTO `dta_pembayaran` (`id_pembayaran`, `id_pemesanan`, `bank`, `norek`, `jumlah_pembayaran`, `sisah_pembayaran`, `bukti1`, `bukti2`, `waktu`) VALUES
(2225821, 4292401, 'mandiri', '1234', 40000000, 0, 'ac.jpg', NULL, '2019-11-07 13.18.17'),
(403804121, 90494771, 'bri', '123', 48000000, 0, '8.jpg', NULL, '2019-11-04 22.09.26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_pemesanan`
--

CREATE TABLE `dta_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('belum lunas','pelunasan','lunas') NOT NULL,
  `status_pengantaran` varchar(20) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_pemesanan`
--

INSERT INTO `dta_pemesanan` (`id_pemesanan`, `id_user`, `kd_barang`, `jumlah`, `harga`, `total`, `status`, `status_pengantaran`, `waktu`) VALUES
(4292401, 49606922, 'KDR-0001', 10, 4000000, 40000000, 'lunas', 'On-Process', '2019-11-07 13.17.27');

--
-- Trigger `dta_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `kurangjumlahpemesanan` AFTER INSERT ON `dta_pemesanan` FOR EACH ROW BEGIN
UPDATE dta_barang SET jumlah = jumlah-new.jumlah, stock_terjual = stock_terjual+new.jumlah WHERE kd_barang = new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_supplier`
--

CREATE TABLE `dta_supplier` (
  `id_supplier` int(11) NOT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_supplier`
--

INSERT INTO `dta_supplier` (`id_supplier`, `fax`, `website`, `alamat`) VALUES
(10455343, NULL, NULL, 'Pare-pare'),
(49606922, NULL, NULL, 'Maros\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_trnsaksi_brng_masuk`
--

CREATE TABLE `dta_trnsaksi_brng_masuk` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_distributor` varchar(20) NOT NULL,
  `id_bahan_baku` varchar(20) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_trnsaksi_brng_masuk`
--

INSERT INTO `dta_trnsaksi_brng_masuk` (`id_transaksi`, `id_distributor`, `id_bahan_baku`, `jumlah`, `harga`, `total`, `waktu`) VALUES
('TRSBM-0001', 'IDDIS-0002', 'BHN-0002', 20, 10000, 200000, '2019-11-05 02.08.55'),
('TRSBM-0002', 'IDDIS-0001', 'BHN-0001', 2, 10000, 20000, '2019-11-30 09.02.54');

--
-- Trigger `dta_trnsaksi_brng_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambahjumlahbarang` AFTER INSERT ON `dta_trnsaksi_brng_masuk` FOR EACH ROW begin
update dta_bahan_baku set jumlah = jumlah+new.jumlah where id_bahan_baku = new.id_bahan_baku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_user`
--

CREATE TABLE `dta_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_user`
--

INSERT INTO `dta_user` (`id_user`, `nama`, `username`, `password`, `email`, `no_telpon`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin@gmail.com', '123456789012', 'admin'),
(10455343, 'mylovaashop_pare', 'mylovaashoppare', '12345', 'parelov@gmail.com', '082192424213', 'user'),
(49606922, 'mylovaashop_maros', 'm_maros', '12345', 'marosshop@gmail.com', '085298742930', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dta_bahan_baku`
--
ALTER TABLE `dta_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indeks untuk tabel `dta_barang`
--
ALTER TABLE `dta_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `dta_distributor`
--
ALTER TABLE `dta_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `dta_pembayaran`
--
ALTER TABLE `dta_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `dta_pemesanan`
--
ALTER TABLE `dta_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indeks untuk tabel `dta_supplier`
--
ALTER TABLE `dta_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `dta_trnsaksi_brng_masuk`
--
ALTER TABLE `dta_trnsaksi_brng_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `dta_user`
--
ALTER TABLE `dta_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dta_pemesanan`
--
ALTER TABLE `dta_pemesanan`
  ADD CONSTRAINT `dta_pemesanan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `dta_barang` (`kd_barang`),
  ADD CONSTRAINT `dta_pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `dta_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
