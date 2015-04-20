-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for wowcms
CREATE DATABASE IF NOT EXISTS `wowcms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wowcms`;


-- Dumping structure for table wowcms.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `msg` text,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.chat: ~3 rows (approximately)
DELETE FROM `chat`;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` (`id`, `user`, `msg`, `posttime`) VALUES
	(1, 'Phentom', 'Hey!', '2014-10-04 16:39:43'),
	(2, 'User', 'Hey, thanks for the CMS!', '2014-10-04 16:39:59'),
	(3, 'Phentom', 'No problem, Enjoy!', '2014-10-04 16:40:21');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;


-- Dumping structure for table wowcms.info
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT 'Phentom CMS',
  `slogan` varchar(100) NOT NULL DEFAULT 'The Best WoW Free CMS',
  `core` varchar(50) NOT NULL DEFAULT 'trinity',
  `expansion` int(11) NOT NULL DEFAULT '1',
  `acc_db` varchar(50) NOT NULL DEFAULT 'auth',
  `char_db` varchar(50) NOT NULL DEFAULT 'characters',
  `world_db` varchar(50) NOT NULL DEFAULT 'world',
  `style` varchar(50) NOT NULL DEFAULT 'dark',
  `onplayers` int(11) NOT NULL DEFAULT '100',
  `slider` varchar(50) NOT NULL DEFAULT 'off',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.info: ~1 rows (approximately)
DELETE FROM `info`;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` (`id`, `title`, `slogan`, `core`, `expansion`, `acc_db`, `char_db`, `world_db`, `style`, `onplayers`, `slider`) VALUES
	(1, 'Phentom CMS', 'The Best WoW Free CMS', 'trinity', 1, 'auth', 'characters', 'world', 'default', 100, 'off');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;


-- Dumping structure for table wowcms.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'link name',
  `link` varchar(50) NOT NULL DEFAULT '?page=',
  `link_order` int(11) DEFAULT NULL,
  `logged` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT 'left',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.menu: ~8 rows (approximately)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `link`, `link_order`, `logged`, `position`) VALUES
	(1, 'Account P', '?page=account', 2, 1, 'left'),
	(2, 'Forum', '?page=forum', 4, 0, 'left'),
	(3, 'Store', '?page=store', 6, 1, 'right'),
	(4, 'Armory', '?page=armory', 7, 0, 'right'),
	(5, 'Media', '?page=media', 8, 0, 'right'),
	(6, 'Home', 'index.php', 1, 0, 'left'),
	(7, 'Login', '?page=login', 3, 0, 'left'),
	(8, 'Register', '?page=register', 5, 0, 'right');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table wowcms.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT 'Announcement',
  `user` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `media` varchar(50) NOT NULL DEFAULT 'news.jpg',
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.news: ~4 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `user`, `content`, `media`, `posttime`) VALUES
	(1, 'Announcement', 'Phentom', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'news.jpg', '2014-10-04 16:57:09'),
	(2, 'Announcement', 'Phentom', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'news.jpg', '2014-10-04 16:57:09'),
	(3, 'Announcement', 'Phentom', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'news.jpg', '2014-10-04 16:57:09'),
	(4, 'Announcement', 'Phentom', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'news.jpg', '2014-10-04 16:57:09');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table wowcms.voted_cooldown
CREATE TABLE IF NOT EXISTS `voted_cooldown` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `vote_link_id` int(11) NOT NULL DEFAULT '0',
  `voted` int(11) NOT NULL DEFAULT '0',
  `voted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.voted_cooldown: ~0 rows (approximately)
DELETE FROM `voted_cooldown`;
/*!40000 ALTER TABLE `voted_cooldown` DISABLE KEYS */;
/*!40000 ALTER TABLE `voted_cooldown` ENABLE KEYS */;


-- Dumping structure for table wowcms.vote_links
CREATE TABLE IF NOT EXISTS `vote_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `vote_link` varchar(50) DEFAULT NULL,
  `vote_img` varchar(50) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table wowcms.vote_links: ~0 rows (approximately)
DELETE FROM `vote_links`;
/*!40000 ALTER TABLE `vote_links` DISABLE KEYS */;
INSERT INTO `vote_links` (`id`, `name`, `vote_link`, `vote_img`, `value`) VALUES
	(1, 'Open WoW Toplist', 'http://www.openwow.com/vote=3077', 'http://cdn.openwow.com/toplist/vote_small.jpg', 10);
/*!40000 ALTER TABLE `vote_links` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
