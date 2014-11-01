<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
	<!-- Content -->
		<h2 class="user">Login</h2>
		<form action="" method="post">
			Username:<br />
			<input type="text" name="username" required="required" autocomplete="off"/><p />
			Password:<br />
			<input type="password" name="password" required="required" autocomplete="off"/><p />
			<input type="submit" value="Login" />
		</form>
	<?php
	if (isset($_POST['username']) AND !empty($_POST['username'])){
		include_once "core/extensions/wow/$core/login.php";
	}
}
else{
	echo "<div class='fail'>You already have an account...</div>";
}
?>