-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: dbjwd:33064
-- Generation Time: Aug 15, 2022 at 01:43 AM
-- Server version: 10.8.3-MariaDB-1:10.8.3+maria~jammy
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `_profil_toko`
--

CREATE TABLE `_profil_toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL DEFAULT 'Toko Buku KNTechline',
  `pemilik_toko` varchar(255) NOT NULL DEFAULT 'Handoko Wae',
  `no_telp_toko` char(20) NOT NULL DEFAULT '0812 7114 2239',
  `email` varchar(255) DEFAULT NULL,
  `alamat_toko` text NOT NULL DEFAULT 'Jl. Pasar Punggur - Kec. Punggur - Lampung Tengah',
  `kode_pos` char(5) NOT NULL DEFAULT '34152',
  `kab_kota` varchar(255) DEFAULT 'Lampung Tengah - Lampung',
  `status_buka` int(1) NOT NULL DEFAULT 1,
  `image_toko` varchar(255) DEFAULT NULL,
  `lokasi_toko` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_profil_toko`
--

INSERT INTO `_profil_toko` (`id`, `nama_toko`, `pemilik_toko`, `no_telp_toko`, `email`, `alamat_toko`, `kode_pos`, `kab_kota`, `status_buka`, `image_toko`, `lokasi_toko`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toko Buku KNTechline', 'Handoko Wae', '0812 7114 2239', 'restapi.handoko@gmail.com', 'Jl. Pasar Punggur - Kec. Punggur - Lampung Tengah', '34152', 'Lampung Tengah - Lampung', 1, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.400595020973!2d105.2714333224793!3d-5.038614984644751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe031ac8848116c80!2zNcKwMDInMTkuMCJTIDEwNcKwMTYnMzMuMyJF!5e0!3m2!1sid!2sid!4v1660200536295!5m2!1sid!2sid\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '2022-08-11 13:50:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_tb_buku`
--

CREATE TABLE `_tb_buku` (
  `bid` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_tb_buku`
--

INSERT INTO `_tb_buku` (`bid`, `k_id`, `nama_buku`, `pengarang`, `deskripsi`, `tahun_terbit`, `gambar`, `harga`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'Buku Pelajaran Ilmu Penyakit Dalam', 'Dr. Soetomo', 'Buku Ajar Edisi-2 ini dibuat dengan memperhatikan kepentingan yang seimbang antara pendidikan dan pelayanan/klinis praktis, dan dengan demikian akan sangat memberikan manfaat bagi para mahasiswa kedokteran, dokter dan dokter spesialis dalam melaksanakan tugas dan tanggung jawabnya. Untuk kepentingan pendidikan maka topik/bahasan yang dipilih dan dijabarkan pada buku ajar ini sangat memadai, karena sesuai dengan kemutakhiran baik dari sisi pathogenesis dan tatalaksana yang ada di bidang penyakit dalam, sehingga dapat menjamin tambahan pengetahuan yang baik.\r\n\r\nMenyambut era pelaksanaan Jaminan Kesehatan Nasional ( JKN) di Indonesia di mana sangat banyak hal atau istilah “baru” di dalam pelayanan kedokteran-kesehatan, maka materi yang dibahas dalam buku ajar ini sangat sesuai, dan dapat dipakai sebagai salah satu referensi untuk pembuatan PPK (Panduan Praktik Klinik, “Clinical pathway”, Algoritma dll, dan sangat dapat disesuaikan dengan kemampuan fasilitas kesehatan setempat untuk memberikan pelayanan yang terbaik kepada pasien.\r\n\r\nBuku Ajar Ilmu Penyakit Dalam Edisi-2 ini akan memuat semua makalah para kontributor dari 8 Sub Bagian/Divisi yaitu Alergi-Immunologi, Endokrinologi-Metabolik, Gastroenterologi-Hepatologi, Hematologi-Onkologi Medik, Nefrologi-Hipertensi, Rematologi, Tropik-Infeksi, Geriatri dan membahas juga Toksikologi.\r\n\r\nBuku-Ajar Edisi-2 ini mengandung perkembangan Ilmu Penyakit Dalam dan pengalaman klinik para kontributor yang meliputi 127 judul dan akan tercetak 812 halaman (Edisi-1 hanya memuat 64 judul dengan 384 halaman).\r\n\r\nBuku Ajar Ilmu Penyakit Dalam ini selain dapat menjadi sumber pengetahuan bagi tenaga kesehatan, juga diharapkan dapat meningkatkan pelayanan kesehatan yang aman dan bermutu untuk pasien dan keluarganya di lingkungan RS Pendidikan Dr. Soetomo Surabaya.\r\n\r\nSemoga dengan terbitnya buku ini dapat meningkatkan mutu pendidikan dokter di masa datang dan akhirnya kami ucapkan selamat kepada seluruh staf pengajar dan berbagai pihak yang terlibat dalam penerbitan Buku Ajar Ilmu Penyakit Dalam ini.', 2015, 'file-2022-08-12-at-08-52-00-3956389.jpg', 150000, 10, '2022-08-12 08:52:00', NULL, NULL),
(3, 4, 'My Baby Reads ! I Like Beach Because…', 'Arleen A', 'Otak anak berkembang lebih pesat jika dibacakan cerita sejak bayi. Ikatan orangtua dan anak pun akan lebih kuat.', 2018, 'file-2022-08-12-at-08-55-31-7670017.jpg', 50000, 20, '2022-08-12 08:55:31', NULL, NULL),
(4, 4, 'Menjadi Seorang Istri', 'Esther Setiawati, Krisna Dewi, Erwien Nany Ea, Se.', 'Jika Anda seperti saya dan banyak istri lainnya, Anda mungkin merasa tidak yakin dan tertekan menghadapi tantangan-tantangan menjadi istri di jaman 4.0 ini. Namun saya percaya jika kita mau belajar, dan salah satunya melalui buku ini, kita akan diberi hikmat dan kekuatan.\r\n\r\nBuku persembahan penerbit HappyHolyKids', 2020, 'file-2022-08-12-at-08-56-45-2587026.jpg', 75000, 30, '2022-08-12 08:56:45', NULL, NULL),
(5, 1, 'Buku Pintar: Tumbuhan', 'Jumanta', 'Tumbuhan adalah makhluk hidup yang unik. Walau kita telah sering melihat mereka, namun apakah kita telah benar-benar mengenal siapa mereka sebenarnya? - Tahukah kamu bahwa ada tumbuhan berjenis karnivora? - Tahukah kamu bagaimana cara berbagai buah itu bisa tumbuh? - Tahukah kamu bahwa tumbuhan bisa mengerti bahasa manusia? Buku ini menghadirkan segala yang perlu kita tahu tentang dunia tumbuhan dengan cara paling mudah namun padat dan kaya akan pengetahuan. Dilengkapi dengan ratusan foto dan ilustrasi yang menunjang, menjadikan buku ini tidak hanya enak dibaca, namun juga akan mempermudah pembaca untuk mempelajari tentang kehidupan tumbuhan dengan cara yang menyenangkan.', 2019, 'file-2022-08-12-at-08-58-39-8236413.jpg', 60000, 50, '2022-08-12 08:58:39', NULL, NULL),
(6, 1, 'BUKU AJAR KONSEP DASAR PEMBIAYAAN DAN PENGANGGARAN KESEHATAN', 'Ayu Laili Rahmiyati, SKM.,MM (RS)', 'Puji syukur selalu kami panjatkan ke hadirat Allah SWT yang telah memberikan semua nikmat-Nya sehingga penulis berhasil menyelesaikan buku yang berjudul Buku Ajar Pembiayaan dan Penganggaran Kesehatan ini dengan tepat waktu tanpa adanya kendala yang berarti. Tujuan dari penyusunan buku ini adalah untuk memudahkan para pembaca dalam memahami tentang teori pembiayaan dan penganggaran kesehatan. Keberhasilan penyusunan buku ini tentunya bukan atas usaha penulis saja, tetapi ada banyak pihak yang turut membantu dan memberikan dukungan untuk suksesnya penulisan buku ini. Untuk itu, penulis mengucapkan terima kasih yang sebesar-besarnya kepada semua pihak yang telah memberikan dukungan, baik secara morel ataupun materiel sehingga buku ini berhasil disusun. Buku yang ada di hadapan pembaca ini tentu tidak luput dari kekurangan. Selalu ada celah untuk perbaikan. Oleh karena itu, kritik, saran, serta masukan dari pembaca sangat kami harapan. Untuk itu, kami sangat terbuka supaya buku ini semakin sempurna dan lengkap.', 2021, 'file-2022-08-12-at-09-00-10-3005154.jpg', 80000, 30, '2022-08-12 09:00:10', NULL, NULL),
(7, 1, 'test', 'atsada', 'buu bacaan', 2020, 'file-2022-08-12-at-10-41-58-4677400.jpg', 50000, 10, '2022-08-12 10:41:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_tb_cart`
--

CREATE TABLE `_tb_cart` (
  `cid` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantiti` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_tb_cart`
--

INSERT INTO `_tb_cart` (`cid`, `u_id`, `p_id`, `quantiti`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 6, 3, 80000, '2022-08-12 12:29:16', '2022-08-12 13:48:03', NULL),
(3, 4, 6, 1, 80000, '2022-08-12 14:25:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_tb_kategori_buku`
--

CREATE TABLE `_tb_kategori_buku` (
  `kid` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_tb_kategori_buku`
--

INSERT INTO `_tb_kategori_buku` (`kid`, `kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PENDIDIKAN', '2022-08-12 00:18:58', NULL, NULL),
(3, 'PANTUN', '2022-08-12 08:48:20', NULL, NULL),
(4, 'CERITA', '2022-08-12 08:53:58', '2022-08-12 12:14:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_tb_message`
--

CREATE TABLE `_tb_message` (
  `mid` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_tb_transaksi`
--

CREATE TABLE `_tb_transaksi` (
  `tid` int(11) NOT NULL,
  `kode_transaksi` char(10) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantiti` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payed` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_users_tb`
--

CREATE TABLE `_users_tb` (
  `uid` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(100) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `no_hp` char(20) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `level` int(1) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_users_tb`
--

INSERT INTO `_users_tb` (`uid`, `email`, `password`, `fullname`, `no_hp`, `kode_pos`, `alamat`, `image`, `level`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'a@gmail.com', '$2y$10$VZ.1i09hGsSFcjS3CuInuulohWjJzNtIMwY0kqNQ3qXm2/8FoQ1P.', 'Bejo Dwi Handoko', '081271142239', '34152', 'Digul, Punggur - Lampung Tengah', NULL, 1, 1, '2022-08-11 20:14:27', NULL, NULL),
(4, 'b@gmail.com', '$2y$10$bt06B7tvAAWotqqrA/8WCOafbKaPZlKBT8z3ww7sFT6z5MaILmKj.', 'aaaaaa', '8909098908', '34111', 'akgkkgklglkglkglkklg', NULL, 0, 1, '2022-08-12 10:39:39', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_profil_toko`
--
ALTER TABLE `_profil_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tb_buku`
--
ALTER TABLE `_tb_buku`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `_tb_cart`
--
ALTER TABLE `_tb_cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `_tb_kategori_buku`
--
ALTER TABLE `_tb_kategori_buku`
  ADD PRIMARY KEY (`kid`) USING BTREE;

--
-- Indexes for table `_tb_message`
--
ALTER TABLE `_tb_message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `_tb_transaksi`
--
ALTER TABLE `_tb_transaksi`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `_users_tb`
--
ALTER TABLE `_users_tb`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_profil_toko`
--
ALTER TABLE `_profil_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `_tb_buku`
--
ALTER TABLE `_tb_buku`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `_tb_cart`
--
ALTER TABLE `_tb_cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_tb_kategori_buku`
--
ALTER TABLE `_tb_kategori_buku`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `_tb_message`
--
ALTER TABLE `_tb_message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tb_transaksi`
--
ALTER TABLE `_tb_transaksi`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_users_tb`
--
ALTER TABLE `_users_tb`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
