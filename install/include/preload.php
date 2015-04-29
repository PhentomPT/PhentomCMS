<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

include (CORE_PATH ."/class.install.php");

include (LANGUAGE_PATH ."/". $_SESSION['lang'] ."/install.php");

$languages = scandir(LANGUAGE_PATH);

foreach($languages as $language) {
	if(is_dir($language) != '.' && $language != 'index.html'){
		$lang_flag[] = $language;
	}
}

$system->assign("flag", $lang_flag);