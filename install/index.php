<?php
//Refuses Direct Access
if(!defined("PhentomCMS")){ exit; };

include_once "language/".$_SESSION['lang']."/general.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $lang['page_title']; ?></title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo install; ?>/style/main.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="languages">
			<?php
			$files = scandir(install.'/language/');
			foreach($files as $file) {
				if(is_dir($file) != '.' && $file != 'index.html'){
			 		echo "<a href='?language=".$file."'><img src='".install."/images/".$file.".png' /></a>";
				}
			}
			
			if(!isset($_GET['language']) || empty($_GET['language'])){}
			else{
				$files = scandir(install.'/language/');
				foreach($files as $file) {
					if(is_dir($file) != '.' && $file != 'index.html' && $file == $_GET['language']){
						$_SESSION['lang'] = $file;
						header("Location: ".$_SESSION['location']."");
						continue;
					}
				}
			}
			?>
		</div>
		<div id="wrapper">
			<?php
			if(!isset($_GET['page']) || empty($_GET['page'])){
				include_once "language/".$_SESSION['lang']."/db_info.php";
				include_once "include/db_info.php";
				$_SESSION['location'] = "index.php";
			}
			else{
				if($_GET['page'] == "web"){
					include_once "language/".$_SESSION['lang']."/web_info.php";
					include_once "include/web_info.php";
					$_SESSION['location'] = "index.php?page=".$_GET['page'];
				}
				elseif($_GET['page'] == "server"){
					include_once "language/".$_SESSION['lang']."/server_info.php";
					include_once "include/server_info.php";
					$_SESSION['location'] = "index.php?page=".$_GET['page'];
				}
				else{
					include_once "language/".$_SESSION['lang']."/db_info.php";
					include_once "include/db_info.php";
					$_SESSION['location'] = "index.php";
				}
			}
			?>
			<div id="footer">
				<b><a class="phentom">Phentom</a>CMS</b> Design & Coded By <a href="http://phentom.net" target="blank" class="phentom">Phentom</a> 2014
			</div>
		</div>
	</body>
</html>