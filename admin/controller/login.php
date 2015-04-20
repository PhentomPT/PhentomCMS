<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

include (LANGUAGE_PATH ."/". $_SESSION['lang'] ."/login.php");

if (isset($_POST['submit']) || !empty($_POST['submit'])){
	include (PLUGIN_PATH ."/login/index.php");
}

$system->display(VIEW_PATH . "/login.html");