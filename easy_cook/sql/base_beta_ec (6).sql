-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Mars 2017 à 14:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `base_beta_ec`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(50) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `envoyeur` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `objet`, `contenu`, `envoyeur`) VALUES
(6, 'petite question', 'Bonjour,\r\nje voulais savoir quel Ã©tait le nom du dÃ©veloppeur web de ce site, il fait du bon travail :)', 'lean');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name_Utilisateur` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Recette_id_Utilisateur` (`name_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `type`, `photo`, `description`, `name_Utilisateur`) VALUES
(13, 'test recette 2', 'plat', 'tomatedessin.jpg', 'description test recette 2', 'Alex'),
(14, 'test recette bot', 'dessert', 'tomatedessin.jpg', 'test', 'bot'),
(31, 'pate', 'plat', 'regime-pate.jpg', 'pate carbo', 'Cuisto'),
(32, 'Pate carbo', 'entree', 'regime-pate.jpg', 'pate carbo', 'Cuisto'),
(80, 'ohfpizgf', 'entree', 'DSC02000.JPG', 'uhfzif', 'Cuisto'),
(81, 'test recette dessert', 'dessert', 'DSC02010.JPG', 'test photo', 'Cuisto'),
(82, 'bonne pate', 'plat', 'kaaris-double_fuck.jpg', 'hugqosgaoyd', 'Cuisto');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) DEFAULT NULL,
  `passe` varchar(255) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `passe`, `mail`, `photo`, `type`) VALUES
(28, 'Alex', '23d22c4e7fc62edfdea86a0e9a94c57a2c640e26', 'ale.normand@icloud.com', NULL, 'utilisateur'),
(29, 'Cuisto', '23d22c4e7fc62edfdea86a0e9a94c57a2c640e26', 'jesuiscuisinier@gmail.com', NULL, 'cuisinier'),
(30, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin email', NULL, 'utilisateur'),
(31, 'lean', '23d22c4e7fc62edfdea86a0e9a94c57a2c640e26', 'yunglean.mail.com', NULL, 'utilisateur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
