<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

$system->display(VIEW_PATH ."/sidebox_top.html");

$plugin_dir = array_diff(scandir(PLUGIN_PATH), array("..",".","index.html"));

$order = array ();

foreach ($plugin_dir as $key => $value) {
	if (file_exists(PLUGIN_PATH ."/". $value ."/sidebox.plug")) {
		$number = json_decode(file_get_contents(PLUGIN_PATH ."/$value/sidebox.plug"));
		$order[$number->order] = $value;
	}
}

ksort($order);

foreach ($order as $key => $value) {
	if (file_exists(PLUGIN_PATH ."/". $value ."/index.php")) {
		include (PLUGIN_PATH ."/". $value ."/index.php");
	}
}

$system->display(VIEW_PATH ."/sidebox_bottom.html");