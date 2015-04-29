<?php
$lang['db_info'] = "Database Info";
$lang['db_host'] = "DB Host";
$lang['db_user'] = "DB User";
$lang['db_password'] = "DB Password";
$lang['db_name'] = "Website DB Name";
$lang['db_forum'] = "Forum DB Name";
$lang['db_error'] = "Error connecting to db.";

$lang['server_info'] = "Server Info";
$lang['server_name'] = "Server Name";
$lang['server_slogan'] = "Server Slogan";
$lang['user'] = "Username";
$lang['password'] = "Password, twice";
$lang['server_core'] = "Server Core";
$lang['expansion'] = "Expansion";
$lang['max_players'] = "Max Players";
$lang['slider'] = "Web Slider";
$lang['pass_error'] = "Password mismatch";

$lang['config_info'] = "Configuration Info";
$lang['error_in'] = "Error in";
$lang['query'] = "Query";
$lang['no_error'] = "No errors where detected during installation!";

foreach ($lang as $key=>$value){
	$system->assign($key, $lang[$key]);
}
