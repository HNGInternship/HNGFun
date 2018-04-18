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

INSERT INTO `interns_data`(`name`, `username`, `image_filename`) VALUES
('Okunuga melody',	'melody',	'Screenshot-2018-3-21 Twitter.png'),
('ikpe mercy michael',	'mercyikpe',	'IMG-20180322-WA0010.jpg'),
('Mbah Clinton', 'mclint_', 'mclint_.jpg'),
('John Olubori David', 'olubori', 'http://res.cloudinary.com/naera/image/upload/v1518079662/d4wgdlou4n4mnc1meumf.jpg'),
('Sampson Joshua Monday', 'jozy', 'jozy.png');
-- 2018-04-13 06:08:02
