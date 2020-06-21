-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 21 Juin 2020 à 23:34
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `creamcode`
--

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic_brand`
--

CREATE TABLE `cosmetic_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cosmetic_brand`
--

INSERT INTO `cosmetic_brand` (`id`, `name`, `folder_name`, `picture_name`) VALUES
(1, 'Avril', 'avril', 'avril'),
(2, 'Sanoflore', 'sanoflore', 'sanoflore'),
(3, 'Nivea', 'nivea', 'nivea'),
(4, 'Head and Shoulders', 'head_and_shoulders', 'head_and_shoulders'),
(5, 'Mademoiselle Bio', 'mademoiselle_bio', 'mademoiselle_bio'),
(6, 'Garnier', 'garnier', 'garnier'),
(7, 'Marilou bio', 'marilou_bio', 'marilou_bio'),
(8, 'Weleda', 'weleda', 'weleda');

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic_ingredient`
--

CREATE TABLE `cosmetic_ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `human_impact_id` int(11) NOT NULL,
  `environment_impact_id` int(11) NOT NULL,
  `metadata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic_label`
--

CREATE TABLE `cosmetic_label` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cosmetic_label`
--

INSERT INTO `cosmetic_label` (`id`, `name`, `picture_name`) VALUES
(1, 'AB', 'ab'),
(2, 'BDIH', 'bdih'),
(3, 'Cosmebio', 'cosmebio'),
(4, 'Cruelty Free', 'cruelty_free'),
(5, 'Cruelty Free and Vegan', 'cruelty_free_and_vegan'),
(6, 'Ecocert', 'ecocert'),
(7, 'Made in France', 'made_in_france'),
(8, 'Natrue', 'natrue'),
(9, 'Nature et Progrès', 'nature_et_progres'),
(10, 'Slow Cosmétique', 'slow_cosmetique'),
(11, 'Vegan', 'vegan');

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic_product`
--

CREATE TABLE `cosmetic_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `has_alternative` tinyint(1) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic_type`
--

CREATE TABLE `cosmetic_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cosmetic_type`
--

INSERT INTO `cosmetic_type` (`id`, `name`) VALUES
(1, 'Nettoyant Visage'),
(2, 'Eau Micellaire'),
(3, 'Démaquillant'),
(4, 'Lotion Visage'),
(5, 'Savon'),
(6, 'Gel Douche'),
(7, 'Eau Florale'),
(8, 'Huile Végétale'),
(9, 'Huile Essentielle'),
(10, 'Gommage Visage'),
(11, 'Masque Visage'),
(12, 'Soin Lèvres'),
(13, 'Soin Visage'),
(14, 'Contour Des Yeux'),
(15, 'Soin Solaire'),
(16, 'Shampooing'),
(17, 'Après-Shampooing'),
(18, 'Gommage Cheveux'),
(19, 'Masque Cheveux'),
(20, 'Soin Capillaire'),
(21, 'Coloration'),
(22, 'Déodorant'),
(23, 'Soin dentaire');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_impact`
--

CREATE TABLE `ingredient_impact` (
  `id` int(11) NOT NULL,
  `impact_level` varchar(30) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ingredient_impact`
--

INSERT INTO `ingredient_impact` (`id`, `impact_level`, `color`) VALUES
(1, 'Bon', '00e64d'),
(2, 'Neutre', 'c2c2a3'),
(3, 'Allergène', 'ffff66'),
(4, 'À éviter', 'ffad33'),
(5, 'Danger', 'ff1a1a'),
(6, 'Inconnu', 'ffffff');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_origin`
--

CREATE TABLE `ingredient_origin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ingredient_origin`
--

INSERT INTO `ingredient_origin` (`id`, `name`) VALUES
(1, 'végétal'),
(2, 'animal'),
(3, 'minéral'),
(4, 'marine'),
(5, 'synthétique'),
(6, 'inconnu'),
(7, 'diverse');

-- --------------------------------------------------------

--
-- Structure de la table `product_alternative`
--

CREATE TABLE `product_alternative` (
  `original_id` int(11) NOT NULL,
  `alternative_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product_certification`
--

CREATE TABLE `product_certification` (
  `product_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product_composition`
--

CREATE TABLE `product_composition` (
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cosmetic_brand`
--
ALTER TABLE `cosmetic_brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cosmetic_ingredient`
--
ALTER TABLE `cosmetic_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cosmetic_ingredient_fk0` (`origin_id`),
  ADD KEY `cosmetic_ingredient_fk1` (`human_impact_id`),
  ADD KEY `cosmetic_ingredient_fk2` (`environment_impact_id`);

--
-- Index pour la table `cosmetic_label`
--
ALTER TABLE `cosmetic_label`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cosmetic_product`
--
ALTER TABLE `cosmetic_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cosmetic_product_fk0` (`brand_id`),
  ADD KEY `cosmetic_product_fk1` (`type_id`);

--
-- Index pour la table `cosmetic_type`
--
ALTER TABLE `cosmetic_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient_impact`
--
ALTER TABLE `ingredient_impact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient_origin`
--
ALTER TABLE `ingredient_origin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_alternative`
--
ALTER TABLE `product_alternative`
  ADD PRIMARY KEY (`original_id`,`alternative_id`),
  ADD KEY `product_alternative_fk1` (`alternative_id`);

--
-- Index pour la table `product_certification`
--
ALTER TABLE `product_certification`
  ADD PRIMARY KEY (`product_id`,`label_id`),
  ADD KEY `product_certification_fk1` (`label_id`);

--
-- Index pour la table `product_composition`
--
ALTER TABLE `product_composition`
  ADD PRIMARY KEY (`product_id`,`ingredient_id`,`position`),
  ADD KEY `product_composition_fk1` (`ingredient_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cosmetic_brand`
--
ALTER TABLE `cosmetic_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `cosmetic_ingredient`
--
ALTER TABLE `cosmetic_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cosmetic_label`
--
ALTER TABLE `cosmetic_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `cosmetic_product`
--
ALTER TABLE `cosmetic_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cosmetic_type`
--
ALTER TABLE `cosmetic_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `ingredient_impact`
--
ALTER TABLE `ingredient_impact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ingredient_origin`
--
ALTER TABLE `ingredient_origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cosmetic_ingredient`
--
ALTER TABLE `cosmetic_ingredient`
  ADD CONSTRAINT `cosmetic_ingredient_fk0` FOREIGN KEY (`origin_id`) REFERENCES `ingredient_origin` (`id`),
  ADD CONSTRAINT `cosmetic_ingredient_fk1` FOREIGN KEY (`human_impact_id`) REFERENCES `ingredient_impact` (`id`),
  ADD CONSTRAINT `cosmetic_ingredient_fk2` FOREIGN KEY (`environment_impact_id`) REFERENCES `ingredient_impact` (`id`);

--
-- Contraintes pour la table `cosmetic_product`
--
ALTER TABLE `cosmetic_product`
  ADD CONSTRAINT `cosmetic_product_fk0` FOREIGN KEY (`brand_id`) REFERENCES `cosmetic_brand` (`id`),
  ADD CONSTRAINT `cosmetic_product_fk1` FOREIGN KEY (`type_id`) REFERENCES `cosmetic_type` (`id`);

--
-- Contraintes pour la table `product_alternative`
--
ALTER TABLE `product_alternative`
  ADD CONSTRAINT `product_alternative_fk0` FOREIGN KEY (`original_id`) REFERENCES `cosmetic_product` (`id`),
  ADD CONSTRAINT `product_alternative_fk1` FOREIGN KEY (`alternative_id`) REFERENCES `cosmetic_product` (`id`);

--
-- Contraintes pour la table `product_certification`
--
ALTER TABLE `product_certification`
  ADD CONSTRAINT `product_certification_fk0` FOREIGN KEY (`product_id`) REFERENCES `cosmetic_product` (`id`),
  ADD CONSTRAINT `product_certification_fk1` FOREIGN KEY (`label_id`) REFERENCES `cosmetic_label` (`id`);

--
-- Contraintes pour la table `product_composition`
--
ALTER TABLE `product_composition`
  ADD CONSTRAINT `product_composition_fk0` FOREIGN KEY (`product_id`) REFERENCES `cosmetic_product` (`id`),
  ADD CONSTRAINT `product_composition_fk1` FOREIGN KEY (`ingredient_id`) REFERENCES `cosmetic_ingredient` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
