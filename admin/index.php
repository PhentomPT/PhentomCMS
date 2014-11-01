<?php
define("PhentomCMS", "WoW Free CMS");

include_once "../content/include/db.php";
include_once "include/functions.php";

$time = microtime();	
$time = explode(' ', $time);
$time = $time[1] + $time[0];	
$start = $time;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>PhentomCMS - Admin Panel</title>
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
									echo "<div class='fail'>Wrong Email/Password</div>";
								}
							}
							else{
								echo "<div class='fail'>Wrong Email/Password</div>";
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
								echo "<div class='fail'>Wrong Email/Password</div>";
							}
						}
					}
					else{
						echo "<div class='fail'>Wrong Email/Password</div>";
					}
					?>
				</div>
				<div id="login">
					<form action="" method="post">
						Username:<br /><input type="text" name="username" required="required" autocomplete="off"/><br />
						Password:<br /><input type="password" name="password" required="required" autocomplete="off"/><p />
						<input type="submit" value="Entrar" />
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
						<a class="welcome_txt">Welcome,<b> <?php echo ucfirst($_SESSION['adminuser']); ?>.</b></a>
					</div>
					<div class="menu">
						<a href="?page=dashboard"><button><img src="images/dashboard.png"/> Dashboard</button></a>
						<a href="?page=website"><button><img src="images/website.png"/> Website</button></a>
						<a href="?page=accounts"><button><img src="images/accounts.png"/> Accounts</button></a>
						<a href="?page=tools"><button><img src="images/settings.png"/> Tools</button></a>
						<a href="?page=extensions"><button><img src="images/extensions.png"/> Extensions</button></a>
						<a href="?page=modules"><button><img src="images/modules.png"/> Modules</button></a>
						<a href="?page=plugins"><button><img src="images/plugins.png"/> Plugins</button></a>
						<a href="?page=statistics"><button><img src="images/statistics.png"/> Statistics</button></a>
						<a href="?page=themes"><button><img src="images/themes.png"/> Themes</button></a>
						<a href="?page=languages"><button><img src="images/languages.png"/> Languages</button></a>
						<a href="?page=info"><button><img src="images/info.png"/> Info</button></a>
						<a href='?page=sair'><button><img src="images/logout.png"/> Logout</button></a>
					</div>
				</div>
				<div id='content'>
					<div class="page_title">
						<a class="page_title_txt">
							<?php
							if (!isset($_GET['page'])){
								echo "Dashboard";
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
						if (!isset($_GET['page']) OR $_GET['page']=="dashboard"){
							include_once "include/dashboard.php";
						}
						elseif($_GET['page']=="website"){
							include_once "include/website.php";
						}
						elseif($_GET['page']=="accounts"){
							include_once "include/accounts.php";
						}
						elseif($_GET['page']=="tools"){
							include_once "include/tools.php";
						}
						elseif($_GET['page']=="extensions"){
							include_once "include/extensions.php";
						}
						elseif($_GET['page']=="modules"){
							include_once "include/modules.php";
						}
						elseif($_GET['page']=="plugins"){
							include_once "include/plugins.php";
						}
						elseif($_GET['page']=="statistics"){
							include_once "include/statistics.php";
						}
						elseif($_GET['page']=="themes"){
							include_once "include/themes.php";
						}
						elseif($_GET['page']=="languages"){
							include_once "include/languages.php";
						}
						elseif($_GET['page']=="info"){
							include_once "include/info.php";
						}
						elseif ($_GET['page']=="sair"){
							logout();
						}
						else {
							echo "<p><div class='fail'>Page not found</div></p>";
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