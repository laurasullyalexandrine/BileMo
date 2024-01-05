-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 jan. 2024 à 11:32
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
(301, 'Apple', '2023-12-07 14:05:46', NULL, 'Apple'),
(302, 'Samsung', '2023-12-07 14:05:46', NULL, 'Samsung'),
(303, 'Honor', '2023-12-07 14:05:46', NULL, 'Honor'),
(304, 'Huawei', '2023-12-07 14:05:46', NULL, 'Huawei'),
(305, 'Google', '2023-12-07 14:05:46', NULL, 'Google');

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
(45, 'gracekelly@high-end-smart.com', '[\"ROLE_ADMIN\"]', '$2y$13$tcXHH0r4KdWKfmp6BcZ5jemEpDvqJLPl7zcqPRRKO0npqFIfGpBau', 'High End Smart', 'XXX XXX XXX XXXXX', '2023-12-07 14:05:46', NULL, 'high-end-smart', '0644251233'),
(49, 'fransk-sinatra@allthesmart.com', '[\"ROLE_ADMIN\"]', '$2y$13$0qsVR99Q8h8jhBVbXLSb9O/iySUBDksg38Dg8geOmJnQx7NqkTCcO', 'All The Smart', 'XXX XXX XXX XXXXX', '2023-12-08 10:53:35', NULL, 'all-the-smart', '0744251233');

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
('DoctrineMigrations\\Version20231124082414', '2023-11-24 09:24:24', 63),
('DoctrineMigrations\\Version20231124085421', '2023-11-24 09:54:29', 28),
('DoctrineMigrations\\Version20231124085853', '2023-11-24 09:59:09', 38),
('DoctrineMigrations\\Version20231124091345', '2023-11-24 10:13:53', 21),
('DoctrineMigrations\\Version20231124095841', '2023-11-24 10:58:49', 212),
('DoctrineMigrations\\Version20231124153931', '2023-11-24 16:39:41', 73),
('DoctrineMigrations\\Version20231126165852', '2023-11-26 17:59:02', 128),
('DoctrineMigrations\\Version20231126173211', '2023-11-26 18:32:21', 17),
('DoctrineMigrations\\Version20231126175059', '2023-11-26 18:51:08', 158),
('DoctrineMigrations\\Version20231207130042', '2023-12-07 14:00:50', 12),
('DoctrineMigrations\\Version20231207131732', '2023-12-07 14:17:38', 13),
('DoctrineMigrations\\Version20231208091845', '2023-12-08 10:19:09', 131);

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
(304, 'galaxy-s23-blanc.webp', '2023-12-07 14:06:00', NULL, 1004),
(305, 'galaxy-s23-gris.webp', '2023-12-07 14:06:00', NULL, 1004),
(306, 'galaxy-s23-noir.webp', '2023-12-07 14:06:00', NULL, 1004),
(307, 'galaxy-s23-ultra-bordeaux.webp', '2023-12-07 14:06:00', NULL, 1004),
(308, 'galaxy-s23-ultra-creme.webp', '2023-12-07 14:06:00', NULL, 1004),
(309, 'galaxy-s23-ultra-noir.webp', '2023-12-07 14:06:00', NULL, 1004),
(310, 'galaxy-s23-ultra-rose.webp', '2023-12-07 14:06:00', NULL, 1004),
(311, 'galaxy-z-flip5-creme.webp', '2023-12-07 14:06:00', NULL, 1011),
(312, 'galaxy-z-flip5-noir.webp', '2023-12-07 14:06:00', NULL, 1011),
(313, 'galaxy-z-flip5-rose.webp', '2023-12-07 14:06:00', NULL, 1011),
(314, 'galaxy-z-flip5-vert.webp', '2023-12-07 14:06:00', NULL, 1011),
(315, 'galaxy-z-fold5-bleu-galce.webp', '2023-12-07 14:06:00', NULL, 1015),
(316, 'galaxy-z-fold5-creme.webp', '2023-12-07 14:06:00', NULL, 1015),
(317, 'galaxy-z-fold5-noir.webp', '2023-12-07 14:06:00', NULL, 1015),
(318, 'google-p8-pro-noir.webp', '2023-12-07 14:06:00', NULL, 1018),
(319, 'google-p8-pro-rose.webp', '2023-12-07 14:06:00', NULL, 1018),
(320, 'google-p8-pro.webp', '2023-12-07 14:06:00', NULL, 1018),
(321, 'honor-magic-5-noir.webp', '2023-12-07 14:06:00', NULL, 1021),
(322, 'honor-magic-5-vert.webp', '2023-12-07 14:06:00', NULL, 1021);

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
(1001, 'iPhone 15 Pro Max', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Hic accusantium sunt reiciendis tenetur dolor natus.', '2023-12-07 14:06:00', NULL, 'iphone-15-pro-max', 301),
(1002, 'iPhone 15 Pro Max', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Omnis quia delectus qui sit.', '2023-12-07 14:06:00', NULL, 'iphone-15-pro-max', 301),
(1003, 'iPhone 15 Pro Max', 'naturel', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Illo quia impedit dolores animi unde nobis.', '2023-12-07 14:06:00', NULL, 'iphone-15-pro-max', 301),
(1004, 'Galaxy S23', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Provident illum nesciunt ea assumenda iure ratione.', '2023-12-07 14:06:00', NULL, 'galaxy-s23', 302),
(1005, 'Galaxy S23', 'blanc', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Unde est voluptate aut quo tenetur deserunt ex.', '2023-12-07 14:06:00', NULL, 'galaxy-s23', 302),
(1006, 'Galaxy S23', 'gris', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Suscipit quis aut reprehenderit.', '2023-12-07 14:06:00', NULL, 'galaxy-s23', 302),
(1007, 'Galaxy S23 Ultra', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Expedita pariatur consequatur ad molestias aliquid.', '2023-12-07 14:06:00', NULL, 'galaxy-s23-ultra', 302),
(1008, 'Galaxy S23 Ultra', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Est autem quas et et et sit.', '2023-12-07 14:06:00', NULL, 'galaxy-s23-ultra', 302),
(1009, 'Galaxy S23 Ultra', 'bordeaux', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'Androïd', '5G', 1, 2023, '2 ans', 'Modi aperiam quo perferendis nesciunt distinctio quis.', '2023-12-07 14:06:00', NULL, 'galaxy-s23-ultra', 302),
(1010, 'Galaxy S23 Ultra', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Illo aliquam id recusandae adipisci.', '2023-12-07 14:06:00', NULL, 'galaxy-s23-ultra', 302),
(1011, 'Galaxy Z Flip5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Doloribus at quo incidunt id nesciunt fugiat dolorum.', '2023-12-07 14:06:00', NULL, 'galaxy-z-flip5', 302),
(1012, 'Galaxy Z Flip5', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Quo quas corporis quasi modi tempora earum cumque.', '2023-12-07 14:06:00', NULL, 'galaxy-z-flip5', 302),
(1013, 'Galaxy Z Flip5', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Iure itaque tempore dolor fuga explicabo ipsum.', '2023-12-07 14:06:00', NULL, 'galaxy-z-flip5', 302),
(1014, 'Galaxy Z Flip5', 'vert', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Expedita sit et id consequatur quia magni facilis.', '2023-12-07 14:06:00', NULL, 'galaxy-z-flip5', 302),
(1015, 'Galaxy Z Fold5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Blanditiis porro sequi iste.', '2023-12-07 14:06:00', NULL, 'galaxy-z-fold5', 302),
(1016, 'Galaxy Z Fold5', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Non aspernatur sit error dolor ea.', '2023-12-07 14:06:00', NULL, 'galaxy-z-fold5', 302),
(1017, 'Galaxy Z Fold5', 'creme', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Et tempore autem expedita excepturi aut.', '2023-12-07 14:06:00', NULL, 'galaxy-z-fold5', 302),
(1018, 'Google P8 Pro', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Omnis voluptatem distinctio aliquid fugit ut et.', '2023-12-07 14:06:00', NULL, 'google-p8-pro', 305),
(1019, 'Google P8 Pro', 'bleu', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Omnis quaerat est velit iure in.', '2023-12-07 14:06:00', NULL, 'google-p8-pro', 305),
(1020, 'Google P8 Pro', 'rose', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Non sit architecto quidem alias vero.', '2023-12-07 14:06:00', NULL, 'google-p8-pro', 305),
(1021, 'Honor Magic 5', 'noir', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Ipsam ut eum molestiae aliquam.', '2023-12-07 14:06:00', NULL, 'honor-magic-5', 303),
(1022, 'Honor Magic 5', 'vert', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Voluptatem quibusdam quis blanditiis incidunt.', '2023-12-07 14:06:00', NULL, 'honor-magic-5', 303),
(1023, 'Huawei P6O Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Commodi aut fugit sed quia quaerat.', '2023-12-07 14:06:00', NULL, 'huawei-p6o-pro', 304),
(1024, 'Huawei X3 Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Quia quasi necessitatibus illum qui animi in.', '2023-12-07 14:06:00', NULL, 'huawei-x3-pro', 304),
(1025, 'Huawei P5O Pro', 'chrome', 'Débloqué tout opérateur', 6.1, '256 Go', 1, 'iOS', '5G', 1, 2023, '2 ans', 'Maiores eos aut est dignissimos sint.', '2023-12-07 14:06:00', NULL, 'huawei-p5o-pro', 304);

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
(1205, 'Pierre', 'Legros', 'monsieur', '0617647751', 'pierre.legros@orange.fr', '$2y$12$gw4A8Ri/Af9NgfHEQPDbHe66FfDlwImROpFPskGH2RQWPRXOgqs96', '2023-12-07 14:05:47', NULL, 45),
(1206, 'Stéphane', 'Boulay', 'monsieur', '0617647751', 'stéphane.boulay@gmail.com', '$2y$12$.diS6le0ZcaSdAmXJFXaXOGhDc.jpkaxtjqgPNmW7zasp1ijDFMTO', '2023-12-07 14:05:48', NULL, 45),
(1207, 'Julien', 'Hebert', 'monsieur', '0617647751', 'julien.hebert@gmail.com', '$2y$12$vELGLhYUAd8fkN06bs6jTOswBzP9E0hmXuC2H5FkEvjfydmohqrK6', '2023-12-07 14:05:48', NULL, 45),
(1208, 'Bernard', 'Aubry', 'monsieur', '0617647751', 'bernard.aubry@sfr.fr', '$2y$12$lHZTGq2/g7EBPjjRsIkof.652YCLlmfwoR43RD4SxKoXiMv2CRgfC', '2023-12-07 14:05:49', NULL, 45),
(1209, 'Étienne', 'Roche', 'monsieur', '0617647751', 'Étienne.roche@dbmail.com', '$2y$12$A8UJfTPhS5/7BtIHrdbkTOUFUnhGAacVSS6eRkksT633ktOjVLoXi', '2023-12-07 14:05:49', NULL, 45),
(1210, 'Franck', 'Hamon', 'monsieur', '0617647751', 'franck.hamon@hotmail.fr', '$2y$12$q.Zc2AOmrhml0Dh2RQzj7Ogw5oFNFn7ePgQx3dSm89tcz8nWBLZgO', '2023-12-07 14:05:50', NULL, 45),
(1211, 'Arthur', 'Bailly', 'monsieur', '0617647751', 'arthur.bailly@club-internet.fr', '$2y$12$dxtQFr4NIx/Ko10.EXbd2OJNXlkUAbLpjHynDUwx8QNRmHlS3DKN2', '2023-12-07 14:05:50', NULL, 45),
(1212, 'Thibault', 'Gauthier', 'monsieur', '0617647751', 'thibault.gauthier@laposte.net', '$2y$12$YZm943adIemkmb1owHPfmetb6IKg/YXKLy05J7BB9FDKTNKAB7S0S', '2023-12-07 14:05:51', NULL, 45),
(1213, 'Daniel', 'Goncalves', 'monsieur', '0617647751', 'daniel.goncalves@dbmail.com', '$2y$12$je7cx3tjkwaardNRcJQU2uRoWzNvDrVVQn0eJIfNtsCbMUc/Ktqiu', '2023-12-07 14:05:51', NULL, 45),
(1214, 'Stéphane', 'Carre', 'monsieur', '0617647751', 'stéphane.carre@free.fr', '$2y$12$Skx2bLbTO56m37JY7aytf.qQYogXxfGHGVbqtsqym77df3uUyd0d2', '2023-12-07 14:05:51', NULL, 45),
(1215, 'Thibault', 'Gomez', 'monsieur', '0617647751', 'thibault.gomez@live.com', '$2y$12$PR74WpyhossJgX5efgcsG.5JGvsF9QHDn/4mI0CONCxnd7Eg11mOK', '2023-12-07 14:05:52', NULL, 45),
(1216, 'Adrien', 'Bouvier', 'monsieur', '0617647751', 'adrien.bouvier@dbmail.com', '$2y$12$b1H1sigLQI1eN24u8lXvkOgutVLsar6EIY4FyqfW2.oZeOSuMa0Ri', '2023-12-07 14:05:52', NULL, 45),
(1217, 'Emmanuel', 'Collet', 'monsieur', '0617647751', 'emmanuel.collet@tele2.fr', '$2y$12$BQRDABsZqSoLDtfGNeVWveLhdXo70kPHOStOWHerFPNH9etqXGzx6', '2023-12-07 14:05:53', NULL, 45),
(1218, 'René', 'Le Roux', 'monsieur', '0617647751', 'rené.le roux@yahoo.fr', '$2y$12$q9lQ0Hca/d51ITJNMR8kheipaFnjnLCPV5ES87wNSYKlErlxRzrne', '2023-12-07 14:05:53', NULL, 45),
(1219, 'Christophe', 'Foucher', 'monsieur', '0617647751', 'christophe.foucher@gmail.com', '$2y$12$HW1Zkb5slb2kdXvFlWRMr.3/yaWgXgRKeaz5SZtyVxxXpfAJ8Lnny', '2023-12-07 14:05:54', NULL, 45),
(1220, 'Nathalie', 'Delaunay', 'madame', '0617647751', 'nathalie.delaunay@free.fr', '$2y$12$VQ30Jv5K66VTo6pgAl05WOALNSy9F.I0xKHmiBw6FRNkGKw6ttmRa', '2023-12-07 14:05:54', NULL, 45),
(1221, 'Thérèse', 'Bouvier', 'madame', '0617647751', 'thérèse.bouvier@wanadoo.fr', '$2y$12$qOYVY/d43TMpa5AZqIeULe4CeyEKWcXZ3E/Dz34oMXbAvc0J0.Z26', '2023-12-07 14:05:55', NULL, 45),
(1222, 'Édith', 'Michel', 'madame', '0617647751', 'Édith.michel@laposte.net', '$2y$12$3B2F/WN4fhQ8aVjFXD6lIe2TVAaGIgepIZokEcUtHZNrwkxIju.Sq', '2023-12-07 14:05:55', NULL, 45),
(1223, 'Aurore', 'Marie', 'madame', '0617647751', 'aurore.marie@dbmail.com', '$2y$12$nD9ioIXfOYg6LD4rkPVKduaJkhH5WfNG0G6a65lJ5P15PJO/ZXbCW', '2023-12-07 14:05:55', NULL, 45),
(1224, 'Zoé', 'Etienne', 'madame', '0617647751', 'zoé.etienne@tele2.fr', '$2y$12$IKG24CgM5/EKKOnYQU7QzetwhDKS7ZRZMBOIGwRyZa7lEPp68L62u', '2023-12-07 14:05:56', NULL, 45),
(1226, 'Odette', 'Perrin', 'madame', '0617647751', 'odette.perrin@orange.fr', '$2y$12$OaK0P7QZYHxYepciJExFru2V6ya5Mve9WpsDRW9wH6j6DnqbqlSD.', '2023-12-07 14:05:57', NULL, 45),
(1227, 'Arnaude', 'Marques', 'madame', '0617647751', 'arnaude.marques@laposte.net', '$2y$12$1Veh3mdZpLs5V3vqBq7CVOilGxhyvJL7lvxFt44TtsGppLGl8TYTi', '2023-12-07 14:05:57', NULL, 45),
(1228, 'Michèle', 'Blanc', 'madame', '0617647751', 'michèle.blanc@sfr.fr', '$2y$12$tD6S.HsjO.GQuMaCdpvBxOnzvfMzV7BkKYNZJLU9i48N8nCVIS1Re', '2023-12-07 14:05:57', NULL, 45),
(1229, 'Caroline', 'De Oliveira', 'madame', '0617647751', 'caroline.de oliveira@dbmail.com', '$2y$12$oFFrAR3U7IUyht1a5jw2e.iUlofuBLKh/cxLRRIDi75Z5P7oOZdH.', '2023-12-07 14:05:58', NULL, 45),
(1230, 'Océane', 'Rousset', 'madame', '0617647751', 'océane.rousset@free.fr', '$2y$12$jhY7G5MHZfHE9h99px/MpujypkDFzG8zsYeDMa/8Ct.u/NmX89Gfy', '2023-12-07 14:05:58', NULL, 45),
(1231, 'Audrey', 'David', 'madame', '0617647751', 'audrey.david@noos.fr', '$2y$12$5P5vG3CLZwQszokCtii2n.TnI/yerNlJZAOMbkj.gmrj.kX74wxD6', '2023-12-07 14:05:59', NULL, 45),
(1232, 'Adrienne', 'Poirier', 'madame', '0617647751', 'adrienne.poirier@noos.fr', '$2y$12$NHpmQGI9KKs1LMGh5S.UvuJFc4mSoWqb3Cq66WM8k7na/pzbFN3wu', '2023-12-07 14:05:59', NULL, 45),
(1233, 'Laetitia', 'Fernandes', 'madame', '0617647751', 'laetitia.fernandes@wanadoo.fr', '$2y$12$ffsvLASY2Za1c32d3m0pEej2vbHbcFLeeqLxT6QYNw7.OsBAV9bKm', '2023-12-07 14:05:59', NULL, 45),
(1234, 'Noémi', 'Bruneau', 'madame', '0617647751', 'noémi.bruneau@yahoo.fr', '$2y$12$PhXaDTFZlLGGuPF9XXQyNuv/7nS9VvClGavW9GSmQcev8kmp.W1xC', '2023-12-07 14:06:00', NULL, 45),
(1239, 'Randal', 'Pearson', 'monsieur', '0744251233', 'randal-pearson@gmail.com', '$2y$12$IpRNUyr60GYxdIUVy81NDOXwd.cGOpyhHzJxLEoh77pJjx2hETiTm', '2023-12-07 15:34:22', NULL, 45),
(1240, 'Kevin', 'Pearson', 'monsieur', '0744251233', 'kevin-pearson@gmail.com', '$2y$12$TnEiJjI44d0e0kOgig1CNuYeqKikouoQ/Rkve6F8H3GZ7SxrvHgBG', '2023-12-08 10:49:11', NULL, 45),
(1241, 'Kate', 'Pearson', 'madame', '0744251233', 'kate-pearson@gmail.com', '$2y$12$86blThNR3I7Wv2UGxHpzVu9as/44.gHhMOMcqWshhl4jsdsS3gpx6', '2023-12-08 10:52:33', NULL, 45),
(1243, 'Rebecca', 'Pearson', 'madame', '0744251233', 'rebecca-pearson@gmail.com', '$2y$12$zKXgRkRfncI80VFT6aX.YuEgpwSetKio1JB911kP0bLofKxlaM3tm', '2023-12-28 15:02:06', NULL, 45),
(1244, 'Jack', 'Pearson', 'madame', '0744251266', 'jack-pearson@gmail.com', '$2y$12$7mz6rmCPF.W6kHEowEccM.BXsCA1tcUTcADUux6YyfDEsI7zJ/kgm', '2023-12-28 15:19:27', NULL, 45);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT pour la table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1245;

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
