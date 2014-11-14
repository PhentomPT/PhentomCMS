<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/login.php";

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
	<!-- Content -->
		<h2 class="user"><?php echo $lang['login']; ?></h2>
		<form action="" method="post">
			<?php echo $lang['username']; ?>:<br />
			<input type="text" name="username" required="required" autocomplete="off"/><p />
			<?php echo $lang['password']; ?>:<br />
			<input type="password" name="password" required="required" autocomplete="off"/><p />
			<input type="submit" value="Login" />
		</form>
	<?php
	if (isset($_POST['username']) AND !empty($_POST['username'])){
		include_once "core/extensions/wow/$core/login.php";
	}
}
else{
	echo "<div class='fail'>".$lang['has_account']."</div>";
}
?>