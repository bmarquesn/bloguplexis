-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bloguplexis
CREATE DATABASE IF NOT EXISTS `bloguplexis` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bloguplexis`;

-- Dumping structure for table bloguplexis.artigo
CREATE TABLE IF NOT EXISTS `artigo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bloguplexis.artigo: ~4 rows (approximately)
/*!40000 ALTER TABLE `artigo` DISABLE KEYS */;
INSERT INTO `artigo` (`id`, `id_usuario`, `titulo`, `link`, `created_at`, `updated_at`) VALUES
	(77, 1, 'Gestão', 'https://uplexis.com.br/blog/gestao/melhor-modelo-de-decisao/', '2019-09-23 01:16:42', NULL),
	(78, 1, '[Ebook] 6 instrumentos de coleta de dados', 'https://uplexis.com.br/blog/ebooks/ebook-6-instrumentos-de-coleta-de-dados/', '2019-09-23 01:16:42', NULL),
	(79, 1, 'O que é a lei da ficha limpa?', 'https://uplexis.com.br/blog/compliance/o-que-e-lei-da-ficha-limpa/', '2019-09-23 01:16:42', NULL),
	(80, 1, 'Saiba como coletar dados eficientemente', 'https://uplexis.com.br/blog/gestao/como-coletar-dados/', '2019-09-23 01:16:42', NULL);
/*!40000 ALTER TABLE `artigo` ENABLE KEYS */;

-- Dumping structure for table bloguplexis.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bloguplexis.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_09_21_105703_create_usuario_table', 1),
	(2, '2019_09_21_110155_create_artigo_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bloguplexis.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bloguplexis.usuario: ~1 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `usuario`, `senha`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '6af3fdc911ce231a58b54bafb464124b', NULL, NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
