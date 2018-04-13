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
<<<<<<< HEAD
(9, 'Okunuga melody', 'melody', 'Screenshot-2018-3-21 Twitter.png'),
(11, 'ikpe mercy michael', 'mercyikpe', 'IMG-20180322-WA0010.jpg'),
(12, 'Mbah Clinton', 'mclint_', 'mclint_.jpg'),
(13, 'John Ayeni', 'johnayeni', 'johnayeni.jpg'),
(14, 'Solanke Damilare', 'D.dan', 'https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg');

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
=======
(9,	'Okunuga melody',	'melody',	'Screenshot-2018-3-21 Twitter.png'),
(11,	'ikpe mercy michael',	'mercyikpe',	'IMG-20180322-WA0010.jpg'),
(14, 'Ekpang Michael Etta', 'mike', 'http://res.cloudinary.com/weezyval/image/upload/v1523620464/mikeetta.jpg'),
(15, 'Charles Katuri', 'charlek', 'charlek.jpg'),
(16, 'John Odey', 'john', 'john.jpg'),
(17, 'Jegede David','davidstick766','dav.jpg'),
(18, 'Tejumola Timi', 'timi', 'http://res.cloudinary.com/tarrot-system-inc/image/upload/v1523621115/IMG_4551_muwd22.jpg'),
(19, 'Aghedo Joseph Femi', 'femicodes', 'https://res.cloudinary.com/femicodes/image/upload/v1523623381/IMG_20180221_185703.jpg'),
(21, 'Gbenga Oni', 'gbxnga', 'https://res.cloudinary.com/gbxnga/image/upload/v1523622896/photo.png'),(22, 'Deekor Baribefe','befe','http://res.cloudinary.com/befe/image/upload/v1523623765/dbefe.jpg');
>>>>>>> 1ebfe9a43f8294993275cabedcc014ac17380c8c

--
-- AUTO_INCREMENT for table `interns_data`
--
ALTER TABLE `interns_data`
MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
