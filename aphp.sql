-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 23 Octobre 2016 à 12:21
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `tab_hopital`
--

CREATE TABLE `tab_hopital` (
  `hopital_trigramme` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `hopital_nom` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `hopital_adresse` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `hopital_latitude` decimal(8,6) DEFAULT NULL,
  `hopital_longitude` decimal(8,6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tab_hopital`
--

INSERT INTO `tab_hopital` (`hopital_trigramme`, `hopital_nom`, `hopital_adresse`, `hopital_latitude`, `hopital_longitude`) VALUES
('HTD', 'Hôtel-Dieu', '1 place du Parvis Notre-Dame - Paris', '48.853954', '2.348331'),
('LRB', 'Hôpital Lariboisière', '2 rue Ambroise-Paré - Paris', '48.882263', '2.352834'),
('SLS', 'Hôpital Saint-Louis', '1 avenue Claude-Vellefaux - Paris', '48.873791', '2.367845'),
('SAT', 'Hôpital Saint-Antoine', '184 rue du Faubourg Saint-Antoine - Paris', '48.850243', '2.382528'),
('PSL', 'Hôpital Pitié-Salpêtrière', '83 boulevard de l’Hôpital - Paris', '48.837078', '2.365043'),
('CCH', 'Hôpital Cochin', '27 rue du Faubourg Saint-Jacques - Paris', '48.837391', '2.338890'),
('EGP', 'Hôpital Européen Georges-Pompidou', '20 rue Leblanc - Paris', '48.838734', '2.274101'),
('BCH', 'Hôpital Bichat - Claude-Bernard', '46 rue Henri-Huchard - Paris', '48.898720', '2.332366'),
('TNN', 'Hôpital Tenon', '4 rue de la Chine - Paris', '48.865849', '2.401131'),
('APR', 'Hôpital Ambroise-Paré', '9 avenue Charles-de-Gaulle - Boulogne', '48.849087', '2.236288'),
('ABC', 'Hôpital Antoine-Béclère', '157 rue de la Porte de Trivaux - Clamart', '48.788589', '2.254901'),
('BJN', 'Hôpital Beaujon', '100 boulevard du Général Leclerc - Clichy', '48.908119', '2.310466'),
('AVC', 'Hôpital Avicenne', '125 route de Stalingrad - Bobigny', '48.914406', '2.423869'),
('JVR', 'Hôpital Jean-Verdier', 'avenue du 14-Juillet - Bondy', '48.909611', '2.487832'),
('BCT', 'Hôpital Bicêtre', '78 rue du Général Leclerc - Le Kremlin-Bicêtre', '48.810570', '2.352190'),
('LMR', 'Hôpital Louis-Mourier', '178 rue des Renouillers - Colombes', '48.924629', '2.236251'),
('HMN', 'Hôpital Henri-Mondor', '51 avenue du Maréchal de Lattre de Tassigny - Créteil', '48.797127', '2.453097'),
('TRS', 'Hôpital Armand-Trousseau', '26 avenue du Dr Arnold Netter - Paris', '48.842686', '2.405338'),
('NCK', 'Hôpital Necker-Enfants malades', '149 rue de Sèvres - Paris', '48.845303', '2.312724'),
('RDB', 'Hôpital Robert-Debré', '48 boulevard Sérurier - Paris', '48.879463', '2.401247');

-- --------------------------------------------------------

--
-- Structure de la table `tab_med_ge`
--

CREATE TABLE `tab_med_ge` (
  `med_ge_nom` text COLLATE utf8_unicode_ci NOT NULL,
  `med_ge_prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `med_ge_adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `med_ge_tel` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `med_ge_latitude` decimal(8,6) NOT NULL,
  `med_ge_longitude` decimal(8,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tab_med_ge`
--

INSERT INTO `tab_med_ge` (`med_ge_nom`, `med_ge_prenom`, `med_ge_adresse`, `med_ge_tel`, `med_ge_latitude`, `med_ge_longitude`) VALUES
('Amoch', 'David', '97 Avenue Parmentier, 75011 Paris', '01 47 00 86 65', '48.866472', '2.373403'),
('Bequet', 'Laurence', '54 Rue de Turbigo, 75003 Paris', '01 42 36 29 41', '48.865563', '2.357125'),
('Amarger', 'Frederic', '33 Rue Reaumur, 75003 Paris, France', '01 42 78 56 73', '48.865538', '2.354996'),
('Colboc', 'Raphael', '51 Rue du Faubourg Saint-Antoine, 75011 Paris', '01 47 00 43 34', '48.852429', '2.373041'),
('Teboul', 'Patrick', '120 Rue Oberkampf, 75011 Paris', '01 43 57 39 46', '48.866083', '2.379682'),
('Janson', 'Eric', '1 Rue Saint-Antoine, 75004 Paris', '01 42 72 16 42', '48.853200', '2.367975'),
('Bonhomme', 'Edouard', '20 Rue Lacepede, 75005 Paris', '01 47 07 21 12', '48.843933', '2.352804'),
('Pradelle', 'Mylene', '16 Rue des Archives, 75004 Paris', '01 42 77 29 18', '48.857691', '2.354805'),
('Barre', 'Dominique', '85 Rue de la Fontaine au Roi, 75011 Paris', '01 47 00 83 15', '48.869230', '2.377246'),
('Juillard', 'Bertrand', '29 Rue des Vinaigriers, 75010 Paris', '01 42 05 75 20', '48.873047', '2.362591'),
('Leguil', 'Xavier', '96 Rue de Rivoli, 75004 Paris', '01 42 72 49 86', '48.862725', '2.287592');

-- --------------------------------------------------------

--
-- Structure de la table `tab_urgences`
--

CREATE TABLE `tab_urgences` (
  `hopital_trigramme` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `urgences_type` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `urgences_public` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  `urgences_horaire` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `urgences_tel` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `urgences_temps` smallint(6) DEFAULT NULL,
  `consultation_temps` smallint(6) DEFAULT NULL,
  `urgences_plan` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tab_urgences`
--

INSERT INTO `tab_urgences` (`hopital_trigramme`, `urgences_type`, `urgences_public`, `urgences_horaire`, `urgences_tel`, `urgences_temps`, `consultation_temps`, `urgences_plan`) VALUES
('HTD', 'Générales', 'Adultes', '24h sur 24', '01 42 34 82 32', NULL, NULL, NULL),
('LRB', 'Gérales', 'Adultes', '24h sur 24', '01 49 95 64 45', NULL, NULL, NULL),
('SLS', 'Générales', 'Adultes', '24h sur 24', '01 42 49 91 17', NULL, NULL, NULL),
('SAT', 'Générales', 'Adultes', '24h sur 24', '01 49 28 27 08', NULL, NULL, NULL),
('PSL', 'Générales', 'Adultes', '24h sur 24', '', NULL, NULL, NULL),
('CCH', 'Générales', 'Adultes', '24h sur 24', '01 58 41 27 22', NULL, NULL, NULL),
('EGP', 'Générales', 'Adultes', '24h sur 24', '01 56 09 32 24', NULL, NULL, NULL),
('BCH', 'Générales', 'Adultes', '24h sur 24', '01 40 25 80 80', NULL, NULL, NULL),
('TNN', 'Générales', 'Adultes', '24h sur 24', '01 56 01 64 05', NULL, NULL, NULL),
('APR', 'Générales', 'Adultes', '24h sur 24', '01 49 09 55 17', NULL, NULL, NULL),
('ABC', 'Générales', 'Adultes', '24h sur 24', '01 45 37 42 44', NULL, NULL, NULL),
('BJN', 'Générales', 'Adultes', '24h sur 24', '01 40 87 59 40', NULL, NULL, NULL),
('AVC', 'Générales', 'Adultes', '24h sur 24', '01 48 95 57 83', NULL, NULL, NULL),
('JVR', 'Générales', 'Adultes', '24h sur 24', '01 48 02 65 33', NULL, NULL, NULL),
('BCT', 'Générales', 'Adultes', '24h sur 24', '01 45 21 35 42', NULL, NULL, NULL),
('LMR', 'Générales', 'Adultes', '24h sur 24', '01 47 60 61 54', NULL, NULL, NULL),
('HMN', 'Générales', 'Adultes', '24h sur 24', '01 49 81 24 87', NULL, NULL, NULL),
('TRS', 'Générales', 'Enfants', '24h sur 24', '01 44 73 67 40', NULL, NULL, NULL),
('NCK', 'Générales', 'Enfants', '24h sur 24', '01 44 49 42 90', NULL, NULL, NULL),
('RDB', 'Générales', 'Enfants', '24h sur 24', '01 40 03 22 70', NULL, NULL, NULL),
('HTD', 'Yeux', 'Adultes', '24h sur 24', '01 42 34 80 36', NULL, NULL, NULL),
('HTD', 'Yeux', 'Enfants', '24h sur 24', '01 42 34 80 36', NULL, NULL, NULL),
('LRB', 'ORL', 'Adultes', '24h sur 24', '01 49 95 65 65', NULL, NULL, NULL),
('SAT', 'Main', 'Adultes', '24h sur 24', '01 49 28 30 00', NULL, NULL, NULL),
('PSL', 'Dents', 'Adultes', '24h sur 24', '', NULL, NULL, NULL),
('PSL', 'Dents', 'Enfants', '24h sur 24', '', NULL, NULL, NULL),
('CCH', 'Maternité', 'Adultes', '24h sur 24', '01 58 41 35 91', NULL, NULL, NULL),
('EGP', 'Main', 'Adultes', '24h sur 24', '01 56 09 30 00', NULL, NULL, NULL),
('BCH', 'Maternité', 'Adultes', '24h sur 24', '01 40 25 80 80', NULL, NULL, NULL),
('TNN', 'Maternité', 'Adultes', '24h sur 24', '01 56 01 68 53', NULL, NULL, NULL),
('APR', 'Générales', 'Enfants', '24h sur 24', '01 49 09 55 17', NULL, NULL, NULL),
('ABC', 'Générales', 'Enfants', '24h sur 24', '01 45 37 42 44', NULL, NULL, NULL),
('BJN', 'Maternité', 'Adultes', '24h sur 24', '01 40 87 52 02', NULL, NULL, NULL),
('JVR', 'Générales', 'Enfants', '24h sur 24', '01 48 02 60 36', NULL, NULL, NULL),
('BCT', 'Générales', 'Enfants', '24h sur 24', '01 45 21 29 50', NULL, NULL, NULL),
('LMR', 'Maternité', 'Adultes', '24h sur 24', '01 47 60 63 45', NULL, NULL, NULL),
('TRS', 'Maternité', 'Adultes', '24h sur 24', '01 44 73 51 96', NULL, NULL, NULL),
('NCK', 'ORL', 'Enfants', '24h sur 24', '01 44 49 46 86', NULL, NULL, NULL),
('RDB', 'Main', 'Enfants', '24h sur 24', '01 40 03 20 00', NULL, NULL, NULL),
('LRB', 'Maternité', 'Adultes', '24h sur 24', '01 49 95 62 37', NULL, NULL, NULL),
('PSL', 'Maternité', 'Adultes', '24h sur 24', '01 42 17 77 10', NULL, NULL, NULL),
('ABC', 'Maternité', 'Adultes', '24h sur 24', '01 45 37 44 56', NULL, NULL, NULL),
('JVR', 'Maternité', 'Adultes', '24h sur 24', '01 48 02 67 76', NULL, NULL, NULL),
('BCT', 'Maternité', 'Adultes', '24h sur 24', '01 45 21 76 06', NULL, NULL, NULL),
('NCK', 'Maternité', 'Adultes', '24h sur 24', '01 44 49 40 00', NULL, NULL, NULL),
('RDB', 'Maternité', 'Adultes', '24h sur 24', '01 40 03 20 00', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
