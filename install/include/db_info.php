<?php
//Refuses Direct Access
if(!defined("PhentomCMS")){ exit; };
?>
<div class="block">
	<h3><img src="<?php echo install; ?>/images/database.png" /> <?php echo $lang['title'];?></h3>
	<form action="" method="post" autocomplete="off">
		<p><?php echo $lang['db_host']; ?><br /><input type="text" name="host" required="required"/><br /></p>
		<p><?php echo $lang['db_user']; ?><br /><input type="text" name="db-user" required="required"/><br /></p>
		<p><?php echo $lang['db_pass']; ?><br /><input type="password" name="db-pass"/><br /></p>	
		<p><?php echo $lang['verify']." ".$lang['db_pass']; ?><br /><input type="password" name="v-pass"/><br /></p>
		<p><input type="submit" name="submit" value="<?php echo $lang['next_step']; ?>" /></p>
	</form>
</div>
<?php
if(!isset($_POST['submit'])){}
else{
	if(empty($_POST['host']) OR empty($_POST['db-user']) OR empty($_POST['db-user'])){
		?>
		<div class="fail"><?php echo $lang['complete_fields']; ?></div>
		<?php
	}
	elseif($_POST['db-pass'] != $_POST['v-pass']){
		?>
		<div class="fail"><?php echo $lang['pass_mismatch']; ?></div>
		<?php
	}
	else{
		if(!$try_connection = @mysqli_connect($_POST['host'],$_POST['db-user'],$_POST['db-pass'])){
			?>
			<div class="fail"><?php echo $lang['db_connect_fail']; ?></div>
			<?php	
		}
		else{
			$config_file = 'content/include/db.php';
			$handle = fopen($config_file, 'a') or die('Cannot open file:  '.$config_file); //opens file
			$data = '//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

ob_start();
			
$host="'.$_POST["host"].'"; 
$user="'.$_POST["db-user"].'"; 
$password="'.$_POST["db-pass"].'"; 
$database="wowcms";

$mysqli = new mysqli($host, $user, $password, $database);
			
if (!$mysqli){
	echo "Error in DB Connection";
}

$infoquery = $mysqli -> query("SELECT * FROM info LIMIT 1");
				
while($row = $infoquery -> fetch_array(MYSQLI_ASSOC)){
	$title = $row["title"];
	$slogan = $row["slogan"];
	$core = $row["core"];
	$expansion = $row["expansion"];
	$acc_db = $row["acc_db"];
	$char_db = $row["char_db"];
	$world_db = $row["world_db"];
	$style = $row["style"];
	$on_players = $row["onplayers"];
	$slider = $row["slider"];
}
			
$cms_version = "1.0 Beta";
			
switch ($expansion) {
	case "0":
		$trinity_expansion = 0;
		$arcemu_expansion = 0;
		break;
	case "1":
		$trinity_expansion = 1;
		$arcemu_expansion = 8;
		break;
	case "2":
		$trinity_expansion = 2;
		$arcemu_expansion = 24;
		break;
	case "3":
		$trinity_expansion = 3;
		$arcemu_expansion = 32;
		break;
	case "4":
		$trinity_expansion = 4;
		break;
	default:
		$trinity_expansion = 1;
		$arcemu_expansion = 8;
		break;
}
?>';
			fwrite($handle, $data);
			fclose($handle);
			
			$create_database = "CREATE DATABASE IF NOT EXISTS `test`";
			
			$create_table1 = "
				CREATE TABLE IF NOT EXISTS `chat` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `user` varchar(50) DEFAULT NULL,
				  `msg` text,
				  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
			$create_table2 = "
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
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
			$create_table3 = "
				CREATE TABLE IF NOT EXISTS `menu` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(50) NOT NULL DEFAULT 'link name',
				  `link` varchar(50) NOT NULL DEFAULT '?page=',
				  `link_order` int(11) DEFAULT NULL,
				  `logged` int(11) NOT NULL DEFAULT '0',
				  `position` varchar(50) NOT NULL DEFAULT 'left',
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
			$create_table4 = "
				CREATE TABLE IF NOT EXISTS `news` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(50) NOT NULL DEFAULT 'Announcement',
				  `user` varchar(50) DEFAULT NULL,
				  `content` text NOT NULL,
				  `media` varchar(50) NOT NULL DEFAULT 'news.jpg',
				  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			
			$create_table5 = "
				CREATE TABLE IF NOT EXISTS `voted_cooldown` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `username` varchar(50) NOT NULL DEFAULT '0',
				  `vote_link_id` int(11) NOT NULL DEFAULT '0',
				  `voted` int(11) NOT NULL DEFAULT '0',
				  `voted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			
			$create_table6 = "
				CREATE TABLE IF NOT EXISTS `vote_links` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(50) DEFAULT NULL,
				  `vote_link` varchar(50) DEFAULT NULL,
				  `vote_img` varchar(50) DEFAULT NULL,
				  `value` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
			$insert_data1 = "
				INSERT INTO `menu` (`id`, `name`, `link`, `link_order`, `logged`, `position`) VALUES
					(1, 'Account P', '?page=account', 2, 1, 'left'),
					(2, 'Forum', '?page=forum', 4, 0, 'left'),
					(3, 'Store', '?page=store', 6, 1, 'right'),
					(4, 'Armory', '?page=armory', 7, 0, 'right'),
					(5, 'Media', '?page=media', 8, 0, 'right'),
					(6, 'Home', 'index.php', 1, 0, 'left'),
					(7, 'Login', '?page=login', 3, 0, 'left'),
					(8, 'Register', '?page=register', 5, 0, 'right');";
				
			mysqli_query($try_connection, $create_database);
			mysqli_select_db($try_connection, "test");
			mysqli_query($try_connection, $create_table1);
			mysqli_query($try_connection, $create_table2);
			mysqli_query($try_connection, $create_table3);
			mysqli_query($try_connection, $create_table4);
			mysqli_query($try_connection, $create_table5);
			mysqli_query($try_connection, $create_table6);
			mysqli_query($try_connection, $insert_data1);
			header("Location: ?page=web");
		}
	}
}
?>