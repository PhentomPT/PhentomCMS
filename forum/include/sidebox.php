<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

$plugin_dir = array_diff(scandir(PLUGIN_PATH), array("..",".","index.html"));

$order = array ();

foreach ($plugin_dir as $key => $value) {
	if (file_exists ( PLUGIN_PATH ."/$value/sidebox.plug")) {
		$number = file_get_contents (PLUGIN_PATH ."/$value/sidebox.plug");
		$order[$number] = $value;
	}
}

ksort ($order);

foreach ($order as $key => $value) {
	if (file_exists ( PLUGIN_PATH ."/$value/index.php")) {
		include (PLUGIN_PATH ."/$value/index.php");
	}
}