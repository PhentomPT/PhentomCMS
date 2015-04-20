<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['login'] = "Entrar";
$lang['username'] = "Utilizador";
$lang['password'] = "Palavra-Passe";
$lang['wrong_user_pass'] = "Nome Utilizador ou Password errada.";
$lang['pass_missmatch'] = "Passwords não cuincidem.";
$lang['already_registered'] = "Já Registado.";
$lang['user_exists'] = "Já existe.";
$lang['powered_by'] = "Distribuido por";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}