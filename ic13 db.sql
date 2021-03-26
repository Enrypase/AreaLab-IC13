-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 26, 2021 alle 12:56
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ic13`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi`
--

CREATE TABLE `corsi` (
  `idCorso` int(11) NOT NULL,
  `nomeCorso` varchar(255) NOT NULL,
  `descrizioneCorso` varchar(1000) NOT NULL,
  `durataOreCorso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`idCorso`, `nomeCorso`, `descrizioneCorso`, `durataOreCorso`) VALUES
(1, 'Rischio Incendio', 'Corso preparatorio antiincendio', 10),
(2, 'Rischio Chimico', 'Corso preparatorio rischio chimico in laboratorio', 10),
(3, 'Rischio Terremoto', 'Corso preparatorio terremoto', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `frequentazioni`
--

CREATE TABLE `frequentazioni` (
  `idCorso` int(11) NOT NULL,
  `codFiscPersona` char(16) NOT NULL,
  `dataF` date NOT NULL,
  `oreEffettuate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `log`
--

CREATE TABLE `log` (
  `username` varchar(255) NOT NULL,
  `dataOra` datetime NOT NULL,
  `azioni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `personale`
--

CREATE TABLE `personale` (
  `codFiscPersona` char(16) NOT NULL,
  `nomePersona` varchar(255) NOT NULL,
  `cognomePersona` varchar(255) NOT NULL,
  `ruoloPersona` varchar(255) NOT NULL,
  `dataNascitaPersona` date NOT NULL,
  `servizio` tinyint(1) NOT NULL,
  `mailPersona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mailUtenti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `password`, `mailUtenti`) VALUES
('username', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'username@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `corsi`
--
ALTER TABLE `corsi`
  ADD PRIMARY KEY (`idCorso`);

--
-- Indici per le tabelle `frequentazioni`
--
ALTER TABLE `frequentazioni`
  ADD PRIMARY KEY (`idCorso`,`codFiscPersona`,`dataF`),
  ADD KEY `codFiscPersona` (`codFiscPersona`);

--
-- Indici per le tabelle `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `personale`
--
ALTER TABLE `personale`
  ADD PRIMARY KEY (`codFiscPersona`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `corsi`
--
ALTER TABLE `corsi`
  MODIFY `idCorso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `frequentazioni`
--
ALTER TABLE `frequentazioni`
  MODIFY `idCorso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `frequentazioni`
--
ALTER TABLE `frequentazioni`
  ADD CONSTRAINT `frequentazioni_ibfk_1` FOREIGN KEY (`codFiscPersona`) REFERENCES `personale` (`codFiscPersona`),
  ADD CONSTRAINT `frequentazioni_ibfk_2` FOREIGN KEY (`idCorso`) REFERENCES `corsi` (`idCorso`);

--
-- Limiti per la tabella `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
