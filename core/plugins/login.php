<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
?>
<div class="box">
	<?php
	if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
		<h3>Login</h3>
		<p>
		<form action="" method="post">
			Username<input type="text" name="username" required="required" autocomplete="off"/><p />
			Password<input type="password" name="password" required="required" autocomplete="off"/><p />
			<input type="hidden" name="login" />
			<input type="submit" value="Login" />
		</form>
		</p>
		<?php
		if (!isset($_POST['login'])){}
		else {
			echo "<div class='auth'>";
			if (!isset($_POST['username']) && !isset($_POST['password'])){}
			elseif (!empty($_POST['username']) && !empty($_POST['password'])){
				include_once "core/extensions/wow/$core/login.php";
			}
			else {
				echo "<div class='fail'>Wrong User/Password</div>";
			}
			echo "</div>";
			}
	}
	else{
		echo "Welcome <a class='user'>".ucwords($_SESSION['username'])."</a> !";
		
		/* $mysqli -> select_db("wowcms");			
		$accquery = $mysqli -> query("SELECT * FROM accounts WHERE username='".$_SESSION['username']."'");
		$verify = $accquery -> num_rows;
		if($verify > 0){
			while ($row = $accquery -> fetch_array(MYSQLI_ASSOC)) {
				$power = $row['power'];
			}
								
			if ($power = 1){
				echo "<a href='http://127.0.0.1/trabalho/wow_cms/admin' target='_blank'><button>Adm Panel</button></a><p/>";
			}
		} */
		
		echo "<form action='' method='post'>
				<input type='hidden' name='logout'/>
				<input type='submit' value='Logout' />
			</form>";
		
		if (!isset($_POST['logout'])){}
		else {
			if ($_SESSION['return'] == "false"){
				echo "Can´t do that, must login first";
			}
			else{
				logout();
			}
		}
	}
	?>
</div>