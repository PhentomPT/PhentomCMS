<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
?>
<div class="box">
	<?php
	if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	?>
		<h3><?php echo $lang['login'];?></h3>
		<p>
		<form action="" method="post">
			<?php echo $lang['username'];?><input type="text" name="username" required="required" autocomplete="off"/><p />
			<?php echo $lang['password'];?><input type="password" name="password" required="required" autocomplete="off"/><p />
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
				echo "<div class='fail'>".$lang['wrong_userpass']."</div>";
			}
			echo "</div>";
			}
	}
	else{
		echo $lang['welcome']." <a class='user'>".ucwords($_SESSION['username'])."</a> !";
		
		echo "<a href='?page=account'><button>Account P</button></a><p/>";
		
		$mysqli -> select_db($acc_db);
		if ($core == "trinity" OR $core == "mangos"){
			$account_id = $mysqli -> query("SELECT * FROM account WHERE username='".$_SESSION['username']."'");
			while ($row2 = $account_id -> fetch_array(MYSQLI_ASSOC)) {
				$id = $row2['id'];
				$power = $mysqli -> query("SELECT * FROM account_access WHERE id='$id' AND gmlevel='3'");
				$verify_power = $power -> num_rows;
				if ($verify_power > 0){
					echo "<a href='admin' target='_blank'><button>Adm Panel</button></a><p/>"; 
				}
			}
		}
		else{
			$account_id = $mysqli -> query("SELECT * FROM accounts WHERE login='".$_SESSION['username']."'");
			while ($row2 = $account_id -> fetch_array(MYSQLI_ASSOC)) {
				$id = $row2['id'];
				$power = $mysqli -> query("SELECT * FROM accounts WHERE id='$id' AND gm='a' OR gm='az'");
				$verify_power = $power -> num_rows;
				if ($verify_power > 0){
					echo "<a href='admin' target='_blank'><button>Adm Panel</button></a><p/>"; 
				}
			}
		}
		
		echo "<form action='' method='post'>
				<input type='hidden' name='logout'/>
				<input type='submit' value='Logout' />
			</form><br/>";
		
		if (!isset($_POST['logout'])){}
		else {
			if ($_SESSION['return'] == "false"){
				echo $lang['login_first'];
			}
			else{
				logout();
			}
		}
	}
	?>
</div>