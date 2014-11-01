<?php
//Refuses direct access
if (!defined("PhentomCMS")){ exit; }

if (!isset($_SESSION['username']) OR empty($_SESSION['username'])){
	echo "<div class='fail'>Sorry but have to login first to view this page.</div>";
}
else{
	?>
	<h2 class="user">Vote</h2>
	<?php 
	$mysqli -> select_db($acc_db);
	
	$acc_id = $mysqli -> query("SELECT id FROM account WHERE username='" . $_SESSION['username'] . "'");
	
	while ($row = $acc_id -> fetch_array(MYSQLI_ASSOC)) {
		$user_id = $row['id'];
	}
	
	$mysqli -> select_db("wowcms");
	
	$vote_links = $mysqli -> query("SELECT * FROM vote_links");
	
	while ($row = $vote_links -> fetch_array(MYSQLI_ASSOC)) {
		switch($row['name']) {
			case "openwow" :
				$id_var = "&spb=" . $user_id;
				break;
			case "arenatop100" :
				$id_var = "&id=" . $user_id;
				break;
			case "top100arena" :
				$id_var = "&incentive=" . $user_id;
				break;
			case "topg" :
				$id_var = "-" . $_SESSION['username'];
				break;
			default :
				$id_var = "";
				break;
		}
		echo "<a href='" . $row['vote_link'] . $id_var . "' target='_blank' class='user'><div class='acc_opt'><img src='" . $row['vote_img'] . "' style='height: 60px; width: 90px; margin-left: 1px; border-bottom-left-radius: 6px; border-top-left-radius: 6px;' alt='" . $row['name'] . "'>" . $row['value'] . " VP</div></a>";
	}
}
?>