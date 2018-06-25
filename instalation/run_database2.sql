-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.21-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para test_system
CREATE DATABASE IF NOT EXISTS `test_system` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_system`;

-- Copiando estrutura para tabela test_system.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `id_people` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contact`),
  KEY `contacts_fk_peoples` (`id_people`),
  KEY `contacts_fk_contacts_types` (`id_type`),
  CONSTRAINT `contacts_fk_contacts_types` FOREIGN KEY (`id_type`) REFERENCES `contacts_types` (`id_type`),
  CONSTRAINT `contacts_fk_peoples` FOREIGN KEY (`id_people`) REFERENCES `peoples` (`id_people`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela test_system.contacts: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id_contact`, `id_people`, `id_type`, `contact`, `created_at`) VALUES
	(20, 10, 1, 'test@leo.com', '2018-06-25 13:30:07'),
	(21, 10, 2, '(541) 555-2115', '2018-06-25 13:30:07'),
	(22, 10, 3, '(541) 658-2147', '2018-06-25 13:30:07');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Copiando estrutura para tabela test_system.contacts_types
CREATE TABLE IF NOT EXISTS `contacts_types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela test_system.contacts_types: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `contacts_types` DISABLE KEYS */;
INSERT INTO `contacts_types` (`id_type`, `type`, `created_at`) VALUES
	(1, 'E-mail', '2018-06-25 11:18:01'),
	(2, 'Phone', '2018-06-25 11:18:08'),
	(3, 'Whatsapp', '2018-06-25 11:18:15');
/*!40000 ALTER TABLE `contacts_types` ENABLE KEYS */;

-- Copiando estrutura para tabela test_system.peoples
CREATE TABLE IF NOT EXISTS `peoples` (
  `id_people` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_people`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela test_system.peoples: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` (`id_people`, `name`, `created_at`) VALUES
	(10, 'Leo Test', '2018-06-25 13:32:04');
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
