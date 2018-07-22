-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 juil. 2018 à 11:02
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `creativeedu`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id_qcm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_possible_answers` int(11) NOT NULL,
  PRIMARY KEY (`id_qcm`,`id_user`,`id_possible_answers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `insertedDate` date NOT NULL,
  `updatedDate` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `filePath` varchar(500) NOT NULL,
  `fileName` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `title`, `description`, `filePath`, `fileName`, `status`, `insertedDate`, `updatedDate`, `id_user`) VALUES
(1, 'testazeazezea', 'azeazeazeazeaze', 'public/courses/1_5b47819483919.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:28:04', '2018-07-12 16:28:04', 1),
(2, 'dsef75sf75se', 'azeazeazeazeaze', 'public/courses/1_5b4784245d9f5.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:39:00', '2018-07-18 21:19:08', 1),
(3, 'testazeazezezd77575', 'azeazeazeazeaze', 'public/courses/1_5b47844308849.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:39:31', '2018-07-18 21:19:04', 1),
(4, 'pmplpokolod5f', 'azeazeazeazeaze', 'public/courses/1_5b4784478b8af.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:39:35', '2018-07-18 21:23:43', 5),
(5, 'tzeazezea', 'azeazeazeazeaze', 'public/courses/1_5b47844dac16d.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:39:41', '2018-07-18 21:19:00', 1),
(6, 'tefggh68hh8j', 'azeazeazeazeaze', 'public/courses/1_5b4784517dc17.pdf', 'Vocabulary themes.pdf', 1, '2018-07-12 16:39:45', '2018-07-18 21:19:14', 1),
(7, 'zertyyui', 'zzzzzzzzz', 'public/courses/1_5b478f187ace0.pdf', 'vocabulary short list.pdf', 1, '2018-07-12 17:25:44', '2018-07-12 17:25:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `course_category`
--

DROP TABLE IF EXISTS `course_category`;
CREATE TABLE IF NOT EXISTS `course_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `course_category`
--

INSERT INTO `course_category` (`id`, `name`, `status`, `insertedDate`, `updatedDate`, `id_user`) VALUES
(1, 'Sans catégorie', 1, '2018-07-21 12:47:54', '2018-07-21 12:47:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2500) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` date NOT NULL,
  `updatedDate` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `possible_answers`
--

DROP TABLE IF EXISTS `possible_answers`;
CREATE TABLE IF NOT EXISTS `possible_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(250) NOT NULL,
  `insertedDate` date NOT NULL,
  `updatedDate` date NOT NULL,
  `id_qcm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` date NOT NULL,
  `updatedDate` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `qcm_course_link`
--

DROP TABLE IF EXISTS `qcm_course_link`;
CREATE TABLE IF NOT EXISTS `qcm_course_link` (
  `id_course` int(11) NOT NULL,
  `id_qcm` int(11) NOT NULL,
  PRIMARY KEY (`id_course`,`id_qcm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`, `status`) VALUES
(1, 'Administrateur', 1),
(2, 'Apprenant', 1),
(3, 'En attente d\'attribution de rôle', 1),
(4, 'Professeur', 1),
(5, 'En attente de validation mail', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role_qcm_link`
--

DROP TABLE IF EXISTS `role_qcm_link`;
CREATE TABLE IF NOT EXISTS `role_qcm_link` (
  `id_qcm` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_qcm`,`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(-1, 'Banni'),
(0, 'Désactivé / Supprimé'),
(1, 'Activé');

-- --------------------------------------------------------

--
-- Structure de la table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` date NOT NULL,
  `updatedDate` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `insertedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profilePicPath` varchar(250) DEFAULT 'public/images/profilePictures/default-user.png',
  `id_role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `pwd`, `email`, `status`, `token`, `insertedDate`, `updatedDate`, `profilePicPath`, `id_role`) VALUES
(1, 'QUENTIN', 'DENISOT', '$2y$10$z7DKcDWXBebIYb7/4e2RYO/NMMwLJlWmGhat.24I1YQyV4.rMVx3G', 'quentindenisot@orange.fr', 1, 'c22efe9bacd0a371bf7f', '2018-05-15 08:54:35', '2018-07-18 21:42:44', 'public/images/profilePictures/default-user.png', 1),
(2, 'ARNAUD', 'BOST', '$2y$10$dAFD6eSCQ84DFuFpxicOrOGwCk5Kn88e7hyx5DGQ4yDsQvOvnBA0m', 'arnaudrf60@gmail.com', 1, 'cfb09bbed45f904e0a28', '2018-05-15 08:54:49', '2018-05-31 15:21:16', 'public/images/profilePictures/default-user.png', 3),
(3, 'JULIEN', 'ROUX', '$2y$10$.hbFgrkZFfln.45rZ6Q6SO2NaqUNVkiMR5.KIO0TTBrCj.3K1UjRW', 'julienroux94@gmail.com', 1, '6299d91a06549a156a5c', '2018-05-15 08:55:53', '2018-05-31 15:21:16', 'public/images/profilePictures/default-user.png', 3),
(4, 'THÉO', 'SENOUSSAOUI', '$2y$10$aKcpJv5w2oBiOlYHLinNAe7HuQD5cMyhFVuFSeHgMVDJbB1w3R.w.', 'theosen95@gmail.com', 1, 'a2997c60cc8a0b9006cf', '2018-05-16 16:49:39', '2018-07-18 21:52:16', 'public/images/profilePictures/default-user.png', 4),
(5, 'QUENTIN', 'DENISOT', '$2y$10$UwcFmGSDCGw08rXba6jcHu./VqcKX8d9YHP.EZ6zrwcoKUlmkVA0e', 'qdenisot@gmail.com', 1, '9ba55622a2b0be10f2c2', '2018-07-09 22:44:40', '2018-07-18 21:41:04', 'public/images/profilePictures/default-user.png', 4),
(6, 'THEO', 'SENOUSSAOUI', '$2y$10$jvBrJ6ztbgAx6iVsGqB.U.3fwTxU.ios3AvFACulsYd4eQFai2OtW', 'theosen@free.fr', 1, 'd940e67b6c273ebe2026', '2018-07-10 10:18:45', '2018-07-10 10:18:45', 'public/images/profilePictures/default-user.png', 5),
(7, 'TEST', 'TEST', '$2y$10$gu87tbJBf5aD4NuTS0B8MOSmdt/W2a.tBJ/qYEopUdiqgz5oxy6EC', '4att3@wimsg.com', 1, 'fe0f7cc737c6e4ce4d21', '2018-07-10 10:38:16', '2018-07-14 16:41:06', 'public/images/profilePictures/default-user.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `insertedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL COMMENT 'id du user ayant créé le groupe',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_group_link`
--

DROP TABLE IF EXISTS `user_group_link`;
CREATE TABLE IF NOT EXISTS `user_group_link` (
  `id_user` int(11) NOT NULL COMMENT 'voir table user',
  `id_user_group` int(11) NOT NULL COMMENT 'voir table user_group',
  PRIMARY KEY (`id_user`,`id_user_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
