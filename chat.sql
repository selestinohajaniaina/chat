-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 fév. 2023 à 13:06
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
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idMsg`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMsg`, `idUser`, `msg`) VALUES
(1, 1, 'bonjour'),
(2, 1, 'comment ca va?'),
(3, 1, 'this is your probleme :)'),
(4, 1, 'kkkkk'),
(5, 1, 'hello world'),
(14, 1, 'yes world'),
(15, 2, 'je suis nouveau'),
(47, 2, 'pourquoi ca'),
(46, 2, 'kkkkk'),
(45, 2, 'ici c\'est moi'),
(44, 2, '{{first name}}'),
(43, 2, 'ok ok'),
(42, 2, 'moi mon frere'),
(41, 1, '032 41 109 23'),
(40, 1, '032'),
(39, 1, 'my name too'),
(38, 2, 'tsy met ai'),
(37, 2, '123'),
(36, 2, 'kkkk'),
(35, 2, 'hello'),
(34, 2, 'comme tu veut'),
(33, 2, 'oui oui, nous somme tous');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `photo`) VALUES
(1, 'selestino', '123', NULL),
(2, 'alexandre', '123', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
