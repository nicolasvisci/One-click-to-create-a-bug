-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Creato il: Giu 23, 2021 alle 18:22
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tamponi`
--

CREATE TABLE `tamponi` (
  `tamp_1` tinyint(1) NOT NULL,
  `tamp_2` tinyint(1) NOT NULL,
  `tamp_3` tinyint(1) NOT NULL,
  `costo_1` float NOT NULL,
  `costo_2` float NOT NULL,
  `costo_3` float NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tamponi`
--

INSERT INTO `tamponi` (`tamp_1`, `tamp_2`, `tamp_3`, `costo_1`, `costo_2`, `costo_3`, `email`) VALUES
(1, 1, 1, 0, 0, 0, 'massaromatteo51@gmail.com'),
(1, 1, 1, 3.56, 3.45, 3.75, 'matteomas@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tamponi`
--
ALTER TABLE `tamponi`
  ADD KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
