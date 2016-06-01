-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2016. Jún 01. 20:34
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
  `Q1` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Q2` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Q3` smallint(4) unsigned NOT NULL,
  `Q4` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `Q5` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Q6` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `Q7` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Q8` text COLLATE utf8_hungarian_ci NOT NULL,
  `Q9` text COLLATE utf8_hungarian_ci NOT NULL,
  `Q10` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `Q11` bit(1) NOT NULL,
  `Q12` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Q13` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `comment` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `dateofanswer` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=4 ;

--
-- A tábla adatainak kiíratása `namedanswers`
--

INSERT INTO `namedanswers` (`id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `comment`, `dateofanswer`) VALUES
(1, 'nev', 'email', 2016, 'Igen', 'Agrár', 'Budapesten', 'Egyetemi képzés', 'mert nem', 'A következő évi felvételire készülök; Egyéb: Egyéb indok', 'Budapesten', b'1', 'Fél év', 'cél', 'commentelés', '2016-05-29 20:28:38'),
(2, 'nev2', 'email2', 2017, 'Igen', 'Agrár', 'Budapesten', 'Egyetemi képzés', 'asd', ': ', 'Budapesten', b'1', 'Fél év', 'asd', 'asdas', '2016-05-31 22:00:33'),
(3, 'asd', 'asd', 2017, 'Igen', 'Agrár', 'Budapesten', 'Egyetemi képzés', 'asd', 'A fentiek közül egyik sem.', 'Budapesten', b'1', 'Fél év', 'asd', 'asd', '2016-05-31 22:03:57');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `namedquestions`
--

CREATE TABLE IF NOT EXISTS `namedquestions` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=14 ;

--
-- A tábla adatainak kiíratása `namedquestions`
--

INSERT INTO `namedquestions` (`id`, `question`) VALUES
(1, 'Név:'),
(2, 'E-mail:'),
(3, 'Mikor végeztél az Illyésben?'),
(4, 'Jelentkeztél továbbtanulásra?'),
(5, 'Képzési terület:'),
(6, 'Hol van ez a képző intézmény?'),
(7, 'Képzési forma:'),
(8, 'Ha nem, akkor miért nem?'),
(9, 'Várhatóan milyen tevékenységet végzel az érettségit követően?'),
(10, 'A fent leírtakat hol végzed?'),
(11, 'Tanultál-e középiskolai éveid alatt legalább fél évig külföldön?'),
(12, 'Ha igen, mennyi ideig?'),
(13, 'Milyen céllal?');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cookie`, `email`, `fullname`, `temporarypsw`, `type`, `canadd`, `canview`, `canedit`, `candelete`, `canmanageusers`, `admin`) VALUES
(1, 'suveghd', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'd.suviking@gmail.com', 'Süvegh Dávid', '', 0, b'1', b'1', b'1', b'1', b'1', b'1'),
(2, 'probat', '954e28be3de1c612e86b966b117027a80f955760', 1, 'ad@asd.com', 'Proba Teszt', '', 0, b'1', b'0', b'0', b'0', b'0', b'0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
