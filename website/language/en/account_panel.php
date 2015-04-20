<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['vote_points']="Vote Points";
$lang['donation_points']="Donation Points";
$lang['store']="Store";
$lang['unstuck']="Unstuck";
$lang['change_faction']="Change Faction";
$lang['donate']="Donate";
$lang['revive']="Revive";
$lang['teleport']="Teleport";
$lang['change_name']="Change Name";
$lang['vote']="Vote";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}