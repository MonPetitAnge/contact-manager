-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 15 nov. 2018 à 02:27
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `contact_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D4E6F81E7A1254A` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `contact_id`, `street`, `city`, `zip`, `country`) VALUES
(1, 11, '57, rue Voisin', 'Ledouxboeuf', '03 447', 'Tanzania'),
(2, 11, '13, chemin Chauvet', 'LemaireVille', '12564', 'Svalbard et Jan Mayen (Îles)'),
(3, 12, '660, avenue Martine Maillot', 'Simon', '11 377', 'Turkménistan'),
(4, 12, '55, impasse Paulette Regnier', 'Gay', '19086', 'Dominique'),
(5, 13, 'boulevard Virginie Marty', 'Fischer', '10 698', 'Pologne'),
(6, 13, '76, boulevard de Olivier', 'LegerVille', '88 592', 'Rép. Dém. du Congo'),
(7, 14, '892, rue Chauvin', 'Legrand', '24 160', 'Micronésie (États fédérés de)'),
(8, 14, '61, impasse Claude Blanchard', 'Thibault', '74516', 'Hongrie'),
(9, 15, 'rue Jérôme Martel', 'Moulin', '29 887', 'Australie'),
(10, 16, '412, chemin Laurent', 'Dumas-sur-Lebreton', '51 610', 'Belgique'),
(11, 17, '48, impasse Leleu', 'Coulonboeuf', '45263', 'Myanmar'),
(12, 17, '3, impasse Buisson', 'Brunel', '82 241', 'Iran'),
(13, 18, '27, rue Emmanuel Francois', 'Lamy-sur-Samson', '21553', 'Liechtenstein'),
(14, 18, 'avenue Pires', 'Cordier-sur-Pages', '78749', 'Martinique'),
(15, 19, '23, impasse Martin Dias', 'Hamel', '20 425', 'Nigeria'),
(16, 20, '63, place de Faivre', 'Parisboeuf', '39899', 'Territoires français du sud'),
(17, 20, '48, avenue de Guilbert', 'Leclercq', '90789', 'Soudan'),
(18, 21, '876, avenue Dumas', 'Schmitt-sur-Rodrigues', '36293', 'Cap Vert'),
(19, 21, 'rue Lamy', 'GrosVille', '04056', 'Swaziland'),
(20, 22, '61, impasse Guy Lemonnier', 'Langlois-sur-Nicolas', '11900', 'Guyane'),
(21, 22, '68, place Laurent Vasseur', 'Faure-sur-Breton', '91978', 'Guatemala'),
(22, 23, '152, impasse Leconte', 'Gilbert', '97 668', 'Ukraine'),
(23, 23, '5, boulevard Stéphanie Carpentier', 'Peltier', '96124', 'Sri Lanka'),
(24, 24, '8, rue Sébastien Rodrigues', 'Hamel', '82 593', 'Réunion (La)'),
(25, 25, '2, rue de Evrard', 'Collin-les-Bains', '36 258', 'Norfolk (Îles)'),
(26, 25, '33, impasse Humbert', 'Grondin', '44 076', 'Malaisie'),
(27, NULL, '15 Rue maréchal wallace', 'Puteaux', '92800', 'France'),
(28, NULL, '15 Rue maréchal wallace', 'Puteaux', '92800', 'France'),
(29, 11, '15 Rue maréchal wallace', 'Puteaux', '92800', 'France'),
(30, 26, 'Rue lucien voilin', 'Puteaux', '92800', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `created_at`, `user_id`) VALUES
(11, 'Brigitte', 'Dumont', 'ebecker@neveu.fr', '2018-05-24 10:16:35', 1),
(12, 'Jeanne', 'Legendre', 'eferrand@laposte.net', '2018-11-03 04:19:38', 1),
(13, 'Valérie', 'Toussaint', 'francoise.lebrun@germain.fr', '2018-09-25 21:29:55', 1),
(14, 'Anne', 'Meunier', 'amarques@wanadoo.fr', '2018-10-03 23:14:56', 1),
(15, 'Nathalie', 'Pasquier', 'agathe67@meunier.org', '2018-09-14 13:55:17', 1),
(16, 'Diane', 'Roy', 'ivaillant@noos.fr', '2018-07-27 00:27:05', 1),
(17, 'Philippe', 'Guilbert', 'gschmitt@barre.fr', '2018-08-13 14:29:14', 2),
(18, 'Benjamin', 'Martin', 'amahe@meunier.org', '2018-06-11 07:59:57', 2),
(19, 'Agathe', 'Merle', 'simone03@jacques.com', '2018-10-28 02:21:05', 2),
(20, 'Éric', 'Leduc', 'eric@leduc.fr', '2018-06-04 16:45:43', 2),
(21, 'Yves', 'Ribeiro', 'leconte.edouard@petit.fr', '2018-06-10 18:46:16', 2),
(22, 'Nathalie', 'Besson', 'moulin.suzanne@lelievre.net', '2018-06-07 15:54:05', 3),
(23, 'Josette', 'Salmon', 'valentine.mahe@noos.fr', '2018-06-27 07:33:58', 3),
(24, 'Gabriel', 'Lopez', 'lnoel@legros.fr', '2018-06-12 05:28:26', 3),
(25, 'Jacqueline', 'Fleury', 'henriette68@wanadoo.fr', '2018-07-14 12:58:26', 8),
(26, 'Walid', 'Mahmoud', 'mwalid.mahmoud@gmail.com', '2018-11-15 01:23:35', 8);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181113223133'),
('20181114194923'),
('20181114200400');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'helene.pelletier', 'Ds~h-Bc7:0|aO'),
(2, 'diallo.raymond', '_n_\\{drm0c~]\'t('),
(3, 'margot27', 'PW.A,q>PtM<'),
(7, 'Nomai', '$2y$13$kg8C5/uT.KHs3LrSlinaqe7L3wnekonUuCFP6uqXqC0sGrEPwFYrO'),
(8, 'Leilou', '$2y$13$GKS84qAhzkSXBXhIq828U.W.m3JWkPVc.7lZGWhLxMWYuQ/xSBxhS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
