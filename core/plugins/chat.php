<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }
?>
<div class="box">
	<h3>Chat</h3>
	<div class="chat">
		<?php
		$mysqli -> select_db("wowcms");
		
		$chatquery = $mysqli -> query("SELECT * FROM chat ORDER BY id DESC LIMIT 5");
		
		while ($row = $chatquery -> fetch_array(MYSQLI_ASSOC)) {
			echo "<a class='user'>";
			$mysqli -> select_db($acc_db);
			if ($core == "trinity" OR $core == "mangos"){
				$account_id = $mysqli -> query("SELECT * FROM account WHERE username='".$row['user']."'");
				while ($row2 = $account_id -> fetch_array(MYSQLI_ASSOC)) {
					$id = $row2['id'];
					$power = $mysqli -> query("SELECT * FROM account_access WHERE id='$id' AND gmlevel='3'");
					$verify_power = $power -> num_rows;
					if ($verify_power > 0){
						echo "<img src='content/images/blizz.gif' style='vertical-align: top;' />"; 
					}
				}
			}
			else{
				$account_id = $mysqli -> query("SELECT * FROM accounts WHERE login='".$row['user']."'");
				while ($row2 = $account_id -> fetch_array(MYSQLI_ASSOC)) {
					$id = $row2['id'];
					$power = $mysqli -> query("SELECT * FROM accounts WHERE id='$id' AND gm='a' OR gm='az'");
					$verify_power = $power -> num_rows;
					if ($verify_power > 0){
						echo "<img src='content/images/blizz.gif' style='vertical-align: top;' />"; 
					}
				}
			}
			echo $row['user'] ."</a>: <a>" . $row['msg'] . "</a><div class='div_chat'></div>";
		}
		?>
	</div>
	<p></p>
	<?php
	if (!isset($_SESSION['username']) OR empty($_SESSION['username'])) {}
	else {
		?>
		<form action="" method="post">
			Message
			<input type="text" name="chatmsg" required="required" autocomplete="off"/>
			<p/>
			<input type="submit" />
		</form>
		<?php
	}
	if (!isset($_POST['chatmsg'])){} 
	else {
		if (!isset($_SESSION['username']) OR empty($_SESSION['username'])) {
			echo "<div class='fail'>Can´t do that, must login first</div>";
		} else {
			$mysqli -> select_db("wowcms");
			$msg = special($_POST['chatmsg']);
			$mysqli -> query("INSERT INTO chat (user,msg) VALUES ('" . ucfirst($_SESSION['username']) . "', '" . $msg . "')");
			header("Location: index.php");
		}
	}
	?>
</div>