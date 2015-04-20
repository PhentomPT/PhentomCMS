<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['username'] = "Nome Utilizador";
$lang['password'] = "Palavra-Passe";
$lang['login'] = "Entrar";
$lang['wrong_user_pass'] = "O nome de utilizador ou palavra-passe não são validos.";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}