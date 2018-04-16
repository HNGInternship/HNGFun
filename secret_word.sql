-- Database Manager 4.2.5 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `secret_word`;
CREATE TABLE `secret_word` (
  `id` int(11) NOT NULL ,
  `name` varchar(255) NOT NULL,
  `secret_word` varchar(50) NOT NULL)
 ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `secret_word`(`id`, `name`, `secret_word`) 
VALUES 
	(1, "Ben", "gduheieje");
