-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour passgen
CREATE DATABASE IF NOT EXISTS `passgen` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `passgen`;

-- Listage de la structure de la table passgen. password
CREATE TABLE IF NOT EXISTS `password` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table passgen.password : ~2 rows (environ)
/*!40000 ALTER TABLE `password` DISABLE KEYS */;
INSERT INTO `password` (`id`, `password`, `users_id`) VALUES
	(4, 'teBOcoNIryJUsuWUvySApyVO8_', 1),
	(5, 'jaBUgaMYryJEdeFAsoTUmoXI1*', 1),
	(9, 'xoCYpaJUwuWYpyCAneLAbeGO2!', 1),
	(10, 'loDOsaQUneSOqiHIliMYziVO9!', 1);
/*!40000 ALTER TABLE `password` ENABLE KEYS */;

-- Listage de la structure de la table passgen. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table passgen.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `pseudo`, `password`) VALUES
	(1, 'test@test.fr', 'test', '$2y$10$QqrvDRcgxBP5WJLAXFCDTOPovM0puO4hblEuxtTXyYGIXKTBehgZm'),
	(2, 'test@test.fr', 'michel', '$2y$10$WYBwC0LFAPwAFCBM86F8beV3LCgL81wbSRbn9ZtdMMS9l7VEbASLu');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
