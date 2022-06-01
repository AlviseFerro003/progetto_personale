SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
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
CREATE TABLE `Utente` (
  `nome` char(255) NOT NULL,
  `cognome` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `Utente` (`nome`, `cognome`, `email`, `password`) VALUES
('', '', 'ciao@gmail.com', 'ciao'),
('Alvise', 'Ferro', 'o0magefa0o@gmail.com', 'ciao');
ALTER TABLE `Promemoria`
  ADD PRIMARY KEY (`id_promemoria`),
  ADD UNIQUE KEY `promemoria_email_unique` (`email`);
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`email`);
ALTER TABLE `Promemoria`
  ADD CONSTRAINT `promemoria_email_foreign` FOREIGN KEY (`email`) REFERENCES `Utente` (`email`);
COMMIT;