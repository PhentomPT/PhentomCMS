<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

if (isset($_POST['login'])){
	if ($core == "arcemu"){
		include ("arcemu.php");
	}
	else{
		include ("trinity.php");
	}
}

$system->display(PLUGIN_PATH ."/login/view/login.html");