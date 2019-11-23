-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.43 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица yii2_setra.task
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `create_datetime` datetime NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2_setra.task: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`id`, `name`, `create_datetime`, `type`, `status`, `description`, `start_datetime`, `end_datetime`) VALUES
	(1, 'Task1', '2019-11-23 21:54:19', 0, 0, 'Task1 Task1 Task1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Task2', '2019-11-23 21:56:14', 0, 0, 'Task2 Task2 Task2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Task3', '2019-11-23 21:56:35', 0, 0, 'Task3 Task3 Task3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Task4', '2019-11-23 21:56:56', 1, 1, 'Task4 Task4 Task4', '2019-11-23 21:56:56', '0000-00-00 00:00:00'),
	(5, 'Task5', '2019-11-23 21:57:19', 1, 1, 'Task5 Task5 Task5', '2019-11-23 21:57:19', '0000-00-00 00:00:00'),
	(6, 'Task6', '2019-11-23 21:57:38', 2, 0, 'Task6 Task6 Task6', '2019-11-23 21:57:38', '2019-11-23 21:57:50');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
