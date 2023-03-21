--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `Nom` text NOT NULL,
  `Prénom` text NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Heures` time NOT NULL,
  `Courriel` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `type` (
  `Nombre_Place` varchar(50) NOT NULL,
  `Quantité_Service` varchar(50) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table ``
--
