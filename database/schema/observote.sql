-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 déc. 2023 à 01:49
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
-- Base de données : `observote`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `regroupement` varchar(255) DEFAULT NULL,
  `parti` varchar(255) DEFAULT NULL,
  `candidat` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `circonscription` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `name`, `regroupement`, `parti`, `candidat`, `sexe`, `province`, `circonscription`, `created_at`, `updated_at`, `email`, `phone`, `password`, `type_id`) VALUES
(1, 'Zibu Kab Jun', NULL, 'UDPS', 'Tshisekedi Tshilombo Félix', 'Masculin', NULL, NULL, '2023-11-30 14:43:02', '2023-11-30 14:43:03', 'zibu@gmail.com', '852867804', '$2y$12$oFDg7CGy/N1UydxmjQSqdO7lR5V9HdKBdI1Uu8Otge.Ux7vlTmkIK', 1),
(2, 'Mutombo Test Dem\'s', NULL, 'UDPS', 'Mutombo Test Dem\'s', 'Masculin', 'Kinshasa', 'Lukunga', '2023-11-30 15:25:16', '2023-11-30 15:25:17', 'dems@gmail.com', '810000000', '$2y$12$.uy2/bN4itOXJ64kJ.y7Qeg38TBRVijE4z8txLTX.r6b9UGW0WQuG', 2),
(3, 'Katumbi Ciapwe', NULL, 'Ensemble', 'Katumbi Ciapwe', 'Masculin', NULL, NULL, '2023-12-05 16:25:43', '2023-12-05 16:25:44', 'test2@gmail.com', '850000001', '$2y$12$cDw/ae4BX0UYeaVAYv0/NOZnWBjBWNnPK7rpBt/xgEtd7/jOi6Zuq', 1),
(4, 'Sam Muney', NULL, 'ON', 'Sam Muney', 'Masculin', '1', '6', '2023-12-07 14:15:42', '2023-12-07 14:15:43', 's.muney@ipconsultdrc.net', '820052211', '$2y$12$/TOuhUv5yrJQfVbbVIayfuJyrLy9J7SWFrVqn/uYHesRY8c6AwXSu', 2);

-- --------------------------------------------------------

--
-- Structure de la table `circonscriptions`
--

CREATE TABLE `circonscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `circonscriptions`
--

INSERT INTO `circonscriptions` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(2, 'Lukunga', 1, '2023-12-07 11:58:09', '2023-12-07 11:58:09'),
(3, 'Funa', 1, '2023-12-07 11:58:09', '2023-12-07 11:58:09'),
(5, 'Mont Amba', 1, '2023-12-07 12:00:26', '2023-12-07 12:00:26'),
(6, 'Tshangu', 1, '2023-12-07 12:00:26', '2023-12-07 12:00:26'),
(7, 'Basankusu', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(8, 'Bikoro', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(9, 'Mbandaka ville', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(10, 'Mankanza', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(11, 'Lukolela', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(12, 'Bolonba', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(13, 'Bomongo', 3, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(15, 'Ingende', 3, '2023-12-07 21:33:06', '2023-12-07 21:33:06'),
(16, 'Zongo ville', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(17, 'Kungu', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(18, 'Gemena ville', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(19, 'Gemena', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(20, 'Budjala', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(21, 'Libenge', 5, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(22, 'Autre', 3, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(23, 'Autre', 1, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(24, 'Autre', 2, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(25, 'Autre', 4, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(26, 'Autre', 5, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(27, 'Autre', 6, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(28, 'Autre', 6, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(29, 'Autre', 7, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(30, 'Autre', 7, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(31, 'Autre', 8, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(32, 'Autre', 9, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(33, 'Autre', 10, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(34, 'Autre', 11, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(35, 'Autre', 12, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(36, 'Autre', 13, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(37, 'Autre', 14, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(38, 'Autre', 15, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(39, 'Autre', 16, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(40, 'Autre', 17, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(41, 'Autre', 18, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(42, 'Autre', 19, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(43, 'Autre', 20, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(44, 'Autre', 21, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(45, 'Autre', 22, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(46, 'Autre', 23, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(47, 'Autre', 24, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(48, 'Autre', 25, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(49, 'Autre', 26, '2023-12-07 21:34:38', '2023-12-07 21:34:38'),
(50, 'Bosobolo', 4, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(51, 'Businga', 4, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(52, 'Gbadolite ville', 4, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(53, 'Mobiyi Mbongo', 4, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(54, 'Yakoma', 4, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(55, 'Bongandanga', 6, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(56, 'Bumba', 6, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(57, 'Lisala', 6, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(58, 'Lisala ville', 6, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(59, 'Aketi', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(60, 'Ango', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(61, 'Bambesa', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(62, 'Bondo', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(63, 'Buta', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(64, 'Buta ville', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(65, 'Poko', 7, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(66, 'Dungu', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(67, 'Faradje', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(68, 'Isiro ville', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(69, 'Niagara', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(70, 'Rungu', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(71, 'Wamba', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(72, 'Watsa', 8, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(73, 'Aru', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(74, 'Bunia ville', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(75, 'Djungu', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(76, 'Irumu', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(77, 'Mahagi', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(78, 'Mambasa', 9, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(79, 'Boma ville', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(80, 'Kasangulu', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(81, 'Kimvula', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(82, 'Lukula', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(83, 'Luozi', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(84, 'Mandimba', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(85, 'Matadi ville', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(86, 'Mbanzu Ngungu', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(87, 'Moanda', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(88, 'Seke-Baza', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(89, 'Songololo', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(90, 'Tshela', 10, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(91, 'Bolobo', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(92, 'Inongo', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(93, 'Inongo ville', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(94, 'Kiri', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(95, 'Kutu', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(96, 'Mushie', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(97, 'Oshwe', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(98, 'Yumbi', 11, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(99, 'Bagata', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(100, 'Bandundu ville', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(101, 'Bulungu', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(102, 'Gungu', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(103, 'Idiofa', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(104, 'Kikwit ville', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(105, 'Masi manimba', 12, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(106, 'Feshi', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(107, 'Kahemba', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(108, 'Kasongo lunda', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(109, 'Kenge', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(110, 'Kenge ville', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(111, 'Popokabaka', 13, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(112, 'Befale', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(113, 'Boende', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(114, 'Boende ville', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(115, 'Bokungu', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(116, 'Djolu', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(117, 'Ikela', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(118, 'Monkoto', 14, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(119, 'Bafwasende', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(120, 'Banalia', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(121, 'Basoko', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(122, 'Isangi', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(123, 'Kisangani ville', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(124, 'Opala', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(125, 'Ubundu', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(126, 'Yahuma', 15, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(127, 'Katako kombe', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(128, 'Kole', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(129, 'Lodja', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(130, 'Lomela', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(131, 'Lubefu', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(132, 'Lumumba ville', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(133, 'Lusambo', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(134, 'Lusambo ville', 16, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(135, 'Dekese', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(136, 'Ilebo', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(137, 'Luebo', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(138, 'Mweka', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(139, 'Tshikapa', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(140, 'Tshikapa ville', 17, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(141, 'Kabeya Kamwanga', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(142, 'Katanda', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(143, 'Lupatapata', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(144, 'Mbuji Mayi ville', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(145, 'Miabi', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(146, 'Tshilenge', 2, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(147, 'Demba', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(148, 'Dibaya', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(149, 'Dimbelenge', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(150, 'Kananga ville', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(151, 'Kazumba', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(152, 'Luiza', 18, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(153, 'Kabinda', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(154, 'Kabinda ville', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(155, 'Kamiji', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(156, 'Lubao', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(157, 'Luilu (Mwene Ditu)', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(158, 'Mwene Ditu ville', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(159, 'Ngandajika', 19, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(160, 'Beni', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(161, 'Beni ville', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(162, 'Butembo ville', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(163, 'Goma ville', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(164, 'Lubero', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(165, 'Nyirangongo', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(166, 'Walikale', 20, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(167, 'Bukavu ville', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(168, 'Fizi', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(169, 'Idjwi', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(170, 'Kabare', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(171, 'Kalehe', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(172, 'Mwenga', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(173, 'Shabunda', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(174, 'Uvira', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(175, 'Walungu', 21, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(176, 'Kabambare', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(177, 'Kailo', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(178, 'Kasongo', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(179, 'Kibombo', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(180, 'Kindu ville', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(181, 'Lubutu', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(182, 'Pangi', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(183, 'Punia', 22, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(184, 'Kabalo', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(185, 'Kalemi', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(186, 'Kalemi ville', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(187, 'Kongolo', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(188, 'Manono', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(189, 'Moba', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(190, 'Nyunzu', 23, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(191, 'Kambove', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(192, 'Kasenga', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(193, 'Kipushi', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(194, 'Likasi ville', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(195, 'Lubumbashi ville', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(196, 'Mitwaba', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(197, 'Pweto', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(198, 'Sakania', 24, '2023-12-07 21:23:51', '2023-12-07 21:23:51'),
(199, 'Dilolo', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(200, 'Kapanga', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(201, 'Kolwesi ville', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(202, 'Lubudi', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(203, 'Mutshatsha', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(204, 'Sandoa', 25, '2023-12-08 00:25:46', '2023-12-08 00:25:46'),
(205, 'Bukama', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(206, 'Kabongo', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(207, 'Kamina', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(208, 'Kamina ville', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(209, 'Kaniama', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(210, 'Malemba Nkulu', 26, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(211, 'Bandalungwa', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(212, 'Barumbu', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(213, 'Bumbu', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(214, 'Gombe', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(215, 'Kalamu', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(216, 'Kasa Vubu', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(217, 'Kimbaseke', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(218, 'Kinshasa', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(219, 'Kintambo', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(220, 'Kisenso', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(221, 'Lemba', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(222, 'Limete', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(223, 'Lingwala', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(224, 'Makala', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(225, 'Maluku', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(226, 'Masina', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(227, 'Matete', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(228, 'Mont Ngafula', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(229, 'Ndjili', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(230, 'Ngaba', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(231, 'Ngaliema', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(232, 'Ngiri ngiri', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(233, 'Nsele', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49'),
(234, 'Selembao', 1, '2023-12-08 00:32:49', '2023-12-08 00:32:49');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2003_11_29_065437_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_11_30_125038_create_types_table', 2),
(8, '2023_11_30_134417_create_candidats_table', 3),
(9, '2023_11_30_140151_add_cadidat_id_to_users_table', 4),
(10, '2023_11_30_141731_add_elmt_to_candidat_table', 5),
(11, '2023_11_30_151431_add_type_to_candidats_table', 6),
(13, '2023_12_01_102913_create_observers_table', 7),
(15, '2023_12_03_045414_create_results_table', 8),
(16, '2023_12_04_171134_add_candidat_id_to_results_table', 9),
(17, '2023_12_06_120340_add_to_colomn_to_results_table', 10),
(19, '2023_12_07_091245_create_provinces_table', 11),
(20, '2023_12_07_091303_create_circonscriptions_table', 11);

-- --------------------------------------------------------

--
-- Structure de la table `observers`
--

CREATE TABLE `observers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `candidat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `observers`
--

INSERT INTO `observers` (`id`, `name`, `sexe`, `email`, `phone`, `password`, `candidat_id`, `created_at`, `updated_at`) VALUES
(1, 'Tyke Kety Trop', 'Masculin', 'tyke@gmail.com', '813332211', '$2y$12$Fh16N2tm/TpPgk.P8P4EzeWjziGg2t0vXSKUr5FbwU.uu8XRSluwO', 1, '2023-12-01 23:27:07', '2023-12-02 05:55:56'),
(2, 'junior kabuya', 'Masculin', 'junior@gmail.com', '821657200', '$2y$12$YGgYmwftMV0fqqmKWYQ5fOpKxXdKOH5.A/VamlXBv0inAdKKzGgBe', 1, '2023-12-01 23:30:25', '2023-12-01 23:30:26'),
(5, 'test', 'Masculin', 'test@k.com', '850001238', '$2y$12$vFVurlCSWQqUEwd9mpE5..8JrBUstNL6gtIWq2vjiAKYYWaum2IAi', 1, '2023-12-03 05:30:24', '2023-12-03 05:30:25'),
(6, 'observateur1', 'Masculin', 'obs@gmail.com', '825555556', '$2y$12$a/Fgd7Yc0cz2YDRA55cnyutehhJIMT.PFw4456GKoQL2u3XIf9q3K', 3, '2023-12-05 16:28:15', '2023-12-05 16:28:16'),
(7, 'tem1', 'Masculin', 'temoin@gmail.com', '860000001', '$2y$12$TMplmB48uAZYEkV5yTFniemfLtQc0dnK4WLcOU/fZ9BiyrrVM8Aby', 2, '2023-12-05 17:02:48', '2023-12-05 17:02:49'),
(8, 'CELIO KASONGO', 'Masculin', 'celio@gmail.com', '+243819962903', '$2y$12$I7TUniJ58KXbB.jCq.AivOLns5AvK1lz0mETZksLAFELm83UKb02G', 1, '2023-12-06 07:43:24', '2023-12-06 07:43:25'),
(9, 'obs1', 'Masculin', 'obs1@gmail.com', '850001233', '$2y$12$cXyyHM9nhzH8ST5im2QLoOOzoGoZf2W00KGKM1CWRM.EFy7vQKKDy', 4, '2023-12-07 14:24:56', '2023-12-07 14:24:57');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provinces`
--

INSERT INTO `provinces` (`id`, `titre`, `created_at`, `updated_at`) VALUES
(1, 'Kinshasa', '2023-12-07 09:29:04', '2023-12-07 09:29:04'),
(2, 'Kasai-Oriental', '2023-12-07 09:29:10', '2023-12-07 09:29:10'),
(3, 'Equateur', '2023-12-07 21:06:39', '2023-12-07 21:06:39'),
(4, 'Nord Ubangui', '2023-12-07 21:07:09', '2023-12-07 21:07:09'),
(5, 'Sud ubangui', '2023-12-07 21:07:09', '2023-12-07 21:07:09'),
(6, 'Mongala', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(7, 'Bas Uele', '2023-12-07 21:06:39', '2023-12-07 21:06:39'),
(8, 'Haut-Uele', '2023-12-07 21:07:09', '2023-12-07 21:07:09'),
(9, 'ituri', '2023-12-07 21:07:09', '2023-12-07 21:07:09'),
(10, 'Kongo Central', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(11, 'Mai-Ndombe', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(12, 'Kwilu', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(13, 'Kwango', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(14, 'Tshuapa', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(15, 'Tshopo', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(16, 'Sankuru', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(17, 'Kasai', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(18, 'Kasai Central', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(19, 'Lomami', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(20, 'Nord Kivu', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(21, 'Sud kivu', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(22, 'Maniema', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(23, 'Tanganyika', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(24, 'Haut-Katanga', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(25, 'Lualaba', '2023-12-07 21:08:10', '2023-12-07 21:08:10'),
(26, 'Haut-Lomami', '2023-12-07 21:08:10', '2023-12-07 21:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre` varchar(255) NOT NULL,
  `centreCode` varchar(255) NOT NULL,
  `bureau` varchar(255) NOT NULL,
  `votantInitial` int(11) NOT NULL,
  `votant` int(11) NOT NULL,
  `nosVoix` int(11) NOT NULL,
  `bulletinRestant` int(11) NOT NULL,
  `observer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `candidat_id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `circonscription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `results`
--

INSERT INTO `results` (`id`, `centre`, `centreCode`, `bureau`, `votantInitial`, `votant`, `nosVoix`, `bulletinRestant`, `observer_id`, `created_at`, `updated_at`, `candidat_id`, `province`, `circonscription`) VALUES
(3, 'Institut Mobikisi', '1007081-1', '1007081-1-B', 1000, 800, 250, 200, 1, '2023-12-04 16:41:41', '2023-12-05 15:42:18', 1, 'Kinshasa', 'Lukunga'),
(5, 'Zomany', '1007080-1', '1007080-1-A', 500, 496, 196, 4, 5, '2023-12-04 16:52:37', '2023-12-04 16:52:37', 1, 'Kinshasa', 'Lukunga'),
(7, 'Sainte Anne', '1007083-1', '1007083-1-L', 900, 801, 700, 99, 2, '2023-12-05 12:06:10', '2023-12-05 12:06:10', 1, 'Kinshasa', 'Lukunga'),
(8, 'Test', '1007081-5', '1007081-5-A', 500, 499, 100, 1, 6, '2023-12-05 16:30:48', '2023-12-05 16:30:48', 3, 'Kinshasa', 'Lukunga'),
(9, 'Gshshh', '1552626', '515151h', 1000, 1000, 200, 0, 6, '2023-12-05 16:39:07', '2023-12-05 16:39:07', 3, 'Kinshasa', 'Lukunga'),
(10, 'Test', 'Test1', 'Test1-1', 900, 800, 564, 100, 7, '2023-12-05 17:04:44', '2023-12-05 17:04:44', 2, 'Kinshasa', 'Lukunga'),
(11, '12334', '2e3444', '453344', 1000, 950, 400, 50, 1, '2023-12-06 07:16:41', '2023-12-06 07:53:08', 1, 'Kinshasa', 'Lukunga'),
(12, 'Limete', '45631-2', '4626278-2', 2500, 2000, 750, 500, 8, '2023-12-06 07:50:35', '2023-12-06 08:12:20', 1, 'Kinshasa', 'Lukunga'),
(13, '133444', '23e4', '555633', 800, 798, 600, 2, 1, '2023-12-06 10:53:34', '2023-12-06 10:53:34', 1, 'Kinshasa', 'Lukunga'),
(14, 'Mokengeli ', '422999', '42999-a', 3500, 3000, 2000, 500, 8, '2023-12-06 11:45:07', '2023-12-06 11:45:07', 1, 'Kinshasa ', 'Mont-amba ');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', '2023-11-29 14:27:53', '2023-11-29 14:27:53'),
(2, 'Admin', '2023-11-29 14:27:53', '2023-11-29 14:27:53'),
(3, 'Observer', '2023-11-29 14:27:53', '2023-11-29 14:27:53'),
(4, 'Simple', '2023-11-29 14:27:53', '2023-11-29 14:27:53');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'President', '2023-11-30 12:54:32', '2023-11-30 12:54:32'),
(2, 'Député(e) National(e)', '2023-11-30 12:54:32', '2023-11-30 12:54:32'),
(3, 'Député(e) Provincial(e)', '2023-11-30 12:54:32', '2023-11-30 12:54:32');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `candidat_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `candidat_id`) VALUES
(1, 'Junior Kabuya', 'j.kabuya@skytech243.com', '821657202', 1, NULL, '$2y$12$wcDx56zn7j2ELmOi5vTdx.dPb4bP20i/2Cvg7obCuP8C56g7S6D9m', NULL, NULL, NULL, NULL, '2023-11-29 13:46:04', '2023-11-29 13:46:04', NULL),
(2, 'Zibu Kab Jun', 'zibu@gmail.com', '852867804', 2, NULL, '$2y$12$PIsk9SZNauE4Cf2But4DOOQgSlbvTjrevhUTlG5MO79gp.PlTRHWW', NULL, NULL, NULL, NULL, '2023-11-30 14:43:03', '2023-11-30 14:43:03', 1),
(3, 'Mutombo Test Dem\'s', 'dems@gmail.com', '810000000', 2, NULL, '$2y$12$wcDx56zn7j2ELmOi5vTdx.dPb4bP20i/2Cvg7obCuP8C56g7S6D9m', NULL, NULL, NULL, NULL, '2023-11-30 15:25:17', '2023-11-30 15:25:17', 2),
(4, 'Type Kęty Trop', 'tyke@gmail.com', '813332211', 3, NULL, '$2y$12$BIKinIq0AoE6Ee2lV9onw.MpcSd.pCdFReaaT5yDoR59EWComALRG', NULL, NULL, NULL, NULL, '2023-12-01 23:27:07', '2023-12-01 23:27:07', 1),
(5, 'junior kabuya', 'junior@gmail.com', '821657200', 3, NULL, '$2y$12$ASSEolfD.M/SFJBgj26wue9Pcw3NNTWsmSUwxTodhX.sEYR96sNMC', NULL, NULL, NULL, NULL, '2023-12-01 23:30:26', '2023-12-01 23:30:26', 1),
(9, 'test', 'test@k.com', '850001238', 3, NULL, '$2y$12$X1WCFNn646SmJzH5mMNLb.6mIW4gaPxcYjuB1WKbDcY0kCg4pYmO.', NULL, NULL, NULL, NULL, '2023-12-03 05:30:25', '2023-12-03 05:30:25', 1),
(10, 'Katumbi Ciapwe', 'test2@gmail.com', '850000001', 2, NULL, '$2y$12$uea5citV0DeGF2Ire5XVD.yzOIw5jmpsWmiwLN0Rm3OYrDqbyFJx6', NULL, NULL, NULL, NULL, '2023-12-05 16:25:44', '2023-12-05 16:25:44', 3),
(11, 'observateur1', 'obs@gmail.com', '825555556', 3, NULL, '$2y$12$8eEj22rJYA6VJmPxcuaRluEG3Y7Lsf3aSz4gIDflmuyeCskpvLZAm', NULL, NULL, NULL, NULL, '2023-12-05 16:28:16', '2023-12-05 16:28:16', 3),
(12, 'tem1', 'temoin@gmail.com', '860000001', 3, NULL, '$2y$12$KGVHBLHkJByYPD4fJ6x0kOa54QMtLJX03UPl4OV/ZTHHNKEGHOjR6', NULL, NULL, NULL, NULL, '2023-12-05 17:02:48', '2023-12-05 17:02:48', 2),
(13, 'CELIO KASONGO', 'celio@gmail.com', '+243819962903', 3, NULL, '$2y$12$5gczAlGT6RexclfP3S96cukMEaDM1i46UUdNhDV8NG5VdI0lOH33.', NULL, NULL, NULL, NULL, '2023-12-06 07:43:25', '2023-12-06 07:43:25', 1),
(14, 'Sam Muney', 's.muney@ipconsultdrc.net', '820052211', 2, NULL, '$2y$12$EwsOUJHqq/MvjMtZszDqAuSiUc2mYsHLCTEdthIgE0/MKCOHg/aHy', NULL, NULL, NULL, NULL, '2023-12-07 14:15:43', '2023-12-07 14:15:43', 4),
(15, 'obs1', 'obs1@gmail.com', '850001233', 3, NULL, '$2y$12$ATw8aBfjemA5nNc3QRV8VeLEAGEbgg87qHUqlIbomLOS6WvP2o7tq', NULL, NULL, NULL, NULL, '2023-12-07 14:24:57', '2023-12-07 14:24:57', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidats_email_unique` (`email`),
  ADD UNIQUE KEY `candidats_phone_unique` (`phone`),
  ADD KEY `candidats_type_id_foreign` (`type_id`);

--
-- Index pour la table `circonscriptions`
--
ALTER TABLE `circonscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circonscriptions_province_id_foreign` (`province_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `observers`
--
ALTER TABLE `observers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `observers_email_unique` (`email`),
  ADD UNIQUE KEY `observers_phone_unique` (`phone`),
  ADD KEY `observers_candidat_id_foreign` (`candidat_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_observer_id_foreign` (`observer_id`),
  ADD KEY `results_candidat_id_foreign` (`candidat_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `circonscriptions`
--
ALTER TABLE `circonscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `observers`
--
ALTER TABLE `observers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `circonscriptions`
--
ALTER TABLE `circonscriptions`
  ADD CONSTRAINT `circonscriptions_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `observers`
--
ALTER TABLE `observers`
  ADD CONSTRAINT `observers_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`),
  ADD CONSTRAINT `results_observer_id_foreign` FOREIGN KEY (`observer_id`) REFERENCES `observers` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
