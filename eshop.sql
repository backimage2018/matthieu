-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 mars 2018 à 15:30
-- Version du serveur :  5.7.19-log
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `app_comments`
--

DROP TABLE IF EXISTS `app_comments`;
CREATE TABLE IF NOT EXISTS `app_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_creation` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `user_modif` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `app_faq`
--

DROP TABLE IF EXISTS `app_faq`;
CREATE TABLE IF NOT EXISTS `app_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_faq`
--

INSERT INTO `app_faq` (`id`, `questions`, `reponses`) VALUES
(1, 'Pourquoi ?', 'Parce que !'),
(2, 'Que mange t\'on ce midi ?', 'De la merde !'),
(3, 'ta gueule', 'merci'),
(4, 'test', 'reponse');

-- --------------------------------------------------------

--
-- Structure de la table `app_image`
--

DROP TABLE IF EXISTS `app_image`;
CREATE TABLE IF NOT EXISTS `app_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_image`
--

INSERT INTO `app_image` (`id`, `url`) VALUES
(4, 'product01.jpg'),
(5, 'product02.jpg'),
(6, 'product03.jpg'),
(7, 'product04.jpg'),
(8, 'product05.jpg'),
(9, 'product06.jpg'),
(10, 'product07.jpg'),
(11, 'product08.jpg'),
(12, 'carlos.png');

-- --------------------------------------------------------

--
-- Structure de la table `app_newsletter`
--

DROP TABLE IF EXISTS `app_newsletter`;
CREATE TABLE IF NOT EXISTS `app_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_creation` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `user_modif` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_289E2EB4E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_newsletter`
--

INSERT INTO `app_newsletter` (`id`, `email`, `user_creation`, `user_delete`, `user_modif`, `date_creation`, `date_delete`, `date_modif`, `deleted`) VALUES
(1, 'lala@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `app_products`
--

DROP TABLE IF EXISTS `app_products`;
CREATE TABLE IF NOT EXISTS `app_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soldes` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix_avant` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix_actuel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom_del_article` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `taille` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collection` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `marque` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `detail` longtext COLLATE utf8_unicode_ci,
  `categorie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `avaibility` tinyint(1) DEFAULT NULL,
  `user_creation` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `user_modif` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `countdowndate` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageobj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BB3A3AF7FB745B71` (`imageobj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_products`
--

INSERT INTO `app_products` (`id`, `status`, `soldes`, `prix_avant`, `prix_actuel`, `nom_del_article`, `taille`, `color`, `collection`, `marque`, `description`, `detail`, `categorie`, `display`, `avaibility`, `user_creation`, `user_delete`, `user_modif`, `date_creation`, `date_delete`, `date_modif`, `deleted`, `countdowndate`, `image`, `imageobj_id`) VALUES
(2, 'New', '20', '80', '50', 'Montre Goldy', 'L', NULL, 'Winter', 'E-SHOP', 'Montrez au reste du monde a quel point vous avez du gout...', 'Et montrez leur surtout qu\'ils n\'en n\'ont pas eux contrairement a vous !', 'Watch', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-28 00:00:00', './img/product02.jpg', 5),
(3, 'New', '20', '45', '32.5', 'Sacoche bleue Marine', 'L', NULL, 'Summer', 'Johny Mi-molle', 'Cette sacoche ravira petits et grands par son incomparable saveur aux fines herbes, ail de garonne et verre pilé.', 'Pas plus que nécessaire sinon rien', 'Shoes', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product01.jpg', 4),
(4, 'New', NULL, NULL, '24', 'Tennis Swaagy', NULL, NULL, 'Summer', 'E-SHOP', 'Une magnifique paire de tennis, recouverte de vieux clous rouillés pour le plus grand plaisir des fans du tétanos.', 'Plaira aux petits comme aux plus grands.', 'Shoes', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product04.jpg', 7),
(5, 'New', '-90', '150', '12.7', 'Porte-Carte', NULL, NULL, 'Autumn', 'Chic & Choc', 'Un porte carte qui vous donnera ce look d\'autiste que vous recherchez tant.', 'C\'est juste un porte carte tu t\'attend a voir quoi d\'autre ici ? Le nombre de carte que tu peux mettre ? Il y en a 72, ça t\'en bouche un coin hein ? Allez achète !', 'Divers', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product03.jpg', 6),
(6, 'New', NULL, NULL, '245.9', 'Bottes de dominatrices', NULL, NULL, 'Winter', 'Domina', 'Des talons assez costaud pour pouvoir faire un second trou aux gens qui vous manqueront de respect.', 'A ne pas louper !', 'Shoes', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product05.jpg', 8),
(7, NULL, '-50', '10.4', '8.2', 'Sacoche moisie', NULL, NULL, 'Autumn', 'Echec Critique', 'Une sacoche que nous n’arrivons pas a vendre, par pitié débarrassez nous en.', 'Nous n’aimons pas jeter, au pire offrez la a une personne que vous n\'aimez pas, un cadeau ça ne se refuse pas apres tout.', 'Bags', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product06.jpg', 9),
(8, NULL, NULL, NULL, '12.99', 'Outils pédagogique N°4', NULL, NULL, 'Summer', 'Stigmate', 'Enorme succes de la boutique E-SHOP, decouvrez cette magnifique ceinture et sa boucle en laiton aussi glaciale que le cœur de votre Ex, idéal pour corriger les mauvais garnements.', 'Un classique !', 'Cloth', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product08.jpg', 11),
(9, NULL, '-60', '28', '17', 'Sac a transport de briques', NULL, NULL, 'Spring', 'Stigmate', 'Parfait pour le transport de vos agglos, brique ou autre élément de bricolage, sur le chantier c\'est vous qui aurez le style.', 'C\'est tout !', 'Bags', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, './img/product07.jpg', 10),
(14, 'New', NULL, NULL, '50', 'test', NULL, NULL, 'Spring', 'E-SHOP', 'sdsdfdsf', 'sdfsdfsd', 'sdfsdfsd', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 17:11:00', NULL, 12);

-- --------------------------------------------------------

--
-- Structure de la table `app_review`
--

DROP TABLE IF EXISTS `app_review`;
CREATE TABLE IF NOT EXISTS `app_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) DEFAULT NULL,
  `message` tinytext COLLATE utf8_unicode_ci,
  `date_creation` datetime DEFAULT NULL,
  `user_creation` int(11) DEFAULT NULL,
  `user_delete` int(11) DEFAULT NULL,
  `user_modif` int(11) DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_9C40EC466C8A81A9` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_review`
--

INSERT INTO `app_review` (`id`, `products_id`, `message`, `date_creation`, `user_creation`, `user_delete`, `user_modif`, `date_delete`, `date_modif`, `deleted`) VALUES
(6, 3, 'Mother fucker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, 'ta race', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 5, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C2502824F85E0677` (`username`),
  UNIQUE KEY `UNIQ_C2502824E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `password`, `email`, `is_active`, `roles`) VALUES
(9, 'fab2', '$2y$13$rDMKjbcqMKd4zx4rRGnEmelvAEW2BO98OlXQpsuTOFFqcOXMlZSai', 'fab2@mail.com', 1, 'ROLE_ADMIN'),
(10, 'jojo', '$2y$13$nMyV0NOt5UprfiPCY3Ya0uwhdSxwSQQclKYsGxCsBrNG4iHQiGUK.', 'jojo@mail.com', 1, 'ROLE_USER');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180307143742'),
('20180309131359');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `app_products`
--
ALTER TABLE `app_products`
  ADD CONSTRAINT `FK_BB3A3AF7FB745B71` FOREIGN KEY (`imageobj_id`) REFERENCES `app_image` (`id`);

--
-- Contraintes pour la table `app_review`
--
ALTER TABLE `app_review`
  ADD CONSTRAINT `FK_9C40EC466C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `app_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
