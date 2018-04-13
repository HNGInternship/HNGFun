-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2018 at 09:13 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hng_fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `interns_data`
--

CREATE TABLE IF NOT EXISTS `interns_data` (
  `intern_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interns_data`
--

INSERT INTO `interns_data` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(0, 'ThankGod Egbo', 'Tha Truth', 'http://res.cloudinary.com/tech-18/image/upload/v1516110766/IMG_20170803_224355_268_ji75r2.jpg'),
(9, 'Okunuga melody', 'melody', 'Screenshot-2018-3-21 Twitter.png'),
(11, 'ikpe mercy michael', 'mercyikpe', 'IMG-20180322-WA0010.jpg'),
(12, 'Mbah Clinton', 'mclint_', 'mclint_.jpg'),
(13, 'John Ayeni', 'johnayeni', 'johnayeni.jpg'),
(14, 'Solanke Damilare', 'D.dan', 'https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg'),
(15, 'Ogundiji Bolade Adio', 'AdroitCode', 'http://res.cloudinary.com/dc9kfp5gt/image/upload/c_scale,e_art:incognito,h_340,q_100,w_330/v1519764764/IMG_20180227_214951_697_o3buej.jpg'),
(16, 'Peculiar Ediomo-Abasi', 'Peculiar', 'http://res.cloudinary.com/pediomo/image/upload/v1516201515/pecu_lhdpbt.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
