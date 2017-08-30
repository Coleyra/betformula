-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Août 2017 à 14:33
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecurie`
--

CREATE TABLE `ecurie` (
  `ECU_ID` int(128) NOT NULL,
  `FK_FOR_ID` int(128) NOT NULL,
  `ECU_LIBELLE` varchar(256) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

CREATE TABLE `formule` (
  `FOR_ID` int(128) NOT NULL,
  `FOR_LIBELLE` varchar(256) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `gp`
--

CREATE TABLE `gp` (
  `GP_ID` int(128) NOT NULL,
  `FK_SAI_ID` int(128) NOT NULL,
  `FK_FOR_ID` int(128) NOT NULL,
  `GP_LIBELLE` varchar(256) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `PIL_ID` int(128) NOT NULL,
  `PIL_NOM` varchar(256) CHARACTER SET latin1 NOT NULL,
  `PIL_PRENOM` varchar(256) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `pronostic`
--

CREATE TABLE `pronostic` (
  `PRN_ID` int(128) NOT NULL,
  `FK_USR_ID` int(128) NOT NULL,
  `FK_GP_ID` int(128) NOT NULL,
  `FK_PIL_ID` int(128) NOT NULL,
  `PRN_POSITION` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `RES_ID` int(128) NOT NULL,
  `FK_PIL_ID` int(128) NOT NULL,
  `FK_GP_ID` int(128) NOT NULL,
  `RES_POSITION` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `SAI_ID` int(128) NOT NULL,
  `SAI_CODE` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`SAI_ID`, `SAI_CODE`) VALUES
(1, 2017),
(2, 2018);

-- --------------------------------------------------------

--
-- Structure de la table `sai_ecu_pil`
--

CREATE TABLE `sai_ecu_pil` (
  `FK_SAI_ID` int(128) NOT NULL,
  `FK_ECU_ID` int(128) NOT NULL,
  `FK_PIL_ID` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `USR_ID` int(10) NOT NULL,
  `USR_PSEUDO` varchar(128) CHARACTER SET latin1 NOT NULL,
  `USR_PWD` varchar(128) CHARACTER SET latin1 NOT NULL,
  `USR_EMAIL` varchar(128) CHARACTER SET latin1 NOT NULL,
  `USR_NB_POINT` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ecurie`
--
ALTER TABLE `ecurie`
  ADD PRIMARY KEY (`ECU_ID`),
  ADD KEY `FK_FOR_ID` (`FK_FOR_ID`);

--
-- Index pour la table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`FOR_ID`);

--
-- Index pour la table `gp`
--
ALTER TABLE `gp`
  ADD PRIMARY KEY (`GP_ID`),
  ADD KEY `fk_saison_gp` (`FK_SAI_ID`) USING BTREE,
  ADD KEY `fk_for_gp` (`FK_FOR_ID`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`PIL_ID`);

--
-- Index pour la table `pronostic`
--
ALTER TABLE `pronostic`
  ADD PRIMARY KEY (`PRN_ID`),
  ADD KEY `FK_USR_ID` (`FK_USR_ID`),
  ADD KEY `FK_GP_ID` (`FK_GP_ID`),
  ADD KEY `FK_PIL_ID` (`FK_PIL_ID`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`RES_ID`),
  ADD KEY `FK_PIL_ID` (`FK_PIL_ID`),
  ADD KEY `FK_GP_ID` (`FK_GP_ID`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`SAI_ID`);

--
-- Index pour la table `sai_ecu_pil`
--
ALTER TABLE `sai_ecu_pil`
  ADD KEY `FK_SAI_ID` (`FK_SAI_ID`),
  ADD KEY `FK_ECU_ID` (`FK_ECU_ID`),
  ADD KEY `FK_PIL_ID` (`FK_PIL_ID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USR_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ecurie`
--
ALTER TABLE `ecurie`
  MODIFY `ECU_ID` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formule`
--
ALTER TABLE `formule`
  MODIFY `FOR_ID` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gp`
--
ALTER TABLE `gp`
  MODIFY `GP_ID` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `PIL_ID` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pronostic`
--
ALTER TABLE `pronostic`
  MODIFY `PRN_ID` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `RES_ID` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `SAI_ID` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ecurie`
--
ALTER TABLE `ecurie`
  ADD CONSTRAINT `fk_for_ecu` FOREIGN KEY (`FK_FOR_ID`) REFERENCES `formule` (`FOR_ID`);

--
-- Contraintes pour la table `gp`
--
ALTER TABLE `gp`
  ADD CONSTRAINT `fk_for_gp` FOREIGN KEY (`FK_FOR_ID`) REFERENCES `formule` (`FOR_ID`),
  ADD CONSTRAINT `fk_sai_gp` FOREIGN KEY (`FK_SAI_ID`) REFERENCES `saison` (`SAI_ID`);

--
-- Contraintes pour la table `pronostic`
--
ALTER TABLE `pronostic`
  ADD CONSTRAINT `fk_gp_prn` FOREIGN KEY (`FK_GP_ID`) REFERENCES `gp` (`GP_ID`),
  ADD CONSTRAINT `fk_pil_prn` FOREIGN KEY (`FK_PIL_ID`) REFERENCES `pilote` (`PIL_ID`),
  ADD CONSTRAINT `fk_usr_prn` FOREIGN KEY (`FK_USR_ID`) REFERENCES `user` (`USR_ID`);

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `fk_gp_res` FOREIGN KEY (`FK_GP_ID`) REFERENCES `gp` (`GP_ID`),
  ADD CONSTRAINT `fk_pil_res` FOREIGN KEY (`FK_PIL_ID`) REFERENCES `pilote` (`PIL_ID`);

--
-- Contraintes pour la table `sai_ecu_pil`
--
ALTER TABLE `sai_ecu_pil`
  ADD CONSTRAINT `fk_ecu_rel` FOREIGN KEY (`FK_ECU_ID`) REFERENCES `ecurie` (`ECU_ID`),
  ADD CONSTRAINT `fk_pil_rel` FOREIGN KEY (`FK_PIL_ID`) REFERENCES `pilote` (`PIL_ID`),
  ADD CONSTRAINT `fk_sai_rel` FOREIGN KEY (`FK_SAI_ID`) REFERENCES `saison` (`SAI_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
