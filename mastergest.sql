-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 21 août 2020 à 16:30
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mastergest`
--

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `id` int(5) NOT NULL,
  `codeDirecteur` int(5) NOT NULL,
  `nomDirecteur` varchar(64) NOT NULL,
  `prenomDirecteur` varchar(64) NOT NULL,
  `sexeDirecteur` varchar(10) NOT NULL,
  `gradeDirecteur` varchar(64) NOT NULL,
  `adresseDirecteur` varchar(64) NOT NULL,
  `domaineDirecteur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`id`, `codeDirecteur`, `nomDirecteur`, `prenomDirecteur`, `sexeDirecteur`, `gradeDirecteur`, `adresseDirecteur`, `domaineDirecteur`) VALUES
(2, 1001, 'KONE', 'Blaise', 'Masculin', 'Assistant', 'Ouagadougou', 'Mathématiques'),
(3, 1002, 'BAYILI', 'Gilbert', 'Masculin', 'Assistant', 'Ouagadougou', 'Mathématiques'),
(4, 1003, 'KONE', 'Lydie', 'Féminin', 'Enseignant à temps plein', 'Ouagadougou', 'Informatique'),
(5, 1004, 'TRAORE', 'Yaya', 'Masculin', 'Assistant', 'Ouagadougou', 'Informatique'),
(6, 1005, 'OUEDRAOGO', 'Virginie', 'Féminin', 'Enseignant à temps plein', 'Ouagadougou', 'Droit');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(5) NOT NULL,
  `matricule` varchar(64) NOT NULL,
  `nomEtudiant` varchar(64) NOT NULL,
  `prenomEtudiant` varchar(64) NOT NULL,
  `sexe` varchar(64) NOT NULL,
  `dateNaissance` varchar(64) NOT NULL,
  `lieuNaissance` varchar(64) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nomEtudiant`, `prenomEtudiant`, `sexe`, `dateNaissance`, `lieuNaissance`, `filiere`, `statut`) VALUES
(2, 'N020154520181', 'DERA', 'Amédée', 'Masculin', '08/05/2020', 'Dubai', 'MMIAGE', 0),
(3, 'N04823520181', 'SERE', 'Ahmed', 'Masculin', '09/02/2020', 'New-York', 'MMIAGE', 0),
(8, 'N02015445210', 'SAWADOGO', 'Ali', 'Masculin', '02/05/1998', 'Fada', 'MBF', 1),
(9, 'N03644158451', 'TRAORE', 'Fatimata', 'Féminin', '1/11/19989', 'Banfora', 'MCCA', 2),
(10, 'N0258746612', 'CONGO', 'Océane', 'Féminin', '10/09/1993', 'Ouagadougou', 'MMIAGE', 0),
(12, 'N1254862031', 'OUOBA', 'Fred', 'Masculin', '13/09/2000', 'Marseille', 'MBF', 2),
(13, 'N07854520181', 'Kiendrebéogo', 'Cheick Omar', 'Féminin', '08/12/0020', 'New-York', 'MAGE', 0),
(14, 'N569856322015', 'OUATTARA', 'John', 'Masculin', '03/10/2020', 'Abidjan', 'MBF', 2),
(15, 'N548752365', 'TOE', 'Carine', 'Féminin', '21/07/1984', 'Accra', 'MMIAGE', 2),
(16, 'N0214523654', 'KIETA', 'Franck', 'Masculin', '16/10/1996', 'Paris', 'MCCA', 1),
(17, 'N0154289632', 'NION', 'Abdias', 'Masculin', '05/09/1995', 'Bobo', 'MCCA', 1),
(18, 'N25415263201', 'PARE', 'Josianne', 'Féminin', '18/06/1993', 'Ziniaré', 'MMIAGE', 1),
(19, 'N252563321012', 'PAKOTOGO', 'Joel', 'Masculin', '29/12/1991', 'Dakar', 'MBF', 1),
(20, 'N02154875002321', 'SORE', 'Alassane', 'Masculin', '25/07/1987', 'Casablanca', 'MBF', 1),
(21, 'N021548993654', 'DABO', 'Illiasse', 'Masculin', '26/08/1992', 'Ouagadougou', 'MCCA', 0),
(22, 'N02544187522', 'OUEDRAOGO', 'Yasmine', 'Féminin', '14/02/1999', 'Paris', 'MBF', 0),
(23, 'N1523520165320', 'CONGO', 'Assètou', 'Féminin', '10/05/1993', 'Koudougou', 'MMIAGE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

CREATE TABLE `jury` (
  `id` int(5) NOT NULL,
  `codeJury` int(5) NOT NULL,
  `codePresident` varchar(100) NOT NULL,
  `codeInvite` varchar(100) NOT NULL,
  `codeMaitre` varchar(100) NOT NULL,
  `codeDirecteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jury`
--

INSERT INTO `jury` (`id`, `codeJury`, `codePresident`, `codeInvite`, `codeMaitre`, `codeDirecteur`) VALUES
(4, 1001, 'Blaise KONE', 'Gilbert BAYILI', 'Yaya TRAORE', 'Virginie OUEDRAOGO'),
(5, 1002, 'Gilbert BAYILI', 'Gilbert BAYILI', 'Virginie OUEDRAOGO', 'Yaya TRAORE'),
(6, 1003, 'Yaya TRAORE', 'Lydie KONE', 'Gilbert BAYILI', 'Virginie OUEDRAOGO'),
(7, 1004, 'Lydie KONE', 'Virginie OUEDRAOGO', 'Yaya TRAORE', 'Gilbert BAYILI'),
(8, 1005, 'Yaya TRAORE', 'Virginie OUEDRAOGO', 'Blaise KONE', 'Gilbert BAYILI');

-- --------------------------------------------------------

--
-- Structure de la table `maitredestage`
--

CREATE TABLE `maitredestage` (
  `id` int(5) NOT NULL,
  `codeMaitre` int(5) NOT NULL,
  `nomMaitre` varchar(64) NOT NULL,
  `prenomMaitre` varchar(64) NOT NULL,
  `sexeMaitre` varchar(10) NOT NULL,
  `etablissementReference` varchar(64) NOT NULL,
  `adresseMaitre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maitredestage`
--

INSERT INTO `maitredestage` (`id`, `codeMaitre`, `nomMaitre`, `prenomMaitre`, `sexeMaitre`, `etablissementReference`, `adresseMaitre`) VALUES
(2, 1001, 'KONE', 'Blaise', 'Masculin', 'USTA', 'Ouagadougou'),
(3, 1002, 'BAYILI', 'Gilbert', 'Masculin', 'UPO', 'Ouagadougou'),
(4, 1003, 'KONE', 'Lydie', 'Féminin', 'UO', 'Ouagadougou'),
(5, 1004, 'TRAORE', 'Yaya', 'Masculin', 'ULB', 'Ouagadougou'),
(6, 1005, 'OUEDRAOGO', 'Virginie', 'Féminin', 'U-AUBEN', 'Ouagadougou');

-- --------------------------------------------------------

--
-- Structure de la table `membreinvite`
--

CREATE TABLE `membreinvite` (
  `id` int(5) NOT NULL,
  `codeInvite` int(5) NOT NULL,
  `nomInvite` varchar(64) NOT NULL,
  `prenomInvite` varchar(64) NOT NULL,
  `sexeInvite` varchar(10) NOT NULL,
  `gradeInvite` varchar(64) NOT NULL,
  `adresseInvite` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membreinvite`
--

INSERT INTO `membreinvite` (`id`, `codeInvite`, `nomInvite`, `prenomInvite`, `sexeInvite`, `gradeInvite`, `adresseInvite`) VALUES
(2, 1001, 'KONE', 'Blaise', 'Masculin', 'Assistant', 'Ouagadougou'),
(3, 1002, 'BAYILI', 'Gilbert', 'Masculin', 'Assistant', 'Ouagadougou'),
(4, 1003, 'KONE', 'Lydie', 'Féminin', 'Enseignant à temps plein', 'Ouagadougou'),
(5, 1004, 'TRAORE', 'Yaya', 'Masculin', 'Assistant', 'Ouagadougou'),
(6, 1005, 'OUEDRAOGO', 'Virginie', 'Féminin', 'Enseignant à temps plein', 'Ouagadougou');

-- --------------------------------------------------------

--
-- Structure de la table `president`
--

CREATE TABLE `president` (
  `id` int(5) NOT NULL,
  `codePresident` int(5) NOT NULL,
  `nomPresident` varchar(64) NOT NULL,
  `prenomPresident` varchar(64) NOT NULL,
  `sexePresident` varchar(10) NOT NULL,
  `gradePresident` varchar(64) NOT NULL,
  `adressePresident` varchar(64) NOT NULL,
  `domainePresident` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `president`
--

INSERT INTO `president` (`id`, `codePresident`, `nomPresident`, `prenomPresident`, `sexePresident`, `gradePresident`, `adressePresident`, `domainePresident`) VALUES
(4, 1001, 'KONE', 'Blaise', 'Masculin', 'Assistant', 'Ouagagoudou', 'Mathématiques'),
(5, 1002, 'KONE', 'Lydie', 'Féminin', 'Enseignat à temps plein', 'Ouagagoudou', 'Informatique'),
(6, 1003, 'TRAORE', 'Yaya', 'Masculin', 'Assistant', 'Ouagagoudou', 'Informatique'),
(7, 1004, 'OUEDRAOGO', 'Virginie', 'Féminin', 'Enseignat à temps plein', 'Ouagagoudou', 'Droit'),
(8, 1005, 'Guinko', 'Ferdinand', 'Masculin', 'Assistant', 'Ouagadougou', 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `id` int(5) NOT NULL,
  `codeSoutenance` int(5) NOT NULL,
  `themeSoutenance` varchar(1000) NOT NULL,
  `dateSoutenance` varchar(64) NOT NULL,
  `heureSoutenance` varchar(64) NOT NULL,
  `matricule` varchar(64) NOT NULL,
  `codeJury` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `soutenance`
--

INSERT INTO `soutenance` (`id`, `codeSoutenance`, `themeSoutenance`, `dateSoutenance`, `heureSoutenance`, `matricule`, `codeJury`) VALUES
(4, 2001, 'ttttttt', '15/02/2020', '10:00', 'N020154520181', 1001),
(5, 2002, 'tttttttttttttttttt', '20/01/2020', '08:00', 'N04823520181', 1002),
(6, 2003, 'ttttttttt', '08/08/2020', '15:00', 'N02015445210', 1003),
(7, 2004, 'ttttttttt', '02/10/2020', '10:00', 'N03644158451', 1004),
(8, 2005, 'tttttttttt', '14/05/2020', '08:00', 'N0258746612', 1005);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `pass`) VALUES
('admin', 'admin1234'),
('guess', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `maitredestage`
--
ALTER TABLE `maitredestage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membreinvite`
--
ALTER TABLE `membreinvite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `jury`
--
ALTER TABLE `jury`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `maitredestage`
--
ALTER TABLE `maitredestage`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membreinvite`
--
ALTER TABLE `membreinvite`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `president`
--
ALTER TABLE `president`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
