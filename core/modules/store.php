<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

include_once "language/".$_SESSION['lang']."/store.php";

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	echo "<div class='fail'>Sorry but you must fist login to view this page.</div>";
}
else{
	?>
	<div class="fail">
	<?php echo $lang['not_available']; ?>
	</div>
	<!-- Content 
	<img src="content/images/phentom.jpg" align="left"/> <a class="user"><?php echo $_SESSION['username']; ?></a><p/>
	Vote Points: 100<br />
	Donate Points: 500<br />
	Character :
	<?php 
	$mysqli -> select_db($acc_db);
	$get_account = $mysqli -> query("SELECT id FROM account WHERE username = '" . $_SESSION['username'] . "'");
	while ($row = $get_account -> fetch_array(MYSQLI_ASSOC)) {
		$account_id = $row['id'];
	}
	
	$mysqli -> select_db($char_db);
	$get_chars = $mysqli -> query("SELECT * FROM characters WHERE account = '$account_id'");
	
	echo "<input list='character' required='required' name='character' autocomplete='off'><datalist id='character'>";
	while ($row = $get_chars -> fetch_array(MYSQLI_ASSOC)) {
		echo "<option value='" . $row['name'] . "' >";
	}
	echo "</datalist>";
	?>
	<br />
	
	<div id="shop">
		<div class="item">
			<h3>Armor Part</h3>
			<img src="content/images/armor.jpg" /><br />
			50 Vote Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Weapon</h3>
			<img src="content/images/weapon.jpg" /><br />
			50 Vote Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Armor Part</h3>
			<img src="content/images/armor.jpg" /><br />
			50 Vote Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Weapon</h3>
			<img src="content/images/weapon.jpg" /><br />
			50 Vote Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Armor Part</h3>
			<img src="content/images/armor2.jpg" /><br />
			25 Donate Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Weapon</h3>
			<img src="content/images/weapon2.jpg" /><br />
			25 Donate Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Armor Part</h3>
			<img src="content/images/armor2.jpg" /><br />
			25 Donate Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
		<div class="item">
			<h3>Weapon</h3>
			<img src="content/images/weapon2.jpg" /><br />
			25 Donate Points
			<form action="" method="post">
				<input type="submit" value="Buy" />
			</form>
		</div>
	</div>-->
	<?php
}
?>