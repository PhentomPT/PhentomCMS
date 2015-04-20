<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Gets server info
$server_info = $db->serverInfo();

$system->assign("server_info", $server_info);

//Starts counting!!!
$common->microTimeStart();

//Language icons
$languages = scandir(LANGUAGE_PATH);

foreach($languages as $language) {
	if(is_dir($language) != '.' && $language != 'index.html'){
		$lang_flag[] = $language;
	}
}

$system->assign("flag", $lang_flag);

if (isset($_GET['page']) && !empty($_GET['page'])){
	$system->assign("page_title", $_GET['page']);
}
else{
	$system->assign("page_title", "dashboard");
}