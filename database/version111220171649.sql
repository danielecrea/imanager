-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Dic 11, 2017 alle 16:48
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
-- Struttura della tabella `occupancies`
--

CREATE TABLE `occupancies` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `hotelId` int(10) NOT NULL,
  `percentage` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `occupancies`
--

INSERT INTO `occupancies` (`id`, `date`, `hotelId`, `percentage`) VALUES
(1, '2017-12-11', 1, 80),
(2, '2017-12-11', 1, 90);

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
(1, 1, '2017-12-12', 1, 1, 49, 55),
(2, 1, '2017-12-12', 1, 2, 59, 65),
(5, 2, '2017-12-12', 1, 1, 54, 60),
(6, 2, '2017-12-12', 1, 2, 64, 70),
(7, 1, '2017-12-12', 2, 1, 49, 55),
(8, 1, '2017-12-12', 2, 2, 59, 65),
(9, 2, '2017-12-12', 2, 1, 54, 60),
(10, 2, '2017-12-12', 2, 2, 64, 70);

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
  `name` varchar(256) NOT NULL,
  `capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`id`, `hotelId`, `name`, `capacity`) VALUES
(1, 1, 'San Pietro', 2),
(2, 1, 'Colosseo', 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `occupancies`
--
ALTER TABLE `occupancies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `pricetypes`
--
ALTER TABLE `pricetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*this will create the mapping */
CREATE TABLE `room_mapping` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roomId` int(10) NOT NULL,
  `typeOfUse` int(10) NOT NULL,
  `octorateId` int(20) NOT NULL,
  `officalWebsiteId` int(20) NOT NULL,
    primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Data values */
insert into room_mapping(roomId,typeOfUse,octorateId,officalWebsiteId) 
  values(1,1,148725,1),(1,2,148726,1),(2,1,148749,2),(2,2,148723,2),(2,3,148724,2),(3,1,148747,3),(3,2,148728,3),(3,3,148729,3),(3,4,148727,3),(4,1,148748,4),(4,2,148730,4),(4,3,148731,4),(4,4,148732,4),(5,1,148746,5);