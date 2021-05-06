-- Adminer 4.8.0 MySQL 8.0.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(225) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `roles` (`id_role`, `name`, `description`) VALUES
(1,	'Admin',	'Má plné pravomoce'),
(2,	'Zadavatel',	'Zadává tásky'),
(3,	'Zaměstnanec',	'Plní tásky'),
(4,	'Guest',	'Návštěvník stránky');

DROP TABLE IF EXISTS `tasklists`;
CREATE TABLE `tasklists` (
  `id_tasklist` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_tasklist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `tasklists` (`id_tasklist`, `name`, `description`) VALUES
(1,	'Údržba - Prostředí',	'Je tu čisto?'),
(2,	'Údržba - Vybavení',	'Funguje to?'),
(3,	'Účetnictví',	'peníze'),
(4,	'Zásoby',	'jídlo a pití'),
(5,	'Inventura',	'zboží');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_task` int NOT NULL AUTO_INCREMENT,
  `title` varchar(225) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci,
  `datetime_from` datetime DEFAULT NULL,
  `datetime_to` datetime DEFAULT NULL,
  `id_tasklist` int DEFAULT '1',
  PRIMARY KEY (`id_task`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `tasks` (`id_task`, `title`, `description`, `datetime_from`, `datetime_to`, `id_tasklist`) VALUES
(1,	'Vyčistit kabinet',	'vysývej',	'2021-05-06 23:30:55',	'2021-05-07 15:00:00',	1),
(2,	'Přeinstalovat PC',	'Pomalej, reinstalovat',	'2021-06-06 23:45:57',	'2021-06-10 23:45:57',	2),
(3,	'Vyluxovat',	'Čistit podlahu',	'2021-05-12 10:03:13',	'2021-05-15 15:00:00',	1),
(4,	'Vytřít podlahu',	'Čisto',	'2021-08-01 15:00:00',	'2021-08-05 00:00:00',	1),
(5,	'koupit notebook',	'rychle',	'2021-08-01 15:00:00',	'2021-08-01 15:00:00',	2),
(6,	'Koupit Windows License',	'Nejsou',	'2021-07-10 15:00:00',	'2021-08-10 15:00:00',	2),
(7,	'Účetnictví',	'počítat',	'2021-08-01 15:00:00',	'2021-08-11 15:00:00',	3),
(8,	'Účetnictví',	'počítat',	'2021-09-01 15:00:00',	'2021-09-11 15:00:00',	3),
(9,	'Účetnictví',	'počítat',	'2021-10-01 15:00:00',	'2021-10-11 15:00:00',	3),
(10,	'Koupit kečup a šunku',	'Mňam',	'2021-08-01 15:00:00',	'2021-08-10 15:00:00',	4),
(11,	'Koupit toustový chleba',	'toust',	'2021-08-01 15:00:00',	'2021-08-03 15:00:00',	4),
(12,	'Koupit mléko',	'Kafe',	'2021-08-01 15:00:00',	'2021-08-10 15:00:00',	4),
(13,	'Pouzdra na telefon',	'Pomáhat a chránit',	'2021-08-05 15:00:00',	'2021-08-06 15:00:00',	5),
(14,	'Telefony',	'haloo?',	'2021-08-01 15:00:00',	'2021-08-02 15:00:00',	5),
(15,	'Sluchátka',	'hmm hm hmhmmm hm',	'2021-08-01 15:00:00',	'2021-08-04 15:00:00',	5);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `id_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `birth_date`, `phone_number`, `city`, `address`, `id_role`) VALUES
(1,	'Jiří',	'Štěpán',	'j.stepan@seznam.cz',	'$2a$09$anexamplestringforsaledjoxbV9HmMM122coGXE98Xp6vn5mGIG',	'1986-12-18',	745356915,	'Brno',	'Ulice na Kopečku',	'1'),
(2,	'Michal',	'Navrátil',	'm.navratil@seznam.cz',	'$2a$09$anexamplestringforsale/V3dUfT0h/uCieKlh1oEr4v1GzE249q',	'1998-03-20',	723987143,	'Praha',	'Na Příkopech',	'2'),
(3,	'Marek',	'Holouch',	'm.holouch@gmail.com',	'$2a$09$anexamplestringforsale2uqISqnZszX9NA7VL.rrMW61mwhSkoC',	'1995-06-19',	735980234,	'Mladá Boleslav',	'u Zahrady',	'3'),
(4,	'Michal',	'Všanc',	'm.vsanc@seznam.cz',	'$2a$09$anexamplestringforsaleYvyh8VNuo4jj1G0OwdaEoeddBtwJgPK',	'2002-12-09',	746789356,	'Děčín',	'Ulice Křižíkova',	'2');

-- 2021-05-06 17:39:36
