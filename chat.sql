-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 fév. 2023 à 14:24
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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pdc`
--

DROP TABLE IF EXISTS `pdc`;
CREATE TABLE IF NOT EXISTS `pdc` (
  `id_pdc` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` varchar(10000) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_pdc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pdc`
--

INSERT INTO `pdc` (`id_pdc`, `idUser`, `photo`) VALUES
(1, '16', '16.jfif');

-- --------------------------------------------------------

--
-- Structure de la table `pdp`
--

DROP TABLE IF EXISTS `pdp`;
CREATE TABLE IF NOT EXISTS `pdp` (
  `id_pdp` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` varchar(10000) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_pdp`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pdp`
--

INSERT INTO `pdp` (`id_pdp`, `idUser`, `photo`) VALUES
(2, '16', '16.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `idOwner` varchar(10000) NOT NULL,
  `legend` varchar(1000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `idOwner`, `legend`, `photo`) VALUES
(14, '16', 'c\'est ionic version 2', 'ehd4W.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `username`, `password`) VALUES
(15, 'chauffemarcelhot@gmail.com', 'alexandre', '12345678'),
(16, 'selestinoolivier@gmail.com', 'selestino', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
