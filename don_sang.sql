-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 06 juin 2023 à 15:21
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `don_sang`
--

-- --------------------------------------------------------

--
-- Structure de la table `analyse`
--

CREATE TABLE `analyse` (
  `id_analyse` int(11) NOT NULL,
  `id_don` int(11) NOT NULL,
  `atestation` varchar(500) NOT NULL,
  `amrad` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `campagne`
--

CREATE TABLE `campagne` (
  `id_campagne` int(11) NOT NULL,
  `titre_campagne` varchar(30) NOT NULL,
  `description_campagne` varchar(1000) NOT NULL,
  `photo_campagne` varchar(250) NOT NULL,
  `date_campagne` date NOT NULL,
  `id_centre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campagne`
--

INSERT INTO `campagne` (`id_campagne`, `titre_campagne`, `description_campagne`, `photo_campagne`, `date_campagne`, `id_centre`) VALUES
(45, 'Deuxième Journée', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '../imgsmembre&medecin&projets/imgprojets/Deuxième Journée-2023.06.06-03.20.06pm.jpeg', '2023-06-03', 4),
(47, 'Première Journée', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '../imgsmembre&medecin&projets/imgprojets/Wiiw1047564255402.jpeg', '2023-06-11', 4),
(51, 'Troisième Journée', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '../imgsmembre&medecin&projets/imgprojets/Troisième Journée-2023.06.06-03.20.17pm.jpeg', '2023-06-01', 4);

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `id_centre` int(11) NOT NULL,
  `ville_centre` varchar(30) NOT NULL,
  `adresse_centre` varchar(200) NOT NULL,
  `nom_centre` varchar(100) NOT NULL,
  `email_centre` varchar(30) NOT NULL,
  `numtel_centre` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nom_directeur` varchar(30) NOT NULL,
  `prenom_directeur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id_centre`, `ville_centre`, `adresse_centre`, `nom_centre`, `email_centre`, `numtel_centre`, `login`, `password`, `nom_directeur`, `prenom_directeur`) VALUES
(1, 'Casablanca', '25, rue Khatib Ibnou Abi Soufiane, Quartier Racine, Casablanca', 'Centre Régional De Transfusion Casablanca', 'centrecasa@gmail.com', '+212516012827', 'centrecasa', 'casa123', 'Mohammed', 'HADDIOUI'),
(2, 'Rabat', 'Avenue Ibn Sina, Madinat Al Irfane, Rabat', 'Centre Régional De Transfusion Rabat', 'centrerabat@gmail.com', '+212516016041', 'centrerabat', 'rabat123', 'Amina', 'HAFSI'),
(3, 'Tanger', 'Rue Larache, Tanger', 'Centre Régional De Transfusion Tanger', 'centretanger@gmail.com', '+212577903456', 'centretanger', 'tanger123', 'Youssef', 'ASSAJI'),
(4, 'Marrakech', 'Avenue Allal El Fassi, Complexe Hospitalier Universitaire Mohammed VI, Marrakech', 'Centre Régional De Transfusion Marrakech', 'centremarrakech@gmail.com', '+212516012899', 'centremarrakech', 'marrakech123', 'Mohammed', 'ABBASSI'),
(5, 'Fès', 'Centre Hospitalier Universitaire Hassan II, Fès', 'Centre Régional De Transfusion Fès', 'centrefes@gmail.com', '+212535602403', 'centrefes', 'fes123', 'Ibrahim', 'YOUSSFI'),
(6, 'Agadir', ' Centre Hospitalier Universitaire Hassan II, Agadir', 'Centre Régional De Transfusion Agadir', 'centreagadir@gmail.com', ' +212528225490', 'centreagadir', 'agadir123', 'Imane', 'IBRAHIMI'),
(7, 'Oujda', 'Centre Hospitalier Universitaire Mohammed VI, Oujda', 'Centre Régional De Transfusion Oujda', 'centreoujda@gmail.com', '+212536683012', 'centreoujda', 'oujda123', 'Rachid', 'CHERIF'),
(8, 'Meknès', 'Rue Al Hoceima, Complexe Hospitalier Universitaire Hassan II, Meknès', 'Centre Régional De Transfusion Meknès', 'centremeknes@gmail.com', '+212535508256', 'centremeknes', 'meknes123', 'Samira', 'RIFI'),
(9, 'Tetouan', 'Rue Med Riffi, Complexe Hospitalier Mohammed V, Tetouan', 'Centre Régional De Transfusion Tetouan', 'centretetouan@gmail.com', '+212539701875', 'centretetouan', 'tetouan123', 'Latifa', 'AMRANI'),
(10, 'Ouarzazate', 'Centre Hospitalier d\'Ouarzazate', 'Centre Régional De Transfusion Ouarzazate', 'centreouarzazate@gmail.com', '+212524884827', 'centreouarzazate', 'ouarzazate123', 'Safia', 'BENJELLOUN'),
(11, 'inconnu', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `id_centre` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  `deadline` date NOT NULL,
  `type_sang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `date_demande`, `id_centre`, `id_membre`, `deadline`, `type_sang`) VALUES
(9, '2023-01-27', 2, 14, '2023-06-11', NULL),
(12, '2023-03-27', 5, 18, '2023-06-14', NULL),
(21, '2023-04-28', 4, 24, '2023-05-29', NULL),
(22, '2023-05-28', 2, 24, '2023-05-31', NULL),
(23, '2023-06-15', 1, 14, '2023-05-31', NULL),
(25, '2023-11-01', 1, 26, '2024-02-01', NULL),
(26, '2023-11-09', 2, 23, '2024-05-11', NULL),
(27, '2023-11-15', 4, 18, '2023-05-13', NULL),
(28, '2023-12-03', 1, NULL, '2023-08-29', NULL),
(48, '2023-06-03', 1, 10, '2023-06-11', 'AB-');

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `id_don` int(11) NOT NULL,
  `date_don` date NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  `id_centre` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id_don`, `date_don`, `id_membre`, `id_demande`, `id_centre`, `id_medecin`) VALUES
(30, '2023-04-20', 10, 12, 2, 2),
(31, '2023-05-23', 10, 22, 6, 3),
(32, '2023-06-06', 23, 9, 7, 4),
(33, '2023-10-16', 26, 23, 1, 7),
(34, '2023-11-10', 10, 22, 1, 6),
(35, '2023-12-23', 26, 27, 6, 10),
(36, '2023-12-31', 10, 22, 4, 11),
(37, '2023-12-31', 26, 23, 1, 11),
(38, '2023-01-01', 10, 12, 1, 6),
(39, '2023-07-09', 26, 23, 2, 2),
(40, '2023-07-06', 10, 21, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `cin_medecin` varchar(30) DEFAULT NULL,
  `nom_medecin` varchar(30) DEFAULT NULL,
  `prenom_medecin` varchar(30) DEFAULT NULL,
  `id_centre` int(11) NOT NULL,
  `email_medecin` varchar(30) DEFAULT NULL,
  `image_medecin` varchar(1000) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `cin_medecin`, `nom_medecin`, `prenom_medecin`, `id_centre`, `email_medecin`, `image_medecin`, `login`, `password`) VALUES
(2, 'PL12987', 'BENJLON', 'Ghita', 2, 'ghitbenjloun12@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/BENJLONGhita-2023.06.03-02.10.08am.jpeg', 'ghitaben12', 'ghitabenjloun12'),
(3, 'AB45679', 'BENALI', 'Mohamed', 9, 'benalimohamed123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/BENALIMohamed2023.05.26-04.36.25am.jpeg', 'benalimohamed', 'benalimohamed12'),
(4, 'CH690945', 'ZOUHAIRE', 'Karim', 7, 'zouhairikarim123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/ZOUHAIREKarim-2023.05.29-07.31.45pm.jpeg', 'zouhairikarim', 'zouhairikarim12'),
(6, 'BC90875', 'LAHLOU', 'Ayman', 5, 'lahlouayman123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/LAHLOUAyman-2023.06.06-03.15.28pm.jpeg', 'lahloukhalid', 'lahloukhalid12'),
(7, 'ML5432', 'TOUHAMI', 'Zahra', 3, 'touhamizahra123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/TOUHAMIZahra-2023.06.06-03.16.41pm.jpeg', 'touhamizahra', 'touhamizahra12'),
(8, 'CB56344', 'ZEROUALI', 'Rachid', 6, 'zeroualirachid123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/ZEROUALIRachid2023.05.26-04.36.25am.jpeg', 'zeroualirachid', 'zeroualirachid12'),
(10, 'KJ56891', 'HAJJI', 'Karim', 4, 'hajjikarim123@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/HAJJIKarim2023.05.26-04.36.25am.jpeg', 'hajjikarim', 'hajjikarim12'),
(11, 'inconnu', 'inconnu', 'inconnu', 11, NULL, NULL, NULL, NULL),
(13, 'GF19873', 'HTIMI', 'Meryam', 1, 'meryamhtimi@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/HTIMIMeryam-2023.06.06-03.16.21pm.jpeg', 'meryamHt', 'meryam12'),
(15, 'NB9815', 'BENHAMOU', 'Khalidd', 1, 'khalidben@gmail.com', '../imgsmembre&medecin&projets/imgmedecins/BENHAMOUKhalidd-2023.06.06-03.16.08pm.jpeg', 'khaliddben', 'khaliddben');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `userlevel` int(11) NOT NULL,
  `cin_membre` varchar(30) DEFAULT NULL,
  `nom_membre` varchar(30) NOT NULL,
  `prenom_membre` varchar(30) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `image_membre` varchar(500) DEFAULT NULL,
  `sexe_membre` varchar(30) DEFAULT NULL,
  `type_sang` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `num_tel` varchar(30) DEFAULT NULL,
  `date_dernier_don` date DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `userlevel`, `cin_membre`, `nom_membre`, `prenom_membre`, `date_naiss`, `image_membre`, `sexe_membre`, `type_sang`, `ville`, `email`, `num_tel`, `date_dernier_don`, `login`, `password`) VALUES
(10, 1, NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'damydonsang@gmail.com', NULL, NULL, 'admin', 'admindamy'),
(14, 0, 'TH735090', 'MANSOURII', 'Hicham', '1996-02-01', '../imgsmembre&medecin&projets/imgmembres/MANSOURIHicham-2023.05.29-01.25.58pm.jpeg', 'Homme', 'A+', 'Agadir', 'hichammansouri14@gmail.com', '+212674507819', '2016-05-05', 'mansouri13', 'hichammansouri2023'),
(18, 0, 'CH146521', 'HASNAOUI', 'Yasser', '2000-01-09', '../imgsmembre&medecin&projets/imgmembres/HASNAOUIYasser-2023.06.06-03.07.30pm.jpeg', 'Homme', 'B-', 'Fès', 'hasnaouiyasser12@gmail.com', '+212716055687', '2022-01-07', 'hasnaoui123', 'hasnaouiyasser123'),
(23, 0, 'YH98713', 'HANIN', 'Reda', '1990-05-13', '../imgsmembre&medecin&projets/imgmembres/HANINReda-2023.05.27-10.28.08pm.jpeg', 'Homme', 'O+', 'Casablanca ', 'Redathanin129@gmail.com', '+212723409889', '2021-04-01', 'redahanin', 'hanin123'),
(24, 0, 'EB100143', 'HASNA', 'Habib eddine', '1981-07-03', '../imgsmembre&medecin&projets/imgmembres/HASNAHabib eddine-2023.06.06-03.07.03pm.jpeg', 'Femme', 'AB+', 'Marrakech', 'hasnahabib1@gmail.com', '+212643197495', '2022-06-11', 'hasnahabib', 'hasna123'),
(26, 0, 'BK730007', 'AHMED MOHAMED OTHMAN', 'Tahiri', '2001-06-09', '../imgsmembre&medecin&projets/imgmembres/AHMED MOHAMED OTHMANTahiri-2023.06.06-03.06.16pm.jpeg', 'Homme', 'B+', 'Casablanca', 'ahmedahmed@gmail.com', '+212616012823', '2022-05-04', 'ahmed09', 'ahmed03'),
(27, 0, 'LM0987', 'SAMTACH', 'Younes', '1986-05-06', '../imgsmembre&medecin&projets/imgmembres/SAMTACHYounes-2023.06.06-03.01.31pm.jpeg', 'Homme', 'AB+', 'Casablanca', 'samatchunes@gmail.com', '+212709887428', '2021-01-06', 'samatchy', 'unes123'),
(28, 0, 'OI098134', 'FROUGA', 'Fadwa', '1992-04-06', '../imgsmembre&medecin&projets/imgmembres/FROUGAFadwa-2023.06.06-03.03.45pm.jpeg', 'Femme', 'A-', 'Rabat', 'frouga12@gmail.com', '+212609871234', '2023-06-16', 'Foufrouga', 'fadwa1'),
(29, 0, 'XV09875', 'ZOLA', 'Salman', '1995-06-08', '../imgsmembre&medecin&projets/imgmembres/ZOLASalman-2023.06.06-03.05.52pm.jpeg', 'Homme', 'O+', 'Tanger', 'salman09@gmail.com', '+212609712345', '2023-01-06', 'zolazola', 'zola123'),
(30, 0, 'PV09151', 'FATHI', 'Hamedi', '1995-06-10', '../imgsmembre&medecin&projets/imgmembres/FATHIHamedi-2023.06.06-03.13.25pm.jpeg', 'Homme', 'A-', 'Casablanca', 'hamedifathi1@gmail.com', '+212687560988', '2022-06-04', 'fathifathi', 'hamedii');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(11) NOT NULL,
  `notif_name` varchar(50) NOT NULL,
  `notif_message` varchar(200) NOT NULL,
  `active` int(11) NOT NULL,
  `notif_date` date NOT NULL DEFAULT current_timestamp(),
  `id_membre` int(11) NOT NULL,
  `id_centre` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notif`, `notif_name`, `notif_message`, `active`, `notif_date`, `id_membre`, `id_centre`, `id_medecin`) VALUES
(111, 'Nouvelle campagne', 'Amina Amina il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-10, Participez maintenant !', 0, '2023-06-01', 17, 0, 0),
(112, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-10, Participez maintenant !', 0, '2023-06-01', 23, 0, 0),
(113, 'Nouvelle campagne', 'Mehdi Mehdi il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-10, Participez maintenant !', 0, '2023-06-01', 25, 0, 0),
(114, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-10, Participez maintenant !', 0, '2023-06-01', 26, 0, 0),
(115, 'Nouvelle campagne', '$notif', 0, '2023-06-01', 4, 0, 0),
(116, 'Nouvelle campagne', 'Habib eddine Habib eddine il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-03, Participez maintenant !', 0, '2023-06-01', 24, 0, 0),
(117, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLOUN', 0, '2023-06-01', 0, 0, 0),
(118, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLOUN', 0, '2023-06-01', 0, 0, 2),
(119, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 0, '2023-06-01', 0, 0, 0),
(120, 'Nouvelle campagne', 'Amina Amina il y \n        une nouvelle campagne de don de sang dans votre ville le 2023-06-25, Participez maintenant !', 0, '2023-06-01', 17, 0, 0),
(121, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-25, Participez maintenant !', 0, '2023-06-01', 23, 0, 0),
(122, 'Nouvelle campagne', 'Mehdi Mehdi il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-25, Participez maintenant !', 0, '2023-06-01', 25, 0, 0),
(123, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-25, Participez maintenant !', 0, '2023-06-01', 26, 0, 0),
(124, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 0, '2023-06-02', 0, 0, 0),
(125, 'Youssef HAMDAN veut vous faire une don .', 'Téléphone : +212690146532<br>Email : ilyasskarroum54@gmail.com', 0, '2023-06-02', 26, 0, 0),
(126, 'Bienvenue', 'Bienvenue dans notre centre Noura AMLOUD', 0, '2023-06-02', 0, 0, 0),
(127, 'Bienvenue', 'Bienvenue dans notre centre Khalidd BENHAMOU', 0, '2023-06-02', 0, 0, 1),
(128, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 0, '2023-06-02', 0, 0, 0),
(129, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 1, '2023-06-02', 0, 0, 0),
(130, 'Nouvelle campagne', 'Habib eddine Habib eddine il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-11, Participez maintenant !', 0, '2023-06-02', 24, 0, 0),
(131, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-24, Participez maintenant !', 0, '2023-06-02', 23, 0, 0),
(132, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-24, Participez maintenant !', 1, '2023-06-02', 26, 0, 0),
(133, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-24, Participez maintenant !', 0, '2023-06-02', 23, 0, 0),
(134, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-24, Participez maintenant !', 1, '2023-06-02', 26, 0, 0),
(135, 'Nouvelle campgne', 'L\'admin a ajouté une nouvelle campagne à votre centre le 2023-06-24', 0, '2023-06-02', 0, 1, 0),
(136, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-07-01, Participez maintenant !', 0, '2023-06-02', 23, 0, 0),
(137, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-07-01, Participez maintenant !', 1, '2023-06-02', 26, 0, 0),
(138, 'Nouvelle campgne', 'L\'admin a ajouté une nouvelle campagne à votre centre le 2023-07-01', 0, '2023-06-02', 0, 1, 0),
(139, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-16, Participez maintenant !', 0, '2023-06-02', 23, 0, 0),
(140, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-16, Participez maintenant !', 1, '2023-06-02', 26, 0, 0),
(141, 'Nouvelle campgne', 'L\'admin a ajouté une nouvelle campagne à votre centre le 2023-06-16', 0, '2023-06-02', 0, 1, 0),
(142, 'Nouvelle campagne', 'Habib eddine Habib eddine il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-01, Participez maintenant !', 1, '2023-06-02', 24, 0, 0),
(143, 'Nouvelle campgne', 'L\'admin a ajouté une nouvelle campagne à votre centre le 2023-06-01', 1, '2023-06-02', 0, 4, 0),
(144, 'Nouvelle campagne', 'Reda Reda il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-22, Participez maintenant !', 0, '2023-06-02', 23, 0, 0),
(145, 'Nouvelle campagne', 'Tahiri Tahiri il y \r\n        une nouvelle campagne de don de sang dans votre ville le 2023-06-22, Participez maintenant !', 1, '2023-06-02', 26, 0, 0),
(146, 'Nouvelle campgne', 'L\'admin a ajouté une nouvelle campagne à votre centre le 2023-06-22', 0, '2023-06-02', 0, 1, 0),
(147, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 1, '2023-06-03', 0, 0, 1),
(148, 'Bienvenue', 'Bienvenue dans notre centre Ghita BENJLON', 1, '2023-06-06', 0, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `analyse`
--
ALTER TABLE `analyse`
  ADD PRIMARY KEY (`id_analyse`),
  ADD KEY `id_don` (`id_don`);

--
-- Index pour la table `campagne`
--
ALTER TABLE `campagne`
  ADD PRIMARY KEY (`id_campagne`),
  ADD KEY `id_centre` (`id_centre`);

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id_centre`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_membre` (`id_membre`),
  ADD KEY `id_centre` (`id_centre`);

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id_don`),
  ADD KEY `id_centre` (`id_centre`),
  ADD KEY `id_demande` (`id_demande`),
  ADD KEY `id_medecin` (`id_medecin`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`),
  ADD KEY `id_centre` (`id_centre`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `analyse`
--
ALTER TABLE `analyse`
  MODIFY `id_analyse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `campagne`
--
ALTER TABLE `campagne`
  MODIFY `id_campagne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `centre`
--
ALTER TABLE `centre`
  MODIFY `id_centre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `analyse`
--
ALTER TABLE `analyse`
  ADD CONSTRAINT `analyse_ibfk_1` FOREIGN KEY (`id_don`) REFERENCES `don` (`id_don`);

--
-- Contraintes pour la table `campagne`
--
ALTER TABLE `campagne`
  ADD CONSTRAINT `campagne_ibfk_1` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`);

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`),
  ADD CONSTRAINT `don_ibfk_2` FOREIGN KEY (`id_demande`) REFERENCES `demande` (`id_demande`),
  ADD CONSTRAINT `don_ibfk_3` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `don_ibfk_4` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
