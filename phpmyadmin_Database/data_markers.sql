-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 jan. 2020 à 04:59
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `data_markers`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `Role`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com', 'admin'),
(20, 'test2', '$2y$10$xVWCHabbkZdq34ZLpJ.vwul.4i5VLyT..Ae8nw6QPj/2J91RnXQ/C', 'test2@test2.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(23, 'CafÃ© des DÃ©lices', 'Impasse de la Corniche\nSite archÃ©ologique de Carthage\nTunisie', 36.870018, 10.351755, 'restaurant'),
(22, ' Cafe Glacier', 'Site archÃ©ologique de Carthage\nTunisie', 36.868134, 10.351175, 'Coffee'),
(18, 'Hotel Amilcar ', '110 Rue Salaheddine Bouchoucha\nSidi Bousaid 2026\nTunisie', 36.867832, 10.340206, 'hotel'),
(19, 'Cook&#39;s', 'Rue du Maroc\nSite archÃ©ologique de Carthage\nTunisie', 36.869404, 10.343419, 'Coffee'),
(20, 'Tam Tam', '7 Avenue 14 Janvier\nSite archÃ©ologique de Carthage\nTunisie', 36.870705, 10.343419, 'restaurant'),
(24, 'Coste', 'Avenue 14 Janvier\nSite archÃ©ologique de Carthage\nTunisie', 36.871830, 10.341414, 'Coffee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
