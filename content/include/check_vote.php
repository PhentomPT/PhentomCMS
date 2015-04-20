<?php
define("PhentomCMS", "WoW Free CMS");

include_once "db.php";

//List of servers accepted to vote
$accepted_servers = array('openwow' => "159.253.128.82", //works 159.253.128.82
						'topg' => "192.99.101.31", //works 192.99.101.31
						'top100arena' => "209.59.143.11", //works 209.59.143.11
						'arenatop100' => "198.20.70.235"); //works 198.20.70.235
						
if (in_array($_SERVER['REMOTE_ADDR'],$accepted_servers)){
		
	//Retrieve the name of the voted server
	foreach ($accepted_servers as $key => $value) {
		if ($_SERVER['REMOTE_ADDR'] == $value){
			$server = $key;
			break;
		}
	}
	
	//Retrieve the variable from the callback	
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		foreach ($_POST as $name => $val){
     		$user_id = $val;
		}
	}
	elseif($_SERVER['REQUEST_METHOD'] === "GET"){
		foreach ($_GET as $name => $val){
     		$user_id = $val;
		}
	}
	else{
		echo 'Sorry but you can`t do that.';
		exit;
	}
	
	//Transform Account ID in Account Username
	if (is_numeric($user_id)){
		$mysqli -> select_db($acc_db);
		$account_name = $mysqli -> query("SELECT username FROM account WHERE id = '$user_id'");
		while ($row = $account_name -> fetch_array(MYSQLI_ASSOC)) {
			$user_id = $row['username'];
		}
	}
	
	//Sets the timezone to the server timezone location
	date_default_timezone_set(date_default_timezone_get());
		
	$mysqli -> select_db("wowcms");	
	$last_time = $mysqli -> query("SELECT * FROM voted_cooldown WHERE username = '$user_id' AND voted_link = '$server'");	
	$now = date("Y/m/d H:i:s", time());
		
	if ($last_time -> num_rows == 0){
		$mysqli -> query("INSERT INTO voted_cooldown (username,voted_link,voted_time) VALUES('$user_id','$server','$now')");
		$mysqli -> select_db($acc_db);
		$mysqli -> query("UPDATE account SET vp = vp+10 WHERE username = '$user_id'");
		echo "Success!";
	}
	else{
		while($row = $last_time -> fetch_array(MYSQLI_ASSOC)){
			$last_time_voted = date("Y/m/d H:i:s", strtotime($row['voted_time']));
		}
			
		$can_vote = date("Y/m/d H:i:s",strtotime("+12 Hours", strtotime($last_time_voted)));	
		$time_to_vote_again = date("H:i:s",strtotime($can_vote) - strtotime($now));
			
		//Debug to vote again
		//$can_vote = $now;
			
		if ($now >= $can_vote){
			$mysqli -> query("UPDATE voted_cooldown SET voted_time = '$now' WHERE username = '$user_id' AND voted_link = '$server'");
			$mysqli -> select_db($acc_db);
			$mysqli -> query("UPDATE account SET vp = vp+10 WHERE username = '$user_id'");
			echo "Success!";
		}
		else {
			echo 'Sorry but you can`t vote yet';
		}
	}
}
else{
	//Debug to get address from server
	$now = date("Y/m/d H:i:s", time());
	$user_id = "debug";
	$mysqli -> select_db("wowcms");
	$mysqli -> query("INSERT INTO voted_cooldown (username,voted_link,voted_time) VALUES('$user_id','".$_SERVER['REMOTE_ADDR']."','$now')");
	echo "Your not allowed here...";
}
$mysqli -> close();
?>