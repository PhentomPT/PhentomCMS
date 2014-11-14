<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/register.php";

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
	<!-- Content -->
		<h2 class="user"><?php echo $lang['register']; ?></h2>
		<form action="" method="post">
			<?php echo $lang['username']; ?>:<br />
			<input type="text" name="rusername" required="required" autocomplete="off"/><p />
			<?php echo $lang['password']; ?>:<br />
			<input type="password" name="rpassword" required="required" autocomplete="off"/><p />
			<?php echo $lang['check'].$lang['password']; ?>:<br />
			<input type="password" name="vpassword" required="required" autocomplete="off"/><p />
			<?php echo $lang['email']; ?>:<br />
			<input type="text" name="email" required="required" autocomplete="off"/><p />
			<input type="hidden" name="register" value="1" />
			<input type="submit" value="Register" />
		</form>
	<?php
	if(isset($_POST['register']) AND $_POST['register'] == 1){
		include_once "core/extensions/wow/$core/register.php";
	}
}
else{
	echo "<div class='fail'>".$lang['has_account']."</div>";
}
?>