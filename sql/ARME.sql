-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 17:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_osp`
--

-- --------------------------------------------------------

--
-- Structure de la table `associer`
--

CREATE TABLE `associer` (
  `IDP` int(10) NOT NULL,
  `IDPRO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE `commission` (
  `IDCOM` int(10) NOT NULL,
  `NOM_COM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commission`
--

INSERT INTO `commission` (`IDCOM`, `NOM_COM`) VALUES
(1, 'Com\'Pilotage'),
(2, 'Com\'Communication'),
(3, 'Com\'Evenementiellle');

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE `compose` (
  `IDU` int(10) NOT NULL,
  `IDCOM` int(10) NOT NULL,
  `RESPONSABLE` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `constituer`
--

CREATE TABLE `constituer` (
  `IDD` int(10) NOT NULL,
  `IDPRO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE `cotisation` (
  `IDCOT` int(10) NOT NULL,
  `MONTANT_COT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `diriger`
--

CREATE TABLE `diriger` (
  `IDCOM` int(10) NOT NULL,
  `IDPRO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `IDD` int(10) NOT NULL,
  `NOM_DOC` varchar(50) DEFAULT NULL,
  `AUTEUR_DOC` varchar(50) DEFAULT NULL,
  `TYPE_DOC` varchar(24) DEFAULT NULL,
  `EXTENSION_DOC` varchar(10) DEFAULT NULL,
  `IDU` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`IDD`, `NOM_DOC`, `AUTEUR_DOC`, `TYPE_DOC`, `EXTENSION_DOC`, `IDU`) VALUES
(1, 'Rapport2', 'simba ', 'Word', '.docx', 2),
(2, 'Rapport 2', 'moussa', 'pdf', 'pdf', 3);

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `IDDON` int(10) NOT NULL,
  `MONTANT_DON` float DEFAULT NULL,
  `NOM_DONNAT` varchar(50) DEFAULT NULL,
  `TYPE_DON` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

CREATE TABLE `faire` (
  `IDP` int(10) NOT NULL,
  `IDDON` int(10) NOT NULL,
  `DATE_DON` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fait`
--

CREATE TABLE `fait` (
  `IDU` int(10) NOT NULL,
  `IDDON` int(10) NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `IDP` int(10) NOT NULL,
  `NOM_P` varchar(50) DEFAULT NULL,
  `TYPE_P` varchar(24) DEFAULT NULL,
  `SIRET_P` float DEFAULT NULL,
  `DOMAINE_P` varchar(24) DEFAULT NULL,
  `IDU` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payer`
--

CREATE TABLE `payer` (
  `IDU` int(10) NOT NULL,
  `IDCOT` int(10) NOT NULL,
  `POURCENTAGE` varchar(24) DEFAULT NULL,
  `DEVICE_payer` varchar(10) DEFAULT NULL,
  `VALEUR` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `IDPRO` int(10) NOT NULL,
  `NOM_PRO` varchar(50) DEFAULT NULL,
  `REF_PRO` varchar(24) DEFAULT NULL,
  `DUREE_PRO` int(24) DEFAULT NULL,
  `DATEDEBUT_PRO` date DEFAULT NULL,
  `GESTINONAIRE_PRO` varchar(24) DEFAULT NULL,
  `INITIATEUR_PRO` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `relier`
--

CREATE TABLE `relier` (
  `IDP` int(10) NOT NULL,
  `IDD` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `IDR_ROLE` int(10) NOT NULL,
  `DESCPT` varchar(50) DEFAULT NULL,
  `IDU` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDU` int(10) NOT NULL,
  `NOM_U` varchar(50) DEFAULT NULL,
  `PRENOM_U` varchar(50) DEFAULT NULL,
  `MAIL_U` varchar(50) DEFAULT NULL,
  `DATENAISS_U` date DEFAULT NULL,
  `LIEUNAISS_U` varchar(50) DEFAULT NULL,
  `SEXE_U` varchar(24) DEFAULT NULL,
  `RUE_U` varchar(24) DEFAULT NULL,
  `CP_U` int(10) DEFAULT NULL,
  `VILE_U` varchar(50) DEFAULT NULL,
  `PHOTO_U` varchar(50) DEFAULT NULL,
  `LOGIN_U` varchar(24) DEFAULT NULL,
  `MDP_U` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDU`, `NOM_U`, `PRENOM_U`, `MAIL_U`, `DATENAISS_U`, `LIEUNAISS_U`, `SEXE_U`, `RUE_U`, `CP_U`, `VILE_U`, `PHOTO_U`, `LOGIN_U`, `MDP_U`) VALUES
(1, 'AMBIDINA', 'Moussa', 'ambidina23moussa@gmail.com', '1988-06-09', 'Mitsoudjé hambou', 'masculin', '23', 91240, 'saint michel sur orge', NULL, 'james', 'moussa'),
(2, 'AMBIDINA', 'Moussa', 'ambidina23moussa@gmail.com', '1988-06-09', 'Mitsoudjé hambou', 'masculin', '23', 91240, 'saint michel sur orge', NULL, 'james', 'moussa'),
(3, 'RADO', 'Andriamahakajy', 'rado.andriamahakajy@gmail.com', '1993-06-13', 'tananarive', 'masculin', '23', 91240, 'noisyle sec', NULL, 'rado', 'andry'),
(4, 'RADO', 'Andriamahakajy', 'rado.andriamahakajy@gmail.com', '1993-06-13', 'tananarive', 'masculin', '23', 91240, 'noisyle sec', NULL, 'rado', 'andry');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `associer`
--
ALTER TABLE `associer`
  ADD PRIMARY KEY (`IDP`,`IDPRO`);

--
-- Index pour la table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`IDCOM`);

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`IDU`,`IDCOM`);

--
-- Index pour la table `constituer`
--
ALTER TABLE `constituer`
  ADD PRIMARY KEY (`IDD`,`IDPRO`);

--
-- Index pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`IDCOT`);

--
-- Index pour la table `diriger`
--
ALTER TABLE `diriger`
  ADD PRIMARY KEY (`IDCOM`,`IDPRO`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`IDD`);

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`IDDON`);

--
-- Index pour la table `faire`
--
ALTER TABLE `faire`
  ADD PRIMARY KEY (`IDP`,`IDDON`);

--
-- Index pour la table `fait`
--
ALTER TABLE `fait`
  ADD PRIMARY KEY (`IDU`,`IDDON`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`IDP`);

--
-- Index pour la table `payer`
--
ALTER TABLE `payer`
  ADD PRIMARY KEY (`IDU`,`IDCOT`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`IDPRO`);

--
-- Index pour la table `relier`
--
ALTER TABLE `relier`
  ADD PRIMARY KEY (`IDP`,`IDD`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDR_ROLE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDU`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `associer`
--
ALTER TABLE `associer`
  MODIFY `IDP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commission`
--
ALTER TABLE `commission`
  MODIFY `IDCOM` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `compose`
--
ALTER TABLE `compose`
  MODIFY `IDU` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `constituer`
--
ALTER TABLE `constituer`
  MODIFY `IDD` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cotisation`
--
ALTER TABLE `cotisation`
  MODIFY `IDCOT` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `diriger`
--
ALTER TABLE `diriger`
  MODIFY `IDCOM` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `IDD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `IDDON` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faire`
--
ALTER TABLE `faire`
  MODIFY `IDP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fait`
--
ALTER TABLE `fait`
  MODIFY `IDU` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `IDP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payer`
--
ALTER TABLE `payer`
  MODIFY `IDU` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `IDPRO` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `relier`
--
ALTER TABLE `relier`
  MODIFY `IDP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `IDR_ROLE` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
