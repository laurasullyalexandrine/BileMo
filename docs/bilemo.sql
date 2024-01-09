-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 jan. 2024 à 20:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bilemo`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Apple', '2024-01-09 20:16:58', NULL, 'Apple'),
(2, 'Samsung', '2024-01-09 20:16:58', NULL, 'Samsung'),
(3, 'Honor', '2024-01-09 20:16:58', NULL, 'Honor'),
(4, 'Huawei', '2024-01-09 20:16:58', NULL, 'Huawei'),
(5, 'Google', '2024-01-09 20:16:58', NULL, 'Google');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `name` varchar(180) NOT NULL,
  `siret` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `slug` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `roles`, `password`, `name`, `siret`, `created_at`, `updated_at`, `slug`, `phone`) VALUES
(1, 'fransk-sinatra@allthesmart.com', '[\"ROLE_ADMIN\"]', '$2y$13$9PoBXTLQb2iQCIiJM3YGY.b3TcrUIU96tNGJl2TzDdOlF5V6tAO.W', 'All The Smart', 'XXX XXX XXX XXXXX', '2024-01-09 20:17:00', NULL, 'all-the-smart', '0644251233'),
(2, 'gracekelly@high-end-smart.com', '[\"ROLE_ADMIN\"]', '$2y$13$y4uZ7rUy.Zbk0ZWmTGSZ9uw.7CTYBrbocPbud0LomFYH8qvzPvgZS', 'High End Smart', 'XXX XXX XXX XXXXX', '2024-01-09 20:17:01', NULL, 'high-end-smart', '0609080706');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231124082414', '2024-01-09 20:16:44', 97),
('DoctrineMigrations\\Version20231124085421', '2024-01-09 20:16:44', 13),
('DoctrineMigrations\\Version20231124085853', '2024-01-09 20:16:44', 15),
('DoctrineMigrations\\Version20231124091345', '2024-01-09 20:16:44', 13),
('DoctrineMigrations\\Version20231124095841', '2024-01-09 20:16:44', 195),
('DoctrineMigrations\\Version20231124153931', '2024-01-09 20:16:44', 7),
('DoctrineMigrations\\Version20231126165852', '2024-01-09 20:16:44', 39),
('DoctrineMigrations\\Version20231126173211', '2024-01-09 20:16:44', 12),
('DoctrineMigrations\\Version20231126175059', '2024-01-09 20:16:44', 95),
('DoctrineMigrations\\Version20231207130042', '2024-01-09 20:16:44', 7),
('DoctrineMigrations\\Version20231207131732', '2024-01-09 20:16:44', 6),
('DoctrineMigrations\\Version20231208091845', '2024-01-09 20:16:44', 7);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `phone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `created_at`, `updated_at`, `phone_id`) VALUES
(1, 'galaxy-s23-blanc.webp', '2024-01-09 20:17:14', NULL, 4),
(2, 'galaxy-s23-gris.webp', '2024-01-09 20:17:14', NULL, 4),
(3, 'galaxy-s23-noir.webp', '2024-01-09 20:17:14', NULL, 4),
(4, 'galaxy-s23-ultra-bordeaux.webp', '2024-01-09 20:17:14', NULL, 4),
(5, 'galaxy-s23-ultra-creme.webp', '2024-01-09 20:17:14', NULL, 4),
(6, 'galaxy-s23-ultra-noir.webp', '2024-01-09 20:17:14', NULL, 4),
(7, 'galaxy-s23-ultra-rose.webp', '2024-01-09 20:17:14', NULL, 4),
(8, 'galaxy-z-flip5-creme.webp', '2024-01-09 20:17:14', NULL, 11),
(9, 'galaxy-z-flip5-noir.webp', '2024-01-09 20:17:14', NULL, 11),
(10, 'galaxy-z-flip5-rose.webp', '2024-01-09 20:17:14', NULL, 11),
(11, 'galaxy-z-flip5-vert.webp', '2024-01-09 20:17:14', NULL, 11),
(12, 'galaxy-z-fold5-bleu-galce.webp', '2024-01-09 20:17:14', NULL, 15),
(13, 'galaxy-z-fold5-creme.webp', '2024-01-09 20:17:14', NULL, 15),
(14, 'galaxy-z-fold5-noir.webp', '2024-01-09 20:17:14', NULL, 15),
(15, 'google-p8-pro-noir.webp', '2024-01-09 20:17:14', NULL, 18),
(16, 'google-p8-pro-rose.webp', '2024-01-09 20:17:14', NULL, 18),
(17, 'google-p8-pro.webp', '2024-01-09 20:17:14', NULL, 18),
(18, 'honor-magic-5-noir.webp', '2024-01-09 20:17:14', NULL, 21),
(19, 'honor-magic-5-vert.webp', '2024-01-09 20:17:14', NULL, 21);

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `model` varchar(64) NOT NULL,
  `color` varchar(10) NOT NULL,
  `operator_lock` varchar(84) NOT NULL,
  `screen_size` decimal(10,1) NOT NULL,
  `storage_capacity` varchar(10) NOT NULL,
  `dual_sim` tinyint(1) NOT NULL,
  `operating_system` varchar(10) NOT NULL,
  `network` varchar(5) NOT NULL,
  `card_reader` tinyint(1) NOT NULL,
  `release_year` int(11) NOT NULL,
  `garantee` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `slug` varchar(128) NOT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phone`
--

INSERT INTO `phone` (`id`, `model`, `color`, `operator_lock`, `screen_size`, `storage_capacity`, `dual_sim`, `operating_system`, `network`, `card_reader`, `release_year`, `garantee`, `description`, `created_at`, `updated_at`, `slug`, `brand_id`) VALUES
(1, 'iPhone 15 Pro Max', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Harum qui laboriosam vel aut sequi.', '2024-01-09 20:17:13', NULL, 'iphone-15-pro-max', 1),
(2, 'iPhone 15 Pro Max', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Aut ut tempora possimus distinctio ut est.', '2024-01-09 20:17:13', NULL, 'iphone-15-pro-max', 1),
(3, 'iPhone 15 Pro Max', 'naturel', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Sint nisi minus qui dolor ad alias ipsa.', '2024-01-09 20:17:13', NULL, 'iphone-15-pro-max', 1),
(4, 'Galaxy S23', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Rem qui dolorem quisquam doloremque fugit dolorem voluptas.', '2024-01-09 20:17:13', NULL, 'galaxy-s23', 2),
(5, 'Galaxy S23', 'blanc', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Eveniet nemo qui recusandae veniam occaecati.', '2024-01-09 20:17:13', NULL, 'galaxy-s23', 2),
(6, 'Galaxy S23', 'gris', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Sint recusandae odit blanditiis incidunt ullam assumenda.', '2024-01-09 20:17:13', NULL, 'galaxy-s23', 2),
(7, 'Galaxy S23 Ultra', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Alias est et dolor rerum.', '2024-01-09 20:17:13', NULL, 'galaxy-s23-ultra', 2),
(8, 'Galaxy S23 Ultra', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Cum voluptatem corporis dolorem perferendis et.', '2024-01-09 20:17:13', NULL, 'galaxy-s23-ultra', 2),
(9, 'Galaxy S23 Ultra', 'bordeaux', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Dignissimos quae nam rem explicabo saepe assumenda quod.', '2024-01-09 20:17:13', NULL, 'galaxy-s23-ultra', 2),
(10, 'Galaxy S23 Ultra', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Quas cum harum sit modi.', '2024-01-09 20:17:13', NULL, 'galaxy-s23-ultra', 2),
(11, 'Galaxy Z Flip5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Quo culpa qui molestias inventore nobis.', '2024-01-09 20:17:13', NULL, 'galaxy-z-flip5', 2),
(12, 'Galaxy Z Flip5', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Vel dolores officiis ipsum molestias velit earum.', '2024-01-09 20:17:13', NULL, 'galaxy-z-flip5', 2),
(13, 'Galaxy Z Flip5', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Sint tempora placeat unde et aut in.', '2024-01-09 20:17:13', NULL, 'galaxy-z-flip5', 2),
(14, 'Galaxy Z Flip5', 'vert', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Qui itaque inventore nesciunt.', '2024-01-09 20:17:13', NULL, 'galaxy-z-flip5', 2),
(15, 'Galaxy Z Fold5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Culpa ad possimus ea et porro maiores est tempore.', '2024-01-09 20:17:13', NULL, 'galaxy-z-fold5', 2),
(16, 'Galaxy Z Fold5', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Aut id error magnam aut.', '2024-01-09 20:17:13', NULL, 'galaxy-z-fold5', 2),
(17, 'Galaxy Z Fold5', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Et impedit possimus neque fuga.', '2024-01-09 20:17:13', NULL, 'galaxy-z-fold5', 2),
(18, 'Google P8 Pro', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Iste repellat incidunt iusto neque vitae.', '2024-01-09 20:17:13', NULL, 'google-p8-pro', 5),
(19, 'Google P8 Pro', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Aut sequi dicta voluptatem sapiente magni cupiditate.', '2024-01-09 20:17:13', NULL, 'google-p8-pro', 5),
(20, 'Google P8 Pro', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Architecto et quod ut et.', '2024-01-09 20:17:13', NULL, 'google-p8-pro', 5),
(21, 'Honor Magic 5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Incidunt dolores ut sunt magnam aut dignissimos.', '2024-01-09 20:17:13', NULL, 'honor-magic-5', 3),
(22, 'Honor Magic 5', 'vert', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Repudiandae consequatur voluptas molestias deleniti.', '2024-01-09 20:17:13', NULL, 'honor-magic-5', 3),
(23, 'Huawei P6O Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Omnis recusandae dolore dolores rerum sed qui omnis.', '2024-01-09 20:17:13', NULL, 'huawei-p6o-pro', 4),
(24, 'Huawei X3 Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Debitis aut adipisci et et harum dicta ipsa libero.', '2024-01-09 20:17:13', NULL, 'huawei-x3-pro', 4),
(25, 'Huawei P5O Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Eligendi deserunt deserunt enim.', '2024-01-09 20:17:13', NULL, 'huawei-p5o-pro', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(34) NOT NULL,
  `lastname` varchar(84) NOT NULL,
  `civility` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `civility`, `phone`, `email`, `password`, `created_at`, `updated_at`, `client_id`) VALUES
(1, 'Joseph', 'Raynaud', 'monsieur', '0604100961', 'joseph.raynaud@dbmail.com', '$2y$12$FXcGvpc1Z1tPyAQAFYejr.sxMHF8sHz8t.oQaP6XI5.XPoBb6oj3a', '2024-01-09 20:17:02', NULL, 2),
(2, 'Vincent', 'Schmitt', 'monsieur', '0604100961', 'vincent.schmitt@orange.fr', '$2y$12$xFhQpozN14TmG0B8kCr/.OatIJF0Thnc/6x6mdtv7anrEeu8HDuRW', '2024-01-09 20:17:03', NULL, 2),
(3, 'Dominique', 'Leveque', 'monsieur', '0604100961', 'dominique.leveque@wanadoo.fr', '$2y$12$nrRpjlyk9/g9Oyl9zljWw.FYxjZXcd5ILuqXuvE9BQjtu/BEAjr3q', '2024-01-09 20:17:03', NULL, 2),
(4, 'Gilles', 'Collin', 'monsieur', '0604100961', 'gilles.collin@sfr.fr', '$2y$12$fjstgMJFwAjBxIuRNzelaO7wQhGJbynuRiOotpo5dqwRfb9bTLARK', '2024-01-09 20:17:03', NULL, 2),
(5, 'Georges', 'Munoz', 'monsieur', '0604100961', 'georges.munoz@gmail.com', '$2y$12$zq8GUtLNIiaRhtOyx48F0.QZ5V5.IKthOCT1ipcmeYY63mAf0JT5i', '2024-01-09 20:17:04', NULL, 2),
(6, 'François', 'Delaunay', 'monsieur', '0604100961', 'françois.delaunay@hotmail.fr', '$2y$12$ug2PyBRZTkNPek3AfsYBWuOhODBoHL0LiuOvuMbSo74R7yyjYa2qe', '2024-01-09 20:17:04', NULL, 2),
(7, 'Robert', 'Gauthier', 'monsieur', '0604100961', 'robert.gauthier@orange.fr', '$2y$12$s2e7XHg7k.4mQf/4Welbxe5kDvKWFkCtWQzPg8S4NlYxxAumcHi9W', '2024-01-09 20:17:04', NULL, 2),
(8, 'Henri', 'Leroux', 'monsieur', '0604100961', 'henri.leroux@yahoo.fr', '$2y$12$HKYGhlNWDkniw85irLSYxeZ/VZFVQOsfoHiQTbino5nph/m.e5S0y', '2024-01-09 20:17:05', NULL, 2),
(9, 'Isaac', 'Masson', 'monsieur', '0604100961', 'isaac.masson@gmail.com', '$2y$12$kmWQFTG7lkonBqzPHvi4guPRubko.XblC5MHhKmpjeEBwJiJjgK4q', '2024-01-09 20:17:05', NULL, 2),
(10, 'Paul', 'Samson', 'monsieur', '0604100961', 'paul.samson@noos.fr', '$2y$12$13kRgtly1ndLxrerl24BMu2IdXIGrl.x2g/SHUr/4Wg486jcF23iS', '2024-01-09 20:17:05', NULL, 2),
(11, 'Michel', 'Klein', 'monsieur', '0604100961', 'michel.klein@noos.fr', '$2y$12$zAZVb0EV5E7tMUjVHaQvi.NL6bVecwFKEMPR33ZqO2aV4v0KOqOou', '2024-01-09 20:17:06', NULL, 2),
(12, 'Henri', 'Renaud', 'monsieur', '0604100961', 'henri.renaud@yahoo.fr', '$2y$12$qaV6yHD9j81TiO8ILD4Y5Ooc3Mt1zNjLGvqolabhSJ2jY9/5rP/ru', '2024-01-09 20:17:06', NULL, 2),
(13, 'Stéphane', 'Ledoux', 'monsieur', '0604100961', 'stéphane.ledoux@free.fr', '$2y$12$zzjmYBNg1CcTnpBv36AiWe067RN4nXco628iiih5i9C0OpB.eBu4W', '2024-01-09 20:17:07', NULL, 2),
(14, 'Louis', 'Blanc', 'monsieur', '0604100961', 'louis.blanc@gmail.com', '$2y$12$eChZhe9zOSCnksrSvOmh7OrwdXixzedSirQ/NmdgzdmGdxdnBFWgS', '2024-01-09 20:17:07', NULL, 2),
(15, 'Yves', 'Chevallier', 'monsieur', '0604100961', 'yves.chevallier@hotmail.fr', '$2y$12$MIE/2J9JXmZ5ZSKy74fgxe6x.QLMf0VE4xIGQrsWXQd9cRZ4nUZMe', '2024-01-09 20:17:07', NULL, 2),
(16, 'Paulette', 'Besson', 'madame', '0604100961', 'paulette.besson@noos.fr', '$2y$12$VwT22sk2xSlWerqcAgSkMugQiEIf4XzPkXUl/7BIhg.gSlQg/F1Z6', '2024-01-09 20:17:08', NULL, 2),
(17, 'Marguerite', 'Georges', 'madame', '0604100961', 'marguerite.georges@free.fr', '$2y$12$EcG2iX2xof.Wc9odA85uf.3wZwr8781Jygz4YI1ixUXxQcoGKjAfa', '2024-01-09 20:17:08', NULL, 2),
(18, 'Clémence', 'Leclercq', 'madame', '0604100961', 'clémence.leclercq@sfr.fr', '$2y$12$IQ4QrNJ8oy8BJ99VvvZClu4Tr0jiRsgwCbfTVIMZ0fS1hD/Cb/012', '2024-01-09 20:17:08', NULL, 2),
(19, 'Madeleine', 'Potier', 'madame', '0604100961', 'madeleine.potier@live.com', '$2y$12$A8TEf04RAdO.I.tS9G3zXOq5fJNJQsGe.1Jqdn431pavifvlKPNFG', '2024-01-09 20:17:09', NULL, 2),
(20, 'Suzanne', 'Legrand', 'madame', '0604100961', 'suzanne.legrand@wanadoo.fr', '$2y$12$WDciFpMwhhbWFNpebahjeeN2zD6/Ik259p1Zjt/MgCPOx2QnC9Z2y', '2024-01-09 20:17:09', NULL, 2),
(21, 'Dominique', 'Dufour', 'madame', '0604100961', 'dominique.dufour@wanadoo.fr', '$2y$12$f8WZ6xyGmCeboWu01c7wEOT7i8U2z8XnnCv3pREPU57V.SOPc11He', '2024-01-09 20:17:09', NULL, 2),
(22, 'Diane', 'Schmitt', 'madame', '0604100961', 'diane.schmitt@wanadoo.fr', '$2y$12$JzSqtmfwwC2qpud4A2w/WOgPbM0hcCVbfxedGzRcfyMQJ1H1PyHvC', '2024-01-09 20:17:10', NULL, 2),
(23, 'Maryse', 'Toussaint', 'madame', '0604100961', 'maryse.toussaint@club-internet.fr', '$2y$12$bnJ9JmeR/sO0.pjozfLB2.exhHWqQrb/liTSxCk3MJXmTdLxRU7T2', '2024-01-09 20:17:10', NULL, 2),
(24, 'Amélie', 'Faivre', 'madame', '0604100961', 'amélie.faivre@sfr.fr', '$2y$12$HVdIVp6DZFARWOB/jHC7huDdcxMDpExWi8WMFOhOlGBT6.kK6WAFa', '2024-01-09 20:17:11', NULL, 2),
(25, 'Agathe', 'Boutin', 'madame', '0604100961', 'agathe.boutin@wanadoo.fr', '$2y$12$S8ay9VoQJCHdRAo69RB/aelTLcXELGovdG9Ovbblj9N2WkDGmMoO2', '2024-01-09 20:17:11', NULL, 2),
(26, 'Françoise', 'Merle', 'madame', '0604100961', 'françoise.merle@dbmail.com', '$2y$12$w6VQ1dVoKguajp7GE4BHNe5NQ2IZ19tSVBu3tvexN13/JqO.8neLq', '2024-01-09 20:17:11', NULL, 2),
(27, 'Diane', 'Guyon', 'madame', '0604100961', 'diane.guyon@wanadoo.fr', '$2y$12$SFdpie7.ft0/yvdge.vnOeh4r9bikX982.KxQ307EZmYFGr9cOW7C', '2024-01-09 20:17:12', NULL, 2),
(28, 'Simone', 'Bouchet', 'madame', '0604100961', 'simone.bouchet@club-internet.fr', '$2y$12$x7XzNn1k952eL3g7WSW0N.WRYGMMs4kklc4TSRPm.VF5LCoSe.0ym', '2024-01-09 20:17:12', NULL, 2),
(29, 'Danielle', 'Imbert', 'madame', '0604100961', 'danielle.imbert@free.fr', '$2y$12$8erfjWdkJbdEfUF.V.Ks..ogFJOtelyepgvLxxIfLBTKr4lYtPDeG', '2024-01-09 20:17:12', NULL, 2),
(30, 'Jeannine', 'Valette', 'madame', '0604100961', 'jeannine.valette@live.com', '$2y$12$RuuTxQ8a6pC7UN.9PjGd2e.G6TlvqKa4AHkcMtrM1NtGSihT0ir6e', '2024-01-09 20:17:13', NULL, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045F3B7323CB` (`phone_id`);

--
-- Index pour la table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_444F97DD44F5D008` (`brand_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D64919EB6921` (`client_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F3B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`);

--
-- Contraintes pour la table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `FK_444F97DD44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
