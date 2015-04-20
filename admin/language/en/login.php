<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['username'] = "Username";
$lang['password'] = "Password";
$lang['login'] = "Login";
$lang['wrong_user_pass'] = "The username or password you entered is not valid.";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}