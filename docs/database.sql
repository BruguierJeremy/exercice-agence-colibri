SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `agence-colibri`;
CREATE DATABASE `agence-colibri` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `agence-colibri`;

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `app_user` (`id`, `email`, `lastname`, `firstname`, `password`, `created_at`, `updated_at`) VALUES
(3,	'jeremy@gmail.com',	'Bruguier',	'Jérémy',	'$2y$10$uruuAuhKE8zNUODTS2fq2.MY25P1SKRSaoKxLVHVLEvuFOnoZiFbS',	'2022-05-06 17:38:21',	NULL);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contact` (`id`, `lastname`, `firstname`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1,	'Bruguier',	'Jérémy',	'bruguier@gmail.com',	'Recrutement alternance',	'Motivé à fond pour cette alternance',	'2022-05-07 13:01:35',	'0000-00-00 00:00:00');