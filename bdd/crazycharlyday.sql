-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 13 fév. 2020 à 20:43
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `crazycharlyday`
--

-- --------------------------------------------------------

--
-- Structure de la table `besoin`
--

CREATE TABLE `besoin` (
  `id` int(3) NOT NULL,
  `idcreneau` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `idCreneau` int(3) NOT NULL,
  `debut` date NOT NULL,
  `jour` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `estasigne`
--

CREATE TABLE `estasigne` (
  `idUser` int(3) NOT NULL,
  `idCreneau` int(3) NOT NULL,
  `idBesoin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRol` int(11) NOT NULL,
  `label` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRol`, `label`) VALUES
(1, 'Caissier titulaire'),
(2, 'Caissier assistant'),
(3, 'Gestionnaire de vrac titulaire'),
(4, 'Gestionnaire de vrac assistant'),
(5, 'Chargé d\'accueil titulaire'),
(6, 'Chargé d\'accueil assistant');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `mail`, `pwd`, `grade`) VALUES
(1, 'Cassandre', '', '1@1.fr', '$2y$10$fZaTwP9cfm702iLPyAS37uBZuW/YZg445MDtblfbHq1sjFwNBdkoO', ''),
(2, 'Achille', '', '', '', ''),
(3, 'Calypso', '', '', '', ''),
(4, 'Bacchus', '', '', '', ''),
(5, 'Diane', '', '', '', ''),
(6, 'Clark', '', '', '', ''),
(7, 'Helene', '', '', '', ''),
(8, 'Jason', '', '', '', ''),
(9, 'Bruce', '', '', '', ''),
(10, 'Pénélope', '', '', '', ''),
(11, 'Ariane', '', '', '', ''),
(12, 'Lois', '', '', '', ''),
(16, 'Louppe', 'Paul', 'paullouppe@gmail.com', '$2y$10$A9c6V1HElwmuZhwKismff.S.G.hUAGucxsL/T0LzReiMUIZOCPE3C', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `besoin`
--
ALTER TABLE `besoin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creneaudansbesoin` (`idcreneau`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`idCreneau`);

--
-- Index pour la table `estasigne`
--
ALTER TABLE `estasigne`
  ADD PRIMARY KEY (`idUser`,`idCreneau`,`idBesoin`),
  ADD KEY `fk1` (`idBesoin`),
  ADD KEY `fk2` (`idCreneau`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRol`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `besoin`
--
ALTER TABLE `besoin`
  ADD CONSTRAINT `creneaudansbesoin` FOREIGN KEY (`idcreneau`) REFERENCES `creneau` (`idCreneau`);

--
-- Contraintes pour la table `estasigne`
--
ALTER TABLE `estasigne`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idBesoin`) REFERENCES `besoin` (`id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idCreneau`) REFERENCES `creneau` (`idCreneau`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
