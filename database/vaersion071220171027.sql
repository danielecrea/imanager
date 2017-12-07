-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Dic 07, 2017 alle 10:26
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
  `date` date NOT NULL,
  `roomId` int(11) NOT NULL,
  `typeOfUse` int(3) NOT NULL,
  `price` float NOT NULL,
  `standardPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prices`
--

INSERT INTO `prices` (`id`, `date`, `roomId`, `typeOfUse`, `price`, `standardPrice`) VALUES
(1, '2017-12-07', 1, 1, 50, 55),
(2, '2017-12-07', 1, 2, 60, 65),
(3, '2017-12-07', 1, 3, 70, 75),
(4, '2017-12-07', 1, 4, 80, 85);

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
