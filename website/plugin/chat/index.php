<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

if (file_exists(PLUGIN_PATH ."/chat/language/".$_SESSION['lang'].".php")){
	include ("language/".$_SESSION['lang'].".php");
}

$chat_messsages = $db->SelectQuery("user,msg", DBNAME .".". WEB_TBL_CHAT,"","","id DESC","5");
$system->assign("chat_messsages",$chat_messsages);

$system->display(PLUGIN_PATH . "/chat/view/chat.html");