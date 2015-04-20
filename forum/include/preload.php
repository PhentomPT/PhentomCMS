<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Gets the server info
$server_info = $db->serverInfo();

$system->assign("server_info", $server_info);

//Gets the menu
$menu_top = $objData->getMenu("top");
$menu_bar = $objData->getMenu("bar");

$system->assign("menu_top", $menu_top);
$system->assign("menu_bar", $menu_bar);

//Gets languages
$languages = scandir(LANGUAGE_PATH);

foreach($languages as $language) {
	if(is_dir($language) != '.' && $language != 'index.html'){
		$lang_flag[] = $language;
	}
}

$system->assign("flag", $lang_flag);