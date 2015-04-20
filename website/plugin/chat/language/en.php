<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['chat_title'] = "Chat";
$lang['chat_message'] = "Message";
$lang['chat_say'] = "Say";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}