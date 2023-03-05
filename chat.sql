-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mars 2023 à 15:31
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
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_coms` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` varchar(255) NOT NULL,
  `idUser` varchar(255) DEFAULT NULL,
  `texte` varchar(1000) DEFAULT NULL,
  `date_coms` datetime DEFAULT NULL,
  PRIMARY KEY (`id_coms`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_coms`, `id_post`, `idUser`, `texte`, `date_coms`) VALUES
(4, '19', '15', 'Bon logo pour ift', '2023-03-05 09:54:56'),
(3, '19', '16', 'bonjour ift mahajanga', '2023-03-05 09:51:09'),
(5, '19', '15', 'oui oui', '2023-03-05 09:57:15'),
(6, '35', '15', 'good', '2023-03-05 13:34:32'),
(7, '33', '15', 'Merveilleux ðŸ¤©ðŸ¤©ðŸ¤©', '2023-03-05 17:23:51');

-- --------------------------------------------------------

--
-- Structure de la table `likepost`
--

DROP TABLE IF EXISTS `likepost`;
CREATE TABLE IF NOT EXISTS `likepost` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` varchar(255) NOT NULL,
  `idUser` varchar(255) NOT NULL,
  PRIMARY KEY (`idLike`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likepost`
--

INSERT INTO `likepost` (`idLike`, `id_post`, `idUser`) VALUES
(41, '19', '15'),
(38, '19', '16'),
(40, '16', '16'),
(36, '22', '16'),
(33, '20', '16'),
(39, '14', '16'),
(44, '35', '15'),
(45, '33', '15');

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
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `idOwner`, `legend`, `photo`, `date`) VALUES
(14, '16', 'c\'est ionic version 2', 'ehd4W.jpg', '2023-02-25 11:45:20'),
(20, '16', 'image depuis le www.orange.mg', 'PJZtq.jpg', '2023-02-25 11:45:20'),
(16, '15', NULL, 'enH61.PNG', '2023-02-25 05:50:35'),
(17, '15', 'Ma premiÃ¨re publication ðŸ¥°', 'BmPzt.jpg', '2023-02-25 09:29:48'),
(19, '15', 'Institue de l\'IFT Mahajanga', 'W7TtQ.jpg', '2023-02-25 11:38:59'),
(22, '16', 'An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.', '', '2023-03-01 22:36:04'),
(33, '16', 'Hackathon 1er edition mahajanga', 'N203w.jpg', '2023-03-05 11:40:47'),
(35, '16', 'petit plage', 'tiOom.jpg', '2023-03-05 11:43:26');

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
(15, 'seha.karoka@gmail.com', 'alexandre', '12345678'),
(16, 'selestinoolivier@gmail.com', 'selestino', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
