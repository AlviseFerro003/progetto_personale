-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 31, 2022 alle 14:27
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PROGETTO_PERSONALE`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Promemoria`
--

CREATE TABLE `Promemoria` (
  `data` datetime NOT NULL COMMENT 'data a cui il promemoria dovrà provvedere nell''essere inserito',
  `argomento` char(255) NOT NULL COMMENT 'cosa dovrà ricordare il promemoria in testo',
  `email` char(255) NOT NULL,
  `id_promemoria` int(11) NOT NULL COMMENT 'id univoco dei singoli promemoria',
  `si_ripete` tinyint(1) NOT NULL COMMENT 'nella creazione della pagina fare un menù a tendina che metta si come 1 e no come 0',
  `ogni_quanto` char(255) DEFAULT NULL COMMENT 'se viene ripetuto per esempio ogni lunedì',
  `fino_a_quando` char(255) DEFAULT NULL COMMENT 'fino a che data va viene ripetuto ( limitare la data a 70 anni dopo )',
  `data_inizio` date DEFAULT NULL COMMENT 'serve per dare la data di inizio del promemoria che verrà continuato per i giorni indicati sul campo durata',
  `durata` int(11) DEFAULT NULL COMMENT 'serve per dare la durata del promemoria che verrà continuato per i giorni indicati ( ogni giorno )'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `nome` char(255) NOT NULL,
  `cognome` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`nome`, `cognome`, `email`, `password`) VALUES
('', '', 'ciao@gmail.com', 'ciao'),
('Alvise', 'Ferro', 'o0magefa0o@gmail.com', 'ciao');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Promemoria`
--
ALTER TABLE `Promemoria`
  ADD PRIMARY KEY (`id_promemoria`),
  ADD UNIQUE KEY `promemoria_email_unique` (`email`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Promemoria`
--
ALTER TABLE `Promemoria`
  ADD CONSTRAINT `promemoria_email_foreign` FOREIGN KEY (`email`) REFERENCES `Utente` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
