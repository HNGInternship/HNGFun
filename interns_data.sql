-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 03:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `interns_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `interns_data`
--

CREATE TABLE IF NOT EXISTS `interns_data` (
`intern_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interns_data`
--

INSERT INTO `interns_data` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(9, 'Okunuga melody', 'melody', 'Screenshot-2018-3-21 Twitter.png'),
(11, 'ikpe mercy michael', 'mercyikpe', 'IMG-20180322-WA0010.jpg'),
(12, 'Mbah Clinton', 'mclint_', 'mclint_.jpg'),
(13, 'John Ayeni', 'johnayeni', 'johnayeni.jpg'),
(14, 'Solanke Damilare', 'D.dan', 'https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg'),
(15, 'Ogundiji Bolade Adio', 'AdroitCode', 'http://res.cloudinary.com/dc9kfp5gt/image/upload/c_scale,e_art:incognito,h_340,q_100,w_330/v1519764764/IMG_20180227_214951_697_o3buej.jpg'),
(16, 'Peculiar Ediomo-Abasi', 'Peculiar',  'http://res.cloudinary.com/pediomo/image/upload/v1516201515/pecu_lhdpbt.jpg');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `interns_data`
--
ALTER TABLE `interns_data`
 ADD PRIMARY KEY (`intern_id`);

--
-- AUTO_INCREMENT for dumped tables
--
(9,	'Okunuga melody',	'melody',	'Screenshot-2018-3-21 Twitter.png'),
(11,	'ikpe mercy michael',	'mercyikpe',	'IMG-20180322-WA0010.jpg'),
(14, 'Ekpang Michael Etta', 'mike', 'mikeetta.jpg'),
(14, 'Ekpang Michael Etta', 'mike', 'http://res.cloudinary.com/weezyval/image/upload/v1523620464/mikeetta.jpg'),
(15, 'Charles Katuri', 'charlek', 'charlek.jpg'),
(16, 'John Odey', 'john', 'john.jpg'),
(17, 'Jegede David','davidstick766','http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg'),
(18, 'Tejumola Timi', 'timi', 'http://res.cloudinary.com/tarrot-system-inc/image/upload/v1523621115/IMG_4551_muwd22.jpg'),
(19, 'Aghedo Joseph Femi', 'femicodes', 'https://res.cloudinary.com/femicodes/image/upload/v1523623381/IMG_20180221_185703.jpg'),
(21, 'Gbenga Oni', 'gbxnga', 'https://res.cloudinary.com/gbxnga/image/upload/v1523622896/photo.png'),(22, 'Deekor Baribefe','befe','http://res.cloudinary.com/befe/image/upload/v1523623765/dbefe.jpg');

--
-- AUTO_INCREMENT for table `interns_data`
--
ALTER TABLE `interns_data`
MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
(22, 'Abraham Enyo-one Musa', 'Abseejp', 'http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg'),
(23, 'Adegboyega Samson', 'samsonadegboyega', 'http://res.cloudinary.com/webcoupers/image/upload/v1523626904/me.jpg');
