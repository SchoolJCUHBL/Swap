-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 22 jul 2013 om 12:27
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
  `password` char(60) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(40) NOT NULL,
  `Moderator` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`leerlingnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `inlog`
--

INSERT INTO `inlog` (`leerlingnummer`, `password`, `voornaam`, `achternaam`, `Moderator`) VALUES
('000011', '$2a$12$528f19b8adfcebde1f42duzXIcUd6QNd/0L9LN9SIuPc/qIRVdIbO', 'Malle', 'Pietje', 0),
('121212', '$2a$12$4e58f98f675ae31d92e8cuptrW8Mr78WrfWP1Pd7wJDtNDKAscT5i', 'Jan', 'Aartsma', 0),
('223322', '$2a$12$a66fa2f81306c2adcb6d5uHyyUU3RjGD4rZYLaEa4sy9ql4Cfb72a', 'ad', 'Aardsma', 0),
('334455', '$2a$12$cf4b888534db08e99d9c9uCxU4vowp7atKBwkQb1O8pv3y2p/L7dq', 'Bert', 'van Gindert', 0),
('nan', '$2a$12$e06963ceba00acb3519b9OlVfmL2TfkKFYBf3iMw8E7k7hD5hwM/2', 'Nanda', 'Jansen', 1),
('tex', '$2a$12$404142587cdad9ccf4275ursCN5HOyfBlAu8YrWlHXX.GVHblATwm', 'TestKees', 'Moderator', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wissels`
--

CREATE TABLE IF NOT EXISTS `wissels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leerlingnummer` varchar(6) NOT NULL,
  `datum` date NOT NULL,
  `dag` varchar(3) NOT NULL,
  `vanuur` int(1) NOT NULL,
  `naaruur` int(1) NOT NULL,
  `commentaar` text NOT NULL,
  `OK` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `wissels`
--

INSERT INTO `wissels` (`id`, `leerlingnummer`, `datum`, `dag`, `vanuur`, `naaruur`, `commentaar`, `OK`) VALUES
(1, 223322, '2013-06-25', 'Thu', 3, 7, 'Gewoon uitslapen, je weet wel...', 0),
(2, 334455, '1212-12-12', 'Thu', 4, 6, 'asdasdasdsada', 1);
--
-- Database: `test`
--
CREATE DATABASE `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
