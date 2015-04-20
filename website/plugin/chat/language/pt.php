<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['chat_title'] = "Conversa";
$lang['chat_message'] = "Mensagem";
$lang['chat_say'] = "Dizer";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}