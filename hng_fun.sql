<<<<<<< HEAD
=======
<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 03:10 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8
=======
<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 4.7.7
=======
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

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
<<<<<<< HEAD
-- Generation Time: Apr 14, 2018 at 08:03 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1
=======
-- Generation Time: Apr 15, 2018 at 03:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1
>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
<<<<<<< HEAD
=======
<<<<<<< HEAD
/*!40101 SET NAMES utf8 */;
=======
<<<<<<< HEAD
/*!40101 SET NAMES utf8mb4 */;
=======
>>>>>>> 1a63d6d5d02d8fe9a4544287ddac79956b89b341
>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

--
-- Database: `hng_fun`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
<<<<<<< HEAD
-- Table structure for table `interns_data_`
--

CREATE TABLE IF NOT EXISTS `interns_data_` (
  `intern_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;
=======
<<<<<<< HEAD
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

-- Table structure for table `interns_data`
--

CREATE TABLE IF NOT EXISTS `interns_data` (
`intern_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

--
-- Dumping data for table `interns_data`
--

INSERT INTO `interns_data` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(15, 'Faith Young Uhie', 'Fayoung', 'https://res.cloudinary.com/fayoung/image/upload/v1523738849/me.jpg');
<<<<<<< HEAD
=======
=======
INSERT INTO `interns_data_` (`intern_id`, `name`, `username`, `image_filename`) VALUES
<<<<<<< HEAD
(14, 'Uket Cyril Ofem', 'CY_UKET', 'https://res.cloudinary.com/cyuket/image/upload/v1523889745/1522947398679.jpg');
=======
(14, 'Akinduko Olugbenga', 'dev_geaks', 'http://res.cloudinary.com/devgeaks/image/upload/v1523731563/2017-03-02_08.30.03.jpg'),
(15, 'Herbert John', 'herberts', 'http://res.cloudinary.com/dsitzw8mp/image/upload/v1523798919/face.png');
>>>>>>> dbc8ffb6296f148ac8379f9ff59583c32ec88d19
>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

-- --------------------------------------------------------

--
-- Table structure for table `secret_word`
--

<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS `secret_word` (
`id` int(11) NOT NULL,
  `secret_word` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
=======
<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS `secret_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secret_word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;
=======
CREATE TABLE `secret_word` (
  `id` int(11) NOT NULL,
  `secret_word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

--
-- Dumping data for table `secret_word`
--

INSERT INTO `secret_word` (`id`, `secret_word`) VALUES
(1, 'sample_secret_word');

<<<<<<< HEAD
=======
--
-- Indexes for dumped tables
--

--
-- Indexes for table `interns_data`
--
ALTER TABLE `interns_data`
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


>>>>>>> 3be00122e02117cd3ed1b0d613be1d55efdf7264
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
