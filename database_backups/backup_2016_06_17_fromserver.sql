
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2016. jún. 17. 06:43
-- Szerver verzió: 10.0.20-MariaDB
-- PHP verzió: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `u698198094_pk`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `namedanswers`
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
  `Q11` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `Q12` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Q13` text COLLATE utf8_hungarian_ci NOT NULL,
  `comment` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `dateofanswer` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=106 ;

--
-- A tábla adatainak kiíratása `namedanswers`
--

INSERT INTO `namedanswers` (`id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `comment`, `dateofanswer`) VALUES
(1, 'Gyurina Milla', 'gyurina.milla@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:22:17'),
(2, 'Garami Laura', 'laura.garami96@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:23:50'),
(3, 'Varga Dániel', 'vargadani005@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:24:01'),
(4, 'Kalocsai Babett', 'kbabett2296@gmail.com', 2016, 'Igen', 'Természettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:24:13'),
(5, 'Halász Dóra Lili', 'halaszdoralili@gmail.com', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:24:16'),
(6, 'Dienes-Oehm Dorottya', 'dienes.oehmdorottya@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:24:22'),
(7, 'Várhelyi Mercédesz Olimpia', 'mercien961101@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:24:22'),
(8, 'Szabó Réka Veronika', 'reka.sz05@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:24:26'),
(9, 'Gurubi Ágnes', 'gurubi.agika@gmail.com', 2016, 'Igen', 'Agrár', 'Vidéken', 'Felsőfokú szakképzés (OKJ)', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', 'vendéglátóiban fog tovább tanulni ', '2016-06-13 07:24:30'),
(10, 'Pálmai Levente', 'levente@palmai.hu', 2016, 'Igen', 'Gazdaságtudomány', 'Külföldön', 'Egyetemi képzés', '', 'Egyéb: Tanulok', 'Külföldön', 'Nem', '', '', '8 és 9 nincs', '2016-06-13 07:24:35'),
(11, 'Orosz Marcell', 'oroszmarcell97@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Külföldön', 'Egyetemi képzés', '', 'Dolgozom;Pénzt keresek', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:24:43'),
(12, 'Szőke Bálint Csaba', 'szbcs1@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Vidéken', 'Nem', '', '', '', '2016-06-13 07:24:43'),
(13, 'Balla-Somogyi Csaba', 'ballascsaba@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:25:00'),
(14, 'Langer Attila', 'langerattila@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:25:26'),
(15, 'Fazekas Ábel', 'fazekasabel@gmail.com', 2016, 'Igen', 'Művészet', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:25:28'),
(16, 'Szebenyi Krisztina', 'szebenyikriszti@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '9. és 10. kérdésre nincs válasz', '2016-06-13 07:25:32'),
(17, 'Schmidt Patrícia', 'patti17@freemail.hu', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:25:32'),
(18, 'Farkas Gergely', 'gergelyf1@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:25:34'),
(19, 'Kovács András', 'kovacs96andras@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:25:35'),
(20, 'Sipkovits Zsófia', 'sipkovits.zsofi@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:25:38'),
(21, 'Kapusy Bence', 'kapusy.bence@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:25:50'),
(22, 'Vajnai Zoltán', 'uzbullish@gmail.com', 2016, 'Igen', 'Agrár', 'Vidéken', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '8 és 9 nincs', '2016-06-13 07:25:50'),
(23, 'Vágó Soma', 'vagosoma@gmail.com', 2016, 'Igen', 'Sporttudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Pénzt keresek', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:25:51'),
(24, 'Felméry Máté', 'felmerym@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Egyéb: Tanulok', 'Budapesten', 'Igen', 'Fél év', '-', '', '2016-06-13 07:25:53'),
(25, 'Borsay Enikő', 'borsayeniko@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:25:56'),
(26, 'Fekecs Kamilla', 'Fkamilla@hotmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:26:22'),
(27, 'Mucsi Dorottya Ildikó', 'dorci.mucsi@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Pénzt keresek;Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:26:24'),
(28, 'Zsarnóczi Gábor', 'gzsarnoczi@t-online.hu', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:26:40'),
(29, 'Gazdag Gergő', 'gergogazd@gmail.com', 2016, 'Nem', '', '', '', 'Nem érdekel semmi, amit a felsőoktatásban találhatnék', 'Dolgozom;Egyéb: Zenei producernek készülök', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:26:45'),
(30, 'Babcsán Dorottya', 'babdorka@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Egyéb: Tanulok', 'Budapesten', 'Igen', 'Fél év', 'Nyelvtanulás', '', '2016-06-13 07:26:54'),
(31, 'Végh Diána', 'veghdiana@icloud.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '9. kérdéstől nincs válasz', '2016-06-13 07:27:04'),
(32, 'Vitanov George', 'georgevitanov@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Jogosítvány', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:27:14'),
(33, 'Csáti Zorka', 'zoorka03@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Pénzt keresek;Egyéb: Tanulok', 'Vidéken', 'Nem', '', '', '', '2016-06-13 07:27:19'),
(34, 'Berta Fanni', 'berta.fanni1919@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:27:22'),
(35, 'Hartman Eszter', 'hartman.eszter@freemail.hu', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:27:22'),
(36, 'Takács Donát', 'takacs.donat01@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '8 és 9 nincs', '2016-06-13 07:27:25'),
(37, 'Wolf Anita', 'wolfanita96@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:27:29'),
(38, 'Gömböcz Máté', 'gomboczmate@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:27:36'),
(39, 'Vratarics Eszter', 'eszter.vratarics@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:27:42'),
(40, 'Juhász Norbert', 'j.norbi96@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:27:43'),
(41, 'Pusztai Rozina', 'rozina.pusztai@gmail.com', 2016, 'Igen', 'Művészet', 'Budapesten', 'Egyetemi képzés', '', 'A következő évi felvételire készülök', 'Budapesten', 'Igen', 'Fél év', 'Új kultúrák megismerése, nyelvtanulás, tapasztalatszerzés', '', '2016-06-13 07:27:46'),
(42, 'Beluscsák Márta', 'beluscsak.marta@freemail.hu', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Főiskolai képzés', '', 'Pénzt keresek', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:27:47'),
(43, 'Galac Dóra', 'galdor97@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:27:51'),
(44, 'Farkas Zoe', 'zoe.farkas@freemail.hu', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:27:52'),
(45, 'Dezséni Dorottya', 'dezdod@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:28:07'),
(46, 'Újvári Ádám', 'ujvari.adi@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:28:21'),
(47, 'Vajda Lili', 'vajdalilieszter@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Pénzt keresek', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:28:24'),
(48, 'Báthor Anna', 'anna.bathor@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom; Egyéb: Várom a felvételi eredményt', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:28:26'),
(49, 'Fotyék Bianka', 'bfotyek96@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Főiskolai képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:28:30'),
(50, 'Zana Blanka', 'blanka.zana@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom;Pénzt keresek', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:28:45'),
(51, 'Rehák Eszter', 'eszterrehak@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:28:46'),
(52, 'Mohos Márton', 'mohos.marton.karoly@gmail.com', 2016, 'Igen', 'Művészet', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:28:48'),
(53, 'Beke Balázs', 'bbeke4200@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:28:56'),
(54, 'Németh Donát', 'doni.nemeth@gmail.com', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:28:59'),
(55, 'Mézes Ábel', 'mezesabel96@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '9. és 10. kérdésre nincs válasz', '2016-06-13 07:29:01'),
(56, 'Bahay Barnabás Fábián', 'barnabasbahay@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:29:03'),
(57, 'Rácz Orsolya', 'racz.orsi133@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:29:06'),
(58, 'Dörflinger Regina', 'd.regina98@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '8 és 9 nincs', '2016-06-13 07:29:07'),
(59, 'Práger Petra', 'pragerpetra97@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Külföldön', 'Egyetemi képzés', '', 'Dolgozom', 'Külföldön', 'Igen', 'Fél év', 'Nyelvtanulás', '', '2016-06-13 07:29:38'),
(60, 'Sugár Kolos', 'sugar.kolos@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:29:51'),
(61, 'Bajtsi Violetta', 'bajtsivia@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:29:51'),
(62, 'Nyírő Szilárd', 'ny.sziszka2@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '9. kérdéstől nincs válasz', '2016-06-13 07:29:54'),
(63, 'Bokor Lívia', 'bokorlivi96@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Vidéken', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', 'képző intézménynél kettő megjelölt: vidék és Bp.', '2016-06-13 07:29:54'),
(64, 'Rátosi Márk', 'ratosi.mark@gmail.com', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:29:58'),
(65, 'Enyedi Kinga', 'kinga.enyedi@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:30:01'),
(66, 'Dósa Ádám', 'dosaadam@gmail.com', 2016, 'Igen', 'Informatika', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:08'),
(67, 'Köblös Dávid', 'koblosdavid88@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:10'),
(68, 'Kenessey Zsófia Ágnes', '9', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '8 és 9 nincs', '2016-06-13 07:30:12'),
(69, 'Karacs András', 'andris0603@gmail.com', 2016, 'Igen', 'Művészet', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:14'),
(70, 'Hoffmann Eszter Klára', 'eszter.hoffmann.k@gmail.hu', 2016, 'Igen', 'Műszaki', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:35'),
(71, 'Csizmadia Ráhel Viktória', 'rahel.csiii@gmail.com', 2016, 'Igen', 'Művészet', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:36'),
(72, 'Ulrich Áron', 'csivi97@citromail,hu', 2016, 'Igen', 'Természettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:41'),
(73, 'Fábián Dávid', 'fdavid0505@gmai.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:42'),
(74, 'Csutak Barnabás', 'barnus@abacusconsult.hu', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A következő évi felvételire készülök', 'Külföldön', 'Nem', '', '', '', '2016-06-13 07:30:44'),
(75, 'Catale Manuel', 'man.catale@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:48'),
(76, 'Kálmán Marcell', 'kalman.marci@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:30:51'),
(77, 'Németh Fanni', 'fannimania@gmail.com', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:30:58'),
(78, 'Such Kitti', 'kitti1996@gmail.com', 2016, 'Igen', 'Természettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Igen', 'Fél év', 'Nyelvtanulás', '', '2016-06-13 07:31:01'),
(79, 'Takács-Varga Bendegúz', 'bendeguz.t.r@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Igen', 'Egy év', 'Nyelvtanulás', '', '2016-06-13 07:31:05'),
(80, 'Juhász Dorina Rita', 'dorek.juhasz@gmail.com', 2016, 'Igen', 'Természettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:31:11'),
(81, 'Bittmann Rita', 'smucilimu193@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Vidéken', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:31:11'),
(82, 'Sipos Dorottya', 'dodo.sipos@citromail.hu', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:31:13'),
(83, 'Hegyi Hanna', 'hannahegyi@gmail.com', 2016, 'Igen', 'Sporttudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:31:19'),
(84, 'Várhegyi Bianka Virág', 'vbvirag@gmail.com', 2016, 'Igen', 'Informatika', 'Külföldön', 'Főiskolai képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:31:37'),
(85, 'Tevan Rebeka', 'tevrebi@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:31:41'),
(86, 'Léber Fanni Dóra', 'leberfanni9726@gmail.com', 2016, 'Igen', 'Agrár', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '9. kérdéstől nincs válasz', '2016-06-13 07:31:49'),
(87, 'Rákosi Lili', 'lilirakosi@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Igen', 'Fél év', 'Továbbtanulás megkönnyítésének érdekében, Nyelvtanulás', '8 és 9 nincs', '2016-06-13 07:32:08'),
(88, 'Keresztes Borbála', 'keresztes.borcsi@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Pénzt keresek;Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:32:12'),
(89, 'Haradi Panna', 'maradi.panna@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Igen', 'Egy év', 'Nyelvtanulás', '', '2016-06-13 07:32:13'),
(90, 'Lukácsi Lilla', 'lukacsi.lilla@gmail.com', 2016, 'Igen', 'Agrár', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:32:27'),
(91, 'Ardai Boglárka', 'ardaibogi@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:32:30'),
(92, 'Zsámboki Zsuzsanna Réka', 'zsuzsi.zsamboki@gmail.com', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'Pénzt keresek;Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:32:34'),
(93, 'Gulyás Bence Dániel', 'gulyas.bence97@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Külföldön', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', 'intézmény helyét külföld és bp-nek jelölte', '2016-06-13 07:32:39'),
(94, 'Schreiber Nóra', 'noraschreiber9@gmail.com', 2016, 'Igen', 'Orvos- és egészségtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:32:47'),
(95, 'Marx Adél', 'm.adele@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:32:55'),
(96, 'Such Petra', 'suchpetra08@gmail.com', 2016, 'Igen', 'Jogi', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Nyelvet tanulok', 'Külföldön', 'Nem', '', '', '', '2016-06-13 07:33:19'),
(97, 'Bui Dien Lili', 'lilidemonspiral@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:33:33'),
(98, 'Kárpáti Noémi', 'noemikarpati97@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:33:36'),
(99, 'Majoross Dóra', 'm.dori24@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'Egyéb: Tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:33:43'),
(100, 'Hermann Dóra', 'hermanndorka@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'Dolgozom', 'Budapesten', 'Nem', '', '', '', '2016-06-13 07:33:51'),
(101, 'Balogh Bendegúz', 'tomivalmosok@gmail.com', 2016, 'Igen', 'Gazdaságtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:34:05'),
(102, 'Tóth Bernadett', 'tóth.bernadett96@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:34:42'),
(103, 'Bartók Boróka', 'borobartok@gmail.com', 2016, 'Igen', 'Természettudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-13 07:34:44'),
(104, 'Horváth Kíra Noémi', 'kxrah62@gmail.com', 2016, 'Igen', 'Bölcsészettudomány', 'Budapesten', 'Egyetemi képzés', '', 'tanulok', 'Budapesten', 'Nem', '', '', '', '2016-06-16 20:25:57'),
(105, 'Antal Márton', 'amarton333@gmail.com', 2016, 'Igen', 'Társadalomtudomány', 'Budapesten', 'Egyetemi képzés', '', 'A fentiek közül egyik sem.', '-', 'Nem', '', '', '', '2016-06-16 20:27:55');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `namedquestions`
--

CREATE TABLE IF NOT EXISTS `namedquestions` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=14 ;

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
-- Tábla szerkezet: `unnamedanswers`
--

CREATE TABLE IF NOT EXISTS `unnamedanswers` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `rating` tinyint(1) unsigned NOT NULL,
  `dateofanswer` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=106 ;

--
-- A tábla adatainak kiíratása `unnamedanswers`
--

INSERT INTO `unnamedanswers` (`id`, `rating`, `dateofanswer`) VALUES
(1, 3, '2016-06-13 07:18:36'),
(2, 4, '2016-06-13 07:18:39'),
(3, 4, '2016-06-13 07:18:44'),
(4, 4, '2016-06-13 07:18:47'),
(5, 5, '2016-06-13 07:18:49'),
(6, 5, '2016-06-13 07:18:50'),
(7, 5, '2016-06-13 07:18:53'),
(8, 5, '2016-06-13 07:18:55'),
(9, 5, '2016-06-13 07:18:57'),
(10, 4, '2016-06-13 07:18:58'),
(11, 4, '2016-06-13 07:18:58'),
(12, 3, '2016-06-13 07:19:00'),
(13, 5, '2016-06-13 07:19:04'),
(14, 4, '2016-06-13 07:19:04'),
(15, 4, '2016-06-13 07:19:05'),
(16, 4, '2016-06-13 07:19:06'),
(17, 5, '2016-06-13 07:19:10'),
(18, 4, '2016-06-13 07:19:10'),
(19, 4, '2016-06-13 07:19:12'),
(20, 4, '2016-06-13 07:19:12'),
(21, 5, '2016-06-13 07:19:12'),
(22, 4, '2016-06-13 07:19:16'),
(23, 3, '2016-06-13 07:19:16'),
(24, 3, '2016-06-13 07:19:18'),
(25, 4, '2016-06-13 07:19:20'),
(26, 5, '2016-06-13 07:19:21'),
(27, 3, '2016-06-13 07:19:23'),
(28, 4, '2016-06-13 07:19:23'),
(29, 3, '2016-06-13 07:19:25'),
(30, 4, '2016-06-13 07:19:28'),
(31, 4, '2016-06-13 07:19:28'),
(32, 3, '2016-06-13 07:19:29'),
(33, 5, '2016-06-13 07:19:30'),
(34, 5, '2016-06-13 07:19:31'),
(35, 3, '2016-06-13 07:19:34'),
(36, 3, '2016-06-13 07:19:34'),
(37, 4, '2016-06-13 07:19:34'),
(38, 4, '2016-06-13 07:19:36'),
(39, 4, '2016-06-13 07:19:40'),
(40, 3, '2016-06-13 07:19:40'),
(41, 5, '2016-06-13 07:19:41'),
(42, 4, '2016-06-13 07:19:41'),
(43, 4, '2016-06-13 07:19:45'),
(44, 5, '2016-06-13 07:19:46'),
(45, 3, '2016-06-13 07:19:46'),
(46, 5, '2016-06-13 07:19:50'),
(47, 4, '2016-06-13 07:19:52'),
(48, 5, '2016-06-13 07:19:53'),
(49, 4, '2016-06-13 07:19:57'),
(50, 4, '2016-06-13 07:19:58'),
(51, 5, '2016-06-13 07:19:58'),
(52, 5, '2016-06-13 07:20:03'),
(53, 5, '2016-06-13 07:20:09'),
(54, 4, '2016-06-13 07:20:16'),
(55, 4, '2016-06-13 07:20:22'),
(56, 4, '2016-06-13 07:20:22'),
(57, 5, '2016-06-13 07:20:23'),
(58, 4, '2016-06-13 07:20:29'),
(59, 2, '2016-06-13 07:20:29'),
(60, 4, '2016-06-13 07:20:33'),
(61, 5, '2016-06-13 07:20:35'),
(62, 4, '2016-06-13 07:20:39'),
(63, 4, '2016-06-13 07:20:40'),
(64, 5, '2016-06-13 07:20:44'),
(65, 4, '2016-06-13 07:20:45'),
(66, 3, '2016-06-13 07:20:47'),
(67, 5, '2016-06-13 07:20:48'),
(68, 4, '2016-06-13 07:20:49'),
(69, 5, '2016-06-13 07:20:50'),
(70, 4, '2016-06-13 07:20:52'),
(71, 4, '2016-06-13 07:20:55'),
(72, 5, '2016-06-13 07:20:57'),
(73, 4, '2016-06-13 07:20:57'),
(74, 4, '2016-06-13 07:21:00'),
(75, 4, '2016-06-13 07:21:02'),
(76, 4, '2016-06-13 07:21:02'),
(77, 1, '2016-06-13 07:21:07'),
(78, 2, '2016-06-13 07:21:08'),
(79, 3, '2016-06-13 07:21:08'),
(80, 4, '2016-06-13 07:21:09'),
(81, 3, '2016-06-13 07:21:13'),
(82, 4, '2016-06-13 07:21:14'),
(83, 4, '2016-06-13 07:21:16'),
(84, 2, '2016-06-13 07:21:18'),
(85, 4, '2016-06-13 07:21:20'),
(86, 4, '2016-06-13 07:21:21'),
(87, 5, '2016-06-13 07:21:23'),
(88, 4, '2016-06-13 07:21:25'),
(89, 5, '2016-06-13 07:21:26'),
(90, 4, '2016-06-13 07:21:31'),
(91, 3, '2016-06-13 07:21:31'),
(92, 4, '2016-06-13 07:21:31'),
(93, 5, '2016-06-13 07:21:35'),
(94, 4, '2016-06-13 07:21:36'),
(95, 4, '2016-06-13 07:21:43'),
(96, 3, '2016-06-13 07:21:50'),
(97, 5, '2016-06-13 07:21:51'),
(98, 3, '2016-06-13 07:22:59'),
(99, 4, '2016-06-13 07:23:05'),
(100, 4, '2016-06-13 07:23:11'),
(101, 4, '2016-06-13 07:23:17'),
(102, 4, '2016-06-13 07:23:23'),
(103, 3, '2016-06-13 07:23:28'),
(104, 4, '2016-06-13 07:23:34'),
(105, 5, '2016-06-13 07:23:47');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `unnamedquestions`
--

CREATE TABLE IF NOT EXISTS `unnamedquestions` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet: `users`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cookie`, `email`, `fullname`, `temporarypsw`, `type`, `canadd`, `canview`, `canedit`, `candelete`, `canmanageusers`, `admin`) VALUES
(1, 'suveghd', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'd.suviking@gmail.com', 'Süvegh Dávid', '', 0, b'1', b'1', b'1', b'1', b'1', b'1'),
(2, 'probat', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 1, 'ad@asd.com', 'Proba Teszt', '', 0, b'1', b'0', b'0', b'0', b'0', b'0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
