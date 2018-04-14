-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 12:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `interns_data_`
--

CREATE TABLE IF NOT EXISTS `interns_data_` (
`intern_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interns_data_`
--

INSERT INTO `interns_data_` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(14, 'Solanke damilare', 'D.dan', 'https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `secret_word`
--

CREATE TABLE IF NOT EXISTS `secret_word` (
`id` int(11) NOT NULL,
  `secret_word` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secret_word`
--

INSERT INTO `secret_word` (`id`, `secret_word`) VALUES
(1, 'sample_secret_word');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interns_data_`
--
ALTER TABLE `interns_data_`
 ADD PRIMARY KEY (`intern_id`);

--
-- Indexes for table `secret_word`
--
ALTER TABLE `secret_word`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interns_data_`
--
ALTER TABLE `interns_data_`
MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `secret_word`
--
ALTER TABLE `secret_word`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
