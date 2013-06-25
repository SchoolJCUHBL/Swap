-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 mei 2013 om 14:20
-- Serverversie: 5.5.20
-- PHP-Versie: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hblwissels`
--
CREATE DATABASE `hblwissels` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hblwissels`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inlog`
--

CREATE TABLE IF NOT EXISTS `inlog` (
  `leerlingnummer` varchar(6) NOT NULL,
  `password` varchar(30) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(40) NOT NULL,
  `MOD` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`leerlingnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `inlog`
--

INSERT INTO `inlog` (`leerlingnummer`, `password`, `voornaam`, `achternaam`, `MOD`) VALUES
('000011', 'yoloswag', 'Malle', 'Pietje', 0),
('223322', 'abbacababba', 'Ad', 'Aardsma', 0),
('334455', 'macarena', 'Bert', 'van Gindert', 0),
('nan', 'testcase', 'Nanda', 'Jansen', 1),
('Tex', 'TEstCase', 'Testkees', 'Moderator', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wissels`
--

CREATE TABLE IF NOT EXISTS `wissels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leerlingnummer` int(6) NOT NULL,
  `datum` date NOT NULL,
  `dag` varchar(3) NOT NULL,
  `vanuur` int(1) NOT NULL,
  `naaruur` int(1) NOT NULL,
  `commentaar` text NOT NULL,
  `OK` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Database: `test`
--
CREATE DATABASE `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
