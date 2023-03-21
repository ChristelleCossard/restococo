--
-- Structure de la table `reservations`
--


DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  'client_id' INT NOT NULL,
  `name_client` text NOT NULL,
  `guests` int NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `allergies` varchar(255) NOT NULL
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);
COMMIT;
