-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 jan. 2024 à 15:15
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
-- Base de données : `sigpa`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectations`
--

CREATE TABLE `affectations` (
  `id_affectation` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_modele` bigint(20) UNSIGNED NOT NULL,
  `id_marque` bigint(20) UNSIGNED NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `date_affectation` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `assurances`
--

CREATE TABLE `assurances` (
  `id_assurance` bigint(20) UNSIGNED NOT NULL,
  `nom_assurance` varchar(255) DEFAULT NULL,
  `type_assurance` varchar(255) NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  `jours_restant` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `assurances`
--

INSERT INTO `assurances` (`id_assurance`, `nom_assurance`, `type_assurance`, `id_vehicule`, `date_debut`, `date_fin`, `statut`, `jours_restant`, `created_at`, `updated_at`) VALUES
(2, 'Bamako', 'Assurance', 19, '2024-01-06', '2025-01-06', 'En Cours', 366, '2024-01-06 19:28:50', '2024-01-06 19:28:50'),
(3, 'VAN', 'Assurance', 19, '2024-01-06', '2024-01-28', 'En Cours', 22, '2024-01-06 19:41:44', '2024-01-06 19:41:44');

-- --------------------------------------------------------

--
-- Structure de la table `bons`
--

CREATE TABLE `bons` (
  `id_bon` bigint(20) UNSIGNED NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `numero_bon` varchar(255) NOT NULL,
  `date_delivrance` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `valeur_espece` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type`, `description`, `created_at`, `updated_at`) VALUES
(9, 'Entretien', 'Moteur', '2024-01-06 11:06:29', '2024-01-06 11:06:29');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

CREATE TABLE `chauffeurs` (
  `id_chauffeur` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naiss` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `numero_permis` varchar(255) NOT NULL,
  `categorie_permis` varchar(255) NOT NULL,
  `validite_permis` date NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`id_chauffeur`, `matricule`, `nom`, `prenom`, `date_naiss`, `genre`, `email`, `telephone`, `numero_permis`, `categorie_permis`, `validite_permis`, `id_service`, `created_at`, `updated_at`) VALUES
(3, '0154261X', 'KEITA', 'DJIBRIL', '2015-02-06', 'Masculin', 'bdokeita100@gmail.com', '78862065', '567', 'B', '2024-01-27', 4, '2024-01-06 13:43:51', '2024-01-06 13:43:51');

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
-- Structure de la table `incidents`
--

CREATE TABLE `incidents` (
  `id_incident` bigint(20) UNSIGNED NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `date_incident` date NOT NULL,
  `causes` varchar(255) NOT NULL,
  `gravite` varchar(255) NOT NULL,
  `degat` text NOT NULL,
  `description` text NOT NULL,
  `fichiers` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `maintenances`
--

CREATE TABLE `maintenances` (
  `id_maintenance` bigint(20) UNSIGNED NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `id_prestataire` bigint(20) UNSIGNED NOT NULL,
  `numero_facture` varchar(255) NOT NULL,
  `cout` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `travaux` text NOT NULL,
  `statut` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maintenances`
--

INSERT INTO `maintenances` (`id_maintenance`, `id_vehicule`, `id_prestataire`, `numero_facture`, `cout`, `date_debut`, `date_fin`, `type`, `travaux`, `statut`, `created_at`, `updated_at`) VALUES
(6, 19, 5, '677', 90000, '2024-01-06', '2024-01-06', 'Entretien', 'MERCI', 'En cours', '2024-01-06 12:27:40', '2024-01-06 12:27:40');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marque` bigint(20) UNSIGNED NOT NULL,
  `nom_marque` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `nom_marque`, `created_at`, `updated_at`) VALUES
(20, 'TOYOTA', '2024-01-01 21:16:35', '2024-01-01 21:16:35'),
(21, 'MERCEDES 200', '2024-01-02 09:33:15', '2024-01-02 10:05:35'),
(24, 'CIBDO', '2024-01-02 09:56:33', '2024-01-02 10:00:19'),
(25, 'BEN', '2024-01-02 10:08:50', '2024-01-02 10:08:50'),
(26, 'REMORQUE', '2024-01-02 10:13:01', '2024-01-02 10:13:01');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_24_110518_create_modeles_table', 1),
(6, '2023_12_24_110548_create_marques_table', 1),
(7, '2023_12_24_110617_create_services_table', 1),
(8, '2023_12_24_110746_create_vehicules_table', 1),
(9, '2023_12_24_110934_create_missions_table', 1),
(10, '2023_12_24_111013_create_prestataires_table', 1),
(11, '2023_12_24_111042_create_bons_table', 1),
(12, '2023_12_24_111151_create_assurances_table', 2),
(13, '2023_12_24_111410_create_incidents_table', 3),
(14, '2023_12_24_111544_create_type_maintenances_table', 4),
(15, '2023_12_24_111512_create_maintenances_table', 5),
(16, '2023_12_24_111616_create_chauffeurs_table', 6),
(17, '2023_12_24_111637_create_affectations_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `id_mission` bigint(20) UNSIGNED NOT NULL,
  `numero_mission` int(11) NOT NULL,
  `objectif` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `trajet` text NOT NULL,
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `id_modele` bigint(20) UNSIGNED NOT NULL,
  `nom_modele` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id_modele`, `nom_modele`, `created_at`, `updated_at`) VALUES
(10, 'BDO', '2024-01-03 08:51:56', '2024-01-03 08:51:56');

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
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id_prestataire` bigint(20) UNSIGNED NOT NULL,
  `nom_prestataire` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestataires`
--

INSERT INTO `prestataires` (`id_prestataire`, `nom_prestataire`, `contact`, `adresse`, `created_at`, `updated_at`) VALUES
(5, 'BDO', '78862065', 'Kati', '2024-01-03 09:00:01', '2024-01-03 09:00:01');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `nom_service`, `description`, `created_at`, `updated_at`) VALUES
(4, 'CELLULE', 'INFORMATIQUE', '2024-01-06 13:41:43', '2024-01-06 13:41:43');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id_vehicule` bigint(20) UNSIGNED NOT NULL,
  `immatriculation` varchar(255) DEFAULT NULL,
  `date_immatriculation` date DEFAULT NULL,
  `date_acquisition` date DEFAULT NULL,
  `etat_vehicule` varchar(255) DEFAULT NULL,
  `numero_chasis` varchar(255) DEFAULT NULL,
  `date_circulation` date DEFAULT NULL,
  `utilite` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `id_modele` bigint(20) UNSIGNED DEFAULT NULL,
  `id_marque` bigint(20) UNSIGNED DEFAULT NULL,
  `energie` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_vehicule`, `immatriculation`, `date_immatriculation`, `date_acquisition`, `etat_vehicule`, `numero_chasis`, `date_circulation`, `utilite`, `statut`, `id_modele`, `id_marque`, `energie`, `created_at`, `updated_at`) VALUES
(19, 'CH4354', '2024-01-01', '2024-01-01', 'Bon', '234567', '2024-01-03', 'Service', 'Actif', 10, 20, 'Essence', '2024-01-03 08:53:51', '2024-01-03 08:53:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectations`
--
ALTER TABLE `affectations`
  ADD PRIMARY KEY (`id_affectation`),
  ADD KEY `affectations_id_service_foreign` (`id_service`),
  ADD KEY `affectations_id_marque_foreign` (`id_marque`),
  ADD KEY `affectations_id_modele_foreign` (`id_modele`),
  ADD KEY `affectations_id_vehicule_foreign` (`id_vehicule`);

--
-- Index pour la table `assurances`
--
ALTER TABLE `assurances`
  ADD PRIMARY KEY (`id_assurance`),
  ADD KEY `assurances_id_vehicule_foreign` (`id_vehicule`);

--
-- Index pour la table `bons`
--
ALTER TABLE `bons`
  ADD PRIMARY KEY (`id_bon`),
  ADD KEY `bons_id_vehicule_foreign` (`id_vehicule`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  ADD PRIMARY KEY (`id_chauffeur`),
  ADD KEY `chauffeurs_id_service_foreign` (`id_service`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id_incident`),
  ADD KEY `incidents_id_vehicule_foreign` (`id_vehicule`);

--
-- Index pour la table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `maintenances_id_vehicule_foreign` (`id_vehicule`),
  ADD KEY `maintenances_id_prestataire_foreign` (`id_prestataire`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id_mission`),
  ADD KEY `missions_id_vehicule_foreign` (`id_vehicule`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id_modele`);

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
-- Index pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD PRIMARY KEY (`id_prestataire`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD KEY `vehicules_id_modele_foreign` (`id_modele`),
  ADD KEY `vehicules_id_marque_foreign` (`id_marque`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectations`
--
ALTER TABLE `affectations`
  MODIFY `id_affectation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `assurances`
--
ALTER TABLE `assurances`
  MODIFY `id_assurance` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `bons`
--
ALTER TABLE `bons`
  MODIFY `id_bon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  MODIFY `id_chauffeur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id_incident` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id_maintenance` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marque` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id_mission` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id_modele` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id_prestataire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id_vehicule` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectations`
--
ALTER TABLE `affectations`
  ADD CONSTRAINT `affectations_id_marque_foreign` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id_marque`),
  ADD CONSTRAINT `affectations_id_modele_foreign` FOREIGN KEY (`id_modele`) REFERENCES `modeles` (`id_modele`),
  ADD CONSTRAINT `affectations_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`),
  ADD CONSTRAINT `affectations_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `assurances`
--
ALTER TABLE `assurances`
  ADD CONSTRAINT `assurances_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `bons`
--
ALTER TABLE `bons`
  ADD CONSTRAINT `bons_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  ADD CONSTRAINT `chauffeurs_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_id_prestataire_foreign` FOREIGN KEY (`id_prestataire`) REFERENCES `prestataires` (`id_prestataire`),
  ADD CONSTRAINT `maintenances_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_id_vehicule_foreign` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id_vehicule`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_id_marque_foreign` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id_marque`),
  ADD CONSTRAINT `vehicules_id_modele_foreign` FOREIGN KEY (`id_modele`) REFERENCES `modeles` (`id_modele`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
