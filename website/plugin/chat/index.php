<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

if (file_exists(PLUGIN_PATH ."/chat/language/".$_SESSION['lang'].".php")){
	include ("language/".$_SESSION['lang'].".php");
}

include ("controller/chat.php");