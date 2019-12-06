-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Dez 2019 um 00:52
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_abdullah_kaitoua_bigevents`
--
CREATE DATABASE IF NOT EXISTS `cr13_abdullah_kaitoua_bigevents` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr13_abdullah_kaitoua_bigevents`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `weburl` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `edatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `eventlist`
--

INSERT INTO `eventlist` (`id`, `name`, `description`, `img`, `email`, `phone`, `address`, `weburl`, `capacity`, `type`, `edatetime`) VALUES
(1, 'Balkan Party', 'cool', 'https://images.unsplash.com/photo-1471967183320-ee018f6e114a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1951&q=80', 'party@gmx.com', '+496900909090', 'Arsenal12', 'https://unsplash.com/photos/RygIdTavhkQ', '600', 'music', '2019-12-10 00:00:00'),
(3, 'Syria', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'https://images.unsplash.com/photo-1561760041-f446e77d0885?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'abdullah.kaitoua@gmail.com', '+496900909090', 'Damascus', 'https://unsplash.com/photos/RygIdTavhkQ', '5980', 'movie', '2020-01-01 00:00:00'),
(4, 'BLACK LIGHT', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'https://www.viennaticketoffice.com/multimedia/images/big/3/0/9/4/9/309495i1.jpg', 'email@gmx.com', '+496900909090', 'Volkstheater', 'https://unsplash.com/photos/RygIdTavhkQ', '300', 'theater', '2020-03-01 20:00:00'),
(5, 'sport for kids', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'https://images.unsplash.com/photo-1490326149782-dd42fa59bd9f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'email@gmx.com', '+496900909090', 'Stuttheimestrasse 16', 'https://unsplash.com/photos/RygIdTavhkQ', '1002', 'sport', '2020-03-10 20:00:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
