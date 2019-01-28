-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 oct. 2018 à 10:11
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshopb3`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ecole` varchar(250) NOT NULL,
  PRIMARY KEY (`id_ecole`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id_ecole`, `nom_ecole`) VALUES
(1, 'EPSI'),
(2, 'Open Source School'),
(3, 'Sup De Com'),
(4, 'IDRAC'),
(5, '3A'),
(6, 'IFAG'),
(7, 'IGEFI'),
(8, 'IHE DREA'),
(9, 'ILERI'),
(10, 'IEFT');

-- --------------------------------------------------------

--
-- Structure de la table `etude`
--

DROP TABLE IF EXISTS `etude`;
CREATE TABLE IF NOT EXISTS `etude` (
  `id_etude` int(11) NOT NULL AUTO_INCREMENT,
  `niveau_etude` varchar(250) NOT NULL,
  PRIMARY KEY (`id_etude`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etude`
--

INSERT INTO `etude` (`id_etude`, `niveau_etude`) VALUES
(1, 'Première année'),
(2, 'Deuxième année'),
(3, 'Troisième année'),
(4, 'Quatrième année'),
(5, 'Cinquième année');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `CV` varchar(250) DEFAULT NULL,
  `id_ecole` int(11) NOT NULL,
  `id_etude` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_ecole` (`id_ecole`),
  KEY `id_etude` (`id_etude`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `passwd`, `CV`, `id_ecole`, `id_etude`) VALUES
(1, 'Deloeuvre', 'Louis', 'louis.deloeuvre@epsi.fr', 'louis', '1/deloeuvre louis cv epsi.pdf', 1, 1),
(2, 'Navia', 'Thomas', 'thomas.navia@epsi.fr', 'thomas', '2/deloeuvre_louis_cv.pdf', 1, 5),
(3, 'Degrangen', 'Alice', 'alice.degrangen@opensourceschool.fr', 'alice', '3/alice_degr.pdf', 2, 4),
(4, 'Thompson', 'Benjamin', 'benjamin.thompson@supdecom.fr', 'benjamin', '4/benjamin_thomp.pdf', 3, 1),
(5, 'Hloomcraft', 'John', 'john.hloomcraft@idrac.fr', 'john', '5/john_hloom.pdf', 4, 5),
(6, 'Do', 'Jonathan', 'jonathan.do@3a.fr', 'jonathan', '6/jonathan_do.pdf', 5, 2),
(7, 'Dupont', 'Lucas', 'lucas.dupont@ifag.fr', 'lucas', '7/lucas_dupont.pdf', 6, 1),
(8, 'Marchand-Avier', 'Marie', 'marie.marchand@igefi.fr', 'marie', '8/marie_march.pdf', 7, 1),
(9, 'Lindsey', 'Marie', 'marie.lindsey@ihedrea.fr', 'marie', '9/marie-land.pdf', 8, 3),
(10, 'Landangers', 'Pierre', 'pierre.landangers@ileri.fr', 'pierre', '10/pierre_land.pdf', 9, 3),
(11, 'David', 'Sabrina', 'sabrina.david@ieft.fr', 'sabrina', '11/sabrina_david.pdf', 10, 5),
(12, 'Bertrand', 'Sophie', 'sophie.bertrand@ifag.fr', 'sophie', '12/sophie_bert.pdf', 6, 4),
(13, 'Hloomberg', 'George', 'george.hloomberg@ieft.fr', 'george', '13/george_hloom.pdf', 10, 2),
(14, 'Firmeza', 'Jhun', 'jhun.firmeza@opensourceschool.fr', 'jhun', '14/jhun_fred.pdf', 2, 4),
(15, 'Robinson', 'Joe', 'joe.robinson@idrac.fr', 'joe', '15/joe_robinson.pdf', 4, 5),
(16, 'Doe', 'John', 'john.doe@supdecom.fr', 'john', '16/john_doe.pdf', 3, 2),
(17, 'Smith', 'John', 'john.smith@3a.fr', 'john', '17/joe_robinson.pdf', 5, 1),
(18, 'Avidson', 'Kendra', 'kendra.avidson@ifag.fr', 'kendra', '18/kendra_avi.pdf', 6, 2),
(19, 'Mir', 'Alamin', 'alamin.mir@ileri.fr', 'alamin', '19/md_alamin.pdf', 9, 2),
(20, 'Robertson', 'Megan', 'megan.robertson@ieft.fr', 'megan', '20/megan_roberto.pdf', 10, 4),
(21, 'Smith', 'Michael', 'michael.smith@3a.fr', 'michael', '21/michel_smith.pdf', 5, 3),
(22, 'Bautista', 'Robbie', 'robbie.bautista@ihedrea.fr', 'robbie', '22/robbie_rob.pdf', 8, 4),
(23, 'Jhonson', 'Sean', 'sean.jhonson@igefi.fr', 'sean', '23/seat_jhonson.pdf', 7, 3),
(24, 'Luthra', 'Sunny', 'sunny.luthra@ieft.fr', 'sunny', '24/sunny_luth.pdf', 10, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_ecole`) REFERENCES `ecole` (`id_ecole`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_etude`) REFERENCES `etude` (`id_etude`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
