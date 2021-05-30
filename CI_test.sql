-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 30, 2021 alle 16:34
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CI_test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `login3`
--

CREATE TABLE `login3` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `dataDiNascita` date NOT NULL,
  `luogoDiNascita` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `codiceFiscale` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `luogoDiResidenza` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indirizzo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `cap` int(5) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `confPassword` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `login3`
--

INSERT INTO `login3` (`id`, `nome`, `cognome`, `dataDiNascita`, `luogoDiNascita`, `codiceFiscale`, `luogoDiResidenza`, `indirizzo`, `cap`, `telefono`, `email`, `password`, `confPassword`, `slug`) VALUES
(1, 'Nicolas', 'Visci', '2000-06-14', 'Bari', 'VSCNLS00H14A662S', 'GRAVINA IN PUGLIA', 'via Rosa Brunetti, 17', 70024, 3776892777, 'n.visci3@studenti.uniba.it', 'Lapassord', 'Lapassord', ''),
(2, 'Mimmo', 'Lofrese', '2000-09-08', 'Milano', 'MJHBHY88H14B772Q', 'MILANO', 'via Crispi, 12', 38891, 3661782999, 'mimmmolo@gmail.com', 'laLLa', 'laLLa', ''),
(3, 'Pippo', 'Loresse', '1977-01-21', 'Cassese', 'GVFDHJ99H54D364F', 'Brianza', 'via Scio, 78', 57789, 3887656990, 'piipplo@hotmail.it', 'lo34', 'lo34', '');

-- --------------------------------------------------------

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `login3`
--
ALTER TABLE `login3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `login3`
--
ALTER TABLE `login3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
