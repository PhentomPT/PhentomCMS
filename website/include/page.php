<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

$system->display(VIEW_PATH ."/page_top.html");

$plugin_dir = array_diff(scandir(PLUGIN_PATH), array("..",".","index.html","index.php"));

foreach($_GET as $value){
	$get = $value;
}

if (is_dir(PLUGIN_PATH ."/". $get)){
	foreach ($plugin_dir as $key => $value){
		if (file_exists(PLUGIN_PATH ."/". $value ."/menu.plug")){
			if (file_exists(PLUGIN_PATH ."/". $value ."/index.php")){
				include (PLUGIN_PATH ."/". $value ."/index.php");
			}
		}
	}
}
else{
	echo "404 - Page not found";
}

$system->display(VIEW_PATH ."/page_bottom.html");