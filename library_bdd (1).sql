-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 fév. 2025 à 13:36
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `library_userrs`
--

DROP TABLE IF EXISTS `library_userrs`;
CREATE TABLE IF NOT EXISTS `library_userrs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `e_mail` varchar(250) NOT NULL,
  `photo` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `library_userrs`
--

INSERT INTO `library_userrs` (`id`, `nom`, `prenom`, `date_de_naissance`, `e_mail`, `photo`, `password`) VALUES
(1, 'RAKOTO', 'badoda', '2018-05-30', 'badoda@gmail.com', '13739417416.', 'mdp'),
(2, 'RAKOTO', 'badoda', '2016-06-08', 'zanaka@gmail.com', '63181791337.jpeg', 'mdp'),
(3, 'RAKOTO', 'badoda', '2025-01-08', 'akoho@gmail.com', '10904932653.', 'mdp'),
(4, 'RAKOTO', 'badoda', '2014-06-05', 'user@gmail.com', '29859297967.jpeg', 'mdp'),
(5, 'RAKOTO', 'badoda', '2025-01-02', 'ganagana@gmail.com', '12368434640.', 'mdp'),
(6, 'RAKOTO', 'badoda', '2025-01-16', 'example@gmail.com', '11102863174.jpeg', 'mdp'),
(7, 'SOSOA', 'herisoa', '2025-01-03', 'dec@gmail.com', '33387605298.jpeg', 'dec'),
(8, 'DETY', 'herisoa', '2022-11-11', 'katsta@gmail.com', '56030714700.jpeg', 'mdp');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripton` text COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `pages` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `photo`, `categories`, `descripton`, `prix`, `pages`) VALUES
(9, 'est-ce-que tu m\'entends1\r\n', '3fd44be6e427ca189c714a82eb1501f3.jpg', 'fantasy', '', 0, 0),
(10, 'est-ce-que tu m\'entends2', 'jamais-plus-colleen-hoover-200-300.jpg', 'fantasy', '', 0, 0),
(11, 'est-ce que tu m\'enttend3', 'je-savais-que-tu-m-attendais.jpg', 'fantasy', '', 0, 0),
(13, 'est-ce que tu m\'entend4', 'Romeo-et-Juliette-de-William-Shakespeare.jpg', 'drame', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et voluptate quia, ipsam repellendus illum doloremque possimus velit mollitia neque adipisci nam minima asperiores cumque, dolores ipsa assumenda aliquid quae?', 0, 0),
(14, 'est-ce que tu m\'entend5', '51jhhTowUdL._AC_UF1000,1000_QL80_.jpg', 'roman', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et voluptate quia, ipsam repellendus illum doloremque possimus velit mollitia neque adipisci nam minima asperiores cumque, dolores ipsa assumenda aliquid quae?', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `location_system`
--

DROP TABLE IF EXISTS `location_system`;
CREATE TABLE IF NOT EXISTS `location_system` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` datetime NOT NULL,
  `lend_book_id` int NOT NULL,
  `lender_user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `pdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lend_books_number` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mdp`, `email`, `pdp`, `lend_books_number`) VALUES
(17, 'RAKOTO', 'Jean Marc Thierry', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', 'thierry@gmail.com', '', 0),
(18, 'ANDRIAMAMPIANINA', 'Tsanta Mirindra Famenontsoa', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', 'tandiamampianina@gmail.com', '53758785660.png', 0),
(30, 'SMALL', 'Tolotra', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', 'tolotra@gmail.com', '', 0),
(31, 'EG', 'Eugène', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', 'eg@gmail.com', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
