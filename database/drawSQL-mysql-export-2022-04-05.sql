USE PROGETTO_PERSONALE;
CREATE TABLE `Utente`(
    `nome` CHAR(255) NOT NULL,
    `cognome` CHAR(255) NOT NULL,
    `email` CHAR(255) NOT NULL,
    `password` CHAR(255) NOT NULL
);
ALTER TABLE
    `Utente` ADD PRIMARY KEY `utente_email_primary`(`email`);
CREATE TABLE `Promemoria`(
    `data` DATETIME NOT NULL COMMENT 'data a cui il promemoria dovrà provvedere nell\'essere inserito',
    `argomento` CHAR(255) NOT NULL COMMENT 'cosa dovrà ricordare il promemoria in testo',
    `email` CHAR(255) NOT NULL,
    `id_promemoria` INT NOT NULL COMMENT 'id univoco dei singoli promemoria',
    `si_ripete` TINYINT(1) NOT NULL COMMENT 'nella creazione della pagina fare un menù a tendina che metta si come 1 e no come 0',
    `ogni_quanto` CHAR(255) NULL COMMENT 'se viene ripetuto per esempio ogni lunedì',
    `fino_a_quando` CHAR(255) NULL COMMENT 'fino a che data va viene ripetuto ( limitare la data a 70 anni dopo )',
    `data_inizio` DATE NULL COMMENT 'serve per dare la data di inizio del promemoria che verrà continuato per i giorni indicati sul campo durata',
    `durata` INT NULL COMMENT 'serve per dare la durata del promemoria che verrà continuato per i giorni indicati ( ogni giorno )'
);
ALTER TABLE
    `Promemoria` ADD UNIQUE `promemoria_email_unique`(`email`);
ALTER TABLE
    `Promemoria` ADD PRIMARY KEY `promemoria_id_promemoria_primary`(`id_promemoria`);
ALTER TABLE
    `Promemoria` ADD CONSTRAINT `promemoria_email_foreign` FOREIGN KEY(`email`) REFERENCES `Utente`(`email`);
