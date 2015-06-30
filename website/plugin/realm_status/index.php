<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file"); }

if (file_exists(PLUGIN_PATH ."/realm_status/language/".$_SESSION['lang'].".php")){
	include ("language/".$_SESSION['lang'].".php");
}

$realm_status = $objData->realmStatus();
$system->assign("realm_status", $realm_status);

$system->display(PLUGIN_PATH . "/realm_status/view/realm_status.html");