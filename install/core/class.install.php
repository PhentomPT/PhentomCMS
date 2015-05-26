<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

/**
 * This class is used for installation related functions <br/>
 * Extends the class.database.php in order to
 * operate with information stored in the
 * database
 *
 * @name	: class.install.php
 * @package	: PhentomCMS
 * @author	: PhentomPT <phentom.net@gmail.com>
 * @link	: phentom.net
 * @version	: 2.0
 */

class Install extends Database{
	
	public $dbhost;
	public $dbuser;
	public $dbpass;
	public $dbname;
	public $dbforum;
	public $server_name;
	public $server_slogan;
	public $server_user;
	public $server_password;
	public $server_core;
	public $server_expansion;
	public $server_players;
	public $server_slider;
	public $error;
	
	/**
	 * Gets the right expansion number according to the server core
	 *
	 * @param	: $expansion (integer)
	 * @param	: $core (string)
	 * @return	: $expansion_number (integer)
	 */
	public function getExpansion($expansion,$core){
		if ($core == "arcemu"){
			switch ($expansion) {
				case "0":
					$expansion_number = 0;
					break;
				case "1":
					$expansion_number = 8;
					break;
				case "2":
					$expansion_number = 24;
					break;
				case "3":
					$expansion_number = 32;
					break;
				default:
					$expansion_number = 8;
					break;
			}	
		}
		else{
			$expansion_number = $expansion;
		}
		
		return $expansion_number;
	}
	
	/**
	 * Gets the name of the databases according to the server core
	 *
	 * @param	: $core (string)
	 * @return	: $core_db (array)
	 */
	public function getCoreDatabases($core){
		switch ($core) {
			case "arcemu":
				$core_db['accounts'] = "logon";
				$core_db['characters'] = "character";
				$core_db['world'] = "world";
				break;
			case "mangos":
				$core_db['accounts'] = "realm";
				$core_db['characters'] = "character";
				$core_db['world'] = "world";
				break;
			case "trinity":
			case "trinity_v6":
				$core_db['accounts'] = "auth";
				$core_db['characters'] = "characters";
				$core_db['world'] = "world";
				break;
			default:
				$core_db['accounts'] = "auth";
				$core_db['characters'] = "characters";
				$core_db['world'] = "world";
				break;
		}
		
		return $core_db;
	}
	
	/**
	 * Inserts an admin account
	 *
	 */
	public function insertAdmin(){
		$core_db = $this->getCoreDatabases($this->server_core);
		$true_expansion = $this->getExpansion($this->server_expansion,$this->server_core);
		
		$salt = strtoupper($this->server_user);
		$password = strtoupper($this->server_password);
		$encrypted = SHA1($salt.':'.$password);
		
		switch ($this->server_core){
			case "arcemu":
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".accounts (login, encrypted_password, gm, flags) VALUES ('". $this->server_user ."', '". $encrypted ."', 'az', '". $true_expansion ."');");
				$account_id = $this->SimpleQuery("SELECT acct as id, login as username FROM ". $core_db['accounts'] .".accounts ORDER BY acct DESC LIMIT 1");
				break;
			case "trinity":
			case "trinity_v6":
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".account (username, sha_pass_hash, expansion) VALUES ('". $this->server_user ."', '". $encrypted ."', '". $true_expansion ."');");
				$account_id = $this->SimpleQuery("SELECT id, username FROM ". $core_db['accounts'] .".account WHERE username='". $this->server_user ."' LIMIT 1;");
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".account_access (id,gmlevel) VALUES ('". $account_id[0]['id'] ."', 3);");
				break;
			case "mangos":
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".account (username, sha_pass_hash, gmlevel, expansion) VALUES ('". $this->server_user ."','". $encrypted ."', 3, '". $true_expansion ."');");
				$account_id = $this->SimpleQuery("SELECT id,username FROM ". $core_db['accounts'] .".account ORDER BY id DESC LIMIT 1");
				break;
			default:
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".account (username, sha_pass_hash, expansion) VALUES ('". $this->server_user ."', '". $encrypted ."', '". $true_expansion ."');");
				$account_id = $this->SimpleQuery("SELECT id, username FROM ". $core_db['accounts'] .".account WHERE username='". $this->server_user ."' LIMIT 1;");
				$this->SimpleUpdateQuery("INSERT INTO ". $core_db['accounts'] .".account_access (id,gmlevel) VALUES ('". $account_id[0]['id'] ."', 3);");
				break;
		}
		
		$this->SimpleUpdateQuery("INSERT INTO ". DBNAME .".account_info (account_id,username) VALUES ('". $account_id[0]['id'] ."', '". $account_id[0]['username'] ."')");
	}
	
	/**
	 * Appends the database information to every config file,
	 * and creates the website and forum database
	 *
	 */
	public function addInfo() {
		//Config File
		$config_file = "core/config.php";
	
		$config_data = '
		//DB constants
		define("DBHOST", "'.$this->dbhost.'");
		define("DBUSER", "'.$this->dbuser.'");
		define("DBPASS", "'.$this->dbpass.'");
		define("DBNAME", "'.$this->dbname.'");
		define("DBFORUM", "'.$this->dbforum.'");
		define("DBPORT", "3306");';
	
		//Scans Webpath to get all web applications
		$apps = array_diff(scandir(WEB_PATH), array(".","..","index.php","README",".git","core","LICENSE"));
	
		//Opens the config file of every web application and appends the data
		foreach ($apps as $value){
			$handle = fopen(WEB_PATH ."/". $value ."/". $config_file, 'a') or die("Cannot open file:  ". WEB_PATH ."/". $value ."/". $config_file);
			fwrite($handle, $config_data);
			fclose($handle);
		}
	
		//Main querys to create the necessary databases
		$create_database_website = "CREATE DATABASE IF NOT EXISTS `". $this->dbname ."`;";
		$create_database_forum = "CREATE DATABASE IF NOT EXISTS `". $this->dbforum ."`;";
	
		$con = @mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass);
	
		//Creates database for the Website
		mysqli_query($con,$create_database_website);
		mysqli_query($con,$create_database_forum);
		
		mysqli_close($con);
	}
	
	/**
	 * Inserts every table needed in the database and its info
	 *
	 */
	public function finishDb() {
		
		//Gets the expansion number and the database names
		$expansion = $this->getExpansion($this->server_expansion, $this->server_core);
		$core = $this->getCoreDatabases($this->server_core);
		
		//Main querys to create the necessary tables
		$create_table_chat = "CREATE TABLE IF NOT EXISTS `chat` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `user` varchar(50) DEFAULT NULL,
				  `msg` text,
				  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_table_account_info = "CREATE TABLE `account_info` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`account_id` INT(11) NOT NULL,
			`username` VARCHAR(50) NOT NULL,
			`vote_points` INT(11) NOT NULL DEFAULT '0',
			`donation_points` INT(11) NOT NULL DEFAULT '0',
			`avatar` VARCHAR(50) NOT NULL DEFAULT 'default.png',
			`rank` INT(11) NOT NULL DEFAULT '0',
			`special` VARCHAR(50) NOT NULL DEFAULT '0',
			`join_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			UNIQUE INDEX `account_id` (`account_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		$create_table_info = "CREATE TABLE IF NOT EXISTS `info` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(50) NOT NULL DEFAULT '". $this->server_name ."',
				  `slogan` varchar(100) NOT NULL DEFAULT '". $this->server_slogan ."',
				  `core` varchar(50) NOT NULL DEFAULT '". $this->server_core ."',
				  `expansion` int(11) NOT NULL DEFAULT '". $expansion ."',
				  `acc_db` varchar(50) NOT NULL DEFAULT '". $core['accounts'] ."',
				  `char_db` varchar(50) NOT NULL DEFAULT '". $core['characters'] ."',
				  `world_db` varchar(50) NOT NULL DEFAULT '". $core['world'] ."',
				  `style` varchar(50) NOT NULL DEFAULT 'default',
				  `onplayers` int(11) NOT NULL DEFAULT '". $this->server_players ."',
				  `slider` varchar(50) NOT NULL DEFAULT '". $this->server_slider ."',
				  `realmlist` text NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		$create_table_menu = "CREATE TABLE IF NOT EXISTS `menu` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(50) NOT NULL DEFAULT 'link name',
				  `link` varchar(50) NOT NULL DEFAULT '?page=',
				  `link_order` int(11) DEFAULT NULL,
				  `logged` int(11) NOT NULL DEFAULT '0',
				  `position` varchar(50) NOT NULL DEFAULT 'left',
				  `icon` varchar(50) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		$create_table_news = "CREATE TABLE IF NOT EXISTS `news` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(50) NOT NULL DEFAULT 'Announcement',
				  `user` varchar(50) DEFAULT NULL,
				  `content` text NOT NULL,
				  `media` varchar(50) NOT NULL DEFAULT 'news.jpg',
				  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			
		$create_table_voted_cooldown = "CREATE TABLE IF NOT EXISTS `voted_cooldown` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `username` varchar(50) NOT NULL DEFAULT '0',
				  `vote_link_id` int(11) NOT NULL DEFAULT '0',
				  `voted` int(11) NOT NULL DEFAULT '0',
				  `voted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			
		$create_table_vote_links = "CREATE TABLE IF NOT EXISTS `vote_links` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(50) DEFAULT NULL,
				  `vote_link` varchar(50) DEFAULT NULL,
				  `vote_img` varchar(50) DEFAULT NULL,
				  `value` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_table_statistics = "CREATE TABLE IF NOT EXISTS `statistics` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`session` char(100) DEFAULT NULL,
			`ip` char(20) DEFAULT NULL,
			`country` char(20) DEFAULT NULL,
			`state` char(20) DEFAULT NULL,
			`town` char(20) DEFAULT NULL,
			`last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";
				
		$insert_data_menu = "INSERT INTO `menu` (`id`, `name`, `link`, `link_order`, `logged`, `position`) VALUES
					(1, 'Account P', '?page=account', 2, 1, 'left'),
					(2, 'Forum', '?page=forum', 4, 0, 'left'),
					(3, 'Store', '?page=store', 6, 1, 'right'),
					(4, 'Armory', '?page=armory', 7, 0, 'right'),
					(5, 'Media', '?page=media', 8, 0, 'right'),
					(6, 'Home', 'index.php', 1, 0, 'left'),
					(7, 'Login', '?page=login', 3, 0, 'left'),
					(8, 'Register', '?page=register', 5, 0, 'right');";
		
		$insert_data_info = "INSERT INTO `info` (`title`, `slogan`, `core`, `expansion`, `acc_db`, `char_db`, `world_db`, `style`, `onplayers`, `slider`) VALUES ('". $this->server_name ."', '". $this->server_slogan ."', '". $this->server_core ."', '". $expansion ."', '". $core['accounts'] ."', '". $core['characters'] ."', '". $core['world'] ."', 'default', '". $this->server_players ."', '". $this->server_slider ."');";
			
		$insert_data_news = "INSERT INTO `news` (`title`, `user`, `content`, `media`) VALUES ('Welcome to Phentom CMS!', 'Phentom', 'This is still in development, but every day it gets better!<br/>I hope you like it! Any question or bug just report it in github <br/>Thanks for all the support!', 'news.jpg');";
		
		$create_forum_category = "CREATE TABLE `categorys` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(150) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_forum_forums = "CREATE TABLE `forums` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(150) NOT NULL,
			`description` TEXT NOT NULL,
			`id_category` INT(11) NOT NULL,
			`color` VARCHAR(50) NOT NULL,
			`type` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_forum_menu = "CREATE TABLE `menu` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(50) NOT NULL DEFAULT 'link name',
			`link` VARCHAR(50) NOT NULL DEFAULT '?page=',
			`link_order` INT(11) NULL DEFAULT NULL,
			`logged` INT(11) NOT NULL DEFAULT '0',
			`position` VARCHAR(50) NOT NULL DEFAULT 'left',
			`icon` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_forum_replys = "CREATE TABLE `replys` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`title` VARCHAR(50) NOT NULL,
			`content` TEXT NOT NULL,
			`posted_by` VARCHAR(50) NOT NULL,
			`posted_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			`id_topic` INT(11) NOT NULL,
			`id_forum` INT(11) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$create_forum_topics = "CREATE TABLE `topics` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`title` VARCHAR(50) NOT NULL DEFAULT '0',
			`content` TEXT NOT NULL,
			`type` VARCHAR(50) NOT NULL DEFAULT '0',
			`posted_by` VARCHAR(50) NOT NULL DEFAULT '0',
			`posted_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`views` INT(11) NOT NULL,
			`id_forum` INT(11) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		//Creates tables for the Website
		$this->SelectDb(DBNAME);
		
		/***********************************************
		 * 
		 * The SimpleUpdateQuery function was changed,
		 * before it returned and error to display in 
		 * the end of the installation, now it clears 
		 * the page and specifies the error.
		 * 
		 ***********************************************/
		/*$this->error['chat'] =*/ $this->SimpleUpdateQuery($create_table_chat);
		/*$this->error['account_info'] =*/ $this->SimpleUpdateQuery($create_table_account_info);
		/*$this->error['info'] =*/ $this->SimpleUpdateQuery($create_table_info);
		/*$this->error['menu'] =*/ $this->SimpleUpdateQuery($create_table_menu);
		/*$this->error['news'] =*/ $this->SimpleUpdateQuery($create_table_news);
		/*$this->error['vote_cooldown'] =*/ $this->SimpleUpdateQuery($create_table_voted_cooldown);
		/*$this->error['vote_links'] =*/ $this->SimpleUpdateQuery($create_table_vote_links);
		/*$this->error['statistics'] =*/ $this->SimpleUpdateQuery($create_table_statistics);
		/*$this->error['data_in_menu'] =*/ $this->SimpleUpdateQuery($insert_data_menu);
		/*$this->error['data_in_info'] =*/ $this->SimpleUpdateQuery($insert_data_info);
		/*$this->error['data_in_news'] =*/ $this->SimpleUpdateQuery($insert_data_news);
		
		//Creates the tables for the Forum
		$this->SelectDb(DBFORUM);
		/*$error['create_table1_forum'] =*/ $this->SimpleUpdateQuery($create_forum_category);
		/*$error['create_table2_forum'] =*/ $this->SimpleUpdateQuery($create_forum_forums);
		/*$error['create_table3_forum'] =*/ $this->SimpleUpdateQuery($create_forum_menu);
		/*$error['create_table4_forum'] =*/ $this->SimpleUpdateQuery($create_forum_replys);
		/*$error['create_table5_forum'] =*/ $this->SimpleUpdateQuery($create_forum_topics);
	}
	
	/**
	 * Finishes the installation
	 *
	 */
	public function finish(){
		//Renames the install folder to trash
		rename(WEB_PATH ."/install", WEB_PATH ."/trash");
		
		//Unsets the language session variable
		unset($_SESSION['lang']);
	}
}
