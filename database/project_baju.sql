-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 02:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_baju`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_role`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'admin', 'Desy', 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_provinsi` varchar(255) NOT NULL,
  `customer_kota` varchar(255) NOT NULL,
  `customer_provinsi2` varchar(255) DEFAULT NULL,
  `customer_kota2` varchar(255) DEFAULT NULL,
  `customer_provinsi3` varchar(255) DEFAULT NULL,
  `customer_kota3` varchar(255) DEFAULT NULL,
  `customer_alamat` text NOT NULL,
  `customer_alamat2` varchar(255) DEFAULT NULL,
  `customer_alamat3` varchar(255) DEFAULT NULL,
  `alamat_default` varchar(255) DEFAULT NULL,
  `customer_password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_provinsi`, `customer_kota`, `customer_provinsi2`, `customer_kota2`, `customer_provinsi3`, `customer_kota3`, `customer_alamat`, `customer_alamat2`, `customer_alamat3`, `alamat_default`, `customer_password`, `token`, `aktif`, `status`) VALUES
(54, 'Ariska Widiyanto', 'ariska@gmail.com', '0895678654', '6', '152', '10', '398', NULL, NULL, 'Jl. MH Thamrin', 'Jl. Semarang Raya', NULL, 'option2', '37c923621d7655456942c1f8b613e6c6', 'd3b464a89ecb8d06a70cba95d268689cf2bfb769dee73d4e9d3da76763b6f2b5', '1', ''),
(55, 'Devi Noventi', 'devinoventi@gmail.com', '0856784324', '11', '444', NULL, NULL, NULL, NULL, 'Jl. Hayam Wuruk', NULL, NULL, 'option1', '22a08977082d8c227bc9636dc0281503', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(56, 'Andelia Lisa Pandeti', 'andelia@gmail.com', '08567345624', '5', '419', NULL, NULL, NULL, NULL, 'Jl. Magelang Km No.14', NULL, NULL, 'option1', '54ad644d96e58e89690f08d4122a12dd', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(57, 'Nur Latifah', 'latifah@gmail.com', '08786754321', '10', '398', NULL, NULL, NULL, NULL, 'Jl. Kampung Palir', NULL, NULL, 'option1', '8ba20a588da71148c5f54589b4f0b900', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(58, 'Fitria Amirah', 'iraaaaa@gmail.com', '08987654324', '6', '154', NULL, NULL, NULL, NULL, 'Jl. Pelatnas PBSI Cipayung', NULL, NULL, 'option1', 'f26da228007d301c439b6c0bf9451e69', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(59, 'Melisa Pitriani', 'melisa@gmail.com', '08965437862', '4', '175', NULL, NULL, NULL, NULL, 'Jl. Lintas Barat Sumatera ', NULL, NULL, 'option1', '9bd3e6bf8599bc2f31f3f22a16725059', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(60, 'Dandi Eka Pratama', 'dandieka@gmail.com', '082175790142', '6', '152', NULL, NULL, NULL, NULL, 'Jl. Bundaran HI', NULL, NULL, 'option1', '45edcb2c658806efe1cce36126e2b295', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(61, 'Abidatul Izzah', 'abidatulizzah@gmail.com', '08123456734', '6', '152', NULL, NULL, NULL, NULL, 'Jl. MH Thamrin', NULL, NULL, 'option1', 'ce07b6359e24f026d346dcfa67bfc56c', '1546d91e2c8222860d05f985c4c27ef051022d88decb111704e0867c3acd9a9f', '1', ''),
(62, 'Yanuar Simatupa', 'yanuar@gmail.com', '089678987', '6', '154', '10', '398', NULL, NULL, 'Jl. Cipayung Jakarta timur', 'Jl. Semarang Raya', NULL, 'option2', '94fced7d9e42731aea466c6fd447d73a', '922393a8b05eaa241e219eaa17110c09f1352821001ec2f3bb43fd5ab13fdfc1', '1', ''),
(63, 'Desy Ramadhan Dita', 'desy@gmail.com', '0987642247', '11', '178', '6', '152', NULL, NULL, 'Jl. Penanggungan', 'Jl. Bundaran HI No.1', NULL, 'option2', '77f12c3dfcc7ed31b914b58f3ba8fcea', '452e035797a302f86d56e138358d44d4d414a6c113f14fc3c59fcdbafe9dcd35', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `history_invoice` int(11) DEFAULT NULL,
  `history_produk` int(11) DEFAULT NULL,
  `history_jumlah` int(11) DEFAULT NULL,
  `history_harga` int(11) DEFAULT NULL,
  `history_catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `id_transaksi`, `history_invoice`, `history_produk`, `history_jumlah`, `history_harga`, `history_catatan`) VALUES
(25, 26, 45, 112, 1, 29900, '[\"\"]'),
(26, 27, 45, 111, 1, 55000, '[\"\"]'),
(27, 28, 46, 128, 3, 10000, '[\"Merah\"],[\"Ungu\"],[\"Hitam\"]'),
(28, 29, 46, 121, 1, 25000, '[\"\"]'),
(29, 30, 47, 119, 1, 179000, '[\"\"]'),
(30, 31, 47, 121, 1, 25000, '[\"\"]'),
(31, 32, 48, 130, 1, 32000, '[\"Merah\"]'),
(32, 33, 48, 127, 1, 24000, '[\"\"]'),
(33, 34, 49, 130, 2, 32000, '[\"Merah\"],[\"Merah\"]'),
(34, 35, 49, 115, 1, 140000, '[\"\"]'),
(35, 36, 50, 129, 1, 18000, '[\"\"]'),
(36, 37, 51, 116, 2, 796000, '[\"\"],[\"\"]'),
(37, 38, 51, 117, 1, 146000, '[\"\"]'),
(38, 39, 52, 129, 1, 18000, '[\"\"]'),
(39, 40, 52, 128, 1, 10000, '[\"Hitam\"]');

-- --------------------------------------------------------

--
-- Table structure for table `indexweb`
--

CREATE TABLE `indexweb` (
  `indexweb_id` int(11) NOT NULL,
  `indexweb_gambar` varchar(255) NOT NULL,
  `indexweb_judul` varchar(255) NOT NULL,
  `indexweb_konten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_transaksi` int(11) DEFAULT NULL,
  `invoice_customer` int(11) NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alamat` text NOT NULL,
  `invoice_provinsi` varchar(255) NOT NULL,
  `invoice_kabupaten` varchar(255) NOT NULL,
  `invoice_kurir` varchar(255) NOT NULL,
  `invoice_berat` int(11) NOT NULL,
  `invoice_ongkir` int(11) NOT NULL,
  `cod` tinyint(1) NOT NULL,
  `invoice_total_bayar` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_resi` varchar(255) NOT NULL,
  `invoice_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_transaksi`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alamat`, `invoice_provinsi`, `invoice_kabupaten`, `invoice_kurir`, `invoice_berat`, `invoice_ongkir`, `cod`, `invoice_total_bayar`, `invoice_status`, `invoice_resi`, `invoice_bukti`) VALUES
(45, '2022-06-26', 26, 54, 'Ariska Widiyanto', '0895678654', 'Jl. MH Thamrin', '6', '152', 'Pos Indonesia - Paket Kilat Khusus', 38, 7000, 0, 91900, 5, 'A8E3123', '253360280.png'),
(46, '2022-06-29', 29, 59, 'Melisa Pitriani', '08965437862', 'Jl. Lintas Barat Sumatera ', '4', '175', 'Pos Indonesia - Paket Kilat Khusus', 60, 39900, 1, 94900, 5, 'AG67865', ''),
(47, '2022-07-01', 30, 54, 'Ariska Widiyanto', '0895678654', 'Jl. MH Thamrin', '6', '152', 'Pos Indonesia - Paket Kilat Khusus', 350, 7000, 0, 211000, 5, 'G6543E', '1489796557.jpg'),
(48, '2022-07-16', 32, 62, 'Yanuar Simatupa', '089678987', 'Jl. Cipayung Jakarta timur', '6', '154', 'Pos Indonesia - Paket Kilat Khusus', 315, 7000, 0, 63000, 5, 'AG8976', '1395540619.jpg'),
(49, '2022-07-17', 34, 54, 'Ariska Widiyanto', '0895678654', 'Jl. MH Thamrin', '6', '152', 'TIKI - REG', 400, 9000, 0, 213000, 5, 'INV98765', '1689357982.jpg'),
(50, '2022-07-17', 36, 54, 'Ariska Widiyanto', '0895678654', 'Jl. Semarang Raya', '10', '398', 'JNE - OKE', 25, 16000, 1, 34000, 5, 'INV7651', ''),
(51, '2022-07-17', 37, 63, 'Desy Ramadhan Dita', '0987642247', 'Jl. Bundaran HI No.1', '6', '152', 'Pos Indonesia - Paket Kilat Khusus', 1000, 7000, 0, 1745000, 5, 'INV829123', '1249028488.jpg'),
(52, '2022-07-18', 39, 63, 'Desy Ramadhan Dita', '0987642247', 'Jl. Bundaran HI No.1', '6', '152', 'Pos Indonesia - Paket Kilat Khusus', 35, 7000, 0, 35000, 5, 'INV097', '1369238471.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_pict` varchar(255) DEFAULT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_pict`, `kategori_nama`) VALUES
(17, '923283525_stempel.jpg', 'Stempel Runaflek'),
(18, '902557285_stempel.jpg', 'Stempel Emboss'),
(19, '895103647_stempel.jpg', 'Stempel Lak/Wax'),
(20, '1190604478_stempel.jpg', 'Stempel Flash');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(26, 999, 54, 'halo admin, saya ingin menanyakan produk sekian apakah masih tersedia?'),
(27, 54, 999, 'ada kak, masih tersediaaaaaa'),
(29, 54, 999, 'naon'),
(33, 999, 54, 'baik kak terima kasih :)'),
(34, 54, 999, 'sama sama'),
(35, 999, 999, 'testt'),
(36, 999, 54, 'test'),
(37, 999, 62, 'Halo admin saya sudah melakukan checkout barang'),
(38, 62, 999, 'oke mas'),
(39, 999, 63, 'Apakah produk stempel ini masih tersedia?'),
(40, 999, 63, 'saya sudah melakukan checkout ya min'),
(41, 999, 63, 'Terima kasih pak, barang nya sudah diterima');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `isi_notif` varchar(50) NOT NULL,
  `invoice_id` int(50) NOT NULL,
  `is_view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `isi_notif`, `invoice_id`, `is_view`) VALUES
(4, 'Ada pesanan dari Ariska Widiyanto #45', 45, 1),
(5, 'Ada pesanan dari Ariska Widiyanto #45', 45, 1),
(6, 'Ada pesanan dari Melisa Pitriani #46', 46, 1),
(7, 'Ada pesanan dari Melisa Pitriani #46', 46, 1),
(8, 'Ada pesanan dari Ariska Widiyanto #47', 47, 1),
(9, 'Ada pesanan dari Ariska Widiyanto #47', 47, 1),
(10, 'Ada pesanan dari Yanuar Simatupa #48', 48, 1),
(11, 'Ada pesanan dari Yanuar Simatupa #48', 48, 1),
(12, 'Ada pesanan dari Ariska Widiyanto #49', 49, 1),
(13, 'Ada pesanan dari Ariska Widiyanto #49', 49, 1),
(14, 'Ada pesanan dari Ariska Widiyanto #50', 50, 1),
(15, 'Ada pesanan dari Desy Ramadhan Dita #51', 51, 1),
(16, 'Ada pesanan dari Desy Ramadhan Dita #51', 51, 1),
(17, 'Ada pesanan dari Desy Ramadhan Dita #52', 52, 1),
(18, 'Ada pesanan dari Desy Ramadhan Dita #52', 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_idulasan` int(11) DEFAULT NULL,
  `produk_nama` varchar(255) DEFAULT NULL,
  `produk_kategori` int(11) DEFAULT NULL,
  `produk_harga` int(11) DEFAULT NULL,
  `produk_keterangan` text DEFAULT NULL,
  `produk_jumlah` int(11) DEFAULT NULL,
  `produk_berat` int(11) DEFAULT NULL,
  `produk_stat` varchar(255) DEFAULT NULL,
  `produk_foto1` varchar(255) DEFAULT NULL,
  `produk_foto2` varchar(255) DEFAULT NULL,
  `produk_foto3` varchar(255) DEFAULT NULL,
  `produk_catatan` text DEFAULT NULL,
  `id_supplier` int(50) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_idulasan`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_keterangan`, `produk_jumlah`, `produk_berat`, `produk_stat`, `produk_foto1`, `produk_foto2`, `produk_foto3`, `produk_catatan`, `id_supplier`, `tanggal`) VALUES
(105, 0, 'Karet Runaflek Merah 19x25cm  Karet Stempel Runaflek Merah', 17, 55000, '<p>\r\nKaret Runaflek Merah<br><br>Ukuran 19x25 cm<br><br>Ketebalan 1,7mm\r\n\r\n<br></p>', 50, 300, NULL, '904321763_Karet Runaflek Merah 19x25cm  Karet Stempel Runaflek Merah.png', '', '', '[\"\"]', 8, '2022-06-26'),
(106, 0, 'Stempel Manual Runaflek Nylo Gagang Kayu', 17, 20000, '<p>\r\nSTEMPEL CUSTOM Gagang Kayu atau yang dikenal dengan nama Stempel Manual / Stempel Nylo / Stempel Runaflek<br><br>NOTE : *TANPA PAD / BANTALAN TINTA*<br>\r\n\r\n</p><p>\r\nD25 (Ukuran Maksimal Diameter 25 mm)<br>D35 (Ukuran Maksimal Diameter 35 mm)<br>D42 (Ukuran Maksimal Diameter 42 mm)<br>D45 (Ukuran Maksimal Diameter 45 mm)<br>D50 (Ukuran Maksimal Diameter 50 mm)<br>NIP (Ukuran Maksimal 15 mm x 50 mm)<br>2540 (Ukuran Maksimal 25 mm x 40 mm)<br>2570 (Ukuran Maksimal 25 mm x 70 mm)<br>2555 (Ukuran Maksimal 25 mm x 55 mm)<br>3060 (Ukuran Maksimal 30 mm x 60 mm)<br>3535 (Ukuran Maksimal 35 mm x 35 mm)<br>Oval (Ukuran Maksimal 40 mm x 53 mm)<br>4560 (Ukuran Maksimal 45 mm x 60 mm)<br>5090 (Ukuran Maksimal 50 mm x 90 mm)\r\n\r\n<br></p>', 50, 65, NULL, '368051784_Stempel Manual Runaflek Nylo Gagang Kayu.png', '', '', '[\"\"]', 8, '2022-06-26'),
(107, 0, 'Mesin Stempel Runaflek', 17, 550000, '<p>\r\nmesin stempel jenis Runaflek dengan spesifikasi sebagai berikut\r\n<br>Tegangan Kerja		: 220 Volt/50 Hz\r\n<br>Daya Pemakaian  	: 20 Watt\r\n<br>Jumlah Lampu              : 2 Unit UV T5 8W\r\n\r\n\r\n<br></p>', 20, 2500, NULL, '678647070_Mesin Stempel Runaflek.png', '', '', '[\"\"]', 8, '2022-06-26'),
(108, 0, 'Stempel Kayu Runaflek UK. CUSTOM Gede Harga per CM', 17, 2500, '<p>\r\nStempel\r\n ini dibuat dengan bahan pilihan. Penggunaan stempel ini menggunakan \r\nbantalan dengan harga yang murah kami hadirkan kepada anda. dengan \r\ndesain gambar atau tulisan dengan aneka bentuk.\r\n\r\n<br></p>', 50, 5, NULL, '1859366332_Stempel Kayu Runaflek UK. CUSTOM Gede Harga per CM.png', '', '', '[\"\"]', 8, '2022-06-26'),
(109, 0, 'Stempel Kayu / Runaflek karet bening', 17, 20000, '<p>\r\nKETERANGAN UKURAN<br>1). Ukuran Standart<br>Maksimal Ukuran luas 16 cm²<br>- Persegi panjang : ukuran rata-rata orang buat 2 x 5 cm<br>- Kotak : ukuran rata-rata 3.8 x 3.8 cm<br>- Bulat : diameter rata-rata 3,8 cm<br>- Oval : ukuran rata-rata 3 x 5 cm <br></p><p>\r\n2). Ukuran Kecil<br>Maksimal Ukuran luas 6 cm²<br>Contoh : 3 cm x 2 cm = 6 cm² ukuran ini masuk ukuran kecil<br>3). Ukuran Besar<br>Maksimal Ukuran luas 20 cm²<br>\r\n\r\n<br></p>', 50, 25, NULL, '1111483338_Stempel Kayu  Runaflek karet bening -STANDAR.png', '', '', '[\"\"]', 8, '2022-06-26'),
(110, 0, 'Stempel Manual Runaflek Gagang dan Alas Acrylic ( Uk. Maks 5 x5 cm )', 17, 60000, '<p>\r\nStempel Manual Runaflek Gagang dan Alas Acrylic <br>Ukuran MAKSIMAL : 5 x 5 cm\r\n\r\n<br></p>', 50, 60, NULL, '1147536943_Stempel Manual Runaflek Gagang dan Alas Acrylic ( Uk. Maks 5 x5 cm ).png', '', '', '[\"\"]', 8, '2022-06-26'),
(111, 0, 'Cap Kayu Stempel kayu karet Runaflek Runaflex bantalan Rubber stampel', 17, 55000, '<p>\r\nStempel\r\n Kayu adalah stempel gagang kayu dengan karet / rubber stamp yang \r\nmenggunakan bahan karet mentah (karet warna merah) yang diproses secara \r\nkonvensional menggunakan cetakan gips yang dipanaskan hinggga karet \r\nmentah tersebut meleleh dan membentuk cetakan karet untuk stempel.<br>Untuk mengaplikasikannya stempel ini membutuhkan bantalan tinta tambahan.<br><br>Ukuran standard :<br>-Stempel Persegi Panjang 4cm x 3cm<br>-Stempel Bulat diameter 4cm<br>-Stempel Oval 4cm X 3cm\r\n\r\n<br></p>', 49, 3, NULL, '2051616141_Cap Kayu Stempel kayu karet Runaflek Runaflex bantalan Rubber stampel.png', '', '', '[\"\"]', 8, '2022-06-26'),
(112, 0, 'STEMPEL RUNAFLEK KARET KUNING', 17, 29900, '<p>\r\nAdalah\r\n stempel model lama yang masih menggunakan bantalan, namun sudah dibuat \r\nmenggunakan desain komputer sehingga bisa mendekati desain yang \r\ndiinginkan, seperti logo, font, dll.<br>Harga tercantum diatas merupakan harga dengan ukuran standar kantor -+ 4x4cm,<br>Gagang Kayu sesuai bentuk dan ukuran\r\n\r\n<br></p>', 54, 35, NULL, '1053068151_STEMPEL RUNAFLEK KARET KUNING.png', '', '', '[\"\"]', 8, '2022-06-26'),
(113, 0, 'Stampel logo Stempel logo emboss logo kuningan 2x3 cm', 18, 205000, '<p>\r\nKami menerima pembuatan label emboss atau stamp logo 2 x 3 cm ( Bahan kuningan )<br><br>(TIDAK TERMASUK SOLDER) <br></p><p><br></p>', 100, 100, NULL, '1023679066_Stempel logo emboss logo kuningan 2x3 cm.png', '', '', '[\"\"]', 8, '2022-06-27'),
(114, 0, 'Stempel Emboss / Stempel Timbul', 18, 257400, '<p>\r\nStempel Emboss / Stempel Timbul Pocket.<br><br>Stempel\r\n dengan hasil berbentuk tulisan timbul (tanpa warna). Biasa digunakan \r\nuntuk cap/penanda pada Surat-Surat yang berhubungan dengan legalitas \r\nperusahaan, ataupun penerbitan suatu penghargaan seperti sertifikat, \r\nijazah, dll.<br><br>Berbentuk seperti tang sehingga mudah dan praktis utk dibawa kemana saja.<br><br>Harga sdh meliputi :<br>*1pcs Gagang Emboss<br>*1pcs Plat Design Emboss<br>*1pcs Box Gagang<br>*Free Design\r\n\r\n<br></p>', 50, 451, NULL, '83642638_Stempel Emboss _ Stempel Timbul.png', '', '', '[\"\"]', 8, '2022-06-27'),
(115, 0, 'Plat stempel emboss', 18, 140000, '<p>\r\nHanya plat saja.. harus sudah ada desain, maksimal desain diameter lingkaran 3.6cm.\r\n\r\n<br></p>', 49, 150, NULL, '117989075_plat stempel emboss.png', '', '', '[\"\"]', 8, '2022-06-27'),
(116, 0, 'PESANAN STEMPEL SEAL PRESS EMBOSS TRODAT 970041 (40mm)', 18, 796000, '<p>\r\nPesanan pembuatan stempel trodat emboss dengan hasil yang akurat dan hasil emboss jelas, rapi dan tahan lama<br>Warna body stempel acak sesuai warna yang ready stock <br>Max text area 40mm<br>Free jasa desain stempel, \r\n\r\n<br></p>', 28, 500, NULL, '574376954_STEMPEL SEAL PRESS EMBOSS TRODAT 970041 (40mm).png', '', '', '[\"\"]', 8, '2022-06-27'),
(117, 0, 'Gagang Stempel Emboss Pocket', 18, 146000, '<p>\r\nGagang Stempel Emboss Pocket<br><br>Warna dan bentuk sesuai di foto. (Tidak termasuk cetakan plat)\r\n\r\n<br></p>', 49, 500, NULL, '174630439_Gagang Stempel Emboss Pocket.png', '', '', '[\"\"]', 8, '2022-06-27'),
(118, 0, 'Refill WAX Stamp emboss stampel lilin hiasan scrapbook craft', 18, 7000, '<p>\r\nRefill\r\n Wax Stamp Berbahan dasar lilin dengan warna yang bervariasi Praktis \r\nkarena sudah berbentuk potongan sehingga praktis dan mudah meleleh saat \r\ndipanaskan<br><br>Harap beri keterangan nomor <br>Cara pakai<br>1. Taruh refill ke atas sendo<br>2. Panaskan diatas lilin sampai mencair<br>3. Tuang refill yang sudah mencair keatas media yang mau di seal<br>4. Stamp, diamkan beberapa detik, lalu angkat</p><p>\r\n35. Noble Gold<br>36. Gold<br>37. Royal Gold<br>38. Buff Beige<br>39. Light Gold<br>40. Cooper Gold<br>41. Champaign Gold<br>42. Antique Brass Gold<br>43. Silver\r\n\r\n<br>Tips=\r\n supaya hasil rapih kalian bisa stamp di atas teflon sheet (kami jual \r\nbiasa untuk Clay Mat), lalu setelah kering baru lepaskan (mudah lepas \r\nseperti sticker karena tidak lengket di teflon sheet) selain itu kalau \r\ndirasa bentuknya kurang sesuai, bisa di lelehkan kembali. isi 10pc/set\r\n\r\n<br></p>', 100, 10, NULL, '915158046_Refill WAX Stamp emboss stampel lilin hiasan scrapbook craft.png', '', '', '[\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\"]', 8, '2022-06-27'),
(119, 0, 'Hot Stamp Cake Kue Chiffon Bolu Stempel Emboss Cetakan Cheesecake', 18, 179000, '<p>\r\nHot stamp set: 1 motif + 1 gagang<br>?Cara penggunaan: dipanaskan di atas api kompor kemudian ditempel ke area cake yg diinginkan<br>?Premium quality - tidak bisa custom ya.<br>?Ready stock selama bisa checkout ya\r\n\r\n<br></p>', 49, 300, NULL, '1597649523_Hot Stamp Cake Kue Chiffon Bolu Stempel Emboss Cetakan Cheesecake.png', '', '', '[\"\"]', 8, '2022-06-27'),
(120, 0, 'Stempel bakar emboss hot stamp Untuk branding kayu wood working mark', 18, 1100000, '<p>\r\nPlat matras emboss hot print hot stamp kuningan dengan model dan ukuran sesuai permintaan dari pemesan.<br><br>Produk ini untuk aplikasi pada objek stamp berbahan kulit hewan, imitasi, kayu, roti, plastik, mika dan lain lain.<br><br>hasilnya sebagai branding, merek, cap, inisial, tanda, ucapan, dll.<br><br>gambar\r\n pada market place ini hanya sebagai sample, adapun untuk harga, ukuran \r\ndan bentuk desain sesuai kebutuhan anda bisa melalui chatbox<br></p>', 20, 800, NULL, '1334315874_stempel bakar emboss hot stamp Untuk branding kayu wood working mark.png', '', '', '[\"\"]', 8, '2022-06-27'),
(121, 0, 'Flower + Gold/Silver Wax Seal Sticker/Adhesive (Isi 5)', 19, 25000, '<p>\r\n1 pack (5 wax seals) +/- 3 cm diameter<br>Materials: Flowers, Gold/Silver Flakes, Wax, Sticker<br>Variety Pack (Random Mix)<br><br>With the addition of real flowers, our wax seals add an elegant touch to your letters, gifts, cards and more. <br>These ready-to-go handmade seals are easy to use - all you need to do is peel and stick!<br>We use 3M adhesive to provide you with the best quality (please refer to the video)<br><br>Wax seal  dengan bunga asli bisa membuat undangan, surat, kartu, hadiah, dll tambah cantik.<br>Gampang banget lho pakainya, tinggal kupas dan tempel!\r\n\r\n<br></p>', 98, 50, NULL, '840367424_Flower Gold_Silver Wax Seal Sticker_Adhesive (Isi 5).png', '', '', '[\"\"]', 8, '2022-06-27'),
(122, 0, 'Segel Lilin Wax Sealing Stamp Stick Classic Stampel Stempel Cap Lilin', 19, 9000, '<p>\r\nRefill Segel Wax Sealing Stamp<br>Berbahan dasar lilin dengan warna yang bervariasi<br>Praktis\r\n karena dapat langsung dipanaskan menggunakan lem tembak, dan dapat juga\r\n dipotong untuk dipanaskan dengan sendok. Karakteristiknya mudah meleleh\r\n saat dipanaskan\r\n\r\n<br></p>', 100, 10, NULL, '445882118_Segel Lilin Wax Sealing Stamp Stick Classic Stampel Stempel Cap Lilin.png', '', '', '[\"\"]', 8, '2022-06-27'),
(123, 0, 'KEPALA WAX SEALER FEATHER WOODEN STAMP/ STEMPEL SEGEL TEMBAGA PLANNER', 19, 30000, '<p>\r\nSpecification:<br>Item: Wax Seal Stamp Head<br>Material: Gold-plated brass head<br>Size: seal thickness is 5mm/0.2in<br>Seal diameter: 25mm/0.98in<br>Pattern: A-Crown/B-Rose/C-Tree/D-Bee/E-Rose with Leaf/F-Love/G-Lovers&nbsp;</p><p><br></p>', 50, 30, NULL, '532363873_KEPALA WAX SEALER FEATHER WOODEN STAMP_ STEMPEL SEGEL TEMBAGA PLANNER.png', '', '', '[\" A-Crown\",\"B-Rose\",\"C-Tree\"]', 8, '2022-06-27'),
(124, 0, 'Spoon Wax Seal Stamp | Sendok Lilin Segel Stempel Stainless Steel', 19, 19000, '<p>\r\nSpoon Wax Seal Stamp | Sendok Lilin Segel Stempel <br><br>Detail ukuran dan dimensi di foto masing-masing variant\r\n\r\n<br></p>', 30, 2, NULL, '2036440566_Spoon Wax Seal Stamp Sendok Lilin Segel Stempel Stainless Steel.png', '', '', '[\"1\",\"2\",\"3a\",\"3b\",\"4\"]', 8, '2022-06-27'),
(125, 0, 'Fast Print Mesin Stempel Flash Kilat Premium 4 Lampu Full Plat Besi', 20, 2000000, '<p>\r\nGRATIS 2 PCS KARET SPON 15X33CM dan PACKING KAYU untuk setiap pembelian Mesin Stempel 4 Lampu. HEMAT SAMPAI Rp. 150.000!!!<br><br>SPESIFIKASI MESIN STEMPEL:<br>- Support Stempel: Stempel model Flash<br>- Ukuran Media Flash: 13,6 X 10,2 CM<br>- Material: Full Plat Besi<br>- Konsumsi daya 74,8 Watt.<br>- Garansi : 6 Bulan Service (tidak termasuk Sparepart)<br><br>KEUNGGULAN MESIN STEMPEL FAST PRINT:<br>- Terbuat dari material berkualitas TERBAIK, FULL PLAT BESI sehingga AWET dan ANTI KARAT.<br>- Dapat membuat stempel dengan CEPAT, hanya HITUNGAN DETIK.<br>- Penggunaan LEBIH MUDAH dan LEBIH EFISIEN.<br>- Media flash 13,6 X 10,2 CM LEBIH BESAR daripada mesin stempel lokal.<br>- Dilengkapi dengan KNOP PENGUNCI sehingga Karet Stempel tidak bergeser saat proses flash dan hasilnya menjadi LEBIH RATA.<br>- Tersedia kontrol pilihan kemampuan flash dari level 0 hingga 8.\r\n\r\n<br></p>', 20, 900, NULL, '53058497_Screenshot 2022-06-27 at 20-06-47 Fast Print Mesin Stempel Flash Kilat Premium 4 Lampu Full Plat Besi di Fast Print Makassar Tokopedia.png', '', '', '[\"\"]', 8, '2022-06-27'),
(126, 0, 'Stempel Flash Lunas Bulat', 20, 20000, '<p>\r\nstempel flash lunas bulat, ukuran D25<br>tersedia warna merah dan biru\r\n\r\n<br></p>', 30, 200, NULL, '436774327_Screenshot 2022-06-27 at 20-09-44 Stempel Flash Lunas Bulat - Merah di SEN36OFFICIAL Tokopedia.png', '', '', '[\"Merah\",\"Biru\"]', 8, '2022-06-27'),
(127, 0, 'Stempel flash/stempel otomatis 1 warna, FREE DESAIN, bisa custom', 20, 24000, '<p>\r\nstempel\r\n flash atau otomatis merupakan stempel langsung ada tintanya, tintanya \r\npun bisa diisi ulang kalau sudah habis, anda cukup meneteskan saja di \r\nkaretnya, tunggu nyerap dan setelah itu dilap dengan tisu, siap dipakai \r\nlagi deh...<br>oh ya tintanya khusus ya kakak2...agan2...<br><br>Sebelum order kakak2 atau agan2 boleh chat kami dulu untuk konfirmasi desain, ukuran, warna dan lainnya.<br><br>spesifikasi ukurannya :<br><br>Varian Kecil :<br><br>Persegi panjang 1,3cm x 4,0cm<br>Bulat 1,7cm<br>Bulat 2,3cm<br>Bulat 2,6cm<br>Kotak 1,8cm x 1,8cm<br>Kotak 2,2cm x 2,2cm<br>Kotak 2,6cm x 2,6cm<br><br>Varian Standard :<br>Persegi Panjang 1,7cm x 5,5cm<br>Persegi Panjang 2,2cm x 5,5cm<br>Persegi Panjang 1,7cm x 6,7cm<br>Persegi Panjang 1,3cm x 4,3cm<br>Persegi Panjang 1,7cm x 4,3cm<br>Persegi Panjang 2,2cm x 4,3cm<br>Persegi Panjang 2,7cm x 4,3cm<br>Kotak 3,0cm x 3,0cm<br>Kotak 3,5cm x 3,5cm<br>Bulat 2,8cm<br>Bulat 3,2cm<br>Bulat 3,5cm<br><br>Varian Besar :<br>Persegi Panjang 3,2cm x 5,5cm<br>Persegi Panjang 1,7cm x 7,8cm<br>Persegi Panjang 1,7cm x 9,1cm<br>Persegi Panjang 2,2cm x 6,7cm<br>Persegi Panjang 2,7cm x 6,7cm<br>Persegi Panjang 3,2cm x 6,7cm<br>Persegi Panjang 2,2cm x 7,8cm<br>Persegi Panjang 2,2cm x 9,1cm<br>Persegi Panjang 2,7cm x 5,5cm<br>Persegi Panjang 3,2cm x 4,3cm<br>Bulat 4,0cm<br>Bulat 4,5cm<br>Bulat 5,1cm<br><br>Varian Extra Besar :<br>Persegi Panjang 2,7cm x 7,8cm<br>Persegi Panjang 2,7cm x 9,1cm<br>Persegi Panjang 2,7cm x 10,3cm<br>Persegi Panjang 2,7cm x 12,8cm<br>Persegi Panjang 3,2cm x 7,8cm<br>Persegi Panjang 3,2cm x 9,1cm<br>Persegi 4,3cm x 5,5cm<br>Persegi 4,3cm x 6,7cm<br>Persegi 4,3cm x 7,8cm<br>Persegi 5,3cm x 5,5cm<br>Persegi 5,3cm x 6,7cm\r\n\r\n<br></p>', 19, 65, NULL, '88088245_Screenshot 2022-06-27 at 20-12-35 stempel flash_stempel otomatis 1 warna FREE DESAIN bisa custom - 1 Warna Kecil di anidara Tokopedia.png', '', '', '[\"\"]', 8, '2022-06-27'),
(128, 0, 'Tinta Stempel Flash Fast Print Warna Biru (Blue Ink) 5ml', 20, 10000, '<p>\r\nSTOK TINTA STEMPEL READY 1000++ PCS. JAMINAN HARGA TERMURAH DI TOKOPEDIA!<br>LANGSUNG PESAN SAJA..<br><br>Spesifikasi:<br>- Support Stempel: Stempel Flash.<br>- Pilihan Warna: Hitam, Merah, Hijau, Ungu, Biru, Orange, Kuning, Merah Muda, Abu-Abu, Cokelat.<br>- Ukuran: 5 ML. <br>- Pemakaian: 1x Refill dapat digunakan hingga 300x cap<br><br>Keunggulan Tinta Stempel Flash Fast Print:<br>- Tinta Stempel Flash Fast Print ANTI LUNTUR / WATERPROFF meskipun terkena air.<br>- Hasil Cap CEPAT KERING, LEBIH TAJAM dan JELAS dibanding MERK LAIN.<br>- Tersedia berbagai macam pilihan warna: Hitam, Merah, Hijau, Ungu, Biru, Orange, Kuning, Merah Muda, Abu-Abu, Cokelat.<br>- Tinta Stempel Flash Fast Print berkualitas TERBAIK dikelasnya.<br>- Menggunakan botol tetes sehingga MUDAH pengaplikasian Tinta Stempel ke permukaan Busa Stempel.<br>- Mampu MENGHASILKAN HINGGA 300x CAP UNTUK 1x PENGISIAN<br><br>Tinta\r\n stempel Flash digunakan khusus untuk mesin stempel flash. Tinta ini \r\ndapat membantu anda untuk mengisi stempel agar tidak belepotan sesuai \r\ndengan kebutuhan warna yang anda inginkan.\r\n\r\n<br></p>', 46, 10, NULL, '102061464_Screenshot 2022-06-27 at 20-14-55 Tinta Stempel Flash Fast Print Warna Biru (Blue Ink) 5ml - Cokelat di Fast Print Indonesia Tokopedia.png', '', '', '[\"Hitam\",\"Merah\",\"Ungu\"]', 8, '2022-06-27'),
(129, 0, 'Stempel Nama Flash Mini 10x28 mm', 20, 18000, '<p>\r\nStempel Nama Mini Ukuran 10x28 mm\r\n\r\n<br></p>', 28, 25, NULL, '1493900082_Screenshot 2022-06-27 202413.png', '', '', '[\"\"]', 8, '2022-06-27'),
(130, 0, 'Cetak Stempel Flash| Stample Flash 2 Warna', 20, 32000, '<p>\r\nDeskripsi Cetak Stempel Flash| Stample Flash 2 Warna<br>Stempel Warna / Flash adalah setempel tanpa bantalan dalam pemakaiannya<br>stempel ini bisa terdiri dari beberapa warna dan ukuran<br><br>Spesifikasi :<br>- 2 Warna<br>- ukuran tertera di ETALASE<br>- Jarak Antar Warna 3 MM\r\n\r\n<br></p>', 27, 250, NULL, '2124060125_Screenshot 2022-06-27 203839.png', '', '', '[\"Merah\",\"Biru\"]', 8, '2022-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES
(8, 'Desy', 'Jl. Bagawan Tabari Gang II, Gogorante, Kediri');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_invoice` int(11) NOT NULL,
  `transaksi_produk` int(11) NOT NULL,
  `transaksi_jumlah` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `indexweb`
--
ALTER TABLE `indexweb`
  ADD PRIMARY KEY (`indexweb_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `indexweb`
--
ALTER TABLE `indexweb`
  MODIFY `indexweb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
