-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db629255639.db.1and1.com
-- Généré le :  Sam 11 Juin 2016 à 21:22
-- Version du serveur :  5.5.49-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db629255639`
--

-- --------------------------------------------------------

--
-- Structure de la table `coupDeCoeur`
--

CREATE TABLE IF NOT EXISTS `coupDeCoeur` (
  `idMusique` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `idArtiste` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `idUser` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `idUser` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `idFollower` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE IF NOT EXISTS `musique` (
  `idUser` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `idMusique` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `cheminMusique` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `rock` int(11) NOT NULL,
  `electro` int(11) NOT NULL,
  `reggae` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`idUser`, `idMusique`, `cheminMusique`, `rock`, `electro`, `reggae`) VALUES
('10153509624101555', '10153509624101555iezjfeoi', 'musique/10153509624101555/10153509624101555iezjfeoi.mp3', 0, 0, 0),
('10153509624101555', '10153509624101555Titre du rr', 'musique/10153509624101555/10153509624101555Titre du rr.mp3', 0, 0, 0),
('245354419157848', '245354419157848essaie2', 'musique/245354419157848/245354419157848essaie2.mp3', 0, 0, 0),
('245354419157848', '245354419157848musique', 'musique/245354419157848/245354419157848musique.mp3', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `userListe`
--

CREATE TABLE IF NOT EXISTS `userListe` (
  `idUser` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `userListe`
--

INSERT INTO `userListe` (`idUser`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
('245354419157848', 'Alexis', 'Benoliel', 'alexbenoliel@gmail.com', '2016-06-11 15:42:50'),
('10153509624101555', 'Robin', 'Chateau', 'robinchato@gmail.com', '2016-06-11 15:50:08'),
('245354419157848', 'Alexis', 'Benoliel', 'alexbenoliel@gmail.com', '2016-06-11 17:04:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
