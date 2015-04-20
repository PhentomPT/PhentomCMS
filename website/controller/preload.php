<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

//Language icons
$languages = scandir(LANGUAGE_PATH);

foreach($languages as $language) {
	if(is_dir($language) != '.' && $language != 'index.html'){
		$lang_flag[] = $language;
	}
}

$system->assign("flag", $lang_flag);