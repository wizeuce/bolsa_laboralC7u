-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_laboral
CREATE DATABASE IF NOT EXISTS `sistema_laboral`;
USE `sistema_laboral`;

-- Volcando estructura para tabla sistema_laboral.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razón_social` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ruc` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dirección` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `teléfono` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_rol` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_laboral.empresa: ~4 rows (aproximadamente)
REPLACE INTO `empresa` (`id`, `razón_social`, `ruc`, `dirección`, `teléfono`, `correo`, `id_rol`, `id_usuario`, `created`, `updated`) VALUES
	(2, 'Empresa de Prueba SAC', '212341234123', 'Plaza de Armas', '4123412', 'Plazaita@gmail.com', NULL, 10, '2024-04-21 17:42:55', '2024-04-22 00:06:27'),
	(5, 'Empresa de Prueba  2 SAC', '412341234', 'asdfasd', '14234132', '1234@gmail.com', NULL, 0, '2024-04-22 00:12:54', '2024-04-22 00:12:54'),
	(6, 'Empresa de Prueba  3 SAC', '2134431234123', 'Plaza de Armas', '14234123', '4134@gmail.com', NULL, 0, '2024-04-22 00:13:16', '2024-04-22 00:13:16'),
	(7, 'safdfas', '325434253412', 'asdfasd', '532453214', 'fsdafasd', NULL, 0, '2024-04-22 00:13:38', '2024-04-22 00:13:38');

-- Volcando estructura para tabla sistema_laboral.oferta_laboral
CREATE TABLE IF NOT EXISTS `oferta_laboral` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripción` text COLLATE utf8mb4_general_ci,
  `fecha_publicación` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `remuneración` decimal(10,2) DEFAULT NULL,
  `ubicación` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo` enum('presencial','remoto') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `limite_postulantes` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_laboral.oferta_laboral: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_laboral.postulaciones
CREATE TABLE IF NOT EXISTS `postulaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_oferta` int DEFAULT NULL,
  `fecha_hora_postulacion` datetime DEFAULT NULL,
  `estado_actual` enum('abierto','cerrado') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_laboral.postulaciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_laboral.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dni` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dirección` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `teléfono` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_rol` int DEFAULT NULL,
  `ruta_imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ruta_cv` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asignado` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sistema_laboral.usuarios: ~3 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nombre`, `apellidos`, `dni`, `dirección`, `teléfono`, `usuario`, `contrasena`, `id_rol`, `ruta_imagen`, `ruta_cv`, `asignado`, `created`, `updated`) VALUES
	(1, 'Luis Martin', 'Vilca', '123456789', '', 'sdfasdfas', 'Luis.Vilca', '12345678', 1, NULL, NULL, 2, '2024-04-04 20:56:48', '2024-04-22 00:07:15'),
	(9, 'fasdfas', 'sdafasdfas', '3454534', '', '5132423', 'fasdasdfasd', 'ffdsfas', NULL, NULL, NULL, 0, '2024-04-12 01:03:09', '2024-04-21 18:06:59'),
	(10, 'Administrador', 'admin', '2341234', '', '998712341', 'admin', 'admin', 1, NULL, NULL, 0, '2024-04-12 01:28:29', '2024-04-22 00:06:48');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
