

-- phpMyAdmin SQL Dump
-- version 4.7.7


-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 12:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3



-- version 4.7.2
 
-- https://www.phpmyadmin.net/
--
=======
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 04:24 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


/*!40101 SET NAMES utf8mb4 */;


=======
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

-- Table structure for table `interns_data_`
--

CREATE TABLE `interns_data_` (
  `intern_id` int(10) NOT NULL,

=======
-- Table structure for table `interns_data_`
--

CREATE TABLE IF NOT EXISTS `interns_data_` (
  `intern_id` int(10) NOT NULL AUTO_INCREMENT,
>>>>>>> b2bbe46b15fc26a9eb4bb2d3c3786788727f0b54
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `interns_data_`
--
 
=======
INSERT INTO `interns_data_` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(122, 'Butu Ordooter', 'Ordooter', 'http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png');


-- --------------------------------------------------------

--
-- Table structure for table `secret_word`
--

CREATE TABLE IF NOT EXISTS `secret_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secret_word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `secret_word`
--

INSERT INTO `secret_word` (`id`, `secret_word`) VALUES
(1, 'sample_secret_word');

<<<<<<< HEAD
--
-- Indexes for dumped tables
--

--
-- Indexes for table `interns_data`
--
HEAD
ALTER TABLE `interns_data`
 ADD PRIMARY KEY (`intern_id`);

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
-- AUTO_INCREMENT for table `interns_data`
--
 
ALTER TABLE `interns_data`
MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `secret_word`
--
ALTER TABLE `secret_word`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;



--
-- Dumping data for table `secret_word`
--

INSERT INTO `secret_word` (`id`, `secret_word`) VALUES
(1, 'sample_secret_word');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `secret_word`
--
ALTER TABLE `secret_word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `interns_data_`
  MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


--
-- AUTO_INCREMENT for table `secret_word`
--
ALTER TABLE `secret_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

=======
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
