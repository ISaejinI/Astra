-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 avr. 2024 à 11:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `astra`
--

-- --------------------------------------------------------

--
-- Structure de la table `environnements`
--

DROP TABLE IF EXISTS `environnements`;
CREATE TABLE IF NOT EXISTS `environnements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `environnements`
--

INSERT INTO `environnements` (`id`, `name`) VALUES
(1, 'Dunes'),
(2, 'Montagnes'),
(3, 'Déserts'),
(4, 'Plaines'),
(5, 'Océans'),
(6, 'Forêts'),
(7, 'Volcans'),
(8, 'Lacs de lave'),
(9, 'Lacs'),
(10, 'Rivières');

-- --------------------------------------------------------

--
-- Structure de la table `galaxies`
--

DROP TABLE IF EXISTS `galaxies`;
CREATE TABLE IF NOT EXISTS `galaxies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `galaxies`
--

INSERT INTO `galaxies` (`id`, `name`) VALUES
(2, 'Andromède'),
(4, 'Bordure extérieure'),
(1, 'Système solaire'),
(3, 'Voie lactée');

-- --------------------------------------------------------

--
-- Structure de la table `planet-environnement`
--

DROP TABLE IF EXISTS `planet-environnement`;
CREATE TABLE IF NOT EXISTS `planet-environnement` (
  `idPlanet` int NOT NULL,
  `idEnvironnement` int NOT NULL,
  KEY `idEnvironnement` (`idEnvironnement`),
  KEY `idPlanet` (`idPlanet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `planet-environnement`
--

INSERT INTO `planet-environnement` (`idPlanet`, `idEnvironnement`) VALUES
(1, 1),
(1, 3),
(2, 3),
(2, 6),
(2, 2),
(2, 5),
(2, 4),
(3, 7),
(3, 8),
(10, 4),
(10, 5),
(10, 6),
(10, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `planet-population`
--

DROP TABLE IF EXISTS `planet-population`;
CREATE TABLE IF NOT EXISTS `planet-population` (
  `idPlanet` int NOT NULL,
  `idPopulation` int NOT NULL,
  KEY `idPopulation` (`idPopulation`),
  KEY `idPlanet` (`idPlanet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `planet-population`
--

INSERT INTO `planet-population` (`idPlanet`, `idPopulation`) VALUES
(1, 2),
(1, 4),
(2, 2),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `planets`
--

DROP TABLE IF EXISTS `planets`;
CREATE TABLE IF NOT EXISTS `planets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idUser` int DEFAULT NULL,
  `taille` bigint NOT NULL,
  `idGalaxie` int DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `nbHab` bigint NOT NULL DEFAULT '0',
  `urlImg` varchar(255) NOT NULL,
  `habitable` tinyint(1) NOT NULL,
  `climat` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idGalaxie` (`idGalaxie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `planets`
--

INSERT INTO `planets` (`id`, `name`, `idUser`, `taille`, `idGalaxie`, `description`, `nbHab`, `urlImg`, `habitable`, `climat`) VALUES
(1, 'Arrakis', 1, 12256, 2, 'Également appelée Dune, c\'est une planète-désert entièrement couverte de sable et de roches, parcourue par les immenses vers des sables. Malgré cela, elle joue un rôle crucial dans l\'économie galactique, puisqu\'elle constitue l\'unique source d\'Épice. Quelques villes ont été fondées à sa surface, dont la capitale Arrakeen, mais la majeure partie de sa population est constituée des Fremen, nomades qui parcourent le désert.', 15000000, 'Planet7.png', 1, 'Toujours très chaud'),
(2, 'Terre', 2, 12742, 3, 'La Terre est la troisième planète par ordre d\'éloignement au Soleil et la cinquième plus grande du Système solaire aussi bien par la masse que par le diamètre. Par ailleurs, elle est le seul objet céleste connu pour abriter la vie. Elle orbite autour du Soleil en 365,256 jours solaires — une année sidérale — et réalise une rotation sur elle-même relativement au Soleil en un jour sidéral (environ 23 h 56 min 4 s), soit un peu moins que son jour solaire de 24 h du fait de ce déplacement autour du Soleila. L\'axe de rotation de la Terre possède une inclinaison de 23°, ce qui cause l\'apparition des saisons.', 7951000000000, 'Planet2.png', 1, 'Froid, tempéré, continental, tropical, désertique'),
(3, 'Mustafar', 3, 4200, 4, 'Mustafar est une planète de lave. Située dans la Bordure extérieure, cette petite planète orbite autour de l\'étoile Priate. Elle est notamment célèbre pour être le lieu du premier affrontement entre Anakin Skywalker, devenu Sith sous le nom de Dark Vador, et son ancien maître Jedi Obi-Wan Kenobi. Malgré son hostilité naturelle, elle est habitée par les Mustafariens et très prisée pour ses ressources minières par la Confédération des systèmes indépendants durant la guerre des clones, puis par l\'Empire galactique. L\'influence du côté obscur de la Force étant forte sur cette planète, Dark Vador y fait construire son château durant la période de domination de l\'Empire.', 20000, 'Planet3.png', 1, 'Extrême chaleur'),
(10, 'Oterland', 3, 4857, 3, 'Sur la planète Oterland, les loutres prospèrent dans un écosystème luxuriant où les vastes forêts abritent une multitude de créatures colorées, les rivières calmes offrent des voies navigables sereines, et les côtes sablonneuses invitent à la détente sous un soleil éclatant. Chaque jour est une célébration de la beauté et de la diversité de la nature, avec des habitants qui vivent en harmonie avec leur environnement, préservant avec soin cet équilibre délicat qui fait de Oterland un véritable paradis où règne la paix et où il fait toujours beau.\r\n', 0, '20240430091619.png', 0, 'Il y fait toujours beau');

-- --------------------------------------------------------

--
-- Structure de la table `populations`
--

DROP TABLE IF EXISTS `populations`;
CREATE TABLE IF NOT EXISTS `populations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `populations`
--

INSERT INTO `populations` (`id`, `name`) VALUES
(1, 'Ewok'),
(2, 'Humains'),
(3, 'Hobbit'),
(4, 'Fremens'),
(5, 'Mustafariens'),
(6, 'Skakoans'),
(7, 'Loutres');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user1', 'user1@mail.com', '123456789'),
(2, 'user2', 'user2@mail.com', '123456'),
(3, 'user3', 'user3@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, 'user4', 'user4@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `planet-environnement`
--
ALTER TABLE `planet-environnement`
  ADD CONSTRAINT `planet-environnement_ibfk_1` FOREIGN KEY (`idEnvironnement`) REFERENCES `environnements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planet-environnement_ibfk_2` FOREIGN KEY (`idPlanet`) REFERENCES `planets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `planet-population`
--
ALTER TABLE `planet-population`
  ADD CONSTRAINT `planet-population_ibfk_1` FOREIGN KEY (`idPopulation`) REFERENCES `populations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planet-population_ibfk_2` FOREIGN KEY (`idPlanet`) REFERENCES `planets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `planets`
--
ALTER TABLE `planets`
  ADD CONSTRAINT `planets_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `planets_ibfk_2` FOREIGN KEY (`idGalaxie`) REFERENCES `galaxies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
