-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 nov. 2018 à 10:37
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
-- Base de données :  `frangin`
--
CREATE DATABASE IF NOT EXISTS `frangin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `frangin`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idUser` int(5) UNSIGNED ZEROFILL NOT NULL,
  `idEvent` int(5) UNSIGNED ZEROFILL NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `participe` tinyint(1) NOT NULL DEFAULT '0',
  `idBurger` int(3) DEFAULT NULL,
  `salade` tinyint(1) DEFAULT NULL,
  `tomate` tinyint(1) DEFAULT NULL,
  `oignon` tinyint(1) DEFAULT NULL,
  `idS1` int(3) DEFAULT NULL,
  `idS2` int(3) DEFAULT NULL,
  `aRetirer` int(3) DEFAULT NULL,
  PRIMARY KEY (`idUser`,`idEvent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idUser`, `idEvent`, `valide`, `participe`, `idBurger`, `salade`, `tomate`, `oignon`, `idS1`, `idS2`, `aRetirer`) VALUES
(00001, 00000, 0, 0, 13, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contenusandwich`
--

DROP TABLE IF EXISTS `contenusandwich`;
CREATE TABLE IF NOT EXISTS `contenusandwich` (
  `idS` int(3) NOT NULL,
  `idI` int(3) NOT NULL,
  `nombre` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idS`,`idI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenusandwich`
--

INSERT INTO `contenusandwich` (`idS`, `idI`, `nombre`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 3, 1),
(2, 2, 1),
(3, 4, 1),
(3, 2, 1),
(3, 5, 1),
(4, 1, 2),
(4, 2, 1),
(5, 1, 1),
(5, 6, 1),
(5, 2, 1),
(6, 4, 1),
(6, 6, 1),
(6, 2, 1),
(6, 5, 1),
(7, 3, 1),
(7, 6, 1),
(7, 2, 1),
(8, 1, 1),
(8, 7, 1),
(8, 8, 1),
(8, 2, 1),
(9, 3, 1),
(9, 7, 1),
(9, 8, 1),
(9, 2, 1),
(10, 9, 1),
(10, 1, 1),
(10, 10, 1),
(10, 11, 1),
(10, 2, 1),
(11, 12, 1),
(11, 8, 1),
(11, 2, 1),
(12, 9, 1),
(12, 1, 2),
(12, 7, 1),
(12, 8, 1),
(12, 2, 1),
(13, 9, 1),
(13, 3, 2),
(13, 7, 1),
(13, 6, 1),
(13, 2, 1),
(14, 9, 1),
(14, 1, 2),
(14, 11, 1),
(14, 10, 1),
(14, 2, 1),
(15, 9, 1),
(15, 1, 3),
(15, 8, 1),
(15, 2, 1),
(16, 9, 1),
(16, 1, 3),
(16, 8, 1),
(16, 7, 1),
(16, 6, 1),
(16, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `createur` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idevent` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prix` float NOT NULL DEFAULT '0.5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idingr` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `prix`) VALUES
(1, 'Steak', 0.5),
(2, 'Cheddar', 0.5),
(3, 'Poulet Pané', 0.5),
(4, 'Poisson Pané', 0.5),
(5, 'Sauce Tartare', 0.5),
(6, 'Galette de Pomme de Terre', 0.5),
(7, 'Bacon', 0.5),
(8, 'Oeuf', 0.5),
(9, 'Emmental sur le pain', 0.5),
(10, 'Mozzarella', 0.5),
(11, 'Chèvre', 0.5),
(12, 'Kefta', 0.5),
(0, 'Fromage', 0.5);

-- --------------------------------------------------------

--
-- Structure de la table `sandwich`
--

DROP TABLE IF EXISTS `sandwich`;
CREATE TABLE IF NOT EXISTS `sandwich` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sandwich`
--

INSERT INTO `sandwich` (`id`, `nom`, `prix`) VALUES
(1, 'Robin', 4),
(2, 'Flash', 4.5),
(3, 'Mystique', 4.5),
(4, 'Batman', 5),
(5, 'Captain America', 5.5),
(6, 'Storm', 5.5),
(7, 'Superman', 5.5),
(8, 'Iron Man', 5.5),
(9, 'Thor', 5.5),
(10, 'Spiderman', 5.5),
(11, 'Wolverine', 5.5),
(12, 'Deadpool', 7.5),
(13, 'Magneto', 7.5),
(14, 'Venom', 7.5),
(15, 'Hulk', 7.5),
(16, 'Fléo', 9);

-- --------------------------------------------------------

--
-- Structure de la table `sauce`
--

DROP TABLE IF EXISTS `sauce`;
CREATE TABLE IF NOT EXISTS `sauce` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idsauce` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sauce`
--

INSERT INTO `sauce` (`id`, `nom`) VALUES
(1, 'Algérienne'),
(2, 'Mayonnaise');

-- --------------------------------------------------------

--
-- Structure de la table `supplement`
--

DROP TABLE IF EXISTS `supplement`;
CREATE TABLE IF NOT EXISTS `supplement` (
  `idE` int(5) UNSIGNED ZEROFILL NOT NULL,
  `idU` int(5) UNSIGNED ZEROFILL NOT NULL,
  `idI` int(3) NOT NULL,
  PRIMARY KEY (`idE`,`idU`,`idI`),
  KEY `suppU` (`idU`),
  KEY `suppI` (`idI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `supplement`
--

INSERT INTO `supplement` (`idE`, `idU`, `idI`) VALUES
(00000, 00001, 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iduser` (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `mdp`, `mail`) VALUES
(00001, 'RIDEL', 'Marius', 'titioff', 'testlol', 'tamere136@gmail.com'),
(00002, 'PRADES', 'Mickaël', 'mikskill', 'cerise', 'mikalebg@gmail.frere');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
