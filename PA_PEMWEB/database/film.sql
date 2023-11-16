-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posttest5`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `judul_film` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `tgl_rilis` varchar(50) NOT NULL,
  `studio_produksi` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `status_film` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `judul_film`, `genre`, `tgl_rilis`, `studio_produksi`, `sinopsis`, `trailer`, `status_film`, `gambar`) VALUES
(35, 'Petualangan Sherina 2', 'Adventure, Comedy, Musical', '2023-09-28', 'Miles Films, Base Entertaiment', 'Petualangan Sherina 2 menceritakan dua tokoh utama yaitu Sherina (Sherina) dan Sadam (Derby Romero) yang telah lama berpisah sejak kecil. Akhirnya mereka bedua dipertemukan kembali di hutan hujan tropis dan akan memulai berpetualang menghadapi rintangan.', 'nAx3GaOE5xI', 'Sedang Tayang', '../assets/2023-11-16 Petualangan Sherina 2.png'),
(61, 'Wish', 'Animation, Adventure, Comedy', '2023-11-16', 'Walt Disney Animation Studios', 'Wish will follow a young girl named Asha who wishes on a star and gets a more direct answer than she bargained for when a trouble-making star comes down from the sky to join her.', '5BCtEE0Ys7w&pp=ygUEd2lzaA%3D%3D', 'Sedang Tayang', '../assets/2023-11-16 Wish.jpeg'),
(64, 'Budi Pekerti', 'Drama', '2023-11-02', 'Cinema21', 'Bu Prani (Ine Febriyanti), seorang guru BK yang video perselisihannya dengan penguniung pasar meniadi viral di media sosial. Akibat tindakannya yang dinilai tidak mencerminkan pribadi seorang guru, ia dan keluarganya Muklas (Angga Yunanda), Tita (Prilly Latuconsina), dan Pak Didit (Dwi Sasono) mendapat perundungan, dicari-cari kesalahan lainnya hingga terancam kehilangan pekerjaan.', 'tIbhZ1a4Lxs', 'Sedang Tayang', '2023-11-16 Budi Pekerti.jpg'),
(65, 'GAMPANG CUAN ', 'Comedy', '2023-11-16', 'Temata Studios & Adhya Pictures', 'Sultan (Vino G. Bastian) merupakan kakak dari 2 adik yang tinggal di Sukabumi. Ia berkeinginan untuk merantau ke Jakarta. Adik perempuan Sultan, yaitu Bilqis (Anya Geraldine) ternyata juga mengikuti jejak kakaknya untuk pergi ke Jakarta.\r\n\r\nDi waktu yang bersamaan ternyata mereka mengetahui jika mendiang ayah mereka telah memiliki utang sebesar Rp 300 juta yang harus dilunasi oleh keluarganya. Bila tidak rumah mereka akan tersegel. Di sisi lain, Sultan juga harus membantu biaya kuliah adik bungsunya yang bernama Aji (Alzi Markers).\r\n\r\nAkhirnya Sultan dan Bilqis harus berusaha mencari cara untuk melunasi utang mendiang ayah mereka tanpa sepengetahuan ibu mereka, yaitu mamah Diah (Meriam Belina). Perjuangan Sultan dan Balqis untuk mencari uang dilakukan dengan berbagai cara. Berbagai pekerjaan yang halal sampai hampir yang haram pun mereka lakukan.\r\n', 'RMwKojXV-Dk', 'Sedang Tayang', '2023-11-16 GAMPANG CUAN .jpeg'),
(66, 'Aquaman and the Lost Kingdom', 'Action, Adventure, Fantasy', '2023-12-22', 'DC Studios', 'After failing to defeat Aquaman the first time, Black Manta wields the power of the mythic Black Trident to unleash an ancient and malevolent force. Hoping to end his reign of terror, Aquaman forges an unlikely alliance with his brother, Orm, the former king of Atlantis. Setting aside their differences, they join forces to protect their kingdom and save the world from irreversible destruction.', 'FV3bqvOHRQo', 'Coming Soon', '2023-11-16 Aquaman and the Lost Kingdom.jpeg'),
(67, 'Killers of the Flower Moon 2023 ', 'Crime', '2023-10-20', 'Apple Studios', 'Real love crosses paths with unspeakable betrayal as Mollie Burkhart, a member of the Osage Nation, tries to save her community from a spree of murders fueled by oil and greed.', 'EG0si5bSd6I', 'Sedang Tayang', '2023-11-16 Killers of the Flower Moon 2023 .jpg'),
(68, 'Trolls Band Together', 'Animation, Adventure, Comedy, Family, Fantasy, Mus', '2023-11-17', 'DreamWorks Animation', 'Poppy discovers that Branch and his four brothers were once part of her favorite boy band. When one of his siblings, Floyd, gets kidnapped by a pair of nefarious villains, Branch and Poppy embark on a harrowing and emotional journey to reunite the other brothers and rescue Floyd from a fate even worse than pop culture obscurity..', 'qZ40Z62tcXM', 'Coming Soon', '2023-11-16 Trolls Band Together.jpeg'),
(69, 'Napoleon ', 'Drama, War', '2023-11-22', 'Apple Original Films & Sony Pictures', 'A look at the military commanders origins and his swift, ruthless climb to emperor, viewed through the prism of his addictive and often volatile relationship with his wife and one true love, Josephine.', 'OAZWXUkrjPc', 'Coming Soon', '2023-11-16 Napoleon .jpeg'),
(70, 'Thanksgiving', 'Horror', '2023-11-17', 'PIM Pictures & Dynamic Pictures.', 'An axe-wielding maniac terrorizes residents of Plymouth, Mass., after a Black Friday riot ends in tragedy. Picking off victims one by one, the seemingly random revenge killings soon become part of a larger, sinister plan.', '', 'Coming Soon', '2023-11-16 Thanksgiving.jpg'),
(71, 'The Hunger Games  The Ballad of Songbirds & Snakes', 'Science fiction, Thriller, Adventure fiction, Dyst', '2023-11-15', 'Lionsgate Motion', 'Years before he becomes the tyrannical president of Panem, 18-year-old Coriolanus Snow remains the last hope for his fading lineage. With the 10th annual Hunger Games fast approaching, the young Snow becomes alarmed when he is assigned to mentor Lucy Gray Baird from District 12. Uniting their instincts for showmanship and political savvy, they race against time to ultimately reveal whos a songbird and whos a snake.', 'RDE6Uz73A7g', 'Sedang Tayang', '../assets/2023-11-16 The Hunger Games  The Ballad of Songbirds & Snakes.jpeg'),
(72, '172 Days', 'Drama, Romantic', '2023-11-23', 'Starvision', 'Diangkat dari kisah nyata kehidupan Nadzira Shafa dan Ameer Azzikra, 172 Days mengisahkan perjalanan taaruf pasangan muda yang menyentuh hati, serta bagaimana kisah cinta mereka tumbuh dalam proses hijrah dan pencarian makna hidup yang lebih dalam. 172 Days pun mengangkat isu tentang kesehatan mental, menjaminnya sebagai tontonan yang bermakna.', 'IPRBKGxCCZQ', 'Coming Soon', '2023-11-16 172 Days.jpeg'),
(73, 'The Three Musketeers  Milady', 'Adventure/Action', '2023-12-13', 'Pathe', 'Constance Bonacieux is kidnapped before DArtagnans very eyes. In a frantic quest to save her, the young musketeer, aided by Athos, Porthos and Aramis, is forced to join forces with the mysterious Milady de Winter.', 'P1HfovIccgw', 'Coming Soon', '../assets/2023-11-16 The Three Musketeers  Milady.jpeg'),
(74, 'Srimulat  Hidup Memang Komedi ', 'Drama, Comedy', '2023-11-23', 'MNC Pictures', 'Film ini mengisahkan perjuangan grup Srimulat yang merantau ke ibukota untuk meraih popularitas sebagai bintang televisi. Dalam menghadapi persaingan ketat, setiap anggota harus menemukan karakter unik agar dapat memikat penonton.', '1nTIyQSkCt8', 'Coming Soon', '../assets/2023-11-16 Srimulat  Hidup Memang Komedi .jpeg'),
(75, 'Aku Rindu ', 'Drama', '2023-11-09', ' Eng Ing Eng Pictures', 'Mengangkat kisah pejuang sosial dari Nusa Tenggara Timur (NTT), Aku Rindu mengisahkan perjuangan istri bernama Lailana yang, bersama suaminya Banyu, dipindahtugaskan ke daerah terpencil di Larantuka. Lailana, diperankan oleh Verlita Evelyn, menjadi sumber inspirasi dengan semangat tingginya dalam membangun dan mengajar di daerah tersebut.', 'VSWhq2HfSpg', 'Sedang Tayang', '2023-11-16 Aku Rindu .jpeg'),
(76, 'Nona Manis Sayange ', 'Romance, Comedy, Drama ', '2023-11-02', 'DMILASTY Pictures & Putaar Film', 'Nona Manis Sayange mengisahkan kisah cinta Sika dan Akram yang bersahabat sejak kecil.  Dalam film ini, perjuangan mereka untuk meyakinkan Ayah Sika tentang hubungan mereka yang tidak direstui, menjadi pusat cerita yang penuh makna.', 'JplNfE1XmRU', 'Sedang Tayang', '../img/2023-11-16 Nona Manis Sayange .png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
