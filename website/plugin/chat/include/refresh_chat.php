<?php
echo "here";
die;
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if ($_SERVER['SERVER_ADDR'] === $_SERVER['REMOTE_ADDR']){
	
	require ("../../../core/config.php");
	require ("../../../../core/model/class.database.php");
	
	$db = new Database();
	
	//$smarty->force_compile = true;
	$system->debugging = false;
	$system->caching = false;
	$system->cache_lifetime = 120;
	
	if (!empty($_POST['chatmsg'])){
		$db->SimpleUpdateQuery("INSERT INTO ". DBNAME .".". WEB_TBL_CHAT ." (user,msg) VALUES ('". $_SESSION['username'] ."','". $_POST['chatmsg'] ."')");
	}
	
	if (!empty($_POST['refresh'])){
		$chat_messsages = $db->SelectQuery("user,msg", DBNAME .".". WEB_TBL_CHAT,"","","id DESC","5");
		
		foreach ($chat_messsages as $key => $value){
			$chat .= "<a class='user'>";
			if ($chat_messsages[$key]['user'] == "phentom"){
				$chat .= "<img src='image/blizz.gif' alt='Blizz'/>";
			}
			$chat .= $chat_messsages[$key]['user'] ."</a>:";
			$chat .= "<a>". $chat_messsages[$key]['msg'] ."</a>";
			$chat .= "<div class='div_chat'></div>";
		}
		
		$return['chatmsg'] = $chat;
		
		echo json_encode($return);
	}
}
exit();