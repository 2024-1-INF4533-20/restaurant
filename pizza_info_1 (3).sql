-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 mars 2024 à 20:01
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
-- Base de données : `pizza_info`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom_User` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Commande` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Prix` double NOT NULL,
  `Date` date NOT NULL,
  `Adresse` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`Id`, `Nom_User`, `Commande`, `Prix`, `Date`, `Adresse`) VALUES
(1, 'Francis Lavigne', '[{\"id\":1,\"qte\":1},{\"id\":8,\"qte\":1},{\"id\":15,\"qte\":1}]', 97.7, '2024-02-04', '789 rue du King'),
(2, 'Francis Lavigne', '[\r\n            {\"id\":7, \"qte\":3},\r\n            {\"id\":6, \"qte\":1}, \r\n            {\"id\":15,\"qte\":1},\r\n            {\"id\":13, \"qte\":3},\r\n            {\"id\":14, \"qte\":1}]', 137.86, '2024-02-05', '789 Rue du King'),
(3, 'Francis Lavigne', '[{\"id\":7,\"qte\":1},{\"id\":15,\"qte\":1},{\"id\":13,\"qte\":1}]', 97.7, '2024-02-04', '789 Rue du King');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Ingredients` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Prix` double NOT NULL,
  `Image` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`Id`, `Type`, `Nom`, `Ingredients`, `Prix`, `Image`) VALUES
(1, 'Pizza', 'La Toute Garnie', 'Champignon, poivrons, pepperoni, mozzarella et sauce aux tomates', 24.49, 'Images/Pizzas/allDressed.jpg'),
(2, 'Pizza', 'Pepperoni Fromage', 'Pepperoni, mozzarella et sauce aux tomates', 22.49, 'Images/Pizzas/pepefro.jpg'),
(3, 'Pizza', 'Hawaïenne', 'Ananas, jambon, mozzarella et sauce aux tomates', 22.49, 'Images/Pizzas/hawaian.jpg'),
(4, 'Pizza', 'Végétarienne', 'Champignon, poivrons, olives, oignons et sauce aux tomates', 23.79, 'Images/Pizzas/vege.jpg'),
(5, 'Pizza', 'Poulet BBQ', 'Poulet blanc, oignons vrts, tomates, mozzarella et sauce BBQ', 26.99, 'Images/Pizzas/poulet.jpg'),
(6, 'Pizza', 'Méditérrannée', 'Tomates, olives, oignons, feta, mozzarella et sauce aux tomates', 24.99, 'Images/Pizzas/mediteranee.jpg'),
(7, 'Pizza', 'Carnivore', 'Pepperoni, jambon, bacon, mozzarella et sauce aux tomates', 26.99, 'Images/Pizzas/carnivore.jpg'),
(8, 'Pates', 'Spaghetti sauce tomates', 'Spaghetti, mozzarella et sauce aux tomates', 15.49, 'Images/Pates/SpagTomates.jpg'),
(9, 'Pates', 'Spaghetti sauce à la viande', 'Spaghetti, mozzarella et sauce à la viande', 15.49, 'Images/Pates/SpagViande.jpg'),
(10, 'Pates', 'Linguini Alfredo', 'Linguini, sauce Alfredo', 15.49, 'Images/Pates/linguiniAlfred.jpg'),
(11, 'Pates', 'Linguini Carbonara', 'Linguini, Sauce Carbonara', 15.49, 'Images/Pates/linguiniCarb.jpg'),
(12, 'Pates', 'Lasagne', 'lasagne, pepperoni, mozzarella et sauce à la viande', 15.49, 'Images/Pates/lasagne.jpg'),
(13, 'Breuvages', 'Café', 'sucre, cassonade, lait et crème offerts', 1.99, 'Images/breuvages/cafe.jpg'),
(16, 'Breuvages', 'Jus', 'Jus de pomme ou jus d\'orange', 2.49, 'Images/breuvages/jus.jpg'),
(14, 'Breuvages', 'Thé', 'choix de thé noir, vert ou orange pekoe', 1.99, 'Images/breuvages/the.jpg'),
(15, 'Breuvages', 'Boisson fontaine', 'Coke, Coke diète, Coke zéro, Racinette, Sprite, Fruitopia aux fraises, Fruitopia à l\'orange, Mtn Dew', 1.49, 'Images/breuvages/fontaine.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Courriel` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MotDePasse` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `Nom`, `Courriel`, `MotDePasse`) VALUES
(1, 'alex', 'alex@uqo.ca', '1234'),
(2, 'admin', 'admin@uqo.ca', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
