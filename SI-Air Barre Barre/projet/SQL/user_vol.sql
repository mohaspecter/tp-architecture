-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.12-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour nantes
CREATE DATABASE IF NOT EXISTS `nantes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nantes`;

-- Listage de la structure de la table nantes. user_vol
CREATE TABLE IF NOT EXISTS `user_vol` (
  `id_user` int(11) DEFAULT NULL,
  `id_vol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table nantes.user_vol : ~0 rows (environ)
DELETE FROM `user_vol`;
/*!40000 ALTER TABLE `user_vol` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_vol` ENABLE KEYS */;

-- Listage de la structure de la table nantes. vol
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int(11) NOT NULL,
  `depart` varchar(50) DEFAULT NULL,
  `arrivee` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table nantes.vol : ~5 rows (environ)
DELETE FROM `vol`;
/*!40000 ALTER TABLE `vol` DISABLE KEYS */;
INSERT INTO `vol` (`id_vol`, `depart`, `arrivee`) VALUES
	(1, 'Paris', 'Londres'),
	(2, 'Londres', 'Paris'),
	(3, 'Nantes', 'Dubai'),
	(4, 'Dubai', 'Nantes'),
	(5, 'Nantes', 'Londres');
/*!40000 ALTER TABLE `vol` ENABLE KEYS */;

-- Listage de la structure de la table nantes. v_user
CREATE TABLE IF NOT EXISTS `v_user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table nantes.v_user : ~1 rows (environ)
DELETE FROM `v_user`;
/*!40000 ALTER TABLE `v_user` DISABLE KEYS */;
INSERT INTO `v_user` (`id_user`, `nom_user`) VALUES
	(1, 'client');
/*!40000 ALTER TABLE `v_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
