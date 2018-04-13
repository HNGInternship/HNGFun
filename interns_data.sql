-- Database Manager 4.2.5 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `interns_data`;
CREATE TABLE `interns_data` (
  `intern_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`intern_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `interns_data` (`intern_id`, `name`, `username`, `image_filename`) VALUES
(9,	'Okunuga melody',	'melody',	'Screenshot-2018-3-21 Twitter.png'),
(11,	'ikpe mercy michael',	'mercyikpe',	'IMG-20180322-WA0010.jpg'),
(12, 'Mbah Clinton', 'mclint_', 'mclint_.jpg'),
(13, 'John Ayeni', 'johnayeni', 'johnayeni.jpg'),
(14, 'Ekpang Michael Etta', 'mike', 'mikeetta.jpg'),
(15, 'Charles Katuri', 'charlek', 'charlek.jpg');


-- 2018-04-13 06:08:02
