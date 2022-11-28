-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 03:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptedrequest`
--

CREATE TABLE `acceptedrequest` (
  `ID_Facility` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ID_requester` varchar(255) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `requestedFacility` varchar(255) NOT NULL,
  `ID_waitingApproval` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acceptedrequest`
--

INSERT INTO `acceptedrequest` (`ID_Facility`, `start_date`, `end_date`, `ID_requester`, `requester`, `requestedFacility`, `ID_waitingApproval`, `status`) VALUES
(61, '2021-11-26', '2021-11-28', '61a49b4e26e7f', 'lord iwa', 'Kamar 2', '61a5c1fae91a8', 'Accepted'),
(61, '2021-11-11', '2021-11-13', '61a49b4e26e7f', 'lord iwa', 'Dining Hall 1', '61a6231a33da4', 'Accepted'),
(61, '2021-11-19', '2021-11-23', '61a49cb1e7e73', 'iwi', 'Kamar 6', '61a6247722736', 'Accepted'),
(61, '2021-11-04', '2021-11-06', '61a49cb1e7e73', 'iwi', 'Dance Hall 5', '61a6248672fc7', 'Accepted'),
(61, '2021-12-02', '2021-12-06', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a74185cac87', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_Fasilitas` varchar(255) NOT NULL,
  `NAMA_Fasilitas` varchar(255) DEFAULT NULL,
  `URL_Gambar` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`ID_Fasilitas`, `NAMA_Fasilitas`, `URL_Gambar`, `Description`) VALUES
('61a5c01495447', 'Kamar 5', '510.jpg', 'Merupakan kamar dengan jenis Suite Room, Menyediakan ruang tamu yang terpisah dengan kamar tidur, dapur, serta memiliki ruangan yang lebih luas, dan tentu saja memiliki desain serta furnitur yang mewah.'),
('61a5c0272f8a1', 'Kamar 6', '6.jpg', 'Merupakan kamar dengan jenis standard, yang dilengkapi dengan tempat tidur yang cukup luas serta nyaman, dan tentu saja harga yang disediakan merupakan harga terjangkau'),
('61a5c04c368ec', 'Ballroom 1', '124.jpg', 'Merupakan Ballroom yang memiliki 3 bagian yakni bagian tengah, kiri, serta kanan. Bagian kanan dan kiri merupakan tempat untuk para tamu duduk dan makan, sedangkan bagian tengah merupakan tempat untuk menuju panggung utama.\r\n'),
('61a5c05c70a24', 'Ballroom 2', '23.jpg', 'Merupakan Ballroom yang memiliki design interior yang berwarna emas serta kehitaman, dilengkapi karpet merah yang cantik, serta meja makan dan kursi yang berwarna putih semakin menambah kesan elegan pada ballroom ini '),
('61a5c06eea8b4', 'Ballroom 3', '31.jpg', 'Ballroom yang satu ini memiliki area yang nampak cerah serta terang karena dihiasi berbagai lampu, bahkan mejanya saja terdapat lampu di dalamnya, memiliki design yang cukup sederhana namun tetap mewah.'),
('61a5c07f98e3e', 'Ballroom 4', '41.jpg', 'Ballroom yang satu ini memiliki design yang bernuansa hitam, disetiap meja terdapat lampu yang berwarna biru terang sehingga membuat ballroom yang satu ini terlihat sangat elegan serta indah.'),
('61a5c098b71d5', 'Ballroom 5', '51.jpg', 'Ballroom ini memiliki design tahun 90-an, terdapat 2 jenis meja makan, yakni meja makan bundar, serta meja makan persegi panjang, memiliki tempat yang sangat luas dan bisa menampung banyak tamu.'),
('61a5c0afacec1', 'Ballroom 6', '61.jpg', 'Ballroom yang satu ini memiliki design yang sangat sederhana, berhiasan berbagai lampu indah dan karpet dengan motif yang indah. Bisa menampung cukup banyak orang serta, memiliki area yang cukup luas sehingga para tamu akan merasa sangat leluasa.\r\n'),
('61a5c160ec3f1', 'Dance Hall 1', '125.jpg', 'Dance hall yang satu ini merupakan dance hall yang di design untuk acara yang tidak terlalu besar, bisa menampung 100-200 orang, memiliki design yang sederhana namun tetap indah untuk dinikmati, dilengkapi berbagai jenis alat musik untuk mengiringi tarian.\r\n'),
('61a5c1935fe46', 'Dance Hall 2', '24.jpg', 'Dance hall yang dilengkapi dengan lantai yang berkualitas tinggi, memiliki desain interior yang modern serta tampak megah, bisa menampung sekitar 400-700 orang, dilengkapi juga dengan tempat khusus untuk para pemain musik memainkan musik. Terdapat juga speaker berkualitas tinggi mengelilingi seluruh ruangan.\r\n'),
('61a5c1cd68898', 'Dance Hall 3', '32.jpg', 'Dance hall mewah yang biasa digunakan untuk acara besar, memiliki design interior yang mewah dan berkualitas tinggi, bisa menampung 3000-5000 orang, memliki berbagai jenis teknologi, seperti lighthing, suround speaker, serta lantai yang berkualitas tinggi. '),
('61a5c2114de1f', 'Dance Hall 4', '42.jpg', 'Dance hall mewah yang biasa digunakan untuk acara besar, memiliki design interior yang mewah dan berkualitas tinggi, bisa menampung 3000-5000 orang, memliki berbagai jenis teknologi, seperti lighthing, suround speaker, serta lantai yang berkualitas tinggi. '),
('61a5c238e6c78', 'Dance Hall 5', '52.jpg', 'Dance hall yang dilengkapi dengan lantai yang berkualitas tinggi, memiliki desain interior yang modern serta tampak megah, bisa menampung sekitar 400-700 orang, dilengkapi juga dengan tempat khusus untuk para pemain musik memainkan musik. Terdapat juga speaker berkualitas tinggi mengelilingi seluruh ruangan.\r\n'),
('61a5c28cbeaf3', 'Dining Hall 1', '126.jpg', 'Secret Wood, merupakan dining hall yang memiliki design classic dengan furnitur kayu. Makanan yang wajib kalian pesan di sini adalah seafood plater. \r\n'),
('61a5c2a5f0bf9', 'Dining Hall 2', '25.jpg', 'Laz Plaza, dining hall yang menyediakan tempat yang bernuansa kerjaan. Furnitur yang digunakan juga furnitur-furnitur mewah, kalian juga akan ditemati oleh berbagai musik-musik jazz.'),
('61a5c2bbc6bdf', 'Dining Hall 3', '33.jpg', 'Orange Black, Merupakan dining hall outdoor yang menyediakan berbagai makanan sehat, seperti salat buah, buah-buahan segar, serta berbagai menu lain-lainnya.'),
('61a5c2d0f0839', 'Dining Hall 4', '43.jpg', 'Empress Hall, Merupakan dining hall mewah yang menyediakan berbagai makanan steak disini juga menyediakan caviar dan juga Foie Gras.\r\n'),
('61a5c2ea4f067', 'Dinning Hall 5', '53.jpg', 'Prasmanans, Merupakan dining hall yang menyediakan makanan dengan ala prasmanan.'),
('61a5c30eddbc9', 'Lounge 1', '127.jpg', 'Lounge yang satu ini memiliki design yang simple, memiliki berbagai kursi serta meja yang tampak sederhana namun memukau, kursi pada lounge ini memiliki design yang sangat cocok untuk kita nikmati sebagai tempat bersantai dan menunggu.'),
('61a5c324df0c8', 'Lounge 2', '26.jpg', 'Memiliki sofa hitam yang sangat nyaman untuk mengistirahatkan badan yang terasa lelah, dilengkapi juga dengan bar mini. Memiliki design yang minimalis yang tidak akan membuatmu merasa sesak.'),
('61a5c33b042e9', 'Lounge 3', '34.jpg', 'Lounge yang satu ini bersifat lebih privat, karena terpisah-pisah menjadi beberapa bagian, memiliki kursi yang berbentuk seperti huruf U yang dilenkapi dengan meja mini di antaranya.'),
('61a5c34c501d6', 'Lounge 4', '44.jpg', 'Lounge yang ini memiliki  campuran 2 warna yakni hitam dan biru, dilengkapi dengan kursi yang nyaman serta meja yang cukup besar. Terdapat juga aquarium di tengah, jadi sambil bersantai kalian juga bisa menikmati dan melihat ikan-ikan yang berenang kesana-kemari.'),
('61a5c37bd0371', 'Lounge 5', '54.jpg', 'Lounge yang satu ini memiliki berbagai jenis kursi, mulai dari sofa yang memiliki sandaran kaki, sofa kursi kayu dan lain sebagainya. Lounge yang satu ini juga memiliki berbagai dekorasi di dindingnya yang membuat kegiatan bersantai menjadi lebih menyenangkan'),
('61a5cc5c6057f', 'Restaurant 1', '128.jpg', 'Happy Kitchen, merupakan sebuah restoran yang terkenal dengan ayam gorengnya, restoran ini juga memberikan kita pelayanan serta suasana restoran yang sangat enak untuk dinikmati.'),
('61a5cc70e3e49', 'Restaurant 2', '27.jpg', 'White Sanctuary, merupakan restoran dengan desain interior serba putih, menyediakan berbagai jenis makanan Eropa yang berkualitas.\r\n'),
('61a5cc816389f', 'Restaurant 3', '35.jpg', 'The Old Bar, merupakan restoran bergaya ala bar 80-an, Menyediakan berbagai menu tahun 80-an yang akan sulit ditemukan di restoran lain.'),
('61a5cc9103d08', 'Restaurant 4', '45.jpg', 'Side Lake, Merupakan restoran yang terletak di tepi danau, selain menyediakan makanan yang lezat, pemandangan di sini juga sangatlah indah.'),
('61a5cca012ff0', 'Restaurant 5', '55.jpg', 'Plantae Sector, merupakan restoran yang terdapat di atap hotel, menyediakan berbagai jenis steak yang bisa kamu nikmati dengan keluarga, maupun pasangan. Jika makan di Plantae Sector kamu juga akan merasakan sejuknya udara segar karena terletak di lantai paling atas hotel.'),
('61a5cce7374eb', 'Spa 1', '129.jpg', 'Kempinski The Spa dirancang untuk memberikan kenyamanan kepada tamu dari kehidupan kota. Spa dengan produk alami dan rempah-rempah akan membuatmu merasakan pengalaman spa yang nyaman. Kamu akan dibuat santai, dan pikiranmu akan menjadi lebih segar dan semangat di dalam ruangan 140 meter persegi.'),
('61a5ccfadde17', 'Spa 2', '28.jpg', 'Daiva Spa menyediakan perawatan tradisional hingga modern dengan bahan alami khas pribumi dengan terapis terlatis dan nuansa yang damai. Layanan ini bisa digunakan oleh wanita dan pria di dalam ruangan maupun di luar ruangan. Mulai dari perawatan kaki, tubuh, facial, pijat, hingga paket spa lainnya. Ototmu akan terelaksasi dengan layanan yang diberikan oleh Daiva Spa. \r\n'),
('61a5cd099ab0e', 'Spa 3', '36.jpg', 'Hotel ini menawarkan keamanan dan kenyamanan dengan kantongmu. Selain itu, kamu juga bisa merasakan layanan spa cantique. Hotel yang terletak di Jakarta  ini cocok untuk kamu yang merasakan suntuk dengan rutinitas yang padat, kamu bisa santai menginap di hotel ini dan merasakan spa.\r\n'),
('61a5cd19a8810', 'Spa 4', '46.jpg', 'Kamu akan merasakan scrup alami berbahan kopi dan masih banyak lagi pilihan yang lainnya. Kopi memang sangat menyegarkan ketika diminum, tapi MesaStila juga memanfaatkan kopi robusta di kebun kopi mereka menjadi scrub untuk perawatan kulit kepada tamunya. Kopi yang diproduksi sendiri di atas kawasan kebun kopi di Mesastila Resort and Spa.'),
('61a5cd26c986f', 'Spa 5', '56.jpg', 'Spa biasanya memiliki beberapa pilihan. Di Hotel Nyaman , kamu akan mendapatkan pilihan treatment yang modern dengan sentuhan budaya betawi . Hotel Hermitage Menteng merupakan hotel pertama yang memiliki spa dengan teknik perawatan khas Betawi. Di hotel ini, kamu bisa merasakan spa di kamar hotel dan didatangi oleh pegawai. Kamu nggak perlu keluar kamar untuk bisa mendapatkan pelayanan spa di hotel ini.'),
('61a5cdb480939', 'Karaoke 1', '130.jpg', 'Karaoke yang satu ini memliki ruangan yang cukup luas yang cukup untuk menampung belasan orang, dilengkapi dengan berbagai lampu serta hiasan dinding serta terdapat juga kursi sofa yang empuk.'),
('61a5cdcabfef5', 'Karaoke 2', '29.jpg', 'Ruangan yang satu ini memiliki ruangan yang bisa menampung 20-40 orang, ruangan karaoke yang satu ini juga memiliki beberapa meja serta sofa yang cukup besar untuk menampung banyak orang.'),
('61a5cdda5c0fa', 'Karaoke 2', '37.jpg', 'Ruangan Karaoke yang satu ini memiliki ruangan yang cukup minimalis namun nyaman untuk digunakan, memiliki berbagai jenis alat musik yang dapat membuat aktivitas karaokemu berjalan dengan lebih seru dan menyenangkan'),
('61a5cdf7e1c5c', 'Karaoke 4', '47.jpg', 'Karaoke yang satu ini bersifat lebih terbuka karena bisa banyak ditempati oleh banyak orang, bagi kamu yang suka untuk menampilkan bakat menyanyimu ke banyak orang, maka karaoke yang satu ini sangat cocok bagimu.'),
('61a5ce0c0225d', 'Karaoke 5 ', '57.jpg', 'Ruang karaoke yang satu ini memiliki design yang lebih mewah, dilengkapi dengan berbagai furnitur yang berkualitas tinggi serta memiliki berbagai lampu-lampu yang memanjakan mata. '),
('61a752900b2b6', 'Kamar 1', '132.jpg', 'Merupakan kamar dengan jenis Deluxe, menyediakan berbagai pilihan tipe kasur seperti double bed atau twin bed, memiliki desain interior yang lebih mewah jika dibandingkan dengan kamar standard. ');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedrequest`
--

CREATE TABLE `rejectedrequest` (
  `ID_Facility` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ID_requester` varchar(255) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `requestedFacility` varchar(255) NOT NULL,
  `ID_waitingApproval` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejectedrequest`
--

INSERT INTO `rejectedrequest` (`ID_Facility`, `start_date`, `end_date`, `ID_requester`, `requester`, `requestedFacility`, `ID_waitingApproval`, `status`) VALUES
(61, '2021-11-04', '2021-11-05', '61a49b4e26e7f', 'lord iwa', 'Dance Hall 2', '61a6245ea6949', 'Rejected'),
(61, '2021-12-01', '2021-12-02', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a7409207352', 'Rejected'),
(61, '2021-12-01', '2021-11-29', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a740bda032b', 'Rejected'),
(61, '2021-12-22', '2021-10-31', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a740de7913f', 'Rejected'),
(61, '2021-12-22', '2021-11-30', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a7410b318aa', 'Rejected'),
(61, '2021-12-03', '2021-11-29', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a741218c898', 'Rejected'),
(61, '2021-12-16', '2021-10-31', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a741f28c66b', 'Rejected'),
(61, '2021-12-22', '2021-12-12', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a7623b2f157', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_User` varchar(255) NOT NULL,
  `email_User` varchar(255) NOT NULL,
  `password_User` varchar(255) NOT NULL,
  `nama_User` varchar(255) NOT NULL,
  `role_User` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_User`, `email_User`, `password_User`, `nama_User`, `role_User`) VALUES
('1', 'ardyanto@gmail.com', 'c37b32ab64603f42913a126f9b0bf370', 'Ardyanto ', 'Admin'),
('2', 'chris@gmail.com', 'c37b32ab64603f42913a126f9b0bf370', 'Chris', 'Management'),
('61a49b4e26e7f', 'iwa@gmail.com', 'c37b32ab64603f42913a126f9b0bf370', 'lord iwa', 'User'),
('61a49c029dfe5', 'billy1@gmail.com', 'c37b32ab64603f42913a126f9b0bf370', 'billy1', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `waitingapproval`
--

CREATE TABLE `waitingapproval` (
  `ID_Facility` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ID_requester` varchar(255) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `requestedFacility` varchar(255) NOT NULL,
  `ID_waitingApproval` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waitingapproval`
--

INSERT INTO `waitingapproval` (`ID_Facility`, `start_date`, `end_date`, `ID_requester`, `requester`, `requestedFacility`, `ID_waitingApproval`, `status`) VALUES
(61, '2021-12-01', '2021-12-02', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a7409207352', 'Rejected'),
(61, '2021-12-01', '2021-11-29', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a740bda032b', 'Rejected'),
(61, '2021-12-22', '2021-10-31', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a740de7913f', 'Rejected'),
(61, '2021-12-22', '2021-11-30', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a7410b318aa', 'Rejected'),
(61, '2021-12-03', '2021-11-29', '61a49b4e26e7f', 'lord iwa', 'Kamar 5', '61a741218c898', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `waitingapprovaltemporary`
--

CREATE TABLE `waitingapprovaltemporary` (
  `ID_Facility` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ID_requester` varchar(255) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `requestedFacility` varchar(255) NOT NULL,
  `ID_waitingApproval` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  ADD PRIMARY KEY (`ID_waitingApproval`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_Fasilitas`);

--
-- Indexes for table `rejectedrequest`
--
ALTER TABLE `rejectedrequest`
  ADD PRIMARY KEY (`ID_waitingApproval`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- Indexes for table `waitingapproval`
--
ALTER TABLE `waitingapproval`
  ADD PRIMARY KEY (`ID_waitingApproval`),
  ADD KEY `ID_requester` (`ID_requester`);

--
-- Indexes for table `waitingapprovaltemporary`
--
ALTER TABLE `waitingapprovaltemporary`
  ADD PRIMARY KEY (`ID_waitingApproval`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
