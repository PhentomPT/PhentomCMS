<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Gets the server info
$server_info = $db->serverInfo();

$system->assign("server_info", $server_info);

//Gets the total online players
$total_online_players = $objData->getOnlinePlayers();

$system->assign("total_online_players", $total_online_players[0]['total_online_players']);

//Gets the menu
$menu_left = $objData->getMenu("left");
$menu_right = $objData->getMenu("right");

$system->assign("menu_left", $menu_left);
$system->assign("menu_right", $menu_right);

//Language icons
$languages = scandir(LANGUAGE_PATH);

foreach($languages as $language) {
	if(is_dir($language) != '.' && $language != 'index.html'){
		$lang_flag[] = $language;
	}
}

$system->assign("flag", $lang_flag);