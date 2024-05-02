-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 11:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolsa_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `ruc` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `creador` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `razon_social`, `ruc`, `direccion`, `telefono`, `correo`, `creador`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Universidad Peruana Unión', '202020202026', 'Av. Brasil', '99744848', 'upeujuliaca@gmail.com', 'Nombre del creador', 1, NULL, NULL),
(2, 'Clinica Americana', '202326541200', 'Av. Brasil', '99744848', 'clinicaamericana@gmail.com', 'Nombre del creador', 4, NULL, NULL),
(3, 'Colegio Santo Domingo', '20321654984510', 'Av. Brasil', '99744848', 'colegiosd@gmail.com', 'Nombre del creador', 3, NULL, NULL),
(4, 'Mercado Hola', '201010101011', 'Jr. Vilcabamba', '987654321', 'mercadohola@gmail.com', 'Nombre del creador', 2, NULL, NULL),
(5, 'Coliseo Manco Capac', '202320201984', 'Av. Jaramilluyoc', '997448512', 'coliseomc@gmail.com', 'Nombre del creador', NULL, NULL, NULL),
(17, 'Mercado Hola', '20212123032032', 'Urpipata Alta ASD', '998445120', 'mercadohola@gmail.com', '', NULL, NULL, NULL),
(18, 'Mercado Tio', '20212123032032', 'sss Alta ASD', '998445120', 'mercadotio@gmail.com', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'galery/92ec9ca62f0fb9bccff015ef6482f7df.png', 1, 'App\\Models\\Product', '2024-04-20 12:45:52', '2024-04-20 12:45:52'),
(2, 'galery/637125db85064730c64a3d52c821b9e2.png', 1, 'App\\Models\\Product', '2024-04-20 12:45:52', '2024-04-20 12:45:52'),
(3, 'galery/2729100a53217b417be7fe49448e176f.png', 1, 'App\\Models\\Product', '2024-04-20 12:45:52', '2024-04-20 12:45:52'),
(4, 'galery/dHX9eZeXYbmr53QGVZtZZiyigFxTcDwlCSOS3WIi.png', 2, 'App\\Models\\Oferta_laboral', '2024-04-20 21:01:58', '2024-04-20 21:01:58'),
(5, 'galery/ORmhHvpgWS9ILaDBKEBf6BnfG9NFBgN44Abk5CVA.jpg', 4, 'App\\Models\\Oferta_laboral', '2024-04-20 21:02:48', '2024-04-20 21:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oferta_laborals`
--

CREATE TABLE `oferta_laborals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_publicacion` varchar(255) NOT NULL,
  `fecha_cierre` varchar(255) NOT NULL,
  `remuneracion` double NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `tipo` enum('1','2') NOT NULL DEFAULT '2',
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oferta_laborals`
--

INSERT INTO `oferta_laborals` (`id`, `titulo`, `descripcion`, `fecha_publicacion`, `fecha_cierre`, `remuneracion`, `ubicacion`, `tipo`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, 'Director de TI', 'Se necesita urgente para esa área, con experiencia de 1 año o recién egresado', '15 de abril', '20 de abril', 15002, 'Al centro de Juliaca', '1', 1, '2024-04-22 02:42:08', '2024-04-22 02:42:08'),
(2, 'Desarrollador Web - Frontend', 'Se necesita urgente para esa área, con experiencia de 1 año o recién egresado', '10 de abril', '20 de abril', 3500, 'Salida Arequipa', '2', 1, '2024-04-22 02:42:08', '2024-04-22 02:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postulacions`
--

CREATE TABLE `postulacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `oferta_laboral_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_hora_postulacion` timestamp NULL DEFAULT NULL,
  `tipo` enum('1','2') NOT NULL DEFAULT '2',
  `seleccionado` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2024-04-20 12:45:29', '2024-04-20 12:45:29'),
(2, 'Administrador', 'web', '2024-04-20 12:45:29', '2024-04-20 12:45:29'),
(3, 'Postulante', 'web', '2024-04-20 12:45:29', '2024-04-20 12:45:29'),
(4, 'Sin autorización', '', '2024-04-02 21:51:58', '2024-04-12 21:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `id_rol` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nombres`, `apellidos`, `dni`, `direccion`, `telefono`, `email`, `email_verified_at`, `password`, `profile_photo_path`, `id_rol`, `created_at`, `updated_at`) VALUES
(1, 'Manuel CM', 'Manuel', 'Chunca Mamani', '77298560', 'Av. Vilcabamba', '997448549', 'manuel.chunca@upeu.edu.pe', '2024-04-20 12:45:29', '12345678', NULL, 1, '2024-04-20 12:45:30', '2024-04-20 12:45:30'),
(2, 'Frank GCM', 'Frank Grimaldy', 'Chunca Mamani', '77596200', 'Av. brasil', '9974458612', 'frank.chunca@upeu.edu.pe', '2024-04-20 12:45:30', '12345678', NULL, 2, '2024-04-20 12:45:30', '2024-04-20 12:45:30'),
(3, 'Dan ECP', 'Dan Elioth', 'Condori Pongo', '77295260', 'Av. Lima', '994512654', 'dan.condori@upeu.edu.pe', '2024-04-20 12:45:30', '12345678', NULL, 2, '2024-04-20 12:45:30', '2024-04-20 12:45:30'),
(4, 'Frank MM', 'Frank', 'Machaca Molleapaza', '77485130', 'Av. Cusco', '997445120', 'frank.machaca@upeu.edu.pe', '2024-04-20 12:45:30', '12345678', NULL, 3, '2024-04-20 12:45:30', '2024-04-20 12:45:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oferta_laborals`
--
ALTER TABLE `oferta_laborals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oferta_laborals_empresa_id_foreign` (`empresa_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `postulacions`
--
ALTER TABLE `postulacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postulacions_user_id_foreign` (`user_id`),
  ADD KEY `postulacions_oferta_laboral_id_foreign` (`oferta_laboral_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_rol_foreign` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oferta_laborals`
--
ALTER TABLE `oferta_laborals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postulacions`
--
ALTER TABLE `postulacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oferta_laborals`
--
ALTER TABLE `oferta_laborals`
  ADD CONSTRAINT `oferta_laborals_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `postulacions`
--
ALTER TABLE `postulacions`
  ADD CONSTRAINT `postulacions_oferta_laboral_id_foreign` FOREIGN KEY (`oferta_laboral_id`) REFERENCES `oferta_laborals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `postulacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
