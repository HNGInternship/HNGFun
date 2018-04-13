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
(14, 'Ekpang Michael Etta', 'mike', 'http://res.cloudinary.com/weezyval/image/upload/v1523620464/mikeetta.jpg'),
(15, 'Charles Katuri', 'charlek', 'charlek.jpg'),
(16, 'John Odey', 'john', 'john.jpg'),
(17, 'Jegede David','davidstick766','dav.jpg'),
(18, 'Tejumola Timi', 'timi', 'http://res.cloudinary.com/tarrot-system-inc/image/upload/v1523621115/IMG_4551_muwd22.jpg'),
(19, 'Aghedo Joseph Femi', 'femicodes', 'https://res.cloudinary.com/femicodes/image/upload/v1523623381/IMG_20180221_185703.jpg');

-- 2018-04-13 06:08:02
