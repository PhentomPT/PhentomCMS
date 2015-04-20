<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['login'] = "Login";
$lang['username'] = "Username";
$lang['password'] = "Password";
$lang['email'] = "Email";
$lang['wrong_user_pass'] = "Wrong username or password.";
$lang['pass_missmatch'] = "Password Missmatch.";
$lang['already_registered'] = "Already Resistered.";
$lang['user_exists'] = "Already Exists";
$lang['powered_by'] = "Powered by";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}