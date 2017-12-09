-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Dic 09, 2017 alle 14:47
-- Versione del server: 10.1.16-MariaDB
-- Versione PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imanager`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `priceTypeId` int(10) NOT NULL,
  `date` date NOT NULL,
  `roomId` int(11) NOT NULL,
  `typeOfUse` int(3) NOT NULL,
  `price` float NOT NULL,
  `standardPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prices`
--

INSERT INTO `prices` (`id`, `priceTypeId`, `date`, `roomId`, `typeOfUse`, `price`, `standardPrice`) VALUES
(1, 1, '2017-12-07', 1, 1, 50, 55),
(2, 1, '2017-12-07', 1, 2, 60, 65),
(5, 2, '2017-12-07', 1, 1, 55, 60),
(6, 2, '2017-12-07', 1, 2, 65, 70);

-- --------------------------------------------------------

--
-- Struttura della tabella `pricetypes`
--

CREATE TABLE `pricetypes` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `percentage` int(2) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pricetypes`
--

INSERT INTO `pricetypes` (`id`, `name`, `description`, `percentage`, `isActive`) VALUES
(1, 'direct', 'direct price used on the official websites and webportals without commisions', 0, 1),
(2, 'ota18', 'prices reserved for ota with 18% commission', 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `hotelId` int(10) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`id`, `hotelId`, `Name`, `Capacity`) VALUES
(1, 1, 'San Pietro', 2),
(2, 1, 'Colosseo', 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
