-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Juin 2018 à 08:24
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshop2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'PHP'),
(4, 'Java'),
(5, 'C#'),
(6, 'HTML/CSS'),
(7, 'JavaScript'),
(8, 'C++'),
(9, 'SQL et base de données');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `champ` varchar(2000) NOT NULL,
  `date_commentaire` varchar(255) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `champ`, `date_commentaire`, `id_topic`, `id_utilisateur`) VALUES
(1, 'Il faut utiliser la valeur de ta variable, avec l\'include du projet à travers la fonction "TestInclude". ', '2018-06-27 00:00:00', 1, 2),
(2, 'je trouve ce topic super ! :) ', '2018-06-27 08:54:00', 1, 2),
(6, 'c\'est cool hahahaa', '2018-06-27 10:22', 1, 2),
(7, 'c\'est cool hahahaa', '2018-06-27 10:22', 1, 2),
(8, 'c\'est cool hahahaa', '2018-06-27 10:22', 1, 2),
(9, 'c\'est cool hahahaa', '2018-06-27 10:22', 1, 2),
(10, 'commentaire', '2018-06-27 13:02', 21, 2),
(11, 'commentaire', '2018-06-27 13:02', 21, 2);

-- --------------------------------------------------------

--
-- Structure de la table `poucebleu`
--

CREATE TABLE `poucebleu` (
  `id_pouce` int(11) NOT NULL,
  `id_utilisateur_emeteur` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `id_utilisateur_recepteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `poucebleu`
--

INSERT INTO `poucebleu` (`id_pouce`, `id_utilisateur_emeteur`, `id_commentaire`, `id_utilisateur_recepteur`) VALUES
(1, 12, 1, 2),
(2, 12, 6, 2),
(4, 12, 7, 2),
(5, 2, 1, 2),
(6, 1, 1, 2),
(7, 1, 8, 2),
(8, 1, 9, 2),
(9, 12, 2, 2),
(10, 3, 2, 2),
(15, 3, 8, 2),
(16, 3, 6, 2),
(17, 3, 1, 2),
(18, 3, 7, 2),
(19, 3, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `titre_topic` varchar(250) NOT NULL,
  `champ_topic` varchar(2000) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_topic` varchar(250) NOT NULL,
  `résolu` tinyint(1) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `titre_topic`, `champ_topic`, `id_utilisateur`, `date_topic`, `résolu`, `id_categorie`) VALUES
(1, 'Problème PHP include', 'Blablabla', 1, '2018-06-25 19:42 ', NULL, 3),
(2, 'Impossible de formater ma micro SD', 'Bonjour,\r\n\r\nJ\'ai un problème fréquent mais en même temps qui semble faire preuve d\'inventivité à chaque fois.\r\nJe possède une carte micro SD Samsung 16GB que j\'utilise pour mon téléphone et en voulant ajouter de nouvelle musique j\'ai eu la surprise de les trouver illisibles sur mon téléphone (mais elles apparaissent bien).\r\nEn regardant ce qui se passe mon téléphone m\'annonce que "Cette carte ne peut pas accepter de nouvelles données et n\'est peut-être pas conforme. Utilisez une autre carte."\r\n\r\nJe ne peux donc faire aucune modification sur la carte mais j\'ai toujours accès à toutes ces données (musiques, photos, etc....)\r\nJe me dis qu\'un petit reformatage devrait régler le problème et là, reformatage impossible.\r\nJ\'ai donc tenté les procédure suivantes:\r\n- check virus (négatif)\r\n- commande: cmd-->convert F: /fs:ntfs (F=nom de la SD)--> OK(ça ne marche pas non plus)\r\n- commande: Démarrer --> Exécuter --> Tape: CHKDSK Z: /F (Z= clé USB) (toujours pas)\r\n- un formatage avec "HP USB Disk Storage Format Tool"\r\n- de la formater via l\'interface d\'un autre téléphone \r\n\r\nRien de tout cela ne marche, j\'ai également essayé ces manipulations en mode sans échec, ce fut un échec .\r\nJe suis un peu à court d\'idées, si quelqu\'un en a d\'autres à me proposer je serai ravis de les écouter.\r\n\r\nMerci', 9, '2018-06-25 19:43 ', NULL, 2),
(3, 'Combobox C#', 'Ah ouais ouais ouais', 1, '2018-06-25 19:50 ', NULL, 5),
(13, 'Test Cc++', 'Test zer', 2, '2018-06-26 19:29 ', NULL, 8),
(20, 'Test type hidden', 'skurt', 2, '2018-06-26 20:27 ', NULL, 9),
(21, 'Test type hidden v2', 'bjr', 2, '2018-06-26 20:29 ', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `tel` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `lieu` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `points` int(11) DEFAULT '0',
  `niveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `passwd`, `poste`, `tel`, `mail`, `lieu`, `experience`, `points`, `niveau`) VALUES
(1, 'Villechalane', 'Louis', 'jux7g', 'ggg', '0652987459', 'louis.villechalane@ws.com', 'La Défense', 'gg', 0, 0),
(2, 'Andre', 'David', 'oppg5', 'ggg', '0710986974', 'david.andre@ws.com', 'Herblay', 'gg', 1, 2),
(3, 'Bedos', 'Christian', 'gmhxd', 'jhg', '0698794114', 'christian.bedos@ws.com', 'Eragny', 'jhg', 0, 0),
(4, 'Tusseau', 'Louis', 'ktp3s', 'jhg', '0648357999', 'louis.tusseau@ws.com', 'La Défense', 'jhg', 0, 0),
(5, 'Bentot', 'Pascal', 'doyw1', 'aaa', '0710069878', 'pascal.bentot@ws.com', 'Nanterre', 'aaa', 0, 0),
(6, 'Bioret', 'Luc', 'hrjfs', 'mmm', '0699765482', 'luc.bioret@ws.com', 'Courbevoie', 'mmm', 0, 0),
(7, 'Bunisset', 'Denise', 's1y1r', 'ppp', '0679461328', 'denise.bunisset@ws.com', 'Courbevoie', 'ppp', 0, 0),
(8, 'Finck', 'Jacques', 'mpb3t', 'qsqsqsqs', '0632894178', 'jacques.finck@ws.com', 'Eragny', 'qsqsq', 0, 0),
(9, 'Debroise', 'Michelle', 'sghkb', 'lkjhgfd', '0610397819', 'michelle.debroise@ws.com', 'Nanterre', 'plkjhg', 0, 0),
(10, 'Cadic', 'Eric', '6u8dc', 'kjhygfd', '0697481526', 'eric.cadic@ws.com', 'Herblay', 'azertyuiop', 0, 0),
(12, 'admin', 'admin', 'admin', 'admin', '0658749820', 'admin@ws.com', 'admin', 'admin', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `poucebleu`
--
ALTER TABLE `poucebleu`
  ADD PRIMARY KEY (`id_pouce`),
  ADD KEY `id_utilisateur_receveur` (`id_utilisateur_emeteur`),
  ADD KEY `id_commentaire` (`id_commentaire`),
  ADD KEY `id_utilisateur_recepteur` (`id_utilisateur_recepteur`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `poucebleu`
--
ALTER TABLE `poucebleu`
  MODIFY `id_pouce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `poucebleu`
--
ALTER TABLE `poucebleu`
  ADD CONSTRAINT `poucebleu_ibfk_1` FOREIGN KEY (`id_utilisateur_emeteur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `poucebleu_ibfk_2` FOREIGN KEY (`id_utilisateur_recepteur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `poucebleu_ibfk_3` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
