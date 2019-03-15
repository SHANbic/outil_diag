-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 mars 2019 à 10:59
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hcc`
--

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE `prospects` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `structure` varchar(3) DEFAULT NULL,
  `formation_digitale` varchar(3) DEFAULT NULL,
  `projet_digital` varchar(3) DEFAULT NULL,
  `autres_interlocuteurs` varchar(3) NOT NULL,
  `remarques` text,
  `contact_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prospects`
--

INSERT INTO `prospects` (`id`, `email`, `structure`, `formation_digitale`, `projet_digital`, `autres_interlocuteurs`, `remarques`, `contact_le`) VALUES
(1, 'admin@admin.fr', 'TPE', 'oui', 'oui', 'oui', 'génial', '2019-03-13 16:52:42'),
(2, 'paokd@alert.com', 'PME', 'oui', 'non', '', 'love you guys', '2019-03-13 16:54:24'),
(3, 'aaa@aol.com', 'ETI', 'non', '', 'non', 'pas intéressé', '2019-03-13 16:55:00'),
(4, 'lilly@marshall.com', 'GE', 'oui', 'oui', 'non', 'lilyyy\r\n', '2019-03-13 16:55:54'),
(5, 'admin@admin.fr', 'GE', 'oui', 'oui', 'non', 'zejzodj', '2019-03-13 18:00:21');

-- --------------------------------------------------------

--
-- Structure de la table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `pack` varchar(10) NOT NULL,
  `contenu` text NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `solution`
--

INSERT INTO `solution` (`id`, `pack`, `contenu`, `prix`) VALUES
(1, 'Essentiel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla massa nisl, pulvinar id finibus et, rhoncus ut eros. Sed lobortis\r\n\r\n', '1990'),
(2, 'Premium', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla massa nisl, pulvinar id finibus et, rhoncus ut eros. Sed lobortis', '4990');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
