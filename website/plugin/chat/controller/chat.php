<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$chat_messsages = $db->SelectQuery("user,msg", DBNAME .".". WEB_TBL_CHAT,"","","id DESC","5");
$system->assign("chat_messsages",$chat_messsages);

$system->display(PLUGIN_PATH . "/chat/view/chat.html");