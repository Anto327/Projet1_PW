DROP TABLE IF EXISTS `contacts`;
DROP TABLE IF EXISTS `educateurs`;
DROP TABLE IF EXISTS `licencies`;
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
);
CREATE TABLE `licencies` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `num_licence` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL,
  UNIQUE (`num_licence`),
  FOREIGN KEY (`id_categorie`) REFERENCES categories(`id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE `educateurs` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` BOOLEAN NOT NULL,
  `id_licencie` int NOT NULL,
  FOREIGN KEY (`id_licencie`) REFERENCES licencies(`id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE `contacts` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `id_licencie` int NOT NULL,
  FOREIGN KEY (`id_licencie`) REFERENCES licencies(`id`) ON UPDATE CASCADE ON DELETE CASCADE
);
-- Base admin data
INSERT INTO `categories` (`nom`, `code`)
VALUES ('Administrateurs', 'ADMINS');
INSERT INTO `licencies` (`num_licence`, `nom`, `prenom`, `id_categorie`)
VALUES (0, 'admin', 'admin', 1);
INSERT INTO `educateurs` (`email`, `password`, `is_admin`, `id_licencie`)
VALUES (
    'admin@admin.com',
    '$2y$10$mt8Murv9KojRdUrouDrGAuxuH2uhdJQ9LLykBrsbAY67YYg2JKbTi',
    -- password = admin
    1,
    1
  );