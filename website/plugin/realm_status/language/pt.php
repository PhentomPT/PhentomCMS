<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['realm_status_title'] = "Estado do Reino";
$lang['players_online'] = "Jogadores Online";
$lang['online_status'] = "Ligado";
$lang['offline_status'] = "Desligado";
/*$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";*/

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}