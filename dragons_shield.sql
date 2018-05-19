/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.31-MariaDB : Database - dragons_shield
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dragons_shield` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dragons_shield`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `intern_id` int(20) NOT NULL,
  `bank_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  KEY `bank_id` (`bank_id`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `banks` */

/*Table structure for table `buy_requests` */

DROP TABLE IF EXISTS `buy_requests`;

CREATE TABLE `buy_requests` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `intern_id` int(20) NOT NULL,
  `amount` float NOT NULL,
  `trade_limit` float DEFAULT NULL,
  `bid_per_coin` float NOT NULL,
  `status` enum('Completed','Pending','Closed','Open') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  CONSTRAINT `buy_requests_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buy_requests` */

/*Table structure for table `buy_transactions` */

DROP TABLE IF EXISTS `buy_transactions`;

CREATE TABLE `buy_transactions` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `buy_request_id` int(20) NOT NULL,
  `seller_id` int(20) NOT NULL,
  `status` enum('Completed','Pending','Closed','Open') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buy_request_id` (`buy_request_id`),
  KEY `seller_id` (`seller_id`),
  CONSTRAINT `buy_transactions_ibfk_1` FOREIGN KEY (`buy_request_id`) REFERENCES `buy_requests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `buy_transactions_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buy_transactions` */

/*Table structure for table `interns_data` */

DROP TABLE IF EXISTS `interns_data`;

CREATE TABLE `interns_data` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `skills` text,
  `country` varchar(100) DEFAULT NULL,
  `image_filename` text NOT NULL,
  `public_key` text NOT NULL,
  `private_key` text NOT NULL,
  `token` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `interns_data` */

insert  into `interns_data`(`id`,`first_name`,`last_name`,`username`,`email`,`phone_number`,`password_hash`,`skills`,`country`,`image_filename`,`public_key`,`private_key`,`token`,`created_at`,`updated_at`) values (1,'Chigozie','Ekwonu','','chygoz2@gmail.com','8075988147','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,'','GD3PN2SKURT6XRXNT3JA2QGOKCGZZ2N5NU66EBNMLKAZWVYWAZYRXN7L','SCB3V5ZG46PGBOKKTZSXWVEJQV6NLRKFO2SXZNXTSSDKKR3S4QFXRC7O',NULL,'2018-05-01 15:18:52',NULL),(2,'victor','steven','','chikodi543@gmail.com','07031172366','655ba8672b8d2e6f0a4777e94fd1880a',NULL,NULL,'','GCPUC6NYN63LSFWMEQWV3HHRQZO7GQ4MATITSSM4YURSZZKKP746LT3S','SDDSY3YYK3JBUGZGUSNPRMGSYEE3BMGG6P7PNTOP2VPJC6EYQRITKFYE',NULL,'2018-05-01 15:20:27',NULL),(3,'Nelson','Bassey','','nellybaz10@gmail.com','0784650455','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,'','GCKJ7WFOASFXAW5QI45L22HPMPTERM653Z6RHQQIZWVZ67D7QQ6CZ7EH','SD4UQ6GM5GPQP4DCMGGGPGVQ6CCBDCRVW73BZSNGQPIVMGTWTC7SYLVO',NULL,'2018-05-01 15:24:17',NULL),(4,'Nedy','Udombat','','nedyudombat@gmail.com','07018228593','1c613937f5aa8baa77ed57a01435e0f2',NULL,NULL,'','GAKFMHY3GY7DRKLSWQF4GTJKP5PDAEBEZQVBZIMQEXO7ESQG3YPB4TH3','SAKCKMJZZT4C7GTXTD4CNLZTWZ2CWG74TTSBKH5X36TVYCHBUTH7LF5O',NULL,'2018-05-01 16:03:37',NULL),(5,'victor','steven','','chikodi543@gmail.com','07031172366','655ba8672b8d2e6f0a4777e94fd1880a',NULL,NULL,'','GC3FQ3XPKTFOSWAXFXYROCOXXMTCIY6XWI56TPB2IHJOFLW6GPJL667I','SAQWOETE5SNQP4YEZ7IQ5RCW7RGWGM4XFOFA75HJCZG5QFAFBAJ3DW2K',NULL,'2018-05-01 18:51:22',NULL),(6,'Mark','Essien','','mark@hotels.ng','08091622224','827ccb0eea8a706c4c34a16891f84e7b',NULL,NULL,'','GCOUGLST4WBFUFZPIDLATRBBEDHRVUZSBBNLTXC6JLHEQY2BMEF42UCI','SCUKGHJCNVBLDBLTFL475XDA5DUZDFC66FNM53F5ZHLNAVFJE5OIOBVI',NULL,'2018-05-01 19:01:37',NULL),(7,'victor','steven','','chikodi543@gmail.com','07031172366','655ba8672b8d2e6f0a4777e94fd1880a',NULL,NULL,'','GDD6DUIW45WFAAJ6ASNS7WMA7MS5BIDIPQC7ZYAZFD6QPQZLLMFPAO63','SCVKQ3OQNLEOSJODLEQJ4W5PGQW2MQ4V5PL3GWBVP22VK57STNWGXIFN',NULL,'2018-05-01 19:32:02',NULL),(8,'John','Maek','','jm@mail.com','123456','b0baee9d279d34fa1dfd71aadb908c3f',NULL,NULL,'','GCJ6X75ZB7YAJTJDNOGU52KHZMGKVWOYDCXG6SWU76BYFVYJCTPHMKSU','SCWXBJ3CRHRIE7BNGU5QRPEEPPKDEJCBUFYAUGHNTBWBUHLW6LG53GFS',NULL,'2018-05-01 19:56:22',NULL);

/*Table structure for table `sell_requests` */

DROP TABLE IF EXISTS `sell_requests`;

CREATE TABLE `sell_requests` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `intern_id` int(20) NOT NULL,
  `amount` float NOT NULL,
  `trade_limit` float DEFAULT NULL,
  `price_per_coin` float NOT NULL,
  `status` enum('Completed','Pending','Closed','Open') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  CONSTRAINT `sell_requests_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sell_requests` */

/*Table structure for table `sell_transactions` */

DROP TABLE IF EXISTS `sell_transactions`;

CREATE TABLE `sell_transactions` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sell_request_id` int(20) NOT NULL,
  `buyer_id` int(20) NOT NULL,
  `status` enum('Completed','Pending','Closed','Open') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sell_request_id` (`sell_request_id`),
  KEY `buyer_id` (`buyer_id`),
  CONSTRAINT `sell_transactions_ibfk_1` FOREIGN KEY (`sell_request_id`) REFERENCES `sell_requests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sell_transactions_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sell_transactions` */

/*Table structure for table `transaction_history` */

DROP TABLE IF EXISTS `transaction_history`;

CREATE TABLE `transaction_history` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `amount` float NOT NULL,
  `status` enum('In Progress','Pending','Completed') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_history` */

/*Table structure for table `users_data` */

DROP TABLE IF EXISTS `users_data`;

CREATE TABLE `users_data` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link` varchar(255) DEFAULT NULL,
  `reset_link_expiry` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users_data` */

insert  into `users_data`(`user_id`,`fullname`,`username`,`phonenumber`,`email`,`nationality`,`city`,`password`,`reset_link`,`reset_link_expiry`) values (1,'admin shield','admin','121212','admin@gmail.com','nigeria','lagos','21232f297a57a5a743894a0e4a801fc3',NULL,NULL);

/*Table structure for table `wallets` */

DROP TABLE IF EXISTS `wallets`;

CREATE TABLE `wallets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `intern_id` int(20) NOT NULL,
  `balance` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `interns_data` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wallets` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
