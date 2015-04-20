<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['realm_status_title'] = "Realm Status";
$lang['players_online'] = "Online Players";
/*$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";*/

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}