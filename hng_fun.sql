-- phpMyAdmin SQL Dump

-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 12:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 08:03 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

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
(14, 'Akinduko Olugbenga', 'dev_geaks', 'http://res.cloudinary.com/devgeaks/image/upload/v1523731563/2017-03-02_08.30.03.jpg');

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

-- Table structure for table `secret_word`
--

CREATE TABLE `secret_word` (
  `id` int(11) NOT NULL,
  `secret_word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- AUTO_INCREMENT for table `secret_word`
--
ALTER TABLE `secret_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 08:00 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `hng_fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `interns_data`
--

CREATE TABLE `interns_data` (
  `intern_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- AUTO_INCREMENT for table `interns_data`
--
ALTER TABLE `interns_data`
  MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT;COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
