-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 avr. 2022 à 14:08
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ligue`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `ville`) VALUES
(1, 'Canadiens', 'Montréal'),
(2, 'Rangers', 'New York'),
(3, 'Lightning', 'Tampa Bay'),
(4, 'Nordiques', 'Québec'),
(5, 'test', 'test'),
(6, 'Nordiques', 'Québec');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `idEquipe` int(11) DEFAULT NULL,
  `salaire` int(11) NOT NULL,
  `pays` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEquipe` (`idEquipe`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `idEquipe`, `salaire`, `pays`) VALUES
(1, 'Anderson', 'Josh', 1, 0, 'Canada'),
(2, 'Gallagher', 'Brendan', 1, 0, 'Canada'),
(3, 'Panarin', 'Artemi', 2, 0, 'Russie'),
(4, 'Hedman', 'Victor', 3, 0, 'Suède'),
(5, 'Stamkos', 'Steven', 3, 0, 'Canada'),
(6, 'Harvey', 'Guillaume', NULL, 0, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
