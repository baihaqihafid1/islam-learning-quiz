-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 02:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_islam_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_quiz`
--

CREATE TABLE `hasil_quiz` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `skor` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_soal` int(11) DEFAULT NULL,
  `materi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_quiz`
--

INSERT INTO `hasil_quiz` (`id`, `nama`, `kelas`, `sekolah`, `umur`, `skor`, `total`, `waktu`, `total_soal`, `materi`) VALUES
(1, 'tono', '5', 'sdn harapan', 12, 5, NULL, '2025-06-25 12:43:41', 12, 'rukun_iman'),
(2, 'ahmad bahaqi hafid', '7', 'smpn ', 15, 4, NULL, '2025-06-25 12:44:59', 10, 'rukun_islam');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul`, `isi`) VALUES
(3, 'Rukun Islam', 'Rukun Islam merupakan lima pilar utama yang menjadi dasar dalam menjalankan ajaran agama Islam. Setiap Muslim wajib meyakini dan melaksanakan rukun-rukun ini sebagai bentuk kepatuhan kepada Allah SWT.\r\n\r\n1. Syahadat: Mengucapkan dua kalimat syahadat, yaitu kesaksian bahwa tidak ada Tuhan selain Allah dan Nabi Muhammad adalah utusan-Nya. Ini adalah pintu masuk ke dalam agama Islam.\r\n2. Shalat: Ibadah wajib yang dilaksanakan lima kali sehari (Subuh, Dzuhur, Ashar, Maghrib, dan Isya). Shalat adalah bentuk komunikasi langsung antara seorang Muslim dengan Allah SWT.\r\n3. Zakat: Kewajiban mengeluarkan sebagian harta untuk diberikan kepada yang berhak menerimanya (mustahik), seperti fakir miskin. Zakat bertujuan untuk membersihkan harta dan membantu kesejahteraan sosial.\r\n4. Puasa di bulan Ramadhan: Menahan diri dari makan, minum, dan hal-hal yang membatalkan puasa dari terbit fajar hingga terbenam matahari. Puasa melatih kesabaran dan ketakwaan.\r\n5. Haji ke Baitullah (jika mampu): Ibadah yang dilaksanakan di Mekkah sekali seumur hidup bagi yang mampu secara fisik dan finansial. Haji menyatukan umat Islam dari seluruh dunia dalam ibadah yang agung.\r\n\r\nRukun Islam adalah landasan ibadah lahiriah yang membentuk kehidupan seorang Muslim secara nyata. Dengan menjalankannya secara konsisten, seorang Muslim akan menjadi pribadi yang taat, disiplin, dan bertanggung jawab dalam kehidupan dunia dan akhirat.'),
(4, 'Rukun Iman', 'Rukun Iman adalah enam keyakinan pokok dalam Islam yang harus diyakini oleh setiap Muslim dengan sepenuh hati. Rukun Iman merupakan landasan kepercayaan dalam hati yang menjadi dasar dari setiap amal perbuatan.\r\n1. Iman kepada Allah: Meyakini bahwa Allah SWT adalah satu-satunya Tuhan yang berhak disembah, tidak ada sekutu bagi-Nya. Allah bersifat Maha Esa, Maha Kuasa, dan Maha Bijaksana.\r\n2. Iman kepada Malaikat: Meyakini adanya makhluk ciptaan Allah yang tidak tampak oleh mata, yang selalu patuh kepada perintah Allah, seperti Malaikat Jibril, Mikail, Israfil, dan lainnya.\r\n3. Iman kepada Kitab-kitab: Meyakini bahwa Allah telah menurunkan wahyu berupa kitab-kitab suci kepada para nabi-Nya, seperti Taurat, Zabur, Injil, dan Al-Qur’an sebagai pedoman hidup umat manusia.\r\n4. Iman kepada Nabi dan Rasul: Meyakini bahwa Allah telah mengutus para nabi dan rasul untuk menyampaikan ajaran-Nya. Nabi Muhammad SAW adalah nabi terakhir yang membawa penyempurnaan ajaran Islam.\r\n5. Iman kepada Hari Akhir: Meyakini bahwa kehidupan di dunia akan berakhir dan akan ada kehidupan di akhirat, di mana manusia akan dibalas sesuai amal perbuatannya.\r\n6. Iman kepada Qada dan Qadar: Meyakini bahwa segala sesuatu yang terjadi di alam semesta ini telah ditetapkan oleh Allah, baik yang baik maupun yang buruk, namun manusia tetap memiliki kehendak dan usaha.\r\nRukun Iman adalah fondasi spiritual yang menuntun seorang Muslim dalam menghadapi kehidupan, menguatkan keimanan, dan membentuk akhlak mulia berdasarkan keyakinan kepada Allah SWT.'),
(5, 'Pengertian Islam', 'Islam berasal dari kata “salaama” yang berarti damai, selamat, sejahtera. Islam adalah agama yang diturunkan oleh Allah SWT kepada Nabi Muhammad SAW sebagai penutup para nabi.\r\nIslam mengajarkan keesaan Tuhan (tauhid), keadilan, kasih sayang, dan kedamaian. Islam memiliki lima rukun utama, yaitu syahadat, shalat, zakat, puasa, dan haji. Islam juga mengatur berbagai aspek kehidupan, seperti ibadah, akhlak, muamalah (interaksi sosial), dan hukum.\r\nIslam bukan hanya sebuah agama, tetapi juga pedoman hidup bagi umat manusia. Al-Qur’an sebagai kitab suci dan Hadis Nabi menjadi sumber utama hukum dan ajaran dalam Islam. Umat Islam diwajibkan untuk menjalankan ajaran-ajaran ini dalam kehidupan sehari-hari.\r\nDengan memahami pengertian Islam secara utuh, diharapkan umat Muslim bisa mengamalkan ajaran-ajaran Islam dengan benar dan membawa manfaat bagi diri sendiri dan masyarakat.');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `pilihan_a` varchar(255) DEFAULT NULL,
  `pilihan_b` varchar(255) DEFAULT NULL,
  `pilihan_c` varchar(255) DEFAULT NULL,
  `pilihan_d` varchar(255) DEFAULT NULL,
  `jawaban` char(1) DEFAULT NULL,
  `materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban`, `materi`) VALUES
(1, 'Berapa jumlah rukun Islam?', '3', '5', '7', '10', 'b', 'rukun_islam'),
(2, 'Apa yang termasuk rukun Iman?', 'Shalat', 'Puasa', 'Percaya kepada malaikat', 'Sedekah', 'c', 'rukun_islam'),
(3, 'Apa arti kata Islam?', 'Perang', 'Damai', 'Perbudakan', 'Penaklukan', 'b', 'rukun_islam'),
(4, 'Siapa nabi terakhir dalam Islam?', 'Nabi Musa', 'Nabi Isa', 'Nabi Muhammad', 'Nabi Nuh', 'c', 'rukun_iman'),
(5, 'Rukun Islam yang pertama adalah?', 'Puasa', 'Syahadat', 'Zakat', 'Haji', 'b', 'rukun_iman'),
(6, 'Berapa jumlah rukun iman?', '4', '5', '6', '7', 'c', 'rukun_iman'),
(7, 'Apa kitab suci umat Islam?', 'Taurat', 'Zabur', 'Injil', 'Al-Qur\'an', 'd', 'pengertian_islam'),
(8, 'Apa ibadah wajib saat bulan Ramadhan?', 'Zakat', 'Haji', 'Puasa', 'Shalat', 'c', 'pengertian_islam'),
(1000, 'Apa rukun Islam kedua?', 'Syahadat', 'Shalat', 'Zakat', 'Puasa', 'b', 'rukun_islam'),
(1001, 'Apa syarat wajib zakat?', 'Kaya', 'Miskin', 'Anak-anak', 'Lapar', 'a', 'rukun_islam'),
(1002, 'Berapa kali shalat wajib sehari?', '3', '4', '5', '6', 'c', 'rukun_islam'),
(1003, 'Apa tujuan ibadah haji?', 'Menikah', 'Menyambut lebaran', 'Mencari pahala', 'Menyempurnakan rukun Islam', 'd', 'rukun_islam'),
(1004, 'Apa arti syahadat?', 'Berpuasa', 'Mengucap dua kalimat', 'Mandi wajib', 'Menikah', 'b', 'rukun_islam'),
(1005, 'Zakat wajib diberikan kepada?', 'Guru', 'Orang kaya', 'Fakir miskin', 'Orang tua', 'c', 'rukun_islam'),
(1006, 'Puasa dilakukan pada bulan?', 'Syawal', 'Ramadhan', 'Muharram', 'Rajab', 'b', 'rukun_islam'),
(1007, 'Siapa yang membawa wahyu kepada nabi?', 'Israfil', 'Mikail', 'Jibril', 'Malik', 'c', 'rukun_iman'),
(1008, 'Apa rukun iman keempat?', 'Iman kepada Allah', 'Iman kepada Rasul', 'Iman kepada Hari Akhir', 'Iman kepada Kitab', 'b', 'rukun_iman'),
(1009, 'Apa yang dimaksud Qada dan Qadar?', 'Takdir Allah', 'Kitab Suci', 'Doa-doa', 'Puasa', 'a', 'rukun_iman'),
(1010, 'Hari kiamat disebut juga?', 'Yaumul Akhir', 'Yaumul Dunia', 'Yaumul Syafa\'at', 'Yaumul Jumu\'ah', 'a', 'rukun_iman'),
(1011, 'Apa yang dimaksud iman kepada Allah?', 'Percaya Allah itu ada', 'Menolak adanya Tuhan', 'Percaya hanya pada logika', 'Percaya pada manusia', 'a', 'rukun_iman'),
(1012, 'Siapakah nabi terakhir dalam Islam?', 'Nabi Isa', 'Nabi Musa', 'Nabi Muhammad', 'Nabi Nuh', 'c', 'rukun_iman'),
(1013, 'Kitab suci umat Islam adalah?', 'Taurat', 'Injil', 'Al-Qur\'an', 'Zabur', 'c', 'rukun_iman'),
(1014, 'Iman kepada malaikat artinya?', 'Percaya malaikat itu mitos', 'Percaya malaikat ciptaan Allah', 'Tidak percaya malaikat', 'Percaya manusia berubah jadi malaikat', 'b', 'rukun_iman'),
(1015, 'Qada dan Qadar artinya?', 'Kebetulan hidup', 'Pilihan bebas', 'Takdir Allah', 'Keinginan pribadi', 'c', 'rukun_iman'),
(1016, 'Apa arti kata \"Islam\"?', 'Perang', 'Keras', 'Selamat dan damai', 'Menyerang', 'c', 'pengertian_islam'),
(1017, 'Siapa pembawa ajaran Islam terakhir?', 'Nabi Isa', 'Nabi Muhammad SAW', 'Nabi Ibrahim', 'Nabi Musa', 'b', 'pengertian_islam'),
(1018, 'Islam mengajarkan tentang?', 'Kekerasan', 'Kebebasan mutlak', 'Tauhid dan akhlak', 'Penyembahan berhala', 'c', 'pengertian_islam'),
(1019, 'Islam berasal dari kata?', 'Islamiyah', 'Salaama', 'Islami', 'Aslama', 'b', 'pengertian_islam'),
(1020, 'Apa kitab suci umat Islam?', 'Taurat', 'Zabur', 'Al-Qur\'an', 'Injil', 'c', 'pengertian_islam'),
(1021, 'Islam mengajarkan hubungan baik dengan?', 'Binatang', 'Manusia', 'Setan', 'Pohon', 'b', 'pengertian_islam'),
(1022, 'Islam menekankan pentingnya?', 'Dendam', 'Uang', 'Akhlak dan ibadah', 'Kekuasaan', 'c', 'pengertian_islam'),
(1023, 'Islam datang sebagai penyempurna dari?', 'Tradisi lama', 'Ajaran sebelumnya', 'Cerita rakyat', 'Kebudayaan kuno', 'b', 'pengertian_islam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
