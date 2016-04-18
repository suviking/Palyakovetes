-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2016. Ápr 18. 21:14
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `palyakovetes`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `namedanswers`
--

CREATE TABLE IF NOT EXISTS `namedanswers` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `1` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `2` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `3` smallint(4) unsigned NOT NULL,
  `4` bit(1) NOT NULL,
  `5` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `6` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `7` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `8` text COLLATE utf8_hungarian_ci NOT NULL,
  `9` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `10` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `11` bit(1) NOT NULL,
  `12` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `13` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `comment` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `dateofanswer` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `namedquestions`
--

CREATE TABLE IF NOT EXISTS `namedquestions` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `unnamedanswers`
--

CREATE TABLE IF NOT EXISTS `unnamedanswers` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `1` tinyint(1) unsigned NOT NULL,
  `comment` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `dateofanswer` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `unnamedquestions`
--

CREATE TABLE IF NOT EXISTS `unnamedquestions` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'sha1 coded',
  `cookie` tinyint(10) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `fullname` varchar(75) COLLATE utf8_hungarian_ci NOT NULL,
  `temporarypsw` varchar(50) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'sha1 coded',
  `type` tinyint(1) unsigned NOT NULL COMMENT '0 if egyosz, 1 if subject',
  `canadd` bit(1) NOT NULL,
  `canview` bit(1) NOT NULL,
  `canedit` bit(1) NOT NULL,
  `candelete` bit(1) NOT NULL,
  `canmanageusers` bit(1) NOT NULL,
  `admin` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`cookie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
