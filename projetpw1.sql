CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `licencie` (
  `id` int NOT NULL,
  `num_licence` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `id_categorie` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`num_licence`),
  FOREIGN KEY (`id_categorie`) REFERENCES categorie(`id`)
);
CREATE TABLE `educateur` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_licencie` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_licencie`) REFERENCES licencie(`id`)
);
CREATE TABLE `admin` (
  `id` int NOT NULL,
  `id_educateur` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_educateur`) REFERENCES educateur(`id`)
);
CREATE TABLE `contact` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
);