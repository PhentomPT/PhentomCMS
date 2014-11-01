<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
	<!-- Content -->
		<h2 class="user">Account Register</h2>
		<form action="" method="post">
			Username:<br />
			<input type="text" name="rusername" required="required" autocomplete="off"/><p />
			Password:<br />
			<input type="password" name="rpassword" required="required" autocomplete="off"/><p />
			Check Password:<br />
			<input type="password" name="vpassword" required="required" autocomplete="off"/><p />
			Email:<br />
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
	echo "<div class='fail'>You already have an account...</div>";
}
?>