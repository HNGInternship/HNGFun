<<<<<<< HEAD
=======

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 04:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

>>>>>>> 7b8ae4818ea41bdb02cc4b03a5fafe50924f0bd8
/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.31-MariaDB : Database - hng_fun
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hng_fun` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hng_fun`;

/*Table structure for table `chatbot` */

DROP TABLE IF EXISTS `chatbot`;

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `chatbot` */

insert  into `chatbot`(`id`,`question`,`answer`) values (1,'i deserve','some accolades');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
<<<<<<< HEAD
/*!40101 SET NAMES utf8mb4 */;

=======



/*!40101 SET NAMES utf8mb4 */;

/*!40101 SET NAMES utf8 */;

/*!40101 SET NAMES utf8mb4 */;


>>>>>>> 7b8ae4818ea41bdb02cc4b03a5fafe50924f0bd8
--
-- Database: `hng_fun`
--

<<<<<<< HEAD
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
-- Dumping data for table `interns_data`
--

INSERT INTO `interns_data` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(1, 'Ilesanmi Samuel Ayanfejesu', 'dbeloveth', 'https://res.cloudinary.com/dbeloveth/image/upload/v1523700237/pic2.jpg'),
=======
-- -----------------------------------------------------

-- Table structure for table `interns_data_`
--

CREATE TABLE IF NOT EXISTS `interns_data` (
  `intern_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `interns_data_`
--

>>>>>>> 7b8ae4818ea41bdb02cc4b03a5fafe50924f0bd8

-- --------------------------------------------------------

--
-- Table structure for table `secret_word`
--

<<<<<<< HEAD
CREATE TABLE `secret_word` (
  `id` int(11) NOT NULL,
  `secret_word` varchar(50) NOT NULL
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
  MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
=======
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




--
-- AUTO_INCREMENT for table `interns_data`
--

ALTER TABLE `interns_data`
MODIFY `intern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;


--
-- AUTO_INCREMENT for table `secret_word`
--
ALTER TABLE `secret_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;
>>>>>>> 7b8ae4818ea41bdb02cc4b03a5fafe50924f0bd8

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<<<<<<< HEAD
=======
=======
>>>>>>> 7b8ae4818ea41bdb02cc4b03a5fafe50924f0bd8


-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 08:00 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

