<?php
session_start();

define("PhentomCMS", "WoW Free CMS");

include_once "../content/include/db.php";
include_once "include/functions.php";

//Checks If language Exists
if(!isset($_SESSION['lang']) OR empty($_SESSION['lang'])){
	$_SESSION['lang'] = "english";
}

include_once "include/language/".$_SESSION['lang']."/general.php";

$time = microtime();	
$time = explode(' ', $time);
$time = $time[1] + $time[0];	
$start = $time;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>PhentomCMS - <?php echo $lang['admin_panel']; ?></title>
		<link rel="icon" type="image/x-icon" href="images/wowicon.png"/>
    	<link rel="stylesheet" type="text/css" href="style/main.css">
    	<script src="../content/scripts/jquery.min.js"></script>
    	<script type="text/jscript">
    		$(document).ready(function(){
    			$("body").hide().fadeIn(1000);
    		});
    	</script>
	</head>
	<body>
		<?php		
		if (!isset($_SESSION['adminuser']) OR empty($_SESSION['adminuser'])){
			?>
			<div id="warpper">
				<img src="images/wowicon.png" alt="Logo" /><br/>
				<b style="font-size: 35px;"><a class="cms" style="color: #53b8f0;">Phentom</a>CMS</b>
				<div class="auth">
					<?php
					if (!isset($_POST['username']) && !isset($_POST['password'])){}
					elseif (!empty($_POST['username']) && !empty($_POST['password'])){
						$username = $_POST['username'];
						$password = sha_password($username,$_POST['password']);
						
						$mysqli -> select_db($acc_db);
						
						if($core == "trinity" OR $core == "mangos"){
							$loginquery = $mysqli -> query("SELECT * FROM account WHERE username='".$username."' AND sha_pass_hash='".$password."'");
							$verify = $loginquery -> num_rows;
							
							if ($verify > 0){
								while ($row = $loginquery -> fetch_array(MYSQLI_ASSOC)) {
									$user = $row['username'];
									$id = $row['id'];
								}
								$account_access = $mysqli -> query("SELECT * FROM account_access WHERE id='$id' AND gmlevel='3'");
								$verify_access = $account_access -> num_rows;
								
								if ($verify_access > 0){
									$_SESSION['adminuser'] = $user;
									header("Location: index.php");
								}
								else{
									echo "<div class='fail'>".$lang['wrong_userpass']."</div>";
								}
							}
							else{
								echo "<div class='fail'>".$lang['wrong_userpass']."</div>";
							}
						}
						else{
							$loginquery = $mysqli -> query("SELECT * FROM `accounts` WHERE login='$username' AND encrypted_password='$password' AND gm='a' OR gm='az'");
							$verify = $loginquery -> num_rows;
							
							if ($verify > 0){
								while ($row = $loginquery -> fetch_array(MYSQLI_ASSOC)) {
									$_SESSION['adminuser'] = $row['username'];
									header("Location: index.php");
								}
							}
							else{
								echo "<div class='fail'>".$lang['wrong_userpass']."</div>";
							}
						}
					}
					else{
						echo "<div class='fail'>".$lang['wrong_userpass']."</div>";
					}
					?>
				</div>
				<div id="login">
					<form action="" method="post">
						<?php echo $lang['username']; ?>:<br /><input type="text" name="username" required="required" autocomplete="off"/><br />
						<?php echo $lang['password']; ?>:<br /><input type="password" name="password" required="required" autocomplete="off"/><p />
						<input type="submit" value="<?php echo $lang['login']; ?>" />
					</form>
				</div>
				<div class="div_bar"></div><p/>
				<div id="footer">
					<b><a class="cms">Phentom</a>CMS</b> Design & Coded By Phentom 2014
				</div>
			</div>
		<?php
		}
		else{
			?>
			<div id="cpanel">
				<div id='menu'>
					<div class="welcome">
						<a class="welcome_txt"><?php echo $lang['welcome']; ?>,<b> <?php echo ucfirst($_SESSION['adminuser']); ?>.</b></a>
					</div>
					<div class="menu">
						<a href="<?php echo "?page=".strtolower($lang['dashboard']); ?>"><button><img src="images/dashboard.png"/> <?php echo $lang['dashboard']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['website']); ?>"><button><img src="images/website.png"/> <?php echo $lang['website']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['accounts']); ?>"><button><img src="images/accounts.png"/> <?php echo $lang['accounts']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['tools']); ?>"><button><img src="images/settings.png"/> <?php echo $lang['tools']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['extensions']); ?>"><button><img src="images/extensions.png"/> <?php echo $lang['extensions']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['modules']); ?>"><button><img src="images/modules.png"/> <?php echo $lang['modules']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['plugins']); ?>"><button><img src="images/plugins.png"/> <?php echo $lang['plugins']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['statistics']); ?>"><button><img src="images/statistics.png"/> <?php echo $lang['statistics']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['themes']); ?>"><button><img src="images/themes.png"/> <?php echo $lang['themes']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['languages']); ?>"><button><img src="images/languages.png"/> <?php echo $lang['languages']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['info']); ?>"><button><img src="images/info.png"/> <?php echo $lang['info']; ?></button></a>
						<a href="<?php echo "?page=".strtolower($lang['logout']); ?>"><button><img src="images/logout.png"/> <?php echo $lang['logout']; ?></button></a>
					</div>
				</div>
				<div id='content'>
					<div class="page_title">
						<a class="page_title_txt">
							<?php
							if (!isset($_GET['page'])){
								echo $lang['dashboard'];
							}
							else{
								echo ucfirst($_GET['page']);
							}
							?>
						</a>
					</div>
					<div class="content">
						<?php
						//Modules
						if (!isset($_GET['page']) OR $_GET['page'] == strtolower($lang['dashboard'])){
							include_once "include/dashboard.php";
						}
						elseif($_GET['page'] == strtolower($lang['website'])){
							include_once "include/website.php";
						}
						elseif($_GET['page'] == strtolower($lang['accounts'])){
							include_once "include/accounts.php";
						}
						elseif($_GET['page'] == strtolower($lang['tools'])){
							include_once "include/tools.php";
						}
						elseif($_GET['page'] == strtolower($lang['extensions'])){
							include_once "include/extensions.php";
						}
						elseif($_GET['page'] == strtolower($lang['modules'])){
							include_once "include/modules.php";
						}
						elseif($_GET['page'] == strtolower($lang['plugins'])){
							include_once "include/plugins.php";
						}
						elseif($_GET['page'] == strtolower($lang['statistics'])){
							include_once "include/statistics.php";
						}
						elseif($_GET['page'] == strtolower($lang['themes'])){
							include_once "include/themes.php";
						}
						elseif($_GET['page'] == strtolower($lang['languages'])){
							include_once "include/languages.php";
						}
						elseif($_GET['page'] == strtolower($lang['info'])){
							include_once "include/info.php";
						}
						elseif ($_GET['page'] == strtolower($lang['logout'])){
							logout();
						}
						else {
							echo "<p><div class='fail'>".$lang['page_not_found']."</div></p>";
						}
						?>
						<div class="clear"></div>
						<div class="separator"></div>
						<b><a class="cms">WoW</a>CMS</b> Design & Coded By Phentom 2014
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php
		}
		?>
	</body>
</html>