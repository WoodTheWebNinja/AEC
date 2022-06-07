-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 mai 2022 à 22:38
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idAuteur` varchar(30) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `texte` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAuteur` (`idAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `idAuteur`, `titre`, `texte`) VALUES
(1, 'woodex', 'Looking Ahead To P.K. Subban’s Impending Free Agency', 'Despite relatively low fanfare, one of hockey’s biggest names is set to be become an unrestricted free agent this summer. New Jersey Devils defenseman P.K. Subban will become a UFA for the first time in his career, having just finished the final year of an eight-year, $72MM contract that carried a $9MM AAV. \r\n\r\n\r\nSubban signed that contract with the Montreal Canadiens prior to the start of the 2014-15 season, but would only play two of the eight years with Montreal before being dealt to the Nashville Predators. \r\n\r\n\r\nThe star defenseman would spend three seasons in Nashville, making a trip to the Stanley Cup Finals in 2017, but was again traded to New Jersey in 2019. ff'),
(2, 'woodex', 'Can Jayson Tatum Get on Jimmy Butler’s Level?\r\n', 'Boston’s star was brilliant in the first half of Game 1. Miami’s dominated the entire game. It might not be fair to ask the Celtics’ best player to do more, but it also might be their only shot.\r\n\r\nJayson Tatum moved like a man at ease in the first half of Game 1 of the 2022 Eastern Conference finals. After spending seven games staring down Giannis Antetokounmpo and Brook Lopez at the basket, the Celtics All-Star seemed to relish the opportunity to attack a Heat defense that, while excellent, doesn’t boast nearly as much size along the back line.'),
(3, 'woodex', 'Surprising Offseason Trades for 2022 NBA Lottery Teams', 'For anyone who\'s already missing the uncertainty and intrigue of a few weeks ago, when we lived in the pre-lottery NBA world, don\'t worry. The clarity of an established draft order can still give way to chaos.\r\n\r\nChet Holmgren, Jabari Smith Jr. and Paolo Banchero will likely go in the top three, but in what order? And what shenanigans might ensue afterward?\r\n\r\nKnowing who\'s picking where gives us a better idea of which teams might want to move up and which would rather trade down. Plus, it helps set up a landscape for related moves that might now be on the table. Thanks to last Tuesday\'s lottery, our guesswork just got a little more informed.'),
(4, 'Gandy', 'P.K. Subban joins ESPN as analyst for Stanley Cup Playoffs', 'P.K. Subban will be an NHL analyst for ESPN for the remainder of the Stanley Cup Playoffs. \r\n\r\nThe New Jersey Devils defenseman, who scored 22 points (five goals, 17 assists) in 77 games, can become an unrestricted free agent at the end of the season. The Devils said in March that Subban would not be offered a contract.\r\n\r\nThe 32-year-old began his coverage Monday when he joined \"The Point\" on ESPN2 and ESPN+. Subban also contributed during the 2021 Stanley Cup Playoffs on ESPN.');

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

DROP TABLE IF EXISTS `usagers`;
CREATE TABLE IF NOT EXISTS `usagers` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usagers`
--

INSERT INTO `usagers` (`username`, `password`, `prenom`, `nom`) VALUES
('batman', '$2y$10$CXG/ROuAIwGMOjblm6dGVuFIUCiNlRLPzV/HaT22Te2.NeO2yCaxm', 'Bruce', 'Wayne'),
('Gandy', '$2y$10$y87.Olgvm1g05tl9kLymBuGnypNmN4x7khr9olumBd9onkZxXOWbO', 'Gandy', 'Gédéon'),
('woodex', '$2y$10$pAk3vP2tESv/Ro5/KN4F0ucdQNtQpX6EhHO2tIcVMYCZVbFnYLOZO', 'Wood', 'Boursiquot');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idAuteur`) REFERENCES `usagers` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
